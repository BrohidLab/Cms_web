<section class="relative">

    <!-- Banner -->
    <div class="relative w-full h-auto min-h-[120px] overflow-hidden flex items-center justify-center text-center">

        <img src="{{ $image }}" class="relative w-full object-cover" alt="Suzuki Semarang, Suzuki Auto Zone">

        <div class="absolute inset-0 bg-black/20 flex items-center justify-center">

        <div class="relative z-10 text-white px-6 max-w-6xl">

            <h1 class="text-2xl md:text-4xl font-bold mb-2">
                {{ $title }}
            </h1>

            @if ($description)
                <p class="text-sm md:text-md text-gray-200">
                    {{ $description }}
                </p>
            @endif

        </div>
</div>
    </div>


    <!-- Breadcrumb -->
    <div class="bg-white border-b">

        <div class="w-full px-6 md:px-10 lg:px-20 py-4">

            <nav class="flex items-center text-sm text-gray-500 space-x-2">

                @foreach ($breadcrumbs as $breadcrumb)
                    @if (!$loop->first)
                        <span>/</span>
                    @endif

                    @if (isset($breadcrumb['url']))
                        <a href="{{ $breadcrumb['url'] }}" class="hover:text-blue-600 transition">
                            {{ $breadcrumb['label'] }}
                        </a>
                    @else
                        <span class="text-gray-800 font-medium">
                            {{ $breadcrumb['label'] }}
                        </span>
                    @endif
                @endforeach

            </nav>

        </div>

    </div>

</section>
