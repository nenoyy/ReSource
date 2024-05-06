<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

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


Route::get('/', [App\Http\Controllers\WebController::class, 'index'])->name('index');
Route::get('/guide', [App\Http\Controllers\WebController::class, 'guide'])->name('guide');
Route::get('/admin', [App\Http\Controllers\WebController::class, 'admin'])->name('admin');
Route::get('/admin2', [App\Http\Controllers\WebController::class, 'admin2'])->name('admin2');
Route::post('/admins', [App\Http\Controllers\WebController::class, 'adminSayYes'])->name('admins');
Route::get('/shop', [App\Http\Controllers\WebController::class, 'shop'])->name('shop');
Route::get('/personal', [App\Http\Controllers\WebController::class, 'personal'])->name('personal');
Route::get('/personalDelete/{id}', [App\Http\Controllers\WebController::class, 'personalDelete'])->name('personalDelete');
Route::post('/changeProfil', [App\Http\Controllers\WebController::class, 'changeProfil'])->name('changeProfil');
Route::get('/pay/{id}', [App\Http\Controllers\WebController::class, 'pay'])->name('pay');
Route::post('/category', [App\Http\Controllers\WebController::class, 'addCategory'])->name('addCategory');
Route::delete('/delCategory', [App\Http\Controllers\WebController::class, 'delCategory'])->name('delCategory');
Route::get('/material', [App\Http\Controllers\WebController::class, 'material'])->name('material');
Route::get('/map/{id_category}', [App\Http\Controllers\WebController::class, 'map'])->name('map');
Route::post('/address', [App\Http\Controllers\WebController::class, 'address'])->name('address');

Auth::routes(['verify' => true]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
