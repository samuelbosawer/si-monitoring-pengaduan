@extends('admin.layout.tamplate')
@section('title')
    {{ $caption ?? 'Detail Data Pendampingan' }}
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
                                <h4 class="header-title"> {{ $caption ?? 'Detail Data Pendampingan' }} </h4>
                                <div class=" ">
                                    @if (Auth::user()->hasRole('kepaladinas|pendampingdinas|kepalabidang') && Request::segment(3) == 'detail')
                                        <a class="btn btn-danger" target="_blank"
                                            href="{{ route('dashboard.pendampingan.pdf_detail_sub', $data->id) }}">
                                            Cetak PDF <i data-feather="file-text"></i></a>
                                    @endif
                                </div>

                                @if (Request::segment(3) == 'detail')
                                    <form action="{{ route('dashboard.pendampingan.update', $data->id) }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="id_p" value="{{ $data->pengaduan_id }}">
                                    @else
                                        <form action="{{ route('dashboard.pendampingan.store') }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="id_p" value="{{ Request::segment(4) }}">
                                @endif



                                <div class="row mt-3">

                                    <div class="col-md-12">
                                        <div class="form-group mb-3">
                                            <label for=""> ID Pengaduan <span class="text-danger"> *
                                                </span></label>
                                            <input type="text" id=""
                                                 disabled
                                                value="{{$pengaduan->id ?? '-'}}"
                                                name="judul pendampingan" placeholder="" class="form-control">

                                        </div>
                                    </div>



                                    <div class="col-md-12">
                                        <div class="form-group mb-3">
                                            <label for=""> Judul Pengaduan <span class="text-danger"> *
                                                </span></label>
                                            <input type="text" id=""
                                                 disabled
                                                value="{{$pengaduan->judul_pengaduan ?? '-'}}"
                                                name="judul pendampingan" placeholder="" class="form-control">

                                        </div>
                                    </div>



                                    <div class="col-md-12">
                                        <div class="form-group mb-3">
                                            <label for="judul_pendampingan"> Judul Pendampingan <span class="text-danger"> *
                                                </span></label>
                                            <input type="text" id="judul_pendampingan"
                                                @if (Auth::user()->hasRole('kepalabidang|pelapor|kepaladinas')) disabled @endif
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
                                            <label for="jenis_pelayanan"> Status Pelayanan <span class="text-danger"> *
                                                </span></label>
                                            <select class="form-control" name="jenis_pelayanan" @if (Auth::user()->hasRole('kepalabidang|pelapor|kepaladinas')) readonly @endif>

                                                <option value="Pengaduan Masyarakat"
                                                    {{ (old('jenis_pelayanan') ?? ($data->jenis_pelayanan ?? '')) == 'Pengaduan Masyarakat' ? 'selected' : '' }}>
                                                    Pengaduan Masyarakat</option>
                                                <option value="Penjangkuan Korban"
                                                    {{ (old('jenis_pelayanan') ?? ($data->jenis_pelayanan ?? '')) == 'Penjangkuan Korban' ? 'selected' : '' }}>
                                                    Penjangkuan Korban</option>
                                                <option value="Konseling Dengan Psikolog"
                                                    {{ (old('jenis_pelayanan') ?? ($data->jenis_pelayanan ?? '')) == 'Konseling Dengan Psikolog' ? 'selected' : '' }}>
                                                    Konseling Dengan Psikolog</option>

                                                    <option value="Rujukan Konsultasi Bidang Hukum"
                                                    {{ (old('jenis_pelayanan') ?? ($data->jenis_pelayanan ?? '')) == 'Rujukan Konsultasi Bidang Hukum' ? 'selected' : '' }}>
                                                    Rujukan Konsultasi Bidang Hukum</option>

                                                    <option value="Rujukan Kesehatan"
                                                    {{ (old('jenis_pelayanan') ?? ($data->jenis_pelayanan ?? '')) == 'Rujukan Kesehatan' ? 'selected' : '' }}>
                                                    Rujukan Kesehatan</option>

                                                    <option value="Penampungan Sementara (Rumah Aman)"
                                                    {{ (old('jenis_pelayanan') ?? ($data->jenis_pelayanan ?? '')) == 'Penampungan Sementara (Rumah Aman) ' ? 'selected' : '' }}>
                                                    Penampungan Sementara (Rumah Aman) </option>

                                                    <option value="Mediasi"
                                                    {{ (old('jenis_pelayanan') ?? ($data->jenis_pelayanan ?? '')) == 'Mediasi ' ? 'selected' : '' }}>
                                                    Mediasi </option>

                                                    <option value="Pendampingan Korban"
                                                    {{ (old('jenis_pelayanan') ?? ($data->jenis_pelayanan ?? '')) == 'Pendampingan Korban ' ? 'selected' : '' }}>
                                                    Pendampingan Korban </option>
                                            </select>
                                            @error('jenis_pelayanan')
                                                <label class="text-danger">{{ $message }}</label>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group mb-3">
                                            <label for="alamat"> Catatan Pendampingan </label>
                                            <textarea id="" @if (Auth::user()->hasRole('kepalabidang|pelapor|kepaladinas')) readonly @endif name="catatan_pendampingan"
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

                                            <label for="status_pendampingan"> Status Pendampingan <span class="text-danger">
                                                    * </span>
                                            </label>
                                            <select class="form-control" aria-label="Default select example"
                                                name="status_pendampingan"
                                                @if (Auth::user()->hasRole('kepalabidang|pelapor|kepaladinas')) disabled @endif>
                                                <option value="" hidden>Pilih </option>

                                                <option value="Dalam Proses"
                                                    {{ (old('status_pendampingan') ?? ($data->status_pendampingan ?? '')) == 'Dalam Proses' ? 'selected' : '' }}>
                                                    Dalam Proses</option>

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

                                    <div class="col-md-12">
                                        <div class="form-group mb-3">
                                            <label for="lampiran"> Lampiran Dokumen</label>


                                            @if (!empty($data->lampiran))
                                            <br>
                                                <a href="{{asset($data->lampiran)}}" class="mb-2 btn btn-primary" target="_blank"> Lihat Lampiran</a>
                                            <br>
                                            @endif

                                            <input type="file" id="lampiran"
                                                name="lampiran" class="form-control"
                                                @if (Auth::user()->hasRole('kepalabidang|pelapor|kepaladinas')) disabled @endif>


                                            @if ($errors->has('lampiran'))
                                                <label class="text-danger">
                                                    {{ $errors->first('lampiran') }}
                                                </label>
                                            @endif
                                        </div>
                                    </div>



                                    <div class="col-md-12">
                                        <div class="form-group mb-3">
                                            <label for="catatan"> Catatan Perkembangan Dari Pengaduan <span>
                                                </span> </label>
                                            <textarea @if (Auth::user()->hasRole('kepalabidang|pelapor|kepaladinas')) disabled @endif id="summernote" name="catatan"
                                                placeholder="Masukan catatan" rows="7" class="form-control">{{ old('catatan') ?? ($pengaduan->catatan ?? '') }} </textarea>
                                            @if ($errors->has('catatan'))
                                                <label class="text-danger">
                                                    {{ $errors->first('catatan') }}
                                                </label>
                                            @endif
                                        </div>
                                    </div>

                                </div>

                                {{-- <div id="summernote"></div> --}}






                                @if (!Auth::user()->hasRole('kepalabidang|pelapor|kepaladinas'))
                                    <div class="text-center">
                                        <button class="btn btn-warning text-center rounded" type="submit"> Simpan </button>
                                    </div>
                                @endif


                                </form>

                            </div> <!-- end col -->



                        </div> <!-- end card-body-->
                    </div>
                    {{-- end row --}}





                </div> <!-- container -->

            </div> <!-- content -->



            @push('script-header')
                <!-- Tambahkan di dalam <head> -->
                <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.css" rel="stylesheet">
            @endpush

            @push('script-footer')
                <!-- Tambahkan sebelum penutup </body> -->
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.js"></script>


                <script>
                    $(document).ready(function() {
                        var lfm = function(options, cb) {
                            var route_prefix = (options && options.prefix) ? options.prefix : '/laravel-filemanager';
                            window.open(route_prefix + '?type=' + (options.type || 'file'), 'FileManager',
                                'width=900,height=600');
                            window.SetUrl = cb;
                        };

                        var LFMButton = function(context) {
                            var ui = $.summernote.ui;
                            var button = ui.button({
                                contents: '<i class="note-icon-picture"></i> ',
                                tooltip: 'Insert image with filemanager',
                                click: function() {
                                    lfm({
                                        type: 'image',
                                        prefix: '/laravel-filemanager'
                                    }, function(lfmItems, path) {
                                        lfmItems.forEach(function(lfmItem) {
                                            context.invoke('insertImage', lfmItem.url);
                                        });
                                    });
                                }
                            });
                            return button.render();
                        };

                        $('#catatan').summernote({
                            height: 300, // Atur tinggi editor
                            toolbar: [
                                ['style', ['style']],
                                ['font', ['bold', 'italic', 'underline', 'clear']],
                                ['fontname', ['fontname']],
                                ['color', ['color']],
                                ['para', ['ul', 'ol', 'paragraph']],
                                ['table', ['table']],
                                ['insert', ['link', 'lfm', 'video']],
                                ['view', ['fullscreen', 'codeview', 'help']]
                            ],
                            buttons: {
                                lfm: LFMButton
                            }
                        });


                        @if (Auth::user()->hasRole('kepalabidang|pelapor|kepaladinas'))
                            $('#catatan').summernote('disable');
                        @endif


                    });
                </script>
            @endpush
        @endsection
