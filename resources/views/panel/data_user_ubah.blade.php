@extends('master_panel')

@section('header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ubah Data User</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ url('level_user') }}">Data User</a></li>
                <li class="breadcrumb-item active">Ubah Data User</li>
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
      {{ Form::open(['url'=>'data_user/ubah/'.Helper::encrypt($data->id), 'method'=>'post', 'class'=>'form-horizontal']) }}
      <!-- end card-header -->

      <div class="card-body">
          <div class="form-group {{ $errors->has('nama') ? 'has-error' : '' }}">
            {{ Form::label('Nama','', ['class'=>'control-label col-sm-2']) }}
            <div class="col-sm-12">
              {{ Form::text('nama',$data->nama,['class'=>'form-control']) }}
              <span class="help-block">{{ $errors->has('nama') ? $errors->first('nama') : '' }}</span>
            </div>
          </div>
          <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
            {{ Form::label('Email','', ['class'=>'control-label col-sm-2']) }}
            <div class="col-sm-12">
              {{ Form::email('email',$data->email,['class'=>'form-control']) }}
              <span class="help-block">{{ $errors->has('email') ? $errors->first('email') : '' }}</span>
            </div>
          </div>
          <div class="form-group {{ $errors->has('id_level') ? 'has-error' : '' }}">
            {{ Form::label('Level','', ['class'=>'control-label col-sm-2']) }}
            <div class="col-sm-12">
              {{ Form::select('id_level',$levels,$data->id_level,['class'=>'form-control', 'placeholder'=>'-- Pilih Level --']) }}
              <span class="help-block">{{ $errors->has('id_level') ? $errors->first('id_level') : '' }}</span>
            </div>
          </div>
          <div class="form-group {{ $errors->has('username') ? 'has-error' : '' }}">
            {{ Form::label('Username','', ['class'=>'control-label col-sm-2']) }}
            <div class="col-sm-12">
              {{ Form::text('username',$data->username,['class'=>'form-control']) }}
              <span class="help-block">{{ $errors->has('username') ? $errors->first('username') : '' }}</span>
            </div>
          </div>
          <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
            {{ Form::label('Password','', ['class'=>'control-label col-sm-2']) }}
            <div class="col-sm-12">
              <div class="input-group">
                {{ Form::password('password',['class'=>'form-control data-password']) }}
                <span class="input-group-addon data-password-click" style="cursor: pointer"><i class="fa fa-eye"></i></span>
              </div>
              <span class="help-block">{!! $errors->has('password') ? $errors->first('password') : '<i class="color-gray">Kosongkan password jika tidak ingin dirubah.</i>' !!}</span>
            </div>
          </div>
      </div>
      <!-- end card-body -->

      <div class="card-footer">
        <div class="text-right">
          <a href="{{url('data_user')}}" class="btn btn-sm btn-default btn-flat"><i class="fa fa-arrow-left"></i> Kembali</a>
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
