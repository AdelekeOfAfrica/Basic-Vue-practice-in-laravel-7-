<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\TestController;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/welcome','TestController@index');
// to use any address url
Route::any('{slug}', function(){
    return view('welcome');
});
Route::view('/test','test');
Route::post('app/create_tag','TestController@index')->name('index');
Route::get('{path}','TestController@index')->where('path','([A-z\d-\/_.]+)?');
