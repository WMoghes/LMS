@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Search</div>

                <div class="panel-body">
                    @if (isset($myLists) && count($myLists))
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Code</th>
                                <th>Book Title</th>
                                <th>Author Name</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($myLists as $item)
                                <tr>
                                    <td>{{ $item->book->code }}</td>
                                    <td>
                                        <a href="{{ route('show_book', $item->book->id) }}">
                                            {{ $item->book->title }}
                                        </a>
                                    </td>
                                    <td>{{ $item->book->author->author_name }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <h3>There's no data right now.</h3>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
