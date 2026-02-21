@extends('layouts.app')

@section('content')
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Voting</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.settings.index') }}">Pengaturan</a></li>
            <li class="breadcrumb-item active" aria-current="page">Ubah Pengaturan</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Ubah Pengaturan Voting</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">

            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="mb-4">Pengaturan Voting</h5>

                    <form method="POST" action="/admin/settings">
                        @csrf

                        <div class="mb-3">
                            <label>Tanggal Mulai</label>
                            <input type="datetime-local" name="start_at" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Tanggal Selesai</label>
                            <input type="datetime-local" name="end_at" class="form-control" required>
                        </div>

                        <button class="btn btn-primary">Simpan</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection