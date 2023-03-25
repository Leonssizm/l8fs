
<x-layout>

@include("posts._header")

<main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">

    <x-posts-grid :posts="$posts"/>


    @if(!str_contains(Request::url(), "categories") && !str_contains(Request::url(), "authors"))
    {{$posts->links()}}
    @endif
        
  

</main>
</x-layout>