@extends('master_auth')

@section('header')
<a href="#"><b>Log</b>in</a>
@endsection

@section('content')
    @if(Session::has("pesan_berhasil"))
    <div class="alert alert-success alert-dismissable icon-font">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="fa fa-info-circle"></i> Pesan Berhasil</h5>  {{ session('pesan_berhasil') }}
    </div>
    @elseif(Session::has("pesan_gagal"))
    <div class="alert alert-danger alert-dismissable icon-font">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="fa fa-exclamation-triangle"></i> Pesan Gagal</h5>
        {{ session('pesan_gagal') }}
    </div>
    @elseif(count($errors) > 0)
    <div class="alert alert-danger alert-dismissable icon-font">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="fa fa-exclamation-triangle"></i> Pesan Gagal</h5>
        Mohon periksa kembali Username dan Password Anda.
    </div>
    @else
    <p class="login-box-msg">Halaman login Kemenag Sawahlunto</p>
    @endif

    {{ Form::open(['url'=>'login','method'=>'post']) }}
        <div class="form-group has-feedback {{ $errors->has('username') ? 'has-error' : '' }}">
            {{ Form::text('username','',['class'=>'form-control','placeholder'=>'Username']) }}
        </div>
        <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
            {{ Form::password('password',['class'=>'form-control','placeholder'=>'Password']) }}
        </div>
        <div class="row">
            <div class="col-8">
                <a href="{{ url('/') }}"><i class="fa fa-arrow-left"></i> Kembali ke home web</a>
            </div>
            <!-- /.col -->
            <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
            </div>
            <!-- /.col -->
        </div>
    {{ Form::close() }}
@endsection