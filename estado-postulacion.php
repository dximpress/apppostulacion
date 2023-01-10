	<?php 
	//HEADER
	include_once('header.php'); 

	//HEADER MOVIL
	include_once('header-movil.php');

	//SIDEBAR
	include_once('sidebar.php');

	//MENU TOP
	include_once('menu-top.php');

?>


<!-- ********************** CONTENIDO - INICIO **************************** -->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">

<!--begin::Entry-->
<div class="d-flex flex-column-fluid">
	<!--begin::Container-->
	<div class="container">
		<!--begin::Dashboard-->
		<!--begin::Row-->
		<div class="row">
		<?php if($cod_grupo == "10001" || $cod_grupo == "10002"){ ?>
			<!-- Administradores y Super Administrador -->
			<div class="col-lg-12 col-xxl-12">
				<!--begin::List Widget 9-->
				<div class="card card-custom card-stretch gutter-b">
					<!--begin::Header-->
					<div class="card-header align-items-center border-0 mt-4">
						<h3 class="card-title align-items-start flex-column">
							<span class="font-weight-bolder text-dark">Administrador</span>
							<span class="text-muted mt-3 font-weight-bold font-size-sm">
								Sistema Web para postulaciones
							</span>
						</h3>
					</div>
					<!--end::Header-->
					<!--begin::Body-->
					<div class="card-body pt-4">
						...
					</div>
				</div>
		<?php } ?>

		<?php if($cod_grupo == "10004"){ ?>
			<!-- Administradores y Super Administrador -->
			<div class="col-lg-12 col-xxl-12">
				<!--begin::List Widget 9-->
				<div class="card card-custom card-stretch gutter-b">
					<!--begin::Header-->
					<div class="card-header align-items-center border-0 mt-4">
						<h3 class="card-title align-items-start flex-column">
							<span class="font-weight-bolder text-dark">Estado de la postulación</span>
							<!-- span class="text-muted mt-3 font-weight-bold font-size-sm">
								Seleccione un programa para postular
							</span -->
						</h3>
					</div>
					<!--end::Header-->
					<!--begin::Body-->
					<div class="card-body pt-4">
						...
					</div>
				</div>
		<?php } ?>


		</div>
		<!--end::Row-->
		<!--end::Dashboard-->
	</div>
	<!--end::Container-->
</div>
<!--end::Entry-->
</div>
<!-- ********************** CONTENIDO - FIN **************************** -->


<?php 
	include_once('footer.php');
?>
