<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index()
    {
        // pastikan user sudah login
        $user = auth()->user();

        return view('v_beranda.index', [
            'user' => $user
        ]);
    }
}
