@extends('components.website.layouts.app')
@section('title', 'Home - Suzuki Auto Zone')
@section('meta_description', 'Suzuki Auto Zone menyediakan mobil Suzuki terbaru, layanan servis resmi, sparepart original, dan promo terbaik. Temukan kendaraan Suzuki impian Anda di sini.')
@section('meta_keywords', 'dealer suzuki, mobil suzuki terbaru, servis suzuki, sparepart suzuki, promo suzuki, gunawan suzuki ungaran')
@push('style')
    <style>
        .carousel-viewport {
            overflow: hidden;
            width: 100%;
        }

        .carousel-track {
            display: flex;
            gap: 0;
            padding: 20px 0px;
            transition: transform 0.5s ease;
        }

        .card {
            flex: 0 0 20%;
            display: flex;
            flex-direction: column;
            align-items: center;
            transform: scale(0.85);
            transition: all 0.3s ease;
            text-align: center;
            padding: 2px 10px;
        }

        .card img {
            width: 240px;
            height: auto;
            object-fit: cover;
        }

        .card.active {
            transform: scale(1.05);
            z-index: 2;
        }

        @media (max-width: 768px) {
            .card {
                flex: 0 0 100%;
            }
        }

        .nav {
            position: absolute;
            top: 60%;
            transform: translateY(-50%);
            border: none;
            background: rgba(0, 0, 0, 0.6);
            color: white;
            font-size: 14px;
            padding: 0px 34px;
            cursor: pointer;
            z-index: 3;
            border-radius: 100%;
        }

        .prev {
            left: 0;
        }

        .next {
            right: 0;
        }
    </style>
