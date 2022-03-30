<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index')->middleware('level:none');
Route::post('lihat_syarat', 'HomeController@lihat_syarat')->middleware('level:none');
Route::post('buat_permohonan', 'HomeController@buat_permohonan_submit')->middleware('level:none');
Route::post('buat_permohonan/tambah', 'HomeController@buat_permohonan_tambah')->middleware('level:none');
Route::get('buat_permohonan/detail/{value}', 'HomeController@buat_permohonan_detail')->middleware('level:none');
Route::get('buat_permohonan/cetak/{value}', 'HomeController@buat_permohonan_cetak')->middleware('level:none');
Route::get('buat_permohonan/{id_data_layanan}/{id_unit}', 'HomeController@buat_permohonan')->middleware('level:none');
Route::post('cek_status_layanan', 'HomeController@cek_status_layanan')->middleware('level:none');

Route::get('login', 'AuthController@login')->middleware('level:guest');
Route::post('login', 'AuthController@login_submit')->middleware('level:guest');
Route::get('logout', 'AuthController@logout')->middleware('level:auth');

Route::post('get_syarat_layanan', 'APIController@get_syarat_layanan')->middleware('level:none,l');

Route::get('dashboard', 'DashboardController@dashboard')->middleware('level:auth');
Route::post('dashboard', 'DashboardController@dashboard_submit')->middleware('level:auth');

Route::get('level_user', 'LevelUserController@level_user')->middleware('level:level_user,l');
Route::post('level_user', 'LevelUserController@level_user_submit')->middleware('level:level_user,l');
Route::get('level_user/tambah', 'LevelUserController@level_user_tambah')->middleware('level:level_user,t');
Route::post('level_user/tambah', 'LevelUserController@level_user_tambah_submit')->middleware('level:level_user,t');
Route::get('level_user/ubah/{value}', 'LevelUserController@level_user_ubah')->middleware('level:level_user,u');
Route::post('level_user/ubah/{value}', 'LevelUserController@level_user_ubah_submit')->middleware('level:level_user,u');
Route::get('level_user/hapus/{value}', 'LevelUserController@level_user_hapus')->middleware('level:level_user,h');

Route::get('data_user', 'DataUserController@data_user')->middleware('level:data_user,l');
Route::post('data_user', 'DataUserController@data_user_submit')->middleware('level:data_user,l');
Route::get('data_user/page', 'DataUserController@data_user_submit')->middleware('level:data_user,l');
Route::get('data_user/tambah', 'DataUserController@data_user_tambah')->middleware('level:data_user,t');
Route::post('data_user/tambah', 'DataUserController@data_user_tambah_submit')->middleware('level:data_user,t');
Route::get('data_user/ubah/{value}', 'DataUserController@data_user_ubah')->middleware('level:data_user,u');
Route::post('data_user/ubah/{value}', 'DataUserController@data_user_ubah_submit')->middleware('level:data_user,u');
Route::get('data_user/hapus/{value}', 'DataUserController@data_user_hapus')->middleware('level:data_user,h');

Route::get('unit_pengolah', 'UnitPengolahController@unit_pengolah')->middleware('level:unit_pengolah,l');
Route::post('unit_pengolah', 'UnitPengolahController@unit_pengolah_submit')->middleware('level:unit_pengolah,l');
Route::get('unit_pengolah/tambah', 'UnitPengolahController@unit_pengolah_tambah')->middleware('level:unit_pengolah,t');
Route::post('unit_pengolah/tambah', 'UnitPengolahController@unit_pengolah_tambah_submit')->middleware('level:unit_pengolah,t');
Route::get('unit_pengolah/ubah/{value}', 'UnitPengolahController@unit_pengolah_ubah')->middleware('level:unit_pengolah,u');
Route::post('unit_pengolah/ubah/{value}', 'UnitPengolahController@unit_pengolah_ubah_submit')->middleware('level:unit_pengolah,u');
Route::get('unit_pengolah/hapus/{value}', 'UnitPengolahController@unit_pengolah_hapus')->middleware('level:unit_pengolah,h');
Route::get('unit_pengolah/detail/{value}', 'UnitPengolahController@unit_pengolah_detail')->middleware('level:unit_pengolah,h');

Route::get('jenis_layanan', 'JenisLayananController@jenis_layanan')->middleware('level:jenis_layanan,l');
Route::post('jenis_layanan', 'JenisLayananController@jenis_layanan_submit')->middleware('level:jenis_layanan,l');
Route::get('jenis_layanan/tambah', 'JenisLayananController@jenis_layanan_tambah')->middleware('level:jenis_layanan,t');
Route::post('jenis_layanan/tambah', 'JenisLayananController@jenis_layanan_tambah_submit')->middleware('level:jenis_layanan,t');
Route::get('jenis_layanan/ubah/{value}', 'JenisLayananController@jenis_layanan_ubah')->middleware('level:jenis_layanan,u');
Route::post('jenis_layanan/ubah/{value}', 'JenisLayananController@jenis_layanan_ubah_submit')->middleware('level:jenis_layanan,u');
Route::get('jenis_layanan/hapus/{value}', 'JenisLayananController@jenis_layanan_hapus')->middleware('level:jenis_layanan,h');

