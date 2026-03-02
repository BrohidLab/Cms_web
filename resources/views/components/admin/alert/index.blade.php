@if (session('success'))
    <div id="toast-success"
        class="fixed top-6 right-6 bg-green-600 text-white px-6 py-4 rounded-2xl shadow-xl z-50 transition opacity-0 translate-y-4">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div id="toast-error"
        class="fixed top-6 right-6 bg-red-600 text-white px-6 py-4 rounded-2xl shadow-xl z-50 transition opacity-0 translate-y-4">
        {{ session('error') }}
    </div>
@endif