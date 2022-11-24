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
                            $session->setFlashData('error', "Email or password incorrect, please try again");
                            echo view('pages/signin');
                        }
                    }else{
                        $session->setFlashData('error', "Email or password incorrect, please try again");
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
        $subject= "Registration for Repanda prices";
        $content = "We send you this email to register on redpanda prices, Please click on the button to confirm your account.";
        $this->email->setFrom('support@soril.org', 'Support Redpanda');
        $this->email->setTo($to);
        $this->email->setSubject($subject);
        $this->email->setMessage($this->mailContent($to,$content,$token));
        if($this->email->send()){
            echo "success";
        }else {
           print_r($this->email->printDebugger($this->email->send()));
        }
    }
    function mailContent($to, $content, $token){
    $text = '
    <!doctype html>
    <html>
      <head>
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Red panda prices, Register</title>
    <style>
    /* -------------------------------------
        RESPONSIVE AND MOBILE FRIENDLY STYLES
    ------------------------------------- */
    @media only screen and (max-width: 620px) {
      table[class=body] h1 {
        font-size: 28px !important;
        margin-bottom: 10px !important;
      }
      table[class=body] p,
            table[class=body] ul,
            table[class=body] ol,
            table[class=body] td,
            table[class=body] span,
            table[class=body] a {
        font-size: 16px !important;
      }
      table[class=body] .wrapper,
            table[class=body] .article {
        padding: 10px !important;
      }
      table[class=body] .content {
        padding: 0 !important;
      }
      table[class=body] .container {
        padding: 0 !important;
        width: 100% !important;
      }
      table[class=body] .main {
        border-left-width: 0 !important;
        border-radius: 0 !important;
        border-right-width: 0 !important;
      }
      table[class=body] .btn table {
        width: 100% !important;
      }
      table[class=body] .btn a {
        width: 100% !important;
      }
      table[class=body] .img-responsive {
        height: auto !important;
        max-width: 100% !important;
        width: auto !important;
      }
    }
    /* -------------------------------------
        PRESERVE THESE STYLES IN THE HEAD
    ------------------------------------- */
    @media all {
      .ExternalClass {
        width: 100%;
      }
      .ExternalClass,
            .ExternalClass p,
            .ExternalClass span,
            .ExternalClass font,
            .ExternalClass td,
            .ExternalClass div {
        line-height: 100%;
      }
      .apple-link a {
        color: inherit !important;
        font-family: inherit !important;
        font-size: inherit !important;
        font-weight: inherit !important;
        line-height: inherit !important;
        text-decoration: none !important;
      }
      #MessageViewBody a {
        color: inherit;
        text-decoration: none;
        font-size: inherit;
        font-family: inherit;
        font-weight: inherit;
        line-height: inherit;
      }
      .btn-primary table td:hover {
        background-color: #34495e !important;
      }
      .btn-primary a:hover {
        background-color: #34495e !important;
        border-color: #34495e !important;
      }
    }
    </style>
  </head>
  <body class="" style="background-color: #f6f6f6; font-family: sans-serif; -webkit-font-smoothing: antialiased; font-size: 14px; line-height: 1.4; margin: 0; padding: 0; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;">
    <span class="preheader" style="color: transparent; display: none; height: 0; max-height: 0; max-width: 0; opacity: 0; overflow: hidden; mso-hide: all; visibility: hidden; width: 0;">This is preheader text. Some clients will show this text as a preview.</span>
    <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="body" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; background-color: #f6f6f6;">
      <tr>
        <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">&nbsp;</td>
        <td class="container" style="font-family: sans-serif; font-size: 14px; vertical-align: top; display: block; Margin: 0 auto; max-width: 580px; padding: 10px; width: 580px;">
          <div class="content" style="box-sizing: border-box; display: block; Margin: 0 auto; max-width: 580px; padding: 10px;">

            <!-- START CENTERED WHITE CONTAINER -->
            <table role="presentation" class="main" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; background: #ffffff; border-radius: 3px;">

              <!-- START MAIN CONTENT AREA -->
              <tr>
                <td class="wrapper" style="font-family: sans-serif; font-size: 14px; vertical-align: top; box-sizing: border-box; padding: 20px;">
                  <table role="presentation" border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;">
                    <tr>
                      <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Hi '.$to.',</p>
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">'.$content.'</p>
                        <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="btn btn-primary" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; box-sizing: border-box;">
                          <tbody>
                            <tr>
                              <td align="left" style="font-family: sans-serif; font-size: 14px; vertical-align: top; padding-bottom: 15px;">
                                <table role="presentation" border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: auto;">
                                  <tbody>
                                    <tr>
                                      <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; background-color: #3498db; border-radius: 5px; text-align: center;"> <a href="'.base_url('auth/confirm/'.$token).'" target="_blank" style="display: inline-block; color: #ffffff; background-color: #3498db; border: solid 1px #3498db; border-radius: 5px; box-sizing: border-box; cursor: pointer; text-decoration: none; font-size: 14px; font-weight: bold; margin: 0; padding: 12px 25px; text-transform: capitalize; border-color: #3498db;">Confirm account</a> </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">We thank you for the trust and invite you to discover several things on our platform.</p>
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Good luck! Hope it works.</p>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
            <!-- END MAIN CONTENT AREA -->
            </table>
            <!-- START FOOTER -->
            <div class="footer" style="clear: both; Margin-top: 10px; text-align: center; width: 100%;">
              <table role="presentation" border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;">
                <tr>
                  <td class="content-block" style="font-family: sans-serif; vertical-align: top; padding-bottom: 10px; padding-top: 10px; font-size: 12px; color: #999999; text-align: center;">
                    <span class="apple-link" style="color: #999999; font-size: 12px; text-align: center;">NgomaDigitech Inc, 3 Kasongo Nyembo Road, Lubumbashi DRC</span>
                    <br> Visit our Web Site <a href="http://www.redpandaprices.com" style="text-decoration: underline; color: #999999; font-size: 12px; text-align: center;">Red Panda Prices</a>.
                  </td>
                </tr>
                <tr>
                  <td class="content-block powered-by" style="font-family: sans-serif; vertical-align: top; padding-bottom: 10px; padding-top: 10px; font-size: 12px; color: #999999; text-align: center;">
                    Powered by <a href="http://htmlemail.io" style="color: #999999; font-size: 12px; text-align: center; text-decoration: none;">HTMLemail</a>.
                  </td>
                </tr>
              </table>
            </div>
            <!-- END FOOTER -->
          <!-- END CENTERED WHITE CONTAINER -->
          </div>
        </td>
        <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">&nbsp;</td>
      </tr>
    </table>
  </body>
</html>';
        return $text;

    }

    
}
 