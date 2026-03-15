@extends('components.website.layouts.app')

@section('content')
    <x-website.banner title="{{ $banner->title ?? 'Berita Terbaru' }}" description="{{ $banner->sub_title ?? '' }}"
        image="{{ $banner && $banner->images
            ? asset('storage/' . $banner->images)
            : 'https://suzuki.co.id/themes/default/assets/images/suzuki-default-mobile.jpg' }}"
        :breadcrumbs="[['label' => 'Home', 'url' => '/'], ['label' => 'Berita']]" />

    <section class="bg-gray-50 py-10 relative z-10">

        <div class="max-w-7xl mx-auto px-6">


            <!-- HEADER + SEARCH -->

            <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-12 gap-4">

                <h2 class="text-3xl font-bold text-gray-800">
                    Berita Terbaru
                </h2>

                <form method="GET" class="w-full md:w-80">

                    <input type="text" name="search" placeholder="Cari artikel..."
                        class="w-full bg-white border border-gray-200 rounded-xl px-5 py-3 focus:ring-2 focus:ring-blue-500 outline-none">

                </form>

            </div>



            <!-- GRID ARTICLE -->

            <div class="grid md:grid-cols-3 lg:grid-cols-4 gap-5">

                @foreach ($articles as $article)
                    <article
                        class="group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition duration-300">

                        <!-- IMAGE -->

                        <div class="relative overflow-hidden">

                            <img src="{{ asset('storage/' . $article->thumbnail) }}"
                                class="w-full h-56 object-cover group-hover:scale-105 transition duration-300">

                            <!-- LABEL -->

                            <div class="absolute top-4 left-4 flex flex-wrap gap-2">

                                @foreach ($article->labels as $label)
                                    <span class="bg-black/70 text-white text-xs px-3 py-1 rounded-full backdrop-blur">

                                        {{ $label->name }}

                                    </span>
                                @endforeach

                            </div>

                        </div>


                        <!-- CONTENT -->

                        <div class="p-6">

                            <div class="text-xs text-gray-400 mb-2">

                                {{ $article->created_at->format('d M Y') }}

                            </div>


                            <h3
                                class="text-lg font-semibold text-gray-800 mb-3 leading-snug group-hover:text-blue-600 transition">

                                <a href="{{ route('website.article.show', $article->slug) }}">

                                    {{ $article->title }}

                                </a>

                            </h3>


                            <p class="text-gray-600 text-sm line-clamp-3 mb-4">

                                {{ $article->excerpt }}

                            </p>


                            <a href="{{ route('website.article.show', $article->slug) }}"
                                class="text-sm font-semibold text-blue-600 hover:underline">

                                Baca Selengkapnya →

                            </a>

                        </div>

                    </article>
                @endforeach

            </div>



            <!-- PAGINATION -->

            <div class="mt-16">

                {{ $articles->links() }}

            </div>


        </div>
    </section>
@endsection
