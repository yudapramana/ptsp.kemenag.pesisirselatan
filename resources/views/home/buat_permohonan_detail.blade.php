@extends('master_web')

@section('content')
@include('header_page')
<section class="web-header-page" id="web-home">
    <div class="web-overlay"></div>
    <div class="web-header-content">
        <div class="container">
            <img src="{{ url('img/kemenag-logo.png') }}" alt="" width="150">
            <br>
            <br>
            <h1><b>PELAYANAN TERPADU SATU PINTU (PTSP)</b></h1>
            <h1><b>KEMENTERIAN AGAMA SAWAHLUNTO</b></h1>
        </div>
    </div>
</section>

<section class="web-data">
    <div class="container">
      <div class="row">
        <div class="col">
            <h1 class="text-uppercase">Detail Permohonan</h1>
            <h4 class="h4-header">{{ $data->nama_layanan }}</h4>
            
            <div class="alert alert-info alert-dismissible">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <strong>Info!</strong> Mohon catat <b>No. Registrasi</b> berikut, atau print halaman ini.
            </div>

            <div class="card card-default mt-5">
              <!-- Isi dari content yang ada  -->
              <div class="card-body" style="position: relative">
                <table style="width:100%;">
                  <tr>
                    <td width="20%">&nbsp;</td>
                    <td class="text-center">
                      <img src="{{ url('img/kemenag-logo.png') }}" width="100" alt="">
                    </td>
                    <td>
                      <h4 class="text-center">KEMENTERIAN AGAMA REPUBLIK INDONESIA<br>KANTOR KEMENTERIAN AGAMA KOTA SAWAHLUNTO</h4>
                      <h6 class="text-center">Jln. Soekarno Hatta Kel. Lubang Panjang Telp. (0754) 61212<br>Email: Sawahlunto@KEMENTERIAN AGAMA.go.id - kotasawahlunto@KEMENTERIAN AGAMA.go.id</h6>
                    </td>
                    <td width="20%">&nbsp;</td>
                  </tr>
                </table>
                
                <div style="width:100%; border-bottom: 3px double #000; margin: 10px 0 10px 0"></div>

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
                    <td width="20%"><b>No Registrasi PTSP</b></td>
                    <td width="2%">:</td>
                    <td><b>{{ $data->no_registrasi }}</b></td>
                    <td width="20%">&nbsp;</td>
                  </tr>
                  <tr>
                    <td width="20%">&nbsp;</td>
                    <td width="20%"><b>Isi Permohonan</b></td>
                    <td width="2%">:</td>
                    <td><b>{{ $data->perihal }}</b></td>
                    <td width="20%">&nbsp;</td>
                  </tr>
                  <tr>
                    <td width="20%">&nbsp;</td>
                    <td width="20%"><b>No. Surat Permohonan</b></td>
                    <td width="2%">:</td>
                    <td><b>{{ $data->no_surat_pemohon }}</b></td>
                    <td width="20%">&nbsp;</td>
                  </tr>
                  <tr>
                    <td width="20%">&nbsp;</td>
                    <td width="20%"><b>Tgl. Surat Permohonan</b></td>
                    <td width="2%">:</td>
                    <td><b>{{ Helper::date_to_view($data->tgl_surat_pemohon) }}</b></td>
                    <td width="20%">&nbsp;</td>
                  </tr>
                  <tr>
                    <td width="20%">&nbsp;</td>
                    <td width="20%"><b>Nama Pemohon</b></td>
                    <td width="2%">:</td>
                    <td><b>{{ $data->nama_pemohon }}</b></td>
                    <td width="20%">&nbsp;</td>
                  </tr>
                  <tr>
                    <td width="20%">&nbsp;</td>
                    <td width="20%"><b>Alamat Pemohon</b></td>
                    <td width="2%">:</td>
                    <td><b>{{ $data->alamat_pemohon }}</b></td>
                    <td width="20%">&nbsp;</td>
                  </tr>
                  <tr>
                    <td width="20%">&nbsp;</td>
                    <td width="20%"><b>Tgl. Surat Masuk</b></td>
                    <td width="2%">:</td>
                    <td><b>{{ date('d-m-Y H:i',strtotime($data->tgl_terima)) }}</b></td>
                    <td width="20%">&nbsp;</td>
                  </tr>
                  <tr>
                    <td width="20%">&nbsp;</td>
                    <td width="20%"><b>Estimasi Tgl. Surat Selesai</b></td>
                    <td width="2%">:</td>
                    <td><b>{{ Helper::date_to_view($data->tgl_selesai) }}</b></td>
                    <td width="20%">&nbsp;</td>
                  </tr>
                  <tr>
                    <td width="20%">&nbsp;</td>
                    <td width="20%"><b>Status Layanan</b></td>
                    <td width="2%">:</td>
                    <td><b>{{ $data->status_layanan }}</b></td>
                    <td width="20%">&nbsp;</td>
                  </tr>
                  <tr>
                    <td width="20%">&nbsp;</td>
                    <td width="20%"><b>Unit Pengolah</b></td>
                    <td width="2%">:</td>
                    <td><b>{{ $data->nama_unit_pengolah }}</b></td>
                    <td width="20%">&nbsp;</td>
                  </tr>
                </table>

                <div style="width:100%; border-bottom: 3px double #000; margin: 10px 0 10px 0"></div>
                <p class="text-center">Sawahlunto, {{date('d M Y')}}</p>
              </div>

              <div class="card-footer text-right bg-teal">
                <a href="{{ url('/') }}" class="btn btn-default"> <i class="fa fa-arrow-left"></i> Kembali</a>
                <a href="{{ url('buat_permohonan/cetak/'.Helper::encrypt($data->id)) }}" class="btn btn-warning" target="_blank"> <i class="fa fa-print"></i> Cetak</a>
              </div>
            </div>
        </div>
      </div>
    </div>    
</section>

<section class="web-footer">
    <div class="container">
        <strong>Copyright &copy; 2019 <a href="http://danshouse.site">danshouse</a>.</strong>
        All rights reserved.
    </div>
</section>
@endsection

@section('js')
<script>
  function get_syarat() { 
    $.ajax({
      type: "POST",
      url: "{{ url('get_syarat_layanan') }}",
      data: {
        "_token":"{{ csrf_token() }}",
        "id_data_layanan": $('input[name=id_data_layanan]').val(),
      },
      beforeSend: function () { 

      },
      success: function (response) {
        data = jQuery.parseJSON(response);
        html = ``;
        $.each(data, function (index, value) { 
          html+= `
              <div class="form-group {{ $errors->has('lampiran.`+index+`') ? 'has-error' : '' }}">
                <label class="control-label">`+value.syarat+`</label>
                <div class="col-sm-12">
                  <input type="hidden" class="form-control" name="id_syarat_layanan[]" value="`+value.id+`"></input>
                  <input type="file" class="form-control" name="lampiran[]" accept="image/*,application/pdf"></input>
                  <span class="help-block">{{ $errors->has('lampiran') ? $errors->first('lampiran') : '' }}</span>
                </div>
              </div>
          `;
             
        });

        $('.form-syarat').html(html);
      },
      error: function () { 
        $('.modal-message').modal();
      }
    });    
  }

  $(document).ready(function () {
    $('.data-tanggal').datepicker({
      format: 'dd-mm-yyyy',
      autoclose: true
    });
  });
</script>
@stop

