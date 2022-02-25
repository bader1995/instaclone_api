<?php

use Illuminate\Support\Facades\Route;

Route::get("post");
Route::get("post/{id}");
Route::post("post");
Route::delete("post/{id}");
Route::patch("post/{id}");

Route::post("user/register");
Route::post("user/login");
