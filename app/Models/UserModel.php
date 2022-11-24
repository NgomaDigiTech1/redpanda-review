<?php

namespace App\Models;

use App\Libraries\DatabaseConnector;
use \MongoDB\BSON\ObjectId as ObjectId;
use App\CodeIgniter\Exception;

class UserModel
{
	private $collection;

	public function __construct (){
		$cnx = new DatabaseConnector();
		$db = $cnx->getDatabase();
		$this->collection = $db->rp_users;
	}

	function getUserById($id){
		try{
			$user = $this->collection->findOne(['_id' => new ObjectId($id)]);
			return $user;
		}catch(\Exception $e){
			exit('Error while fetching product with ID:' . $id . $e->getMessage());
		}
	}
	function deleteUser($id) {
        try {
            $result = $this->collection->deleteOne(['_id' => new ObjectId($id)]);
            if($result->getDeletedCount() == 1) {
                return true;
            }
            return false;
        } catch(\Exception $ex) {
            exit('Error while deleting a sector with ID: ' . $id . $ex->getMessage());
        }
    }

	function getWhere($wheres, $value = null){
		$this->collection->where(array('foo' => 'bar'))->otherFunction('foobar');
	}
}
