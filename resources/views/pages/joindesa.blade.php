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

    .box-infojoin{
        width:300px;
        margin:0px auto;
        padding:10px;
        border:1px solid #ccc;
        position:relative;
        color:#999;
        background:#f9f9f9;
        border-radius:3px;
        box-shadow:1px 1px 10px #ccc;
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

        
        @if($member->email != "")
        <div class="row">

            <div class="col-lg-12">
                <!--- startcol  -->
                <div class="card">
                    @if($isSudahPilih->id_instansi == 0)
                    <div class="card-body">

                        
                        <div class="tab-content" id="nav-tabContent">
                            <div class="col-8">


                                <form class="form-horizontal">
                                    @csrf
                                    <div class="form-group row align-items-center">
                                        <label class="col-sm-3 col-form-label text-label">Kode Desa</label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <input type="text" name="kodedesa"  class="form-control"  placeholder="Berdesarkan Kode Desa">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row align-items-center">
                                        <label class="col-sm-3 col-form-label text-label"></label>
                                        <div class="col-sm-9">
                                            <button type="button" onclick="caridesa(this)" class="btn btn-xs btn-primary"><span class="mdi mdi-search-web"></span> Cari Desa</button>
                                        </div>
                                    </div>
                                    
                                </form>
                            </div>
                        </div>
                        
                    </div>

                    <hr>

                    <div class="card-body">

                        <div class="row" id="clone-content">

                            <div class="box-infojoin">
                                <i style="font-size:35px;" class="mdi mdi-account-multiple-plus"></i> <div style="position:absolute;top: 4px;left: 54px;">Silahkan gabung desa sekarang. Pilih desa sesuai dengan tempat geografis anda.</div>
                            </div>

                        </div>
                    </div>
                    @else
                    <div class="card-body">
                        <div class="tab-content" id="nav-tabContent">
                            <div class="col-12">
                                <div style="font-size:14px;" class="alert alert-success">
                                    Anda sudah memilih desa. Silahkan anda cek ke halaman profil desa untuk update informasi desa dan bumdes
                                </div>

                                <div class="text-center">
                                    <a href="{{ url('profil/desa') }}" type="button" class="btn btn-primary"> Update Profil Desa </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div> <!-- endcol-->
        </div>
        @else
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="alert alert-danger" style="font-size:14px">Mohon lengkapi profil anda terlebih dahulu. Silahkan klik tombol disamping untuk update profil anda. <a type="button" href="{{ url('profil/akun') }}" class="btn btn-xs btn-danger">Edit Profil</a> </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
    <!-- #/ container -->
</div>


<div class="col-lg-4" id="clone" style="margin:0px auto; text-align:center;">
    <div class="clone">
        <div class="box-desa">
            <div class="kodedesa" role="kodedesa">11.01.02.2001</div>
            <div class="namadesa" role="namadesa">Fajar Harapan</div>
            <div class="alamat" style="margin-bottom:10px;" role="alamat">Aceh, Aceh Barat, Kaloeke</div>
            <div class="member" style="color:#000;" role="member">0 Member</div>
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


    function caridesa(obj)
    {
        var _token    = $("input[name='_token']").val();
        var kodedesa  = $("input[name='kodedesa']").val();

        var clone     = $("#clone");

        if(kodedesa == "")
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
                kodedesa : kodedesa
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
                        $(htmlClone).find("[role='alamat']").text(b.provinsi+", "+b.kabupaten+", "+b.kecamatan);                        
                        $(htmlClone).find("[role='member']").text(result.jmlMember+" member");                        
                        $(htmlClone).find("[role='button']").find("button").attr("onclick", "pilihdesa(this,'"+b.kode+"')"); 
                        
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

    function pilihdesa(obj, kodedesa)
    {
        //alert('oke');

        var _token = $("input[name='_token']").val();

        $.ajax({
            url : "/postJoinDesa",
            type : "POST",
            dataType : "JSON",
            data : {
                _token   : _token,
                kodedesa : kodedesa
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