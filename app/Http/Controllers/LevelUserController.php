<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Helper;

class LevelUserController extends Controller
{
    public function level_user()
    {
      session(['menu' => 'user', 'submenu' => 'level_user']);

      if (auth()->user()->id_level == 1) {
        $data = DB::table('level_user')
                ->paginate(10);
      }else if(auth()->user()->id_level > 1 && auth()->user()->id_level <= 6){
        $data = DB::table('level_user')
                ->where('id','<>',1)
                ->where('id_unit',Helper::get_id_unit(auth()->user()->id_level))
                ->paginate(10);
      }

      return view('panel.level_user',[
        'datas' => $data
      ]);
    }

    public function level_user_submit(Request $req)
    {
      session(['menu' => 'user', 'submenu' => 'level_user']);

      if (auth()->user()->id_level == 1) {
        $data = DB::table('level_user')
                ->whereRaw('level_user.level like ?',['%'.$req->cari.'%'])
                ->paginate(10);

        $data->appends(['cari'=>$req->cari]);
      }else if(auth()->user()->id_level > 1 && auth()->user()->id_level <= 6){
        $data = DB::table('level_user')
                ->where('id','<>',1)
                ->where('id_unit',Helper::get_id_unit(auth()->user()->id_level))
                ->whereRaw('level_user.level like ?',['%'.$req->cari.'%'])
                ->paginate(10);

        $data->appends(['cari'=>$req->cari]);
      }

      return view('panel.level_user',[
        'cari' => true,
        'datas' => $data
      ]);
    }

    public function level_user_tambah()
    {
      session(['menu' => 'user', 'submenu' => 'level_user']);

      $data = DB::table('modul')
            ->orderBy('nama_menu')
            ->get();

      return view('panel.level_user_tambah',[
        'datas' => $data
      ]);
    }

    public function level_user_tambah_submit(Request $req)
    {
      $this->validate($req,[
        'level' => 'required'
      ]);

      $counter = 0;

      $id_level = DB::table('level_user')
                  ->insertGetId([
                    'level' => $req->level,
                    'id_unit' => Helper::get_id_unit(auth()->user()->id_level),
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now(),
                  ]);
      for ($i=0; $i < count($req->id_modul); $i++) {
        $stat = DB::table('level_akses')
                ->insert([
                  'id_level' => $id_level,
                  'id_modul' => $req->id_modul[$i],
                  'l' => isset($req["l".$i])?$req["l".$i]:false,
                  'd' => isset($req["d".$i])?$req["d".$i]:false,
                  't' => isset($req["t".$i])?$req["t".$i]:false,
                  'u' => isset($req["u".$i])?$req["u".$i]:false,
                  'h' => isset($req["h".$i])?$req["h".$i]:false,
                ]);

        if (!$stat) {
          $counter += 1;
        }
      }

      if ($counter == 0) {
        \Session::flash('pesan_berhasil','Berhasil menambahkan data');
      }else {
        \Session::flash('pesan_gagal','Gagal menambahkan data');
      }

      return redirect('level_user');
    }

    public function level_user_ubah(Request $req)
    {
      session(['menu' => 'user', 'submenu' => 'level_user']);
      $id = Helper::decrypt($req->value);
      $data = DB::table('level_user')
              ->where('id',$id)
              ->first();

      $level = DB::table('level_akses')
               ->select('level_akses.*','modul.nama_menu')
               ->where('id_level',$id)
               ->leftJoin('modul','modul.id','=','level_akses.id_modul')
               ->orderBy('nama_menu')
               ->get();
               // dd($level);

      return view('panel.level_user_ubah',[
        'data' => $data,
        'levels' => $level
      ]);
    }

    public function level_user_ubah_submit(Request $req)
    {
      $this->validate($req,[
        'level' => 'required'
      ]);

      $counter = 0;
      $id = Helper::decrypt($req->value);

      $stat = DB::table('level_user')
              ->where('id',$id)
              ->update([
                'level' => $req->level,
                'updated_at' => \Carbon\Carbon::now(),
              ]);

      $stat = DB::table('level_akses')
              ->where('id_level', $id)
              ->delete();

      for ($i=0; $i < count($req->id_modul); $i++) {
        $stat = DB::table('level_akses')
                ->insert([
                  'id_level' => $id,
                  'id_modul' => $req->id_modul[$i],
                  'l' => isset($req["l".$i])?$req["l".$i]:false,
                  'd' => isset($req["d".$i])?$req["d".$i]:false,
                  't' => isset($req["t".$i])?$req["t".$i]:false,
                  'u' => isset($req["u".$i])?$req["u".$i]:false,
                  'h' => isset($req["h".$i])?$req["h".$i]:false,
                ]);

        if (!$stat) {
          $counter += 1;
        }
      }

      if ($counter == 0) {
        \Session::flash('pesan_berhasil','Berhasil mengubah data');
      }else {
        \Session::flash('pesan_gagal','Gagal mengubah data');
      }

      return redirect('level_user');
    }

    public function level_user_hapus(Request $req)
    {
      $id = Helper::decrypt($req->value);

      $stat = DB::table('level_user')
              ->where('id',$id)
              ->delete();

      if ($stat) {
        \Session::flash('pesan_berhasil','Berhasil menghapus data');
      }else {
        \Session::flash('pesan_gagal','Gagal menghapus data');
      }

      return redirect('level_user');
    }
}
