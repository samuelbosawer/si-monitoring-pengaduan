<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF - {!! $title !!} -  {{now()->format('d F Y');}} </title>
    <style>
        .data {
            border: 1px solid black;
            border-collapse: collapse;
        }
        th{
            font-weight: 600;
        }
        .text-center {
            text-align: center;
        }

        .footer {
            position: fixed;
            bottom: -30px; /* Posisi footer di bawah halaman */
            left: 0;
            right: 0;
            height: 30px;
            text-align: center;
            font-size: 12px;
            color: gray;
            fon
        }
    </style>
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> --}}
</head>

<body>
    <div class="container">

        <div class="row">
        @include('admin.layout.pdf.kop')
            <div class="text-center">
                <h3>{!! $title !!} <br> Tahun 2024 </h3>
            </div>
        </div>

        <div class="row">
            <div class="">
                <div class="">
                    <p style="font-weight: bold">1. Data Stunting</p>
                    <table class="data" border="1" width="100%">
                        <tr class="data">
                            <th width="1%">No</th>
                            <th>Distrik</th>
                            <th>Jumlah Bayi (JB)</th>
                            <th>Sangat Pendek (SP)</th>
                            <th>Pendek (P)</th>
                            <th>Faktor</th>

                        </tr>
                        @php
                            $i = 0;
                        @endphp
                          @forelse ($stunting as $data)
                          <tr>
                              <td style="text-align: center">{{ ++$i }}</td>
                              <td style="text-align: center">
                                  {{ $data->distrik->nama_distrik ?? '' }}
                              </td>
                              <td style="text-align: center">
                                  {{ $data->jumlah_balita }}
                              </td>
                              <td style="text-align: center">
                                  {{ $data->sangat_pendek }}
                              </td>

                              <td style="text-align: center">
                                  {{ $data->pendek }}
                              </td>
                              <td style="text-align: center">
                                  {{ $data->faktor->faktor }}
                              </td>

                          </tr>
                      @empty
                          <tr>
                              <td colspan="7">
                                  No data . . .
                              </td>
                          </tr>
                      @endforelse

                    </table>

                    <p style="font-weight: bold">2. Centroid Perhitungan Iterasi Pertama</p>

                    <table class="data" border="1" width="100%">
                        <tr class="data">
                            <th width="1%">Centroid</th>
                            <th> JB</th>
                            <th>SP</th>
                            <th> P</th>
                        </tr>
                        <tr>
                            <td style="text-align: center">
                                C1
                            </td>
                            <td style="text-align: center">
                                {{ $c1[0][0]->jumlah_balita }}

                            </td>
                            <td style="text-align: center">
                                {{ $c1[0][0]->sangat_pendek }}
                            </td>
                            <td style="text-align: center">
                                {{ $c1[0][0]->pendek }}
                            </td>
                        </tr>

                        <tr>
                            <td style="text-align: center">
                                C2
                            </td>
                            <td style="text-align: center">
                                {{ $c1[1][0]->jumlah_balita }}
                            </td>
                            <td style="text-align: center">
                                {{ $c1[1][0]->sangat_pendek }}
                            </td>
                            <td style="text-align: center">
                                {{ $c1[1][0]->pendek }}
                            </td>
                        </tr>

                        <tr>
                            <td style="text-align: center">
                                C3
                            </td>
                            <td style="text-align: center">
                                {{ $c1[2][0]->jumlah_balita }}
                            </td>
                            <td style="text-align: center">
                                {{ $c1[2][0]->sangat_pendek }}
                            </td>
                            <td style="text-align: center">
                                {{ $c1[2][0]->pendek }}
                            </td>
                        </tr>

                    </table>

                    <p style="font-weight: bold">3. Perhitungan Iterasi Pertama</p>
                    <table border="1" class="data"  width="100%">
                        <tr class="">
                            <th width="1%">No</th>
                            <th>Distrik</th>
                            <th>JB</th>
                            <th>SP</th>
                            <th>P</th>
                            <th>C1</th>
                            <th>C2</th>
                            <th>C3</th>
                            <th>Jarak Terdekat</th>
                            <th>Cluster</th>


                        </tr>
                        @php
                            $i = 0;
                            // c1
                            $sum_c1_2_jb = 0; // Penampung total
                            $sum_c1_2_jb_count = 0; // Penampung total
                            $sum_c1_2_sp = 0; // Penampung total
                            $sum_c1_2_p = 0; // Penampung total

                            // c2
                            $sum_c2_2_jb = 0; // Penampung total
                            $sum_c2_2_jb_count = 0; // Penampung total
                            $sum_c2_2_sp = 0; // Penampung total
                            $sum_c2_2_p = 0; // Penampung total

                            // c3
                            $sum_c3_2_jb = 0; // Penampung total
                            $sum_c3_2_jb_count = 0; // Penampung total
                            $sum_c3_2_sp = 0; // Penampung total
                            $sum_c3_2_p = 0; // Penampung total

                        @endphp
                        @foreach ($stunting as $data)
                            <tr>
                                <td style="text-align: center">{{ ++$i }}</td>
                                <td style="text-align: center">
                                    {{ $data->distrik->nama_distrik ?? '' }}
                                </td>
                                <td style="text-align: center">
                                    {{ $data->jumlah_balita }}
                                </td>
                                <td style="text-align: center">
                                    {{ $data->sangat_pendek }}
                                </td>

                                <td style="text-align: center">
                                    {{ $data->pendek }}
                                </td>


                                <td style="text-align: center">

                                    <?php
                                    if (is_array($c1)) {
                                        $c1_jb = isset($c1[0][0]->jumlah_balita) ? intval($c1[0][0]->jumlah_balita) : 0;
                                        $c1_sp = isset($c1[0][0]->sangat_pendek) ? intval($c1[0][0]->sangat_pendek) : 0;
                                        $c1_p = isset($c1[0][0]->pendek) ? intval($c1[0][0]->pendek) : 0;
                                    } else {
                                        $c1_jb = 0;
                                        $c1_sp = 0;
                                        $c1_p = 0;
                                    }

                                    $data_jb = isset($data->jumlah_balita) ? intval($data->jumlah_balita) : 0;
                                    $data_sp = isset($data->sangat_pendek) ? intval($data->sangat_pendek) : 0;
                                    $data_p = isset($data->pendek) ? intval($data->pendek) : 0;

                                    $c1_result = round(sqrt(pow($data_jb - $c1_jb, 2) + pow($data_sp - $c1_sp, 2) + pow($data_p - $c1_p, 2)), 8);

                                    $c1_array[] = $c1_result;
                                    echo $c1_result;

                                    ?>



                                </td>


                                <td style="text-align: center">
                                    <?php
                                    if (is_array($c1)) {
                                        $c1_jb = isset($c1[1][0]->jumlah_balita) ? intval($c1[1][0]->jumlah_balita) : 0;
                                        $c1_sp = isset($c1[1][0]->sangat_pendek) ? intval($c1[1][0]->sangat_pendek) : 0;
                                        $c1_p = isset($c1[1][0]->pendek) ? intval($c1[1][0]->pendek) : 0;
                                    } else {
                                        $c1_jb = 0;
                                        $c1_sp = 0;
                                        $c1_p = 0;
                                    }

                                    $data_jb = isset($data->jumlah_balita) ? intval($data->jumlah_balita) : 0;
                                    $data_sp = isset($data->sangat_pendek) ? intval($data->sangat_pendek) : 0;
                                    $data_p = isset($data->pendek) ? intval($data->pendek) : 0;

                                    $c2_result = round(sqrt(pow($data_jb - $c1_jb, 2) + pow($data_sp - $c1_sp, 2) + pow($data_p - $c1_p, 2)), 8);

                                    $c2_array[] = $c2_result;

                                    echo $c2_result;

                                    ?>


                                </td>

                                <td style="text-align: center">
                                    <?php
                                    if (is_array($c1)) {
                                        $c1_jb = isset($c1[2][0]->jumlah_balita) ? intval($c1[2][0]->jumlah_balita) : 0;
                                        $c1_sp = isset($c1[2][0]->sangat_pendek) ? intval($c1[2][0]->sangat_pendek) : 0;
                                        $c1_p = isset($c1[2][0]->pendek) ? intval($c1[2][0]->pendek) : 0;
                                    } else {
                                        $c1_jb = 0;
                                        $c1_sp = 0;
                                        $c1_p = 0;
                                    }

                                    $data_jb = isset($data->jumlah_balita) ? intval($data->jumlah_balita) : 0;
                                    $data_sp = isset($data->sangat_pendek) ? intval($data->sangat_pendek) : 0;
                                    $data_p = isset($data->pendek) ? intval($data->pendek) : 0;

                                    $c3_result = round(sqrt(pow($data_jb - $c1_jb, 2) + pow($data_sp - $c1_sp, 2) + pow($data_p - $c1_p, 2)), 8);

                                    $c3_array[] = $c3_result;

                                    echo $c3_result;

                                    ?>

                                </td>

                                <td style="text-align: center">
                                    {{ min([$c1_result, $c2_result, $c3_result]) }}
                                </td>

                                <td style="text-align: center">
                                    @if ($c1_result < $c2_result and $c1_result < $c3_result)
                                        1

                                        <?php
                                        $sum_c1_2_jb = $sum_c1_2_jb + $data_jb;
                                        ++$sum_c1_2_jb_count;

                                        $sum_c1_2_sp = $sum_c1_2_sp + $data_sp;
                                        $sum_c1_2_p = $sum_c1_2_p + $data_p;
                                        ?>
                                    @endif

                                    @if ($c2_result < $c1_result and $c2_result < $c3_result)
                                        2

                                        <?php
                                        $sum_c2_2_jb = $sum_c2_2_jb + $data_jb;
                                        ++$sum_c2_2_jb_count;

                                        $sum_c2_2_sp = $sum_c2_2_sp + $data_sp;
                                        $sum_c2_2_p = $sum_c2_2_p + $data_p;
                                        ?>
                                    @endif

                                    @if ($c3_result < $c1_result and $c3_result < $c2_result)
                                        3
                                        <?php
                                        $sum_c3_2_jb = $sum_c3_2_jb + $data_jb;
                                        ++$sum_c3_2_jb_count;

                                        $sum_c3_2_sp = $sum_c3_2_sp + $data_sp;
                                        $sum_c3_2_p = $sum_c3_2_p + $data_p;
                                        ?>
                                    @endif

                                </td>

                        @endforeach

                        </tr>
                    </table>

                    <p style="font-weight: bold">4. Centroid Perhitungan Iterasi Kedua</p>
                    <table border="1" class="data"  width="100%">
                        <tr class="">
                            <th>Centroid</th>
                            <th>JB</th>
                            <th>SP</th>
                            <th>P</th>

                        </tr>
                        <tr>
                            <td style="text-align:center">
                                C1
                            </td>
                            <td style="text-align:center">
                                {{ $c1_jb = round($sum_c1_2_jb / $sum_c1_2_jb_count, 3) }}
                            </td>
                            <td style="text-align:center">
                                {{ $c1_sp = round($sum_c1_2_sp / $sum_c1_2_jb_count, 3) }}
                            </td>
                            <td style="text-align:center">
                                {{ $c1_p = round($sum_c1_2_p / $sum_c1_2_jb_count, 3) }}
                            </td>
                        </tr>

                        <tr>
                            <td style="text-align:center">
                                C2
                            </td>
                            <td style="text-align:center">
                                {{ $c2_jb = round($sum_c2_2_jb / $sum_c2_2_jb_count, 3) }}
                            </td>
                            <td style="text-align:center">
                                {{ $c2_sp = round($sum_c2_2_sp / $sum_c2_2_jb_count, 3) }}
                            </td>
                            <td style="text-align:center">
                                {{ $c2_p = round($sum_c2_2_p / $sum_c2_2_jb_count, 3) }}
                            </td>
                        </tr>

                        <tr>
                            <td style="text-align:center">
                                C3
                            </td>
                            <td style="text-align:center">
                                {{ $c3_jb = round($sum_c3_2_jb / $sum_c3_2_jb_count, 3) }}
                            </td>
                            <td style="text-align:center">
                                {{ $c3_sp = round($sum_c3_2_sp / $sum_c3_2_jb_count, 3) }}
                            </td>
                            <td style="text-align:center">
                                {{ $c3_p = round($sum_c3_2_p / $sum_c3_2_jb_count, 3) }}
                            </td>
                        </tr>


                    </table>

                    <p style="font-weight: bold">5. Perhitungan Iterasi Kedua</p>
                    <table border="1" class="data"  width="100%">
                        <tr class="">
                            <th width="1%">No</th>
                            <th>Distrik</th>
                            <th>JB</th>
                            <th>SP</th>
                            <th>P</th>
                            <th>C1</th>
                            <th>C2</th>
                            <th>C3</th>
                            <th>Jarak Terdekat</th>
                            <th>Cluster</th>

                        </tr>
                        @php
                            $i = 0;
                            // c1
                            $sum_c1_3_jb = 0; // Penampung total
                            $sum_c1_3_jb_count = 0; // Penampung total
                            $sum_c1_3_sp = 0; // Penampung total
                            $sum_c1_3_p = 0; // Penampung total

                            // c2
                            $sum_c2_3_jb = 0; // Penampung total
                            $sum_c2_3_jb_count = 0; // Penampung total
                            $sum_c2_3_sp = 0; // Penampung total
                            $sum_c2_3_p = 0; // Penampung total

                            // c3
                            $sum_c3_3_jb = 0; // Penampung total
                            $sum_c3_3_jb_count = 0; // Penampung total
                            $sum_c3_3_sp = 0; // Penampung total
                            $sum_c3_3_p = 0; // Penampung total

                        @endphp
                        @foreach ($stunting as $data)
                            <tr>
                                <td style="text-align: center">{{ ++$i }}</td>
                                <td style="text-align: center">
                                    {{ $data->distrik->nama_distrik ?? '' }}
                                </td>
                                <td style="text-align: center">
                                    {{ $data->jumlah_balita }}
                                </td>
                                <td style="text-align: center">
                                    {{ $data->sangat_pendek }}
                                </td>

                                <td style="text-align: center">
                                    {{ $data->pendek }}
                                </td>
                                <td style="text-align: center">

                                    <?php
                                    if ($c1_jb) {
                                        $c1_jb_2 = isset($c1_jb) ? $c1_jb : 0;
                                        $c1_sp_2 = isset($c1_sp) ? $c1_sp : 0;
                                        $c1_p_2 = isset($c1_p) ? $c1_p : 0;
                                    } else {
                                        $c1_jb_2 = 0;
                                        $c1_sp_2 = 0;
                                        $c1_p_2 = 0;
                                    }

                                    $data_jb = isset($data->jumlah_balita) ? $data->jumlah_balita : 0;
                                    $data_sp = isset($data->sangat_pendek) ? $data->sangat_pendek : 0;
                                    $data_p = isset($data->pendek) ? $data->pendek : 0;

                                    $c1_result = round(sqrt(pow($data_jb - $c1_jb_2, 2) + pow($data_sp - $c1_sp_2, 2) + pow($data_p - $c1_p_2, 2)), 8);

                                    $c1_array[] = $c1_result;
                                    echo $c1_result;

                                    ?>


                                </td>


                                <td>

                                    <?php
                                    if ($c2_jb) {
                                        $c2_jb_2 = isset($c2_jb) ? $c2_jb : 0;
                                        $c2_sp_2 = isset($c2_sp) ? $c2_sp : 0;
                                        $c2_p_2 = isset($c2_p) ? $c2_p : 0;
                                    } else {
                                        $c2_jb_2 = 0;
                                        $c2_sp_2 = 0;
                                        $c2_p_2 = 0;
                                    }

                                    $data_jb = isset($data->jumlah_balita) ? $data->jumlah_balita : 0;
                                    $data_sp = isset($data->sangat_pendek) ? $data->sangat_pendek : 0;
                                    $data_p = isset($data->pendek) ? $data->pendek : 0;

                                    $c2_result = round(sqrt(pow($data_jb - $c2_jb_2, 2) + pow($data_sp - $c2_sp_2, 2) + pow($data_p - $c2_p_2, 2)), 8);

                                    $c2_array[] = $c2_result;
                                    echo $c2_result;

                                    ?>


                                </td>

                                <td style="text-align: center">
                                    <?php
                                    if ($c3_jb) {
                                        $c3_jb_2 = isset($c3_jb) ? $c3_jb : 0;
                                        $c3_sp_2 = isset($c3_sp) ? $c3_sp : 0;
                                        $c3_p_2 = isset($c3_p) ? $c3_p : 0;
                                    } else {
                                        $c3_jb_2 = 0;
                                        $c3_sp_2 = 0;
                                        $c3_p_2 = 0;
                                    }

                                    $data_jb = isset($data->jumlah_balita) ? $data->jumlah_balita : 0;
                                    $data_sp = isset($data->sangat_pendek) ? $data->sangat_pendek : 0;
                                    $data_p = isset($data->pendek) ? $data->pendek : 0;

                                    $c3_result = round(sqrt(pow($data_jb - $c3_jb_2, 2) + pow($data_sp - $c3_sp_2, 2) + pow($data_p - $c3_p_2, 2)), 8);

                                    $c3_array[] = $c3_result;
                                    echo $c3_result;

                                    ?>
                                </td>


                                <td style="text-align: center">
                                        {{ min([$c1_result, $c2_result, $c3_result]) }}

                                </td>




                                    <td style="text-align: center">
                                        @if ($c1_result < $c2_result and $c1_result < $c3_result)
                                            1

                                            <?php
                                            $sum_c1_3_jb = $sum_c1_3_jb + $data_jb;
                                            ++$sum_c1_3_jb_count;

                                            $sum_c1_3_sp = $sum_c1_3_sp + $data_sp;
                                            $sum_c1_3_p = $sum_c1_3_p + $data_p;
                                            ?>
                                        @endif

                                        @if ($c2_result < $c1_result and $c2_result < $c3_result)
                                            2

                                            <?php
                                            $sum_c2_3_jb = $sum_c2_3_jb + $data_jb;
                                            ++$sum_c2_3_jb_count;

                                            $sum_c2_3_sp = $sum_c2_3_sp + $data_sp;
                                            $sum_c2_3_p = $sum_c2_3_p + $data_p;
                                            ?>
                                        @endif

                                        @if ($c3_result < $c1_result and $c3_result < $c2_result)
                                            3
                                            <?php
                                            $sum_c3_3_jb = $sum_c3_3_jb + $data_jb;
                                            ++$sum_c3_3_jb_count;

                                            $sum_c3_3_sp = $sum_c3_3_sp + $data_sp;
                                            $sum_c3_3_p = $sum_c3_3_p + $data_p;
                                            ?>
                                        @endif

                                    </td>

                                    {{-- Buat Array Data Baru --}}
                            @endforeach






                        </tr>


                    </table>


                    <p style="font-weight: bold">6. Centroid Perhitungan Iterasi Ketiga</p>
                    <table border="1" class="data"  width="100%">
                        <tr class="">
                            <th>Centroid</th>
                            <th>JB</th>
                            <th>SP</th>
                            <th>P</th>

                        </tr>
                        <tr>
                            <td style="text-align: center">
                                C1
                            </td>
                            <td style="text-align: center">
                                {{ $c1_jb = round($sum_c1_3_jb / $sum_c1_3_jb_count, 3) }}
                            </td>
                            <td style="text-align: center">
                                {{ $c1_sp = round($sum_c1_3_sp / $sum_c1_3_jb_count, 3) }}
                            </td>
                            <td style="text-align: center">
                                {{ $c1_p = round($sum_c1_3_p / $sum_c1_3_jb_count, 3) }}
                            </td>
                        </tr>

                        <tr>
                            <td style="text-align: center">
                                C2
                            </td>
                            <td style="text-align: center">
                                {{ $c2_jb = round($sum_c2_3_jb / $sum_c2_3_jb_count, 3) }}
                            </td>
                            <td style="text-align: center">
                                {{ $c2_sp = round($sum_c2_3_sp / $sum_c2_3_jb_count, 3) }}
                            </td>
                            <td style="text-align: center">
                                {{ $c2_p = round($sum_c2_3_p / $sum_c2_3_jb_count, 3) }}
                            </td>
                        </tr>

                        <tr>
                            <td style="text-align: center">
                                C3
                            </td>
                            <td style="text-align: center">
                                {{ $c3_jb = round($sum_c3_3_jb / $sum_c3_3_jb_count, 3) }}
                            </td>
                            <td style="text-align: center">
                                {{ $c3_sp = round($sum_c3_3_sp / $sum_c3_3_jb_count, 3) }}
                            </td>
                            <td style="text-align: center">
                                {{ $c3_p = round($sum_c3_3_p / $sum_c3_3_jb_count, 3) }}
                            </td>
                        </tr>


                    </table>



                    <p style="font-weight: bold">7. Perhitungan Iterasi Ketiga</p>
                    <table border="1" class="data"  width="100%">
                        <tr class="">
                            <th width="1%">No</th>
                            <th>Distrik</th>
                            <th>JB</th>
                            <th>SP</th>
                            <th>P</th>
                            <th>C1</th>
                            <th>C2</th>
                            <th>C3</th>
                            <th>Jarak Terdekat</th>
                            <th>Cluster</th>

                        </tr>
                        @php
                            $i = 0;
                            // c1
                            $sum_c1_4_jb = 0; // Penampung total
                            $sum_c1_4_jb_count = 0; // Penampung total
                            $sum_c1_4_sp = 0; // Penampung total
                            $sum_c1_4_p = 0; // Penampung total

                            // c2
                            $sum_c2_4_jb = 0; // Penampung total
                            $sum_c2_4_jb_count = 0; // Penampung total
                            $sum_c2_4_sp = 0; // Penampung total
                            $sum_c2_4_p = 0; // Penampung total

                            // c3
                            $sum_c3_4_jb = 0; // Penampung total
                            $sum_c3_4_jb_count = 0; // Penampung total
                            $sum_c3_4_sp = 0; // Penampung total
                            $sum_c3_4_p = 0; // Penampung total

                        @endphp
                        @foreach ($stunting as $data)
                            <tr>
                                <td style="text-align: center">{{ ++$i }}</td>
                                <td style="text-align: center">
                                    {{ $data->distrik->nama_distrik ?? '' }}
                                </td>
                                <td style="text-align: center">
                                    {{ $data->jumlah_balita }}
                                </td>
                                <td style="text-align: center">
                                    {{ $data->sangat_pendek }}
                                </td>

                                <td style="text-align: center">
                                    {{ $data->pendek }}
                                </td>
                                <td style="text-align: center">

                                    <?php
                                    if ($c1_jb) {
                                        $c1_jb_2 = isset($c1_jb) ? $c1_jb : 0;
                                        $c1_sp_2 = isset($c1_sp) ? $c1_sp : 0;
                                        $c1_p_2 = isset($c1_p) ? $c1_p : 0;
                                    } else {
                                        $c1_jb_2 = 0;
                                        $c1_sp_2 = 0;
                                        $c1_p_2 = 0;
                                    }

                                    $data_jb = isset($data->jumlah_balita) ? $data->jumlah_balita : 0;
                                    $data_sp = isset($data->sangat_pendek) ? $data->sangat_pendek : 0;
                                    $data_p = isset($data->pendek) ? $data->pendek : 0;

                                    $c1_result = round(sqrt(pow($data_jb - $c1_jb_2, 2) + pow($data_sp - $c1_sp_2, 2) + pow($data_p - $c1_p_2, 2)), 8);

                                    $c1_array[] = $c1_result;
                                    echo $c1_result;

                                    ?>


                                </td>


                                <td style="text-align: center">

                                    <?php
                                    if ($c2_jb) {
                                        $c2_jb_2 = isset($c2_jb) ? $c2_jb : 0;
                                        $c2_sp_2 = isset($c2_sp) ? $c2_sp : 0;
                                        $c2_p_2 = isset($c2_p) ? $c2_p : 0;
                                    } else {
                                        $c2_jb_2 = 0;
                                        $c2_sp_2 = 0;
                                        $c2_p_2 = 0;
                                    }

                                    $data_jb = isset($data->jumlah_balita) ? $data->jumlah_balita : 0;
                                    $data_sp = isset($data->sangat_pendek) ? $data->sangat_pendek : 0;
                                    $data_p = isset($data->pendek) ? $data->pendek : 0;

                                    $c2_result = round(sqrt(pow($data_jb - $c2_jb_2, 2) + pow($data_sp - $c2_sp_2, 2) + pow($data_p - $c2_p_2, 2)), 8);

                                    $c2_array[] = $c2_result;
                                    echo $c2_result;

                                    ?>


                                </td>

                                <td style="text-align: center">
                                    <?php
                                    if ($c3_jb) {
                                        $c3_jb_2 = isset($c3_jb) ? $c3_jb : 0;
                                        $c3_sp_2 = isset($c3_sp) ? $c3_sp : 0;
                                        $c3_p_2 = isset($c3_p) ? $c3_p : 0;
                                    } else {
                                        $c3_jb_2 = 0;
                                        $c3_sp_2 = 0;
                                        $c3_p_2 = 0;
                                    }

                                    $data_jb = isset($data->jumlah_balita) ? $data->jumlah_balita : 0;
                                    $data_sp = isset($data->sangat_pendek) ? $data->sangat_pendek : 0;
                                    $data_p = isset($data->pendek) ? $data->pendek : 0;

                                    $c3_result = round(sqrt(pow($data_jb - $c3_jb_2, 2) + pow($data_sp - $c3_sp_2, 2) + pow($data_p - $c3_p_2, 2)), 8);

                                    $c3_array[] = $c3_result;
                                    echo $c3_result;

                                    ?>
                                </td>


                                <td style="text-align: center">
                                        {{ min([$c1_result, $c2_result, $c3_result]) }}

                                </td>




                                    <td style="text-align: center">
                                        @if ($c1_result < $c2_result and $c1_result < $c3_result)
                                            1

                                            <?php
                                            $sum_c1_4_jb = $sum_c1_4_jb + $data_jb;
                                            ++$sum_c1_4_jb_count;

                                            $sum_c1_4_sp = $sum_c1_4_sp + $data_sp;
                                            $sum_c1_4_p = $sum_c1_4_p + $data_p;
                                            ?>
                                        @endif

                                        @if ($c2_result < $c1_result and $c2_result < $c3_result)
                                            2

                                            <?php
                                            $sum_c2_4_jb = $sum_c2_4_jb + $data_jb;
                                            ++$sum_c2_4_jb_count;

                                            $sum_c2_4_sp = $sum_c2_4_sp + $data_sp;
                                            $sum_c2_4_p = $sum_c2_4_p + $data_p;
                                            ?>
                                        @endif

                                        @if ($c3_result < $c1_result and $c3_result < $c2_result)
                                            3
                                            <?php
                                            $sum_c3_4_jb = $sum_c3_4_jb + $data_jb;
                                            ++$sum_c3_4_jb_count;

                                            $sum_c3_4_sp = $sum_c3_4_sp + $data_sp;
                                            $sum_c3_4_p = $sum_c3_4_p + $data_p;
                                            ?>
                                        @endif

                                    </td>

                                    {{-- Buat Array Data Baru --}}
                            @endforeach






                        </tr>


                    </table>

