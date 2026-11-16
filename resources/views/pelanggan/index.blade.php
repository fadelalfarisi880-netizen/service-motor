@extends('layouts.app')
@section('content')
<div class="mb-6">
    <h2 class="text-2xl font-bold text-slate-800">Data Pelanggan</h2>
    <p class="text-slate-500 text-sm">Kelola informasi pelanggan bengkel motor.</p>
</div>
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200 h-fit">
        <h3 class="font-bold text-lg mb-4 text-slate-800 border-b pb-2">Tambah Pelanggan</h3>
        <form action="{{ route('pelanggan.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-semibold mb-1">ID Pelanggan</label>
                <input type="text" name="id_pelanggan" placeholder="Contoh: PLG-001" required class="w-full px-3.5 py-2 border border-slate-300 rounded-xl focus:ring-2 focus:ring-amber-500 focus:outline-none">
            </div>
            <div>
                <label class="block text-sm font-semibold mb-1">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" placeholder="Masukkan nama lengkap" required class="w-full px-3.5 py-2 border border-slate-300 rounded-xl focus:ring-2 focus:ring-amber-500 focus:outline-none">
            </div>
            <div>
                <label class="block text-sm font-semibold mb-1">No HP</label>
                <input type="text" name="no_hp" placeholder="08xxxxxxxxxx" required class="w-full px-3.5 py-2 border border-slate-300 rounded-xl focus:ring-2 focus:ring-amber-500 focus:outline-none">
            </div>
            <div>
                <label class="block text-sm font-semibold mb-1">Alamat Pelanggan</label>
                <textarea name="alamat_pelanggan" rows="2" placeholder="Alamat lengkap" required class="w-full px-3.5 py-2 border border-slate-300 rounded-xl focus:ring-2 focus:ring-amber-500 focus:outline-none"></textarea>
            </div>
            <div>
                <label class="block text-sm font-semibold mb-1">Pekerjaan</label>
                <input type="text" name="pekerjaan" placeholder="Contoh: Mahasiswa / Karyawan" required class="w-full px-3.5 py-2 border border-slate-300 rounded-xl focus:ring-2 focus:ring-amber-500 focus:outline-none">
            </div>
            <button type="submit" class="w-full bg-slate-900 hover:bg-slate-800 text-amber-400 font-semibold py-2.5 rounded-xl transition shadow-md">
                <i class="fa-solid fa-save mr-2"></i>Simpan Data Pelanggan
            </button>
        </form>
    </div>
    <div class="lg:col-span-2 bg-white p-6 rounded-2xl shadow-sm border border-slate-200">
        <h3 class="font-bold text-lg mb-4 text-slate-800 border-b pb-2">Daftar Pelanggan Terdaftar</h3>
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 text-slate-600 text-xs uppercase border-b">
                        <th class="p-3">ID</th>
                        <th class="p-3">Nama Lengkap</th>
                        <th class="p-3">No HP</th>
                        <th class="p-3">Pekerjaan</th>
                        <th class="p-3">Alamat</th>
                        <th class="p-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-sm">
                    @forelse($pelanggans as $p)
                    <tr class="hover:bg-slate-50">
                        <td class="p-3 font-bold text-amber-600">{{ $p->id_pelanggan }}</td>
                        <td class="p-3 font-medium">{{ $p->nama_lengkap }}</td>
                        <td class="p-3">{{ $p->no_hp }}</td>
                        <td class="p-3">{{ $p->pekerjaan }}</td>
                        <td class="p-3 text-slate-500">{{ $p->alamat_pelanggan }}</td>
                        <td class="p-3 text-center">
                            <form action="{{ route('pelanggan.destroy', $p->id_pelanggan) }}" method="POST" onsubmit="return confirm('Hapus pelanggan ini?')">
                                @csrf @method('DELETE')
                                <button class="text-rose-500 hover:text-rose-700"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="6" class="p-6 text-center text-slate-400">Belum ada data pelanggan.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
