<?php 

/**
 * Database Connection Class
 */
class DatabaseConnection
{

     /** Define Properties
      *  @var
     */
     private $host = "localhost";
     private $username = "israel";
     private $password = "password";
     private $database = "testecom";

     private $pdo;
 
    //  Set Data Source Name
     public function setDsn() {
          return "mysql:host=".$this->host.";dbname=".$this->database;
     }

     // Set PDO Attributes
     public function getAttributes() {
         return [
              PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
              PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
              PDO::ATTR_EMULATE_PREPARES => false
         ];
     }

     // Create New PDO Instance
     public function connect() {
        $dsn = $this->setDsn();
        $attributes = $this->getAttributes();

        try {
            $this->pdo = new PDO($dsn, $this->username, $this->password , $attributes);
        } catch (PDOException $e) {
              die("Connection Failed" . $e->getMessage());
        }
     }

    // Define Connection Getter
     public function getConnection()
     {
         return $this->pdo;
     }
}