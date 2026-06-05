<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Expense</title>

```
<script src="https://cdn.tailwindcss.com"></script>
```

</head>

<body class="bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 min-h-screen">

<div class="container mx-auto px-6 py-10">

```
<div class="max-w-2xl mx-auto">

    <div class="backdrop-blur-lg bg-white/10 border border-white/10 rounded-3xl shadow-2xl p-8">

        <h2 class="text-4xl font-bold text-red-400 mb-2">
            Add Expense
        </h2>

        <p class="text-slate-300 mb-8">
            Record and manage your daily expenses.
        </p>

        <form action="/transaction/add-expense" method="POST">

            @csrf

            <!-- Title -->
            <div class="mb-6">

                <label class="block text-slate-300 mb-2">
                    Title
                </label>

                <input type="text"
                       name="title"
                       placeholder="Enter expense title"
                       class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-slate-400 focus:outline-none focus:border-red-500"
                       required>

            </div>

            <!-- Amount -->
            <div class="mb-6">

                <label class="block text-slate-300 mb-2">
                    Amount
                </label>

                <input type="number"
                       name="amount"
                       placeholder="Enter amount"
                       class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-slate-400 focus:outline-none focus:border-red-500"
                       required>

            </div>

            <!-- Category -->
            <div class="mb-6">

                <label class="block text-slate-300 mb-2">
                    Category
                </label>

                <select name="category"
                        class="w-full bg-slate-800 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-red-500"
                        required>

                    <option value="">Select Category</option>
                    <option value="Food">Food</option>
                    <option value="Travel">Travel</option>
                    <option value="Shopping">Shopping</option>
                    <option value="Bills">Bills</option>
                    <option value="Entertainment">Entertainment</option>

                </select>

            </div>

            <!-- Date -->
            <div class="mb-6">

                <label class="block text-slate-300 mb-2">
                    Date
                </label>

                <input type="date"
                       name="expense_date"
                       class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-red-500"
                       required>

            </div>

            <!-- Description -->
            <div class="mb-8">

                <label class="block text-slate-300 mb-2">
                    Description
                </label>

                <textarea name="description"
                          rows="4"
                          placeholder="Enter description"
                          class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-slate-400 focus:outline-none focus:border-red-500"></textarea>

            </div>

            <!-- Buttons -->
            <div class="flex gap-3">

                <button type="submit"
                        class="bg-red-500 hover:bg-red-600 text-white px-6 py-3 rounded-xl shadow-lg hover:scale-105 transition-all duration-300">

                    Save Expense

                </button>

                <a href="/dashboard"
                   class="bg-slate-700 hover:bg-slate-600 text-white px-6 py-3 rounded-xl shadow-lg hover:scale-105 transition-all duration-300">

                    Back

                </a>

            </div>

        </form>

    </div>

</div>
```

</div>

<!-- Background Glow Effects -->

<div class="fixed top-0 left-0 w-72 h-72 bg-red-500 opacity-20 blur-[120px] rounded-full -z-10"></div>

<div class="fixed bottom-0 right-0 w-72 h-72 bg-purple-500 opacity-20 blur-[120px] rounded-full -z-10"></div>

</body>
</html>
