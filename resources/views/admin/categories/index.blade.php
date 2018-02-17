@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Categories</div>

                <div class="panel-body">
                    @include('admin.message')
                    <a href="{{ route('create_category') }}" class="btn btn-primary pull-right" style="margin-bottom: 10px">Create new category</a>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Category Name</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if (isset($categories) && count($categories))
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->category_name }}</td>
                                    <td>{{ $category->created_at }}</td>
                                    <td>
                                        @include('admin.actions', [
                                            'remove' => route('remove_category', $category->id)
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
