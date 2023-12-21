<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HelpController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(["prefix" => "user", "controller" => DashboardController::class], function () {
    Route::get("/", "index")->name("dashboard");
    Route::get("/dashboard", "index")->name("dashboard");
    Route::get("/activate_reg", "activate_reg")->name("activate_reg");
    Route::post("/activate_reg", "activate_reg_action");
});

Route::group(["prefix" => "auth", "controller" => AuthController::class], function () {
    Route::get("/login", "login")->name("login");
    Route::post("/login", "loginAction");
    Route::get("/register", "register")->name("register");
    Route::post("/register", "registerAction");
    Route::post("/validate_sponsor", "validate_sponsor");
    Route::get("/logout", "logout")->name("logout");
});

Route::get('/about', [AboutController::class, "index"])->name("about");
Route::get('/help', [HelpController::class, "index"])->name("help");
Route::get('/populate', [HomeController::class, "populate_db"]);
Route::get('/generate_codes/{size?}/{package?}', [HomeController::class, "generate_activation_codes"]);
Route::get('/', [HomeController::class, "index"])->name("home");
