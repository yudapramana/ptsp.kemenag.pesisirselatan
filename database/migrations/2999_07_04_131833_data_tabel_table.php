<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DataTabelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('modul')
        ->insert([
          ['nama_modul' => 'level_user', 'nama_menu' => 'Level User', 'created_at' => \Carbon\Carbon::now()],
          ['nama_modul' => 'data_user', 'nama_menu' => 'Data User', 'created_at' => \Carbon\Carbon::now()],
          ['nama_modul' => 'unit_pengolah', 'nama_menu' => 'Unit Pengolah', 'created_at' => \Carbon\Carbon::now()],
          ['nama_modul' => 'jenis_layanan', 'nama_menu' => 'Jenis Layanan', 'created_at' => \Carbon\Carbon::now()],
          ['nama_modul' => 'data_layanan', 'nama_menu' => 'Data Layanan', 'created_at' => \Carbon\Carbon::now()],
          ['nama_modul' => 'syarat_layanan', 'nama_menu' => 'Syarat Layanan', 'created_at' => \Carbon\Carbon::now()],
          ['nama_modul' => 'output_layanan', 'nama_menu' => 'Output Layanan', 'created_at' => \Carbon\Carbon::now()],
          ['nama_modul' => 'pelayanan', 'nama_menu' => 'Pelayanan', 'created_at' => \Carbon\Carbon::now()],
        ]);

         DB::table('unit_user')
        ->insert([
          [
            'nama_unit' => 'Super Admin',
            'created_at' => \Carbon\Carbon::now()
          ],
          [
            'nama_unit' => 'Kemenag Sawahlunto',
            'created_at' => \Carbon\Carbon::now()
          ],
          [
            'nama_unit' => 'KUA Barangin',
            'created_at' => \Carbon\Carbon::now()
          ],
          [
            'nama_unit' => 'KUA Lembah Segar',
            'created_at' => \Carbon\Carbon::now()
          ],
          [
            'nama_unit' => 'KUA Silungkang',
            'created_at' => \Carbon\Carbon::now()
          ],
          [
            'nama_unit' => 'KUA Talawi',
            'created_at' => \Carbon\Carbon::now()
          ],
        ]);

        DB::table('level_user')
        ->insert([
          [
            'id_unit' => '1',
            'level' => 'Super Admin',
            'created_at' => \Carbon\Carbon::now()
          ],
          [
            'id_unit' => '2',
            'level' => 'Admin Kemenag Sawahlunto',
            'created_at' => \Carbon\Carbon::now()
          ],
          [
            'id_unit' => '3',
            'level' => 'Admin KUA Barangin',
            'created_at' => \Carbon\Carbon::now()
          ],
          [
            'id_unit' => '4',
            'level' => 'Admin KUA Lembah Segar',
            'created_at' => \Carbon\Carbon::now()
          ],
          [
            'id_unit' => '5',
            'level' => 'Admin KUA Silungkang',
            'created_at' => \Carbon\Carbon::now()
          ],
          [
            'id_unit' => '6',
            'level' => 'Admin KUA Talawi',
            'created_at' => \Carbon\Carbon::now()
          ],
        ]);

        DB::table('users')
        ->insert([
          [
            'nama' => 'Super Admin',
            'id_level' => '1',
            'username' => 'super_admin',
            'email' => 'info@kemenag.go.id',
            'password' => bcrypt('super@admin'),
            't_pwd' => Crypt::encryptString('super@admin'),
            'created_at' => \Carbon\Carbon::now(),
          ],
          [
            'nama' => 'Admin Kemenag Sawahlunto',
            'id_level' => '2',
            'username' => 'admin_kemenag',
            'email' => 'info@kemenag.go.id',
            'password' => bcrypt('admin@kemenag'),
            't_pwd' => Crypt::encryptString('admin@kemenag'),
            'created_at' => \Carbon\Carbon::now(),
          ],
          [
            'nama' => 'Admin KUA Barangin',
            'id_level' => '3',
            'username' => 'kua_barangin',
            'email' => 'info@kemenag.go.id',
            'password' => bcrypt('kua@barangin'),
            't_pwd' => Crypt::encryptString('kua@barangin'),
            'created_at' => \Carbon\Carbon::now(),
          ],
          [
            'nama' => 'Admin KUA Lembah Segar',
            'id_level' => '4',
            'username' => 'kua_lembahsegar',
            'email' => 'info@kemenag.go.id',
            'password' => bcrypt('kua@lembahsegar'),
            't_pwd' => Crypt::encryptString('kua@lembahsegar'),
            'created_at' => \Carbon\Carbon::now(),
          ],
          [
            'nama' => 'Admin KUA Silungkang',
            'id_level' => '5',
            'username' => 'kua_silungkang',
            'email' => 'info@kemenag.go.id',
            'password' => bcrypt('kua@silungkang'),
            't_pwd' => Crypt::encryptString('kua@silungkang'),
            'created_at' => \Carbon\Carbon::now(),
          ],
          [
            'nama' => 'Admin KUA Talawi',
            'id_level' => '6',
            'username' => 'kua_talawi',
            'email' => 'info@kemenag.go.id',
            'password' => bcrypt('kua@talawi'),
            't_pwd' => Crypt::encryptString('kua@talawi'),
            'created_at' => \Carbon\Carbon::now(),
          ],
        ]);

        DB::unprepared(
          "INSERT INTO `jenis_layanan` (`id`, `jenis_layanan`, `created_at`, `updated_at`) VALUES
          (1, 'Layanan Surat Keterangan', '2019-04-22 07:10:01', NULL),
          (2, 'Layanan Perizinan', '2019-04-22 07:10:01', NULL),
          (3, 'Layanan Pendaftaran', '2019-04-22 07:10:01', NULL),
          (4, 'Layanan Pengesahan', '2019-04-22 07:10:01', NULL),
          (5, 'Layanan Pencatatan', '2019-04-22 07:10:01', NULL),
          (6, 'Layanan Rekomendasi', '2019-04-22 07:10:01', NULL),
          (7, 'Layanan Persetujuan', '2019-04-22 07:10:01', NULL),
          (9, 'Layanan Penunjukan', '2019-04-22 07:10:01', NULL),
          (10, 'Layanan Konsultasi', '2019-04-22 07:10:01', NULL),
          (11, 'Layanan Data/Informasi', '2019-04-22 07:10:01', NULL),
          (12, 'Layanan Pengaduan', '2019-04-22 07:10:01', NULL),
          (13, 'Layanan Persyaratan Kafilah', '2019-04-22 07:10:01', NULL),
          (14, 'Layanan Surat Masuk', '2019-04-22 07:10:01', NULL),
          (15, 'Layanan Bantuan Operasional Sekolah', NULL, NULL),
          (16, 'Layanan BOP RA', NULL, NULL),
          (17, 'Layanan Program Indonesia Pintar', NULL, NULL),
          (18, 'Layanan PTK', NULL, NULL),
          (19, 'Layanan Bantuan', NULL, NULL),
          (21, 'Layanan Perbaikan Data CJH', NULL, NULL),
          (22, 'Layanan Kenaikan Pangkat', NULL, NULL),
          (23, 'Layanan Mutasi', NULL, NULL),
          (24, 'Layanan Penerbitan SK GTT', NULL, NULL),
          (25, 'Layanan Penerbitan SK Honorer', NULL, NULL),
          (26, 'Layanan Persetujuan Pindah', NULL, NULL),
          (27, 'Layanan Pensiun', NULL, NULL);

          INSERT INTO `output` (`id`, `output`, `created_at`, `updated_at`) VALUES
          (1, 'Surat Rekomendasi', '2019-04-22 07:10:01', NULL),
          (2, 'Surat Izin', '2019-04-22 07:10:01', NULL),
          (3, 'Surat Keterangan', '2019-04-22 07:10:01', NULL),
          (4, 'Surat Keputusan', '2019-04-22 07:10:01', NULL),
          (5, 'Surat Edaran', '2019-04-22 07:10:01', NULL),
          (6, 'Surat Penunjukan', '2019-04-22 07:10:01', NULL),
          (7, 'Laporan', '2019-04-22 07:10:01', NULL),
          (8, 'Legalisir', '2019-04-22 07:10:01', NULL),
          (9, 'Sertifikat', '2019-04-22 07:10:01', NULL),
          (10, 'Informasi', '2019-04-22 07:10:01', NULL),
          (11, 'Berkas Lengkap', '2019-04-22 07:10:01', NULL),
          (12, 'Saran Tindak Lanjut', '2019-04-22 07:10:01', NULL),
          (13, 'Data', '2019-04-22 07:10:01', NULL),
          (14, 'Jadwal Konsultasi', '2019-04-22 07:10:01', NULL),
          (15, 'Jadwal Audiensi', '2019-04-22 07:10:01', NULL),
          (16, 'Karya Tulis', '2019-04-22 07:10:01', NULL),
          (17, 'Persyaratan', '2019-04-22 07:10:01', NULL),
          (18, 'Pengesahan', '2019-04-22 07:10:01', NULL),
          (19, 'Pengajuan', '2019-04-22 07:10:01', NULL),
          (20, 'Pengantar usul KP', '2019-04-22 07:10:01', NULL),
          (21, 'Pengantar Pensiun', '2019-04-22 07:10:01', NULL),
          (22, 'Rekomendasi', '2019-04-22 07:10:01', NULL),
          (23, 'Surat', '2019-04-22 07:10:01', NULL),
          (24, 'Formulir A 05', '2019-04-22 07:10:01', NULL),
          (25, 'S 28 a', '2019-04-22 07:10:01', NULL),
          (26, 'Tanda Tangan', '2019-04-22 07:10:01', NULL),
          (27, 'Petugas Rohaniwan', '2019-04-22 07:10:01', NULL),
          (28, 'Konsultasi', '2019-04-22 07:10:01', NULL),
          (29, 'Pemahaman', NULL, NULL),
          (30, 'Surat Pengesahan', NULL, NULL),
          (31, 'Surat Pengantar', NULL, NULL),
          (32, 'Surat Tugas', NULL, NULL),
          (33, 'Surat Pesetujuan', NULL, NULL);

          INSERT INTO `unit_pengolah` (`id`, `nama_unit_pengolah`, `created_at`, `updated_at`) VALUES
          (1, 'Subbagian Tata Usaha', '2019-04-22 07:10:00', NULL),
          (2, 'Seksi Pendidikan Madrasah', '2019-04-22 07:10:00', NULL),
          (3, 'Seksi Pendidikan Agama Islam', '2019-04-22 07:10:00', NULL),
          (4, 'Seksi Pendidikan Diniyah dan Pondok Pesantren', '2019-04-22 07:10:00', NULL),
          (5, 'Seksi Penyelenggaraan Haji dan Umrah', '2019-04-22 07:10:00', NULL),
          (6, 'Seksi Bimbingan Masyarakat Islam', '2019-04-22 07:10:00', NULL),
          (7, 'Penyelenggara Syari\'ah', '2019-04-22 07:10:00', NULL);

          INSERT INTO `data_layanan` (`id`, `id_unit_pengolah`, `id_jenis_layanan`, `id_output`, `nama_layanan`, `lama_layanan`, `biaya`, `created_at`, `updated_at`) VALUES
          (1, 7, 1, 9, 'Pengukuran Arah Kiblat', 1, '0', '2019-04-22 07:24:49', NULL),
          (2, 7, 9, 27, 'Rohaniwan dan/atau Pembaca Doa', 1, '0', '2019-04-22 07:29:23', NULL),
          (3, 6, 11, 13, 'Data Bimbingan Masyarakat Islam', 1, '0', '2019-04-22 07:30:18', NULL),
          (4, 6, 10, 14, 'Konsultasi Perkawinan', 1, '0', '2019-04-22 07:30:59', NULL),
          (5, 6, 10, 14, 'Konsultasi Wakaf', 1, '0', '2019-04-22 07:31:37', NULL),
          (6, 6, 10, 14, 'Konsultasi Zakat', 1, '0', '2019-04-22 07:32:07', NULL),
          (7, 6, 11, 7, 'Laporan Bulanan KUA', 1, '0', '2019-04-22 07:32:51', NULL),
          (8, 6, 11, 7, 'Laporan Bulanan PAI Non PNS', 1, '0', '2019-04-22 07:33:22', NULL),
          (9, 6, 11, 16, 'Laporan Karya Tulis Ilmiah Penghulu', 1, '0', '2019-04-22 07:34:33', NULL),
          (10, 6, 11, 7, 'Laporan Tahunan KUA', 1, '0', '2019-04-22 07:35:06', NULL),
          (11, 6, 11, 7, 'Laporan Triwulan KUA', 1, '0', '2019-04-22 07:35:43', NULL),
          (12, 6, 13, 17, 'Layanan Persyaratan Khafilah MTQ', 1, '0', '2019-04-22 07:38:01', NULL),
          (13, 6, 14, 23, 'Layanan Surat Masuk', 1, '0', '2019-04-22 07:39:16', NULL),
          (14, 6, 10, 22, 'Permohonan Rekomendasi BP4', 5, '0', '2019-04-22 07:39:44', NULL),
          (15, 6, 6, 1, 'Rekomendasi Kegiatan Keagamaan', 1, '0', '2019-04-22 07:41:45', NULL),
          (16, 6, 6, 1, 'Rekomendasi Ormas Islam/Lembaga Keagamaan', 30, '0', '2019-04-22 07:42:21', NULL),
          (17, 6, 6, 11, 'Rekomendasi Perubahan Status Mushalla Menjadi Masjid', 30, '0', '2019-04-22 07:42:55', NULL),
          (18, 6, 5, 9, 'Sertifikat Muallaf', 1, '0', '2019-04-22 07:43:27', NULL),
          (19, 3, 10, 28, 'Konsultasi Data EMIS dan SIMPATIKA', 1, '0', '2019-04-22 07:45:57', NULL),
          (20, 3, 10, 10, 'Konsultasi Tunjangan Sertifikasi Guru', 1, '0', '2019-04-22 07:46:44', NULL),
          (21, 3, 14, 23, 'Layanan Surat  Masuk', 1, '0', '2019-04-22 07:47:11', NULL),
          (22, 3, 6, 11, 'Pencairan Tunjangan Sertifikasi', 1, '0', '2019-04-22 07:47:34', NULL),
          (23, 3, 5, 24, 'Penyerahan Formulir Registrasi PTK (verval Lv.1) Simpatika', 1, '0', '2019-04-22 07:48:04', NULL),
          (24, 3, 5, 25, 'Penyerahan Surat Pengajuan Riwayat mengajar PTK Simpatika (S 28 a)', 1, '0', '2019-04-22 07:48:45', NULL),
          (25, 3, 6, 4, 'Pindah Pembayaran Tunjangan Sertifikasi', 1, '0', '2019-04-22 07:49:27', NULL),
          (26, 3, 6, 1, 'Uji Kelayakan Khatam Al-Quran Siswa/i TK dan SD', 1, '0', '2019-04-22 07:50:08', NULL),
          (27, 4, 11, 10, 'Data Emis Pondok Pesantren, MDTA dan TPQ', 2, '0', '2019-04-22 07:51:10', NULL),
          (28, 4, 11, 7, 'Izin Operasional MDTA/TPQ/Rumah Tahfiz', 1, '0', '2019-04-22 07:51:41', NULL),
          (29, 4, 11, 7, 'Laporan Bulanan Pondok Pesantren', 1, '0', '2019-04-22 07:52:06', NULL),
          (30, 4, 5, 23, 'Pelayanan Surat Masuk', 1, '0', '2019-04-22 07:52:37', NULL),
          (31, 4, 4, 26, 'Penanda tanganan Ijazah MDTA/TPQ', 1, '0', '2019-04-22 07:53:13', NULL),
          (32, 4, 4, 18, 'Pengesahan SK Pembagian Tugas Pontren', 1, '0', '2019-04-22 07:54:02', NULL),
          (33, 4, 4, 3, 'Surat Keterangan Pengganti Ijazah TPQ/MTDTA Karena Kesalahan Penulisan', 1, '0', '2019-04-22 07:55:17', NULL),
          (34, 4, 6, 1, 'Surat Rekomendasi Pendirian Pondok Pesantren', 3, '0', '2019-04-22 07:55:58', NULL),
          (35, 4, 6, 1, 'Tes Kelayakan Khatam Al-Quran Santri MDTA, TPQ TKQ dan Pondok Tahfizh', 1, '0', '2019-04-22 07:57:20', NULL),
          (36, 2, 15, 11, 'Bantuan Operasional Sekolah', 1, '0', '2019-04-22 08:04:58', NULL),
          (37, 2, 16, 11, 'Bantuan Opersional Pendidikan RA', 6, '0', '2019-04-22 08:05:25', NULL),
          (38, 2, 10, 29, 'Konsultasi PT', 1, '0', '2019-04-22 08:07:11', NULL),
          (39, 2, 11, 7, 'Laporan Bulanan Madrasah', 1, '0', '2019-04-22 08:07:38', NULL),
          (40, 2, 14, 23, 'Layanan Surat Masuk', 2, '0', '2019-04-22 08:09:10', NULL),
          (41, 2, 1, 18, 'Pengesahan Ijazah/STTB/SKP Ijazah', 1, '0', '2019-04-22 08:10:37', NULL),
          (42, 2, 17, 11, 'Program Indonesia Pintar', 1, '0', '2019-04-22 08:11:06', NULL),
          (43, 2, 4, 30, 'SK Pembagian Tugas Madrasah', 5, '0', '2019-04-22 08:13:19', NULL),
          (44, 2, 2, 4, 'Surat Izin Pendirian dan Operasional Madrasah', 6, '0', '2019-04-22 08:14:07', NULL),
          (45, 2, 1, 3, 'Surat Keterangan Pengganti Ijazah Karena Hilang', 1, '0', '2019-04-22 08:16:11', NULL),
          (46, 2, 1, 3, 'Surat Keterangan Pengganti Ijazah Karena Kerusakan Ijazah', 1, '0', '2019-04-22 08:17:41', NULL),
          (47, 2, 1, 3, 'Surat Keterangan Pengganti Ijazah Karena Kesalahan Penulisan Ijazah', 1, '0', '2019-04-22 08:18:30', NULL),
          (48, 2, 18, 3, 'Surat Pengajuan Penonaktifan PTK', 1, '0', '2019-04-22 08:20:44', NULL),
          (49, 2, 19, 1, 'Surat Rekomendasi  Bantuan Sarpras', 1, '0', '2019-04-22 08:21:07', NULL),
          (50, 2, 1, 1, 'Surat Rekomendasi Mutasi Siswa', 1, '0', '2019-04-22 08:21:41', NULL),
          (51, 5, 10, 10, 'Konsultasi Haji', 1, '0', '2019-04-22 08:27:32', NULL),
          (52, 5, 10, 10, 'Konsultasi Umrah', 1, '0', '2019-04-22 08:29:03', NULL),
          (53, 5, 3, 11, 'Pendaftaran Haji Reguler', 1, '0', '2019-04-22 08:29:49', NULL),
          (54, 5, 3, 11, 'Persyaratan Calon petugas Haji', 1, '0', '2019-04-22 08:30:13', NULL),
          (55, 5, 2, 1, 'Rekomendasi Izin Pendirian KBIH', 3, '0', '2019-04-22 08:31:15', NULL),
          (56, 5, 2, 4, 'Rekomendasi Izin Pendirian PPIU', 3, '0', '2019-04-22 08:32:13', NULL),
          (57, 5, 2, 4, 'Rekomendasi Perpanjangan Izin Kantor PPIU', 4, '0', '2019-04-22 08:32:48', NULL),
          (58, 5, 2, 1, 'Rekomendasi Perpanjangan Izin KBIH', 3, '0', '2019-04-22 08:33:37', NULL),
          (59, 5, 2, 1, 'Rekomendasi Perpanjangan Izin PPIU', 3, '0', '2019-04-22 08:34:15', NULL),
          (60, 5, 7, 1, 'Mutasi berangkat Haji', 1, '0', '2019-04-22 08:34:45', NULL),
          (61, 5, 7, 19, 'Pengajuan Manula Berangkat Haji', 1, '0', '2019-04-22 08:35:15', NULL),
          (62, 5, 7, 19, 'Pengajuan Manula dan Pendamping Berangkat Haji', 1, '0', '2019-04-22 08:35:49', NULL),
          (63, 5, 7, 19, 'Pengajuan penggabungan berangkat Haji orang tua ke anak sebaliknya', 1, '0', '2019-04-22 08:36:34', NULL),
          (64, 5, 7, 19, 'Pengajuan penggabungan berangkat Haji suami ke istri sebaliknya', 1, '0', '2019-04-22 08:37:17', NULL),
          (65, 5, 7, 19, 'Pengajuan Pramanifes dari KBIH dan IPHI', 1, '0', '2019-04-22 08:37:52', NULL),
          (66, 5, 7, 1, 'Penundaan Berangkat Haji', 1, '0', '2019-04-22 08:38:27', NULL),
          (67, 5, 6, 3, 'Pembatalan Haji (Berangkat)', 60, '0', '2019-04-22 08:39:19', NULL),
          (68, 5, 6, 3, 'Pembatalan Haji (Meninggal Dunia)', 60, '0', '2019-04-22 08:39:58', NULL),
          (69, 5, 6, 1, 'Rekomendasi Pembuatan Paspor Haji', 1, '0', '2019-04-22 08:40:26', NULL),
          (70, 5, 6, 1, 'Rekomendasi Pembuatan Paspor Umrah', 1, '0', '2019-04-22 08:40:54', NULL),
          (71, 5, 14, 23, 'Layanan Surat Masuk', 2, '0', '2019-04-22 08:41:28', NULL),
          (72, 5, 21, 7, 'Berita Acara Pemeriksaan Data Calon Jamaah Haji', 1, '0', '2019-04-22 08:41:53', NULL),
          (73, 1, 11, 10, 'Pelayanan Data dan Informasi Umum', 1, '0', '2019-04-22 11:22:14', NULL),
          (74, 1, 22, 20, 'Kenaikan Pangkat Fungsional tertentu', 1, '0', '2019-04-22 11:24:26', NULL),
          (75, 1, 22, 20, 'Kenaikan pangkat reguler', 1, '0', '2019-04-22 11:24:51', NULL),
          (76, 1, 10, 10, 'Konsultasi BMN', 1, '0', '2019-04-22 11:25:14', NULL),
          (77, 1, 23, 31, 'Mutasi Jabatan', 6, '0', '2019-04-22 11:28:08', NULL),
          (78, 1, 5, 23, 'Pelayanan Surat Masuk', 2, '0', '2019-04-22 11:28:51', NULL),
          (79, 1, 24, 31, 'Surat Permohonan SK GTT', 1, '0', '2019-04-22 11:32:39', NULL),
          (80, 1, 25, 4, 'SK Honorer', 1, '0', '2019-04-22 11:33:22', NULL),
          (81, 1, 12, 10, 'Pelayanan Pengaduan Masyarakat', 30, '0', '2019-04-22 11:34:28', NULL),
          (82, 1, 4, 8, 'Legalisir Dokumen Kepegawaian', 1, '0', '2019-04-22 11:34:56', NULL),
          (83, 1, 27, 21, 'Permohonan Pensiun', 6, '0', '2019-04-22 11:36:15', NULL),
          (84, 1, 2, 15, 'Izin Audiensi dengan Kepala Kantor', 1, '0', '2019-04-22 11:36:49', NULL),
          (85, 1, 2, 2, 'Izin Magang/PKL', 1, '0', '2019-04-22 11:37:20', '2019-04-22 11:37:58'),
          (86, 1, 2, 2, 'Izin Pemakaian Tempat', 1, '0', '2019-04-22 11:38:58', NULL),
          (87, 1, 2, 2, 'Izin Penelitian/Observasi', 1, '0', '2019-04-22 11:39:27', NULL),
          (88, 1, 7, 32, 'Surat Tugas Eksternal', 1, '0', '2019-04-22 11:41:29', NULL),
          (89, 1, 26, 33, 'Surat persetujuan pindah', 1, '0', '2019-04-22 11:43:08', NULL),
          (90, 1, 6, 1, 'Rekomendasi Surat Izin Belajar/Tugas Belajar', 1, '0', '2019-04-22 11:43:46', NULL);
          
          INSERT INTO `syarat_layanan` (`id`, `id_data_layanan`, `syarat`, `created_at`, `updated_at`) VALUES
          (1, 2, 'Surat Permohonan', '2019-04-23 08:13:54', NULL),
          (2, 1, 'Surat Permohonan', '2019-04-23 08:14:14', NULL),
          (3, 4, 'Surat Permohonan', '2019-04-23 08:14:40', NULL),
          (4, 4, 'Fotokopi Buku Nikah', '2019-04-23 08:14:55', NULL),
          (5, 4, 'Fotokopi KTP', '2019-04-23 08:15:12', NULL),
          (6, 4, 'Keterangan Tertulis tentang Permalasahan yang Dikonsultasikan', '2019-04-23 08:15:26', NULL),
          (7, 7, 'Surat Pengantar dari Ka KUA', '2019-04-23 08:16:51', NULL),
          (8, 7, 'Laporan', '2019-04-23 08:17:09', NULL),
          (9, 26, 'Surat Permohonan', '2019-04-23 08:18:13', NULL),
          (10, 26, 'Data Siswa', '2019-04-23 08:18:41', NULL),
          (11, 33, 'Surat Permohonan', '2019-04-23 08:36:23', NULL),
          (12, 33, 'Ijazah Asli yang akan diperbaiki', '2019-04-23 08:36:47', NULL),
          (13, 33, 'Foto Copy Akta Kelahiran/KK/KTP orang tua yang masih berlaku', '2019-04-23 08:37:47', NULL),
          (14, 47, 'Pemohon adalah pemilik sah ijasah/STTB yang salah penulisannya', '2019-04-23 08:39:11', NULL),
          (15, 47, 'Mengisi dan menyerahkan formulir permohonan (FM-SKP-02)', '2019-04-23 08:39:58', NULL),
          (16, 47, 'Mengisi form (FM-SKP-04), jika permohonan dikuasakan kepada orang lain', '2019-04-23 08:40:23', NULL),
          (17, 47, 'FC sah ijasah/STTB yang salah penulisannya', '2019-04-23 08:40:46', NULL),
          (18, 47, 'Menunjukkan ijasah/STTB asli yang salah penulisannya', '2019-04-23 08:41:04', NULL),
          (19, 47, 'Menandatangani dan menyerahkan Surat Pernyataan Tanggung Jawab Mutlak (FM-SKP-05)', '2019-04-23 08:41:25', NULL),
          (20, 47, 'Menyampaikan dan/atau menunjukkan keterangan/bukti/alasan yang menunjukkan adanya kesalahan penulisan pada ijasah/STTB', '2019-04-23 08:42:52', NULL),
          (21, 47, 'Pas Foto berwarna ukuran 3 x 4 (2 lembar)', '2019-04-23 08:43:16', NULL),
          (22, 47, 'Materai Rp. 6.000,-', '2019-04-23 08:43:36', NULL),
          (23, 45, 'Pemohon adalah pemilik sah Ijasah/STTP yang hilang, dengan dibuktikan dengan kartu identitas diri (KTP/KTM/KK);', '2019-04-23 09:05:00', NULL),
          (24, 45, 'Mengisi dan menyerahkan Form FM-SKP-04 (bagi yang dikuasakan orang lain);', '2019-04-23 09:05:27', NULL),
          (25, 45, 'Menyampaikan fotokopi Ijazah/STTB yang hilang, buku rapor asli, dan/atau dokumen lain yang terkait dari pemilik Ijazah/STTB yang hilang untuk dijadikan dasar bagi Kepala/pejabat yang berwenang lainnya untuk memvalidasi keabsahan kepemilikan Ijazah/STTB;', '2019-04-23 09:07:04', NULL),
          (26, 45, 'Menyampaikan Surat Keterangan Pengganti Ijazah Hilang yang telah diterbitkan oleh Madrasah.', '2019-04-23 09:07:24', NULL),
          (27, 41, 'Mengisi dan menandatangani formulir permohonan pengesahan fotokopi Ijazah/STTB/SKP Ijazah (FM-PI-01)', '2019-04-23 09:07:53', NULL),
          (28, 41, 'Menandatangani Surat Pernyataan Tanggung Jawab Mutlak yang dibubuhi materai 6000 (FM-PI-03)', '2019-04-23 09:08:10', NULL),
          (29, 41, 'Menunjukkan Ijazah/STTB/SKP Ijazah asli yang akan disahkan;', '2019-04-23 09:08:28', NULL),
          (30, 41, 'Menyerahkan fotokopi Ijazah/STTB/SKP Ijazah yang akan disahkan paling banyak 10 (sepuluh) lembar;', '2019-04-23 09:08:45', NULL),
          (32, 33, 'Surat Permohonan', '2019-04-23 09:11:17', NULL),
          (33, 33, 'Ijazah Asli yang akan diperbaiki', '2019-04-23 09:11:35', NULL),
          (34, 33, 'Foto Copy Akta Kelahiran/KK/KTP orang tua yang masih berlaku', '2019-04-23 09:11:53', NULL),
          (35, 69, 'Fotocopy KTP (2 Lembar)', '2019-04-23 09:15:41', NULL),
          (36, 69, 'Fotocopy Kartu Keluarga (2 Lembar)', '2019-04-23 09:16:40', NULL),
          (37, 69, 'Fotocopy Surat/Akte Kelahiran/Ijazah /Nikah (2 Lembar)', '2019-04-23 09:17:10', NULL),
          (38, 69, 'Fotocopy BPIH  (2 Lembar)', '2019-04-23 09:17:50', NULL),
          (39, 70, 'Surat Rekomendasi Pembuatan Paspor Umrah Asli dari Travel', NULL, NULL),
          (40, 70, 'Fotocopy KTP (2 lembar)', NULL, NULL),
          (41, 70, 'Fotocopy Kartu Keluarga (2 lembar)', NULL, NULL),
          (42, 70, 'Fotocopy Surat/Akte Kelahiran/Ijazah/Nikah (2 lembar)', NULL, NULL),
          (43, 70, 'Fotocopy SK Travel Umrah (2 lembar)', NULL, NULL),
          (44, 70, 'Fotocopy Kwitansi Pembayaran (2 lembar)', NULL, NULL),
          (45, 70, 'Fotocopy Paspor (bagi jamaah yang sudah memiliki paspor) (2 lembar)', NULL, NULL),
          (46, 68, 'Permohonan Ahli Waris diatas Materai 6000 ditujukan kepada Kepala Kantor Kementerian Agama Kota Bukittinggi', NULL, NULL),
          (47, 68, 'Fotocopy KTP Almarhum (2 lembar)', NULL, NULL),
          (48, 68, 'Fotocopy KTP Ahli Waris (2 lembar)', NULL, NULL),
          (49, 68, 'BPIH Asli dan Fotocopy  (masing-masing 1 lembar)', NULL, NULL),
          (50, 68, 'Surat Keterangan Ahli Waris Asli dan Fotocopy dari Lurah (masing-masing 1 lembar)', NULL, NULL),
          (51, 68, 'Surat Keterangan Meninggal Dunia dari Kelurahan Asli dan foto copy (masing-masing 1 lembar)', NULL, NULL),
          (52, 68, 'Fotocopy Rekening Ahli Waris yang Satu Bank dengan Almarhum (2 lembar)', NULL, NULL),
          (53, 56, 'FC Akta Notaris Pendirian PT sebagai Biro perjalanan Wisata yang memiliki bidang keagamaan/perjalanan ibadah', NULL, NULL),
          (54, 56, 'FC Surat Pengesahan Akta Notaris dari Kemenkumham', NULL, NULL),
          (55, 56, 'FC Ijin Usaha Biro Perjalanan Wisata setempat harus sudah beroperasional paling singkat 2 (dua) tahu dibuktikan dengan Tanda Daftar Usaha Pariwisata (TDUP)', NULL, NULL),
          (56, 56, 'FC Surat Keterangan Domisili Usaha (SKDU) dari Pemda setempat yang masih berlaku', NULL, NULL),
          (57, 56, 'FC Surat Keterangan Terdaftar sebagai Wajib Pajak dari Dirjen Pajak Kementerian Keuangan', NULL, NULL),
          (58, 56, 'Surat Rekomendasi dari Kankemenag Kabupaten/Kota setempat (asli)', NULL, NULL),
          (59, 56, 'FC Surat Rekomendasi dari instansi Pemda Provinsi setempat dan/atau Kab/Kota setempat yang membidangi pariwisata', NULL, NULL),
          (60, 56, 'FC Laporan Keuangan perusahaan 1 (satu) tahun terakhir dan telah diaudit Akuntan Publik', NULL, NULL),
          (61, 56, 'Susunan dan struktur pengurus perusahaan (asli)', NULL, NULL),
          (62, 56, 'FC Kartu Tanda Penduduk (KTP) dan Biodata Pemegang saham dan anggota Direksi dan Komisaris (Semua WNI beragama Islam)', NULL, NULL),
          (63, 56, 'FC NPWP atas nama perusahaan dan pimpinan perusahaan', NULL, NULL),
          (64, 56, 'Memiliki SDM berpengalaman di bidang BPW (minimal 3 orang): ticketing, tour planner, dokumen perjalanan, berpengalaman di bidang keuangan', NULL, NULL),
          (65, 56, 'Memilliki kantor domisili tetap dan atau sewa minimal 3 (tiga) tahun dan dilengkapi sarana prasarana  (ruang minimal 60 m2)', NULL, NULL),
          (66, 56, 'Memiliki mitra biro penyelenggara ibadah ibadah umrah di Arab Saudi yang mempunyai ijin resmi dari Pemerintah Kerajaan Arab Saudi', NULL, NULL),
          (67, 56, 'FC Sertifikat keanggotaan ASITA', NULL, NULL),
          (68, 56, 'Foto-foto kondisi muka kantor dan ruang pelayanan serta kegiatan bimbingan umrah', NULL, NULL),
          (69, 59, 'FC Akta Notaris Pendirian PT sebagai Biro perjalanan Wisata yang memiliki bidang keagamaan/perjalanan ibadah', NULL, NULL),
          (70, 59, 'FC Surat Pengesahan Akta Notaris dari Kemenkumham', NULL, NULL),
          (71, 59, 'FC Ijin Usaha Biro Perjalanan Wisata setempat harus sudah beroperasional paling singkat 2 (dua) tahu dibuktikan dengan Tanda Daftar Usaha Pariwisata (TDUP)', NULL, NULL),
          (72, 59, 'FC Surat Keterangan Domisili Usaha (SKDU) dari Pemda setempat yang masih berlaku', NULL, NULL),
          (73, 59, 'FC Surat Keterangan Terdaftar sebagai Wajib Pajak dari Dirjen Pajak Kementerian Keuangan', NULL, NULL),
          (74, 59, 'Surat Rekomendasi dari Kankemenag Kabupaten/Kota setempat (asli)', NULL, NULL),
          (75, 59, 'FC Surat Rekomendasi dari instansi Pemda Provinsi setempat dan/atau Kab/Kota setempat yang membidangi pariwisata', NULL, NULL),
          (76, 59, 'FC Laporan Keuangan perusahaan 1 (satu) tahun terakhir dan telah diaudit Akuntan Publik', NULL, NULL),
          (77, 59, 'Susunan dan struktur pengurus perusahaan (asli)', NULL, NULL),
          (78, 59, 'FC Kartu Tanda Penduduk (KTP) dan Biodata Pemegang saham dan anggota Direksi dan Komisaris (Semua WNI beragama Islam)', NULL, NULL),
          (79, 59, 'FC NPWP atas nama perusahaan dan pimpinan perusahaan', NULL, NULL),
          (80, 59, 'Memiliki SDM berpengalaman di bidang BPW (minimal 3 orang): ticketing, tour planner, dokumen perjalanan, berpengalaman di bidang keuangan', NULL, NULL),
          (81, 59, 'Memilliki kantor domisili tetap dan atau sewa minimal 3 (tiga) tahun dan dilengkapi sarana prasarana  (ruang minimal 60 m2)', NULL, NULL),
          (82, 59, 'Memiliki mitra biro penyelenggara ibadah ibadah umrah di Arab Saudi yang mempunyai ijin resmi dari Pemerintah Kerajaan Arab Saudi', NULL, NULL),
          (83, 59, 'FC Sertifikat keanggotaan ASITA', NULL, NULL),
          (84, 59, 'Foto-foto kondisi muka kantor dan ruang pelayanan serta kegiatan bimbingan umrah', NULL, NULL),
          (85, 59, 'Laporan pelaksanaan Penyelenggaraan Ibadah Umrah 2 (dua) tahun terakhir yang dibuktikan dengan daftar jamaah yang telah mengikutinya/terdaftar di PPIU-nya', NULL, NULL),
          (86, 59, 'Bukti telah memberangkatkan jemaah umrah minimal 200 orang selama 3 (tiga) tahun;', NULL, NULL),
          (87, 59, 'Hasil akreditasi PPUI minimal B', NULL, NULL),
          (88, 59, 'Surat Keputusan Penetapan sebagai PPIU/ijin operasional PPIU yang masih berlaku', NULL, NULL),
          (89, 67, 'Permohonan diatas materai 6000, ditujukan kepada Kepala Kantor Kementerian Agama Kota Bukittinggi', NULL, NULL),
          (90, 67, 'Fotocopy KTP (2 lembar)', NULL, NULL),
          (91, 67, 'BPIH Asli dan Fotocopy (masing-masing 1 lembar)', NULL, NULL),
          (92, 60, 'Surat permohonan dari Calon Jamaah Haji', NULL, NULL),
          (93, 60, 'Surat bukti Pelunasan BPIH ( Biaya Penyelenggaraan Ibadah Haji )', NULL, NULL),
          (94, 75, 'Surat Pengantar dari Madrasah', NULL, NULL),
          (95, 75, 'Foto Copy Karpeg', NULL, NULL),
          (96, 75, 'Foto Copy SK Pangkat Terakhir', NULL, NULL),
          (97, 75, 'Foto Copy SK Jabatan Terakhir', NULL, NULL),
          (98, 75, 'SKP 2 Tahun terakhir baik', NULL, NULL),
          (99, 75, 'SPMT, Surat Pernyataan Pelantikan,Surat Pernyataan Serah Terima Jabatan (Bagi Pejabat Struktural)', NULL, NULL),
          (100, 75, 'SK Jabatan  Stuktural', NULL, NULL),
          (101, 89, 'Surat permohonan dari yang besangkutan', NULL, NULL),
          (102, 89, 'SK Pangkat terakhir', NULL, NULL),
          (103, 89, 'SK Jabatan Terakhir', NULL, NULL),
          (104, 89, 'SKP 2 tahun terakhir baik', NULL, NULL),
          (105, 89, 'Persetujuan menerima dari Satker /Kakankemenag yang akan menerima', NULL, NULL),
          (106, 89, 'Bezetting kebutuhan pegawai', NULL, NULL),
          (107, 89, 'Persetujuan melepas dari tempat tugas sekarang', NULL, NULL),
          (108, 88, 'Surat Permohonan', NULL, NULL),
          (109, 88, 'Dasar Surat Penugasan/Pemanggilan', NULL, NULL),
          (110, 74, 'Foto Copy Karpeg', NULL, NULL),
          (111, 74, 'Foto Copy SK Pangkat Terakhir', NULL, NULL),
          (112, 74, 'Foto Copy SK Jabatan Terakhir', NULL, NULL),
          (113, 74, 'Foto Copy SK PAK Terakhir', NULL, NULL),
          (114, 74, 'SKP 2 Tahun Terakhir', NULL, NULL),
          (115, 74, 'DUPAK', NULL, NULL),
          (116, 74, 'Penilaian Kinerja Guru', NULL, NULL),
          (117, 74, 'Bukti fisik sesuai dengan DUPAK', NULL, NULL),
          (118, 81, 'Surat Permohonan/Pemberitahuan', NULL, NULL),
          (119, 81, 'Lampiran yang menjadi bukti-bukti terjadinya fraud', NULL, NULL),
          (120, 90, 'FC Sah SK CPNS', NULL, NULL),
          (121, 90, 'FC Sah SK PNS', NULL, NULL),
          (122, 90, 'FC Sah SK Pangkat Terakhir', NULL, NULL),
          (123, 90, 'FC Sah KARPEG', NULL, NULL),
          (124, 90, 'FC Sah Ijazah Terakhir', NULL, NULL),
          (125, 90, 'FC Sah Penilaian Prestasi Kerja + FC Sah SKP 2 Tahun terakhir', NULL, NULL),
          (126, 90, 'Surat Pernyataan Tidak Mutasi', NULL, NULL),
          (127, 90, 'Surat Pernyataan Tidak Menggangu Tugas Kedinasan', NULL, NULL),
          (128, 90, 'Surat Pernyataan Tidak Menuntut Penyesuaian Ijasah', NULL, NULL),
          (129, 90, 'Surat Pernyataan Tidak Pernah Dijatuhi Hukuman Disiplin Tingkat Sedang atau Berat', NULL, NULL),
          (130, 90, 'Surat Keterangan Masih Aktif Kuliah Terbaru', NULL, NULL),
          (131, 90, 'Jadwal Kuliah Terbaru', NULL, NULL),
          (132, 90, 'Surat Keterangan Akriditasi Jurusan (minimal B)', NULL, NULL),
          (133, 90, 'Profil Pergurian Tinggi/Radius Lokasi', NULL, NULL),
          (134, 90, 'Surat Rekomendasi dari Kepala Kankemenag Kabupaten/Kota', NULL, NULL),
          (135, 90, 'FC SK Mutasi terakhir (jika pada saat pengajuan, terdapat beda tempat tugas terakhir dengan tempat tugas yang tercantum pada SK Pangkat terakhir', NULL, NULL),
          (136, 73, 'Surat Permohonan', NULL, NULL),
          (137, 85, 'Surat Pemohonan Magang dari Pimpinan Lembaga', NULL, NULL),
          (138, 85, 'Daftar nama peserta magang/praktek lapangan', NULL, NULL),
          (139, 84, 'Surat Permohonan Audiensi', NULL, NULL),
          (140, 87, 'Surat Permohonan/Pengantar dari Lembaga Pendidikan', NULL, NULL),
          (141, 87, 'Surat Rekomendasi dari Kesbanglinmas', NULL, NULL);"
        );

        $data = DB::table('modul')
                ->get();

        foreach ($data as $key => $value) {
          DB::table('level_akses')
          ->insert([
            [
              'id_level' => '1',
              'id_modul' => $value->id,
              'l' => true, //lihat
              'd' => true, //detail
              't' => true, //tambah
              'u' => true, //ubah
              'h' => true, //hapus
            ],
            [
              'id_level' => '2',
              'id_modul' => $value->id,
              'l' => true, //lihat
              'd' => true, //detail
              't' => true, //tambah
              'u' => true, //ubah
              'h' => true, //hapus
            ],
            [
              'id_level' => '3',
              'id_modul' => $value->id,
              'l' => true, //lihat
              'd' => true, //detail
              't' => true, //tambah
              'u' => true, //ubah
              'h' => true, //hapus
            ],
            [
              'id_level' => '4',
              'id_modul' => $value->id,
              'l' => true, //lihat
              'd' => true, //detail
              't' => true, //tambah
              'u' => true, //ubah
              'h' => true, //hapus
            ],
            [
              'id_level' => '5',
              'id_modul' => $value->id,
              'l' => true, //lihat
              'd' => true, //detail
              't' => true, //tambah
              'u' => true, //ubah
              'h' => true, //hapus
            ],
          ]);
        }

        DB::unprepared('CREATE OR REPLACE VIEW view_pelayanan AS
          SELECT pelayanan.*, unit_user.nama_unit, unit_pengolah.nama_unit_pengolah, jenis_layanan.jenis_layanan, data_layanan.nama_layanan, data_layanan.lama_layanan, output.output, data_layanan.biaya FROM `pelayanan`
          LEFT JOIN data_layanan ON data_layanan.id = pelayanan.id_data_layanan
          LEFT JOIN unit_pengolah ON unit_pengolah.id = data_layanan.id_unit_pengolah
          LEFT JOIN jenis_layanan ON jenis_layanan.id = data_layanan.id_jenis_layanan
          LEFT JOIN unit_user ON unit_user.id = pelayanan.id_unit
          LEFT JOIN output ON output.id = data_layanan.id_output
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    { 
      DB::unprepared('DROP VIEW `view_pelayanan`');
      Schema::dropIfExists('data_syarat');
      Schema::dropIfExists('pelayanan');
      Schema::dropIfExists('syarat_layanan');
      Schema::dropIfExists('data_layanan');
      Schema::dropIfExists('output');
      Schema::dropIfExists('jenis_layanan');
      Schema::dropIfExists('unit_pengolah');
      Schema::dropIfExists('level_akses');
      Schema::dropIfExists('users');
      Schema::dropIfExists('level_user');
      Schema::dropIfExists('unit_user');
      Schema::dropIfExists('modul');
    }
}
