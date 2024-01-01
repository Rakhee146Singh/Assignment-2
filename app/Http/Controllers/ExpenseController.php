<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Account;
use App\Models\Expense;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the expenses.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $expense = Account::findOrFail($id)->expenses()->orderBy("date", "desc")->get();
        return view('expense/expenseDetails',  ['expenses' => $expense]);
    }

    /**
     * Show the form for creating a new expense.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $account = Account::findOrFail($request->account_name);
        $balance = $account->amount;
        if ($request->type == 'income') {
            $total_amount = $balance + $request->amount;
            $account->update(['amount' => $total_amount]);
        } elseif ($request->type == 'transfer') {
            if ($request->transfer_type != 'credit') {
                $total_amount = $balance - $request->amount;
                $account->update(['amount' => $total_amount]);
            } else {
                $total_amount = $balance + $request->amount;
                $account->update(['amount' => $total_amount]);
            }
        } else {
            $total_amount = $balance -  $request->amount;
            $account->update(['amount' => $total_amount]);
        }
        // $opponent_name = Account::findOrFail($request->opponent_name)->account_name;
        $expense                = new Expense;
        $expense->account_id    = $request->account_name;
        $expense->date          = $request->date;
        $expense->type          = $request->type;
        $expense->transfer_type = $request->transfer_type;
        $expense->opponent_name = $request->opponent_name;
        $expense->category      = $request->category;
        $expense->amount        = $request->amount;
        $expense->save();
        // $expense = Expense::create($request->only('account_id', 'date', 'type', 'transfer_type', 'category', 'amount') + ['opponent_name' => $opponent_name]);
        return redirect('expense/' . $expense->account_id)->with('status', 'Inserted Successfully');
    }

    /**
     * Store a newly created expense in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createPage()
    {
        $accounts = Account::all();
        return view('expense/expense', ['accounts' => $accounts]);
    }

    /**
     * Show the form for editing the specified expense.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $accounts = Account::all();
        $expense = Expense::findOrFail($id);
        return view('expense/edit', ['expenses' => $expense, 'accounts' => $accounts]);
    }

    /**
     * Update the specified expense in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $expense            = Expense::find($id);
        $account_id         = $expense->account_id;
        $expense->date      = $request->date;
        $expense->type      = $request->type;
        $expense->category  = $request->category;
        $expense->amount    = $request->amount;
        $expense->save();
        return redirect('expense/' . $account_id)->with('status', 'Updated Successfully');
    }

    /**
     * Remove the specified expense from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $expense    = Expense::findOrFail($id);
        $account_id = $expense->account_id;
        $expense->delete();
        return redirect('expense/' . $account_id);
    }

    /**
     * Show the total account of logged in user from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function total()
    {
        $expense = auth()->user()->accounts->pluck('id');
        $account = Account::whereIn('id', $expense)->with(['expenses' => function ($query) {
            $query->orderBy('date', 'desc');
        }])->get();
        return view('expense/totalExpense', ['accounts' => $account, 'expenses' => $expense]);
    }
}
