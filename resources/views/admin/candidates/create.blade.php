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
            <li class="breadcrumb-item"><a href="{{ route('admin.candidates.index') }}">Kandidat</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah Kandidat</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Tambah Kandidat</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="mb-4">Tambah Kandidat</h5>

                    <form method="POST" action="/admin/candidates" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label>Nama Kandidat</label>
                            <input type="text" name="nama" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Jabatan</label>
                            <select name="position_id" class="form-control" required>
                                <option value="">-- Pilih Jabatan --</option>
                                @foreach($positions as $position)
                                <option value="{{ $position->id }}">
                                    {{ $position->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label>Visi</label>
                            <textarea name="vision" class="form-control"></textarea>
                        </div>

                        <div class="mb-3">
                            <label>Foto</label>
                            <input type="file" name="photo" class="form-control">
                        </div>

                        <button class="btn btn-primary">Simpan</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection