$(document).ready(function(){

    $("#btn-daftar").hide();
    $("#btn-masuk").hide();
    $("#form-otp").hide();
    

    const firebaseConfig = {
        apiKey: "AIzaSyCbJs_Ge0j5yhF7u0_Kk-NEA7vvOvqCgQs",
        authDomain: "srikandi-superaps.firebaseapp.com",
        projectId: "srikandi-superaps",
        storageBucket: "srikandi-superaps.appspot.com",
        messagingSenderId: "318109044738",
        appId: "1:318109044738:web:36560b8c9ea8dab584971b",
        measurementId: "G-G487FMFJC1"
    };

    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);
    window.recaptchaVerifier  = new firebase.auth.RecaptchaVerifier('recaptcha-container', {
        'size': 'invisible',
        'callback': function (response) {
            // reCAPTCHA solved, allow signInWithPhoneNumber.
            console.log("recaptcha resolved");
            onSignInSubmit();
        }
    });

        
    recaptchaVerifier.render().then((widgetId) => {
        window.recaptchaWidgetId = widgetId;
    });

});


function onSignInSubmit(){

    $("#btn-masuk").on('click', function(){
        var otp = $("#otp").val();

        console.log(otp);

        confirmationResult.confirm(otp).then(function(result){
            var user = result.user;
            console.log(user);

            
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: 'Selamat datang di Desacenter.id'
            }).then (function() {
                window.location.href = "/";
            });

            // if(user != null){
            //     var phone = user.phoneNumber;
            //     var vUid = user.uid;
            //     var vOtp = code;
            //     var token = $("meta[name='csrf-token']").attr("content");

            // }

        }).catch(function(error){
            Swal.fire({
                icon: 'error',
                title: 'Invalid',
                text: 'Kode verifikasi yang anda masukkan salah.' + error
            });
        });


    });


        
    $("#btn-daftar").on('click', function(){
        var otp = $("#otp").val();

        console.log(otp);

        confirmationResult.confirm(otp).then(function(result){
            var user = result.user;
            console.log(user);
                var phone = user.phoneNumber;
                var vUid = user.uid;

                $.ajax({
                    url: '/u-register',
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    dataType: "JSON",
                    cache: false,
                    data:{
                        "uid": vUid,
                        "phone": phone
                    },
                    success:function(response){
                        if(response.success){
                            Swal.fire({
                                icon: 'success',
                                title: "Selamat datang di Desacenter.id",
                                text: ' Anda akan di arahkan dalam 3 Detik',
                                timer: 3000,
                                showCancelButton: false,
                                showConfirmButton: false
                            }).then (function() {
                                window.location.href = "/";
                            });
                        }else{
                            Swal.fire({
                                icon: 'error',
                                title: 'Login Gagal',
                                text: 'Silahkan coba beberapa saat lagi.'
                            });
                        }
                        console.log(response);
                    },

                    error:function(response){
                        console.log(response);
                        Swal.fire({
                            icon: 'error',
                            title: 'Ups',
                            html: '<b>Error</b> karena ' + response
                        });
                    }

                });
            
        }).catch(function(error){
            Swal.fire({
                icon: 'error',
                title: 'Invalid',
                text: 'Kode verifikasi yang anda masukkan salah.' + error
            });
        });


    });
    
}

$("#btn-verifikasi").on('click', function(){

    var code = $("#otp").val();
    console.log(code);

    var phone = $("#phone").val();
    var pcode = "+62" + phone;
    console.log(pcode);
    timer(60);
    var verifier = window.recaptchaVerifier;
    firebase.auth().signInWithPhoneNumber(pcode, verifier)
    .then(function(result){
        window.confirmationResult = result;
        coderesult = result;
        console.log(result);
        Swal.fire({
            icon: 'success',
            title: 'Terkirim',
            text: 'Kode OTP telah dikirimkan ke ' + pcode
        });
        $("#btn-daftar").show();
        $("#btn-masuk").show();
        $("#btn-verifikasi").hide();
        $("#form-phone").hide();
        $("#form-otp").show();

        

    }).catch(function(error){
        Swal.fire({
            icon: 'error',
            title: 'Gagal Terkirim',
            text: 'Kode OTP Gagal dikirimkan ke ' + pcode
        });

        $("#btn-daftar").hide();
        $("#btn-masuk").hide();
        $("#btn-verifikasi").show();
        $("#form-otp").hide();
        $("#form-phone").show();
    });

});


    // Waiting Timer
    let timerOn = true;
    function timer(remaining) {
        var m = Math.floor(remaining / 60);
        var s = remaining % 60;

        m = m < 10 ? '0' + m : m;
        s = s < 10 ? '0' + s : s;
        $('#btn-verifikasi').attr('disabled', true);
        document.getElementById('btn-verifikasi').innerHTML = m + ':' + s;
        remaining -= 1;

        if(remaining >= 0 && timerOn) {
            setTimeout(function() {
                timer(remaining);
            }, 1000);
            return;
        }

        if(!timerOn) {
            // Do validate stuff here
            return;
        }

        // Do timeout stuff here
        $("#btn-verifikasi").attr('disabled', false);
        $("#btn-verifikasi").val("Kirim Ulang");
    }

    function signOut(){
        firebase.auth().signOut().then(() => {
                Swal.fire({
                    icon: 'success',
                    title: "Berhasil!",
                    text: ' Anda telah keluar, akan diarahkan otomatis dalam 3 detik',
                    timer: 3000,
                    showCancelButton: false,
                    showConfirmButton: false
                }).then (function() {
                    window.location.href = "/logout";
                });

        }).catch((error) => {
            // An error happened.
            Swal.fire({
                icon: 'error',
                title: "Whoops!",
                text: "" + error
            });
        });

}
