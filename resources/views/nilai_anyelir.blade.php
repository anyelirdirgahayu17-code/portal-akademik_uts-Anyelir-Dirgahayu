@extends('layouts.app_anyelir')

@section('content')
<div class="card card-custom p-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h5 class="fw-bold text-dark mb-1">Manajemen Data Nilai & Range Huruf Mutu</h5>
            <p class="text-muted small mb-0">Rekapitulasi nilai mahasiswa lengkap dengan konversi range nilai otomatis.</p>
        </div>
        <div class="d-flex gap-2">
            <a href="/nilai/tambah" class="btn btn-primary btn-sm"><i class="bi bi-plus-lg me-1"></i> Tambah Data</a>
            <a href="/nilai/pdf" target="_blank" class="btn btn-danger btn-sm"><i class="bi bi-file-pdf me-1"></i> Cetak PDF</a>
        </div>
    </div>
    
    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead>
                <tr>
                    <th width="50" class="text-center">No</th>
                    <th>NIS</th>
                    <th>Pelajaran</th>
                    <th class="text-center">Tugas</th>
                    <th class="text-center">UTS</th>
                    <th class="text-center">UAS</th>
                    <th class="text-center">Akhir</th>
                    <th class="text-center">Huruf</th>
                    <th class="text-center">Status</th>
                    <th width="120" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($nilai as $key => $item)
                <tr>
                    <td class="text-center fw-semibold text-muted">{{ $key + 1 }}</td>
                    <td><span class="badge bg-light text-dark border px-2 py-1">{{ $item->nis }}</span></td>
                    <td><span class="badge bg-light text-dark border px-2 py-1">{{ $item->kode_pelajaran }}</span></td>
                    <td class="text-center">{{ $item->nilai_tugas }}</td>
                    <td class="text-center">{{ $item->nilai_uts }}</td>
                    <td class="text-center">{{ $item->nilai_uas }}</td>
                    <td class="text-center fw-bold text-primary">{{ $item->nilai_akhir }}</td>
                    <td class="text-center">
                        <span class="badge {{ in_array($item->huruf_mutu, ['A', 'B+', 'B']) ? 'bg-success' : 'bg-warning text-dark' }} px-2 py-1">
                            {{ $item->huruf_mutu }}
                        </span>
                    </td>
                    <td class="text-center"><small class="fw-semibold">{{ $item->status_kelulusan }}</small></td>
                    <td class="text-center">
                        <a href="/nilai/{{ $item->id }}/edit" class="btn btn-warning btn-sm text-white px-2 py-1" title="Edit"><i class="bi bi-pencil-square"></i></a>
                        <form action="/nilai/{{ $item->id }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm px-2 py-1" title="Hapus"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection