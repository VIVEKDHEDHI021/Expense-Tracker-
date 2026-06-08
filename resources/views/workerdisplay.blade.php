<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Worker Transactions</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 min-h-screen">

<div class="container mx-auto px-6 py-8">

   <div class="flex flex-col md:flex-row justify-between items-center mb-10">

    <div>
        <h1 class="text-5xl font-bold text-white">
            Worker Profile
        </h1>

        <p class="text-slate-300 mt-2">
            Track payments and expenses for this worker
        </p>
    </div>

    <div class="flex flex-wrap gap-4 mt-6 md:mt-0 items-center justify-center">

        <!-- Dashboard Button -->
        <a href="/dashboard"
           class="flex items-center justify-center gap-2 w-44 h-12
                  bg-gradient-to-r from-blue-600 to-indigo-600
                  hover:from-blue-700 hover:to-indigo-700
                  text-white font-semibold rounded-xl shadow-lg
                  hover:scale-105 transition-all duration-300">
            <span>📊</span>
            Dashboard
        </a>

        <!-- Add Worker Button -->
        <a href="/worker"
           class="flex items-center justify-center gap-2 w-44 h-12
                  bg-gradient-to-r from-green-500 to-emerald-600
                  hover:from-green-600 hover:to-emerald-700
                  text-white font-semibold rounded-xl shadow-lg
                  hover:scale-105 transition-all duration-300">
            <span>➕</span>
            Add Worker
        </a>

        <!-- Give Money Button -->
        <a href="/worker_money"
           class="flex items-center justify-center gap-2 w-44 h-12
                  bg-gradient-to-r from-red-600 to-rose-600
                  hover:from-red-700 hover:to-rose-700
                  text-white font-semibold rounded-xl shadow-lg
                  hover:scale-105 transition-all duration-300">
            <span>💰</span>
            Give Money
        </a>

    </div>

</div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
        <div class="backdrop-blur-lg bg-white/10 border border-white/10 rounded-2xl p-6 shadow-xl hover:scale-105 transition duration-300">
            <p class="text-red-300 text-sm uppercase">
                Total Money Given Till Now
            </p>
            <h2 class="text-4xl font-bold text-white mt-2">
                ₹{{ number_format($totalExpense, 2) }}
            </h2>
        </div>
    </div>

    <div class="backdrop-blur-lg bg-white/10 border border-white/10 rounded-2xl p-6 shadow-xl">

        <div class="flex flex-col sm:flex-row justify-between items-center mb-6 gap-4">
            <h2 class="text-2xl font-bold text-white">
                Payment History
            </h2>
            
            <div class="flex items-center gap-2">
                <button id="prevBtn" onclick="prevPage()" class="bg-white/10 hover:bg-white/20 text-white px-4 py-2 rounded-lg text-sm transition font-semibold disabled:opacity-30 disabled:cursor-not-allowed">
                    ◀ Prev
                </button>
                <span id="pageIndicator" class="text-slate-300 text-sm px-2 font-medium">
                    Page 1 of 1
                </span>
                <button id="nextBtn" onclick="nextPage()" class="bg-white/10 hover:bg-white/20 text-white px-4 py-2 rounded-lg text-sm transition font-semibold disabled:opacity-30 disabled:cursor-not-allowed">
                    Next ▶
                </button>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-white/10 text-slate-300">
                        <th class="p-4 text-left">Name</th>
                        <th class="p-4 text-left">Date</th>
                        <th class="p-4 text-left">Type</th>
                        <th class="p-4 text-left">Amount</th>
                       
                    </tr>
                </thead>
                <tbody id="tableBody">
                @forelse($recentTransactions as $transaction)
                    <tr class="transaction-row border-b border-white/5 hover:bg-white/5 transition">
                        <td class="p-4 text-white">
                            {{ $transaction->worker_name }}
                        </td>
                        <td class="p-4 text-white">
                            {{ $transaction->transaction_date}}
                        </td>
                        <td class="p-4">
                            @if($transaction->type == 'income')
                                <span class="bg-green-500/20 text-green-300 px-3 py-1 rounded-full text-sm">
                                    Income
                                </span>
                            @else
                                <span class="bg-red-500/20 text-red-300 px-3 py-1 rounded-full text-sm">
                                    Expense
                                </span>
                            @endif
                        </td>
                        <td class="p-4 text-white font-semibold">
                            ₹{{ number_format($transaction->amount, 2) }}
                        </td>
                       
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center p-6 text-slate-400">
                            No Transactions Found
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

    </div>

</div>

<div class="fixed top-0 left-0 w-72 h-72 bg-blue-500 opacity-20 blur-[120px] rounded-full -z-10"></div>
<div class="fixed bottom-0 right-0 w-72 h-72 bg-purple-500 opacity-20 blur-[120px] rounded-full -z-10"></div>

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
            if (index >= start && index < end) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });

        document.getElementById('pageIndicator').innerText = `Page ${currentPage} of ${totalPages}`;
        document.getElementById('prevBtn').disabled = (currentPage === 1);
        document.getElementById('nextBtn').disabled = (currentPage === totalPages);
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

    document.addEventListener("DOMContentLoaded", function() {
        showPage(1);
    });
</script>

</body>
</html> 