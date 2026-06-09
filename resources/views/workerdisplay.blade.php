<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Worker Transactions | Expense Tracker</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 min-h-screen text-slate-100 font-sans py-6 px-4">

<div class="max-w-5xl mx-auto">

    <!-- Header -->
    <div class="flex flex-col md:flex-row justify-between items-center mb-6">
        <div>
            <h1 class="text-3xl font-bold text-white tracking-tight">
                Worker Transactions
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

    <!-- Summary & Pagination Info -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-4">
        <div class="backdrop-blur-lg bg-white/10 border border-white/10 rounded-xl p-3.5 shadow-md w-full sm:max-w-xs">
            <p class="text-red-300 text-[10px] uppercase font-bold tracking-wider">
                Total Money Given
            </p>
            <h2 class="text-xl font-bold text-white mt-0.5">
                ₹{{ number_format($totalExpense, 2) }}
            </h2>
        </div>

        <!-- Pagination Controls -->
        <div class="flex items-center gap-2 self-end sm:self-auto bg-white/5 border border-white/5 px-3 py-1.5 rounded-xl">
            <button id="prevBtn"
                    onclick="prevPage()"
                    class="bg-white/10 hover:bg-white/20 text-white px-2.5 py-1 rounded-md text-xs font-semibold disabled:opacity-30 transition">
                ◀ Prev
            </button>
            <span id="pageIndicator" class="text-slate-400 text-xs font-medium min-w-[70px] text-center">
                Page 1 of 1
            </span>
            <button id="nextBtn"
                    onclick="nextPage()"
                    class="bg-white/10 hover:bg-white/20 text-white px-2.5 py-1 rounded-md text-xs font-semibold disabled:opacity-30 transition">
                Next ▶
            </button>
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
                        <th class="p-3 text-left">Type</th>
                        <th class="p-3 text-left">Amount</th>
                        <th class="p-3 text-center">Action</th>
                    </tr>
                </thead>

                <tbody id="tableBody" class="divide-y divide-white/5">
                @forelse($recentTransactions as $transaction)
                    <tr class="transaction-row hover:bg-white/5 transition">
                        <td class="p-3 text-white font-medium">
                            {{ $transaction->worker_name }}
                        </td>
                        <td class="p-3 text-slate-300">
                            {{ $transaction->transaction_date }}
                        </td>
                        <td class="p-3">
                            @if($transaction->type == 'income')
                                <span class="bg-green-500/20 text-green-300 px-2 py-0.5 rounded-full text-xs font-semibold">
                                    Income
                                </span>
                            @else
                                <span class="bg-red-500/20 text-red-300 px-2 py-0.5 rounded-full text-xs font-semibold">
                                    Expense
                                </span>
                            @endif
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
                        <td colspan="5" class="text-center p-6 text-slate-500">
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

<script>
let currentPage = 1;
const rowsPerPage = 10;
const rows = document.querySelectorAll('.transaction-row');
const totalPages = Math.ceil(rows.length / rowsPerPage) || 1;

function showPage(page) {
    if (rows.length === 0) return;

    currentPage = page;

    let start = (currentPage - 1) * rowsPerPage;
    let end = start + rowsPerPage;

    rows.forEach((row, index) => {
        row.style.display =
            (index >= start && index < end) ? '' : 'none';
    });

    document.getElementById('pageIndicator').innerText =
        `Page ${currentPage} of ${totalPages}`;

    document.getElementById('prevBtn').disabled =
        (currentPage === 1);

    document.getElementById('nextBtn').disabled =
        (currentPage === totalPages);
}

function nextPage() {
    if (currentPage < totalPages) {
        showPage(currentPage + 1);
    }
}

function prevPage() {
    if (currentPage > 1) {
        showPage(currentPage - 1);
    }
}

document.addEventListener("DOMContentLoaded", function () {
    showPage(1);
});
</script>

</body>
</html>