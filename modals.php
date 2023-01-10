<!-- Ventanas modal -->

<!-- Ventana para desconectarse-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">¿Desea cerrar la sesión?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <a class="btn btn-success float-left" href="<?php echo $logoutAction ?>">Si</a>
        <button class="btn btn-danger float-right" type="button" data-dismiss="modal">No</button>
        
      </div>
    </div>
  </div>
</div>

<!-- Ventana para cambiar contraseña para usuario logueado-->
<div class="modal fade" id="ModalCambiarPass" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"> <i class="fa fa-key"></i> Cambiar contraseña</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form name="cambiarpass" id="cambiarpass" autocomplete="off" noform-control>
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="nuevapass">Nueva contraseña: <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="nuevapass" name="nuevapass" autocomplete="off" placeholder="..." required="required">
              </div>
            </div>
          </div>
          <div class="row">
              <div class="col">
                <div class="form-group">
                  <button type="button" onclick="cambiarPass('<?php echo"$id_usuario"; ?>','nuevapass')" class="btn btn-light-primary float-left">ACTUALIZAR</button>
                  <button type="button" class="btn btn-light-danger float-right" data-dismiss="modal"> CANCELAR </button>
                </div>
              </div>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Ventana para cambiar contraseña desde el listado de usuarios-->
<div class="modal fade" id="ModalCambiarPassUsuario" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"> <i class="fa fa-key"></i> Cambiar contraseña de Usuario</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form name="cambiarpass" id="cambiarpass" autocomplete="off" noform-control>
          <div class="row">
            <div class="col">
              <p>Usuario: <span id="usuarioCambiaPass"></span></p>
              <div class="form-group">
                <label for="nuevapass">Nueva contraseña: <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="nuevapassusuario" name="nuevapass" autocomplete="off" placeholder="..." required="required">
                <input type="hidden" class="form-control" id="idnuevapassusuario" name="idnuevapassusuario" autocomplete="off" placeholder="..." >
              </div>
            </div>
          </div>
          <div class="row">
              <div class="col">
                <div class="form-group">
                    <button type="button" onclick="cambiarPass($('#idnuevapassusuario').val(),'nuevapassusuario')" class="btn btn-light-primary float-left">ACTUALIZAR</button>
                    <button type="button" class="btn btn-light-danger float-right" data-dismiss="modal"> CANCELAR </button>
                </div>
              </div>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Ventana modal para registrar observaciones -->
<div class="modal fade" id="ModalObservaciones" tabindex="-1" role="dialog" data-backdrop="static">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title"><i class="fas fa-eye text-info"></i> Observaciones</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                  <span class="sr-only">Close</span>
              </button>
          </div>
          <div class="modal-body">
            <table class="table table-bordered table-hover" id="tabla_Observaciones">
              <thead>
                <tr>
                  <th class="col-md-11 font-weight-bold">OBSERVACIÓN</th>
                  <th class="col-md-1 font-weight-bold text-center">ACC.</th>
                </tr>
              </thead>
              <tbody  id="ajax-observaciones"></tbody>
              <tfoot>
                <tr>
                  <td colspan="2">
                    <form name="registrobservacion" id="registrobservacion" enctype="multipart/form-data" autocomplete="off" noform-control form-control-sm>
                      <div class="form-group">
                        <input type="hidden" name="recibePOST" value="registrarObservaciones">
                        <input type="hidden" name="idmatriculaObserv" id="idmatriculaObserv">
                        <input type="hidden" name="idusuarioObserv" id="idusuarioObserv" value="<?php echo $id_usuario ?>">
                        <div class="row">
                          <div class="col-md-12">
                            <label for="nuevaobservacion">Registrar observación: <span class="text-danger">*</span> :</label>
                            <div class="input-group mb-3">
                              <input type="text" class="form-control form-control-sm" name="nuevaobservacion"  id="nuevaobservacion" value="" placeholder="..." aria-describedby="basic-addon2" required>
                              <div class="input-group-append">
                                  <button type="submit" class="btn btn-success btn-sm">REGISTRAR</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                  </td>
                </tr>
              </tfoot>
            </table>
          </div>
          <div class="modal-footer">
            <a href="#!" class="btn btn-danger btn-sm" id="btn_cerrar_modalObservacion" data-dismiss="modal">CERRAR</a>
          </div>
      </div>
  </div>
</div>

<!-- Ventana modal para seleccionar País -->
<div class="modal fade" id="ModalSeleccionarPais" tabindex="-1" role="dialog" data-backdrop="static">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title">Seleccionar País</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                  <span class="sr-only">Close</span>
              </button>
          </div>
          <div class="modal-body modal-tablas" id="contenedor-modal-pais">
            <div class="table-responsive">
                <table class="table table-hover table-bordered" id="dataTable_listadoPaismodal" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                      <th></th>
                      <th class="header">PAÍS</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody></tbody>
                </table>
              </div>
          </div>
          <div class="modal-footer">
            <a href="#!" class="btn btn-danger btn-sm btn-round" id="btn_cerrar_modalPais" data-dismiss="modal">CERRAR</a>
          </div>
      </div>
  </div>
