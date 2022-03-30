<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use DB;
use Helper;

class LevelMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $modul='none', $akses='')
    {
        if (Auth::check()) {
            if ($modul == 'guest') {
              return redirect('dashboard');
            }else{
              $data = DB::table('level_akses')
                      ->leftJoin('modul','modul.id','=','level_akses.id_modul')
                      ->where('nama_modul',$modul)
                      ->where('id_level',auth()->user()->id_level)
                      ->first();

              if (isset($data->$akses)) {
                if (!$data->$akses) {
                  return redirect('admin');
                }
              }
            }
        }else{
          if ($modul == 'none') {
          }elseif ($modul != 'guest') {
            return redirect('login');
          }
        }

        Helper::check_htaccess();
        
        $response = $next($request);

        return $response->header("Cache-Control","no-cache,no-store, must-revalidate")
                        ->header("Pragma", "no-cache") //HTTP 1.0
                        ->header("Expires"," Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past
    }
}
