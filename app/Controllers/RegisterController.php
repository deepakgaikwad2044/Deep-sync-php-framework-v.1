<?php
namespace App\Controllers;
use App\Models\User;

class RegisterController {
  public function index(){
    view("auth.register");
  }
  
  public function register(){
    
  unset($_POST['submit']);
  $data = $_POST;
  
         if (strlen($data['password']) < 6) {
            $_SESSION["error"] = "Password must be at least 6 characters long.";
           $_SESSION["data"] = $data;
          
            redirect("/register");
            return;
        }
  $user = new User();
  $res = $user->register($data);
 exit();
  }
  
}
?>
