<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
	public function index()
	{
		return view('posts.index', [
			'posts'     => Post::latest()->filter(request(['search']))->paginate(6),
			'categories'=> Category::all(),
		]);
	}

	public function show(Post $post)
	{
		return view('posts.show', [
			'post'      => $post,
			'categories'=> Category::all(),
		]);
	}

	public function create()
	{
		return view('posts.create');
	}

	public function store()
	{
		$attributes = request()->validate([
			'title'       => ['required'],
			'slug'        => ['required', Rule::unique('posts', 'slug')],
			'excerpt'     => ['required'],
			'body'        => ['required'],
			'category_id' => ['required', Rule::exists('categories', 'id')],
		]);

		// dd($attributes);
		$attributes['user_id'] = auth()->id();

		Post::create($attributes);

		return redirect('/');
	}
}
