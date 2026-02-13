@extends('layouts.app')

@section('content')
<div class="page-content">

    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Tambah Kandidat</h4>
        </div>
        <div class="container py-4">

            <div class="card shadow-sm">
                <div class="card-body">
                    <h4 class="mb-4">Tambah Kandidat</h4>

                    <form method="POST" action="/admin/candidates" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label>Nama Kandidat</label>
                            <input type="text" name="nama" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Jabatan</label>
                            <select name="position_id" class="form-control" required>
                                <option value="">-- Pilih Jabatan --</option>
                                @foreach($positions as $position)
                                <option value="{{ $position->id }}">
                                    {{ $position->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label>Visi</label>
                            <textarea name="vision" class="form-control"></textarea>
                        </div>

                        <div class="mb-3">
                            <label>Foto</label>
                            <input type="file" name="photo" class="form-control">
                        </div>

                        <button class="btn btn-primary">Simpan</button>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection