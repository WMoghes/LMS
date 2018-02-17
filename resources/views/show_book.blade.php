@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Display Book - {{ $book->title }}</div>
                <div class="panel-body">
                    <div class="col-sm-9">
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <td>Title</td>
                                <td>{{ $book->title }}</td>
                            </tr>

                            <tr>
                                <td>Code</td>
                                <td>{{ $book->code }}</td>
                            </tr>

                            <tr>
                                <td>Edition</td>
                                <td>{{ $book->edition }}</td>
                            </tr>

                            <tr>
                                <td>Price</td>
                                <td>{{ $book->price }}</td>
                            </tr>

                            <tr>
                                <td>Author Name</td>
                                <td>{{ $book->author->author_name }}</td>
                            </tr>

                            <tr>
                                <td>Category Name</td>
                                <td>{{ $book->category->category_name }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="col-sm-3">
                        <img src="{{ CheckVariables($book->image_name) ? getImage($book->image_name) : getDefaultImage() }}"
                             alt="{{ $book->title }}" height="500"
                             width="400" class="img-responsive">
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            @if (isset($userList) && count($userList))
                                <h4>This book in your list</h4>
                            @else
                                <a href="{{ route('borrow_book', $book->id) }}" class="btn btn-primary">
                                    Borrow this book
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
