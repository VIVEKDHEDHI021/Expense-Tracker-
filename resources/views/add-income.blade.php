<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Income</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 min-h-screen text-slate-100 font-sans py-8 px-4">

<div class="max-w-md mx-auto">

    <div class="backdrop-blur-lg bg-white/10 border border-white/10 rounded-2xl shadow-xl p-6">

        <h2 class="text-2xl font-bold text-green-400 mb-1">
            Add Income
        </h2>

        <p class="text-xs text-slate-400 mb-6">
            Record your income and keep track of earnings.
        </p>

        <form action="/transaction/add-income" method="POST" class="space-y-4">
            @csrf

            <!-- Amount -->
            <div>
                <label class="block text-xs font-semibold text-slate-300 mb-1.5 uppercase tracking-wide">
                    Amount
                </label>
                <input type="number"
                       name="amount"
                       placeholder="Enter amount"
                       class="w-full bg-slate-800 border border-white/10 rounded-lg px-3 py-2 text-sm text-white placeholder-slate-500 focus:outline-none focus:ring-1 focus:ring-green-500 focus:border-green-500 transition"
                       required>
            </div>

            <!-- Category -->
            <div>
                <label class="block text-xs font-semibold text-slate-300 mb-1.5 uppercase tracking-wide">
                    Category
                </label>
                <select name="category"
                        class="w-full bg-slate-800 border border-white/10 rounded-lg px-3 py-2 text-sm text-white focus:outline-none focus:ring-1 focus:ring-green-500 focus:border-green-500 transition"
                        required>
                    <option value="" class="bg-slate-800 text-slate-400">Select Category</option>
                    <option value="Salary" class="bg-slate-800 text-white">Salary</option>
                    <option value="Business" class="bg-slate-800 text-white">Business</option>
                    <option value="Freelance" class="bg-slate-800 text-white">Freelance</option>
                    <option value="Investment" class="bg-slate-800 text-white">Investment</option>
                    <option value="Bonus" class="bg-slate-800 text-white">Bonus</option>
                    <option value="Other" class="bg-slate-800 text-white">Other</option>
                </select>
            </div>

            <!-- Date -->
            <div>
                <label class="block text-xs font-semibold text-slate-300 mb-1.5 uppercase tracking-wide">
                    Date
                </label>
                <input type="date"
                       name="transaction_date"
                       class="w-full bg-slate-800 border border-white/10 rounded-lg px-3 py-2 text-sm text-white focus:outline-none focus:ring-1 focus:ring-green-500 focus:border-green-500 transition"
                       required>
            </div>

            <!-- Buttons -->
            <div class="flex gap-3 pt-2">
                <button type="submit"
                        class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg text-sm font-semibold shadow-md hover:scale-[1.02] transition-all duration-300">
                    Save Income
                </button>
                <a href="/dashboard"
                   class="bg-slate-700 hover:bg-slate-600 text-white px-4 py-2 rounded-lg text-sm font-semibold shadow-md hover:scale-[1.02] transition-all duration-300">
                    Back
                </a>
            </div>

        </form>

    </div>

</div>

<!-- Background Glow -->
<div class="fixed top-0 left-0 w-72 h-72 bg-green-500 opacity-10 blur-[120px] rounded-full -z-10"></div>
<div class="fixed bottom-0 right-0 w-72 h-72 bg-blue-500 opacity-10 blur-[120px] rounded-full -z-10"></div>

</body>
</html>
