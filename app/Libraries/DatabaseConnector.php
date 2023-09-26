<?php
 
namespace App\Libraries;
use \Config\MongoDBConfig;
use MongoDB\Client as Client;

class DatabaseConnector {
    private $client;
    private $database;

    function __construct() {

        $this->mongoConnectionInfos = new MongoDBConfig();
              
        if(getenv('CI_ENVIRONMENT') == 'production') {
            /** This is for local manage */
            $uri = getenv('ATL_URI');
            $database = getenv('ATL_DB');
        } else {

            $uri = new Client("mongodb://{$this->mongoConnectionInfos->hostname}:{$this->mongoConnectionInfos->port}/{$this->mongoConnectionInfos->db}",
                                ["authMechanism" => "SCRAM-SHA-256",
                                    'username' => $this->mongoConnectionInfos->username,
                                    'password' => $this->mongoConnectionInfos->password
                                ]
                            );
            $database = $this->mongoConnectionInfos->db;
        }     

        if (empty($uri) || empty($database)) {
            show_error('You need to declare ATLAS_URI and DATABASE in your .env file!');
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