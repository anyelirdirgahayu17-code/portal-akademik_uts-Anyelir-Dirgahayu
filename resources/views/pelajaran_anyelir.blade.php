@extends('layouts.app_anyelir')

@section('content')
<div class="card card-custom p-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h5 class="fw-bold text-dark mb-1">Manajemen Data Pelajaran</h5>
            <p class="text-muted small mb-0">Daftar mata pelajaran yang tersedia pada semester ini.</p>
        </div>
        <div class="d-flex gap-2">
            <a href="/pelajaran/tambah" class="btn btn-primary btn-sm"><i class="bi bi-plus-lg me-1"></i> Tambah Data</a>
            <a href="/pelajaran/pdf" target="_blank" class="btn btn-danger btn-sm"><i class="bi bi-file-pdf me-1"></i> Cetak PDF</a>
        </div>
    </div>
    
    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead>
                <tr>
                    <th width="60" class="text-center">No</th>
                    <th>Kode Pelajaran</th>
                    <th>Nama Pelajaran</th>
                    <th width="150" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pelajaran as $key => $item)
                <tr>
                    <td class="text-center fw-semibold text-muted">{{ $key + 1 }}</td>
                    <td><span class="badge bg-light text-dark border px-2 py-1">{{ $item->kode_pelajaran }}</span></td>
                    <td class="fw-semibold text-dark">{{ $item->nama_pelajaran }}</td>
                    <td class="text-center">
                        <a href="/pelajaran/{{ $item->id }}/edit" class="btn btn-warning btn-sm text-white px-2 py-1" title="Edit"><i class="bi bi-pencil-square"></i></a>
                        <form action="/pelajaran/{{ $item->id }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
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