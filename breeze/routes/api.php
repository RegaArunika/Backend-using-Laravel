<?php

use App\Http\Controllers\Api\NewPasswordController as ApiNewPasswordController;
use App\Http\Controllers\API\SepatuController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\BrandController as ControllersBrandController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Spatie\FlareClient\Api;

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




Route::post('/login',[AuthController::class,'login']);
Route::post('/register',[AuthController::class,'register']);


Route::group(['middleware' => 'auth:sanctum'], function() {
    Route::resource('produk', SepatuController::class);
    Route::post('/produk/{id}', [SepatuController::class, 'update']);
    Route::get('/listtoko', [SepatuController::class, 'listToko']);
    Route::post('/repassword',[AuthController::class,'repassword']);
    Route::get('/brand',[BrandController::class,'index']);
    Route::post('/brand',[BrandController::class,'store']);
    Route::post('/brand/{id}',[BrandController::class,'update']);
    Route::post('/forgotPassword',[ApiNewPasswordController::class,'forgotPassword']);
    Route::post('/reset',[ApiNewPasswordController::class,'reset']);
});
