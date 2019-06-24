<?php
session_start();
if(!isset($_SESSION["id_usuario"]))  
 {
  header("Location: login.php");
 }     
?>
<?php if ($_SESSION['id_estado_fk'] == 0 ) {
  require '../templates/function.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
  <!-- endinject -->
  <link rel="shortcut icon" href="../images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
      <div class="content-wrapper d-flex align-items-center auth register-bg-1 theme-one">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <h2 class="text-center mb-4">Registro</h2>
            <div class="alert alert-success alert-dismissible" id="myAlert_guardar">
                <a  class="close">&times;</a>
                <strong>¡Bien hecho!</strong> Nuevo usuario registrado.
            </div>
            <div class="alert alert-success alert-dismissible" id="myAlert_editar">
                <a  class="close">&times;</a>
                <strong>¡Bien hecho!</strong>Los datos fueron actualizados.
            </div>
            <div class="alert alert- alert-warning" id="myAlert_eliminar">
                <a  class="close">&times;</a>
                <strong>Cuidado!</strong> El dato ya fue eliminado y no sera posible recuperarlo.
            </div>
             
            <div id="error"></div>
            <div class="auto-form-wrapper">
                <div class="form-group">
                  <div class="input-group">
                    <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <input type="text" id="usuario" name="usuario" class="form-control" placeholder="Usuario">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <input type="email" id="correo" name="correo" class="form-control" placeholder="Correo">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <input type="password" id="password" name="password" class="form-control" placeholder="Contraseña">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <select id="status" name="status" class="form-control" placeholder="Opción" required="">
                      <option value="">Activo e Inactivo</option>
                      <option value="1">Ativo</option>
                      <option value="0">Inactivo</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <select id="id_app" name="id_app" class="form-control" placeholder="Opción">
                      <option value="">Aplicacion</option>
                      <option value="1">PRAH</option>
                      <option value="2">PMU</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <?php estados();?>
                </div>
                <div class="form-group">
                  <button onclick="addUsuario();" class="btn btn-primary submit-btn btn-block">Registro</button>
                </div>
                <div class="text-block text-center my-3">
                  <span class="text-small font-weight-semibold">¿Administrar cuentas?</span>
                  <a href="prah.php" class="text-black text-small">Aqui</a>
                </div>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../vendors/js/vendor.bundle.base.js"></script>
  <script src="../vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="../js/off-canvas.js"></script>
  <script src="../js/misc.js"></script>
  <!-- endinject -->

    <!-- JQuery js for this page-->
  <script src="../js/jquery-3.3.1.min.js"></script>
  <!-- End JQuery js for this page-->

  <script src="../lib/app-prah-usuarios.js"></script>
</body>

</html>
<?php 
  }else{
    header('location: prah.php');
  }
?>
