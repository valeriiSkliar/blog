<x-layout>
    <section class="w-1/3 m-auto">
        <form method="POST" action="/admin/posts" enctype="multipart/form-data">
            @csrf
                <x-form.input name="title" />
                <x-form.input name="thumbnail" type="file"/>
                <x-form.field>
                    <x-form.lable name="category"/>
                    <select name="category_id" id="category" class="block appearance-none w-full bg-white border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded">
                        @foreach(App\Models\Category::all() as $category)
                            <option
                                {{ old('category_id') === $category->id ? 'selected' : '' }}
                                value="{{ $category->id }}">{{ ucwords($category->name) }}</option>
                        @endforeach
                    </select>
                    <x-form.error name="category"/>
                </x-form.field>
            <x-form.textarea name="excerpt"/>
            <x-form.textarea name="body"/>
            <div class="flex items-center justify-between">
                <input type="submit" class="bg-blue-500 hover:bg-blue-dark text-white font-bold py-2 px-4 rounded"
                       value="Create Post">
            </div>
        </form>
    </section>
</x-layout>
