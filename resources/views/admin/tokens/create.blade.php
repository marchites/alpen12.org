@extends('layouts.app')

@section('content')
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Voting</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.tokens.index') }}">Tokens</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah Token</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Voting Tokens</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">

            <div class="card shadow-sm">
                <div class="card-body">

                    <h5 class="mb-4">Tambah Token</h5>

                    <form action="{{ route('admin.tokens.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Pilih Alumni</label>
                            <select name="alumni_id" class="form-select" required>
                                <option value="">-- Pilih Alumni --</option>
                                @foreach($alumni as $a)
                                <option value="{{ $a->id }}">
                                    {{ $a->nama }} | {{ $a->tahun_lulus }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <button class="btn btn-primary px-4">
                            Generate Token
                        </button>

                        <a href="{{ route('admin.tokens.index') }}" class="btn btn-secondary">
                            Kembali
                        </a>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection