<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KurikulumControllerAnyelir extends Controller
{
    public function index()
    {
        $kurikulum = DB::table('t_kurikulum_anyelir')->get();
        return view('kurikulum_anyelir', compact('kurikulum'));
    }

    public function create()
    {
        return view('kurikulum_tambah_anyelir');
    }

    public function store(Request $request)
    {
        DB::table('t_kurikulum_anyelir')->insert([
            'kode_kurikulum' => $request->kode_kurikulum,
            'nama_kurikulum' => $request->nama_kurikulum,
            'tahun_ajaran' => $request->tahun_ajaran,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect('/kurikulum')->with('success', 'Data kurikulum berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $kurikulum = DB::table('t_kurikulum_anyelir')->where('id', $id)->first();
        return view('kurikulum_edit_anyelir', compact('kurikulum'));
    }

    public function update(Request $request, $id)
    {
        DB::table('t_kurikulum_anyelir')->where('id', $id)->update([
            'kode_kurikulum' => $request->kode_kurikulum,
            'nama_kurikulum' => $request->nama_kurikulum,
            'tahun_ajaran' => $request->tahun_ajaran,
            'updated_at' => now(),
        ]);
        return redirect('/kurikulum')->with('success', 'Data kurikulum berhasil diubah!');
    }

    public function destroy($id)
    {
        DB::table('t_kurikulum_anyelir')->where('id', $id)->delete();
        return redirect('/kurikulum')->with('success', 'Data kurikulum berhasil dihapus!');
    }

    public function cetakPdf()
    {
        $kurikulum = DB::table('t_kurikulum_anyelir')->get();
        return view('kurikulum_pdf_anyelir', compact('kurikulum'));
    }
}