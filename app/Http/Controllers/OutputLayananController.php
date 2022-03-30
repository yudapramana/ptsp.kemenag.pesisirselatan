<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Helper;

class OutputLayananController extends Controller
{
    public function output_layanan()
    {
        session(['menu'=>'layanan','submenu'=>'output_layanan']);
        $datas = DB::table('output')
                 ->paginate(10);

        return view('panel.output_layanan',compact('datas'));
    }

    public function output_layanan_submit(Request $req)
    {
        session(['menu'=>'layanan','submenu'=>'output_layanan']);
        $datas = DB::table('output')
                 ->where('output','like','%'.$req->cari.'%')
                 ->paginate(10);
        $datas->appends(['cari'=>$req->cari]);
        $cari = true;

        return view('panel.output_layanan',compact('datas','cari'));
    }

    public function output_layanan_detail(Request $req)
    {
        $id_output_layanan = Helper::decrypt($req->value);   
        return redirect('data_layanan/detail/'.Helper::encrypt($id_output_layanan));
    }

    public function output_layanan_tambah(Request $req)
    {
        session(['menu'=>'layanan','submenu'=>'output_layanan']);
        return view('panel.output_layanan_tambah');
    }

    public function output_layanan_tambah_submit(Request $req)
    {
        $this->validate($req,[
            'output' => 'required'
        ],[
            'output.required' => 'Output tidak boleh dikosaongkan.'
        ]);

        $status = DB::table('output')
                  ->insert([
                      'output' => $req->output,
                      'created_at' => \Carbon\Carbon::now()
                  ]);

        if ($status) {
            \Session::flash('pesan_berhasil','Berhasil menambahkan data');
        }else{
            \Session::flash('pesan_gagal','Gagal menambahkan data');
        }

        return redirect('output_layanan');
    }

    public function output_layanan_ubah(Request $req)
    {
        session(['menu'=>'layanan','submenu'=>'output_layanan']);
        $id_output_layanan = Helper::decrypt($req->value);
        $data = DB::table('output')
                ->where('id',$id_output_layanan)
                ->first();

        return view('panel.output_layanan_ubah',compact('data'));
    }

    public function output_layanan_ubah_submit(Request $req)
    {
        $this->validate($req,[
            'output' => 'required'
        ],[
            'output.required' => 'Output tidak boleh dikosaongkan.'
        ]);
        
        $id_output_layanan = Helper::decrypt($req->value);
        $status = DB::table('output')
                  ->where('id',$id_output_layanan)
                  ->update([
                      'output' => $req->output,
                      'updated_at' => \Carbon\Carbon::now()
                  ]);

        if ($status) {
            \Session::flash('pesan_berhasil','Berhasil mengubah data');
        }else{
            \Session::flash('pesan_gagal','Gagal mengubah data');
        }

        return redirect('output_layanan');
    }

    public function output_layanan_hapus(Request $req)
    {
        $id_output_layanan = Helper::decrypt($req->value);
        $status = DB::table('output')
                  ->where('id',$id_output_layanan)
                  ->delete();

        if ($status) {
            \Session::flash('pesan_berhasil','Berhasil menghapus data');
        }else{
            \Session::flash('pesan_gagal','Gagal menghapus data');
        }

        return redirect('output_layanan');
    }
}
