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
        $books = Book::with('bookType')->get();

        return view('books.index', compact('books'));
    }

    public function create()
    {
        $bookTypes = BookType::get();
        return view('books.form', compact('bookTypes'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'book_type_id' => 'required|integer',
            'title' => 'required|string|max:255',
            'synopsis' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('books', 'public');
        }

        Book::create($validated);

        return redirect()->route('books.index')->with('success', 'Buku berhasil ditambahkan.');
    }

    public function show(string $id) {}

    public function edit(Book $book)
    {
        $bookTypes = BookType::get();
        return view('books.form', compact('book', 'bookTypes'));
    }

    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'book_type_id' => 'required|integer',
            'title' => 'required|string|max:255',
            'synopsis' => 'required|string', // Hapus max:255 agar bisa menampung teks panjang
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        if ($request->hasFile('image')) {
            if ($book->image && Storage::disk('public')->exists($book->image)) {
                Storage::disk('public')->delete($book->image);
            }

            $validated['image'] = $request->file('image')->store('books', 'public');
        }

        //method untuk mengubah data
        $book->update($validated);
        return redirect()->route('books.index')->with('success', 'Book berhasil diupdate.');
    }

    public function destroy(Book $book)
    {
        if ($book->image && Storage::disk('public')->exists($book->image)) {
            Storage::disk('public')->delete($book->image);
        }

        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book berhasil dihapus.');
    }
}