@extends('layouts.app')

@section('content')
<div class="page-content">

    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Pengaturan Voting</h4>
        </div>
        <div class="container py-4">

            <div class="card shadow-sm border-0">
                <div class="card-body">

                    <div class="d-flex justify-content-between mb-3">
                        <h4 class="fw-bold">Pengaturan Voting</h4>
                        <a href="{{ route('admin.settings.create') }}" class="btn btn-primary">
                            Edit Setting
                        </a>
                    </div>

                    @if($setting)
                    <table class="table table-bordered">
                        <tr>
                            <th>Status</th>
                            <td>
                                @if($setting->is_active)
                                <span class="badge bg-success">Aktif</span>
                                @else
                                <span class="badge bg-danger">Nonaktif</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Mulai</th>
                            <td>{{ \Carbon\Carbon::parse($setting->start_at)->format('d M Y H:i') }}</td>
                        </tr>
                        <tr>
                            <th>Selesai</th>
                            <td>{{ \Carbon\Carbon::parse($setting->end_at)->format('d M Y H:i') }}</td>
                        </tr>
                    </table>
                    @else
                    <div class="alert alert-warning">
                        Belum ada pengaturan voting.
                    </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection