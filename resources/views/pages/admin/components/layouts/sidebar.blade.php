<div id="sidebarOverlay" class="fixed inset-0 bg-black/30 z-40 hidden md:hidden"></div>

<aside id="sidebar"
    class="fixed md:static z-50 inset-y-0 left-0 w-60 bg-white border-r border-gray-200 transform -translate-x-full md:translate-x-0 transition duration-300 flex flex-col">

    <!-- LOGO -->
    <div class="h-14 flex items-center px-5 border-b">
        <h1 class="text-lg font-semibold text-indigo-600">AdminPanel</h1>
    </div>

    <!-- MENU -->
    <nav class="flex-1 px-3 py-4 overflow-y-auto text-sm">

        <!-- MAIN -->
        <p class="text-[11px] font-semibold text-gray-400 uppercase mb-2 px-2">
            Main
        </p>

        <div class="space-y-1">

            <a href="{{route('dashboard')}}"
                class="flex items-center gap-3 px-3 py-2 rounded-md {{ request()->routeIs('dashboard') ? 'bg-indigo-50 text-indigo-600 font-medium' : 'text-gray-600' }}">
                <span class="material-symbols-outlined text-lg">dashboard</span>
                Dashboard
            </a>

            <!-- Dropdown USERS -->
            <div>
                <button onclick="toggleMenu('usersMenu', this)"
                    class="w-full flex items-center justify-between px-3 py-2 rounded-md text-gray-600 hover:bg-gray-100">
                    <div class="flex items-center gap-3">
                        <span class="material-symbols-outlined text-lg">group</span>
                        Users
                    </div>
                    <span class="material-symbols-outlined text-base">expand_more</span>
                </button>

                <div id="usersMenu" class="hidden pl-10 mt-1 space-y-1 text-gray-500">
                    <a href="#" class="block py-1 hover:text-indigo-600">All Users</a>
                    <a href="#" class="block py-1 hover:text-indigo-600">Roles</a>
                    <a href="#" class="block py-1 hover:text-indigo-600">Permissions</a>
                </div>
            </div>

            <a href="{{route('product.index')}}" class="flex items-center gap-3 px-3 py-2 rounded-md {{ request()->routeIs('product.index') ? 'bg-indigo-50 text-indigo-600 font-medium' : 'text-gray-600' }} hover:bg-gray-100">
                <span class="material-symbols-outlined text-lg">inventory_2</span>
                Products
            </a>
            <a href="{{route('article.index')}}" class="flex items-center gap-3 px-3 py-2 roundes-md {{ request()->routeIs('article.index') ? 'bg-indigo-50 text-indigo-600 font-medium' : 'text-gray-600' }} hover:bg-gray-100">
				<span class="material-symbols-outlined text-lg">book</span>
				Artikel 
            </a>

        </div>

        <!-- MANAGEMENT -->
        <p class="text-[11px] font-semibold text-gray-400 uppercase mt-5 mb-2 px-2">
            Management
        </p>

        <div class="space-y-1">

            <!-- Dropdown ORDERS -->
            <div>
                <button onclick="toggleMenu('ordersMenu', this)"
                    class="w-full flex items-center justify-between px-3 py-2 rounded-md text-gray-600 hover:bg-gray-100">
                    <div class="flex items-center gap-3">
                        <span class="material-symbols-outlined text-lg">receipt_long</span>
                        Orders
                    </div>
                    <span class="material-symbols-outlined text-base">expand_more</span>
                </button>

                <div id="ordersMenu" class="hidden pl-10 mt-1 space-y-1 text-gray-500">
                    <a href="#" class="block py-1 hover:text-indigo-600">All Orders</a>
                    <a href="#" class="block py-1 hover:text-indigo-600">Pending</a>
                    <a href="#" class="block py-1 hover:text-indigo-600">Completed</a>
                </div>
            </div>

            <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-md text-gray-600 hover:bg-gray-100">
                <span class="material-symbols-outlined text-lg">analytics</span>
                Analytics
            </a>

        </div>

        <!-- SYSTEM -->
        <p class="text-[11px] font-semibold text-gray-400 uppercase mt-5 mb-2 px-2">
            System
        </p>

        <div class="space-y-1">

            <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-md text-gray-600 hover:bg-gray-100">
                <span class="material-symbols-outlined text-lg">settings</span>
                Settings
            </a>

            <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-md text-gray-600 hover:bg-gray-100">
                <span class="material-symbols-outlined text-lg">description</span>
                Logs
            </a>

        </div>

    </nav>

</aside>

@push('script')
    <script>
        const sidebar = document.getElementById("sidebar");
        const overlay = document.getElementById("sidebarOverlay");
        const toggleBtn = document.getElementById("menuToggle");

        // TOGGLE SIDEBAR
        toggleBtn?.addEventListener("click", () => {
            sidebar.classList.toggle("-translate-x-full");
            overlay.classList.toggle("hidden");
        });

        // CLOSE SIDEBAR
        overlay?.addEventListener("click", () => {
            sidebar.classList.add("-translate-x-full");
            overlay.classList.add("hidden");
        });

        // SUBMENU DROPDOWN
        function toggleMenu(id, btn) {
            const menu = document.getElementById(id);
            const chevron = btn?.querySelector(".chevron");

            menu.classList.toggle("hidden");

            if (chevron) {
                chevron.classList.toggle("rotate-180");
            }
        }
    </script>
@endpush
