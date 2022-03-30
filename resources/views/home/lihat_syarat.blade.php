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
                <h1 class="text-uppercase">Syarat Layanan</h1>
                <h4 class="h4-header">{{ $data->nama_layanan }}</h4>
                <div class="table-responsive pt-4">
                    <table class="table table-bordered table-hovered">
                        <thead>
                            <tr class="bg-blue">
                                <th>No</th>
                                <th>Syarat Layanan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($datas as $key => $value)
                            <tr>
                                <td>{{ ( $key+1 ) }}</td>
                                <td>{{ $value->syarat }}</td>
                            </tr>
                            @endforeach
    
                            @if(count($datas) == 0)
                            <tr class="text-center">
                                <td colspan="8"><i>( Tidak ada syarat layanan )</i></td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <a href="{{ url('/') }}" class="btn btn-default"><i class="fa fa-arrow-left"></i> Kembali</a>
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