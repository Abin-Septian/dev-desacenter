@extends('layouts.main')

@section('content')

<style>
    .box-step{

        border:0px solid #ccc;
        box-shadow:1px 1px 10px #ccc;
        padding:10px;
        margin:10px 0px;
    }

    .box-relative{
        position:relative;
        padding:20px 0px;
        margin-top:15px;
    }

    .box-steps{
        border:0px solid #ccc;
    }

    .dot{
        border:4px solid #999;
        padding:5px;
        border-radius:10px;
        position:absolute;
        top:6px;
        background:#fff;
        z-index:99;
        
    }
    
    .border-dot{
        border-top:1px dashed #000;
        width: 100%;
        position: absolute;
        left:0px;
        top:15px;
    }

    .text-step{
        padding:0px 15px;
        color:#000;
        font-size:13px;
        text-align: center;
    }

    .btn-xs{
        padding:5px 10px;
    }

    .text-small{
        font-size:12px;
        padding:5px 10px;
    }
</style>
<!--**********************************
    Content body start
***********************************-->
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles" style="margin-bottom:4rem !important;">
            <div class="col p-0">
                <h5>Dashboard</h5>
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
                            <div class="row">
                                <div class="col-lg-8">
                                    <h5>Selamat, Datang <span style="text-transform:uppercase">{{ $member->nama }}</span> !</h5>

                                    <div class="rows">
                                        <div class="box-step">
                                            <div style="color:#000;">Silahkan lengkapi profil Berikut ini : </div>

                                            <div class="box-steps">
                                                <div class="d-flex flex-row bd-highlight mb-3">
                                                    <div class="bd-highlight box-steps">
                                                        <div class="box-relative">
                                                            <div style="left:25px;" class="dot"></div>
                                                            <div class="border-dot"></div>
                                                        </div>
                                                        <div style="clear:both;"></div>
                                                        <div class="text-step">Profil</div> 
                                                    </div>
                                                    <div class="bd-highlight box-steps">
                                                        <div class="box-relative">
                                                            <div style="left:45px;" class="dot"></div>
                                                            <div class="border-dot"></div>
                                                        </div>
                                                        <div style="clear:both;"></div>
                                                        <div class="text-step">Join Desa</div>
                                                    </div>
                                                    <div class="bd-highlight box-steps">
                                                        <div class="box-relative">
                                                            <div style="left:60px;" class="dot"></div>
                                                            <div class="border-dot"></div>
                                                        </div>
                                                        <div style="clear:both;"></div>
                                                        <div class="text-step">Informasi Desa</div> 
                                                    </div>
                                                    <div class="bd-highlight box-steps">
                                                        <div class="box-relative">
                                                            <div style="left:45px;" class="dot"></div>
                                                            <div class="border-dot"></div>
                                                        </div>
                                                        <div style="clear:both;"></div>
                                                        <div class="text-step">Assesment</div> 
                                                    </div>
                                                    <div class="bd-highlight box-steps" style="padding:10px;">
                                                        <button class="btn btn-xs btn-info">Lengkapi Profil</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <h5>Informasi Desacenter.id</h5>

                                    <div class="">
                                        In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- endcol-->

        </div>

        <div class="row">
            <div class="col-lg-5">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-8">
                                <h5>Data Profil</h5>
                                <div class="form-horizontal">
                                    <div class="form-group" style="margin:0px;">
                                        <label style="margin:0px; font-weight:500; font-size:14px; color:#000;">Uid [otomatis sistem] : </label>
                                        <div style="color:#666;">{{ $member->uid }}</div>
                                    </div>
                                    <div class="form-group" style="margin:0px;">
                                        <label style="margin:0px; font-weight:500; font-size:14px; color:#000;">Telepon : </label>
                                        <div style="color:#666;">{{ $member->telp }}</div>
                                    </div>
                                    <div class="form-group" style="margin:0px;">
                                        <label style="margin:0px; font-weight:500; font-size:14px; color:#000;">Nama User : </label>
                                        <div style="color:#666;">{{ $member->nama }}</div>
                                    </div>
                                    <div class="form-group" style="margin:0px;">
                                        <label style="margin:0px; font-weight:500; font-size:14px; color:#000;">Email User : </label>
                                        <div style="color:#666;">{{ $member->email }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                            @if( Session::has('uid') )
                                <img id="img" style="width:100px;border:1px solid #ccc;" class="rounded-circle" alt="200x200" src="{{ (asset('storage/upload/'.$member->foto)) }}" data-holder-rendered="true">
                            @else
                                <img id="img" style="width:100px;border:1px solid #ccc;" class="rounded-circle" alt="200x200" src="{{ (asset('assets/images/user-4.jpg')) }}" data-holder-rendered="true">
                            @endif
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="alert-danger text-small">
                                            Silahkan update profil anda jika anda belum mengisi data profil.
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <a href="{{ url('profil/akun') }}" type="button" class="btn btn-xs btn-info">Edit Profil</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            

            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h5>Webinar / Training</h5>
                        <div>Belum ada Webinar</div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <h5>Perlu Bantuan ?</h5>
                        <div>Sampaikan keluhan atau bantuan yang anda butuhkandi sini.</div>
                        <br>
                        <div class="text-right">
                            <button class="btn btn-xs btn-info">Bantuan</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <h5>Gabung Desa</h5>

                        <div>Silahkan gabung desa sesuai dengan desa anda saat ini.</div>
                        <br>
                        <div class="text-right">
                            <a type="button" href="{{ url('/join-desa') }}" class="btn btn-xs btn-info">Gabung desa</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5>Apporve Member Desa</h5>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Telp</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            
                            </tbody>
                        </table>
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