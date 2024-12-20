<?php
namespace App\Config;
use App\Models\User;

class Auth
{
  public static function user()
  {
    try {
      $auth_user = $_SESSION["user_id"] ;
      $user = new User();
      $data = $user->select("SELECT * FROM users where id='{$auth_user}' ");
      return $data;
    } catch (PDOException $e) {
      return $e->getMessage();
    }
  }

  public static function id()
  {
    try {
      $auth_user = $_SESSION["user_id"];
      $user = new User();
      $data = $user->select("SELECT * FROM users where id='{$auth_user}' ");
      return $data["id"];
    } catch (PDOException $e) {
      return $e->getMessage();
    }
  }

  public static function username()
  {
    try {
      $auth_user = $_SESSION["user_id"];
      $user = new User();
      $data = $user->select("SELECT * FROM users where id='{$auth_user}' ");
      return $data["name"];
    } catch (PDOException $e) {
      return $e->getMessage();
    }
  }

  public static function avtar()
  {
    try {
      $auth_user = $_SESSION["user_id"];
      $user = new User();
      $data = $user->select("SELECT * FROM users where id='{$auth_user}' ");
      return $data["avtar"];
    } catch (PDOException $e) {
      return $e->getMessage();
    }
  }
  
   public static function role()
  {
    try {
      $auth_user = $_SESSION["user_id"];
      $user = new User();
      $data = $user->select("SELECT * FROM users where id='{$auth_user}' ");
      return $data["role"];
    } catch (PDOException $e) {
      return $e->getMessage();
    }
  }
}
?>
