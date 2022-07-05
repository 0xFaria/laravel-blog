<x-layout>
    @foreach ($posts as $post)
    <article>
        <h1><a href="/posts/{{$post->slug}}"><?= $post->title ?></a></h1>
    </article>

    <div>
        {{ $post->excerpt }}
    </div>
    @endforeach
</x-layout>
