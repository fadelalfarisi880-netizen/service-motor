<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class VehicleController extends Controller
{
    public function index()
    {
        return response()->json(Vehicle::latest()->get());
    }

    public function store(Request $request)
    {
        $data = $request->validate(['no_plat'=>'required|string|max:20|unique:kendaraan,no_plat','jenis_kendaraan'=>['required',Rule::in(['Matic','Manual Transmisi'])],'no_stnk'=>'required|string|max:50|unique:kendaraan,no_stnk','tahun_pembuatan'=>'required|integer|min:1950|max:'.(date('Y')+1),'nama_pemilik'=>'required|string|max:255','warna'=>'required|string|max:100']);
        return response()->json([
            'message' => 'Data berhasil ditambahkan',
            'data' => Vehicle::create($data)
        ], 201);
    }

    public function show(Vehicle $vehicle)
    {
        return response()->json($vehicle);
    }

    public function update(Request $request, Vehicle $vehicle)
    {
        $data = $request->validate(['no_plat'=>'sometimes|string|max:20|unique:kendaraan,no_plat','jenis_kendaraan'=>['sometimes',Rule::in(['Matic','Manual Transmisi'])],'no_stnk'=>'sometimes|string|max:50|unique:kendaraan,no_stnk','tahun_pembuatan'=>'sometimes|integer|min:1950|max:'.(date('Y')+1),'nama_pemilik'=>'sometimes|string|max:255','warna'=>'sometimes|string|max:100']);
        $vehicle->update($data);
        return response()->json([
            'message' => 'Data berhasil diperbarui',
            'data' => $vehicle
        ]);
    }

    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();
        return response()->json(['message' => 'Data berhasil dihapus']);
    }
}
