<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ServiceRegistration;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ServiceRegistrationController extends Controller
{
    public function index()
    {
        return response()->json(ServiceRegistration::latest()->get());
    }

    public function store(Request $request)
    {
        $data = $request->validate(['kendaraan_id'=>'required|exists:kendaraan,id','pelanggan_id'=>'required|exists:pelanggan,id','keluhan'=>'required|string','tanggal_service'=>'required|date']);
        return response()->json([
            'message' => 'Data berhasil ditambahkan',
            'data' => ServiceRegistration::create($data)
        ], 201);
    }

    public function show(ServiceRegistration $serviceRegistration)
    {
        return response()->json($serviceRegistration);
    }

    public function update(Request $request, ServiceRegistration $serviceRegistration)
    {
        $data = $request->validate(['kendaraan_id'=>'sometimes|exists:kendaraan,id','pelanggan_id'=>'sometimes|exists:pelanggan,id','keluhan'=>'sometimes|string','tanggal_service'=>'sometimes|date']);
        $serviceRegistration->update($data);
        return response()->json([
            'message' => 'Data berhasil diperbarui',
            'data' => $serviceRegistration
        ]);
    }

    public function destroy(ServiceRegistration $serviceRegistration)
    {
        $serviceRegistration->delete();
        return response()->json(['message' => 'Data berhasil dihapus']);
    }
}
