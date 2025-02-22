@extends('admin.layout.tamplate')
@section('title')
    {{ $caption ?? 'Data Pengaduan' }}
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
                                <h3 class="header-title"> {{ $caption ?? 'Buat Pengaduan' }} </h3>


                                @if (Request::segment(4) == 'ubah')
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
                                                    <div class="form-group mb-3">
                                                        <label for="judul_pengaduan"> Judul Pengaduan <span
                                                                class="text-danger"> * </span></label>
                                                        <input type="text" id="judul_pengaduan"
                                                            @if (Request::segment(3) == 'detail') {{ 'disabled' }} @endif
                                                            value="{{ old('judul_pengaduan') ?? ($data->judul_pengaduan ?? '') }}"
                                                            name="judul_pengaduan" placeholder="" class="form-control">
                                                        @if ($errors->has('judul_pengaduan'))
                                                            <label class="text-danger">
                                                                {{ $errors->first('judul_pengaduan') }}
                                                            </label>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="col-md-12 bg-warning  rounded mb-3">
                                                    <h5 class="text-white">Pelapor</h5>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="tempat"> Tempat Melapor <span class="text-danger"> *
                                                            </span></label>
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
                                                        <label for="melapor"> Yang Melapor <span class="text-danger"> *
                                                            </span></label>
                                                        <select class="form-control" name="melapor"
                                                            @disabled(Request::segment(3) == 'detail')>
                                                            <option value="" hidden>Pilih Status Pelapor</option>
                                                            <option value="Diri Sendiri"
                                                                {{ (old('melapor') ?? ($data->melapor ?? '')) == 'Diri Sendiri' ? 'selected' : '' }}>
                                                                Diri Sendiri</option>
                                                            <option value="Orang Tua"
                                                                {{ (old('melapor') ?? ($data->melapor ?? '')) == 'Orang Tua' ? 'selected' : '' }}>
                                                                Orang Tua</option>
                                                            <option value="Famili"
                                                                {{ (old('melapor') ?? ($data->melapor ?? '')) == 'Famili' ? 'selected' : '' }}>
                                                                Famili</option>
                                                        </select>
                                                        @error('melapor')
                                                            <label class="text-danger">{{ $message }}</label>
                                                        @enderror
                                                    </div>
                                                </div>


                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="nama_pelapor"> Nama Pelapor <span class="text-danger"> *
                                                            </span></label>
                                                        <input type="text" id="nama_pelapor"
                                                            @if (Request::segment(3) == 'detail') {{ 'disabled' }} @endif
                                                            value="{{ old('nama_pelapor') ?? ($data->nama_pelapor ?? '') }}"
                                                            name="nama_pelapor" placeholder="" class="form-control">
                                                        @if ($errors->has('nama_pelapor'))
                                                            <label class="text-danger">
                                                                {{ $errors->first('nama_pelapor') }}
                                                            </label>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">

                                                        <label for="jk_pelapor"> Jenis Kelamin Pelapor <span
                                                                class="text-danger"> * </span>
                                                        </label>
                                                        <select class="form-control" aria-label="Default select example"
                                                            name="jk_pelapor"
                                                            @if (Request::segment(3) == 'detail') {{ 'disabled' }} @endif>
                                                            <option value="" hidden>Pilih Jenis Kelamin Pelapor
                                                            </option>
                                                            <option value="Pria"
                                                                {{ (old('jk_pelapor') ?? ($data->jk_pelapor ?? '')) == 'Pria' ? 'selected' : '' }}>
                                                                Pria</option>
                                                            <option value="Wanita"
                                                                {{ (old('jk_pelapor') ?? ($data->jk_pelapor ?? '')) == 'Wanita' ? 'selected' : '' }}>
                                                                Wanita</option>
                                                        </select>
                                                        @if ($errors->has('jk_pelapor'))
                                                            <label class="text-danger">
                                                                {{ $errors->first('jk_pelapor') }}
                                                            </label>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="no_hp_pelapor"> Nomor Hp Pelapor <span
                                                                class="text-danger"> * </span></label>
                                                        <input type="text" id="no_hp_pelapor"
                                                            @if (Request::segment(3) == 'detail') {{ 'disabled' }} @endif
                                                            value="{{ old('no_hp_pelapor') ?? ($data->no_hp_pelapor ?? '') }}"
                                                            name="no_hp_pelapor" placeholder="" class="form-control">
                                                        @if ($errors->has('no_hp_pelapor'))
                                                            <label class="text-danger">
                                                                {{ $errors->first('no_hp_pelapor') }}
                                                            </label>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="mengetahui_dari"> Mengetahui Dari <span
                                                                class="text-danger"> * </span></label>
                                                        <input type="text" id="mengetahui_dari"
                                                            @if (Request::segment(3) == 'detail') {{ 'disabled' }} @endif
                                                            value="{{ old('mengetahui_dari') ?? ($data->mengetahui_dari ?? '') }}"
                                                            name="mengetahui_dari" placeholder="" class="form-control">
                                                        @if ($errors->has('mengetahui_dari'))
                                                            <label class="text-danger">
                                                                {{ $errors->first('mengetahui_dari') }}
                                                            </label>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="rujukan_dari"> Rujukan Dari <span class="text-danger">
                                                                * </span></label>
                                                        <input type="text" id="rujukan_dari"
                                                            @if (Request::segment(3) == 'detail') {{ 'disabled' }} @endif
                                                            value="{{ old('rujukan_dari') ?? ($data->rujukan_dari ?? '') }}"
                                                            name="rujukan_dari" placeholder="" class="form-control">
                                                        @if ($errors->has('rujukan_dari'))
                                                            <label class="text-danger">
                                                                {{ $errors->first('rujukan_dari') }}
                                                            </label>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">

                                                        <label for="mengetahui_dari"> Informasi UPTD PPA dari <span
                                                                class="text-danger"> * </span>
                                                        </label>
                                                        <select class="form-control" aria-label="Default select example"
                                                            name="mengetahui_dari"
                                                            @if (Request::segment(3) == 'detail') {{ 'disabled' }} @endif>
                                                            <option value="" hidden>Pilih </option>
                                                            <option value="Dari Iklan"
                                                                {{ (old('mengetahui_dari') ?? ($data->mengetahui_dari ?? '')) == 'Dari Iklan' ? 'selected' : '' }}>
                                                                Dari Iklan</option>
                                                            <option value="Teman/Saudara"
                                                                {{ (old('mengetahui_dari') ?? ($data->mengetahui_dari ?? '')) == 'Teman/Saudara' ? 'selected' : '' }}>
                                                                Teman/Saudara</option>
                                                        </select>
                                                        @if ($errors->has('mengetahui_dari'))
                                                            <label class="text-danger">
                                                                {{ $errors->first('mengetahui_dari') }}
                                                            </label>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="alamat"> Alamat </label>
                                                        <textarea id="ckeditor" @if (Request::segment(3) == 'detail') disabled @endif name="alamat_pelapor"
                                                            placeholder="Masukan alamat_pelapor" rows="5" class="form-control">{{ old('alamat_pelapor') ?? ($data->alamat_pelapor ?? '') }} </textarea>
                                                        @if ($errors->has('alamat_pelapor'))
                                                            <label class="text-danger">
                                                                {{ $errors->first('alamat_pelapor') }}
                                                            </label>
                                                        @endif
                                                    </div>
                                                </div>




                                                <div class="col-md-12 bg-warning  rounded mb-3">
                                                    <h5 class="text-white"> Identitas Korban</h5>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group mb-3">
                                                        <label for="nama_lengkap_korban"> Nama Lengkap Korban <span
                                                                class="text-danger"> * </span></label>
                                                        <input type="text" id="nama_lengkap_korban"
                                                            @if (Request::segment(3) == 'detail') {{ 'disabled' }} @endif
                                                            value="{{ old('nama_lengkap_korban') ?? ($data->nama_lengkap_korban ?? '') }}"
                                                            name="nama_lengkap_korban" placeholder=""
                                                            class="form-control">
                                                        @if ($errors->has('nama_lengkap_korban'))
                                                            <label class="text-danger">
                                                                {{ $errors->first('nama_lengkap_korban') }}
                                                            </label>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="nama_panggilan_pelaku"> Nama Panggilan Korban <span
                                                                class="text-danger"> * </span></label>
                                                        <input type="text" id="nama_panggilan_korban"
                                                            @if (Request::segment(3) == 'detail') {{ 'disabled' }} @endif
                                                            value="{{ old('nama_panggilan_korban') ?? ($data->nama_panggilan_korban ?? '') }}"
                                                            name="nama_panggilan_korban" placeholder=""
                                                            class="form-control">
                                                        @if ($errors->has('nama_panggilan_korban'))
                                                            <label class="text-danger">
                                                                {{ $errors->first('nama_panggilan_korban') }}
                                                            </label>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">

                                                        <label for="jenis_kelamin_korban"> Jenis Kelamin Korban <span
                                                                class="text-danger"> * </span>
                                                        </label>
                                                        <select class="form-control" aria-label="Default select example"
                                                            name="jenis_kelamin_korban"
                                                            @if (Request::segment(3) == 'detail') {{ 'disabled' }} @endif>
                                                            <option value="" hidden>Pilih Jenis Kelamin Korban
                                                            </option>
                                                            <option value="Pria"
                                                                {{ (old('jenis_kelamin_korban') ?? ($data->jenis_kelamin_korban ?? '')) == 'Pria' ? 'selected' : '' }}>
                                                                Pria</option>
                                                            <option value="Wanita"
                                                                {{ (old('jenis_kelamin_korban') ?? ($data->jenis_kelamin_korban ?? '')) == 'Wanita' ? 'selected' : '' }}>
                                                                Wanita</option>
                                                        </select>
                                                        @if ($errors->has('jenis_kelamin_korban'))
                                                            <label class="text-danger">
                                                                {{ $errors->first('jenis_kelamin_korban') }}
                                                            </label>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="tempat_lahir_korban"> Tempat Lahir Korban <span
                                                                class="text-danger"> * </span></label>
                                                        <input type="text" id="tempat_lahir_korban"
                                                            @if (Request::segment(3) == 'detail') {{ 'disabled' }} @endif
                                                            value="{{ old('tempat_lahir_korban') ?? ($data->tempat_lahir_korban ?? '') }}"
                                                            name="tempat_lahir_korban" placeholder=""
                                                            class="form-control">
                                                        @if ($errors->has('tempat_lahir_korban'))
                                                            <label class="text-danger">
                                                                {{ $errors->first('tempat_lahir_korban') }}
                                                            </label>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="tanggal_lahir_korban"> Tanggal Lahir Korban <span
                                                                class="text-danger"> * </span></label>
                                                        <input type="date" id="tanggal_lahir_korban"
                                                            @if (Request::segment(3) == 'detail') {{ 'disabled' }} @endif
                                                            value="{{ old('tanggal_lahir_korban') ?? ($data->tanggal_lahir_korban ?? '') }}"
                                                            name="tanggal_lahir_korban" placeholder=""
                                                            class="form-control">
                                                        @if ($errors->has('tanggal_lahir_korban'))
                                                            <label class="text-danger">
                                                                {{ $errors->first('tanggal_lahir_korban') }}
                                                            </label>
                                                        @endif
                                                    </div>
                                                </div>


                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="pekerjaan_korban"> Pekerjaan Korban (Dijelaskan)
                                                        </label>
                                                        <textarea id="summernote" @if (Request::segment(3) == 'detail') disabled @endif name="pekerjaan_korban"
                                                            placeholder="Masukan pekerjaan korban" rows="5" class="form-control">{{ old('pekerjaan_korban') ?? ($data->pekerjaan_korban ?? '') }} </textarea>

                                                        @if ($errors->has('pekerjaan_korban'))
                                                            <label class="text-danger">
                                                                {{ $errors->first('pekerjaan_korban') }}
                                                            </label>
                                                        @endif
                                                    </div>
                                                </div>


                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="alamat_korban"> Alamat Korban <span
                                                                class="text-danger">*</span> </label>
                                                        <textarea id="summernote" @if (Request::segment(3) == 'detail') disabled @endif name="alamat_korban"
                                                            placeholder="Masukan alamat korban" rows="5" class="form-control">{{ old('alamat_korban') ?? ($data->alamat_korban ?? '') }} </textarea>
                                                        @if ($errors->has('alamat_korban'))
                                                            <label class="text-danger">
                                                                {{ $errors->first('alamat_korban') }}
                                                            </label>
                                                        @endif
                                                    </div>
                                                </div>


                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">

                                                        <label for="agama_korban"> Agama Korban <span class="text-danger">
                                                                * </span>
                                                        </label>
                                                        <select class="form-control" aria-label="Default select example"
                                                            name="agama_korban"
                                                            @if (Request::segment(3) == 'detail') {{ 'disabled' }} @endif>
                                                            <option value="" hidden>Pilih Agama Korban</option>
                                                            <option value="Kristen Protestan"
                                                                {{ (old('agama_korban') ?? ($data->agama_korban ?? '')) == 'Kristen Protestan' ? 'selected' : '' }}>
                                                                Kristen Protestan</option>
                                                            <option value="Kristen Katolik"
                                                                {{ (old('agama_korban') ?? ($data->agama_korban ?? '')) == 'Kristen Katolik' ? 'selected' : '' }}>
                                                                Kristen Katolik</option>
                                                            <option value="Islam"
                                                                {{ (old('agama_korban') ?? ($data->agama_korban ?? '')) == 'Islam' ? 'selected' : '' }}>
                                                                Islam</option>
                                                            <option value="Hindu"
                                                                {{ (old('agama_korban') ?? ($data->agama_korban ?? '')) == 'Hindu' ? 'selected' : '' }}>
                                                                Hindu</option>
                                                            <option value="Buddha"
                                                                {{ (old('agama_korban') ?? ($data->agama_korban ?? '')) == 'Buddha' ? 'selected' : '' }}>
                                                                Buddha</option>
                                                        </select>
                                                        @if ($errors->has('agama_korban'))
                                                            <label class="text-danger">
                                                                {{ $errors->first('agama_korban') }}
                                                            </label>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="pendidikan_korban"> Pendidikan Pelaku <span
                                                                class="text-danger"> * </span></label>
                                                        <select class="form-control" name="pendidikan_korban"
                                                            @disabled(Request::segment(3) == 'detail')>
                                                            <option value="" hidden>Pilih Pendidikan Pelaku</option>
                                                            <option value="Tidak Sekolah"
                                                                {{ (old('pendidikan_korban') ?? ($data->pendidikan_korban ?? '')) == 'Tidak Sekolah' ? 'selected' : '' }}>
                                                                Tidak Sekolah</option>
                                                            <option value="SD"
                                                                {{ (old('pendidikan_korban') ?? ($data->pendidikan_korban ?? '')) == 'SD' ? 'selected' : '' }}>
                                                                SD</option>
                                                            <option value="SMP"
                                                                {{ (old('pendidikan_korban') ?? ($data->pendidikan_korban ?? '')) == 'SMP' ? 'selected' : '' }}>
                                                                SMP</option>
                                                            <option value="SMA"
                                                                {{ (old('pendidikan_korban') ?? ($data->pendidikan_korban ?? '')) == 'SMA' ? 'selected' : '' }}>
                                                                SMA</option>
                                                            <option value="Diploma"
                                                                {{ (old('pendidikan_korban') ?? ($data->pendidikan_korban ?? '')) == 'Diploma' ? 'selected' : '' }}>
                                                                Diploma</option>
                                                            <option value="Sarjana"
                                                                {{ (old('pendidikan_korban') ?? ($data->pendidikan_korban ?? '')) == 'Sarjana' ? 'selected' : '' }}>
                                                                Sarjana</option>
                                                            <option value="Magister"
                                                                {{ (old('pendidikan_korban') ?? ($data->pendidikan_korban ?? '')) == 'Magister' ? 'selected' : '' }}>
                                                                Magister</option>
                                                            <option value="Doktor"
                                                                {{ (old('pendidikan_korban') ?? ($data->pendidikan_korban ?? '')) == 'Doktor' ? 'selected' : '' }}>
                                                                Doktor</option>
                                                        </select>
                                                        @error('pendidikan_korban')
                                                            <label class="text-danger">{{ $message }}</label>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="nik_korban"> NIK Korban <span class="text-danger"> *
                                                            </span></label>
                                                        <input type="text" id="nik_korban"
                                                            @if (Request::segment(3) == 'detail') {{ 'disabled' }} @endif
                                                            value="{{ old('nik_korban') ?? ($data->nik_korban ?? '') }}"
                                                            name="nik_korban" placeholder="" class="form-control">
                                                        @if ($errors->has('nik_korban'))
                                                            <label class="text-danger">
                                                                {{ $errors->first('nik_korban') }}
                                                            </label>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">

                                                        <label for="hubungan"> Hubungan dengan pelaku <span
                                                                class="text-danger"> * </span>
                                                        </label>
                                                        <select class="form-control" aria-label="Default select example"
                                                            name="hubungan"
                                                            @if (Request::segment(3) == 'detail') {{ 'disabled' }} @endif>
                                                            <option value="" hidden>Pilih Hubungan</option>
                                                            <option value="Suami"
                                                                {{ (old('hubungan') ?? ($data->hubungan ?? '')) == 'Suami' ? 'selected' : '' }}>
                                                                Suami</option>
                                                            <option value="Istri"
                                                                {{ (old('hubungan') ?? ($data->hubungan ?? '')) == 'Istri' ? 'selected' : '' }}>
                                                                Istri</option>
                                                            <option value="Saudara Kandung"
                                                                {{ (old('hubungan') ?? ($data->hubungan ?? '')) == 'Saudara Kandung' ? 'selected' : '' }}>
                                                                Saudara Kandung</option>
                                                            <option value="Saudara Sepupu"
                                                                {{ (old('hubungan') ?? ($data->hubungan ?? '')) == 'Saudara Sepupu' ? 'selected' : '' }}>
                                                                Saudara Sepupu</option>
                                                            <option value="Saudara Tiri"
                                                                {{ (old('hubungan') ?? ($data->hubungan ?? '')) == 'Saudara Tiri' ? 'selected' : '' }}>
                                                                Saudara Tiri</option>
                                                            <option value="Mantan Suami"
                                                                {{ (old('hubungan') ?? ($data->hubungan ?? '')) == 'Mantan Suami' ? 'selected' : '' }}>
                                                                Mantan Suami</option>
                                                            <option value="Mantan Istri"
                                                                {{ (old('hubungan') ?? ($data->hubungan ?? '')) == 'Mantan Istri' ? 'selected' : '' }}>
                                                                Mantan Istri</option>
                                                            <option value="Pacar"
                                                                {{ (old('hubungan') ?? ($data->hubungan ?? '')) == 'Pacar' ? 'selected' : '' }}>
                                                                Pacar</option>
                                                            <option value="Teman"
                                                                {{ (old('hubungan') ?? ($data->hubungan ?? '')) == 'Teman' ? 'selected' : '' }}>
                                                                Teman</option>
                                                            <option value="Om"
                                                                {{ (old('hubungan') ?? ($data->hubungan ?? '')) == 'Om' ? 'selected' : '' }}>
                                                                Om</option>
                                                            <option value="Tanta"
                                                                {{ (old('hubungan') ?? ($data->hubungan ?? '')) == 'Tanta' ? 'selected' : '' }}>
                                                                Tanta</option>
                                                            <option value="Paman"
                                                                {{ (old('hubungan') ?? ($data->hubungan ?? '')) == 'Paman' ? 'selected' : '' }}>
                                                                Paman</option>
                                                            <option value="Bibi"
                                                                {{ (old('hubungan') ?? ($data->hubungan ?? '')) == 'Bibi' ? 'selected' : '' }}>
                                                                Bibi</option>
                                                        </select>
                                                        @if ($errors->has('hubungan'))
                                                            <label class="text-danger">
                                                                {{ $errors->first('hubungan') }}
                                                            </label>
                                                        @endif
                                                    </div>
                                                </div>



                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="jumlah_anak_pria"> Jumlah Anak Pria (Jika Ada) <span
                                                                class="text-danger"> </span></label>
                                                        <input type="text" id="jumlah_anak_pria"
                                                            @if (Request::segment(3) == 'detail') {{ 'disabled' }} @endif
                                                            value="{{ old('jumlah_anak_pria') ?? ($data->jumlah_anak_pria ?? '') }}"
                                                            name="jumlah_anak_pria" placeholder="" class="form-control">
                                                        @if ($errors->has('jumlah_anak_pria'))
                                                            <label class="text-danger">
                                                                {{ $errors->first('jumlah_anak_pria') }}
                                                            </label>
                                                        @endif
                                                    </div>
                                                </div>


                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="jumlah_anak_wanita"> Jumlah Anak Wanita (Jika Ada)
                                                            <span class="text-danger"> </span></label>
                                                        <input type="text" id="jumlah_anak_wanita"
                                                            @if (Request::segment(3) == 'detail') {{ 'disabled' }} @endif
                                                            value="{{ old('jumlah_anak_wanita') ?? ($data->jumlah_anak_wanita ?? '') }}"
                                                            name="jumlah_anak_wanita" placeholder=""
                                                            class="form-control">
                                                        @if ($errors->has('jumlah_anak_wanita'))
                                                            <label class="text-danger">
                                                                {{ $errors->first('jumlah_anak_wanita') }}
                                                            </label>
                                                        @endif
                                                    </div>
                                                </div>


                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">

                                                        <label for="status_pernikahan"> Status Pernikahan <span
                                                                class="text-danger"> * </span>
                                                        </label>
                                                        <select class="form-control" aria-label="Default select example"
                                                            name="status_pernikahan"
                                                            @if (Request::segment(3) == 'detail') {{ 'disabled' }} @endif>
                                                            <option value="" hidden>Pilih Status Pernikahan</option>
                                                            <option value="Nikah Adat"
                                                                {{ (old('status_pernikahan') ?? ($data->status_pernikahan ?? '')) == 'Nikah Adat' ? 'selected' : '' }}>
                                                                Nikah Adat</option>
                                                            <option value="Nikah Gereja(KUA)"
                                                                {{ (old('status_pernikahan') ?? ($data->status_pernikahan ?? '')) == 'Nikah Gereja(KUA)' ? 'selected' : '' }}>
                                                                Nikah Gereja(KUA)</option>
                                                            <option value="Nikah Capil"
                                                                {{ (old('status_pernikahan') ?? ($data->status_pernikahan ?? '')) == 'Nikah Capil' ? 'selected' : '' }}>
                                                                Nikah Capil</option>
                                                            <option value="Tidak Ada Status Pernikahan"
                                                                {{ (old('status_pernikahan') ?? ($data->status_pernikahan ?? '')) == 'Tidak Ada Status Pernikahan' ? 'selected' : '' }}>
                                                                Tidak Ada Status Pernikahan</option>
                                                            <option value="Akte Cerai"
                                                                {{ (old('status_pernikahan') ?? ($data->status_pernikahan ?? '')) == 'Akte Cerai' ? 'selected' : '' }}>
                                                                Akte Cerai</option>
                                                            <option value="Belum Menikah"
                                                                {{ (old('status_pernikahan') ?? ($data->status_pernikahan ?? '')) == 'Belum Menikah' ? 'selected' : '' }}>
                                                                Belum Menikah</option>
                                                        </select>
                                                        @if ($errors->has('status_pernikahan'))
                                                            <label class="text-danger">
                                                                {{ $errors->first('status_pernikahan') }}
                                                            </label>
                                                        @endif
                                                    </div>
                                                </div>



                                                <div class="col-md-12 bg-warning  rounded mb-3">
                                                    <h5 class="text-white"> Identitas Terlapor (Pelaku)</h5>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group mb-3">
                                                        <label for="nama_lengkap_pelaku"> Nama Lengkap Pelaku <span
                                                                class="text-danger"> * </span></label>
                                                        <input type="text" id="nama_lengkap_pelaku"
                                                            @if (Request::segment(3) == 'detail') {{ 'disabled' }} @endif
                                                            value="{{ old('nama_lengkap_pelaku') ?? ($data->nama_lengkap_pelaku ?? '') }}"
                                                            name="nama_lengkap_pelaku" placeholder=""
                                                            class="form-control">
                                                        @if ($errors->has('nama_lengkap_pelaku'))
                                                            <label class="text-danger">
                                                                {{ $errors->first('nama_lengkap_pelaku') }}
                                                            </label>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="nama_panggilan_pelaku"> Nama Panggilan Pelaku <span
                                                                class="text-danger"> * </span></label>
                                                        <input type="text" id="nama_panggilan_pelaku"
                                                            @if (Request::segment(3) == 'detail') {{ 'disabled' }} @endif
                                                            value="{{ old('nama_panggilan_pelaku') ?? ($data->nama_panggilan_pelaku ?? '') }}"
                                                            name="nama_panggilan_pelaku" placeholder=""
                                                            class="form-control">
                                                        @if ($errors->has('nama_panggilan_pelaku'))
                                                            <label class="text-danger">
                                                                {{ $errors->first('nama_panggilan_pelaku') }}
                                                            </label>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">

                                                        <label for="jenis_kelamin_pelaku"> Jenis Kelamin Pelaku <span
                                                                class="text-danger"> * </span>
                                                        </label>
                                                        <select class="form-control" aria-label="Default select example"
                                                            name="jenis_kelamin_pelaku"
                                                            @if (Request::segment(3) == 'detail') {{ 'disabled' }} @endif>
                                                            <option value="" hidden>Pilih Jenis Kelamin Pelaku
                                                            </option>
                                                            <option value="Pria"
                                                                {{ (old('jenis_kelamin_pelaku') ?? ($data->jenis_kelamin_pelaku ?? '')) == 'Pria' ? 'selected' : '' }}>
                                                                Pria</option>
                                                            <option value="Wanita"
                                                                {{ (old('jenis_kelamin_pelaku') ?? ($data->jenis_kelamin_pelaku ?? '')) == 'Wanita' ? 'selected' : '' }}>
                                                                Wanita</option>
                                                        </select>
                                                        @if ($errors->has('jenis_kelamin_pelaku'))
                                                            <label class="text-danger">
                                                                {{ $errors->first('jenis_kelamin_pelaku') }}
                                                            </label>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="tempat_lahir_pelaku"> Tempat Lahir Pelaku <span
                                                                class="text-danger"> * </span></label>
                                                        <input type="text" id="tempat_lahir_pelaku"
                                                            @if (Request::segment(3) == 'detail') {{ 'disabled' }} @endif
                                                            value="{{ old('tempat_lahir_pelaku') ?? ($data->tempat_lahir_pelaku ?? '') }}"
                                                            name="tempat_lahir_pelaku" placeholder=""
                                                            class="form-control">
                                                        @if ($errors->has('tempat_lahir_pelaku'))
                                                            <label class="text-danger">
                                                                {{ $errors->first('tempat_lahir_pelaku') }}
                                                            </label>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="tanggal_lahir_pelaku"> Tanggal Lahir Pelaku <span
                                                                class="text-danger"> * </span></label>
                                                        <input type="date" id="tanggal_lahir_pelaku"
                                                            @if (Request::segment(3) == 'detail') {{ 'disabled' }} @endif
                                                            value="{{ old('tanggal_lahir_pelaku') ?? ($data->tanggal_lahir_pelaku ?? '') }}"
                                                            name="tanggal_lahir_pelaku" placeholder=""
                                                            class="form-control">
                                                        @if ($errors->has('tanggal_lahir_pelaku'))
                                                            <label class="text-danger">
                                                                {{ $errors->first('tanggal_lahir_pelaku') }}
                                                            </label>
                                                        @endif
                                                    </div>
                                                </div>




                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">

                                                        <label for="agama_pelaku"> Agama Pelaku <span class="text-danger">
                                                                * </span>
                                                        </label>
                                                        <select class="form-control" aria-label="Default select example"
                                                            name="agama_pelaku"
                                                            @if (Request::segment(3) == 'detail') {{ 'disabled' }} @endif>
                                                            <option value="" hidden>Pilih Agama Korban</option>

                                                            <option value="Kristen Protestan"
                                                                {{ (old('agama_pelaku') ?? ($data->agama_pelaku ?? '')) == 'Kristen Protestan' ? 'selected' : '' }}>
                                                                Kristen Protestan</option>
                                                            <option value="Kristen Katolik"
                                                                {{ (old('agama_pelaku') ?? ($data->agama_pelaku ?? '')) == 'Kristen Katolik' ? 'selected' : '' }}>
                                                                Kristen Katolik</option>
                                                            <option value="Islam"
                                                                {{ (old('agama_pelaku') ?? ($data->agama_pelaku ?? '')) == 'Islam' ? 'selected' : '' }}>
                                                                Islam</option>
                                                            <option value="Hindu"
                                                                {{ (old('agama_pelaku') ?? ($data->agama_pelaku ?? '')) == 'Hindu' ? 'selected' : '' }}>
                                                                Hindu</option>
                                                            <option value="Buddha"
                                                                {{ (old('agama_pelaku') ?? ($data->agama_pelaku ?? '')) == 'Buddha' ? 'selected' : '' }}>
                                                                Buddha</option>
                                                        </select>
                                                        @if ($errors->has('agama_pelaku'))
                                                            <label class="text-danger">
                                                                {{ $errors->first('agama_pelaku') }}
                                                            </label>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="pendidikan_pelaku"> Pendidikan Pelaku <span
                                                                class="text-danger"> * </span></label>
                                                        <select class="form-control" name="pendidikan_pelaku"
                                                            @disabled(Request::segment(3) == 'detail')>
                                                            <option value="" hidden>Pilih Pendidikan Pelaku</option>
                                                            <option value="Tidak Sekolah"
                                                                {{ (old('pendidikan_pelaku') ?? ($data->pendidikan_pelaku ?? '')) == 'Tidak Sekolah' ? 'selected' : '' }}>
                                                                Tidak Sekolah</option>
                                                            <option value="SD"
                                                                {{ (old('pendidikan_pelaku') ?? ($data->pendidikan_pelaku ?? '')) == 'SD' ? 'selected' : '' }}>
                                                                SD</option>
                                                            <option value="SMP"
                                                                {{ (old('pendidikan_pelaku') ?? ($data->pendidikan_pelaku ?? '')) == 'SMP' ? 'selected' : '' }}>
                                                                SMP</option>
                                                            <option value="SMA"
                                                                {{ (old('pendidikan_pelaku') ?? ($data->pendidikan_pelaku ?? '')) == 'SMA' ? 'selected' : '' }}>
                                                                SMA</option>
                                                            <option value="Diploma"
                                                                {{ (old('pendidikan_pelaku') ?? ($data->pendidikan_pelaku ?? '')) == 'Diploma' ? 'selected' : '' }}>
                                                                Diploma</option>
                                                            <option value="Sarjana"
                                                                {{ (old('pendidikan_pelaku') ?? ($data->pendidikan_pelaku ?? '')) == 'Sarjana' ? 'selected' : '' }}>
                                                                Sarjana</option>
                                                            <option value="Magister"
                                                                {{ (old('pendidikan_pelaku') ?? ($data->pendidikan_pelaku ?? '')) == 'Magister' ? 'selected' : '' }}>
                                                                Magister</option>
                                                            <option value="Doktor"
                                                                {{ (old('pendidikan_pelaku') ?? ($data->pendidikan_pelaku ?? '')) == 'Doktor' ? 'selected' : '' }}>
                                                                Doktor</option>
                                                        </select>
                                                        @error('pendidikan_pelaku')
                                                            <label class="text-danger">{{ $message }}</label>
                                                        @enderror
                                                    </div>
                                                </div>



                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="nik_pelaku"> NIK Pelaku <span class="text-danger"> *
                                                            </span></label>
                                                        <input type="text" id="nik_pelaku"
                                                            @if (Request::segment(3) == 'detail') {{ 'disabled' }} @endif
                                                            value="{{ old('nik_pelaku') ?? ($data->nik_pelaku ?? '') }}"
                                                            name="nik_pelaku" placeholder="" class="form-control">
                                                        @if ($errors->has('nik_pelaku'))
                                                            <label class="text-danger">
                                                                {{ $errors->first('nik_pelaku') }}
                                                            </label>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="no_hp_pelaku"> No. HP Pelaku <span
                                                                class="text-danger"> * </span></label>
                                                        <input type="text" id="no_hp_pelaku"
                                                            @if (Request::segment(3) == 'detail') {{ 'disabled' }} @endif
                                                            value="{{ old('no_hp_pelaku') ?? ($data->no_hp_pelaku ?? '') }}"
                                                            name="no_hp_pelaku" placeholder="" class="form-control">
                                                        @if ($errors->has('no_hp_pelaku'))
                                                            <label class="text-danger">
                                                                {{ $errors->first('no_hp_pelaku') }}
                                                            </label>
                                                        @endif
                                                    </div>
                                                </div>


                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="pekerjaan_pelaku"> Pekerjaan Pelaku (Dijelaskan)
                                                        </label>
                                                        <textarea id="summernote" @if (Request::segment(3) == 'detail') disabled @endif name="pekerjaan_pelaku"
                                                            placeholder="Masukan pekerjaan pelaku" rows="5" class="form-control">{{ old('pekerjaan_pelaku') ?? ($data->pekerjaan_pelaku ?? '') }} </textarea>

                                                        @if ($errors->has('pekerjaan_pelaku'))
                                                            <label class="text-danger">
                                                                {{ $errors->first('pekerjaan_pelaku') }}
                                                            </label>
                                                        @endif
                                                    </div>
                                                </div>


                                                <div class="col-md-12 bg-warning  rounded mb-3">
                                                    <h5 class="text-white"> Kondisi Korban Ketika Melapor</h5>
                                                </div>

                                                <!-- Kondisi Fisik -->
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="kondisi_fisik"> Fisik <span class="text-danger"> *
                                                            </span></label>
                                                        <select class="form-control" name="kondisi_fisik"
                                                            @disabled(Request::segment(3) == 'detail')>
                                                            <option value="" hidden>Pilih Kondisi Fisik</option>
                                                            <option value="Sehat"
                                                                {{ (old('kondisi_fisik') ?? ($data->kondisi_fisik ?? '')) == 'Sehat' ? 'selected' : '' }}>
                                                                Sehat</option>
                                                            <option value="Tidak Sehat / Sakit"
                                                                {{ (old('kondisi_fisik') ?? ($data->kondisi_fisik ?? '')) == 'Tidak Sehat / Sakit' ? 'selected' : '' }}>
                                                                Tidak Sehat / Sakit</option>
                                                            <option value="Luka-Luka"
                                                                {{ (old('kondisi_fisik') ?? ($data->kondisi_fisik ?? '')) == 'Luka-Luka' ? 'selected' : '' }}>
                                                                Luka-Luka</option>
                                                        </select>
                                                        @error('kondisi_fisik')
                                                            <label class="text-danger">{{ $message }}</label>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <!-- Kondisi Psikis -->
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="kondisi_psikis"> Psikis <span class="text-danger"> *
                                                            </span></label>
                                                        <select class="form-control" name="kondisi_psikis"
                                                            @disabled(Request::segment(3) == 'detail')>
                                                            <option value="" hidden>Pilih Kondisi Psikis</option>
                                                            <option value="Biasa saja"
                                                                {{ (old('kondisi_psikis') ?? ($data->kondisi_psikis ?? '')) == 'Biasa saja' ? 'selected' : '' }}>
                                                                Biasa saja</option>
                                                            <option value="Cemas"
                                                                {{ (old('kondisi_psikis') ?? ($data->kondisi_psikis ?? '')) == 'Cemas' ? 'selected' : '' }}>
                                                                Cemas</option>
                                                            <option value="Emosi Tinggi"
                                                                {{ (old('kondisi_psikis') ?? ($data->kondisi_psikis ?? '')) == 'Emosi Tinggi' ? 'selected' : '' }}>
                                                                Emosi Tinggi</option>
                                                            <option value="Ketakutan"
                                                                {{ (old('kondisi_psikis') ?? ($data->kondisi_psikis ?? '')) == 'Ketakutan' ? 'selected' : '' }}>
                                                                Ketakutan</option>
                                                            <option value="Lain-lain"
                                                                {{ (old('kondisi_psikis') ?? ($data->kondisi_psikis ?? '')) == 'Lain-lain' ? 'selected' : '' }}>
                                                                Lain-lain</option>
                                                        </select>
                                                        @error('kondisi_psikis')
                                                            <label class="text-danger">{{ $message }}</label>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <!-- Kondisi Sexual -->
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="kondisi_sexual"> Sexual <span class="text-danger"> *
                                                            </span></label>
                                                        <select class="form-control" name="kondisi_sexual"
                                                            @disabled(Request::segment(3) == 'detail')>
                                                            <option value="" hidden>Pilih Kondisi Sexual</option>
                                                            <option value="Pendarahan"
                                                                {{ (old('kondisi_sexual') ?? ($data->kondisi_sexual ?? '')) == 'Pendarahan' ? 'selected' : '' }}>
                                                                Pendarahan</option>
                                                            <option value="Lain-lain"
                                                                {{ (old('kondisi_sexual') ?? ($data->kondisi_sexual ?? '')) == 'Lain-lain' ? 'selected' : '' }}>
                                                                Lain-lain</option>
                                                        </select>
                                                        @error('kondisi_sexual')
                                                            <label class="text-danger">{{ $message }}</label>
                                                        @enderror
                                                    </div>
                                                </div>






                                                <div class="col-md-12 bg-warning  rounded mb-3">
                                                    <h5 class="text-white"> Dampak Yang Di Alami Korban</h5>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="dampak_fisik"> Dampak Fisik <span>*</span> </label>
                                                        <textarea id="summernote" @if (Request::segment(3) == 'detail') disabled @endif name="dampak_fisik"
                                                            placeholder="Masukan dampak_fisik" rows="5" class="form-control">{{ old('dampak_fisik') ?? ($data->dampak_fisik ?? '') }} </textarea>

                                                        @if ($errors->has('dampak_fisik'))
                                                            <label class="text-danger">
                                                                {{ $errors->first('dampak_fisik') }}
                                                            </label>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="dampak_psikis"> Dampak Psikis <span>*</span> </label>
                                                        <textarea id="summernote" @if (Request::segment(3) == 'detail') disabled @endif name="dampak_psikis"
                                                            placeholder="Masukan dampak_psikis" rows="5" class="form-control">{{ old('dampak_psikis') ?? ($data->dampak_psikis ?? '') }} </textarea>
                                                        @if ($errors->has('dampak_psikis'))
                                                            <label class="text-danger">
                                                                {{ $errors->first('dampak_psikis') }}
                                                            </label>
                                                        @endif
                                                    </div>
                                                </div>


                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="dampak_sex"> Dampak Sexual <span>*</span> </label>
                                                        <textarea id="summernote" @if (Request::segment(3) == 'detail') disabled @endif name="dampak_sex"
                                                            placeholder="Masukan dampak_sex" rows="5" class="form-control">{{ old('dampak_sex') ?? ($data->dampak_sex ?? '') }} </textarea>
                                                        @if ($errors->has('dampak_sex'))
                                                            <label class="text-danger">
                                                                {{ $errors->first('dampak_sex') }}
                                                            </label>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="dampak_ekonomi"> Dampak Ekonomi <span>*</span> </label>
                                                        <textarea id="summernote" @if (Request::segment(3) == 'detail') disabled @endif name="dampak_ekonomi"
                                                            placeholder="Masukan dampak_ekonomi" rows="5" class="form-control">{{ old('dampak_ekonomi') ?? ($data->dampak_ekonomi ?? '') }} </textarea>
                                                        @if ($errors->has('dampak_ekonomi'))
                                                            <label class="text-danger">
                                                                {{ $errors->first('dampak_ekonomi') }}
                                                            </label>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="dampak_kesehatan"> Dampak Kesehatan <span>*</span>
                                                        </label>
                                                        <textarea id="summernote" @if (Request::segment(3) == 'detail') disabled @endif name="dampak_kesehatan"
                                                            placeholder="Masukan dampak_kesehatan" rows="5" class="form-control">{{ old('dampak_kesehatan') ?? ($data->dampak_kesehatan ?? '') }} </textarea>
                                                        @if ($errors->has('dampak_kesehatan'))
                                                            <label class="text-danger">
                                                                {{ $errors->first('dampak_kesehatan') }}
                                                            </label>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="dampak_lainnya"> Dampak Lainnya <span> </span> </label>
                                                        <textarea id="summernote" @if (Request::segment(3) == 'detail') disabled @endif name="dampak_lainnya"
                                                            placeholder="Masukan dampak_lainnya" rows="5" class="form-control">{{ old('dampak_lainnya') ?? ($data->dampak_lainnya ?? '') }} </textarea>
                                                        @if ($errors->has('dampak_lainnya'))
                                                            <label class="text-danger">
                                                                {{ $errors->first('dampak_lainnya') }}
                                                            </label>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="col-md-12 bg-warning  rounded mb-3">
                                                    <h5 class="text-white"> Kasus yang terjadi</h5>
                                                </div>

                                                <!-- Kasus Domestik -->
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="kasus_domestik"> Kasus Domestik <span
                                                                class="text-danger"> * </span></label>
                                                        <select class="form-control" name="kasus_domestik"
                                                            @disabled(Request::segment(3) == 'detail')>
                                                            <option value="" hidden>Pilih Kasus Domestik</option>
                                                            <option value="Kekerasan Fisik"
                                                                {{ (old('kasus_domestik') ?? ($data->kasus_domestik ?? '')) == 'Kekerasan Fisik' ? 'selected' : '' }}>
                                                                Kekerasan Fisik</option>
                                                            <option value="Kekerasan Psikis"
                                                                {{ (old('kasus_domestik') ?? ($data->kasus_domestik ?? '')) == 'Kekerasan Psikis' ? 'selected' : '' }}>
                                                                Kekerasan Psikis</option>
                                                            <option value="Penelantaran RT"
                                                                {{ (old('kasus_domestik') ?? ($data->kasus_domestik ?? '')) == 'Penelantaran RT' ? 'selected' : '' }}>
                                                                Penelantaran RT</option>
                                                            <option value="Kekerasan Sexual"
                                                                {{ (old('kasus_domestik') ?? ($data->kasus_domestik ?? '')) == 'Kekerasan Sexual' ? 'selected' : '' }}>
                                                                Kekerasan Sexual</option>
                                                        </select>
                                                        @error('kasus_domestik')
                                                            <label class="text-danger">{{ $message }}</label>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <!-- Kasus Publik -->
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="kasus_publik"> Kasus Publik <span class="text-danger">
                                                                * </span></label>
                                                        <select class="form-control" name="kasus_publik"
                                                            @disabled(Request::segment(3) == 'detail')>
                                                            <option value="" hidden>Pilih Kasus Publik</option>
                                                            <option value="Penganiyaan"
                                                                {{ (old('kasus_publik') ?? ($data->kasus_publik ?? '')) == 'Penganiyaan' ? 'selected' : '' }}>
                                                                Penganiyaan</option>
                                                            <option value="Pencabulan"
                                                                {{ (old('kasus_publik') ?? ($data->kasus_publik ?? '')) == 'Pencabulan' ? 'selected' : '' }}>
                                                                Pencabulan</option>
                                                            <option value="Pemerkosaan"
                                                                {{ (old('kasus_publik') ?? ($data->kasus_publik ?? '')) == 'Pemerkosaan' ? 'selected' : '' }}>
                                                                Pemerkosaan</option>
                                                            <option value="Trafiking"
                                                                {{ (old('kasus_publik') ?? ($data->kasus_publik ?? '')) == 'Trafiking' ? 'selected' : '' }}>
                                                                Trafiking</option>
                                                        </select>
                                                        @error('kasus_publik')
                                                            <label class="text-danger">{{ $message }}</label>
                                                        @enderror
                                                    </div>
                                                </div>


                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="kasus_lainnya"> Kasus Lainnya <span> </span> </label>
                                                        <textarea id="summernote" @if (Request::segment(3) == 'detail') disabled @endif name="kasus_lainnya"
                                                            placeholder="Masukan kasus_lainnya" rows="5" class="form-control">{{ old('kasus_lainnya') ?? ($data->kasus_lainnya ?? '') }} </textarea>
                                                        @if ($errors->has('kasus_lainnya'))
                                                            <label class="text-danger">
                                                                {{ $errors->first('kasus_lainnya') }}
                                                            </label>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group mb-3">
                                                        <label for="uraian_kejadian"> Uraian Singkat kejadian <br> (Siapa,
                                                            Dimana, Kapan dan Bagaimana Terjadi) <span> </span> </label>
                                                        <textarea id="summernote" @if (Request::segment(3) == 'detail') disabled @endif name="uraian_kejadian"
                                                            placeholder="Masukan uraian_kejadian" rows="7" class="form-control">{{ old('uraian_kejadian') ?? ($data->uraian_kejadian ?? '') }} </textarea>
                                                        @if ($errors->has('uraian_kejadian'))
                                                            <label class="text-danger">
                                                                {{ $errors->first('uraian_kejadian') }}
                                                            </label>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="col-md-12 bg-warning  rounded mb-3">
                                                    <h5 class="text-white"> Pelengkap Administrasi </h5>
                                                </div>

                                                <!-- Surat Nikah Gereja -->
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="surat_nikah_gereja"> Surat Nikah Gereja </label>
                                                        <input type="file" id="surat_nikah_gereja"
                                                            name="surat_nikah_gereja" class="form-control"
                                                            @disabled(Request::segment(3) == 'detail')>

                                                        @if (!empty($data->surat_nikah_gereja))
                                                            <img src="{{ asset($data->surat_nikah_gereja) }}"
                                                                alt="Surat Nikah Gereja" class="img-fluid mt-2"
                                                                style="max-height: 200px;">
                                                        @endif

                                                        @error('surat_nikah_gereja')
                                                            <label class="text-danger">{{ $message }}</label>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <!-- Akte Nikah Catatan Sipil -->
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="aktet_nikah_sipil"> Akte Nikah Catatan Sipil </label>
                                                        <input type="file" id="aktet_nikah_sipil"
                                                            name="aktet_nikah_sipil" class="form-control"
                                                            @disabled(Request::segment(3) == 'detail')>

                                                        @if (!empty($data->aktet_nikah_sipil))
                                                            <img src="{{ asset($data->aktet_nikah_sipil) }}"
                                                                alt="Akte Nikah Catatan Sipil" class="img-fluid mt-2"
                                                                style="max-height: 200px;">
                                                        @endif

                                                        @error('aktet_nikah_sipil')
                                                            <label class="text-danger">{{ $message }}</label>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <!-- Akte Cerai Catatan Sipil -->
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="akte_cerai_sipil"> Akte Cerai Catatan Sipil </label>
                                                        <input type="file" id="akte_cerai_sipil"
                                                            name="akte_cerai_sipil" class="form-control"
                                                            @disabled(Request::segment(3) == 'detail')>

                                                        @if (!empty($data->akte_cerai_sipil))
                                                            <img src="{{ asset($data->akte_cerai_sipil) }}"
                                                                alt="Akte Cerai Catatan Sipil" class="img-fluid mt-2"
                                                                style="max-height: 200px;">
                                                        @endif

                                                        @error('akte_cerai_sipil')
                                                            <label class="text-danger">{{ $message }}</label>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <!-- Akte Nikah KUA -->
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="akte_nikah_kua"> Akte Nikah KUA </label>
                                                        <input type="file" id="akte_nikah_kua" name="akte_nikah_kua"
                                                            class="form-control" @disabled(Request::segment(3) == 'detail')>

                                                        @if (!empty($data->akte_nikah_kua))
                                                            <img src="{{ asset($data->akte_nikah_kua) }}"
                                                                alt="Akte Nikah KUA" class="img-fluid mt-2"
                                                                style="max-height: 200px;">
                                                        @endif

                                                        @error('akte_nikah_kua')
                                                            <label class="text-danger">{{ $message }}</label>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <!-- Akte Cerai KUA -->
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="akte_cerai_kua"> Akte Cerai KUA </label>
                                                        <input type="file" id="akte_cerai_kua" name="akte_cerai_kua"
                                                            class="form-control" @disabled(Request::segment(3) == 'detail')>

                                                        @if (!empty($data->akte_cerai_kua))
                                                            <img src="{{ asset($data->akte_cerai_kua) }}"
                                                                alt="Akte Cerai KUA" class="img-fluid mt-2"
                                                                style="max-height: 200px;">
                                                        @endif

                                                        @error('akte_cerai_kua')
                                                            <label class="text-danger">{{ $message }}</label>
                                                        @enderror
                                                    </div>
                                                </div>



                                            </div>




                                            @if (Request::segment(3) == 'detail' and $data->status == null)
                                                <div class="row ">
                                                    <div class="col-md-12 text-center">
                                                        <a class="btn btn-primary"
                                                            href="{{ route('dashboard.pengaduan') }}">Kembali</a>


                                                        <a class="btn btn-primary"
                                                            href="{{ route('dashboard.pengaduan.ubah', $data->id) }}">Ubah
                                                            <i class="fas fa-edit"></i> </a>

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

                                                    </div>
                                                </div>
                                            @else
                                                <div class="row">
                                                    <div class="col-md-12 text-center">
                                                        <button type="submit" class="btn btn-warning">Simpan <i
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
