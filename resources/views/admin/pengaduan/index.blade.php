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
                                    <div class="col-10">
                                        @include('admin.layout.search')
                                    </div>

                                    <div class="">

                                        <div class="">
                                            @if (Auth::user()->hasRole('pelapor'))
                                                <a class="btn m-1 btn-dark" href="{{ route('dashboard.pengaduan.tambah') }}">
                                                    Tambah Data <i data-feather="plus"></i></a>
                                            @endif

                                            @if (Auth::user()->hasRole('kepaladinas|pendampingdinas|kepalabidang'))

                                                <a class="btn m-1 btn-danger" target="_blank"
                                                    href="{{ route('dashboard.pengaduan.pdf') }}">
                                                    Cetak PDF <i data-feather="file-text"></i></a>
                                            @endif
                                        </div>

                                        <!-- <a class="btn btn-success" href="">Cetak Excel <i data-feather="printer"></i></a> -->
                                    </div>






                                </div>

                                <div class="mt-3 table-responsive-md p-2">
                                    <table class="table table-bordered w-100 ">
                                        <thead>
                                            <tr class="bg-warning text-white text-center">
                                                <th class="text-center" width="1%">No</th>
                                                <th class="text-center" width="1%">ID</th>
                                                <th class="text-center" width="20%">Tanggal</th>
                                                <th class="text-center">Pengaduan</th>
                                                <th class="text-center">Pendamping</th>

                                                {{-- <th>Status Pengaduan</th> --}}
                                                <th>Catatan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($datas as $data)
                                                <tr>
                                                    <td scope="row">{{ ++$i }}</td>
                                                    <td>{{$data->id}}</td>
                                                    <td>{{ \Carbon\Carbon::parse($data->created_at)->locale('id')->translatedFormat('l, d F Y H:i') }}
                                                    </td>
                                                    <td>{{ $data->judul_pengaduan }}</td>
                                                    <td>{{$data->pendampingans->name ?? 'Belum ada'}}</td>
                                                    {{-- <td class="text-center">
                                                        @if ($data->status == 'Dalam proses')
                                                            <div
                                                                class="bg-secondary text-white rounded text-center mx-auto">
                                                                Dalam proses
                                                            </div>
                                                        @endif

                                                        @if ($data->status == 'Diterima')
                                                            <div
                                                                class="bg-success text-white rounded text-center mx-auto">
                                                                Sudah diterima
                                                            </div>
                                                        @endif

                                                        @if ($data->status == 'Tidak diterima')
                                                            <div
                                                                class="bg-danger text-white rounded text-center mx-auto">
                                                                Tidak diterima
                                                            </div>
                                                        @endif

                                                        @if ($data->status == 'Selesai')
                                                            <div
                                                                class="bg-success text-white rounded text-center mx-auto">
                                                                Selesai
                                                            </div>
                                                        @endif


                                                    </td> --}}

                                                    <td>{{ $data->catatan ?? '-' }}</td>

                                                    <td class="text-center">



                                                        @if (Auth::user()->hasRole('pelapor'))
                                                            <a href="{{ route('dashboard.pengaduan.detail', $data->id) }}"
                                                                class="btn btn-sm m-1 btn-warning border-0  waves-effect waves-light fs-4">
                                                                <i class="fas fa-eye"></i>
                                                            </a>
                                                            <a href="{{ route('dashboard.pengaduan.ubah', $data->id) }}"
                                                                class="btn btn-sm m-1 btn-primary border-0 waves-effect waves-light fs-4">
                                                                <i class="fas fa-edit"></i>
                                                            </a>

                                                            @if ($data->status == null)
                                                                <form class="d-inline"
                                                                    action="{{ route('dashboard.pengaduan.hapus', $data->id) }}"
                                                                    method="POST" enctype="multipart/form-data">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button
                                                                        class="btn btn-sm m-1 btn-danger border-0 waves-effect waves-light fs-4"
                                                                        onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')"
                                                                        type="submit">

                                                                        <i class="fas fa-trash"></i>

                                                                    </button>
                                                            @endif
                                                        @else
                                                            <a href="{{ route('dashboard.pengaduan.detail', $data->id) }}"
                                                                class="btn btn-sm m-1 btn-warning border-0  waves-effect waves-light fs-4">
                                                                Lihat & Validasi <i class="fas fa-eye"></i>
                                                            </a>
                                                        @endif
                                                        <a alt="pendampingan"
                                                            href="{{ route('dashboard.pendampingan.detail', $data->id) }}"
                                                            class="btn btn-sm m-1 btn-success border-0 waves-effect waves-light fs-4">
                                                            <i class="fas fa-user-alt"></i>
                                                            {{ $data->pendampingan->count() }} {{ $data->latestPendampingan->status_pendampingan ?? 'Belum ada pendampingan' }}
                                                        </a>

                                                    </td>

                                                </tr>
                                            @endforeach
                                        </tbody>


                                    </table>
                                </div>
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
