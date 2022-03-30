<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Helper;

class UnitPengolahController extends Controller
{
    public function unit_pengolah()
    {
        session(['menu'=>'unit_pengolah','submenu'=>'']);
        $datas = DB::table('unit_pengolah')
                 ->paginate(10);

        return view('panel.unit_pengolah',compact('datas'));
    }

    public function unit_pengolah_submit(Request $req)
    {
        session(['menu'=>'unit_pengolah','submenu'=>'']);
        $datas = DB::table('unit_pengolah')
                 ->where('nama_unit_pengolah','like','%'.$req->cari.'%')
                 ->paginate(10);
        $datas->appends(['cari'=>$req->cari]);
        $cari = true;

        return view('panel.unit_pengolah',compact('datas','cari'));
    }

    public function unit_pengolah_detail(Request $req)
    {
        $id_unit_pengolah = Helper::decrypt($req->value);   
        return redirect('data_layanan/detail/'.Helper::encrypt($id_unit_pengolah));
    }

    public function unit_pengolah_tambah(Request $req)
    {
        session(['menu'=>'unit_pengolah','submenu'=>'']);
        return view('panel.unit_pengolah_tambah');
    }

    public function unit_pengolah_tambah_submit(Request $req)
    {
        $this->validate($req,[
            'nama_unit_pengolah' => 'required'
        ],[
            'nama_unit_pengolah.required' => 'Nama Unit Pengelola tidak boleh dikosaongkan.'
        ]);

        $status = DB::table('unit_pengolah')
                  ->insert([
                      'nama_unit_pengolah' => $req->nama_unit_pengolah,
                      'created_at' => \Carbon\Carbon::now()
                  ]);

        if ($status) {
            \Session::flash('pesan_berhasil','Berhasil menambahkan data');
        }else{
            \Session::flash('pesan_gagal','Gagal menambahkan data');
        }

        return redirect('unit_pengolah');
    }

    public function unit_pengolah_ubah(Request $req)
    {
        session(['menu'=>'unit_pengolah','submenu'=>'']);
        $id_unit_pengolah = Helper::decrypt($req->value);
        $data = DB::table('unit_pengolah')
                ->where('id',$id_unit_pengolah)
                ->first();

        return view('panel.unit_pengolah_ubah',compact('data'));
    }

    public function unit_pengolah_ubah_submit(Request $req)
    {
        $this->validate($req,[
            'nama_unit_pengolah' => 'required'
        ],[
            'nama_unit_pengolah.required' => 'Nama Unit Pengelola tidak boleh dikosaongkan.'
        ]);
        
        $id_unit_pengolah = Helper::decrypt($req->value);
        $status = DB::table('unit_pengolah')
                  ->where('id',$id_unit_pengolah)
                  ->update([
                      'nama_unit_pengolah' => $req->nama_unit_pengolah,
                      'updated_at' => \Carbon\Carbon::now()
                  ]);

        if ($status) {
            \Session::flash('pesan_berhasil','Berhasil mengubah data');
        }else{
            \Session::flash('pesan_gagal','Gagal mengubah data');
        }

        return redirect('unit_pengolah');
    }

    public function unit_pengolah_hapus(Request $req)
    {
        $id_unit_pengolah = Helper::decrypt($req->value);
        $status = DB::table('unit_pengolah')
                  ->where('id',$id_unit_pengolah)
                  ->delete();

        if ($status) {
            \Session::flash('pesan_berhasil','Berhasil menghapus data');
        }else{
            \Session::flash('pesan_gagal','Gagal menghapus data');
        }

        return redirect('unit_pengolah');
    }
}
