<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Pelanggan, Kendaraan, DaftarService, DataService, PembayaranService};

class ServiceApiController extends Controller {
    public function getPelanggan() { return response()->json(['status' => 'success', 'data' => Pelanggan::all()], 200); }
    public function storePelanggan(Request $request) { $data = Pelanggan::create($request->all()); return response()->json(['status' => 'created', 'data' => $data], 201); }
    public function updatePelanggan(Request $request, $id) { $p = Pelanggan::findOrFail($id); $p->update($request->all()); return response()->json(['status' => 'updated', 'data' => $p], 200); }
    public function deletePelanggan($id) { Pelanggan::findOrFail($id)->delete(); return response()->json(['status' => 'deleted'], 200); }

    public function getKendaraan() { return response()->json(Kendaraan::all()); }
    public function storeKendaraan(Request $r) { return response()->json(Kendaraan::create($r->all()), 201); }
    public function updateKendaraan(Request $r, $id) { $k = Kendaraan::findOrFail($id); $k->update($r->all()); return response()->json($k); }
    public function deleteKendaraan($id) { Kendaraan::findOrFail($id)->delete(); return response()->json(['message' => 'Deleted']); }

    public function getDaftarService() { return response()->json(DaftarService::with(['pelanggan', 'kendaraan'])->get()); }
    public function storeDaftarService(Request $r) { return response()->json(DaftarService::create($r->all()), 201); }
    public function updateDaftarService(Request $r, $id) { $d = DaftarService::findOrFail($id); $d->update($r->all()); return response()->json($d); }
    public function deleteDaftarService($id) { DaftarService::findOrFail($id)->delete(); return response()->json(['message' => 'Deleted']); }

    public function getDataService() { return response()->json(DataService::with('daftarService')->get()); }
    public function storeDataService(Request $r) { return response()->json(DataService::create($r->all()), 201); }
    public function updateDataService(Request $r, $id) { $d = DataService::findOrFail($id); $d->update($r->all()); return response()->json($d); }
    public function deleteDataService($id) { DataService::findOrFail($id)->delete(); return response()->json(['message' => 'Deleted']); }

    public function getPembayaran() { return response()->json(PembayaranService::with('daftarService')->get()); }
    public function storePembayaran(Request $r) { return response()->json(PembayaranService::create($r->all()), 201); }
    public function updatePembayaran(Request $r, $id) { $p = PembayaranService::findOrFail($id); $p->update($r->all()); return response()->json($p); }
    public function deletePembayaran($id) { PembayaranService::findOrFail($id)->delete(); return response()->json(['message' => 'Deleted']); }
}
