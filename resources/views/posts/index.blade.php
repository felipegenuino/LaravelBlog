@vite(['resources/css/app.css', 'resources/js/app.js'])


<div
    class=" bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
    @if (Route::has('login'))
        <div class="p-6 text-right">
            @auth
                <a href="{{ url('/dashboard') }}"
                    class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
            @else
                <a href="{{ route('login') }}"
                    class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                    in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                        class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                @endif
            @endauth
        </div>
    @endif
</div>



<div class=" max-w-7xl mx-auto p-6 lg:p-8">
    <h1 class="text-4xl mb-5 font-bold text-gray-900 dark:text-dark">Blog</h1>

    <div class=" grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">

        @forelse ($posts as $post)
            <div
                class="flex-col p-8 scale-100  border border-current via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">

                <h2 class="mt-6 text-xl font-semibold text-gray-900 "> {{ $post->title }}</h2>
                <em>Criado em {{ $post->created_at->diffForHumans() }}</em>
                <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed"> {{ $post->body }}</p>
                <a class="mt-2"
                    href="/posts/{{ $post->slug }}" aria-label="Acessar post {{ $post->title }}">
                    Acessar post

                </a>



                {{-- <pre>
            {{ $post->id }}
            {{ $post->title }}
            {{ $post->content }}
            {{ $post->body }}
            {{ $post->slug }}
            {{ $post->published }}
            {{ $post->thumbnail }}
            {{ $post->created_at }}
            {{ $post->updated_at }}
        </pre> --}}
            </div>
        @empty
            <h3>Nenhum post encontrado</h3>
        @endforelse

    </div>



</div>

<div class="p-6 text-right">
    {{ $posts->links() }}
</div>
