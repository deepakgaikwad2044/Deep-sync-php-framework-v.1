<?php
namespace App\Controllers;

use App\Models\User;
use App\Models\Department;
use App\Config\{Auth, File};

class ProfileController extends BaseController
{
    // Function to display the profile edit form
    public function edit()
    {
        $authUser = Auth::user();  // Retrieve the currently authenticated user's data.
        view("profiles.edit", ["user" => $authUser]);  // Pass user data to the profile edit view.
    }
  
    // Function to update the user profile
    public function update()
    {
        // Retrieve the authenticated user's ID and other data
        $auth_Userid = Auth::id();
        $authname = Auth::username();  // User's username (although not used directly here)
        $avtar = Auth::avtar();  // User's current avatar (profile picture)
        
        // Retrieve the form data
        $data = $_POST;
        $name = trim($data["name"]);  // Trim and sanitize the name input
        $email = trim($data["email"]);  // Trim and sanitize the email input

        $file = $_FILES["profile"];  // Get the uploaded file (avatar image)
        
        // Define the maximum allowed file size (1MB)
        $maxFileSize = 1000000;

        // Check if the name and email fields are not empty
        if (!empty($name) && !empty($email)) {
            // Check if a new avatar (profile picture) is uploaded
            if ($file["name"] != "") {
                // Validate file size (must be less than 1MB)
                if ($file['size'] < $maxFileSize) {
                    // Delete the old avatar if it exists
                    if (file_exists(APP_ROOT . "/" . $avtar)) {
                        File::delete($avtar);  // Delete the old avatar file
                    }

                    // Store the new uploaded file
                    $res = storage($file, "profiles");

                    // If the file was stored successfully, update the user's data in the database
                    if ($res) {
                        $user = new User();
    $res = $user->update(
    "UPDATE users SET name='{$name}', avtar='{$res}', email='{$email}' WHERE id='{$auth_Userid}'"
                        );
                      
     // Check if the update was successful
          if ($res) {
                            $_SESSION["success"] = "Profile successfully updated";  // Success message
                            redirect("/dashboard");  // Redirect to the dashboard
                        } else {
                            $_SESSION["error"] = "Profile didn't update";  // Error message if update fails
                            redirect("/profile/edit");  // Redirect back to the edit page
                        }
                    } else {
                        echo "File upload failed";  // If file upload failed
                    }
                } else {
                    $_SESSION["error"] = "File upload size must be less than 1MB";  // Error if file size exceeds the limit
                    redirect("/profile/edit");  // Redirect back to the edit page
                }
            } else {
                // If no new avatar is uploaded, just update name, email, and department
                $user = new User();
       $res = $user->update(
      "UPDATE users SET name='{$name}', email='{$email}'  WHERE id='{$auth_Userid}'"
                );

                // Check if the update was successful
                if ($res) {
                    $_SESSION["success"] = "Profile successfully updated";  // Success message
                    redirect("/dashboard");  // Redirect to the dashboard
                } else {
                    $_SESSION["error"] = "Profile didn't update";  // Error message if update fails
                    redirect("/profile/edit");  // Redirect back to the edit page
                }
            }
        } else {
            $_SESSION["error"] = "Name and email fields cannot be empty";  // Validation error if name/email is empty
            redirect("/profile/edit");  // Redirect back to the edit page
        }
    }
    
}
?>
