@extends('layouts.front.app')

@section('content')
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

<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
    </ol>
</nav>

<div class="row">
    <div class="col-md-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Contact Us</h6>
                <p class="text-muted mb-3">Terhubung bersama kami, dengan mengirim pesan kepada kami melalui form dibawah ini!</p>
                <form action="{{ route('contact.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Nama Lengkap" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea class="form-control" id="message" rows="4" placeholder="Pesan Anda" name="message" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Send Message</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection