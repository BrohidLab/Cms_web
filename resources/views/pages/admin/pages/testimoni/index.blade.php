@extends('pages.admin.components.layouts.app')

@section('content')
    <div class="p-4 md:p-6">

        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Manajemen Testimoni</h1>
                <p class="text-sm text-gray-500">Kelola semua ulasan pelanggan</p>
            </div>

            <a href="{{ route('testimoni.create') }}"
                class="flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow">
                <span class="material-symbols-outlined text-lg">add</span>
                Tambah
            </a>
        </div>

        <!-- Card -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden">

            <!-- Search & Filter -->
            <div class="p-4 border-b flex justify-between items-center">
                <form method="GET" class="w-1/3">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Pencarian..."
                        class="w-full border rounded-lg px-4 py-2 text-sm focus:ring focus:ring-blue-200 focus:outline-none">
                </form>

                <div class="text-sm text-gray-500">
                    Total: {{ $testimoni->count() }} Data
                </div>
            </div>

            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left">
                    <thead class="bg-gray-100 text-gray-600 uppercase text-xs">
                        <tr>
                            <th class="px-6 py-3">#</th>
                            <th class="px-6 py-3">Image</th>
                            <th class="px-6 py-3">Nama Pelanggan</th>
                            <th class="px-6 py-3">Unit</th>
                            <th class="px-6 py-3">Ulasan</th>
                            <th class="px-6 py-3 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y">

                        @forelse ($testimoni as $lsan)
                            <tr class="hover:bg-gray-50 transition">

                                <td class="px-6 py-4u">
                                    {{ $loop->iteration }}
                                </td>

                                <td class="px-6 py-4">
                                    @if ($lsan->image)
                                        <img src="{{ asset('storage/' . $lsan->image) }}"
                                            class="w-14 h-14 object-cover rounded-lg">
                                    @else
                                        <div
                                            class="w-14 h-14 bg-gray-200 rounded-lg flex items-center justify-center text-gray-400">
                                            <span class="material-symbols-outlined">image</span>
                                        </div>
                                    @endif
                                </td>

                                <td class="px-6 py-4">
                                    <div class="text-gray-800">
                                        {{ $lsan->nama_pelanggan }}
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-gray-800">
                                        {{ $lsan->product->name }}
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    {!! $lsan->ulasan !!}
                                </td>

                                <td class="px-6 py-4">
                                    <div class="flex justify-center gap-3">

                                        <!-- Edit -->
                                        <a href="{{ route('testimoni.edit', $lsan->id) }}"
                                            class="text-blue-600 hover:text-blue-800">
                                            <span class="material-symbols-outlined text-lg">edit</span>
                                        </a>

                                        <!-- Delete -->
                                        <form action="{{ route('testimoni.delete', $lsan->id) }}" method="POST"
                                            onsubmit="return confirm('Yakin hapus ulasan ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="text-red-600 hover:text-red-800">
                                                <span class="material-symbols-outlined text-lg">delete</span>
                                            </button>
                                        </form>

                                    </div>
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-10 text-gray-500">
                                    Belum ada ulasan.
                                </td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="p-4 border-t">
                {{ $testimoni->links() }}
            </div>

        </div>

    </div>
@endsection
