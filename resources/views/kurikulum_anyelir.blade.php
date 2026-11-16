@extends('layouts.app_anyelir')

@section('content')
<div class="card card-custom p-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h5 class="fw-bold text-dark mb-1">Manajemen Data Kurikulum</h5>
            <p class="text-muted small mb-0">Pengaturan kurikulum dan tahun ajaran akademik aktif.</p>
        </div>
        <div class="d-flex gap-2">
            <a href="/kurikulum/tambah" class="btn btn-primary btn-sm"><i class="bi bi-plus-lg me-1"></i> Tambah Data</a>
            <a href="/kurikulum/pdf" target="_blank" class="btn btn-danger btn-sm"><i class="bi bi-file-pdf me-1"></i> Cetak PDF</a>
        </div>
    </div>
    
    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead>
                <tr>
                    <th width="60" class="text-center">No</th>
                    <th>Kode Kurikulum</th>
                    <th>Nama Kurikulum</th>
                    <th>Tahun Ajaran</th>
                    <th width="150" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($kurikulum as $key => $item)
                <tr>
                    <td class="text-center fw-semibold text-muted">{{ $key + 1 }}</td>
                    <td><span class="badge bg-light text-dark border px-2 py-1">{{ $item->kode_kurikulum }}</span></td>
                    <td class="fw-semibold text-dark">{{ $item->nama_kurikulum }}</td>
                    <td><span class="text-secondary">{{ $item->tahun_ajaran }}</span></td>
                    <td class="text-center">
                        <a href="/kurikulum/{{ $item->id }}/edit" class="btn btn-warning btn-sm text-white px-2 py-1" title="Edit"><i class="bi bi-pencil-square"></i></a>
                        <form action="/kurikulum/{{ $item->id }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
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