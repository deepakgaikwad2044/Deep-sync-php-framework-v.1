<?php
namespace App\Models;
use PDO;

class User extends BaseModel
{
  private $table_name = "users";
  public $id;
  public $name;
  public $email;
  public $password;

  public function tableName()
  {
    return $this->table_name;
  }
  public function register($param)
  {
    try {
      $name = $param["name"];
      $email = $param["email"];
      $password = trim($param["password"]);

      if (!empty($name) && !empty($email) && !empty($password)) {
        $sql = "SELECT email FROM users WHERE email='$email' ";
        $smt = $this->conn->prepare($sql);
        $smt->execute();

        if ($smt->rowCount() > 0) {
          $_SESSION["error"] = "already exist";
          redirect("register");
        }

        $sql = "INSERT INTO $this->table_name (name, email, password) VALUES(:name, :email , :password)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":email", $email);

        $password = password_hash($password, PASSWORD_BCRYPT);

        $stmt->bindParam(":password", $password);

        if ($stmt->execute()) {
          $_SESSION["success"] = "you registration  successfully completed  ";
      
    $record = $this->singleRecord("SELECT  id FROM users WHERE email = '{$email}' ");
    
    $id = $record['id'];
  
         $_SESSION["user_id"] = $id;  
          redirect("dashboard");
        } else {
          $_SESSION["error"] = "unable to register  ";
          redirect("register");
        }
      } else {
        $_SESSION["error"] = "**all fields are required ";
        redirect("register");
      }
    } catch (PDOException $e) {
      $err = $e->getMessage();
      $_SESSION["error"] = $err;
      redirect("register");
    }
  }

  public function login($param)
  { 
    
    try {
      $email = trim($param["email"]); // Trim inputs
      $password = trim($param["password"]); // Trim inputs

      $sql = "SELECT * FROM $this->table_name WHERE email=:email";
      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(":email", $email);
      $stmt->execute();

      $record = $stmt->fetch(PDO::FETCH_ASSOC);
 
      if ($record) {
        
        $account_status = $record['account_status'];
        
         $name = $record['name'];
       
        $pass_check = password_verify($password, $record["password"]);
        if ($pass_check) {
          $_SESSION["user_id"] = $record["id"];
          redirect("dashboard");
          
        } else {
          $_SESSION["error"] = "Incorrect password";
         $_SESSION['email'] = $email;
          redirect("login");
        }
       
      } else  {
        $_SESSION["error"] = "No such user found";
        unset($_SESSION["email"]);
        redirect("login");
        exit;
      }
   
    } catch (PDOException $e) {
      $_SESSION["error"] = $e->getMessage();
      redirect("login");
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

}

?>
