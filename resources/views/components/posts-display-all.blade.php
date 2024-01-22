@props(['posts'])
@if($posts->count())
    <x-post-card-latest :post="$posts->first()"></x-post-card-latest>
    <div class="lg:grid lg:grid-cols-6">
        @foreach($posts->skip(1) as $post)
            <x-post-card-grid :post="$post" class="{{ $loop->iteration < 3 ? 'col-span-3' : 'col-span-2' }}"></x-post-card-grid>
        @endforeach
    </div>
@else
    <p class="text-center">No posts yet!</p>
@endif
