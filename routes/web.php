<?php

use App\Http\Controllers\PostController;
use App\Models\Category;
use App\Models\User;
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

Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('posts/{post:id}', [Postcontroller::class, 'show']);

Route::get('categories/{category}', function (Category $category) {
	return view('posts', [
		'posts'     => $category->posts,
		'categories'=> Category::all(),
	]);
});

Route::get('authors/{user}', function (User $user) {
	return view('posts.index', [
		'posts'                      => $user->posts,
		'categories'                 => Category::all(),
	]);
});
