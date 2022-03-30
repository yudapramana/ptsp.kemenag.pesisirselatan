<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Helper;
use Crypt;

class DataUserController extends Controller
{
  public function data_user()
  {
    session(['menu'=>'user','submenu'=>'data_user']);

    if (auth()->user()->id_level == 1) {
      $data = DB::table('users')
              ->select('users.*','level_user.level')
              ->leftJoin('level_user','level_user.id','=','users.id_level')
              ->paginate(10);
    }else if(auth()->user()->id_level >1 && auth()->user()->id_level <= 6){
      $data = DB::table('users')
              ->select('users.*','level_user.level')
              ->leftJoin('level_user','level_user.id','=','users.id_level')
              ->where('id_unit',Helper::get_id_unit(auth()->user()->id_level))
              ->paginate(10);
    }else{
      $data = DB::table('users')
              ->select('users.*','level_user.level')
              ->leftJoin('level_user','level_user.id','=','users.id_level')
              ->where('id',Helper::get_id_unit(auth()->user()->id))
              ->paginate(10);
    }

    return view('panel.data_user',[
      'datas' => $data
    ]);
  }

  public function data_user_submit(Request $req)
  {
    session(['menu'=>'user','submenu'=>'data_user']);

    if (auth()->user()->id_level == 1) {
      $data = DB::table('users')
              ->select('users.*','level_user.level')
              ->leftJoin('level_user','level_user.id','=','users.id_level')
              ->whereRaw('(nama like ? or level like ? or email like ? or username like ?)',[
                '%'.$req->cari.'%','%'.$req->cari.'%','%'.$req->cari.'%','%'.$req->cari.'%'
              ])
              ->paginate(10);
      $data->appends(['cari'=>$req->cari]);
    }else if(auth()->user()->id_level >1 && auth()->user()->id_level <= 6){
      $data = DB::table('users')
              ->select('users.*','level_user.level')
              ->leftJoin('level_user','level_user.id','=','users.id_level')
              ->where('id_unit',Helper::get_id_unit(auth()->user()->id_level))
              ->whereRaw('(nama like ? or level like ? or email like ? or username like ?)',[
                '%'.$req->cari.'%','%'.$req->cari.'%','%'.$req->cari.'%','%'.$req->cari.'%'
              ])
              ->paginate(10);
      $data->appends(['cari'=>$req->cari]);
    }else{
      $data = DB::table('users')
              ->select('users.*','level_user.level')
              ->leftJoin('level_user','level_user.id','=','users.id_level')
              ->where('id',Helper::get_id_unit(auth()->user()->id))
              ->whereRaw('(nama like ? or level like ? or email like ? or username like ?)',[
                '%'.$req->cari.'%','%'.$req->cari.'%','%'.$req->cari.'%','%'.$req->cari.'%'
              ])
              ->paginate(10);
      $data->appends(['cari'=>$req->cari]);
    }

    return view('panel.data_user',[
      'cari' => true,
      'datas' => $data
    ]);
  }

  public function data_user_tambah()
  {
    session(['menu'=>'user','submenu'=>'data_user']);

    return view('panel.data_user_tambah',[
      'levels' => Helper::get_level()
    ]);
  }

  public function data_user_tambah_submit(Request $req)
  {
    // dd($req);
    $this->validate($req, [
      "nama" => "required",
      "email" => "required|email|unique:users",
      "id_level" => "required",
      "username" => "required|alpha_dash|unique:users",
      "password" => "required|min:6",
    ],[
      "required" => ":Attribute tidak boleh dikosongkan.",
      "email" => "Format :attribute tidak benar.",
      "unique" => ":Attribute sudah digunakan oleh user lain.",
      "min" => ":Attribute haru terdiri dari :min karakter.",
      "alpha_dash" => ":Attribute tidak boleh menggunakan spasi dan simbol lainnya.",
    ]);

    $stat = DB::table('users')
            ->insert([
              "nama" => ucwords($req->nama),
              "email" => $req->email,
              "id_level" => $req->id_level,
              "username" => $req->username,
              "password" => bcrypt($req->password),
              "t_pwd" => Crypt::encryptString($req->password),
              "created_at" => \Carbon\Carbon::now(),
              "updated_at" => \Carbon\Carbon::now(),
            ]);

    if ($stat) {
      \Session::flash('pesan_berhasil','Berhasil menambahkan data.');
    }else {
      \Session::flash('pesan_gagal','Gagal menambahkan data.');
    }

    return redirect('data_user');
  }

  public function data_user_ubah(Request $req)
  {
    session(['menu'=>'user','submenu'=>'data_user']);

    $id = Helper::decrypt($req->value);
    $data = DB::table('users')
            ->where('id',$id)
            ->first();

    return view('panel.data_user_ubah',[
      'levels' => Helper::get_level(),
      'data' => $data
    ]);
  }

  public function data_user_ubah_submit(Request $req)
  {
    $id = Helper::decrypt($req->value);
    $this->validate($req, [
      "nama" => "required",
      "email" => "required|email|unique:users,email,".$id,
      "id_level" => "required",
      "username" => "required|alpha_dash|unique:users,username,".$id,
      "password" => "nullable|min:6",
    ],[
      "required" => ":Attribute tidak boleh dikosongkan.",
      "email" => "Format :attribute tidak benar.",
      "unique" => ":Attribute sudah digunakan oleh user lain.",
      "min" => ":Attribute haru terdiri dari :min karakter.",
      "alpha_dash" => ":Attribute tidak boleh menggunakan spasi dan simbol lainnya.",
    ]);

    if (!empty($req->password)) {
      $stat = DB::table('users')
              ->where('id',$id)
              ->update([
                "nama" => ucwords($req->nama),
                "email" => $req->email,
                "id_level" => $req->id_level,
                "username" => $req->username,
                "password" => bcrypt($req->password),
                "t_pwd" => Crypt::encryptString($req->password),
                "updated_at" => \Carbon\Carbon::now(),
              ]);
    }else {
      $stat = DB::table('users')
              ->where('id',$id)
              ->update([
                "nama" => ucwords($req->nama),
                "email" => $req->email,
                "id_level" => $req->id_level,
                "username" => $req->username,
                "updated_at" => \Carbon\Carbon::now(),
              ]);
    }

    if ($stat) {
      \Session::flash('pesan_berhasil','Berhasil mengubah data.');
    }else {
      \Session::flash('pesan_gagal','Gagal mengubah data.');
    }

    return redirect('data_user');
  }

  public function data_user_hapus(Request $req)
  {
      $id = Helper::decrypt($req->value);
      $stat = DB::table('users')
              ->where('id',$id)
              ->delete();

      if ($stat) {
        \Session::flash('pesan_berhasil','Berhasil menghapus data.');
      }else {
        \Session::flash('pesan_gagal','Gagal menghapus data.');
      }

      return redirect('data_user');
  }
}
