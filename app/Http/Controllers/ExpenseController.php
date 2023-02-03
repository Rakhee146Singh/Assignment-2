<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Account;
use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpenseController extends Controller
{
    public function index($id)
    {
        $expense = Account::findOrFail($id)->expenses()->orderBy("date", "desc")->get();
        return view('expense/expenseDetails',  ['expenses' => $expense]);
    }

    public function create(Request $request)
    {
        $expense = new Expense;
        $expense->account_id = $request->account_name;
        $expense->date = $request->date;
        $expense->type = $request->type;
        $expense->category = $request->category;
        $expense->amount = $request->amount;
        $expense->save();

        return redirect('expense/' . $expense->account_id)->with('status', 'Inserted Successfully');
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
        return view('expense/edit', ['expenses' => $expense, 'accounts' => $accounts]);
    }

    public function update(Request $request, $id)
    {
        $expense = Expense::find($id);
        $account_id = $expense->account_id;
        $expense->date = $request->date;
        $expense->type = $request->type;
        $expense->category = $request->category;
        $expense->amount = $request->amount;
        $expense->save();
        return redirect('expense/' . $account_id)->with('status', 'Updated Successfully');
    }

    public function destroy($id)
    {
        $expense = Expense::findOrFail($id);
        $account_id = $expense->account_id;
        $expense->delete();
        return redirect('expense/' . $account_id);
    }

    public function total()
    {
        $expense = auth()->user()->accounts->pluck('id');
        $account = Account::whereIn('id', $expense)->with(['expenses' => function ($query) {
            $query->orderBy('date', 'desc');
        }])->get();
        return view('expense/totalExpense', ['accounts' => $account, 'expenses' => $expense]);
    }
    public function total_income()
    {
        $income = Expense::where('type', 'income')->sum('amount');
        $expense = Expense::where('type', 'expense')->sum('amount');
        $balance = Account::where('id', 1)->sum('amount');
        $e_total = $balance - $expense;
        $i_total = $balance + $income;
        dd($e_total);
        dd($i_total);
    }
}
