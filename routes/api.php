<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MydiaryController;
use App\Http\Controllers\UserController;

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



Route::post('auth/register', [UserController::class, 'register']);
Route::post('auth/login', [UserController::class, 'login']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::prefix('diarylist') ->group(function(){
    Route::get('/diary', [MydiaryController::class, 'index']);
    Route::post('/diary', [MydiaryController::class, 'store']);
    Route::put('/diary{id}', [MydiaryController::class, 'update']);
    Route::delete('/diary{id}', [MydiaryController::class, 'destroy']);
});







// Route::group(['middleware' => 'auth:sanctum'], function(){
//     //All secure URL's

//     Route::get("index",[MydiaryController::class,'list']);
//     Route::post("add",[MydiaryController::class,'add']);
//     Route::put("update",[MydiaryController::class,'update']);
//     Route::delete("delete/{id}",[MydiaryController::class,'destroy']);

// });