@extends('layouts.app')

@section('content')
<div class="card shadow-sm">
    <div class="card-body">

        @if(session('success'))
        <!-- Fancy Toast Notification -->
        <div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 1100">
            <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="4000">
                <div class="toast-header">
                    <span class="rounded-circle bg-success d-inline-block me-2" style="width:12px;height:12px"></span>
                    <strong class="me-auto">Sistem Alumni</strong>
                    <small class="text-muted">baru saja</small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
                </div>
                <div class="toast-body">
                    <i class="bi bi-check2-circle"></i>
                    {{ session('success') }}
                </div>
            </div>
        </div>
        @endif

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="mb-0">Data Alumni</h5>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn btn-outline-danger btn-sm">
                    <i class="bi bi-box-arrow-right"></i>
                    Logout
                </button>
            </form>
        </div>

        <form method="GET" class="row g-2 mb-3">
            <div class="col-md-3">
                <input type="text" name="keyword" class="form-control" placeholder="Cari nama">
            </div>
            <div class="col-md-3">
                <input type="number" name="tahun_lulus" class="form-control" placeholder="Tahun Lulus">
            </div>
            <div class="col-md-3">
                <input type="text" name="jurusan" class="form-control" placeholder="Jurusan">
            </div>
            <div class="col-md-3">
                <button class="btn btn-primary w-100"><i class="bi bi-funnel"></i> Filter</button>
            </div>
        </form>

        <form method="POST" action="{{ route('alumni.whatsapp') }}">
            @csrf
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th></th>
                        <th>Nama</th>
                        <th>Tahun</th>
                        <th>Jurusan</th>
                        <th>Pekerjaan</th>
                        <th>Domisili</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($alumni as $a)
                    <tr>
                        <td><input type="checkbox" name="no_hp[]" value="{{ $a->no_hp }}"></td>
                        <td>{{ $a->nama }}</td>
                        <td>{{ $a->tahun_lulus }}</td>
                        <td>{{ $a->jurusan }}</td>
                        <td>{{ $a->pekerjaan }}</td>
                        <td>{{ $a->domisili }}</td>
                        <td class="text-center">
                            <button type="button" class="btn btn-sm btn-outline-primary me-1" data-bs-toggle="modal" data-bs-target="#viewAlumni{{ $a->id }}">
                                View
                            </button>

                            <form action="{{ route('alumni.destroy', $a->id) }}" method="POST" class="d-inline"
                                onsubmit="return confirm('Yakin ingin menghapus data alumni ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Modal Detail Alumni -->
            @foreach($alumni as $a)
            <div class="modal fade" id="viewAlumni{{ $a->id }}" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Detail Alumni</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <table class="table table-sm">
                                <tr>
                                    <th>Nama</th>
                                    <td>{{ $a->nama }}</td>
                                </tr>
                                <tr>
                                    <th>Tahun Lulus</th>
                                    <td>{{ $a->tahun_lulus }}</td>
                                </tr>
                                <tr>
                                    <th>Jurusan</th>
                                    <td>{{ $a->jurusan }}</td>
                                </tr>
                                <tr>
                                    <th>Pekerjaan</th>
                                    <td>{{ $a->pekerjaan }}</td>
                                </tr>
                                <tr>
                                    <th>No. HP</th>
                                    <td>{{ $a->no_hp }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $a->email }}</td>
                                </tr>
                                <tr>
                                    <th>Domisili</th>
                                    <td>{{ $a->domisili }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            </tbody>
            </table>

            <button class="btn btn-success">Kirim WhatsApp</button>
        </form>

        <div class="d-flex justify-content-center">
            {{ $alumni->links() }}
        </div>

    </div>
</div>
@endsection