<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar: {{ $post->title }}') }}
        </h2>
    </x-slot>

    <div class=" pb-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 mt-10 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <form action="{{ route('admin.posts.update', $post->id) }}" method="post">
                    @csrf <!-- //token de segurança -->
                    @method('PUT')
                    <div class="w-full mb-6">
                        <label for="title" class="block text-white"> Titulo</label>
                        <input type="text" name="title" id="title" class="w-full rounded"  value="{{ $post->title }}" autofocus required>
                    </div>
                    <div class="w-full mb-6">
                        <label for="description" class="block text-white"> Description</label>
                        <input type="text" name="description" id="description" class="w-full rounded" required>
                    </div>

                    <div class="w-full mb-6">
                        <label for="content" class="block text-white"> Conteudo</label>
                        <textarea name="body" id="content" cols="40" rows="5" class="w-full rounded" required>{{ $post->description }}</textarea>
                    </div>

                    <div class="w-full mb-6 text-white">
                        <label for="" class="block"> Publicado:</label>
                        <input type="checkbox" class="form-control" name="published" id="published" @if ($post->published) checked @endif>
                    </div>

                    <div class="w-full flex justify-end">
                            <button type="submit"
                                class="bg-indigo-600 hover:bg-indigo-500 text-white font-bold py-2 px-4 rounded inline-flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="fill-current w-4 h-4 mr-2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 4.5v15m7.5-7.5h-15" />
                                <span>Atualizar</span>
                    </div>
                </form>

            </div>


        </div>


    </div>



    <div class="pt-4 pb-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        </div>
    </div>



</x-app-layout>
