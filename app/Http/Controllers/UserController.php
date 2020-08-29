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
        $totalsMonth = User::where('created_at', '>=', Carbon::now()->subMonth())->count();

        $diffsMonth = User::where('created_at', '>=', Carbon::now()->subMonth(2))->where('created_at', '<=', Carbon::now()->subMonth(1))->count();
        if($diffsMonth == 0)
        {
            $percentMonth = number_format($totalsMonth * 100, 2);
        }
        else
        {
            $percentMonth = number_format((($totalsMonth - $diffsMonth) / $diffsMonth) * 100, 2);
        }

        if($percentMonth < 0.00) {
            $minusMonth = true;
            $percentMonth *= -1;
        }
        else
        {
            $minusMonth = false;
        }

        $dateWeek = Carbon::today()->subDays(7);
        $totalsWeek = User::where('created_at', '>=', $dateWeek)->count();

        $dateFromWeek = Carbon::today()->subDays(14);
        $diffsWeek = User::where('created_at', '>=', $dateFromWeek)->where('created_at', '<=', $dateWeek)->count();
        if($diffsWeek == 0)
        {
            $percentWeek = number_format($totalsWeek * 100, 2);
        }
        else
        {
            $percentWeek = number_format((($totalsWeek - $diffsWeek) / $diffsWeek) * 100, 2);
        }

        if($percentWeek < 0.00) {
            $minusWeek = true;
            $percentWeek *= -1;
        }
        else
        {
            $minusWeek = false;
        }
        return view('users.index', ['users' => $users, 'minusMonth' => $minusMonth, 'totalsMonth' => $totalsMonth, 'percentMonth' => $percentMonth, 'minusWeek' => $minusWeek, 'totalsWeek' => $totalsWeek, 'percentWeek' => $percentWeek]);
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
