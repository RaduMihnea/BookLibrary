<?php

namespace App\Http\Controllers;

use App\OwnedBooks;
use Illuminate\Http\Request;

class OwnedBooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return auth()->id();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OwnedBooks  $ownedBooks
     * @return \Illuminate\Http\Response
     */
    public function show(OwnedBooks $ownedBooks)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OwnedBooks  $ownedBooks
     * @return \Illuminate\Http\Response
     */
    public function destroy(OwnedBooks $ownedBooks)
    {
        //
    }
}