</div>

<!-- Ventana modal para seleccionar Provincia -->
<div class="modal fade" id="ModalSeleccionarProvincia" tabindex="-1" role="dialog" data-backdrop="static">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title">Seleccionar Provincia <span id="paisProvn"></span></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                  <span class="sr-only">Close</span>
              </button>
          </div>
          <div class="modal-body modal-tablas" id="contenedor-modal-provincia">
            <div class="table-responsive">
                <table class="table table-hover table-bordered" id="dataTable_listadoProvinciamodal" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th></th>
                        <th>PROVINCIA</th>
                        <th></th>
                      </tr>
                    </thead>
                  <tbody></tbody>
                </table>
            </div>
          </div>
          <div class="modal-footer">
            <a href="#!" class="btn btn-danger btn-sm btn-round" id="btn_cerrar_modalProvincia" data-dismiss="modal">CERRAR</a>
          </div>
      </div>
  </div>
</div>

<!-- Ventana modal para seleccionar Ciudad -->
<div class="modal fade" id="ModalSeleccionarCiudad" tabindex="-1" role="dialog" data-backdrop="static">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title">Seleccionar Ciudad <span id="provCiudad"></span></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                  <span class="sr-only">Close</span>
              </button>
          </div>
          <div class="modal-body modal-tablas" id="contenedor-modal-provincia">
            <div class="table-responsive">
                <table class="table table-hover table-bordered" id="dataTable_listadoCiudadmodal" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                      <th></th>
                      <th>CIUDAD</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody></tbody>
                </table>
              </div>
          </div>
          <div class="modal-footer">
            <a href="#!" class="btn btn-danger btn-sm btn-round" id="btn_cerrar_modalCiudad" data-dismiss="modal">CERRAR</a>
          </div>
      </div>
  </div>
</div>

<!-- Ventana modal para registrar periodo -->
<div class="modal fade" id="ModalRegistrarPeriodo" tabindex="-1" role="dialog" data-backdrop="static">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
        <form name="formRegistrarPeriodo" id="formRegistrarPeriodo" class="form" accept-charset="UTF-8" noform-control>
          
          <div class="modal-header">
              <h4 class="modal-title"><i class="fa fa-calendar"></i> Registrar período académico</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                  <span class="sr-only">Close</span>
              </button>
          </div>
          <div class="modal-body" id="contenedor-modal-editarperiodo">
            <div class="container">
              <div class="form-group row">
                <div class="col-lg-12">
                  <label>Período: <span class="text-danger">*</span></label>
                  <input type="text" name="tperiodo_modal_r" id="tperiodo_modal_r" class="form-control" placeholder="..." required="required" />
                </div>
              </div>
              <div class="form-group row">
               <div class="col-lg-4">
                  <label>Fecha Inicio: <span class="text-danger">*</span></label>
                  <input type="date" name="f_iniciop_modal_r" id="f_iniciop_modal_r" class="form-control" placeholder="00/00/0000" required="required" />
               </div>
               <div class="col-lg-4">
                  <label>Fecha Fin: <span class="text-danger">*</span></label>
                  <input type="date" name="f_finp_modal_r" id="f_finp_modal_r" class="form-control" placeholder="00/00/0000" required="required" />
               </div>
               <div class="col-lg-4">
                  <label>Activo: <span class="text-danger">*</span></label>
                  <select name="activo_pmodal_r" id="activo_pmodal_r" class="form-control" required="required">
                    <option value="1">Si</option>
                    <option value="2">No</option>
                  </select>
               </div>
             </div>
            </div>
          </div>
          
          <div class="modal-footer">

            <div class="container">
              <div class="row">
                <div class="col-lg-6">
                  <input type="hidden" name="recibePOST" value="registrarPeriodo">
                  <button type="submit" class="btn btn-light-primary btn-sm mr-2">Registrar</button>
                </div>
                <div class="col-lg-6 text-lg-right">
                  <a href="#!" class="btn btn-light-danger btn-sm" id="btn_cerrar_modal" data-dismiss="modal">Cancelar</a>
                </div>
              </div>
            </div>
            
          </div>
        </form>

      </div>
  </div>
</div>

