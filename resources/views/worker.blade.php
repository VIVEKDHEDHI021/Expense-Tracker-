<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Worker Details</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-900 min-h-screen flex items-center justify-center">

<div class="w-full max-w-2xl">

    <div class="bg-white/10 backdrop-blur-lg border border-white/10 rounded-2xl p-8 shadow-xl">

        <h1 class="text-3xl font-bold text-white mb-2">
            👨‍🌾 Worker Details
        </h1>

        <p class="text-slate-300 mb-6">
            Add your worker information once.
        </p>

        <form action="/worker" method="POST">

            @csrf

            <div class="mb-4">
                <label class="block text-white mb-2"  >
                    Worker Name
                </label>

                <input type="text"
                       name="worker_name"
                       class="w-full px-4 py-3 rounded-xl bg-slate-800 text-white border border-slate-700 focus:outline-none focus:border-blue-500"
                       placeholder="Enter worker name">
            </div>

            <div class="mb-4">
                <label class="block text-white mb-2">
                    Mobile Number
                </label>

                <input type="text"
                       name="mobile"
                       class="w-full px-4 py-3 rounded-xl bg-slate-800 text-white border border-slate-700"
                       placeholder="Enter mobile number">
            </div>

            <div class="mb-4">
                <label class="block text-white mb-2">
                    Village / Address
                </label>

                <input type="text"
                       name="address"
                       class="w-full px-4 py-3 rounded-xl bg-slate-800 text-white border border-slate-700"
                       placeholder="Enter village or address">
            </div>

            

            <div class="mb-6">
                <label class="block text-white mb-2">
                    Notes
                </label>

                <textarea name="notes"
                          rows="3"
                          class="w-full px-4 py-3 rounded-xl bg-slate-800 text-white border border-slate-700"
                          placeholder="Any additional details"></textarea>
            </div>

            <button type="submit"
                    class="w-full bg-blue-500 hover:bg-blue-600 text-white py-3 rounded-xl font-semibold transition">
                Save Worker Details
            </button>

        </form>

    </div>

</div>

</body>
</html>