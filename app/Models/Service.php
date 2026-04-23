<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory;

    protected $table = 'services';

    protected $fillable = [
        'nama_layanan',
        'deskripsi',
        'harga_mulai',
        'estimasi_hari',
        'gambar',
    ];

    protected $casts = [
        'harga_mulai' => 'decimal:2',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class, 'jenis_layanan', 'nama_layanan');
    }

    public function getPriceFormattedAttribute()
    {
        return 'Rp ' . number_format($this->harga_mulai, 0, ',', '.');
    }

    public function getEstimasiFormattedAttribute()
    {
        return $this->estimasi_hari . ' hari';
    }
}
