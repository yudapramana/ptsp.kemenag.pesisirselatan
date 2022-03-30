<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Helper;

class APIController extends Controller
{
    public function get_syarat_layanan(Request $req)
    {
        $data = DB::table('syarat_layanan')
                          ->select('syarat_layanan.*','data_syarat.lampiran','data_syarat.id as id_data_syarat')
                          ->leftJoin('data_syarat','data_syarat.id_syarat_layanan','=','syarat_layanan.id')
                          ->where('id_data_layanan',$req->id_data_layanan)
                          ->get()
                          ->toArray();
        
        echo json_encode($data);
    }
}
