<?php
require_once 'views/acceso-seguro.php';
?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Easy-Work</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">

  <!-- Favicon para mi app web -->
  <link rel="shortcut icon" sizes="32x32" href="dist/img/icono-pagina.png" type="image/x-icon">

  <!-- Inputs deslisables con buscador incluido -->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

  <!-- MIS CSS -->
  <!-- Parte para landing page -->
  <link href="dist/css/landingpage.css" rel="stylesheet"/>
  <!-- Parte para cambio de clave -->
  <link href="dist/css/moficarclave.css" rel="stylesheet"/>
  <!-- Card para los servicios publicados -->
  <link href="dist/css/cards.css" rel="stylesheet" />
  <!-- Portafolio -->
  <link href="dist/css/protafolio.css" rel="stylesheet" />
  <!-- Theme style -->
  <link href="dist/css/adminlte.css" rel="stylesheet"/>
  <!-- Estilos de modales -->
  <!-- <link href="dist/css/modals.css" rel="stylesheet"/> -->

  <!-- DATATABLE -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">


  <!-- DATABALE 2 CSS (Francia)-->
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"> -->
  <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css"> -->

</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light fixed">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="main.php" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" id="documento" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Maximizar a pantalla completa -->
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
 
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Brand Logo -->
    <a href="main.php" class="brand-link">
      <img src="dist/img/logo1.jpeg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text">EASY-WORK</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="user-block">
          <img src="dist/img/<?php echo $_SESSION['fotoperfil']?>" class="img-circle elevation-3" alt="..">
        </div>
        <div class="info">
          <a href="main.php?view=proveedor-vista" class="d-block" id="IdProveedorSession">
            <?php echo $_SESSION['nombres'] . ' ' . $_SESSION['apellidos']; ?>
          </a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-close">
            <a href="#" class="nav-link active">
              <i class="fas fa-sign-in-alt nav-icon"></i>
              <p>
                Mi cuenta
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="main.php?view=proveedor-vista" class="nav-link">
                 <i class="nav-icon fas fa-user-edit"></i>
                  <p>Ver Perfil</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="main.php?view=cambiar-clave-vista" class="nav-link">
                  <i class="nav-icon fas fa-key"></i>
                  <p>Cambiar contraseña</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="controllers/CProveedor.php?operacion=cerrar-sesion" class="nav-link">
                  <i class="nav-icon fas fa-window-close"></i>
                  <p>Cerrar sesion</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="main.php?view=servicio-vista" class="nav-link">
              <i class="nav-icon fas fa-briefcase"></i>
              <p>Servicios</p>
            </a>
          </li>
          
          <li class="nav-item">
              <a href="main.php?view=portafolio" class="nav-link">
                <i class="nav-icon fas fa-id-badge"></i>
                <p>Portafolio</p>
              </a>
          </li>

          <li class="nav-item menu-close">
            <a href="#" class="nav-link">
              <i class="fas fa-sign-in-alt nav-icon"></i>
              <p>
                Configuración
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <!--Opciones personalizadas para administrador-->
              <?php
                if ($_SESSION['nivelacceso'] == 'A'){
                  echo '
                    <li class="nav-item">
                      <a href="main.php?view=categoria-vista" class="nav-link">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                          Categorias
                        </p>
                      </a>
                    </li>
                  ';
                }
              ?>

              <!--Opciones personalizadas -->
              <?php
                if ($_SESSION['nivelacceso'] == 'A'){
                  echo '
                    <li class="nav-item">
                      <a href="main.php?view=tiporedsocial-vista" class="nav-link">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                          Tipo de red social
                        </p>
                      </a>
                  </li>
                  ';
                }
              ?>

              <!--Opciones personalizadas -->
              <?php
                if ($_SESSION['nivelacceso'] == 'A'){
                  echo '
                    <li class="nav-item">
                      <a href="main.php?view=graficosEstatico" class="nav-link">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                          Graficos Estadisticos
                        </p>
                      </a>
                  </li>
                  ';
                }
              ?>

              <!--Opciones personalizadas -->
              <?php
                if ($_SESSION['nivelacceso'] == 'A'){
                  echo '
                    <li class="nav-item">
                      <a href="main.php?view=reporte-servicio-vista" class="nav-link">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                          Reporte servicios
                        </p>
                      </a>
                  </li>
                  ';
                }
              ?>
              <!--Opciones personalizadas -->
              <?php
                if ($_SESSION['nivelacceso'] == 'A'){
                  echo '
                    <li class="nav-item">
                      <a href="main.php?view=reporte-proveedor-vista" class="nav-link">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                          Reporte de proveedores
                        </p>
                      </a>
                  </li>
                  ';
                }
              ?>
            </ul>
          </li>
          
          
          <!-- / Opciones personalizadas-->
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <!-- <div class="content-header"> -->
      <!-- <div class="container-fluid"> -->
        <!-- <div class="row mb-2"> -->
          <!-- <div class="col-sm-6"> -->
            <!-- <h1 class="m-0">Encuentra a chamba</h1> -->
          <!-- </div> /.col -->
        <!-- </div> /.row -->
      <!-- </div> /.container-fluid -->
    <!-- </div  -->
    <!-- /.content-header -->
    

    <!-- Main content -->
    <div class="container">
      <div class="container-fluid" id="contenido2">


        <!-- Aquí veremos contenidos de forma dinamica -->


      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Easy-Work
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2021-2022 <a href="#">Easy-work</a>.</strong> todos los derechos reservadofa-spin.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

<!-- ChartJS -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>

<!-- Librería para formatear cajas de textos -->
<script src="plugins/jquery-mask/jquery.mask.min.js"></script>

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<!-- Libreria para cargar view en Dashboard-->
<script src="dist/js/loadweb.js"></script>

<script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs/dist/tf.min.js"> </script> 

<!-- Incorporando DATABL2 (Francia) -->
<!-- <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script> -->
<!-- <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script> -->

<script>
  //Evento ready = Página lista/cargá por completo
  $(document).ready(function (){

    let content = getParam("view");
    //console.log(content);

    if (content == false){

      $("#contenido2").load('views/servicio-vista.php');
    }else{
      //La variable/KEY "view" tiene un valor (nombre del archivo abrir)
      $("#contenido2").load('views/' + content + '.php');
    }

    //Reseteo el localStorage
    $("#IdProveedorSession").click(function (){
      localStorage.removeItem("ObtenerID");
    });
    
  });

</script>

</body>
</html>