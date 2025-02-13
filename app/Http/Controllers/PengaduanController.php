<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use File;

class PengaduanController extends Controller
{
    public function index(Request $request)
    {

        $datas = null;
        if(Auth::user()->hasRole('pelapor'))
        {
            $datas = Pengaduan::where('user_id',Auth::user()->id)->where([
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

            $datas = Pengaduan::where([
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
        return view('admin.pengaduan.index',compact('datas'))->with('i',(request()->input('page', 1) - 1) * 10);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $caption = 'Tambah Pengaduan';
        return view('admin.pengaduan.create', compact('caption'));

    }

    public function update_status(Request $request, string $id)
    {
        $data =  Pengaduan::find($id);
        $data->status   = $request->status;
        $data->update();
        alert()->success('Berhasil', 'Ubah Status berhasil')->autoclose(3000);
        return redirect()->route('dashboard.pengaduan');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $this->validate($request, [
            'judul_pengaduan' => 'required',
            // 'tempat' => 'required',
            // 'melapor' => 'required',
            // 'nama_pelapor' => 'required',
            // 'no_hp_pelapor' => 'required',
            // 'mengetahui_dari' => 'required',
            // 'rujukan_dari' => 'required',
            // 'alamat_pelapor' => 'required',
            // 'jk_pelapor' => 'required',


            // 'nama_lengkap_korban' => 'required',
            // 'nama_panggilan_korban' => 'required',
            // 'jenis_kelamin_korban' => 'required',
            // 'tempat_lahir_korban' => 'required',
            // 'tanggal_lahir_korban' => 'required',
            // 'alamat_korban' => 'required',
            // 'pekerjaan_korban' => 'required',
            // 'agama_korban' => 'required',
            // 'pendidikan_korban' => 'required',
            // 'nik_korban' => 'required',
            // 'hubungan' => 'required',
            // 'jumlah_anak_pria' => 'required',
            // 'jumlah_anak_wanita' => 'required',
            // 'status_pernikahan' => 'required',



            // 'nama_lengkap_pelaku' => 'required',
            // 'nama_panggilan_pelaku' => 'required',
            // 'jenis_kelamin_pelaku' => 'required',
            // 'tempat_lahir_pelaku' => 'required',
            // 'tanggal_lahir_pelaku' => 'required',
            // 'agama_pelaku' => 'required',
            // 'pendidikan_pelaku' => 'required',
            // 'nik_pelaku' => 'required',
            // 'no_hp_pelaku' => 'required',
            // 'pekerjaan_pelaku' => 'required',

            // 'kondisi_fisik' => 'required',
            // 'kondisi_psikis' => 'required',
            // 'kondisi_sexual' => 'required',

            // 'dampak_fisik' => 'required',
            // 'dampak_psikis' => 'required',
            // 'dampak_sex' => 'required',
            // 'dampak_ekonomi' => 'required',
            // 'dampak_kesehatan' => 'required',
            // 'dampak_lainnya' => 'required',

            // 'kasus_domestik' => 'required',
            // 'kasus_publik' => 'required',
            // 'kasus_lainnya' => 'required',

            // 'uraian_kejadian' => 'required',


            // 'nim' => 'required|unique:mahasiswas,nim',
            // 'email' => 'required|email|unique:mahasiswas,email',
            // 'no_hp' => 'required|unique:mahasiswas,no_hp',

            'surat_nikah_gereja' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'akte_nikah_sipil' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'akte_cerai_sipil' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'akte_nikah_kua' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'akte_cerai_kua' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ],
        [
            'judul_pengaduan.required' => 'Tidak boleh kosong',
            'tempat.required' => 'Tidak boleh kosong',
            'tempat_lahir.required' => 'Tidak boleh kosong',
            'nama_pelapor.required' => 'Tidak boleh kosong',
            'no_hp_pelapor.required' => 'Tidak boleh kosong',
            'mengetahui_dari.required' => 'Tidak boleh kosong',
            'rujukan_dari.required' => 'Tidak boleh kosong',
            'alamat_pelapor.required' => 'Tidak boleh kosong',
            'melapor.required' => 'Tidak boleh kosong',
            'jk_pelapor.required' => 'Tidak boleh kosong',


            'nama_lengkap_korban.required' => 'Tidak boleh kosong',
            'nama_panggilan_korban.required' => 'Tidak boleh kosong',
            'jenis_kelamin_korban.required' => 'Tidak boleh kosong',
            'tempat_lahir_korban.required' => 'Tidak boleh kosong',
            'tanggal_lahir_korban.required' => 'Tidak boleh kosong',
            'alamat_korban.required' => 'Tidak boleh kosong',
            'pekerjaan_korban.required' => 'Tidak boleh kosong',
            'agama_korban.required' => 'Tidak boleh kosong',
            'pendidikan_korban.required' => 'Tidak boleh kosong',
            'nik_korban.required' => 'Tidak boleh kosong',
            'hubungan.required' => 'Tidak boleh kosong',
            'jumlah_anak_pria.required' => 'Tidak boleh kosong',
            'jumlah_anak_wanita.required' => 'Tidak boleh kosong',
            'status_pernikahan.required' => 'Tidak boleh kosong',

            'nama_lengkap_pelaku.required' => 'Tidak boleh kosong',
            'nama_panggilan_pelaku.required' => 'Tidak boleh kosong',
            'jenis_kelamin_pelaku.required' => 'Tidak boleh kosong',
            'tempat_lahir_pelaku.required' => 'Tidak boleh kosong',
            'tanggal_lahir_pelaku.required' => 'Tidak boleh kosong',
            'agama_pelaku.required' => 'Tidak boleh kosong',
            'pendidikan_pelaku.required' => 'Tidak boleh kosong',
            'nik_pelaku.required' => 'Tidak boleh kosong',
            'no_hp_pelaku.required' => 'Tidak boleh kosong',
            'pekerjaan_pelaku.required' => 'Tidak boleh kosong',

            'kondisi_fisik.required' => 'Tidak boleh kosong',
            'kondisi_psikis.required' => 'Tidak boleh kosong',
            'kondisi_sexual.required' => 'Tidak boleh kosong',

            'dampak_fisik.required' => 'Tidak boleh kosong',
            'dampak_psikis.required' => 'Tidak boleh kosong',
            'dampak_sex.required' => 'Tidak boleh kosong',
            'dampak_ekonomi.required' => 'Tidak boleh kosong',
            'dampak_kesehatan.required' => 'Tidak boleh kosong',
            'dampak_lainnya.required' => 'Tidak boleh kosong',

            'kasus_domestik.required' => 'Tidak boleh kosong',
            'kasus_publik.required' => 'Tidak boleh kosong',
            'kasus_lainnya.required' => 'Tidak boleh kosong',

            'uraian_kejadian.required' => 'Tidak boleh kosong',

        ]
        );

        $data = new Pengaduan();

        $data->judul_pengaduan   = $request->judul_pengaduan;
        $data->tempat   = $request->tempat;
        $data->melapor   = $request->melapor;
        $data->nama_pelapor   = $request->nama_pelapor;
        $data->jk_pelapor   = $request->jk_pelapor;
        $data->no_hp_pelapor   = $request->no_hp_pelapor;
        $data->mengetahui_dari   = $request->mengetahui_dari;
        $data->rujukan_dari   = $request->rujukan_dari;
        $data->alamat_pelapor   = $request->alamat_pelapor;

        $data->nama_lengkap_korban   = $request->nama_lengkap_korban;
        $data->nama_panggilan_korban   = $request->nama_panggilan_korban;
        $data->jenis_kelamin_korban   = $request->jenis_kelamin_korban;
        $data->tempat_lahir_korban   = $request->tempat_lahir_korban;
        $data->tanggal_lahir_korban   = $request->tanggal_lahir_korban;
        $data->pekerjaan_korban   = $request->pekerjaan_korban;
        $data->alamat_korban   = $request->alamat_korban;
        $data->agama_korban   = $request->agama_korban;
        $data->pendidikan_korban   = $request->pendidikan_korban;
        $data->nik_korban   = $request->nik_korban;
        $data->hubungan   = $request->hubungan;
        $data->jumlah_anak_pria   = $request->jumlah_anak_pria;
        $data->jumlah_anak_wanita   = $request->jumlah_anak_wanita;
        $data->status_pernikahan   = $request->status_pernikahan;

        $data->nama_lengkap_pelaku   = $request->nama_lengkap_pelaku;
        $data->nama_panggilan_pelaku   = $request->nama_panggilan_pelaku;
        $data->jenis_kelamin_pelaku   = $request->jenis_kelamin_pelaku;
        $data->tempat_lahir_pelaku   = $request->tempat_lahir_pelaku;
        $data->tanggal_lahir_pelaku   = $request->tanggal_lahir_pelaku;
        $data->agama_pelaku   = $request->agama_pelaku;
        $data->pendidikan_pelaku   = $request->pendidikan_pelaku;
        $data->nik_pelaku   = $request->nik_pelaku;
        $data->no_hp_pelaku   = $request->no_hp_pelaku;
        $data->pekerjaan_pelaku   = $request->pekerjaan_pelaku;

        $data->kondisi_fisik   = $request->kondisi_fisik;
        $data->kondisi_psikis   = $request->kondisi_psikis;
        $data->kondisi_sexual   = $request->kondisi_sexual;

        $data->dampak_fisik   = $request->dampak_fisik;
        $data->dampak_psikis   = $request->dampak_psikis;
        $data->dampak_sex   = $request->dampak_sex;
        $data->dampak_ekonomi   = $request->dampak_ekonomi;
        $data->dampak_kesehatan   = $request->dampak_kesehatan;
        $data->dampak_lainnya   = $request->dampak_lainnya;

        $data->kasus_domestik   = $request->kasus_domestik;
        $data->kasus_publik   = $request->kasus_publik;
        $data->kasus_lainnya   = $request->kasus_lainnya;
        $data->uraian_kejadian   = $request->uraian_kejadian;

            // picture creation
        if (isset($request->surat_nikah_gereja)) {
            $fileName = $request->surat_nikah_gereja->getClientOriginalName();
            $path = public_path('gambar/pengaduan/'.Auth::User()->id.'/'. $data->surat_nikah_gereja);
            if (file_exists($path)) {
                File::delete($path);
            }
            $timestamp = now()->timestamp;
            $data->surat_nikah_gereja = 'gambar/pengaduan/'.Auth::User()->id.'/'.$timestamp.'-'.$fileName;
            $request->surat_nikah_gereja->move(public_path('gambar/pengaduan/').Auth::User()->id. '/', $timestamp.'-'.$fileName);
        }

        if (isset($request->akte_nikah_sipil)) {
            $fileName = $request->akte_nikah_sipil->getClientOriginalName();
            $path = public_path('gambar/pengaduan/'.Auth::User()->id.'/'. $data->akte_nikah_sipil);
            if (file_exists($path)) {
                File::delete($path);
            }
            $timestamp = now()->timestamp;
            $data->akte_nikah_sipil = 'gambar/pengaduan/'.Auth::User()->id.'/'.$timestamp.'-'.$fileName;
            $request->akte_nikah_sipil->move(public_path('gambar/pengaduan/').Auth::User()->id. '/', $timestamp.'-'.$fileName);
        }

        if (isset($request->akte_cerai_sipil)) {
            $fileName = $request->akte_cerai_sipil->getClientOriginalName();
            $path = public_path('gambar/pengaduan/'.Auth::User()->id.'/'. $data->akte_cerai_sipil);
            if (file_exists($path)) {
                File::delete($path);
            }
            $timestamp = now()->timestamp;
            $data->akte_cerai_sipil = 'gambar/pengaduan/'.Auth::User()->id.'/'.$timestamp.'-'.$fileName;
            $request->akte_cerai_sipil->move(public_path('gambar/pengaduan/').Auth::User()->id. '/', $timestamp.'-'.$fileName);
        }

        if (isset($request->akte_nikah_kua)) {
            $fileName = $request->akte_nikah_kua->getClientOriginalName();
            $path = public_path('gambar/pengaduan/'.Auth::User()->id.'/'. $data->akte_nikah_kua);
            if (file_exists($path)) {
                File::delete($path);
            }
            $timestamp = now()->timestamp;
            $data->akte_nikah_kua = 'gambar/pengaduan/'.Auth::User()->id.'/'.$timestamp.'-'.$fileName;
            $request->akte_nikah_kua->move(public_path('gambar/pengaduan/').Auth::User()->id. '/', $timestamp.'-'.$fileName);
        }

        if (isset($request->akte_cerai_kua)) {
            $fileName = $request->akte_cerai_kua->getClientOriginalName();
            $path = public_path('gambar/pengaduan/'.Auth::User()->id.'/'. $data->akte_cerai_kua);
            if (file_exists($path)) {
                File::delete($path);
            }
            $timestamp = now()->timestamp;
            $data->akte_cerai_kua = 'gambar/pengaduan/'.Auth::User()->id.'/'.$timestamp.'-'.$fileName;
            $request->akte_cerai_kua->move(public_path('gambar/pengaduan/').Auth::User()->id. '/', $timestamp.'-'.$fileName);
        }



        $data->user_id   = Auth::user()->id;

        $data->save();
        alert()->success('Berhasil', 'Tambah data berhasil')->autoclose(3000);
        return redirect()->route('dashboard.pengaduan');
    }


    public function csv(Request $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Pengaduan::where('id',$id)->first();
        $caption = 'Detail Pengaduan';
        return view('admin.pengaduan.create',compact('data','caption'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Pengaduan::where('id',$id)->first();
        $caption = 'Ubah Pengaduan';
        return view('admin.pengaduan.create',compact('data','caption'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'judul_pengaduan' => 'required',
            // 'tempat' => 'required',
            // 'melapor' => 'required',
            // 'nama_pelapor' => 'required',
            // 'no_hp_pelapor' => 'required',
            // 'mengetahui_dari' => 'required',
            // 'rujukan_dari' => 'required',
            // 'alamat_pelapor' => 'required',
            // 'jk_pelapor' => 'required',


            // 'nama_lengkap_korban' => 'required',
            // 'nama_panggilan_korban' => 'required',
            // 'jenis_kelamin_korban' => 'required',
            // 'tempat_lahir_korban' => 'required',
            // 'tanggal_lahir_korban' => 'required',
            // 'alamat_korban' => 'required',
            // 'pekerjaan_korban' => 'required',
            // 'agama_korban' => 'required',
            // 'pendidikan_korban' => 'required',
            // 'nik_korban' => 'required',
            // 'hubungan' => 'required',
            // 'jumlah_anak_pria' => 'required',
            // 'jumlah_anak_wanita' => 'required',
            // 'status_pernikahan' => 'required',



            // 'nama_lengkap_pelaku' => 'required',
            // 'nama_panggilan_pelaku' => 'required',
            // 'jenis_kelamin_pelaku' => 'required',
            // 'tempat_lahir_pelaku' => 'required',
            // 'tanggal_lahir_pelaku' => 'required',
            // 'agama_pelaku' => 'required',
            // 'pendidikan_pelaku' => 'required',
            // 'nik_pelaku' => 'required',
            // 'no_hp_pelaku' => 'required',
            // 'pekerjaan_pelaku' => 'required',

            // 'kondisi_fisik' => 'required',
            // 'kondisi_psikis' => 'required',
            // 'kondisi_sexual' => 'required',

            // 'dampak_fisik' => 'required',
            // 'dampak_psikis' => 'required',
            // 'dampak_sex' => 'required',
            // 'dampak_ekonomi' => 'required',
            // 'dampak_kesehatan' => 'required',
            // 'dampak_lainnya' => 'required',

            // 'kasus_domestik' => 'required',
            // 'kasus_publik' => 'required',
            // 'kasus_lainnya' => 'required',

            // 'uraian_kejadian' => 'required',


            // 'nim' => 'required|unique:mahasiswas,nim',
            // 'email' => 'required|email|unique:mahasiswas,email',
            // 'no_hp' => 'required|unique:mahasiswas,no_hp',

            'surat_nikah_gereja' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'akte_nikah_sipil' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'akte_cerai_sipil' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'akte_nikah_kua' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'akte_cerai_kua' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ],
        [
            'judul_pengaduan.required' => 'Tidak boleh kosong',
            'tempat.required' => 'Tidak boleh kosong',
            'tempat_lahir.required' => 'Tidak boleh kosong',
            'nama_pelapor.required' => 'Tidak boleh kosong',
            'no_hp_pelapor.required' => 'Tidak boleh kosong',
            'mengetahui_dari.required' => 'Tidak boleh kosong',
            'rujukan_dari.required' => 'Tidak boleh kosong',
            'alamat_pelapor.required' => 'Tidak boleh kosong',
            'melapor.required' => 'Tidak boleh kosong',
            'jk_pelapor.required' => 'Tidak boleh kosong',


            'nama_lengkap_korban.required' => 'Tidak boleh kosong',
            'nama_panggilan_korban.required' => 'Tidak boleh kosong',
            'jenis_kelamin_korban.required' => 'Tidak boleh kosong',
            'tempat_lahir_korban.required' => 'Tidak boleh kosong',
            'tanggal_lahir_korban.required' => 'Tidak boleh kosong',
            'alamat_korban.required' => 'Tidak boleh kosong',
            'pekerjaan_korban.required' => 'Tidak boleh kosong',
            'agama_korban.required' => 'Tidak boleh kosong',
            'pendidikan_korban.required' => 'Tidak boleh kosong',
            'nik_korban.required' => 'Tidak boleh kosong',
            'hubungan.required' => 'Tidak boleh kosong',
            'jumlah_anak_pria.required' => 'Tidak boleh kosong',
            'jumlah_anak_wanita.required' => 'Tidak boleh kosong',
            'status_pernikahan.required' => 'Tidak boleh kosong',

            'nama_lengkap_pelaku.required' => 'Tidak boleh kosong',
            'nama_panggilan_pelaku.required' => 'Tidak boleh kosong',
            'jenis_kelamin_pelaku.required' => 'Tidak boleh kosong',
            'tempat_lahir_pelaku.required' => 'Tidak boleh kosong',
            'tanggal_lahir_pelaku.required' => 'Tidak boleh kosong',
            'agama_pelaku.required' => 'Tidak boleh kosong',
            'pendidikan_pelaku.required' => 'Tidak boleh kosong',
            'nik_pelaku.required' => 'Tidak boleh kosong',
            'no_hp_pelaku.required' => 'Tidak boleh kosong',
            'pekerjaan_pelaku.required' => 'Tidak boleh kosong',

            'kondisi_fisik.required' => 'Tidak boleh kosong',
            'kondisi_psikis.required' => 'Tidak boleh kosong',
            'kondisi_sexual.required' => 'Tidak boleh kosong',

            'dampak_fisik.required' => 'Tidak boleh kosong',
            'dampak_psikis.required' => 'Tidak boleh kosong',
            'dampak_sex.required' => 'Tidak boleh kosong',
            'dampak_ekonomi.required' => 'Tidak boleh kosong',
            'dampak_kesehatan.required' => 'Tidak boleh kosong',
            'dampak_lainnya.required' => 'Tidak boleh kosong',

            'kasus_domestik.required' => 'Tidak boleh kosong',
            'kasus_publik.required' => 'Tidak boleh kosong',
            'kasus_lainnya.required' => 'Tidak boleh kosong',

            'uraian_kejadian.required' => 'Tidak boleh kosong',

        ]
        );

        $data =  Pengaduan::find($id);

        $data->judul_pengaduan   = $request->judul_pengaduan;
        $data->tempat   = $request->tempat;
        $data->melapor   = $request->melapor;
        $data->nama_pelapor   = $request->nama_pelapor;
        $data->jk_pelapor   = $request->jk_pelapor;
        $data->no_hp_pelapor   = $request->no_hp_pelapor;
        $data->mengetahui_dari   = $request->mengetahui_dari;
        $data->rujukan_dari   = $request->rujukan_dari;
        $data->alamat_pelapor   = $request->alamat_pelapor;

        $data->nama_lengkap_korban   = $request->nama_lengkap_korban;
        $data->nama_panggilan_korban   = $request->nama_panggilan_korban;
        $data->jenis_kelamin_korban   = $request->jenis_kelamin_korban;
        $data->tempat_lahir_korban   = $request->tempat_lahir_korban;
        $data->tanggal_lahir_korban   = $request->tanggal_lahir_korban;
        $data->pekerjaan_korban   = $request->pekerjaan_korban;
        $data->alamat_korban   = $request->alamat_korban;
        $data->agama_korban   = $request->agama_korban;
        $data->pendidikan_korban   = $request->pendidikan_korban;
        $data->nik_korban   = $request->nik_korban;
        $data->hubungan   = $request->hubungan;
        $data->jumlah_anak_pria   = $request->jumlah_anak_pria;
        $data->jumlah_anak_wanita   = $request->jumlah_anak_wanita;
        $data->status_pernikahan   = $request->status_pernikahan;

        $data->nama_lengkap_pelaku   = $request->nama_lengkap_pelaku;
        $data->nama_panggilan_pelaku   = $request->nama_panggilan_pelaku;
        $data->jenis_kelamin_pelaku   = $request->jenis_kelamin_pelaku;
        $data->tempat_lahir_pelaku   = $request->tempat_lahir_pelaku;
        $data->tanggal_lahir_pelaku   = $request->tanggal_lahir_pelaku;
        $data->agama_pelaku   = $request->agama_pelaku;
        $data->pendidikan_pelaku   = $request->pendidikan_pelaku;
        $data->nik_pelaku   = $request->nik_pelaku;
        $data->no_hp_pelaku   = $request->no_hp_pelaku;
        $data->pekerjaan_pelaku   = $request->pekerjaan_pelaku;

        $data->kondisi_fisik   = $request->kondisi_fisik;
        $data->kondisi_psikis   = $request->kondisi_psikis;
        $data->kondisi_sexual   = $request->kondisi_sexual;

        $data->dampak_fisik   = $request->dampak_fisik;
        $data->dampak_psikis   = $request->dampak_psikis;
        $data->dampak_sex   = $request->dampak_sex;
        $data->dampak_ekonomi   = $request->dampak_ekonomi;
        $data->dampak_kesehatan   = $request->dampak_kesehatan;
        $data->dampak_lainnya   = $request->dampak_lainnya;

        $data->kasus_domestik   = $request->kasus_domestik;
        $data->kasus_publik   = $request->kasus_publik;
        $data->kasus_lainnya   = $request->kasus_lainnya;
        $data->uraian_kejadian   = $request->uraian_kejadian;

            // picture creation
        if (isset($request->surat_nikah_gereja)) {
            $fileName = $request->surat_nikah_gereja->getClientOriginalName();
            $path = public_path('gambar/pengaduan/'.Auth::User()->id.'/'. $data->surat_nikah_gereja);
            if (file_exists($path)) {
                File::delete($path);
            }
            $timestamp = now()->timestamp;
            $data->surat_nikah_gereja = 'gambar/pengaduan/'.Auth::User()->id.'/'.$timestamp.'-'.$fileName;
            $request->surat_nikah_gereja->move(public_path('gambar/pengaduan/').Auth::User()->id. '/', $timestamp.'-'.$fileName);
        }

        if (isset($request->akte_nikah_sipil)) {
            $fileName = $request->akte_nikah_sipil->getClientOriginalName();
            $path = public_path('gambar/pengaduan/'.Auth::User()->id.'/'. $data->akte_nikah_sipil);
            if (file_exists($path)) {
                File::delete($path);
            }
            $timestamp = now()->timestamp;
            $data->akte_nikah_sipil = 'gambar/pengaduan/'.Auth::User()->id.'/'.$timestamp.'-'.$fileName;
            $request->akte_nikah_sipil->move(public_path('gambar/pengaduan/').Auth::User()->id. '/', $timestamp.'-'.$fileName);
        }

        if (isset($request->akte_cerai_sipil)) {
            $fileName = $request->akte_cerai_sipil->getClientOriginalName();
            $path = public_path('gambar/pengaduan/'.Auth::User()->id.'/'. $data->akte_cerai_sipil);
            if (file_exists($path)) {
                File::delete($path);
            }
            $timestamp = now()->timestamp;
            $data->akte_cerai_sipil = 'gambar/pengaduan/'.Auth::User()->id.'/'.$timestamp.'-'.$fileName;
            $request->akte_cerai_sipil->move(public_path('gambar/pengaduan/').Auth::User()->id. '/', $timestamp.'-'.$fileName);
        }

        if (isset($request->akte_nikah_kua)) {
            $fileName = $request->akte_nikah_kua->getClientOriginalName();
            $path = public_path('gambar/pengaduan/'.Auth::User()->id.'/'. $data->akte_nikah_kua);
            if (file_exists($path)) {
                File::delete($path);
            }
            $timestamp = now()->timestamp;
            $data->akte_nikah_kua = 'gambar/pengaduan/'.Auth::User()->id.'/'.$timestamp.'-'.$fileName;
            $request->akte_nikah_kua->move(public_path('gambar/pengaduan/').Auth::User()->id. '/', $timestamp.'-'.$fileName);
        }

        if (isset($request->akte_cerai_kua)) {
            $fileName = $request->akte_cerai_kua->getClientOriginalName();
            $path = public_path('gambar/pengaduan/'.Auth::User()->id.'/'. $data->akte_cerai_kua);
            if (file_exists($path)) {
                File::delete($path);
            }
            $timestamp = now()->timestamp;
            $data->akte_cerai_kua = 'gambar/pengaduan/'.Auth::User()->id.'/'.$timestamp.'-'.$fileName;
            $request->akte_cerai_kua->move(public_path('gambar/pengaduan/').Auth::User()->id. '/', $timestamp.'-'.$fileName);
        }



        $data->user_id   = Auth::user()->id;

        $data->update();
        alert()->success('Berhasil', 'Tambah data berhasil')->autoclose(3000);
        return redirect()->route('dashboard.pengaduan');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Pengaduan::find($id);
        if ($data->surat_nikah_gereja) {
            File::delete($data->surat_nikah_gereja);
        }
        if ($data->akte_nikah_sipil) {
            File::delete($data->akte_nikah_sipil);
        }
        if ($data->akte_cerai_sipil) {
            File::delete($data->akte_cerai_sipil);
        }
        if ($data->akte_nikah_kua) {
            File::delete($data->akte_nikah_kua);
        }
        if ($data->akte_cerai_kua) {
            File::delete($data->akte_cerai_kua);
        }
        $data->delete();
        return redirect()->back();
    }
}
