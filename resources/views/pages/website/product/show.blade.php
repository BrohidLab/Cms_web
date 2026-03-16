@extends('components.website.layouts.app')

@section('content')
    <x-website.banner title="{{ $banner->title ?? 'Tentang Kami' }}" description="{{ $banner->sub_title }}"
        image="{{ asset('storage/' . $banner->images) }}" :breadcrumbs="[
            ['label' => 'Home', 'url' => '/'],
            ['label' => 'Product', 'url' => route('website.product')],
            ['label' => $product->name],
        ]" />
    <section>
        <div class="relative">
            <img src="{{ asset('storage/' . $product->mainImage->image) }}" class="w-full h-[450px] object-cover" />
            <div class="flex border-b justify-center py-10 w-full bg-white gap-2">
                <div x-data="{ tab: 0 }" class="w-full bg-white py-10">

                    {{-- TAB MENU --}}
                    <div class="flex w-full justify-center flex-wrap border-b pb-4">

                        @foreach ($product->types as $index => $type)
                            <button @click="tab={{ $index }}"
                                :class="tab == {{ $index }} ?
                                    'border-blue-400 border text-blue-600' :
                                    'border-gray-100 border text-gray-600'"
                                class="px-10 py-2 text-sm font-bold">

                                {{ $type->name . ' ' . $type->transmition }}

                            </button>
                        @endforeach

                    </div>


                    {{-- TAB CONTENT --}}
                    <div class="mt-10">

                        @foreach ($product->types as $index => $type)
                            <div x-show="tab == {{ $index }}" class="text-center">

                                <h2 class="text-2xl font-bold mb-6">
                                    {{ $product->name . ' ' . $type->name . ' ' . $type->transmition }}
                                </h2>

                                <div x-data="{
                                    image: '{{ asset('storage/' . $type->colors->first()?->image?->image) }}',
                                    colorName: '{{ $type->colors->first()?->name }}',
                                    activeColor: 0
                                }">

                                    {{-- IMAGE --}}
                                    <img :src="image" class="mx-auto w-96 mb-6">


                                    <p class="text-sm font-bold py-2 text-gray-600 uppercase">
                                        Pilihan Warna
                                    </p>

                                    <div class="flex justify-center gap-3">

                                        @foreach ($type->colors as $color)
                                            <div @click="
                                                            activeColor={{ $loop->index }};
                                                            image='{{ asset('storage/' . $color->image?->image) }}';
                                                            colorName='{{ $color->name }}'
                                                        "
                                                :class="activeColor == {{ $loop->index }} ?
                                                    'ring-2 ring-blue-600 scale-100' :
                                                    ''"
                                                title="{{ $color->name }}"
                                                @if ($color->code_color2) style="background: linear-gradient(90deg, {{ $color->code_color }} 50%, {{ $color->code_color2 }} 50%);" 
                                                @else style="background: {{ $color->code_color }}" @endif
                                                class="w-6 h-6 rounded-full border cursor-pointer transition">
                                            </div>
                                        @endforeach

                                    </div>

                                    {{-- NAMA WARNA --}}
                                    <p class="mt-4 text-gray-600 font-bold text-2xl uppercase" x-text="colorName"></p>

                                    <div class="flex justify-center mt-10 gap-4">
                                        <button class="px-4 py-2 bg-gray-700 text-white text-xs rounded-full">
                                            Download Brosur
                                        </button>
                                        <button class="px-4 py-2 border border-gray-700 text-xs rounded-full">
                                            Spesifikasi
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>

                </div>
            </div>
            <div class="flex border-b justify-center py-10 w-full px-10 md:px-32 gap-2">
                <div x-data="{ galleryTab: 'exterior' }">
                    {{-- TAB MENU --}}
                    <div class="flex justify-center gap-4 mb-8">

                        <button @click="galleryTab='exterior'"
                            :class="galleryTab == 'exterior' ? 'border-b-2 border-gray-700 text-gray-700 font-bold' : ''"
                            class="px-4 py-2 text-gray-500">
                            Exterior
                        </button>

                        <button @click="galleryTab='interior'"
                            :class="galleryTab == 'interior' ? 'border-b-2 border-gray-700 text-gray-700 font-bold' : ''"
                            class="px-4 py-2 text-gray-500">
                            Interior
                        </button>

                    </div>


                    {{-- EXTERIOR --}}
                    <div x-show="galleryTab=='exterior'" class="grid grid-cols-2 md:grid-cols-4 gap-4">

                        @foreach ($product->galleries->where('category', 'exterior') as $gallery)
                            <img src="{{ asset('storage/' . $gallery->image) }}" class="rounded-lg w-full">
                        @endforeach

                    </div>


                    {{-- INTERIOR --}}
                    <div x-show="galleryTab=='interior'" class="grid grid-cols-2 md:grid-cols-4 gap-4">

                        @foreach ($product->galleries->where('category', 'interior') as $gallery)
                            <img src="{{ asset('storage/' . $gallery->image) }}" class="rounded-lg w-full">
                        @endforeach

                    </div>

                </div>
            </div>
            <div class="py-20 bg-white w-full px-10 mx-auto grid md:grid-cols-2 gap-10 items-center">

                {{-- IMAGE PRODUK --}}
                <div class="text-center">
                    @if ($product->mainImage)
                        <img src="{{ asset('storage/' . $product->mainImage->image) }}" class="mx-auto w-full max-w-md">
                    @endif
                </div>


                {{-- LIST HARGA --}}
                <div>

                    <h2 class="text-2xl font-bold">
                        Daftar Harga On The Road
                    </h2>
                    <p class="text-sm text-gray-500 mb-6">Harga On The Road per 02 Maret 2026</p>

                    <div class="bg-white rounded-xl shadow border divide-y">

                        @foreach ($product->types->sortBy('price') as $type)
                            <div class="flex justify-between items-center px-6 py-4 hover:bg-gray-50 transition">

                                <div>
                                    <p class="font-semibold text-gray-800">
                                        {{ $type->name . ' ' . $type->transmition }}
                                    </p>

                                    <p class="text-sm text-gray-500">
                                        Mulai dari
                                    </p>
                                </div>

                                <div class="text-xl font-bold text-red-600">
                                    Rp {{ number_format($type->price, 0, ',', '.') }}
                                </div>

                            </div>
                        @endforeach

                    </div>

                </div>

            </div>

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

                            <iframe src="https://maps.google.com/maps?q=bandung&t=&z=13&ie=UTF8&iwloc=&output=embed"
                                class="w-full h-[400px] border-0">
                            </iframe>

                        </div>

                    </div>

                </div>

            </section>
        </div>
    </section>
@endsection
@push('script')
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script></script>
@endpush
