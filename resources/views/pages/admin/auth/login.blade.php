<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-br from-indigo-50 via-white to-indigo-100 min-h-screen flex items-center justify-center">

    <div class="w-full max-w-md px-6">

        <!-- Card -->
        <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-8">

            <!-- Logo / Title -->
            <div class="text-center mb-6">
                <h1 class="text-2xl font-bold text-gray-800">Admin Panel</h1>
                <p class="text-gray-500 text-sm mt-1">Login untuk melanjutkan</p>
            </div>

            <!-- Form -->
            <form method="POST" action="{{ route('login_user') }}" class="space-y-5">
                @csrf

                <!-- GLOBAL ERROR -->
                @if ($errors->any())
                    <div class="bg-red-50 border border-red-200 text-red-600 px-4 py-3 rounded-md text-sm">
                        {{ $errors->first() }}
                    </div>
                @endif

                <!-- EMAIL -->
                <div>
                    <label class="text-sm text-gray-600">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}"
                        class="w-full px-4 py-2 mt-1 border rounded-md focus:ring-2 focus:ring-indigo-500
            @error('email') border-red-400 @enderror">

                    <div>
                        <label class="text-sm text-gray-600">Password</label>
                        <input type="password" name="password"
                            class="w-full px-4 py-2 mt-1 border rounded-md focus:ring-2 focus:ring-indigo-500
            @error('email') border-red-400 @enderror">
                    </div>

                    <button class="w-full mt-5 bg-indigo-600 hover:bg-indigo-700 text-white py-2 rounded-md transition">
                        Sign In
                    </button>
            </form>
        </div>

        <!-- Footer -->
        <p class="text-center text-xs text-gray-400 mt-6">
            © 2026 Admin Dashboard
        </p>

    </div>

</body>

</html>
