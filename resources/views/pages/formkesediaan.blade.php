@extends('layouts.main')

@section('content')
<style>
    .box-syaratketentuan{
        border:1px solid #ccc;
        box-shadow:1px 1px 10px #ccc;
        padding:10px;
        overflow-y:scroll;
        overflow-x:hidden;
        height:500px;
        text-align: justify;
        color:#000;
        font-size:16px;
    }

    thead.thead-default{
        background:#283593;
        color:#fff;
    }

    .select2-container .select2-selection--single{
        height:40px !important;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered{
        line-height:40px !important;
    }

    .kop-header{
        font-size:18px;
        color:#000;
        text-align:center;
        font-weight: 500;
    }

    .paragraf{
        margin-bottom: 15px;
        color:#000;
    }

    ul.syarat{
        margin:10px 20px;
    }

    ul.syarat > li{
        list-style:decimal;
    }

    .body-formulir{
        margin:20px 100px;
    }
</style>
<!--**********************************
    Content body start
***********************************-->
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles" style="margin-bottom:4rem !important; background:#f3f6f9 !important;">
            <div class="col p-0">
                <h5>Formulir Kesediaan</h5>
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
                <div class="card">
                    <div class="card-body">
                        
                        <div class="kop-header">
                            <div>Form Konfirmasi Kesediaan Peserta</div>
                            <div>Program BRIncubator Desa Brilian</div>
                        </div>

                        <div class="body-formulir">
                            <div class="paragraf">
                                <div>Bersama ini Kami Menyatakan:</div>
                                <ul class="syarat">
                                    <li>Siap mengikuti seluruh rangkaian kegiatan Webinar dan kegiatan yang telah dijadwalkan oleh Panitia program BRIncubator Desa Brilian</li>
                                    <li>Mengikuti Tata Tertib webinar dan kegiatan yang ditetapkan oleh panitia</li>
                                    <li>Berperan serta aktif selama Webinar dan mengumpulkan Cerita Inovasi dan Inspirasi Desa Brilian ke Panitia sesuai ketentuan.</li>
                                </ul>
                            </div>

                            <div class="paragraf">
                                <div>Peserta yang diharapkan mengikuti Webinar adalah sebagai berikut :</div>
                                <ul class="syarat">
                                    <li>Kepala Desa atau yang mewakili</li>
                                    <li>Ketua BPD, Tokoh mogram Inkubasi Desa Brilian</li>
                                    <li>Direktur BUMDES yang mewakili.</li>
                                </ul>
                            </div>

                            <div class="paragraf">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Jabatan</th>
                                            <th>Email</th>
                                            <th>Telp</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $seq = 1; @endphp
                                        @foreach($peserta as $peserta)
                                        <tr>
                                            <td>{{ $seq }}</td>
                                            <td>{{ $peserta->nama }}</td>
                                            <td>{{ $peserta->jabatan }}</td>
                                            <td>{{ $peserta->email }}</td>
                                            <td>{{ $peserta->telp }}</td>
                                        </tr>
                                        @php $seq++; @endphp
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="paragraf">
                                Demikian form ini kami isi sesuai data yang sebenar-benarnya. Dan bersama dengan formulir kami akan siap berperan serta dalam Program BRIncubator Desa BRilian.
                            </div>

                            <div class="text-right">
                                <a href="{{ url('dashboard') }}" class="btn btn-xs btn-primary">Kembali Ke Dashboard</a>
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
