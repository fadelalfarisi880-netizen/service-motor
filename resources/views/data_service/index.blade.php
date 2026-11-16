@extends('layouts.app')
@section('content')
<div class="mb-6">
    <h2 class="text-2xl font-bold text-slate-800">Data Service</h2>
    <p class="text-slate-500 text-sm">Input tindakan mekanik, estimasi waktu, dan penggantian sparepart.</p>
</div>
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200 h-fit">
        <h3 class="font-bold text-lg mb-4 text-slate-800 border-b pb-2">Input Data Pengerjaan</h3>
        <form action="{{ route('data-service.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-semibold mb-1">ID Servis Pelanggan</label>
                <select name="id_servis_pelanggan" id="select_id_servis" required class="w-full px-3.5 py-2 border border-slate-300 rounded-xl focus:ring-2 focus:ring-amber-500 focus:outline-none bg-white">
                    <option value="" data-keluhan="">-- Pilih ID Servis --</option>
                    @foreach($daftarServices as $ds)
                        <option value="{{ $ds->id_servis_pelanggan }}" data-keluhan="{{ $ds->keluhan_kendaraan }}">
                            {{ $ds->id_servis_pelanggan }} ({{ $ds->no_plat }} - {{ $ds->pelanggan->nama_lengkap ?? '' }})
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-sm font-semibold mb-1">Keluhan Kendaraan (Otomatis)</label>
                <textarea id="auto_keluhan" rows="2" readonly placeholder="Muncul otomatis setelah ID Servis dipilih" class="w-full px-3.5 py-2 border border-slate-200 bg-slate-100 text-slate-700 font-medium rounded-xl cursor-not-allowed"></textarea>
            </div>
            <div>
                <label class="block text-sm font-semibold mb-1">Estimasi Service</label>
                <input type="text" name="estimasi_service" placeholder="Contoh: 2 Jam / Selesai Hari Ini" required class="w-full px-3.5 py-2 border border-slate-300 rounded-xl focus:ring-2 focus:ring-amber-500 focus:outline-none">
            </div>
            <div>
                <label class="block text-sm font-semibold mb-1">Nama Mekanik</label>
                <input type="text" name="nama_mekanik" placeholder="Nama teknisi yang menangani" required class="w-full px-3.5 py-2 border border-slate-300 rounded-xl focus:ring-2 focus:ring-amber-500 focus:outline-none">
            </div>
            <div>
                <label class="block text-sm font-semibold mb-1">Sparepart Pengganti</label>
                <input type="text" name="sparepart_pengganti" placeholder="Contoh: Oli MPX2, Kampas Rem Depan" required class="w-full px-3.5 py-2 border border-slate-300 rounded-xl focus:ring-2 focus:ring-amber-500 focus:outline-none">
            </div>
            <button type="submit" class="w-full bg-slate-900 hover:bg-slate-800 text-amber-400 font-semibold py-2.5 rounded-xl transition shadow-md">
                <i class="fa-solid fa-wrench mr-2"></i>Simpan Data Service
            </button>
        </form>
    </div>
    <div class="lg:col-span-2 bg-white p-6 rounded-2xl shadow-sm border border-slate-200">
        <h3 class="font-bold text-lg mb-4 text-slate-800 border-b pb-2">Riwayat Pengerjaan Service</h3>
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 text-slate-600 text-xs uppercase border-b">
                        <th class="p-3">ID Servis</th>
                        <th class="p-3">Keluhan</th>
                        <th class="p-3">Estimasi</th>
                        <th class="p-3">Mekanik</th>
                        <th class="p-3">Sparepart</th>
                        <th class="p-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-sm">
                    @forelse($dataServices as $d)
                    <tr class="hover:bg-slate-50">
                        <td class="p-3 font-bold text-amber-600">{{ $d->id_servis_pelanggan }}</td>
                        <td class="p-3 text-slate-600">{{ $d->daftarService->keluhan_kendaraan ?? '-' }}</td>
                        <td class="p-3">{{ $d->estimasi_service }}</td>
                        <td class="p-3 font-medium">{{ $d->nama_mekanik }}</td>
                        <td class="p-3">{{ $d->sparepart_pengganti }}</td>
                        <td class="p-3 text-center">
                            <form action="{{ route('data-service.destroy', $d->id) }}" method="POST" onsubmit="return confirm('Hapus data service ini?')">
                                @csrf @method('DELETE')
                                <button class="text-rose-500 hover:text-rose-700"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="6" class="p-6 text-center text-slate-400">Belum ada data pengerjaan service.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    document.getElementById('select_id_servis').addEventListener('change', function() {
        const selectedOption = this.options[this.selectedIndex];
        document.getElementById('auto_keluhan').value = selectedOption.getAttribute('data-keluhan') || '';
    });
</script>
@endsection
