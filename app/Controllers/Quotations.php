<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\CommonModel;

use \Config\Services;

use CodeIgniter\Exceptions\PageNotFoundException;

/**
 * Quotations class
 */

class Quotations extends BaseController
{
    public $mdb;
    public $config;
    public $collection;
    public $validation;
    public $email;

    public function __construct()
    {
        $this->mdb = new CommonModel();
        $this->collection = 'rp_productCharacteristics';
        $this->validation = Services::validation();
        $this->email = Services::email();

        helper(['form', 'url','text','custom']);
    }

	public function index()
	{
        $data['title'] = "The Price Bee | Quotations";

        $data['products'] =  $this->mdb->getList($this->collection);

        echo view('quotations/quotation', $data);
	}


    function sendToAdmin($to, $prod, $org, $client, $phone){
        $body = "
         <p>Hi The Price Bee ! </p>
         <p>A request of quote on The Price Bee has been submitted for <strong> $prod </strong></p>
      
         <table>
            <tr>
                <td>To Org : </td>
                <td>$org</td>
            </tr>
            <tr>
                <td>Client : </td>
                <td>$client</td>
            </tr>
            <tr>
                <td>Phone : </td>
                <td>$phone</td>
            </tr>
        </table>
         <span>From The Price Bee !</span>     
        ";

        $this->email->setFrom('infos@thepricebee.com', 'A request on The Price Bee System');

        $this->email->setTo($to);

        $this->email->setSubject("A request has been submitted on The Price Bee System");

        $this->email->setMessage($body);

        if ($this->email->send()) {

            //session()->setTempdata('success', 'Your request has been submitted successfully');
            echo "";

        } else {

           // print_r($this->email->printDebugger($this->email->send()));
            return true;

        }
    }

    function  sendToOrganisation($to, $prod, $org, $client, $phone, $email){

        $body = "
         <p>Hi $org ! </p>
         <p>You've received a request of quote on The Price Bee for <strong> $prod</strong> by</p>
         <table>
            <tr>
                <td>Client : </td>
                <td>$client</td>
            </tr>
            <tr>
                <td>Phone : </td>
                <td>$phone</td>
            </tr>
            <tr>
                <td>Email :</td>
                <td>$email</td>
            </tr>
        </table>
         <span>From The Price Bee !</span>     
        ";

        $this->email->setFrom('infos@thepricebee.com', 'Request on The Price Bee');

        $this->email->setTo($to);

        $this->email->setSubject("A request of quote has been sent to you");

        //$this->email->setMessage($this->mailOrganisationContent($to, $data));

        $this->email->setMessage($body);

        if ($this->email->send()) {

            //session()->setTempdata('success', 'Your request has been submitted successfully');
            echo  "";

        } else {

            //print_r($this->email->printDebugger($this->email->send()));
            return true;

        }
    }

    function sendToClient($to, $product, $client){

        $body = "
         <p>Hi $client ! </p>
         <p>You've made a request of quote on The Price Bee System for <strong>$product</strong></p>
         <p>We'll contact you soon ...</p> 
         <span>Thank you for choosing The Price Bee !</span>     
        ";

        $this->email->setFrom('infos@thepricebee.com', 'Your request of quote on The Price Bee');

        $this->email->setTo($to);

        $this->email->setSubject("Your request of quote on The Price Bee");

        $this->email->setMessage($body);

        if ($this->email->send()) {

           //session()->setTempdata('success', 'Your request has been submitted successfully');
           echo "";

        } else {

            //print_r($this->email->printDebugger($this->email->send()));
            //session()->setTempdata('error',"Couldn't send you the mail, your email address could not be valid. Contact Admin",5);
            return true;
        }
    }
    
    function apply()
    {   
        $client_data = session()->get('client_data');
        if($client_data == null) {
            return redirect()->to('/');
        } 
      
        if($this->request->getMethod() === 'post'){
            // if(!$_POST['colors'] && !$_POST['years']) {
            //     return redirect()->back()->with('error', "Choose the color and the year");
            // }else{                
                $data  = [
                    'org' => $this->request->getVar('org_name'),
                    'org_email' => $this->request->getVar('org_email'),
                    'cl_product' => $this->request->getVar('prod_name'),
                    'colors' => $this->request->getVar('colors'),
                    'price' => $this->request->getVar('price'),
                    'created_at' => date('Y-m-d H:i:s'),
                    'status' => 'pending',
                ];
                session()->push('client_data', $data);
                $donnees = session()->get('client_data');
                $this->mdb->create("rp_quotation", array($donnees));
                
                $this->sendToClient($client_data['cl_email'], $client_data['cl_product'], $client_data['cl_name']);
                $this->sendToAdmin('info@thepricebee.com', $client_data['cl_product'], $data['org'], $client_data['cl_name'], $client_data['cl_phone']); // The support email to be changed when online
                $this->sendToOrganisation($data['org_email'], $client_data['cl_product'],$data['org'],$client_data['cl_name'],$client_data['cl_phone'],$client_data['cl_email']); // The organisation mail
                   
                session()->setTempdata('success', 'Your request has been submitted successfully', 6);
                session()->remove('client_data');
    
                echo view('quotations/send_request',$data);
            // }

        }
        else{

            session()->setTempdata("error", "Error, couldn't submit the request. Please try again !");
            redirect($_SERVER['HTTP_REFERER']);
        }

    }    

