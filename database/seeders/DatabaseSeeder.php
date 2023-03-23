<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
	/**
	 * Seed the application's database.
	 */
	public function run(): void
	{
		User::truncate();
		Post::truncate();
		Category::truncate();

		$user = User::factory()->create();

		$personal = Category::create([
			'name' => 'Personal',
			'slug' => 'personal',
		]);

		$work = Category::create([
			'name' => 'Work',
			'slug' => 'work',
		]);
		$home = Category::create([
			'name' => 'Home',
			'slug' => 'home',
		]);

		Post::create([
			'user_id'     => $user->id,
			'category_id' => $personal->id,
			'title'       => 'MY FIRST POST',
			'excerpt'     => 'first post excerpt',
			'body'        => 'asdasdadslkjaflkjqljelhjqefjbfds,ansbjsahdbjqhwdkjqwhaskjdnalksdnasd',
		]);
		Post::create([
			'user_id'     => $user->id,
			'category_id' => $work->id,
			'title'       => 'MY Second POST',
			'excerpt'     => 'second post excerpt',
			'body'        => 'asdasdadslkjaflkjqljelhjqefjbfds,ansbjsahdbjqhwdkjqwhaskjdnalksdnasd',
		]);
		Post::create([
			'user_id'     => $user->id,
			'category_id' => $home->id,
			'title'       => 'MY second POST',
			'excerpt'     => 'second post excerpt',
			'body'        => 'asdasdadslkjaflkjqljelhjqefjbfds,ansbjsahdbjqhwdkjqwhaskjdnalksdnasd',
		]);
	}
}
