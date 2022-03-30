<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App;
use File;
use Helper;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index');
    }

    public function lihat_syarat(Request $req)
    {
        $datas = DB::table('syarat_layanan')
                 ->where('id_data_layanan',$req->id_data_layanan)
                 ->get();

        $data = DB::table('data_layanan')
                ->where('id',$req->id_data_layanan)
                ->first();

        return view('home.lihat_syarat',compact('data','datas'));
    }

    public function buat_permohonan_submit(Request $req)
    {
        $id_data_layanan = $req->id_data_layanan;
        $id_unit = $req->id_unit;
        return redirect('buat_permohonan/'.Helper::encrypt($id_data_layanan).'/'.Helper::encrypt($id_unit));
    }

    public function buat_permohonan(Request $req)
    {
        $id_data_layanan = Helper::decrypt($req->id_data_layanan);
        $id_unit = Helper::decrypt($req->id_unit);

        $data = DB::table('data_layanan')
                ->where('id',$id_data_layanan)
                ->first();
        $syarat_layanan = DB::table('syarat_layanan')
                          ->where('id_data_layanan',$id_data_layanan)
                          ->get();
                        //   dd($syarat_layanan);

        return view('home.buat_permohonan',compact('id_data_layanan','id_unit','data','syarat_layanan'));
    }

    public function buat_permohonan_tambah(Request $req)
    {
        $this->validate($req,[
            "id_data_layanan" => "required",
            "id_unit" => "required",
            "perihal" => "required",
            "no_surat_pemohon" => "required",
            "tgl_surat_pemohon" => "required|date",
            "nama_pemohon" => "required",
            "alamat_pemohon" => "required",
            "nama_pengirim" => "required",
            "no_telp_pemohon" => "required",
            "lampiran.*" => "sometimes|mimes:jpg,jpeg,png,pdf,PDF|max:2048",
        ],[
            "id_data_layanan.required" => "Nama layanan tidak boleh dikosongkan.",
            "required" => ":Attribute tidak boleh dikosongkan.",
            "date" => ":Attribute tidak sesuai dengan format.",
            "lampiran.*.mimes" => "Tidak boleh selain .PDF, .JPG, .PNG.",
            "lampiran.*.max" => "Maksimal file 2MB.",
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
                            "perihal" => $req->perihal,
                            "id_unit" => $req->id_unit,
                            "no_surat_pemohon" => $req->no_surat_pemohon,
                            "tgl_surat_pemohon" => Helper::date_to_db($req->tgl_surat_pemohon),
                            "tgl_terima" => \Carbon\Carbon::now(),
                            "tgl_selesai" => $waktu_selesai,
                            "nama_pemohon" => $req->nama_pemohon,
                            "alamat_pemohon" => $req->alamat_pemohon,
                            "nama_pengirim" => $req->nama_pengirim,
                            "no_telp_pemohon" => $req->no_telp_pemohon,
                            "created_at" => \Carbon\Carbon::now(),
                        ]);
        
        $status = DB::table('pelayanan')
                 ->where('id',$id_pelayanan)
                 ->update([
                    "no_registrasi" => "WEB".date('dmy').sprintf('%04d',$id_pelayanan)
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

        return redirect('buat_permohonan/detail/'.Helper::encrypt($id_pelayanan));
    }

    public function buat_permohonan_detail(Request $req)
    {
        $id_pelayanan = Helper::decrypt($req->value);
        $data = DB::table('view_pelayanan')
                ->where('id',$id_pelayanan)
                ->first();
        return view('home.buat_permohonan_detail',compact('data'));
    }

    public function buat_permohonan_cetak(Request $req)
    {
        $id_pelayanan = Helper::decrypt($req->value);
        $data = DB::table('view_pelayanan')
                ->where('id',$id_pelayanan)
                ->first();
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML(view('cetak.pelayanan_detail',compact('data')))->setPaper('a4', 'portrait');
        return $pdf->stream();
    }

    public function cek_status_layanan(Request $req)
    {
        $data = DB::table('view_pelayanan')
                ->where('no_registrasi',$req->no_registrasi)
                ->first();

        return view('home.buat_permohonan_detail',compact('data'));
    }
}
