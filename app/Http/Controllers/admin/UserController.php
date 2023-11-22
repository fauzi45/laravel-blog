<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::get();
        return view('admin.user.index', compact('users'));
    }
    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|min:3|max:100',
            'email' => 'required|email',
            'role' => 'required'
        ]);

        if ($request->input('password')) {
            $password = bcrypt($request->password);
        } else {
            $password = bcrypt('1234');
        }
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => $password,
        ]);

        return redirect()->route('users.index')->with('success', 'Tag berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $user = User::findorfail($id);
        return view('admin.user.update', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|min:3|max:100',
            'role' => 'required'
        ]);

        if ($request->input('password')) {
            $user_data = [
                'name' => $request->name,
                'role' => $request->role,
                'password' => $request->password,
            ];
        } else {
            $user_data = [
                'name' => $request->name,
                'role' => $request->role,
            ];
        }

        $user = User::findorfail($id);
        $user->update($user_data);
        
        return redirect()->route('users.index')->with('success', 'User berhasil diubah!');
    }
}
