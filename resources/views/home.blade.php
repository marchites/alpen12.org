@extends('layouts.front.app')

@section('content')
<div class="container">
    <!-- Swiper -->
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <a href="{{ route('alumni.create') }}">
                    <img src="{{ asset('assets/images/slider/slider1.png') }}" alt="Registrasi Alumni">
                </a>
            </div>
            <div class="swiper-slide">
                <a href="{{ route('election.results') }}">
                    <img src="{{ asset('assets/images/slider/slider2.png') }}" alt="Hasil Pemungutan Suara">
                </a>
            </div>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>
        <div class="autoplay-progress">
            <svg viewBox="0 0 48 48">
                <circle cx="24" cy="24" r="20"></circle>
            </svg>
            <span></span>
        </div>
        <div class="swiper-scrollbar"></div>
    </div>

    <div class="card mb-4 border-0 shadow-sm mt-5">
        <div class="card-body">
            <div class="card-title">
                <h4>Selamat datang di Official Website Alpen 12</h4>
            </div>
            <p class="mb-4 text-muted">Website ini dibuat sebagai sistem pengelolaan data alumni, berita terbaru seputar Alpen 12, dan pemungutan suara resmi untuk ALPEN 12. Di sini, Anda dapat memberikan suara Anda untuk pemilihan mendatang dan melihat hasilnya.</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-5">
                    <div class="card-title">
                        <h5>Timeline Pemungutan Suara</h5>
                    </div>
                    <p class="mb-4 text-muted">Dalam rangka Pemilihan Pengurus Alpen 12 Tahun 2026 - 2031, berikut timeline yang telah kami buat agar seluruh Alumni SMKN 12 Bandung dan atau Alumni STM Penerbangan Bandung dapat mengikuti proses pemungutan suara secara transparan, jujur, dan adil.</p>
                    <p class="mb-2 text-muted">Berikut adalah timeline pemungutan suara:</p>
                    <div id="content">
                        <ul class="timeline">
                            <li class="event" data-date="7 Feb - 13 Feb 2026">
                                <h3 class="title">Gabung dengan Group WhatsApp</h3>
                                <p>Pastikan Anda telah bergabung ke group <b>Perwakilan Angkatan ALPEN 12</b>, yang linknya akan dikirimkan secara manual setelah Anda melakukan Registrasi Database Alumni.</p>
                            </li>
                            <li class="event" data-date="13 Feb - 31 Mar 2026">
                                <h3 class="title">Registrasi Alumni</h3>
                                <p>Pastikan Anda telah mendaftar sebagai alumni ALPEN 12 sebelum mendaftarkan diri sebagai Voter dengan mengisi form database pada halaman <a href="{{ route('alumni.create') }}">Registrasi</a>.</p>
                                <br>
                                <p><i>Catatan: alumni yang berhak melakukan voting adalah alumni yang sudah terdaftar di database dan telah dipilih oleh masing-masing koordinator angkatan.</i></p>
                            </li>
                            <li class="event" data-date="31 Maret - 7 Apr 2026">
                                <h3 class="title">Token Pemungutan Suara</h3>
                                <p>Bagi alumni yang telah terdaftar sebagai Voter, maka akan diberikan token berupa link yang mengarah pada halaman pemungutan suara oleh masing-masing koordinator tiap angkatan.</p>
                                <br>
                                <p><i>Catatan: Token hanya berlaku sekali pakai dan hanya bisa digunakan pada waktu pemungutan suara dibuka, mohon pergunakan sebaik mungkin hak suara Anda.</i></p>
                            </li>
                            <li class="event" data-date="11 Apr - 12 Apr 2026">
                                <h3 class="title">Waktu Pemungutan Suara</h3>
                                <p>Bagi alumni yang sudah terdaftar sebagai Voter, maka berhak melakukan pemungutan suara untuk memilih kandidat calon Ketua dan Wakil Ketua Alpen Periode 2026 - 2031</p>
                                <p><i>Catatan: Hasil Sementara dapat dilihat melalui halaman <a href="{{ route('election.results') }}">Hasil Pemungutan Suara</a>.</i></p>
                            </li>
                            <li class="event" data-date="13 Apr 2026">
                                <h3 class="title">Hasil Pemungutan Suara</h3>
                                <p>Hasil akhir pemungutan suara akan diumumkan setelah proses pemungutan suara selesai.</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body">
                    <h5 class="card-title mb-4">📰 Berita Terbaru</h5>

                    <!-- Berita Item -->
                    <div class="mb-3">
                        <h6 class="mb-1">
                            <a href="#" class="text-decoration-none text-dark">
                                Pendaftaran Voter Telah Dibuka
                            </a>
                        </h6>
                        <small class="text-muted">20 Februari 2026</small>
                    </div>

                    <hr>

                    <div class="mb-3">
                        <h6 class="mb-1">
                            <a href="#" class="text-decoration-none text-dark">
                                Tata Cara Pemungutan Suara Online
                            </a>
                        </h6>
                        <small class="text-muted">18 Februari 2026</small>
                    </div>

                    <hr>

                    <div class="mb-3">
                        <h6 class="mb-1">
                            <a href="#" class="text-decoration-none text-dark">
                                Jadwal Resmi Pemilihan Alpen 12
                            </a>
                        </h6>
                        <small class="text-muted">15 Februari 2026</small>
                    </div>

                    <div class="text-center mt-4">
                        <a href="#" class="btn btn-sm btn-outline-primary">
                            Lihat Semua Berita
                        </a>
                    </div>
                </div>
            </div>

             <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title mb-4">📰 Artikel Terbaru</h5>

                    <!-- Berita Item -->
                    <div class="mb-3">
                        <h6 class="mb-1">
                            <a href="#" class="text-decoration-none text-dark">
                                Sejarah didirikannya ALPEN 12
                            </a>
                        </h6>
                        <small class="text-muted">20 Februari 2026</small>
                    </div>

                    <hr>

                    <div class="mb-3">
                        <h6 class="mb-1">
                            <a href="#" class="text-decoration-none text-dark">
                                Alpen Peduli: Program Sosial ALPEN 12 untuk Masyarakat
                            </a>
                        </h6>
                        <small class="text-muted">18 Februari 2026</small>
                    </div>

                    <hr>

                    <div class="mb-3">
                        <h6 class="mb-1">
                            <a href="#" class="text-decoration-none text-dark">
                                Catat ! Jadwal Event ALPEN 12 Tahun 2026
                            </a>
                        </h6>
                        <small class="text-muted">15 Februari 2026</small>
                    </div>

                    <div class="text-center mt-4">
                        <a href="#" class="btn btn-sm btn-outline-primary">
                            Lihat Semua Berita
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection