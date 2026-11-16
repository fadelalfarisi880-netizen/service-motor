@extends('layouts.app')
@section('content')
<div class="mb-6">
    <h2 class="text-2xl font-bold text-slate-800">Daftar Service</h2>
    <p class="text-slate-500 text-sm">Pendaftaran antrean dan keluhan kendaraan pelanggan.</p>
</div>
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200 h-fit">
        <h3 class="font-bold text-lg mb-4 text-slate-800 border-b pb-2">Form Pendaftaran Service</h3>
        <form action="{{ route('daftar-service.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-semibold mb-1">ID Servis Pelanggan</label>
                <input type="text" name="id_servis_pelanggan" placeholder="Contoh: SRV-001" required class="w-full px-3.5 py-2 border border-slate-300 rounded-xl focus:ring-2 focus:ring-amber-500 focus:outline-none">
            </div>
            <div>
                <label class="block text-sm font-semibold mb-1">No Plat Kendaraan</label>
                <select name="no_plat" required class="w-full px-3.5 py-2 border border-slate-300 rounded-xl focus:ring-2 focus:ring-amber-500 focus:outline-none bg-white">
                    <option value="">-- Pilih No Plat --</option>
                    @foreach($kendaraans as $k)
                        <option value="{{ $k->no_plat }}">{{ $k->no_plat }} ({{ $k->jenis_kendaraan }} - {{ $k->nama_pemilik }})</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-sm font-semibold mb-1">ID Pelanggan</label>
                <select name="id_pelanggan" id="select_id_pelanggan" required class="w-full px-3.5 py-2 border border-slate-300 rounded-xl focus:ring-2 focus:ring-amber-500 focus:outline-none bg-white">
                    <option value="" data-nama="">-- Pilih ID Pelanggan --</option>
                    @foreach($pelanggans as $p)
                        <option value="{{ $p->id_pelanggan }}" data-nama="{{ $p->nama_lengkap }}">{{ $p->id_pelanggan }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-sm font-semibold mb-1">Nama Pelanggan (Otomatis)</label>
                <input type="text" id="auto_nama_pelanggan" readonly placeholder="Muncul otomatis setelah ID dipilih" class="w-full px-3.5 py-2 border border-slate-200 bg-slate-100 text-slate-700 font-semibold rounded-xl cursor-not-allowed">
            </div>
            <div>
                <label class="block text-sm font-semibold mb-1">Keluhan Kendaraan</label>
                <textarea name="keluhan_kendaraan" rows="2" placeholder="Jelaskan keluhan motor" required class="w-full px-3.5 py-2 border border-slate-300 rounded-xl focus:ring-2 focus:ring-amber-500 focus:outline-none"></textarea>
            </div>
            <div>
                <label class="block text-sm font-semibold mb-1">Tanggal Servis</label>
                <input type="date" name="tanggal_servis" value="{{ date('Y-m-d') }}" required class="w-full px-3.5 py-2 border border-slate-300 rounded-xl focus:ring-2 focus:ring-amber-500 focus:outline-none">
            </div>
            <button type="submit" class="w-full bg-slate-900 hover:bg-slate-800 text-amber-400 font-semibold py-2.5 rounded-xl transition shadow-md">
                <i class="fa-solid fa-plus-circle mr-2"></i>Daftarkan Service
            </button>
        </form>
    </div>
    <div class="lg:col-span-2 bg-white p-6 rounded-2xl shadow-sm border border-slate-200">
        <h3 class="font-bold text-lg mb-4 text-slate-800 border-b pb-2">Antrean Daftar Service</h3>
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 text-slate-600 text-xs uppercase border-b">
                        <th class="p-3">ID Servis</th>
                        <th class="p-3">No Plat</th>
                        <th class="p-3">Pelanggan</th>
                        <th class="p-3">Keluhan</th>
                        <th class="p-3">Tanggal</th>
                        <th class="p-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-sm">
                    @forelse($daftarServices as $ds)
                    <tr class="hover:bg-slate-50">
                        <td class="p-3 font-bold text-amber-600">{{ $ds->id_servis_pelanggan }}</td>
                        <td class="p-3 font-semibold">{{ $ds->no_plat }}</td>
                        <td class="p-3">{{ $ds->id_pelanggan }} - {{ $ds->pelanggan->nama_lengkap ?? '-' }}</td>
                        <td class="p-3 text-slate-600">{{ $ds->keluhan_kendaraan }}</td>
                        <td class="p-3">{{ $ds->tanggal_servis }}</td>
                        <td class="p-3 text-center">
                            <form action="{{ route('daftar-service.destroy', $ds->id_servis_pelanggan) }}" method="POST" onsubmit="return confirm('Hapus antrean ini?')">
                                @csrf @method('DELETE')
                                <button class="text-rose-500 hover:text-rose-700"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="6" class="p-6 text-center text-slate-400">Belum ada pendaftaran service.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    document.getElementById('select_id_pelanggan').addEventListener('change', function() {
        const selectedOption = this.options[this.selectedIndex];
        document.getElementById('auto_nama_pelanggan').value = selectedOption.getAttribute('data-nama') || '';
    });
</script>
@endsection
