<?php

use App\Http\Controllers\DashboardControoler;
use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/new-topic', function () {
    return view('client.new-topic');
});
Route::get('/c-overview', function () {
    return view('client.category-overview');
});
Route::get('/topic', function () {
    return view('client.topic');
});

route::get('dashboard/home',[DashboardControoler::class, 'home']);