Route::get('output_layanan', 'OutputLayananController@output_layanan')->middleware('level:output_layanan,l');
Route::post('output_layanan', 'OutputLayananController@output_layanan_submit')->middleware('level:output_layanan,l');
Route::get('output_layanan/tambah', 'OutputLayananController@output_layanan_tambah')->middleware('level:output_layanan,t');
Route::post('output_layanan/tambah', 'OutputLayananController@output_layanan_tambah_submit')->middleware('level:output_layanan,t');
Route::get('output_layanan/ubah/{value}', 'OutputLayananController@output_layanan_ubah')->middleware('level:output_layanan,u');
Route::post('output_layanan/ubah/{value}', 'OutputLayananController@output_layanan_ubah_submit')->middleware('level:output_layanan,u');
Route::get('output_layanan/hapus/{value}', 'OutputLayananController@output_layanan_hapus')->middleware('level:output_layanan,h');

Route::get('data_layanan', 'DataLayananController@data_layanan')->middleware('level:data_layanan,l');
Route::post('data_layanan', 'DataLayananController@data_layanan_submit')->middleware('level:data_layanan,l');
Route::get('data_layanan/detail/{value}', 'DataLayananController@data_layanan')->middleware('level:data_layanan,l');
Route::post('data_layanan/detail/{value}', 'DataLayananController@data_layanan_submit')->middleware('level:data_layanan,l');
Route::get('data_layanan/tambah', 'DataLayananController@data_layanan_tambah')->middleware('level:data_layanan,t');
Route::get('data_layanan/tambah/{value}', 'DataLayananController@data_layanan_tambah')->middleware('level:data_layanan,t');
Route::post('data_layanan/tambah', 'DataLayananController@data_layanan_tambah_submit')->middleware('level:data_layanan,t');
Route::get('data_layanan/ubah/{value}', 'DataLayananController@data_layanan_ubah')->middleware('level:data_layanan,u');
Route::post('data_layanan/ubah/{value}', 'DataLayananController@data_layanan_ubah_submit')->middleware('level:data_layanan,u');
Route::get('data_layanan/hapus/{value}', 'DataLayananController@data_layanan_hapus')->middleware('level:data_layanan,h');

Route::get('syarat_layanan', 'SyaratLayananController@syarat_layanan')->middleware('level:syarat_layanan,l');
Route::post('syarat_layanan', 'SyaratLayananController@syarat_layanan_submit')->middleware('level:syarat_layanan,l');
Route::get('syarat_layanan/detail/{value}', 'SyaratLayananController@syarat_layanan')->middleware('level:syarat_layanan,l');
Route::post('syarat_layanan/detail/{value}', 'SyaratLayananController@syarat_layanan_submit')->middleware('level:syarat_layanan,l');
Route::get('syarat_layanan/tambah', 'SyaratLayananController@syarat_layanan_tambah')->middleware('level:syarat_layanan,t');
Route::get('syarat_layanan/tambah/{value}', 'SyaratLayananController@syarat_layanan_tambah')->middleware('level:syarat_layanan,t');
Route::post('syarat_layanan/tambah', 'SyaratLayananController@syarat_layanan_tambah_submit')->middleware('level:syarat_layanan,t');
Route::get('syarat_layanan/ubah/{value}', 'SyaratLayananController@syarat_layanan_ubah')->middleware('level:syarat_layanan,u');
Route::post('syarat_layanan/ubah/{value}', 'SyaratLayananController@syarat_layanan_ubah_submit')->middleware('level:syarat_layanan,u');
Route::get('syarat_layanan/hapus/{value}', 'SyaratLayananController@syarat_layanan_hapus')->middleware('level:syarat_layanan,h');

Route::get('pelayanan', 'PelayananController@pelayanan')->middleware('level:pelayanan,l');
Route::post('pelayanan', 'PelayananController@pelayanan_submit')->middleware('level:pelayanan,l');
Route::get('pelayanan/detail/{value}', 'PelayananController@pelayanan_detail')->middleware('level:pelayanan,t');
Route::get('pelayanan/cetak/{value}', 'PelayananController@pelayanan_cetak')->middleware('level:pelayanan,t');
Route::get('pelayanan/tambah', 'PelayananController@pelayanan_tambah')->middleware('level:pelayanan,t');
Route::post('pelayanan/tambah', 'PelayananController@pelayanan_tambah_submit')->middleware('level:pelayanan,t');
Route::get('pelayanan/ubah/{value}', 'PelayananController@pelayanan_ubah')->middleware('level:pelayanan,u');
Route::post('pelayanan/ubah/{value}', 'PelayananController@pelayanan_ubah_submit')->middleware('level:pelayanan,u');
Route::get('pelayanan/hapus/{value}', 'PelayananController@pelayanan_hapus')->middleware('level:pelayanan,h');