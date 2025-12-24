<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Pegawai extends Authenticatable
{
    protected $table = 'pegawai';

    protected $fillable = [
        'username',
        'password',
        'nik',
        'nama_pegawai',
        'jenis_kelamin',
        'photo',
        'role',
        'status',
         'jabatan_id'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
