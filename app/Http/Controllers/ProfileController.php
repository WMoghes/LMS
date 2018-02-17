<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
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
        return redirect()->route('edit_profile', Auth::user()->id)
            ->withStatus("User ({$request->name}) has been updated successfully.");
    }

    public function edit($id)
    {
        CheckVariableIfNullOrEmptyRedirectTo($id, 'users');
        $user = User::findOrFail($id);
        return view('user_profile', compact('user'));

    }
}
