<x-layout>
    @include('posts._header')
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        <x-posts-display-all :posts="$posts"></x-posts-display-all>
        {{ $posts->links() }}
    </main>
</x-layout>

