@extends('layouts.app')

@section('content')
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Voting</a></li>
            <li class="breadcrumb-item active" aria-current="page">Kandidat</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Tabel Kandidat</h4>
        </div>
        <a href="{{ route('admin.candidates.create') }}" class="btn btn-primary">
            + Tambah Kandidat
        </a>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Daftar Kandidat</h6>
                    <p class="text-muted mb-3">Dibawah ini adalah tabel kandidat, anda bisa menghapus, melihat, hingga mengedit data kandidat.</p>
                    <div class="table-responsive pt-3">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Foto</th>
                                    <th>Nama</th>
                                    <th>Jabatan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($candidates as $key => $candidate)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>
                                        @if($candidate->photo)
                                        <img src="{{ asset('storage/'.$candidate->photo) }}"
                                            width="50" height="50"
                                            class="rounded-circle"
                                            style="object-fit:cover;">
                                        @else
                                        -
                                        @endif
                                    </td>
                                    <td>{{ $candidate->nama }}</td>
                                    <td>{{ $candidate->position->name }}</td>
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