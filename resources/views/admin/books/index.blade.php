@extends('layouts.app')

@section('content')
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">Books</div>

            <div class="panel-body">
                @include('admin.message')
                <a href="{{ route('create_book') }}" class="btn btn-primary pull-right" style="margin-bottom: 10px">Create new book</a>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Code</th>
                        <th>Title</th>
                        <th>Author Name</th>
                        <th>Category Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>

                        @if (isset($books) && count($books))
                            @foreach($books as $book)
                                <tr>
                                    <td>{{ $book->code }}</td>
                                    <td>{{ $book->title }}</td>
                                    <td>{{ $book->author_id }}</td>
                                    <td>{{ $book->category_id }}</td>
                                    <td>{{ $book->price }}</td>
                                    <td>{{ $book->quantity }}</td>
                                    <td>{{ $book->status }}</td>
                                    <td>{{ $book->created_at }}</td>
                                    <td>
                                        @include('admin.actions', [
                                            'edit' => route('edit_book', $book->id),
                                            'remove' => route('remove_book', $book->id)
                                        ])
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <h3>There's no data right now.</h3>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
