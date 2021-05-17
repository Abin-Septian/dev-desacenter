@extends('layouts.main')


@section('content')


<!--**********************************
    Content body start
***********************************-->
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col p-0">
                <h4>Data Anggota [nama_desa] {{ $phone }}</h4>
            </div>
            <div class="col p-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Layout</a>
                    </li>
                    <li class="breadcrumb-item active">Blank</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-lg text-right">
                <button type="button" class="btn btn-ft rounded-0 btn-primary"><span class="fa fa-plus"></span> Tambah Member</button>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-lg"> <!--- startcol  -->
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title"></h2>
                        <p>Belum ada data member/anggota</p>
                    </div>
                </div>
            </div> <!-- endcol-->

        </div>
    </div>
    <!-- #/ container -->
</div>
<!--**********************************
    Content body end
***********************************-->


@endsection