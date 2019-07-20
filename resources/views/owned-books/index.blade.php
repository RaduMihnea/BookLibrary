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

                        @foreach($OwnedBooks as $book)
                            <div class="card" style="margin-bottom: 2em">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            @if($book->image_link)<img class="card-img" src="{{$book->image_link}}">@endif
                                        </div>
                                        <div class="col-sm-8">
                                            <a href="{{$book->preview_link}}" target="_blank"><h5 class="card-title">{{$book->title}}</h5></a>
                                            @if($book->author)<h6 class="card-subtitle mb-2 text-muted">{{$book->author}}</h6>@endif
                                            @if($book->description)<p class="card-body">{{$book->description}}</p>@endif
                                        </div>
                                    </div>
                                    @if(auth()->id())
                                        <a class="btn btn-primary" onClick="event.preventDefault();
                                                     document.getElementById('book-form {{$book->id}}').submit();">Delete from my collection</a>
                                    @endif
                                    <form id="book-form {{$book->id}}"  method="POST" action="/owned-books/{{$book->id}}">
                                        @method('DELETE')
                                        @csrf
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