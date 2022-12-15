<?php

namespace App\Models;

use App\Libraries\DatabaseConnector;

class ProductCharactModel {
    private $collection;

    function __construct() {
        $connection = new DatabaseConnector();
        $database = $connection->getDatabase();
        $this->collection = $database->rp_productCharacteristics;
    }

    function getProducts() {
        try {
            $cursor = $this->collection->find([]);
            $products = $cursor->toArray();
            return $products;
        } catch(\Exception $ex) {
            exit('Error while fetching products: ' . $ex->getMessage());
        }
    }

    function getProduct($id) {
        try {
            $product = $this->collection->findOne(['_id' => new \MongoDB\BSON\ObjectId($id)]);
            return $product;
        } catch(\MongoDB\Exception\RuntimeException $ex) {
            show_error('Error while fetching product with ID: ' . $id . $ex->getMessage(), 500);
        }
    }   
    function getOwnProducts($id, $user) {
        try {
            $products = $this->collection->findOne(
                [
                    'product_id' => new \MongoDB\BSON\ObjectId($id),
                    'org_id' => new \MongoDB\BSON\ObjectId($user)
                ]
            );
            return $products;
        } catch(\MongoDB\Exception\RuntimeException $ex) {
            show_error('Error while fetching product with ID: ' . $id . $ex->getMessage(), 500);
        }
    }   

    function getSectorProducts($id) {  
        try {
            $cursor = $this->collection->find([
                'product_id' => new \MongoDB\BSON\ObjectId($id),
            ]);
            $products = $cursor->toArray();
            return $products;
        } catch(\Exception $ex) {
            exit('Error while fetching products: ' . $ex->getMessage());
        }   
                
    }

    function deleteProduct($id) {
        try {
            $result = $this->collection->deleteOne(['_id' => new \MongoDB\BSON\ObjectId($id)]);

            if($result->getDeletedCount() == 1) {
                return true;
            }
            return false;
        } catch(\MongoDB\Exception\RuntimeException $ex) {
            show_error('Error while deleting a product with ID: ' . $id . $ex->getMessage(), 500);
        }
    }
    function deleteProdCharact($id){
        try {
            $result = $this->collection->deleteMany(['product_id' => new \MongoDB\BSON\ObjectId($id)]);

            if($result->getDeletedCount() >= 1) {
                return true;
            }
            return false;
        } catch(\MongoDB\Exception\RuntimeException $ex) {
            show_error('Error while deleting a product with ID: ' . $id . $ex->getMessage(), 500);
        }
    }
}