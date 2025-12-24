<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Pegawai;

class PegawaiSeeder extends Seeder
{
    public function run(): void
    {
        // ===== ADMIN =====
        Pegawai::create([
            'username' => 'admin',
            'password' => Hash::make('admin123'),
            'nik' => 'ADM001',
            'nama_pegawai' => 'Administrator',
            'jenis_kelamin' => 'Laki-laki',
            'jabatan_id' => 1,
            'role' => 'admin',
            'status' => 'aktif',
        ]);

        // ===== PEGAWAI =====
        Pegawai::create([
            'username' => 'pegawai',
            'password' => Hash::make('pegawai123'),
            'nik' => 'PGW001',
            'nama_pegawai' => 'Pegawai User',
            'jenis_kelamin' => 'Perempuan',
            'jabatan_id' => 1,
            'role' => 'pegawai',
            'status' => 'aktif',
        ]);
    }
}
