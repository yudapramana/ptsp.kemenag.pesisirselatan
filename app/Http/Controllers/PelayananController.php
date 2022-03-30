<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App;
use File;
use Helper;

class PelayananController extends Controller
{
    public function pelayanan()
    {
        session(['menu'=>'pelayanan','submenu'=>'']);

        if(auth()->user()->id_level == 1){
            $datas = DB::table('pelayanan')
                     ->select('pelayanan.*','data_layanan.nama_layanan')
                     ->leftJoin('data_layanan','data_layanan.id','=','pelayanan.id_data_layanan')
                     ->paginate(10);
        }else{
            $datas = DB::table('pelayanan')
                     ->select('pelayanan.*','data_layanan.nama_layanan')
                     ->leftJoin('data_layanan','data_layanan.id','=','pelayanan.id_data_layanan')
                     ->where('pelayanan.id_unit',Helper::get_id_unit(auth()->user()->id_level))
                     ->paginate(10);
        }

        return view('panel.pelayanan',compact('datas'));
    }

    public function pelayanan_submit(Request $req)
    {
        if(auth()->user()->id_level == 1){
            $datas = DB::table('pelayanan')
                     ->select('pelayanan.*','data_layanan.nama_layanan')
                     ->leftJoin('data_layanan','data_layanan.id','=','pelayanan.id_data_layanan')
                     ->whereRaw('(no_registrasi like ? or data_layanan.nama_layanan like ? or kelengkapan like ? or status_layanan like ?)',[
                         '%'.$req->cari.'%','%'.$req->cari.'%','%'.$req->cari.'%','%'.$req->cari.'%'
                     ])
                     ->paginate(10);
            $datas->appends(['cari'=>$req->cari]);
        }else{
            $datas = DB::table('pelayanan')
                     ->select('pelayanan.*','data_layanan.nama_layanan')
                     ->leftJoin('data_layanan','data_layanan.id','=','pelayanan.id_data_layanan')
                     ->where('pelayanan.id_unit',Helper::get_id_unit(auth()->user()->id_level))
                     ->whereRaw('(no_registrasi like ? or data_layanan.nama_layanan like ? or kelengkapan_syarat like ? or status_layanan like ?)',[
                         '%'.$req->cari.'%','%'.$req->cari.'%','%'.$req->cari.'%','%'.$req->cari.'%'
                     ])
                     ->paginate(10);
            $datas->appends(['cari'=>$req->cari]);
        }
        $cari = true;

        return view('panel.pelayanan',compact('datas','cari'));
    }

    public function pelayanan_detail(Request $req)
    {
        session(['menu'=>'pelayanan','submenu'=>'']);
        $id_pelayanan = Helper::decrypt($req->value);
        $data = DB::table('view_pelayanan')
                ->where('id',$id_pelayanan)
                ->first();

        return view('panel.pelayanan_detail',compact('data'));
    }
    
    public function pelayanan_cetak(Request $req)
    {
        session(['menu'=>'pelayanan','submenu'=>'']);
        $id_pelayanan = Helper::decrypt($req->value);
        $data = DB::table('view_pelayanan')
                ->where('id',$id_pelayanan)
                ->first();
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML(view('cetak.pelayanan_detail',compact('data')))->setPaper('a4', 'portrait');
        return $pdf->stream();
    }

    public function pelayanan_tambah(Request $req)
    {
        session(['menu'=>'pelayanan','submenu'=>'']);
        return view('panel.pelayanan_tambah');
    }

    public function pelayanan_tambah_submit(Request $req)
    {
        $this->validate($req,[
            "id_data_layanan" => "required",
            "perihal" => "required",
            "no_surat_pemohon" => "required",
            "tgl_surat_pemohon" => "required|date",
            "nama_pemohon" => "required",
            "alamat_pemohon" => "required",
            "nama_pengirim" => "required",
            "no_telp_pemohon" => "required",
        ],[
            "id_data_layanan.required" => "Nama layanan tidak boleh dikosongkan.",
            "required" => ":Attribute tidak boleh dikosongkan.",
            "date" => ":Attribute tidak sesuai dengan format.",
        ]);

        $data_layanan = DB::table('data_layanan')
                        ->where('id',$req->id_data_layanan)
                        ->first();

        $waktu_sekarang = \Carbon\Carbon::now();
        $waktu_selesai = $waktu_sekarang->addDays($data_layanan->lama_layanan);
        $path = public_path()."/berkas";   
        if(!File::isDirectory($path)) {
            File::makeDirectory($path, 0777, true, true);
        }
        $tgl_pengambilan = '2000-01-01';
        if ($req->status_layanan == "Diambil") {
            $tgl_pengambilan = date('Y-m-d');
        }

        $id_pelayanan = DB::table('pelayanan')
                        ->insertGetId([
                            "id_data_layanan" => $req->id_data_layanan,
                            "id_unit" => Helper::get_id_unit(auth()->user()->id_level),
                            "perihal" => $req->perihal,
                            "no_surat_pemohon" => $req->no_surat_pemohon,
                            "tgl_surat_pemohon" => Helper::date_to_db($req->tgl_surat_pemohon),
                            "tgl_terima" => \Carbon\Carbon::now(),
                            "tgl_selesai" => $waktu_selesai,
                            "nama_pemohon" => $req->nama_pemohon,
                            "alamat_pemohon" => $req->alamat_pemohon,
                            "nama_pengirim" => $req->nama_pengirim,
                            "no_telp_pemohon" => $req->no_telp_pemohon,
                            "kelengkapan_syarat" => $req->kelengkapan_syarat,
                            "status_layanan" => $req->status_layanan,
                            "catatan" => $req->catatan,
                            "no_surat_terbit" => $req->no_surat_terbit,
                            "tgl_surat_terbit" => (empty($req->tgl_surat_terbit)?'2000-01-01':Helper::date_to_db($req->tgl_surat_terbit)),
                            "tgl_pengambilan" => $tgl_pengambilan,
                            "nama_pengambil" => $req->nama_pengambil,
                            "created_at" => \Carbon\Carbon::now(),
                        ]);
        
        $status = DB::table('pelayanan')
                 ->where('id',$id_pelayanan)
                 ->update([
                    "no_registrasi" => "CS".date('dmy').sprintf('%04d',$id_pelayanan)
                 ]);

        for ($i=0; $i < count($req->id_syarat_layanan); $i++) { 
            if (isset($req->file('lampiran')[$i])) {
                $file = $req->file('lampiran')[$i];
                $fileName = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();

                $nama_lampiran = "lampiran_".strtotime(date('d-m-Y h:i:s'))."_".$i.".".$extension;
                $file->move($path,$nama_lampiran);
            }else {
                $nama_lampiran = "";
            }

            DB::table('data_syarat')
            ->insert([
                "id_pelayanan" => $id_pelayanan,
                "id_syarat_layanan" => $req->id_syarat_layanan[$i],
                "lampiran" => $nama_lampiran,
                "created_at" => \Carbon\Carbon::now(),
            ]);
        }

        return redirect('pelayanan/detail/'.Helper::encrypt($id_pelayanan));
    }

