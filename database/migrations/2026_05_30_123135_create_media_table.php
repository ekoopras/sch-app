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
        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->string('file_name'); // Nama asli file (misal: brosur.jpg)
            $table->string('file_path'); // Alamat penyimpanan file (misal: media/brosur_123.webp)
            $table->string('file_hash')->unique(); // Sidik jari unik file (MD5) untuk anti-duplikasi
            $table->string('mime_type')->nullable(); // Tipe file (image/webp)
            $table->integer('file_size')->nullable(); // Ukuran file dalam KB
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media');
    }
};