    function quote($slug)
    {
        $client_data = session()->get('client_data');
        $charact = model(ProductCharactModel::class);      
        $produit = (model(ProductModel::class))->getProductBySlug($slug);
        $data = [
            'title' => $produit->product_name,
            'products' => $charact->getSectorProducts($produit->_id),
            'client_data' => $client_data,
        ];
        if(!empty($client_data)){
            if($slug === 'home-insurance' || $slug === 'car-insurance'){
                echo view('quotations/quote_insurance', $data);
            }
             else {
                    echo view('quotations/quote', $data);
             }
        }else {
            return redirect()->to('/');
        }
    }

    function quoteInsurance($slug = null)
    {
        $client_data = session()->get('client_data');
        $product = (model(ProductModel::class))->getProductBySlug($slug);
        $data = [
            'title' => $product->product_name,
            'products' => $this->prodCharModel->getSectorProducts($product->_id),
            'client_data' => $client_data,
        ];     
        echo view('quotations/quote_insurance', $data);
    }

    function requesting($slug){

        $produit = (model(ProductModel::class))->getProductBySlug($slug);

        $data = array(
            'cl_name' => $this->request->getVar('cl_name'),
            'cl_email' => $this->request->getVar('cl_email'),
            'cl_phone' => $this->request->getVar('cl_phone'),
        );
        session()->set('client_data', $data);
        return redirect()->to('quote/'.$produit->product_slug);

    }      

    function loadHome($slug)
    {
        $product = (model(ProductModel::class))->getProductBySlug($slug);
        
        $data = [
            'title' => $product->product_name,
            'product' => $product
        ];

        if($this->request->getMethod() == 'post'){

            $this->validation->setRules([
 
                'oc_title' => ['label' => 'Title', 'rules' => 'required'],
                'oc_first_name' => ['label' => 'First Name', 'rules' => 'required'],
                'oc_middle_name' => ['label' => 'Middle Name', 'rules' => 'required'],
                'oc_surname' => ['label' => 'Surname', 'rules' => 'required'],
                'oc_email' => ['label' => 'Email', 'rules' => 'required|valid_email'],
                'oc_phone' => ['label' => 'Telephone Office', 'rules'=>'required'],
                'oc_mobile' => ['label' => 'Mobile Number', 'rules'=>'required'],
                'oc_dob' => ['label' => 'DoB', 'rules' => 'required'],
                'oc_age' => ['label' => 'Age', 'rules' => 'required|is_numeric'],
                'oc_type_accom' => ['label' => 'Type of accommodation', 'rules' => 'required'],
                'oc_rooms' => ['label' => 'Number of rooms', 'rules' => 'required|is_numeric'],
                'oc_usage'=> ['label' => 'Usage', 'rules' => 'required'],
                'oc_category' => ['label' => 'Category of Occupant', 'rules' => 'required'],
                'oc_period' => ['label' => 'Period of Occupation', 'rules' => 'required'],
                'oc_adults' => ['label' => 'Number of adults', 'rules' => 'required|is_numeric'],
                'oc_children' => ['label' => 'Number of Children', 'rules' => 'required|is_numeric'],
                'oc_phys_add_one' => ['label' => 'Physical Address 1', 'rules' => 'required'],
                'oc_suburb' => ['label' => 'Suburb', 'rules' => 'required'],
                'oc_town' => ['label' => 'Town', 'rules' => 'required'],
                'oc_country' => ['label' => 'Country', 'rules' => 'required'],
                'oc_city' => ['label' => 'City', 'rules' => 'required'],
            ]);
 
            if ($this->validation->withRequest($this->request)->run()){
 
                $data = array(
                    'oc_title' => $this->request->getVar('oc_title'),
                    'oc_first_name' => $this->request->getVar('oc_first_name'),
                    'quotation_id' => md5($this->request->getVar('oc_first_name').date('d-Y-M : h:i')),
                    'oc_middle_name' => $this->request->getVar('oc_middle_name'),
                    'oc_surname' => $this->request->getVar('oc_surname'),
                    'oc_email' => $this->request->getVar('oc_email'),
                    'oc_phone' => $this->request->getVar('oc_phone'),
                    'oc_mobile' => $this->request->getVar('oc_mobile'),
                    'oc_dob' => $this->request->getVar('oc_dob'),
                    'oc_age' => $this->request->getVar('oc_age'),
                    'oc_type_accom' => $this->request->getVar('oc_type_accom'),
                    'oc_rooms' => $this->request->getVar('oc_rooms'),
                    'oc_usage'=> $this->request->getVar('oc_usage'),
                    'oc_category' => $this->request->getVar('oc_category'),
                    'oc_period' => $this->request->getVar('oc_period'),
                    'oc_adults' => $this->request->getVar('oc_adults'),
                    'oc_children' => $this->request->getVar('oc_children'),
                    'oc_phys_add_one' => $this->request->getVar('oc_phys_add_one'),
                    'oc_phys_add_two' => $this->request->getVar('oc_phys_add_two'),
                    'oc_suburb' => $this->request->getVar('oc_suburb'),
                    'oc_town' => $this->request->getVar('oc_town'),
                    'oc_country' => $this->request->getVar('oc_country'),
                    'oc_city' => $this->request->getVar('oc_city'),
                    'oc_product' => $product->product_name,
                    'created_at'=> date('Y-m-d H:i:s'),
                    'oc_sector' => 'insurance'
                );

                session()->set('client_data', $data);
                return redirect()->to('quote/'.$slug);

            }else{
                $data['validation'] = $this->validation->getErrors();
                return view('quotations/home_insurance', $data);
            }
        }

        echo view('quotations/home_insurance', $data);
    }
 
