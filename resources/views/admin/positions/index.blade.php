@extends('layouts.app')

@section('content')
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Voting</a></li>
            <li class="breadcrumb-item active" aria-current="page">Jabatan</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Tabel Jabatan</h4>
        </div>
        <a href="{{ route('admin.positions.create') }}" class="btn btn-primary">
            + Tambah Jabatan
        </a>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Daftar Jabatan</h6>
                    <p class="text-muted mb-3">Dibawah ini adalah tabel jabatan, anda bisa menghapus, melihat, hingga mengedit data jabatan.</p>
                    <div class="table-responsive pt-3">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Jabatan</th>
                                    <th>Urutan yang Ditampilkan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($positions as $key => $position)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $position->name }}</td>
                                    <td>{{ $position->order }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection