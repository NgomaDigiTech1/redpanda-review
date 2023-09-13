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

if(!function_exists('checkProducts')){
    function checkProduct($slug = null){
        $product = (model(ProductModel::class))->getProductBySlug($slug);
        if ($product) {
            return true;                
        } else {
            return false;
        }
    }
}

