@extends('components.website.layouts.app')

@section('content')
    <x-website.banner title="{{ $banner->title ?? 'Service' }}" description="{{ $banner->sub_title ?? '' }}"
        image="{{ $banner && $banner->images
            ? asset('storage/' . $banner->images)
            : 'https://suzuki.co.id/themes/default/assets/images/suzuki-default-mobile.jpg' }}"
        :breadcrumbs="[['label' => 'Home', 'url' => '/'], ['label' => 'Service']]" />

    <section class="py-16 bg-gray-50">
        <div class="max-w-6xl mx-auto px-4">

            <!-- Tab Menu -->
            <div class="flex justify-center mb-10 border-b">
                <button class="tab-btn px-6 py-3 text-sm font-medium border-b-2 border-blue-600 text-blue-600"
                    data-tab="jadwal">
                    Jadwal Service
                </button>

                <button class="tab-btn px-6 py-3 text-sm font-medium text-gray-500" data-tab="pedoman">
                    Pedoman Service
                </button>

                <button class="tab-btn px-6 py-3 text-sm font-medium text-gray-500" data-tab="jaminan">
                    Jaminan Service
                </button>
            </div>

            <!-- TAB 1 JADWAL SERVICE -->
            <div class="tab-content" id="jadwal">

                <div class="bg-white p-8 rounded-xl shadow-sm max-w-3xl mx-auto">

                    <h2 class="text-xl font-semibold mb-6">Booking Service Mobil</h2>

                    <form action="#" method="POST" class="space-y-5">

                        <div>
                            <label class="text-sm font-medium">Nama</label>
                            <input type="text" class="w-full border rounded-lg px-4 py-2">
                        </div>

                        <div>
                            <label class="text-sm font-medium">No Telepon</label>
                            <input type="text" class="w-full border rounded-lg px-4 py-2">
                        </div>

                        <div>
                            <label class="text-sm font-medium">Tipe Mobil</label>
                            <input type="text" class="w-full border rounded-lg px-4 py-2">
                        </div>

                        <div>
                            <label class="text-sm font-medium">Tanggal Service</label>
                            <input type="date" class="w-full border rounded-lg px-4 py-2">
                        </div>

                        <div>
                            <label class="text-sm font-medium">Keluhan</label>
                            <textarea class="w-full border rounded-lg px-4 py-2"></textarea>
                        </div>

                        <button class="bg-blue-600 text-white px-6 py-2 rounded-lg">
                            Booking Service
                        </button>

                    </form>

                </div>

            </div>

            <!-- TAB 2 PEDOMAN -->
            <div class="tab-content hidden" id="pedoman">

                <div class="bg-white p-8 rounded-xl shadow-sm">

                    <h2 class="text-xl font-semibold mb-4">Pedoman Service</h2>

                    <ul class="space-y-3 text-gray-600">
                        <li>• Pastikan kendaraan datang sesuai jadwal booking.</li>
                        <li>• Bawa dokumen kendaraan.</li>
                        <li>• Pastikan tangki bahan bakar cukup.</li>
                        <li>• Informasikan keluhan kendaraan secara detail.</li>
                    </ul>

                </div>

            </div>

            <!-- TAB 3 JAMINAN -->
            <div class="tab-content hidden" id="jaminan">

                <div class="bg-white p-8 rounded-xl shadow-sm">

                    <h2 class="text-xl font-semibold mb-4">Jaminan Service</h2>

                    <ul class="space-y-3 text-gray-600">
                        <li>✔ Garansi pengerjaan hingga 30 hari</li>
                        <li>✔ Teknisi profesional</li>
                        <li>✔ Sparepart original</li>
                        <li>✔ Pemeriksaan kendaraan gratis</li>
                    </ul>

                </div>

            </div>

        </div>
    </section>
@endsection

@push('script')
    <script>
        const tabs = document.querySelectorAll(".tab-btn");
        const contents = document.querySelectorAll(".tab-content");

        tabs.forEach(tab => {

            tab.addEventListener("click", () => {

                const target = tab.dataset.tab;

                contents.forEach(c => c.classList.add("hidden"));
                document.getElementById(target).classList.remove("hidden");

                tabs.forEach(t => {
                    t.classList.remove("border-blue-600", "text-blue-600", "border-b-2");
                    t.classList.add("text-gray-500");
                });

                tab.classList.add("border-blue-600", "text-blue-600", "border-b-2");
                tab.classList.remove("text-gray-500");

            });

        });
    </script>
@endpush
