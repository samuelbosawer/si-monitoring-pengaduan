<?php

namespace App\Http\Controllers;

use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{

    public function index(Request $request)
    {
        return view('home.index');
    }

    public function peta($id)
    {
        // $distrik = Distrik::where('id',$id)->first();
        // $kelurahan = Kelurahan::where('distrik_id',$id)->get();
        // return view('home.detail-peta',compact('distrik','kelurahan'));
    }


    public function daftar()
    {

        return view('home.daftar');
    }

    public function daftarStore(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|unique:users,email|string',
                'no_hp' => 'required|unique:users,no_hp|min:12|numeric',
                'name' => 'required',
                'password'  => 'required|confirmed|min:8',
                'password_confirmation' => 'required_with:password|same:password|min:8'
            ],
            [
                'email.required' => 'Tidak boleh kosong',
                'email.unique' => 'Email sudah terdaftar',
                'no_hp.required' => 'Tidak boleh kosong',
                'no_hp.unique' => 'No Hp sudah terdaftar',

                'no_hp.min' => 'Minimal 12 nomor ',
                'no_hp.numeric' => 'Harus nomor/angka ',


                'name.required' => 'Tidak boleh kosong',
                'password.required' => 'Tidak boleh kosong',
                'password.confirmed' => 'Password tidak sama',
                'no_hp.password' => 'Minimal 8 karakter ',

            ]
        );
        $data = new User();

        $data->email   = $request->email;
        $data->no_hp   = $request->no_hp;
        $data->password   = bcrypt($request->password);
        $data->name   = $request->name;
        $data->assignRole('pelapor');

        $data->save();

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.fonnte.com/send',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array(
        'target' => $request->no_hp,
        'message' => 'Anda sudah terdaftar pada *Sistem Monitoring Dan Evaluasi Pengaduan Tindak Kekerasan Terhadap Perempuan & Anak*

*Silahkan login menggunakan email dan password untuk melakukan pengaduan 🙏🏽😊*

Terimakasih 🙏🏽😊',
        'countryCode' => '62', //optional
        ),
        CURLOPT_HTTPHEADER => array(
            'Authorization:'.  env('FONNTE_TOKEN') //change TOKEN to your actual token
        ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);

         alert()->success('Berhasil', 'Anda sudah terdaftar ')->autoclose(3000);

        return redirect()->route('login');

    }
}
