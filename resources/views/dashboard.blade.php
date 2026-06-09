<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense Tracker Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 min-h-screen text-slate-100 font-sans py-6 px-4">

<div class="max-w-5xl mx-auto">

    <!-- Header Section -->
    <div class="flex flex-col md:flex-row justify-between items-center mb-6">
        <div>
            <h1 class="text-3xl font-bold text-white tracking-tight">
                Expense Tracker
            </h1>
            <p class="text-xs text-slate-400 mt-1">
                Manage your income and expenses
            </p>
        </div>
        
        <div class="flex flex-wrap gap-2 mt-4 md:mt-0 items-center justify-center">
            <a href="/workerdisplay" 
               class="flex items-center justify-center gap-1.5 w-32 py-2 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-semibold rounded-lg shadow-md hover:scale-105 transition-all duration-300 text-center text-xs">
                <span>👷</span> Workers
            </a>

            <a href="/transaction/add-income"
               class="flex items-center justify-center gap-1.5 w-32 py-2 bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 text-white font-semibold rounded-lg shadow-md hover:scale-105 transition-all duration-300 text-center text-xs">
                <span>➕</span> Income
            </a>

            <a href="/transaction/add-expense"
               class="flex items-center justify-center gap-1.5 w-32 py-2 bg-gradient-to-r from-red-600 to-rose-600 hover:from-red-700 hover:to-rose-700 text-white font-semibold rounded-lg shadow-md hover:scale-105 transition-all duration-300 text-center text-xs">
                <span>➖</span> Expense
            </a>
            
            <a href="/profile"
               class="flex items-center justify-center gap-1.5 w-32 py-2 bg-gradient-to-r from-purple-600 to-fuchsia-600 hover:from-purple-700 hover:to-fuchsia-700 text-white font-semibold rounded-lg shadow-md hover:scale-105 transition-all duration-300 text-center text-xs">
                <span>👤</span> Profile
            </a>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
        <div class="backdrop-blur-lg bg-white/10 border border-white/10 rounded-xl p-4 shadow-md hover:scale-[1.02] transition duration-300">
            <p class="text-green-300 text-xs uppercase font-medium tracking-wide">
                Total Income
            </p>
            <h2 class="text-2xl font-bold text-white mt-1">
                ₹{{ number_format($totalIncome,2) }}
            </h2>
        </div>

        <div class="backdrop-blur-lg bg-white/10 border border-white/10 rounded-xl p-4 shadow-md hover:scale-[1.02] transition duration-300">
            <p class="text-red-300 text-xs uppercase font-medium tracking-wide">
                Total Expense
            </p>
            <h2 class="text-2xl font-bold text-white mt-1">
                ₹{{ number_format($totalExpense,2) }}
            </h2>
        </div>

        <div class="backdrop-blur-lg bg-white/10 border border-white/10 rounded-xl p-4 shadow-md hover:scale-[1.02] transition duration-300">
            <p class="text-blue-300 text-xs uppercase font-medium tracking-wide">
                Net Balance
            </p>
            <h2 class="text-2xl font-bold text-white mt-1">
                ₹{{ number_format($balance,2) }}
            </h2>
        </div>
    </div>

    <!-- Recent Transactions Table Card -->
    <div class="backdrop-blur-lg bg-white/10 border border-white/10 rounded-xl p-5 shadow-md">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-bold text-white">
                Recent Transactions
            </h2>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-white/10 text-slate-400 text-xs uppercase tracking-wider">
                        <th class="p-3 text-left">Title</th>
                        <th class="p-3 text-left">Category</th>
                        <th class="p-3 text-left">Type</th>
                        <th class="p-3 text-left">Amount</th>
                        <th class="p-3 text-left">Date</th>
                        <th class="p-3 text-center">Action</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-white/5">
                @forelse($recentTransactions as $transaction)
                    <tr class="hover:bg-white/5 transition">
                        <td class="p-3 text-white font-medium">
                            {{ $transaction->title }}
                        </td>
                        <td class="p-3 text-slate-300">
                            {{ $transaction->category }}
                        </td>
                        <td class="p-3">
                            @if($transaction->type == 'income')
                                <span class="bg-green-500/20 text-green-300 px-2.5 py-0.5 rounded-full text-xs font-semibold">
                                    Income
                                </span>
                            @else
                                <span class="bg-red-500/20 text-red-300 px-2.5 py-0.5 rounded-full text-xs font-semibold">
                                    Expense
                                </span>
                            @endif
                        </td>
                        <td class="p-3 text-white font-semibold">
                            ₹{{ number_format($transaction->amount, 2) }}
                        </td>
                        <td class="p-3 text-slate-400 text-xs">
                            {{ $transaction->transaction_date }}
                        </td>
                        <td class="p-3 text-center">
                            <form action="{{ url('/transaction/'.$transaction->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Delete this transaction?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="bg-gradient-to-r from-red-500 to-rose-600 hover:from-red-600 hover:to-rose-700 text-white px-3 py-1 rounded-md text-xs font-semibold shadow-md transition duration-300 hover:scale-[1.02]">
                                    🗑 Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center p-6 text-slate-500">
                            No Transactions Found
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>

<!-- Background Glow Effects -->
<div class="fixed top-0 left-0 w-72 h-72 bg-blue-500 opacity-10 blur-[120px] rounded-full -z-10"></div>
<div class="fixed bottom-0 right-0 w-72 h-72 bg-purple-500 opacity-10 blur-[120px] rounded-full -z-10"></div>

</body>
</html>