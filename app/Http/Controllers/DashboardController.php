<?php

namespace App\Http\Controllers;

use App\Models\Pendampingan;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $pengaduan = Pengaduan::get()->count();
        $pendampingan = Pendampingan::get()->count();

        if(Auth::user()->hasRole('pelapor'))
        {
            $pengaduan = Pengaduan::where('user_id',Auth::user()->id)->get()->count();
            $pendampingan = Pendampingan::whereHas('pengaduan', function ($query) {
                $query->where('user_id', Auth::user()->id);
            })->with('pengaduan')->count();

        }

        return view('admin.dashboard.index',compact('pengaduan','pendampingan'));
    }

}
