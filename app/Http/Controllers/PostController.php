<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;

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
}
