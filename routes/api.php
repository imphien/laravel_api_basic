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
Route::get("list/{id?}",[App\Http\Controllers\CustomerController::class,'list']);
Route::post("add",[App\Http\Controllers\CustomerController::class,'add']);
Route::put("update",[App\Http\Controllers\CustomerController::class,'update']);
Route::get("search/{name}",[App\Http\Controllers\CustomerController::class,'search']);
Route::delete("delete/{id}",[App\Http\Controllers\CustomerController::class,'delete']);

Route::apiResource("product",App\Http\Controllers\ProductController::class);

Route::post("upload",[App\Http\Controllers\FileController::class,'upload']);