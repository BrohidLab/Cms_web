@extends('components.website.layouts.app')

@section('content')
    <x-website.banner title="{{ $banner->title ?? 'Berita' }}" description="{{ $banner->sub_title ?? '' }}"
        image="{{ $banner && $banner->images
            ? asset('storage/' . $banner->images)
            : 'https://suzuki.co.id/themes/default/assets/images/suzuki-default-mobile.jpg' }}"
        :breadcrumbs="[
            ['label' => 'Home', 'url' => '/'],
            ['label' => 'Berita', 'url' => route('website.article.index')],
            ['label' => $article->title],
        ]" />

    <section class="bg-gray-50 py-20  relative z-10">

        <div class="max-w-4xl mx-auto px-6">

            <!-- LABEL -->
            <div class="flex flex-wrap gap-2 mb-4">

                @foreach ($article->labels as $label)
                    <span class="bg-blue-600 text-white text-xs px-3 py-1 rounded-full">

                        {{ $label->name }}

                    </span>
                @endforeach

            </div>


            <!-- META -->

            <div class="text-sm text-gray-400 mb-8">

                {{ $article->created_at->format('d M Y') }}

            </div>


            <!-- IMAGE -->

            @if ($article->image)
                <img src="{{ asset('storage/' . $article->image) }}" class="rounded-xl mb-8 w-full">
            @endif


            <!-- CONTENT -->

            <div class="prose max-w-none">

                {!! $article->content !!}

            </div>


            <!-- SHARE -->

            <div class="mt-12 border-t pt-6">

                <h3 class="font-semibold mb-4">

                    Bagikan Artikel

                </h3>

                <div class="flex gap-3">

                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}"
                        class="px-4 py-2 bg-blue-600 text-white rounded">

                        Facebook

                    </a>

                    <a href="https://twitter.com/intent/tweet?url={{ url()->current() }}"
                        class="px-4 py-2 bg-sky-500 text-white rounded">

                        Twitter

                    </a>

                    <a href="https://wa.me/?text={{ url()->current() }}" class="px-4 py-2 bg-green-500 text-white rounded">

                        WhatsApp

                    </a>

                </div>

            </div>

        </div>


        <!-- RELATED ARTICLE -->

        <div class="max-w-7xl mx-auto px-6 mt-20">

            <h2 class="text-2xl font-semibold mb-10">

                Artikel Terkait

            </h2>

            <div class="grid md:grid-cols-3 gap-8">

                @foreach ($related as $item)
                    <article class="bg-white rounded-xl shadow hover:shadow-lg transition overflow-hidden">

                        <img src="{{ asset('storage/' . $item->thumbnail) }}" class="h-48 w-full object-cover">

                        <div class="p-5">

                            <h3 class="font-semibold mb-2">

                                <a href="{{ route('website.article.show', $item->slug) }}">

                                    {{ $item->title }}

                                </a>

                            </h3>

                            <p class="text-sm text-gray-600 line-clamp-2">

                                {{ $item->excerpt }}

                            </p>

                        </div>

                    </article>
                @endforeach

            </div>

        </div>

    </section>
@endsection
