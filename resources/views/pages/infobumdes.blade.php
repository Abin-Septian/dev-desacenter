@extends('layouts.main')

@section('content')

<style>
    .box-title > h5{
        border-top:1px dashed #999;
        border-bottom:1px dashed #999;
        padding:8px 0px;
        color:#999;
        font-size:14px;
        margin-bottom:15px;
    }
</style>
<!--**********************************
    Content body start
***********************************-->
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles" style="margin-bottom:4rem !important; background:#f3f6f9 !important;">
            <div class="col p-0">
                <h5>Informasi Bumdes</h5>
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

                @if(Session::has('status'))
                    <div class="alert alert-success" style="font-size:14px;">
                        {{ Session('status') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-body">

                        
                        <form class="form-horizontal" method="POST" action="{{ url('profil/updatebumdes') }}">
                            <div class="box-title">
                                <h5>Data Informasi Bumdes</h5>
                            </div>

                            @csrf
                            <div class="form-group row align-item-center sr-only">
                                <label class="col-lg-2 col-form-label text-label">Nomor Reg. Bumdes</label>
                                <div class="col-lg-8">
                                    <div class="input-group">
                                        <input value=" {{ old('kodebumdes', $bumdes->kode_bumdes) }}" onblur="ambilKodeBumdes(this)" placeholder="Nomor Registrasi Bumdes" class="@error('kodebumdes') is-invalid @enderror form-control" name="kodebumdes" type="text" />
                                    </div>

                                    @error('kodebumdes')
                                    <div class="alert-danger" style="padding:5px; font-size:14px; margin-top:10px;">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    <div style="padding:5px; margin-top:10px;" class="alert-warning">
                                        <span class="mdi mdi-information"></span> Untuk mengetahui nomor registrasi bumdes silahkan anda klik alamat website ini <a target="_blank" href="https://sid.kemendesa.go.id/">sid.kemendesa.go.id</a>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row align-item-center">
                                <label class="col-lg-2 col-form-label text-label">Nama Bumdes</label>
                                <div class="col-lg-8">
                                    <div class="input-group">
                                        <input value="{{ old('namabumdes', $bumdes->nama_bumdes) }}" placeholder="Nama Bumdes" class="@error('namabumdes') is-invalid @enderror form-control" name="namabumdes" type="text" />
                                    </div>

                                    @error('namabumdes')
                                    <div class="alert-danger" style="padding:5px; font-size:14px; margin-top:10px;">
                                        {{ $message }}
                                    </div>
                                    @enderror

                                    
                                </div>
                            </div>

                            <div class="form-group row align-item-center">
                                <label class="col-lg-2 col-form-label text-label">Alamat Bumdes</label>
                                <div class="col-lg-8">
                                    <div class="input-group">
                                        <textarea name="alamatbumdes" class="form-control" rows="6">{{ old('alamatbumdes', $bumdes->alamat_bumdes) }}</textarea>
                                    </div>
                                    @error('alamatbumdes')
                                    <div class="alert-danger" style="padding:5px; font-size:14px; margin-top:10px;">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row align-item-center">
                                <label class="col-lg-2 col-form-label text-label">Tahun Berdiri</label>
                                <div class="col-lg-2">
                                    <div class="input-group">
                                        <input value="{{ old('tahun', $bumdes->tahun_berdiri) }}" type="text" class="form-control" name="tahun" placeholder="Tahun"/>
                                    </div>
                                    
                                </div>
                            </div>

                            <div class="form-group row align-item-center">
                                <label class="col-lg-2 col-form-label text-label">Unit Usaha</label>
                                <div class="col-lg-8" style="color:#000;">

                                    @foreach($unitusaha as $unit)
                                        @php
                                            $units = (strlen($bumdes->unit_usaha) > 0) ? json_decode($bumdes->unit_usaha, true) : array();


                                                if(in_array($unit->id_unit_usaha, $units))
                                                {
                                                    $checked = "checked";
                                                }
                                                else
                                                {
                                                    $checked = "";
                                                }
                                            

                                        @endphp
                                        <div class="custom-control custom-checkbox">
                                            <input @php echo $checked @endphp type="checkbox" name="unitusaha[]" onclick="isunitlain(this)" value="{{ $unit->id_unit_usaha }}" class="custom-control-input" id="{{ $unit->kode_unit_usaha }}">
                                            <label class="custom-control-label" for="{{ $unit->kode_unit_usaha }}">{{ $unit->nama_unit_usaha }}</label>
                                        
                                            @if($unit->id_unit_usaha == 7)
                                                <input value="{{ $bumdes->unit_lainnya }}" disabled type="text" name="unitlain" placeholder="Unit Lainnya"/>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="form-group row align-item-center">
                                <label class="col-lg-2 col-form-label text-label">Email Bumdes</label>
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <input value="{{ old('emailbumdes', $bumdes->email_bumdes) }}" type="text" class="@error('emailbumdes') is-invalid @enderror form-control" name="emailbumdes" placeholder="Email Bumdes"/>
                                    </div>
                                    
                                    @error('emailbumdes')
                                    <div class="alert-danger" style="padding:5px; font-size:14px; margin-top:10px;">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row align-item-center">
                                <label class="col-lg-2 col-form-label text-label">Telp Bumdes</label>
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <div class="input-group-append">
                                            <span class="input-group-text">+62</span>
                                        </div>
                                        <input value="{{ old('telpbumdes', substr($bumdes->telp_bumdes,3,99)) }}" onblur="return $(this).val(parseInt($(this).val()))" type="text" class="@error('telpbumdes') is-invalid @enderror form-control" name="telpbumdes" placeholder="Telp Bumdes"/>
                                    </div>

                                    @error('telpbumdes')
                                    <div class="alert-danger" style="padding:5px; font-size:14px; margin-top:10px;">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="box-title">
                                <h5>Data Pengurus Bumdes</h5>
                            </div>
                            
                            <!-- DIREKTUR BUMDES -->
                            <div class="form-group row align-item-center">
                                <label class="col-lg-2 col-form-label text-label">Nama Direktur</label>
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <input value="{{ old('namadirektur', $bumdes->nama_direktur) }}" type="text" class="@error('namadirektur') is-invalid @enderror form-control" name="namadirektur" placeholder="Nama Direktur Bumdes"/>
                                    </div>
                                    
                                    @error('namadirektur')
                                    <div class="alert-danger" style="padding:5px; font-size:14px; margin-top:10px;">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row align-item-center">
                                <label class="col-lg-2 col-form-label text-label">Email Direktur</label>
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <input value="{{ old('emaildirektur', $bumdes->email_direktur) }}" type="text" class="@error('emaildirektur') is-invalid @enderror form-control" name="emaildirektur" placeholder="Email Direktur Bumdes"/>
                                    </div>

                                    @error('emaildirektur')
                                    <div class="alert-danger" style="padding:5px; font-size:14px; margin-top:10px;">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    
                                </div>
                            </div>

                            <div class="form-group row align-item-center">
                                <label class="col-lg-2 col-form-label text-label">Nomor Wa Direktur</label>
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <div class="input-group-append">
                                            <span class="input-group-text">+62</span>
                                        </div>
                                        <input value="{{ old('wadirektur', substr($bumdes->wa_direktur,3,99)) }}" onblur="return $(this).val(parseInt($(this).val()))" type="text" class="@error('wadirektur') is-invalid @enderror form-control" name="wadirektur" placeholder="WA Direktur Bumdes"/>
                                    </div>

                                    @error('wadirektur')
                                    <div class="alert-danger" style="padding:5px; font-size:14px; margin-top:10px;">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <hr style="border:1px dashed #ccc; margin-bottom:20px;">

                            <!-- SEKERTARIS BUMDES -->
                            <div class="form-group row align-item-center">
                                <label class="col-lg-2 col-form-label text-label">Nama Sekertaris</label>
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <input value="{{ old('namasekertaris', $bumdes->nama_sekretaris) }}" type="text" class="form-control" name="namasekertaris" placeholder="Nama Sekertaris Bumdes"/>
                                    </div>
                                    
                                </div>
                            </div>

                            <div class="form-group row align-item-center">
                                <label class="col-lg-2 col-form-label text-label">Email Sekertaris</label>
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <input value="{{ old('emailsekertaris', $bumdes->email_sekretaris) }}" type="text" class="form-control" name="emailsekertaris" placeholder="Email Sekertaris Bumdes"/>
                                    </div>
                                    
                                </div>
                            </div>

                            <div class="form-group row align-item-center">
                                <label class="col-lg-2 col-form-label text-label">Nomor Wa Sekertaris</label>
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <div class="input-group-append">
                                            <span class="input-group-text">+62</span>
                                        </div>
                                        <input value="{{ old('wasekertaris', substr($bumdes->wa_sekretaris,3,99)) }}" onblur="return $(this).val(parseInt($(this).val()))" type="text" class="form-control" name="wasekertaris" placeholder="WA Sekertaris Bumdes"/>
                                    </div>
                                </div>
                            </div>
                            
                            <hr style="border:1px dashed #ccc; margin-bottom:20px;">

                            <!-- BENDARA BUMDES -->
                            <div class="form-group row align-item-center">
                                <label class="col-lg-2 col-form-label text-label">Nama Bendahara</label>
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <input value="{{ old('namabendahara', $bumdes->nama_bendahara) }}" type="text" class="form-control" name="namabendahara" placeholder="Nama Bendahara Bumdes"/>
                                    </div>
                                    
                                </div>
                            </div>

                            <div class="form-group row align-item-center">
                                <label class="col-lg-2 col-form-label text-label">Email Bendahara</label>
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <input value="{{ old('emailbendahara', $bumdes->email_bendahara) }}" type="text" class="form-control" name="emailbendahara" placeholder="Email Bendahara Bumdes"/>
                                    </div>
                                    
                                </div>
                            </div>

                            <div class="form-group row align-item-center">
                                <label class="col-lg-2 col-form-label text-label">Nomor Wa Bendahara</label>
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <div class="input-group-append">
                                            <span class="input-group-text">+62</span>
                                        </div>
                                        <input value="{{ old('wabendahara', substr($bumdes->wa_bendahara,3,99)) }}" onblur="return $(this).val(parseInt($(this).val()))" type="text" class="form-control" name="wabendahara" placeholder="WA Bendahara Bumdes"/>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row align-item-center">
                                <label class="col-lg-2 col-form-label text-label"></label>
                                <div class="col-lg-10 text-right">
                                    <button class="btn btn-xs btn-primary" type="submit">Simpan Data</button>
                                </div>
                            </div>

                        </form>
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

    $(document).ready(function(){

        var unitusaha = $("input[name='unitusaha[]']");

        $.each(unitusaha, function(a, b){
            var checked = $(this).is(":checked");

            if(checked)
            {
                var idunitusaha = $(this).val();

                if(idunitusaha == 7)
                {
                    $("input[name='unitlain']").prop("disabled", false)
                }
            }
        });

    });

    function isunitlain(obj)
    {
        var isIDUnit = $(obj).val();

        if(isIDUnit == 7)
        {
            var ischecked = $(obj).is(":checked");

            if(ischecked)
            {
                $("input[name='unitlain']").prop("disabled", false);
            }
            else
            {
                $("input[name='unitlain']").prop("disabled", true);

            }
        }
    }


    function ambilKodeBumdes(obj)
    {
        var kodebumdes = $("input[name='kodebumdes']").val();

        $.ajax({
            url : "/getMaster/kodebumdes",
            type : "POST",
            dataType : "JSON",
            data : {
                _token : $("input[name='_token']").val(),
                kodebumdes : kodebumdes
            },
            beforeSend : function(xhr)
            {
                $("div[role='alert']").remove();
                $("input[name='namabumdes']").val("Sedang mencari bumdes . . .")
            },
            success : function(result, status, xhr)
            {
                if(result.status)
                {
                    $("input[name='namabumdes']").val(result.data.namabumdes);
                }
                else
                {
                    $(obj).parent().parent().prepend("<div role='alert' class='alert-danger' style='margin-bottom:10px; font-size:14px; padding:8px;'>Nomor registrasi bumdes tidak ditemukan. Silahkan cek kembali nomor registrasi bumdes anda.</div>")
                    $("input[name='namabumdes']").val("");
                }
            }
        });
    }

</script>
@endsection