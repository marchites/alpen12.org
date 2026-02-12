<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Voting Pengurus Alumni 2026</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>

<body class="bg-light">

<div class="container py-5">

    <!-- HEADER -->
    <div class="text-center mb-5">
        <h2 class="fw-bold">Pemilihan Pengurus Alumni 2026</h2>
        <p class="text-muted">
            Silakan pilih kandidat untuk setiap jabatan.<br>
            <strong>Voting hanya dapat dilakukan satu kali.</strong>
        </p>
    </div>

    <form method="POST">
        @csrf

        @foreach($positions as $position)

        <div class="card border-0 shadow-sm mb-5">
            <div class="card-body">

                <h5 class="fw-semibold text-center mb-4">
                    {{ $position->name }}
                </h5>

                <div class="row g-4">

                    @foreach($position->candidates as $candidate)

                    <div class="col-md-4 col-sm-6">
                        <label class="candidate-card w-100 p-4 text-center rounded-4">

                            <!-- Radio (Hidden) -->
                            <input type="radio"
                                   name="votes[{{ $position->id }}]"
                                   value="{{ $candidate->id }}"
                                   required>

                            <!-- FOTO -->
                            @if($candidate->photo)
                                <img src="{{ asset('storage/'.$candidate->photo) }}"
                                     class="rounded-circle mb-3"
                                     width="110"
                                     height="110"
                                     style="object-fit: cover;">
                            @else
                                <div class="rounded-circle bg-secondary d-flex align-items-center justify-content-center mx-auto mb-3"
                                     style="width:110px; height:110px;">
                                    <span class="text-white fs-3 fw-bold">
                                        {{ strtoupper(substr($candidate->nama,0,1)) }}
                                    </span>
                                </div>
                            @endif

                            <!-- NAMA -->
                            <h6 class="fw-bold mb-0">{{ $candidate->nama }}</h6>

                        </label>
                    </div>

                    @endforeach

                </div>

            </div>
        </div>

        @endforeach

        <!-- SUBMIT -->
        <div class="text-center mt-4">
            <button type="submit"
                    class="btn btn-primary btn-lg px-3 rounded-3 shadow"
                    onclick="return confirm('Yakin dengan pilihan Anda? Voting tidak bisa diulang.')">
                <i class="bi bi-envelope"></i> Kirim Suara
            </button>
        </div>

    </form>

</div>


<style>
    .candidate-card {
        cursor: pointer;
        border: 1px solid #e9ecef;
        transition: all .2s ease-in-out;
        background: #fff;
    }

    .candidate-card:hover {
        transform: translateY(-4px);
        border-color: #0d6efd;
        box-shadow: 0 8px 20px rgba(0,0,0,0.05);
    }

    .candidate-card input[type="radio"] {
        display: none;
    }

    .candidate-card input[type="radio"]:checked ~ img,
    .candidate-card input[type="radio"]:checked ~ div {
        outline: 3px solid #0d6efd;
        outline-offset: 3px;
    }

    .candidate-card input[type="radio"]:checked ~ h6 {
        color: #0d6efd;
    }
</style>

</body>
</html>