<br><br><br><br>
                    <p style="font-weight: bold">8. Centroid Perhitungan Iterasi Keempat</p>
                    <table border="1" class="data"  width="100%">
                        <tr class="">
                            <th>Centroid</th>
                            <th>JB</th>
                            <th>SP</th>
                            <th>P</th>

                        </tr>
                        <tr>
                              <td style="text-align:center">
                                C1
                            </td>
                              <td style="text-align:center">
                                {{ $c1_jb = round($sum_c1_4_jb / $sum_c1_4_jb_count, 3) }}
                            </td>
                              <td style="text-align:center">
                                {{ $c1_sp = round($sum_c1_4_sp / $sum_c1_4_jb_count, 3) }}
                            </td>
                              <td style="text-align:center">
                                {{ $c1_p = round($sum_c1_4_p / $sum_c1_4_jb_count, 3) }}
                            </td>
                        </tr>

                        <tr>
                              <td style="text-align:center">
                                C2
                            </td>
                              <td style="text-align:center">
                                {{ $c2_jb = round($sum_c2_4_jb / $sum_c2_4_jb_count, 3) }}
                            </td>
                              <td style="text-align:center">
                                {{ $c2_sp = round($sum_c2_4_sp / $sum_c2_4_jb_count, 3) }}
                            </td>
                              <td style="text-align:center">
                                {{ $c2_p = round($sum_c2_4_p / $sum_c2_4_jb_count, 3) }}
                            </td>
                        </tr>

                        <tr>
                              <td style="text-align:center">
                                C3
                            </td>
                              <td style="text-align:center">
                                {{ $c3_jb = round($sum_c3_4_jb / $sum_c3_4_jb_count, 3) }}
                            </td>
                              <td style="text-align:center">
                                {{ $c3_sp = round($sum_c3_4_sp / $sum_c3_4_jb_count, 3) }}
                            </td>
                              <td style="text-align:center">
                                {{ $c3_p = round($sum_c3_4_p / $sum_c3_4_jb_count, 3) }}
                            </td>
                        </tr>


                    </table>

                    <p style="font-weight: bold">9. Perhitungan Iterasi Keempat</p>
                    <table border="1" class="data"  width="100%">
                        <tr class="">
                            <th width="1%">No</th>
                            <th>Distrik</th>
                            <th>JB</th>
                            <th>SP</th>
                            <th>P</th>
                            <th>C1</th>
                            <th>C2</th>
                            <th>C3</th>
                            <th>Jarak Terdekat</th>
                            <th>Cluster</th>

                        </tr>
                        @php
                            $i = 0;
                            // c1
                            $sum_c1_5_jb = 0; // Penampung total
                            $sum_c1_5_jb_count = 0; // Penampung total
                            $sum_c1_5_sp = 0; // Penampung total
                            $sum_c1_5_p = 0; // Penampung total

                            // c2
                            $sum_c2_5_jb = 0; // Penampung total
                            $sum_c2_5_jb_count = 0; // Penampung total
                            $sum_c2_5_sp = 0; // Penampung total
                            $sum_c2_5_p = 0; // Penampung total

                            // c3
                            $sum_c3_5_jb = 0; // Penampung total
                            $sum_c3_5_jb_count = 0; // Penampung total
                            $sum_c3_5_sp = 0; // Penampung total
                            $sum_c3_5_p = 0; // Penampung total

                        @endphp
                        @foreach ($stunting as $data)
                            <tr>
                               <td style="text-align:center">
                                    {{ ++$i }}</td>
                               <td style="text-align:center">
                                    {{ $data->distrik->nama_distrik ?? '' }}
                                </td>
                               <td style="text-align:center">
                                    {{ $data->jumlah_balita }}
                                </td>
                               <td style="text-align:center">
                                    {{ $data->sangat_pendek }}
                                </td>

                               <td style="text-align:center">
                                    {{ $data->pendek }}
                                </td>
                               <td style="text-align:center">

                                    <?php
                                    if ($c1_jb) {
                                        $c1_jb_2 = isset($c1_jb) ? $c1_jb : 0;
                                        $c1_sp_2 = isset($c1_sp) ? $c1_sp : 0;
                                        $c1_p_2 = isset($c1_p) ? $c1_p : 0;
                                    } else {
                                        $c1_jb_2 = 0;
                                        $c1_sp_2 = 0;
                                        $c1_p_2 = 0;
                                    }

                                    $data_jb = isset($data->jumlah_balita) ? $data->jumlah_balita : 0;
                                    $data_sp = isset($data->sangat_pendek) ? $data->sangat_pendek : 0;
                                    $data_p = isset($data->pendek) ? $data->pendek : 0;

                                    $c1_result = round(sqrt(pow($data_jb - $c1_jb_2, 2) + pow($data_sp - $c1_sp_2, 2) + pow($data_p - $c1_p_2, 2)), 8);

                                    $c1_array[] = $c1_result;
                                    echo $c1_result;

                                    ?>


                                </td>


                               <td style="text-align:center">

                                    <?php
                                    if ($c2_jb) {
                                        $c2_jb_2 = isset($c2_jb) ? $c2_jb : 0;
                                        $c2_sp_2 = isset($c2_sp) ? $c2_sp : 0;
                                        $c2_p_2 = isset($c2_p) ? $c2_p : 0;
                                    } else {
                                        $c2_jb_2 = 0;
                                        $c2_sp_2 = 0;
                                        $c2_p_2 = 0;
                                    }

                                    $data_jb = isset($data->jumlah_balita) ? $data->jumlah_balita : 0;
                                    $data_sp = isset($data->sangat_pendek) ? $data->sangat_pendek : 0;
                                    $data_p = isset($data->pendek) ? $data->pendek : 0;

                                    $c2_result = round(sqrt(pow($data_jb - $c2_jb_2, 2) + pow($data_sp - $c2_sp_2, 2) + pow($data_p - $c2_p_2, 2)), 8);

                                    $c2_array[] = $c2_result;
                                    echo $c2_result;

                                    ?>


                                </td>

                               <td style="text-align:center">
                                    <?php
                                    if ($c3_jb) {
                                        $c3_jb_2 = isset($c3_jb) ? $c3_jb : 0;
                                        $c3_sp_2 = isset($c3_sp) ? $c3_sp : 0;
                                        $c3_p_2 = isset($c3_p) ? $c3_p : 0;
                                    } else {
                                        $c3_jb_2 = 0;
                                        $c3_sp_2 = 0;
                                        $c3_p_2 = 0;
                                    }

                                    $data_jb = isset($data->jumlah_balita) ? $data->jumlah_balita : 0;
                                    $data_sp = isset($data->sangat_pendek) ? $data->sangat_pendek : 0;
                                    $data_p = isset($data->pendek) ? $data->pendek : 0;

                                    $c3_result = round(sqrt(pow($data_jb - $c3_jb_2, 2) + pow($data_sp - $c3_sp_2, 2) + pow($data_p - $c3_p_2, 2)), 8);

                                    $c3_array[] = $c3_result;
                                    echo $c3_result;

                                    ?>
                                </td>


                               <td style="text-align:center">
                                        {{ min([$c1_result, $c2_result, $c3_result]) }}

                                </td>




                                   <td style="text-align:center">
                                        @if ($c1_result < $c2_result and $c1_result < $c3_result)
                                            1

                                            <?php
                                            $sum_c1_5_jb = $sum_c1_5_jb + $data_jb;
                                            ++$sum_c1_5_jb_count;

                                            $sum_c1_5_sp = $sum_c1_5_sp + $data_sp;
                                            $sum_c1_5_p = $sum_c1_5_p + $data_p;
                                            ?>
                                        @endif

                                        @if ($c2_result < $c1_result and $c2_result < $c3_result)
                                            2

                                            <?php
                                            $sum_c2_5_jb = $sum_c2_5_jb + $data_jb;
                                            ++$sum_c2_5_jb_count;

                                            $sum_c2_5_sp = $sum_c2_5_sp + $data_sp;
                                            $sum_c2_5_p = $sum_c2_5_p + $data_p;
                                            ?>
                                        @endif

                                        @if ($c3_result < $c1_result and $c3_result < $c2_result)
                                            3
                                            <?php
                                            $sum_c3_5_jb = $sum_c3_5_jb + $data_jb;
                                            ++$sum_c3_5_jb_count;

                                            $sum_c3_5_sp = $sum_c3_5_sp + $data_sp;
                                            $sum_c3_5_p = $sum_c3_5_p + $data_p;
                                            ?>
                                        @endif

                                    </td>

                                    {{-- Buat Array Data Baru --}}
                            @endforeach






                        </tr>


                    </table>

                    <p style="font-weight: bold">10. Centroid Perhitungan Iterasi Kelima</p>

                    <table border="1" class="data"  width="100%">
                        <tr class="">
                            <th>Centroid</th>
                            <th>JB</th>
                            <th>SP</th>
                            <th>P</th>

                        </tr>
                        <tr>
                            <td style="text-align:center">
                                C1
                            </td>
                            <td style="text-align:center">
                                {{ $c1_jb = round($sum_c1_5_jb / $sum_c1_5_jb_count, 3) }}
                            </td>
                            <td style="text-align:center">
                                {{ $c1_sp = round($sum_c1_5_sp / $sum_c1_5_jb_count, 3) }}
                            </td>
                            <td style="text-align:center">
                                {{ $c1_p = round($sum_c1_5_p / $sum_c1_5_jb_count, 3) }}
                            </td>
                        </tr>

                        <tr>
                            <td style="text-align:center">
                                C2
                            </td>
                            <td style="text-align:center">
                                {{ $c2_jb = round($sum_c2_5_jb / $sum_c2_5_jb_count, 3) }}
                            </td>
                            <td style="text-align:center">
                                {{ $c2_sp = round($sum_c2_5_sp / $sum_c2_5_jb_count, 3) }}
                            </td>
                            <td style="text-align:center">
                                {{ $c2_p = round($sum_c2_5_p / $sum_c2_5_jb_count, 3) }}
                            </td>
                        </tr>

                        <tr>
                            <td style="text-align:center">
                                C3
                            </td>
                            <td style="text-align:center">
                                {{ $c3_jb = round($sum_c3_5_jb / $sum_c3_5_jb_count, 3) }}
                            </td>
                            <td style="text-align:center">
                                {{ $c3_sp = round($sum_c3_5_sp / $sum_c3_5_jb_count, 3) }}
                            </td>
                            <td style="text-align:center">
                                {{ $c3_p = round($sum_c3_5_p / $sum_c3_5_jb_count, 3) }}
                            </td>
                        </tr>


                    </table>

                    <p style="font-weight: bold">11. Perhitungan Iterasi Kelima</p>
                    <table border="1" class="data"  width="100%">
                        <tr class="">
                            <th width="1%">No</th>
                            <th>Distrik</th>
                            <th>JB</th>
                            <th>SP</th>
                            <th>P</th>
                            <th>C1</th>
                            <th>C2</th>
                            <th>C3</th>
                            <th>Jarak Terdekat</th>
                            <th>Cluster</th>

                        </tr>
                        @php
                            $i = 0;
                            // c1
                            $sum_c1_6_jb = 0; // Penampung total
                            $sum_c1_6_jb_count = 0; // Penampung total
                            $sum_c1_6_sp = 0; // Penampung total
                            $sum_c1_6_p = 0; // Penampung total

                            // c2
                            $sum_c2_6_jb = 0; // Penampung total
                            $sum_c2_6_jb_count = 0; // Penampung total
                            $sum_c2_6_sp = 0; // Penampung total
                            $sum_c2_6_p = 0; // Penampung total

                            // c3
                            $sum_c3_6_jb = 0; // Penampung total
                            $sum_c3_6_jb_count = 0; // Penampung total
                            $sum_c3_6_sp = 0; // Penampung total
                            $sum_c3_6_p = 0; // Penampung total

                        @endphp
                        @foreach ($stunting as $data)
                            <tr>
                              <td style="text-align:center">
                                    {{ ++$i }}</td>
                              <td style="text-align:center">
                                    {{ $data->distrik->nama_distrik ?? '' }}
                                </td>
                              <td style="text-align:center">
                                    {{ $data->jumlah_balita }}
                                </td>
                              <td style="text-align:center">
                                    {{ $data->sangat_pendek }}
                                </td>

                              <td style="text-align:center">
                                    {{ $data->pendek }}
                                </td>
                              <td style="text-align:center">

                                    <?php
                                    if ($c1_jb) {
                                        $c1_jb_2 = isset($c1_jb) ? $c1_jb : 0;
                                        $c1_sp_2 = isset($c1_sp) ? $c1_sp : 0;
                                        $c1_p_2 = isset($c1_p) ? $c1_p : 0;
                                    } else {
                                        $c1_jb_2 = 0;
                                        $c1_sp_2 = 0;
                                        $c1_p_2 = 0;
                                    }

                                    $data_jb = isset($data->jumlah_balita) ? $data->jumlah_balita : 0;
                                    $data_sp = isset($data->sangat_pendek) ? $data->sangat_pendek : 0;
                                    $data_p = isset($data->pendek) ? $data->pendek : 0;

                                    $c1_result = round(sqrt(pow($data_jb - $c1_jb_2, 2) + pow($data_sp - $c1_sp_2, 2) + pow($data_p - $c1_p_2, 2)), 8);

                                    $c1_array[] = $c1_result;
                                    echo $c1_result;

                                    ?>


                                </td>


                              <td style="text-align:center">

                                    <?php
                                    if ($c2_jb) {
                                        $c2_jb_2 = isset($c2_jb) ? $c2_jb : 0;
                                        $c2_sp_2 = isset($c2_sp) ? $c2_sp : 0;
                                        $c2_p_2 = isset($c2_p) ? $c2_p : 0;
                                    } else {
                                        $c2_jb_2 = 0;
                                        $c2_sp_2 = 0;
                                        $c2_p_2 = 0;
                                    }

                                    $data_jb = isset($data->jumlah_balita) ? $data->jumlah_balita : 0;
                                    $data_sp = isset($data->sangat_pendek) ? $data->sangat_pendek : 0;
                                    $data_p = isset($data->pendek) ? $data->pendek : 0;

                                    $c2_result = round(sqrt(pow($data_jb - $c2_jb_2, 2) + pow($data_sp - $c2_sp_2, 2) + pow($data_p - $c2_p_2, 2)), 8);

                                    $c2_array[] = $c2_result;
                                    echo $c2_result;

                                    ?>


                                </td>

                              <td style="text-align:center">
                                    <?php
                                    if ($c3_jb) {
                                        $c3_jb_2 = isset($c3_jb) ? $c3_jb : 0;
                                        $c3_sp_2 = isset($c3_sp) ? $c3_sp : 0;
                                        $c3_p_2 = isset($c3_p) ? $c3_p : 0;
                                    } else {
                                        $c3_jb_2 = 0;
                                        $c3_sp_2 = 0;
                                        $c3_p_2 = 0;
                                    }

                                    $data_jb = isset($data->jumlah_balita) ? $data->jumlah_balita : 0;
                                    $data_sp = isset($data->sangat_pendek) ? $data->sangat_pendek : 0;
                                    $data_p = isset($data->pendek) ? $data->pendek : 0;

                                    $c3_result = round(sqrt(pow($data_jb - $c3_jb_2, 2) + pow($data_sp - $c3_sp_2, 2) + pow($data_p - $c3_p_2, 2)), 8);

                                    $c3_array[] = $c3_result;
                                    echo $c3_result;

                                    ?>
                                </td>


                              <td style="text-align:center">
                                        {{ min([$c1_result, $c2_result, $c3_result]) }}

                                </td>




                                  <td style="text-align:center">
                                        @if ($c1_result < $c2_result and $c1_result < $c3_result)
                                            1

                                            <?php
                                            $sum_c1_6_jb = $sum_c1_6_jb + $data_jb;
                                            ++$sum_c1_6_jb_count;

                                            $sum_c1_6_sp = $sum_c1_6_sp + $data_sp;
                                            $sum_c1_6_p = $sum_c1_6_p + $data_p;
                                            ?>
                                        @endif

                                        @if ($c2_result < $c1_result and $c2_result < $c3_result)
                                            2

                                            <?php
                                            $sum_c2_6_jb = $sum_c2_6_jb + $data_jb;
                                            ++$sum_c2_6_jb_count;

                                            $sum_c2_6_sp = $sum_c2_6_sp + $data_sp;
                                            $sum_c2_6_p = $sum_c2_6_p + $data_p;
                                            ?>
                                        @endif

                                        @if ($c3_result < $c1_result and $c3_result < $c2_result)
                                            3
                                            <?php
                                            $sum_c3_6_jb = $sum_c3_6_jb + $data_jb;
                                            ++$sum_c3_6_jb_count;

                                            $sum_c3_6_sp = $sum_c3_6_sp + $data_sp;
                                            $sum_c3_6_p = $sum_c3_6_p + $data_p;
                                            ?>
                                        @endif

                                    </td>

                                    {{-- Buat Array Data Baru --}}
                            @endforeach






                        </tr>


                    </table>


                    <p style="font-weight: bold">12. Hasil Perhitungan Clustering </p>
                    <table border="1" class="data"  width="100%">
                        <tr class="">
                            <th width="1%">No</th>
                            <th>Distrik</th>
                            <th>Cluster</th>
                            <th>Keterangan</th>

                        </tr>
                        @php
                            $i = 0;
                            // c1
                            $sum_c1_6_jb = 0; // Penampung total
                            $sum_c1_6_jb_count = 0; // Penampung total
                            $sum_c1_6_sp = 0; // Penampung total
                            $sum_c1_6_p = 0; // Penampung total

                            // c2
                            $sum_c2_6_jb = 0; // Penampung total
                            $sum_c2_6_jb_count = 0; // Penampung total
                            $sum_c2_6_sp = 0; // Penampung total
                            $sum_c2_6_p = 0; // Penampung total

                            // c3
                            $sum_c3_6_jb = 0; // Penampung total
                            $sum_c3_6_jb_count = 0; // Penampung total
                            $sum_c3_6_sp = 0; // Penampung total
                            $sum_c3_6_p = 0; // Penampung total

                        @endphp
                        @foreach ($stunting as $data)
                            <tr>
                              <td style="text-align:center">
                                    {{ ++$i }}</td>
                              <td style="text-align:center">
                                    {{ $data->distrik->nama_distrik ?? '' }}
                                </td>
                                    <?php
                                    if ($c1_jb) {
                                        $c1_jb_2 = isset($c1_jb) ? $c1_jb : 0;
                                        $c1_sp_2 = isset($c1_sp) ? $c1_sp : 0;
                                        $c1_p_2 = isset($c1_p) ? $c1_p : 0;
                                    } else {
                                        $c1_jb_2 = 0;
                                        $c1_sp_2 = 0;
                                        $c1_p_2 = 0;
                                    }

                                    $data_jb = isset($data->jumlah_balita) ? $data->jumlah_balita : 0;
                                    $data_sp = isset($data->sangat_pendek) ? $data->sangat_pendek : 0;
                                    $data_p = isset($data->pendek) ? $data->pendek : 0;

                                    $c1_result = round(sqrt(pow($data_jb - $c1_jb_2, 2) + pow($data_sp - $c1_sp_2, 2) + pow($data_p - $c1_p_2, 2)), 8);

                                    $c1_array[] = $c1_result;






                                    if ($c2_jb) {
                                        $c2_jb_2 = isset($c2_jb) ? $c2_jb : 0;
                                        $c2_sp_2 = isset($c2_sp) ? $c2_sp : 0;
                                        $c2_p_2 = isset($c2_p) ? $c2_p : 0;
                                    } else {
                                        $c2_jb_2 = 0;
                                        $c2_sp_2 = 0;
                                        $c2_p_2 = 0;
                                    }

                                    $data_jb = isset($data->jumlah_balita) ? $data->jumlah_balita : 0;
                                    $data_sp = isset($data->sangat_pendek) ? $data->sangat_pendek : 0;
                                    $data_p = isset($data->pendek) ? $data->pendek : 0;

                                    $c2_result = round(sqrt(pow($data_jb - $c2_jb_2, 2) + pow($data_sp - $c2_sp_2, 2) + pow($data_p - $c2_p_2, 2)), 8);

                                    $c2_array[] = $c2_result;




                                    if ($c3_jb) {
                                        $c3_jb_2 = isset($c3_jb) ? $c3_jb : 0;
                                        $c3_sp_2 = isset($c3_sp) ? $c3_sp : 0;
                                        $c3_p_2 = isset($c3_p) ? $c3_p : 0;
                                    } else {
                                        $c3_jb_2 = 0;
                                        $c3_sp_2 = 0;
                                        $c3_p_2 = 0;
                                    }

                                    $data_jb = isset($data->jumlah_balita) ? $data->jumlah_balita : 0;
                                    $data_sp = isset($data->sangat_pendek) ? $data->sangat_pendek : 0;
                                    $data_p = isset($data->pendek) ? $data->pendek : 0;

                                    $c3_result = round(sqrt(pow($data_jb - $c3_jb_2, 2) + pow($data_sp - $c3_sp_2, 2) + pow($data_p - $c3_p_2, 2)), 8);

                                    $c3_array[] = $c3_result;


                                    ?>

