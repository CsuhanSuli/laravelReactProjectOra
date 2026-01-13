<?php

use App\Http\Controllers\BefizController;
use App\Http\Controllers\UgyfelController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get("/getbefiz",[BefizController::class,"index"]);
Route::get("/showugybefiz/{id}",[UgyfelController::class,"show"]);
Route::get("/getugyfel",[UgyfelController::class,"index"]);
Route::post("/postbefiz",[BefizController::class,"store"]);
Route::delete("/delbefiz/{id}",[BefizController::class,"destroy"]);