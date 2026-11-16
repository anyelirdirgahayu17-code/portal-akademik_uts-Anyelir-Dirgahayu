<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JadwalControllerAnyelir extends Controller
{
    public function index()
    {
        $jadwal = DB::table('t_jadwal_anyelir')->get();
        return view('jadwal_anyelir', compact('jadwal'));
    }

    public function create()
    {
        return view('jadwal_tambah_anyelir');
    }

    public function store(Request $request)
    {
        DB::table('t_jadwal_anyelir')->insert([
            'kode_jadwal' => $request->kode_jadwal,
            'hari' => $request->hari,
            'jam' => $request->jam,
            'kode_pelajaran' => $request->kode_pelajaran,
            'kode_kelas' => $request->kode_kelas,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect('/jadwal')->with('success', 'Data jadwal berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $jadwal = DB::table('t_jadwal_anyelir')->where('id', $id)->first();
        return view('jadwal_edit_anyelir', compact('jadwal'));
    }

    public function update(Request $request, $id)
    {
        DB::table('t_jadwal_anyelir')->where('id', $id)->update([
            'kode_jadwal' => $request->kode_jadwal,
            'hari' => $request->hari,
            'jam' => $request->jam,
            'kode_pelajaran' => $request->kode_pelajaran,
            'kode_kelas' => $request->kode_kelas,
            'updated_at' => now(),
        ]);
        return redirect('/jadwal')->with('success', 'Data jadwal berhasil diubah!');
    }

    public function destroy($id)
    {
        DB::table('t_jadwal_anyelir')->where('id', $id)->delete();
        return redirect('/jadwal')->with('success', 'Data jadwal berhasil dihapus!');
    }

    public function cetakPdf()
    {
        $jadwal = DB::table('t_jadwal_anyelir')->get();
        return view('jadwal_pdf_anyelir', compact('jadwal'));
    }
}