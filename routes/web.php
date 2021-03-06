<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use Illuminate\Auth\Middleware\Authenticate;
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
Route::get('/', function () {
    return view('top');
});

Route::get('/login', "LoginController@show")
->name('login.form');

Route::post('/login', "LoginController@authenticate")
->name('login.auth');

Route::get('/member', "LoginController@top")
;

Route::post('/member', "LoginController@logout")
->name('logout');

// コメント





Route::get('/register', "RegisterController@form")->name('register.form');
Route::post('/register', "RegisterController@validation")->name('register.validation');


Route::get('/register/confirm', "RegisterController@confirm")->name('register.confirm');
Route::post('/register/confirm', "RegisterController@send")->name('register.send');

Route::get('/register/complete', "RegisterController@complete")->name('register.complete');


