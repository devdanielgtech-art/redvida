
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>LOGIN</title>
  <link href="<?php echo asset('admin') ?>/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo asset('admin') ?>/fonts/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php echo asset('admin') ?>/css/animate.min.css" rel="stylesheet">
  <link href="<?php echo asset('admin') ?>/css/custom.css" rel="stylesheet">
  <link href="<?php echo asset('admin') ?>/css/icheck/flat/green.css" rel="stylesheet">
  <script src="<?php echo asset('admin') ?>/js/jquery.min.js"></script>
</head>

<body style="background:#F7F7F7;">

  <div class="">
    <a class="hiddenanchor" id="toregister"></a>
    <a class="hiddenanchor" id="tologin"></a>

    <div id="wrapper">
      <div id="login" class="animate form">
        <section class="login_content">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <h1>INICIAR SESION</h1>
            <div>
                <label >USUARIO</label>
                <x-text-input id="email" class="form-control"  type="text" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            <div>
                <label >CONTRASEÑA</label>
                <x-text-input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
            <div>
                <x-primary-button class="ms-3 btn btn-primary btn-lg"> INGRESAR</x-primary-button>
            </div>
            <div class="clearfix"></div>
            
        </form>
          <!-- form -->
        </section>
        <!-- content -->
      </div>
      
    </div>
  </div>
</body>
</html>
