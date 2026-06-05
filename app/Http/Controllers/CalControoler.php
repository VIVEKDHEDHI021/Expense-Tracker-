<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;

class CalControoler extends Controller
{
    public function addExpense(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'amount' => 'required|numeric',
            'category' => 'required',
            'expense_date' => 'required|date',
            'description' => 'nullable'
        ]);

      Transaction::create([
    'user_id' => Auth::id(),
    'title' => $request->title,
    'amount' => $request->amount,
    'category' => $request->category,
    'transaction_date' => $request->expense_date,
    'description' => $request->description
]);

        return redirect('/dashboard');
    }
    

    public function addIncome(Request $request)
{
    $request->validate([
        'amount' => 'required|numeric',
        'category' => 'required',
        'transaction_date' => 'required|date'
    ]);

    Transaction::create([
        'user_id' => Auth::id(),
        'title' => 'Income',
        'amount' => $request->amount,
        'category' => $request->category,
        'type' => 'income',
        'transaction_date' => $request->transaction_date,
    ]);

    return redirect('/dashboard');
}
   



    public function index()
    {
        $userId = Auth::id();

        $totalIncome = Transaction::where('user_id', $userId)
            ->where('type', 'income')
            ->sum('amount');

        $totalExpense = Transaction::where('user_id', $userId)
            ->where('type', 'expense')
            ->sum('amount');

        $balance = $totalIncome - $totalExpense;

        $recentTransactions = Transaction::where('user_id', $userId)
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'totalIncome',
            'totalExpense',
            'balance',
            'recentTransactions'
        ));
    }
}

   
