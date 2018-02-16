<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create_user');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'address' => $request->address,
            'birthdate' => $request->birthdate,
            'password' => bcrypt($request->password),
            'role_id' => $request->isAdmin ? 1 : 2,
        ]);

        return redirect()->route('users')
            ->withStatus("New user ({$request->name}) has been added successfully.");
    }

    public function update(Request $request, $id)
    {
        CheckVariableIfNullOrEmptyRedirectTo($id, 'users');
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'address' => $request->address,
            'birthdate' => $request->birthdate,
            'password' => bcrypt($request->password),
            'role_id' => $request->isAdmin ? 1 : 2,
        ];
        if (! $request->password)
            $data = array_except($data, ['password']);

        User::findOrFail($id)->update($data);
        return redirect()->route('users')
            ->withStatus("User ({$request->name}) has been updated successfully.");
    }

    public function edit($id)
    {
        CheckVariableIfNullOrEmptyRedirectTo($id, 'users');
        $user = User::findOrFail($id);
        return view('admin.users.edit_user', compact('user'));

    }

    public function makeAdmin($id)
    {
        $user = User::findOrFail($id);
        $user->role_id = $user->role_id == 1 ? 2 : 1;
        $user->update();

        return redirect()->route('users')->withStatus('The user permission has been updated');
    }

    public function remove($id)
    {
        CheckVariableIfNullOrEmptyRedirectTo($id, 'users');
        User::findOrFail($id)->delete();
        return redirect()->route('users')->withStatus('The user has been deleted');
    }

    public function makeBlock($id)
    {
        $user = User::findOrFail($id);
        $user->isBlocked = $user->isBlocked == 0 ? 1 : 0;
        $user->update();

        return redirect()->route('users')->withStatus('The user Blocked Status has been updated');
    }

}
