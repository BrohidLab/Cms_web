<!DOCTYPE html>
<html lang="en">

@include('pages.admin.components.layouts.head')

<body class="bg-gray-50">

    <div class="flex min-h-screen">

        @include('pages.admin.components.layouts.sidebar')

        <div class="flex-1 flex flex-col">

            @include('pages.admin.components.layouts.topbar')

            <main class="p-6 flex-1">
                @yield('content')
            </main>

            @include('pages.admin.components.layouts.footer')

        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @stack('script')

</body>

</html>
