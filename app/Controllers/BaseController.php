<?php
namespace App\Controllers;

// Import the Auth class
use App\Config\Auth;

class BaseController {
  
  // Constructor method that runs automatically
  public function __construct() {
    // Get the authenticated user's details
    $loggedInUser = Auth::user();

    // Store the user details in the session
    $_SESSION['user'] = $loggedInUser;
  }
  
  public function pageNotFound(){
    return view("err400");
  }
}
?>
