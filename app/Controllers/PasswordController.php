<?php
namespace App\Controllers;
use App\Models\User;

// Import the Auth class
use App\Config\Auth;

class PasswordController {
  

   public function index(){
      return view("auth.password");
    }
    
    public function passwordVerify(){
     
      $cur_pass = trim($_POST['cpass']);

      $auth_id  = Auth::id();
      $user = new User();
      $res = $user->singleRecord("SELECT * FROM users Where id = '{$auth_id}'  ");
      
      $db_pass = $res['password'];
      
     $password_check = password_verify($cur_pass, $db_pass);
     
     if($password_check){
      
       $_SESSION['pass_match'] = "********";
       $_SESSION['pass'] = "************";
       
       return redirect("user-password-edit");
     }else{
       $_SESSION['err_pass'] = "password not matched";
      return redirect("user-password-edit");
       
     }
     
      
    }
    
public function passwordUpdate() {
    // Validate new password
    $new_pass = trim($_POST['npass']);
    if (empty($new_pass)) {
        $_SESSION['err_pass'] = "Password should not be blank";
        return redirect("/user-password-edit");
    }
    
    
      if (strlen($new_pass < 6)) {
            $_SESSION["err_pass"] = "Password must be at least 6 characters long.";
            
          return  redirect("/user-password-edit");
          
        }
   
    $auth_id = Auth::id();
    $user = new User();

    // Get current user details
$db_user  = $user->singleRecord("select * from users WHERE id ='{$auth_id}' ");
    
    $db_user_pass = $db_user['password'];

    // Check if the new password matches the current password
    if (password_verify($new_pass, $db_user_pass)) {
        $_SESSION['err_pass'] = "Current password should not be the same as the new password";
        return redirect("/user-password-edit");
    }

    // Hash the new password
    $password_hash = password_hash($new_pass, PASSWORD_BCRYPT);

    // Update the password in the database
$res = $user->update("UPDATE users SET password = '{$password_hash}' WHERE  id = '{$auth_id}'  ");

    if ($res) {
        $_SESSION['success'] = "Password successfully updated";
        unset($_SESSION["pass_match"]);
    } else {
        $_SESSION['error'] = "Password not updated";
        unset($_SESSION["pass_match"]);
    }

    return redirect("user-password-edit");
}

  
  
}
?>
