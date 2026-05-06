<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ isset($book) ? __('Edit Buku') : __('Tambah Buku Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <a href="{{ route('books.index') }}" class="text-gray-500 hover:text-gray-800 dark:text-gray-400 dark:hover:text-gray-200 transition mb-6 inline-block">
                        &larr; Kembali ke Daftar
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

                    <form action="{{ isset($book) ? route('books.update', $book->id) : route('books.store') }}" method="POST" enctype="multipart/form-data" class="max-w-2xl">
                        @csrf
                        @if(isset($book))
                            @method('PUT')
                        @endif

                        <div class="mb-4">
                            <label for="title" class="block font-medium text-sm text-gray-700 dark:text-gray-300 mb-1">Judul Buku:</label>
                            <input type="text" name="title" id="title" value="{{ old('title', $book->title ?? '') }}" required 
                                class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full">
                        </div>

                        <div class="mb-4">
                            <label for="book_type_id" class="block font-medium text-sm text-gray-700 dark:text-gray-300 mb-1">Tipe Buku:</label>
                            <select name="book_type_id" id="book_type_id" required 
                                class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full">
                                <option value="">-- Pilih Tipe --</option>
                                @foreach($bookTypes as $type)
                                    <option value="{{ $type->id }}" {{ old('book_type_id', $book->book_type_id ?? '') == $type->id ? 'selected' : '' }}>
                                        {{ $type->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="synopsis" class="block font-medium text-sm text-gray-700 dark:text-gray-300 mb-1">Sinopsis:</label>
                            <textarea name="synopsis" id="synopsis" rows="5" required 
                                class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full">{{ old('synopsis', $book->synopsis ?? '') }}</textarea>
                        </div>

                        <div class="mb-6">
                            <label for="image" class="block font-medium text-sm text-gray-700 dark:text-gray-300 mb-1">Sampul Buku (Gambar):</label>
                            <input type="file" name="image" id="image" accept="image/*" 
                                class="w-full text-sm text-gray-500 dark:text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 dark:file:bg-gray-700 dark:file:text-gray-300">
                            <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Format: jpg, jpeg, png. Maks: 2MB</p>
                            @if(isset($book) && $book->image)
                                <div class="mt-2">
                                    <p class="text-sm text-gray-500">Sampul saat ini:</p>
                                    <img src="{{ asset('storage/' . $book->image) }}" alt="Cover" class="w-32 h-auto mt-1 rounded shadow">
                                </div>
                            @endif
                        </div>

                        <button type="submit" class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white font-bold rounded-md transition duration-150 ease-in-out">
                            {{ isset($book) ? 'Simpan Perubahan' : 'Simpan Buku' }}
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>