@extends('components.website.layouts.app')

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
                            <div class="h-48 overflow-hidden">
                                <img src="{{ asset('storage/' . $product->mainImage->image) }}"
                                    class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                            </div>

                            <!-- Content -->
                            <div class="p-4">

                                <h3 class="font-semibold text-gray-800 line-clamp-2">
                                    {{ $product->name }}
                                </h3>

                                <div class="flex items-center mt-3 gap-4">
                                    <p class="text-blue-600 flex flex-col">
                                        <span class="text-xs text-gray-500">Mulai dari</span>
                                        Rp {{ number_format($product->types_min_price) }}
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
@endsection
