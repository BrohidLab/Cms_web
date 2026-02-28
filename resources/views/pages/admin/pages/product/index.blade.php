@extends('pages.admin.components.layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto">

        <!-- Header -->
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-2xl font-semibold text-gray-800">
                    Product Management
                </h1>
                <p class="text-sm text-gray-500">
                    Kelola semua data product dengan mudah
                </p>
            </div>

            <a href="{{ route('product.create') }}"
                class="bg-blue-600 hover:bg-blue-700 gap-2 flex items-center text-white text-sm font-semibold px-6 py-2 rounded-md shadow-md hover:shadow-lg transition">
                <span class="material-symbols-outlined text-sm">
                    add
                </span>
                Tambah Product
            </a>
        </div>

        <!-- Grid -->
        <div class="grid md:grid-cols-3 gap-6">

            @forelse($products as $product)
                <div
                    class="bg-white rounded-2xl shadow-sm hover:shadow-xl transition duration-300 border border-gray-100 p-6">
                    <a href="{{ route('product.create', $product->id) }}">
                        <!-- Title -->
                        <div class="flex justify-between items-start mb-4">
                            <h2 class="text-lg font-semibold text-gray-800">
                                {{ $product->name }}
                            </h2>

                            <span
                                class="text-xs px-3 py-1 rounded-full 
                    {{ $product->status !== 'draf' ? 'bg-green-100 text-green-600' : 'bg-red-100 text-red-600' }}">
                                {{ $product->status === 'draf' ? 'Draf' : 'Publish' }}
                            </span>
                        </div>

                        <!-- Price -->
                        <p class="text-xl font-bold text-blue-600 mb-3">
                            Rp {{ number_format($product->price, 0, ',', '.') }}
                        </p>

                        <!-- Description -->
                        <p class="text-sm text-gray-500 line-clamp-3">
                            {!! Str::limit(strip_tags($product->description), 120) !!}
                        </p>

                        <!-- Footer -->
                        <div class="flex justify-between items-center mt-6 pt-4 border-t border-gray-100">

                            <span class="text-xs text-gray-400">
                                {{ $product->created_at->format('d M Y') }}
                            </span>

                            <div class="flex gap-3">

                                <form action="{{ route('product.create', $product->id) }}" method="POST"
                                    class="form-delete">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="text-red-500 hover:text-red-700 text-sm font-medium">
                                        <span class="material-symbols-outlined text-md">
                                            delete
                                        </span>
                                    </button>
                                </form>

                            </div>

                        </div>
                    </a>
                </div>
            @empty
                <div class="col-span-3 text-center text-gray-400 py-16">
                    Belum ada product tersedia.
                </div>
            @endforelse

        </div>

        <!-- Pagination -->
        <div class="mt-10">
            {{ $products->links() }}
        </div>

    </div>
@endsection
@push('script')
    <script>
        $(document).on('submit', '.form-delete', function(e) {

            e.preventDefault();

            let form = this;

            Swal.fire({
                title: 'Yakin hapus product?',
                text: "Data tidak bisa dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc2626',
                cancelButtonColor: '#6b7280',
                confirmButtonText: 'Ya, hapus',
                cancelButtonText: 'Batal'
            }).then((result) => {

                if (result.isConfirmed) {
                    form.submit();
                }

            });

        });
    </script>
@endpush
