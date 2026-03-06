@extends('pages.admin.components.layouts.app')

@section('content')
<div class="p-6">

    <!-- Header -->
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Konsultasi Pelanggan</h1>
            <p class="text-sm text-gray-500">Daftar permintaan konsultasi dari website</p>
        </div>
    </div>


    <!-- Search -->
    <div class="bg-white p-4 rounded-xl border shadow-sm mb-6">
        <form method="GET">
            <input 
                type="text" 
                name="search"
                value="{{ request('search') }}"
                placeholder="Cari nama, WA, produk, lokasi..."
                class="w-full border-gray-200 rounded-lg focus:ring-2 focus:ring-gray-900">
        </form>
    </div>


    <!-- Table -->
    <div class="bg-white rounded-xl border shadow-sm overflow-hidden">

        <table class="w-full text-sm">

            <thead class="bg-gray-50 text-gray-600">
                <tr>
                    <th class="px-6 py-3 text-left">Nama</th>
                    <th class="px-6 py-3 text-left">No WhatsApp</th>
                    <th class="px-6 py-3 text-left">Produk</th>
                    <th class="px-6 py-3 text-left">Lokasi</th>
                    <th class="px-6 py-3 text-left">Pesan</th>
                    <th class="px-6 py-3 text-center">Aksi</th>
                </tr>
            </thead>

            <tbody class="divide-y">

                @forelse($consultations as $consultation)

                <tr class="hover:bg-gray-50">

                    <td class="px-6 py-4 font-medium text-gray-800">
                        {{ $consultation->name }}
                    </td>

                    <td class="px-6 py-4 text-gray-600">
                        {{ $consultation->no_wa }}
                    </td>

                    <td class="px-6 py-4">
                        <span class="px-3 py-1 text-xs bg-blue-100 text-blue-600 rounded-full">
                            {{ $consultation->product->name ?? '-' }}
                        </span>
                    </td>

                    <td class="px-6 py-4 text-gray-600">
                        {{ $consultation->lokasi ?? '-' }}
                    </td>

                    <td class="px-6 py-4 text-gray-600 max-w-xs truncate">
                        {{ $consultation->pesan }}
                    </td>

                    <td class="px-6 py-4 text-center">

                        <a 
                        target="_blank"
                        href="https://wa.me/{{ $consultation->no_wa }}?text=Halo%20{{ $consultation->name }},%20terima%20kasih%20sudah%20menghubungi%20kami"
                        class="inline-flex items-center gap-2 px-3 py-1.5 bg-green-500 text-white rounded-lg text-xs hover:bg-green-600">

                        Chat WA

                        </a>

                    </td>

                </tr>

                @empty

                <tr>
                    <td colspan="6" class="text-center py-10 text-gray-400">
                        Belum ada data konsultasi
                    </td>
                </tr>

                @endforelse

            </tbody>

        </table>

    </div>


    <!-- Pagination -->
    <div class="mt-6">
        {{ $consultations->links() }}
    </div>

</div>
@endsection