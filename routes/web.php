<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
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

Route::get('/', [HomeController::class, 'homepage']);

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/home', [HomeController::class, 'index'])->middleware(['auth'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/post_page', [AdminController::class, 'post_page'])->middleware('auth', 'admin');
Route::post('/add_post', [AdminController::class, 'add_post'])->middleware('auth', 'admin');
Route::get('/show_post', [AdminController::class, 'show_post'])->middleware('auth', 'admin');
Route::get('/delete_post/{id}', [AdminController::class, 'delete_post'])->middleware('auth', 'admin');
Route::get('/edit_post/{id}', [AdminController::class, 'edit_post'])->middleware('auth', 'admin');
Route::post('/edit_post/{id}', [AdminController::class, 'update_post'])->middleware('auth', 'admin');
Route::get('/accept_post/{id}', [AdminController::class, 'accept_post'])->middleware('auth', 'admin');
Route::get('/reject_post/{id}', [AdminController::class, 'reject_post'])->middleware('auth', 'admin');

Route::get('/post_details/{id}',[HomeController::class, 'post_details']);
Route::get('/create_post', [HomeController::class, 'view_create_post'])->middleware('auth');
Route::post('/create_post', [HomeController::class, 'create_post'])->middleware('auth');
Route::get('/my_post', [HomeController::class, 'my_post'])->middleware('auth');
Route::get('/delete_post/{id}', [HomeController::class, 'delete_post'])->middleware('auth');
Route::get('/update_post/{id}', [HomeController::class, 'update_post'])->middleware('auth');
Route::post('/update_post/{id}', [HomeController::class, 'edit_post'])->middleware('auth');


require __DIR__.'/auth.php';
