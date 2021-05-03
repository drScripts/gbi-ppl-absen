<?php
 
 use App\Http\Controllers\GoogleApiServiceController;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Route;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\ChildrenController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PembimbingController;
use App\Http\Controllers\GoogleApiTokenController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('dashboard');
});
 

Route::prefix('/dashboard')->middleware(['auth:sanctum', 'verified'])->group(function(){
    Route::get('/',[DashboardController::class,'index'])->name('dashboard'); 
    Route::resource('pembimbing', PembimbingController::class);
    Route::resource('children', ChildrenController::class);
    Route::resource('googleToken', GoogleApiTokenController::class);
    Route::resource('absensi', AbsensiController::class);
    Route::get('export',[AbsensiController::class,'export'])->name('absensi');
});