@props(['comment'])

<article class="flex bg-gray-100 border border-gray-200 rounded p-6 space-x-4">
    <div class="flex-shrink-0">
        <img src="https://i.pravatar.cc/60/?u={{$comment->user_id}}" alt="user Image" width="60" height="60" class="rounded">
    </div>


    <div>
        <header>
            <h3 class="font-bold">{{$comment->user->name}}</h3>
            <p class="text-xs"><time>{{$comment->created_at->diffForHumans()}}</time></p>
        </header>
        <p>{{$comment->body}}</p>
    </div>
</article>