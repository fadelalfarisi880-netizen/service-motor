<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vehicle extends Model {
    protected $table = 'kendaraan';
    protected $fillable = ['no_plat','jenis_kendaraan','no_stnk','tahun_pembuatan','nama_pemilik','warna'];
    public function serviceRegistrations(): HasMany { return $this->hasMany(ServiceRegistration::class, 'kendaraan_id'); }
}
