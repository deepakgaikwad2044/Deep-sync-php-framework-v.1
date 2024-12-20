<?php
namespace App\Config;

class File
{
  public static function Delete($filePath)
  {  
    
    if (file_exists(APP_ROOT . $filePath)) {
      unlink(APP_ROOT . $filePath);
    } else {
      echo "something went wrong";
    }
  }
}
?>
