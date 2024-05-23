<?php

class DatabaseConnection {
    private static $instance = null;
    private $conn;
  
    private function __construct($server, $username, $password, $database) {
      $this->conn = mysqli_connect($server, $username, $password, $database);
  
      if (!$this->conn) {
        throw new Exception("Connection failed: " . mysqli_connect_error());
      }
    }
  
    public static function getInstance($server, $username, $password, $database) {
      if (self::$instance === null) {
        self::$instance = new self($server, $username, $password, $database);
      }
  
      return self::$instance;
    }
  
    public function getConnection() {
      return $this->conn;
    }
    public function closeConnection(){
        mysqli_close($this->conn);
    }

}  

$instance=DatabaseConnection::getInstance("localhost","root","","php");
$connect=$instance->getConnection();
?>