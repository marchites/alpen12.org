<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Voting' }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>

<body class="bg-light d-flex align-items-center justify-content-center" style="min-height: 100vh;">

    <div class="container text-center">

        <div class="card border-0 shadow-lg rounded-4 p-5">

            <!-- Icon -->
            <div class="mb-4">
                <div class="icon-wrapper mx-auto">
                    <i class="bi bi-lock"></i>
                </div>
            </div>

            <!-- Title -->
            <h2 class="fw-bold mb-3">
                {{ $title ?? 'Voting Tidak Tersedia' }}
            </h2>

            <!-- Message -->
            <p class="text-muted mb-4">
                {{ $message ?? 'Halaman ini tidak dapat diakses.' }}
            </p>

            <!-- Optional Button -->
            <a href="{{ url('/') }}" class="btn btn-primary px-4 rounded-3">
                Kembali ke Beranda
            </a>

        </div>

    </div>

<style>
    .icon-wrapper {
        width: 90px;
        height: 90px;
        border-radius: 50%;
        background: #f1f3f5;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 40px;
    }

    .card {
        max-width: 500px;
        margin: auto;
    }
</style>

</body>
</html>