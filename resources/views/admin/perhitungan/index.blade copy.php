@extends('admin.layout.tamplate')
@section('title')
    Clustering
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
                    <div class="col-md-6 ">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title"> Clustering</h4>
                                <div class="row mt-1 d-flex justify-content-between">
                                    <div class="col-8">
                                        {{-- @include('admin.layout.search') --}}
                                    </div>
                                </div>

                                {{-- <form action="{{route('admin.clustering.pdf')}}" method="post">


                                @endif --}}

                                </form>

                                <form action="" method="get">
                                    <button type="submit" class="btn btn-success mt-2 mb-2"> <i data-feather="percent"></i>
                                        Mulai Perhitungan
                                    </button>

                                    @if ($c1 != null)
                                        <a target="_blank" href="{{ route('admin.clustering.pdf', $centroidJson) }}"
                                            class="btn btn-danger mt-2 mb-2 text-white"> <i data-feather="file-text"></i>
                                            Cetak PDF
                                        </a>
                                    @endif
                                    <div class="mt-1 table-responsive">
                                        <table class="table table-bordered">
                                            <tr class="bg-success text-white">
                                                <th width="1%">No</th>
                                                <th>Distrik</th>
                                                <th>JB</th>
                                                <th>SP</th>
                                                <th>P</th>
                                                <th>Pilih Centroid </th>
                                            </tr>
                                            @forelse ($stunting as $data)
                                                <tr>
                                                    <td>{{ ++$i }}</td>
                                                    <td>
                                                        {{ $data->distrik->nama_distrik ?? '' }}
                                                    </td>
                                                    <td>
                                                        {{ $data->jumlah_balita }}
                                                    </td>
                                                    <td>
                                                        {{ $data->sangat_pendek }}
                                                    </td>

                                                    <td>
                                                        {{ $data->pendek }}
                                                    </td>

                                                    <td>
                                                        <input class="form-control" value="{{ $data->id }}"
                                                            type="checkbox" name="centroid[]" id="">
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
                                    </div>
                                    <!-- end .mt-4 -->
                                </form>


                            </div>
                        </div>



                    </div> <!-- end card-body-->
                    @if ($c1 != null)
                        <div class="col-md-6 ">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="header-title"> Centroid Perhitungan Iterasi Pertama</h4>
                                    <div class="row mt-1 d-flex justify-content-between">
                                        <div class="col-8">
                                            {{-- @include('admin.layout.search') --}}
                                        </div>
                                    </div>

                                    <form action="" method="get">
                                        {{-- <button type="submit" class="btn btn-success mt-2 mb-2"> Centroid Perhitungan Iterasi Pertama </button> --}}

                                        <div class="mt-1 table-responsive">
                                            <table class="table table-bordered">
                                                <tr class="bg-success text-white">
                                                    <th>Centroid</th>
                                                    <th>JB</th>
                                                    <th>SP</th>
                                                    <th>P</th>

                                                </tr>
                                                <tr>
                                                    <td>
                                                        C1
                                                    </td>
                                                    <td>
                                                        {{ $c1[0][0]->jumlah_balita }}

                                                    </td>
                                                    <td>
                                                        {{ $c1[0][0]->sangat_pendek }}
                                                    </td>
                                                    <td>
                                                        {{ $c1[0][0]->pendek }}
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        C2
                                                    </td>
                                                    <td>
                                                        {{ $c1[1][0]->jumlah_balita }}
                                                    </td>
                                                    <td>
                                                        {{ $c1[1][0]->sangat_pendek }}
                                                    </td>
                                                    <td>
                                                        {{ $c1[1][0]->pendek }}
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        C3
                                                    </td>
                                                    <td>
                                                        {{ $c1[2][0]->jumlah_balita }}
                                                    </td>
                                                    <td>
                                                        {{ $c1[2][0]->sangat_pendek }}
                                                    </td>
                                                    <td>
                                                        {{ $c1[2][0]->pendek }}
                                                    </td>
                                                </tr>



                                            </table>
                                        </div>
                                        <!-- end .mt-4 -->
                                    </form>


                                </div>
                            </div>



                        </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col -->




            <div class="col-md-12 ">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title"> Iterasi Pertama</h4>
                        <div class="row mt-1 d-flex justify-content-between">
                            <div class="col-8">
                                {{-- @include('admin.layout.search') --}}
                            </div>
                        </div>

                        <form action="" method="get">
                            {{-- <button type="submit" class="btn btn-success mt-2 mb-2">Perhitungan Iterasi Pertama --}}
                            </button>

                            <div class="mt-1 table-responsive">
                                <table class="table table-bordered">
                                    <tr class="bg-success text-white">
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
                                        <th>Keterangan</th>

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
                                            <td>{{ ++$i }}</td>
                                            <td>
                                                {{ $data->distrik->nama_distrik ?? '' }}
                                            </td>
                                            <td>
                                                {{ $data->jumlah_balita }}
                                            </td>
                                            <td>
                                                {{ $data->sangat_pendek }}
                                            </td>

                                            <td>
                                                {{ $data->pendek }}
                                            </td>


                                            <td>

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


                                            <td>
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

                                            <td>
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

                                            <td>
                                                {{ min([$c1_result, $c2_result, $c3_result]) }}
                                            </td>

                                            <td>
                                                @if ($c1_result < $c2_result and $c1_result < $c3_result)
                                                    1

                                                    <?php
                                                    $ket = 1;
                                                    $sum_c1_2_jb = $sum_c1_2_jb + $data_jb;
                                                    ++$sum_c1_2_jb_count;

                                                    $sum_c1_2_sp = $sum_c1_2_sp + $data_sp;
                                                    $sum_c1_2_p = $sum_c1_2_p + $data_p;
                                                    ?>
                                                @endif

                                                @if ($c2_result < $c1_result and $c2_result < $c3_result)
                                                    2

                                                    <?php
                                                    $ket = 2;
                                                    $sum_c2_2_jb = $sum_c2_2_jb + $data_jb;
                                                    ++$sum_c2_2_jb_count;

                                                    $sum_c2_2_sp = $sum_c2_2_sp + $data_sp;
                                                    $sum_c2_2_p = $sum_c2_2_p + $data_p;
                                                    ?>
                                                @endif

                                                @if ($c3_result < $c1_result and $c3_result < $c2_result)
                                                    3
                                                    <?php
                                                    $ket = 3;
                                                    $sum_c3_2_jb = $sum_c3_2_jb + $data_jb;
                                                    ++$sum_c3_2_jb_count;

                                                    $sum_c3_2_sp = $sum_c3_2_sp + $data_sp;
                                                    $sum_c3_2_p = $sum_c3_2_p + $data_p;
                                                    ?>
                                                @endif

                                            </td>

                                            <td>
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
                            <!-- end .mt-4 -->
                        </form>

                    </div>
                </div>



            </div> <!-- end card-body-->
            <div class="col-md-6 ">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title"> Centroid Perhitungan Iterasi Kedua</h4>
                        <div class="row mt-1 d-flex justify-content-between">
                            <div class="col-8">
                                {{-- @include('admin.layout.search') --}}
                            </div>
                        </div>

                        <form action="" method="get">
                            {{-- <button type="submit" class="btn btn-success mt-2 mb-2"> Centroid Perhitungan Iterasi Pertama </button> --}}

                            <div class="mt-1 table-responsive">
                                <table class="table table-bordered">
                                    <tr class="bg-success text-white">
                                        <th>Centroid</th>
                                        <th>JB</th>
                                        <th>SP</th>
                                        <th>P</th>

                                    </tr>
                                    <tr>
                                        <td>
                                            C1
                                        </td>
                                        <td>
                                            {{ $c1_jb = round($sum_c1_2_jb / $sum_c1_2_jb_count, 3) }}
                                        </td>
                                        <td>
                                            {{ $c1_sp = round($sum_c1_2_sp / $sum_c1_2_jb_count, 3) }}
                                        </td>
                                        <td>
                                            {{ $c1_p = round($sum_c1_2_p / $sum_c1_2_jb_count, 3) }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            C2
                                        </td>
                                        <td>
                                            {{ $c2_jb = round($sum_c2_2_jb / $sum_c2_2_jb_count, 3) }}
                                        </td>
                                        <td>
                                            {{ $c2_sp = round($sum_c2_2_sp / $sum_c2_2_jb_count, 3) }}
                                        </td>
                                        <td>
                                            {{ $c2_p = round($sum_c2_2_p / $sum_c2_2_jb_count, 3) }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            C3
                                        </td>
                                        <td>
                                            {{ $c3_jb = round($sum_c3_2_jb / $sum_c3_2_jb_count, 3) }}
                                        </td>
                                        <td>
                                            {{ $c3_sp = round($sum_c3_2_sp / $sum_c3_2_jb_count, 3) }}
                                        </td>
                                        <td>
                                            {{ $c3_p = round($sum_c3_2_p / $sum_c3_2_jb_count, 3) }}
                                        </td>
                                    </tr>


                                </table>
                            </div>
                            <!-- end .mt-4 -->
                        </form>


                    </div>
                </div>



            </div> <!-- end card-body-->

            <div class="col-md-12 ">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title"> Iterasi Kedua</h4>
                        <div class="row mt-1 d-flex justify-content-between">
                            <div class="col-8">
                                {{-- @include('admin.layout.search') --}}
                            </div>
                        </div>

                        <form action="" method="get">
                            {{-- <button type="submit" class="btn btn-success mt-2 mb-2">Perhitungan Iterasi Pertama --}}
                            </button>

                            <div class="mt-1 table-responsive">
                                <table class="table table-bordered">
                                    <tr class="bg-success text-white">
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
                                        <th>Keterangan</th>

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
                                            <td>{{ ++$i }}</td>
                                            <td>
                                                {{ $data->distrik->nama_distrik ?? '' }}
                                            </td>
                                            <td>
                                                {{ $data->jumlah_balita }}
                                            </td>
                                            <td>
                                                {{ $data->sangat_pendek }}
                                            </td>

                                            <td>
                                                {{ $data->pendek }}
                                            </td>
                                            <td>

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

                                            <td>
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


                                            <td>
                                                {{ min([$c1_result, $c2_result, $c3_result]) }}

                                            </td>




                                            <td>
                                                @if ($c1_result < $c2_result and $c1_result < $c3_result)
                                                    1

                                                    <?php
                                                    $ket = 1;
                                                    $sum_c1_3_jb = $sum_c1_3_jb + $data_jb;
                                                    ++$sum_c1_3_jb_count;

                                                    $sum_c1_3_sp = $sum_c1_3_sp + $data_sp;
                                                    $sum_c1_3_p = $sum_c1_3_p + $data_p;
                                                    ?>
                                                @endif

                                                @if ($c2_result < $c1_result and $c2_result < $c3_result)
                                                    2

                                                    <?php
                                                    $ket = 2;
                                                    $sum_c2_3_jb = $sum_c2_3_jb + $data_jb;
                                                    ++$sum_c2_3_jb_count;

                                                    $sum_c2_3_sp = $sum_c2_3_sp + $data_sp;
                                                    $sum_c2_3_p = $sum_c2_3_p + $data_p;
                                                    ?>
                                                @endif

                                                @if ($c3_result < $c1_result and $c3_result < $c2_result)
                                                    3
                                                    <?php
                                                    $ket = 3;
                                                    $sum_c3_3_jb = $sum_c3_3_jb + $data_jb;
                                                    ++$sum_c3_3_jb_count;

                                                    $sum_c3_3_sp = $sum_c3_3_sp + $data_sp;
                                                    $sum_c3_3_p = $sum_c3_3_p + $data_p;
                                                    ?>
                                                @endif

                                            </td>
                                            <td>
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
                            <!-- end .mt-4 -->
                        </form>

                    </div>
                </div>



            </div> <!-- end card-body-->


            <div class="col-md-6 ">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title"> Centroid Perhitungan Iterasi Ketiga</h4>
                        <div class="row mt-1 d-flex justify-content-between">
                            <div class="col-8">
                                {{-- @include('admin.layout.search') --}}
                            </div>
                        </div>

                        <form action="" method="get">
                            {{-- <button type="submit" class="btn btn-success mt-2 mb-2"> Centroid Perhitungan Iterasi Pertama </button> --}}

                            <div class="mt-1 table-responsive">
                                <table class="table table-bordered">
                                    <tr class="bg-success text-white">
                                        <th>Centroid</th>
                                        <th>JB</th>
                                        <th>SP</th>
                                        <th>P</th>

                                    </tr>
                                    <tr>
                                        <td>
                                            C1
                                        </td>
                                        <td>
                                            {{ $c1_jb = round($sum_c1_3_jb / $sum_c1_3_jb_count, 3) }}
                                        </td>
                                        <td>
                                            {{ $c1_sp = round($sum_c1_3_sp / $sum_c1_3_jb_count, 3) }}
                                        </td>
                                        <td>
                                            {{ $c1_p = round($sum_c1_3_p / $sum_c1_3_jb_count, 3) }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            C2
                                        </td>
                                        <td>
                                            {{ $c2_jb = round($sum_c2_3_jb / $sum_c2_3_jb_count, 3) }}
                                        </td>
                                        <td>
                                            {{ $c2_sp = round($sum_c2_3_sp / $sum_c2_3_jb_count, 3) }}
                                        </td>
                                        <td>
                                            {{ $c2_p = round($sum_c2_3_p / $sum_c2_3_jb_count, 3) }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            C3
                                        </td>
                                        <td>
                                            {{ $c3_jb = round($sum_c3_3_jb / $sum_c3_3_jb_count, 3) }}
                                        </td>
                                        <td>
                                            {{ $c3_sp = round($sum_c3_3_sp / $sum_c3_3_jb_count, 3) }}
                                        </td>
                                        <td>
                                            {{ $c3_p = round($sum_c3_3_p / $sum_c3_3_jb_count, 3) }}
                                        </td>
                                    </tr>


                                </table>
                            </div>
                            <!-- end .mt-4 -->
                        </form>


                    </div>
                </div>



            </div> <!-- end card-body-->


            <div class="col-md-12 ">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title"> Iterasi Ketiga</h4>
                        <div class="row mt-1 d-flex justify-content-between">
                            <div class="col-8">
                                {{-- @include('admin.layout.search') --}}
                            </div>
                        </div>

                        <form action="" method="get">
                            {{-- <button type="submit" class="btn btn-success mt-2 mb-2">Perhitungan Iterasi Pertama --}}
                            </button>

                            <div class="mt-1 table-responsive">
                                <table class="table table-bordered">
                                    <tr class="bg-success text-white">
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
                                        <th>Keterangan</th>

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
                                            <td>{{ ++$i }}</td>
                                            <td>
                                                {{ $data->distrik->nama_distrik ?? '' }}
                                            </td>
                                            <td>
                                                {{ $data->jumlah_balita }}
                                            </td>
                                            <td>
                                                {{ $data->sangat_pendek }}
                                            </td>

                                            <td>
                                                {{ $data->pendek }}
                                            </td>
                                            <td>

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

                                            <td>
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


                                            <td>
                                                {{ min([$c1_result, $c2_result, $c3_result]) }}

                                            </td>




                                            <td>
                                                @if ($c1_result < $c2_result and $c1_result < $c3_result)
                                                    1

                                                    <?php
                                                    $ket = 1;
                                                    $sum_c1_4_jb = $sum_c1_4_jb + $data_jb;
                                                    ++$sum_c1_4_jb_count;

                                                    $sum_c1_4_sp = $sum_c1_4_sp + $data_sp;
                                                    $sum_c1_4_p = $sum_c1_4_p + $data_p;
                                                    ?>
                                                @endif

                                                @if ($c2_result < $c1_result and $c2_result < $c3_result)
                                                    2

                                                    <?php
                                                    $ket = 2;
                                                    $sum_c2_4_jb = $sum_c2_4_jb + $data_jb;
                                                    ++$sum_c2_4_jb_count;

                                                    $sum_c2_4_sp = $sum_c2_4_sp + $data_sp;
                                                    $sum_c2_4_p = $sum_c2_4_p + $data_p;
                                                    ?>
                                                @endif

                                                @if ($c3_result < $c1_result and $c3_result < $c2_result)
                                                    3
                                                    <?php
                                                    $ket = 3;
                                                    $sum_c3_4_jb = $sum_c3_4_jb + $data_jb;
                                                    ++$sum_c3_4_jb_count;

                                                    $sum_c3_4_sp = $sum_c3_4_sp + $data_sp;
                                                    $sum_c3_4_p = $sum_c3_4_p + $data_p;
                                                    ?>
                                                @endif

                                            </td>
                                            <td>
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
                            <!-- end .mt-4 -->
                        </form>

                    </div>
                </div>



            </div> <!-- end card-body-->


            <div class="col-md-6 ">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title"> Centroid Perhitungan Iterasi Kempat</h4>
                        <div class="row mt-1 d-flex justify-content-between">
                            <div class="col-8">
                                {{-- @include('admin.layout.search') --}}
                            </div>
                        </div>

                        <form action="" method="get">
                            {{-- <button type="submit" class="btn btn-success mt-2 mb-2"> Centroid Perhitungan Iterasi Pertama </button> --}}

                            <div class="mt-1 table-responsive">
                                <table class="table table-bordered">
                                    <tr class="bg-success text-white">
                                        <th>Centroid</th>
                                        <th>JB</th>
                                        <th>SP</th>
                                        <th>P</th>

                                    </tr>
                                    <tr>
                                        <td>
                                            C1
                                        </td>
                                        <td>
                                            {{ $c1_jb = round($sum_c1_4_jb / $sum_c1_4_jb_count, 3) }}
                                        </td>
                                        <td>
                                            {{ $c1_sp = round($sum_c1_4_sp / $sum_c1_4_jb_count, 3) }}
                                        </td>
                                        <td>
                                            {{ $c1_p = round($sum_c1_4_p / $sum_c1_4_jb_count, 3) }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            C2
                                        </td>
                                        <td>
                                            {{ $c2_jb = round($sum_c2_4_jb / $sum_c2_4_jb_count, 3) }}
                                        </td>
                                        <td>
                                            {{ $c2_sp = round($sum_c2_4_sp / $sum_c2_4_jb_count, 3) }}
                                        </td>
                                        <td>
                                            {{ $c2_p = round($sum_c2_4_p / $sum_c2_4_jb_count, 3) }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            C3
                                        </td>
                                        <td>
                                            {{ $c3_jb = round($sum_c3_4_jb / $sum_c3_4_jb_count, 3) }}
                                        </td>
                                        <td>
                                            {{ $c3_sp = round($sum_c3_4_sp / $sum_c3_4_jb_count, 3) }}
                                        </td>
                                        <td>
                                            {{ $c3_p = round($sum_c3_4_p / $sum_c3_4_jb_count, 3) }}
                                        </td>
                                    </tr>


                                </table>
                            </div>
                            <!-- end .mt-4 -->
                        </form>


                    </div>
                </div>



            </div> <!-- end card-body-->


            <div class="col-md-12 ">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title"> Iterasi Keempat</h4>
                        <div class="row mt-1 d-flex justify-content-between">
                            <div class="col-8">
                                {{-- @include('admin.layout.search') --}}
                            </div>
                        </div>

                        <form action="" method="get">
                            {{-- <button type="submit" class="btn btn-success mt-2 mb-2">Perhitungan Iterasi Pertama --}}
                            </button>

                            <div class="mt-1 table-responsive">
                                <table class="table table-bordered">
                                    <tr class="bg-success text-white">
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
                                        <th>Keterangan</th>

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
                                            <td>{{ ++$i }}</td>
                                            <td>
                                                {{ $data->distrik->nama_distrik ?? '' }}
                                            </td>
                                            <td>
                                                {{ $data->jumlah_balita }}
                                            </td>
                                            <td>
                                                {{ $data->sangat_pendek }}
                                            </td>

                                            <td>
                                                {{ $data->pendek }}
                                            </td>
                                            <td>

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

                                            <td>
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


                                            <td>
                                                {{ min([$c1_result, $c2_result, $c3_result]) }}

                                            </td>




                                            <td>
                                                @if ($c1_result < $c2_result and $c1_result < $c3_result)
                                                    1

                                                    <?php
                                                    $ket = 1;
                                                    $sum_c1_5_jb = $sum_c1_5_jb + $data_jb;
                                                    ++$sum_c1_5_jb_count;

                                                    $sum_c1_5_sp = $sum_c1_5_sp + $data_sp;
                                                    $sum_c1_5_p = $sum_c1_5_p + $data_p;
                                                    ?>
                                                @endif

                                                @if ($c2_result < $c1_result and $c2_result < $c3_result)
                                                    2

                                                    <?php
                                                    $ket = 2;
                                                    $sum_c2_5_jb = $sum_c2_5_jb + $data_jb;
                                                    ++$sum_c2_5_jb_count;

                                                    $sum_c2_5_sp = $sum_c2_5_sp + $data_sp;
                                                    $sum_c2_5_p = $sum_c2_5_p + $data_p;
                                                    ?>
                                                @endif

                                                @if ($c3_result < $c1_result and $c3_result < $c2_result)
                                                    3
                                                    <?php
                                                    $ket = 3;
                                                    $sum_c3_5_jb = $sum_c3_5_jb + $data_jb;
                                                    ++$sum_c3_5_jb_count;

                                                    $sum_c3_5_sp = $sum_c3_5_sp + $data_sp;
                                                    $sum_c3_5_p = $sum_c3_5_p + $data_p;
                                                    ?>
                                                @endif

                                            </td>
                                            <td>
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
                            <!-- end .mt-4 -->
                        </form>

                    </div>
                </div>



            </div> <!-- end card-body-->


            <div class="col-md-6 ">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title"> Centroid Perhitungan Iterasi Kelima</h4>
                        <div class="row mt-1 d-flex justify-content-between">
                            <div class="col-8">
                                {{-- @include('admin.layout.search') --}}
                            </div>
                        </div>

                        <form action="" method="get">
                            {{-- <button type="submit" class="btn btn-success mt-2 mb-2"> Centroid Perhitungan Iterasi Pertama </button> --}}

                            <div class="mt-1 table-responsive">
                                <table class="table table-bordered">
                                    <tr class="bg-success text-white">
                                        <th>Centroid</th>
                                        <th>JB</th>
                                        <th>SP</th>
                                        <th>P</th>

                                    </tr>
                                    <tr>
                                        <td>
                                            C1
                                        </td>
                                        <td>
                                            {{ $c1_jb = round($sum_c1_5_jb / $sum_c1_5_jb_count, 3) }}
                                        </td>
                                        <td>
                                            {{ $c1_sp = round($sum_c1_5_sp / $sum_c1_5_jb_count, 3) }}
                                        </td>
                                        <td>
                                            {{ $c1_p = round($sum_c1_5_p / $sum_c1_5_jb_count, 3) }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            C2
                                        </td>
                                        <td>
                                            {{ $c2_jb = round($sum_c2_5_jb / $sum_c2_5_jb_count, 3) }}
                                        </td>
                                        <td>
                                            {{ $c2_sp = round($sum_c2_5_sp / $sum_c2_5_jb_count, 3) }}
                                        </td>
                                        <td>
                                            {{ $c2_p = round($sum_c2_5_p / $sum_c2_5_jb_count, 3) }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            C3
                                        </td>
                                        <td>
                                            {{ $c3_jb = round($sum_c3_5_jb / $sum_c3_5_jb_count, 3) }}
                                        </td>
                                        <td>
                                            {{ $c3_sp = round($sum_c3_5_sp / $sum_c3_5_jb_count, 3) }}
                                        </td>
                                        <td>
                                            {{ $c3_p = round($sum_c3_5_p / $sum_c3_5_jb_count, 3) }}
                                        </td>
                                    </tr>


                                </table>
                            </div>
                            <!-- end .mt-4 -->
                        </form>


                    </div>
                </div>



            </div> <!-- end card-body-->



            <div class="col-md-12 ">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title"> Iterasi Kelima</h4>
                        <div class="row mt-1 d-flex justify-content-between">
                            <div class="col-8">
                                {{-- @include('admin.layout.search') --}}
                            </div>
                        </div>

                        <form action="" method="get">
                            {{-- <button type="submit" class="btn btn-success mt-2 mb-2">Perhitungan Iterasi Pertama --}}
                            </button>

                            <div class="mt-1 table-responsive">
                                <table class="table table-bordered">
                                    <tr class="bg-success text-white">
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
                                            <td>{{ ++$i }}</td>
                                            <td>
                                                {{ $data->distrik->nama_distrik ?? '' }}
                                            </td>
                                            <td>
                                                {{ $data->jumlah_balita }}
                                            </td>
                                            <td>
                                                {{ $data->sangat_pendek }}
                                            </td>

                                            <td>
                                                {{ $data->pendek }}
                                            </td>
                                            <td>

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

                                            <td>
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


                                            <td>
                                                {{ min([$c1_result, $c2_result, $c3_result]) }}

                                            </td>




                                            <td>
                                                @if ($c1_result < $c2_result and $c1_result < $c3_result)
                                                    1

                                                    <?php
                                                    $ket = 1;
                                                    $sum_c1_6_jb = $sum_c1_6_jb + $data_jb;
                                                    ++$sum_c1_6_jb_count;

                                                    $sum_c1_6_sp = $sum_c1_6_sp + $data_sp;
                                                    $sum_c1_6_p = $sum_c1_6_p + $data_p;
                                                    ?>
                                                @endif

                                                @if ($c2_result < $c1_result and $c2_result < $c3_result)
                                                    2

                                                    <?php
                                                    $ket = 2;
                                                    $sum_c2_6_jb = $sum_c2_6_jb + $data_jb;
                                                    ++$sum_c2_6_jb_count;

                                                    $sum_c2_6_sp = $sum_c2_6_sp + $data_sp;
                                                    $sum_c2_6_p = $sum_c2_6_p + $data_p;
                                                    ?>
                                                @endif

                                                @if ($c3_result < $c1_result and $c3_result < $c2_result)
                                                    3
                                                    <?php
                                                    $ket = 3;
                                                    $sum_c3_6_jb = $sum_c3_6_jb + $data_jb;
                                                    ++$sum_c3_6_jb_count;

                                                    $sum_c3_6_sp = $sum_c3_6_sp + $data_sp;
                                                    $sum_c3_6_p = $sum_c3_6_p + $data_p;
                                                    ?>
                                                @endif

                                            </td>
                                            <td>
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
                            <!-- end .mt-4 -->
                        </form>

                    </div>
                </div>



            </div> <!-- end card-body-->

            <div class="row" style="height: 600px">
                <div class="col-12">
                    <div class="card-box">
                        <div class="text-center">
                            <h4>Peta Pemetaan Stunting Di Kabupaten Jayapura <br> Berdasarkan hasil perhitungan</h4>
                        </div>
                        <div id='map' class="map p-3" style="height: 500px; width: 100%; z-index: 1"></div>
                    </div>
                </div>
            </div>
            @endif

        </div> <!-- end card-->
    </div> <!-- end col -->




    </div>
    {{-- end row --}}





    </div> <!-- container -->

    </div> <!-- content -->


    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>


        @if ($c1 != null)

    <script type="text/javascript">
        const map = L.map('map');

        map.createPane('labels');

        map.getPane('labels').style.zIndex = 650;

        map.getPane('labels').style.pointerEvents = 'none';

        const cartodbAttribution =
            '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, &copy; <a href="https://carto.com/attribution">CARTO</a>';

        const positron = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: cartodbAttribution
        }).addTo(map);

        const positronLabels = L.tileLayer('http://{s}.basemaps.cartocdn.com/light_only_labels/{z}/{x}/{y}.png', {
            attribution: cartodbAttribution,
            pane: 'labels'
        }).addTo(map);

        @php
                                       $c1_jb = round($sum_c1_5_jb / $sum_c1_5_jb_count, 3);
                                       $c1_sp = round($sum_c1_5_sp / $sum_c1_5_jb_count, 3);
                                        $c1_p = round($sum_c1_5_p / $sum_c1_5_jb_count, 3);

                                     $c2_jb = round($sum_c2_5_jb / $sum_c2_5_jb_count, 3);


                                            $c2_sp = round($sum_c2_5_sp / $sum_c2_5_jb_count, 3);


                                            $c2_p = round($sum_c2_5_p / $sum_c2_5_jb_count, 3);







                                            $c3_jb = round($sum_c3_5_jb / $sum_c3_5_jb_count, 3);


                                            $c3_sp = round($sum_c3_5_sp / $sum_c3_5_jb_count, 3);


                                            $c3_p = round($sum_c3_5_p / $sum_c3_5_jb_count, 3);


        @endphp

        @foreach ($stunting as $data)
            var marker = L.marker([{{ $data->distrik->latitude }}, {{ $data->distrik->longitude }}], {

                // Hitung

                @php



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






                                                if ($c1_result < $c2_result and $c1_result < $c3_result)

                                                {
                                                    $ket = 1;
                                                    $sum_c1_6_jb = $sum_c1_6_jb + $data_jb;
                                                    ++$sum_c1_6_jb_count;

                                                    $sum_c1_6_sp = $sum_c1_6_sp + $data_sp;
                                                   $sum_c1_6_p = $sum_c1_6_p + $data_p;

                                                };

                                                if ($c2_result < $c1_result and $c2_result < $c3_result)

                                                {
                                                    $ket = 2;
                                                    $sum_c2_6_jb = $sum_c2_6_jb + $data_jb;
                                                    ++$sum_c2_6_jb_count;

                                                    $sum_c2_6_sp = $sum_c2_6_sp + $data_sp;
                                                    $sum_c2_6_p = $sum_c2_6_p + $data_p;
                                                }

                                                if ($c3_result < $c1_result and $c3_result < $c2_result)
                                                 {
                                                    $ket = 3;
                                                    $sum_c3_6_jb = $sum_c3_6_jb + $data_jb;
                                                    ++$sum_c3_6_jb_count;

                                                    $sum_c3_6_sp = $sum_c3_6_sp + $data_sp;
                                                    $sum_c3_6_p = $sum_c3_6_p + $data_p;
                                                 }






                @endphp

                @if ($ket == 3)
                    icon: L.icon({
                        iconUrl: '/assets/images/pin/red.png',
                        iconSize: [41, 41],
                        iconAnchor: [12, 41],
                        popupAnchor: [1, -34],
                    }),
                @endif

                @if ($ket == 1)
                    icon: L.icon({
                        iconUrl: '/assets/images/pin/green.png',
                        iconSize: [41, 41],
                        iconAnchor: [12, 41],
                        popupAnchor: [1, -34],
                    }),
                @endif

                @if ($ket == 2)
                    icon: L.icon({
                        iconUrl: '/assets/images/pin/blue.png',
                        iconSize: [41, 41],
                        iconAnchor: [12, 41],
                        popupAnchor: [1, -34],
                    }),
                @endif



                alt: 'STUNTING'
            }).addTo(map).bindPopup(`
    DISTRIK {{ $data->distrik->nama_distrik }} <br>
    PUSKESMAS {{ $data->nama_puskesmas }} <br>
    <p class=""> Jumlah Balita  :
        <span class="font-weight-bold">
            @php
                // Hitung total jumlah balita dari seluruh data stunting di distrik ini
                $jumlahBalita = $data->distrik->stunting->sum('jumlah_balita');
            @endphp
            {{ $jumlahBalita }}
        </span>
    </p>

    <p>Balita Pendek  :
        <span class="font-weight-bold">
            {{ $data->distrik->stunting->sum('pendek') }}
        </span>
    </p>

    <p>Balita Sangat Pendek  :
        <span class="font-weight-bold">
            {{ $data->distrik->stunting->sum('sangat_pendek') }}
        </span>
    </p>

    <p>Faktor  :
        <span class="font-weight-bold">
                {{ $data->faktor->faktor }}
        </span>
    </p>

    <p> Keterangan  :
        <span class="font-weight-bold">
             @if ($ket == 1)
                                                    Rendah


                                                    @php
                                                    $warna = "#337B07";
                                                    @endphp
                                                @endif
                                                @if ($ket == 2)
                                                    Sedang
                                                    @php
                                                    $warna = "#1C8DF0"

                                                    @endphp
                                                @endif
                                                @if ($ket == 3)
                                                    Tinggi
                                                    @php
                                                    $warna = "#EE183A";
                                                    @endphp
                                                @endif
        </span>
    </p>

    <div class="text-center p-3">
        <a target="_blank" href="{{ route('admin.peta.kelurahan', $data->distrik_id) }}">Detail Kelurahan</a>
    </div>
`);
        @endforeach
        // Ambil data maps dari PHP (pastikan maps telah di-encode sebagai JSON)
// Ambil data maps dari PHP (pastikan maps telah di-encode sebagai JSON)
let maps = <?php echo json_encode($maps, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP); ?>;

// Ambil data perhitungan dari PHP
let c1_jb = <?php echo json_encode($c1_jb); ?>;
let c1_sp = <?php echo json_encode($c1_sp); ?>;
let c1_p = <?php echo json_encode($c1_p); ?>;

let c2_jb = <?php echo json_encode($c2_jb); ?>;
let c2_sp = <?php echo json_encode($c2_sp); ?>;
let c2_p = <?php echo json_encode($c2_p); ?>;

let c3_jb = <?php echo json_encode($c3_jb); ?>;
let c3_sp = <?php echo json_encode($c3_sp); ?>;
let c3_p = <?php echo json_encode($c3_p); ?>;

// Objek untuk menyimpan layer distrik
let districtLayers = {};

// Array untuk menyimpan hasil perhitungan
let c1_array = [];
let c2_array = [];
let c3_array = [];

let sum_c1_6_jb = 0, sum_c1_6_jb_count = 0, sum_c1_6_sp = 0, sum_c1_6_p = 0;
let sum_c2_6_jb = 0, sum_c2_6_jb_count = 0, sum_c2_6_sp = 0, sum_c2_6_p = 0;
let sum_c3_6_jb = 0, sum_c3_6_jb_count = 0, sum_c3_6_sp = 0, sum_c3_6_p = 0;

// Iterasi semua data peta
maps.forEach((mapData, index) => {
    try {
        // Pastikan data distrik dan geojson tersedia
        if (!mapData.distrik && !mapData.distrik.geojson) {
            throw new Error(`GeoJSON tidak ditemukan pada data distrik untuk wilayah: ${mapData.nama || 'Tanpa Nama'}`);
        }

        // Parse GeoJSON dari string ke objek JavaScript
        let geoJsonData = JSON.parse(mapData.distrik.geojson);

        // Perhitungan tambahan
        let data_jb = mapData.jumlah_balita || 0;
        let data_sp = mapData.sangat_pendek || 0;
        let data_p = mapData.pendek || 0;

        let c1_result = Math.sqrt(Math.pow(data_jb - c1_jb, 2) + Math.pow(data_sp - c1_sp, 2) + Math.pow(data_p - c1_p, 2));
        c1_array.push(c1_result);

        let c2_result = Math.sqrt(Math.pow(data_jb - c2_jb, 2) + Math.pow(data_sp - c2_sp, 2) + Math.pow(data_p - c2_p, 2));
        c2_array.push(c2_result);

        let c3_result = Math.sqrt(Math.pow(data_jb - c3_jb, 2) + Math.pow(data_sp - c3_sp, 2) + Math.pow(data_p - c3_p, 2));
        c3_array.push(c3_result);

        let ket = 0;
        let color = "#FE9900";

        if (c1_result < c2_result && c1_result < c3_result) {
            sum_c1_6_jb += data_jb;
            sum_c1_6_jb_count++;
            sum_c1_6_sp += data_sp;
            sum_c1_6_p += data_p;
            ket = 1;
            color = "#00FF00"; // Hijau
        }

        if (c2_result < c1_result && c2_result < c3_result) {
            sum_c2_6_jb += data_jb;
            sum_c2_6_jb_count++;
            sum_c2_6_sp += data_sp;
            sum_c2_6_p += data_p;
            ket = 2;
            color = "#0000FF"; // Biru
        }

        if (c3_result < c1_result && c3_result < c2_result) {
            sum_c3_6_jb += data_jb;
            sum_c3_6_jb_count++;
            sum_c3_6_sp += data_sp;
            sum_c3_6_p += data_p;
            ket = 3;
            color = "#FF0000"; // Merah
        }

        // Validasi struktur GeoJSON sebelum ditambahkan ke peta
        if (geoJsonData && geoJsonData.type === "FeatureCollection") {
            // Tambahkan GeoJSON ke dalam peta dengan gaya sesuai kategori
            let geoLayer = L.geoJson(geoJsonData, {
                style: {
                    color: color,
                    fillColor: color,
                    weight: 2
                },
                onEachFeature: (feature, layer) => {
                    let namaWilayah = feature.properties?.nama || 'Tidak Ada Nama';
                    layer.bindPopup(`${namaWilayah} (Kategori: ${ket})`);
                }
            }).addTo(map);

            // Simpan layer ke dalam districtLayers untuk kontrol layer
            let wilayahNama = mapData.nama || `Wilayah ${index + 1}`;
            districtLayers[wilayahNama] = geoLayer;
        } else {
            console.warn(`GeoJSON tidak valid untuk wilayah: ${mapData.nama}`);
        }

    } catch (e) {
        console.error(`Error parsing GeoJSON untuk wilayah: ${mapData.nama}`, e);
    }
});









        L.control.layers(null, districtLayers, {
            collapsed: false
        }).addTo(map);



        // Adjusted the map view to focus on Papua, Indonesia
        map.setView({
            lat: -2.5677583,
            lng: 140.435791
        }, 9); // Papua, Indonesia coordinates
    </script>
    @endif
@endsection
