<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{

    public function index()
    {
        $account = auth()->user()->accounts()->get();
        // dd($account);
        return view('accountDetails',  ['accounts' => $account]);
    }

    public function create(Request $request)
    {

        $account = new Account;
        $account->account_name = $request->account_name;
        $account->amount = $request->amount;
        $account->save();
        // $account->users()->attach($request->id);
        $account->users()->attach(Auth::user()->id);
        return redirect('accounts')->with('status', 'Inserted Successfully');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function createPage()
    {

        return view('accounts');
    }

    public function edit($id)
    {
        $account = Account::findOrFail($id);
        return view('edit', ['accounts' => $account]);
    }

    public function update(Request $request, $id)
    {
        $account = Account::find($id);
        $account->account_name = $request->account_name;
        $account->amount = $request->amount;
        $account->save();

        return redirect('accounts')->with('status', 'Updated Successfully');
    }

    public function destroy($id)
    {
        Account::findOrFail($id)->delete();
        return redirect('accounts');
    }
}
