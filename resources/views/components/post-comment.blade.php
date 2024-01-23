@props(['comment'])

<article class="flex bg-gray-100 border-gray-200 p-6 rounded-xl space-4">
        <div class="w-full" style="max-width:100px">
            <img class="m-auto rounded-xl" src="https://i.pravatar.cc/60?u= {{ $comment->user_id }}" alt="">
        </div>
        <div class="pl-3">
            <header class="mb-4">
                <h3 class="font-bold">{{ $comment->author->username }}</h3>
                <p class="text-xs">
                    Posted
                    <time datetime="2018-07-07">{{ $comment->created_at->diffForHumans() }}</time>
                </p>
            </header>
            <p>{{ $comment->body }}</p>
        </div>
    </article>
