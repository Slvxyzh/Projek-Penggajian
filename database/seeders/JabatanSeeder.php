<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JabatanSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('jabatan')->insert([
            [
                'nama_jabatan' => 'Administrator',
                'gaji_pokok'   => 5000000,
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'nama_jabatan' => 'Pegawai',
                'gaji_pokok'   => 3000000,
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
        ]);
    }
}
