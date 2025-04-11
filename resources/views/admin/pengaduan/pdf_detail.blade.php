<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF - {!! $title !!} - {{ now()->format('d F Y') }} </title>
    <style>
        .data {
            border: none;
            /* border-collapse: collapse; */
        }

        th {
            font-weight: 600;
        }

        .text-center {
            text-align: center;
        }

        .footer {
            position: fixed;
            bottom: -30px;
            /* Posisi footer di bawah halaman */
            left: 0;
            right: 0;
            height: 30px;
            text-align: center;
            font-size: 12px;
            color: gray;
            fon
        }

        .title-col {
            background-color: black;
            color: white;
            font-weight: 600;
            pandding: 20px;

        }
    </style>
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> --}}
</head>

<body>
    <div class="container">

        <div class="row">
            @include('admin.layout.pdf.kop')
            <div class="text-center">
                <h3 style="text-transform: uppercase;">{!! $title !!} <br>
                    {{ \Carbon\Carbon::now()->locale('id')->translatedFormat('l, d F Y ') }} </h3>
            </div>
        </div>

        <div class="row">
            <div class="">
                <div class="">
                    <table class="data" width="100%">
                        <tr>
                            <td class="title-col" colspan="3"> PELAPOR</td>
                        </tr>
                        <tr>
                            <td> ID Pangaduan </td>
                            <td>:</td>
                            <td> {{ $data->id }} </td>
                        </tr>
                        <tr>
                            <td> Judul Pangaduan </td>
                            <td>:</td>
                            <td> {{ $data->judul_pengaduan }} </td>
                        </tr>

                        <tr>
                            <td> Status Pangaduan </td>
                            <td>:</td>
                            <td> {{ $data->status }} </td>
                        </tr>

                        <tr>
                            <td> Catatan Tambahan Dari Kepala Bidang </td>
                            <td>:</td>
                            <td> {{ $data->catatan }} </td>
                        </tr>


                        <tr>
                            <td> Tanggal Melapor </td>
                            <td>:</td>
                            <td> {{ \Carbon\Carbon::parse($data->created_at)->locale('id')->translatedFormat('l, d F Y H:i') }}
                            </td>
                        </tr>

                        <tr>
                            <td> Yang Melapor </td>
                            <td>:</td>
                            <td> {{ $data->melapor }} </td>
                        </tr>

                        <tr>
                            <td> Nama Pelapor </td>
                            <td>:</td>
                            <td> {{ $data->nama_pelapor }} </td>
                        </tr>
                        <tr>
                            <td> Jenis Kelamin Pelapor </td>
                            <td>:</td>
                            <td> {{ $data->jk_pelapor }} </td>
                        </tr>

                        <tr>
                            <td> No HP Pelapor </td>
                            <td>:</td>
                            <td> {{ $data->no_hp_pelapor }} </td>
                        </tr>



                        <tr>
                            <td>Dapat Informasi UPTD PPA dari </td>
                            <td>:</td>
                            <td> {{ $data->informasi_dari }} </td>
                        </tr>

                        <tr>
                            <td>Alamat Pelapor </td>
                            <td>:</td>
                            <td> {{ $data->alamat_pelapor }} </td>
                        </tr>

                        <tr>
                            <td class="title-col" colspan="3"> IDENTITAS KORBAN</td>
                        </tr>

                        <tr>
                            <td>Jenis Kelamin Korban </td>
                            <td>:</td>
                            <td> {{ $data->jenis_kelamin_korban }} </td>
                        </tr>

                        <tr>
                            <td>Jenis Kelamin Korban </td>
                            <td>:</td>
                            <td> {{ $data->jenis_kelamin_korban }} </td>
                        </tr>

                        <tr>
                            <td>TTL Korban </td>
                            <td>:</td>
                            <td> {{ $data->tempat_lahir_korban . ', ' . \Carbon\Carbon::parse($data->tanggal_lahir_korban)->locale('id')->translatedFormat(' d F Y ') }}
                            </td>
                        </tr>

                        <tr>
                            <td>Jenis Kelamin Korban </td>
                            <td>:</td>
                            <td> {{ $data->jenis_kelamin_korban }} </td>
                        </tr>

                        <tr>
                            <td>Pekerjaan Korban (Dijelaskan) </td>
                            <td>:</td>
                            <td> {{ $data->pekerjaan_korban }} </td>
                        </tr>

                        <tr>
                            <td>Alamat Korban </td>
                            <td>:</td>
                            <td> {{ $data->alamat_korban }} </td>
                        </tr>

                        <tr>
                            <td>Alamat Korban </td>
                            <td>:</td>
                            <td> {{ $data->alamat_korban }} </td>
                        </tr>

                        <tr>
                            <td>Agama Korban </td>
                            <td>:</td>
                            <td> {{ $data->agama_korban }} </td>
                        </tr>

                        <tr>
                            <td>Agama Korban </td>
                            <td>:</td>
                            <td> {{ $data->agama_korban }} </td>
                        </tr>

                        <tr>
                            <td>Pendidikan Korban </td>
                            <td>:</td>
                            <td> {{ $data->pendidikan_korban }} </td>
                        </tr>

                        <tr>
                            <td>NIK Korban </td>
                            <td>:</td>
                            <td> {{ $data->nik_korban }} </td>
                        </tr>

                        <tr>
                            <td>Hubungan Dengan Pelaku</td>
                            <td>:</td>
                            <td> {{ $data->hubungan }} </td>
                        </tr>

                        <tr>
                            <td>Jumlah Anak Pria (Jika Ada)</td>
                            <td>:</td>
                            <td> {{ $data->jumlah_anak_pria }} </td>
                        </tr>

                        <tr>
                            <td>Jumlah Anak Wanita (Jika Ada)</td>
                            <td>:</td>
                            <td> {{ $data->jumlah_anak_wanita }} </td>
                        </tr>


                        <tr>
                            <td>Jumlah Anak Wanita (Jika Ada)</td>
                            <td>:</td>
                            <td> {{ $data->status_pernikahan }} </td>
                        </tr>

                        <tr>
                            <td>Status Pernikahan</td>
                            <td>:</td>
                            <td> {{ $data->status_pernikahan }} </td>
                        </tr>

                        <tr>
                            <td class="title-col" colspan="3"> IDENTITAS TERLAPOR (PELAKU)</td>
                        </tr>


                        <tr>
                            <td>Nama Lengkap Pelaku</td>
                            <td>:</td>
                            <td> {{ $data->nama_lengkap_pelaku }} </td>
                        </tr>


                        <tr>
                            <td>Jenis Kelamin Pelaku </td>
                            <td>:</td>
                            <td> {{ $data->jenis_kelamin_pelaku }} </td>
                        </tr>

                        <tr>
                            <td>TTL Pelaku </td>
                            <td>:</td>
                            <td> {{ $data->tempat_lahir_Pelaku . ', ' . \Carbon\Carbon::parse($data->tanggal_lahir_Pelaku)->locale('id')->translatedFormat(' d F Y ') }}
                            </td>
                        </tr>


                        <tr>
                            <td>Agama Pelaku </td>
                            <td>:</td>
                            <td> {{ $data->agama_pelaku }} </td>
                        </tr>
                        <tr>
                            <td>Agama Pelaku </td>
                            <td>:</td>
                            <td> {{ $data->agama_pelaku }} </td>
                        </tr>

                        <tr>
                            <td>Pendidikan Pelaku </td>
                            <td>:</td>
                            <td> {{ $data->pendidikan_pelaku }} </td>
                        </tr>

                        <tr>
                            <td>NIK Pelaku </td>
                            <td>:</td>
                            <td> {{ $data->nik_pelaku }} </td>
                        </tr>

                        <tr>
                            <td>Nomor HP Pelaku </td>
                            <td>:</td>
                            <td> {{ $data->no_hp_pelaku }} </td>
                        </tr>

                        <tr>
                            <td>Pekerjaan Pelaku (Dijelaskan) </td>
                            <td>:</td>
                            <td> {{ $data->pekerjaan_pelaku }} </td>
                        </tr>


                        <tr>
                            <td>Pekerjaan Pelaku (Dijelaskan) </td>
                            <td>:</td>
                            <td> {{ $data->pekerjaan_pelaku }} </td>
                        </tr>

                        <tr>
                            <td class="title-col" colspan="3">KONDISI KORBAN KETIKA MELAPOR</td>
                        </tr>


                        <tr>
                            <td>Kondisi Fisik </td>
                            <td>:</td>
                            <td> {{ $data->kondisi_fisik }} </td>
                        </tr>

                        <tr>
                            <td>Kondisi Psikis </td>
                            <td>:</td>
                            <td> {{ $data->kondisi_psikis }} </td>
                        </tr>

                        <tr>
                            <td>Kondisi Sexual </td>
                            <td>:</td>
                            <td> {{ $data->kondisi_sexual }} </td>
                        </tr>

                        <tr>
                            <td class="title-col" colspan="3">DAMPAK YANG DIALAMI KORBAN KETIKA MELAPOR</td>
                        </tr>

                        <tr>
                            <td>Dampak Fisik </td>
                            <td>:</td>
                            <td> {{ $data->dampak_fisik }} </td>
                        </tr>

                        <tr>
                            <td>Dampak Psikis </td>
                            <td>:</td>
                            <td> {{ $data->dampak_psikis }} </td>
                        </tr>

                        <tr>
                            <td>Dampak Sexual </td>
                            <td>:</td>
                            <td> {{ $data->dampak_sex }} </td>
                        </tr>

                        <tr>
                            <td>Dampak Ekonomi </td>
                            <td>:</td>
                            <td> {{ $data->dampak_ekonomi }} </td>
                        </tr>

                        <tr>
                            <td>Dampak Kesehatan </td>
                            <td>:</td>
                            <td> {{ $data->dampak_kesehtana }} </td>
                        </tr>

                        <tr>
                            <td>Dampak Lainnya </td>
                            <td>:</td>
                            <td> {{ $data->dampak_lainnya }} </td>
                        </tr>


                        <tr>
                            <td class="title-col" colspan="3">KASUS YANG TERJADI</td>
                        </tr>

                        <tr>
                            <td>Kasus Domestik </td>
                            <td>:</td>
                            <td> {{ $data->kasus_domestik }} </td>
                        </tr>

                        <tr>
                            <td>Kasus Publick </td>
                            <td>:</td>
                            <td> {{ $data->kasus_publick }} </td>
                        </tr>

                        <tr>
                            <td>Kasus Lainnya </td>
                            <td>:</td>
                            <td> {{ $data->kasus_lainnya }} </td>
                        </tr>

                        <tr>
                            <td>Uraian Kerjadian </td>
                            <td>:</td>
                            <td> {{ $data->uraian_kejadian }} </td>
                        </tr>


                        <tr>
                            <td class="title-col" colspan="3">PELENGKAP ADMINISTRASI</td>
                        </tr>

                        <tr>
                            <td>Surat Nikah Gereja </td>
                            <td>:</td>
                            <td>
                                @if (!empty($data->surat_nikah_gereja))
                                    <img src="{{ public_path($data->surat_nikah_gereja) }}" alt="Surat Nikah Gereja"
                                        class="img-fluid mt-2" style="max-height: 200px;">
                                @endif
                            </td>

                        <tr>
                            <td>Akte Nikah Catatan Sipil </td>
                            <td>:</td>
                            <td>
                                @if (!empty($data->akte_nikah_sipil))
                                    <img src="{{ public_path($data->akte_nikah_sipil) }}"
                                        alt="Surat akte_nikah_sipil" class="img-fluid mt-2" style="max-height: 200px;">
                                @endif
                            </td>
                        </tr>

                        <tr>

                            <td> Akte Cerai Catatan Sipil </td>
                            <td>:</td>
                            <td>
                                @if (!empty($data->akte_cerai_sipil))
                                    <img src="{{ public_path($data->akte_cerai_sipil) }}" alt="Surat akte_cerai_sipil"
                                        class="img-fluid mt-2" style="max-height: 200px;">
                                @endif
                            </td>
                        </tr>


                        <tr>
                            <td class="title-col" colspan="3">PENDAMPING</td>
                        </tr>

                        <tr>

                            <td>Nama Pendamping</td>
                            <td>:</td>
                            <td>{{$data->pendampingans->name ?? 'Belum ada'}}</td>
                        </tr>











                    </table>


                </div>
            </div>
        </div>
    </div>



</body>

</html>
