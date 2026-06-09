<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Expense</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 min-h-screen text-slate-100 font-sans py-8 px-4">

<div class="max-w-md mx-auto">

    <div class="backdrop-blur-lg bg-white/10 border border-white/10 rounded-2xl shadow-xl p-6">

        <h2 class="text-2xl font-bold text-red-400 mb-1">
            Add Expense
        </h2>

        <p class="text-xs text-slate-400 mb-6">
            Record and manage your daily expenses.
        </p>

        <form action="/transaction/add-expense" method="POST" class="space-y-4">
            @csrf

            <!-- Title -->
            <div>
                <label class="block text-xs font-semibold text-slate-300 mb-1.5 uppercase tracking-wide">
                    Title
                </label>
                <input type="text"
                       name="title"
                       placeholder="Enter expense title"
                       class="w-full bg-slate-800 border border-white/10 rounded-lg px-3 py-2 text-sm text-white placeholder-slate-500 focus:outline-none focus:ring-1 focus:ring-red-500 focus:border-red-500 transition"
                       required>
            </div>

            <!-- Amount -->
            <div>
                <label class="block text-xs font-semibold text-slate-300 mb-1.5 uppercase tracking-wide">
                    Amount
                </label>
                <input type="number"
                       name="amount"
                       placeholder="Enter amount"
                       class="w-full bg-slate-800 border border-white/10 rounded-lg px-3 py-2 text-sm text-white placeholder-slate-500 focus:outline-none focus:ring-1 focus:ring-red-500 focus:border-red-500 transition"
                       required>
            </div>

            <!-- Category -->
            <div>
                <label class="block text-xs font-semibold text-slate-300 mb-1.5 uppercase tracking-wide">
                    Category
                </label>
                <select name="category"
                        class="w-full bg-slate-800 border border-white/10 rounded-lg px-3 py-2 text-sm text-white focus:outline-none focus:ring-1 focus:ring-red-500 focus:border-red-500 transition"
                        required>
                    <option value="" class="bg-slate-800 text-slate-400">Select Category</option>
                    <option value="Food" class="bg-slate-800 text-white">Food</option>
                    <option value="Travel" class="bg-slate-800 text-white">Travel</option>
                    <option value="Shopping" class="bg-slate-800 text-white">Shopping</option>
                    <option value="Bills" class="bg-slate-800 text-white">Bills</option>
                    <option value="Entertainment" class="bg-slate-800 text-white">Entertainment</option>
                </select>
            </div>

            <!-- Date -->
            <div>
                <label class="block text-xs font-semibold text-slate-300 mb-1.5 uppercase tracking-wide">
                    Date
                </label>
                <input type="date"
                       name="expense_date"
                       class="w-full bg-slate-800 border border-white/10 rounded-lg px-3 py-2 text-sm text-white focus:outline-none focus:ring-1 focus:ring-red-500 focus:border-red-500 transition"
                       required>
            </div>

            <!-- Description -->
            <div>
                <label class="block text-xs font-semibold text-slate-300 mb-1.5 uppercase tracking-wide">
                    Description
                </label>
                <textarea name="description"
                          rows="3"
                          placeholder="Enter description"
                          class="w-full bg-slate-800 border border-white/10 rounded-lg px-3 py-2 text-sm text-white placeholder-slate-500 focus:outline-none focus:ring-1 focus:ring-red-500 focus:border-red-500 transition"></textarea>
            </div>

            <!-- Buttons -->
            <div class="flex gap-3 pt-2">
                <button type="submit"
                        class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg text-sm font-semibold shadow-md hover:scale-[1.02] transition-all duration-300">
                    Save Expense
                </button>
                <a href="/dashboard"
                   class="bg-slate-700 hover:bg-slate-600 text-white px-4 py-2 rounded-lg text-sm font-semibold shadow-md hover:scale-[1.02] transition-all duration-300">
                    Back
                </a>
            </div>

        </form>

    </div>

</div>

<!-- Background Glow Effects -->
<div class="fixed top-0 left-0 w-72 h-72 bg-red-500 opacity-10 blur-[120px] rounded-full -z-10"></div>
<div class="fixed bottom-0 right-0 w-72 h-72 bg-purple-500 opacity-10 blur-[120px] rounded-full -z-10"></div>

</body>
</html>
