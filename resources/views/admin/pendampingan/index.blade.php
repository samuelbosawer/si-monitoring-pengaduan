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
                                <h4 class="header-title"> Data Pendampingan</h4>
                                <div class="row mt-3 d-flex justify-content-between">
                                    <div class="col-8">
                                        @include('admin.layout.search')
                                    </div>

                                    <div class="">

                                        @if (Auth::user()->hasRole('kepaladinas'))
                                        <a class="btn btn-danger" target="_blank" href="{{ route('dashboard.pendampingan.pdf_index') }}">
                                            Cetak PDF <i data-feather="file-text"></i></a>
                                        @endif
                                    </div>
                                </div>


                        <div class="mt-3 table-responsive">
                            <table class="table table-bordered ">
                                <tr class="bg-warning text-white text-center">
                                    <th class="text-center" width="1%">No</th>
                                    <th class="text-center">Tanggal</th>
                                    <th class="text-center">Pengaduan</th>
                                    <th>Jumlah Pendampingan</th>
                                    <th>Aksi</th>
                                </tr>
                                @foreach ($datas as $data )
                                <tr>
                                    <td>{{++$i}}</td>
                                    <td class="text-center">{{ \Carbon\Carbon::parse($data->created_at)->locale('id')->translatedFormat('l, d F Y H:i') }}</td>
                                    <td>{{$data->judul_pengaduan }}</td>
                                    <td class="text-center">
                                        @if($data->pendampingan != null)
                                     {{$data->pendampingan->count()}}
                                        @else
                                       0
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        {{-- @if($data->status != null) --}}
                                        <a href="{{ route('dashboard.pendampingan.detail', $data->id) }}"
                                            class="btn btn-sm btn-primary border-0  waves-effect waves-light fs-4">
                                            Lihat Pendampingan <i class="fas fa-eye"></i>
                                        </a>
                                        {{-- @endif --}}

                                    </td>
                                </tr>
                                @endforeach



                            </table>
                        </div>
                        <!-- end .mt-4 -->
                        {!! $datas->links() !!}


                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col -->
        </div>
        {{-- end row --}}





    </div> <!-- container -->

    </div> <!-- content -->
@endsection
