<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SampleController;
use App\Http\Middleware\SessionLogin;

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



Route::view('Index', 'home');
Route::view('ContactUs', 'contact');
Route::view('AboutUs', 'about');
Route::view('register', 'form');
Route::view('sassexample', 'sample');

Route::post('fetch_value', [SampleController::class, 'fetch_data']);

Route::view('RegisterForm', 'register_form');

Route::post('FetchRegister', [SampleController::class, 'register_fetch_data']);
Route::get('FetchRandomdata', [SampleController::class, 'fetch_random_data']);
Route::get('display_data', [SampleController::class, 'fetch_data_registration']);
Route::get('edit_user/{email}', [SampleController::class, 'fetch_data_for_edit']);
Route::get('delete_user/{email}', [SampleController::class, 'delete_user_registration']);
Route::get('Deactivate/{email}', [SampleController::class, 'deactivate_user_registration']);
Route::get('Activate/{email}', [SampleController::class, 'activate_user_registration']);
Route::post('Update_registration', [SampleController::class, 'update_data_registration']);
Route::view('Login_session', 'form_session')->name('login');
Route::post('session_store', [SampleController::class, 'validate_login']);
Route::post('session_store', [SampleController::class, 'validate_login']);
Route::get('logout', [SampleController::class, 'logout']);

Route::middleware('session_check')->group(function () {
    Route::view('after_login', 'after_login');
});

Route::middleware('sm1')->group(function () {
    Route::view('firstpage', 'First');
    Route::view('Myheader', 'header');
});

Route::view('email_send_form', 'mail_send_form');
Route::post('send_email', [SampleController::class, 'send_email']);
Route::view('login_master', 'login_master');
