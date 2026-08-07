@extends('components.website.layouts.app')

@section('content')
    <x-website.banner title="{{ $banner->title ?? 'Service' }}" description="{{ $banner->sub_title ?? '' }}"
        image="{{ $banner && $banner->images
            ? asset('storage/' . $banner->images)
            : 'https://suzuki.co.id/themes/default/assets/images/suzuki-default-mobile.jpg' }}"
        :breadcrumbs="[['label' => 'Home', 'url' => '/'], ['label' => 'Service']]" />

    <section class="py-16 bg-gray-50">
        <div class="max-w-6xl mx-auto px-4">

            <!-- Tab Menu -->
            <div class="flex justify-center mb-10 border-b">
                <button class="tab-btn px-6 py-3 text-sm font-medium border-b-2 border-blue-600 text-blue-600"
                    data-tab="jadwal">
                    Jadwal Service
                </button>

                <button class="tab-btn px-6 py-3 text-sm font-medium text-gray-500" data-tab="pedoman">
                    Pedoman Service
                </button>

                <button class="tab-btn px-6 py-3 text-sm font-medium text-gray-500" data-tab="jaminan">
                    Jaminan Service
                </button>
            </div>

            <!-- TAB 1 JADWAL SERVICE -->
            <div class="tab-content" id="jadwal">

                <section class="bg-gray-50">
                  <div class="max-w-6xl mx-auto px-4">
                
                    <!-- NOTE / ALERT -->
                    <div class="mb-6 p-5 rounded-xl bg-yellow-50 border border-yellow-200 shadow-sm">
                      <h2 class="text-lg font-semibold text-yellow-800 mb-1">
                        ⚠️ Perhatian Sebelum Booking
                      </h2>
                      <p class="text-sm text-yellow-700 leading-relaxed">
                        Sebelum melakukan booking service, mohon untuk menghubungi Customer Service atau Sales terlebih dahulu 
                        guna memastikan ketersediaan jadwal booking service.
                      </p>
                    </div>
                
                    <!-- CARD FORM -->
                    <div class="bg-white rounded-2xl shadow-lg p-8">
                
                      <h1 class="text-2xl font-bold text-gray-800 mb-6">
                        Booking Service Kendaraan
                      </h1>
                
                      <form action="{{route('website.booking')}}" method="POST" class="space-y-5">
                		@csrf
                		@method('POST')
                        <!-- Nama -->
                        <div>
                          <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                          <input type="text" name="name"
                            class="w-full px-4 py-3 border rounded-xl focus:ring-2 focus:ring-blue-500 focus:outline-none transition"
                            placeholder="Masukkan nama lengkap" required>
                        </div>
                
                        <!-- Email -->
                        <div>
                          <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                          <input type="email" name="email"
                            class="w-full px-4 py-3 border rounded-xl focus:ring-2 focus:ring-blue-500 focus:outline-none transition"
                            placeholder="Masukkan email" required>
                        </div>
                
                        <!-- No WA -->
                        <div>
                          <label class="block text-sm font-medium text-gray-700 mb-1">No WhatsApp</label>
                          <input type="text" name="no_wa"
                            class="w-full px-4 py-3 border rounded-xl focus:ring-2 focus:ring-blue-500 focus:outline-none transition"
                            placeholder="Contoh: 08123456789" required>
                        </div>
                
                        <!-- Alamat -->
                        <div>
                          <label class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
                          <textarea name="address" rows="3"
                            class="w-full px-4 py-3 border rounded-xl focus:ring-2 focus:ring-blue-500 focus:outline-none transition"
                            placeholder="Masukkan alamat lengkap" required></textarea>
                        </div>
                
                        <!-- Jenis Mobil -->
                        <div>
                          <label class="block text-sm font-medium text-gray-700 mb-1">Jenis Mobil</label>
                          <select name="type_car" required
                            class="w-full px-4 py-3 border rounded-xl focus:ring-2 focus:ring-blue-500 focus:outline-none transition">
                            <option value="">Pilih jenis mobil</option>
                            @foreach($products as $item)
                            <option>{{$item->name}}</option>
                            @endforeach
                          </select>
                        </div>
                
                        <!-- Keluhan -->
                        <div>
                          <label class="block text-sm font-medium text-gray-700 mb-1">Keluhan</label>
                          <textarea name="complaint" rows="4" required
                            class="w-full px-4 py-3 border rounded-xl focus:ring-2 focus:ring-blue-500 focus:outline-none transition"
                            placeholder="Jelaskan keluhan kendaraan anda"></textarea>
                        </div>
                
                        <!-- BUTTON -->
                        <div>
                          <button type="submit"
                            class="w-full bg-blue-600 text-white py-3 rounded-xl font-semibold hover:bg-blue-700 transition shadow-md">
                            Kirim Booking
                          </button>
                        </div>
                
                      </form>
                      @if(session('success'))
						<div>
						    <h2 class="text-lg font-semibold text-green-800">
						      Booking Berhasil!
						    </h2>
						    <p class="text-sm text-green-700">
						      {{ session('success') }}
						    </p>
						  </div>
						
						</div>
                      @elseif(session('error'))
						<div>
						    <h2 class="text-lg font-semibold text-red-800">
						      
						    </h2>
						    <p class="text-sm text-green-700">
						      {{ session('success') }}
						    </p>
						  </div>
						
						</div>
                      @endif
                    </div>
                
                  </div>
                </section>

            </div>

            <!-- TAB 2 PEDOMAN -->
            <div class="tab-content hidden" id="pedoman">

                <div class="bg-white p-8 rounded-xl shadow-sm">

                    <h2 class="text-xl font-semibold mb-4">Pedoman Service</h2>

                    <ul class="space-y-3 text-gray-600">
                        <li>• Pastikan kendaraan datang sesuai jadwal booking.</li>
                        <li>• Bawa dokumen kendaraan.</li>
                        <li>• Pastikan tangki bahan bakar cukup.</li>
                        <li>• Informasikan keluhan kendaraan secara detail.</li>
                    </ul>

                </div>

            </div>

            <!-- TAB 3 JAMINAN -->
            <div class="tab-content hidden" id="jaminan">

                <div class="bg-white p-8 rounded-xl shadow-sm">

                    <h2 class="text-xl font-semibold mb-4">Jaminan Service</h2>

                    <ul class="space-y-3 text-gray-600">
                        <li>✔ Garansi pengerjaan hingga 30 hari</li>
                        <li>✔ Teknisi profesional</li>
                        <li>✔ Sparepart original</li>
                        <li>✔ Pemeriksaan kendaraan gratis</li>
                    </ul>

                </div>

            </div>

        </div>
    </section>
@endsection

@push('script')
    <script>
        const tabs = document.querySelectorAll(".tab-btn");
        const contents = document.querySelectorAll(".tab-content");

        tabs.forEach(tab => {

            tab.addEventListener("click", () => {

                const target = tab.dataset.tab;

                contents.forEach(c => c.classList.add("hidden"));
                document.getElementById(target).classList.remove("hidden");

                tabs.forEach(t => {
                    t.classList.remove("border-blue-600", "text-blue-600", "border-b-2");
                    t.classList.add("text-gray-500");
                });

                tab.classList.add("border-blue-600", "text-blue-600", "border-b-2");
                tab.classList.remove("text-gray-500");

            });

        });
    </script>
@endpush
