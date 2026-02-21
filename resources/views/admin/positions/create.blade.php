@extends('layouts.app')

@section('content')
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Voting</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.positions.index') }}">Jabatan</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah Jabatan</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Tambah Jabatan</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">

            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="mb-4">Tambah Jabatan</h5>

                    <form method="POST" action="/admin/positions">
                        @csrf

                        <div class="mb-3">
                            <label>Nama Jabatan</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Urutan</label>
                            <input type="number" name="order" class="form-control" required>
                        </div>

                        <button class="btn btn-primary">Simpan</button>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection