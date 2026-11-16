@extends('layouts.app')
@section('content')
<div class="mb-6">
    <h2 class="text-2xl font-bold text-slate-800">Data Kendaraan</h2>
    <p class="text-slate-500 text-sm">Kelola spesifikasi unit motor pelanggan.</p>
</div>
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200 h-fit">
        <h3 class="font-bold text-lg mb-4 text-slate-800 border-b pb-2">Input Data Kendaraan</h3>
        <form action="{{ route('kendaraan.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-semibold mb-1">No Plat Kendaraan</label>
                <input type="text" name="no_plat" placeholder="Contoh: BL 1234 AB" required class="w-full px-3.5 py-2 border border-slate-300 rounded-xl focus:ring-2 focus:ring-amber-500 focus:outline-none uppercase">
            </div>
            <div>
                <label class="block text-sm font-semibold mb-2">Jenis Kendaraan</label>
                <div class="grid grid-cols-2 gap-3">
                    <label class="flex items-center gap-2 p-3 border border-slate-200 rounded-xl cursor-pointer hover:bg-amber-50">
                        <input type="radio" name="jenis_kendaraan" value="Matic" required class="text-amber-500 focus:ring-amber-500">
                        <span class="text-sm font-medium">Matic</span>
                    </label>
                    <label class="flex items-center gap-2 p-3 border border-slate-200 rounded-xl cursor-pointer hover:bg-amber-50">
                        <input type="radio" name="jenis_kendaraan" value="Manual Transmisi" required class="text-amber-500 focus:ring-amber-500">
                        <span class="text-sm font-medium">Manual Transmisi</span>
                    </label>
                </div>
            </div>
            <div>
                <label class="block text-sm font-semibold mb-1">No STNK</label>
                <input type="text" name="no_stnk" placeholder="Nomor STNK" required class="w-full px-3.5 py-2 border border-slate-300 rounded-xl focus:ring-2 focus:ring-amber-500 focus:outline-none">
            </div>
            <div class="grid grid-cols-2 gap-3">
                <div>
                    <label class="block text-sm font-semibold mb-1">Tahun Pembuatan</label>
                    <input type="number" name="tahun_pembuatan" placeholder="2023" required class="w-full px-3.5 py-2 border border-slate-300 rounded-xl focus:ring-2 focus:ring-amber-500 focus:outline-none">
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-1">Warna Kendaraan</label>
                    <input type="text" name="warna_kendaraan" placeholder="Hitam / Merah" required class="w-full px-3.5 py-2 border border-slate-300 rounded-xl focus:ring-2 focus:ring-amber-500 focus:outline-none">
                </div>
            </div>
            <div>
                <label class="block text-sm font-semibold mb-1">Nama Pemilik</label>
                <input type="text" name="nama_pemilik" placeholder="Nama sesuai STNK" required class="w-full px-3.5 py-2 border border-slate-300 rounded-xl focus:ring-2 focus:ring-amber-500 focus:outline-none">
            </div>
            <button type="submit" class="w-full bg-slate-900 hover:bg-slate-800 text-amber-400 font-semibold py-2.5 rounded-xl transition shadow-md">
                <i class="fa-solid fa-save mr-2"></i>Simpan Kendaraan
            </button>
        </form>
    </div>
    <div class="lg:col-span-2 bg-white p-6 rounded-2xl shadow-sm border border-slate-200">
        <h3 class="font-bold text-lg mb-4 text-slate-800 border-b pb-2">Daftar Kendaraan</h3>
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 text-slate-600 text-xs uppercase border-b">
                        <th class="p-3">No Plat</th>
                        <th class="p-3">Jenis</th>
                        <th class="p-3">No STNK</th>
                        <th class="p-3">Tahun / Warna</th>
                        <th class="p-3">Pemilik</th>
                        <th class="p-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-sm">
                    @forelse($kendaraans as $k)
                    <tr class="hover:bg-slate-50">
                        <td class="p-3 font-bold text-slate-800">{{ $k->no_plat }}</td>
                        <td class="p-3"><span class="px-2.5 py-1 rounded-full text-xs font-semibold {{ $k->jenis_kendaraan == 'Matic' ? 'bg-blue-100 text-blue-700' : 'bg-purple-100 text-purple-700' }}">{{ $k->jenis_kendaraan }}</span></td>
                        <td class="p-3">{{ $k->no_stnk }}</td>
                        <td class="p-3">{{ $k->tahun_pembuatan }} • {{ $k->warna_kendaraan }}</td>
                        <td class="p-3 font-medium">{{ $k->nama_pemilik }}</td>
                        <td class="p-3 text-center">
                            <form action="{{ route('kendaraan.destroy', $k->no_plat) }}" method="POST" onsubmit="return confirm('Hapus kendaraan ini?')">
                                @csrf @method('DELETE')
                                <button class="text-rose-500 hover:text-rose-700"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="6" class="p-6 text-center text-slate-400">Belum ada data kendaraan.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