    function loadCar($slug)
    {
        $product = $this->prodModel->getProductBySlug($slug);
        $data = [
            'title' => $product->product_name,
            'product' => $product
        ];
        
        if($this->request->getMethod() == 'post'){

            $this->validation->setRules([

                'oc_title' => ['label' => 'Title', 'rules' => 'required'],
                'oc_first_name' => ['label' => 'First Name', 'rules' => 'required'],
                'oc_middle_name' => ['label' => 'Middle Name', 'rules' => 'required'],
                'oc_surname' => ['label' => 'Surname', 'rules' => 'required'],
                'oc_email' => ['label' => 'Email', 'rules' => 'required|valid_email'],
                'oc_phone' => ['label' => 'Telephone Office', 'rules'=>'required'],
                'oc_mobile' => ['label' => 'Mobile Number', 'rules'=>'required'],
                'oc_dob' => ['label' => 'DoB', 'rules' => 'required'],
                'oc_age' => ['label' => 'Age', 'rules' => 'required|is_numeric'],
                'oc_profession' => ['label' => 'Profession', 'rules' => 'required'],
                'oc_industry' => ['label' => 'Industry', 'rules' => 'required'],
                'veh_usage'=> ['label' => 'Usage', 'rules' => 'required'],
                'oc_lic_type' => ['label' => 'Driver’s Licence Type', 'rules' => 'required'],
                'oc_lic_nat' => ['label' => 'Driver’s License Nationality', 'rules' => 'required'],
                'oc_date_lic' => ['label' => 'Driver’s Licence Issue Date', 'rules' => 'required'],
                'nb_veh' => ['label' => 'Number of vehicle', 'rules' => 'required'],
                'type_veh' => ['label' => 'Type of vehicle', 'rules' => 'required'],
                'veh_mfct' => ['label' => 'Vehicle Manufacturer', 'rules' => 'required'],
                'veh_model' => ['label' => 'Vehicle Model', 'rules' => 'required'],
                'veh_color' => ['label' => 'Vehicle Color', 'rules' => 'required'],
                'lic_plate' => ['label' => 'Licence Plate Number', 'rules' => 'required'],
                'chassis' => ['label' => 'Chassis Number', 'rules' => 'required'],
                'veh_fin' => ['label' => 'Vehicle Financed', 'rules' => 'required'],
                'oc_phys_add_one' => ['label' => 'Physical Address 1', 'rules' => 'required'],
                'oc_suburb' => ['label' => 'Suburb', 'rules' => 'required'],
                'oc_town' => ['label' => 'Town', 'rules' => 'required'],
                'oc_country' => ['label' => 'Country', 'rules' => 'required'],
                'oc_city' => ['label' => 'City', 'rules' => 'required'],
            ]);

            if ($this->validation->withRequest($this->request)->run()){

                $data = array(

                    'oc_title' => $this->request->getVar('oc_title'),
                    'oc_first_name' => $this->request->getVar('oc_first_name'),
                    'quotation_id' => md5($this->request->getVar('oc_first_name').date('d-Y-M : h:i')),
                    'oc_middle_name' => $this->request->getVar('oc_middle_name'),
                    'oc_surname' => $this->request->getVar('oc_surname'),
                    'oc_email' => $this->request->getVar('oc_email'),
                    'oc_phone' => $this->request->getVar('oc_phone'),
                    'oc_mobile' => $this->request->getVar('oc_mobile'),
                    'oc_dob' => $this->request->getVar('oc_dob'),
                    'oc_age' => $this->request->getVar('oc_age'),
                    'oc_profession' => $this->request->getVar('oc_profession'),
                    'oc_industry' => $this->request->getVar('oc_industry'),
                    'veh_usage'=> $this->request->getVar('veh_usage'),
                    'oc_lic_type' => $this->request->getVar('oc_lic_type'),
                    'oc_lic_nat' => $this->request->getVar('oc_lic_nat'),
                    'oc_date_lic' => $this->request->getVar('oc_date_lic'),
                    'nb_veh' => $this->request->getVar('nb_veh'),
                    'type_veh' => $this->request->getVar('type_veh'),
                    'veh_mfct' => $this->request->getVar('veh_mfct'),
                    'veh_model' => $this->request->getVar('veh_model'),
                    'veh_color' => $this->request->getVar('veh_color'),
                    'chassis' => $this->request->getVar('chassis'),
                    'lic_plate' => $this->request->getVar('lic_plate'),
                    'veh_fin' => $this->request->getVar('veh_fin'),
                    'oc_phys_add_one' => $this->request->getVar('oc_phys_add_one'),
                    'oc_phys_add_two' => $this->request->getVar('oc_phys_add_two'),
                    'oc_suburb' => $this->request->getVar('oc_suburb'),
                    'oc_town' => $this->request->getVar('oc_town'),
                    'oc_country' => $this->request->getVar('oc_country'),
                    'oc_city' => $this->request->getVar('oc_city'),
                    'oc_product' => $product->product_name,
                    'created_at'=> date('Y-m-d H:i:s'),
                    'oc_sector' => 'insurance'
                );

                session()->set('client_data', $data);
                return redirect()->to('quote/'. $slug);

            }else{
                $data['validation'] = $this->validation->getErrors();
                return view('quotations/car_insurance', $data);
            }
        }
        echo view('quotations/car_insurance', $data);
    }

