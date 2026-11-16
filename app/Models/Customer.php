<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model {
    protected $table = 'pelanggan';
    protected $fillable = ['nama_lengkap','no_hp','alamat','pekerjaan'];
    public function serviceRegistrations(): HasMany { return $this->hasMany(ServiceRegistration::class, 'pelanggan_id'); }
}
