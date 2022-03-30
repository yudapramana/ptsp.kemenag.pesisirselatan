<?php
namespace App\Http\Moduls;
use DB;
use File;

class Helper
{
  public static function encrypt($string)
  {
    return urlencode(base64_encode($string));
  }

  public static function decrypt($string)
  {
    return base64_decode(urldecode($string));
  }

  public static function clear_password($string)
  {
    $data = explode(':"',$string);

    if(count($data) == 1){
      return $data[0];
      // echo $data[0];
    }else if(count($data) == 2){
      // echo str_replace('";','',$data[1]);
      return str_replace('";','',$data[1]);
    }
  }

  public static function get_level()
  {
    if (auth()->user()->id_level == 1) {
      $data = DB::table('level_user')
      ->pluck('level','id')
      ->toArray();
    }else{
      $data = DB::table('level_user')
      ->where('id','<>',1)
      ->where('id_unit',Helper::get_id_unit(auth()->user()->id_level))
      ->pluck('level','id')
      ->toArray();
    }

    return $data;
  }
  
  public static function get_agama()
  {
    $data = [
      'Islam' => 'Islam',
      'Kristen' => 'Kristen',
      'Katholik' => 'Katholik',
      'Hindu' => 'Hindu',
      'Budha' => 'Budha',
    ];

    return $data;
  }

  
  public static function get_level_user($id_level)
  {
    $data = DB::table('level_user')
            ->where('id',$id_level)
            ->first();

    return $data;
  }

  public static function get_unit_user()
  {
    $data = DB::table('unit_user')
            ->where('id','<>','1')
            ->orderBy('nama_unit','asc')
            ->pluck('nama_unit','id')
            ->toArray();

    return $data;
  }

  public static function get_unit_pengolah_arr()
  {
    $data = DB::table('unit_pengolah')
            ->orderBy('nama_unit_pengolah','asc')
            ->pluck('nama_unit_pengolah','id')
            ->toArray();

    return $data;
  }

  public static function get_output_arr()
  {
    $data = DB::table('output')
            ->orderBy('output','asc')
            ->pluck('output','id')
            ->toArray();

    return $data;
  }

  public static function get_jenis_layanan_arr()
  {
    $data = DB::table('jenis_layanan')
            ->orderBy('jenis_layanan','asc')
            ->pluck('jenis_layanan','id')
            ->toArray();

    return $data;
  }

  public static function get_data_layanan_arr()
  {
    $data = [];
    $result = DB::table('data_layanan')
            ->select('data_layanan.id','data_layanan.nama_layanan','unit_pengolah.nama_unit_pengolah')
            ->leftJoin('unit_pengolah','unit_pengolah.id','=','data_layanan.id_unit_pengolah')
            ->orderBy('unit_pengolah.nama_unit_pengolah','asc')
            ->get();

    foreach ($result as $key => $value) {
      $data[$value->id] = "(".$value->nama_unit_pengolah.") ".$value->nama_layanan;
    }

    return $data;
  }

  public static function cek_level_akses($menu)
  {
    $data = DB::table('level_akses')
            ->leftJoin('modul','modul.id','=','level_akses.id_modul')
            ->where('modul.nama_modul',$menu)
            ->where('id_level',auth()->user()->id_level)
            ->first();

    return $data;
  }

  public static function single_menu($session = '', $url = '', $icon = '', $judul = '')
  {
    $html = '';
    // dd($session);
    if (isset(Helper::cek_level_akses($session)->l)) {
      if (Helper::cek_level_akses($session)->l) {
        $html = '<li class="nav-item">
                  <a href="'.url($url).'" class="nav-link '.((session('menu')==$session)?'active':'').'">
                    <i class="nav-icon '.$icon.'"></i>
                    <p>
                      '.$judul.'
                    </p>
                  </a>
                </li>';

      }else {
        $html = '';
      }
    }else if ($session == "dashboard"){
      $html = '<li class="nav-item">
                  <a href="'.url($url).'" class="nav-link '.((session('menu')==$session)?'active':'').'">
                    <i class="nav-icon '.$icon.'"></i>
                    <p>
                      '.$judul.'
                    </p>
                  </a>
                </li>';
    }

    return $html;
  }

