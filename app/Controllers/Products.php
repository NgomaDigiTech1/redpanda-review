<?php

namespace App\Controllers;
use MongoDB\BSON\ObjectId;
/*
	Products Controller class and module
*/

use App\Controllers\BaseController;
use App\Models\CommonModel;
use CodeIgniter\Exceptions\PageNotFoundException;
use App\Controllers\Sectors as Sectors;

class Products extends BaseController
{
    public $mdb;
    public $config;
    public $collection;
    public $validation;
    public $prodModel;

    public function __construct()
    {
        $this->mdb = new CommonModel();
        $this->collection = "rp_products";
        helper(['form', 'url', 'text','custom']);
        $this->validation = \Config\Services::validation();
        $this->prodModel = model(ProductModel::class);
    }

    /*
     * Display product list in admin space dashboard
     */
    public function index()
    {
        if (!is_logged()) return redirect()->to('/login');
        $user_data = session()->get('user_data');

        $secteur = $this->mdb->getList("rp_product_sectors", ['moderator'=>$user_data['u_first_name']]);
        $tab = [];
        foreach ($secteur as $sect){
            array_push($tab,$sect->sector_name);
        }
        $data = [
            'title' => "Products | The Price Bee",
            'sectors' => $this->sectModel->getEnabledSectors(), //Products sectors Field List
            'sect_mod' => $tab,
            'user_data' => $user_data,
            'products' => $this->mdb->getList($this->collection),
        ];
        echo view('products/admin/index', $data);
    }
    

    function getOrganisationProducts(){
        $user_data = session()->get('user_data');
        $products = $this->mdb->getList('rp_productCharacteristics', ['org_id'=>$user_data->_id]);
        $data = [
            'title' => 'Organisation Products',
            'products' => $products
        ];
        return view('products/admin/org_products', $data);
    } 

    function getProductCategories($segment = null){
        if(!$segment){die('You must specify an ID');}
        $product = $this->prodModel->getProduct($segment);
        if(empty($product)) {
            exit('Product not found');
        }
        $categories = [];
        foreach($product->product_categories as $key => $value){
            array_push($categories,$value);
        }
        return $categories;  
    }

    function getSectorsProduct($segment){
        $product = $this->prodModel->getProduct($segment);
        $sect = new Sectors();
        $sectors = [];
        foreach($product->product_sectors as $key => $value){
            $name = $sect->getSector($value)['sector_name'];
            array_push($sectors,$name);
        }
        return $sectors;      
    }

    function getProducts(){
        $products = $this->mdb->getList($this->collection);
        return json_encode($products);
    }
    /*
     *Create product with form validation
     */
    public function create()
    {
        if (!is_logged()) return redirect()->to('/login');

        $data = [];
        $data['validation'] = null;
        $data['sectors'] = $this->mdb->getList("rp_product_sectors");
        if ($this->request->getMethod() == 'post') {
            $this->validation->setRules([
                'productname' => ['label' => 'Product Name', 'rules' => 'required'],
                'product_sectors' => ['label' => 'Product Sectors', 'rules' => 'required'],
                'product_categories' => ['label' => 'Product Types', 'rules' => 'required'],
                'product_description' => ['label' => 'Product Description', 'rules' => 'min_length[10]'],
                'require_chars' => ['label' => 'Required Characteristics', 'rules' => 'required'],
                'optional_chars' => ['label' => 'Optional Characteristics', 'rules' => 'required']
            ]);

            if ($this->validation->withRequest($this->request)->run()) {
                $data = array(
                    'product_name' => $this->request->getVar('productname'),
                    'product_slug' => strtolower(convert_accented_characters(url_title($this->request->getVar('productname')))),
                    'price'=>'Price',
                    'mfg_year'=>'Mfg Year',
                    'model'=>'Model',
                    'colors'=>'Colors',
                    'product_categories' => explode(",", $this->request->getVar('product_categories')),
                    'product_description' => $this->request->getVar('product_description'),
                    'product_status' => 'enable',
                    "caracteristics" => [
                        "required" => explode(",", $this->request->getVar('require_chars')),//[explode(",", $this->request->getVar('require_chars'))],
                        "optionals" => explode(",", $this->request->getVar('optional_chars')),
                    ],
                    'created_at' => date("Y-m-d"),
                    'product_image' => '1636451558_385a20f1a11c5a547a53.jpeg', //The default image
                    "conditions" => $this->request->getVar('conditions')
                );
                if(isset($_POST["product_sectors"])) 
                {
                    // Retrieving each selected option
                    $sectors = [];
                    foreach ($_POST['product_sectors'] as $sector ) {
                        array_push($sectors, $sector);
                    }
                    $data['product_sectors'] = $sectors;
                }
                $this->mdb->create($this->collection, array($data));

                $session = session();
                $session->setFlashData("success", "Characteristics added Successfully");
                return redirect()->to('/products');

            } else {
                $data['validation'] = $this->validation->getErrors();
            }
        }
        echo view('products/admin/create', $data);
    }

    function allProducts()
    {
        $data = [
            'title' => 'All Products',
            'products' => $this->mdb->getList($this->collection)
        ];
        echo view('products/index', $data);
    }

