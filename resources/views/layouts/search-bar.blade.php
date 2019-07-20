<div class="card-body">
    <form method="POST" action="/search-book">
        @csrf

        <div class="form-group row">
            <label class="col-md-4 col-form-label text-md-right" for="title">Title</label>

            <div class="col-md-6">
                <input
                        type="text"
                        class="form-control {{$errors->has('title') ? 'is-danger' : ''}}"
                        name="title"
                        value="{{old('title')}}"
                        required>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-4 col-form-label text-md-right" for="author">Author</label>

            <div class="col-md-6">
                <input
                        type="text"
                        class="form-control {{$errors->has('author') ? 'is-danger' : ''}}"
                        name="author"
                        value="{{old('author')}}">
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-8 offset-md-6">
                <button type="submit" class="btn btn-primary">
                    Search
                </button>
            </div>
        </div>
    </form>
</div>