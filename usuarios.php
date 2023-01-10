<?php 
	//HEADER
	include_once('header.php'); 

	//HEADER MOVIL
	include_once('header-movil.php');

	//SIDEBAR
	include_once('sidebar.php');

	//MENU TOP
	include_once('menu-top.php');

	$tipo = isset($_GET["tipo"]) ? $_GET["tipo"] : "";
?>

<style type="text/css">
	.dt-buttons{
		display: none;
	}
</style>

<!-- ********************** CONTENIDO - INICIO **************************** -->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">

<!--begin::Entry-->
<div class="d-flex flex-column-fluid">
	<!--begin::Container-->
	<div class="container">
		
		<div class="card card-custom gutter-b" id="alertamens" style="display: none; margin-top: 25px;">
			<div class="card-header flex-wrap py-3">
				<div class="card-title">
					<div class="alert alert-info">Nueva asistencia registrada, actualice el listado. <a href="#!" id="btn-close-alertamens"><i class="la la-close"></i></a></div>
				</div>
			</div>
		</div>

	<!--
		<div class="card card-custom gutter-b d-block d-sm-none" style="margin-top: 25px;">
			<div class="card-header flex-wrap py-3" style="padding: 10px;">
				<div class="card-title">
					<a href="usuarios.php?menu=config&submenu=usuariosistemabecarios&tipo=todos" class="btn btn-sm btn-shadow btn-<?php if($tipo=='todos'){ echo"primary"; }else{echo"light-primary";}; ?> ml-1" style="padding: 5px;">Listado <br> Completo</a>
					<a href="usuarios.php?menu=config&submenu=usuariosistemabecarios&tipo=10005" class="btn btn-sm btn-shadow btn-<?php if($tipo=='10005'){ echo"info"; }else{echo"light-info";}; ?> ml-1" style="padding: 5px;">Becarios <br> Confirmados</a>
					<a href="usuarios.php?menu=config&submenu=usuariosistematoridades&tipo=10006" class="btn btn-sm btn-shadow btn-<?php if($tipo=='10006'){ echo"success"; }else{echo"light-success";}; ?> ml-1" style="padding: 5px;">Autoridades <br> Confirmados</a>
					<a href="usuarios.php?menu=config&submenu=usuariosistemainstituciones&tipo=10008" class="btn btn-sm btn-shadow btn-<?php if($tipo=='10008'){ echo"danger"; }else{echo"light-danger";}; ?> ml-1" style="padding: 5px;">Instituciones <br> Confirmados</a>
				</div>
			</div>
		</div>
	-->

		<!--begin::Card-->
		<div class="card card-custom gutter-b" style="margin-top: 25px;">
			<div class="card-header flex-wrap py-3">
				<div class="card-title">
					<h3 class="card-label">Usuario del sistema
					<input type="hidden" name="tipo" id="tipo" value="<?php echo "$tipo"; ?>">
				</div>
			
				<div class="card-toolbar">
					
					<div class="dropdown dropdown-inline mr-2 d-none d-sm-block">
						<button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<span class="svg-icon svg-icon-md">
							
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
								<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
									<rect x="0" y="0" width="24" height="24" />
									<path d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z" fill="#000000" opacity="0.3" />
									<path d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z" fill="#000000" />
								</g>
							</svg>
					
						</span>Exportar</button>
					
						<div class="dropdown-menu dropdown-menu-sm dropdown-menu-left">
					
							<ul class="navi flex-column navi-hover py-2">
								<!-- <li class="navi-header font-weight-bolder text-uppercase font-size-sm text-primary pb-2">Opciones:</li> -->
								<li class="navi-item">
									<a href="#" class="navi-link" id="btn-exp-imp">
										<span class="navi-icon">
											<i class="la la-print"></i>
										</span>
										<span class="navi-text">Imprimir</span>
									</a>
								</li>
								<li class="navi-item">
									<a href="#" class="navi-link" id="btn-exp-excel">
										<span class="navi-icon">
											<i class="la la-file-excel-o"></i>
										</span>
										<span class="navi-text">Excel</span>
									</a>
								</li>
								<li class="navi-item">
									<a href="#" class="navi-link" id="btn-exp-pdf">
										<span class="navi-icon">
											<i class="la la-file-pdf-o"></i>
										</span>
										<span class="navi-text">PDF</span>
									</a>
								</li>
							</ul>
							
						</div>
					
					</div>

					<a href="#!" class="btn btn-light-primary font-weight-bolder  mr-2" id="btn_registrar_usuario" >
						Nuevo registro
					</a>

					<a href="#!" class="btn btn-light-primary font-weight-bolder" id="btn_registrar_usuario" >
						Actualizar listado
					</a>
				</div>

			</div>

			<div class="card-body">
				<?php
				/****************
				DCB
				16-07-2019
				Listado de Usuarios
				*****************/
				#Consulto la base de datos para listar las ofertas, al menos debe existir una registrada
				#de lo contrario muestro un mensaje de alerta que no existen registros
				$SQLconsultaUsuarios = "SELECT * FROM usuarios";
				$SQLconsultaUsuarios = $conexionmysqli->query($SQLconsultaUsuarios);
				$SQLconsultaUsuarios->data_seek(0);
				$existeUsuarios = mysqli_num_rows($SQLconsultaUsuarios);
				$SQLconsultaUsuarios->close();
				if ($existeUsuarios) {
				?>

				<!--begin: Datatable-->
				<table class="table table-bordered table-responsive" id="dataTable_listadoUsuarios">
				    <thead>
				    	<tr>
				    	  <th>No</th>
				          <th>NOMBRE</th>
				          <th>NOMBRE DE USUARIO</th>
				          <th>GRUPO</th>
				          <th>ESTADO</th>
				          <th></th>
				        </tr>
				    </thead>
				    <tbody>
				    </tbody>
				</table>
				<!--end: Datatable-->

				<?php
					}else{
					?>
					<div class="alert alert-info" role="alert">
					  <p>No hay registros para mostrar, agregue un usuario para comenzar. <a href="#!">Registrar Usuario</a> </p>
					</div>
					<?php
				}
				?>

			</div>
		</div>
		<!--end::Card-->
	</div>
	<!--end::Container-->
