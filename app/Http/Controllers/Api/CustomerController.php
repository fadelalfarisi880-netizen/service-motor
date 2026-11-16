<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CustomerController extends Controller
{
    public function index()
    {
        return response()->json(Customer::latest()->get());
    }

    public function store(Request $request)
    {
        $data = $request->validate(['nama_lengkap'=>'required|string|max:255','no_hp'=>'required|string|max:25','alamat'=>'required|string','pekerjaan'=>'required|string|max:255']);
        return response()->json([
            'message' => 'Data berhasil ditambahkan',
            'data' => Customer::create($data)
        ], 201);
    }

    public function show(Customer $customer)
    {
        return response()->json($customer);
    }

    public function update(Request $request, Customer $customer)
    {
        $data = $request->validate(['nama_lengkap'=>'sometimes|string|max:255','no_hp'=>'sometimes|string|max:25','alamat'=>'sometimes|string','pekerjaan'=>'sometimes|string|max:255']);
        $customer->update($data);
        return response()->json([
            'message' => 'Data berhasil diperbarui',
            'data' => $customer
        ]);
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        return response()->json(['message' => 'Data berhasil dihapus']);
    }
}
