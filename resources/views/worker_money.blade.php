<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Give Money to Worker | Expense Tracker</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Outfit', sans-serif;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 min-h-screen flex items-center justify-center p-4">

    <div class="w-full max-w-md backdrop-blur-lg bg-white/10 border border-white/10 rounded-2xl p-6 shadow-xl relative">
        
        <div class="mb-6 text-center">
            <h1 class="text-2xl font-bold text-white flex items-center justify-center gap-2">
                <span>➖</span> Give Money
            </h1>
            <p class="text-xs text-slate-400 mt-1">
                Record an expense payment given to a worker
            </p>
        </div>

        <form action="/worker_money" method="POST" class="space-y-4">
            @csrf

            <div>
    <label for="worker_id"
        class="block text-xs font-semibold text-slate-300 mb-1.5 uppercase tracking-wide">
        Select Worker
    </label>

    <select name="worker_id" id="worker_id" required
            class="w-full bg-slate-800 border border-white/10 rounded-lg px-3 py-2 text-sm text-white focus:outline-none focus:ring-1 focus:ring-red-500 focus:border-red-500 transition">
        <option value="" class="bg-slate-800 text-slate-400">Select Worker</option>

        @foreach($workers as $worker)
            <option value="{{ $worker->worker_id }}" class="bg-slate-800 text-white">
                {{ $worker->worker_id }} - {{ $worker->worker_name }}
            </option>
        @endforeach
    </select>
</div>

            <div>
                <label for="amount" class="block text-xs font-semibold text-slate-300 mb-1.5 uppercase tracking-wide">
                    Amount (₹)
                </label>
                <input type="number" name="amount" id="amount" step="0.01" required
                       placeholder="0.00"
                       class="w-full bg-slate-800 border border-white/10 rounded-lg px-3 py-2 text-sm text-white placeholder-slate-500 focus:outline-none focus:ring-1 focus:ring-red-500 focus:border-red-500 transition">
            </div>

            <div>
                <label for="transaction_date" class="block text-xs font-semibold text-slate-300 mb-1.5 uppercase tracking-wide">
                    Payment Date
                </label>
                <input type="date" name="transaction_date" id="transaction_date" required
                       value="{{ date('Y-m-d') }}"
                       class="w-full bg-slate-800 border border-white/10 rounded-lg px-3 py-2 text-sm text-white focus:outline-none focus:ring-1 focus:ring-red-500 focus:border-red-500 transition">
            </div>

            <div>
                <label for="payment_type" class="block text-xs font-semibold text-slate-300 mb-1.5 uppercase tracking-wide">
                    Payment Mode
                </label>
                <select name="payment_type" id="payment_type" required
                        class="w-full bg-slate-800 border border-white/10 rounded-lg px-3 py-2 text-sm text-white focus:outline-none focus:ring-1 focus:ring-red-500 focus:border-red-500 transition">
                    <option value="cash" class="bg-slate-800 text-white">💵 Cash</option>
                    <option value="online" class="bg-slate-800 text-white">📱 Online / UPI</option>
                    <option value="bank" class="bg-slate-800 text-white">🏦 Bank Transfer</option>
                </select>
            </div>

            <div>
                <label for="description" class="block text-xs font-semibold text-slate-300 mb-1.5 uppercase tracking-wide">
                    Description / Remarks (Optional)
                </label>
                <textarea name="description" id="description" rows="3"
                          placeholder="What was this payment for?"
                          class="w-full bg-slate-800 border border-white/10 rounded-lg px-3 py-2 text-sm text-white placeholder-slate-500 focus:outline-none focus:ring-1 focus:ring-red-500 focus:border-red-500 transition"></textarea>
            </div>

            <div class="flex gap-3 pt-2">
                <button type="submit"
                        class="flex-1 bg-gradient-to-r from-red-600 to-rose-600 hover:from-red-700 hover:to-rose-700 text-white font-semibold py-2 rounded-lg text-sm shadow-md hover:scale-[1.02] transition">
                    Save Payment
                </button>
                <a href="/dashboard" 
                   class="bg-slate-700 hover:bg-slate-600 text-white px-4 py-2 rounded-lg text-sm font-semibold shadow-md hover:scale-[1.02] flex items-center justify-center transition">
                    Cancel
                </a>
            </div>

        </form>

    </div>

    <!-- Background Glow Effects -->
    <div class="fixed top-0 left-0 w-72 h-72 bg-blue-500 opacity-10 blur-[120px] rounded-full -z-10"></div>
    <div class="fixed bottom-0 right-0 w-72 h-72 bg-purple-500 opacity-10 blur-[120px] rounded-full -z-10"></div>

</body>
</html>