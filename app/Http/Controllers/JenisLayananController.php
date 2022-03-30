<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Helper;

class JenisLayananController extends Controller
{
    public function jenis_layanan()
    {
        session(['menu'=>'layanan','submenu'=>'jenis_layanan']);
        $datas = DB::table('jenis_layanan')
                 ->paginate(10);
        return view('panel.jenis_layanan',compact('datas'));
    }

    public function jenis_layanan_submit(Request $req)
    {
        session(['menu'=>'layanan','submenu'=>'jenis_layanan']);
        $datas = DB::table('jenis_layanan')
                 ->where('jenis_layanan','like','%'.$req->cari.'%')
                 ->paginate(10);
                 
        $datas->appends(['cari'=>$req->cari]);
        $cari = true;
        return view('panel.jenis_layanan',compact('datas','cari'));
    }

    public function jenis_layanan_tambah(Request $req)
    {
        session(['menu'=>'layanan','submenu'=>'jenis_layanan']);
        return view('panel.jenis_layanan_tambah');
    }

    public function jenis_layanan_tambah_submit(Request $req)
    {
        $this->validate($req,[
            'jenis_layanan' => 'required',
        ],[
            'jenis_layanan.required' => 'Jenis Layanan tidak boleh dikosongkan.'
        ]);

        $status = DB::table('jenis_layanan')
                  ->insert([
                    'jenis_layanan' => $req->jenis_layanan,
                    'created_at' => \Carbon\Carbon::now()
                  ]);

        if ($status) {
            \Session::flash('pesan_berhasil','Berhasil menambahkan data');
        }else{
            \Session::flash('pesan_gagal','Gagal menambahkan data');
        }

        return redirect('jenis_layanan');
    }

    public function jenis_layanan_ubah(Request $req)
    {
        session(['menu'=>'layanan','submenu'=>'jenis_layanan']);
        $id_jenis_layanan = Helper::decrypt($req->value);
        $data = DB::table('jenis_layanan')
                ->where('id',$id_jenis_layanan)
                ->first();

        return view('panel.jenis_layanan_ubah',compact('data'));
    }

    public function jenis_layanan_ubah_submit(Request $req)
    {
        $this->validate($req,[
            'jenis_layanan' => 'required',
        ],[
            'jenis_layanan.required' => 'Jenis Layanan tidak boleh dikosongkan.'
        ]);

        $id_jenis_layanan = Helper::decrypt($req->value);
        $status = DB::table('jenis_layanan')
                  ->where('id',$id_jenis_layanan)
                  ->update([
                    'jenis_layanan' => $req->jenis_layanan,
                    'updated_at' => \Carbon\Carbon::now()
                  ]);

        if ($status) {
            \Session::flash('pesan_berhasil','Berhasil mengubah data');
        }else{
            \Session::flash('pesan_gagal','Gagal mengubah data');
        }

        return redirect('jenis_layanan');
    }

    public function jenis_layanan_hapus(Request $req)
    {
        $id_jenis_layanan = Helper::decrypt($req->value);
        $status = DB::table('jenis_layanan')
                  ->where('id',$id_jenis_layanan)
                  ->delete();

        if ($status) {
            \Session::flash('pesan_berhasil','Berhasil menghapus data');
        }else{
            \Session::flash('pesan_gagal','Gagal menghapus data');
        }

        return redirect('jenis_layanan');
    }
}
