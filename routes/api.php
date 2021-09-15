<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Public route
Route::get("list/{id?}",[App\Http\Controllers\CustomerController::class,'list']);


Route::get("search/{name}",[App\Http\Controllers\CustomerController::class,'search']);


Route::apiResource("product",App\Http\Controllers\ProductController::class)->except(['edit','create']);
Route::get("searchproduct/{name}",[App\Http\Controllers\ProductController::class,'search']);
Route::post("/register",[App\Http\Controllers\AuthController::class,'register']);
Route::post("/login",[App\Http\Controllers\AuthController::class,'login']);

Route::post("upload",[App\Http\Controllers\FileController::class,'upload']);

//protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post("add",[App\Http\Controllers\CustomerController::class,'add']);
    Route::put("update",[App\Http\Controllers\CustomerController::class,'update']);
    Route::delete("delete/{id}",[App\Http\Controllers\CustomerController::class,'delete']);
    Route::post("/logout",[App\Http\Controllers\AuthController::class,'logout']);
});