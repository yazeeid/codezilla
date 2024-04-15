<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PostController;

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
    // return view('welcome');
    return redirect()->route('posts.index');
});


Route::get('/posts', [PostController::class, 'index'])->name("posts.index"); 
Route::get("/posts/create", [PostController::class, 'create'])->name("posts.create");
Route::get('/posts/{post}', [PostController::class, 'show'])->name("posts.show");
Route::post('posts', [PostController::class, 'store'])->name('posts.store');
Route::get('posts/{posts}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::put('posts/{posts}', [PostController::class, 'update'])->name('posts.update');
Route::delete('posts/{posts}', [PostController::class, 'destroy'])->name('posts.destroy');



Auth::routes();


Route::get('/home', [App\Http\Controllers\PostController::class, 'index'])->name('home');
