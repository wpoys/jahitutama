<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('services')->insert([
            [
                'nama_layanan' => 'Jahitan Jas',
                'deskripsi' => 'Pembuatan jas custom dengan kualitas premium. Tersedia dalam berbagai pilihan kain berkualitas tinggi dan desain yang dapat disesuaikan dengan preferensi Anda.',
                'harga_mulai' => 500000,
                'estimasi_hari' => 7,
                'gambar' => 'jas.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_layanan' => 'Kebaya',
                'deskripsi' => 'Desain kebaya tradisional dan modern dengan bordir tangan atau mesin. Kami menawarkan berbagai pilihan warna dan motif yang elegan.',
                'harga_mulai' => 300000,
                'estimasi_hari' => 5,
                'gambar' => 'kebaya.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_layanan' => 'Seragam',
                'deskripsi' => 'Penjahitan seragam kantor, sekolah, dan organisasi dengan standar kualitas tinggi. Bisa custom dengan logo dan desain khusus.',
                'harga_mulai' => 150000,
                'estimasi_hari' => 3,
                'gambar' => 'seragam.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_layanan' => 'Gamis',
                'deskripsi' => 'Gamis casual hingga formal dengan berbagai model dan ukuran. Bahan berkualitas dengan jahitan yang rapi dan presisi.',
                'harga_mulai' => 200000,
                'estimasi_hari' => 4,
                'gambar' => 'gamis.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_layanan' => 'Permak',
                'deskripsi' => 'Perbaikan dan modifikasi pakaian lama Anda. Termasuk memperpendek, memperlebar, merubah model, dan perbaikan kerusakan lainnya.',
                'harga_mulai' => 50000,
                'estimasi_hari' => 2,
                'gambar' => 'permak.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
