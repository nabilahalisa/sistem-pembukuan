<?php

use App\Http\Controllers\AuthController;
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


Route::get('/dashboard', 'AuthController@login')->name('dashboard');

Route::get('/', 'Auth\LoginController@getLogin')->name('login');
Route::get('/login', 'Auth\LoginController@getLogin')->name('login');
Route::post('/login', 'Auth\LoginController@postLogin')->name('login');
Route::get('/logout', 'Auth\LoginController@postLogout')->name('logout');

Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/register', 'Auth\RegisterController@register')->name('register');


Route::get('/penjualan/convert/', 'PenjualanController@convert')->name('convert');

Route::resource('penjualan', 'PenjualanController')->names([
    'index'  => 'penjualan.index',
    'create' => 'penjualan.form.tambah',
    'show' => 'penjualan.detail',
    'store' => 'penjualan.tambah',
    'edit' => 'penjualan.form.edit',
    'update' => 'penjualan.edit',
    'destroy' => 'penjualan.hapus'
]);
