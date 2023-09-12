<?php

namespace App\Controllers;

use App\Models\CommonModel;

use \CodeIgniter\Exceptions\PageNotFoundException;

use App\Helpers\Customer_Helper;

/**
 * User class
 */
class Users extends BaseController
{
    public $mdb;
    public $config;
    public $collection;
    public $validation;

    function __construct()
    {
        $this->mdb = new CommonModel();
        $this->collection = "rp_users";
        helper(['form', 'url','custom']);
        $this->validation = \Config\Services::validation();
    }

    /*
     * List Users
     */
    public function index()
    {
        if (!is_logged()) return redirect()->to('/login');

        $data['users'] = $this->mdb->getList($this->collection);
        echo view("users/index", $data);
    }

    public function create()
    {
        if (!is_logged()) return redirect()->to('/login');

        $data = [];
        $data['validation'] = null;
        if ($this->request->getMethod() == 'post') {
            $this->validation->setRules([
                'user_firstname' => ['label' => 'First Name', 'rules' => 'required'],
                'user_lastname' => ['label' => 'Last Name', 'rules' => 'required'],
                'user_email' => [
                    'label' => 'Email',
                    'rules' => 'required|valid_email|check_email',
                    'errors' => ['check_email' => 'Email address has been already used']
                ],
                'user_phone' => ['label' => 'Phone number', 'rules' => 'required'],
                'user_role' => ['label' => 'User role', 'rules' => 'required']
            ]);

            if ($this->validation->withRequest($this->request)->run()) {
                $token = md5(rand(100000, 999999));//Generate a token file
                $data = array(
                    'u_first_name' => $this->request->getVar('user_firstname'),
                    'u_last_name' => $this->request->getVar('user_lastname'),
                    'u_email' => $this->request->getVar('user_email'),
                    'u_phone' => $this->request->getVar('user_phone'),
                    'u_role' => $this->request->getVar('user_role'),
                    'u_photo' => 'user-default-avatar.png',
                    'u_status' => 1,
                    'u_created_at' => date("Y-m-d"),
                    'u_password' => password_hash(123456789, PASSWORD_BCRYPT),
                    'u_token' => $token
                );

                $this->mdb->create($this->collection, array($data));
                $session = session();
                $session->setFlashData("success", "Characteristics add Successfully");
                return redirect()->to('/users');

            } else {
                $data['validation'] = $this->validation->getErrors();
            }
        }
        $data['roles'] = $this->mdb->getList("rp_user_roles");
        echo view('users/admin/create', $data);
    }

    /*
     * Updates User Info and Add Organisations info
     */

    function update()
    {
        if (!is_logged()) return redirect()->to('/login');

        $session_data = session()->get('user_data');
        if (!empty($session_data)) {
            if ($this->request->getMethod() == 'post') {
                $where = ['_id' => $session_data->_id];
                $data = $_POST;
                if (!empty($data)) {
                    $this->mdb->updateOne($this->collection, $where, $data);

                    $data["sess_data"] = $this->mdb->getOne($this->collection, $where);
                    session()->set('user_data', $data["sess_data"]);
                    return redirect()->to("/profile");
                }
            }
        } else {
            return redirect()->to("/logout");
        }
    }


    function addImage()
    {
        if (!is_logged()) return redirect()->to('/login');

        $session_data = session()->get('user_data');
        $data[] = null;
        $where = ['_id' => $session_data->_id];

        $data['user'] = $this->mdb->getOne($this->collection, $where);

        if (!empty($data['user'])) {
            echo view('users/admin/add_img');

        } else {
            return PageNotFoundException::forPageNotFound();
        }
    }

    function saveImage()
    {
        if (!is_logged()) return redirect()->to('/login');

        $data[] = null;
        $session_data = session()->get('user_data');

        if ($this->request->getMethod() == 'post') {
            $rules = [
                'u_photo' =>
                    [
                        'label' => 'Image',
                        'rules' => 'uploaded[u_photo]|max_size[u_photo, 500]|is_image[u_photo]'
                    ]
            ];
            // echo '<pre>';
            // var_dump($session_data);
            // echo '<pre>';
            // die();
            if ($this->validate($rules)) {

                $path_user = './assets/rp_admin/images/user';
                $file = $this->request->getFile('u_photo');
                $imageName = $file->getRandomName();

                $tempfile = $file->getTempName();
                $oldfile = $session_data['u_photo'];


                if ($file->isValid() && !$file->hasMoved()) {

                    // Check if another user image file exists and then delete it
                    if(file_exists($path_user .'/'. $oldfile) && $oldfile !== null){
                        unlink($path_user .'/'. $oldfile);
                    }
                    
                    // resizing image
                    \Config\Services::image()->withFile($tempfile)
                        ->fit(80, 80, 'center')                        
                        ->save($path_user . '/' . $imageName);

                    // resizing image
                    // \Config\Services::image()->withFile($path . '/' . $imageName)
                    //     ->fit(80, 80, 'center')
                    //     ->save($path_user . '/' . $imageName);

                    $data = ['u_photo' => $imageName];

                    $where = ['_id' => $session_data->_id];
                    $this->mdb->updateOne($this->collection, $where, $data);

                    $data["sess_data"] = $this->mdb->getOne($this->collection, $where);
                    session()->set('user_data', $data["sess_data"]);
                    return redirect()->to('/profile');
                }
            } else {
                $data['validation'] = $this->validation->getErrors();
            }
        }
        echo view('users/admin/add_img', $data);

    }

    function deleteUser($segment) {
        $user_data = session()->get('user_data');
        if (!empty($segment)) {
            $model = model(UserModel::class);
            $prod_char_model = model(ProductCharactModel::class);
            $prod_char = $this->mdb->getList('rp_productCharacteristics', ['org_name'=>$user_data->org_name]);
            dd($prod_char);
            // $model->deleteUser($segment);
            session()->setFlashData("success", "User Successfully Deleted");
        }
        return redirect()->to('/users');
    }

}
