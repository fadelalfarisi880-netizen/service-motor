<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ServiceDetail extends Model {
    protected $table = 'data_service';
    protected $fillable = ['daftar_service_id','estimasi_service','nama_mekanik','sparepart_pengganti'];
    public function registration(): BelongsTo { return $this->belongsTo(ServiceRegistration::class, 'daftar_service_id'); }
}
