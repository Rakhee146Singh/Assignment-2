<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    /**
     * Display a listing of the accounts.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $account = auth()->user()->accounts()->get();
        return view('accountDetails',  ['accounts' => $account]);
    }

    /**
     * Show the form for creating a new accounts.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
            'account_name'  => 'required|alpha',
            'amount'        => 'required|numeric|min:3'
        ]);
        $account                = new Account;
        $account->account_name  = $request->account_name;
        $account->amount        = $request->amount;
        $account->save();
        $account->users()->attach(Auth::user()->id);
        return redirect('accounts')->with('status', 'Inserted Successfully');
    }

    /**
     * Store a newly created account in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createPage()
    {
        return view('accounts');
    }

    /**
     * Show the form for editing the specified account.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $account = Account::findOrFail($id);
        return view('edit', ['accounts' => $account]);
    }

    /**
     * Update the specified account in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $account                 = Account::find($id);
        $account->account_name   = $request->account_name;
        $account->amount         = $request->amount;
        $account->save();

        return redirect('accounts')->with('status', 'Updated Successfully');
    }

    /**
     * Remove the specified account from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Account::findOrFail($id)->delete();
        return redirect('accounts');
    }
}
