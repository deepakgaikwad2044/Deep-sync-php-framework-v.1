<?php
namespace App\Middleware;
use App\Models\User;

class Auth {
  
  // Handle function to check if user is authenticated
  public function handle() {
   
    // If the user is not logged in (no user_id in session), redirect to login page
    if (!isset($_SESSION['user_id'])) {
      redirect("login");
      exit; // Exit to stop further execution
    }
    
 
  }
}
?>
