@extends('layouts.app')
@section('content')
<div class="mb-6">
    <h2 class="text-2xl font-bold text-slate-800">Pembayaran Service</h2>
    <p class="text-slate-500 text-sm">Pencatatan transaksi pembayaran biaya perbaikan motor.</p>
</div>
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200 h-fit">
        <h3 class="font-bold text-lg mb-4 text-slate-800 border-b pb-2">Form Pembayaran</h3>
        <form action="{{ route('pembayaran.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-semibold mb-1">ID Servis Pelanggan</label>
                <select name="id_servis_pelanggan" required class="w-full px-3.5 py-2 border border-slate-300 rounded-xl focus:ring-2 focus:ring-amber-500 focus:outline-none bg-white">
                    <option value="">-- Pilih ID Servis --</option>
                    @foreach($daftarServices as $ds)
                        <option value="{{ $ds->id_servis_pelanggan }}">
                            {{ $ds->id_servis_pelanggan }} - {{ $ds->pelanggan->nama_lengkap ?? '' }} ({{ $ds->no_plat }})
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-sm font-semibold mb-1">Jumlah Biaya Servis (Rp)</label>
                <input type="number" name="jumlah_biaya" placeholder="Contoh: 150000" required class="w-full px-3.5 py-2 border border-slate-300 rounded-xl focus:ring-2 focus:ring-amber-500 focus:outline-none">
            </div>
            <div>
                <label class="block text-sm font-semibold mb-2">Jenis Pembayaran</label>
                <div class="grid grid-cols-2 gap-3">
                    <label class="flex items-center gap-2 p-3 border border-slate-200 rounded-xl cursor-pointer hover:bg-amber-50">
                        <input type="radio" name="jenis_pembayaran" value="Cash/Tunai" required class="text-amber-500 focus:ring-amber-500">
                        <span class="text-sm font-medium">Cash/Tunai</span>
                    </label>
                    <label class="flex items-center gap-2 p-3 border border-slate-200 rounded-xl cursor-pointer hover:bg-amber-50">
                        <input type="radio" name="jenis_pembayaran" value="Non Tunai" required class="text-amber-500 focus:ring-amber-500">
                        <span class="text-sm font-medium">Non Tunai</span>
                    </label>
                </div>
            </div>
            <div>
                <label class="block text-sm font-semibold mb-1">Keterangan</label>
                <textarea name="keterangan" rows="2" placeholder="Catatan tambahan / Lunas" class="w-full px-3.5 py-2 border border-slate-300 rounded-xl focus:ring-2 focus:ring-amber-500 focus:outline-none"></textarea>
            </div>
            <button type="submit" class="w-full bg-slate-900 hover:bg-slate-800 text-amber-400 font-semibold py-2.5 rounded-xl transition shadow-md">
                <i class="fa-solid fa-receipt mr-2"></i>Proses Pembayaran
            </button>
        </form>
    </div>
    <div class="lg:col-span-2 bg-white p-6 rounded-2xl shadow-sm border border-slate-200">
        <h3 class="font-bold text-lg mb-4 text-slate-800 border-b pb-2">Riwayat Pembayaran</h3>
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 text-slate-600 text-xs uppercase border-b">
                        <th class="p-3">ID Servis</th>
                        <th class="p-3">Pelanggan</th>
                        <th class="p-3">Jumlah Biaya</th>
                        <th class="p-3">Metode</th>
                        <th class="p-3">Keterangan</th>
                        <th class="p-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-sm">
                    @forelse($pembayarans as $pb)
                    <tr class="hover:bg-slate-50">
                        <td class="p-3 font-bold text-amber-600">{{ $pb->id_servis_pelanggan }}</td>
                        <td class="p-3">{{ $pb->daftarService->pelanggan->nama_lengkap ?? '-' }}</td>
                        <td class="p-3 font-bold text-emerald-600">Rp {{ number_format($pb->jumlah_biaya, 0, ',', '.') }}</td>
                        <td class="p-3"><span class="px-2.5 py-1 rounded-full text-xs font-semibold {{ $pb->jenis_pembayaran == 'Cash/Tunai' ? 'bg-emerald-100 text-emerald-700' : 'bg-indigo-100 text-indigo-700' }}">{{ $pb->jenis_pembayaran }}</span></td>
                        <td class="p-3 text-slate-500">{{ $pb->keterangan ?? '-' }}</td>
                        <td class="p-3 text-center">
                            <form action="{{ route('pembayaran.destroy', $pb->id) }}" method="POST" onsubmit="return confirm('Hapus data pembayaran ini?')">
                                @csrf @method('DELETE')
                                <button class="text-rose-500 hover:text-rose-700"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="6" class="p-6 text-center text-slate-400">Belum ada transaksi pembayaran.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
