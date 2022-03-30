@extends('master_panel')

@section('header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Data User</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Data User</li>
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
    @endif

    <div class="card card-default">

      <!-- Title dari content -->
      <div class="card-header text-right bg-teal">
        {{ Form::open(['url'=>'data_user', 'method'=>'post']) }}
        <div class="row">
          <div class="col-sm-4">
            <div class="input-group">
              {{ Form::text('cari','',['class'=>'form-control', 'placeholder'=>'Pencarian']) }}
              <div class="input-group-prepend">
                {{ Form::button('<i class="fa fa-search"></i>',['class'=>'btn btn-default', 'type'=>'submit']) }}
              </div>
            </div>
          </div>
          <div class="col-sm-8">
            @if(isset($cari))
              <a href="{{ url('data_user') }}" class="btn btn-warning btn-sm"><i class="fa fa-refresh"></i> Reset</a>
            @endif
            @if(Helper::cek_level_akses('data_user')->t)
            <a href="{{ url('data_user/tambah') }}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Tambah</a>
            @endif
          </div>
        </div>
        <!-- end row -->
        {{ Form::close() }}
      </div>

      <!-- Isi dari content yang ada  -->
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered table-hovered">
            <thead>
              <tr class="bg-blue">
                <th>No</th>
                <th>Nama User</th>
                <th>Level</th>
                <th>Email</th>
                <th>Username</th>
                <th>Password</th>
                <th width="20%">Action</th>
              </tr>
            </thead>
            <tbody>
              @php
                $tmp = $datas->toArray();
              @endphp
              @foreach($datas as $key => $value)
              <tr>
                <td>{{ ( ( $key+1 ) + ( ($tmp['current_page']-1)*10 ) ) }}</td>
                <td>{{ $value->nama }}</td>
                <td>{{ $value->level }}</td>
                <td>{{ $value->email }}</td>
                <td>{{ $value->username }}</td>
                <td width="20%">
                  <span class="password-text-{{$key}}"><i style='color:#ccc'>( Rahasia )</i></span>
                  <span class="pull-right">
                    <button class="btn btn-sm btn-flat btn-default" onclick="show_password($('.password-text-{{$key}}'), $('.password-icon-{{$key}}'), '{{ Helper::clear_password( Crypt::decryptString($value->t_pwd) ) }}')"> <i class="fa fa-eye password-icon-{{$key}}"></i> </button>
                  </span>
                </td>
                <td class="text-center">
                  @if(Helper::cek_level_akses('data_user')->u)
                  <a href="{{url('data_user/ubah')}}/{{Helper::encrypt($value->id)}}" class="btn btn-warning btn-sm btn-ubah"><i class="fa fa-fw fa-edit"></i></a>
                  @endif
                  @if(Helper::cek_level_akses('data_user')->h)
                  <a href="javascript:;" class="btn btn-danger btn-sm btn-hapus @if($value->id == 1) disabled @endif" @if($value->id != 1) onclick="open_modal('{{Helper::encrypt($value->id)}}')" @endif><i class="fa fa-fw fa-trash"></i></a>
                  @endif
                </td>
              </tr>
              @endforeach

              @if(count($datas) == 0)
              <tr class="text-center">
                <td colspan="8"><i>( Tidak ada data )</i></td>
              </tr>
              @endif
            </tbody>
          </table>
        </div>
        <div class="text-right pagine-card">
          <span class="pagine-content">
            <i>{{ $tmp['current_page'].' dari '.$tmp['last_page'].' halaman'  }}</i>
          </span>
          {{ $datas->links() }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('modal')
<!-- Modal Hapus -->
<div class="modal fade modal-message" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header" style="background-color: #dd4b39">
        <h4 class="modal-title" style="color: #fff">Konfirmasi Hapus Data</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <p>Data yang dihapus tidak dapat dikembalikan lagi. Apakah Anda yakin ingin menghapus data?</p>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <a id="submit_hapus" href="#" class="btn btn-danger">Hapus</a>
      </div>

    </div>
  </div>
</div>
@endsection

@section('js')
  <script type="text/javascript">
    function open_modal(id) {
      $('.modal-message').modal();
      $('#submit_hapus').attr("href","{{url('data_user')}}/hapus/"+id);
    }

    function show_password(text, icon, pwd) {
      if (icon.hasClass('fa-eye')) {
        text.html(pwd);
        icon.removeClass('fa-eye');
        icon.addClass('fa-eye-slash');
        // password_show = false;
      }else {
        text.html("<i style='color:#ccc'>( Rahasia )</i>");
        icon.removeClass('fa-eye-slash');
        icon.addClass('fa-eye');
        // password_show = true;
      }
    }
  </script>
@stop
