@extends('components.website.layouts.app')
@section('title', 'Mobil Suzuki Terbaru 2026 | Harga & Spesifikasi - Suzuki Auto Zone')

@section('meta_description',
    'Lihat daftar mobil Suzuki terbaru lengkap dengan harga, spesifikasi, fitur, dan promo menarik. Temukan kendaraan Suzuki yang sesuai kebutuhan Anda di Suzuki Auto Zone.'
)

@section('meta_keywords',
    'mobil suzuki, harga mobil suzuki, suzuki terbaru, dealer suzuki, promo suzuki'
)
@section('content')
    <x-website.banner title="{{ $banner->title ?? 'Tentang Kami' }}" description="{{ $banner->sub_title }}"
        image="{{ asset('storage/' . $banner->images) }}" :breadcrumbs="[['label' => 'Home', 'url' => '/'], ['label' => 'Product']]" />

    <section class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto px-6">

            <!-- Header -->
            <div class="mb-10 text-center">
                <h1 class="text-3xl font-bold text-gray-800">
                    Produk Kami
                </h1>
                <p class="text-gray-500 mt-2">
                    Temukan berbagai produk terbaik dengan kualitas terpercaya
                </p>
            </div>


            <!-- Search dan Filter -->
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">

                <!-- Search -->
                <form method="GET" action="" class="w-full md:w-1/3">
                    <input type="text" name="search" placeholder="Cari produk..."
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 outline-none">
                </form>
            </div>

            <!-- Grid Produk -->
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

                @foreach ($products as $product)
                    <div class="bg-white rounded-xl shadow-sm hover:shadow-lg transition overflow-hidden group">

                        <a href="{{ route('website.product.show', $product->slug) }}">
                            <!-- Image -->
                            <div class="h-auto overflow-hidden">
                                <img src="{{ asset('storage/' . $product?->mainImage?->image) }}"
                                    class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                            </div>

                            <!-- Content -->
                            <div class="p-4">

                                <h3 class="font-semibold text-gray-800 line-clamp-2 text-center md:text-left">
                                    {{ $product->name }}
                                </h3>

                                <div class="md:flex items-center mt-3 gap-4 text-center md:text-left">
                                    <p class="text-blue-600 flex flex-col mb-5 md:mb-0">
                                        <span class="text-xs text-gray-500">Mulai dari</span>
                                        Rp {{ number_format($product->mainPrice?->price ?? 0) }}
                                    </p>
                                    <p class="flex flex-col gap-2 text-gray-600 text-xs">
                                        <span class="flex items-center gap-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-4">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M4.5 12a7.5 7.5 0 0 0 15 0m-15 0a7.5 7.5 0 1 1 15 0m-15 0H3m16.5 0H21m-1.5 0H12m-8.457 3.077 1.41-.513m14.095-5.13 1.41-.513M5.106 17.785l1.15-.964m11.49-9.642 1.149-.964M7.501 19.795l.75-1.3m7.5-12.99.75-1.3m-6.063 16.658.26-1.477m2.605-14.772.26-1.477m0 17.726-.26-1.477M10.698 4.614l-.26-1.477M16.5 19.794l-.75-1.299M7.5 4.205 12 12m6.894 5.785-1.149-.964M6.256 7.178l-1.15-.964m15.352 8.864-1.41-.513M4.954 9.435l-1.41-.514M12.002 12l-3.75 6.495" />
                                            </svg>

                                            {{ $product->cc }} cc
                                        </span>
                                        <span class="flex items-center gap-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-4">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                                            </svg>
                                            {{ $product->seater }} Seater
                                        </span>
                                    </p>
                                </div>
                                <div class="w-full flex">
                                    <a href="{{ route('website.product.show', $product->slug) }}"
                                        class="w-full text-sm mt-5 text-center text-white bg-gray-600 px-3 py-2 rounded-full hover:bg-blue-700">
                                        Pilih Varian
                                    </a>
                                </div>

                            </div>
                        </a>
                    </div>
                @endforeach

            </div>


            <!-- Pagination -->
            <div class="mt-10">
                {{ $products->links() }}
            </div>

        </div>
    </section>
    <section id="konsultasi" class="py-20 bg-white w-full">

        <div class="px-4 md:px-8 lg:px-32">

            <div class="mb-5 text-center">
                <h2 class="text-xl md:text-3xl text-gray-800 font-bold">
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

                    <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3958.773920721896!2d110.40700187411022!3d-7.15211857016343!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e708613d80b2435%3A0x2d8c0324fd8f3e3c!2sSuzuki%20Ungaran%20Sunmotor%20Indosentra%20Trada!5e0!3m2!1sid!2sid!4v1773667578604!5m2!1sid!2sid"
                    class="w-full h-[400px]" allowfullscreen="" loading="lazy">
                </iframe>

                </div>

            </div>

        </div>

    </section>
@endsection
