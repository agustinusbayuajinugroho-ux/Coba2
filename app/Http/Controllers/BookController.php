<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index()
    {
        // Mengambil semua buku beserta relasi tipe bukunya
        $books = Book::with('bookType')->get();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        // Mengambil data tipe buku untuk pilihan dropdown
        $bookTypes = BookType::all();
        return view('books.form', compact('bookTypes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'book_type_id' => 'required|exists:book_types,id',
            'synopsis' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->except(['_token', '_method']);

        // Logika upload gambar
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('books', 'public');
        }

        Book::create($data);
        return redirect()->route('books.index')->with('success', 'Buku berhasil ditambahkan!');
    }

    public function edit(Book $book)
    {
        $bookTypes = BookType::all();
        return view('books.form', compact('book', 'bookTypes'));
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'book_type_id' => 'required|exists:book_types,id',
            'synopsis' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->except(['_token', '_method']);

        // Logika update gambar (hapus gambar lama, simpan yang baru)
        if ($request->hasFile('image')) {
            if ($book->image) {
                Storage::disk('public')->delete($book->image);
            }
            $data['image'] = $request->file('image')->store('books', 'public');
        }

        $book->update($data);
        return redirect()->route('books.index')->with('success', 'Data buku berhasil diperbarui!');
    }

    public function destroy(Book $book)
    {
        // Hapus gambar dari storage jika ada
        if ($book->image) {
            Storage::disk('public')->delete($book->image);
        }
        
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Buku berhasil dihapus!');
    }
}