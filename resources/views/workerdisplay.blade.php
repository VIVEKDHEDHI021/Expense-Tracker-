<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Worker Transactions | Expense Tracker</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Outfit', sans-serif;
        }
    </style>
</head>

<body class="bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 min-h-screen text-slate-100 py-6 px-4">

<div class="max-w-5xl mx-auto">

    <!-- Header -->
    <div class="flex flex-col md:flex-row justify-between items-center mb-6">
        <div>
            <h1 class="text-3xl font-bold text-white tracking-tight flex items-center gap-2">
                <span>👷</span> Worker Transactions
            </h1>
            <p class="text-xs text-slate-400 mt-1">
                Track payments and expenses for workers
            </p>
        </div>

        <div class="flex flex-wrap gap-2 mt-4 md:mt-0 items-center justify-center">
            <a href="/dashboard"
               class="flex items-center justify-center gap-1.5 w-32 py-2 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-semibold rounded-lg shadow-md hover:scale-105 transition-all duration-300 text-center text-xs">
                📊 Dashboard
            </a>

            <a href="/workerlist"
               class="flex items-center justify-center gap-1.5 w-32 py-2 bg-gradient-to-r from-green-500 to-emerald-600 hover:from-green-600 hover:to-emerald-700 text-white font-semibold rounded-lg shadow-md hover:scale-105 transition-all duration-300 text-center text-xs">
                👷 Worker List
            </a>

            <a href="/worker_money"
               class="flex items-center justify-center gap-1.5 w-32 py-2 bg-gradient-to-r from-red-600 to-rose-600 hover:from-red-700 hover:to-rose-700 text-white font-semibold rounded-lg shadow-md hover:scale-105 transition-all duration-300 text-center text-xs">
                💰 Give Money
            </a>
        </div>
    </div>

    <!-- Summary & Search Info -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
        <div class="backdrop-blur-lg bg-white/10 border border-white/10 rounded-xl p-3.5 shadow-md w-full sm:max-w-xs hover:border-red-500/30 transition duration-300">
            <p class="text-red-300 text-[10px] uppercase font-bold tracking-wider">
                Total Money Given
            </p>
            <h2 class="text-xl font-bold text-white mt-0.5">
                ₹{{ number_format($totalExpense, 2) }}
            </h2>
        </div>

        <div class="w-full sm:max-w-xs">
            <input
                type="text"
                id="transactionSearch"
                placeholder="🔍 Search transactions by name, mode..."
                class="w-full bg-white/10 border border-white/10 text-white placeholder-slate-400 text-sm rounded-xl px-4 py-2.5 focus:outline-none focus:ring-1 focus:ring-blue-500 transition">
        </div>
    </div>

    <!-- Transactions Card -->
    <div class="backdrop-blur-lg bg-white/10 border border-white/10 rounded-xl p-4 shadow-md">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-white/10 text-slate-400 text-xs uppercase tracking-wider">
                        <th class="p-3 text-left">Name</th>
                        <th class="p-3 text-left">Date</th>
                        <th class="p-3 text-left">Payment Mode</th>
                        <th class="p-3 text-left">Description</th>
                        <th class="p-3 text-left">Amount</th>
                        <th class="p-3 text-center">Action</th>
                    </tr>
                </thead>

                <tbody id="tableBody" class="divide-y divide-white/5">
                @forelse($recentTransactions as $transaction)
                    <tr class="transaction-row hover:bg-white/5 transition">
                        <td class="p-3 text-white font-medium worker-name">
                            {{ $transaction->worker_name }}
                        </td>
                        <td class="p-3 text-slate-300 transaction-date">
                            {{ $transaction->transaction_date }}
                        </td>
                        <td class="p-3 payment-type">
                            @if(strtolower($transaction->payment_type) == 'cash')
                                <span class="bg-emerald-500/20 text-emerald-300 px-2.5 py-0.5 rounded-full text-xs font-semibold">
                                    💵 Cash
                                </span>
                            @elseif(strtolower($transaction->payment_type) == 'online' || strtolower($transaction->payment_type) == 'upi')
                                <span class="bg-blue-500/20 text-blue-300 px-2.5 py-0.5 rounded-full text-xs font-semibold">
                                    📱 Online
                                </span>
                            @elseif(strtolower($transaction->payment_type) == 'bank')
                                <span class="bg-purple-500/20 text-purple-300 px-2.5 py-0.5 rounded-full text-xs font-semibold">
                                    🏦 Bank
                                </span>
                            @else
                                <span class="bg-slate-500/20 text-slate-300 px-2.5 py-0.5 rounded-full text-xs font-semibold">
                                    {{ ucfirst($transaction->payment_type) }}
                                </span>
                            @endif
                        </td>
                        <td class="p-3 text-slate-400 text-xs truncate max-w-[200px] transaction-desc" title="{{ $transaction->description }}">
                            {{ $transaction->description ?? '-' }}
                        </td>
                        <td class="p-3 text-white font-semibold">
                            ₹{{ number_format($transaction->amount, 2) }}
                        </td>
                        <td class="p-3 text-center">
                            <form action="{{ url('/WorkerTransaction', $transaction->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Are you sure you want to delete this transaction?')">
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
            @if ($recentTransactions->hasPages())

<div class="flex items-center justify-between mt-6">

    {{-- Previous Button --}}
    @if ($recentTransactions->onFirstPage())
        <span class="px-4 py-2 rounded-xl bg-white/5 text-slate-500 cursor-not-allowed">
            ◀ Previous
        </span>
    @else
        <a href="{{ $recentTransactions->previousPageUrl() }}"
           class="px-4 py-2 rounded-xl bg-white/10 hover:bg-white/20 transition text-white">
            ◀ Previous
        </a>
    @endif

    {{-- Current Page --}}
    <div class="px-5 py-2 rounded-xl bg-white/10 text-white font-semibold">
        Page {{ $recentTransactions->currentPage() }}
        /
        {{ $recentTransactions->lastPage() }}
    </div>

    {{-- Next Button --}}
    @if ($recentTransactions->hasMorePages())
        <a href="{{ $recentTransactions->nextPageUrl() }}"
           class="px-4 py-2 rounded-xl bg-white/10 hover:bg-white/20 transition text-white">
            Next ▶
        </a>
    @else
        <span class="px-4 py-2 rounded-xl bg-white/5 text-slate-500 cursor-not-allowed">
            Next ▶
        </span>
    @endif

</div>

@endif
 
 
 
 
 
 
        </div>
    </div>

</div>

<!-- Background Glow Effects -->
<div class="fixed top-0 left-0 w-72 h-72 bg-blue-500 opacity-10 blur-[120px] rounded-full -z-10"></div>
<div class="fixed bottom-0 right-0 w-72 h-72 bg-purple-500 opacity-10 blur-[120px] rounded-full -z-10"></div>

<!-- Search Script -->
<script>
const searchInput = document.getElementById('transactionSearch');
if (searchInput) {
    searchInput.addEventListener('keyup', function () {
        const value = this.value.toLowerCase();
        document.querySelectorAll('.transaction-row').forEach(row => {
            const workerName = row.querySelector('.worker-name')?.textContent.toLowerCase() || '';
            const desc = row.querySelector('.transaction-desc')?.textContent.toLowerCase() || '';
            const paymentType = row.querySelector('.payment-type')?.textContent.toLowerCase() || '';
            const date = row.querySelector('.transaction-date')?.textContent.toLowerCase() || '';
            
            if (workerName.includes(value) || desc.includes(value) || paymentType.includes(value) || date.includes(value)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
}
</script>

</body>
</html>