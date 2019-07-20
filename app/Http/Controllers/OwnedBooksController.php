<?php

namespace App\Http\Controllers;

use App\OwnedBooks;
use Illuminate\Http\Request;

class OwnedBooksController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $OwnedBooks = auth()->user()->books;

        return view('owned-books.index', compact('OwnedBooks'));
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'title' => ['required', 'min:3', 'max:255'],
            'author' => [],
            'description' => [],
            'category' => [],
            'image_link' => [],
            'preview_link' => ['required', 'min:3', 'max:255'],
         ]);

        $attributes['owner_id'] = auth()->id();

        OwnedBooks::create($attributes);

        return redirect('/owned-books');
    }

    public function destroy(OwnedBooks $owned_book)
    {
        $this->authorize('delete', $owned_book);

        $owned_book->delete();

        return redirect('/owned-books');
    }
}
