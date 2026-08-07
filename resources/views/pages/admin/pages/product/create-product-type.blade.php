@extends('pages.admin.components.layouts.app')


@section('content')
    <div class="max-w-6xl mx-auto space-y-6">

        <div>
            <h1 class="text-3xl font-semibold text-gray-800">Tambah Product</h1>
            <p class="text-gray-500">Tambah produk mobil baru</p>
        </div>



        <div class="bg-white rounded-2xl shadow border border-gray-100 p-8 space-y-10">

            <div>
                <h2 class="text-lg font-semibold mb-6 text-gray-800">Type Product</h2>
                <form action="{{ route('product.store_product_type') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="grid gap-6">

                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-1">Type Name</label>
                            <input type="hidden" name="product_id" value="{{ $product->id }}" />
                            <input type="text" name="name"
                                class="w-full border border-gray-300 rounded-xl px-4 py-2.5 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        
                        <div class="">
                            <div class="w-full py-2 pb-5 border-b border-gray-400 flex items-center justify-end">
                                <button type="submit" class="bg-green-600 text-sm px-5 py-2 text-white rounded-md">
                                    Tambah Type
                                </button>
                            </div>


                            <div class="w-full overflow-hidden">
                                <div class="border-b py-6 border-gray-200">
                                    <h2 class="text-md md:text-lg font-semibold text-gray-800">
                                        Type List
                                    </h2>
                                </div>

                                <div class="overflow-x-auto">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th
                                                    class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">
                                                    Name</th>
                                                
                                                <th
                                                    class="px-6 py-3 text-center text-xs font-semibold text-gray-500 uppercase">
                                                    Action</th>
                                            </tr>
                                        </thead>

                                        <tbody class="bg-white divide-y divide-gray-100" id="type-table-body">

                                            @forelse ($typeProduct as $type)
                                                <tr id="row-{{ $type->id }}" class="hover:bg-gray-50 transition">
                                                    <td class="px-6 py-4 text-sm font-medium text-gray-800">
                                                        {{ $type->name }}
                                                    </td>
                                                    <td class="px-6 py-4 text-center">
                                                        <button type="button"
                                                            data-url="{{ route('product.delete_product_type', $type->id) }}"
                                                            class="btn-delete bg-red-500 hover:bg-red-600 text-white text-xs font-semibold px-4 py-2 rounded-lg transition">
                                                            Delete
                                                        </button>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr id="empty-row">
                                                    <td colspan="4" class="px-6 py-6 text-center text-gray-500">
                                                        Data not found
                                                    </td>
                                                </tr>
                                            @endforelse

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="flex justify-end mt-6 gap-3">
                <a href="{{ route('product.create', $product->id) }}"
                    class="bg-gray-200 hover:bg-gray-400 disabled:bg-gray-400 disabled:cursor-not-allowed text-md px-6 py-2 flex items-center rounded-sm shadow transition">
                    <span class="material-symbols-outlined">
                        chevron_left
                    </span>
                    Kembali
                </a>
                <a href="{{ route('product.create_product_color', $product->id) }}" id="btn-next"
                    {{ $typeProduct->count() == 0 ? 'disabled' : '' }}
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
        $(document).on('click', '.btn-delete', function() {

            let button = $(this);
            let url = button.data('url');

            Swal.fire({
                title: 'Hapus data?',
                text: "Data tidak bisa dikembalikan",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, hapus',
                cancelButtonText: 'Batal',
                confirmButtonColor: '#dc2626',
                cancelButtonColor: '#6b7280'
            }).then((result) => {

                if (result.isConfirmed) {

                    // disable button + loading
                    button.prop('disabled', true);
                    button.html('Deleting...');

                    $.ajax({
                        url: url,
                        type: "DELETE",
                        data: {
                            _token: "{{ csrf_token() }}"
                        },
                        beforeSend: function() {
                            Swal.showLoading();
                        },

                        success: function(response) {

                            // Hapus row
                            button.closest('tr').fadeOut(300, function() {
                                $(this).remove();
                            });

                            // Toast Success
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 2500,
                                timerProgressBar: true,
                            });

                            Toast.fire({
                                icon: 'success',
                                title: 'Data berhasil dihapus'
                            });

                        },

                        error: function(xhr) {

                            let errorMessage = 'Terjadi kesalahan pada server';

                            if (xhr.responseJSON) {

                                // kalau ada message langsung
                                if (xhr.responseJSON.message) {
                                    errorMessage = xhr.responseJSON.message;
                                }

                                // kalau validation error
                                else if (xhr.responseJSON.errors) {
                                    errorMessage = Object.values(xhr.responseJSON.errors)
                                        .flat()
                                        .join('<br>');
                                }
                            }

                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal!',
                                html: errorMessage
                            });

                            button.prop('disabled', false);
                            button.html('Delete');
                        }
                    });

                }

            });

        });
    </script>
@endpush
