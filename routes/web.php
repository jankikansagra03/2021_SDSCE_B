<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SampleController;

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
    return view('home');
});


Route::view('firstpage', 'First');
Route::view('Myheader', 'header');
Route::view('Index', 'home');
Route::view('ContactUs', 'contact');
Route::view('AboutUs', 'about');
Route::view('register', 'form');
Route::view('sassexample','sample');

Route::post('fetch_value', [SampleController::class, 'fetch_data']);
