<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-site-verification" content="0UiH68VYJgPDUtDXvpBW91k9jMr0HRlKeaZ2QkTRJuM" />
    <title>@yield('title', 'Suzuki Auto Zone')</title>
    <meta name="description" content="@yield('meta_description', 'Deskripsi default')">
    <meta name="keywords" content="@yield('meta_keywords', 'keyword default')">
    <meta name="facebook-domain-verification" content="31v1t4641ue9523mxdpiz3uqxgpgyl" />
    <link rel="icon" href={{ asset('storage/' . profileWeb()?->logo) }} type="image/x-icon">
    <link rel="shortcut icon" href={{ asset('storage/' . profileWeb()?->logo) }} type="image/x-icon">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    @if (config('meta.pixel_id'))
        <script>
            ! function(f, b, e, v, n, t, s) {
                if (f.fbq) return;
                n = f.fbq = function() {
                    n.callMethod ?
                        n.callMethod.apply(n, arguments) :
                        n.queue.push(arguments)
                };

                if (!f._fbq) f._fbq = n;

                n.push = n;

                n.loaded = true;

                n.version = '2.0';

                n.queue = [];

                t = b.createElement(e);

                t.async = true;

                t.src = v;

                s = b.getElementsByTagName(e)[0];

                s.parentNode.insertBefore(t, s);

            }(window, document, 'script',
                'https://connect.facebook.net/en_US/fbevents.js');

            fbq('init', '{{ config('meta.pixel_id') }}');

            fbq('track', 'PageView');
        </script>

        <noscript>
            <img height="1" width="1" style="display:none"
                src="https://www.facebook.com/tr?id={{ config('meta.pixel_id') }}&ev=PageView&noscript=1" />
        </noscript>
    @endif

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-18097535665"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'AW-18097535665');
    </script>

    <script src="https://cdn.tailwindcss.com"></script>
    @stack('style')
    <style>
        * {
            font-family: 'Poppins';
        }
    </style>

</head>

