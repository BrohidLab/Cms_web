@extends('pages.admin.components.layouts.app')

@section('content')
    <main class="p-6 space-y-6 bg-gray-50 min-h-screen">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-semibold text-gray-800">Dashboard</h1>
                <p class="text-sm text-gray-500">Welcome back, Admin 👋</p>
            </div>

            <button class="px-4 py-2 bg-indigo-600 text-white rounded-md text-sm hover:bg-indigo-700 transition">
                Generate Report
            </button>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-5">

            <!-- Card -->
            <div class="bg-white p-5 rounded-xl border border-gray-100 shadow-sm hover:shadow-md transition">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-sm text-gray-500">Total Users</p>
                        <h2 class="text-2xl font-semibold text-gray-800 mt-1">12,540</h2>
                    </div>
                    <span class="material-symbols-outlined text-indigo-500 bg-indigo-50 p-2 rounded-lg">
                        group
                    </span>
                </div>
            </div>

            <div class="bg-white p-5 rounded-xl border border-gray-100 shadow-sm hover:shadow-md transition">
                <p class="text-sm text-gray-500">Revenue</p>
                <h2 class="text-2xl font-semibold text-gray-800 mt-1">$34,200</h2>
            </div>

            <div class="bg-white p-5 rounded-xl border border-gray-100 shadow-sm hover:shadow-md transition">
                <p class="text-sm text-gray-500">Orders</p>
                <h2 class="text-2xl font-semibold text-gray-800 mt-1">1,230</h2>
            </div>

            <div class="bg-white p-5 rounded-xl border border-gray-100 shadow-sm hover:shadow-md transition">
                <p class="text-sm text-gray-500">Conversion</p>
                <h2 class="text-2xl font-semibold text-gray-800 mt-1">4.8%</h2>
            </div>

        </div>
    </main>
@endsection
