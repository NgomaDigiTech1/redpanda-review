<?php
//namespace App\Helpers;

if(!function_exists('is_logged')){

    function is_logged(){
        $data['user_data'] = session()->get('user_data');
        if ($data['user_data']==null){
            return false;
        }else {
            return true;
        }
    }
}

