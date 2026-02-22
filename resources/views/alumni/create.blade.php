@extends('layouts.front.app')

@section('content')
{{-- ================= TOAST ================= --}}
@if(session('success'))
<div class="toast-container position-fixed top-0 end-0 p-3" style="z-index:1100">
    <div class="toast show">
        <div class="toast-header">
            <span class="rounded-circle bg-success me-2"
                style="width:10px;height:10px"></span>
            <strong class="me-auto">Sistem Alumni</strong>
            <button class="btn-close" data-bs-dismiss="toast"></button>
        </div>
        <div class="toast-body">
            {{ session('success') }}
        </div>
    </div>
</div>
@endif

<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Registration</li>
    </ol>
</nav>

<div class="row">
    <div class="col-md-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Registrasi Alumni</h6>
                <p class="text-muted mb-3">Dibawah ini adalah form untuk mendaftarkan diri sebagai alumni di database alpen12.org</p>

                @if(session('success'))
                <!-- Fancy Toast Notification -->
                <div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 1100">
                    <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="4000">
                        <div class="toast-header">
                            <span class="rounded-circle bg-success d-inline-block me-2" style="width:12px;height:12px"></span>
                            <strong class="me-auto">Sistem Alumni</strong>
                            <small class="text-muted">baru saja</small>
                            <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
                        </div>
                        <div class="toast-body">
                            <i class="bi bi-check2-circle"></i>
                            {{ session('success') }}
                        </div>
                    </div>
                </div>
                @endif

                <form method="POST" action="{{ route('alumni.store') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" required>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Tahun Lulus</label>
                            <input type="number" name="tahun_lulus" class="form-control" placeholder="Tahun Lulus" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Jurusan</label>
                            <input type="text" name="jurusan" class="form-control" placeholder="Jurusan" required>
                        </div>
                    </div>


                    <div class="mb-3">
                        <label class="form-label">Pekerjaan</label>
                        <input type="text" name="pekerjaan" class="form-control" placeholder="Pekerjaan Saat Ini" required>
                    </div>


                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">No. Handphone (WhatsApp)</label>
                            <input type="text" name="no_hp" class="form-control" placeholder="mis. 08xxxxxxxxxx" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Email" required>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Domisili / Kota</label>
                        <input type="text" name="domisili" class="form-control" placeholder="mis. Bandung" required>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.alumni.index') }}" class="btn btn-secondary">Kembali</a>
                        <button class="btn btn-primary">Simpan Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection