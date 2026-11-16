<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Portal Akademik Anyelir</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-dark d-flex align-items-center justify-content-center vh-100">

    <div class="card shadow-lg p-5 rounded-4 border-0 bg-white" style="width: 420px;">
        <div class="text-center mb-4">
            <div class="mb-3">
                <i class="bi bi-mortarboard-fill text-primary display-4"></i>
            </div>
            <h3 class="fw-bold text-dark">Portal Akademik</h3>
            <p class="text-muted small">Silakan login untuk masuk ke panel admin</p>
        </div>

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show py-2 small" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form action="/login" method="POST">
            @csrf
            <div class="mb-3">
                <label for="username" class="form-label fw-semibold small text-secondary">Username</label>
                <div class="input-group">
                    <span class="input-group-text bg-light"><i class="bi bi-person-fill"></i></span>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username" required>
                </div>
            </div>
            <div class="mb-4">
                <label for="password" class="form-label fw-semibold small text-secondary">Password</label>
                <div class="input-group">
                    <span class="input-group-text bg-light"><i class="bi bi-lock-fill"></i></span>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary w-100 py-2 fw-semibold rounded-3 shadow-sm">Masuk ke Dashboard</button>
        </form>

        <div class="text-center mt-4">
            <small class="text-muted">UTS Pemrograman Framework - Anyelir Dirgahayu</small>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>