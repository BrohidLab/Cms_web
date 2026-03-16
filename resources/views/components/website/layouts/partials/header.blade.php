<div id="header-container">

    <!-- HEADER TOP -->
    <div id="header-top"
        class="px-4 py-3 md:px-10 lg:px-20 md:py-5 text-white bg-gray-700 flex items-center border-b border-gray-800 transition-all duration-300">

        <!-- Logo -->
        <div class="w-[140px] lg:w-[240px]">
            logo
        </div>

        <!-- MENU (hidden saat normal) -->
        <div id="menu-inline" class="hidden w-[65%] flex-2 justify-center">
            @include('components.website.layouts.partials.navigation')
        </div>

        <!-- Location -->
        <div class="flex w-full flex-1 items-center justify-end gap-2">

            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-4 h-4">

                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />

                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
            </svg>

            <span class="text-xs">Suzuki Ungaran</span>

        </div>

    </div>

    <!-- MENU NORMAL -->
    <div id="menu-bottom" class="px-4 md:px-20 py-3 bg-gray-700 border-b border-gray-800 transition-all duration-300">
        @include('components.website.layouts.partials.navigation')
    </div>

</div>

<div id="spacer" class="hidden"></div>
@push('script')
    <script>
        const headerTop = document.getElementById('header-top');
        const menuBottom = document.getElementById('menu-bottom');
        const menuInline = document.getElementById('menu-inline');
        const spacer = document.getElementById('spacer');

        window.addEventListener('scroll', () => {

            const triggerPoint = headerTop.offsetHeight; // hitung ulang

            if (window.scrollY > triggerPoint) {

                headerTop.classList.add('fixed', 'top-0', 'left-0', 'right-0', 'z-50', 'shadow-md');
                menuBottom.classList.add('hidden');
                menuInline.classList.remove('hidden');

                spacer.style.height = headerTop.offsetHeight + 'px';
                spacer.classList.remove('hidden');

            } else {

                headerTop.classList.remove('fixed', 'top-0', 'left-0', 'right-0', 'z-50', 'shadow-md');
                menuBottom.classList.remove('hidden');
                menuInline.classList.add('hidden');

                spacer.classList.add('hidden');

            }

        });
    </script>
@endpush
