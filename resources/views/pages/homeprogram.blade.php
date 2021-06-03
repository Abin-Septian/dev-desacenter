@extends('layouts.main')

@section('content')
<style>
    .box-training{
        border:1px solid #ccc;
        box-shadow: 1px 1px 10px #ccc;
        border-radius:5px;
        overflow:hidden;
    }

    .box-banner{
        border:1px solid #ccc;
        overflow:hidden;
        height:180px;
    }

    .text-small{
        color:#000;
        font-size:12px;
        text-align:center;
    }
</style>
<!--**********************************
    Content body start
***********************************-->
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles" style="margin-bottom:4rem !important; background:#f3f6f9 !important;">
            <div class="col p-0">
                <h5>Home Program</h5>
            </div>
            <div class="col p-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a style="color:#000 !important" href="javascript:void(0)">Layout</a>
                    </li>
                    <li style="color:#000 !important" class="breadcrumb-item active">Blank</li>
                </ol>
            </div>
            
        </div>

        @if( Session::has('status') )
            <div class="alert alert-success" style="font-size:14px;">
                {{ Session('status') }}
            </div>
        @endif
        <div class="alert alert-danger" style="font-size:14px;">Fitur ini masih Dalam Pengembangan</div>
                
        <div class="row">
            <div class="col-lg-3">
                <div class="list-group mb-4 mb-lg-0 list-lg" id="list-tab" role="tablist">
                    <a class="list-group-item list-group-item-action active" id="list-profil-list"
                        data-toggle="list" href="#webinar" role="tab"><span
                            class="mdi mdi-account-box-outline"></span> Webinar</a>
                    <a class="list-group-item list-group-item-action" id="list-akun-list" data-toggle="list"
                        href="#assesment" role="tab"><span class="mdi mdi-office"></span> Assesment</a>
                </div>
            </div>

            <div class="col-lg-9">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="webinar" role="tabpanel" aria-labelledby="list-home-list">
                                    <div class="row">
                                        @foreach($training as $data)
                                        <div class="col-md-3">
                                            <div class="box-training">
                                                <div class="box-banner">
                                                    <img src="{{ $data->banner }}" style="width:100%" />
                                                </div>
                                                <div class="text-small" style="margin-bottom:5px;">{{ $data->nama }}</div>
                                                <div class="text-small" style="margin-bottom:5px;">
                                                    <a type="button" style="padding:3px 5px; border-radius:5px;" href="#">Ikut Training</a>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="assesment" role="tabpanel" aria-labelledby="list-profile-list">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="alert alert-danger" style="font-size:14px;">Fitur ini masih Dalam Pengembangan</div>
                                        </div>
                                    </div>
                                </div>
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

