<x-layout>
    <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
        <section>
            <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
                <div class="col-span-4 lg:text-center lg:pt-14 mb-10">
                    <img src="{{ asset("/storage/{$post->thumbnail}") }}" alt="" class="rounded-xl">

                    <p class="mt-4 block text-gray-400 text-xs">
                        Published
                        <time>{{ $post->created_at->diffForHumans() }}</time>
                    </p>

                    <div class="flex items-center lg:justify-center text-sm mt-4">
                        <img src="/images/lary-avatar.svg" alt="Lary avatar">
                        <div class="ml-3 text-left">
                            <h5 class="font-bold">
                                <a href="/?author={{ $post->author->username }}">
                                    {{ $post->author->name }}
                                </a>
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="col-span-8">
                    <div class="hidden lg:flex justify-between mb-6">
                        <a href="/"
                           class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-blue-500">
                            <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                                <g fill="none" fill-rule="evenodd">
                                    <path stroke="#000" stroke-opacity=".012" stroke-width=".5"
                                          d="M21 1v20.16H.84V1z">
                                    </path>
                                    <path class="fill-current"
                                          d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                                    </path>
                                </g>
                            </svg>

                            Back to Posts
                        </a>

                        <div class="space-x-2">
                            <a href="{{ $post->category->slug }}"
                               class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold"
                               style="font-size: 10px">{{ $post->category->name }}</a>
                        </div>
                    </div>

                    <h1 class="font-bold text-3xl lg:text-4xl mb-10">
                        {!! $post->title !!}
                    </h1>

                    <div class="space-y-4 lg:text-lg leading-loose">
                        {!!  $post->body !!}
                    </div>
                </div>
                <section class="col-span-8 col-start-5 mt-3 space-y-6">
                    @auth()
                        <form method="POST" action="/posts/{{ $post->slug }}/comments" class="border-gray-200  rounded-xl">
                            @csrf
                            <div class="flex-column items-center bg-gray-100 p-6 space-y-3 rounded-xl">
                                <img class="rounded-full h-10 w-10 object-cover"
                                     src="{{ 'https://i.pravatar.cc/60?u=' . auth()->id() }}"
                                     alt="avatar"/>
                                <span>{{ auth()?->user()->name }}</span>
                                <div class="flex-1">
                                    <label>
                                    <textarea
                                        name="body"
                                        rows="2"
                                        required
                                        class="w-full py-3 border border-gray-200 rounded-xl resize-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500 text-sm"
                                        placeholder="Add your comment here">
                                    </textarea>
                                    </label>
                                    @error('body')
                                        <span class="text-xs text-red-500" > {{ $message }} </span>
                                    @enderror
                                </div>
                                <div class="flex justify-end ">
                                    <button type="submit"
                                            class="mt-3 px-5 py-2 rounded-xl bg-blue-500 text-white text-sm hover:bg-blue-600 transition ease-in-out duration-200">
                                        Post Comment
                                    </button>
                                </div>

                            </div>
                        </form>
                        @else
                        <p>
                            <a href="/register">
                                <b class="text-blue-500 hover:underline">Register</b>
                            </a> or
                            <a href="/login">
                                <b class="text-blue-500 hover:underline">login</b>
                            </a>to leave a comment!
                        </p>
                    @endauth
                    @foreach($post->comments as $comment)
                        <x-post-comment :comment="$comment"></x-post-comment>
                    @endforeach
                    @if(!$post->comments->count())
                        <h4 class="p-3 bg-gray-200 rounded-xl">No comments eat!</h4>
                    @endif
                </section>
            </article>
        </section>
    </main>
</x-layout>

