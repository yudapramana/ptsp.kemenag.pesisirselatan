@extends('master_panel')

@section('header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambah Level User</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ url('level_user') }}">Level User</a></li>
                <li class="breadcrumb-item active">Tambah Level User</li>
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
      {{ Form::open(['url'=>'level_user/tambah', 'class' => 'form-horizontal', 'method'=>'post']) }}

      <!-- Title dari content -->

      <!-- Isi dari content yang ada  -->
      <div class="card-body">
          <div class="form-group {{ $errors->has('level') ? 'has-error' : '' }}">
            {{ Form::label('Level User','', ['class'=>'control-label col-sm-2']) }}
            <div class="col-sm-12">
              {{ Form::text('level','',['class'=>'form-control']) }}
              <span class="help-block">{{ $errors->has('level') ? $errors->first('level') : '' }}</span>
            </div>
          </div>
          <div class="form-group">
            {{ Form::label('Modul Akses','', ['class'=>'control-label col-sm-2']) }}
            <div class="col-sm-12">
              <table class="table table-bordered table-hovered">
                <tr>
                  <th>Modul</th>
                  <th>Lihat</th>
                  <th>Detail</th>
                  <th>Tambah</th>
                  <th>Ubah</th>
                  <th>Hapus</th>
                </tr>
                @foreach($datas as $key => $value)
                  @if($value->id == 1)
                    <tr>
                      {{ Form::hidden('id_modul[]',$value->id) }}
                    </tr>
                  @else
                    <tr>
                      <td>
                        {{ Form::checkbox('selectall','',false,['id'=>$key]) }}
                        {{ $value->nama_menu }}
                        {{ Form::hidden('id_modul[]',$value->id) }}
                      </td>
                      <td>{{ Form::checkbox('l'.$key,true) }}</td>
                      <td>{{ Form::checkbox('d'.$key,true) }}</td>
                      <td>{{ Form::checkbox('t'.$key,true) }}</td>
                      <td>{{ Form::checkbox('u'.$key,true) }}</td>
                      <td>{{ Form::checkbox('h'.$key,true) }}</td>
                    </tr>
                  @endif
                @endforeach
              </table>
            </div>
          </div>
      </div>
      <div class="card-footer">
        <div class="text-right">
          <a href="{{url('level_user')}}" class="btn btn-sm btn-default"><i class="fa fa-arrow-left"></i> Kembali</a>
          <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-save"></i> Submit</button>
        </div>
      </div>
    </div>
    {{ Form::close() }}
  </div>
</div>
@endsection

@section('js')
<script type="text/javascript">
  $('input[type="checkbox"]').iCheck({
    checkboxClass: 'icheckbox_flat-green',
    radioClass   : 'iradio_flat-green'
  });
  
  $("input").on('ifChanged', function (e) {
    if (this.name == "selectall") {
      if (this.checked) {
        $('input[name=l'+this.id+']').iCheck('check');
        $('input[name=d'+this.id+']').iCheck('check');
        $('input[name=t'+this.id+']').iCheck('check');
        $('input[name=u'+this.id+']').iCheck('check');
        $('input[name=h'+this.id+']').iCheck('check');
      }else {
        $('input[name=l'+this.id+']').iCheck('uncheck');
        $('input[name=d'+this.id+']').iCheck('uncheck');
        $('input[name=t'+this.id+']').iCheck('uncheck');
        $('input[name=u'+this.id+']').iCheck('uncheck');
        $('input[name=h'+this.id+']').iCheck('uncheck');
      }
    }
  });
</script>
@stop
