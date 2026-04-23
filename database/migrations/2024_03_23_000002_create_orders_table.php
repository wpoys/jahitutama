<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pemesan', 100);
            $table->string('email', 100);
            $table->string('nomor_hp', 20);
            $table->string('jenis_layanan', 100);
            $table->longText('deskripsi');
            $table->string('estimasi_waktu', 50)->nullable();
            $table->decimal('harga', 10, 2)->nullable();
            $table->enum('status', ['pending', 'diproses', 'selesai', 'dibatalkan'])->default('pending');
            $table->dateTime('tanggal_selesai')->nullable();
            $table->longText('catatan_admin')->nullable();
            $table->timestamps();

            // Index untuk performa query
            $table->index('status');
            $table->index('email');
            $table->index('jenis_layanan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
