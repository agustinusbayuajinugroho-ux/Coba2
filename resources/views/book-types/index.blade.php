<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Daftar Tipe Buku') }}
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
                    <div class="mb-6 flex flex-col items-start gap-4">
                        <a href="{{ route('books.index') }}" class="text-gray-500 hover:text-gray-800 dark:text-gray-400 dark:hover:text-gray-200 transition">
                            &larr; Kembali ke Daftar Buku
                        </a>
                        <a href="{{ route('book-types.create') }}" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold rounded-md transition duration-150 ease-in-out">
                            + Tambah Tipe Buku
                        </a>
                    </div>

                    <!-- Tabel Data -->
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-gray-200 dark:bg-gray-700">
                                    <th class="p-4 border-b dark:border-gray-600">No</th>
                                    <th class="p-4 border-b dark:border-gray-600">Nama Tipe</th>
                                    <th class="p-4 border-b dark:border-gray-600">Deskripsi</th>
                                    <th class="p-4 border-b dark:border-gray-600">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($bookTypes as $index => $type)
                                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50">
                                        <td class="p-4 border-b dark:border-gray-700">{{ $index + 1 }}</td>
                                        <td class="p-4 border-b dark:border-gray-700 font-bold">{{ $type->name }}</td>
                                        <td class="p-4 border-b dark:border-gray-700">{{ $type->description }}</td>
                                        <td class="p-4 border-b dark:border-gray-700">
                                            <a href="{{ route('book-types.edit', $type->id) }}" class="text-blue-500 hover:text-blue-700 dark:hover:text-blue-400 mr-3 font-semibold">Edit</a>  
                                            
                                            <form action="{{ route('book-types.destroy', $type->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:text-red-700 dark:hover:text-red-400 font-semibold" onclick="return confirm('Hapus tipe buku ini?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="p-4 text-center text-gray-500 dark:text-gray-400">Belum ada data tipe buku.</td>
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