<?php
namespace Routes;
use App\Middleware\Auth;
use App\Middleware\Guest;
use App\Middleware\Permission;

use App\Services\Route;


//Register Controller
Route::get("register", "RegisterController", "index", [Guest::class]);

Route::post("submit-register", "RegisterController", "register");

//Dashboard Controller
Route::get("dashboard", "DashboardController", "index", [Auth::class]);

Route::get("logout", "DashboardController", "logout", [Auth::class]);

// Login Controller
Route::get("login", "LoginController", "index", [Guest::class]);

Route::post("submit-login", "LoginController", "login");

Route::get("profile/edit", "ProfileController", "edit", [Auth::class]);

Route::post("profile/update", "ProfileController", "update", [Auth::class]);

Route::get("user-password-edit", "PasswordController", "index", [Auth::class]);

Route::post("user-password-verify", "PasswordController", "passwordVerify", [Auth::class]);

Route::post("user-password-update", "PasswordController", "passwordUpdate", [Auth::class]);

?>
