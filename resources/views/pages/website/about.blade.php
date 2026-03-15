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

                    <p>
                        Kami adalah sebuah platform yang berfokus pada penyediaan
                        informasi dan layanan digital yang bermanfaat bagi masyarakat.
                        Dengan memanfaatkan teknologi modern, kami berkomitmen untuk
                        menghadirkan solusi yang efektif, mudah digunakan, dan
                        terpercaya.
                    </p>

                    <p>
                        Sejak awal berdiri, tujuan kami adalah menciptakan pengalaman
                        digital yang sederhana namun powerful. Kami percaya bahwa
                        teknologi harus mampu membantu manusia dalam menjalankan
                        aktivitas sehari-hari dengan lebih efisien.
                    </p>

                    <p>
                        Dengan tim yang berdedikasi serta semangat inovasi yang tinggi,
                        kami terus mengembangkan berbagai fitur dan layanan agar dapat
                        memberikan nilai terbaik bagi pengguna.
                    </p>

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

                <iframe src="https://www.google.com/maps?q=Jakarta&output=embed" width="100%" height="420"
                    style="border:0;" allowfullscreen="" loading="lazy">
                </iframe>

            </div>

        </div>

    </section>
@endsection
