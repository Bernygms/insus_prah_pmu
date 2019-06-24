<?php require "../templates/header.php" ?>
      <!-- partial -->

      <div class="main-panel">
        <div class="content-wrapper">

          <?php if ($_SESSION['id_estado_fk'] == 0 ) {
                # code...
	       ?>
          <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-cube text-danger icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Estados</p>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-right mb-0">32</h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> Estados de la Republica Mexicana
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-receipt text-warning icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Propuestas</p>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-right mb-0">0</h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-bookmark-outline mr-1" aria-hidden="true"></i> Propuestas aprobadas
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-poll-box text-success icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Propuestas</p>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-right mb-0">0</h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-calendar mr-1" aria-hidden="true"></i> Propuestas rechazadas
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-account-location text-info icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Usuario</p>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-right mb-0"><?php echo $_SESSION['id_usuario'];?></h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-reload mr-1" aria-hidden="true"></i> 34 Usuarios registrados
                  </p>
                </div>
              </div>
            </div>
          </div>
      <?php }?>
          <div id="tabla_estados" class="row">
            <div class="col-lg-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Estados </h4>
                  <div class="table-responsive">
                    <div id="#tb"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- tablados -->
          <div id="files" class="row">
            <div class="col-lg-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Información</h4>
                  <div class="table-responsive">
                  	<div id="#tb_files">
                  	</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="container-fluid clearfix">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Derechos de autor © 2019
              <a href="prah.php">PRAH</a>. Todos los derechos reservados.</span>
           <!-- <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hecho a mano y hecho con
              <i class="mdi mdi-heart text-danger"></i>
            </span>-->
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
<?php require "../templates/footer.php" ?>

