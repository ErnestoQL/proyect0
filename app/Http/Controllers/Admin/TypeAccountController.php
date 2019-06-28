<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\TypeAccount;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TypeAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accounts_types = TypeAccount::all();

        return view('admin/type_account.index', compact('accounts_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/type_account.create');
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
            'id_type_account' => 'required',
            'description_account' => 'required'
        ]);

        TypeAccount::create([
            'id_type_account' => $data['id_type_account'],
            'description_account' => $data['description_account'],
        ]);

        return redirect()->route('type_account.index')->with('success', 'Type Account '.$data['id_type_account'].' created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\TypeAccount  $typeAccount
     * @return \Illuminate\Http\Response
     */
    public function show(TypeAccount $typeAccount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\TypeAccount  $typeAccount
     * @return \Illuminate\Http\Response
     */
    public function edit(TypeAccount $typeAccount)
    {
        $findTypeAccount = $typeAccount;
        return view('admin/type_account.edit', compact('findTypeAccount'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\TypeAccount  $typeAccount
     * @return \Illuminate\Http\Response
     */
    public function update(TypeAccount $typeAccount)
    {
        $data = request()->validate([
            'description_account' => 'required',
        ]);

        $typeAccount->update($data);

        return redirect()->route('type_account.index')->with('success', 'Type Account '.$typeAccount->id_type_account.' Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\TypeAccount  $typeAccount
     * @return \Illuminate\Http\Response
     */
    public function destroy(TypeAccount $typeAccount)
    {
        $typeAccount->delete();
        return redirect()->route('type_account.index')->with('success', 'Type Account '.$typeAccount->id_type_account.' deleted!');
    }
}
