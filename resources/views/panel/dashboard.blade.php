@extends('master_panel')

@section('header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.container-fluid -->
@endsection

@section('content')
<div class="row">
    <div class="col">
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fa fa-search"></i>
                    Pencarian
                </h3>
            </div>
            <div class="card-body">
                {{ Form::open(['url'=>'dashboard', 'method'=>'post']) }}
                <div class="row">
                    <div class="col-sm-4">
                        <div class="input-group">
                            {{ Form::text('cari','',['class'=>'form-control', 'placeholder'=>'Ketik No. Registrasi']) }}
                            <div class="input-group-prepend">
                                {{ Form::button('<i class="fa fa-search"></i>',['class'=>'btn btn-default', 'type'=>'submit']) }}
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        @if(isset($cari))
                            <a href="{{ url('dashboard') }}" class="btn btn-warning"><i class="fa fa-refresh"></i> Reset</a>
                        @endif
                        @if(Helper::cek_level_akses('pelayanan')->t)
                            <a href="{{ url('pelayanan/tambah') }}" class="btn btn-success"><i class="fa fa-plus"></i> Tambah</a>
                        @endif
                    </div>
                </div>
                <!-- end row -->
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fa fa-database"></i>
                    Data Layanan yang <b>Belum Diproses</b>
                </h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hovered">
                        <thead>
                            <tr class="bg-blue">
                                <th>No</th>
                                <th>No Registrasi</th>
                                <th>Nama Pelayanan</th>
                                <th>Kelengkapan</th>
                                <th>Status</th>
                                <th width="20%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pelayanan_belum_proses as $key => $value)
                            <tr>
                                <td>{{ ( $key+1 )  }}</td>
                                <td>{{ $value->no_registrasi }}</td>
                                <td>{{ $value->nama_layanan }}</td>
                                <td>{{ $value->kelengkapan_syarat }}</td>
                                <td>{{ $value->status_layanan }}</td>
                                <td class="text-center">
                                @if(Helper::cek_level_akses('pelayanan')->d)
                                <a href="{{url('pelayanan/detail')}}/{{Helper::encrypt($value->id)}}" class="btn btn-info btn-sm btn-detail"><i class="fa fa-fw fa-eye"></i></a>
                                @endif
                                @if(Helper::cek_level_akses('pelayanan')->u)
                                <a href="{{url('pelayanan/ubah')}}/{{Helper::encrypt($value->id)}}" class="btn btn-warning btn-sm btn-ubah"><i class="fa fa-fw fa-edit"></i></a>
                                @endif
                                @if(Helper::cek_level_akses('pelayanan')->h)
                                <a href="javascript:;" class="btn btn-danger btn-sm btn-hapus" onclick="open_modal('{{Helper::encrypt($value->id)}}')"><i class="fa fa-fw fa-trash"></i></a>
                                @endif
                                </td>
                            </tr>
                            @endforeach

                            @if(count($pelayanan_belum_proses) == 0)
                            <tr class="text-center">
                                <td colspan="8"><i>( Tidak ada data )</i></td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fa fa-database"></i>
                    Data Layanan yang <b>Sedang Diproses</b>
                </h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hovered">
                        <thead>
                            <tr class="bg-blue">
                                <th>No</th>
                                <th>No Registrasi</th>
                                <th>Nama Pelayanan</th>
                                <th>Kelengkapan</th>
                                <th>Status</th>
                                <th width="20%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pelayanan_proses as $key => $value)
                            <tr>
                                <td>{{ ( $key+1 )  }}</td>
                                <td>{{ $value->no_registrasi }}</td>
                                <td>{{ $value->nama_layanan }}</td>
                                <td>{{ $value->kelengkapan_syarat }}</td>
                                <td>{{ $value->status_layanan }}</td>
                                <td class="text-center">
                                @if(Helper::cek_level_akses('pelayanan')->d)
                                <a href="{{url('pelayanan/detail')}}/{{Helper::encrypt($value->id)}}" class="btn btn-info btn-sm btn-detail"><i class="fa fa-fw fa-eye"></i></a>
                                @endif
                                @if(Helper::cek_level_akses('pelayanan')->u)
                                <a href="{{url('pelayanan/ubah')}}/{{Helper::encrypt($value->id)}}" class="btn btn-warning btn-sm btn-ubah"><i class="fa fa-fw fa-edit"></i></a>
                                @endif
                                @if(Helper::cek_level_akses('pelayanan')->h)
                                <a href="javascript:;" class="btn btn-danger btn-sm btn-hapus" onclick="open_modal('{{Helper::encrypt($value->id)}}')"><i class="fa fa-fw fa-trash"></i></a>
                                @endif
                                </td>
                            </tr>
                            @endforeach

                            @if(count($pelayanan_proses) == 0)
                            <tr class="text-center">
                                <td colspan="8"><i>( Tidak ada data )</i></td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fa fa-database"></i>
                    Data Layanan yang <b>Selesai Diproses</b>
                </h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hovered">
                        <thead>
                            <tr class="bg-blue">
                                <th>No</th>
                                <th>No Registrasi</th>
                                <th>Nama Pelayanan</th>
                                <th>Kelengkapan</th>
                                <th>Status</th>
                                <th width="20%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pelayanan_selesai as $key => $value)
                            <tr>
                                <td>{{ ( $key+1 )  }}</td>
                                <td>{{ $value->no_registrasi }}</td>
                                <td>{{ $value->nama_layanan }}</td>
                                <td>{{ $value->kelengkapan_syarat }}</td>
                                <td>{{ $value->status_layanan }}</td>
                                <td class="text-center">
                                @if(Helper::cek_level_akses('pelayanan')->d)
                                <a href="{{url('pelayanan/detail')}}/{{Helper::encrypt($value->id)}}" class="btn btn-info btn-sm btn-detail"><i class="fa fa-fw fa-eye"></i></a>
                                @endif
                                @if(Helper::cek_level_akses('pelayanan')->u)
                                <a href="{{url('pelayanan/ubah')}}/{{Helper::encrypt($value->id)}}" class="btn btn-warning btn-sm btn-ubah"><i class="fa fa-fw fa-edit"></i></a>
                                @endif
                                @if(Helper::cek_level_akses('pelayanan')->h)
                                <a href="javascript:;" class="btn btn-danger btn-sm btn-hapus" onclick="open_modal('{{Helper::encrypt($value->id)}}')"><i class="fa fa-fw fa-trash"></i></a>
                                @endif
                                </td>
                            </tr>
                            @endforeach

                            @if(count($pelayanan_selesai) == 0)
                            <tr class="text-center">
                                <td colspan="8"><i>( Tidak ada data )</i></td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fa fa-database"></i>
                    Data Layanan yang <b>Sudah Diambil</b>
                </h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hovered">
                        <thead>
                            <tr class="bg-blue">
                                <th>No</th>
                                <th>No Registrasi</th>
                                <th>Nama Pelayanan</th>
                                <th>Kelengkapan</th>
                                <th>Status</th>
                                <th width="20%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pelayanan_diambil as $key => $value)
                            <tr>
                                <td>{{ ( $key+1 )  }}</td>
                                <td>{{ $value->no_registrasi }}</td>
                                <td>{{ $value->nama_layanan }}</td>
                                <td>{{ $value->kelengkapan_syarat }}</td>
                                <td>{{ $value->status_layanan }}</td>
                                <td class="text-center">
                                @if(Helper::cek_level_akses('pelayanan')->d)
                                <a href="{{url('pelayanan/detail')}}/{{Helper::encrypt($value->id)}}" class="btn btn-info btn-sm btn-detail"><i class="fa fa-fw fa-eye"></i></a>
                                @endif
                                @if(Helper::cek_level_akses('pelayanan')->u)
                                <a href="{{url('pelayanan/ubah')}}/{{Helper::encrypt($value->id)}}" class="btn btn-warning btn-sm btn-ubah"><i class="fa fa-fw fa-edit"></i></a>
                                @endif
                                @if(Helper::cek_level_akses('pelayanan')->h)
                                <a href="javascript:;" class="btn btn-danger btn-sm btn-hapus" onclick="open_modal('{{Helper::encrypt($value->id)}}')"><i class="fa fa-fw fa-trash"></i></a>
                                @endif
                                </td>
                            </tr>
                            @endforeach

                            @if(count($pelayanan_diambil) == 0)
                            <tr class="text-center">
                                <td colspan="8"><i>( Tidak ada data )</i></td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection