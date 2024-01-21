<x-layout>
    @foreach($posts as $post)
        <article>
            <h1>
                <a href="/posts/{{ $post->slug }}">{{$post->title}}</a>
            </h1>
            <span>Author: <b><a href="/authors/{{ $post->author->username }}">{{ $post->author->name }}</a></b></span>
            <p>
                <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a>
            </p>
            <div>
                {{ $post->excerpt }}
            </div>
        </article>
    @endforeach
</x-layout>

