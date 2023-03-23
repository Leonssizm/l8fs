
<x-layout>
    @foreach($posts as $post)
        <article>
            <h1>
            <a href="/posts/{{$post->id}}">
               {{$post->title}}
            </a>
            </h1>
                <a href="/categories/{{$post->category->id}}">{{$post->category->name}}</a>
            <div>
               {{$post->excerpt}}
            </div>
        </article>
    @endforeach

</x-layout>