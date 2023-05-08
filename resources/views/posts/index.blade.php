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
    <div class=" grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">



        @forelse ($posts as $post)
            <div
                class="  flex-col scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">

                <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white"> {{ $post->title }}</h2>
                <em>Criado em {{ $post->created_at->diffForHumans() }}</em>
                <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed"> {{ $post->body }}</p>
                <a class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500"
                    href="/posts/{{ $post->slug }}" aria-label="Acessar post {{ $post->title }}">
                    Acessar post
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        class="self-center shrink-0 stroke-red-500 w-6 h-6 mx-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                    </svg>
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
