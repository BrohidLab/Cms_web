<!-- MENU -->
<div class="menu bg-gray-700 text-white">

    <div class="w-full flex items-center justify-between">

        <div class="hidden md:flex gap-6 text-sm">
            <a href="{{ route('web-home') }}"
                class="{{ request()->routeIs('web-home') ? 'text-white font-bold' : 'text-gray-500 hover:text-white' }}">
                Home
            </a>
            <a href="#"
                class="{{ request()->routeIs('produk') ? 'text-white border-b-2 border-white pb-1' : 'text-gray-400 hover:text-white' }}">
                Tentang Kami
            </a>
            <a href="#"
                class="{{ request()->routeIs('promo') ? 'text-white border-b-2 border-white pb-1' : 'text-gray-400 hover:text-white' }}">
                Produk
            </a>

            <a href="#"
                class="{{ request()->routeIs('kontak') ? 'text-white border-b-2 border-white pb-1' : 'text-gray-400 hover:text-white' }}">
                Service
            </a>
            <a href="#"
                class="{{ request()->routeIs('kontak') ? 'text-white border-b-2 border-white pb-1' : 'text-gray-400 hover:text-white' }}">
                Suku Cadang
            </a>
            <a href="#"
                class="{{ request()->routeIs('kontak') ? 'text-white border-b-2 border-white pb-1' : 'text-gray-400 hover:text-white' }}">
                Berita
            </a>
            <a href="#"
                class="{{ request()->routeIs('kontak') ? 'text-white border-b-2 border-white pb-1' : 'text-gray-400 hover:text-white' }}">
                Kontak
            </a>

        </div>

        <!-- Mobile Button -->
        <button id="menuBtn" class="md:hidden">
            ☰
        </button>

    </div>

    <!-- Mobile Dropdown -->
    <div id="mobileMenu" class="hidden md:hidden px-4 pb-4 space-y-2">
        <a href="#" class="block hover:text-blue-400">Home</a>
        <a href="#" class="block hover:text-blue-400">Produk</a>
        <a href="#" class="block hover:text-blue-400">Promo</a>
        <a href="#" class="block hover:text-blue-400">Kontak</a>
    </div>

</div>
<script>
    const btn = document.getElementById('menuBtn');
    const menu = document.getElementById('mobileMenu');

    btn.addEventListener('click', () => {
        menu.classList.toggle('hidden');
    });
</script>
