<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\UserController;

/*
Route::get("post");
Route::get("post/{id}");
Route::post("post");
Route::delete("post/{id}");
Route::patch("post/{id}");
*/

Route::post("user/register", [UserController::class, "register"]);
Route::post("user/login", [UserController::class, "login"]);

Route::get("user/", [UserController::class, "all"])->middleware("CheckToken");
