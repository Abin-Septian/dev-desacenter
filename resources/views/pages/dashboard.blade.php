@extends('layouts.main')


@section('autentikasiuser')

    @if($member->email == NULL)
    <div class="alert alert-danger" style="font-size:14px;">
        Profil anda belum lengkap. Silahkan untuk melengkapi profil terlebih dahulu.
    </div>
    @endif

@endsection

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
        padding:5px 15px;
        color:#000;
        font-size:13px;
        color:#fff;
        text-align: center;
    }

    .btn-xs{
        padding:5px 10px;
    }

    .text-small{
        font-size:12px;
        padding:5px 10px;
    }

    .box-poster{
        height:60px;
    }

    .box-program{
        border-radius:8px;
        overflow: hidden;
        box-shadow:1px 1px 10px #ccc;
        background:#fff3cd !important;
        padding:5px 0px;
    }

    .text-addon{
        text-align:left;
        color:#555;
        font-size:13px;
    }
</style>
<!--**********************************
    Content body start
***********************************-->
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles" style="margin-bottom:4rem !important; background:#ffd656 !important;">
            <div class="col p-0">
                <h5>Dashboard</h5>
            </div>
            <div class="col p-0">
                <ol class="breadcrumb" >
                    <li class="breadcrumb-item"><a style="color:#000 !important;" href="javascript:void(0)">Layout</a>
                    </li>
                    <li style="color:#000 !important;" class="breadcrumb-item active">Blank</li>
                </ol>
            </div>
            
        </div>

        

        <div class="row">

            <div class="col-lg-12">
                <!--- startcol  -->
                @yield('autentikasiuser')

                <div class="card">
                    <div class="card-body">
                        <div class="tab-content" id="nav-tabContent">
                            <div class="row">
                                <div class="col-lg-8">
                                    <h5>Selamat, Datang <span style="text-transform:uppercase">{{ $member->nama }}</span> !</h5>

                                    <div class="rows">
                                        <div class="box-step">
                                            <div style="color:#000;">Silahkan lengkapi profil Berikut ini : </div>
                                            @php
                                                $step1 = ($step['profil']['status'] == true) ? "green" : "red";
                                                $step2 = ($step['joindesa']['status'] == true) ? "green" : "red";
                                                $step3 = ($step['profildesa']['status'] == true) ? "green" : "red";
                                                $step4 = ($step['profilbumdes']['status'] == true) ? "green" : "red";

                                                
                                            @endphp
                                            <div class="box-steps">
                                                <div class="d-flex flex-row bd-highlight mb-3">
                                                    <div class="bd-highlight box-steps">
                                                        <div class="box-relative">
                                                            <div style="left:25px;" class="dot"></div>
                                                            <div class="border-dot"></div>
                                                        </div>
                                                        <div style="clear:both;"></div>
                                                        <div style="background:<?php echo $step1 ?>;" class="text-step">Profil</div> 
                                                    </div>
                                                    <div class="bd-highlight box-steps">
                                                        <div class="box-relative">
                                                            <div style="left:45px;" class="dot"></div>
                                                            <div class="border-dot"></div>
                                                        </div>
                                                        <div style="clear:both;"></div>
                                                        <div style="background:<?php echo $step2 ?>;" class="text-step">Join Desa</div>
                                                    </div>
                                                    <div class="bd-highlight box-steps">
                                                        <div class="box-relative">
                                                            <div style="left:40px;" class="dot"></div>
                                                            <div class="border-dot"></div>
                                                        </div>
                                                        <div style="clear:both;"></div>
                                                        <div style="background:<?php echo $step3 ?>;" class="text-step text-center">Profil Desa</div> 
                                                    </div>
                                                    <div class="bd-highlight box-steps">
                                                        <div class="box-relative">
                                                            <div style="left:45px;" class="dot"></div>
                                                            <div class="border-dot"></div>
                                                        </div>
                                                        <div style="clear:both;"></div>
                                                        <div style="background:<?php echo $step4 ?>;" class="text-step">Profil Bumdes</div> 
                                                    </div>
                                                    <div class="bd-highlight box-steps" style="padding:10px;">
                                                        <a type="button" href="{{ url('profil/akun') }}" class="btn btn-xs btn-info">Lengkapi Profil</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <h5>Kelengkapan Dokumen</h5>

                                    <div class="alert alert-danger" style="font-size:14px;">
                                        Anda belum melengkapi dokumen Surat Kesediaan. 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- endcol-->
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row" style="border-bottom:1px dashed #ccc; margin-bottom:15px;">
                            <div class="col-lg-6">
                                <h5 style="font-size:13px;">Addon Program</h5>
                            </div>
                            <div class="col-lg-6 text-right">
                                <a style="font-size:13px;" href="#">Lihat Semua</a>
                            </div>
                        </div>

                        <div class="row">
                        @if(count($program) > 0)
                            @foreach($program as $dataprogram)
                            
                            <div class="col-lg-4">
                                <div class="box-program">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="box-poster text-center">
                                                <img class="rounded-circle" src="{{ $dataprogram->banner }}" style="width:60px; height:60px;"/>
                                            </div>
                                              
                                        </div>
                                        <div class="col-lg-8" style="padding-left:0px;">
                                            <div style="padding:5px;">
                                                <div class="text-addon">{{ $dataprogram->nama }}</div>
                                                <div class="text-addon">
                                                     
                                                    <span class="mdi mdi-calendar-clock"></span>
                                                    Tanggal
                                                    {{ date("d M Y", strtotime($dataprogram->tanggal)) }}
                                                    
                                                </div>
                                                <div class="text-addon">
                                                    
                                                    <span class="mdi mdi-account-circle"></span>
                                                    Yang mengikuti
                                                    {{ $dataprogram->jml }} Peserta
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12 text-center">
                                            <a type="button" href="{{ url('program/detail/'.$dataprogram->id) }}" style="padding:2px 10px;">Ikuti Program</a>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            
                            @endforeach
                        @else
                            kosong
                        @endif
                        </div>
                    </div>
                </div>
            </div>
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
                            @if( $member->foto != "" )
                                <img id="img" style="width:100px;height:100px; border:1px solid #ccc;" class="rounded-circle" alt="200x200" src="{{ (asset('storage/upload/'.$member->foto)) }}" data-holder-rendered="true">
                            @else
                                <img id="img" style="width:100px;height:100px; border:1px solid #ccc;" class="rounded-circle" alt="200x200" src="{{ (asset('assets/images/user-4.jpg')) }}" data-holder-rendered="true">
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
                                    <!--<div class="col-lg-4">
                                        <a href="{{ url('profil/akun') }}" type="button" class="btn btn-xs btn-info">Edit Profil</a>
                                    </div>-->
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

                
            </div>

            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <h5>Perlu Bantuan ?</h5>
                        <div>Sampaikan keluhan atau bantuan yang anda butuhkan disini</div><br>
                        <div class="text-right">
                            <button class="btn btn-xs btn-warning">Bantuan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--<div class="row">
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
        </div>-->
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