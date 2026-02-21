@extends('layouts.app')

@section('content')
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Voting</a></li>
            <li class="breadcrumb-item active" aria-current="page">Pengaturan</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Pengaturan Voting</h4>
        </div>
        <a href="{{ route('admin.settings.create') }}" class="btn btn-primary">
            Edit Setting
        </a>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card shadow-sm border-0">
                <div class="card-body">

                    <h6 class="card-title">Daftar Pengaturan</h6>
                    <p class="text-muted mb-3">Dibawah ini adalah tabel pengaturan voting, anda bisa menghapus, melihat, hingga mengedit data pengaturan.</p>

                    <div class="table-responsive pt-3">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Mulai</th>
                                    <th>Selesai</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ \Carbon\Carbon::parse($setting->start_at)->format('d M Y H:i') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($setting->end_at)->format('d M Y H:i') }}</td>
                                    <td>@if($setting->is_active)
                                        <span class="badge bg-success">Aktif</span>
                                        @else
                                        <span class="badge bg-danger">Nonaktif</span>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection