<?php
 
namespace App\Libraries;

use MongoDB\Client as Client;
use MongoDB\Driver\ServerApi;

class DatabaseConnector {
    private $client;
    private $database;

    function __construct() {
              
        $user = getenv('ATL_USER');
        $pwd = getenv('ATL_PWD');

        $uri = "mongodb+srv://{$user}:{$pwd}@redpandaprices.zfn8e.mongodb.net/?retryWrites=true&w=majority";
        
        // Specify Stable API version 1
        $apiVersion = new ServerApi(ServerApi::V1);

        // Create a new client and connect to the server
        $this->client = new Client($uri, [], ['serverApi' => $apiVersion]);

        $database = getenv('ATL_DB');
       
        if (empty($uri) || empty($database)) {
            die('You need to declare ATLAS_URI and DATABASE in your .env file!');
        }

        try {
            $this->client = new Client($uri);
        } catch(MongoDB\Driver\Exception\MongoConnectionException $ex) {
            show_error('Couldn\'t connect to database: ' . $ex->getMessage(), 500);
        }

        try {
            $this->database = $this->client->selectDatabase($database);
        } catch(MongoDB\Driver\Exception\RuntimeException $ex) {
            show_error('Error while fetching database with name: ' . $database . $ex->getMessage(), 500);
        }
    }

    function getDatabase() {
        return $this->database;
    }
}