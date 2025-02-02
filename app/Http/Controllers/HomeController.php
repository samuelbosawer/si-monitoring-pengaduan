<?php

namespace App\Http\Controllers;

use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{

    public function index(Request $request)
    {


        // $datas = Stunting::orderBy('id', 'desc')->get();

        // $pus = Puskesmas::with('distrik.stunting')->get();

        // return view('home.index',compact('datas','pus'));

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
                'no_hp' => 'required|unique:users,no_hp',
                'name' => 'required',
                'password'  => 'required|confirmed|min:8',
                'password_confirmation' => 'required_with:password|same:password|min:8'
            ],
            [
                'email.required' => 'Tidak boleh kosong',
                'email.unique' => 'Email sudah terdaftar',
                'no_hp.required' => 'Tidak boleh kosong',
                'email.unique' => 'No Hp sudah terdaftar',


                'name.required' => 'Tidak boleh kosong',
                'password.required' => 'Tidak boleh kosong',
                'password.confirmed' => 'Password tidak sama',
            ]
        );
        $data = new User();

        $data->email   = $request->email;
        $data->no_hp   = $request->no_hp;
        $data->password   = bcrypt($request->password);
        $data->name   = $request->name;
        $data->assignRole('pelapor');

        $data->save();
        alert()->success('Berhasil', 'Pendaftaran akun berhasil')->autoclose(3000);
        return redirect()->route('login');

    }
}