</div>
<!--end::Entry-->
</div>
<!-- ********************** CONTENIDO - FIN **************************** -->


<?php 
	include_once('footer.php');
	/* Obtener los caracteres despues del punto
	$url = "2. 36015805.16923.jpg"; //23601580516923.jpg
	$id = substr($url, strrpos($url, '.') + 1);
	echo $id;
	*/
?>

<!-- Modal nuevo usuario -->
<div class="modal fade" id="ModalNuevoUsuario" tabindex="-1" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><i class="fa fa-user text-info"></i> Nuevo usuario</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Close</span>
                </button>
            </div>
            <form name="nuevousuario" id="nuevousuario" autocomplete="off" noform-control>
                <div class="modal-body">
			    	<div class="form-group">
			    		<div class="row">
			    			<div class="col-md-12">
					            <label for="nombre">Nombre y apellidos: <span class="text-danger">*</span></label>
					            <input type="text" class="form-control" id="nombre" name="nombre" autocomplete="off" placeholder="..." required>
					        </div>
					    </div>
					</div>
					<div class="form-group">
			    		<div class="row">        
			                <div class="col-md-12">
					            <label for="usuario">Nombre de usuario: <span class="text-danger">*</span></label>
					            <input type="text" class="form-control" id="usuario" name="usuario" autocomplete="off" placeholder="..." required>
					        </div>
					    </div>
			        </div>
			        <div class="form-group">
			        	<div class="row">
				          <div class="col-md-6">
					          <label for="cod_grupo">Grupo: <span class="text-danger">*</span></label>
				              <select name="cod_grupo" id="cod_grupo" class="form-control" required>
				                <option value="">Seleccione</option>
				                <?php
				                  $SQLlistadoGrupo = "SELECT * FROM grupo WHERE cod_grupo IN ('10002', '10003', '10005', '10006', '10007', '10008', '10009', '10010')";
				                  $SQLconsultalistadoGrupo = $conexionmysqli->query($SQLlistadoGrupo);
				                  $SQLconsultalistadoGrupo->data_seek(0);
				                  while ($registro_listadoGrupo = $SQLconsultalistadoGrupo->fetch_assoc()) {
				                    echo "<option value=\"".$registro_listadoGrupo['cod_grupo']."\">".$registro_listadoGrupo['n_grupo']."</option>
				                    ";
				                  }
				                ?>
				              </select>
			              </div>
			          </div>
			      </div>

			    <!--    
			        <div class="form-group">
			        	<div class="row">
			              <div class="col-md-6">
			              	  <label for="habilitado">Activo: <span class="text-danger">*</span></label>
		                      <select name="habilitado" id="habilitado" class="form-control" required>
		                        <option value="">Seleccione</option>
		                        <option value="1">SI</option>
		                        <option value="2">NO</option>
		                      </select>
		                 </div>
		             </div>
			        </div>
			        <div class="form-group">
			        	<div class="row">
				            <div class="col-md-6">
			                    <label for="contrasenna">Contraseña: <span class="text-danger">*</span></label>
						        <input type="text" class="form-control" id="contrasenna" name="contrasenna" autocomplete="off" placeholder="..." required>
			                </div>
		             	</div>
			        </div>
			    -->

			        <div class="form-group">
			            <div class="row">
			                <div class="col">
			                    <p><span class="text-danger">*</span> Campos obligatorios</p>
			                </div>
			            </div>
			        </div>
			    </div>
                <div class="modal-footer">
	              <input type="hidden" name="recibePOST" value="nuevoUsuario">
	              <button type="submit" class="btn btn-success btn-sm">REGISTRAR USUARIO</button>
	              <button type="button" id="btn_cancel_nuevo_usuario" class="btn btn-danger btn-sm" data-dismiss="modal">CANCELAR</button>
	          	</div>
            </form>
        </div>
    </div>
