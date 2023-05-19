<?php

class Database 
{
    private $dbhost = "localhost";
    private $dbuser = "root";
    private $dbpass = "";
    private $dbName = "usermanagement";

    protected $conn;

    public function __construct(){
        try{
        $dns = "mysql:host={$this->dbhost};dbname={$this->dbName}";
        
        $option = array(PDO::ATTR_PERSISTENT); // this is for connect the database for long time

        $this->conn = new PDO($dns, $this->dbuser, $this->dbpass, $option);

 
        }catch(PDOException $e){
            echo "Error ". $e->getMessage();
        }

    }
}