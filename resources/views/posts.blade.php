<x-layout>
    @include('_post-header')
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        <x-posts-display-all :posts="$posts"></x-posts-display-all>
    </main>
</x-layout>

