@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Books</div>

                    <div class="panel-body">
                        <a href="#" class="btn btn-primary pull-right" style="margin-bottom: 10px">Create new book</a>
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
                            <tr>
                                <td>John</td>
                                <td>Doe</td>
                                <td>john@example.com</td>
                                <td>john</td>
                                <td>5</td>
                                <td>20</td>
                                <td>john</td>
                                <td>john@example.com</td>
                                <td>
                                    @include('admin.actions', [
                                        'show' => '#',
                                        'edit' => '#',
                                        'remove' => '#'
                                    ])
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
