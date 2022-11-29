<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\CommonModel;

use \Config\Services;



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
        $data['title'] = "Red Panda Prices | Quotations";

        $data['products'] =  $this->mdb->getList($this->collection);

        echo view('quotations/quotation', $data);
	}


    function sendToAdmin($to, $prod, $org, $client, $phone){
        $body = "
         <p>Hi Red Panda ! </p>
         <p>A request of quote on Red Panda has been submitted for <strong> $prod </strong></p>
      
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
         <span>From Red Panda Prices !</span>     
        ";

        $this->email->setFrom('infos@redpanda-prices.com', 'A request on Red Panda System');

        $this->email->setTo($to);

        $this->email->setSubject("A request has been submitted on Red Panda System");

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
         <p>You've received a request of quote on Red Panda Prices for <strong> $prod</strong> by</p>
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
         <span>From Red Panda Prices !</span>     
        ";

        $this->email->setFrom('infos@redpanda-prices.com', 'Request on Red Panda Prices');

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
         <p>You've made a request of quote on Red Panda System for <strong>$product</strong></p>
         <p>We'll contact you soon ...</p> 
         <span>Thank you for choosing Red Panda Prices !</span>     
        ";

        $this->email->setFrom('infos@redpanda-prices.com', 'Your request of quote on Red Panda');

        $this->email->setTo($to);

        $this->email->setSubject("Your request of quote on Red Panda");

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
    function testing(){
        $data = $_POST;
        foreach($data as $key => $val){
            echo "<pre>";
            print_r($val);
        }
    }
    function mailing(){

        $this->email->setFrom('infos@repanda-prices.com', 'Request on Red Panda Prices');

        $this->email->setTo("archangechef@gmail.com");

        $this->email->setSubject("A request of quote has been sent to you");

        //$this->email->setMessage($this->mailOrganisationContent($to, $data));

        $this->email->setMessage("Ceci est un test juste pour savoir que tout va bien");

        if ($this->email->send()) {

            //session()->setTempdata('success', 'Your request has been submitted successfully');
            echo  "success";

        } else {
            print_r($this->email->printDebugger($this->email->send()));
            // return true;
        }
    }
    function applyNow()
    {
        $data = [];
        $client_data = session()->get('client_data');
        die();
        if($this->request->getMethod() == 'post'){

            $data  = [
                'org' => $this->request->getVar('org_name'),
                'org_email' => $this->request->getVar('org_email'),
                'created_at' => date('Y-m-d H:i:s'),
                'oc_first_name' => $client_data['oc_first_name'],
                'oc_email' => $client_data['oc_email'],
                'product_image' => $this->request->getVar('product_image'),
                'prod_sect' => $this->request->getVar('prod_sect'),
                'oc_phone' => $client_data['oc_phone'],
                'oc_product' => $client_data['oc_product'],
                'quotation_id' =>$client_data['quotation_id'],
                'status' => 'pending',
            ];

            $this->mdb->create("rp_quotation", array($data));

            $this->sendToClient($client_data['oc_email'], $data['oc_product'], $data['oc_first_name']);
            $this->sendToAdmin('archangechef@gmail.com', $data['oc_product'], $data['org'], $data['oc_first_name'], $data['oc_phone']); // The support email to be changed when online
            $this->sendToOrganisation($data['org_email'], $data['oc_product'],$data['org'],$data['oc_first_name'],$data['oc_phone'],$data['oc_email']); // The organisation mail

            session()->setTempdata('success', 'Your request has been submitted successfully', 6);
            session()->set('client_data', null);

            echo view('quotations/send_request',$data);

        }
        else{

            session()->setTempdata("error", "Error, couldn't submit the request. Please try again !");
            redirect($_SERVER['HTTP_REFERER']);
        }

    }
    

    function applyHome($product_name = null)
    {
        $data = [];

        $client_data = session()->get('client_data');

        if($this->request->getMethod() == 'post'){

            $data  = [
                'org' => $this->request->getVar('org_name'),
                'org_email' => $this->request->getVar('org_email'),
                'created_at' => date('Y-m-d H:i:s'),
                'oc_first_name' => $client_data['oc_first_name'],
                'oc_email' => $client_data['oc_email'],
                'product_image' => $this->request->getVar('product_image'),
                'prod_sect' => $this->request->getVar('prod_sect'),
                'oc_phone' => $client_data['oc_phone'],
                'oc_product' => $client_data['oc_product'],
                'quotation_id' =>$client_data['quotation_id'],
                'oc_title' => $client_data['oc_title'],
                'oc_middle_name' => $client_data['oc_middle_name'],
                'oc_surname' => $client_data['oc_surname'],
                'oc_mobile' => $client_data['oc_mobile'],
                'oc_dob' => $client_data['oc_dob'],
                'oc_age' => $client_data['oc_age'],
                'oc_type_accom' => $client_data['oc_type_accom'],
                'oc_rooms' => $client_data['oc_rooms'],
                'oc_usage'=> $client_data['oc_usage'],
                'oc_category' => $client_data['oc_category'],
                'oc_period' => $client_data['oc_period'],
                'oc_adults' => $client_data['oc_adults'],
                'oc_children' => $client_data['oc_children'],
                'oc_phys_add_one' => $client_data['oc_phys_add_one'],
                'oc_phys_add_two' => $client_data['oc_phys_add_two'],
                'oc_suburb' => $client_data['oc_suburb'],
                'oc_town' => $client_data['oc_town'],
                'oc_country' => $client_data['oc_country'],
                'oc_city' => $client_data['oc_city'],
                'status' => 'pending',
            ];

            $this->mdb->create("rp_quotation", array($data));

            $this->sendToClient($client_data['oc_email'], $data['oc_product'], $data['oc_first_name']);
            $this->sendToAdmin('archangechef@gmail.com', $data['oc_product'], $data['org'], $data['oc_first_name'], $data['oc_phone']); // The support email to be changed when online
            $this->sendToOrganisation($data['org_email'], $data['oc_product'],$data['org'],$data['oc_first_name'],$data['oc_phone'],$data['oc_email']); // The organisation mail

            session()->setTempdata('success', 'Your request has been submitted successfully');
            session()->set('client_data', null);

            echo view('quotations/send_request',$data);

        }
        else{

            session()->setTempdata("error", "Error, couldn't submit the request. Please try again !");
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    function quote($segment = null, $name = null)
    {
        $client_data = session()->get('client_data');
        $charact = model(ProductCharactModel::class);
        $produit = (model(ProductModel::class))->getProduct($segment);       
        $data = [
            'title' => $produit->product_name,
            'products' => $charact->getSectorProducts($segment),
            'client_data' => $client_data,
        ];
        if(!empty($client_data)){
            echo view('quotations/quote', $data);
        }else {
            return redirect()->to('/');
        }
    }
    function quoteInsurance($product_name = null)
    {
        $client_data = session()->get('client_data');
        $data = [
            'title' => $product_name,
            'products' => $this->mdb->getList($this->collection, ['product_name' => $product_name]),
            'client_data' => $client_data,
        ];

        echo view('quotations/quote_insurance', $data);
    }

    function requesting(){

        $key = $this->request->getVar('prod_id');
        $produit = (model(ProductModel::class))->getProduct($key);

        if ($this->request->getMethod() == 'post'){
            $this->validation->setRules([

                'cl_name'  => ['label' => 'Client Name', 'rules' => 'required|min_length[3]'],
                'cl_email' => ['label' => 'Email','rules' => 'required|valid_email'],
                'cl_phone' => ['label' => 'Phone', 'rules' => 'required'],
            ]);

            if($this->validation->withRequest($this->request)->run()){
                $data = array(
                    'cl_name' => $this->request->getVar('cl_name'),
                    'cl_email' => $this->request->getVar('cl_email'),
                    'cl_phone' => $this->request->getVar('cl_phone'),
                    'product_id' => $this->request->getVar('product_id'),
                );

                session()->set('client_data', $data);
                return redirect()->to(base_url().'/quotations/quote/'.$key. '/'.$produit->product_name);

            }else{
                $data = [
                    'validation'=> $this->validation->getErrors(),
                    'title'=>$this->request->getVar('title'),
                ] ;
                echo view('quotations/request', $data);
            }
        }
    }

    function loadRequest($key= null,$name = null)
    {
        $data = [];

        $data = [
            'title' => $name,
            'key' => $key,
        ];

        // if ($this->request->getMethod() == 'post'){

        //     $this->validation->setRules([

        //         'oc_first_name'  => ['label' => 'Client Name', 'rules' => 'required|min_length[3]'],
        //         'oc_email' => ['label' => 'Email','rules' => 'required|valid_email'],
        //         'oc_phone' => ['label' => 'Telephone', 'rules' => 'required'],
        //     ]);

        //     if($this->validation->withRequest($this->request)->run()){
        //         $data = array(
        //             'oc_first_name' => $this->request->getVar('oc_first_name'),
        //             'oc_email' => $this->request->getVar('oc_email'),
        //             'oc_phone' => $this->request->getVar('oc_phone'),
        //             'oc_product' => $this->request->getVar('prod_name'),
        //             'created_at'=> date('Y-m-d H:i:s'),
        //         );

        //         session()->set('client_data', $data);
        //         echo "<pre>";
        //         var_dump($key);
        //         die();
        //         return $this->quote($key);
        //         // return redirect()->to(site_url().'quotations/quote/'.$this->request->getVar('prod_name'));

        //     }else{
        //         $data['validation'] = $this->validation->getErrors();
        //     }
        // }

        echo view('quotations/request', $data);
    }

    function loadHome($product_name = null)
    {

        $data = [
            'title' => $product_name,
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
                    'oc_product' => $this->request->getVar('prod_name'),
                    'created_at'=> date('Y-m-d H:i:s'),
 
                );

                $session = session();

                $session->set('client_data', $data);

                return redirect()->to(site_url().'quotations/quoteInsurance/'.$this->request->getVar('prod_name'));

            }else{
                $data['validation'] = $this->validation->getErrors();
                return view('quotations/home_insurance', $data);
            }
        }

        echo view('quotations/home_insurance', $data);
    }
    function loadCar($product_name = null)
    {
        $data = [];

        $data = [
            'title' => $product_name,
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
                    'oc_product' => $this->request->getVar('prod_name'),
                    'created_at'=> date('Y-m-d H:i:s'),

                );

                $session = session();
                //$session->setTempdata("success", "Quotation submitted successfully !",5);

                $session->set('client_data', $data);

                return redirect()->to(site_url().'quotations/quoteInsurance/'.$this->request->getVar('prod_name'));

            }else{
                $data['validation'] = $this->validation->getErrors();
                return view('quotations/car_insurance', $data);
            }
        }
        echo view('quotations/car_insurance', $data);
    }

    function applyCar($product_name = null)
    {
        $data = [];

        $client_data = session()->get('client_data');

        //To be filled with $data_client
        if($this->request->getMethod() == 'post'){

            $data  = [

                'org' => $this->request->getVar('org_name'),
                'org_email' => $this->request->getVar('org_email'),
                'created_at' => date('Y-m-d H:i:s'),
                'oc_first_name' => $client_data['oc_first_name'],
                'oc_email' => $client_data['oc_email'],
                'product_image' => $this->request->getVar('product_image'),
                'prod_sect' => $this->request->getVar('prod_sect'),
                'oc_phone' => $client_data['oc_phone'],
                'oc_product' => $client_data['oc_product'],
                'quotation_id' =>$client_data['quotation_id'],
                'oc_title' => $client_data['oc_title'],
                'oc_middle_name' => $client_data['oc_middle_name'],
                'oc_surname' => $client_data['oc_surname'],
                'oc_mobile' => $client_data['oc_mobile'],
                'oc_dob' => $client_data['oc_dob'],
                'oc_age' => $client_data['oc_age'],
                'oc_profession' => $client_data['oc_profession'],
                'oc_industry' => $client_data['oc_industry'],
                'veh_usage'=> $client_data['veh_usage'],
                'oc_lic_type' => $client_data['oc_lic_type'],
                'oc_lic_nat' => $client_data['oc_lic_nat'],
                'oc_date_lic' => $client_data['oc_date_lic'],
                'nb_veh' => $client_data['nb_veh'],
                'type_veh' => $client_data['type_veh'],
                'veh_mfct' => $client_data['veh_mfct'],
                'veh_model' => $client_data['veh_model'],
                'veh_color' => $client_data['veh_color'],
                'chassis' => $client_data['chassis'],
                'lic_plate' => $client_data['lic_plate'],
                'veh_fin' => $client_data['veh_fin'],
                'oc_phys_add_one' => $client_data['oc_phys_add_one'],
                'oc_phys_add_two' => $client_data['oc_phys_add_two'],
                'oc_suburb' => $client_data['oc_suburb'],
                'oc_town' => $client_data['oc_town'],
                'oc_country' => $client_data['oc_country'],
                'oc_city' => $client_data['oc_city'],
                'status' => 'pending',
            ];

            $this->mdb->create("rp_quotation", array($data));

            $this->sendToClient($client_data['oc_email'], $data['oc_product'], $data['oc_first_name']);
            $this->sendToAdmin('archangechef@gmail.com', $data['oc_product'], $data['org'], $data['oc_first_name'], $data['oc_phone']); // The support email to be changed when online
            $this->sendToOrganisation($data['org_email'], $data['oc_product'],$data['org'],$data['oc_first_name'],$data['oc_phone'],$data['oc_email']); // The organisation mail

            session()->set('client_data', null);

            echo view('quotations/send_request',$data);

        }
        else{

            session()->setTempdata("error", "Error, couldn't submit the request. Please try again !");
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    function dealing($key, $typekey)
    {
        if (!is_logged()) return redirect()->to('/login');

        $where = ['quotation_id' => $key];
        $data = $this->mdb->getOne('rp_quotation', $where);
        if (!empty($data)) {

            if ($typekey == 'process') {
                $data = ['status' => 'processing'];
            } elseif ($typekey == 'done') {
                $data = ['status' => 'done'];
            }elseif ($typekey == 'cancel'){
                $data = ['status' => 'cancelled'];
            } else {
                return PageNotFoundException::forPageNotFound();
            }

            $this->mdb->updateOne('rp_quotation', $where, $data);


        } else {
            return PageNotFoundException::forPageNotFound();
        }
        return redirect()->to('/profile');

    }

}
