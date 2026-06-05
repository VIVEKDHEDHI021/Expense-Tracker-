<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense Tracker Dashboard</title>

```
<script src="https://cdn.tailwindcss.com"></script>
```

</head>

<body class="bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 min-h-screen">

<div class="container mx-auto px-6 py-8">

```
<!-- Header -->
<div class="flex flex-col md:flex-row justify-between items-center mb-10">

    <div>
        <h1 class="text-5xl font-bold text-white">
            Expense Tracker
        </h1>

        <p class="text-slate-300 mt-2">
            Manage your income and expenses
        </p>
    </div>

    <div class="flex gap-3 mt-6 md:mt-0">

        <a href="/transaction/add-income"
           class="bg-green-500 hover:bg-green-600 text-white px-6 py-3 rounded-xl shadow-lg hover:scale-105 transition-all duration-300">
            + Income
        </a>

        <a href="/transaction/add-expense"
           class="bg-indigo-500 hover:bg-indigo-600 text-white px-6 py-3 rounded-xl shadow-lg hover:scale-105 transition-all duration-300">
            + Expense
        </a>

    </div>

</div>

<!-- Cards -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">

    <!-- Income -->
    <div class="backdrop-blur-lg bg-white/10 border border-white/10 rounded-2xl p-6 shadow-xl hover:scale-105 transition duration-300">

        <p class="text-green-300 text-sm uppercase">
            Total Income
        </p>

        <h2 class="text-4xl font-bold text-white mt-2">
            ₹{{ number_format($totalIncome,2) }}
        </h2>

    </div>

    <!-- Expense -->
    <div class="backdrop-blur-lg bg-white/10 border border-white/10 rounded-2xl p-6 shadow-xl hover:scale-105 transition duration-300">

        <p class="text-red-300 text-sm uppercase">
            Total Expense
        </p>

        <h2 class="text-4xl font-bold text-white mt-2">
            ₹{{ number_format($totalExpense,2) }}
        </h2>

    </div>

    <!-- Balance -->
    <div class="backdrop-blur-lg bg-white/10 border border-white/10 rounded-2xl p-6 shadow-xl hover:scale-105 transition duration-300">

        <p class="text-blue-300 text-sm uppercase">
            Net Balance
        </p>

        <h2 class="text-4xl font-bold text-white mt-2">
            ₹{{ number_format($balance,2) }}
        </h2>

    </div>

</div>

<!-- Recent Transactions -->
<div class="backdrop-blur-lg bg-white/10 border border-white/10 rounded-2xl p-6 shadow-xl">

    <div class="flex justify-between items-center mb-6">

        <h2 class="text-2xl font-bold text-white">
            Recent Transactions
        </h2>

    </div>

    <div class="overflow-x-auto">

        <table class="w-full">

            <thead>

                <tr class="border-b border-white/10 text-slate-300">

                    <th class="p-4 text-left">Title</th>
                    <th class="p-4 text-left">Category</th>
                    <th class="p-4 text-left">Type</th>
                    <th class="p-4 text-left">Amount</th>
                    <th class="p-4 text-left">Date</th>

                </tr>

            </thead>

            <tbody>

            @forelse($recentTransactions as $transaction)

                <tr class="border-b border-white/5 hover:bg-white/5 transition">

                    <td class="p-4 text-white">
                        {{ $transaction->title }}
                    </td>

                    <td class="p-4 text-white">
                        {{ $transaction->category }}
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

                    <td class="p-4 text-slate-300">
                        {{ $transaction->transaction_date }}
                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="5"
                        class="text-center p-6 text-slate-400">

                        No Transactions Found

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>
```

</div>

<!-- Glow Effects -->

<div class="fixed top-0 left-0 w-72 h-72 bg-blue-500 opacity-20 blur-[120px] rounded-full -z-10"></div>

<div class="fixed bottom-0 right-0 w-72 h-72 bg-purple-500 opacity-20 blur-[120px] rounded-full -z-10"></div>

</body>
</html>