    /*
     * Add characteristics to products
     */
    function addCharacter($segment=null)
    {
        if (!is_logged()) return redirect()->to('/login');
        $user_data = session()->get('user_data');
        $uid = $user_data['_id'];
        $data['product'] = $this->prodModel->getProduct($segment);

        if($data['product'] === null){
            return $this->getOrganisationProducts();
        }
        if (!empty($data['product'])) {
            $productChar = model(ProductCharactModel::class);
            // Emiminate redundance
            $produit = $productChar->getOwnProducts($segment,$uid);
            if($produit) {
                session()->setTempdata("redondance","This product already exist",10);
                return $this->getOrganisationProducts();
            } else {
                echo view('products/admin/add_chars', $data);
            }            
        } 
    }
    function saveCharacteristics()
    {
        if (!is_logged()) return redirect()->to('/login');

        if ($this->request->getMethod() == 'post') {
            $provider_data = session()->get('user_data');
            $postdata = $_POST;
            $data['product'] = $this->prodModel->getProduct($this->request->getVar('product_id'));
            $product_id = $data["product"]["_id"];
            $characteristics = [];
            if (!empty($data["product"])) {

                $productChar = model(ProductCharactModel::class);
                // Emiminate redundance
                $produit = $productChar->getOwnProducts($product_id,$provider_data->_id);
                if($produit) {
                    session()->setTempdata("redondance","This product already exist",10);
                    return $this->getOrganisationProducts();
                }
                foreach($postdata as $key=>$val){
                    if($key !== 'product_id'){
                        $characteristics[$key] = $val;        
                    }
                }
                $datum = [
                    "product_id" => $product_id,  // The ObjectId of the product
                    "price" => $this->request->getVar('price'),
                    'mfg_year'=> explode(',',$this->request->getVar('mfg_year')),
                    'model'=> $this->request->getVar('model'),
                    'colors'=> explode(',',$this->request->getVar('colors')),
                    "caracteristics" => $characteristics,
                    "org_id" => $provider_data->_id, // The ObjectId of the
                    'created_at' => date("Y-m-d"),
                ];
                $this->mdb->create("rp_productCharacteristics", array($datum));
                $session = session();
                $session->setTempdata("success", "Characteristics Added Successfully",5);

                return $this->getOrganisationProducts();
            }
        }
    }

    /*
     * Update Products
     */

    function update()
    {
        if (!is_logged()) return redirect()->to('/login');

        $data = array(
            'product_name' => $this->request->getVar('product_name'),
            'product_description' => $this->request->getVar('product_description'),
            'product_categories' => explode(",", $this->request->getVar('product_categories')),
        );
    }

    function delete($key, $typekey)
    {
        if (!is_logged()) return redirect()->to('/login');
        $product = $this->prodModel->getProduct($key);
        $status = $product['product_status'];
        if (!empty($product)) {
            if ($typekey == 'enable') {
                $status = 'enable';
            } elseif ($typekey == 'disable') {
                $status = 'disable';
            } else {
                return PageNotFoundException::forPageNotFound();
            }
            $this->prodModel->updateStatus($key, $status);
        } else {
            return PageNotFoundException::forPageNotFound();
        }
        return redirect()->to('/products');
    }

    function addImage($key)
    {
        if (!is_logged()) return redirect()->to('/login');
        $data[] = null;
        $data['product'] = $this->prodModel->getProduct($key);       

        if (!empty($data['product'])) {
            echo view('products/admin/add_img', $data);
        } else {
            return PageNotFoundException::forPageNotFound();
        }
    }

    function saveImage()
    {
        if (!is_logged()) return redirect()->to('/login');
        $product = $this->prodModel->getProduct($this->request->getVar('product_id'));
        $where =($product['_id']);
        $data[] = null;
        if ($this->request->getMethod() == 'post') {
            $rules = [
                'product_id' => [
                    'label' => 'Product ID',
                    'rules' => 'required'],
                'product_image' => [
                    'label'=>'Image',
                    'rules'=>'uploaded[product_image]|max_size[product_image, 3072]|is_image[product_image]']
            ];
            if ($this->validate($rules)) {

                $file = $this->request->getFile('product_image');

                if ($file->isValid() && !$file->hasMoved()) {
                    $imageName = $file->getRandomName();
                    $this->prodModel->updateImage($where, $imageName);
                    $file->move('./assets/rp_admin/images/product', $imageName);        
                    return redirect()->to('/products');
                }
            } else {
                $data['validation'] = $this->validation->getErrors();
            }
        }
        echo view('products/admin/add_img', $data);
    }

    public function details($segment = null)
    {
        $data['product'] = $this->prodModel->getProduct($segment);

        if (empty($data['product'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find product with ID: ' . $segment);
        }
        return view('products/admin/details', $data);
    }
    public function productDetails($prod = null, $org = null){
        if($prod && $org){            
            $data = [
                'product_det' => $this->prodCharModel->getOwnProducts($prod, $org),
                'title' => 'Details Product',
                'produit' => $this->prodModel->getProduct($prod),
                'org'=> $this->userModel->getUserById($org)
            ];
            echo view('products/details',$data);
        }else{
            return redirect()->to('/');
        }
    }

}
