<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        $users = User::paginate(10);
        return view('users.index', ['users' => $users]);
    }

    public function search(Request $request)
    {
        $users = User::where('email', 'like', '%'.$request->search.'%')->orWhere('email', 'like', '%'.$request->search.'%')->paginate(10);
        return view('users.search', ['search' => $request->search, 'users' => $users]);
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        User::insert([
        'name' => $request->name,
        'email' => $request->email,
        'created_at' => now()->addHours(7),
        'updated_at' => now()->addHours(7),
        'password' => Hash::make($request->password)
        ]);
        return redirect('/user');
    }

    public function edit($id)
    {
        $user = User::where('id', $id)->get();
        return view('users.edit', ['user' => $user]);
    }

    public function update(Request $request)
    {
        User::find($request->id)->update([
        'name' => $request->name,
        'email' => $request->email,
        'updated_at' => now()->addHours(7)
        ]);
        return redirect('/user');
    }

    public function delete($id)
    {
        User::find($id)->delete();
        return back()->with('success','User successfully deleted');
    }
}
