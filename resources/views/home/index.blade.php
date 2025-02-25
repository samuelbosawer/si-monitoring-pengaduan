<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>SI Monitoring Dan Evaluasi Pengaduan
        Tindak Kekerasan Terhadap Perempuan & Anak </title>
    <meta name="keywords" content=" SI Monitoring Dan Evaluasi Pengaduan Tindak Kekerasan Terhadap Perempuan & Anak">
    <meta content=" SI Monitoring Dan Evaluasi Pengaduan Tindak Kekerasan Terhadap Perempuan & Anak"
        name="description" />

    <meta name="author" content="Ester TA">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="/assets-visitor/css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="/assets-visitor/css/style.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="/assets-visitor/css/responsive.css">
    <!-- fevicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/logo.png') }}">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="/assets-visitor/css/jquery.mCustomScrollbar.min.css">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
        media="screen">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<!-- body -->

<body class="main-layout">
    <!-- loader  -->
    <div class="loader_bg">
        <div class="loader"><img src="/assets-visitor/images/loading.gif" alt="#" /></div>
    </div>
    <!-- end loader -->
    <!-- header -->
    <header>
        <!-- header inner -->
        <div class="header ">
            <div class="head_top ">
                <div class="container ">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                            <div class="top-box">
                                <ul class="sociel_link">
                                    <li> <a href="#"><i class="fa fa-facebook-f"></i></a></li>
                                    <li> <a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li> <a href="#"><i class="fa fa-instagram"></i></a></li>
                                    <li> <a href="#"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                            <div class="top-box">
                                <p>Email : <strong class="font-weight-bold">sipengaduam@jayapura.go.id</strong> & Hp:
                                    <strong class="font-weight-bold">082198159123</strong></p>
                                {{-- <p> SI Monitoring Dan Evaluasi Pengaduan Tindak Kekerasan Terhadap Perempuan & Anak </p> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container ">
                <div class="row ">
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                        <div class="full">
                            <div class="center-desk">
                                <div class="logo"> <a href="/"><img src="/assets/images/logo.png"
                                            class="img-fluid" width="80" alt="logo" /></a> </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-11 col-sm-11">
                        <div class="menu-area">
                            <div class="limit-box">
                                <nav class="main-menu">
                                    <ul class="menu-area-main">
                                        <li class=""> <a href="#beranda">Beranda</a> </li>
                                        <li> <a href="#tentang">Tentang Kami</a> </li>
                                        <li> <a href="#layanan">Layanan</a> </li>
                                        {{-- <li> <a href="/assets-visitor/blog.html"> Blog</a> </li> --}}
                                        <li> <a href="#kontak">Kontak</a> </li>

                                        @if (!Auth::user())
                                        <li class=""> <a href="{{ route('daftar') }}"> Daftar</a> </li>
                                        <li class=""> <a class="" href="{{ route('login') }}"> Login</a> </li>
                                        @else
                                        <li class=""> <a class="" href="{{ route('dashboard.home') }}"> Dashboard</a> </li>

                                        @endif
                                        <li> <a href="#kontak"></a> </li>


                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2">
                        @if (Auth::user())
                        <li><a class="buy font-weight-bold" href="{{route('dashboard.home')}}">DASHBOARD</a></li>
                        @else
                            <li><a class="buy font-weight-bold" href="/login">LOGIN</a></li>

                        @endif
                    </div> --}}
                </div>
            </div>
            <!-- end header inner -->
    </header>
    <!-- end header -->
    <section class="slider_section d-none d-md-block d-md-none">
        <div id="main_slider" class="carousel slide banner-main" data-ride="carousel">

            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="first-slide" src="/assets-visitor/images/banner.jpg" alt="First slide">
                    <div class="container">
                        <div class="carousel-caption relative text-center text-white">
                            <h2 class="text-white text-uppercase "> <strong>Sistem Informasi Monitoring Dan
                                    Evaluasi</strong> <br> </h2>
                            <h3 class="text-white text-uppercase"> <strong>Pengaduan Tindak Kekerasan Terhadap Perempuan
                                    & Anak</strong> </h3>
                            <a class="text-white p-3 font-weight-bold" href="{{ route('dashboard.pengaduan.tambah') }}">
                                Buat Pengaduan</a>
                        </div>
                    </div>
                </div>

            </div>


        </div>

    </section>


    <div class="product" id="tentang">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ">
                    <div class="title">
                        <h2>Tentang <strong class="black">Kami</strong></h2>
                        <div class="text-center">
                            <span>"Aman Melapor, Transparan Menangani, Lindungi Hak Perempuan & Anak"</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="about_box">
                        <figure><img class="rounded shadow" src="/assets-visitor/images/layout.jpg" /></figure>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="about_box">
                        <h3>Apa Itu Sistem Informasi Monitoring dan Evaluasi Pengaduan Tindak Kekerasan Terhadap
                            Perempuan & Anak? </h3>
                        <p style="text-align: justify;">Sistem Informasi Monitoring dan Evaluasi Pengaduan Tindak
                            Kekerasan Terhadap Perempuan & Anak adalah platform yang bertujuan untuk mendukung upaya
                            perlindungan hak-hak perempuan dan anak dari berbagai bentuk kekerasan. Kami hadir sebagai
                            solusi digital untuk mempermudah pelaporan, pemantauan, dan evaluasi pengaduan secara
                            efektif dan transparan.</p>

                        <p style="text-align: justify;" class="mt-3">
                            Platform ini dikembangkan dengan mengedepankan aspek kerahasiaan dan keamanan data sehingga
                            pelapor dapat merasa aman dan nyaman dalam menyampaikan keluhan mereka.
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </div>




    <!-- service -->
    <div class="service" id="layanan">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="title">
                        <h2>Layanan <strong class="black"></strong></h2>
                        <span>Layanan pelaporan kekerasan online dengan pemantauan status real-time dan evaluasi tindak
                            lanjut yang transparan, aman, dan efisien.</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                    <div class="service-box">
                        <i><img class="rounded" src="/assets-visitor/icon/pengaduan.webp" /></i>
                        <h3>Pengaduan</h3>
                        <p>Pengaduan online aman, mudah, real-time, dan rahasia terjamin. </p>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                    <div class="service-box">
                        <i><img src="/assets-visitor/icon/pendampingan.webp" /></i>
                        <h3>Pendampingan</h3>
                        <p>Pendampingan profesional, empati, aman, rahasia, dan dukungan berkelanjutan. </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- end service -->








    <footer>
        <div class="footer" id="kontak">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 ">
                        <div class="text-center">
                            <h1 class="text-warning" style="font-size: 40px; " > <strong class="yellow">KONTAK</strong></h1>
                            <div class="text-center yellow">
                                <span class="text-white" style="font-size: 20px; ">Silahkan Menghubungi Kami Melalui Kontak Yang Tersedia</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-content-center align-items-center ">
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                        <div class="contact text-center">
                            <h3 class="text-warning font-weight-bold ">TELEPON</h3>
                            <span> 082198148721</span>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                        <div class="contact text-center">
                            <h3 class="text-warning font-weight-bold">Email</h3>
                            <span> sipengaduam@jayapura.go.id</span>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                        <div class="contact text-center">
                            <h3 class="text-warning font-weight-bold">Alamat</h3>
                            <span> Jalan Raya Kota Jayapura</span>
                        </div>
                    </div>

                </div>
            </div>
            <div class="copyright text-dark text-center">
                <script>document.write(new Date().getFullYear())</script> &copy; Copyrigt <a href="#">    SI Monitoring Dan Evaluasi Pengaduan
                    Tindak Kekerasan Terhadap Perempuan & Anak</a>
                </p>
            </div>

        </div>
    </footer>
    <!-- end footer -->
    <!-- Javascript files-->
    <script src="/assets-visitor/js/jquery.min.js"></script>
    <script src="/assets-visitor/js/popper.min.js"></script>
    <script src="/assets-visitor/js/bootstrap.bundle.min.js"></script>
    <script src="/assets-visitor/js/jquery-3.0.0.min.js"></script>
    <script src="/assets-visitor/js/plugin.js"></script>
    <!-- sidebar -->
    <script src="/assets-visitor/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="/assets-visitor/js/custom.js"></script>
    <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".fancybox").fancybox({
                openEffect: "none",
                closeEffect: "none"
            });

            $(".zoom").hover(function() {

                $(this).addClass('transition');
            }, function() {

                $(this).removeClass('transition');
            });
        });
    </script>
</body>

</html>
