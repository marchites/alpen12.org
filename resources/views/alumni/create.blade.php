<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Alumni Penerbangan SMK Negeri 12 Bandung">
    <meta name="author" content="Alpen12">
    <meta name="keywords" content="alpen12, penerbangan, alumni, smkn12bandung">

    <title>Alpen12 - Alumni Penerbangan 12</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!-- End fonts -->

    <!-- core:css -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/core/core.css') }}">
    <!-- endinject -->

    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
    <!-- End plugin css for this page -->

    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/feather-font/css/iconfont.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <!-- endinject -->

    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/demo1/style.css') }}">
    <!-- End layout styles -->

    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.jpeg') }}" />
</head>

<body>

    <div class="page-content">

        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div class="container py-4">
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

                        <h5 class="mb-4">Form Data Alumni</h5>

                        <form method="POST" action="{{ route('alumni.store') }}">
                            @csrf


                            <div class="mb-3">
                                <label class="form-label">Nama Lengkap</label>
                                <input type="text" name="nama" class="form-control" required>
                            </div>


                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Tahun Lulus</label>
                                    <input type="number" name="tahun_lulus" class="form-control" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Jurusan</label>
                                    <input type="text" name="jurusan" class="form-control" required>
                                </div>
                            </div>


                            <div class="mb-3">
                                <label class="form-label">Pekerjaan</label>
                                <input type="text" name="pekerjaan" class="form-control">
                            </div>


                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">No. Handphone (WhatsApp)</label>
                                    <input type="text" name="no_hp" class="form-control" placeholder="08xxxxxxxxxx" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control">
                                </div>
                            </div>


                            <div class="mb-4">
                                <label class="form-label">Domisili / Kota</label>
                                <input type="text" name="domisili" class="form-control" required>
                            </div>


                            <div class="d-flex justify-content-between">
                                <a href="{{ route('admin.alumni.index') }}" class="btn btn-secondary">Kembali</a>
                                <button class="btn btn-primary">Simpan Data</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>