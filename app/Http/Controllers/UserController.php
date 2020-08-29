<?php

namespace App\Http\Controllers;

use App\User;
use App\Member;
use App\Http\Requests\UserPasswordRequest;
use App\Http\Requests\UserProfileRequest;
use App\Http\Requests\UserRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Display a listing of the users
     *
     * @param  \App\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        $users = User::paginate(10);

        $totalOne = User::where('role', '=', 'user')->whereDate('created_at', Carbon::today())->count();
        $totalAll = User::where('role', '=', 'user')->count();
        $since = User::where('role', '=', 'user')->orderBy('created_at')->first();

        return view('users.index', ['users' => $users, 'totalOne' => $totalOne, 'totalAll' => $totalAll, 'since' => $since]);
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

    public function store(UserRequest $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        return back()->withStatus(__('Profile successfully created.'));
    }

    public function edit($id)
    {
        $user = User::where('id', $id)->get();
        return view('users.edit', ['user' => $user]);
    }

    public function update(UserProfileRequest $request)
    {
        User::find($request->id)->update($request->all());
        for ($key = 0; $key < 3; $key++)
        {
            Member::find($request->input('memberid-'.$key))->update([
                'name' => $request->input('member-'.$key),
            ]);

            if($request->file('certificate-'.$key))
            {
                $path = '/'.$request->file('certificate-'.$key)->store('public/certificates');

                Member::find($request->input('memberid-'.$key))->update([
                    'certificate' => $path,
                ]);
            }
        }
        return back()->withStatus(__('Profile successfully updated. '.$request->input('certificate-'.$key)));
    }

    public function password(UserPasswordRequest $request)
    {
        User::find($request->id)->update(['password' => Hash::make($request->get('password'))]);
        return back()->withPasswordStatus(__('Password successfully updated.'));
    }

    public function delete($id)
    {
        User::find($id)->delete();
        return back()->with('success','User successfully deleted');
    }
}
