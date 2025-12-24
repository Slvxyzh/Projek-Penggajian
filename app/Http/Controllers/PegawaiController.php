<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * TAMPILKAN DATA PEGAWAI
     */
    public function index()
    {
        $pegawai = Pegawai::with('jabatan')->get();
        return view('pegawai.index', compact('pegawai'));
    }

    /**
     * FORM TAMBAH PEGAWAI
     */
    public function create()
    {
        $jabatan = Jabatan::all();
        return view('pegawai.create', compact('jabatan'));
    }

    /**
     * SIMPAN PEGAWAI BARU
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:pegawai',
            'password' => 'required|min:6',
            'nik' => 'required|unique:pegawai',
            'nama_pegawai' => 'required',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'jabatan_id' => 'required|exists:jabatan,id',
            'role' => 'required|in:admin,pegawai',
        ]);

        Pegawai::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'nik' => $request->nik,
            'nama_pegawai' => $request->nama_pegawai,
            'jenis_kelamin' => $request->jenis_kelamin,
            'jabatan_id' => $request->jabatan_id,
            'role' => $request->role,
            'status' => 'aktif',
        ]);

        return redirect()->route('pegawai.index')
            ->with('success', 'Pegawai berhasil ditambahkan');
    }

    /**
     * FORM EDIT PEGAWAI
     */
    public function edit($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        $jabatan = Jabatan::all();

        return view('pegawai.edit', compact('pegawai', 'jabatan'));
    }

    /**
     * UPDATE DATA PEGAWAI
     */
    public function update(Request $request, $id)
    {
        $pegawai = Pegawai::findOrFail($id);

        $request->validate([
            'username' => 'required|unique:pegawai,username,' . $pegawai->id,
            'nik' => 'required|unique:pegawai,nik,' . $pegawai->id,
            'nama_pegawai' => 'required',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'jabatan_id' => 'required|exists:jabatan,id',
            'role' => 'required|in:admin,pegawai',
            'status' => 'required|in:aktif,nonaktif',
        ]);

        $data = $request->except('password');

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $pegawai->update($data);

        return redirect()->route('pegawai.index')
            ->with('success', 'Data pegawai berhasil diperbarui');
    }

     /**
     * HAPUS PEGAWAI
     */
    public function destroy($id)
    {
        Pegawai::findOrFail($id)->delete();

        return redirect()->route('pegawai.index')
            ->with('success', 'Pegawai berhasil dihapus');
    }
}
