<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use User;
use DB;
use Hash;
use View;
use Auth;
use Crypt;
use Helper;

class AuthController extends Controller
{
    public function login()
    {
      return view('auth.login');
    }

    public function login_submit(Request $req)
    {
      $this->validate($req,[
        'username'=>'required',
        'password'=>'required',
      ],[
        'required'=>':Attribute tidak boleh kosong.'
      ]);

      if (Auth::attempt(['username'=>$req->username,'password'=>$req->password])) {
        return redirect('dashboard');
      }else {
        \Session::flash('pesan_gagal','Maaf username dan password tidak terdaftar.');
        return redirect('login');
      }
    }

    public function register()
    {
      return view('auth.register');
    }

    public function register_submit(Request $req)
    {
      $this->validate($req,[
        "wilayah" => "required",
        "nama" => "required",
        "jk" => "required",
        "agama" => "required",
        "tmpat_lahir" => "required",
        "tgl_lahir" => "required",
        "no_telp" => "required|numeric|digits_between:9,15",
        "id_prov" => "required",
        "id_kab" => "required",
        "id_kec" => "required",
        "id_kel" => "required",
        "alamat" => "required",
        "email" => "required|email|unique:users",
        "username" => "required|alpha_dash|unique:users",
        "password" => "required|min:6|confirmed",
      ],[
        "required" => ":Attribute tidak boleh dikosongkan.",
        "numeric" => ":Attribute harus berupa angka.",
        "digits_between" => ":Attribute harus terdiri dari 9-15 digit.",
        "min" => ":Attribute harus terdiri minimal 6 digit.",
        "email" => ":Attribute tidak benar.",
        "unique" => ":Attribute sudah digunakan.",
        "confirmed" => "Konfirmasi :attribute tidak sesuai.",
        "alpha_dash" => ":Attribute tidak boleh menggunakan spasi dan simbol lainnya.",
      ]);

      $id_user = DB::table('users')
                 ->insertGetId([
                    "id_level" => 4,
                    "wilayah" => $req->wilayah,
                    "nama" => ucwords($req->nama),
                    "email" => $req->email,
                    "username" => $req->username,
                    "password" => bcrypt($req->password),
                    "t_pwd" => Crypt::encrypt($req->password),
                    "created_at" => \Carbon\Carbon::now(),
                    "updated_at" => \Carbon\Carbon::now(),
                 ]);

      $stat = DB::table("siswa")
              ->insert([
                "id_user" => $id_user,
                "jk" => $req->jk,
                "agama" => $req->agama,
                "tmpat_lahir" => $req->tmpat_lahir,
                "tgl_lahir" => Helper::date_to_db($req->tgl_lahir),
                "no_telp" => $req->no_telp,
                "id_prov" => $req->id_prov,
                "id_kab" => $req->id_kab,
                "id_kec" => $req->id_kec,
                "id_kel" => $req->id_kel,
                "alamat" => $req->alamat,
                "created_at" => \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now(),
              ]);

      if ($stat) {
        \Session::flash('pesan_berhasil','Berhasil mendaftarkan akun, silahkan login untuk mengupload bukti pembayaran');
      }else {
        \Session::flash('pesan_gagal','Gagal mendaftarkan akun, silahkan coba lagi atau kontak Administrator');
      }

      return redirect('login');
    }

    public function logout()
    {
      Auth::logout();
      session()->forget('menu');
      session()->forget('submenu');
      return redirect('login');
    }
}
