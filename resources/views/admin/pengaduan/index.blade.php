@extends('admin.layout.tamplate')
@section('title')
    Data Pengaduan
@endsection
@section('content')
    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">

                @include('admin.layout.breadcump')

                <div class="row">
                    <div class="col-12 ">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title"> Data Pengaduan</h4>
                                <div class="row mt-3 d-flex justify-content-between">
                                    <div class="col-8">
                                        @include('admin.layout.search')
                                    </div>

                                    <div class="">

                                        @if (Auth::user()->hasRole('admindinas'))
                                            <a class="btn btn-dark" href="{{ route('dashboard.pengaduan.tambah') }}"> Tambah
                                                Data <i data-feather="plus"></i></a>




                                        @endif
                                    </div>
                                </div>


                        <div class="mt-3 table-responsive">
                            <table class="table table-bordered">
                                <tr class="bg-warning text-white">
                                    <th width="1%">No</th>
                                    <th>Tanggal</th>
                                    <th>Pelapor</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>

                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>


                            </table>
                        </div>
                        <!-- end .mt-4 -->


                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col -->
        </div>
        {{-- end row --}}





    </div> <!-- container -->

    </div> <!-- content -->
@endsection
