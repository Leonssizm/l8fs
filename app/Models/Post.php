<?php

namespace App\Models;

use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post
{
	public $title;

	public $excerpt;

	public $date;

	public $body;

	public $slug;

	public function __construct($title, $excerpt, $date, $body, $slug)
	{
		$this->title = $title;
		$this->excerpt = $excerpt;
		$this->date = $date;
		$this->slug = $slug;
		$this->body = $body;
	}

	public static function all()
	{
		return cache()->rememberForever('posts.all', function () {
			return collect(File::files(resource_path('posts')))->map(fn ($file) => YamlFrontMatter::parseFile($file))
			->map(function ($document) {
				return new Post(
					$document->title,
					$document->excerpt,
					$document->date,
					$document->body(),
					$document->slug,
				);
			})->sortByDesc('date');
		});
	}

	public static function find($slug)
	{
		$posts = static::all();

		return $posts->firstWhere('slug', $slug);
	}
}