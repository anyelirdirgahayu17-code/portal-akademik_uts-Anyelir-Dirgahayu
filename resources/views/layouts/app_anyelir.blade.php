<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Akademik - Anyelir Dirgahayu</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Google Fonts Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { background-color: #f8fafc; font-family: 'Inter', sans-serif; color: #1e293b; font-size: 0.9rem; }
        
        /* Sidebar Styling */
        .sidebar { width: 260px; min-height: 100vh; background: #0f172a; color: #94a3b8; position: fixed; top: 0; left: 0; z-index: 100; box-shadow: 2px 0 8px rgba(0,0,0,0.04); }
        .sidebar .brand { font-size: 1.1rem; font-weight: 700; padding: 20px 18px; background: #090d16; color: #ffffff; display: flex; align-items: center; gap: 10px; }
        .sidebar .nav-section-title { font-size: 0.7rem; text-transform: uppercase; letter-spacing: 0.8px; color: #64748b; padding: 12px 18px 4px; font-weight: 600; }
        .sidebar .nav-link { color: #94a3b8; padding: 10px 16px; display: flex; align-items: center; gap: 12px; font-weight: 500; font-size: 0.88rem; transition: all 0.2s ease; border-radius: 6px; margin: 3px 10px; }
        .sidebar .nav-link:hover { color: #ffffff; background: rgba(255, 255, 255, 0.04); }
        .sidebar .nav-link.active { color: #ffffff; background: #2563eb; box-shadow: 0 3px 10px rgba(37, 99, 235, 0.25); }
        
        /* Top Navbar */
        .navbar-top { background: #ffffff; border-bottom: 1px solid #e2e8f0; padding: 10px 25px; margin-left: 260px; display: flex; justify-content: space-between; align-items: center; position: sticky; top: 0; z-index: 99; height: 55px; }
        
        /* Main Content Area */
        .main-content { margin-left: 260px; padding: 25px; }
        .card-custom { border: none; border-radius: 12px; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.02), 0 2px 4px -2px rgba(0,0,0,0.02); background: #ffffff; border: 1px solid #e2e8f0; }
        
        /* Compact Table Styling */
        .table { margin-bottom: 0; }
        .table > thead { background: #f1f5f9; color: #334155; text-transform: uppercase; font-size: 0.7rem; letter-spacing: 0.6px; }
        .table > thead th { padding: 10px 14px; font-weight: 600; border-bottom: 1px solid #cbd5e1; }
        .table > tbody td { padding: 11px 14px; vertical-align: middle; color: #1e293b; font-size: 0.87rem; border-bottom: 1px solid #f1f5f9; }
        .table-hover tbody tr:hover { background-color: #f8fafc; }

        @media (max-width: 768px) {
            .sidebar { width: 100%; position: relative; min-height: auto; }
            .main-content, .navbar-top { margin-left: 0; }
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar d-flex flex-column">
        <div class="brand">
            <i class="bi bi-hexagon-fill text-primary fs-5"></i> 
            <span>Portal Akademik</span>
        </div>
        
        <div class="nav-section-title">Menu Utama</div>
        <ul class="nav flex-column gap-1">
            <li class="nav-item"><a href="/siswa" class="nav-link {{ request()->is('siswa*') ? 'active' : '' }}"><i class="bi bi-people fs-5"></i> Data Siswa</a></li>
            <li class="nav-item"><a href="/pelajaran" class="nav-link {{ request()->is('pelajaran*') ? 'active' : '' }}"><i class="bi bi-book fs-5"></i> Data Pelajaran</a></li>
            <li class="nav-item"><a href="/kurikulum" class="nav-link {{ request()->is('kurikulum*') ? 'active' : '' }}"><i class="bi bi-journal-text fs-5"></i> Data Kurikulum</a></li>
            <li class="nav-item"><a href="/kelas" class="nav-link {{ request()->is('kelas*') ? 'active' : '' }}"><i class="bi bi-building fs-5"></i> Data Kelas</a></li>
            <li class="nav-item"><a href="/jadwal" class="nav-link {{ request()->is('jadwal*') ? 'active' : '' }}"><i class="bi bi-calendar-check fs-5"></i> Data Jadwal</a></li>
            <li class="nav-item"><a href="/nilai" class="nav-link {{ request()->is('nilai*') ? 'active' : '' }}"><i class="bi bi-award fs-5"></i> Data Nilai</a></li>
        </ul>

        <div class="mt-auto p-2 m-2 rounded-2" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.06);">
            <div class="d-flex align-items-center gap-2">
                <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center fw-bold" style="width: 32px; height: 32px; font-size: 0.8rem;">AD</div>
                <div class="overflow-hidden">
                    <span class="d-block text-white fw-semibold text-truncate" style="font-size: 0.83rem;">{{ session('nama_lengkap', 'Anyelir Dirgahayu') }}</span>
                    <span class="text-muted" style="font-size: 0.7rem;">Administrator</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Top Navbar -->
    <div class="navbar-top shadow-sm">
        <div class="d-flex align-items-center gap-2">
            <span class="text-muted" style="font-size: 0.83rem;">Sistem Informasi</span>
            <span class="text-muted" style="font-size: 0.83rem;">/</span>
            <span class="fw-semibold text-dark text-capitalize" style="font-size: 0.83rem;">{{ Request::segment(1) }}</span>
        </div>
        <form action="/logout" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-light border btn-sm px-2.5 py-1 fw-semibold text-danger rounded-pill shadow-sm" style="font-size: 0.78rem;"><i class="bi bi-box-arrow-right me-1"></i> Logout</button>
        </form>
    </div>

    <!-- Main Content Area -->
    <div class="main-content">
        @yield('content')
        
        <footer class="text-center mt-4 pt-3 text-muted border-top">
            <small style="font-size: 0.75rem;">Sistem Informasi Akademik • UTS Pemrograman Framework • Anyelir Dirgahayu</small>
        </footer>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>