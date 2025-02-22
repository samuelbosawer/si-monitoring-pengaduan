<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF - {!! $title !!} - {{ now()->format('d F Y') }} </title>
    <style>
        .data{
            border: 1px solid black;
            border-collapse: collapse;
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
            <div class="text-center" style="text-transform: uppercase ;">
                <h3 style="text-transform: uppercase;">{!! $title !!} <br>
                   DARI {{ $judul->judul_pengaduan}}<br>
                    {{ \Carbon\Carbon::now()->locale('id')->translatedFormat('l, d F Y ') }}  </h3>
            </div>
        </div>

        <div class="row">
            <div class="">
                <div class="">
                    <table class="data" width="100%">
                     @php
                        $i = 0;
                    @endphp

                        <tr>
                            <th class="data text-center">No</th>
                            <th class="data text-center">Tanggal</th>
                            <th class="data text-center">Judul Pendampingan</th>
                            <th class="data text-center">Status</th>
                        </tr>
                    @foreach ($datas as $data)
                        <tr class="data">
                            <td width="2%" class=" data text-center">{{ ++$i }}</td>
                            <td width="30%" class="data">
                                {{ \Carbon\Carbon::parse($data->created_at)->locale('id')->translatedFormat('l, d F Y H:i') }}
                            </td>
                            <td class="data" width="30%">{{ $data->judul_pendampingan}}</td>
                            <td class="data" width="30%" class="text-center">
                                {{$data->status_pendampingan}}
                            </td>


                        </tr>
                    @endforeach






















                    </table>


                </div>
            </div>
        </div>
    </div>



</body>

</html>
