<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ServiceRegistration extends Model {
    protected $table = 'daftar_service';
    protected $fillable = ['kendaraan_id','pelanggan_id','keluhan','tanggal_service'];
    protected $casts = ['tanggal_service' => 'date'];
    public function customer(): BelongsTo { return $this->belongsTo(Customer::class, 'pelanggan_id'); }
    public function vehicle(): BelongsTo { return $this->belongsTo(Vehicle::class, 'kendaraan_id'); }
    public function serviceDetails(): HasMany { return $this->hasMany(ServiceDetail::class, 'daftar_service_id'); }
    public function payments(): HasMany { return $this->hasMany(Payment::class, 'daftar_service_id'); }
}
