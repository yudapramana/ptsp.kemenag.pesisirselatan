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
                <h1 class="text-uppercase">Buat Permohonan</h1>
                <h4 class="h4-header">{{ $data->nama_layanan }}</h4>
                
                <div class="card card-default mt-5">
                    {{ Form::open(['url'=>'buat_permohonan/tambah', 'method'=>'post', 'class'=>'form-horizontal','files'=>true]) }}
                    <!-- end card-header -->

                    <div class="card-body">
                        <div class="form-group {{ $errors->has('id_data_layanan') ? 'has-error' : '' }}">
                            {{ Form::hidden('id_data_layanan',$id_data_layanan,['class'=>'form-control']) }}
                            {{ Form::hidden('id_unit',$id_unit,['class'=>'form-control']) }}
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
                        @foreach($syarat_layanan as $key => $value)
                        <div class="form-group {{ $errors->has('lampiran.'.$key) ? 'has-error' : '' }}">
                          <label class="control-label">{{ $value->syarat }}</label>
                          <div class="col-sm-12">
                            {{ Form::hidden('id_syarat_layanan[]',$value->id) }}
                            {{ Form::file('lampiran[]',['class'=>'form-control','accept'=>'image/jpg,image/png,image/jpeg,application/pdf']) }}
                            <span class="help-block">{{ $errors->has('lampiran.'.$key) ? $errors->first('lampiran.'.$key) : '' }}</span>
                          </div>
                        </div>
                        @endforeach
                    </div>
                    <!-- end card-body -->

                    <div class="card-footer">
                        <div class="text-right">
                        <a href="{{url('/')}}" class="btn btn-sm btn-default btn-flat"><i class="fa fa-arrow-left"></i> Kembali</a>
                        {{ Form::button('<i class="fa fa-save"></i> Simpan',['class'=>'btn btn-sm btn-success btn-flat','type'=>'submit']) }}
                        </div>
                    </div>
                    <!-- end card-footer -->
                </div>
                {{ Form::close() }}
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

