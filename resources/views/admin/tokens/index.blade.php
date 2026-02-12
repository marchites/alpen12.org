@extends('layouts.app')

@section('content')
<div class="container py-4">

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow-sm border-0">
        <div class="card-body">

            <div class="d-flex justify-content-between mb-3">
                <h4 class="fw-bold">Voting Tokens</h4>
                <a href="{{ route('admin.tokens.create') }}" class="btn btn-success">
                    + Create Token
                </a>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered align-middle">
                    <thead class="table-light">
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
@endsection
