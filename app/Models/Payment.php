<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model {
    protected $table = 'pembayaran_service';
    protected $fillable = ['daftar_service_id','jumlah_biaya','jenis_pembayaran','keterangan'];
    public function registration(): BelongsTo { return $this->belongsTo(ServiceRegistration::class, 'daftar_service_id'); }
}
