<?php


namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Worker;
use App\Models\WorkerTransaction;


class workerinfo extends Controller
{
  public function workerdetail(Request $request)
{
    try {

        $validatedData = $request->validate([
            'worker_name' => 'required|string|max:255',
            'mobile' => 'nullable|string|max:15',
            'address' => 'nullable|string',
            'salary' => 'nullable|numeric',
            'notes' => 'nullable|string',
        ]);

        $worker = Worker::create([
            'user_id' => Auth::id(),
            'worker_name' => $validatedData['worker_name'],
            'mobile' => $validatedData['mobile'] ?? null,
            'address' => $validatedData['address'] ?? null,
            'salary' => $validatedData['salary'] ?? null,
            'notes' => $validatedData['notes'] ?? null,
        ]);



        return response()->json([
            'success' => true,
            'message' => 'Worker added successfully',
            'data' => $worker
        ], 201);

    } catch (\Exception $e) {

        return response()->json([
            'success' => false,
            'message' => 'Failed to add worker',
            'error' => $e->getMessage()
        ], 500);

    }
}
    

public function workerMoney()
{
    $workers = worker::where('user_id', Auth::id())->get();

    return view('worker_money', compact('workers'));
    dd('workers');
}


    public function addmoney(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'worker_name' => 'required|string|max:255',
                'amount' => 'required|numeric',
                'transaction_date' => 'required|date',
                'payment_type' => 'required|in:cash,upi,bank',
                'description' => 'nullable|string',
            ]);

            WorkerTransaction::create([
                'user_id' => Auth::id(),
                'worker_name' => $validatedData['worker_name'],
                'amount' => $validatedData['amount'],
                'transaction_date' => $validatedData['transaction_date'],
                'payment_type' => $validatedData['payment_type'],
                'description' => $validatedData['description'] ?? null,
            ]);

               return redirect('/workerdisplay');           
            // return response()->json([
            //     'success' => true,
            //     'message' => 'transaction added successfully',
            // ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to add tansaction',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    function showTransaction(){
        $user_id= Auth::id();
        $totalExpense =WorkerTransaction::where('user_id',$user_id)->sum('amount');

        $recentTransactions = WorkerTransaction::where('user_id', $user_id)
            ->latest()
            ->take(10)
            ->get();

        return view('workerdisplay', compact(
           
            'totalExpense',
            'recentTransactions'));
    }

}
