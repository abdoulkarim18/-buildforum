<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardControoler;
use App\Http\Controllers\DiscussionController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\TopicController;
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
// if(version_compare(PHP_VERSION, '7.2.0', '>=')) {
//     error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
// }

Route::get('/', [FrontendController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/new-topic', function () {
    return view('client.new-topic');
});
Route::get('/category/overview/{id}', [FrontendController::class, 'categoryOverview'])->name('category.overview');
Route::get('/forum/overview/{id}', [FrontendController::class, 'forumOverview'])->name('forum.overview');

Route::get('dashboard/home',[DashboardControoler::class, 'home']);

                // ADMIN DASHBOARD
//Categories
Route::get('/dashboard/category/new', [CategoryController::class, 'create'])->name('category.new');
Route::post('/dashboard/category/new', [CategoryController::class, 'store'])->name('category.store');
Route::get('/dashboard/categories', [CategoryController::class, 'index'])->name('categories');
Route::get('/dashboard/categories/show/{id}', [CategoryController::class, 'show'])->name('category.show');

Route::get('/dashboard/categories/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
Route::post('/dashboard/categories/edit/{id}', [CategoryController::class, 'update'])->name('category.update');
Route::get('/dashboard/categories/delete/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');

// Forums
Route::get('/dashboard/forum/new', [ForumController::class, 'create'])->name('forum.new');
Route::post('/dashboard/forum/new', [ForumController::class, 'store'])->name('forum.store');
Route::get('/dashboard/forums', [ForumController::class, 'index'])->name('forums');
Route::get('/dashboard/forums/show/{id}', [ForumController::class, 'show'])->name('forum.show');

Route::get('/dashboard/forums/edit/{id}', [ForumController::class, 'edit'])->name('forum.edit');
Route::post('/dashboard/forums/edit/{id}', [ForumController::class, 'update'])->name('forum.update');
Route::get('/dashboard/forums/delete/{id}', [ForumController::class, 'destroy'])->name('forum.destroy');

// Topics
Route::get('/client/topic/new/{id}', [DiscussionController::class, 'create'])->name('topic.new');
Route::post('/client/topic/new', [DiscussionController::class, 'store'])->name('topic.store');
Route::get('/client/topic/{id}', [DiscussionController::class, 'show'])->name('topic.show');
Route::post('/client/topic/reply/{id}', [DiscussionController::class, 'reply'])->name('topic.reply');
Route::get('/topic/reply/delete/{id}', [DiscussionController::class, 'destroy'])->name('reply.delete');
Route::get('/updates', [DiscussionController::class, 'updates']);

// Route::get('/client/topic/edit/{id}', [DiscussionController::class, 'edit'])->name('topic.edit');
// Route::post('/client/topic/edit/{id}', [DiscussionController::class, 'update'])->name('topic.update');

