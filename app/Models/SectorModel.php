<?php

namespace App\Models;

use App\Libraries\DatabaseConnector;
use \MongoDB\BSON\ObjectId as ObjectId;

class SectorModel {
    private $collection;
    function __construct() {
        $connection = new DatabaseConnector();
        $database = $connection->getDatabase();
        $this->collection = $database->rp_product_sectors;
    }

    function getSectors() {
        try {
            $cursor = $this->collection->find([]);
            $sectors = $cursor->toArray();
            return $sectors;
        } catch(\MongoDB\Exception\RuntimeException $ex) {
            show_error('Error while fetching sectors: ' . $ex->getMessage(), 500);
        }
    }
    function getEnabledSectors() {
        $cursor = $this->collection->find([ "sector_status" => "enabled"]);
        return$cursor->toArray();
    }

    function getSector($id) {
        try {
            $sector = $this->collection->findOne(['_id' => new ObjectId($id)]);
            return $sector;
        } catch(\MongoDB\Exception\RuntimeException $ex) {
            show_error('Error while fetching sector with ID: ' . $id . $ex->getMessage(), 500);
        }
    }    
    function getSectorBySlug($slug) {
        try {
            $sector = $this->collection->findOne(['sector_slug' => $slug]);
            return $sector;
        } catch(\MongoDB\Exception\RuntimeException $ex) {
            die("Couldn't find any sector with that slug");
            // show_error('Error while fetching sector with Slug: ' . $slug . $ex->getMessage(), 500);
        }
    }    

    function deleteSector($id) {
        try {
            $result = $this->collection->deleteOne(['_id' => new ObjectId($id)]);

            if($result->getDeletedCount() == 1) {
                return true;
            }
            return false;
        } catch(\MongoDB\Exception\RuntimeException $ex) {
            show_error('Error while deleting a sector with ID: ' . $id . $ex->getMessage(), 500);
        }
    }
    function updateImage($id, $img){
        try {
                $result = $this->collection->updateOne(
                    ['_id' => new \MongoDB\BSON\ObjectId($id)],
                    ['$set' => [
                        'sector_image' => $img,
                    ]]
                );    
                if($result->getModifiedCount()) {
                    return true;
                }    
                return false;
        } catch(\MongoDB\Exception\RuntimeException $ex) {
            show_error('Error while updating a sector with ID: ' . $id . $ex->getMessage(), 500);
        }
    }
}