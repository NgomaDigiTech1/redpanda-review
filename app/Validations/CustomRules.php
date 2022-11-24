<?php
namespace App\Validations;
use App\Models\CommonModel;

class CustomRules{
    private $mdb;
    function __construct()
    {
        $this->mdb = new CommonModel();
    }

    function check_email(string $str, string &$error = null) : bool {
        $where = ['u_email'=>$str];
        $data = $this->mdb->getOne('rp_users', $where);
        if (!empty($data)){
            return false;
        }else {
            return true;
        }
    }

}

  