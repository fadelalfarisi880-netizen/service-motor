<?php
namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Vehicle;
use App\Models\ServiceRegistration;
use App\Models\ServiceDetail;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class WorkshopController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'customers' => Customer::latest()->get(),
            'vehicles' => Vehicle::latest()->get(),
            'registrations' => ServiceRegistration::with(['customer','vehicle'])->latest()->get(),
            'details' => ServiceDetail::with('registration.customer')->latest()->get(),
            'payments' => Payment::with('registration.customer')->latest()->get(),
        ]);
    }

    public function storeCustomer(Request $request)
    {
        $data = $request->validate([
            'nama_lengkap'=>'required|string|max:255','no_hp'=>'required|string|max:25',
            'alamat'=>'required|string','pekerjaan'=>'required|string|max:255'
        ]);
        Customer::create($data);
        return back()->with('success','Data pelanggan berhasil disimpan.');
    }

    public function storeVehicle(Request $request)
    {
        $data = $request->validate([
            'no_plat'=>'required|string|max:20|unique:kendaraan,no_plat',
            'jenis_kendaraan'=>['required',Rule::in(['Matic','Manual Transmisi'])],
            'no_stnk'=>'required|string|max:50|unique:kendaraan,no_stnk',
            'tahun_pembuatan'=>'required|integer|min:1950|max:'.(date('Y')+1),
            'nama_pemilik'=>'required|string|max:255','warna'=>'required|string|max:100'
        ]);
        Vehicle::create($data);
        return back()->with('success','Data kendaraan berhasil disimpan.');
    }

    public function storeRegistration(Request $request)
    {
        $data = $request->validate([
            'kendaraan_id'=>'required|exists:kendaraan,id','pelanggan_id'=>'required|exists:pelanggan,id',
            'keluhan'=>'required|string','tanggal_service'=>'required|date'
        ]);
        ServiceRegistration::create($data);
        return back()->with('success','Daftar service berhasil disimpan.');
    }

    public function storeServiceDetail(Request $request)
    {
        $data = $request->validate([
            'daftar_service_id'=>'required|exists:daftar_service,id',
            'estimasi_service'=>'required|string','nama_mekanik'=>'required|string|max:255',
            'sparepart_pengganti'=>'nullable|string'
        ]);
        ServiceDetail::create($data);
        return back()->with('success','Data service berhasil disimpan.');
    }

    public function storePayment(Request $request)
    {
        $data = $request->validate([
            'daftar_service_id'=>'required|exists:daftar_service,id',
            'jumlah_biaya'=>'required|integer|min:0',
            'jenis_pembayaran'=>['required',Rule::in(['Cash','Non Tunai'])],
            'keterangan'=>'nullable|string'
        ]);
        Payment::create($data);
        return back()->with('success','Pembayaran berhasil disimpan.');
    }

    public function destroy(string $type, int $id)
    {
        $models = [
            'pelanggan'=>Customer::class, 'kendaraan'=>Vehicle::class,
            'daftar-service'=>ServiceRegistration::class, 'data-service'=>ServiceDetail::class,
            'pembayaran'=>Payment::class
        ];
        abort_unless(isset($models[$type]),404);
        $models[$type]::findOrFail($id)->delete();
        return back()->with('success','Data berhasil dihapus.');
    }
}
