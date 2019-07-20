<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class AllBooksController extends Controller
{

    public function post()
    {
        request()->validate([
            'title' => ['required', 'min:3'],
            'author' => []
        ]);

        $client = new Client();

        $result = $client->get('https://www.googleapis.com/books/v1/volumes' , [
            'query' => [
                'q' =>  request('title'),
                'key' => config('services.google.key'),
                'inauthor' => request('author'),
            ]
        ]);

        $books = JSON_decode($result->getBody(), true)['items'];

        return view('search-results', compact('books'));
    }
}
