<header class="h-16 bg-white border-b border-gray-200 px-6 flex items-center justify-between shadow-sm">

    <!-- LEFT -->
    <div class="flex items-center gap-4">
        <button id="menuToggle" class="md:hidden rounded-md hover:bg-gray-100">
            <span class="material-symbols-outlined">menu</span>
        </button>
    </div>

    <!-- RIGHT -->
    <div class="flex items-center gap-4">

        <!-- Notification -->
        <button class="relative text-gray-600 hover:text-indigo-600 transition">
            🔔
            <span
                class="absolute -top-1 -right-1 bg-red-500 text-white text-xs w-4 h-4 flex items-center justify-center rounded-full">
                3
            </span>
        </button>

        <!-- Profile -->
        @auth
            <div class="relative group">

                <div class="flex items-center gap-3 cursor-pointer">

                    <div class="text-right hidden md:block">
                        <p class="text-sm font-medium text-gray-700">
                            {{ auth()->user()->name }}
                        </p>
                        <p class="text-xs text-gray-400">
                            {{ auth()->user()->email }}
                        </p>
                    </div>

                    <!-- Avatar -->
                    <div
                        class="w-9 h-9 rounded-full bg-indigo-500 flex items-center justify-center text-white font-semibold">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>

                </div>

                <!-- Dropdown -->
                <div
                    class="absolute right-0 mt-3 w-48 bg-white border border-gray-200 rounded-lg shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition duration-200">

                    <a href="/profile" class="block px-4 py-2 text-sm hover:bg-gray-100">
                        Profile
                    </a>

                    <a href="/settings" class="block px-4 py-2 text-sm hover:bg-gray-100">
                        Settings
                    </a>

                    <hr>

                    <!-- Logout -->
                    <form id="logoutForm" method="POST" action="{{ route('logout_user') }}">
                        @csrf
                        <button type="button" onclick="confirmLogout()"
                            class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100">
                            Logout
                        </button>
                    </form>

                </div>

            </div>
        @endauth

    </div>

</header>
@push('script')
    <script>
        function confirmLogout() {
            Swal.fire({
                title: 'Logout?',
                text: "Apakah kamu yakin ingin keluar?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#4f46e5',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, logout',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('logoutForm').submit();
                }
            })
        }
    </script>
@endpush
