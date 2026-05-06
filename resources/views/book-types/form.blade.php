<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ isset($bookType) ? __('Edit Tipe Buku') : __('Tambah Tipe Buku') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <a href="{{ route('book-types.index') }}" class="text-gray-500 hover:text-gray-800 dark:text-gray-400 dark:hover:text-gray-200 transition mb-6 inline-block">
                        &larr; Kembali
                    </a>

                    <!-- Notifikasi Error -->
                    @if ($errors->any())
                        <div class="mb-6 p-4 bg-red-100 text-red-700 dark:bg-red-900 dark:text-red-300 rounded-md">
                            <ul class="list-disc pl-5">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ isset($bookType) ? route('book-types.update', $bookType->id) : route('book-types.store') }}" method="POST" class="max-w-2xl">
                        @csrf
                        @if(isset($bookType))
                            @method('PUT')
                        @endif

                        <div class="mb-4">
                            <label for="name" class="block font-medium text-sm text-gray-700 dark:text-gray-300 mb-1">Nama Tipe:</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $bookType->name ?? '') }}" required 
                                class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full">
                        </div>

                        <div class="mb-6">
                            <label for="description" class="block font-medium text-sm text-gray-700 dark:text-gray-300 mb-1">Deskripsi:</label>
                            <textarea name="description" id="description" rows="4" 
                                class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full">{{ old('description', $bookType->description ?? '') }}</textarea>
                        </div>

                        <button type="submit" class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white font-bold rounded-md transition duration-150 ease-in-out">
                            {{ isset($bookType) ? 'Simpan Perubahan' : 'Simpan' }}
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>