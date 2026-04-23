<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'nama_pemesan',
        'email',
        'nomor_hp',
        'jenis_layanan',
        'deskripsi',
        'estimasi_waktu',
        'harga',
        'status',
        'tanggal_selesai',
        'catatan_admin',
    ];

    protected $casts = [
        'tanggal_selesai' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public const STATUS_PENDING = 'pending';
    public const STATUS_DIPROSES = 'diproses';
    public const STATUS_SELESAI = 'selesai';
    public const STATUS_DIBATALKAN = 'dibatalkan';

    public static function statuses()
    {
        return [
            self::STATUS_PENDING => 'Pending',
            self::STATUS_DIPROSES => 'Diproses',
            self::STATUS_SELESAI => 'Selesai',
            self::STATUS_DIBATALKAN => 'Dibatalkan',
        ];
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'jenis_layanan', 'nama_layanan');
    }

    public function getStatusLabelAttribute()
    {
        $statuses = self::statuses();
        return $statuses[$this->status] ?? $this->status;
    }
}
