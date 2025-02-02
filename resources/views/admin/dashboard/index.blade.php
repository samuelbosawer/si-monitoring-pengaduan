@extends('admin.layout.tamplate')
@section('title')
    Dashboard
@endsection
@section('content')
    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">
                {{-- @include('admin.layout.breadcump') --}}
                <div class="row mt-3">
                   <div class="col-12">
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Welcome {{Auth::user()->name.' | '.Auth::user()->email}}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                   </div>
                </div>
                <div class="row">

                    <div class="col-md-4">
                        <div class="card-box">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-sm bg-warning  rounded">
                                        <i data-feather="box" class=" avatar-title font-22 text-white"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-right">
                                        <h4 class="text-dark mb-1">Pengaduan</h4>
                                        <h3 class="text-dark my-1"> <span data-plugin="counterup">
                                        3  </span></h3>
                                    </div>
                                </div>
                            </div>

                        </div> <!-- end card-box-->
                    </div> <!-- end col -->

                    <div class="col-md-4">
                        <div class="card-box">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-sm bg-warning  rounded">
                                        <i data-feather="package" class=" avatar-title font-22 text-white"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-right">
                                        <h4 class="text-dark mb-1">Pendampingan</h4>
                                        <h3 class="text-dark my-1"> <span data-plugin="counterup">
                                        3  </span></h3>
                                    </div>
                                </div>
                            </div>

                        </div> <!-- end card-box-->
                    </div> <!-- end col -->


                    <div class="col-md-4">
                        <div class="card-box">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-sm bg-warning  rounded">
                                        <i data-feather="archive" class=" avatar-title font-22 text-white"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-right">
                                        <h4 class="text-dark mb-1">Riwayat</h4>
                                        <h3 class="text-dark my-1"> <span data-plugin="counterup">
                                        3  </span></h3>
                                    </div>
                                </div>
                            </div>

                        </div> <!-- end card-box-->
                    </div> <!-- end col -->



                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="col-md-12">
                            <div class="card-box">
                                <div class="row">

                                    <div class="d-flex align-items-center">
                                          <i style="width: 30px" data-feather="info" class=" avatar-title text-dark "></i> <span class="ml-1 font-weight-bold">Informasi </span>
                                    </div>



                                    </div>
                                    <div class="col-12 p-3">
                                        <p>Informasi belum ada</p>
                                    </div>
                                </div>

                            </div> <!-- end card-box-->
                        </div> <!-- end col -->

                    </div>
                </div>

            </div> <!-- container -->

        </div> <!-- content -->

    @endsection
