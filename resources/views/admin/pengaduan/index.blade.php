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






                                    </div>
                                </div>


                        <div class="mt-3 table-responsive">
                            <table class="table table-bordered ">
                                <tr class="bg-warning text-white text-center">
                                    <th class="text-center" width="1%">No</th>
                                    <th class="text-center">Tanggal</th>
                                    <th class="text-center">Pengaduan</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                                @foreach ($datas as $data )
                                <tr>
                                    <td>{{++$i}}</td>
                                    <td>{{$data->created_at }}</td>
                                    <td>{{$data->judul_pengaduan }}</td>
                                    {{-- <td> {{$data->user->name ?? ''}} </td> --}}
                                    {{-- <td> {{$data->penerima->name ?? ''}} </td> --}}
                                    <td class="text-center">
                                        @if($data->status == null)
                                            <div class="bg-secondary text-white col-6 rounded text-center mx-auto">
                                                Belum diterima
                                            </div>
                                        @else
                                        <div class="bg-success text-white col-6 rounded text-center mx-auto">
                                            Sudah diterima
                                        </div>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if(Auth::user()->hasRole('pelapor'))
                                            <a href="{{ route('dashboard.pengaduan.detail', $data->id) }}"
                                                class="btn btn-sm btn-warning border-0  waves-effect waves-light fs-4">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            @if($data->status == null)

                                            <a href="{{ route('dashboard.pengaduan.ubah', $data->id) }}"
                                                class="btn btn-sm btn-primary border-0 waves-effect waves-light fs-4">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form class="d-inline"
                                                action="{{ route('dashboard.pengaduan.hapus', $data->id) }}"
                                                method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('DELETE')
                                                <button
                                                    class="btn btn-sm btn-danger border-0 waves-effect waves-light fs-4"
                                                    onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')"
                                                    type="submit">

                                                    <i class="fas fa-trash"></i>

                                                </button>
                                            @endif
                                        @endif


                                        @if(Auth::user()->hasRole('pelapor'))
                                        <a href="{{ route('dashboard.pengaduan.detail', $data->id) }}"
                                            class="btn btn-sm btn-warning border-0  waves-effect waves-light fs-4">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        @if($data->status == null)

                                        <a href="{{ route('dashboard.pengaduan.ubah', $data->id) }}"
                                            class="btn btn-sm btn-primary border-0 waves-effect waves-light fs-4">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form class="d-inline"
                                            action="{{ route('dashboard.pengaduan.hapus', $data->id) }}"
                                            method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                class="btn btn-sm btn-danger border-0 waves-effect waves-light fs-4"
                                                onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')"
                                                type="submit">

                                                <i class="fas fa-trash"></i>

                                            </button>
                                        @endif
                                    @else

                                    <a href="{{ route('dashboard.pengaduan.detail', $data->id) }}"
                                        class="btn btn-sm btn-warning border-0  waves-effect waves-light fs-4">
                                       Lihat & Verifikasi <i class="fas fa-eye"></i>
                                    </a>
                                    @endif




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
