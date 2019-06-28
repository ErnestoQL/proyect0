<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\UserState;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserStateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users_states = UserState::all();

        return view('admin/user_state.index', compact('users_states'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/user_state.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'id_user_state' => 'required',
            'state_description' => 'required'
        ]);

        UserState::create([
            'id_user_state' => $data['id_user_state'],
            'state_description' => $data['state_description'],
        ]);

        return redirect()->route('user_state.index')->with('success', 'User State '.$data['id_user_state'].' created!');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\UserState  $userState
     * @return \Illuminate\Http\Response
     */
    public function show(UserState $userState)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\UserState  $userState
     * @return \Illuminate\Http\Response
     */
    public function edit(UserState $userState)
    {
        $findUserState = $userState;
        return view('admin/user_state.edit', compact('findUserState'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\UserState  $userState
     * @return \Illuminate\Http\Response
     */
    public function update(UserState $userState)
    {
        $data = request()->validate([
            'state_description' => 'required',
        ]);

        $userState->update($data);

        return redirect()->route('user_state.index')->with('success', 'User State '.$userState->id_user_state.' Updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\UserState  $userState
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserState $userState)
    {
        $userState->delete();
        return redirect()->route('user_state.index')->with('success', 'User State '.$userState->id_user_state.' deleted!');

    }
}
