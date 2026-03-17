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

            <a href="{{ route('dashboard') }}"
                class="flex items-center gap-3 px-3 py-2 rounded-md {{ request()->routeIs('dashboard') ? 'bg-indigo-50 text-indigo-600 font-medium' : 'text-gray-600' }}">
                <span class="material-symbols-outlined text-lg">dashboard</span>
                Dashboard
            </a>

            <a href="{{ route('analytic') }}"
                class="flex items-center gap-3 px-3 py-2 rounded-md {{ request()->routeIs('analytic') ? 'bg-indigo-50 text-indigo-600 font-medium' : 'text-gray-600' }} hover:bg-gray-100">
                <span class="material-symbols-outlined text-lg">analytics</span>
                Analytics
            </a>
        </div>

        <p class="text-[11px] font-semibold text-gray-400 uppercase mt-5 mb-2 px-2">
            Layout
        </p>

        <div class="space-y-1">
            <!-- Dropdown USERS -->
            <div>
                <button onclick="toggleMenu('usersMenu', this)"
                    class="w-full flex items-center justify-between px-3 py-2 rounded-md {{ request()->routeIs('front_page.*') ? 'bg-indigo-50 text-indigo-600 font-medium' : 'text-gray-600' }} hover:bg-gray-100">
                    <div class="flex items-center gap-3">
                        <span class="material-symbols-outlined text-lg">view_quilt</span>
                        Front Pages
                    </div>
                    <span class="material-symbols-outlined text-base">expand_more</span>
                </button>

                <div id="usersMenu"
                    class="{{ request()->routeIs('front_page.*') ? '' : 'hidden' }} pl-4 mt-1 space-y-1 text-gray-500">
                    <a href="{{ route('front_page.homes.index') }}"
                        class="block w-full flex items-center py-1 {{ request()->routeIs('front_page.homes.*') ? 'text-indigo-600 font-medium' : 'text-gray-600' }} hover:text-indigo-600">
                        <span class="material-symbols-outlined text-sm mr-4">arrow_right</span>
                        Home Pages
                    </a>
                    <a href="{{ route('front_page.about.index') }}"
                        class="block py-1 flex items-center {{ request()->routeIs('front_page.about.*') ? 'text-indigo-600 font-medium' : 'text-gray-600' }} hover:text-indigo-600">
                        <span class="material-symbols-outlined text-sm mr-4">arrow_right</span>
                        About Pages
                    </a>
                    <a href="{{ route('front_page.product.index') }}"
                        class="block py-1 flex items-center {{ request()->routeIs('front_page.product.*') ? 'text-indigo-600 font-medium' : 'text-gray-600' }} hover:text-indigo-600">
                        <span class="material-symbols-outlined text-sm mr-4">arrow_right</span>
                        Product Pages
                    </a>
                    <a href="{{ route('front_page.service.index') }}"
                        class="block py-1 flex items-center {{ request()->routeIs('front_page.service.*') ? 'text-indigo-600 font-medium' : 'text-gray-600' }} hover:text-indigo-600">
                        <span class="material-symbols-outlined text-sm mr-4">arrow_right</span>
                        Service Pages
                    </a>
                    <a href="{{ route('front_page.suku_cadang.index') }}"
                        class="block py-1 flex items-center {{ request()->routeIs('front_page.suku_cadang.*') ? 'text-indigo-600 font-medium' : 'text-gray-600' }} hover:text-indigo-600">
                        <span class="material-symbols-outlined text-sm mr-4">arrow_right</span>
                        Suku Cadang Pages
                    </a>
                    <a href="{{ route('front_page.berita.index') }}"
                        class="block py-1 flex items-center {{ request()->routeIs('front_page.berita.*') ? 'text-indigo-600 font-medium' : 'text-gray-600' }} hover:text-indigo-600">
                        <span class="material-symbols-outlined text-sm mr-4">arrow_right</span>
                        Berita Pages
                    </a>
                    <a href="{{ route('front_page.kontak.index') }}"
                        class="block py-1 flex items-center {{ request()->routeIs('front_page.kontak.*') ? 'text-indigo-600 font-medium' : 'text-gray-600' }} hover:text-indigo-600">
                        <span class="material-symbols-outlined text-sm mr-4">arrow_right</span>
                        Kontak Pages
                    </a>
                </div>
            </div>
        </div>

        <!-- MANAGEMENT -->
        <p class="text-[11px] font-semibold text-gray-400 uppercase mt-5 mb-2 px-2">
            Management
        </p>

        <div class="space-y-1">

            <a href="{{ route('product.index') }}"
                class="flex items-center gap-3 px-3 py-2 rounded-md {{ request()->routeIs('product.*') ? 'bg-indigo-50 text-indigo-600' : 'text-gray-600 hover:bg-indigo-50' }}">
                <span class="material-symbols-outlined text-lg">directions_car</span>
                Products
            </a>
            <a href="{{ route('article.index') }}"
                class="flex items-center gap-3 px-3 py-2 roundes-md {{ request()->routeIs('article.*') ? 'bg-indigo-50 text-indigo-600 font-medium' : 'text-gray-600' }} hover:bg-gray-100">
                <span class="material-symbols-outlined text-lg">book</span>
                Artikel
            </a>
            <a href="{{ route('testimoni.index') }}"
                class="flex items-center gap-3 px-3 py-2 roundes-md {{ request()->routeIs('testimoni.*') ? 'bg-indigo-50 text-indigo-600 font-medium' : 'text-gray-600' }} hover:bg-gray-100">
                <span class="material-symbols-outlined text-lg">people</span>
                Testimoni
            </a>

            <a href="{{ route('konsultasi.index') }}"
                class="flex items-center justify-between px-3 py-2 rounded-md
{{ request()->routeIs('konsultasi.*') ? 'bg-indigo-50 text-indigo-600 font-medium' : 'text-gray-600' }}
hover:bg-gray-100">

                <div class="flex items-center gap-3">
                    <span class="material-symbols-outlined text-lg">chat</span>
                    Konsultasi
                </div>

                @if (unreadConsultations() > 0)
                    <span class="text-xs bg-red-500 text-white px-2 py-0.5 rounded-full">
                        {{ unreadConsultations() }}
                    </span>
                @endif

            </a>

        </div>

        <!-- SYSTEM -->
        <p class="text-[11px] font-semibold text-gray-400 uppercase mt-5 mb-2 px-2">
            System
        </p>

        <div class="space-y-1">

            <a href="{{ route('setting.index') }}"
                class="flex items-center gap-3 px-3 py-2 rounded-md {{ request()->routeIs('setting.*') ? 'bg-indigo-50 text-indigo-600 font-medium' : 'text-gray-600' }} hover:bg-gray-100">
                <span class="material-symbols-outlined text-lg">settings</span>
                Settings
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