    public function pelayanan_ubah(Request $req)
    {
        session(['menu'=>'pelayanan','submenu'=>'']);
        $id_pelayanan = Helper::decrypt($req->value);
        $data = DB::table('pelayanan')
                ->where('id',$id_pelayanan)
                ->first();
                          
        return view('panel.pelayanan_ubah',compact('data'));
    }

    public function pelayanan_ubah_submit(Request $req)
    {
        $this->validate($req,[
            "perihal" => "required",
            "no_surat_pemohon" => "required",
            "tgl_surat_pemohon" => "required|date",
            "nama_pemohon" => "required",
            "alamat_pemohon" => "required",
            "nama_pengirim" => "required",
            "no_telp_pemohon" => "required",
        ],[
            "required" => ":Attribute tidak boleh dikosongkan.",
            "date" => ":Attribute tidak sesuai dengan format.",
        ]);

        $path = public_path()."/berkas";   
        if(!File::isDirectory($path)) {
            File::makeDirectory($path, 0777, true, true);
        }

        $id_pelayanan = Helper::decrypt($req->value);
        $tgl_pengambilan = '2000-01-01';
        if ($req->status_layanan == "Diambil") {
            $tgl_pengambilan = date('Y-m-d');
        }
        
        $status = DB::table('pelayanan')
                        ->where('id',$id_pelayanan)
                        ->update([
                            "perihal" => $req->perihal,
                            "no_surat_pemohon" => $req->no_surat_pemohon,
                            "tgl_surat_pemohon" => Helper::date_to_db($req->tgl_surat_pemohon),
                            "nama_pemohon" => $req->nama_pemohon,
                            "alamat_pemohon" => $req->alamat_pemohon,
                            "nama_pengirim" => $req->nama_pengirim,
                            "no_telp_pemohon" => $req->no_telp_pemohon,
                            "kelengkapan_syarat" => $req->kelengkapan_syarat,
                            "status_layanan" => $req->status_layanan,
                            "catatan" => $req->catatan,
                            "no_surat_terbit" => $req->no_surat_terbit,
                            "tgl_surat_terbit" => (empty($req->tgl_surat_terbit)?'2000-01-01':Helper::date_to_db($req->tgl_surat_terbit)),
                            "tgl_pengambilan" => $tgl_pengambilan,
                            "nama_pengambil" => $req->nama_pengambil,
                            "updated_at" => \Carbon\Carbon::now(),
                        ]);

        for ($i=0; $i < count($req->id_syarat_layanan); $i++) { 
            $data_syarat = DB::table('data_syarat')
                           ->where('id',$req->id_data_syarat[$i])
                           ->first();

            if (isset($req->file('lampiran')[$i])) {
                if(File::exists($path."/".$data_syarat->lampiran)) {
                    File::delete($path."/".$data_syarat->lampiran);
                }
                $file = $req->file('lampiran')[$i];
                $fileName = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();

                $nama_lampiran = "lampiran_".strtotime(date('d-m-Y h:i:s'))."_".$i.".".$extension;
                $file->move($path,$nama_lampiran);
            }else {
                $nama_lampiran = $data_syarat->lampiran;
            }

            DB::table('data_syarat')
            ->where('id',$req->id_data_syarat[$i])
            ->update([
                "lampiran" => $nama_lampiran,
                "updated_at" => \Carbon\Carbon::now(),
            ]);
        }

        return redirect('pelayanan/detail/'.Helper::encrypt($id_pelayanan));
    }

    public function pelayanan_hapus(Request $req)
    {
        $id_pelayanan = Helper::decrypt($req->value);
        $data = DB::table('data_syarat')
                ->where('id_pelayanan',$id_pelayanan)
                ->get();

        $path = public_path()."/berkas";
        foreach ($data as $key => $value) {
            if(File::exists($path."/".$value->lampiran)) {
                File::delete($path."/".$value->lampiran);
            }
        }

        $status = DB::table('pelayanan')
                  ->where('id',$id_pelayanan)
                  ->delete();

        if ($status) {
            \Session::flash('pesan_berhasil','Berhasil menghapus data');
        }else{
            \Session::flash('pesan_gagal','Gagal menghapus data');
        }

        return redirect('pelayanan');
    }
}
