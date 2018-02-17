@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Search</div>

                <div class="panel-body">
                    @include('admin.message')
                    <form action="{{ route('get_result') }}" method="get">
                        <label for="code" class="col-md-2 control-label">Book Code</label>

                        <div class="col-md-4">
                            <input id="code" type="text" class="form-control" name="code" value="{{ CheckVariables(session('code')) }}">
                        </div>

                        <label for="title" class="col-md-2 control-label">Book Title</label>

                        <div class="col-md-4">
                            <input id="title" type="text" class="form-control" name="title" value="{{ CheckVariables(session('title')) }}">
                        </div>

                        <label for="author_name" class="col-md-2 control-label">Author Name</label>

                        <div class="col-md-4">
                            @if (isset($authors) && count($authors))
                                <select class="form-control" id="author_name" name="author_name">
                                    <option value="">All</option>
                                    @foreach($authors as $author)
                                        <option {{ CheckVariables(session('author_name')) == $author->id ? 'selected' : null }}
                                                value="{{ $author->id }}">{{ $author->author_name }}</option>
                                    @endforeach
                                </select>
                            @endif
                        </div>

                        <label for="category_name" class="col-md-2 control-label">Category Name</label>

                        <div class="col-md-4">
                            @if (isset($categories) && count($categories))
                                <select class="form-control" id="category_name" name="category_name">
                                    <option value="">All</option>
                                    @foreach($categories as $category)
                                        <option {{ CheckVariables(session('category_name')) == $category->id ? 'selected' : null }}
                                                value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            @endif
                        </div>

                        <div class="form-group">
                            <div class="col-md-2 col-md-offset-10">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn"></i> Search
                                </button>
                            </div>
                        </div>
                    </form>


                    @if (isset($result) && count($result))
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Code</th>
                                <th>Book Title</th>
                                <th>Author Name</th>
                                <th>Category Name</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($result as $item)
                                <tr>
                                    <td>{{ $item->code }}</td>
                                    <td>
                                        <a href="{{ route('show_book', $item->id) }}">
                                            {{ $item->title }}
                                        </a>
                                    </td>
                                    <td>{{ $item->author->author_name }}</td>
                                    <td>{{ $item->category->category_name }}</td>
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
