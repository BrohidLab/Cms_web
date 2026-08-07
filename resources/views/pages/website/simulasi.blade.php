@extends('components.website.layouts.app')
@section('content')
<div class="py-20">
<div class="max-w-4xl mx-auto bg-white p-8 rounded-2xl shadow-xl">

    <h2 class="text-2xl font-bold mb-6 text-gray-800">
        Simulasi Kredit Mobil
    </h2>

    <!-- INPUT -->
    <div class="grid md:grid-cols-2 gap-4">

        <select id="product" onchange="loadType()" class="border p-2 rounded-lg">
            <option value="">Pilih Mobil</option>
        </select>

        <select id="type" onchange="loadTransmisi()" class="border p-2 rounded-lg">
            <option value="">Pilih Type</option>
        </select>

        <select id="transmisi" class="border p-2 rounded-lg">
            <option value="">Pilih Transmisi</option>
        </select>

        <input type="number" id="dp" placeholder="DP (%)"
            class="border p-2 rounded-lg">

        <select id="asuransi" class="col-span-2 border p-2 rounded-lg">
            <option value="kombinasi">Kombinasi</option>
            <option value="comprehensive">Comprehensive</option>
            <option value="tlo">TLO</option>
        </select>
    </div>

    <button onclick="hitungSimulasi()"
        class="mt-6 w-full bg-blue-600 text-white py-3 rounded-xl font-semibold">
        Hitung Simulasi
    </button>

    <!-- RESULT -->
    <div id="result" class="mt-8 hidden">

        <!-- Info -->
        <div class="mb-4 text-sm text-gray-600">
            Harga: <span id="harga"></span> |
            Uang Muka: <span id="dp_rp"></span>
        </div>

        <!-- Tabs -->
        <div class="flex border-b mb-4">
            <button onclick="switchTab('addb')" id="tab-addb"
                class="px-4 py-2 font-medium border-b-2 border-blue-600 text-blue-600">
                ADDB
            </button>
            <button onclick="switchTab('addm')" id="tab-addm"
                class="px-4 py-2 font-medium text-gray-500">
                ADDM
            </button>
        </div>

        <!-- TABLE -->
        <div class="overflow-x-auto">
            <table class="w-full text-sm border rounded-xl">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="p-3 text-left">Tenor</th>
                        <th class="p-3 text-left">Uang Muka</th>
                        <th class="p-3 text-left">Cicilan</th>
                    </tr>
                </thead>
                <tbody id="tableBody"></tbody>
            </table>
        </div>

    </div>
</div>
</div>
@endsection
@push('script')
<script>
const data = @json($products);
</script>
<script>
window.onload = () => {
    let p = document.getElementById("product");
    data.forEach(x => {
        p.innerHTML += `<option value="${x.id}">${x.name}</option>`;
    });
};

function loadType() {
    let p = data.find(x => x.id == product.value);

    type.innerHTML = `<option>Pilih Type</option>`;
    transmisi.innerHTML = `<option>Pilih Transmisi</option>`;

    p?.types.forEach(t => {
        type.innerHTML += `<option value="${t.id}">${t.name}</option>`;
    });
}

function loadTransmisi() {
    let p = data.find(x => x.id == product.value);
    let t = p?.types.find(x => x.id == type.value);

    transmisi.innerHTML = `<option>Pilih Transmisi</option>`;

    t?.prices.forEach(tr => {
        transmisi.innerHTML += `
            <option value="${tr.price}">
            ${tr.transmition} - Rp ${tr.price.toLocaleString()}
            </option>`;
    });
}
</script>
<script>
let hasilADDB = [];
let hasilADDM = [];

function getAsuransiRate(jenis) {
    if (jenis === "comprehensive") return 0.03;
    if (jenis === "tlo") return 0.01;
    return 0.02;
}

function hitungSimulasi() {
    let harga = parseFloat(transmisi.value);
    let dpPersen = parseFloat(dp.value);
    let asuransi = document.getElementById("asuransi").value;

    let hargaEl = document.getElementById("harga");
    let dpEl = document.getElementById("dp_rp");
    let result = document.getElementById("result");

    let bungaTahunan = 0.1;
    let tenors = [12, 24, 36, 48];

    if (!harga || !dpPersen) {
        alert("Lengkapi data!");
        return;
    }

    let dpValue = harga * (dpPersen / 100);
    let pinjaman = harga - dpValue;

    // asuransi
    let rate = getAsuransiRate(asuransi);
    pinjaman += pinjaman * rate;

    hasilADDB = [];
    hasilADDM = [];

    tenors.forEach(t => {
        // ADDB
        let bungaADDB = pinjaman * bungaTahunan * (t / 12);
        let cicilanADDB = (pinjaman + bungaADDB) / t;

        hasilADDB.push({
            tenor: t,
            dp: dpValue,
            cicilan: cicilanADDB
        });

        // ADDM
        let bungaBulanan = bungaTahunan / 12;
        let cicilanADDM = (pinjaman * bungaBulanan) /
            (1 - Math.pow(1 + bungaBulanan, -t));

        hasilADDM.push({
            tenor: t,
            dp: dpValue,
            cicilan: cicilanADDM
        });
    });

    hargaEl.innerText = "Rp " + harga.toLocaleString();
    dpEl.innerText = "Rp " + Math.round(dpValue).toLocaleString();

    result.classList.remove("hidden");

    switchTab('addb');
}

function switchTab(tab) {
    let tableBody = document.getElementById("tableBody");

    let data = tab === 'addb' ? hasilADDB : hasilADDM;

    // styling tab
    document.getElementById("tab-addb").classList.remove("border-blue-600","text-blue-600");
    document.getElementById("tab-addm").classList.remove("border-blue-600","text-blue-600");

    document.getElementById("tab-addb").classList.add("text-gray-500");
    document.getElementById("tab-addm").classList.add("text-gray-500");

    document.getElementById("tab-" + tab).classList.add("border-b-2","border-blue-600","text-blue-600");

    tableBody.innerHTML = "";

    data.forEach(row => {
        tableBody.innerHTML += `
            <tr class="border-t">
                <td class="p-3">${row.tenor} bulan</td>
                <td class="p-3">Rp ${Math.round(row.dp).toLocaleString()}</td>
                <td class="p-3 text-blue-600 font-semibold">
                    Rp ${Math.round(row.cicilan).toLocaleString()}
                </td>
            </tr>
        `;
    });
}
</script>
@endpush
