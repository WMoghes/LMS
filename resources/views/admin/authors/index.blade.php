@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Authors</div>

                <div class="panel-body">
                    @include('admin.message')
                    <a href="{{ route('create_author') }}" class="btn btn-primary pull-right" style="margin-bottom: 10px">Create new author</a>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Author Name</th>
                            <th>Location</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if (isset($authors) && count($authors))
                            @foreach($authors as $author)
                                <tr>
                                    <td>{{ $author->id }}</td>
                                    <td>{{ $author->author_name }}</td>
                                    <td>{{ $author->location }}</td>
                                    <td>{{ $author->created_at }}</td>
                                    <td>
                                        @include('admin.actions', [
                                            'edit' => route('edit_author', $author->id),
                                            'remove' => route('remove_author', $author->id)
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
    </div>
@endsection
