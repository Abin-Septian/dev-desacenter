@extends('layouts.main')

@section('content')


<style>
    .box-desa{
        border:1px solid #ccc;
        box-shadow:1px 1px 10px #ccc;
        padding:5px;
        border-radius:3px;
    }

    .kodedesa{
        color:#000;
        font-size:14px;
    }

    .namadesa{
        color:#000;
        font-size:16px;
    }

    .btn-xs{
        padding:5px 10px !important;
    }

    .alamat{
        font-size:12px;
        color:#555 !important;
    }

    .footer-btn{
        margin-top:10px;
    }
</style>
<!--**********************************
    Content body start
***********************************-->
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles" style="margin-bottom:4rem !important;">
            <div class="col p-0">
                <h5>Join Desa</h5>
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
                <!--- startcol  -->
                <div class="card">

                    <div class="card-body">

                        <div class="tab-content" id="nav-tabContent">
                            <div class="col-8">
                                <form class="form-horizontal">
                                    @csrf
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Provinsi</label>
                                        <div class="col-sm-9">
                                            <select onchange="selectKabupaten(this)" name="provinsi" class="custom-select form-control">
                                                <option value="">.:: Pilih Provinsi ::.</option>
                                                @foreach($provinsi as $key => $prov)
                                                <option value="{{ $prov->kode }}" >{{ $prov->nama}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Kabupaten</label>
                                        <div class="col-sm-9">
                                            <select onchange="selectKecamatan(this)" name="kabupaten" id="kabupaten" class="custom-select form-control">
                                                <option value="">.:: Pilih Kabupaten ::.</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Kecamatan</label>
                                        <div class="col-sm-9">
                                            <select id="kecamatan" name="kecamatan" class="custom-select form-control">
                                                <option selected="">.:: Pilih Kecamatan ::.</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Desa</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="Optional" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label"></label>
                                        <div class="col-sm-9">
                                            <button type="button" class="btn btn-sm btn-primary">
                                                Cari Data
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>

                    <hr>

                    <div class="card-body">
                        <div class="row" id="clone-content">
                            <div class="col-lg-4">
                                <div class="clone" id="clone">
                                    <div class="box-desa">
                                        <div class="kodedesa" role="kodedesa">11.01.02.2001</div>
                                        <div class="namadesa" role="namadesa">Fajar Harapan</div>
                                        <div class="alamat" role="alamat">Aceh, Aceh Barat, Kaloeke</div>
                                        <div class="footer-btn" role="button">
                                            <button style="width:100%;" class="btn btn-xs btn-success" type="button">Join Desa</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
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




<script type="text/javascript">

    function selectKabupaten(obj)
    {
        var kode    = $(obj).val();
        var _token  = $("input[name='_token']").val(); 

        $.ajax({
            url : "/getMaster/kabupaten",
            type : "POST",
            dataType : "JSON",
            data : {
                kode    : kode,
                _token  : _token
            },
            beforeSend : function(xhr)
            {
                $("#kabupaten").html("<option> Sedang ambil data kabupaten . . .</option>")
            },
            success : function(result, status, xhr)
            {
                $("#kabupaten").html("");

                if(result.status)
                {
                    $("#kabupaten").append("<option>.:: Pilih Kabupaten ::.</option>");
                    $.each(result.data, function(a, b){
                        $("#kabupaten").append("<option value='"+b.kode_kabupaten+"'>"+b.nama_kabupaten+"</option>")
                    });
                }
                else
                {
                    $("#kabupaten").html("<option> data tidak ditemukan </option>")
                }
            }
        });
    }

    function selectKecamatan(obj)
    {
        var kode    = $(obj).val();
        var _token  = $("input[name='_token']").val(); 

        $.ajax({
            url : "/getMaster/kecamatan",
            type : "POST",
            dataType : "JSON",
            data : {
                kode    : kode,
                _token  : _token
            },
            beforeSend : function(xhr)
            {
                $("#kecamatan").html("<option> Sedang ambil data kabupaten . . .</option>")
            },
            success : function(result, status, xhr)
            {
                $("#kecamatan").html("");

                if(result.status)
                {
                    $("#kecamatan").append("<option>.:: Pilih Kabupaten ::.</option>");
                    $.each(result.data, function(a, b){
                        $("#kecamatan").append("<option value='"+b.kode_kecamatan+"'>"+b.nama_kecamatan+"</option>")
                    });
                }
                else
                {
                    $("#kecamatan").html("<option> data tidak ditemukan </option>")
                }
            }
        });
    }

</script>

@endsection