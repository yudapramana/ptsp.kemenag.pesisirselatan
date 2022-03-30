@extends('master_panel')

@section('header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ubah Output Layanan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ url('output_layanan') }}">Output Layanan</a></li>
                <li class="breadcrumb-item active">Ubah Output Layanan</li>
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
      {{ Form::open(['url'=>'output_layanan/ubah/'.Helper::encrypt($data->id), 'method'=>'post', 'class'=>'form-horizontal']) }}
      <!-- end card-header -->

      <div class="card-body">
          <div class="form-group {{ $errors->has('output') ? 'has-error' : '' }}">
            {{ Form::label('Output Layanan','', ['class'=>'control-label']) }}
            <div class="col-sm-12">
              {{ Form::text('output',$data->output,['class'=>'form-control']) }}
              <span class="help-block">{{ $errors->has('output') ? $errors->first('output') : '' }}</span>
            </div>
          </div>
      </div>
      <!-- end card-body -->

      <div class="card-footer">
        <div class="text-right">
          <a href="{{url('output_layanan')}}" class="btn btn-sm btn-default btn-flat"><i class="fa fa-arrow-left"></i> Kembali</a>
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
