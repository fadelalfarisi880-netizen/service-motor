<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
 public function up(): void { Schema::create('daftar_service', function (Blueprint $table) {
  $table->id(); $table->foreignId('kendaraan_id')->constrained('kendaraan')->cascadeOnDelete();
  $table->foreignId('pelanggan_id')->constrained('pelanggan')->cascadeOnDelete();
  $table->text('keluhan'); $table->date('tanggal_service'); $table->timestamps();
 }); }
 public function down(): void { Schema::dropIfExists('daftar_service'); }
};
