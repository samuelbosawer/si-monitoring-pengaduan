<?php

namespace App\Http\Controllers;

use App\Models\Pendampingan;
use App\Models\Pengaduan;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

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


            $datas = Pendampingan::where('pengaduan_id',$id)->where([
                [function ($query) use ($request) {
                    if (($s = $request->s)) {
                        $query->orWhere('judul_pendampingan', 'LIKE', '%' . $s . '%')
                            ->orWhere('catatan_pendampingan', 'LIKE', '%' . $s . '%')
                            ->orWhere('status_pendampingan', 'LIKE', '%' . $s . '%')
                            ->orWhere('created_at', 'LIKE', '%' . $s . '%')
                            ->get();
                    }
                }]
            ])->orderBy('id', 'desc')->get();

        $pengaduan = Pengaduan::where('id',$id)->first();
        $id_pengaduan = $id;
        return view('admin.pendampingan.detail',compact('datas','pengaduan','id_pengaduan'));
    }


    public function pdf_index()
    {
          // Data yang akan diteruskan ke view
          $data = [
            'title' => 'LAPORAN PENDAMPINGAN',
            'datas' => Pengaduan::with('pendampingan')->orderBy('id', 'desc')->get(),
        ];

        // Buat PDF
        $pdf = Pdf::loadView('admin.pendampingan.pdf_index', $data);
        $doc = 'informasi-data-pendampingan.pdf';

        // return $pdf->download($doc);
        return $pdf->stream($doc); // Jika ingin menampilkan langsung di browser
    }

    public function pdf_detail($id)
    {
         $title = Pengaduan::where('id',$id)->first();
          $data = [
            'title' => 'LAPORAN PENDAMPINGAN YANG DILAKUKAN',
            'datas' =>  Pendampingan::where('pengaduan_id',$id)->get(),
            'judul' =>  $title
          ];

        // Buat PDF
        $pdf = Pdf::loadView('admin.pendampingan.pdf_detail', $data);
        $doc = 'informasi-data-pengaduan'.$title->judul_pengaduan.'.pdf';

        // return $pdf->download($doc);
        return $pdf->stream($doc); // Jika ingin menampilkan langsung di browser
    }

    public function pdf_detail_sub($id)
    {
        $data = [
            'title' => 'LAPORAN PENDAMPINGAN YANG DILAKUKAN',
            'data' =>  Pendampingan::where('id',$id)->first(),
          ];

        // Buat PDF
        $pdf = Pdf::loadView('admin.pendampingan.pdf_detail_sub', $data);
        $doc = 'informasi-data-pengaduan'.'.pdf';

        // return $pdf->download($doc);
        return $pdf->stream($doc); // Jika ingin menampilkan langsung di browser
    }


    /**
     * Show the form for creating a new resource.
     */
    public function pendampinganDetail($id)
    {
        $data = Pendampingan::where('id',$id)->first();
        $id_pengaduan = $id;
        $caption = 'Detail Data Pendampingan';
        return view('admin.pendampingan.detail-sub',compact('data','caption'));
    }

    public function create($id)
    {
        $data = null;
        $caption = 'Tambah Data Pendampingan';
        return view('admin.pendampingan.detail-sub',compact('data','caption'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'judul_pendampingan' => 'required',
        ],
        [
            'judul_pendampingan.required' => 'Wajib diisi !',
        ]

    );


    $data = new Pendampingan;
    $data->judul_pendampingan   = $request->judul_pendampingan;
    $data->catatan_pendampingan = $request->catatan_pendampingan;
    $data->status_pendampingan = $request->status_pendampingan;
    $data->pengaduan_id = $request->id_p;

    $data->save();

    alert()->success('Berhasil', 'Tambah data berhasil')->autoclose(3000);


    return redirect()->route('dashboard.pendampingan.detail',$request->id_p);
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
        $this->validate($request, [
                'judul_pendampingan' => 'required',
            ],
            [
                'judul_pendampingan.required' => 'Wajib diisi !',
            ]

        );


    $data =  Pendampingan::find($id);
    $data->judul_pendampingan   = $request->judul_pendampingan;
    $data->catatan_pendampingan = $request->catatan_pendampingan;
    $data->status_pendampingan = $request->status_pendampingan;
    $data->pengaduan_id = $request->id_p;
    $data->update();

    alert()->success('Berhasil', 'Ubah data berhasil')->autoclose(3000);
    return redirect()->route('dashboard.pendampingan.detail',$request->id_p);
    // pendampingan.detail
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

    }

}
