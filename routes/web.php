<?php

use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Models\Category;
use App\Models\User;
use App\Services\Newsletter;
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
	return view('posts.index', [
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

// TODO combine registration routes
Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

// Login-logut-session
Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');
Route::post('sessions', [SessionsController::class, 'store']);
Route::get('login', [SessionsController::class, 'create'])->middleware('guest');

// Comments
Route::post('posts/{post:id}/comments', [PostCommentsController::class, 'store']);

// newsletter, you can take it into NewsLetter controller too
Route::post('newsletter', function () {
	request()->validate(['email' => 'required|email']);

	try
	{
		$newsLetter = new Newsletter();
		$newsLetter->subscribe(request('email'));
	}
	catch (\Exception $e)
	{
		throw \Illuminate\Validation\ValidationException::withMessages([
			'email' => 'This email could not be added to our newsletter list',
		]);
	}

		return redirect('/')->with('success', 'you are now signed up for our newsletter');
});

// Admin Panel

Route::get('admin/posts/create', [PostController::class, 'create'])->middleware('admin');
Route::post('admin/posts', [PostController::class, 'store'])->middleware('admin');
