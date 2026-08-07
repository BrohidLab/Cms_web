@extends('pages.admin.components.layouts.app')

@section('content')
    <div class="p-6 space-y-8">

        <!-- HEADER -->
        <div class="flex items-center justify-between">

            <div>
                <h1 class="text-2xl font-bold text-gray-800">Dashboard</h1>
                <p class="text-sm text-gray-500">Overview data website</p>
            </div>

            <div class="text-sm text-gray-400">
                {{ now()->format('l, d F Y') }}
            </div>

        </div>


        <!-- STATISTIC CARDS -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

            <!-- PRODUCT -->
            <div class="bg-white p-6 rounded-xl shadow-sm hover:shadow-md transition flex items-center justify-between">

                <div>
                    <p class="text-sm text-gray-500">Total Product</p>
                    <p class="text-3xl font-bold text-blue-600 mt-2">
                        {{ number_format($totalProduct) }}
                    </p>
                </div>

                <div class="bg-blue-100 p-3 rounded-xl">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M3 7h18M3 12h18M3 17h18" />
                    </svg>
                </div>

            </div>


            <!-- ARTICLE -->
            <div class="bg-white p-6 rounded-xl shadow-sm hover:shadow-md transition flex items-center justify-between">

                <div>
                    <p class="text-sm text-gray-500">Total Artikel</p>
                    <p class="text-3xl font-bold text-green-600 mt-2">
                        {{ number_format($totalArticle) }}
                    </p>
                </div>

                <div class="bg-green-100 p-3 rounded-xl">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M19 11H5M19 7H5M19 15H5" />
                    </svg>
                </div>

            </div>


            <!-- CONSULTATION -->
            <div class="bg-white p-6 rounded-xl shadow-sm hover:shadow-md transition flex items-center justify-between">

                <div>
                    <p class="text-sm text-gray-500">Total Konsultasi</p>
                    <p class="text-3xl font-bold text-orange-600 mt-2">
                        {{ number_format($totalConsultation) }}
                    </p>
                </div>

                <div class="bg-orange-100 p-3 rounded-xl">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-orange-600" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M8 10h8M8 14h6M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>

            </div>


            <!-- VISITOR -->
            <div class="bg-white p-6 rounded-xl shadow-sm hover:shadow-md transition flex items-center justify-between">

                <div>
                    <p class="text-sm text-gray-500">Total Visitor</p>
                    <p class="text-3xl font-bold text-purple-600 mt-2">
                        {{ number_format($totalVisitor) }}
                    </p>
                </div>

                <div class="bg-purple-100 p-3 rounded-xl">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-600" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0zm7.5 0c0 4.418-4.477 8-10 8s-10-3.582-10-8 4.477-8 10-8 10 3.582 10 8z" />
                    </svg>
                </div>

            </div>

        </div>



        <!-- MAIN GRID -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

            <!-- ARTIKEL TERBARU -->
            <div class="bg-white rounded-xl shadow-sm p-6">

                <h2 class="font-semibold text-gray-700 mb-4">
                    Artikel Terbaru
                </h2>

                <ul class="space-y-3">

                    @foreach ($latestArticles as $article)
                        <li class="flex justify-between border-b pb-2">

                            <span class="text-gray-700">
                                {{ $article->title }}
                            </span>

                            <span class="text-xs text-gray-400">
                                {{ $article->created_at->format('d M Y') }}
                            </span>

                        </li>
                    @endforeach

                </ul>

            </div>



            <!-- KONSULTASI TERBARU -->
            <div class="bg-white rounded-xl shadow-sm p-6">

                <h2 class="font-semibold text-gray-700 mb-4">
                    Konsultasi Terbaru
                </h2>

                <ul class="space-y-3">

                    @foreach ($latestConsultations as $consult)
                        <li class="flex justify-between border-b pb-2">

                            <span class="text-gray-700">
                                {{ $consult->name }}
                            </span>

                            <span class="text-xs text-gray-400">
                                {{ $consult->created_at->format('d M Y') }}
                            </span>

                        </li>
                    @endforeach

                </ul>

            </div>

        </div>



        <!-- PRODUCT TERBARU -->
        <div class="bg-white rounded-xl shadow-sm p-6">

            <h2 class="font-semibold text-gray-700 mb-4">
                Product Terbaru
            </h2>

            <div class="grid grid-cols-2 md:grid-cols-5 gap-4">

                @foreach ($latestProducts as $product)
                    <div class="border rounded-lg p-3 text-center hover:shadow transition">

                        @php
                            $image = $product->mainImage->image ?? null;
                        @endphp
                        
                        <img 
                            src="{{ $image ? asset('storage/' . $image) : asset('images/no-image.png') }}"
                            class="h-20 object-contain mx-auto mb-2"
                            alt="{{ $product->name }}"
                        >

                        <p class="text-sm font-medium">
                            {{ $product->name }}
                        </p>

                    </div>
                @endforeach

            </div>

        </div>

    </div>
@endsection