<!-- Ventana modal para editar periodo -->
<div class="modal fade" id="ModalEditarPeriodo" tabindex="-1" role="dialog" data-backdrop="static">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
        <form name="formEditarPeriodo" id="formEditarPeriodo" class="form" accept-charset="UTF-8" noform-control>
          
          <div class="modal-header">
              <h4 class="modal-title"><i class="fa fa-calendar"></i> Editar edición</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                  <span class="sr-only">Close</span>
              </button>
          </div>
          <div class="modal-body" id="contenedor-modal-editarperiodo">
            <div class="container">
              <div class="form-group row">
                <div class="col-lg-12">
                  <label>Período: <span class="text-danger">*</span></label>
                  <input type="text" name="tperiodo_modal" id="tperiodo_modal" class="form-control" placeholder="..." required="required" />
                </div>
              </div>
              <div class="form-group row">
               <div class="col-lg-4">
                  <label>Fecha Inicio: <span class="text-danger">*</span></label>
                  <input type="date" name="f_iniciop_modal" id="f_iniciop_modal" class="form-control" placeholder="00/00/0000" required="required" />
               </div>
               <div class="col-lg-4">
                  <label>Fecha Fin: <span class="text-danger">*</span></label>
                  <input type="date" name="f_finp_modal" id="f_finp_modal" class="form-control" placeholder="00/00/0000" required="required" />
               </div>
               <div class="col-lg-4">
                  <label>Activo: <span class="text-danger">*</span></label>
                  <select name="activo_pmodal" id="activo_pmodal" class="form-control" required="required">
                    <option value="1">Si</option>
                    <option value="2">No</option>
                  </select>
               </div>
             </div>
            </div>
          </div>
          
          <div class="modal-footer">

            <div class="container">
              <div class="row">
                <div class="col-lg-6">
                  <input type="hidden" name="id_periodo_modal_editar" id="id_periodo_modal_editar">
                  <input type="hidden" name="recibePOST" value="editarPeriodo">
                  <button type="submit" class="btn btn-light-primary btn-sm mr-2">Actualizar</button>
                </div>
                <div class="col-lg-6 text-lg-right">
                  <a href="#!" class="btn btn-light-danger btn-sm" id="btn_cerrar_modal" data-dismiss="modal">Cancelar</a>
                </div>
              </div>
            </div>
            
          </div>
        </form>

      </div>
  </div>
</div>

<!-- Ventana modal para eliminar periodo -->
<div class="modal fade" id="ModalEliminarPeriodo" tabindex="-1" role="dialog" data-backdrop="static">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
        <form name="formEliminarPeriodo" id="formEliminarPeriodo" class="form" accept-charset="UTF-8" noform-control>
          
          <div class="modal-header">
              <h4 class="modal-title"><i class="fa fa-calendar"></i> Eliminar período académico</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                  <span class="sr-only">Close</span>
              </button>
          </div>
          <div class="modal-body" id="contenedor-modal-editarperiodo">
            <div class="container">
              <div class="form-group row">
                <div class="col-lg-12">
                  <h2>Período: <span id="tperiodo_modal_elim"></span></h2>
                </div>
              </div>
              <div class="form-group row">
               <div class="col-lg-12">
                 <h3>Fecha Inicio: <span id="f_iniciop_modal_elim"></span> <br> Fecha Fin: <span id="f_finp_modal_elim"></span> <br> Activo: <span id="activo_pmodal_elim"></span></h3>
               </div>
               <div class="col-lg-12">
                 <div id="mensajeElim_modal"></div>
               </div>
             </div>
            </div>
          </div>
          
          <div class="modal-footer">

            <div class="container">
              <div class="row">
                <div class="col-lg-6">
                  <input type="hidden" name="id_periodo_modal_elim" id="id_periodo_modal_elim">
                  <input type="hidden" name="recibePOST" value="checkEliminarPeriodo">
                  <button type="submit" class="btn btn-light-primary btn-sm mr-2">Eliminar</button>
                </div>
                <div class="col-lg-6 text-lg-right">
                  <a href="#!" class="btn btn-light-danger btn-sm" id="btn_cerrar_modal_elim_periodo">Cancelar</a>
                </div>
              </div>
            </div>
            
          </div>
        </form>

      </div>
  </div>
</div>

<!-- Ventana modal visor IMAGEN -->
<div class="modal fade" id="ModalVisorImagen" tabindex="-1" role="dialog" data-backdrop="static">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
          
        <div class="modal-header">
            <h4 class="modal-title"><i class="fa fa-calendar"></i> Archivo adunto</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                <span class="sr-only">Close</span>
            </button>
        </div>

        <div class="modal-body" id="contenedor-modal-visorimagen">
          <img src="" id="img-adjunto-modal">
        </div>
        
        <div class="modal-footer">
          <div class="container">
            <div class="row">
              <div class="col-lg-12 text-lg-right">
                <a href="#!" class="btn btn-light-danger btn-sm" id="btn_cerrar_modal" data-dismiss="modal">Cerrar</a>
              </div>
            </div>
          </div>
        </div>
          
      </div>
  </div>
</div>

<!-- Ventana modal visor PDF -->
<div class="modal fade" id="ModalVisorPdf" tabindex="-1" role="dialog" data-backdrop="static">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
          
        <div class="modal-header">
            <h4 class="modal-title"><i class="fa fa-calendar"></i> Archivo adunto</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                <span class="sr-only">Close</span>
            </button>
        </div>

        <div class="modal-body" id="contenedor-modal-visorpdf">
          <object id="cargarPdf" data="" type="application/pdf" style="width:100%; height:800px;"></object>
        </div>
        
        <div class="modal-footer">
          <div class="container">
            <div class="row">
              <div class="col-lg-12 text-lg-right">
                <a href="#!" class="btn btn-light-danger btn-sm" id="btn_cerrar_modal" data-dismiss="modal">Cerrar</a>
              </div>
            </div>
          </div>
        </div>
          
      </div>
  </div>
</div>

