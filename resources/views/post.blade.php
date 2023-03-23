
<x-layout>

    <article>
       <h1>{{ $post->title }}</h1>

       By<a href="/authors/{{$post->user->id}}">{{$post->user->name}} in</a><a href="categories/{{$post->category->id}}">{{$post->category->name}}</a>

        <div>
        {!!$post->body!!}
       </div>
    </article>

<a href="/">Go Back</a>

</x-layout>