<td style="text-align: center">

                                        @if ($c1_result < $c2_result and $c1_result < $c3_result)


                                            <?php
                                            $ket = 1;
                                            $sum_c1_6_jb = $sum_c1_6_jb + $data_jb;
                                            ++$sum_c1_6_jb_count;

                                            $sum_c1_6_sp = $sum_c1_6_sp + $data_sp;
                                            $sum_c1_6_p = $sum_c1_6_p + $data_p;
                                            ?>
                                        @endif

                                        @if ($c2_result < $c1_result and $c2_result < $c3_result)

                                            <?php
                                            $ket = 2;
                                            $sum_c2_6_jb = $sum_c2_6_jb + $data_jb;
                                            ++$sum_c2_6_jb_count;

                                            $sum_c2_6_sp = $sum_c2_6_sp + $data_sp;
                                            $sum_c2_6_p = $sum_c2_6_p + $data_p;
                                            ?>
                                        @endif

                                        @if ($c3_result < $c1_result and $c3_result < $c2_result)

                                            <?php
                                            $ket = 3;
                                            $sum_c3_6_jb = $sum_c3_6_jb + $data_jb;
                                            ++$sum_c3_6_jb_count;

                                            $sum_c3_6_sp = $sum_c3_6_sp + $data_sp;
                                            $sum_c3_6_p = $sum_c3_6_p + $data_p;
                                            ?>
                                        @endif
        {{$ket}}
                                    </td>


    <td style="text-align: center">
        @if ($ket == 1)
        Rendah
    @endif
    @if ($ket == 2)
        Sedang
    @endif
    @if ($ket == 3)
        Tinggi
    @endif
    </td>

                                    {{-- Buat Array Data Baru --}}
                            @endforeach






                        </tr>


                    </table>


                </div>
            </div>
        </div>
    </div>



</body>

</html>
