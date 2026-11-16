<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ServiceApiController;

Route::get('/pelanggan', [ServiceApiController::class, 'getPelanggan']);
Route::post('/pelanggan', [ServiceApiController::class, 'storePelanggan']);
Route::put('/pelanggan/{id}', [ServiceApiController::class, 'updatePelanggan']);
Route::delete('/pelanggan/{id}', [ServiceApiController::class, 'deletePelanggan']);

Route::get('/kendaraan', [ServiceApiController::class, 'getKendaraan']);
Route::post('/kendaraan', [ServiceApiController::class, 'storeKendaraan']);
Route::put('/kendaraan/{id}', [ServiceApiController::class, 'updateKendaraan']);
Route::delete('/kendaraan/{id}', [ServiceApiController::class, 'deleteKendaraan']);

Route::get('/daftar-service', [ServiceApiController::class, 'getDaftarService']);
Route::post('/daftar-service', [ServiceApiController::class, 'storeDaftarService']);
Route::put('/daftar-service/{id}', [ServiceApiController::class, 'updateDaftarService']);
Route::delete('/daftar-service/{id}', [ServiceApiController::class, 'deleteDaftarService']);

Route::get('/data-service', [ServiceApiController::class, 'getDataService']);
Route::post('/data-service', [ServiceApiController::class, 'storeDataService']);
Route::put('/data-service/{id}', [ServiceApiController::class, 'updateDataService']);
Route::delete('/data-service/{id}', [ServiceApiController::class, 'deleteDataService']);

Route::get('/pembayaran', [ServiceApiController::class, 'getPembayaran']);
Route::post('/pembayaran', [ServiceApiController::class, 'storePembayaran']);
Route::put('/pembayaran/{id}', [ServiceApiController::class, 'updatePembayaran']);
Route::delete('/pembayaran/{id}', [ServiceApiController::class, 'deletePembayaran']);
