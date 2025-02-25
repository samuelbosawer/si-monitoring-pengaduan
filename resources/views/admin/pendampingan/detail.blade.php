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
                                <p> Pengaduan Kasus <span class=""></span> {{ $pengaduan->judul_pengaduan }} </p>

                                <div class="">
                                    @if (!Auth::user()->hasRole('pelapor|kepalabidang'))
                                        <a class="btn btn-sm btn-dark rouded"
                                            href="{{ route('dashboard.pendampingan.tambah', $id_pengaduan) }}"> Tambah Data
                                            Pendampingan <i data-feather="plus"></i></a>
                                    @endif
                                </div>

                                <div class="row mt-3 d-flex justify-content-between">
                                    <div class="col-8">
                                        <form action="{{ url(Request::segment(1) . '/' . Request::segment(2) .'/'.Request::segment(3) . '/' . Request::segment(4)) }}" method="get">
                                            <div class="input-group ">
                                                <input type="search" name="s" class="form-control" placeholder="Masukan Kata Kunci Pencarian ...." value="{{ request()->s ?? '' }}">
                                                <button type="submit" class="btn btn-dark waves-effect waves-light">
                                                    Cari
                                                </button>
                                            </div>
                                            </form>

                                    </div>
                                    <div>
                                        @if (Auth::user()->hasRole('kepaladinas|pendampingdinas'))
                                        <a class="btn btn-danger" target="_blank" href="{{ route('dashboard.pendampingan.pdf_detail',Request::segment(4)) }}">
                                            Cetak PDF <i data-feather="file-text"></i></a>
                                        @endif
                                    </div>
                                </div>

                                <div class="row mt-3">

                                    @foreach ($datas as $data)
                                        <div class="col-md-4 ">
                                            <div class="card shadow rounded border">
                                                <div class="card-body">
                                                    <h4 class="header-title "> {{ $data->judul_pendampingan }} </h4>
                                                    <p> {{ \Carbon\Carbon::parse($data->created_at)->locale('id')->translatedFormat('l, d F Y H:i') }}
                                                    </p>
                                                    <p class="bg-warning p-2 text-white rounded">Status : <b> {{$data->status_pendampingan}} </b></p>
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
