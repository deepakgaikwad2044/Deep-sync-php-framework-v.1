<?php
use App\Config\Auth;

// Function to unset name attribute submit
unset($_POST["submit"]);

// Function to handle route location
function redirect($url)
{
  header("location:$url");
  exit();
}

// Function to get the public image URL
function public_path($filepath)
{
    $file = APP_ROOT . "/public/" . $filepath;

    if (file_exists($file)) {
        // Return the URL path instead of the file path
        $publicUrl = "/public/" . $filepath;
        return $publicUrl;
    } else {
        throw new Exception("404: file not found " . $file);
    }
}

// Function to handle view folder
function view($file_path, $data = [])
{
  $path = str_replace("\\", DIRECTORY_SEPARATOR, $file_path);

  $path = str_replace(".", DIRECTORY_SEPARATOR, $path);

  $file =
    APP_ROOT .
    DIRECTORY_SEPARATOR .
    "view" .
    DIRECTORY_SEPARATOR .
    $path .
    ".php";

  if (file_exists($file)) {
    extract($data);
    require $file;
  } else {
    echo "Page not found " . $file;
  }
}

//handle includes file
function includes($file_path)
{
  $path = str_replace("\\", DIRECTORY_SEPARATOR, $file_path);

  $path = str_replace(".", DIRECTORY_SEPARATOR, $path);

  $file = APP_ROOT . DIRECTORY_SEPARATOR . "view/" . $path . ".php";

  if (file_exists($file)) {
    return require $file;
  } else {
    echo "Page not found " . $file;
  }
}

//Function to store file
function storage($file, $filepath)
{
  // print_r($file);
  $img_name = $file["name"];
  $img_tmp = $file["tmp_name"];
  $time = time();
  $file_Path = APP_ROOT . "/storage/" . $filepath;

  $new_img = $time . $img_name;

  if (move_uploaded_file($img_tmp, $file_Path . "/" . $new_img)) {
    return "/storage/" .$filepath . "/" . $new_img;
  } else {
    throw new Exception("400:file wasn't upload");
  }
}

// Function to get stored file
function storage_path($file)
{
  $classFile = "/storage/" . $file; // Assuming the storage directory is in your web root
  return $classFile;
}


function shortname($val){
   $shortname =  strlen($val) > 6
        ? substr($val, 0, 6) . "..."
        : $val;
     echo $shortname;
}

function shortString($val, $limit){
   $shortname =  strlen($val) > $limit
        ? substr($val, 0, $limit) . "..."
        : $val;
     return $shortname;
}

function timeDef($time){
    // Get the current time and the time of notification creation
    $now = time();
    $created_at = strtotime($time);

    // Calculate the time difference in seconds
    $time_difference = $now - $created_at;

    // Determine the human-readable time format
    if ($time_difference < 60) {
        return 'Just now';
    } elseif ($time_difference < 3600) { // Less than 1 hour
        $minutes = floor($time_difference / 60);
        return $minutes . ' min' . ($minutes == 1 ? '' : '') . ' ';
    } elseif ($time_difference < 86400) { // Less than 1 day
        $hours = floor($time_difference / 3600);
        return $hours . ' hr' . ($hours == 1 ? '' : 's') . ' ';
    } elseif ($time_difference < 604800) { // Less than 1 week
        $days = floor($time_difference / 86400);
        return $days . ' day' . ($days == 1 ? '' : 's') . ' ';
    }else{
      return date('d M Y h:i a', $created_at);
    }
}


?>
