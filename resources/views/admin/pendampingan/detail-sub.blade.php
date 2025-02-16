@extends('admin.layout.tamplate')
@section('title')
    Data Detail Pendampingan
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
                                <h4 class="header-title"> {{$caption ?? 'Detail Data Pendampingan'}} </h4>


                                @if (Request::segment(4) == 'ubah')
                                    <form action="{{ route('dashboard.pengaduan.update', $data->id) }}" method="post"
                                        enctype="multipart/form-data">
                                        @method('PUT')
                                    @else
                                        <form action="{{ route('dashboard.pengaduan.store') }}" method="post"
                                            enctype="multipart/form-data">
                                @endif

                                        <div class="row mt-3">
                                            <div class="col-md-12">
                                                <div class="form-group mb-3">
                                                    <label for="judul_pendampingan"> Judul Pendampingan <span
                                                            class="text-danger"> * </span></label>
                                                    <input type="text" id="judul_pendampingan" @if (Auth::user()->hasRole('kepalabidang|pelapor|kepaladinas')) disabled @endif
                                                        @if (Request::segment(3) == 'detail') {{ 'disabled' }} @endif
                                                        value="{{ old('judul_pendampingan') ?? ($data->judul_pendampingan ?? '') }}"
                                                        name="judul pendampingan" placeholder="" class="form-control">
                                                    @if ($errors->has('judul_pendampingan'))
                                                        <label class="text-danger">
                                                            {{ $errors->first('judul_pendampingan') }}
                                                        </label>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group mb-3">
                                                    <label for="alamat"> Catatan Pendampingan </label>
                                                    <textarea id="summernote" @if (Auth::user()->hasRole('kepalabidang|pelapor|kepaladinas')) disabled @endif  @if (Request::segment(3) == 'detail') disabled @endif name="catatan_pendampingan"
                                                        placeholder="Masukan catatan pendampingan" rows="5" class="form-control">{{ old('catatan_pendampingan') ?? ($data->catatan_pendampingan ?? '') }} </textarea>
                                                    @if ($errors->has('catatan_pendampingan'))
                                                        <label class="text-danger">
                                                            {{ $errors->first('catatan_pendampingan') }}
                                                        </label>
                                                    @endif
                                                </div>
                                            </div>


                                            <div class="col-md-12">
                                                <div class="form-group mb-3">

                                                    <label for="status_pendampingan"> Status Pendampingan <span
                                                            class="text-danger"> * </span>
                                                    </label>
                                                    <select class="form-control" aria-label="Default select example"
                                                        name="status_pendampingan"
                                                        @if (Request::segment(3) == 'detail') {{ 'disabled' }} @endif  @if (Auth::user()->hasRole('kepalabidang|pelapor|kepaladinas')) disabled @endif>
                                                        <option value="" hidden>Pilih </option>

                                                        <option value="Dalam Proses"
                                                            {{ (old('status_pendampingan') ?? ($data->status_pendampingan ?? '')) == 'Dalam Proses' ? 'selected' : '' }}>
                                                            Dalam Proses</option>

                                                            <option value="Telah Diterima"
                                                            {{ (old('status_pendampingan') ?? ($data->status_pendampingan ?? '')) == 'Telah Diterima' ? 'selected' : '' }}>
                                                            Telah Diterima</option>

                                                            <option value="Selesai"
                                                            {{ (old('status_pendampingan') ?? ($data->status_pendampingan ?? '')) == 'Selesai' ? 'selected' : '' }}>
                                                            Selesai</option>

                                                    </select>
                                                    @if ($errors->has('status_pendampingan'))
                                                        <label class="text-danger">
                                                            {{ $errors->first('status_pendampingan') }}
                                                        </label>
                                                    @endif
                                                </div>
                                            </div>

                                        </div>



                                        @if($data != null)
                                            <div class="text-center">
                                                <button class="btn btn-warning text-center rounded" type="submit" > Simpan </button>
                                            </div>

                                        @elseif ((!Auth::user()->hasRole('kepalabidang|pelapor|kepaladinas')) )
                                            <div class="text-center">
                                                <button class="btn btn-warning text-center rounded" type="submit" > Simpan </button>
                                            </div>
                                        @endif


                                        </form>

                            </div> <!-- end col -->



                        </div> <!-- end card-body-->
                    </div>
                    {{-- end row --}}





                </div> <!-- container -->

            </div> <!-- content -->
        @endsection
