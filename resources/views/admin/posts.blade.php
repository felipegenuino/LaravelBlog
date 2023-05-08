<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Gerenciador de posts') }}
        </h2>
    </x-slot>




    <div class="pt-12 pb-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">



                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    ID
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Titulo
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Criado em
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Acões
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($posts as $post)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $post->id }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $post->title }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $post->created_at->diffForHumans() }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="/posts/{{ $post->slug }}"
                                            aria-label="Acessar post {{ $post->title }}"
                                            title="Acessar post: {{ $post->title }}">

                                            <svg class="w-5" fill="none" stroke="currentColor" stroke-width="1.5"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                                aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25">
                                                </path>
                                            </svg>
                                    </td>
                                </tr>
                            @empty
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td class="px-6 py-4">
                                        Nenhum post encontrado
                                    </td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>


        </div>


    </div>



    <div class="pt-4 pb-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                {{ $posts->links() }}
            </div>
        </div>
    </div>



</x-app-layout>
