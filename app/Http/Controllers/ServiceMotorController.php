<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Pelanggan, Kendaraan, DaftarService, DataService, PembayaranService};

class ServiceMotorController extends Controller {
    // 1. MENU DATA PELANGGAN
    public function pelangganIndex() {
        $pelanggans = Pelanggan::latest()->get();
        return view('pelanggan.index', compact('pelanggans'));
    }
    public function pelangganStore(Request $request) {
        $request->validate([
            'id_pelanggan' => 'required|unique:pelanggans',
            'nama_lengkap' => 'required',
            'no_hp' => 'required',
            'alamat_pelanggan' => 'required',
            'pekerjaan' => 'required',
        ]);
        Pelanggan::create($request->all());
        return redirect()->route('pelanggan.index')->with('success', 'Data Pelanggan berhasil disimpan!');
    }
    public function pelangganDestroy($id) {
        Pelanggan::findOrFail($id)->delete();
        return back()->with('success', 'Data Pelanggan dihapus!');
    }

    // 2. MENU DATA KENDARAAN
    public function kendaraanIndex() {
        $kendaraans = Kendaraan::latest()->get();
        return view('kendaraan.index', compact('kendaraans'));
    }
    public function kendaraanStore(Request $request) {
        $request->validate([
            'no_plat' => 'required|unique:kendaraans',
            'jenis_kendaraan' => 'required|in:Matic,Manual Transmisi',
            'no_stnk' => 'required',
            'tahun_pembuatan' => 'required|digits:4',
            'nama_pemilik' => 'required',
            'warna_kendaraan' => 'required',
        ]);
        Kendaraan::create($request->all());
        return redirect()->route('kendaraan.index')->with('success', 'Data Kendaraan berhasil disimpan!');
    }
    public function kendaraanDestroy($id) {
        Kendaraan::findOrFail($id)->delete();
        return back()->with('success', 'Data Kendaraan dihapus!');
    }

    // 3. MENU DAFTAR SERVICE
    public function daftarServiceIndex() {
        $daftarServices = DaftarService::with(['pelanggan', 'kendaraan'])->latest()->get();
        $pelanggans = Pelanggan::all();
        $kendaraans = Kendaraan::all();
        return view('daftar_service.index', compact('daftarServices', 'pelanggans', 'kendaraans'));
    }
    public function daftarServiceStore(Request $request) {
        $request->validate([
            'id_servis_pelanggan' => 'required|unique:daftar_services',
            'no_plat' => 'required|exists:kendaraans,no_plat',
            'id_pelanggan' => 'required|exists:pelanggans,id_pelanggan',
            'keluhan_kendaraan' => 'required',
            'tanggal_servis' => 'required|date',
        ]);
        DaftarService::create($request->all());
        return redirect()->route('daftar-service.index')->with('success', 'Pendaftaran Service berhasil!');
    }
    public function daftarServiceDestroy($id) {
        DaftarService::findOrFail($id)->delete();
        return back()->with('success', 'Daftar Service dihapus!');
    }

    // 4. MENU DATA SERVICE
    public function dataServiceIndex() {
        $dataServices = DataService::with('daftarService.pelanggan')->latest()->get();
        $daftarServices = DaftarService::with('pelanggan')->get();
        return view('data_service.index', compact('dataServices', 'daftarServices'));
    }
    public function dataServiceStore(Request $request) {
        $request->validate([
            'id_servis_pelanggan' => 'required|exists:daftar_services,id_servis_pelanggan',
            'estimasi_service' => 'required',
            'nama_mekanik' => 'required',
            'sparepart_pengganti' => 'required',
        ]);
        DataService::create($request->all());
        return redirect()->route('data-service.index')->with('success', 'Data Pengerjaan Service berhasil disimpan!');
    }
    public function dataServiceDestroy($id) {
        DataService::findOrFail($id)->delete();
        return back()->with('success', 'Data Service dihapus!');
    }

    // 5. MENU PEMBAYARAN SERVICE
    public function pembayaranIndex() {
        $pembayarans = PembayaranService::with('daftarService.pelanggan')->latest()->get();
        $daftarServices = DaftarService::with('pelanggan')->get();
        return view('pembayaran.index', compact('pembayarans', 'daftarServices'));
    }
    public function pembayaranStore(Request $request) {
        $request->validate([
            'id_servis_pelanggan' => 'required|exists:daftar_services,id_servis_pelanggan',
            'jumlah_biaya' => 'required|numeric',
            'jenis_pembayaran' => 'required|in:Cash/Tunai,Non Tunai',
            'keterangan' => 'nullable',
        ]);
        PembayaranService::create($request->all());
        return redirect()->route('pembayaran.index')->with('success', 'Pembayaran Service berhasil dicatat!');
    }
    public function pembayaranDestroy($id) {
        PembayaranService::findOrFail($id)->delete();
        return back()->with('success', 'Data Pembayaran dihapus!');
    }
}
