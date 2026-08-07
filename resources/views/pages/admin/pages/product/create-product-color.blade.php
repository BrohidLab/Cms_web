@extends('pages.admin.components.layouts.app')


@section('content')
    <div class="max-w-6xl mx-auto space-y-6">

        <div>
            <h1 class="text-3xl font-semibold text-gray-800">Tambah Product</h1>
            <p class="text-gray-500">Tambah produk mobil baru</p>
        </div>



        <div class="bg-white rounded-2xl shadow border border-gray-100 p-8 space-y-10">

            <div>
                <h2 class="text-lg font-semibold mb-6 text-gray-800">Type Color Product</h2>
                <form action="{{ route('product.store_product_color') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if ($errors->any())
                        <div class="mb-4 p-4 bg-red-100 border border-red-300 text-red-700 rounded-xl">
                            <ul class="list-disc list-inside text-sm">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="grid md:grid-cols-4 gap-6">

                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-1">Color Name</label>
                            <input type="hidden" name="product_id" value="{{ $product->id }}" />
                            <input type="text" name="name"
                                class="w-full border border-gray-300 rounded-xl px-4 py-2.5 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-1">Jenis Color</label>
                            <select name="jenis_color"
                                class="w-full border border-gray-300 rounded-xl px-4 py-2.5 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                <option value="single">Single</option>
                                <option value="two_tone">Two Tone</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-600">
                                Code Color
                            </label>

                            <div id="color-container" class="grid grid-cols-1 gap-2">

                                <!-- Primary -->
                                <div id="primary-wrapper">
                                    <input type="color" name="code_color"
                                        class="w-full h-12 border border-gray-300 rounded-xl px-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                </div>

                                <!-- Secondary -->
                                <div id="secondary-wrapper" class="hidden">
                                    <input type="color" name="code_color2"
                                        class="w-full h-12 border border-gray-300 rounded-xl px-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                </div>

                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-1">Type</label>
                            <select name="type_id"
                                class="w-full border border-gray-300 rounded-xl px-4 py-2.5 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                @foreach ($type as $items)
                                    <option value={{ $items->id }}>{{ $items->name }} - {{ $items->transmition }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="md:col-span-4">
                            <div class="w-full py-2 pb-5 border-b border-gray-400 flex items-center justify-end">
                                <button type="submit" class="bg-green-600 text-sm px-5 py-2 text-white rounded-md">
                                    Tambah Type Color
                                </button>
                            </div>


                            <div class="w-full overflow-hidden">
                                <div class="py-6">
                                    <h2 class="text-md md:text-lg font-semibold text-gray-800">
                                        Type Color List
                                    </h2>
                                </div>

                                <div class="space-y-8">

                                    @forelse ($typeColor as $typeId => $colors)
                                        <div class="bg-white border border-gray-200 rounded-2xl shadow-sm">

                                            {{-- Header Type --}}
                                            <div class="px-6 py-5 border-b bg-gray-50 rounded-t-2xl">
                                                <h2 class="text-lg font-semibold text-gray-800">
                                                    {{ $colors?->first()?->type?->name }}
                                                    <span class="text-sm text-gray-500 font-normal">
                                                        - {{ $colors?->first()?->type?->transmition }}
                                                    </span>
                                                </h2>
                                            </div>

                                            {{-- List Color --}}
                                            <div class="p-6 grid md:grid-cols-3 gap-6">

                                                @foreach ($colors as $color)
                                                    <div data-id="{{ $color->id }}"
                                                        class="color-card border rounded-xl p-4 hover:shadow-md transition bg-gray-50">

                                                        <div class="flex justify-between items-start mb-3">

                                                            <div>
                                                                <h3 class="font-semibold text-gray-800">
                                                                    {{ $color->name }}
                                                                </h3>

                                                                <p class="text-xs text-gray-500 capitalize">
                                                                    {{ str_replace('_', ' ', $color->jenis_color) }}
                                                                </p>
                                                            </div>

                                                            <button type="button"
                                                                data-url="{{ route('product.delete_product_color', $color->id) }}"
                                                                class="btn-delete text-red-500 hover:text-red-600 text-sm">
                                                                Delete
                                                            </button>

                                                        </div>

                                                        {{-- Preview Color --}}
                                                        <div class="flex items-center gap-3">

                                                            {{-- Primary --}}
                                                            <div class="w-10 h-10 rounded-full border shadow"
                                                                style="background-color: {{ $color->code_color }}">
                                                            </div>

                                                            {{-- Secondary (jika two tone) --}}
                                                            @if ($color->jenis_color === 'two_tone')
                                                                <div class="w-10 h-10 rounded-full border shadow"
                                                                    style="background-color: {{ $color->code_color2 }}">
                                                                </div>
                                                            @endif

                                                        </div>

                                                        {{-- Code --}}
                                                        <div class="mt-3 text-xs text-gray-500">
                                                            {{ $color->code_color }}
                                                            @if ($color->jenis_color === 'two_tone')
                                                                - {{ $color->code_color2 }}
                                                            @endif
                                                        </div>

                                                    </div>
                                                @endforeach

                                            </div>
                                        </div>

                                    @empty
                                        <div class="text-center text-gray-500 py-10">
                                            Data not found
                                        </div>
                                    @endforelse

                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="flex justify-end mt-6 gap-3">
                <a href="{{ route('product.create_product_type', $product->id) }}"
                    class="bg-gray-200 hover:bg-gray-400 disabled:bg-gray-400 disabled:cursor-not-allowed text-md px-6 py-2 flex items-center rounded-sm shadow transition">
                    <span class="material-symbols-outlined">
                        chevron_left
                    </span>
                    Kembali
                </a>
                <a href="{{ route('product.product.create_product_image', $product->id) }}" id="btn-next" {{ $typeColor->count() == 0 ? 'disabled' : '' }}
                    class="bg-blue-600 hover:bg-blue-700 disabled:bg-gray-400 disabled:cursor-not-allowed text-md text-white px-6 py-2 flex items-center rounded-sm shadow transition">
                    Selanjutnya
                    <span class="material-symbols-outlined">
                        chevron_right
                    </span>
                </a>
            </div>
        </div>

    </div>
@endsection
@push('script')
    <script>
        $(document).ready(function() {

            function toggleColorLayout() {

                let jenis = $('select[name="jenis_color"]').val();

                if (jenis === 'two_tone') {

                    $('#color-container')
                        .removeClass('grid-cols-1')
                        .addClass('grid-cols-2');

                    $('#secondary-wrapper').removeClass('hidden');

                } else {

                    $('#color-container')
                        .removeClass('grid-cols-2')
                        .addClass('grid-cols-1');

                    $('#secondary-wrapper')
                        .addClass('hidden')
                        .find('input')
                        .val('');

                }
            }

            $('select[name="jenis_color"]').on('change', toggleColorLayout);

            toggleColorLayout(); // first load
        });
    </script>
    <script>
        $(document).on('click', '.btn-delete', function() {

            let button = $(this);
            let url = button.data('url');
            let card = button.closest('.color-card');

            Swal.fire({
                title: 'Hapus warna?',
                text: "Data tidak bisa dikembalikan",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, hapus',
                cancelButtonText: 'Batal',
                confirmButtonColor: '#dc2626',
                cancelButtonColor: '#6b7280'
            }).then((result) => {

                if (result.isConfirmed) {

                    $.ajax({
                        url: url,
                        type: "DELETE",
                        data: {
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(response) {

                            card.fadeOut(300, function() {
                                $(this).remove();

                                // kalau semua card dalam satu type habis
                                if ($('.color-card').length === 0) {
                                    $('.space-y-8').html(`
                                <div class="text-center text-gray-500 py-10">
                                    Data not found
                                </div>
                            `);
                                }
                            });

                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil!',
                                text: 'Warna berhasil dihapus',
                                timer: 1500,
                                showConfirmButton: false
                            });

                        },
                        error: function() {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal!',
                                text: 'Terjadi kesalahan pada server'
                            });
                        }
                    });
                }

            });
        });
    </script>
@endpush
