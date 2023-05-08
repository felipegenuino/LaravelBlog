@forelse ($posts as $post)
    <div>
        <h1>post: {{ $post->title }}</h1>
        <em>Criado em {{ $post->created_at->diffForHumans() }}</em>
        <hr>
        <pre>
            {{ $post->id }}
            {{ $post->title }}
            {{ $post->content }}
            {{ $post->body }}
            {{ $post->slug }}
            {{ $post->published }}
            {{ $post->thumbnail }}
            {{ $post->created_at }}
            {{ $post->updated_at }}
        </pre>
    </div>
@empty
    <h3>Nenhum post encontrado</h3>
@endforelse