</div>

<!-- Modal editar usuario -->
<div class="modal fade" id="ModalEditarUsuario" tabindex="-1" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><i class="fas fa-calendar text-info"></i> Editar usuario</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Close</span>
                </button>
            </div>
            <form name="editarusuario" id="editarusuario" autocomplete="off" noform-control>
                <div class="modal-body">
			    	<div class="form-group">
			    		<div class="row">
			    			<div class="col-md-12">
					            <label for="nombre_e">Nombre y apellidos <span class="text-danger">*</span> :</label>
					            <input type="text" class="form-control" id="nombre_e" name="nombre_e" autocomplete="off" placeholder="..." required>
					        </div>
					    </div>
					</div>

					<div class="form-group">
					    <div class="row">
			                <div class="col-md-12">
					            <label for="usuario_e">Nombre de usuario <span class="text-danger">*</span> :</label>
					            <input type="text" class="form-control" id="usuario_e" name="usuario_e" autocomplete="off" placeholder="..." required>
					        </div>
					    </div>
			        </div>

			        <div class="form-group">
			        	<div class="row">
				          <div class="col-md-6">
					          <label for="cod_grupo_e">Grupo <span class="text-danger">*</span> :</label>
				              <select name="cod_grupo_e" id="cod_grupo_e" class="form-control" required>
				                <option value="">Seleccione</option>
				                <?php
				                  $SQLlistadoGrupo = "SELECT * FROM grupo WHERE cod_grupo IN ('10002', '10003', '10005', '10006', '10007', '10008', '10009', '10010')";
				                  $SQLconsultalistadoGrupo = $conexionmysqli->query($SQLlistadoGrupo);
				                  $SQLconsultalistadoGrupo->data_seek(0);
				                  while ($registro_listadoGrupo = $SQLconsultalistadoGrupo->fetch_assoc()) {
				                    echo "<option value=\"".$registro_listadoGrupo['cod_grupo']."\">".$registro_listadoGrupo['n_grupo']."</option>
				                    ";
				                  }
				                ?>
				              </select>
			              </div>
			          </div>
			      </div>
			      <div class="form-group">
			        	<div class="row">
			              <div class="col-md-6">
		                      <label for="habilitado_e">Activo <span class="text-danger">*</span> :</label>
		                      <select name="habilitado_e" id="habilitado_e" class="form-control" required>
		                        <option value="">Seleccione</option>
		                        <option value="1">SI</option>
		                        <option value="2">NO</option>
		                      </select>
		                 </div>
		             </div>
			        </div>

			    <!--
			        <div class="form-group" >
			        	<div class="row">
				            <div class="col-md-6">
			                    <label for="contrasenna_e">Contraseña:</label>
						        <input type="text" class="form-control" id="contrasenna_e" name="contrasenna_e" autocomplete="off" placeholder="...">
			                </div>
			                <div class="col-md-12">
						        <em>Deje el campo em blanco si no desea cambiar la contraseña</em>
			                </div>
		             	</div>
			        </div>
			    -->
			        <div class="form-group">
			            <div class="row">
			                <div class="col">
			                    <p><span class="text-danger">*</span> Campos obligatorios</p>
			                </div>
			            </div>
			        </div>
			    </div>
                <div class="modal-footer">
	              <input type="hidden" name="recibePOST" value="actualizarUsuario">
	              <input type="hidden" name="id_usuario" id="id_usuario">
	              <button type="submit" class="btn btn-success btn-sm">ACTUALIZAR USUARIO</button>
	              <button type="button" id="btn_cancel_editar_usuario" class="btn btn-danger btn-sm" data-dismiss="modal">CANCELAR</button>
	          	</div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
