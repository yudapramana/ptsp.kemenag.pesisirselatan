<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Helper;

class SyaratLayananController extends Controller
{
    public function syarat_layanan(Request $req)
    {
        session(['menu'=>'layanan','submenu'=>'syarat_layanan']);
        $id_data_layanan = Helper::decrypt($req->value);
        $datas = DB::table('syarat_layanan')
                 ->select('syarat_layanan.*','data_layanan.nama_layanan','unit_pengolah.nama_unit_pengolah')
                 ->leftJoin('data_layanan','data_layanan.id','=','syarat_layanan.id_data_layanan')
                 ->leftJoin('unit_pengolah','unit_pengolah.id','=','data_layanan.id_unit_pengolah')
                 ->whereRaw('syarat_layanan.id_data_layanan = ?',[(empty($req->value)?'':$id_data_layanan)])
                 ->paginate(10);

        return view('panel.syarat_layanan',compact('datas','id_data_layanan'));
    }

    public function syarat_layanan_submit(Request $req)
    {
        session(['menu'=>'layanan','submenu'=>'syarat_layanan']);
        $id_data_layanan = $req->id_data_layanan;
        $datas = DB::table('syarat_layanan')
                 ->select('syarat_layanan.*','data_layanan.nama_layanan','unit_pengolah.nama_unit_pengolah')
                 ->leftJoin('data_layanan','data_layanan.id','=','syarat_layanan.id_data_layanan')
                 ->leftJoin('unit_pengolah','unit_pengolah.id','=','data_layanan.id_unit_pengolah')
                 ->whereRaw('syarat_layanan.id_data_layanan = ? and (syarat_layanan.syarat like ? or data_layanan.nama_layanan like ? or unit_pengolah.nama_unit_pengolah like ?)',[$id_data_layanan, '%'.$req->cari.'%', '%'.$req->cari.'%', '%'.$req->cari.'%'])
                 ->paginate(10);
        $datas->appends(['cari'=>$req->cari]);

        return view('panel.syarat_layanan',compact('datas','id_data_layanan'));
    }

    public function syarat_layanan_tambah(Request $req)
    {
        session(['menu'=>'layanan','submenu'=>'syarat_layanan']);
        $id_data_layanan = Helper::decrypt($req->value);
        return view('panel.syarat_layanan_tambah',compact('id_data_layanan'));
    }

    public function syarat_layanan_tambah_submit(Request $req)
    {
        $this->validate($req,[
            "id_data_layanan" => "required",
            "syarat" => "required",
        ],[
            "id_data_layanan.required" => "Data layanan tidak boleh dikosongkan.",
            "required" => ":Attribute tidak boleh dikosongkan.",
        ]);

        $status = DB::table('syarat_layanan')
                  ->insert([
                    "id_data_layanan" => $req->id_data_layanan,
                    "syarat" => $req->syarat,
                    "created_at" => \Carbon\Carbon::now(),
                  ]);
        
        if ($status) {
            \Session::flash('pesan_berhasil','Berhasil menambahkan data');
        }else{
            \Session::flash('pesan_gagal','Gagal menambahkan data');
        }

        return redirect('syarat_layanan');
    }

    public function syarat_layanan_ubah(Request $req)
    {
        session(['menu'=>'layanan','submenu'=>'syarat_layanan']);
        $id_syarat_layanan = Helper::decrypt($req->value);
        $data = DB::table('syarat_layanan')
                ->where('id', $id_syarat_layanan)
                ->first();
                
        return view('panel.syarat_layanan_ubah',compact('data'));
    }

    public function syarat_layanan_ubah_submit(Request $req)
    {
        $this->validate($req,[
            "id_data_layanan" => "required",
            "syarat" => "required",
        ],[
            "id_data_layanan.required" => "Data layanan tidak boleh dikosongkan.",
            "required" => ":Attribute tidak boleh dikosongkan.",
        ]);

        $id_syarat_layanan = Helper::decrypt($req->value);
        $status = DB::table('syarat_layanan')
                  ->where('id', $id_syarat_layanan)
                  ->update([
                    "id_data_layanan" => $req->id_data_layanan,
                    "syarat" => $req->syarat,
                    "updated_at" => \Carbon\Carbon::now(),
                  ]);
        
        if ($status) {
            \Session::flash('pesan_berhasil','Berhasil mengubah data');
        }else{
            \Session::flash('pesan_gagal','Gagal mengubah data');
        }

        return redirect('syarat_layanan');
    }

    public function syarat_layanan_hapus(Request $req)
    {
        $id_syarat_layanan = Helper::decrypt($req->value);
        $status = DB::table('syarat_layanan')
                  ->where('id', $id_syarat_layanan)
                  ->delete();
        
        if ($status) {
            \Session::flash('pesan_berhasil','Berhasil menghapus data');
        }else{
            \Session::flash('pesan_gagal','Gagal menghapus data');
        }

        return redirect('syarat_layanan');
    }
}
