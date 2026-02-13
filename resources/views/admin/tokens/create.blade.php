@extends('layouts.app')

@section('content')
<div class="page-content">

    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Voting Tokens</h4>
        </div>
        <div class="container py-4">

            <div class="card shadow-sm border-0">
                <div class="card-body">

                    <h4 class="fw-bold mb-4">Create Voting Token</h4>

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