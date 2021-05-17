@extends('layouts.main')


@section('content')


<!--**********************************
    Content body start
***********************************-->
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col p-0">
                <h4>Profil </h4>
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
            <div class="col-lg-4"> <!--- startcol  -->
                <div class="card">
                    <div class="card-body">
                        <div class="list-group mb-4 mb-lg-0 list-lg" id="list-tab" role="tablist">
                            <a class="list-group-item list-group-item-action active" id="list-profil-list" data-toggle="list" href="#list-profil" role="tab"><span class="mdi mdi-account-box-outline"></span> Profil Desa</a> 
                            <a class="list-group-item list-group-item-action" id="list-akun-list" data-toggle="list" href="#list-akun" role="tab"><span class="mdi mdi-office"></span> Akun</a> 
                    </div>
                    </div>
                </div>
            </div> <!-- endcol-->

            <div class="col-lg-8"> <!--- startcol  -->
                <div class="card">
                    <div class="card-body">

                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="list-profil">
                                
                            
                                <h2 class="card-title">Data Direktur</h2>
                                <hr>
                                <div class="basic-form">
                                    <form>
                                        <div class="form-group row align-items-center">
                                            <label class="col-sm-3 col-form-label text-label">Nama Direktur</label>
                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="nama" placeholder="Nama Lengkap" aria-describedby="nama">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center">
                                            <label class="col-sm-3 col-form-label text-label">Jabatan</label>
                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="jabatan" placeholder="Jabatan" aria-describedby="validationDefaultUsername2">
                                                </div>
                                            </div>
                                        </div>
        
                                        <div class="form-group row align-items-center">
                                            <label class="col-sm-3 col-form-label text-label">Nomor Handpphone Direktur</label>
                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="dir_phone" placeholder="No Handphone Aktif" aria-describedby="dir_phone">
                                                </div>
                                            </div>
                                        </div>
        
                                        <h2 class="card-title">Data Desa</h2>
                                        <hr>
        
                                        <div class="form-group row align-items-center">
                                            <label class="col-sm-3 col-form-label text-label">Nama Desa</label>
                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="nama-desa" name="nama-desa" placeholder="Nama Desa" aria-describedby="nama-desa">
                                                </div>
                                            </div>
                                        </div>
        
                                        <div class="form-group row align-items-center">
                                            <label class="col-sm-3 col-form-label text-label">Tahun Berdiri Desa</label>
                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="tahun-berdiri" name="tahun-berdiri" placeholder="Tahun berdiri Desa" aria-describedby="tahun-berdiri">
                                                </div>
                                            </div>
                                        </div>
        
                                        <div class="form-group row align-items-center">
                                            <label class="col-sm-3 col-form-label text-label">Bulan Berdiri Desa</label>
                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <select class="form-control" name="bulan-berdiri" id="bulan-berdiri">
                                                        <option class="text-muted" disabled="" selected="" style="display: none">Pilih Bulan</option>
                                                        <option value=""> Option 1</option>
                                                        <option value=""> Option 2</option>
                                                        <option value=""> Option 3</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
        
                                        <div class="form-group row align-items-center">
                                            <label class="col-sm-3 col-form-label text-label">Jumlah Karyawan Tetap</label>
                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <input type="number" class="form-control" id="karyawan-tetap" name="karyawan-tetap" placeholder="Jumlah Karyawan Tetap" aria-describedby="karyawan-tetap">
                                                </div>
                                            </div>
                                        </div>
        
        
                                        <div class="form-group row align-items-center">
                                            <label class="col-sm-3 col-form-label text-label">Jumlah Karyawan Tetap dari Desa Lokal</label>
                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <input type="number" class="form-control" id="karyawan-desa" name="karyawan-desa" placeholder="Jumlah Karyawan" aria-describedby="karyawan-desa">
                                                </div>
                                            </div>
                                        </div>
        
                                        <div class="form-group row align-items-center">
                                            <label class="col-sm-3 col-form-label text-label">Provinsi</label>
                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <select class="form-control" name="provinsi" id="provinsi">
                                                        <option class="text-muted" disabled="" selected="" style="display: none">Pilih Provinsi</option>
                                                        <option value=""> Option 1</option>
                                                        <option value=""> Option 2</option>
                                                        <option value=""> Option 3</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
        
                                        <div class="form-group row align-items-center">
                                            <label class="col-sm-3 col-form-label text-label">Kota/Kabupaten</label>
                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <select class="form-control" name="kota" id="kota">
                                                        <option class="text-muted" disabled="" selected="" style="display: none">Pilih Kota/Kabupaten</option>
                                                        <option value=""> Option 1</option>
                                                        <option value=""> Option 2</option>
                                                        <option value=""> Option 3</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
        
                                        <div class="form-group row align-items-center">
                                            <label class="col-sm-3 col-form-label text-label">Kecamatan</label>
                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <select class="form-control" name="kecamatan" id="kecamatan">
                                                        <option class="text-muted" disabled="" selected="" style="display: none">Pilih Kecamatan</option>
                                                        <option value=""> Option 1</option>
                                                        <option value=""> Option 2</option>
                                                        <option value=""> Option 3</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
        
                                        <div class="form-group row align-items-center">
                                            <label class="col-sm-3 col-form-label text-label">Kode Pos</label>
                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="kodepos" name="kodepos" placeholder="Kode Pos" aria-describedby="kodepos">
                                                </div>
                                            </div>
                                        </div>
        
                                        <div class="form-group row align-items-center">
                                            <label class="col-sm-3 col-form-label text-label">Alamat Lengkap</label>
                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat Lengkap" aria-describedby="address">
                                                </div>
                                            </div>
                                        </div>
        
                                        
                                        <div class="form-group row align-items-center">
                                            <label class="col-sm-3 col-form-label text-label">Nomor Registrasi Desa</label>
                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="noreg-bumbed" name="noreg-desa" placeholder="Nomor Registrasi Desa" aria-describedby="noreg-bumbed">
                                                </div>
                                            </div>
                                        </div>
                                       
                                       <div class="form-group text-right">
                                           <button type="" class="btn btn-md btn-primary mt-5">Simpan</button>
                                       </div>
        
                                    </form>
                                </div>



                            
                            </div>
                            
                            
                            <div class="tab-pane fade" id="list-akun" role="tabpanel">
                                <h2 class="card-title">Data Direktur</h2>
                                <hr>
                                <div class="basic-form">
                                    <form>
                                        <div class="form-group row align-items-center">
                                            <label class="col-sm-3 col-form-label text-label">Email</label>
                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <input type="email" class="form-control" id="email" name="email" aria-describedby="email">
                                                </div>
                                                <div class="text-right mt-2">
                                                    <button class="btn btn-google text-white"><span class="fa fa-google"></span> Verifikasi Google</button>
                                                </div>
                                            </div>

                                            
                                        </div>
                                        <div class="form-group row align-items-center">
                                            <label class="col-sm-3 col-form-label text-label">No. Handphone</label>
                                            <div class="col-sm-9">
                                                <div class="input-group ">
                                                    <input type="tel" class="form-control" id="phone" name="phone" placeholder="81234567890" aria-describedby="phone" value="{{ $phone }}">
                                                </div>
                                                <div class="text-right mt-2">
                                                    @if ($phone != null)

                                                    @else
                                                    
                                                    <button class="btn btn-whatsapp text-white"><span class="fa fa-phone"></span> Verifikasi Nomor</button>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                       
                                        <div class="form-group text-right">
                                            <button type="" class="btn btn-md btn-primary mt-5">Simpan</button>
                                        </div>

                                    </form>
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


@endsection