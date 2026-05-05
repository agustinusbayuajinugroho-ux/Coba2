<?php

namespace App\Http\Controllers;

use App\Models\BookType;
use Illuminate\Http\Request;

class BookTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $bookTypes = BookType::get();
        $bookTypes = BookType::paginate(5);

        return view('book-types.index', compact('bookTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('book-types.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validation
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        BookType::create($validated);

        return redirect()->route('book-types.index')->with('success', 'Tipe Buku berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BookType $bookType)
    {
        return view('book-types.form', compact('bookType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BookType $bookType)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        $bookType->update($validated);
        return redirect()->route('book-types.index')->with('success', 'Tipe Buku berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BookType $bookType)
    {
        $bookType->delete();
        return redirect()->route('book-types.index')->with('success', 'Tipe Buku berhasil dihapus.');
    }
}
