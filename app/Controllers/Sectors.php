<?php

namespace App\Controllers;

use App\Models\CommonModel;
use \CodeIgniter\Exceptions\PageNotFoundException;
use App\Models\ProductModel;
use App\Models\SectorModel;

/**
 * Sector class
 *
 * GHT : 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
 *
 */
class Sectors extends BaseController
{
    public $mdb;
    public $config;
    public $collection;
    public $validation;

    function __construct()
    {
        $this->mdb = new CommonModel();
        $this->collection = "rp_product_sectors";
        helper(['form','url','text','custom']);
        $this->validation = \Config\Services::validation();
    }

    /*
     * List Sectors
     */
    public function index()
    {
        if (!is_logged()) return redirect()->to('/login');     

        if ($this->request->getMethod()=='post'){
            $prodChar = 'rp_productCharacteristics';
            $where = ['org_secteur' =>$this->request->getVar('product_sector')];
            $data['product_det'] = $this->mdb->getList($prodChar,$where);
        }
        $data = [
            'title' => "Red Panda Prices | Sectors List",
            'sectors' => $this->mdb->getList($this->collection),
            'moderators' => $this->mdb->getList("rp_users", ['u_role'=>'moderator'])
        ];

        echo view('sectors/admin/index', $data);
    }

    function getModerator($segment = null){
        $users = model(UserModel::class);
        $moderator = $users->getUserById($segment);
        print_r($moderator->u_first_name .' '. $moderator->u_last_name);
    }

    /*
     *Create sector with form validation
     */
    public function create()
    {
        if (!is_logged()) return redirect()->to('/login');

        $data['sectors'] = $this->mdb->getList($this->collection);

        $data = array(
            'sector_name' => $this->request->getVar('sector_name'),
            'sector_slug' => strtolower(convert_accented_characters(url_title($this->request->getVar('sector_name')))),
            'moderator' => $this->request->getVar('moderator'),
            'sector_id' => md5($this->request->getVar('sector_name') . date('d-Y-M : s:h')),
            'sector_created_at' => date("Y-m-d"),
            'sector_status' => 'enabled',
            'sector_description' =>$this->request->getVar('description'),
            'sector_image' => 'sect.jpg',
        );

        $this->mdb->create($this->collection, array($data));
        $session = session();
        $session->setFlashData("success", "Sector created Successfully");
        return redirect()->to('/sectors');
    }

    /*
     * Call Sect edit view to update name
     */

    function edit($id){
        if (!is_logged()) return redirect()->to('/login');

        $data['sector'] = $this->mdb->getOne($this->collection, ['sector_id'=>$id]);
        echo view('sectors/admin/edit', $data);
    }

    /*
     * Update Sectors
     */

    function  update(){

        if (!is_logged()) return redirect()->to('/login');

        $id = $this->request->getVar('sector_id');
        $data['sector'] = $this->mdb->getOne($this->collection, ['sector_id'=>$id]);

        $data = array(
            'sector_name' => $this->request->getVar('sector_name'),
            'sector_slug' => strtolower(convert_accented_characters(url_title($this->request->getVar('sector_name')))),
            'moderator' => $this->request->getVar('moderator'),
            'sector_description' => $this->request->getVar('description'),
        );

        if(!empty($data)){
            $where = ['sector_id' => $id];
            $this->mdb->updateOne($this->collection, $where, $data);
            $session = session();
            $session->setFlashData("success", "Sector updated Successfully");
            return redirect()->to('/sectors');
        }else{
            echo view('sectors');
        }
        return redirect()->to('/sectors');
    }

    function delete($key){
        if (!is_logged()) return redirect()->to('/signup');

        $where = ['sector_id' => $key];
        $data['sector'] = $this->mdb->getOne($this->collection, $where);

        $status = $data['sector']['sector_status'];
        $where = ['sector_id' => $data['sector']['sector_id']];
        if(!empty($data)) {
            if($status == 'enabled'){
                $data = ['sector_status'=>'disabled'];
            }elseif ($status == 'disabled') {
                $data = ['sector_status'=>'enabled'];
            }
            else{
                return PageNotFoundException::forPageNotFound();
            }           
            $this->mdb->updateOne($this->collection, $where, $data);
 
        }else{
            return PageNotFoundException::forPageNotFound();
        }
        return redirect()->to('/sectors');

    }

