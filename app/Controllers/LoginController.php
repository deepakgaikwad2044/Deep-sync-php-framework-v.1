<?php
namespace App\Controllers;

// Import necessary models
use App\Models\{User, Admin};

class LoginController {

  // Display the login page
  public function index() {
    view("auth.login"); // Load the login view
  }

  // Handle the login process
  public function login() {
    // Retrieve form data submitted via POST
    $data = $_POST;

    // Create a new User model instance
    $user = new User();

    // Call the login method in the User model
    $result = $user->login($data);

    // You can add additional logic here based on the $result
    if ($result) {
      $_SESSION["success"] = "Login successful!";
      redirect("/dashboard");
    } else {
      $_SESSION["error"] = "Invalid credentials. Please try again.";
      redirect("/login");
    }
  }
}
?>
