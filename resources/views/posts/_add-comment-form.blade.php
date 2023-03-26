@auth
                        
<form method="POST" action="/posts/{{$post->id}}/comments" class="bg-gray-100 border border-gray-200 p-6 rounded-xl">
    @csrf
    <header class="flex items-center">
        <img src="https://i.pravatar.cc/60/?u={{auth()->id()}}" alt="user Image" width="40" height="40" class="rounded-full">
        <h1 class="ml-4">Want to participate?</h1>
    </header>

    <div class="mt-6">
        <textarea name="body" class="w-full" placeholder="Type your comment here" required></textarea>
    </div>

    @error('body')
        <span class="text-xs text-red-500">{{$message}}</span>
    @enderror
    <div>
        <button type="submit" class="bg-blue-400 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl">Submit</button>
    </div>

</form>
@else
<div class="flex">
<a href="/register" class="text-blue-500 font-bold">Register</a>
<p class="ml-3 mr-3">or</p>
<a href="/login" class="text-blue-500 font-bold">Log In</a>
<p class="ml-3">To leave a comment</p>
</div>
@endauth