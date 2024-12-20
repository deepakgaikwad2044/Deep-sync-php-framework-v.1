<?php
session_start();

//Function to set Timezone
date_default_timezone_set('Asia/kolkata');

//Function to set Root Directory
define("APP_ROOT", __dir__);

//load to autoload file 
require_once(APP_ROOT ."/vendor/autoload.php");

//Function to get file name with namespace
spl_autoload_register(function($class){
  
  $classFile  = str_replace("\\" , DIRECTORY_SEPARATOR,$class.".php"  );
  
  $classpath = APP_ROOT."/".$classFile;
  
  if(file_exists($classpath)){
  require_once($classpath);
 // echo $classpath;
  }
});

require_once( APP_ROOT .'/Routes/route.php');


use App\Services\Route;

$route = new Route();
$route->handle();


