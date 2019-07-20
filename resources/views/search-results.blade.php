@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Search a book!</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @include('layouts.search-bar')

                        @foreach($books as $book)
                            <div class="card" style="margin-bottom: 2em">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            @if(array_key_exists('imageLinks', $book['volumeInfo']))<img class="card-img" src="{{$book['volumeInfo']['imageLinks']['thumbnail']}}">@endif
                                        </div>
                                        <div class="col-sm-8">
                                            <a href="{{$book['volumeInfo']['previewLink']}}" target="_blank"><h5 class="card-title">{{$book['volumeInfo']['title']}}</h5></a>
                                            @if(array_key_exists('authors', $book['volumeInfo']))<h6 class="card-subtitle mb-2 text-muted">{{$book['volumeInfo']['authors'][0]}}</h6>@endif
                                            @if(array_key_exists('description', $book['volumeInfo']))<p class="card-body">{{$book['volumeInfo']['description']}}</p>@endif
                                        </div>
                                    </div>
                                    @if(auth()->id())
                                    <a class="btn btn-primary" onClick="event.preventDefault();
                                                     document.getElementById('book-form {{$book['id']}}').submit();">Add to my collection</a>
                                    @endif
                                    <form id="book-form {{$book['id']}}" action="/owned-books" method="POST">
                                        @csrf
                                        <input type="hidden" name="title" value="{{$book['volumeInfo']['title']}}"/>
                                        @if(array_key_exists('authors', $book['volumeInfo']))<input type="hidden" name="author" value="{{$book['volumeInfo']['authors'][0]}}"/>@endif
                                        @if(array_key_exists('description', $book['volumeInfo']))<input type="hidden" name="description" value="{{$book['volumeInfo']['description']}}"/>@endif
                                        @if(array_key_exists('categories', $book['volumeInfo']))<input type="hidden" name="category" value="{{$book['volumeInfo']['categories'][0]}}"/>@endif
                                        @if(array_key_exists('imageLinks', $book['volumeInfo']))<input type="hidden" name="image_link" value="{{$book['volumeInfo']['imageLinks']['thumbnail']}}"/>@endif
                                        <input type="hidden" name="preview_link" value="{{$book['volumeInfo']['previewLink']}}"/>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection