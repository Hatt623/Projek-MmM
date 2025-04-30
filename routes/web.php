<?php


// use App\Http\Controllers\KategorisController;
use App\Http\Controllers\TransaksisController;
use App\Http\Controllers\DompetsController;
use App\Http\Controllers\FrontController;

use App\Http\Controllers\AdminsonlyController;
use App\Http\Middleware\isAdmin;
use Illuminate\Support\Facades\Route;


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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::resource('/', FrontController::class);


// Route::resource('kategori', KategorisController::class);
Route::resource('transaksi', TransaksisController::class);
Route::resource('dompet', DompetsController::class);

Route::prefix('adminonly')->middleware('auth',isAdmin::class)->group(function() {
    Route::resource('adminonly', AdminsonlyController::class);

});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
