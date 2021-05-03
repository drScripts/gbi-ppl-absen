<?php

use App\Http\Controllers\API\AbsensiController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ChildrenController;
use App\Http\Controllers\API\GoogleApiController;
use App\Http\Controllers\API\PembimbingController;
use App\Models\Children;
use App\Models\Pembimbing;
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

Route::middleware('auth:sanctum')->group(function(){
    Route::post('googleToken', [GoogleApiController::class,'inputNewTokenCode']);
    Route::get('googleToken',[GoogleApiController::class, 'getToken']);

    Route::post('pembimbing', [PembimbingController::class,'addPembimbing']);
    Route::get('pembimbing', [PembimbingController::class,'getPembimbing']);

    Route::get('absensi',[AbsensiController::class,'getAbsensi']);
    Route::post('absensi',[AbsensiController::class,'addAbsensi']);

    Route::post('childrens',[ChildrenController::class,'inputChildren']);
    Route::get('childrens', [ChildrenController::class,'getChildrenData']);
});

Route::post('login',[AuthController::class,'login']);
