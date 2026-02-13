@extends('layouts.app')

@section('content')
<div class="page-content">

    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Database Alumni</h4>
        </div>
        <div class="container py-4">

            {{-- ================= TOAST ================= --}}
            @if(session('success'))
            <div class="toast-container position-fixed top-0 end-0 p-3" style="z-index:1100">
                <div class="toast show">
                    <div class="toast-header">
                        <span class="rounded-circle bg-success me-2"
                            style="width:10px;height:10px"></span>
                        <strong class="me-auto">Sistem Alumni</strong>
                        <button class="btn-close" data-bs-dismiss="toast"></button>
                    </div>
                    <div class="toast-body">
                        {{ session('success') }}
                    </div>
                </div>
            </div>
            @endif

            {{-- ================= IMPORT CSV ================= --}}
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-body">
                    <h6 class="fw-semibold mb-1">Import Data Alumni</h6>
                    <small class="text-muted d-block mb-3">
                        Upload file CSV (maks 2MB)
                    </small>

                    <form action="{{ route('admin.alumni.import') }}"
                        method="POST"
                        enctype="multipart/form-data"
                        class="row g-2">
                        @csrf

                        <div class="col-md-9">
                            <input type="file"
                                name="file"
                                class="form-control"
                                accept=".csv"
                                required>
                        </div>

                        <div class="col-md-3 d-grid">
                            <button class="btn btn-success">
                                Import CSV
                            </button>
                        </div>
                    </form>

                    <small class="text-muted mt-2 d-block">
                        Format CSV:
                        <code>nama,tahun_lulus,jurusan,pekerjaan,no_hp,email,domisili</code>
                    </small>
                </div>
            </div>

            {{-- ================= FILTER ================= --}}
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-body">
                    <form method="GET" class="row g-2">
                        <div class="col-md-3">
                            <input type="text"
                                name="keyword"
                                class="form-control"
                                placeholder="Cari nama"
                                value="{{ request('keyword') }}">
                        </div>

                        <div class="col-md-3">
                            <input type="number"
                                name="tahun_lulus"
                                class="form-control"
                                placeholder="Tahun Lulus"
                                value="{{ request('tahun_lulus') }}">
                        </div>

                        <div class="col-md-3">
                            <input type="text"
                                name="jurusan"
                                class="form-control"
                                placeholder="Jurusan"
                                value="{{ request('jurusan') }}">
                        </div>

                        <div class="col-md-3 d-grid">
                            <button class="btn btn-primary">
                                <i class="bi bi-funnel"></i>
                                Filter
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            {{-- ================= TABLE ================= --}}
            <div class="card shadow-sm border-0">
                <div class="card-body p-0">

                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th style="width:40px"></th>
                                <th>Nama</th>
                                <th>Tahun</th>
                                <th>Jurusan</th>
                                <th>Pekerjaan</th>
                                <th>Domisili</th>
                                <th class="text-center" style="width:150px">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($alumni as $a)
                            <tr>
                                <td class="text-center">
                                    <input type="checkbox"
                                        class="form-check-input wa-checkbox"
                                        value="{{ $a->no_hp }}">
                                </td>

                                <td>{{ $a->nama }}</td>
                                <td>{{ $a->tahun_lulus }}</td>
                                <td>{{ $a->jurusan }}</td>
                                <td>{{ $a->pekerjaan }}</td>

                                {{-- Domisili dipotong --}}
                                <td style="max-width:160px">
                                    <span class="text-truncate d-inline-block"
                                        style="max-width:160px"
                                        title="{{ $a->domisili }}">
                                        {{ $a->domisili }}
                                    </span>
                                </td>

                                <td class="text-center">
                                    <button class="btn btn-sm btn-outline-primary"
                                        data-bs-toggle="modal"
                                        data-bs-target="#view{{ $a->id }}">
                                        View
                                    </button>

                                    <form action="{{ route('admin.alumni.destroy', $a->id) }}"
                                        method="POST"
                                        class="d-inline"
                                        onsubmit="return confirm('Hapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7"
                                    class="text-center text-muted py-4">
                                    Data alumni belum tersedia
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>

                </div>
            </div>

            {{-- ================= WHATSAPP ================= --}}
            <form method="POST"
                action="{{ route('admin.alumni.whatsapp') }}"
                id="waForm"
                class="mt-3">
                @csrf
                <input type="hidden" name="numbers" id="waNumbers">

                <button class="btn btn-success">
                    Kirim WhatsApp
                </button>
            </form>

            {{-- ================= PAGINATION ================= --}}
            <div class="mt-3">
                {{ $alumni->onEachSide(1)->links('pagination::bootstrap-5') }}
            </div>

        </div>

        {{-- ================= MODAL VIEW ================= --}}
        @foreach($alumni as $a)
        <div class="modal fade" id="view{{ $a->id }}" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Detail Alumni</h5>
                        <button class="btn-close" data-bs-dismiss="modal"></button>
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
                                <th>No HP</th>
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

    </div>
</div>
@endforeach

{{-- ================= JS WHATSAPP ================= --}}
<script>
    document.getElementById('waForm').addEventListener('submit', function(e) {
        const numbers = [...document.querySelectorAll('.wa-checkbox:checked')]
            .map(cb => cb.value);

        if (numbers.length === 0) {
            alert('Pilih minimal satu alumni');
            e.preventDefault();
            return;
        }

        document.getElementById('waNumbers').value = numbers.join(',');
    });
</script>
@endsection