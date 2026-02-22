@extends('layouts.front.app')

@section('content')
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

<div class="container text-center mb-5">

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
        <a href="{{ url('/results') }}" class="btn btn-primary px-4 rounded-3">
            Kembali ke Hasil Voting
        </a>

    </div>

</div>

@endsection