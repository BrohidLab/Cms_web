@extends('pages.admin.components.layouts.app')

@section('content')
<div class="p-6">

    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Manajemen Artikel</h1>
            <p class="text-sm text-gray-500">Kelola semua artikel website</p>
        </div>

        <a href="{{ route('article.create') }}"
           class="flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow">
            <span class="material-symbols-outlined text-lg">add</span>
            Tambah Artikel
        </a>
    </div>

    <!-- Card -->
    <div class="bg-white rounded-xl shadow-md overflow-hidden">

        <!-- Search & Filter -->
        <div class="p-4 border-b flex justify-between items-center">
            <form method="GET" class="w-1/3">
                <input type="text" name="search"
                       value="{{ request('search') }}"
                       placeholder="Cari artikel..."
                       class="w-full border rounded-lg px-4 py-2 text-sm focus:ring focus:ring-blue-200 focus:outline-none">
            </form>

            <div class="text-sm text-gray-500">
                Total: {{ $articles->total() }} Artikel
            </div>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="bg-gray-100 text-gray-600 uppercase text-xs">
                    <tr>
                        <th class="px-6 py-3">#</th>
                        <th class="px-6 py-3">Thumbnail</th>
                        <th class="px-6 py-3">Judul</th>
                        <th class="px-6 py-3">Label</th>
                        <th class="px-6 py-3">Status</th>
                        <th class="px-6 py-3">Tanggal</th>
                        <th class="px-6 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y">

                    @forelse ($articles as $article)
                        <tr class="hover:bg-gray-50 transition">

                            <td class="px-6 py-4">
                                {{ $loop->iteration }}
                            </td>

                            <td class="px-6 py-4">
                                @if($article->thumbnail)
                                    <img src="{{ asset('storage/'.$article->thumbnail) }}"
                                         class="w-14 h-14 object-cover rounded-lg">
                                @else
                                    <div class="w-14 h-14 bg-gray-200 rounded-lg flex items-center justify-center text-gray-400">
                                        <span class="material-symbols-outlined">image</span>
                                    </div>
                                @endif
                            </td>

                            <td class="px-6 py-4">
                                <div class="font-semibold text-gray-800">
                                    {{ $article->title }}
                                </div>
                                <div class="text-xs text-gray-500">
                                    {{ $article->slug }}
                                </div>
                            </td>

                            <td class="px-6 py-4">
                                @foreach($article->labels as $label)
                                    <span class="bg-blue-100 text-blue-600 px-2 py-1 rounded-full text-xs mr-1">
                                        {{ $label->name }}
                                    </span>
                                @endforeach
                            </td>

                            <td class="px-6 py-4">
                                @if($article->status == 'publish')
                                    <span class="bg-green-100 text-green-600 px-2 py-1 rounded-full text-xs">
                                        Publish
                                    </span>
                                @else
                                    <span class="bg-yellow-100 text-yellow-600 px-2 py-1 rounded-full text-xs">
                                        Draft
                                    </span>
                                @endif
                            </td>

                            <td class="px-6 py-4 text-gray-500">
                                {{ $article->created_at->format('d M Y') }}
                            </td>

                            <td class="px-6 py-4">
                                <div class="flex justify-center gap-3">

                                    <!-- Edit -->
                                    <a href="{{ route('article.edit', $article->id) }}"
                                       class="text-blue-600 hover:text-blue-800">
                                        <span class="material-symbols-outlined text-lg">edit</span>
                                    </a>

                                    <!-- Delete -->
                                    <form action="{{ route('article.destroy', $article->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Yakin hapus artikel?')">
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
                                Belum ada artikel.
                            </td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="p-4 border-t">
            {{ $articles->links() }}
        </div>

    </div>

</div>
@endsection
