<?php

//Singleton to connect db.
class conn {
  // Hold the class instance.
  private static $instance = null;
  private $con;
  
  private $host = 'localhost';
  private $user = 'root';
  private $password = '';
  private $db = 'learn_centric';
   
  // The db connection is established in the private constructor.
  private function __construct()
  {
    $this->con = new mysqli($this->host,$this->user,$this->password,$this->db);
    if ($this->con->connect_error) {
        die("Connection failed: " . $this->con->connect_error);
    }
  }
  
  public static function getInstance()
  {
    if(!self::$instance)
    {
      self::$instance = new conn();
    }
   
    return self::$instance;
  }
  
  public function getConnection()
  {
    return $this->con;
  }
}
?>