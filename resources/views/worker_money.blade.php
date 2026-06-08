<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Give Money to Worker</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 min-h-screen flex items-center justify-center py-12 px-6">

    <div class="w-full max-w-lg backdrop-blur-lg bg-white/10 border border-white/10 rounded-2xl p-8 shadow-2xl relative">
        
        <div class="mb-8 text-center">
            <h1 class="text-3xl font-bold text-white flex items-center justify-center gap-2">
                <span>➖</span> Give Money
            </h1>
            <p class="text-slate-300 mt-2 text-sm">
                Record an expense payment given to a worker
            </p>
        </div>

        <form action="/worker_money" method="POST" class="space-y-6">
            @csrf

         <div>
    <label for="worker_name" class="block text-sm font-medium text-slate-300 mb-2">
        Select Worker
    </label>

    <select name="worker_name"
            id="worker_name"
            required
            class="w-full bg-slate-800 border border-slate-600 rounded-xl px-4 py-3 text-white font-medium shadow-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">

        <option value="" disabled selected class="bg-slate-800 text-slate-400">
            Select Worker
        </option>

        @foreach($workers as $worker)
            <option value="{{ $worker->worker_name }}"
                    class="bg-slate-800 text-white">
                {{ $worker->worker_name }}
            </option>
        @endforeach

    </select>
</div>

            <div>
                <label for="amount" class="block text-sm font-medium text-slate-300 mb-2">
                    Amount (₹)
                </label>
                <input type="number" name="amount" id="amount" step="0.01" required
                       placeholder="0.00"
                       class="w-full bg-slate-800/50 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-red-500/50 transition">
            </div>

            <div>
                <label for="transaction_date" class="block text-sm font-medium text-slate-300 mb-2">
                    Payment Date
                </label>
                <input type="date" name="transaction_date" id="transaction_date" required
                       value="{{ date('Y-m-y') }}"
                       class="w-full bg-slate-800/50 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-red-500/50 transition">
            </div>

            <div>
                <label for="payment_type" class="block text-sm font-medium text-slate-300 mb-2">
                    Payment Mode
                </label>
                <select name="payment_type" id="payment_type" required
                        class="w-full bg-slate-800 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-red-500/50 transition appearance-none">
                    <option value="cash" class="bg-slate-800 text-white">💵 Cash</option>
                    <option value="online" class="bg-slate-800 text-white">📱 Online / UPI</option>
                    <option value="bank" class="bg-slate-800 text-white">🏦 Bank Transfer</option>
                </select>
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-slate-300 mb-2">
                    Description / Remarks (Optional)
                </label>
                <textarea name="description" id="description" rows="3"
                          placeholder="What was this payment for?"
                          class="w-full bg-slate-800/50 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-red-500/50 transition"></textarea>
            </div>

            <div class="flex flex-wrap gap-4 items-center justify-center pt-4">
                
                <a href="/dashboard" 
                   class="flex items-center justify-center w-40 bg-slate-700 hover:bg-slate-600 text-white font-semibold py-3 rounded-xl shadow-lg hover:scale-105 transition-all duration-300 text-center text-sm">
                    Cancel
                </a>

                <button type="submit"
                        class="flex items-center justify-center w-40 bg-gradient-to-r from-red-600 to-rose-600 hover:from-red-700 hover:to-rose-700 text-white font-semibold py-3 rounded-xl shadow-lg hover:scale-105 transition-all duration-300 text-center text-sm">
                    Save Payment
                </button>

            </div>

        </form>

    </div>

    <div class="fixed top-0 left-0 w-72 h-72 bg-blue-500 opacity-20 blur-[120px] rounded-full -z-10"></div>
    <div class="fixed bottom-0 right-0 w-72 h-72 bg-purple-500 opacity-20 blur-[120px] rounded-full -z-10"></div>

</body>
</html>