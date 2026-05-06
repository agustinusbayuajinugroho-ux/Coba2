<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Daftar Koleksi Buku') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <!-- Notifikasi Sukses -->
                    @if (session('success'))
                        <div class="mb-6 p-4 bg-green-100 text-green-700 dark:bg-green-900 dark:text-green-300 rounded-md">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Tombol Aksi -->
                    <div class="mb-6 flex space-x-4">
                        <a href="{{ route('books.create') }}" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold rounded-md transition duration-150 ease-in-out">
                            + Tambah Buku Baru
                        </a>
                        <a href="{{ route('book-types.index') }}" class="px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white text-sm font-bold rounded-md transition duration-150 ease-in-out">
                            Kelola Tipe Buku
                        </a>
                    </div>

                    <!-- Tabel Data -->
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-gray-200 dark:bg-gray-700">
                                    <th class="p-4 border-b dark:border-gray-600">No</th>
                                    <th class="p-4 border-b dark:border-gray-600">Sampul</th>
                                    <th class="p-4 border-b dark:border-gray-600">Judul Buku</th>
                                    <th class="p-4 border-b dark:border-gray-600">Tipe</th>
                                    <th class="p-4 border-b dark:border-gray-600">Sinopsis</th>
                                    <th class="p-4 border-b dark:border-gray-600">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($books as $index => $book)
                                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50">
                                        <td class="p-4 border-b dark:border-gray-700">{{ $index + 1 }}</td>
                                        <td class="p-4 border-b dark:border-gray-700">
                                            @if($book->image)
                                                <img src="{{ asset('storage/' . $book->image) }}" alt="Cover" class="w-20 h-auto rounded shadow">
                                            @else
                                                <span class="text-gray-400 italic">No Image</span>
                                            @endif
                                        </td>
                                        <td class="p-4 border-b dark:border-gray-700 font-bold">{{ $book->title }}</td>
                                        <td class="p-4 border-b dark:border-gray-700 font-bold">{{ $book->bookType->name }}</td>
                                        <td class="p-4 border-b dark:border-gray-700 max-w-xs">{{ Str::limit($book->synopsis, 100) }}</td>
                                        <td class="p-4 border-b dark:border-gray-700">
                                            <a href="{{ route('books.edit', $book->id) }}" class="text-blue-500 hover:text-blue-700 dark:hover:text-blue-400 mr-3 font-semibold">Edit</a>  
                                            
                                            <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:text-red-700 dark:hover:text-red-400 font-semibold" onclick="return confirm('Hapus buku ini?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="p-4 text-center text-gray-500 dark:text-gray-400">Belum ada koleksi buku.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>