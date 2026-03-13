@extends('components.website.layouts.app')

@section('content')

<x-website.banner
    title="Product"
    description="Mengenal lebih dekat perusahaan kami"
    image="https://images.unsplash.com/photo-1492724441997-5dc865305da7"
    :breadcrumbs="[
        ['label' => 'Home', 'url' => '/'],
        ['label' => 'Product']
    ]"
/>

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
            <input type="text" name="search"
                placeholder="Cari produk..."
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 outline-none">
        </form>
	</div>

    <!-- Grid Produk -->
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

        @foreach($products as $product)

        <div class="bg-white rounded-xl shadow-sm hover:shadow-lg transition overflow-hidden group">

            <!-- Image -->
            <div class="h-48 overflow-hidden">
                <img src="{{ asset('storage/'.$product->mainImage->image) }}"
                     class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
            </div>

            <!-- Content -->
            <div class="p-4">

                <h3 class="font-semibold text-gray-800 line-clamp-2">
                    {{ $product->name }}
                </h3>

                <div class="flex items-center justify-between mt-3">

                    <span class="text-blue-600 font-semibold">
                        Rp {{ number_format($product->type_min_price) }}
                    </span>

                    <a href="#"
                       class="text-sm text-white bg-blue-600 px-3 py-1 rounded-lg hover:bg-blue-700">
                       Detail
                    </a>

                </div>

            </div>

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
