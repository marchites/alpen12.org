@extends('layouts.app')

@section('content')
<div class="page-content">

    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Tabel Kandidat</h4>
        </div>
        <div class="container py-4">

                <div class="card shadow-sm border-0">
                    <div class="card-body">

                        <div class="d-flex justify-content-between mb-3">
                            <h4 class="fw-bold">Daftar Kandidat</h4>
                            <a href="{{ route('admin.candidates.create') }}" class="btn btn-primary">
                                + Tambah Kandidat
                            </a>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered align-middle">
                                <thead class="table-light">
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