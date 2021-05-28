@extends('layouts.main')

@section('content')

<style>
    .box-title > h5{
        border-top:1px dashed #999;
        border-bottom:1px dashed #999;
        padding:8px 0px;
        color:#555;
        font-size:18px;
        font-weight:500;
        margin-bottom:15px;
    }

    .box-poster{
        width:100%; 
        border:1px solid #ccc; 
        border-radius:3px; 
        box-shadow:1px 1px 10px #ccc;
    }

    .box-jumlah{
        background:#fff3cd !important;
        padding:10px;
        text-align:center;
        border:1px solid #ccc;
        box-shadow:1px 1px 10px #ccc;
        color:#000;
        line-height: 28px;
        border-radius: 5px;
    }
</style>
<!--**********************************
    Content body start
***********************************-->
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles" style="margin-bottom:4rem !important; background:#ffd656 !important;">
            <div class="col p-0">
                <h5>Program Bumdes</h5>
            </div>
            <div class="col p-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a style="color:#000 !important" href="javascript:void(0)">Layout</a>
                    </li>
                    <li style="color:#000 !important" class="breadcrumb-item active">Blank</li>
                </ol>
            </div>
            
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="box-poster">
                                    <img src="{{ $detail->banner }}" style="width:100%;"/>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="box-title">
                                    <h5>{{ $detail->nama }}</h5>
                                </div>
                                <div style="color:#555; text-align:justify; margin-bottom:15px;">
                                    @php 
                                        $string = strip_tags($detail->tentang);
                                        if (strlen($string) > 500) {

                                            // truncate string
                                            $stringCut = substr($string, 0, 800);
                                            $endPoint = strrpos($stringCut, ' ');

                                            //if the string doesn't contain any space then it will cut without word basis.
                                            $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                            $string .= ' ... ';
                                        }
                                        echo $string;
                                    @endphp
                                </div>
                                

                                @if($member->email !="")
                                <div class="box-jumlah">
                                    <h5 style="border-bottom:1px dashed #555; font-size:14px; padding-bottom:5px;">Pendaftaran Program</h5>
                                    <div class="">Jumlah Peserta yang mendaftar</div>
                                    <div style="font-size:30px;">{{ $pemesanan->count() }}</div>
                                    <div class="">Peserta</div>
                                    <div>
                                        <a type="button" href="{{ url('program/ikut/'.$detail->id) }}" class="btn btn-xs btn-default">Ikut Program</a>
                                    </div>
                                </div>
                                @else
                                <div class="alert alert-danger" style="font-size:14px">
                                    Anda belum melengkapi profil. Silahkan lengkapi profil anda dengan klik tombol disamping <a href="{{ url('profil/akun') }}" class="btn btn-xs btn-danger" type="button">Edit Profil</a>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- #/ container -->
</div>
<!--**********************************
    Content body end
***********************************-->



@endsection

