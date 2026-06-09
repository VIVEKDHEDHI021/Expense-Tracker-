<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile | Expense Tracker</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 min-h-screen text-slate-100 font-sans py-8 px-4">

<div class="max-w-2xl mx-auto">

    <!-- Header & Back Button -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-white flex items-center gap-2">
            <span>👤</span> Profile
        </h1>
        <a href="/dashboard"
           class="bg-slate-700 hover:bg-slate-600 text-white px-4 py-2 rounded-lg text-sm font-semibold transition shadow-md">
            📊 Dashboard
        </a>
    </div>

    <!-- Main Profile Card -->
    <div class="bg-white/10 backdrop-blur-lg border border-white/10 rounded-2xl overflow-hidden shadow-xl">
        
        <!-- Header banner -->
        <div class="bg-gradient-to-r from-indigo-900/50 to-purple-900/50 p-6 text-center border-b border-white/10">
            <div class="w-20 h-20 rounded-full bg-white flex items-center justify-center text-4xl mx-auto text-indigo-600 border-4 border-white/20 shadow-md">
                💰
            </div>
            <h2 class="text-xl font-bold text-white mt-3">
                {{ Auth::user()->name ?? 'Demo User' }}
            </h2>
            <p class="text-xs text-slate-400 mt-1">
                Personal Expense Tracker User
            </p>
        </div>

        <div class="p-6">
            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                
                <div class="bg-white/5 border border-white/5 rounded-xl p-3 text-center">
                    <p class="text-xs uppercase text-slate-400">Total Expense</p>
                    <h3 class="text-lg font-bold text-red-400 mt-1">
                        ₹{{ number_format($totalExpense,2) }}
                    </h3>
                </div>

                <div class="bg-white/5 border border-white/5 rounded-xl p-3 text-center">
                    <p class="text-xs uppercase text-slate-400">Total Income</p>
                    <h3 class="text-lg font-bold text-green-400 mt-1">
                         ₹{{ number_format($totalIncome,2) }}
                    </h3>
                </div>

                <div class="bg-white/5 border border-white/5 rounded-xl p-3 text-center">
                    <p class="text-xs uppercase text-slate-400">Net Balance</p>
                    <h3 class="text-lg font-bold text-indigo-400 mt-1">
                        ₹{{ number_format($balance,2) }}
                    </h3>
                </div>

            </div>

            <!-- Divider -->
            <div class="border-t border-white/10 my-4"></div>

            <!-- User Information Section -->
            <div>
                <h3 class="text-sm font-bold text-slate-300 uppercase tracking-wider mb-3">User Information</h3>
                
                <div class="overflow-hidden rounded-xl border border-white/5 bg-white/5">
                    <table class="w-full text-sm">
                        <tr class="border-b border-white/5">
                            <td class="p-3 font-semibold text-slate-400 w-1/3">User Name</td>
                            <td class="p-3 text-white">{{ Auth::user()->name ?? 'Demo User' }}</td>
                        </tr>
                        <tr>
                            <td class="p-3 font-semibold text-slate-400">Email</td>
                            <td class="p-3 text-white">{{ Auth::user()->email ?? 'demo@example.com' }}</td>
                        </tr>
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