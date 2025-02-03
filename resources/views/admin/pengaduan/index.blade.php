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

                                        @if (Auth::user()->hasRole('pelapor'))
                                            <a class="btn btn-dark rounded" href="{{ route('dashboard.pengaduan.tambah') }}"> Tambah
                                                Data <i data-feather="plus"></i></a>




                                        @endif
                                    </div>
                                </div>


                        <div class="mt-3 table-responsive">
                            <table class="table table-bordered ">
                                <tr class="bg-warning text-white">
                                    <th width="1%">No</th>
                                    <th>Tanggal</th>
                                    <th>Pelapor</th>
                                    <th>Penerima</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                                @foreach ($datas as $data )
                                <tr>
                                    <td>{{++$i}}</td>
                                    <td>{{$data->created_at }}</td>
                                    <td> {{$data->user->name ?? ''}} </td>
                                    <td> {{$data->penerima->name ?? ''}} </td>
                                    <td> {{$data->status}} </td>
                                    <td>
                                        <a href="{{ route('dashboard.pengaduan.detail', $data->id) }}"
                                            class="btn btn-sm btn-outline-warning border-0  waves-effect waves-light fs-4">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('dashboard.pengaduan.ubah', $data->id) }}"
                                            class="btn btn-sm btn-outline-primary border-0 waves-effect waves-light fs-4">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form class="d-inline"
                                            action="{{ route('dashboard.pengaduan.hapus', $data->id) }}"
                                            method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                class="btn btn-sm btn-outline-danger border-0 waves-effect waves-light fs-4"
                                                onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')"
                                                type="submit">

                                                <i class="fas fa-trash"></i>

                                            </button>
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
