<x-layout>
    <section class="px-6 py-8 max-w-sm m-auto">
        <h1> Add New Post</h1>
        <form method="POST" action="/admin/posts" enctype="multipart/form-data">
            @csrf

            <div class="mb-6">
                <label for="title" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                    Title
                </label>
                <input class="border border-gray-400 p-2 w-full rounded"
                type="text"
                name="title"
                id="title"
                value="{{old('title')}}"
                >

                @error('title')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="slug" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                    slug
                </label>
                <textarea class="border border-gray-400 p-2 w-full rounded"
                type="text"
                name="slug"
                id="slug"
                value="{{old('slug')}}"
                ></textarea>

                @error('slug')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="excerpt" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                    excerpt
                </label>
                <input class="border border-gray-400 p-2 w-full rounded"
                type="text"
                name="excerpt"
                id="excerpt"
                value="{{old('excerpt')}}"
                >

                @error('excerpt')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="body" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                    body
                </label>
                <textarea class="border border-gray-400 p-2 w-full rounded"
                type="text"
                name="body"
                id="body"
                value="{{old('body')}}"
                ></textarea>

                @error('body')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="thumbnail" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                    thumbnail
                </label>
                <input class="border border-gray-400 p-2 w-full rounded"
                type="file"
                name="thumbnail"
                id="thumbnail"
                value="{{old('thumbnail')}}"
                >

                @error('thumbnail')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>


            <div class="mb-6">
                <label for="category_id" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                    Pick a Category
                </label>
                <select name="category_id">

                    @foreach(App\Models\Category::all() as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>

                @error('category_id')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <button
            class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">Publish</button>

        </form>





    </section>

</x-layout>