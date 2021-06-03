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
</style>
<!--**********************************
    Content body start
***********************************-->
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles" style="margin-bottom:4rem !important; background:#f3f6f9 !important;">
            <div class="col p-0">
                <h5>Daftar Peserta Program</h5>
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
                        <div style="color:#000;">Silahkan masukan data peserta desa yang akan mengikuti program ini.</div>
                        <div style="padding:10px; margin-top:5px; font-size:13px;" class="alert-warning">Peserta harus terdaftar sebagai member di desacenter.id dan termasuk dalam anggota desa anda.</div>
                                
                        <br>

                        <div class="table-responsive">
                            @csrf
                            <table class="table">
                                <thead class="thead-default">
                                    <tr>
                                        <th>#</th>
                                        <th><input type="checkbox"></th>
                                        <th>Nama Peserta</th>
                                        <th>Nomor KTP</th>
                                        <th>Email</th>
                                        <th>No. Telepon</th>
                                        <th>Jabatan</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody id="table-peserta">
                                    @php $seq = 1; @endphp
                                    @foreach($peserta as $peserta)
                                    <tr>
                                        <td>{{ $seq }}</td>
                                        <td><input type="checkbox" value="{{ $peserta->id }}" /></td>
                                        <td>{{ $peserta->nama }}</td>
                                        <td>{{ $peserta->ktp }}</td>
                                        <td>{{ $peserta->email }}</td>
                                        <td>{{ $peserta->telp }}</td>
                                        <td>{{ $peserta->jabatan }}</td>
                                    </tr>
                                    @php $seq++; @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="text-right">
                            <button type="button" onclick="simpandata(this)" class="btn btn-xs btn-primary">Daftarkan Peserta</button>
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
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script type="text/javascript">

    $(document).ready(function(){
        $("select[role='select2']").select2();
    });

    function simpandata(obj)
    {

        var arrayMember = [];

        var idprogram = "@php echo $idprogram @endphp";
        var token = $("input[name='_token']").val();

        var table = $("tbody#table-peserta").find("tr");

        var checked = $(table).find("td:eq(1)").find("input:checked");

        if($(checked).length == 0)
        {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Anda belum memasukan peserta untuk mengikuti program ini.'
            });

            return false;
        }

        $.each(table, function(a, b){

            var ischecked = $(b).find("td:eq(1)").find("input").is(":checked");

            if(ischecked)
            {
                var idmember = $(this).find("td:eq(1)").find("input").val();
                arrayMember.push(idmember);
            }
        });

        $.ajax({
            url  : "{{ url('program/simpanpeserta/') }}/"+idprogram,
            type : "POST",
            dataType : "JSON",
            data : {
                idprogram : idprogram,
                _token : token,
                peserta : arrayMember
            },
            beforeSend : function(xhr)
            {
                $(this).prop("disabled", true);
            },
            success : function(result, status, xhr)
            {
                if(result.status)
                {
                    window.location.href = "{{ url('program/success') }}/"+idprogram;
                }
            },
            complete : function(xhr)
            {
                $(this).prop("disabled", false);
            }
        });

    }

    function tambahpeserta(obj)
    {

        var idpeserta = $("select[name='idpeserta']").val();
        var token     = $("input[name='_token']").val();

        $.ajax({
            url : "{{ url('program/tambahpeserta') }}",
            type : "POST",
            dataType : "JSON",
            data : {
                idpeserta : idpeserta,
                _token : token
            },
            beforeSend : function(xhr)
            {
                $(obj).prop("disabled", true);

                
            },
            success : function(result, status, xhr)
            {
                var table = document.getElementById("table-peserta");

                var row = table.insertRow();

                var cell0 = row.insertCell(0);
                var cell1 = row.insertCell(1);
                var cell2 = row.insertCell(2);
                var cell3 = row.insertCell(3);
                var cell4 = row.insertCell(4);
                var cell5 = row.insertCell(5);
                var cell6 = row.insertCell(6);

                var id = result.id;
                var nama = result.nama;
                var email = result.email;
                var telp = result.telp;
                var jabatan = result.jabatan;

                cell0.innerHTML = "<input type='hidden' name='idmember' value='"+id+"'/> -";
                cell1.innerHTML = nama;
                cell2.innerHTML = "-";
                cell3.innerHTML = email;
                cell4.innerHTML = telp;
                cell5.innerHTML = jabatan;
                cell6.innerHTML = "<button onclick='remove(this)' type='button' class='btn btn-xs btn-danger'><span class='mdi mdi-playlist-remove'></span></button>";
            },
            complete : function(xhr)
            {
                $(obj).prop("disabled", false);
            }
        });
    }

    function remove(obj)
    {
        $(obj).parents("tr").remove();
    }

</script>
@endsection