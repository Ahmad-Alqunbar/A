<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dummy_api;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('data',[dummy_api::class,'getData']);
Route::get('getStudent',[StudentController::class,'getStudent']);
Route::get('oneStudent/{id?}',[StudentController::class,'showStudent']);
Route::post('addStudent',[StudentController::class,'addStudent']);

Route::Put('updateStudent/',[StudentController::class,'updateStudent']);

Route::get('searchStudent/{name?}',[StudentController::class,'searchStudent']);

Route::delete('deleteStudent/{id}',[StudentController::class,'deleteStudent']);
////////////////////////auth ///////////////////
Route::controller(RegisterController::class)->group(function(){
    Route::post('register', 'register');
    Route::post('login', 'login');
});

Route::middleware('auth:sanctum')->group( function () {
    Route::resource('products', ProductController::class);
});
