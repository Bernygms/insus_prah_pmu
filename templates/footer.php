    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->


  <!-- Large modal start files  add files-->
  <div id="addFiles" class="modal fade bd-prah-modal-lg " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
            <!--header modal-->
      
      <div class="modal-header modal-header-info">
        <h5 class="modal-title" id="exampleModalLongTitle">Nueva propuesta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="card ">
        <div class="card-header text-center ">
          <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
              <a class="nav-link active" href="#">Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="#">Autorización</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="#">En Proceso</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="#">VoBo</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="#">Cierre</a>
            </li>
          </ul>
        </div>
        <div class="card-body">
        <!--body del modal-->
          <form id="form-add-propuesta" name="form-add-propuesta">
          <div class="modal-body">
           <div class="row">
            <div id="mesage" class="form-group col-md-12">
            </div>
            <div class="form-group col-md-4">
              <label for="id">No. Propuesta </label>
              <input id="op" name="op" type="hidden" class="form-control" value="agregar" />
              <input id="app" name="app" type="hidden" class="form-control" value="<?php echo $_SESSION['nombre_app'] ?>"/>
              <input id="anno" name="anno" type="hidden" class="form-control" value="<?php echo $_SESSION['anno'] ?>"/>
              <input type="hidden" id="id_app_fk" name="id_app_fk" value="<?php echo $_SESSION['id_app_fk'];?>">
              <input id="num_prop" name="num_prop" type="text" class="form-control" placeholder="01-001" />
              <small id="id_mesage" class="form-text text-muted">Ingresa el identificador.</small>
            </div>
            <?php if ($_SESSION['id_estado_fk'] == 0 ) {

              ?>
            <div class="form-group col-md-4">
              <label for="id">Estado </label>
              <?php estados();?>
            </div> 
            <?php 
            }else{
            ?>
              <input type="hidden" id="id_estado" name="id_estado" value="<?php echo $_SESSION['id_estado_fk'];?>">
            <?php 
            }
            ?>
            <div class="form-group col-md-4">
              <label for="id">Oficio de Propuesta</label>
              <input type="file" class="form-control-file" id="ofic_porp" name="ofic_porp" >
            </div>   
            <div class="form-group col-md-4">
              <label for="id">Anexo 6</label>
              <input type="file" class="form-control-file" id="anexo6" name="anexo6" >
            </div> 
            <div class="form-group col-md-4">
              <label for="id">Anexo 7</label>
              <input type="file" class="form-control-file" id="anexo7" name="anexo7">
            </div> 
            <div class="form-group col-md-4">
              <label for="id">Listado de Beneficiarios</label>
              <input type="file" class="form-control-file" id="lis_de_bene" name="lis_de_bene">
            </div>        
          </div>
          <!--footer modal-->
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="button" onclick="addPropuesta();" class="btn btn-primary">Guardar propuesta</button>
          </div>
          <div id="ajaxloader" style="display:none"><img class="mx-auto mt-30 mb-30 d-block" src="../images/pre-loader/loader-02.svg" alt=""></div>
        </div>
        </form>
      </div>
    </div>
    </div>
  </div>
</div>

<!--End modal , add files-->


<!-- Large modal start files edit 4 PDFs-->
  <div id="editFiles" class="modal fade bd-prah-edit-modal-lg " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
            <!--header modal-->
      
      <div class="modal-header modal-header-info">
        <h5 class="modal-title" id="exampleModalLongTitle">Editar propuesta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="card ">
        <div class="card-header text-center ">
          <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
              <a class="nav-link active" href="#">Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="#">Autorización</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="#">En Proceso</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="#">VoBo</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="#">Cierre</a>
            </li>
          </ul>
        </div>
        <div class="card-body">
        <!--body del modal-->
          <form id="form_update_propuesta" name="form_update_propuesta">
          <div class="modal-body">
           <div class="row">
            <div id="mesage_edit" class="form-group col-md-12">
            </div>
            <div class="form-group col-md-4">
              <label for="id">No. Propuesta </label>
              <input id="op" name="op" type="hidden" class="form-control" value="editar" />
              <input id="app" name="app" type="hidden" class="form-control" value="<?php echo $_SESSION['nombre_app'] ?>"/>
              <input id="anno" name="anno" type="hidden"/>
              <input id="id_estado" name="id_estado" type="hidden" >
              <input id="id_file" name="id_file" type="hidden"/>
              <input id="ofic_porp_nombre" name="ofic_porp_nombre" type="hidden"/>
              <input id="anexo6_nombre" name="anexo6_nombre" type="hidden"/>
              <input id="anexo7_nombre" name="anexo7_nombre" type="hidden"/>
              <input id="lis_de_bene_nombre" name="lis_de_bene_nombre" type="hidden"/>
              <input id="num_prop" name="num_prop" type="text" class="form-control" placeholder="01-001" maxlength="6"  />
            </div>
            <div class="form-group col-md-4">
              <label for="id">Oficio de Propuesta</label>
              <input type="file" class="form-control-file" id="ofic_porp" name="ofic_porp" >
            </div>   
            <div class="form-group col-md-4">
              <label for="id">Anexo 6</label>
              <input type="file" class="form-control-file" id="anexo6" name="anexo6" >
            </div> 
            <div class="form-group col-md-4">
              <label for="id">Anexo 7</label>
              <input type="file" class="form-control-file" id="anexo7" name="anexo7">
            </div> 
            <div class="form-group col-md-4">
              <label for="id">Listado de Beneficiarios</label>
              <input type="file" class="form-control-file" id="lis_de_bene" name="lis_de_bene">
            </div>        
          </div>
          <!--footer modal-->
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="button" onclick="editOAAL()" class="btn btn-primary">Guardar propuesta</button>
          </div>
          <div id="ajaxloader" style="display:none"><img class="mx-auto mt-30 mb-30 d-block" src="../images/pre-loader/loader-02.svg" alt=""></div>
        </div>
        </form>
      </div>
    </div>
    </div>
  </div>
