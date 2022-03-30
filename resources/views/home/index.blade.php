@extends('master_web')

@section('content')
@include('header_home')
<section class="web-header" id="web-home">
    <div class="web-overlay"></div>
    <div class="web-header-content">
        <div class="container">
            <img src="{{ url('img/kemenag-logo.png') }}" alt="" width="150">
            <br>
            <br>
            <h1><b>PELAYANAN TERPADU SATU PINTU (PTSP)</b></h1>
            <h1><b>KEMENTERIAN SAWAHLUNTO</b></h1>
            <br>
            <br>
            {{ Form::open(['url'=>'#', 'method'=>'post', 'class'=>'']) }}
                <div class="form-group">
                    {{ Form::label('Instansi Tujuan','', ['class'=>'control-label text-center']) }}
                    {{ Form::select('id_unit',Helper::get_unit_user(),'',['class'=>'form-control', 'placeholder'=>'--- Pilih Instansi Tujuan ---']) }}
                </div>
                <div class="form-group layanan-tersedia">
                    {{ Form::label('Layanan yang tersedia','', ['class'=>'control-label text-center']) }}
                    {{ Form::select('id_data_layanan',Helper::get_data_layanan_arr(),'',['class'=>'form-control']) }}
                </div>
                <div class="text-center mt-3">
                    {{ Form::button('<i class="fa fa-eye"></i> Lihat Syarat Layanan',['class'=>'btn btn-danger mb-2','type'=>'submit','formaction'=>url('lihat_syarat')]) }}
                    {{ Form::button('<i class="fa fa-file"></i> Buat Permohonan',['class'=>'btn btn-info mb-2 layanan-tersedia','type'=>'submit','formaction'=>url('buat_permohonan')]) }}
                </div>
            {{ Form::close() }}
        </div>
    </div>
</section>

<section class="web-cek-status-layanan">
    <div class="container">
        {{ Form::open(['url'=>'cek_status_layanan', 'method'=>'post', 'class'=>'']) }}
            <div class="row">
                <div class="col text-center">
                    <h1 class="text-uppercase">Cek Status Layanan</h1>
                </div>
            </div>
            <div class="row justify-content-center mt-3">
                <div class="col-sm-6">
                    <div class="input-group">
                        <input type="text" class="form-control form-control-lg" placeholder="Ketik No. Registrasi" name="no_registrasi">
                        <div class="input-group-append">
                            <button class="btn btn-success btn-lg" type="submit">Go</button> 
                        </div>
                    </div>
                </div>
            </div>
        {{ Form::close() }}
    </div>
</section>

<section class="web-contact" id="web-contact">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 pb-3">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.5445992916225!2d100.7629083147007!3d-0.6711469995103498!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e2b2f2e15e05195%3A0xfa731584f8df31c0!2sKantor+Kementrian+Agama+Kota+Sawahlunto!5e0!3m2!1sid!2sid!4v1556097733635!5m2!1sid!2sid" allowfullscreen></iframe>
                </div>
            </div>
            <div class="col-sm-6 pb-3">
                <h1 class="text-uppercase">Kontak</h1>
                <p><i class="fa fa-home"></i> Kantor Kementerian Agama Kota Sawahlunto</p>
                <p><i class="fa fa-map-marker"></i> Jln. Soekarno Hatta Kel. Lubang Panjang</p>
                <p><i class="fa fa fa-envelope"></i> sawahlunto@KEMENTERIAN AGAMA.go.id - kotasawahlunto@KEMENTERIAN AGAMA.go.id</p>
                <p><i class="fa fa fa-phone"></i> (0754) 61212</p>
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
        $('select[name=id_unit]').on('change', function(){ 
            console.log($(this).val());
            if($(this).val() != ''){
                $('.layanan-tersedia').css('display','inline');
            }else{
                $('.layanan-tersedia').css('display','none');
            }
        });
    </script>
@stop