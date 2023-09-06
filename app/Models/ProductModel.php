<?php

namespace App\Models;

use App\Libraries\DatabaseConnector;
use \MongoDB\BSON\ObjectId as ObjectId;

class ProductModel {
    private $collection;

    function __construct() {
        $connection = new DatabaseConnector();
        $database = $connection->getDatabase();
        $this->collection = $database->rp_products;
    }

    function getProducts() {
        try {
            $cursor = $this->collection->find([]);
            $products = $cursor->toArray();
            return $products;
        } catch(\MongoDB\Exception\RuntimeException $ex) {
            show_error('Error while fetching products: ' . $ex->getMessage(), 500);
        }
    }

    function getProduct($id) {
        try {
            $product = $this->collection->findOne(['_id' => new ObjectId($id)]);
            return $product;
        } catch(\MongoDB\Exception\RuntimeException $ex) {
            show_error('Error while fetching product with ID: ' . $id . $ex->getMessage(), 500);
        }
    }
    
    // function insertBook($title, $author, $pages) {
    //     try {
    //         $insertOneResult = $this->collection->insertOne([
    //             'title' => $title,
    //             'author' => $author,
    //             'pages' => $pages,
    //             'pagesRead' => 0,
    //         ]);

    //         if($insertOneResult->getInsertedCount() == 1) {
    //             return true;
    //         }

    //         return false;
    //     } catch(\MongoDB\Exception\RuntimeException $ex) {
    //         show_error('Error while creating a book: ' . $ex->getMessage(), 500);
    //     }
    // }

    // function updateBook($id, $title, $author, $pagesRead) {
    //     try {
    //         $result = $this->collection->updateOne(
    //             ['_id' => new \MongoDB\BSON\ObjectId($id)],
    //             ['$set' => [
    //                 'title' => $title,
    //                 'author' => $author,
    //                 'pagesRead' => $pagesRead,
    //             ]]
    //         );

    //         if($result->getModifiedCount()) {
    //             return true;
    //         }

    //         return false;
    //     } catch(\MongoDB\Exception\RuntimeException $ex) {
    //         show_error('Error while updating a book with ID: ' . $id . $ex->getMessage(), 500);
    //     }
    // }

    function updateStatus($id, $status){
        try {
                $result = $this->collection->updateOne(
                    ['_id' => new \MongoDB\BSON\ObjectId($id)],
                    ['$set' => [
                        'product_status' => $status,
                    ]]
                );    
                if($result->getModifiedCount()) {
                    return true;
                }    
                return false;
        } catch(\MongoDB\Exception\RuntimeException $ex) {
            show_error('Error while updating a product with ID: ' . $id . $ex->getMessage(), 500);
        }
    }
    function updateImage($id, $img){
        try {
                $result = $this->collection->updateOne(
                    ['_id' => new \MongoDB\BSON\ObjectId($id)],
                    ['$set' => [
                        'product_image' => $img,
                    ]]
                );    
                if($result->getModifiedCount()) {
                    return true;
                }    
                return false;
        } catch(\MongoDB\Exception\RuntimeException $ex) {
            show_error('Error while updating a product with ID: ' . $id . $ex->getMessage(), 500);
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
}