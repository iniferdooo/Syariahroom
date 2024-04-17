<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('dashboard');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/membership', function () {
    return view('membership');
});
Route::get('/kontak', function () {
    return view('kontak');
});
Route::get('/fitur', function () {
    return view('fitur');
});
Route::get('/about', function () {
    return view('about');
});

Route::controller(AuthController::class)->group(function(){
    Route ::get("/register", 'register')->name('register');  //registration form post request
});