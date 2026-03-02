<!DOCTYPE html>
<html lang="en">

@include('pages.admin.components.layouts.head')

<body class="bg-gray-50">

    <div class="flex min-h-screen">

        @include('pages.admin.components.layouts.sidebar')

        <div class="flex-1 flex flex-col">

            @include('pages.admin.components.layouts.topbar')

            <main class="p-6 flex-1">
                @include('components.admin.alert.index')
                @yield('content')
            </main>

            @include('pages.admin.components.layouts.footer')

        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            const successToast = document.getElementById("toast-success");
            const errorToast = document.getElementById("toast-error");

            function showToast(toast) {
                if (!toast) return;

                setTimeout(() => {
                    toast.classList.remove("opacity-0", "translate-y-4");
                }, 100);

                setTimeout(() => {
                    toast.classList.add("opacity-0", "translate-y-4");
                }, 3000);
            }

            showToast(successToast);
            showToast(errorToast);

        });
    </script>
    @stack('script')

</body>

</html>
