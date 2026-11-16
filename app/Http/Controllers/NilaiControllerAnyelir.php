<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NilaiControllerAnyelir extends Controller
{
    // Fungsi pembantu untuk hitung range nilai
    private function hitungRangeNilai($tugas, $uts, $uas)
    {
        // Bobot: Tugas 30%, UTS 30%, UAS 40%
        $nilai_akhir = ($tugas * 0.3) + ($uts * 0.3) + ($uas * 0.4);

        if ($nilai_akhir >= 85) {
            $huruf = 'A';
            $status = 'Lulus (Sangat Baik)';
        } elseif ($nilai_akhir >= 80) {
            $huruf = 'B+';
            $status = 'Lulus (Baik Sekali)';
        } elseif ($nilai_akhir >= 70) {
            $huruf = 'B';
            $status = 'Lulus (Baik)';
        } elseif ($nilai_akhir >= 65) {
            $huruf = 'C+';
            $status = 'Lulus (Cukup Baik)';
        } elseif ($nilai_akhir >= 60) {
            $huruf = 'C';
            $status = 'Lulus (Cukup)';
        } elseif ($nilai_akhir >= 50) {
            $huruf = 'D';
            $status = 'Kurang';
        } else {
            $huruf = 'E';
            $status = 'Tidak Lulus';
        }

        return [
            'akhir' => number_format($nilai_akhir, 1),
            'huruf' => $huruf,
            'status' => $status
        ];
    }

    public function index()
    {
        $data_nilai = DB::table('t_nilai_anyelir')->get();
        $nilai = [];

        foreach ($data_nilai as $item) {
            $range = $this->hitungRangeNilai($item->nilai_tugas, $item->nilai_uts, $item->nilai_uas);
            
            $item->nilai_akhir = $range['akhir'];
            $item->huruf_mutu = $range['huruf'];
            $item->status_kelulusan = $range['status'];
            
            $nilai[] = $item;
        }

        return view('nilai_anyelir', compact('nilai'));
    }

    public function create()
    {
        return view('nilai_tambah_anyelir');
    }

    public function store(Request $request)
    {
        DB::table('t_nilai_anyelir')->insert([
            'nis' => $request->nis,
            'kode_pelajaran' => $request->kode_pelajaran,
            'nilai_tugas' => $request->nilai_tugas,
            'nilai_uts' => $request->nilai_uts,
            'nilai_uas' => $request->nilai_uas,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect('/nilai')->with('success', 'Data nilai berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $nilai = DB::table('t_nilai_anyelir')->where('id', $id)->first();
        return view('nilai_edit_anyelir', compact('nilai'));
    }

    public function update(Request $request, $id)
    {
        DB::table('t_nilai_anyelir')->where('id', $id)->update([
            'nis' => $request->nis,
            'kode_pelajaran' => $request->kode_pelajaran,
            'nilai_tugas' => $request->nilai_tugas,
            'nilai_uts' => $request->nilai_uts,
            'nilai_uas' => $request->nilai_uas,
            'updated_at' => now(),
        ]);
        return redirect('/nilai')->with('success', 'Data nilai berhasil diubah!');
    }

    public function destroy($id)
    {
        DB::table('t_nilai_anyelir')->where('id', $id)->delete();
        return redirect('/nilai')->with('success', 'Data nilai berhasil dihapus!');
    }

    public function cetakPdf()
    {
        $data_nilai = DB::table('t_nilai_anyelir')->get();
        $nilai = [];

        foreach ($data_nilai as $item) {
            $range = $this->hitungRangeNilai($item->nilai_tugas, $item->nilai_uts, $item->nilai_uas);
            $item->nilai_akhir = $range['akhir'];
            $item->huruf_mutu = $range['huruf'];
            $item->status_kelulusan = $range['status'];
            $nilai[] = $item;
        }

        return view('nilai_pdf_anyelir', compact('nilai'));
    }
}