    function applyInsurance()
    {
        $client_data = session()->get('client_data');
        if($client_data == null) {
            return redirect()->to('/');
        } 
        
        if($this->request->getMethod() == 'post'){

            $data  = [
                'org' => $this->request->getVar('org_name'),
                'org_email' => $this->request->getVar('org_email'),
                'created_at' => date('Y-m-d H:i:s'),
                'status' => 'pending',
            ];
            session()->push('client_data', $data);
            $donnees = session()->get('client_data');
            
            $this->mdb->create("rp_quotation", array($donnees));
            
            $this->sendToClient($client_data['oc_email'], $client_data['oc_product'], $client_data['oc_first_name']);
            $this->sendToAdmin('info@thepricebee.com', $client_data['oc_product'], $data['org'], $client_data['oc_first_name'], $client_data['oc_phone']); // The support email to be changed when online
            $this->sendToOrganisation($data['org_email'], $client_data['oc_product'],$data['org'],$client_data['oc_first_name'],$client_data['oc_phone'],$client_data['oc_email']); // The organisation mail

            session()->remove('client_data');
            session()->setTempdata('success', 'Your request has been successfully submitted');
            echo view('quotations/send_request',$data);
        }
        else{
            return redirect()->to(current_url())->with("error", "Error, couldn't submit the request. Please try again !");
        }
    }

    function dealing($key, $typekey)
    {
        if (!is_logged()) return redirect()->to('/login');
        $model = model(QuotationModel::class);
        $quote = $model->getQuote($key);

        $where = ['_id' => $quote->_id];
        $data = $this->mdb->getOne('rp_quotation', $where);
        if (!empty($data)) {

            if ($typekey == 'process') {
                $data = ['status' => 'processing'];
            } elseif ($typekey == 'done') {
                $data = ['status' => 'done'];
            }elseif ($typekey == 'cancel'){
                $data = ['status' => 'cancelled'];
            } else {
                die('Something went wrong...');
            }
            $this->mdb->updateOne('rp_quotation', $where, $data);

        } else {
            exit('An error occurs ...');
        }
        return redirect()->to('/profile');
    }

}