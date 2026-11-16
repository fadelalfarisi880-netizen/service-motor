<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ServiceDetail;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ServiceDetailController extends Controller
{
    public function index()
    {
        return response()->json(ServiceDetail::latest()->get());
    }

    public function store(Request $request)
    {
        $data = $request->validate(['daftar_service_id'=>'required|exists:daftar_service,id','estimasi_service'=>'required|string','nama_mekanik'=>'required|string|max:255','sparepart_pengganti'=>'nullable|string']);
        return response()->json([
            'message' => 'Data berhasil ditambahkan',
            'data' => ServiceDetail::create($data)
        ], 201);
    }

    public function show(ServiceDetail $serviceDetail)
    {
        return response()->json($serviceDetail);
    }

    public function update(Request $request, ServiceDetail $serviceDetail)
    {
        $data = $request->validate(['daftar_service_id'=>'sometimes|exists:daftar_service,id','estimasi_service'=>'sometimes|string','nama_mekanik'=>'sometimes|string|max:255','sparepart_pengganti'=>'nullable|string']);
        $serviceDetail->update($data);
        return response()->json([
            'message' => 'Data berhasil diperbarui',
            'data' => $serviceDetail
        ]);
    }

    public function destroy(ServiceDetail $serviceDetail)
    {
        $serviceDetail->delete();
        return response()->json(['message' => 'Data berhasil dihapus']);
    }
}