/* Funcion para añadir campos ocultos a cada ROW de la tabla return data === 'No asignado' ?  */  

var tipo = $('#tipo').val();


$(document).ready(function() {
	//Guardar o actualizar total de asistencias
	guardarAsistencias('1');
	//Chequear asistencias

	//Oculto los menus
	$('.collapse').collapse('hide');
	/****Tooltips****/
  	$('[data-toggle="tooltip"]').tooltip();
	/****Data Tables****/
	var table = $('#dataTable_listadoUsuarios').DataTable({
		
		"initComplete": function () {
        	if (tipo != 'todos') {
				$('.regasistencia').hide();
			}
        },

	  	"language": {
	        "url": "assets/js/Spanish.json"
	    },
	    "pagingType": "full_numbers",
	    "pageLength": 10,
	    "order": [[1, 'asc']],
	    "ajax": "usuariosjson.php?tipo="+tipo, //Listado en formato JSON
        "columns": [
            { "data": "id" },
            { "data": "nombre" },
            { "data": "usuario" },
            { "data": "grupo" },
            { "data": "estado" },
            {
                "className": 'acc-registros',
                "orderable": false,
                "data": null,
                "defaultContent": '',
                "render": function () {
                    // return '<a href="#!" class="text-primary"><i class="fa fa-edit" aria-hidden="true"></i></a> <a href="#!" class="text-primary"><i class="fa fa-trash" aria-hidden="true"></i></a>';
                     return '<a href="#!" class="btn btn-sm btn-clean editarusuari" data-toggle="tooltip" data-original-title="Mostrar / Ocultar opciones" title="Mostrar / Ocultar opciones" data-placement="left"><i class="fa fa-edit text-primary" aria-hidden="true"></i> </a> <a href="#!" class="btn btn-sm btn-clean eliminarusuario" data-toggle="tooltip" data-original-title="Mostrar / Ocultar opciones" title="Mostrar / Ocultar opciones" data-placement="left"><i class="fa fa-trash text-danger" aria-hidden="true"></i> </a> ';

                 },
                 width:"15px"
            }
            /*
            ,
            {
                "className": 'anular-registro',
                "orderable": false,
                "data": null,
                "defaultContent": '',
                "render": function () {
                     return '<a href="#!" class="text-primary"><i class="fa fa-trash" aria-hidden="true"></i></a>';
                 },
                 width:"15px"
            }
            */
        ],
        
        "dom": 'Blfrtip',
        "buttons": [
	        {
	        	extend: 'excelHtml5',
	            text: 'Exportar a Excel',
	            className: 'btn-exportacion btn-excel',
	            title: 'Listado de Usuarios del Sistema',
	            exportOptions: {
                    columns: [ 1, 2 ]
                }
	        },
	        {
	            extend: 'pdfHtml5',
	            text: 'Exportar a PDF',
	            className: 'btn-exportacion btn-pdf',
	            title: 'Listado de Usuarios del Sistema',
	            orientation: 'landscape',
                pageSize: 'LEGAL',
                exportOptions: {
                    columns: [ 1, 2 ]
                }

	        },
	        {
	            extend: 'print',
	            text: 'Imprimir',
	            className: 'btn-exportacion btn-imp',
	            title: 'Listado de Usuarios del Sistema',
	            exportOptions: {
                    columns: [ 1, 2 ]
                }
	        }
        ],

	    "columnDefs": [
		    {
		      "targets"  : 'no-sort',
		      "orderable": false,
		    },
            {
		      "targets"  : [ 3 ],
		      "visible": false,
		    },
	    ],
	    rowCallback: function(row, data, index){
            if(data["cant"] > "0"){
                $('td', row).css('background-color', 'aliceblue');
            }
        }

	  });


	//Numeros de orden al inicio de la tabla
	table.on( 'order.dt search.dt', function () {
        table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();


    $('#dataTable_listadoUsuarios tbody').on('click', 'a.regasistencia', function () {
    	var data = table.row( $(this).parents('tr') ).data();
        // console.log('rechazar: '+ data.id_usuario);
        var id_u = data.id;
        var id_e = data.id_evento;

       //  console.log('Registrar asistencia: '+id_u);
       regAsistencia(id_u,id_e);
       Push.create('Asistencia registrada, actualizar listado!')
    });

    $('#dataTable_listadoUsuarios tbody').on('click', 'a.editarusuari', function () {
    	var data = table.row( $(this).parents('tr') ).data();
    	// console.log('editarusuari: '+data.id);
        editarUsuario(data.id);
    });

    $('#dataTable_listadoUsuarios tbody').on('click', 'a.eliminar', function () {
    	var id = $(this).data('id');
    	var nombre = $(this).data('nombre');
        anularUsuario(id, nombre);
    });

});

//>Comprobar nombre de usuario
$(document).on("focusout", "input#usuario", function () {
	//console.log('entro sin cambiar');
  
  var usuario = $(this).val();
  $(".tooltip").hide();
  $.post( "jquery.php", { "usuario":usuario, "recibePOST":"consultarNombreusuario" }, function(result){ mostrarLoader(); }, "json")
    .done(function( data, textStatus, jqXHR ) {
      setTimeout(ocultarLoader, 500);
      var resultado = data.data.usuario;
      if(resultado){
        toastr.error('Ya existe ese nombre de usuario, escoja otro');
        $('#usuario').val('');
      }
        if ( console && console.log ) {
          console.log( "La solicitud se ha completado correctamente." );
        }
    })
    .fail(function( jqXHR, textStatus, errorThrown ) {
        if ( console && console.log ) {
            console.log( "La solicitud a fallado: " +  textStatus);
        }
  });   
});

//>Ventana Modal para registrar nuevo usuario
$(document).on("click", "a#btn_registrar_usuario", function () {
    $('#ModalNuevoUsuario').modal('show');
});

//>Actualizar registros
$(document).on("click", "a#btn_actualizar", function () {
    //Recargo la tabla
    $('#dataTable_listadoUsuarios').DataTable().ajax.reload();
    //Actualizo el registro total de Asistencia
    toastr.info('Listado Actualizado');
});

 $(document).on("click", "a#btn_notificacion", function () {
   // toastr.info('Asistencia registrada, actualizar listado!');
   	// Push.create('Asistencia registrada, actualizar listado!');
});

//>Registrar nuevo usuario
$("#nuevousuario").submit(function (evt) {
    evt.preventDefault();
    evt.stopPropagation();
    //Consultas ajax para controlar las respuestas
    var form = $("#nuevousuario");
    var url = "jquery.php";
    var data = form.serialize();
    $.post(url, data, function(result){
        //Cambiar boton guardar a enviando
        curSubmit = form.find(":submit");
        curSubmit.prop('disabled', true);
        curSubmit.text('REGISTRANDO');
        mostrarLoader();
    })
    //La consulta se ejecuto con exito
    .done(function(data, textStatus, jqXHR) {
      $('#ModalNuevoUsuario').modal('hide');
      $('.modal-backdrop').hide();
      //Mensajes de confirmacion
      setTimeout(ocultarLoader, 2000);
      form.trigger("reset");
      curSubmit.prop('disabled', false);
      curSubmit.text('REGISTRAR USUARIO');
      //Cargo el listado de Ofertas
      toastr.success("Usuario registrado");
      //Recargo la tabla
      $('#dataTable_listadoUsuarios').DataTable().ajax.reload();
    })
    //Hubo un error en la consulta
    .fail(function(jqXHR, textStatus, errorThrown){
      if ( console && console.log ) {
        toastr.danger("La solicitud a fallado: " +  textStatus)
      }
      if(jqXHR.status == 500) {
        toastr.danger("Ha ocurrido un error, intente nuevamente")
      }
    })
    return false;
});

//> Mostrar ventana para editar usuario
function editarUsuario (id) {
  // var id_usuario = $(this).data('id');
  $(".tooltip").hide();
  $.post( "jquery.php", { "id_usuario":id, "recibePOST":"verUsuario" }, function(result){ mostrarLoader(); }, "json")
    .done(function( data, textStatus, jqXHR ) {
      setTimeout(ocultarLoader, 700);
      $("#nombre_e").val(data.data.nombre_e);
      $("#usuario_e").val(data.data.usuario_e);
      $("#cod_grupo_e").val(data.data.cod_grupo_e);
      $("#id_usuario").val(data.data.id_usuario);
      $("#habilitado_e").val(data.data.habilitado_e);
      setTimeout(function() {
        $('#ModalEditarUsuario').modal('show');
      }, 1000);

        if ( console && console.log ) {
          console.log( "La solicitud se ha completado correctamente." );
        }
    })
    .fail(function( jqXHR, textStatus, errorThrown ) {
        if ( console && console.log ) {
            console.log( "La solicitud a fallado: " +  textStatus);
        }
  });
};

//>Editar usuario
$("#editarusuario").submit(function (evt) {
    evt.preventDefault();
    evt.stopPropagation();
    //Consultas ajax para controlar las respuestas
    var form = $("#editarusuario");
    var url = "jquery.php";
    var data = form.serialize();
    $.post(url, data, function(result){
        //Cambiar boton guardar a enviando
        curSubmit = form.find(":submit");
        curSubmit.prop('disabled', true);
        curSubmit.text('Actualizando');
        mostrarLoader();
    })
    //La consulta se ejecuto con exito
    .done(function(data, textStatus, jqXHR) {
      $('#ModalEditarUsuario').modal('hide');
      $('.modal-backdrop').hide();
      //Mensajes de confirmacion
      setTimeout(ocultarLoader, 2000);
      form.trigger("reset");
      curSubmit.prop('disabled', false);
      curSubmit.text('ACTUALIZAR USUARIO');
      //Cargo el listado de Ofertas
      toastr.success("Usuario actualizado");
      //Recargo la tabla
      $('#dataTable_listadoUsuarios').DataTable().ajax.reload();
    })
    //Hubo un error en la consulta
    .fail(function(jqXHR, textStatus, errorThrown){
      if ( console && console.log ) {
        toastr.danger("La solicitud a fallado: " +  textStatus)
      }
      if(jqXHR.status == 500) {
        toastr.danger("Ha ocurrido un error, intente nuevamente")
      }
    })
    return false;
});

//>Anular usuario
function anularUsuario(id, nombre){

	$.confirm({
	    title: 'Confirmar eliminación',
	    content: '¿Desea eliminar este registro? <br> Usuario: '+nombre,
	    type: 'blue',
	    useBootstrap: true,
	    animation: 'zoom',
    	closeAnimation: 'scale',
	    // animationBounce: 1.5,
	    theme: 'bootstrap',
	    buttons: {
	      aceptar: {
	        text: 'Si', // Some Non-Alphanumeric characters
	        btnClass: 'btn-green',
	        action: function(){
	          $.alert('Registro eliminado');
	          //Elimino el modulo
	          var url = "jquery.php";
	          var data = ("&recibePOST=eliminarUsuario&id_usuario="+id);
	          $.post(url, data, function(result){
	          	  //Muestro el loader
	              mostrarLoader();
	            })
	            //La consulta se ejecuto con exito
	            .done(function(data, textStatus, jqXHR) {
	              //Ocualto el loader
	              setTimeout(ocultarLoader, 2000);
	              //Recargo la tabla
	              $('#dataTable_listadoUsuarios').DataTable().ajax.reload();
	              //Habilito los tooltips
	              $('[data-toggle="tooltip"]').tooltip({
	                  trigger : 'hover'
	                 });
	            })
	        }
	      },
	      cancelar: {
	        text: 'No',
	        btnClass: 'btn-red'
	      }
	    }
	  });
}

//>Registrar Asistencia   u: id_usuario, e: id_evento
function regAsistencia(u,e){

	var url = "jquery.php";
	var data = ("&recibePOST=registrarAsistencia&id_usuario="+u+"&id_evento="+e);
	$.post(url, data, function(result){
	  	  //Muestro el loader
	      mostrarLoader();
	    })
	    //La consulta se ejecuto con exito
	    .done(function(data, textStatus, jqXHR) {
	      //Ocualto el loader
	      setTimeout(ocultarLoader, 2000);
	      $.alert('Asistencia registrada');
	      //Recargo la tabla
	      $('#dataTable_listadoUsuarios').DataTable().ajax.reload();
	      //Habilito los tooltips
	      $('[data-toggle="tooltip"]').tooltip({
	          trigger : 'hover'
	         });
	})
}

function guardarAsistencias(id_evento){
	$.post( "jquery.php", { "id_evento":id_evento, "recibePOST":"guardarAsistencias" })
    
    .done(function( data, textStatus, jqXHR ) {
        if ( console && console.log ) {
          console.log( "La solicitud se ha completado correctamente." );
        }
    })

    .fail(function( jqXHR, textStatus, errorThrown ) {
        if ( console && console.log ) {
            console.log( "La solicitud a fallado: " +  textStatus);
        }
  	});
}

function checkAsistencia(id_evento){
	var actual = 0;
	var nuevas = 0;
	
	$.post( "jquery.php", { "id_evento":id_evento, "recibePOST":"checkAsistencia" }, "json")
    
    .done(function( data, textStatus, jqXHR ) {
    	actual = data.data.actual;
    	nuevas = data.data.nuevas;
    	
    	if (actual < nuevas) {
    		$("#alertamens").fadeIn();
    		return true;
    	}else{
    		return false;
    	}
    	

        if ( console && console.log ) {
          // console.log( "La solicitud se ha completado correctamente." );
          return true;
        }
    })

    .fail(function( jqXHR, textStatus, errorThrown ) {
        if ( console && console.log ) {
            console.log( "La solicitud a fallado: " +  textStatus);
        }
  	});
}


//Botones de exportacion
//Imprimir
$('#btn-exp-imp').on( 'click', function () {
    $(".btn-imp").trigger("click");
});

//Excel
$('#btn-exp-excel').on( 'click', function () {
    $(".btn-excel").trigger("click");
});

//Pdf
$('#btn-exp-pdf').on( 'click', function () {
    $(".btn-pdf").trigger( "click" );
});

//Cerrar mensaje
$('#btn-close-alertamens').on( 'click', function () {
    $("#alertamens").fadeOut();
    guardarAsistencias('1');
    //Recargo la tabla
    $('#dataTable_listadoUsuarios').DataTable().ajax.reload();
});

</script>