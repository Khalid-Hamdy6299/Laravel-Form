<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function all()
    {
        $users = User::get();
        return view('User.All', compact('users'));
    }

    public function show($id)
    {
        $user = User::findorfail($id);
        return view('User.show', compact('user'));
    }

    public function add()
    {
        $users = User::get();
        return view('User.add', compact('users'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'type' => 'required|in:admin,it.dbh,hr.dbh',
            'password' => 'required|string'
        ]);

        User::create($data);
        session()->flash('success', 'User Added Successfuly');
        return redirect(route('All_Users'));
    }

    public function edit($id)
    {
        $user = User::findorfail($id);
        return view('User.edit', compact('user'));
    }

    public function update($id, Request $request)
    {
        $user = User::findorfail($id);
        $data = $request->validate([
            'name' => 'string',
            'email' => 'email',
            'type' => 'required|in:admin,it.dbh,hr.dbh',
            'password' => 'string'
        ]);

        $user->update($data);
        session()->flash('success', 'User Updated Successfuly');
        return view('User.show', compact('user'));
    }

    public function delete($id)
    {
        $user = User::findorfail($id);
        $user->delete();
        session()->flash('success', 'User Deleted Successfuly');
        return redirect(route('All_Users'));
    }

    public function search_user(Request $request)
    {
        $key = $request->key;
        $users = User::where('name', 'like', "%$key%")->get();
        return view('User.All', compact('users'));
    }
}
