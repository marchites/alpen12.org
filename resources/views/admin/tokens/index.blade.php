@extends('layouts.app')

@section('content')
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Voting</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tokens</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Voting Tokens</h4>
        </div>
        <a href="{{ route('admin.tokens.create') }}" class="btn btn-primary">
            + Tambah Token
        </a>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Daftar Token</h6>
                    <p class="text-muted mb-3">Dibawah ini adalah tabel token, anda bisa menghapus, melihat, hingga mengedit data token.</p>

                    <div class="table-responsive pt-3">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Alumni</th>
                                    <th>Token</th>
                                    <th>Link Voting</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach($tokens as $key => $token)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $token->alumni->nama }}</td>
                                    <td>{{ $token->token }}</td>
                                    <td>
                                        <a href="{{ url('/vote/'.$token->token) }}" target="_blank">
                                            {{ url('/vote/'.$token->token) }}
                                        </a>
                                    </td>
                                    <td>
                                        @if($token->used_at)
                                        <span class="badge bg-danger">Sudah Digunakan</span>
                                        @else
                                        <span class="badge bg-success">Belum Digunakan</span>
                                        @endif
                                    </td>
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