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
        Schema::create('pegawai', function (Blueprint $table) {
        $table->id();

        // ===== LOGIN =====
        $table->string('username')->unique();
        $table->string('password');

        // ===== DATA PEGAWAI =====
        $table->string('nik')->unique();
        $table->string('nama_pegawai', 100);
        $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
        $table->string('photo')->nullable();

        // ===== ROLE & STATUS =====
        $table->enum('role', ['admin', 'pegawai'])->default('pegawai');
        $table->enum('status', ['aktif', 'nonaktif'])->default('aktif');

        // ===== RELASI JABATAN =====
        $table->unsignedBigInteger('jabatan_id');
        $table->foreign('jabatan_id')
            ->references('id')
            ->on('jabatan')
            ->onUpdate('cascade')
            ->onDelete('cascade');

        $table->timestamps();
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawai');
    }
};
