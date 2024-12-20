<?php
namespace App\Config;
use PDO;

class Database
{ 
  private $driver = "mysql";
  private $host = "localhost:3306";
  private $user = "root";
  private $pass = "root";
  private $dbname = "deep_sync_framework_db";
  public $conn;

  public function __construct()
  {
    $this->conn = null;
    try {
      $this->conn = new PDO(
        "$this->driver:host=$this->host; dbname=$this->dbname",
        $this->user,
        $this->pass
      );
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      echo "connection error:" . $e->getMessage();
    }
  }

  public function singleRecord($query, $param = [])
  {
    $sql = $query;
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
  }

  public function AllRecords($query, $orderby = [])
  {
    $sql = $query;
   

    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    
    $result = [];
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    unset($row['password']); // Remove the "password" key
    $result[] = $row; 
}
    return $result;
  }

  public function select($query)
  {
    try {
      $sql = $query;
      $stmt = $this->conn->prepare($sql);

      if ($stmt->execute()) {
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
      }
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
 
  }
  
 public function insert($query){
  try{
    $sql = $query;
    $stmt = $this->conn->prepare($sql);
    if($stmt->execute()){
      return true;
    }else{
      return false;
    }
  }catch(PDOException $e){
    echo $e->getMessage();
  }
  }
   

  public function update($query)
  {
    
    try{
    $sql = $query;
    $stmt = $this->conn->prepare($sql);
    if ($stmt->execute()) {
      return true;
    } else {
      return false;
    }
    }catch(PDOException $e){
      echo $e->getMessage();
    }
  }
  
  
   public function delete($query)
  {
    
    try{
    $sql = $query;
    $stmt = $this->conn->prepare($sql);
    if ($stmt->execute()) {
      return true;
    } else {
      return false;
    }
    }catch(PDOException $e){
      echo $e->getMessage();
    }
  }
  
}
?>
