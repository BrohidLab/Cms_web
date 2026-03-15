@extends('components.website.layouts.app')

@section('content')
    <!-- Banner -->
    <x-website.banner title="{!! $banner->title ?? 'Suku Cadang' !!}" description="{{ $banner->sub_title ?? '' }}"
        image="{{ $banner && $banner->images
            ? asset('storage/' . $banner->images)
            : 'https://suzuki.co.id/themes/default/assets/images/suzuki-default-mobile.jpg' }}"
        :breadcrumbs="[['label' => 'Home', 'url' => '/'], ['label' => 'Suku Cadang']]" />


    <!-- SECTION KONSULTASI -->
    <section class="bg-gray-50 py-6 relative z-10">
        <div class="max-w-7xl mx-auto px-6">

            <div class="grid lg:grid-cols-5 gap-10">

                <!-- LEFT CONTENT -->
                <div class="lg:col-span-2 space-y-6">

                    <div class="bg-white p-7 rounded-2xl shadow-sm border border-gray-100">

                        <h3 class="text-xl font-semibold text-gray-800 mb-4">
                            Konsultasi Suku Cadang Di Suzuki
                        </h3>

                        <p class="text-gray-600 text-sm leading-relaxed mb-6">
                            Kami membantu Anda menemukan suku cadang yang tepat untuk kendaraan Anda.
                            Tim teknisi kami akan memberikan rekomendasi sparepart terbaik agar performa mobil tetap
                            optimal.
                        </p>

                        <div class="space-y-4 text-sm">

                            <div class="flex items-start gap-3">
                                <div
                                    class="w-6 h-6 flex items-center justify-center bg-blue-100 text-blue-600 rounded-full text-xs">
                                    ✓</div>
                                <p class="text-gray-600">Rekomendasi sparepart original</p>
                            </div>

                            <div class="flex items-start gap-3">
                                <div
                                    class="w-6 h-6 flex items-center justify-center bg-blue-100 text-blue-600 rounded-full text-xs">
                                    ✓</div>
                                <p class="text-gray-600">Teknisi berpengalaman</p>
                            </div>

                            <div class="flex items-start gap-3">
                                <div
                                    class="w-6 h-6 flex items-center justify-center bg-blue-100 text-blue-600 rounded-full text-xs">
                                    ✓</div>
                                <p class="text-gray-600">Konsultasi cepat dan mudah</p>
                            </div>

                            <div class="flex items-start gap-3">
                                <div
                                    class="w-6 h-6 flex items-center justify-center bg-blue-100 text-blue-600 rounded-full text-xs">
                                    ✓</div>
                                <p class="text-gray-600">Harga transparan</p>
                            </div>

                        </div>

                    </div>


                    <!-- CTA WHATSAPP -->
                    <div class="bg-blue-600 text-white p-7 rounded-2xl shadow-lg">

                        <h4 class="font-semibold text-lg mb-2">
                            Butuh Respon Lebih Cepat?
                        </h4>

                        <p class="text-sm text-blue-100 mb-5">
                            Hubungi tim kami melalui WhatsApp untuk konsultasi langsung.
                        </p>

                        <a href="https://wa.me/628xxxxxxxxxx"
                            class="inline-block bg-white text-blue-600 px-5 py-2 rounded-lg text-sm font-medium hover:bg-gray-100 transition">

                            Chat WhatsApp

                        </a>

                    </div>

                </div>



                <!-- FORM -->
                <div class="lg:col-span-3">

                    <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-8">

                        <div class="mb-6">
                            <h2 class="text-xl font-semibold text-gray-800">
                                Form Konsultasi Suku Cadang
                            </h2>
                            <p class="text-gray-500 text-sm mt-1">
                                Isi form berikut untuk mendapatkan rekomendasi sparepart terbaik.
                            </p>
                        </div>


                        <form action="{{ route('website.suku_cadang.consultation') }}" method="POST" class="space-y-5">
                            @csrf

                            <div class="grid md:grid-cols-2 gap-5">

                                <div>
                                    <label class="text-sm text-gray-600">Nama Lengkap</label>
                                    <input type="text" name="name"
                                        class="mt-1 w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 outline-none">
                                </div>

                                <div>
                                    <label class="text-sm text-gray-600">Nomor WhatsApp</label>
                                    <input type="text" name="phone"
                                        class="mt-1 w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 outline-none">
                                </div>

                            </div>


                            <div class="grid md:grid-cols-2 gap-5">

                                <div>
                                    <label class="text-sm text-gray-600">Merk Kendaraan</label>
                                    <select name="brand"
                                        class="mt-1 w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 outline-none">

                                        <option>Pilih Merk</option>
                                        <option>Toyota</option>
                                        <option>Honda</option>
                                        <option>Suzuki</option>
                                        <option>Mitsubishi</option>
                                        <option>Daihatsu</option>

                                    </select>
                                </div>

                                <div>
                                    <label class="text-sm text-gray-600">Tahun Kendaraan</label>
                                    <input type="text" name="year" placeholder="Contoh: 2022"
                                        class="mt-1 w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 outline-none">
                                </div>

                            </div>


                            <div>
                                <label class="text-sm text-gray-600">Suku Cadang Dibutuhkan</label>
                                <input type="text" name="sparepart" placeholder="Contoh: Kampas Rem"
                                    class="mt-1 w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 outline-none">
                            </div>


                            <div>
                                <label class="text-sm text-gray-600">Deskripsi Kebutuhan</label>
                                <textarea name="message" rows="4"
                                    class="mt-1 w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 outline-none"></textarea>
                            </div>


                            <button
                                class="w-full bg-blue-600 text-white py-3 rounded-lg font-medium hover:bg-blue-700 transition">

                                Kirim Konsultasi

                            </button>

                        </form>

                    </div>

                </div>


            </div>
        </div>
    </section>
@endsection
