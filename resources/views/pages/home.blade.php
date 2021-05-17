@extends('layouts.main')


@section('content')


<!--**********************************
    Content body start
***********************************-->
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col p-0">
                <h4>Dashboard {{ $phone }}</h4>
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
                <div class="card border-primary">
                    <div class="card-body">
                        <h2>Selamat Datang, Nanda Fathurrizki</h2>
                        <p class="card-text mt-2">Some quick example text to build on the card title and
                            make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-4"> <!--- startcol  -->
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Data Direktur</h2>
                        <p class="card-text">
                            <div class="info-direktur">
                                <p class="mb-2">
                                    <strong>Nama:</strong> Nanda Fathurrizki
                                </p>
                                <p class="mb-2">
                                    <strong>Jabatan:</strong> Anggota
                                </p>
                                <p class="mb-2">
                                    <strong>Nomor Telepon:</strong> 0282284710743
                                </p>
                            </div>
                            <hr  class="mb-4 mt-4 bg-white">
                            <div class="info-bumdes">
                                <p class="mb-2">
                                    <strong>Nama Bumdes:</strong> Bumdes GOO
                                </p>
                                <p class="mb-2">
                                    <strong>Alamat:</strong> Ini alamat GOO
                                </p>
                                <p class="mb-2">
                                    <strong>Nomor Registrasi:</strong> 3311092000
                                </p>
                            </div>

                            <a href="{{ url('/profil') }}" class="btn btn-dark btn-card mt-5"> Edit</a>
                        </p>
                    </div>
                </div>
            </div> <!-- endcol-->

            <div class="col-lg-4">

                
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Unit Usaha</h2>
                        <p class="card-text">Belum ada unit usaha</p>
                    </div>
                </div>
                

            </div>

            <div class="col-lg-4">

                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Konten Edukasi</h2>
                        <p class="card-text text-muted">
                            Belum ada konten
                        </p>
                    </div>
                </div>

                <div class="card">
                    <img class="card-img-top" src="https://images.unsplash.com/photo-1577563820627-bc12aa2139de?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Perlu Bantuan?</h5>
                        <p class="card-text"><strong>Sampaikan keluhan atau bantuan yang anda butuhkan <a href="#" target="_blank"> di sini</a></strong></p>
                        <a href="mailto:nanda@klikaplikasi.com" class="btn btn-primary" target="_blank"> Kontak </a>
                        </p>
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