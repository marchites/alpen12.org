@extends('layouts.app')

@section('content')
<div class="page-content">

    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Tabel Jabatan</h4>
        </div>
        <div class="container py-4">

            <div class="card shadow-sm border-0">
                <div class="card-body">

                    <div class="d-flex justify-content-between mb-3">
                        <h4 class="fw-bold">Daftar Jabatan</h4>
                        <a href="{{ route('admin.positions.create') }}" class="btn btn-primary">
                            + Tambah Jabatan
                        </a>
                    </div>

                    <table class="table table-bordered align-middle">
                        <thead class="table-light">
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
@endsection