<body>
    <div class="bg-gray-100">
        @include('components.website.layouts.partials.header')
        <div class="fixed top-1/2 right-6 -translate-y-1/2 z-50 flex flex-col items-end space-y-3">
            <button id="fabToggle" aria-label="button-toggle-action"
                class="w-12 h-12 bg-blue-500 text-white rounded-full shadow-xl flex items-center justify-center text-2xl hover:rotate-90 transition">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>

            </button>

            <!-- Menu Items -->
            <div id="fabMenu" class="block flex-col items-end space-y-3 mb-2">

                <a href="{{ route('meta_wa', profileWeb()->no_wa) }}" onclick="fbq('track', 'Lead');"
                    class="group relative flex items-center justify-center w-12 h-12 bg-green-500 text-white rounded-full shadow-lg hover:scale-110 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M8.625 12a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H12m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 0 1-2.555-.337A5.972 5.972 0 0 1 5.41 20.97a5.969 5.969 0 0 1-.474-.065 4.48 4.48 0 0 0 .978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25Z" />
                    </svg>
                    <span
                        class="absolute right-14 opacity-0 group-hover:opacity-100 bg-gray-400 text-white text-xs px-2 py-1 rounded transition">
                        WhatsApp
                    </span>
                </a>

                <a href="{{ route('meta_wa', profileWeb()->no_wa) }}" onclick="fbq('track', 'Lead');"
                    class="group relative flex items-center justify-center w-12 h-12 bg-blue-500 text-white rounded-full shadow-lg hover:scale-110 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                    </svg>
                    <span
                        class="absolute right-14 opacity-0 group-hover:opacity-100 bg-gray-400 text-white text-xs px-2 py-1 rounded transition">
                        Kontak Sales
                    </span>
                </a>

                <a href="{{ route('meta_wa', profileWeb()->no_wa) }}" onclick="fbq('track', 'Lead');"
                    class="group relative flex items-center justify-center w-12 h-12 bg-yellow-500 text-white rounded-full shadow-lg hover:scale-110 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M8.25 18.75a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 0 1-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 0 0-3.213-9.193 2.056 2.056 0 0 0-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 0 0-10.026 0 1.106 1.106 0 0 0-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" />
                    </svg>
                    <span
                        class="absolute right-14 opacity-0 group-hover:opacity-100 bg-gray-400 text-white text-xs px-2 py-1 rounded transition">
                        Test Drive
                    </span>
                </a>

                <a href="{{ route('website.simulasi') }}"
                    class="group relative flex items-center justify-center w-12 h-12 bg-purple-500 text-white rounded-full shadow-lg hover:scale-110 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 15.75V18m-7.5-6.75h.008v.008H8.25v-.008Zm0 2.25h.008v.008H8.25V13.5Zm0 2.25h.008v.008H8.25v-.008Zm0 2.25h.008v.008H8.25V18Zm2.498-6.75h.007v.008h-.007v-.008Zm0 2.25h.007v.008h-.007V13.5Zm0 2.25h.007v.008h-.007v-.008Zm0 2.25h.007v.008h-.007V18Zm2.504-6.75h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V13.5Zm0 2.25h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V18Zm2.498-6.75h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V13.5ZM8.25 6h7.5v2.25h-7.5V6ZM12 2.25c-1.892 0-3.758.11-5.593.322C5.307 2.7 4.5 3.65 4.5 4.757V19.5a2.25 2.25 0 0 0 2.25 2.25h10.5a2.25 2.25 0 0 0 2.25-2.25V4.757c0-1.108-.806-2.057-1.907-2.185A48.507 48.507 0 0 0 12 2.25Z" />
                    </svg>
                    <span
                        class="absolute right-14 opacity-0 group-hover:opacity-100 bg-gray-400 text-white text-xs px-2 py-1 rounded transition">
                        Simulasi
                    </span>
                </a>

                <a href="{{ route('website.service') }}"
                    class="group relative flex items-center justify-center w-12 h-12 bg-red-500 text-white rounded-full shadow-lg hover:scale-110 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M11.42 15.17 17.25 21A2.652 2.652 0 0 0 21 17.25l-5.877-5.877M11.42 15.17l2.496-3.03c.317-.384.74-.626 1.208-.766M11.42 15.17l-4.655 5.653a2.548 2.548 0 1 1-3.586-3.586l6.837-5.63m5.108-.233c.55-.164 1.163-.188 1.743-.14a4.5 4.5 0 0 0 4.486-6.336l-3.276 3.277a3.004 3.004 0 0 1-2.25-2.25l3.276-3.276a4.5 4.5 0 0 0-6.336 4.486c.091 1.076-.071 2.264-.904 2.95l-.102.085m-1.745 1.437L5.909 7.5H4.5L2.25 3.75l1.5-1.5L7.5 4.5v1.409l4.26 4.26m-1.745 1.437 1.745-1.437m6.615 8.206L15.75 15.75M4.867 19.125h.008v.008h-.008v-.008Z" />
                    </svg>
                    <span
                        class="absolute right-14 opacity-0 group-hover:opacity-100 bg-gray-400 text-white text-xs px-2 py-1 rounded transition">
                        Booking Service
                    </span>
                </a>

            </div>

            <!-- Toggle Button -->


        </div>
        <button id="backToTop" aria-label="button-back-top"
            class="fixed bottom-6 right-6 z-50 hidden w-10 h-10 bg-blue-300 text-white rounded-full shadow-lg flex items-center justify-center hover:scale-110 transition">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 18.75 7.5-7.5 7.5 7.5" />
                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 7.5-7.5 7.5 7.5" />
            </svg>

        </button>
        @yield('content')
    </div>
    @include('components.website.layouts.partials.footer')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @stack('script')

    <script>
        const backToTop = document.getElementById("backToTop");

        window.addEventListener("scroll", () => {
            if (window.scrollY > 300) {
                backToTop.classList.remove("hidden");
                backToTop.classList.add("opacity-100");
            } else {
                backToTop.classList.add("hidden");
                backToTop.classList.remove("opacity-100");
            }
        });

        backToTop.addEventListener("click", () => {
            window.scrollTo({
                top: 0,
                behavior: "smooth"
            });
        });
    </script>
    <script>
        const fabToggle = document.getElementById('fabToggle');
        const fabMenu = document.getElementById('fabMenu');

        fabToggle.addEventListener('click', () => {
            fabMenu.classList.toggle('hidden');
        });
    </script>

</body>

</html>
