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
                                <h4 class="header-title"> Detail Data Pendampingan</h4>
                                <p> Pengaduan Kasus <span class=""></span> {{$pengaduan->judul_pengaduan}} </p>

                                <div class="">
                                    @if(!Auth::user()->hasRole('pelapor|kepalabidang'))
                                    {{-- <a class="btn btn-sm btn-dark rouded" href="{{route('dashboard.pendampingan.tambah',$id_pendampingan)}}"> Tambah Data Pendampingan <i data-feather="plus"></i></a> --}}
                                    @endif
                                </div>

                                <div class="row mt-3 d-flex justify-content-between">
                                    <div class="col-8">
                                        {{-- @include('admin.layout.search') --}}
                                    </div>
                                </div>

                                <div class="row mt-3">

                                    @foreach ($datas as $data )
                                    <div class="col-md-4 ">
                                        <div class="card shadow rounded border" >
                                            <div class="card-body">
                                                    <h4 class="header-title "> {{$data->judul_pendampingan}} </h4>
                                                    <p> {{$data->created_at}} </p>
                                                    <a href="{{ route('dashboard.pendampingan.detail.sub', $data->id) }}"
                                                        class="btn btn-sm btn-primary border-0  waves-effect waves-light fs-4">
                                                        Detail <i class="fas fa-eye"></i>
                                                    </a>
                                                </div>
                                        </div>
                                    </div>

                                    @endforeach







                                </div> <!-- end card-->
                            </div> <!-- end col -->



                            </div> <!-- end card-body-->
                        </div>
                        {{-- end row --}}





                    </div> <!-- container -->

                </div> <!-- content -->
            @endsection
