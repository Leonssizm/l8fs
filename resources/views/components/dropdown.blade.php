@props(['categories'])
<div x-data="{show:false}">

    <button @click ="show = !show" class="py-2 pl-3 pr-9 text-sm font-semibold w-32">Categories</button>

    <div x-show="show" class="absolute bg-gray-300 mt-2 rounded w-full" style="display:none">
        @foreach($categories as $category)
        <a href="/categories/{{$category->id}}" class="block text-left px-3">{{$category->name}}</a>
        @endforeach
    </div>

</div>