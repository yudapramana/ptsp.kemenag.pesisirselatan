<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Helper;

class DashboardController extends Controller
{
    public function dashboard(Request $req)
    {
        session(['menu'=>'dashboard','submenu'=>'']);

        if(auth()->user()->id_level == 1){
            $pelayanan_belum_proses = DB::table('view_pelayanan')
                                      ->whereNull('status_layanan')
                                      ->get();
    
            $pelayanan_proses = DB::table('view_pelayanan')
                                      ->where('status_layanan','Proses')
                                      ->get();
    
            $pelayanan_selesai = DB::table('view_pelayanan')
                                      ->where('status_layanan','Selesai')
                                      ->get();
    
            $pelayanan_diambil = DB::table('view_pelayanan')
                                      ->where('status_layanan','Diambil')
                                      ->get();
        }else{
            $pelayanan_belum_proses = DB::table('view_pelayanan')
                                        ->whereNull('status_layanan')
                                        ->where('id_unit',Helper::get_id_unit(auth()->user()->id_level))
                                        ->get();
    
            $pelayanan_proses = DB::table('view_pelayanan')
                                        ->where('status_layanan','Proses')
                                        ->where('id_unit',Helper::get_id_unit(auth()->user()->id_level))
                                        ->get();
    
            $pelayanan_selesai = DB::table('view_pelayanan')
                                        ->where('status_layanan','Selesai')
                                        ->where('id_unit',Helper::get_id_unit(auth()->user()->id_level))
                                        ->get();
    
            $pelayanan_diambil = DB::table('view_pelayanan')
                                        ->where('status_layanan','Diambil')
                                        ->where('id_unit',Helper::get_id_unit(auth()->user()->id_level))
                                        ->get();
        }

        return view('panel.dashboard',compact('pelayanan_belum_proses','pelayanan_proses','pelayanan_selesai','pelayanan_diambil'));
    }

    public function dashboard_submit(Request $req)
    {
        session(['menu'=>'dashboard','submenu'=>'']);

        $pelayanan_belum_proses = DB::table('view_pelayanan')
                                  ->where('no_registrasi',$req->cari)
                                  ->whereNull('status_layanan')
                                  ->get();

        $pelayanan_proses = DB::table('view_pelayanan')
                                  ->where('no_registrasi',$req->cari)
                                  ->where('status_layanan','Proses')
                                  ->get();

        $pelayanan_selesai = DB::table('view_pelayanan')
                                  ->where('no_registrasi',$req->cari)
                                  ->where('status_layanan','Selesai')
                                  ->get();

        $pelayanan_diambil = DB::table('view_pelayanan')
                                  ->where('no_registrasi',$req->cari)
                                  ->where('status_layanan','Diambil')
                                  ->get();
        $cari = true;
        return view('panel.dashboard',compact('pelayanan_belum_proses','pelayanan_proses','pelayanan_selesai','pelayanan_diambil','cari'));
    }
}
