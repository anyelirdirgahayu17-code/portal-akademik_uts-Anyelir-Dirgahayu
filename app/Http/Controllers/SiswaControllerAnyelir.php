<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiswaControllerAnyelir extends Controller
{
    public function index()
    {
        $siswa = DB::table('t_siswa_anyelir')->get();
        return view('siswa_anyelir', compact('siswa'));
    }

    public function create()
    {
        return view('siswa_tambah_anyelir');
    }

    public function store(Request $request)
    {
        DB::table('t_siswa_anyelir')->insert([
            'nis' => $request->nis,
            'nama_siswa' => $request->nama_siswa,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect('/siswa')->with('success', 'Data siswa berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $siswa = DB::table('t_siswa_anyelir')->where('id', $id)->first();
        return view('siswa_edit_anyelir', compact('siswa'));
    }

    public function update(Request $request, $id)
    {
        DB::table('t_siswa_anyelir')->where('id', $id)->update([
            'nis' => $request->nis,
            'nama_siswa' => $request->nama_siswa,
            'updated_at' => now(),
        ]);
        return redirect('/siswa')->with('success', 'Data siswa berhasil diubah!');
    }

    public function destroy($id)
    {
        DB::table('t_siswa_anyelir')->where('id', $id)->delete();
        return redirect('/siswa')->with('success', 'Data siswa berhasil dihapus!');
    }

    public function cetakPdf()
    {
        $siswa = DB::table('t_siswa_anyelir')->get();
        return view('siswa_pdf_anyelir', compact('siswa'));
    }
}