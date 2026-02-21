@extends('layouts.app')

@section('content')

<div class="container">

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

</div>

<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Alumni</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.alumni.index') }}">Database</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah Alumni</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Tambah Alumni</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="mb-4">Form Data Alumni</h5>

                    <form method="POST" action="{{ route('admin.alumni.store') }}">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" name="nama" class="form-control" required>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Tahun Lulus</label>
                                <input type="number" name="tahun_lulus" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Jurusan</label>
                                <input type="text" name="jurusan" class="form-control" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Pekerjaan</label>
                            <input type="text" name="pekerjaan" class="form-control">
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">No. Handphone (WhatsApp)</label>
                                <input type="text" name="no_hp" class="form-control" placeholder="08xxxxxxxxxx" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Domisili / Kota</label>
                            <input type="text" name="domisili" class="form-control" required>
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

</div>
@endsection