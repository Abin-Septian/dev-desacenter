@extends('layouts.main')


@section('content')


<!--**********************************
    Content body start
***********************************-->
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col p-0">
                <h4>Unit Usaha [nama_desa]</h4>
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
                <button type="button" class="btn btn-ft rounded-0 btn-primary"><span class="fa fa-plus"></span> Tambah Unit Usaha</button>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-lg-6"> <!--- startcol  -->
                <div class="card">
                    <div class="card-body">
                        <p class="text-warning">Perdagangan</p>
                        <h2 class="card-title">Unit Usaha 1</h2>
                        <hr>
                        <p>Unit Usaha 2</p>
                    </div>
                    <div class="card-footer text-right">
                        <button type="button" class="btn btn-ft rounded-0 btn-primary"><i class="fa fa-trash color-danger"></i> </span>Hapus</button>
                    </div>
                </div>
            </div> <!-- endcol-->

            <div class="col-lg-6"> <!--- startcol  -->
                <div class="card">
                    <div class="card-body">
                        <p class="text-warning">Perdagangan</p>
                        <h2 class="card-title">Unit Usaha 1</h2>
                        <hr>
                        <p>Unit Usaha 2</p>
                    </div>
                    <div class="card-footer text-right">
                        <button type="button" class="btn btn-ft rounded-0 btn-primary"><i class="fa fa-trash color-danger"></i> </span>Hapus</button>
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