<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Income</title>

```
<script src="https://cdn.tailwindcss.com"></script>
```

</head>

<body class="bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 min-h-screen">

<div class="container mx-auto px-6 py-10">

```
<div class="max-w-2xl mx-auto">

    <div class="backdrop-blur-lg bg-white/10 border border-white/10 rounded-3xl shadow-2xl p-8">

        <h2 class="text-4xl font-bold text-green-400 mb-2">
            Add Income
        </h2>

        <p class="text-slate-300 mb-8">
            Record your income and keep track of earnings.
        </p>

        <form action="/transaction/add-income" method="POST">

            @csrf

            <!-- Amount -->
            <div class="mb-6">

                <label class="block text-slate-300 mb-2">
                    Amount
                </label>

                <input type="number"
                       name="amount"
                       placeholder="Enter amount"
                       class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-slate-400 focus:outline-none focus:border-green-500"
                       required>

            </div>

            <!-- Category -->
            <div class="mb-6">

                <label class="block text-slate-300 mb-2">
                    Category
                </label>

                <select name="category"
                        class="w-full bg-slate-800 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-green-500">

                    <option value="">Select Category</option>
                    <option value="Salary">Salary</option>
                    <option value="Business">Business</option>
                    <option value="Freelance">Freelance</option>
                    <option value="Investment">Investment</option>
                    <option value="Bonus">Bonus</option>
                    <option value="Other">Other</option>

                </select>

            </div>

            <!-- Date -->
            <div class="mb-8">

                <label class="block text-slate-300 mb-2">
                    Date
                </label>

                <input type="date"
                       name="transaction_date"
                       class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-green-500"
                       required>

            </div>

            <!-- Buttons -->
            <div class="flex gap-3">

                <button type="submit"
                        class="bg-green-500 hover:bg-green-600 text-white px-6 py-3 rounded-xl shadow-lg hover:scale-105 transition-all duration-300">

                    Save Income

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

<!-- Background Glow -->

<div class="fixed top-0 left-0 w-72 h-72 bg-green-500 opacity-20 blur-[120px] rounded-full -z-10"></div>

<div class="fixed bottom-0 right-0 w-72 h-72 bg-blue-500 opacity-20 blur-[120px] rounded-full -z-10"></div>

</body>
</html>
