@extends('layouts.auth')

@section('content')

<div class="login-bg2 h-100">
    <div class="container-fluid h-100">
        <div class="row justify-content-between h-100">
            <div class="col-xl-4">
                <div class="login-info">
                    <h2>Majukan Desa bersama kami</h2>
                    <p class="mb-5">A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country in which roasted parts of sentences fly into your mouth.</p>
                    <h5>Ph: +62812 34567890</h5>
                    <h5>Email: hello@example.com</h5>
                </div>
            </div>
            <div class="col-xl-3 p-0">
                <div class="form-input-content login-form bg-white">
                    <div class="card">
                        <div class="card-body">
                            <div class="logo text-center">
                                <a href="{{ url('/register') }}">
                                    <img src="{{ asset('assets/images/dsc_logo.png') }}" alt="desacenter-logo" style="height: 50px" >
                                </a>
                            </div>
                            <h4 class="text-center mt-5">Daftar akun desacenter.id</h4>

                            <div id="notifikasi"></div>

                            <form class="mt-5 mb-5">
                                @csrf
                                <div class="form-group" id="form-phone">
                                    <label>Nomor Handphone</label>
                                    <div>
                                        <div class="input-group">
                                            <div class="input-group-append bg-custom b-0"><span class="input-group-text">+62</span></div>
                                            <input type="tel" minlength="11" maxlength="12" class="form-control" placeholder="Nomor Handphone" name="phone" id="phone">
                                        </div><!-- input-group -->
                                    </div>
                                </div>
                                <div class="form-group" id="form-otp">
                                    <label>Kode OTP</label>
                                    <input type="tel" minlength="6" maxlength="6" class="form-control" placeholder="6 Digit Kode OTP" name="otp" id="otp">
                                </div>
                                <div class="form-group text-center">
                                    <a href="#" type="button" class="btn btn-primary col-12" id="btn-verifikasi">Verifikasi</a>
                                    <a href="#" type="button" class="btn btn-primary col-12" id="btn-daftar"> Daftar</a>
                                </div>
                                <div class="recaptcha-container" id="recaptcha-container" style="display: none;"></div>
                            </form>
                            <div class="text-center">
                                <h5 class="mb-5">Atau daftar dengan</h5>
                                <ul class="list-inline">
                                    <li class="list-inline-item m-t-10"><a href="{{ url('google') }}" class="btn btn-google-plus"><i class="fa fa-google-plus"></i> Google</a>
                                    </li>
                                </ul>
                                <p class="mt-5">Sudah punya akun? <a href="{{url('/login')}}">Masuk Sekarang</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    
@endsection