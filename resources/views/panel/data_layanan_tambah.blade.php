@extends('master_panel')

@section('header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambah Data Layanan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ url('data_layanan') }}">Data Layanan</a></li>
                <li class="breadcrumb-item active">Tambah Data Layanan</li>
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
      {{ Form::open(['url'=>'data_layanan/tambah', 'method'=>'post', 'class'=>'form-horizontal']) }}
      <!-- end card-header -->

      <div class="card-body">
        @if(empty($id_unit_pengolah))
          <div class="form-group {{ $errors->has('id_unit_pengolah') ? 'has-error' : '' }}">
            {{ Form::label('Unit Pengolah','', ['class'=>'control-label']) }}
            <div class="col-sm-12">
              {{ Form::select('id_unit_pengolah',Helper::get_unit_pengolah_arr(),'',['class'=>'form-control']) }}
              <span class="help-block">{{ $errors->has('id_unit_pengolah') ? $errors->first('id_unit_pengolah') : '' }}</span>
            </div>
          </div>
        @else
          {{ Form::hidden('id_unit_pengolah', $id_unit_pengolah) }}
        @endif
        <div class="form-group {{ $errors->has('id_jenis_layanan') ? 'has-error' : '' }}">
          {{ Form::label('Jenis Layanan','', ['class'=>'control-label']) }}
          <div class="col-sm-12">
            {{ Form::select('id_jenis_layanan',Helper::get_jenis_layanan_arr(),'',['class'=>'form-control']) }}
            <span class="help-block">{{ $errors->has('id_jenis_layanan') ? $errors->first('id_jenis_layanan') : '' }}</span>
          </div>
        </div>
        <div class="form-group {{ $errors->has('nama_layanan') ? 'has-error' : '' }}">
          {{ Form::label('Nama Layanan','', ['class'=>'control-label']) }}
          <div class="col-sm-12">
            {{ Form::text('nama_layanan','',['class'=>'form-control']) }}
            <span class="help-block">{{ $errors->has('nama_layanan') ? $errors->first('nama_layanan') : '' }}</span>
          </div>
        </div>
        <div class="form-group {{ $errors->has('id_output') ? 'has-error' : '' }}">
          {{ Form::label('Output','', ['class'=>'control-label']) }}
          <div class="col-sm-12">
            {{ Form::select('id_output',Helper::get_output_arr(),'',['class'=>'form-control']) }}
            <span class="help-block">{{ $errors->has('id_output') ? $errors->first('id_output') : '' }}</span>
          </div>
        </div>
        <div class="form-group {{ $errors->has('lama_layanan') ? 'has-error' : '' }}">
          {{ Form::label('Lama Layanan','', ['class'=>'control-label']) }}
          <div class="col-sm-12">
            {{ Form::text('lama_layanan','',['class'=>'form-control']) }}
            <span class="input-group-addon">Hari</span>
            <span class="help-block">{{ $errors->has('lama_layanan') ? $errors->first('lama_layanan') : '' }}</span>
          </div>
        </div>
        <div class="form-group {{ $errors->has('biaya') ? 'has-error' : '' }}">
          {{ Form::label('Biaya','', ['class'=>'control-label']) }}
          <div class="col-sm-12">
            {{ Form::text('biaya','',['class'=>'form-control']) }}
            <span class="help-block">{{ $errors->has('biaya') ? $errors->first('biaya') : '' }}</span>
          </div>
        </div>
      </div>
      <!-- end card-body -->

      <div class="card-footer">
        <div class="text-right">
          <a href="{{url('data_layanan')}}" class="btn btn-sm btn-default btn-flat"><i class="fa fa-arrow-left"></i> Kembali</a>
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
