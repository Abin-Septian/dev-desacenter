@extends('layouts.main')


@section('content')


<!--**********************************
    Content body start
***********************************-->
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col p-0">
                <h4>Assesment </h4>
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
            <div class="col-lg-12">
                <div class="card border-primary text-center">
                    <div class="card-body">
                        
                        <div class="row">
                            <div class="col-lg-6">
                              <h2>Kategori Kompetensi</h2>
                            </div>

                            <div class="col-lg-6">
                                <h2>Belum Ada Penilaian</h2> 
                             </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-6"> <!--- startcol  -->
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Indikator Keberhasilan BUMDes</h2>
                        <p>Progres Pengerjaan</p>
                        <div class="progress progress--large bg-primary-rgba1 my-4">
                            <div class="progress-bar bg-primary active progress-bar-striped" style="width: 25%;" role="progressbar">25%</div>
                        </div>
                        <div class="card-footer text-center mt-4">
                            <button type="button" class="btn btn-warning">Mulai Assessment</button>
                        </div>
                    </div>
                </div>
            </div> <!-- endcol-->

            <div class="col-lg-6"> <!--- startcol  -->
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Ekosistem Pendukung Perkembangan dan Keberlanjutan BUMDes</h2>
                        <p>Progres Pengerjaan</p>
                        <div class="progress progress--large bg-success-rgba1 my-4">
                            <div class="progress-bar bg-success active progress-bar-striped" style="width: 75%;" role="progressbar">75%</div>
                        </div>
                        <div class="card-footer text-center mt-4">
                            <button type="button" class="btn btn-warning">Mulai Assessment</button>
                        </div>
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