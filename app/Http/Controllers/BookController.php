<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $query = Book::query();

        if ($request->search) {
        $query->where(function($q) use ($request) {
            $q->where('title', 'like', '%' . $request->search . '%')
              ->orWhere('author', 'like', '%' . $request->search . '%');
        });
    }

        if ($request->genre) {
            $query->where('genre', $request->genre);
        }

        $books = $query->get();
        
        if ($request->ajax()) {
        return response()->json($books);
    }

        return view('books.index', ['books' => $books]);
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'          => 'required|string|max:255',
            'author'         => 'required|string|max:255',
            'description'    => 'required',
            'genre'          => 'required',
            'published_year' => 'required|integer',
            'isbn'           => 'required|unique:books,isbn',
            'pages'          => 'required|integer',
            'language'       => 'required',
            'publisher'      => 'required',
            'price'          => 'required|numeric',
        ]);

        if ($request->hasFile('cover_image')) {
            $validated['cover_image'] = $request->file('cover_image')->store('covers', 'public');
        }

        $validated['is_available'] = $request->has('is_available');

        Book::create($validated);

        return redirect('/books');
    }

    public function show(Book $book)
    {
        return view('books.show', ['book' => $book]);
    }

    public function edit(Book $book)
    {
        return view('books.edit', ['book' => $book]);
    }

    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'title'          => 'required|string|max:255',
            'author'         => 'required|string|max:255',
            'description'    => 'required',
            'genre'          => 'required',
            'published_year' => 'required|integer',
            'isbn'           => 'required|unique:books,isbn,' . $book->id,
            'pages'          => 'required|integer',
            'language'       => 'required',
            'publisher'      => 'required',
            'price'          => 'required|numeric',
        ]);

        if ($request->hasFile('cover_image')) {
            $validated['cover_image'] = $request->file('cover_image')->store('covers', 'public');
        }

        $validated['is_available'] = $request->has('is_available');

        $book->update($validated);

        return redirect('/books');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect('/books');
    }
}