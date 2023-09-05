<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CommonModel;
use CodeIgniter\I18n\Time;

class Auth extends BaseController
{
    public $mdb;
    public $collection;
    public $validation;
    public $email;

    public function __construct()
    {
        $this->mdb = new CommonModel();
        $this->collection = 'rp_users';
        helper(['form','url','text','custom']);
        $this->validation = \Config\Services::validation();
        $this->email = \Config\Services::email();

    }
 
    public function index()
    {
        if(is_logged()){
            return redirect()->to('/profile');
        }
        else {
            $data = [];
            $data['validation'] = null;
            if ($this->request->getMethod() == 'post') {
                $this->validation->setRules([
                    'user_email' => ['label' => 'Email address', 'rules' => 'required|valid_email'],
                    'user_password' => ['label' => 'Password', 'rules' => 'required'],
                ]);

                if ($this->validation->withRequest($this->request)->run()) {
                    $session = session();
                    $data = ['u_email'=>$this->request->getVar("user_email")];
                    $data["sess_data"] = $this->mdb->getOne($this->collection, $data);

                    if (!empty($data["sess_data"])) {
                        if (password_verify($this->request->getVar('user_password'), $data["sess_data"]["u_password"])) {
                            $session->set('user_data', $data["sess_data"]);
                            return redirect()->to('/profile');
                        } else {
                            $session->setFlashData('error', "Invalid credentials, Please try again !");
                            echo view('pages/signin');
                        }
                    }else{
                        $session->setFlashData('error', "Invalid credentials, Please try again !");
                        echo view('pages/signin');
                    }

                } else {
                    $data['validation'] = $this->validation->getErrors();
                }
            }
            $data['title'] = "Red Panda prices | Signin";
            echo view('pages/signin', $data);
        }

    }

    function profile()
    {
        if (!is_logged()) return redirect()->to('/login');

        $data = [
            'user' => "",
            'quotes'=> $this->mdb->getList('rp_quotation'),
        ];
        echo view('users/admin/user_profile', $data);
    }
    function logout(){
        $session = session();
        $session->destroy();
       return redirect()->to(base_url());
    }
    function contact(){
       return view('pages/contact');
    }
    function reset(){
        if (!is_logged()) return redirect()->to('/login');

        $data['title'] = "Red Panda Prices | Reset";
        echo view ('pages/reset', $data);
    }

    function change(){
        if (!is_logged()) return redirect()->to('/login');

        if ($this->request->getMethod() == 'post'){

            $data = [];
            $user_data = session()->get('user_data');
            $data['u_password'] = $user_data['u_password'];

            $this->validation->setRules([
                'current_password' => [
                    'label' => 'Current Password',
                    'rules' => 'required',
                    ],
                'new_password' => ['label' => 'New Password', 'rules' => 'required|min_length[6]'],
                'conf_new_password' => ['label' => 'Confirm New Password', 'rules' => 'required|matches[new_password]'],
            ]);
            if ($this->validation->withRequest($this->request)->run()) {

                $curr_password = $this->request->getVar("current_password");

                $where = ['u_email' => $user_data['u_email']];

                if(password_verify($curr_password, $data['u_password'])){

                    $data = array(
                        'u_password' => password_hash($this->request->getVar('new_password'), PASSWORD_BCRYPT)
                    );
                    $this->mdb->updateOne($this->collection, $where, $data);
                    $session = session();

                    $session->setFlashData("success", "Password successfully changed !");

                    return redirect()->to('/profile');

                }else{
                    $data['validation'] = $this->validation->getErrors();
                    return view('pages/change',$data);
                }
            }else{
                $data['validation'] = $this->validation->getErrors();
                return view('pages/change',$data);
            }

        }
        $data['title'] = "Red Panda Prices | Change";
        echo view('pages/change', $data);

    }

     // Registering a new account by signing up

    public function signup()
    {
        if(is_logged()){
            return redirect()->to('/profile');
        } else{
            $data = [];
            $data['validation'] = null;

            if ($this->request->getMethod() == 'post') {
                $email = $this->request->getVar('user_email');
                $this->validation->setRules([

                    'u_first_name' => [
                        'label' => 'Name',
                        'rules' => 'required',
                    ],
                    'user_email' => [
                        'label' => 'Email',
                        'rules' => 'required|valid_email|check_email',
                        'errors' =>['check_email'=>'Email address has been already used']
                    ],
                    'user_password' => ['label' => 'Password', 'rules' => 'required|min_length[6]'],
                    'conf_password' => ['label' => 'Confirm Password', 'rules' => 'required|matches[user_password]'],
                ]);

                if ($this->validation->withRequest($this->request)->run()) {
                    $token = md5(rand(100000, 999999));//Generate a token file

                    $data = array(
                        'u_first_name'=>$this->request->getVar('u_first_name'),
                        'u_last_name'=>'',
                        'u_email' => $this->request->getVar('user_email'),
                        'u_created_at' => date("Y-m-d"),
                        'u_password' => password_hash($this->request->getVar('user_password'),PASSWORD_BCRYPT),
                        'u_role' => 'customer',
                        'u_token'=>$token
                    );

                    if(isset($_POST['u_checkbox'])) {
                        $this->validation->setRules([
                            'org_name' => [
                                'label' => 'Organisation Name',
                                'rules' => 'required',
                                'errors' => 'Since you\'re a Supplier, you must put the address of your Organisation',
                            ],
                            'org_adress' => [
                                'label' => 'Organisation address',
                                'rules' => 'required',
                                'errors' => 'Since you\'re a Supplier, you must fill the name of your Organisation',
                            ],
                        ]);

                        if ($this->validation->withRequest($this->request)->run()) {

                            $data['u_role'] = 'org manager';
                            $data['org_name'] = $this->request->getVar('org_name');
                            $data['org_adress'] = $this->request->getVar('org_adress');
                        }else{
                            $data['validation'] = $this->validation->getErrors();

                            return view('pages/signup', $data);
                        }
                    }
                    $this->mdb->create($this->collection, array($data));
                    /*Mail data*/
                    //$to = $this->request->getVar('user_email');
                    //$this->sendMailforSignup($to, $token);//Call to function for send email

                    $session = session();
                    $session->setFlashData("success", "We've sent you an email, please checkout your mailbox to confirm the account");
                    return redirect()->to('/signin');

                } else {
                    $data['validation'] = $this->validation->getErrors();
                    return view('pages/signup', $data);
                }
            }
            echo view('pages/signup', $data);
        }

    }


    function sendMailforSignup($to, $token){
        $subject= "Registration for Thepricebee prices";
        $this->email->setFrom('support@soril.org', 'Support Thepricebee');
        $this->email->setTo($to);
        $this->email->setSubject($subject);
        $this->email->setMessage($this->mailContentSignup($to,$token));
        if($this->email->send()){
            echo "success";
        }else {
           print_r($this->email->printDebugger($this->email->send()));
        }
    }
    function mailContentSignup($to, $token){
      $data = [
        'to' => $to,
        'token' => $token,
      ];
      return view('mails/signupmail', $data);
    }

    
}
 