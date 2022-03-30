@extends('master_cetak')

@section('content')
<div class="row">
  <div class="col-sm-12">

    <div class="card card-default">

      <!-- Isi dari content yang ada  -->
      <div class="card-body" style="position: relative">
        <table style="width:100%;">
          <tr>
            <td class="text-center" colspan="2" width="5px">
              <img src="{{ url('img/kemenag-logo.png') }}" width="100" alt="">
            </td>
            <td colspan="2">
              <h5 class="text-center">KEMENTRIAN AGAMA REPUBLIK INDONESIA<br>KANTOR KEMENTRIAN AGAMA KOTA SAWAHLUNTO</h5>
              <h6 class="text-center">Jln. Soekarno Hatta Kel. Lubang Panjang Telp. (0754) 61212<br>Email: Sawahlunto@kemenag.go.id - kotasawahlunto@kemenag.go.id</h6>
            </td>
          </tr>
        </table>
        
        <div style="width:100%; border-bottom: 3px double #000; margin: 10px 0 10px 0"></div>
        <br>
        
        <table style="width:100%">
          <tr>
            <td colspan="5">
              <h3 class="text-center"><b>PELAYANAN TERPADU SATU PINTU (PTSP)</b></h3>
              <h4 class="text-center">BUKTI TERIMA SURAT/BERKAS PERMOHONAN</h4>
            </td>
          </tr>
          <tr>
            <td colspan="5">&nbsp;</td>
          </tr>
          <tr>
            <td width="20%">&nbsp;</td>
            <td width="20%"><b>Instansi Tujuan</b></td>
            <td width="2%">:</td>
            <td><b>{{ $data->nama_unit }}</b></td>
            <td width="20%">&nbsp;</td>
          </tr>
          <tr>
            <td width="20%">&nbsp;</td>
            <td width="30%"><b>No Registrasi PTSP</b></td>
            <td width="2%">:</td>
            <td><b>{{ $data->no_registrasi }}</b></td>
            <td width="20%">&nbsp;</td>
          </tr>
          <tr>
            <td width="20%">&nbsp;</td>
            <td width="30%"><b>Isi Permohonan</b></td>
            <td width="2%">:</td>
            <td><b>{{ $data->perihal }}</b></td>
            <td width="20%">&nbsp;</td>
          </tr>
          <tr>
            <td width="20%">&nbsp;</td>
            <td width="30%"><b>No. Surat Permohonan</b></td>
            <td width="2%">:</td>
            <td><b>{{ $data->no_surat_pemohon }}</b></td>
            <td width="20%">&nbsp;</td>
          </tr>
          <tr>
            <td width="20%">&nbsp;</td>
            <td width="30%"><b>Tgl. Surat Permohonan</b></td>
            <td width="2%">:</td>
            <td><b>{{ Helper::date_to_view($data->tgl_surat_pemohon) }}</b></td>
            <td width="20%">&nbsp;</td>
          </tr>
          <tr>
            <td width="20%">&nbsp;</td>
            <td width="30%"><b>Nama Pemohon</b></td>
            <td width="2%">:</td>
            <td><b>{{ $data->nama_pemohon }}</b></td>
            <td width="20%">&nbsp;</td>
          </tr>
          <tr>
            <td width="20%">&nbsp;</td>
            <td width="30%"><b>Alamat Pemohon</b></td>
            <td width="2%">:</td>
            <td><b>{{ $data->alamat_pemohon }}</b></td>
            <td width="20%">&nbsp;</td>
          </tr>
          <tr>
            <td width="20%">&nbsp;</td>
            <td width="30%"><b>Tgl. Surat Masuk</b></td>
            <td width="2%">:</td>
            <td><b>{{ date('d-m-Y H:i',strtotime($data->tgl_terima)) }}</b></td>
            <td width="20%">&nbsp;</td>
          </tr>
          <tr>
            <td width="20%">&nbsp;</td>
            <td width="30%"><b>Estimasi Tgl. Surat Selesai</b></td>
            <td width="2%">:</td>
            <td><b>{{ Helper::date_to_view($data->tgl_selesai) }}</b></td>
            <td width="20%">&nbsp;</td>
          </tr>
          <tr>
            <td width="20%">&nbsp;</td>
            <td width="30%"><b>Status Layanan</b></td>
            <td width="2%">:</td>
            <td><b>{{ $data->status_layanan }}</b></td>
            <td width="20%">&nbsp;</td>
          </tr>
          <tr>
            <td width="20%">&nbsp;</td>
            <td width="30%"><b>Unit Pengolah</b></td>
            <td width="2%">:</td>
            <td><b>{{ $data->nama_unit_pengolah }}</b></td>
            <td width="20%">&nbsp;</td>
          </tr>
        </table>
        <br><br>
        <div style="width:100%; border-bottom: 3px double #000; margin: 10px 0 10px 0"></div>
        <p class="text-center">Sawahlunto, {{date('d M Y')}}</p>
      </div>
    </div>
  </div>
</div>
@endsection