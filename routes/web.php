<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceMotorController;

Route::get('/', fn() => redirect()->route('pelanggan.index'));

Route::prefix('pelanggan')->name('pelanggan.')->group(function () {
    Route::get('/', [ServiceMotorController::class, 'pelangganIndex'])->name('index');
    Route::post('/', [ServiceMotorController::class, 'pelangganStore'])->name('store');
    Route::delete('/{id}', [ServiceMotorController::class, 'pelangganDestroy'])->name('destroy');
});

Route::prefix('kendaraan')->name('kendaraan.')->group(function () {
    Route::get('/', [ServiceMotorController::class, 'kendaraanIndex'])->name('index');
    Route::post('/', [ServiceMotorController::class, 'kendaraanStore'])->name('store');
    Route::delete('/{id}', [ServiceMotorController::class, 'kendaraanDestroy'])->name('destroy');
});

Route::prefix('daftar-service')->name('daftar-service.')->group(function () {
    Route::get('/', [ServiceMotorController::class, 'daftarServiceIndex'])->name('index');
    Route::post('/', [ServiceMotorController::class, 'daftarServiceStore'])->name('store');
    Route::delete('/{id}', [ServiceMotorController::class, 'daftarServiceDestroy'])->name('destroy');
});

Route::prefix('data-service')->name('data-service.')->group(function () {
    Route::get('/', [ServiceMotorController::class, 'dataServiceIndex'])->name('index');
    Route::post('/', [ServiceMotorController::class, 'dataServiceStore'])->name('store');
    Route::delete('/{id}', [ServiceMotorController::class, 'dataServiceDestroy'])->name('destroy');
});

Route::prefix('pembayaran')->name('pembayaran.')->group(function () {
    Route::get('/', [ServiceMotorController::class, 'pembayaranIndex'])->name('index');
    Route::post('/', [ServiceMotorController::class, 'pembayaranStore'])->name('store');
    Route::delete('/{id}', [ServiceMotorController::class, 'pembayaranDestroy'])->name('destroy');
});
