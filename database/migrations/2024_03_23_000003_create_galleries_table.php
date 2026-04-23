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
        Schema::create('galleries', function (Blueprint $table) {
            $table->id();
            $table->string('judul', 200);
            $table->longText('deskripsi')->nullable();
            $table->string('gambar_file', 255);
            $table->string('kategori', 50)->default('umum');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();

            // Index untuk performa query
            $table->index('kategori');
            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galleries');
    }
};