</div>
<!--End modal , edit files 4 PDFs-->

<!-- Large modal start file oficio de autorizacion  pdf-->
  <div id="oficio_de_autorizacion" class="modal fade bd-prah-edit-autorizacion-modal-lg " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
            <!--header modal-->
      
      <div class="modal-header modal-header-info">
        <h5 class="modal-title" id="exampleModalLongTitle">Subir/Editar - Oficio de Autorización</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="card ">
        <div class="card-header text-center ">
          <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
              <a class="nav-link disabled" onclick="" >Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="#">Autorización</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="#">En Proceso</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="#">VoBo</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="#">Cierre</a>
            </li>
          </ul>
        </div>
        <div class="card-body">
        <!--body del modal-->
          <form id="form_update_propuesta_autorizacion" name="form_update_propuesta_autorizacion">
          <div class="modal-body">
           <div class="row">
            <div id="mesage_edit_autorizacion" class="form-group col-md-12">
            </div>

            <div class="form-group col-md-4">
              <input id="op" name="op" type="hidden" class="form-control" value="oficio_de_autorizacion" />
              <input id="app" name="app"  type="hidden" class="form-control" value="<?php echo $_SESSION['nombre_app'] ?>"/>
              <input id="anno" name="anno" value="" type="hidden"/>
              <input id="id_estado" name="id_estado" value="" type="hidden" >
              <input id="id_file" name="id_file" value="" type="hidden"/>
              <input id="ofi_de_auto_nombre" name="ofi_de_auto_nombre" value="" type="hidden"/>
              <input id="num_prop" name="num_prop" type="hidden" />
            </div>

            <div class="form-group col-md-4">
              <label for="id">Oficio de Autorización</label>
              <input type="file" class="form-control-file" id="ofi_de_auto" name="ofi_de_auto" >
            </div> 
          </div> 

          <!--footer modal-->
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="button" onclick="editAutorizacion()" class="btn btn-primary">Guardar propuesta</button>
          </div>
          <div id="ajaxloader" style="display:none"><img class="mx-auto mt-30 mb-30 d-block" src="../images/pre-loader/805.gif" alt=""></div>
        </div>
        </form>
      </div>
    </div>
    </div>
  </div>
</div>
<!--End modal , edit file oficio de autorizacion pdf-->

