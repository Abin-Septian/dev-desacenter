@extends('layouts.main')

@section('status')

    @if(Session::has('status'))
        <div class="alert alert-success" style="font-size:14px">{{ Session('status') }}</div>
    @endif

@endsection

@section('content')

<style>
    .box-title{
        padding:10px 0px;
        border-radius:3px;
        border-bottom:1px dashed #555;
        border-top:1px dashed #555;
        margin-bottom:15px;
    }

    .box-title > h5{
        color:#999;
        font-size:14px;
        margin:0px !important;
    }
</style>

<!--**********************************
    Content body start
***********************************-->
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles" style="margin-bottom:4rem !important;">
            <div class="col p-0">
                <h5>Profil Desa</h5>
            </div>
            <div class="col p-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Layout</a>
                    </li>
                    <li class="breadcrumb-item active">Blank</li>
                </ol>
            </div>
            
        </div>

        @if($member->id_instansi == 0)
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="alert alert-danger" style="font-size:14px;">
                            Silahkan untuk melakukan gabug desa agar dapat melengkapi profil desa.
                        </div>

                        <div class="text-center">
                            <a href="{{ url('join-desa') }}" type="button" class="btn btn-primary">Gabung Desa</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="row">

            <div class="col-lg-12">
                <!--- startcol  -->
                <div class="card">
                    <div class="card-body">
                        
                        @yield('status')

                        <div class="tab-pane p-3 active" id="desa" role="tabpanel">
                            <form method="POST" action="{{ url('profil/simpan') }}" >
                                @csrf
                                <div class="box-title">
                                    <h5>1. Data Informasi Desa</h5>
                                </div>
                                <div class="form-group row align-items-center">
                                    <label class="col-sm-3 col-form-label text-label">Nomor Registrasi
                                        Desa</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input readonly type="text" value="{{ $desa->kodedesa }}" class="form-control" id="noreg-bumbed"
                                                name="noreg-desa" placeholder="Nomor Registrasi Desa"
                                                aria-describedby="noreg-bumbed">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row align-items-center">
                                    <label class="col-sm-3 col-form-label text-label">Nama Desa</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input readonly value="{{ $desa->namadesa }}" type="text" class="form-control" id="nama-desa"
                                                name="nama-desa" placeholder="Nama Desa"
                                                aria-describedby="nama-desa">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row align-items-center">
                                    <label class="col-sm-3 col-form-label text-label">Provinsi</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input readonly value="{{ $desa->provinsi }}" type="text" class="form-control" id="provinsi"
                                                name="provinsi" placeholder="provinsi"
                                                aria-describedby="provinsi">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row align-items-center">
                                    <label class="col-sm-3 col-form-label text-label">Kota/Kabupaten</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input readonly value="{{ $desa->kabupaten }}" type="text" class="form-control" id="kabupaten
                                                name="kabupaten" placeholder="kabupaten"
                                                aria-describedby="kabupaten">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row align-items-center">
                                    <label class="col-sm-3 col-form-label text-label">Kecamatan</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input readonly value="{{ $desa->kecamatan }}" type="text" class="form-control" id="kecamatan"
                                                name="kecamatan" placeholder="kecamatan"
                                                aria-describedby="kecamatan">
                                        </div>
                                    </div>
                                </div>

                                <div class="box-title">
                                    <h5>2. Data Pengurus Desa</h5>
                                </div>

                                <div class="form-group row align-items-center">
                                    <label class="col-sm-3 col-form-label text-label">Nama Kepala</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input value="{{ $desa->namakepala}}" type="text" class="form-control @error('namakepala') is-invalid @enderror" id="namakepala" name="namakepala"
                                                placeholder="Nama Kepala" aria-describedby="namakepala">
                                        </div>
                                        @error('namakepala')
                                            <div style="font-size:14px; padding:5px; margin-top:5px" class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row align-items-center">
                                    <label class="col-sm-3 col-form-label text-label">No Wa Kepala</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <div class="input-group-append bg-custom b-0"><span class="input-group-text">+62</span></div>
                                            <input value="{{ substr($desa->nowakepala,3) }}" onblur="return $(this).val(parseInt($(this).val()))" type="text" class="form-control @error('nowakepala') is-invalid @enderror" id="nowakepala" name="nowakepala"
                                                placeholder="No Wa Kepala" aria-describedby="nowakepala">
                                        </div>

                                        @error('nowakepala')
                                            <div style="font-size:14px; padding:5px; margin-top:5px" class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row align-items-center">
                                    <label class="col-sm-3 col-form-label text-label">Nama Sekertaris</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input value="{{ $desa->namasekertaris}}" type="text" class="form-control" id="namasekertaris" name="namasekertaris"
                                                placeholder="Nama Sekertaris" aria-describedby="namasekertaris">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row align-items-center">
                                    <label class="col-sm-3 col-form-label text-label">No Wa Sekertaris</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <div class="input-group-append bg-custom b-0"><span class="input-group-text">+62</span></div>
                                            <input value="{{ substr($desa->nowasekertaris,3) }}" type="text" onblur="return $(this).val(parseInt($(this).val()))" class="form-control" id="nowasekertaris" name="nowasekertaris"
                                                placeholder="No Wa Sekertaris" aria-describedby="nowasekertaris">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group text-right">
                                    <button class="btn btn-primary" type="submit">Simpan Data</button>
                                </div>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div> <!-- endcol-->

        </div>
        @endif
    </div>
    <!-- #/ container -->
</div>
<!--**********************************
    Content body end
***********************************-->


@endsection