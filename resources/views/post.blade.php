<x-layout>
    <article>
        <h1>{{$post->title}}</h1>
        <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a>
        <div>{!! $post->body !!} </div>
        <a href="/">Go back</a>
    </article>
</x-layout>

