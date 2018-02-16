@extends('layouts.app')

@section('content')
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">Users</div>

            <div class="panel-body">
                @include('admin.message')
                <a href="{{ route('create_user') }}" class="btn btn-primary pull-right" style="margin-bottom: 10px">Create new user</a>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Blocked</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if (isset($users) && count($users))
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ getRole($user->role_id) }}</td>
                                <td>{{ getBlocked($user->isBlocked) }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td>
                                    @if ($user->role_id == 2)
                                        @include('admin.actions', [
                                            'edit' => route('edit_user', $user->id),
                                            'remove' => route('remove_user', $user->id),
                                            'makeAdmin' => route('make_admin_user', $user->id),
                                            'removeBlock' => route('make_block', $user->id),
                                            'BlockStatus' => $user->isBlocked
                                        ])
                                    @else
                                        @include('admin.actions', [
                                            'edit' => route('edit_user', $user->id),
                                            'remove' => route('remove_user', $user->id),
                                            'removeAdmin' => route('make_admin_user', $user->id),
                                            'removeBlock' => route('make_block', $user->id),
                                            'BlockStatus' => $user->isBlocked
                                        ])
                                    @endif
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
