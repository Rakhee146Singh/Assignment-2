<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Account;
use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpenseController extends Controller
{
    public function index()
    {
        // $user = User::all();
        // $accounts = Account::all();
        $expense = Expense::all();

        return view('expense/expenseDetails',  ['expenses' => $expense]);
    }

    public function create(Request $request)
    {
        // $id = Account::findOrFail($id);

        $expense = new Expense;
        $expense->account_id = $request->account_name;
        $expense->date = $request->date;
        $expense->type = $request->type;
        $expense->category = $request->category;
        $expense->amount = $request->amount;
        $expense->save();

        return redirect('expense')->with('status', 'Inserted Successfully');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function createPage()
    {
        $accounts = Account::all();
        return view('expense/expense', ['accounts' => $accounts]);
    }

    public function edit($id)
    {
        $accounts = Account::all();
        $expense = Expense::findOrFail($id);
        return view('edit', ['accounts' => $accounts, 'expenses' => $expense]);
    }

    public function update(Request $request, $id)
    {
        $expense = Expense::find($id);
        $expense->date = $request->date;
        $expense->type = $request->type;
        $expense->category = $request->category;
        $expense->amount = $request->amount;
        $expense->save();
        return redirect('expense')->with('status', 'Updated Successfully');
    }

    public function destroy($id)
    {

        Expense::findOrFail($id)->delete();
        return redirect('expense');
    }
}
