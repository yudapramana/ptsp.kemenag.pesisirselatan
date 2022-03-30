@extends('master_panel')

@section('header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambah Pelayanan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ url('pelayanan') }}">Pelayanan</a></li>
                <li class="breadcrumb-item active">Tambah Pelayanan</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.container-fluid -->
@endsection

@section('content')
<div class="row">
  <div class="col-sm-12">
    @if(Session::has("pesan_berhasil"))
    <div class="alert alert-success alert-dismissable text-center icon-font">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <i class="fa fa-info-circle"></i>  {{ session('pesan_berhasil') }}
    </div>
    @elseif(Session::has("pesan_gagal"))
    <div class="alert alert-danger alert-dismissable text-center icon-font">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <i class="fa fa-exclamation-triangle"></i>  {{ session('pesan_gagal') }}
    </div>
    @elseif(count($errors) > 0)
    <div class="alert alert-danger alert-dismissable text-center icon-font">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <i class="fa fa-exclamation-triangle"></i>  Mohon periksa kembali inputan anda
    </div>
    @endif
    <div class="card card-default">
      {{ Form::open(['url'=>'pelayanan/tambah', 'method'=>'post', 'class'=>'form-horizontal','files'=>true]) }}
      <!-- end card-header -->

      <div class="card-body">
          <div class="form-group {{ $errors->has('id_data_layanan') ? 'has-error' : '' }}">
            {{ Form::label('Nama Layanan','', ['class'=>'control-label']) }}
            <div class="col-sm-12">
              {{ Form::select('id_data_layanan',Helper::get_data_layanan_arr(),'',['class'=>'form-control', 'placeholder'=>'-- Nama layanan --']) }}
              <span class="help-block">{{ $errors->has('id_data_layanan') ? $errors->first('id_data_layanan') : '' }}</span>
            </div>
          </div>
          <div class="form-group {{ $errors->has('perihal') ? 'has-error' : '' }}">
            {{ Form::label('Perihal','', ['class'=>'control-label']) }}
            <div class="col-sm-12">
              {{ Form::text('perihal','',['class'=>'form-control']) }}
              <span class="help-block">{{ $errors->has('perihal') ? $errors->first('perihal') : '' }}</span>
            </div>
          </div>
          <div class="form-group {{ $errors->has('no_surat_pemohon') ? 'has-error' : '' }}">
            {{ Form::label('No. Surat Pemohon','', ['class'=>'control-label']) }}
            <div class="col-sm-12">
              {{ Form::text('no_surat_pemohon','',['class'=>'form-control']) }}
              <span class="help-block">{{ $errors->has('no_surat_pemohon') ? $errors->first('no_surat_pemohon') : '' }}</span>
            </div>
          </div>
          <div class="form-group {{ $errors->has('tgl_surat_pemohon') ? 'has-error' : '' }}">
            {{ Form::label('Tgl. Surat Pemohon','', ['class'=>'control-label']) }}
            <div class="col-sm-12">
              {{ Form::text('tgl_surat_pemohon',date('d-m-Y'),['class'=>'form-control data-tanggal']) }}
              <span class="help-block">{{ $errors->has('tgl_surat_pemohon') ? $errors->first('tgl_surat_pemohon') : '' }}</span>
            </div>
          </div>
          <div class="form-group {{ $errors->has('nama_pemohon') ? 'has-error' : '' }}">
            {{ Form::label('Nama Pemohon','', ['class'=>'control-label']) }}
            <div class="col-sm-12">
              {{ Form::text('nama_pemohon','',['class'=>'form-control']) }}
              <span class="help-block">{{ $errors->has('nama_pemohon') ? $errors->first('nama_pemohon') : '' }}</span>
            </div>
          </div>
          <div class="form-group {{ $errors->has('alamat_pemohon') ? 'has-error' : '' }}">
            {{ Form::label('Alamat Pemohon','', ['class'=>'control-label']) }}
            <div class="col-sm-12">
              {{ Form::text('alamat_pemohon','',['class'=>'form-control']) }}
              <span class="help-block">{{ $errors->has('alamat_pemohon') ? $errors->first('alamat_pemohon') : '' }}</span>
            </div>
          </div>
          <div class="form-group {{ $errors->has('nama_pengirim') ? 'has-error' : '' }}">
            {{ Form::label('Nama Pengirim','', ['class'=>'control-label']) }}
            <div class="col-sm-12">
              {{ Form::text('nama_pengirim','',['class'=>'form-control']) }}
              <span class="help-block">{{ $errors->has('nama_pengirim') ? $errors->first('nama_pengirim') : '' }}</span>
            </div>
          </div>
          <div class="form-group {{ $errors->has('no_telp_pemohon') ? 'has-error' : '' }}">
            {{ Form::label('No. Telp. Pemohon','', ['class'=>'control-label']) }}
            <div class="col-sm-12">
              {{ Form::text('no_telp_pemohon','',['class'=>'form-control']) }}
              <span class="help-block">{{ $errors->has('no_telp_pemohon') ? $errors->first('no_telp_pemohon') : '' }}</span>
            </div>
          </div>
          <div class="form-group {{ $errors->has('kelengkapan_syarat') ? 'has-error' : '' }}">
            {{ Form::label('Kelengkapan Syarat','', ['class'=>'control-label']) }}
            <div class="col-sm-12">
              {{ Form::select('kelengkapan_syarat',['Lengkap'=>'Lengkap','Belum Lengkap'=>'Belum Lengkap'],'',['class'=>'form-control','placeholder'=>'-- Kelengkapan syarat --']) }}
              <span class="help-block">{{ $errors->has('kelengkapan_syarat') ? $errors->first('kelengkapan_syarat') : '' }}</span>
            </div>
          </div>
          <div class="form-group {{ $errors->has('status_layanan') ? 'has-error' : '' }}">
            {{ Form::label('Status Layanan','', ['class'=>'control-label']) }}
            <div class="col-sm-12">
              {{ Form::select('status_layanan',['Proses'=>'Proses','Selesai'=>'Selesai','Diambil'=>'Diambil'],'',['class'=>'form-control','placeholder'=>'-- Status Layanan --']) }}
              <span class="help-block">{{ $errors->has('status_layanan') ? $errors->first('status_layanan') : '' }}</span>
            </div>
          </div>
          <div class="form-group {{ $errors->has('catatan') ? 'has-error' : '' }}">
            {{ Form::label('Catatan','', ['class'=>'control-label']) }}
            <div class="col-sm-12">
              {{ Form::textarea('catatan','',['class'=>'form-control','rows'=>'4']) }}
              <span class="help-block">{{ $errors->has('catatan') ? $errors->first('catatan') : '' }}</span>
            </div>
          </div>
          <div class="form-pengambilan">
            <div class="form-group {{ $errors->has('no_surat_terbit') ? 'has-error' : '' }}">
              {{ Form::label('No. Surat Terbit','', ['class'=>'control-label']) }}
              <div class="col-sm-12">
                {{ Form::text('no_surat_terbit','',['class'=>'form-control']) }}
                <span class="help-block">{{ $errors->has('no_surat_terbit') ? $errors->first('no_surat_terbit') : '' }}</span>
              </div>
            </div>
            <div class="form-group {{ $errors->has('tgl_surat_terbit') ? 'has-error' : '' }}">
              {{ Form::label('Tgl. Surat Terbit','', ['class'=>'control-label']) }}
              <div class="col-sm-12">
                {{ Form::text('tgl_surat_terbit',date('d-m-Y'),['class'=>'form-control data-tanggal']) }}
                <span class="help-block">{{ $errors->has('tgl_surat_terbit') ? $errors->first('tgl_surat_terbit') : '' }}</span>
              </div>
            </div>
            <div class="form-group {{ $errors->has('nama_pengambil') ? 'has-error' : '' }}">
              {{ Form::label('Nama Pegambil','', ['class'=>'control-label']) }}
              <div class="col-sm-12">
                {{ Form::text('nama_pengambil','',['class'=>'form-control']) }}
                <span class="help-block">{{ $errors->has('nama_pengambil') ? $errors->first('nama_pengambil') : '' }}</span>
              </div>
            </div>
          </div>
          <div class="form-syarat">
          </div>
      </div>
      <!-- end card-body -->

      <div class="card-footer">
        <div class="text-right">
          <a href="{{url('pelayanan')}}" class="btn btn-sm btn-default btn-flat"><i class="fa fa-arrow-left"></i> Kembali</a>
          {{ Form::button('<i class="fa fa-save"></i> Simpan',['class'=>'btn btn-sm btn-success btn-flat','type'=>'submit']) }}
        </div>
      </div>
      <!-- end card-footer -->
    </div>
    {{ Form::close() }}
  </div>
  <!-- end col-sm-12 -->
</div>
<!-- end row -->
@endsection

@section('modal')
<!-- Modal Hapus -->
<div class="modal fade modal-message" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header" style="background-color: #dd4b39">
        <h4 class="modal-title" style="color: #fff">Koneksi Bermasalah</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <p>Jaringan tidak stabil, mohon ulangi kembali</p>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button class="btn btn-danger" data-dismiss="modal">Kembali</button>
      </div>

    </div>
  </div>
</div>
@endsection

@section('js')
<script>
  function get_syarat() { 
    $.ajax({
      type: "POST",
      url: "{{ url('get_syarat_layanan') }}",
      data: {
        "_token":"{{ csrf_token() }}",
        "id_data_layanan": $('select[name=id_data_layanan]').val(),
      },
      beforeSend: function () { 

      },
      success: function (response) {
        data = jQuery.parseJSON(response);
        html = "";
        $.each(data, function (index, value) { 
          html+= `
              <div class="form-group">
                <label class="control-label">`+value.syarat+`</label>
                <div class="col-sm-12">
                  <input type="hidden" class="form-control" name="id_syarat_layanan[]" value="`+value.id+`"></input>
                  <input type="file" class="form-control" name="lampiran[]" accept="image/*,application/pdf"></input>
                </div>
              </div>
          `;
             
        });

        $('.form-syarat').html(html);
      },
      error: function () { 
        $('select[name=id_data_layanan]').val("")
        $('.modal-message').modal();
      }
    });    
  }

  $('select[name=id_data_layanan]').on('change', function () {
    get_syarat();
  });

  $('select[name=status_layanan]').on('change', function () {
    if ($(this).val() == "Diambil") {
      $('.form-pengambilan').css('display','inline');
      $('input[name=tgl_surat_terbit]').val('{{ date("d-m-Y") }}');
    }else{
      $('.form-pengambilan').css('display','none');
      $('input[name=tgl_surat_terbit]').val('');
    }
  });

  $(document).ready(function () {
    get_syarat();

    $('.data-tanggal').datepicker({
      format: 'dd-mm-yyyy',
      autoclose: true
    });

    if ($(this).val() == "Diambil") {
      $('.form-pengambilan').css('display','inline');
      $('input[name=tgl_surat_terbit]').val('{{ date("d-m-Y") }}');
    }else{
      $('.form-pengambilan').css('display','none');
      $('input[name=tgl_surat_terbit]').val('');
    }
  });
</script>
@stop
