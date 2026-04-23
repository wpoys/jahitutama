<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Gallery extends Model
{
    use HasFactory;

    protected $table = 'galleries';

    protected $fillable = [
        'judul',
        'deskripsi',
        'gambar_file',
        'kategori',
        'user_id',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public const KATEGORI_JAS = 'jas';
    public const KATEGORI_KEBAYA = 'kebaya';
    public const KATEGORI_SERAGAM = 'seragam';
    public const KATEGORI_GAMIS = 'gamis';
    public const KATEGORI_PERMAK = 'permak';
    public const KATEGORI_UMUM = 'umum';

    public static function categories()
    {
        return [
            self::KATEGORI_JAS => 'Jas',
            self::KATEGORI_KEBAYA => 'Kebaya',
            self::KATEGORI_SERAGAM => 'Seragam',
            self::KATEGORI_GAMIS => 'Gamis',
            self::KATEGORI_PERMAK => 'Permak',
            self::KATEGORI_UMUM => 'Umum',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getImageUrlAttribute()
    {
        return asset('storage/galleries/' . $this->gambar_file);
    }
}
