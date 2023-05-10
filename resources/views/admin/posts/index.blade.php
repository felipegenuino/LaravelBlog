<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Gerenciador de posts') }}
        </h2>
    </x-slot>

    <div class=" pb-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class=" mb-2 p-5 flex justify-end overflow-hidden ">
                <a href="{{ route('admin.posts.create') }}" aria-label="Criar novo post" title="Criar novo post"
                    class="bg-indigo-600 hover:bg-indigo-500 text-white font-bold py-2 px-4 rounded inline-flex items-center">

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="fill-current w-4 h-4 mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    <span>Criar Post</span>
                </a>
            </div>



            @if(session('success'))
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-10">
                <div class="p-6 mt-10 bg-green-500 text-white rounded-lg shadow-lg">
                    {{ session('success') }}
                </div>
            </div>
            @endif

            @if(session('error'))
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-10">
                <div class="p-6 mt-10 bg-red-500 text-white rounded-lg shadow-lg">
                    {{ session('error') }}
                </div>
            </div>
            @endif

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">



                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Info
                                </th>
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
                                    Status
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Acões
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($posts as $post)


                                <tr class="dark:bg-gray-800 dark:border-gray-700  border  bg-white border-b ">

                                    <th scope="row"
                                    title=" {{ $post }}"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white cursor-pointer">
                                        <svg  class="w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z" />
                                          </svg>
                                    </th>
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
                                        {{ $post->published ? 'Publicado' : 'Rascunho' }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex gap-2">
                                            <a href="/posts/{{ $post->slug }}"
                                                aria-label="Acessar post {{ $post->title }}"
                                                title="Acessar post: {{ $post->title }}">

                                                <svg class="w-5" fill="none" stroke="currentColor"
                                                    stroke-width="1.5" viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25">
                                                    </path>
                                                </svg>
                                            </a>


                                            <a href="{{ route('admin.posts.edit', $post->id) }}"
                                                title="Editar post: {{ $post->title }}">
                                                <svg class="w-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                </svg>
                                            </a>

                                        </div>
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
