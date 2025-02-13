<?php

namespace App\Http\Controllers;

use App\Models\Pendampingan;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PendampinganController extends Controller
{
    public function index(Request $request)
    {
        $datas = null;
        if(Auth::user()->hasRole('pelapor'))
        {
            $datas = Pengaduan::with('pendampingan')->where('user_id',Auth::user()->id)->where([
                ['judul_pengaduan', '!=', Null],
                [function ($query) use ($request) {
                    if (($s = $request->s)) {
                        $query->orWhere('nama_pelapor', 'LIKE', '%' . $s . '%')
                            ->orWhere('nama_lengkap_korban', 'LIKE', '%' . $s . '%')
                            ->orWhere('nama_panggilan_korban', 'LIKE', '%' . $s . '%')
                            ->orWhere('nama_lengkap_pelaku', 'LIKE', '%' . $s . '%')
                            ->orWhere('created_at', 'LIKE', '%' . $s . '%')
                            ->orWhere('keterangan', 'LIKE', '%' . $s . '%')
                            ->get();
                    }
                }]
            ])->orderBy('id', 'desc')->paginate(10);
        }else{

            $datas = Pengaduan::with('pendampingan')->where([
                ['judul_pengaduan', '!=', Null],
                [function ($query) use ($request) {
                    if (($s = $request->s)) {
                        $query->orWhere('nama_pelapor', 'LIKE', '%' . $s . '%')
                            ->orWhere('nama_lengkap_korban', 'LIKE', '%' . $s . '%')
                            ->orWhere('nama_panggilan_korban', 'LIKE', '%' . $s . '%')
                            ->orWhere('nama_lengkap_pelaku', 'LIKE', '%' . $s . '%')
                            ->orWhere('created_at', 'LIKE', '%' . $s . '%')
                            ->orWhere('keterangan', 'LIKE', '%' . $s . '%')
                            ->get();
                    }
                }]
            ])->orderBy('id', 'desc')->paginate(10);

        }
        return view('admin.pendampingan.index',compact('datas'))->with('i',(request()->input('page', 1) - 1) * 10);

    }

    public function show(string $id, Request $request)
    {
        if(Auth::user()->hasRole('pelapor'))
        {
            $datas = Pendampingan::where('pengaduan_id',$id)->where([
                [function ($query) use ($request) {
                    if (($s = $request->s)) {
                        $query->orWhere('judul_pendampingan', 'LIKE', '%' . $s . '%')
                            ->orWhere('catatan_pendampingan', 'LIKE', '%' . $s . '%')
                            ->orWhere('catatan_pelapor', 'LIKE', '%' . $s . '%')
                            ->orWhere('nama_lengkap_pelaku', 'LIKE', '%' . $s . '%')
                            ->orWhere('status_pendampingan', 'LIKE', '%' . $s . '%')
                            ->orWhere('keterangan', 'LIKE', '%' . $s . '%')
                            ->get();
                    }
                }]
            ])->orderBy('id', 'desc')->get();
        }
        $pengaduan = Pengaduan::where('id',$id)->first();
        return view('admin.pendampingan.detail',compact('datas','pengaduan'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function pendampinganDetail($id)
    {
        $data = Pendampingan::where('id',$id)->first();
        return view('admin.pendampingan.detail-sub',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }


    public function csv(Request $request)
    {

    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

    }

}
