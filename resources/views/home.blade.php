@extends('layouts.front.app')

@section('content')
<div class="container">
    <div class="card mb-4 border-0 shadow-sm">
        <div class="card-body">
            <div class="card-title"><h5>Selamat datang di Sistem Pengelolaan Database dan Pemungutan Suara ALPEN 12</h5></div>
            <p class="mb-4">Ini adalah sistem pengelolaan data alumni dan pemungutan suara resmi untuk ALPEN 12. Di sini, Anda dapat memberikan suara Anda untuk pemilihan mendatang dan melihat hasilnya.</p>
        </div>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-5">
            <div class="card-title"><h5>Timeline Pemungutan Suara</h5></div>
            <p class="mb-4">Untuk berpartisipasi dalam proses pemungutan suara, silakan mengikuti langkah-langkah berikut:</p>
            <div id="content">
                <ul class="timeline">
                    <li class="event" data-date="February 2026">
                        <h3 class="title">Gabung dengan Group WhatsApp</h3>
                        <p>Pastikan Anda telah bergabung ke group <b>Perwakilan Angkatan ALPEN 12</b>, yang linknya akan dikirimkan secara manual setelah Anda melakukan Registrasi Database Alumni.</p>
                    </li>
                    <li class="event" data-date="February 2026">
                        <h3 class="title">Registrasi Alumni</h3>
                        <p>Pastikan Anda telah mendaftar sebagai alumni ALPEN 12 sebelum mendaftarkan diri sebagai Voter dengan mengisi form database pada halaman <a href="{{ route('alumni.create') }}">Registrasi</a>.</p> 
                        <br>
                        <p><i>Catatan: alumni yang berhak melakukan voting adalah alumni yang sudah terdaftar di database dan telah dipilih oleh masing-masing koordinator angkatan.</i></p>
                    </li>
                    <li class="event" data-date="Maret 2026">
                        <h3 class="title">Token Pemungutan Suara</h3>
                        <p>Bagi alumni yang telah terdaftar sebagai Voter, maka akan diberikan token berupa link yang mengarah pada halaman pemungutan suara oleh masing-masing koordinator tiap angkatan.</p> 
                        <br>
                        <p><i>Catatan: Token hanya berlaku sekali pakai dan hanya bisa digunakan pada waktu pemungutan suara dibuka, mohon pergunakan sebaik mungkin hak suara Anda.</i></p>
                    </li>
                    <li class="event" data-date="Maret 2026">
                        <h3 class="title">Waktu Pemungutan Suara</h3>
                        <p>Bagi alumni yang sudah terdaftar sebagai Voter, maka berhak melakukan pemungutan suara untuk memilih kandidat calon Ketua dan Wakil Ketua Alpen Periode 2026 - 2031</p> 
                        <p><i>Catatan: Hasil Sementara dapat dilihat melalui halaman <a href="{{ route('election.results') }}">Hasil Pemungutan Suara</a>.</i></p>
                    </li>
                    <li class="event" data-date="Maret 2026">
                        <h3 class="title">Hasil Pemungutan Suara</h3>
                        <p>Hasil akhir pemungutan suara akan diumumkan setelah proses pemungutan suara selesai.</p> 
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection