<?php

namespace App\Http\Controllers;

use App\Models\Pendampingan;
use App\Models\Pengaduan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $pengaduan = Pengaduan::get()->count();
        $pendampingan = Pendampingan::get()->count();

        // Status
        $pengaduanBlmTerima = Pengaduan::where('status',null)->get()->count();
        $pengaduanSdhTerima = Pengaduan::where('status','Diterima')->get()->count();
        $pengaduanSelesai = Pengaduan::where('status','Selesai')->get()->count();
        $pengaduanTdkTerima = Pengaduan::where('status','Tidak diterima')->get()->count();

        // Pendampingan
        $pendampinganDalamProses = Pendampingan::where('status_pendampingan','Dalam Proses')->get()->count();
        $pendampinganSelesai = Pendampingan::where('status_pendampingan','Selesai')->get()->count();


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









        if(Auth::user()->hasRole('pelapor'))
        {
            $pengaduan = Pengaduan::where('user_id',Auth::user()->id)->get()->count();
            $pendampingan = Pendampingan::whereHas('pengaduan', function ($query) {
                $query->where('user_id', Auth::user()->id);
            })->with('pengaduan')->count();


            // Pengaduaan Status
            // $pengaduan = Pengaduan::where('user_id',Auth::user()->id)->where('status',null)->get()->count();

             // Status
            $pengaduanBlmTerima = Pengaduan::where('user_id',Auth::user()->id)->where('status',null)->get()->count();
            $pengaduanSdhTerima = Pengaduan::where('user_id',Auth::user()->id)->where('status','Diterima')->get()->count();
            $pengaduanSelesai = Pengaduan::where('user_id',Auth::user()->id)->where('status','Selesai')->get()->count();
            $pengaduanTdkTerima = Pengaduan::where('user_id',Auth::user()->id)->where('status','Tidak diterima')->get()->count();

            // Pendampingan
            $pendampinganDalamProses = Pendampingan::where('status_pendampingan','Dalam Proses')->whereHas('pengaduan', function ($query) {
                $query->where('user_id', Auth::user()->id);
            })->with('pengaduan')->count();
            $pendampinganSelesai = Pendampingan::where('status_pendampingan','Selesai')->whereHas('pengaduan', function ($query) {
                $query->where('user_id', Auth::user()->id);
            })->with('pengaduan')->count();



                // Query jumlah pengaduan per bulan dan tahun
                $pengaduanTanggal = Pengaduan::where('user_id',Auth::user()->id)->selectRaw('MONTH(created_at) as bulan, YEAR(created_at) as tahun, COUNT(*) as jumlah')
                ->groupBy('bulan', 'tahun')
                ->orderBy('tahun', 'asc')
                ->orderBy('bulan', 'asc')
                ->get();

                // Query jumlah pendampingan per bulan dan tahun
                $pendampinganTanggal = Pendampingan::whereHas('pengaduan', function ($query) {
                    $query->where('user_id', Auth::user()->id);
                })->with('pengaduan')->selectRaw('MONTH(created_at) as bulan, YEAR(created_at) as tahun, COUNT(*) as jumlah')
                ->groupBy('bulan', 'tahun')
                ->orderBy('tahun', 'asc')
                ->orderBy('bulan', 'asc')
                ->get();

        }


        $labels = [];
        $dataPengaduan = [];
        $dataPendampingan = [];

        foreach ($pengaduanTanggal as $item) {
            $labels[] = Carbon::createFromDate($item->tahun, $item->bulan, 1)->format('F Y');
            $dataPengaduan[] = $item->jumlah;
        }

        foreach ($pendampinganTanggal as $item) {
            $dataPendampingan[] = $item->jumlah;
        }

        return view('admin.dashboard.index',compact('pengaduan','pendampingan',
        // Status Pengaduan
        'pengaduanBlmTerima',
        'pengaduanSdhTerima',
        'pengaduanSelesai',
        'pengaduanTdkTerima',


         // Pendampingan
       'pendampinganDalamProses',
       'pendampinganSelesai',

       'dataPengaduan',
       'dataPendampingan',
       'labels',
    ));
    }

}