    /*
     *  Loading product by sectors :: Functions have been modified to get data from products collection
     */
 
    function sectorProduct($segment = null){        
        $products = (model(ProductModel::class))->getProducts();
        $sect = [];
        foreach($products as $prod){
            if(in_array($segment,(array)$prod->product_sectors)) {
                array_push($sect,$prod);
            }
        }
        return $sect;
    }
    /**
     * Load all products for a selected Sector on the Homepage
     */
    function productSector($slug){
        $sector = (model(SectorModel::class))->getSectorBySlug($slug);
        $data = [
            'prod_sectors' => $this->sectorProduct($sector->_id),
            'title' => $sector->sector_name,
        ];
        echo view('sectors/product_by_sector',$data);
    }

    function getProduct($product_id = null)
    {
        $product_id = $this->request->getVar('product_id');
        return $this->mdb->getOne('rp_products',  ['product_id' => $product_id]);
    }

    function countOrg($segment = null)
    {
        echo count((model(ProductCharactModel::class))->getSectorProducts($segment));
    }
    /*
     *  Loading product details
     */
    function productDetails($product_id = null){
        $prodChar = 'rp_productCharacteristics';

        $data = [
            'product_det' => $this->mdb->getOne($prodChar, ['product_id' => $product_id]),
            'title' => 'Details Product',
            ];
        echo view('sectors/product_details',$data);
    }

    function deleteSector($id){

        if (!is_logged()) return redirect()->to('/signup');
        $data['sector'] = $this->mdb->getOne($this->collection, ['sector_id'=>$id]);
        if(!empty($data)){
            $this->mdb->deleteOne($this->collection, ['sector_id'=>$id] );
            $session = session();
            $session->setFlashData("success", "Sector deleted Successfully");
            return redirect()->to('/sectors');
        }
    }

    function addImage($key)
    {
        if (!is_logged()) return redirect()->to('/login');
       
        $where = ['sector_id' => $key];
        $data['sector'] = $this->sectModel->getSector($key);
        // $data['sector'] = $this->mdb->getOne($this->collection, $where);

        if (!empty($data['sector'])) {
            echo view('sectors/admin/add_img', $data);

        } else {
            return PageNotFoundException::forPageNotFound();
        }
    }

    function saveImage()
    {
        if (!is_logged()) return redirect()->to('/login');

        $sector = $this->sectModel->getSector($this->request->getVar('sector_id'));

        $where =($sector['_id']);
        $oldImage = $sector->sector_image;
        $path = '/assets/rp_admin/images/sector';
        
        if ($this->request->getMethod() == 'post') {
            $rules = [
                'sector_id' => [
                    'label' => 'Sector ID',
                    'rules' => 'required'],
                'sector_image' => [
                    'label'=>'Image',
                    'rules'=>'uploaded[sector_image]|max_size[sector_image, 1024]|is_image[sector_image]']
            ];
            if ($this->validate($rules)) {

                $file = $this->request->getFile('sector_image');

                if ($file->isValid() && !$file->hasMoved()) {
                    $imageName = $file->getRandomName();

                     //Delete the old image if it does exists
                     if(file_exists($path .'/'. $oldImage) && $oldImage !== null){
                        unlink($path .'/'. $oldImage);
                    }

                    $data = ['sector_image' => $imageName];
                    // $where = ['sector_id' => $this->request->getVar('sector_id')];
                    $file->move('./assets/rp_admin/images/sector', $imageName);

                    $this->sectModel->updateImage($where, $imageName);
                    return redirect()->to('/sectors');
                }
            } else {
                $data['validation'] = $this->validation->getErrors();
            }
        }
        echo view('sectors/admin/add_img', $data);

    }

    public function getSector($segment = null)
    {
        $model = model(SectorModel::class);

        $data['sector'] = $model->getSector($segment);
        if (empty($data['sector'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find sector with ID: ' . $segment);
        }
        return $data['sector'];
    }

}