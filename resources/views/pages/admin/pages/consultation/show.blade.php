@extends('pages.admin.components.layouts.app')

@section('content')
    <div class="p-6">

        <!-- HEADER -->
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Detail Konsultasi</h1>
            <p class="text-gray-500 text-sm">Lihat dan kelola pesan konsultasi dari user</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            <!-- LEFT CONTENT -->
            <div class="lg:col-span-2 space-y-6">

                <!-- USER INFO -->
                <div class="bg-white rounded-2xl shadow p-6">
                    <h2 class="text-lg font-semibold mb-4 text-gray-700">Informasi Pengirim</h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <p class="text-sm text-gray-500">Nama</p>
                            <p class="font-medium text-gray-800">{{ $consultation->name }}</p>
                        </div>

                        <div>
                            <p class="text-sm text-gray-500">Lokasi</p>
                            <p class="font-medium text-gray-800">{{ $consultation->lokasi }}</p>
                        </div>

                        <div>
                            <p class="text-sm text-gray-500">No WhatsApp</p>
                            <p class="font-medium text-gray-800">{{ $consultation->no_wa }}</p>
                        </div>

                        <div>
                            <p class="text-sm text-gray-500">Tanggal</p>
                            <p class="font-medium text-gray-800">
                                {{ $consultation->created_at->format('d M Y, H:i') }}
                            </p>
                        </div>

                        <div>
                            <p class="text-sm text-gray-500">Type Mobil</p>
                            <p class="font-medium text-gray-800">{{ $consultation->product->name }}</p>
                        </div>
                    </div>
                </div>

                <!-- MESSAGE -->
                <div class="bg-white rounded-2xl shadow p-6">
                    <h2 class="text-lg font-semibold mb-4 text-gray-700">Pesan Konsultasi</h2>

                    <div class="bg-gray-50 p-4 rounded-xl text-gray-700 leading-relaxed">
                        {{ $consultation->pesan }}
                    </div>
                </div>

            </div>

            <!-- RIGHT SIDEBAR -->
            <div class="space-y-6">

                <!-- ACTION -->
                <div class="bg-white rounded-2xl shadow p-6 space-y-3">
                    <h2 class="text-lg font-semibold text-gray-700">Aksi</h2>
                    <!-- WHATSAPP -->
                    <a href="https://wa.me/{{ $consultation->no_wa }}?text=Halo%20{{ $consultation->name }},%20terima%20kasih%20sudah%20menghubungi%20kami"
                        target="_blank"
                        class="block w-full text-center bg-green-500 hover:bg-green-600 text-white py-2 rounded-xl transition">
                        Balas via WhatsApp
                    </a>
                </div>

            </div>

        </div>

    </div>
@endsection