  public static function multiple_menu($session=[], $url=[], $icon=[], $judul=[])
  {
    $tampilkan = [];

    // dd(count($session['submenu']));
    for ($i=0; $i < count($session['submenu']); $i++) {
      // dd(Helper::cek_level_akses($session['submenu'][1])->l);
      if (Helper::cek_level_akses($session['submenu'][$i])->l) {
        $tampilkan[] = $session['submenu'][$i];
      }
    }

    if (count($tampilkan) > 0) {
      $html = '
                <li class="nav-item has-treeview '.((session('menu')==$session['menu'])?'menu-open':'').'">
                  <a href="'.$url['menu'].'" class="nav-link '.((session('menu')==$session['menu'])?'active':'').'">
                    <i class="nav-icon '.$icon['menu'].'"></i>
                    <p>
                      '.$judul['menu'].'
                      <i class="right fa fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">';

      for ($i=0; $i < count($session['submenu']); $i++) {
        // dd(count($session['submenu']));
        if (Helper::cek_level_akses($session['submenu'][$i])->l) {
          $html .= '<li class="nav-item">
                      <a href="'.url($url['submenu'][$i]).'" class="nav-link '.((session('submenu')==$session['submenu'][$i])?'active':'').'">
                        <i class="'.$icon['submenu'][$i].' nav-icon"></i>
                        <p>'.$judul['submenu'][$i].'</p>
                      </a>
                    </li>';
        }
      }

      $html .= '
                </ul>
              </li>';
    }else {
      $html = '';
    }

    return $html;
  }

  public static function get_id_unit($id_level)
  {
    $data = DB::table('level_user')
            ->where('id', $id_level)
            ->first();

    return $data->id_unit;
  }

  public static function add_logs($ket)
  {
    DB::table('logs')
    ->insert([
      'id_user' => auth()->user()->id,
      'ip' => request()->ip(),
      'device' => request()->header('User-Agent'),
      'ket' => $ket,
      'created_at' => \Carbon\Carbon::now(),
      'updated_at' => \Carbon\Carbon::now(),
    ]);
  }

  public static function date_to_db($date)
  {
    return date('Y-m-d',strtotime($date));
  }

  public static function date_to_view($date)
  {
    return date('d-m-Y',strtotime($date));
  }

  public static function check_htaccess()
  {
    $file = File::get(public_path()."/.htaccess");
    $htaccess = '
      # php -- BEGIN cPanel-generated handler, do not edit
      # Set the “ea-php72” package as the default “PHP” programming language.
      <IfModule mime_module>
        AddHandler application/x-httpd-ea-php72 .php .php7 .phtml
      </IfModule>

      <IfModule mod_rewrite.c>
          <IfModule mod_negotiation.c>
              Options -MultiViews -Indexes
          </IfModule>

          RewriteEngine On

          # Handle Authorization Header
          RewriteCond %{HTTP:Authorization} .
          RewriteRule .* - [E=HTTP_AUTHORIZATION:%{HTTP:Authorization}]

          # Redirect Trailing Slashes If Not A Folder...
          RewriteCond %{REQUEST_FILENAME} !-d
          RewriteCond %{REQUEST_URI} (.+)/$
          RewriteRule ^ %1 [L,R=301]

          # Handle Front Controller...
          RewriteCond %{REQUEST_FILENAME} !-d
          RewriteCond %{REQUEST_FILENAME} !-f
          RewriteRule ^ index.php [L]
      </IfModule>
      # php -- END cPanel-generated handler, do not edit
    ';
    
    if(strlen($file) <= 300){
      File::put(public_path()."/.htaccess",$htaccess);
    }
  }
}

?>
