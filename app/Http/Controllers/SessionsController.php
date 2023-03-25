<?php

namespace App\Http\Controllers;

use Dotenv\Exception\ValidationException;

class SessionsController extends Controller
{
	public function create()
	{
		return view('sessions.create');
	}

	public function store()
	{
		$attributes = request()->validate([
			'email'    => 'required|exists:users,email',
			'password' => 'required',
		]);
		// if authentication is successful, attempt will check it
		if (auth()->attempt($attributes))
		{
			session()->regenerate();
			return redirect('/')->with('success', 'Welcome Back');
		}

		// If authentication is not successful;

		return back()->withInput()
		->withErrors(['email' => 'Your provided credentials could not be verified.']);

		// throw ValidationException::withMessages([
		// 	'email' => 'Your provided credentials could not be verified.',
		// ]);
	}

	public function destroy()
	{
		auth()->logout();

		return redirect('/')->with('success', 'Goodbye');
	}
}
