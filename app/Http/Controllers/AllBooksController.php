<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class AllBooksController extends Controller
{

    public function post()
    {
        request()->validate(['title' => ['required', 'min:3'],]);

        $client = new Client();

        $query = [
            'q' =>  request('title'),
            'key' => config('services.google.key'),
        ];

        if(request()->has('author')){$query['inauthor'] = request('author');}

        $result = $client->get('https://www.googleapis.com/books/v1/volumes' , [ 'query' => $query]);

        $books = JSON_decode($result->getBody(), true)['items'];

        return view('search-results', compact('books'));

    }
}
