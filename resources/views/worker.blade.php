<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Worker Details | Expense Tracker</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Outfit', sans-serif;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 min-h-screen text-slate-100 py-8 px-4 flex items-center justify-center">

<div class="w-full max-w-md">

    <div class="bg-white/10 backdrop-blur-lg border border-white/10 rounded-2xl p-6 shadow-xl relative">

        <h1 class="text-2xl font-bold text-white mb-1">
            👨‍🌾 Worker Details
        </h1>

        <p class="text-xs text-slate-400 mb-6">
            Add your worker information once.
        </p>

        <form action="/worker" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block text-xs font-semibold text-slate-300 mb-1.5 uppercase tracking-wide">
                    Worker Name
                </label>
                <input type="text"
                       name="worker_name"
                       required
                       class="w-full px-3 py-2 rounded-lg bg-slate-800/60 text-white border border-white/10 text-sm placeholder-slate-500 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 transition"
                       placeholder="Enter worker name">
            </div>

            <div>
                <label class="block text-xs font-semibold text-slate-300 mb-1.5 uppercase tracking-wide">
                    Mobile Number
                </label>
                <input type="text"
                       name="mobile"
                       required
                       class="w-full px-3 py-2 rounded-lg bg-slate-800/60 text-white border border-white/10 text-sm placeholder-slate-500 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 transition"
                       placeholder="Enter mobile number">
            </div>

            <div>
                <label class="block text-xs font-semibold text-slate-300 mb-1.5 uppercase tracking-wide">
                    Village / Address
                </label>
                <input type="text"
                       name="address"
                       required
                       class="w-full px-3 py-2 rounded-lg bg-slate-800/60 text-white border border-white/10 text-sm placeholder-slate-500 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 transition"
                       placeholder="Enter village or address">
            </div>

            <div>
                <label class="block text-xs font-semibold text-slate-300 mb-1.5 uppercase tracking-wide">
                    Notes
                </label>
                <textarea name="notes"
                          rows="3"
                          class="w-full px-3 py-2 rounded-lg bg-slate-800/60 text-white border border-white/10 text-sm placeholder-slate-500 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 transition"
                          placeholder="Any additional details"></textarea>
            </div>

            <div class="flex gap-3 pt-2">
                <button type="submit"
                        class="flex-1 bg-blue-500 hover:bg-blue-600 text-white py-2 rounded-lg font-semibold text-sm shadow-md hover:scale-[1.02] transition">
                    Save Worker
                </button>
                <a href="/workerlist"
                   class="bg-slate-700 hover:bg-slate-600 text-white px-4 py-2 rounded-lg text-sm font-semibold shadow-md hover:scale-[1.02] flex items-center justify-center transition">
                    Cancel
                </a>
            </div>

        </form>

    </div>

</div>

<!-- Background Glow Effects -->
<div class="fixed top-0 left-0 w-72 h-72 bg-blue-500 opacity-10 blur-[120px] rounded-full -z-10"></div>
<div class="fixed bottom-0 right-0 w-72 h-72 bg-purple-500 opacity-10 blur-[120px] rounded-full -z-10"></div>

</body>
</html>