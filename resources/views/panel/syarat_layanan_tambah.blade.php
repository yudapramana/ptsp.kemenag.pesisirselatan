@extends('master_panel')

@section('header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambah Syarat Layanan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ url('syarat_layanan') }}">Syarat Layanan</a></li>
                <li class="breadcrumb-item active">Tambah Syarat Layanan</li>
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
      {{ Form::open(['url'=>'syarat_layanan/tambah', 'method'=>'post', 'class'=>'form-horizontal']) }}
      <!-- end card-header -->

      <div class="card-body">
          @if(empty($id_data_layanan))
            <div class="form-group {{ $errors->has('id_data_layanan') ? 'has-error' : '' }}">
              {{ Form::label('Nama Layanan','', ['class'=>'control-label']) }}
              <div class="col-sm-12">
                {{ Form::select('id_data_layanan',Helper::get_data_layanan_arr(),$id_data_layanan,['class'=>'form-control', 'placeholder'=>'-- Nama layanan --']) }}
                <span class="help-block">{{ $errors->has('id_data_layanan') ? $errors->first('id_data_layanan') : '' }}</span>
              </div>
            </div>
          @else
            {{ Form::hidden('id_data_layanan', $id_data_layanan) }}
          @endif
          <div class="form-group {{ $errors->has('syarat') ? 'has-error' : '' }}">
            {{ Form::label('Syarat Layanan','', ['class'=>'control-label']) }}
            <div class="col-sm-12">
              {{ Form::text('syarat','',['class'=>'form-control']) }}
              <span class="help-block">{{ $errors->has('syarat') ? $errors->first('syarat') : '' }}</span>
            </div>
          </div>
      </div>
      <!-- end card-body -->

      <div class="card-footer">
        <div class="text-right">
          <a href="{{url('syarat_layanan')}}" class="btn btn-sm btn-default btn-flat"><i class="fa fa-arrow-left"></i> Kembali</a>
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

@section('js')
<script type="text/javascript">
  var clicked = false;
  $('.data-password-click').on('click', function(){
    if (clicked) {
      $('.data-password-click i.fa').removeClass('fa-eye-slash');
      $('.data-password-click i.fa').addClass('fa-eye');
      $('.data-password').attr('type','password');
      clicked = false;
    }else {
      $('.data-password-click i.fa').removeClass('fa-eye');
      $('.data-password-click i.fa').addClass('fa-eye-slash');
      $('.data-password').attr('type','text');
      clicked = true;
    }
  });
</script>
@stop
