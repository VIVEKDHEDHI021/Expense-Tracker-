<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Expense Tracker</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 min-h-screen flex items-center justify-center p-4">

<div class="w-full max-w-md bg-white/10 backdrop-blur-lg border border-white/10 rounded-2xl p-6 shadow-xl relative">

    <div class="text-center mb-6">
        <div class="text-4xl mb-2">💰</div>
        <h2 class="text-2xl font-bold text-white">Expense Tracker</h2>
        <p class="text-xs text-slate-400 mt-1">Welcome Back</p>
    </div>

    <form action="/login" method="POST" class="space-y-4">
        @csrf

        <div>
            <label class="block text-xs font-semibold text-slate-300 mb-1.5 uppercase tracking-wide">Email</label>
            <input type="email"
                   name="email"
                   placeholder="Enter your email"
                   class="w-full bg-slate-800/60 border border-white/10 rounded-lg px-3 py-2 text-sm text-white placeholder-slate-500 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 transition"
                   required>
        </div>

        <div>
            <label class="block text-xs font-semibold text-slate-300 mb-1.5 uppercase tracking-wide">Password</label>
            <input type="password"
                   name="password"
                   placeholder="Enter your password"
                   class="w-full bg-slate-800/60 border border-white/10 rounded-lg px-3 py-2 text-sm text-white placeholder-slate-500 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 transition"
                   required>
        </div>

        <button type="submit"
                class="w-full bg-gradient-to-r from-indigo-600 to-violet-600 hover:from-indigo-700 hover:to-violet-700 text-white font-semibold py-2 rounded-lg text-sm shadow-md hover:scale-[1.02] transition duration-300 mt-2">
            Login
        </button>
    </form>

    <div class="text-center mt-4 text-xs text-slate-400">
        New to Expense Tracker? 
        <a href="/" class="text-indigo-400 hover:text-indigo-300 font-semibold underline">Create New Account</a>
    </div>

</div>

<!-- Background Glow Effects -->
<div class="fixed top-0 left-0 w-72 h-72 bg-blue-500 opacity-10 blur-[120px] rounded-full -z-10"></div>
<div class="fixed bottom-0 right-0 w-72 h-72 bg-purple-500 opacity-10 blur-[120px] rounded-full -z-10"></div>

</body>
</html>