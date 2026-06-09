<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Workers | Expense Tracker</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 min-h-screen text-slate-100 font-sans py-6 px-4">

<div class="max-w-5xl mx-auto">

    <!-- Header -->
    <div class="flex flex-col md:flex-row justify-between items-center mb-6">
        <div>
            <h1 class="text-3xl font-bold text-white tracking-tight">
                👷 All Workers
            </h1>
            <p class="text-xs text-slate-400 mt-1">
                Manage your workers and track payments
            </p>
        </div>

        <div class="flex flex-wrap gap-2 mt-4 md:mt-0">
            <a href="/dashboard"
               class="bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-semibold px-4 py-2 rounded-lg text-xs shadow-md transition-all duration-300 hover:scale-105">
                📊 Dashboard
            </a>

            <a href="/worker"
               class="bg-gradient-to-r from-green-500 to-emerald-600 hover:from-green-600 hover:to-emerald-700 text-white font-semibold px-4 py-2 rounded-lg text-xs shadow-md transition-all duration-300 hover:scale-105">
                ➕ Add Worker
            </a>
        </div>
    </div>

    <!-- Search Box -->
    <div class="mb-6">
        <input
            type="text"
            id="workerSearch"
            placeholder="🔍 Search workers by name..."
            class="w-full bg-white/10 border border-white/10 text-white placeholder-slate-400 text-sm rounded-xl px-4 py-2.5 focus:outline-none focus:ring-1 focus:ring-blue-500 transition">
    </div>

    <!-- Worker Cards Grid -->
    <div id="workerContainer" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">

        @forelse($workers as $worker)

        <div class="worker-card bg-white/10 backdrop-blur-lg border border-white/10 rounded-2xl p-4 shadow-md hover:scale-[1.02] transition-all duration-300 flex flex-col justify-between">
            <div>
                <!-- Avatar Header -->
                <div class="flex items-center gap-3 mb-3">
                    <div class="w-10 h-10 rounded-full bg-gradient-to-r from-blue-500 to-purple-600 flex items-center justify-center text-xl shrink-0">
                        👷
                    </div>
                    <div class="min-w-0">
                        <h2 class="worker-name text-sm font-bold text-white truncate">
                            {{ $worker->worker_name }}
                        </h2>
                        <p class="text-[11px] text-slate-400 truncate">
                            📱 {{ $worker->mobile }}
                        </p>
                    </div>
                </div>

                <!-- Worker Details -->
                <div class="space-y-1.5 mb-4 text-xs">
                    <div class="flex justify-between">
                        <span class="text-slate-400">Borrowed Money</span>
                        <span class="text-white font-semibold">₹{{ number_format($borrowedmoney ?? 0,2) }}</span>
                    </div>
                    <div class="flex justify-between gap-2">
                        <span class="text-slate-400 shrink-0">Address</span>
                        <span class="text-white text-right truncate">{{ $worker->address ?? '-' }}</span>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="space-y-2">
                <div class="grid grid-cols-2 gap-2">
                    <a href="/workerprofile/{{ $worker->id }}"
                       class="text-center bg-gradient-to-r from-blue-500 to-indigo-600 hover:from-blue-600 hover:to-indigo-700 text-white py-1.5 rounded-lg text-xs font-semibold shadow-md transition-all duration-300">
                        👤 Profile
                    </a>

                    <a href="/worker_money"
                       class="text-center bg-gradient-to-r from-green-500 to-emerald-600 hover:from-green-600 hover:to-emerald-700 text-white py-1.5 rounded-lg text-xs font-semibold shadow-md transition-all duration-300">
                        💰 Give Money
                    </a>
                </div>

                <!-- Delete Button -->
                <form action="/deleteworker/{{ $worker->id }}"
                      method="POST"
                      onsubmit="return confirm('Delete this worker?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="w-full bg-gradient-to-r from-red-500 to-rose-600 hover:from-red-600 hover:to-rose-700 text-white py-1.5 rounded-lg text-xs font-semibold shadow-md transition-all duration-300">
                        🗑 Delete Worker
                    </button>
                </form>
            </div>

        </div>

        @empty

        <div class="col-span-full text-center py-12">
            <div class="text-5xl mb-3">👷</div>
            <h2 class="text-lg font-bold text-white mb-1">No Workers Found</h2>
            <p class="text-xs text-slate-400">Add your first worker to get started.</p>
        </div>

        @endforelse

    </div>

</div>

<!-- Background Effects -->
<div class="fixed top-0 left-0 w-72 h-72 bg-blue-500 opacity-10 blur-[120px] rounded-full -z-10"></div>
<div class="fixed bottom-0 right-0 w-72 h-72 bg-purple-500 opacity-10 blur-[120px] rounded-full -z-10"></div>

<!-- Search Script -->
<script>
const searchInput = document.getElementById('workerSearch');
searchInput.addEventListener('keyup', function () {
    const value = this.value.toLowerCase();
    document.querySelectorAll('.worker-card').forEach(card => {
        const workerName = card.querySelector('.worker-name')
            .textContent
            .toLowerCase();
        card.style.display = workerName.includes(value)
            ? 'flex'
            : 'none';
    });
});
</script>

</body>
</html>
