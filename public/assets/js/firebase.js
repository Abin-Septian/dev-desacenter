$(document).ready(function(){

    $("#btn-daftar").hide();
    $("#btn-masuk").hide();
    $("#form-otp").hide();
    

    const firebaseConfig = {
        apiKey: "AIzaSyAnFw2cck0mhVurHRkS9YFoBac-A80-bco",
        authDomain: "desacenter-41018.firebaseapp.com",
        projectId: "desacenter-41018",
        storageBucket: "desacenter-41018.appspot.com",
        messagingSenderId: "816125856145",
        appId: "1:816125856145:web:063b22b74507452050b230",
        measurementId: "G-BWL2M9WNXQ"
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
            var _token = $("input[name='_token']").val();

            console.log(user);

            $.ajax({
                url :  "/authLogin",
                type : "POST",
                dataType : "JSON",
                data : {
                    _token  : _token,
                    uid     : user.uid,
                    telp    : user.phoneNumber 
                },
                beforeSend : function(xhr)
                {
                    $(this).prop("disabled", true);
                },
                success : function(result, status, xhr)
                {
                    if(result.status == true)
                    {
                        $("#notifikasi").html("<div class='alert alert-success'>"+result.message+"</div>")
                    
                        setTimeout(function(){
                            window.location.href = '/dashboard';
                        }, 1500);
                    }
                    else if(result.status == "belum")
                    {
                        $("#notifikasi").html("<div class='alert alert-danger'>"+result.message+"</div>")
                        $(this).prop("disabled", false);

                        
                        setTimeout(function(){
                            window.location.href = '/authRegisterWithEmail';
                        }, 1500);
                    }
                    else
                    {
                        $("#notifikasi").html("<div class='alert alert-danger'>"+result.message+"</div>")
                        $(this).prop("disabled", false);
                    }
                },
                error : function(status, error, xhr)
                {
                    console.log("error : "+error);
                }
            });
            // Swal.fire({
            //     icon: 'success',
            //     title: 'Berhasil!',
            //     text: 'Selamat datang di Desacenter.id'
            // }).then (function() {
            //     window.location.href = "/";
            // });

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
            
            var phone = user.phoneNumber;
            var vUid = user.uid;

            console.log(phone);
            console.log(vUid);

            
            $.ajax({
                url : "/daftarUser",
                type : "POST",
                dataType : "JSON",
                data : {
                    _token : $("input[name='_token']").val(),
                    telp : phone,
                    uid : vUid
                },
                beforeSend : function(xhr)
                {
                    $(this).prop("disabled", true);
                },
                success : function(result, status, xhr)
                {
                    //console.log(result);

                    if(result.status)
                    {
                        $("#notifikasi").html("<div class='alert alert-success'>"+result.message+"</div>");
                    
                        setTimeout(function(){
                            window.location.href = "/profil/akun";
                        }, 1500);
                    }
                    else
                    {
                        $("#notifikasi").html("<div class='alert alert-danger'>"+result.message+"</div>");
                    }
                },
                error : function(status, error, xhr)
                {
                    console.log(status);
                },
                complete : function(xhr)
                {
                    $(this).prop("disabled", true);
                }

            });

            // $.ajax({
            //     url: '/u-register',
            //     type: "POST",
            //     headers: {
            //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //     },
            //     dataType: "JSON",
            //     cache: false,
            //     data:{
            //         "uid": vUid,
            //         "phone": phone
            //     },
            //     success:function(response){
            //         if(response.success){
            //             Swal.fire({
            //                 icon: 'success',
            //                 title: "Selamat datang di Desacenter.id",
            //                 text: ' Anda akan di arahkan dalam 3 Detik',
            //                 timer: 3000,
            //                 showCancelButton: false,
            //                 showConfirmButton: false
            //             }).then (function() {
            //                 window.location.href = "/";
            //             });
            //         }else{
            //             Swal.fire({
            //                 icon: 'error',
            //                 title: 'Login Gagal',
            //                 text: 'Silahkan coba beberapa saat lagi.'
            //             });
            //         }
            //         console.log(response);
            //     },

            //     error:function(response){
            //         console.log(response);
            //         Swal.fire({
            //             icon: 'error',
            //             title: 'Ups',
            //             html: '<b>Error</b> karena ' + response
            //         });
            //     }

            // });
            
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


        //alert("oke");
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
