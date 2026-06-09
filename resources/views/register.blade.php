<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Expense Tracker</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 min-h-screen flex items-center justify-center p-4">

<div class="w-full max-w-md bg-white/10 backdrop-blur-lg border border-white/10 rounded-2xl p-6 shadow-xl relative">

    <div class="text-center mb-6">
        <div class="text-4xl mb-2">💰</div>
        <h2 class="text-2xl font-bold text-white">Create Account</h2>
        <p class="text-xs text-slate-400 mt-1">Track your income and expenses easily</p>
    </div>

    <form action="/register" method="POST" class="space-y-4">
        @csrf

        <div>
            <label class="block text-xs font-semibold text-slate-300 mb-1.5 uppercase tracking-wide">Full Name</label>
            <input
                type="text"
                name="name"
                class="w-full bg-slate-800/60 border border-white/10 rounded-lg px-3 py-2 text-sm text-white placeholder-slate-500 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 transition"
                placeholder="Enter your full name"
                value="{{ old('name') }}"
            >
            @error('name')
                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-xs font-semibold text-slate-300 mb-1.5 uppercase tracking-wide">Email Address</label>
            <input
                type="email"
                name="email"
                class="w-full bg-slate-800/60 border border-white/10 rounded-lg px-3 py-2 text-sm text-white placeholder-slate-500 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 transition"
                placeholder="Enter your email"
                value="{{ old('email') }}"
            >
            @error('email')
                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-xs font-semibold text-slate-300 mb-1.5 uppercase tracking-wide">Mobile Number</label>
            <input
                type="text"
                name="number"
                class="w-full bg-slate-800/60 border border-white/10 rounded-lg px-3 py-2 text-sm text-white placeholder-slate-500 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 transition"
                placeholder="Enter mobile number"
                value="{{ old('number') }}"
            >
            @error('number')
                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-xs font-semibold text-slate-300 mb-1.5 uppercase tracking-wide">Password</label>
            <input
                type="password"
                name="password"
                class="w-full bg-slate-800/60 border border-white/10 rounded-lg px-3 py-2 text-sm text-white placeholder-slate-500 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 transition"
                placeholder="Enter password"
            >
            @error('password')
                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-xs font-semibold text-slate-300 mb-1.5 uppercase tracking-wide">Confirm Password</label>
            <input
                type="password"
                name="password_confirmation"
                class="w-full bg-slate-800/60 border border-white/10 rounded-lg px-3 py-2 text-sm text-white placeholder-slate-500 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 transition"
                placeholder="Confirm password"
            >
        </div>

        <button type="submit" class="w-full bg-gradient-to-r from-indigo-600 to-violet-600 hover:from-indigo-700 hover:to-violet-700 text-white font-semibold py-2 rounded-lg text-sm shadow-md hover:scale-[1.02] transition duration-300 mt-2">
            Register
        </button>
    </form>

    <div class="text-center mt-4 text-xs text-slate-400">
        Already have an account?
        <a href="/login" class="text-indigo-400 hover:text-indigo-300 font-semibold underline">Login</a>
    </div>

</div>

<!-- Background Glow Effects -->
<div class="fixed top-0 left-0 w-72 h-72 bg-blue-500 opacity-10 blur-[120px] rounded-full -z-10"></div>
<div class="fixed bottom-0 right-0 w-72 h-72 bg-purple-500 opacity-10 blur-[120px] rounded-full -z-10"></div>

</body>
</html>