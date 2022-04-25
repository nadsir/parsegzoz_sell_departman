<?php

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/redirects', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
Route::get('/customer',[App\Http\Controllers\SellerController::class,'index'])->name('customer');
Route::get('/addcustomer',[App\Http\Controllers\SellerController::class,'addcustomer'])->name('addcustomer');
Route::post('/addcustomer',[App\Http\Controllers\SellerController::class,'addcustomertodb']);
Route::get('/customerorder/{id}',[App\Http\Controllers\SellerController::class,'customerorder']);

Route::get('/editfactor/{id}',[App\Http\Controllers\SellerController::class,'editfactor']);
Route::post('/editcustomerorder/',[App\Http\Controllers\SellerController::class,'editcustomerorder']);

Route::get('/changecheck/{id}',[App\Http\Controllers\SellerController::class,'changecheck']);
Route::post('/editcustomercheck',[App\Http\Controllers\SellerController::class,'editcustomercheck']);


Route::get('/addorders',[App\Http\Controllers\SellerController::class,'addorders']);

Route::post('/addcustomerorder',[App\Http\Controllers\SellerController::class,'addcustomerorder']);
Route::get('/editorder/{id}',[App\Http\Controllers\SellerController::class,'editorder']);
Route::get('/test',[App\Http\Controllers\SellerController::class,'test']);
Route::get('/changestatus/{id}',[App\Http\Controllers\SellerController::class,'changestatus']);
Route::post('/addcheck/{id}',[App\Http\Controllers\SellerController::class,'addcheck']);
