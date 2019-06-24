<?php
session_start();
  if(isset($_SESSION["id_usuario"]))  
   {
    header("Location: prah.php");
   } 
   $result = isset($_GET['respuesta']) ? $_GET['respuesta'] :'default';
   $msg = "";
   if ($result == "campos_vacios") {
    $msg = "Todos los campos son obligatorios";    
   }elseif ($result == "correo_o_contrasena_incorrectos1") {
           $msg = "Correo o contraseña incorrecta";
   }else{
        $msg = "";
   }     
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
      <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <div class="auto-form-wrapper">
              <h4 class="text-center">Dirección Jurídica y de Seguridad Patrimonial</h4>
              <h6 class="text-center ">Subdirección de Regularización</h6>
              <p class="text-center"><?php echo $msg;?></p>
              <form  action="../controller/controller_login.php?modo=login" method="POST">
                <div class="form-group">
                  <label class="label">Correo electronico</label>
                  <div class="input-group">
                    <input type="text" id="correo" name="correo" class="form-control" placeholder="ejemplo@hotmail.com" required="Ingresa tu correo">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="label">Contraseña</label>
                  <div class="input-group">
                    <input type="password" id="password" name="password" class="form-control" placeholder="*********" required="Ingresa tu contraseña">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="label">Aplicación</label>
                  <div class="input-group">
                    <select id="app" name="app" class="form-control" placeholder="Opción">
                      <option value="1">PRAH</option>
                      <option value="2">PMU</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="label">Ejercicio</label>
                  <div class="input-group">
                    <select id="anno" name="anno" class="form-control" placeholder="Opción">
                      <option value="2019">2019</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <input name="login" type="hidden" value="1" >
                  <input  value="Login" type="submit"  class="btn btn-primary submit-btn btn-block">
                </div>
                <div class="form-group d-flex justify-content-between">
                  <div class="form-check form-check-flat mt-0">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" checked> Mantenerme conectado
                    </label>
                  </div>
                  <a href="#" class="text-small forgot-password text-black">Olvidé mi contraseña</a>
                </div>
                <div class="text-block text-center my-3">
                  <span class="text-small font-weight-semibold">¿No eres miembro?</span>
                  <a href="register.html" class="text-black text-small">Crear nueva cuenta</a>
                </div>
              </form>
            </div>
            <ul class="auth-footer">
              <li>
                <a href="#">Condiciones</a>
              </li>
              <li>
                <a href="#">Ayudar</a>
              </li>
              <li>
                <a href="#">Terminos</a>
              </li>
            </ul>
            <p class="footer-text text-center">Derechos de autor © 2019 PRAH. Todos los derechos reservados.</p>
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
</body>

</html>
