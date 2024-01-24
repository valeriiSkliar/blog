<x-layout>
    <section class="w-1/3 m-auto">
        <form method="POST" action="/admin/posts" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label class="block text-grey-darker text-sm font-bold mb-2" for="title">
                    Title
                </label>
                <input
                    value="{{old('title')}}"
                    name="title"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker">
            </div>
            <div class="mb-4">
                <label class="block text-grey-darker text-sm font-bold mb-2" for="thumbnail">
                    Thumbnail
                </label>
                <input
                    type="file"
                    value="{{old('thumbnail')}}"
                    name="thumbnail"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker">
            </div>
            <div class="mb-4">
                <label class="block text-grey-darker text-sm font-bold mb-2" for="category">
                    Category
                </label>
                <select name="category_id" id="category" class="block appearance-none w-full bg-white border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded">
{{--                    @php--}}
{{--                        $categories = App\Models\Category::all();--}}
{{--                    @endphp--}}
                    @foreach(App\Models\Category::all() as $category)
                        <option
                            {{ old('category_id') === $category->id ? 'selected' : '' }}
                            value="{{ $category->id }}">{{ ucwords($category->name) }}</option>
                    @endforeach
                </select>
            </div>
{{--            <div class="mb-4">--}}
{{--                <label class="block text-grey-darker text-sm font-bold mb-2" for="slug">--}}
{{--                    Slug--}}
{{--                </label>--}}
{{--                <input name="slug" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker">--}}
{{--            </div>--}}
            <div class="mb-6">
                <label class="block text-grey-darker text-sm font-bold mb-2" for="excerpt">
                    Excerpt
                </label>
                <textarea name="excerpt" rows="3"
                          class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker">{{old('excerpt')}}</textarea>
            </div>
            <div class="mb-6">
                <label class="block text-grey-darker text-sm font-bold mb-2" for="body">
                    Body
                </label>
                <textarea name="body" rows="6"
                          class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker">{{old('body')}}</textarea>
            </div>
{{--            <div class="mb-6">--}}
{{--                <label class="block text-grey-darker text-sm font-bold mb-2" for="published_at">--}}
{{--                    Published At--}}
{{--                </label>--}}
{{--                <input type="datetime-local" name="published_at"--}}
{{--                       class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker">--}}
{{--            </div>--}}
            <div class="flex items-center justify-between">
                <input type="submit" class="bg-blue-500 hover:bg-blue-dark text-white font-bold py-2 px-4 rounded"
                       value="Create Post">
            </div>
        </form>
    </section>
</x-layout>
