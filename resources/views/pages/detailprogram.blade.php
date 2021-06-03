@extends('layouts.main')

@section('content')

<style>
    .box-title > h5{
        border-top:1px dashed #999;
        border-bottom:1px dashed #999;
        padding:8px 0px;
        color:#555;
        font-size:18px;
        font-weight:500;
        margin-bottom:15px;
    }

    .box-poster{
        width:100%; 
        border:1px solid #ccc; 
        border-radius:3px; 
        box-shadow:1px 1px 10px #ccc;
    }

    .box-jumlah{
        background:#fff3cd !important;
        padding:10px;
        text-align:center;
        border:1px solid #ccc;
        box-shadow:1px 1px 10px #ccc;
        color:#000;
        line-height: 28px;
        border-radius: 5px;
    }

    .swal2-popup{
        width:45em !important;
        font-size:12px;
    }

    .btn-xs{
        padding:5px 10px !important;
        font-size: 14px !important;
    }
</style>
<!--**********************************
    Content body start
***********************************-->
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles" style="margin-bottom:4rem !important; background:#f3f6f9 !important;">
            <div class="col p-0">
                <h5>Program Bumdes</h5>
            </div>
            <div class="col p-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a style="color:#000 !important" href="javascript:void(0)">Layout</a>
                    </li>
                    <li style="color:#000 !important" class="breadcrumb-item active">Blank</li>
                </ol>
            </div>
            
        </div>

        <div class="row">
            <div class="col-lg-12">

                @if( Session::has('statusError') )
                    <div class="alert alert-danger" style="font-size:14px;">
                        {{ Session('statusError') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="box-poster">
                                    <img src="{{ $detail->banner }}" style="width:100%;"/>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="box-title">
                                    <h5>{{ $detail->nama }}</h5>
                                </div>
                                <div style="color:#555; text-align:justify; margin-bottom:15px;">
                                    @php 
                                        $string = strip_tags($detail->tentang);
                                        if (strlen($string) > 500) {

                                            // truncate string
                                            $stringCut = substr($string, 0, 800);
                                            $endPoint = strrpos($stringCut, ' ');

                                            //if the string doesn't contain any space then it will cut without word basis.
                                            $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                            $string .= ' ... ';
                                        }
                                        echo $string;
                                    @endphp
                                </div>
                                

                                @if($member->id_instansi != 0)
                                <div class="box-jumlah">
                                    <h5 style="border-bottom:1px dashed #555; font-size:14px; padding-bottom:5px;">Pendaftaran Program</h5>
                                    <div class="">Jumlah Peserta yang mendaftar</div>
                                    <div style="font-size:30px;">{{ $pemesanan->count() }}</div>
                                    <div class="">Peserta</div>
                                    <div>
                                        <!--<a type="button" href="{{ url('program/ikut/'.$detail->id) }}" class="btn btn-xs btn-default">Ikut Program</a>-->
                                        @csrf
                                        <a type="button" style="padding:10px !important;" href="{{ url('program/syaratketentuan/'.$detail->id) }}" class="btn btn-xs btn-primary">Ikut Program</a>
                                    
                                        <div style="margin-top:10px;" id="notif-callback"></div>
                                    </div>
                                </div>
                                @else
                                <div class="alert alert-danger" style="font-size:14px">
                                    Anda belum bergabung dalam anggota desa. Silahkan gabung desa anda dengan klik tombol "Gabung desa" <a href="{{ url('join-desa') }}" class="btn btn-xs btn-primary" type="button">Gabung Desa</a>
                                </div>
                                @endif
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

@section('script')
    <script type="text/javascript">
        
        

        function ikutprogram__(obj)
        {
            $(document).ready(function(){
            
                $("button.swal2-confirm").prop("disabled", true);

                $("input[role='checked']").on("click", function(){

                    var checked = $(this).is(":checked");

                    if(checked)
                    {
                        $("button.swal2-confirm").prop("disabled", false);
                    }
                    else
                    {
                        $("button.swal2-confirm").prop("disabled", true);
                    }
                });
                
            });

            Swal.fire({
                html: '<div style="font-weight:bold;">Apakah anda yakin ingin mengikuti prorgam ini?</div> <div><input role="checked" type="checkbox" /> Saya mengerti dan mengikuti <a href="">Syarat dan Ketentuan</a> yang berlaku</div>',
                confirmButtonText: `Ikuti Program`,
                }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    var idprogram = '<?php echo $detail->id ?>';

                    $.ajax({
                        url      : "{{ url('program/ikut') }}/"+idprogram ,
                        type     : "POST",
                        dataType : "JSON",
                        data     : {
                            idprogram : idprogram,
                            _token : $("input[name='_token']").val()
                        },
                        beforeSend : function(xhr)
                        {
                            $("#notif-callback").html("Mohon tunggu sebentar, Loading . . .");
                            $("button.swal2-confirm").prop("disabled", true);
                        },
                        success : function(result, status, xhr){

                            if(result.status == "berhasil")
                            {
                                setTimeout(function(){
                                    window.location.href = result.callback;
                                }, 2500);

                                $("#notif-callback").html("<div class='alert alert-success' style='font-size:14px '>"+result.message+"</div>");
                            }
                            else
                            {
                                setTimeout(function(){
                                    window.location.href = result.callback;
                                }, 2500);

                                $("#notif-callback").html("<div class='alert alert-success' style='font-size:14px '>"+result.message+"</div>");
                            }
                        }

                    });
                }
            })
        }

    </script>

@endsection