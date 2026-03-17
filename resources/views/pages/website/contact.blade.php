@extends('components.website.layouts.app')

@section('content')
    <x-website.banner title="{{ $banner->title ?? 'Hubungi Kami' }}" description="{{ $banner->sub_title ?? '' }}"
        image="{{ $banner && $banner->images
            ? asset('storage/' . $banner->images)
            : 'https://suzuki.co.id/themes/default/assets/images/suzuki-default-mobile.jpg' }}"
        :breadcrumbs="[['label' => 'Home', 'url' => '/'], ['label' => 'Kontak Kami']]" />


    <section class="bg-gray-50 py-10 relative z-10">

        <div class="max-w-7xl mx-auto px-10">

            <div class="grid md:grid-cols-5 gap-10">

                <!-- INFORMASI KONTAK -->

                <div class="md:col-span-2 space-y-6">

                    <h2 class="text-2xl font-semibold text-gray-800 mb-4">
                        Hubungi Kami
                    </h2>

                    <p class="text-gray-600 text-sm leading-relaxed">
                        Jika Anda memiliki pertanyaan mengenai layanan, produk, atau membutuhkan bantuan,
                        silakan hubungi kami melalui informasi kontak berikut atau isi form di samping.
                    </p>


                    <!-- ADDRESS -->

                    <div class="bg-white p-6 rounded-xl shadow-sm">

                        <h4 class="font-semibold mb-2">
                            Alamat
                        </h4>

                        <p class="text-sm text-gray-600">
                            Jl. Contoh Alamat No.123<br>
                            Jakarta, Indonesia
                        </p>

                    </div>


                    <!-- PHONE -->

                    <div class="bg-white p-6 rounded-xl shadow-sm">

                        <h4 class="font-semibold mb-2">
                            Telepon
                        </h4>

                        <p class="text-sm text-gray-600">
                            {{ profileWeb()->no_wa ?? '' }}
                        </p>

                    </div>


                    <!-- EMAIL -->

                    <div class="bg-white p-6 rounded-xl shadow-sm">

                        <h4 class="font-semibold mb-2">
                            Email
                        </h4>

                        <p class="text-sm text-gray-600">
                            {{ profileWeb()->email ?? '' }}
                        </p>

                    </div>


                    <!-- WHATSAPP -->

                    <div class="bg-blue-600 text-white p-6 rounded-xl">

                        <h4 class="font-semibold mb-2">
                            Butuh Respon Cepat?
                        </h4>

                        <p class="text-sm mb-4">
                            Hubungi kami langsung melalui WhatsApp.
                        </p>

                        <a href="https://wa.me/{{ profileWeb()->no_wa }}"
                            class="inline-block bg-white text-blue-600 px-4 py-2 rounded-lg text-sm font-medium hover:bg-gray-100">

                            Chat WhatsApp

                        </a>

                    </div>

                </div>



                <!-- FORM KONTAK -->

                <div class="md:col-span-3">

                    <div class="bg-white p-8 rounded-xl shadow-md">

                        <h3 class="text-xl font-semibold mb-6">
                            Kirim Pesan
                        </h3>

                        <form method="POST" action="#" class="space-y-5">

                            @csrf

                            <div class="grid md:grid-cols-2 gap-5">

                                <div>

                                    <label class="text-sm text-gray-600">
                                        Nama Lengkap
                                    </label>

                                    <input type="text" name="name"
                                        class="mt-1 w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 outline-none">

                                </div>


                                <div>

                                    <label class="text-sm text-gray-600">
                                        Email
                                    </label>

                                    <input type="email" name="email"
                                        class="mt-1 w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 outline-none">

                                </div>

                            </div>


                            <div>

                                <label class="text-sm text-gray-600">
                                    Nomor Telepon
                                </label>

                                <input type="text" name="phone"
                                    class="mt-1 w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 outline-none">

                            </div>


                            <div>

                                <label class="text-sm text-gray-600">
                                    Subjek
                                </label>

                                <input type="text" name="subject"
                                    class="mt-1 w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 outline-none">

                            </div>


                            <div>

                                <label class="text-sm text-gray-600">
                                    Pesan
                                </label>

                                <textarea name="message" rows="4"
                                    class="mt-1 w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 outline-none"></textarea>

                            </div>


                            <button
                                class="w-full bg-blue-600 text-white py-3 rounded-lg font-medium hover:bg-blue-700 transition">

                                Kirim Pesan

                            </button>

                        </form>

                    </div>

                </div>

            </div>

        </div>
    </section>


    <!-- GOOGLE MAP -->

    <section class="pb-20 bg-gray-50">

        <div class="max-w-7xl mx-auto px-6">

            <div class="rounded-xl overflow-hidden shadow">

                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3958.773920721896!2d110.40700187411022!3d-7.15211857016343!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e708613d80b2435%3A0x2d8c0324fd8f3e3c!2sSuzuki%20Ungaran%20Sunmotor%20Indosentra%20Trada!5e0!3m2!1sid!2sid!4v1773667578604!5m2!1sid!2sid"
                    class="w-full h-[400px]" allowfullscreen="" loading="lazy">
                </iframe>

            </div>

        </div>

    </section>
@endsection
