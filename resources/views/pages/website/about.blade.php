@extends('components.website.layouts.app')

@section('content')
    <x-website.banner title="{{ $banner->title ?? 'Tentang kami' }}" description="{{ $banner->sub_title ?? '' }}"
        image="{{ $banner && $banner->images
            ? asset('storage/' . $banner->images)
            : 'https://suzuki.co.id/themes/default/assets/images/suzuki-default-mobile.jpg' }}"
        :breadcrumbs="[['label' => 'Home', 'url' => '/'], ['label' => 'Tentang Kami']]" />

    <!-- Konten Tentang Kami -->
    <section class="py-16 bg-gray-50">

        <div class="max-w-6xl mx-auto px-6">

            <div class="bg-white rounded-xl shadow-sm p-8 md:p-10">

                <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">
                    Siapa Kami
                </h2>

                <div class="space-y-4 text-gray-600 leading-relaxed text-sm md:text-base">

                    {!! profileWeb()->about !!}

                </div>

            </div>

        </div>

        <div class="max-w-6xl mx-auto p-6">

            <div class="text-center mb-10">
                <h2 class="text-2xl font-bold text-gray-800">
                    Lokasi Dealer Kami
                </h2>
                <p class="text-gray-500 text-sm mt-2">
                    Kunjungi dealer kami untuk mendapatkan layanan terbaik
                </p>
            </div>

            <div class="rounded-xl overflow-hidden shadow-md">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3958.773920721896!2d110.40700187411022!3d-7.15211857016343!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e708613d80b2435%3A0x2d8c0324fd8f3e3c!2sSuzuki%20Ungaran%20Sunmotor%20Indosentra%20Trada!5e0!3m2!1sid!2sid!4v1773667578604!5m2!1sid!2sid"
                    class="w-full h-[400px]" allowfullscreen="" loading="lazy">
                </iframe>

            </div>

        </div>

    </section>
@endsection
