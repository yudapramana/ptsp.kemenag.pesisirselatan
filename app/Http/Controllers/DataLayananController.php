<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Helper;

class DataLayananController extends Controller
{
	public function data_layanan(Request $req)
    {
        session(['menu'=>'layanan','submenu'=>'data_layanan']);
        $id_unit_pengolah = Helper::decrypt($req->value);
        $datas = DB::table('data_layanan')
                 ->select('data_layanan.*','jenis_layanan.jenis_layanan','output.output','unit_pengolah.nama_unit_pengolah')
                 ->leftJoin('unit_pengolah','unit_pengolah.id','=','data_layanan.id_unit_pengolah')
                 ->leftJoin('jenis_layanan','jenis_layanan.id','=','data_layanan.id_jenis_layanan')
                 ->leftJoin('output','output.id','=','data_layanan.id_output')
                 ->whereRaw('data_layanan.id_unit_pengolah = ?',[(empty($req->value)?'':$id_unit_pengolah)])
                 ->paginate(10);

        return view('panel.data_layanan',compact('datas','id_unit_pengolah'));
    }

    public function data_layanan_submit(Request $req)
    {
        session(['menu'=>'layanan','submenu'=>'data_layanan']);
        $id_unit_pengolah = $req->id_unit_pengolah;
        $datas = DB::table('data_layanan')
                 ->select('data_layanan.*','jenis_layanan.jenis_layanan','output.output','unit_pengolah.nama_unit_pengolah')
                 ->leftJoin('unit_pengolah','unit_pengolah.id','=','data_layanan.id_unit_pengolah')
                 ->leftJoin('jenis_layanan','jenis_layanan.id','=','data_layanan.id_jenis_layanan')
                 ->leftJoin('output','output.id','=','data_layanan.id_output')
                 ->whereRaw('data_layanan.id_unit_pengolah = ? and (data_layanan.nama_layanan like ? or unit_pengolah.nama_unit_pengolah like ? or jenis_layanan.jenis_layanan like ? or output.output like ?)',[$id_unit_pengolah, '%'.$req->cari.'%', '%'.$req->cari.'%', '%'.$req->cari.'%', '%'.$req->cari.'%'])
                 ->paginate(10);
        $datas->appends(['cari'=>$req->cari]);
        $cari = true;

        return view('panel.data_layanan',compact('datas','cari','id_unit_pengolah'));
    }

    public function data_layanan_tambah(Request $req)
    {
        session(['menu'=>'layanan','submenu'=>'data_layanan']);
        $id_unit_pengolah = Helper::decrypt($req->value);
        return view('panel.data_layanan_tambah',compact('id_unit_pengolah'));
    }

    public function data_layanan_tambah_submit(Request $req)
    {
        // dd($req);
        $this->validate($req,[
            "id_unit_pengolah" => "required",
            "id_jenis_layanan" => "required",
            "id_output" => "required",
            "nama_layanan" => "required",
            "lama_layanan" => "required|numeric",
            "biaya" => "required|numeric",
        ],[
            "id_unit_pengolah.required" => "Unit Pengolah tidak boleh dikosongkan.",
            "id_jenis_layanan.required" => "Jenis Layanan tidak boleh dikosongkan.",
            "id_output.required" => "Output tidak boleh dikosongkan.",
            "required" => ":Attribute tidak boleh dikosongkan.",
            "numeric" => ":Attribute harus berupa number.",
        ]);

        $status = DB::table('data_layanan')
                  ->insert([
                    "id_unit_pengolah" => $req->id_unit_pengolah,
                    "id_jenis_layanan" => $req->id_jenis_layanan,
                    "id_output" => $req->id_output,
                    "nama_layanan" => $req->nama_layanan,
                    "lama_layanan" => $req->lama_layanan,
                    "biaya" => $req->biaya,
                    "created_at" => \Carbon\Carbon::now(),
                  ]);

        if ($status) {
            \Session::flash('pesan_berhasil','Berhasil menambahkan data');
        }else{
            \Session::flash('pesan_gagal','Gagal menambahkan data');
        }

        return redirect('data_layanan');
    }

    public function data_layanan_ubah(Request $req)
    {
        session(['menu'=>'layanan','submenu'=>'data_layanan']);
        $id_data_layanan = Helper::decrypt($req->value);
        $data = DB::table('data_layanan')
                ->where('id',$id_data_layanan)
                ->first();
        return view('panel.data_layanan_ubah',compact('data'));
    }

    public function data_layanan_ubah_submit(Request $req)
    {
        $this->validate($req,[
            "id_unit_pengolah" => "required",
            "id_jenis_layanan" => "required",
            "id_output" => "required",
            "nama_layanan" => "required",
            "lama_layanan" => "required|numeric",
            "biaya" => "required|numeric",
        ],[
            "id_unit_pengolah.required" => "Unit Pengolah tidak boleh dikosongkan.",
            "id_jenis_layanan.required" => "Jenis Layanan tidak boleh dikosongkan.",
            "id_output.required" => "Output tidak boleh dikosongkan.",
            "required" => ":Attribute tidak boleh dikosongkan.",
            "numeric" => ":Attribute harus berupa number.",
        ]);
        
        $id_data_layanan = Helper::decrypt($req->value);
        $status = DB::table('data_layanan')
                  ->where('id',$id_data_layanan)
                  ->update([
                    "id_unit_pengolah" => $req->id_unit_pengolah,
                    "id_jenis_layanan" => $req->id_jenis_layanan,
                    "id_output" => $req->id_output,
                    "nama_layanan" => $req->nama_layanan,
                    "lama_layanan" => $req->lama_layanan,
                    "biaya" => $req->biaya,
                    "updated_at" => \Carbon\Carbon::now(),
                  ]);

        if ($status) {
            \Session::flash('pesan_berhasil','Berhasil mengubah data');
        }else{
            \Session::flash('pesan_gagal','Gagal mengubah data');
        }

        return redirect('data_layanan');
    }

    public function data_layanan_hapus(Request $req)
    {
        $id_data_layanan = Helper::decrypt($req->value);
        $status = DB::table('data_layanan')
                  ->where('id',$id_data_layanan)
                  ->delete();

        if ($status) {
            \Session::flash('pesan_berhasil','Berhasil menghapus data');
        }else{
            \Session::flash('pesan_gagal','Gagal menghapus data');
        }

        return redirect('data_layanan');
    }
}
