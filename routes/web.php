<?php

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardPostController;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\Category;
use App\Http\Controllers\PostController;
use App\Models\User;

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
    return view('home', [
        "title" => "",
        "title_2nd" => ""
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "title_2nd" => ""
    ]);
});

Route::get('/blog', [PostController::class, 'index']);
Route::get('/blog/{post}', [PostController::class, 'show']);
Route::get('/categories', [PostController::class, 'categories']);
Route::get('/categories/{category:slug}', [PostController::class, 'category']);
Route::get('/authors/{author:username}', [PostController::class, 'author']);

// login
Route::get('/auth/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/auth/login', [AuthController::class, 'post_login']);
Route::post('/auth/logout', [AuthController::class, 'post_logout']);

// register
Route::get('/auth/register', [AuthController::class, 'get_register']);
Route::post('/auth/register', [AuthController::class, 'post_register']);

// dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug']);
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');
Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('auth');