<!--Start modal , edit files 3 PDFs-->
  <div id="editOAC" class="modal fade bd-prah-edit-3pdfs-modal-lg " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
            <!--header modal-->
      
      <div class="modal-header modal-header-info">
        <h5 class="modal-title" id="exampleModalLongTitle">Subir/Editar - Oficio de Acuerdo, Acuerdo de Liberación & Cierre de ejercicio y control del ejercicio.</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="card ">
        <div class="card-header text-center ">
          <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
              <a class="nav-link disabled" onclick="" >Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="#">Autorización</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="#">En Proceso</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="#">VoBo</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="#">Cierre</a>
            </li>
          </ul>
        </div>
        <div class="card-body">
        <!--body del modal-->
          <form id="form_update_propuesta_OAC" name="form_update_propuesta_OAC">
          <div class="modal-body">
           <div class="row">
            <div id="mesage_edit_oac" class="form-group col-md-12">
            </div>

            <div>
              <input id="op" name="op" type="hidden" class="form-control" value="editarOAC" />
              <input id="app" name="app"  type="hidden" class="form-control" value="<?php echo $_SESSION['nombre_app'] ?>"/>
              <input id="anno" name="anno" value="" type="hidden"/>
              <input id="id_estado" name="id_estado" value="" type="hidden" >
              <input id="id_file" name="id_file" value="" type="hidden"/>
              <input id="num_prop" name="num_prop" type="hidden" />
              <input id="ofi_de_acue_nombre" name="ofi_de_acue_nombre" value="" type="hidden"/>
              <input id="acue_de_libe_nombre" name="acue_de_libe_nombre" value="" type="hidden"/>
              <input id="cier_ejer_y_cont_nombre" name="cier_ejer_y_cont_nombre" value="" type="hidden"/>
            </div>

            <div class="form-group col-md-4">
              <label for="id">Oficio de Acuerdo</label>
              <input type="file" class="form-control-file" id="ofi_de_acue" name="ofi_de_acue" >
            </div>

            <div class="form-group col-md-4">
              <label for="id">Acuerdo de Liberación</label>
              <input type="file" class="form-control-file" id="acue_de_libe" name="acue_de_libe" >
            </div>

            <div class="form-group col-md-4">
              <label for="id">Cierre de ejercicio y control del ejercicio</label>
              <input type="file" class="form-control-file" id="cier_ejer_y_cont" name="cier_ejer_y_cont" >
            </div> 
          </div> 

          <!--footer modal-->
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="button" onclick="editOAC()" class="btn btn-primary">Guardar propuesta</button>
          </div>
          <div id="ajaxloader" style="display:none"><img class="mx-auto mt-30 mb-30 d-block" src="../images/pre-loader/loader-02.svg" alt=""></div>
        </div>
        </form>
      </div>
    </div>
    </div>
  </div>
</div>
<!--End modal , edit files 3 PDFs-->


<!--Start modal , aprobar-->
  <div id="aprobar" class="modal fade bd-prah-edit-3pdfs-modal-lg " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
            <!--header modal-->
      
      <div class="modal-header modal-header-info">
        <h5 class="modal-title" id="exampleModalLongTitle">VoBo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="card ">
        <div class="card-header text-center ">
          <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
              <a class="nav-link disabled" onclick="" >Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="#">Autorización</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="#">En Proceso</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="#">VoBo</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="#">Cierre</a>
            </li>
          </ul>
        </div>
        <div class="card-body">
        <!--body del modal-->
          <form id="form_update_propuesta_vobo" name="form_update_propuesta_vobo">
          <div class="modal-body">
           <div class="row">
            <div id="mesage_edit_vobo" class="form-group col-md-12">
            </div>

            <div>
              <input id="op" name="op" value="update_vobo" type="hidden"/>
              <input id="id_file" name="id_file" value="" type="hidden"/>
              <input id="id_estado" name="id_estado" value="" type="hidden" >
            </div>
            <div class="form-group col-md-4">
                <label for="id">Validar</label>
                <select id="vobo" name="vobo" class="form-control">
                  <option value=""></option>
                  <option value="0">No aprobar</option>
                  <option value="1">Aprobar</option>
                  
                </select>
            </div>
             <div class="form-group col-md-4">
                <label for="id">Comentario: </label>
                <textarea type="text" id="comment_vobo" name="comment_vobo" class="form-control form-text"></textarea>
            </div>
          <!--footer modal-->
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="button" onclick="aprobar()" class="btn btn-primary">Guardar propuesta</button>
          </div>
          <div id="ajaxloader" style="display:none"><img class="mx-auto mt-30 mb-30 d-block" src="../images/pre-loader/loader-02.svg" alt=""></div>
        </div>
        </form>
      </div>
    </div>
    </div>
  </div>
</div>
<!--End modal , aprovar-->

  <!-- plugins:js -->
  <script src="../vendors/js/vendor.bundle.base.js"></script>
  <script src="../vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="../js/off-canvas.js"></script>
  <script src="../js/misc.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../js/dashboard.js"></script>
  <!-- End custom js for this page-->

  <!-- JQuery js for this page-->

  <!-- End JQuery js for this page-->

   <!-- PRAH js for this page-->
  
  <script src="../lib/app-prah.js"></script>
  <script src="../lib/app-prah-validar.js"></script>

  <!-- End PRAH js for this page-->
  <script type="text/javascript">
    getEstados("<?php echo $_SESSION['id_estado_fk'];?>");
  </script>

  
</body>

</html>
