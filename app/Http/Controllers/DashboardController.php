<?php

namespace App\Http\Controllers;

use App\Models\Pendampingan;
use App\Models\Pengaduan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {

        if (Auth::user()->hasRole('pelapor')) {

            return redirect()->route('dashboard.pengaduan');
        };

        $pengaduan = Pengaduan::get()->count();
        $pendampingan = Pendampingan::get()->count();

        // Status
        $pengaduanBlmTerima = Pengaduan::where('status', null)->get()->count();
        $pengaduanSdhTerima = Pengaduan::where('status', 'Diterima')->get()->count();
        $pengaduanSelesai = Pengaduan::where('status', 'Selesai')->get()->count();
        $pengaduanTdkTerima = Pengaduan::where('status', 'Tidak diterima')->get()->count();

        // Pendampingan
        $pendampinganDalamProses = Pendampingan::where('status_pendampingan', 'Dalam Proses')->get()->count();
        $pendampinganSelesai = Pendampingan::where('status_pendampingan', 'Selesai')->get()->count();


        // Query jumlah pengaduan per bulan dan tahun
        $pengaduanTanggal = Pengaduan::selectRaw('MONTH(created_at) as bulan, YEAR(created_at) as tahun, COUNT(*) as jumlah')
            ->groupBy('bulan', 'tahun')
            ->orderBy('tahun', 'asc')
            ->orderBy('bulan', 'asc')
            ->get();

        // Query jumlah pendampingan per bulan dan tahun
        $pendampinganTanggal = Pendampingan::selectRaw('MONTH(created_at) as bulan, YEAR(created_at) as tahun, COUNT(*) as jumlah')
            ->groupBy('bulan', 'tahun')
            ->orderBy('tahun', 'asc')
            ->orderBy('bulan', 'asc')
            ->get();


        $wanita = Pengaduan::where('jenis_kelamin_korban', 'Wanita')->get()->count();
        $pria = Pengaduan::where('jenis_kelamin_korban', 'Pria')->get()->count();





        if (Auth::user()->hasRole('pelapor')) {
            redirect()->route('dashboard.pengaduan');
        }

        $labels = [];
        $dataPengaduan = [];
        $dataPendampingan = [];

        foreach ($pengaduanTanggal as $item) {
            $labels[] = Carbon::createFromDate($item->tahun, $item->bulan, 1)->format('F Y');
            $dataPengaduan[] = $item->jumlah;
        }
        $labelsTahun = [];
        $dataPengaduanTahun = [];

        $pengaduanPerTahun = DB::table('pengaduans')
            ->selectRaw('YEAR(created_at) as tahun, COUNT(*) as jumlah')
            ->groupBy('tahun')
            ->orderBy('tahun')
            ->get();

        foreach ($pengaduanPerTahun as $item) {
            $labelsTahun[] = $item->tahun;
            $dataPengaduanTahun[] = $item->jumlah;
        }


        return view('admin.dashboard.index', compact(
            'pengaduan',
            'pendampingan',
            // Status Pengaduan
            'pengaduanBlmTerima',
            'pengaduanSdhTerima',
            'pengaduanSelesai',
            'pengaduanTdkTerima',


            // Pendampingan
            'pendampinganDalamProses',
            'pendampinganSelesai',

            'dataPengaduan',
            'labels',

            'labelsTahun',
            'dataPengaduanTahun',

            'pria',
            'wanita',
        ));
    }
}
