<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Account;
use App\Models\Admin\TypeAccount;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accounts = DB::table('account')
            ->join('type_account', 'account.type_account_id_type_account', '=', 'type_account.id_type_account')
            ->select('account.*', 'type_account.description_account as description')
            ->get();

        return view('admin/account.index', compact('accounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type_account = TypeAccount::pluck('id_type_account', 'description_account');

        return view('admin/account.create', compact('type_account'));
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
            'id_account' => 'required',
            'comments' => 'required',
            'attorney_id_attorney' => 'required',
            'client_id_client' => 'required',
            'type_account_id_type_account' => 'required'
        ]);

        Account::create([
            'id_account' => $data['id_account'],
            'comments' => $data['comments'],
            'attorney_id_attorney' => $data['attorney_id_attorney'],
            'client_id_client' => $data['client_id_client'],
            'type_account_id_type_account' => $data['type_account_id_type_account']
        ]);

        return redirect()->route('account.index')->with('success', 'Account '.$data['id_account'].' created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function show(Account $account)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit(Account $account)
    {
        $account_find = $account;
        $type_account = TypeAccount::pluck('id_type_account', 'description_account');

        return view('admin/account.edit', compact('account_find','type_account'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(Account $account)
    {

        $data = request()->validate([
            'comments' => 'required',
            'attorney_id_attorney' => 'required',
            'client_id_client' => 'required',
            'type_account_id_type_account' => 'required'
        ]);

        $account->update($data);

        return redirect()->route('account.index')->with('success', 'Account '.$account->id_account.' Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account $account)
    {
        $account->delete();
        return redirect()->route('account.index')->with('success', 'Account '.$account->id_account.' deleted!');

    }
}
