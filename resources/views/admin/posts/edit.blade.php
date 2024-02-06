<x-layout>
    <section class="w-1/3 m-auto">
        <form method="POST" action="/admin/posts/{{ $post->id }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <x-form.input
                required
                value="{{ old('title', $post->title) }}"
                name="title"
            />
            <div>
                <x-form.input
                    name="thumbnail"
                    value="{{ old('thumbnail', $post->thumbnail) }}"
                    type="file"/>
                <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="" class="rounded-xl">
            </div>
            <x-form.field>
                <x-form.lable name="category"/>
                <select
                    required
                    name="category_id"
                    id="category"
                        class="block appearance-none w-full bg-white border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded">
                    @foreach(App\Models\Category::all() as $category)
                        <option
                            {{ old('category_id') ?? $post->category_id === $category->id ? 'selected' : '' }}
                            value="{{ $category->id }}">{{ ucwords($category->name) }}</option>
                    @endforeach
                </select>
                <x-form.error name="category"/>
            </x-form.field>
            <x-form.textarea name="excerpt">
                {{ old('excerpt' , $post->excerpt) }}
            </x-form.textarea>
            <x-form.textarea name="body">
                {{ old('excerpt' , $post->body) }}
            </x-form.textarea>
            <div class="flex items-center justify-between">
                <input type="submit" class="bg-blue-500 hover:bg-blue-dark text-white font-bold py-2 px-4 rounded"
                       value="Update Post">
            </div>
        </form>
    </section>
</x-layout>