<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Daftar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="{{ asset($pengaturan->desk_web ?? '') }}" name="description" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('assets/images/logo.png')}}">


    <!-- App css -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
    <link href="/assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

    <link href="/assets/css/bootstrap-dark.min.css" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" />
    <link href="/assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="app-dark-stylesheet" />

    <!-- icons -->
    <link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css" />

</head>

<body class="loading authentication-bg authentication-bg-pattern">
    @include('sweetalert::alert')
    <div class="account-pages mt-5 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-12 col-xl-12">
                    <div class="card bg-pattern mx-auto">

                        <div class="card-body p-4 ">

                            <div class="row m-auto d-flex align-items-center  ">
                                <div class="col-md-6  order-2">
                                    <form class="" method="POST" action="{{ route('daftar.store') }}">
                                        @csrf
                                        <h4 class=" mb-4 mt-3 text-center font-weight-bold ">DAFTAR AKUN </h4>

                                        <div class="form-group mb-3">
                                            <label for="name">Nama Lengkap</label>
                                            <input class="form-control" type="" name="name"
                                                value="{{ old('name') }}" id="name" required=""
                                                placeholder="">

                                            @error('name')
                                                <span class="text-danger">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" type="" name="email"
                                                value="{{ old('email') }}" id="email" required=""
                                                placeholder="">

                                            @error('email')
                                                <span class="text-danger">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="no_hp">No HP <span class="text-sm">(contoh : 082198159721)</span> </label>
                                            <input class="form-control" type="" name="no_hp"
                                                value="{{ old('no_hp') }}" id="no_hp" required=""
                                                placeholder="">

                                            @error('no_hp')
                                                <span class="text-danger">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>



                                        <div class="form-group mb-3">
                                            <label for="password">Password</label>
                                            <input class="form-control" type="password" name="password"
                                                value="{{ old('password') }}" id="password" required=""
                                                placeholder="">

                                            @error('password')
                                                <span class="text-danger">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="password_confirmation">Konfirmasi Password</label>
                                            <input class="form-control" type="password" name="password_confirmation"
                                                value="{{ old('password_confirmation') }}" id="password_confirmation" required=""
                                                placeholder="">

                                            @error('password_confirmation')
                                                <span class="text-danger">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>




                                        <div class="form-group mb-0 text-center">
                                            <button class="btn btn-warning btn-block" type="submit"> DAFTAR </button>
                                        </div>

                                    </form>
                                </div>
                                <div class="col-md-6 text-center order-1 ">

                                    <div class="auth-logo">
                                        <a href="#" class="logo logo-dark text-center">
                                            <h4 class="logo-lg font-weight-bold">

                                                SISTEM INFORMASI MONITORING DAN EVALUASI PENGADUAN
                                                TINDAK KEKERASAN TERHADAP PEREMPUAN & ANAK

                                            </h4>
                                            <img src="/assets/images/logo.png"  width="50%" alt=""
                                            srcset="">
                                        </a>


                                    </div>
                                </div>

                            </div>





                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->

                    <div class="row mt-3">
                        <div class="col-12 text-center">
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->

                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->


    <footer class="footer footer-alt">
        <script>
            document.write(new Date().getFullYear())
        </script> &copy;   SI Monitoring Dan Evaluasi Pengaduan
                                                Tindak Kekerasan Terhadap Perempuan & Anak
    </footer>

    <!-- Vendor js -->
    <script src="/assets/js/vendor.min.js"></script>

    <!-- App js -->
    <script src="/assets/js/app.min.js"></script>

</body>

</html>
