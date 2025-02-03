@extends('admin.layout.tamplate')
@section('title')
Data Puskesmas
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
                                <h3  class="header-title"> {{ $caption ?? 'Buat Pengaduan' }} </h3>


                                @if (Request::segment(3) == 'ubah')
                                    <form action="{{ route('dashboard.pengaduan.update', $data->id) }}" method="post"
                                        enctype="multipart/form-data">
                                        @method('PUT')
                                    @else
                                        <form action="{{ route('dashboard.pengaduan.store') }}" method="post"
                                            enctype="multipart/form-data">
                                @endif
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card-box">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h3></h3>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="tempat"> Tempat <span
                                                                class="text-danger"> </span> * </label>
                                                        <input type="text" id="tempat"
                                                            @if (Request::segment(3) == 'detail') {{ 'disabled' }} @endif
                                                            value="{{ old('tempat') ?? ($data->tempat ?? '') }}"
                                                            name="tempat" placeholder="" class="form-control">
                                                        @if ($errors->has('tempat'))
                                                            <label class="text-danger">
                                                                {{ $errors->first('tempat') }}
                                                            </label>
                                                        @endif
                                                    </div>
                                                </div>


                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">

                                                        <label for="latitude"> Yang Melapor <span class="text-danger"> * </span>
                                                        </label>
                                                        <select class="form-control" aria-label="Default select example"
                                                            name="melapor" @if (Request::segment(3) == 'detail') {{ 'disabled' }} @endif>
                                                            <option value="" hidden>Pilih Status Pelapor</option>



                                                        </select>
                                                        @if ($errors->has('distrik_id'))
                                                        <label class="text-danger">
                                                            {{ $errors->first('distrik_id') }}
                                                        </label>
                                                        @endif
                                                    </div>
                                                </div>



                                            </div>




                                            @if (Request::segment(3) == 'detail')
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <a class="btn btn-primary"
                                                            href="{{ route('dashboard.pengaduan') }}">Kembali</a>


                                                        <a class="btn btn-primary"
                                                            href="{{ route('dashboard.pengaduan.ubah', $data->id) }}">Ubah <i
                                                                class="fas fa-edit"></i> </a>

                                                    </div>
                                                </div>
                                            @else
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <button type="submit" class="btn btn-primary">Simpan <i
                                                                data-feather="save"></i></button>
                                                    </div>
                                                </div>
                                            @endif



                                        </div> <!-- end card-box-->
                                    </div> <!-- end col -->
                                </div>
                                <!-- end row -->
                                </form>




                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col -->
                </div>
                {{-- end row --}}





            </div> <!-- container -->

        </div> <!-- content -->
    @endsection
