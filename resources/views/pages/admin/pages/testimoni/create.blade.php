@extends('pages.admin.components.layouts.app')

@section('content')
    <div class="p-6">

        <!-- Header -->
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Tambah Testimoni</h1>
            <p class="text-sm text-gray-500">Tambahkan ulasan pelanggan terhadap produk</p>
        </div>

        <div class="bg-white shadow-sm rounded-xl border border-gray-100">

            <form action="{{ route('testimoni.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6">

                    <!-- Image Upload -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Foto Pelanggan
                        </label>

                        <div class="flex items-center gap-6">

                            <!-- Preview -->
                            <img id="preview" class="w-20 h-20 rounded-lg object-cover border border-gray-200"
                                src="https://placehold.co/100x100">

                            <input type="file" name="image" accept="image/*" onchange="previewImage(event)"
                                class="block w-full text-sm text-gray-500
                        file:mr-4 file:py-2 file:px-4
                        file:rounded-lg file:border-0
                        file:text-sm file:font-semibold
                        file:bg-gray-900 file:text-white
                        hover:file:bg-gray-700">
                        </div>
                    </div>

                    <!-- Nama Pelanggan -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Nama Pelanggan
                        </label>

                        <input type="text" name="nama_pelanggan"
                            class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-gray-900 focus:border-gray-900"
                            placeholder="Masukkan nama pelanggan" required>
                    </div>

                    <!-- Produk -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Produk
                        </label>

                        <select name="product_id"
                            class="w-full text-sm border border-gray-200 px-2 py-3 rounded-lg focus:ring-2 focus:ring-gray-900 focus:border-gray-900"
                            required>

                            <option value="">Pilih Produk</option>

                            @foreach ($products as $id => $name)
                                <option value="{{ $id }}">{{ $name }}</option>
                            @endforeach

                        </select>
                    </div>

                    <!-- Ulasan -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Ulasan Pelanggan
                        </label>

                        <textarea name="ulasan" rows="5"
                            class="w-full border border-gray-200 p-4 rounded-lg focus:ring-2 focus:ring-gray-900 focus:border-gray-900"
                            placeholder="Tulis ulasan pelanggan..."></textarea>
                    </div>

                </div>

                <!-- Footer -->
                <div class="flex justify-end gap-3 px-6 py-4 border-t border-gray-100 bg-gray-50 rounded-b-xl">

                    <a href="{{ route('testimoni.index') }}"
                        class="px-4 py-2 rounded-lg border border-gray-200 text-gray-600 hover:bg-gray-100">
                        Batal
                    </a>

                    <button type="submit" class="px-5 py-2.5 rounded-lg bg-gray-900 text-white hover:bg-black">
                        Simpan Testimoni
                    </button>

                </div>

            </form>

        </div>
    </div>


    <script>
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function() {
                const output = document.getElementById('preview');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
@endsection
