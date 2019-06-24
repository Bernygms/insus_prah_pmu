<?php
session_start();
if(!isset($_SESSION["id_usuario"]))  
 {
  header("Location: login.php");
 }else{
  require 'function.php';
 } 

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="Refresh" content="3600" >
  <title>PRAH INSUS</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="../vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/prah.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <a class="navbar-brand brand-logo" href="prah.php">
          <img src="../images/logo.png" alt="logo" />
        </a>
        <a class="navbar-brand brand-logo-mini" href="prah.php">
          <img src="../images/logo-mini.svg" alt="logo" />
        </a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center">
        <ul class="navbar-nav navbar-nav-left header-links d-none d-md-flex">
          <li class="nav-item">
            <a href="#" class="nav-link">Programa 
              <span class="badge badge-primary ml-1"><?php echo $_SESSION['nombre_app']." ".$_SESSION['anno'];?></span>
               <input type="hidden" id="anno" name="anno" value="<?php echo $_SESSION['anno'];?>">
               <input type="hidden" id="app" name="app" value="<?php echo $_SESSION['nombre_app'];?>">
               <input type="hidden" id="id_app_fk" name="id_app_fk" value="<?php echo $_SESSION['id_app_fk'];?>">
               <input type="hidden" id="id_estado_fk_usuario" name="id_estado_fk_usuario" value="<?php echo $_SESSION['id_estado_fk'];?>">

            </a>
          </li>
          <li class="nav-item active">
            <a href="#" class="nav-link">
              <i class="mdi mdi-elevation-rise"></i>Informes</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="mdi mdi-bookmark-plus-outline"></i>Puntuación</a>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown d-none d-xl-inline-block">
            <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <span class="profile-text">Hola, <?php echo $_SESSION['nombre'];?> !</span>
              <img class="img-xs rounded-circle" src="../images/faces/face2.jpg" alt="Profile image">
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              <a class="dropdown-item p-0">
                <div class="d-flex border-bottom">
                  <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                    <i class="mdi mdi-bookmark-plus-outline mr-0 text-gray"></i>
                  </div>
                  <div class="py-3 px-4 d-flex align-items-center justify-content-center border-left border-right">
                    <i class="mdi mdi-account-outline mr-0 text-gray"></i>
                  </div>
                  <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                    <i class="mdi mdi-alarm-check mr-0 text-gray"></i>
                  </div>
                </div>
              </a>
              <?php if ($_SESSION['id_estado_fk'] == 0 ) {
                # code...
               ?>
              <a class="dropdown-item mt-2">
                Administrar cuentas
              </a>
              <a class="dropdown-item" href="register.php">
                Registrar nuevo usuario
              </a>
              <?php 
              }
              ?>
              <a class="dropdown-item" href="salir.php">
                Cerrar sesión
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="user-wrapper">
                <div class="profile-image">
                  <img src="../images/faces/face2.jpg" alt="profile image">
                </div>
                <div class="text-wrapper">
                  <p class="profile-name"><?php echo $_SESSION['nombre'];?> </p>
                  <div>
                    <small class="designation text-muted"><?php echo $_SESSION['usuario'];?> </small>
                    <span class="status-indicator online"></span>
                  </div>
                </div>
              </div>
              <button id="propuesta" class="btn btn-success btn-block" data-toggle="modal" data-target=".bd-prah-modal-lg">Nueva Propuesta
                <i class="mdi mdi-plus"></i>
              </button>
            </div>
          </li>
          <li id="id_regresar" class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth" onclick="regresar()">
              <i class="menu-icon mdi mdi-arrow-left-bold" ></i>Regresar
            </a>
            
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="menu-icon mdi mdi-restart"></i>
              <span class="menu-title">Configuración</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <?php if ($_SESSION['id_estado_fk'] == 0 ) {
                # code...
               ?>
                <li class="nav-item">
                  <a class="nav-link" href="register.php"> Administrar cuentas </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="register.php"> Registrar nuevo usuario </a>
                </li>
                <?php 
                }
                ?>
                <li class="nav-item">
                  <a class="nav-link" href="salir.php"> Cerrar sesión </a>
                </li>
              </ul>
            </div>
          </li>
        </ul>
      </nav>
