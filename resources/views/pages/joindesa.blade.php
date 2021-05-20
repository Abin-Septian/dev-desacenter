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

    #clone{
        display:none;
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
                    @if($isSudahPilih->count() == 0)
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
                                        <label class="col-sm-3 col-form-label"></label>
                                        <div class="col-sm-9">
                                            <button type="button" onclick="caridata(this)" class="btn btn-sm btn-primary">
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

                        <div class="row" style="margin-bottom:20px;">
                            <div class="col-lg-12">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Cari berdasarkan Nama Desa . . .">
                                    <div class="input-group-append bg-custom b-0"><span class="input-group-text">Cari Desa</div>
                                </div>
                            </div>
                        </div>


                        <div class="row" id="clone-content">
                            
                        </div>
                    </div>
                    @else
                    <div class="card-body">
                        <div class="tab-content" id="nav-tabContent">
                            <div class="col-12">
                                <div class="alert alert-success">
                                    Anda sudah memilih desa. Silahkan anda cek ke halaman profil desa.
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div> <!-- endcol-->

        </div>
    </div>
    <!-- #/ container -->
</div>


<div class="col-lg-4" id="clone" style="margin-bottom:10px;">
    <div class="clone">
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
                    $("#kabupaten").append("<option value=''>.:: Pilih Kabupaten ::.</option>");
                    $.each(result.data, function(a, b){
                        $("#kabupaten").append("<option value='"+b.kode_kabupaten+"'>"+b.nama_kabupaten+"</option>")
                    });
                }
                else
                {
                    $("#kabupaten").html("<option value=''> data tidak ditemukan </option>")
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
                $("#kecamatan").html("<option value=''> Sedang ambil data kabupaten . . .</option>")
            },
            success : function(result, status, xhr)
            {
                $("#kecamatan").html("");

                if(result.status)
                {
                    $("#kecamatan").append("<option value=''>.:: Pilih Kecamatan ::.</option>");
                    $.each(result.data, function(a, b){
                        $("#kecamatan").append("<option value='"+b.kode_kecamatan+"'>"+b.nama_kecamatan+"</option>")
                    });
                }
                else
                {
                    $("#kecamatan").html("<option value=''> data tidak ditemukan </option>")
                }
            }
        });
    }

    function caridata(obj)
    {
        var _token    = $("input[name='_token']").val();

        var provinsi  = $("select[name='provinsi']").val();
        var kabupaten = $("select[name='kabupaten']").val();
        var kecamatan = $("select[name='kecamatan']").val();

        var namaprovinsi  = $("select[name='provinsi'] option:selected").text();
        var namakabupaten = $("select[name='kabupaten'] option:selected").text();
        var namakecamatan = $("select[name='kecamatan'] option:selected").text();

        var clone     = $("#clone");

        var isvalid = (provinsi == "" || kabupaten == "" || kecamatan == "");
        

        if(isvalid)
        {
            alert("Maaf inputan anda tidak lengkap. Cek kembali inputan anda.");
            return false;
        }

        $.ajax({
            url : "getMaster/desa",
            type : "POST",
            dataType : "JSON",
            data : {
                _token : _token,
                provinsi : provinsi,
                kabupaten : kabupaten,
                kecamatan : kecamatan
            },
            beforeSend : function(xhr)
            {
                $(this).prop("disabled", true);
                $("#clone-content").html("<div class='col-lg-12' style='text-align:center'>Please wait, Loading content . . .</div>")
            },
            success : function(result, status, xhr)
            {
                $("#clone-content").html("");

                if(result.status)
                {

                    $.each(result.data, function(a, b){
                        
                        var htmlClone = $(clone).clone();

                        $(htmlClone).css({
                            display : "block"
                        });

                        $(htmlClone).find("[role='kodedesa']").text(b.kode);
                        $(htmlClone).find("[role='namadesa']").text(b.nama);                        
                        $(htmlClone).find("[role='alamat']").text(namaprovinsi+", "+namakabupaten+", "+namakecamatan);                        
                        $(htmlClone).find("[role='button']").find("button").attr("onclick", "pilihdesa(this,'"+b.id+"')"); 
                        
                        $("#clone-content").append(htmlClone);

                    });

                }
                else
                {
                    $("#clone-content").html("<div class='col-lg-12' style='text-align:center'>Maaf tidak ada desa yang ditemukan</div>")
            
                }
            }
        }) 
    }

    function pilihdesa(obj, iddesa)
    {
        //alert('oke');

        var _token = $("input[name='_token']").val();

        $.ajax({
            url : "/postJoinDesa",
            type : "POST",
            dataType : "JSON",
            data : {
                _token : _token,
                iddesa : iddesa
            },
            beforeSend : function(xhr)
            {
                $(this).prop("disabled", true);
            },
            success : function(result, status, xhr)
            {
                if(result.status)
                {
                    setTimeout(function(){
                        window.location.href = "/join-desa";
                    }, 1500);
                }
            },
            error : function(error, status, xhr)
            {
                console.log("error : "+error);
            }
        });
    }

</script>

@endsection