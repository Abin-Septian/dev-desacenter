
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://getbootstrap.com/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Floating labels example for Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/floating-labels/">

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/4.0/examples/floating-labels/floating-labels.css" rel="stylesheet">
  </head>

  <body>
    <form class="form-signin" method="POST" action="{{ url('daftarUserByEmail') }}">

        @csrf
      <div class="text-center mb-4">
        <img class="mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Desacenter.id Authentication</h1>
        <p>Nomor Telepone anda tidak terdaftar dalam database kami. Silahkan masukkan email anda untuk validasi member yang valid.</p>
      </div>

      <div class="form-label-group">
        <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Masukan email . . ." required autofocus>
        <label for="inputEmail">Masukan email</label>
      </div>

      
      <div class="form-label-group">
        <input type="text" id="inputuid" readonly name="telp" value="{{ $telp }}"  class="form-control" required autofocus>
        <label for="inputEmail">Telepone</label>
      </div>

      <div class="form-label-group">
        <input type="text" id="inputuid" readonly name="uid" value="{{ $uid }}"  class="form-control" required autofocus>
        <label for="inputEmail">uid [otomatis dari sistem]</label>
      </div>

      <button class="btn btn-lg btn-primary btn-block" type="submit">Masuk</button>
      <p class="mt-5 mb-3 text-muted text-center">&copy; desacenter.id 2021</p>
    </form>
  </body>
</html>
