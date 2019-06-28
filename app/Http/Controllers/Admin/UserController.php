<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Account;
use App\Models\Admin\User;
use App\Models\Admin\UserState;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table('user')
            ->join('account', 'user.account_id_account', '=', 'account.id_account')
            ->join('user_state', 'user.user_state_id_user_state', '=', 'user_state.id_user_state')
            ->select('user.*', 'account.comments as comment', 'user_state.state_description')
            ->get();


        return view('admin/user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $account_id = Account::pluck('id_account', 'comments');

        $user_state = UserState::pluck('id_user_state', 'state_description');

        return view('admin/user.create', compact('account_id','user_state'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = request()->validate([
            'id_user' => 'required',
            'user_description' => 'required',
            'user_password' => 'required',
            'account_id_account' => 'required',
            'user_state_id_user_state' => 'required'
        ]);

        User::create([
            'id_user' => $data['id_user'],
            'user_description' => $data['user_description'],
            'user_password' => bcrypt($data['user_password']),
            'account_id_account' => $data['account_id_account'],
            'user_state_id_user_state' => $data['user_state_id_user_state']
        ]);

        return redirect()->route('user.index')->with('success', 'User '.$data['id_user'].' created!');

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $user_find = $user;
        $account_id = Account::pluck('id_account', 'comments');
        $user_state = UserState::pluck('id_user_state', 'state_description');

        return view('admin/user.edit', compact('user_find','account_id','user_state'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(User $user)
    {
        $data = request()->validate([
            'user_description' => 'required',
            'user_password' => 'required',
            'account_id_account' => 'required',
            'user_state_id_user_state' => 'required'
        ]);
        $data['user_password'] = bcrypt($data['user_password']);
        $user->update($data);

        return redirect()->route('user.index')->with('success', 'User '.$user->id_user.' Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index')->with('success', 'User '.$user->id_user.' deleted!');
    }
}
