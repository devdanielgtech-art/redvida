<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login Donante</title>

  <!-- Estilos locales -->
  <link href="<?php echo asset('admin') ?>/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo asset('admin') ?>/fonts/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php echo asset('admin') ?>/css/custom.css" rel="stylesheet">
  
  <style>
    body {
        background: #d9534f;
        height: 100vh;
        display: flex;
        align-items: center;
    }
    .login-box {
        background: white;
        border-radius: 10px;
        padding: 30px;
        box-shadow: 0 0 20px rgba(0,0,0,0.1);
        max-width: 400px;
        margin: 0 auto;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="login-box">
          <div class="text-center">
            <i class="fa fa-heartbeat fa-3x text-danger"></i>
            <h3 class="text-danger">Acceso Donantes</h3>
            <p class="text-muted">Ingresa tus datos</p>
          </div>
          
          @if(Session::has('error'))
          <div class="alert alert-danger">
            <strong>Error!</strong> {{ Session::get('error') }}
          </div>
          @endif
          
          <form method="POST" action="/donante/login">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            
            <div class="form-group">
              <label>Cédula de Identidad</label>
              <input type="text" name="ci" class="form-control" required 
                     placeholder="Ej: 1234567">
            </div>
            
            <div class="form-group">
              <label>Fecha de Nacimiento</label>
              <input type="date" name="password" class="form-control" required>
              <small class="text-muted">Usa tu fecha de nacimiento como contraseña</small>
            </div>
            
            <div class="form-group">
              <button type="submit" class="btn btn-danger btn-block">
                <i class="fa fa-sign-in"></i> Ingresar
              </button>
            </div>
            
            <div class="form-group text-center">
              <a href="/" class="btn btn-default">
                <i class="fa fa-home"></i> Volver al Inicio
              </a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="<?php echo asset('admin') ?>/js/jquery.min.js"></script>
  <script src="<?php echo asset('admin') ?>/js/bootstrap.min.js"></script>
</body>
</html>