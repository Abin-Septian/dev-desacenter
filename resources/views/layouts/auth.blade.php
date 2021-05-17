
<!DOCTYPE html>
<html lang="en" class="h-100" id="login-page2">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title }}</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/dsc_logo.png">
    <!-- Custom Stylesheet --->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    
</head>

<body class="h-100">
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>

    @yield('content')

    <!-- Common JS -->
    <script src="{{ asset('assets/plugins/common/common.min.js') }}"></script>
    <!-- Custom script -->
    <script src="{{ asset('assets/js/custom.min.js') }}"></script>
    <script src="{{ asset('assets/js/settings.js') }}"></script>
    <script src="{{ asset('assets/js/gleek.js') }}"></script>
    <script src="https://www.gstatic.com/firebasejs/8.4.2/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.4.0/firebase-auth.js"></script>
    <script src="{{ asset('assets/js/firebase.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
</body>

</html>