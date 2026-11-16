<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PelajaranControllerAnyelir extends Controller
{
    public function index()
    {
        $pelajaran = DB::table('t_pelajaran_anyelir')->get();
        return view('pelajaran_anyelir', compact('pelajaran'));
    }

    public function create()
    {
        return view('pelajaran_tambah_anyelir');
    }

    public function store(Request $request)
    {
        DB::table('t_pelajaran_anyelir')->insert([
            'kode_pelajaran' => $request->kode_pelajaran,
            'nama_pelajaran' => $request->nama_pelajaran,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect('/pelajaran')->with('success', 'Data pelajaran berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $pelajaran = DB::table('t_pelajaran_anyelir')->where('id', $id)->first();
        return view('pelajaran_edit_anyelir', compact('pelajaran'));
    }

    public function update(Request $request, $id)
    {
        DB::table('t_pelajaran_anyelir')->where('id', $id)->update([
            'kode_pelajaran' => $request->kode_pelajaran,
            'nama_pelajaran' => $request->nama_pelajaran,
            'updated_at' => now(),
        ]);
        return redirect('/pelajaran')->with('success', 'Data pelajaran berhasil diubah!');
    }

    public function destroy($id)
    {
        DB::table('t_pelajaran_anyelir')->where('id', $id)->delete();
        return redirect('/pelajaran')->with('success', 'Data pelajaran berhasil dihapus!');
    }

    public function cetakPdf()
    {
        $pelajaran = DB::table('t_pelajaran_anyelir')->get();
        return view('pelajaran_pdf_anyelir', compact('pelajaran'));
    }
}