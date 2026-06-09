<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Worker Profile | Expense Tracker</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 min-h-screen text-slate-100 font-sans py-6 px-4">

<div class="max-w-5xl mx-auto">

    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-white tracking-tight flex items-center gap-2">
            <span>👷</span> Worker Profile
        </h1>

        <div class="flex items-center gap-2">
            <a href="/workerlist"
               class="bg-slate-755/10 border border-white/10 hover:bg-white/10 text-white px-4 py-2 rounded-lg text-xs font-semibold shadow-md transition-all duration-300">
                ◀ Back to Workers
            </a>
            <a href="/worker_money"
               class="bg-gradient-to-r from-green-500 to-emerald-600 hover:from-green-600 hover:to-emerald-700 text-white px-4 py-2 rounded-lg text-xs font-semibold shadow-md transition-all duration-300">
                💰 Give Money
            </a>
        </div>
    </div>

    <!-- Main Content Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
        
        <!-- Left Side: Worker Info & Stats -->
        <div class="lg:col-span-1 space-y-6">
            
            <!-- Worker Info Card -->
            <div class="bg-white/10 backdrop-blur-lg border border-white/10 rounded-2xl p-5 shadow-md">
                <div class="flex flex-col items-center text-center">
                    <div class="w-16 h-16 rounded-full bg-gradient-to-r from-blue-500 to-purple-600 flex items-center justify-center text-3xl shadow-md mb-3">
                        👷
                    </div>
                    <h2 class="text-xl font-bold text-white truncate max-w-full">
                        {{ $worker->worker_name }}
                    </h2>
                    <p class="text-xs text-slate-400 mt-1">
                        📱 {{ $worker->mobile }}
                    </p>
                    <p class="text-xs text-slate-400 mt-0.5">
                        📍 {{ $worker->address }}
                    </p>
                    
                    @if($worker->notes)
                        <div class="mt-4 pt-3 border-t border-white/5 w-full text-left">
                            <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wide">Notes</span>
                            <p class="text-xs text-slate-300 mt-1 bg-white/5 p-2 rounded-lg leading-relaxed">
                                {{ $worker->notes }}
                            </p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Stats Card -->
            <div class="bg-white/10 backdrop-blur-lg border border-white/10 rounded-2xl p-5 shadow-md">
                <p class="text-red-300 text-[10px] uppercase font-bold tracking-wider">
                    Total Borrowed Money
                </p>
                <h2 class="text-2xl font-bold text-white mt-1">
                    ₹{{ number_format($totalExpense, 2) }}
                </h2>
            </div>

        </div>

        <!-- Right Side: Transactions History -->
        <div class="lg:col-span-2">
            <div class="bg-white/10 backdrop-blur-lg border border-white/10 rounded-2xl p-5 shadow-md h-full">
                <h2 class="text-lg font-bold text-white mb-4">
                    Recent Transactions
                </h2>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="border-b border-white/10 text-slate-400 text-xs uppercase tracking-wider">
                                <th class="p-3 text-left">Date</th>
                                <th class="p-3 text-left">Amount</th>
                                <th class="p-3 text-left">Payment Mode</th>
                                <th class="p-3 text-left">Description</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-white/5">
                            @forelse($recentTransactions as $transaction)
                                <tr class="hover:bg-white/5 transition">
                                    <td class="p-3 text-white text-xs">
                                        {{ $transaction->transaction_date }}
                                    </td>
                                    <td class="p-3 text-white font-semibold">
                                        ₹{{ number_format($transaction->amount, 2) }}
                                    </td>
                                    <td class="p-3 text-slate-300">
                                        {{ ucfirst($transaction->payment_type) }}
                                    </td>
                                    <td class="p-3 text-slate-400 text-xs truncate max-w-[150px]" title="{{ $transaction->description }}">
                                        {{ $transaction->description ?? '-' }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center p-8 text-slate-500">
                                        No Transactions Found
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

</div>

<!-- Background Glow Effects -->
<div class="fixed top-0 left-0 w-72 h-72 bg-blue-500 opacity-10 blur-[120px] rounded-full -z-10"></div>
<div class="fixed bottom-0 right-0 w-72 h-72 bg-purple-500 opacity-10 blur-[120px] rounded-full -z-10"></div>

</body>
</html>
