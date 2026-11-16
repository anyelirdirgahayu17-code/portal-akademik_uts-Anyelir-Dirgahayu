@extends('layouts.app_anyelir')

@section('content')
<div class="card card-custom p-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h5 class="fw-bold text-dark mb-1">Manajemen Data Siswa</h5>
            <p class="text-muted small mb-0">Daftar seluruh siswa aktif yang terdaftar dalam sistem akademik.</p>
        </div>
        <span class="badge bg-primary px-3 py-2 rounded-pill">Total: {{ count($siswa) }} Siswa</span>
    </div>
    
    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead>
                <tr>
                    <th width="60" class="text-center">No</th>
                    <th>NIS</th>
                    <th>Nama Siswa</th>
                </tr>
            </thead>
            <tbody>
                @foreach($siswa as $key => $item)
                <tr>
                    <td class="text-center fw-semibold text-muted">{{ $key + 1 }}</td>
                    <td><span class="badge bg-light text-dark border px-2 py-1">{{ $item->nis }}</span></td>
                    <td class="fw-semibold text-dark">{{ $item->nama_siswa }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection