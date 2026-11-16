<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KelasControllerAnyelir extends Controller
{
    public function index()
    {
        $kelas = DB::table('t_kelas_anyelir')->get();
        return view('kelas_anyelir', compact('kelas'));
    }

    public function create()
    {
        return view('kelas_tambah_anyelir');
    }

    public function store(Request $request)
    {
        DB::table('t_kelas_anyelir')->insert([
            'kode_kelas' => $request->kode_kelas,
            'nama_kelas' => $request->nama_kelas,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect('/kelas')->with('success', 'Data kelas berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $kelas = DB::table('t_kelas_anyelir')->where('id', $id)->first();
        return view('kelas_edit_anyelir', compact('kelas'));
    }

    public function update(Request $request, $id)
    {
        DB::table('t_kelas_anyelir')->where('id', $id)->update([
            'kode_kelas' => $request->kode_kelas,
            'nama_kelas' => $request->nama_kelas,
            'updated_at' => now(),
        ]);
        return redirect('/kelas')->with('success', 'Data kelas berhasil diubah!');
    }

    public function destroy($id)
    {
        DB::table('t_kelas_anyelir')->where('id', $id)->delete();
        return redirect('/kelas')->with('success', 'Data kelas berhasil dihapus!');
    }

    public function cetakPdf()
    {
        $kelas = DB::table('t_kelas_anyelir')->get();
        return view('kelas_pdf_anyelir', compact('kelas'));
    }
}