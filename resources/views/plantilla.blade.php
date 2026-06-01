<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>RedVida | </title>

  <!-- Bootstrap core CSS -->

  <link href="<?php  echo asset('admin') ?>/css/bootstrap.min.css" rel="stylesheet">

  <link href="<?php  echo asset('admin') ?>/fonts/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php  echo asset('admin') ?>/css/animate.min.css" rel="stylesheet">

  <!-- Custom styling plus plugins -->
  <link href="<?php  echo asset('admin') ?>/css/custom.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?php  echo asset('admin') ?>/css/maps/jquery-jvectormap-2.0.3.css" />
  <link href="<?php  echo asset('admin') ?>/css/icheck/flat/green.css" rel="stylesheet" />
  <link href="<?php  echo asset('admin') ?>/css/floatexamples.css" rel="stylesheet" type="text/css" />

  <script src="<?php  echo asset('admin') ?>/js/jquery.min.js"></script>
  <script src="<?php  echo asset('admin') ?>/js/nprogress.js"></script>

  <link href="<?php  echo asset('alert') ?>/style.css" rel="stylesheet">
  <script src="<?php  echo asset('alert') ?>/script.js"></script>

</head>
<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">

          <div class="navbar nav_title" style="border: 0;">
            <a  class="site_title"><i class="fa fa-users"></i> RED VIDA <span> </span></a>
            
          </div>
          <div class="clearfix"></div>

          <!-- menu prile quick info -->
          <!-- menu prile quick info -->
          <!-- menu prile quick info -->
          <!-- menu prile quick info -->
          <div class="profile">
            <div class="profile_pic">
              <img src="<?php  echo asset('admin') ?>/images/img.jpg" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span></span>
              <h2></h2>
            </div>
          </div>
          <!-- /menu prile quick info -->

          <br />

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

            <div class="menu_section">
              <h3>BIENVENID@</h3>
              <br>
              <ul class="nav side-menu">
                <!-- SOLO MOSTRAR 
                 <li><a href="/dashboard"><i class="fa fa-laptop"></i> Inicio</a> </li>

                <li><a><i class="fa fa-users"></i> GESTION USUARIO <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="index.html">Dashboard</a>
                    </li>
                    <li><a href="index2.html">Dashboard2</a>
                    </li>
                    <li><a href="index3.html">Dashboard3</a>
                    </li>
                  </ul>
                </li>
                BOTÓN SI ES ADMIN -->
              

                <!-- SOLUCIÓN SIMPLE - SIEMPRE MOSTRAR DONANTES EN PANEL-ADMIN -->
                @if(request()->path() == 'dashboard' || 
                    
                    str_contains(request()->path(), 'donante/panel-admin/'))
                <li><a href="/donantes"><i class="fa fa-laptop"></i> Donantes</a></li>
                @endif

                <li><a href="/buscarDonantes"><i class="fa fa-edit"></i> Buscar por Sangre <span></span></a>
                    
                </li>

                
                <!-- SOLO MOSTRAR 
                 
                <li><a><i class="fa fa-edit"></i> GESTION DONANTES <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu" style="display: none">
                        <li><a href="/donantes">Donantes</a></li>
                        <li><a href="/buscarDonantes">Buscar por Sangre</a></li>
                    </ul>
                </li>

                BOTÓN SI ES ADMIN -->
                
              </ul>
            </div>
           

          </div>
          <!-- /sidebar menu -->

          <!-- /menu footer 
          <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
              <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
              <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
              <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout">
              <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
          </div>
          footer buttons -->
        </div>
      </div>

      <!-- top navigation -->
      <div class="top_nav">

        <div class="nav_menu">
          <nav class="" role="navigation">
            <div class="nav toggle">
              <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
              <li class="">
                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  
                  <span class=" fa fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                  <li><a href="javascript:;">  Profile</a>
                  </li>
                  <li>
                    <a href="javascript:;">
                      <span class="badge bg-red pull-right">50%</span>
                      <span>Settings</span>
                    </a>
                  </li>
                  <li>
                    <a href="javascript:;">Ayuda</a>
                  </li>
                  <li><a href="/"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </li>
                </ul>
              </li>

              

            </ul>
          </nav>
        </div>

      </div>
      <!-- /top navigation -->


      <!-- page content -->
      <div class="right_col" role="main">


        @yield('contenido')

        

        <!-- footer content -->

        <footer>
          <div class="copyright-info">
            <p class="pull-right">RedVida<a href="#"> SISTEMA DEPARTAMENTAL DE SANGRE LA PAZ </a>  
            </p>
          </div>
          <div class="clearfix"></div>
        </footer>


        <!-- /footer content -->
      </div>
      <!-- /page content -->

    </div>

  </div>

  <div id="custom_notifications" class="custom-notifications dsp_none">
    <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
    </ul>
    <div class="clearfix"></div>
    <div id="notif-group" class="tabbed_notifications"></div>
  </div>

  <script src="<?php  echo asset('admin') ?>/js/bootstrap.min.js"></script>

  <!-- gauge js -->
  <script type="text/javascript" src="<?php  echo asset('admin') ?>/js/gauge/gauge.min.js"></script>
  <script type="text/javascript" src="<?php  echo asset('admin') ?>/js/gauge/gauge_demo.js"></script>
  <!-- bootstrap progress js -->
  <script src="<?php  echo asset('admin') ?>/js/progressbar/bootstrap-progressbar.min.js"></script>
  <script src="<?php  echo asset('admin') ?>/js/nicescroll/jquery.nicescroll.min.js"></script>
  <!-- icheck -->
  <script src="<?php  echo asset('admin') ?>/js/icheck/icheck.min.js"></script>
  <!-- daterangepicker -->
  <script type="text/javascript" src="<?php  echo asset('admin') ?>/js/moment/moment.min.js"></script>
  <script type="text/javascript" src="<?php  echo asset('admin') ?>/js/datepicker/daterangepicker.js"></script>
  <!-- chart js -->
  <script src="<?php  echo asset('admin') ?>/js/chartjs/chart.min.js"></script>

  <script src="<?php  echo asset('admin') ?>/js/custom.js"></script>


  
 


  <!-- /footer content -->
</body>

</html>
