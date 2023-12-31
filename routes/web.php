<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Models\Category;
use App\Models\User;
use App\Models\Post;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteService+Provider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('posts/{post:slug}', [PostController::class, 'show']);


Route::get('categories/{category:slug}', function (Category $category) {
  return view('posts', [
    'posts' => $category->posts,
    'currentCategory' => $category,
    'categories' => Category::all()
  ]);
})->name('category');

Route::get('authors/{author:username}', function (User $author) {
  return view('posts', [
    'posts' => $author->posts,
    'categories' => Category::all()
  ]);
});






























