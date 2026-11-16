<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PaymentController extends Controller
{
    public function index()
    {
        return response()->json(Payment::latest()->get());
    }

    public function store(Request $request)
    {
        $data = $request->validate(['daftar_service_id'=>'required|exists:daftar_service,id','jumlah_biaya'=>'required|integer|min:0','jenis_pembayaran'=>['required',Rule::in(['Cash','Non Tunai'])],'keterangan'=>'nullable|string']);
        return response()->json([
            'message' => 'Data berhasil ditambahkan',
            'data' => Payment::create($data)
        ], 201);
    }

    public function show(Payment $payment)
    {
        return response()->json($payment);
    }

    public function update(Request $request, Payment $payment)
    {
        $data = $request->validate(['daftar_service_id'=>'sometimes|exists:daftar_service,id','jumlah_biaya'=>'sometimes|integer|min:0','jenis_pembayaran'=>['sometimes',Rule::in(['Cash','Non Tunai'])],'keterangan'=>'nullable|string']);
        $payment->update($data);
        return response()->json([
            'message' => 'Data berhasil diperbarui',
            'data' => $payment
        ]);
    }

    public function destroy(Payment $payment)
    {
        $payment->delete();
        return response()->json(['message' => 'Data berhasil dihapus']);
    }
}
