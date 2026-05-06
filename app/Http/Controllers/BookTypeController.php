<?php

namespace App\Http\Controllers;

use App\Models\BookType;
use Illuminate\Http\Request;

class BookTypeController extends Controller
{
    // Menampilkan semua data (READ)
    public function index()
    {
        $bookTypes = BookType::all();
        return view('book-types.index', compact('bookTypes'));
    }

    // Menampilkan form tambah data (CREATE)
    public function create()
    {
        return view('book-types.form');
    }

    // Menyimpan data baru ke database (STORE)
    public function store(Request $request)
    {
        // Masukkan hasil validasi ke dalam variabel $validated
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Gunakan variabel $validated, BUKAN $request->all()
        BookType::create($validated);
        return redirect()->route('book-types.index')->with('success', 'Tipe buku berhasil ditambahkan!');
    }

    // Menampilkan form edit data (EDIT)
    public function edit(BookType $bookType)
    {
        return view('book-types.form', compact('bookType'));
    }

    // Memperbarui data di database (UPDATE)
    public function update(Request $request, BookType $bookType)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Gunakan variabel $validated
        $bookType->update($validated);
        return redirect()->route('book-types.index')->with('success', 'Tipe buku berhasil diperbarui!');
    }
    // Menghapus data (DELETE)
    public function destroy(BookType $bookType)
    {
        $bookType->delete();
        return redirect()->route('book-types.index')->with('success', 'Tipe buku berhasil dihapus!');
    }
}