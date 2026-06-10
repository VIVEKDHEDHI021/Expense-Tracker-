<?php


namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Worker;
use App\Models\WorkerTransaction;
use Illuminate\Pagination\LengthAwarePaginator;


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
        $lastWorker = Worker::max('worker_id');

            $newWorkerId = $lastWorker ? $lastWorker + 1 : 1001;

        $worker = Worker::create([
            'user_id' => Auth::id(),
            'worker_id'    => $newWorkerId,
            'worker_name' => $validatedData['worker_name'],
            'mobile' => $validatedData['mobile'] ?? null,
            'address' => $validatedData['address'] ?? null,
            'salary' => $validatedData['salary'] ?? null,
            'notes' => $validatedData['notes'] ?? null,
        ]);


        return redirect('workerlist');
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
    public function addmoney(Request $request)
    {
        try {
            $validatedData = $request->validate([
                 
                'worker_id' => 'required|integer',
                'amount' => 'required|numeric',
                'transaction_date' => 'required|date',
                'payment_type' => 'required|in:cash,upi,bank',
                'description' => 'nullable|string',
            ]);
            $worker = Worker::where('worker_id', $validatedData['worker_id'])
             ->where('user_id', Auth::id())
             ->firstOrFail();
            
            
            WorkerTransaction::create([
                'user_id' => Auth::id(),

                'worker_id' => $worker->worker_id,
                'worker_name' => $worker->worker_name,
                'amount' => $validatedData['amount'],
                'transaction_date' => $validatedData['transaction_date'],
                'payment_type' => $validatedData['payment_type'],
                'description' => $validatedData['description'] ?? null,
                ]);
                
                return redirect('/workerlist');           
          
          
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to add tansaction',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function worker_money()
{
    $user_id = Auth::id();

    $workers = Worker::where('user_id', $user_id)->get();

    return view('worker_money', compact('workers'));
}

    function showTransaction(){
        $user_id= Auth::id();
        $totalExpense =WorkerTransaction::where('user_id',$user_id)->sum('amount');
        $worker =Worker::where('user_id',$user_id)->first();
        $recentTransactions = WorkerTransaction::where('user_id', $user_id)
            ->latest()
            ->paginate(10);

        return view('workerdisplay', compact(
            'worker',
            'totalExpense',
            'recentTransactions'));
    }
    function workerprofile($id){
        $user_id= Auth::id();
        
        $worker = Worker::where('user_id', $user_id)
        ->where('worker_id', $id)
        ->firstOrFail();
      
        $borrowed_money = WorkerTransaction::where('user_id', Auth::id())
        ->where('worker_id', $worker->worker_id)
        ->sum('amount');

 
        $recentTransactions = WorkerTransaction::where('user_id', $user_id)->where('worker_id',$worker->worker_id)  
            ->latest()
            ->paginate(10);

        return view('workerprofile', compact(
            'worker',
            'borrowed_money',
            'recentTransactions'
        
           ));
    }

    function distroy($id){
        $transaction= WorkerTransaction::findorfail($id);
        if(!$transaction){
            return response()->json([
                "success"=> true,
                "messsage"=>'Transaction not exist'
            ]);
        }else{
            $transaction->delete();
            return redirect('workerdisplay');
        }
    }
   public function workerlist()
{
    $user_id = Auth::id();
    $workers = Worker::where('user_id', $user_id)->paginate(10);
foreach ($workers as $worker) {

    $worker->borrowed_money = WorkerTransaction::where('user_id', $user_id)
        ->where('worker_id', $worker->worker_id)
        ->sum('amount');
}
return view('workerlist', compact('workers'));

  
         
    
}

    public function deleteworker($id){
        $user_id= Auth::id();
        $worker = Worker::where('user_id', $user_id)->first();
        if(!$worker){
            return response()->json([
                "success"=>false,
                "message"=> 'no worker exist'
            ]);

        }else{
        
            $transaction = WorkerTransaction::where('user_id',$user_id)->where('worker_id',$worker->worker_id)->delete();
            $worker->delete();
            return redirect('workerlist')->with('success', 'Worker and all transactions deleted successfully.');
        }
        
    }
   
}