@endpush
@section('content')
    <div class="flex flex-col items-center bg-white">
        <div class="relative w-full overflow-hidden">
            <div id="slider" class="flex transition-transform duration-700 ease-in-out">
                @foreach ($bannerSlide as $banner)
                    <div class="min-w-full flex justify-center">
                        @if ($banner->type === 'video')
                            <video class="w-full h-auto" muted
                                src="{{ asset('storage/' . $banner->files) }}" playsinline autoplay preload="metadata">
                            </video>
                        @else
                            <img src="{{ asset('storage/' . $banner->files) }}"
                                class="w-full h-auto " alt="Suzuki Semarang, Suzuki Auto Zone" aria-label="Suzuki Semarang, Suzuki Auto Zone">
                        @endif
                    </div>
                @endforeach
            </div>
            <div class="absolute bottom-3 left-0 right-0 flex justify-center gap-2">
                @foreach ($bannerSlide as $index => $banner)
                    <span class="dot w-2 h-2 bg-gray-400 rounded-full transition-colors duration-300 cursor-pointer"
                        data-index="{{ $index }}">
                    </span>
                @endforeach
            </div>
        </div>
        <div class="px-4 md:px-8 lg:px-28 w-full  py-12 bg-white">
            <div class="w-full mb-6">
                <h2 class="font-bold text-xl md:text-2xl mb-1 text-gray-700">Temukan Mobil Suzuki Impian Anda</h2>
                <span class="text-sm md:text-md text-gray-400">
                    Wujudkan pengalaman berkendara anda dengan mobil yang nyaman dan ciptakan perjalanan yang penuh cerita
                    bersama orang tercinta.
                </span>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-4">

                <a href="#konsultasi"
                    class="rounded-xl shadow-sm hover:shadow-md border border-gray-300 transition p-4 flex items-center justify-center flex-col">
                    <div class="p-5 rounded-full bg-gray-200 mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-9">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                        </svg>
                    </div>
                    <p class="text-gray-500 text-xs md:text-sm mt-1 text-center font-bold">Hubungkan dengan Sales</p>
                </a>
                <a href="{{ route('website.service') }}"
                    class="rounded-xl shadow-sm hover:shadow-md border border-gray-300 transition p-4 flex items-center justify-center flex-col">
                    <div class="p-5 rounded-full bg-gray-200 mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-9">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                        </svg>

                    </div>
                    <p class="text-gray-500 text-xs md:text-sm mt-1 font-bold text-center">Jadwal Services</p>
                </a>
                <a href="{{ route('website.suku_cadang.index') }}"
                    class="rounded-xl shadow-sm hover:shadow-md border border-gray-300 transition p-4 flex items-center justify-center flex-col">
                    <div class="p-5 rounded-full bg-gray-200 mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-9">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M11.42 15.17 17.25 21A2.652 2.652 0 0 0 21 17.25l-5.877-5.877M11.42 15.17l2.496-3.03c.317-.384.74-.626 1.208-.766M11.42 15.17l-4.655 5.653a2.548 2.548 0 1 1-3.586-3.586l6.837-5.63m5.108-.233c.55-.164 1.163-.188 1.743-.14a4.5 4.5 0 0 0 4.486-6.336l-3.276 3.277a3.004 3.004 0 0 1-2.25-2.25l3.276-3.276a4.5 4.5 0 0 0-6.336 4.486c.091 1.076-.071 2.264-.904 2.95l-.102.085m-1.745 1.437L5.909 7.5H4.5L2.25 3.75l1.5-1.5L7.5 4.5v1.409l4.26 4.26m-1.745 1.437 1.745-1.437m6.615 8.206L15.75 15.75M4.867 19.125h.008v.008h-.008v-.008Z" />
                        </svg>

                    </div>
                    <p class="text-gray-500 text-xs md:text-sm mt-1 text-center font-bold">Pesan Part</p>
                </a>
                <div
                    class="rounded-xl shadow-sm hover:shadow-md border border-gray-300 transition p-4 flex items-center justify-center flex-col">
                    <div class="p-5 rounded-full bg-gray-200 mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-9">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 15.75V18m-7.5-6.75h.008v.008H8.25v-.008Zm0 2.25h.008v.008H8.25V13.5Zm0 2.25h.008v.008H8.25v-.008Zm0 2.25h.008v.008H8.25V18Zm2.498-6.75h.007v.008h-.007v-.008Zm0 2.25h.007v.008h-.007V13.5Zm0 2.25h.007v.008h-.007v-.008Zm0 2.25h.007v.008h-.007V18Zm2.504-6.75h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V13.5Zm0 2.25h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V18Zm2.498-6.75h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V13.5ZM8.25 6h7.5v2.25h-7.5V6ZM12 2.25c-1.892 0-3.758.11-5.593.322C5.307 2.7 4.5 3.65 4.5 4.757V19.5a2.25 2.25 0 0 0 2.25 2.25h10.5a2.25 2.25 0 0 0 2.25-2.25V4.757c0-1.108-.806-2.057-1.907-2.185A48.507 48.507 0 0 0 12 2.25Z" />
                        </svg>
                    </div>
                    <p class="text-gray-500 text-xs md:text-sm mt-1 text-center font-bold">Simulasi Kredit</p>
                </div>
            </div>
        </div>
        <div class="carousel relative w-full max-w-6xl mx-auto my-10 bg-white">
            <div class="mb-10">
                <h2 class="text-xl md:text-2xl font-bold text-gray-700">Produk Pilihan</h2>
                <span class="text-xs md:text-sm text-gray-400">Temukan berbagai pilihan mobil Suzuki yang dirancang khusus
                    presisi melalui teknologi dan design stylish sesuai gaya anda.</span>
            </div>
            <button class="nav prev absolute -translate-y-1/2 left-2 z-10 bg-gray-600 text-white py-2 px-3 rounded-full">
                &#10094;
            </button>

            <div class="carousel-viewport overflow-hidden">
                <div class="carousel-track flex transition-transform duration-500 ease-in-out" id="carousel-track">
                </div>
            </div>

            <button class="nav next absolute -translate-y-1/2 right-2 z-10 bg-gray-600 text-white py-2 px-3 rounded-full">
                &#10095;
            </button>

            <div class="flex justify-center mt-10">
                <a href="{{ route('website.product') }}" class="bg-gray-800 text-white px-10 py-2 rounded-full text-sm">
                    Selengkapnya
                </a>
            </div>
        </div>
        <section class="w-full flex items-center">
        <div class="bg-white w-full px-4 md:px-8 lg:px-32 py-10 md:py-12">
            <h2 class="text-xl md:text-2xl text-gray-700 font-bold mb-1">Berita Terbaru</h2>
            <span class="text-sm text-gray-400">
                Kumpulan informasi terbaru dari Suzuki hingga tips dan trik berkendara ada
                disini.
            </span>

            <div class="hidden md:block md:grid grid-cols-3 gap-5 mt-7">
                @foreach ($article as $item)
                    <div class="bg-white rounded-xl shadow">
                        <img src="{{ asset('storage/' . $item->thumbnail) }}" class="w-full h-48 object-cover rounded-t-xl" alt="{{ $item->title }}" aria-label="{{ $item->title }}">

                        <a href="{{ route('website.article.show', $item->slug) }}">
                            <div class="p-4">
                                <h3 class="font-semibold text-lg mb-2">
                                    {{ $item->title }}
                                </h3>

                                <div class="text-sm text-gray-500">
                            
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="relative md:hidden mt-7">

                {{-- Slider --}}
                <div id="newsContainer" class="flex overflow-x-hidden scroll-smooth">

                    @foreach ($article as $item)
                        <div class="min-w-full px-2">

                            <div class="bg-white rounded-xl shadow">

                                <img src="{{ asset('storage/' . $item->thumbnail) }}"
                                    class="w-full h-48 object-cover rounded-t-xl" alt="{{ $item->title }}" aria-label="{{ $item->title }}">

                                <a href="{{ route('website.article.show', $item->slug) }}">
                                    <div class="p-4">
                                        <h3 class="font-semibold text-lg mb-2">
                                            {{ $item->title }}
                                        </h3>

                                        <p class="text-sm text-gray-500 mb-3">
                                            {{ Str::limit($item->content, 100) }}
                                        </p>
                                    </div>
                                </a>

                            </div>

                        </div>
                    @endforeach

                </div>

                {{-- Prev --}}
                <button id="prevBtn"
                    class="absolute left-2 top-1/2 -translate-y-1/2 z-20 bg-white shadow rounded-full w-10 h-10">
                    &#10094;
                </button>

                {{-- Next --}}
                <button id="nextBtn"
                    class="absolute right-2 top-1/2 -translate-y-1/2 z-20 bg-white shadow rounded-full w-10 h-10">
                    &#10095;
                </button>

                {{-- DOTS --}}
                <div id="dots" class="flex justify-center gap-2 mt-4"></div>

            </div>
            <div class="flex w-full justify-center mt-10">
                <a href="{{ route('website.article.index') }}"
                    class="text-sm bg-gray-800 text-white rounded-full px-10 py-2">
                    Selengkapnya
                </a>
            </div>
        </div>
        </section>
        <section class="py-10 bg-gray-50 w-full">
            <div class="text-center">

                <h2 class="text-2xl md:text-3xl text-gray-800 font-bold mb-10">
                    Apa Kata Customer
                </h2>

                <div class="relative">

                    {{-- SLIDER --}}
                    <div id="testiContainer" class="flex overflow-x-hidden">

                        @foreach ($testimonials as $item)
                            <div class="min-w-full px-4">

                                <div class="bg-white rounded-2xl shadow-lg p-6 md:p-8 max-w-xl mx-auto">

                                    <img src="{{ asset('storage/' . $item->image) }}"
                                        class="w-20 h-20 rounded-full object-cover mx-auto mb-4" alt="{{ $item->product->name }}" aria-label="{{ $item->product->name }}">

                                    <h3 class="font-semibold text-lg">
                                        {{ $item->nama_pelanggan }}
                                    </h3>

                                    <p class="text-sm text-gray-500 mb-3">
                                        Pembeli {{ $item->product->name }}
                                    </p>

                                    <p class="text-gray-600 italic">
                                        "{{ $item->ulasan }}"
                                    </p>

                                </div>

                            </div>
                        @endforeach

                    </div>

                    {{-- PREV --}}
                    <button id="testiPrev"
                        class="absolute left-1 md:left-10 lg:left-32 top-1/2 -translate-y-1/2 bg-white shadow rounded-full w-10 h-10">
                        ‹
                    </button>

                    {{-- NEXT --}}
                    <button id="testiNext"
                        class="absolute right-1 md:right-10 lg:right-32 top-1/2 -translate-y-1/2 bg-white shadow rounded-full w-10 h-10">
                        ›
                    </button>

                    {{-- DOTS --}}
                    <div id="testiDots" class="flex justify-center gap-2 mt-6"></div>

                </div>

            </div>

        </section>
        <section id="konsultasi" class="py-20 bg-white w-full">

            <div class="px-4 md:px-8 lg:px-32">

                <div class="mb-5">
                    <h2 class="text-xl md:text-2xl text-gray-800 font-bold">
                        Konsultasi dengan Sales
                    </h2>
                    <p class="text-gray-500 text-sm mt-2">
                        Hubungi kami atau kunjungi dealer terdekat
                    </p>
                </div>

                {{-- GRID --}}
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">

                    {{-- LEFT FORM --}}
                    <div class="bg-gray-50 rounded-md shadow-lg p-6 md:p-8 text-gray-400">
                        <form action="{{ route('konsultasi.store') }}" method="POST" class="space-y-6">
                            @csrf
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                                <div>
                                    <label class="block text-sm font-medium mb-1">
                                        Nama Lengkap
                                    </label>
                                    <input type="text" name="name"
                                        class="w-full text-sm border border-gray-300 rounded-lg px-4 py-1 focus:ring-2 focus:ring-blue-500 outline-none">
                                </div>

                                <div>
                                    <label class="block text-sm font-medium mb-1">
                                        Nomor WhatsApp
                                    </label>
                                    <input name="no_wa" type="tel" placeholder="082xxxxxxx98"
                                        class="w-full text-sm border border-gray-300 rounded-lg px-4 py-1 focus:ring-2 focus:ring-blue-500 outline-none">
                                </div>

                                <div>
                                    <label class="block text-sm font-medium mb-1">
                                        Pilih Mobil
                                    </label>
                                    <select name="product_id"
                                        class="w-full text-sm border border-gray-300 rounded-lg px-4 py-1 focus:ring-2 focus:ring-blue-500 outline-none">
                                        <option>-- Pilih Mobil --</option>

                                        @foreach ($products as $prod)
                                            <option value="{{ $prod->id }}">{{ $prod->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium mb-1">
                                        Kota / Lokasi
                                    </label>
                                    <input name="lokasi" type="text" placeholder="Contoh : Semarang"
                                        class="w-full text-sm border border-gray-300 rounded-lg px-4 py-1 focus:ring-2 focus:ring-blue-500 outline-none">
                                </div>

                            </div>

                            <div>
                                <label class="block text-sm font-medium mb-1">
                                    Pesan
                                </label>
                                <textarea name="pesan" rows="4"
                                    class="w-full text-sm border border-gray-300 rounded-lg px-4 py-1 focus:ring-2 focus:ring-blue-500 outline-none"></textarea>
                            </div>

                            <button type="submit"
                                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-lg transition">
                                Kirim Konsultasi
                            </button>

                        </form>
                        <div class="w-full text-center flex justify-center">
                            @if (session('success'))
                                <div class="text-green-700 px-4 py-3 rounded-lg text-sm">
                                    {{ session('success') }}
                                </div>
                            @elseif(session('error'))
                                <div class="text-red-700 px-4 py-3 rounded-lg text-sm">
                                    {{ session('success') }}
                                </div>
                            @endif
                        </div>

                    </div>

                    {{-- RIGHT MAP --}}
                    <div class="rounded-md overflow-hidden shadow-lg">

                        <div class="bg-gray-100 p-4 border-b">
                            <h3 class="font-semibold text-lg">
                                Lokasi Dealer
                            </h3>
                            <p class="text-sm text-gray-500">
                                Kunjungi showroom kami
                            </p>
                        </div>

                        {!! profileWeb()?->google_maps ?? '' !!}

                    </div>

                </div>

            </div>

        </section>
    </div>
@endsection
@push('script')
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            const container = document.getElementById('testiContainer');
            const next = document.getElementById('testiNext');
            const prev = document.getElementById('testiPrev');
            const dotsContainer = document.getElementById('testiDots');

            if (!container) return;

            const totalSlides = container.children.length;
            let index = 0;
            let autoSlide;

            // dots
            for (let i = 0; i < totalSlides; i++) {
                const dot = document.createElement('div');
                dot.className = "w-2.5 h-2.5 rounded-full bg-gray-300 cursor-pointer";
                dot.addEventListener('click', () => goToSlide(i));
                dotsContainer.appendChild(dot);
            }

            function updateDots() {
                [...dotsContainer.children].forEach((dot, i) => {
                    dot.classList.toggle('bg-gray-800', i === index);
                    dot.classList.toggle('bg-gray-300', i !== index);
                });
            }

            function goToSlide(i) {
                index = i;
                container.scrollTo({
                    left: container.clientWidth * index,
                    behavior: 'smooth'
                });
                updateDots();
            }

            function startAutoSlide() {
    if (totalSlides <= 1) return; // biar gak jalan kalau cuma 1 slide

    stopAutoSlide();
    autoSlide = setInterval(() => {
        index = (index + 1) % totalSlides;
        goToSlide(index);
    }, 4000);
}

            function stopAutoSlide() {
                clearInterval(autoSlide);
            }

            next.addEventListener('click', () => {
                stopAutoSlide();
                index = (index + 1) % totalSlides;
                goToSlide(index);
                startAutoSlide();
            });

            prev.addEventListener('click', () => {
                stopAutoSlide();
                index = (index - 1 + totalSlides) % totalSlides;
                goToSlide(index);
                startAutoSlide();
            });

            container.addEventListener('mouseenter', stopAutoSlide);
            container.addEventListener('mouseleave', startAutoSlide);

            updateDots();
            startAutoSlide();

        });
    </script>
    <script>
        const slider = document.getElementById('slider');
        const dots = document.querySelectorAll('.dot');

        let index = 0;
        const total = dots.length;
        let interval;

        function showSlide(i) {
            index = i;
            slider.style.transform = `translateX(-${i * 100}%)`;

            dots.forEach(dot => {
                dot.classList.remove('bg-blue-500');
                dot.classList.add('bg-gray-400');
            });

            dots[i].classList.remove('bg-gray-400');
            dots[i].classList.add('bg-blue-500');

            const currentSlide = slider.children[i];
            const video = currentSlide.querySelector('video');

            // Jika ada video, play dan tunggu selesai
            if (video) {
                clearInterval(interval); // stop auto slide
                video.currentTime = 0; // reset ke awal
                video.play();
                video.onended = () => {
                    nextSlide();
                    interval = setInterval(nextSlide, 4000); // lanjut auto slide
                };
            }
        }

        // Fungsi slide berikutnya
        function nextSlidehome() {
            index = (index + 1) % total;
            showSlide(index);
        }

        // Klik dot
        dots.forEach(dot => {
            dot.addEventListener('click', () => {
                clearInterval(interval);
                showSlide(parseInt(dot.dataset.index));
                interval = setInterval(nextSlide, 4000);
            });
        });

        // Jalankan slide pertama
        showSlide(index);

    function startAutoSlides() {
        clearInterval(interval);
        interval = setInterval(() => {

        
            nextSlidehome();
        }, 4000);
    }

    startAutoSlides();
    </script>
    <script>
        const cars = @json($products);
        const storageUrl = "{{ asset('storage') }}";
        const track = document.getElementById('carousel-track');

        let windowStart = 0;

        console.log(cars);

        function getVisibleCards() {
            return window.innerWidth < 768 ? 1 : 5;
        }

        function rp(harga) {
            const rupiah = new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR'
            }).format(harga);

            return rupiah;
        }

        function renderCarousel() {
            const visibleCards = Math.min(getVisibleCards(), cars.length);
            track.innerHTML = '';
            for (let i = 0; i < visibleCards; i++) {
                let index = (windowStart + i) % cars.length;
                const car = cars[index];
                const imageCar = storageUrl + '/' + car.main_image.image;
                const card = document.createElement('div');
                card.classList.add('card');
                if (i === Math.floor(visibleCards / 2)) card.classList.add('active');
                card.style.marginRight = '5px'; // <-- tambahkan ini
                card.innerHTML = `
            
            <img class="mb-2 w-full h-auto" src="${imageCar}" alt="${car.name}">
            <a href="/product/${car.slug}">
            <div class="flex flex-col justify-center">
            <h3 class="font-semibold w-full  text-gray-700">${car.name}</h3>
            <p class="flex items-center justify-center gap-2 text-gray-600 text-xs">
                <span class="flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12a7.5 7.5 0 0 0 15 0m-15 0a7.5 7.5 0 1 1 15 0m-15 0H3m16.5 0H21m-1.5 0H12m-8.457 3.077 1.41-.513m14.095-5.13 1.41-.513M5.106 17.785l1.15-.964m11.49-9.642 1.149-.964M7.501 19.795l.75-1.3m7.5-12.99.75-1.3m-6.063 16.658.26-1.477m2.605-14.772.26-1.477m0 17.726-.26-1.477M10.698 4.614l-.26-1.477M16.5 19.794l-.75-1.299M7.5 4.205 12 12m6.894 5.785-1.149-.964M6.256 7.178l-1.15-.964m15.352 8.864-1.41-.513M4.954 9.435l-1.41-.514M12.002 12l-3.75 6.495" />
                    </svg>

                    ${car.cc}cc
                </span>
                <span class="flex items-center gap-1 ml-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                    </svg>
                    ${car.seater} Seater
                </span>
            </p>
            </div>
            </a>
            <p class="text-xs mt-3 text-gray-600">Mulai Dari</p>   
            <p class="font-bold text-sm text-red-600">${rp(car.main_price?.price ?? 0)}</p>
            
        `;
                track.appendChild(card);
            }
        }

        function nextSlide() {
            windowStart = (windowStart + 1) % cars.length;
            renderCarousel();
        }

        function prevSlide() {
            windowStart = (windowStart - 1 + cars.length) % cars.length;
            renderCarousel();
        }

        document.querySelector('.next').onclick = nextSlide;
        document.querySelector('.prev').onclick = prevSlide;

        setInterval(nextSlide, 10000);

        window.addEventListener('resize', renderCarousel);

        renderCarousel();
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            const container = document.getElementById('newsContainer');
            const next = document.getElementById('nextBtn');
            const prev = document.getElementById('prevBtn');
            const dotsContainer = document.getElementById('dots');

            if (!container) return;

            const totalSlides = container.children.length;
            let index = 0;
            let autoSlide;

            // CREATE DOTS
            for (let i = 0; i < totalSlides; i++) {
                const dot = document.createElement('div');
                dot.className = "w-2.5 h-2.5 rounded-full bg-gray-300 cursor-pointer";
                dot.addEventListener('click', () => goToSlide(i));
                dotsContainer.appendChild(dot);
            }

            function updateDots() {
                [...dotsContainer.children].forEach((dot, i) => {
                    dot.classList.toggle('bg-gray-800', i === index);
                    dot.classList.toggle('bg-gray-300', i !== index);
                });
            }

            function goToSlide(i) {
                index = i;
                container.scrollTo({
                    left: container.clientWidth * index,
                    behavior: 'smooth'
                });
                updateDots();
            }

            function startAutoSlide() {
                autoSlide = setInterval(() => {
                    index = (index + 1) % totalSlides; // loop
                    goToSlide(index);
                }, 3000); // 3 detik
            }

            function stopAutoSlide() {
                clearInterval(autoSlide);
            }

            next?.addEventListener('click', () => {
                stopAutoSlide();
                index = (index + 1) % totalSlides;
                goToSlide(index);
                startAutoSlide();
            });

            prev?.addEventListener('click', () => {
                stopAutoSlide();
                index = (index - 1 + totalSlides) % totalSlides;
                goToSlide(index);
                startAutoSlide();
            });

            // pause on hover
            container.addEventListener('mouseenter', stopAutoSlide);
            container.addEventListener('mouseleave', startAutoSlide);

            updateDots();
            startAutoSlide();

        });
    </script>
@endpush
