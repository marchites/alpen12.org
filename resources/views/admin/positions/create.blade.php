@extends('layouts.app')

@section('content')
<div class="container py-4">

    <div class="card shadow-sm">
        <div class="card-body">
            <h4 class="mb-4">Tambah Jabatan</h4>

            <form method="POST" action="/admin/positions">
                @csrf

                <div class="mb-3">
                    <label>Nama Jabatan</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Urutan</label>
                    <input type="number" name="order" class="form-control" required>
                </div>

                <button class="btn btn-primary">Simpan</button>
            </form>

        </div>
    </div>

</div>
@endsection
