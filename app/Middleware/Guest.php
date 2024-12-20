<?php
namespace App\Middleware;

class Guest {
  
  // Handle function to check if user is already authenticated
  public function handle() {
    // If the user is logged in (session contains user_id), redirect to dashboard
    if (isset($_SESSION['user_id'])) {
      redirect("dashboard"); // Redirect the logged-in user to the dashboard
      exit(); // Exit to stop further execution
    }
  }
}
?>
