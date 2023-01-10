<!-- ********************** FOOTER - INICIO **************************** -->
					<!--begin::Footer-->
					<div class="footer bg-white py-4 d-flex flex-lg-column" id="kt_footer">
						<!--begin::Container-->
						<div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
							<!--begin::Copyright-->
							<div class="text-dark order-2 order-md-1">
								<span class="text-muted font-weight-bold mr-2">2023©</span>
								<a href="http://www.natumedia.com" target="_blank" class="text-dark-75 text-hover-primary">REP</a>
							</div>
							<!--end::Copyright-->
							<!--begin::Nav-->
							<div class="nav nav-dark">
							</div>
							<!--end::Nav-->
						</div>
						<!--end::Container-->
					</div>
					<!--end::Footer-->

				</div>
				<!--end::Wrapper-->

			</div>
			<!--end::Page-->
		</div>
		<!--end::Main-->

		<!-- begin::User Panel-->
		<div id="kt_quick_user" class="offcanvas offcanvas-right p-10">
			<!--begin::Header-->
			<div class="offcanvas-header d-flex align-items-center justify-content-between pb-5">
				<h3 class="font-weight-bold m-0">
				<!-- <small class="text-muted font-size-sm ml-2">12 messages - PHP</small></h3> -->
				<a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_user_close">
					<i class="ki ki-close icon-xs text-muted"></i>
				</a>
			<?php if($cod_grupo == "10001" || $cod_grupo == "10002" || $cod_grupo == "10003" || $cod_grupo == "10005" || $cod_grupo == "10006" || $cod_grupo == "10007" || $cod_grupo == "10008" || $cod_grupo == "10009" ){ ?>
				<a href="#!" class="btn btn-light-primary btn-sm" data-toggle="modal" data-target="#ModalCambiarPass">Cambiar contraseña</a>
			<?php } ?>
			</div>
			<!--end::Header-->
			<!--begin::Content-->
			<div class="offcanvas-content pr-5 mr-n5">
				<!--begin::Header-->
				<div class="d-flex align-items-center mt-5">
					<!-- div class="symbol symbol-100 mr-5">
						<div class="symbol-label" style="background-image:url('assets/media/users/300_21.jpg')"></div>
						<i class="symbol-badge bg-success"></i>
					</div -->
					<div class="d-flex flex-column">
						<a href="#" class="font-weight-bold font-size-h5 text-dark-75 text-hover-primary"><?php echo "$usua_nombre"; ?></a>
						<!-- div class="text-muted mt-1"><?php echo "$usua_ngrupo"; ?></div -->
						<div class="navi mt-2">
							<a href="#" class="navi-item">
								<span class="navi-link p-0 pb-2">
									<span class="navi-icon mr-1">
										<span class="svg-icon svg-icon-lg svg-icon-primary">
											<!--begin::Svg Icon 
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24" />
													<path d="M21,12.0829584 C20.6747915,12.0283988 20.3407122,12 20,12 C16.6862915,12 14,14.6862915 14,18 C14,18.3407122 14.0283988,18.6747915 14.0829584,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,12.0829584 Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,7.83964668 C5.4908718,7.6432681 5.03602525,7.77972206 4.83964668,8.14442513 C4.6432681,8.5091282 4.77972206,8.96397475 5.14442513,9.16035332 L11.6444251,12.6603533 C11.8664074,12.7798822 12.1335926,12.7798822 12.3555749,12.6603533 L18.8555749,9.16035332 C19.2202779,8.96397475 19.3567319,8.5091282 19.1603533,8.14442513 C18.9639747,7.77972206 18.5091282,7.6432681 18.1444251,7.83964668 Z" fill="#000000" />
													<circle fill="#000000" opacity="0.3" cx="19.5" cy="17.5" r="2.5" />
												</g>
											</svg>
											end::Svg Icon-->
										</span>
									</span>
									<!-- <span class="navi-text text-muted text-hover-primary">secretaria@rep.com</span> -->
								</span>
							</a>
							<a href="<?php echo $logoutAction ?>" class="btn btn-sm btn-light-primary font-weight-bolder py-2 px-5">Cerrar sesión</a>
						</div>
					</div>
				</div>
				<!--end::Header-->
			</div>
			<!--end::Content-->
		</div>
		<!-- end::User Panel-->

		<!--begin::Scrolltop-->
		<div id="kt_scrolltop" class="scrolltop">
			<span class="svg-icon">
				<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Up-2.svg-->
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
					<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
						<polygon points="0 0 24 0 24 24 0 24" />
						<rect fill="#000000" opacity="0.3" x="11" y="10" width="2" height="10" rx="1" />
						<path d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z" fill="#000000" fill-rule="nonzero" />
					</g>
				</svg>
				<!--end::Svg Icon-->
			</span>
		</div>
		<!--end::Scrolltop-->

		<script>var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";</script>
		<!--begin::Global Config(global config for global JS scripts)-->
		<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1400 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#3699FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#E4E6EF", "dark": "#181C32" }, "light": { "white": "#ffffff", "primary": "#E1F0FF", "secondary": "#EBEDF3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#3F4254", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#EBEDF3", "gray-300": "#E4E6EF", "gray-400": "#D1D3E0", "gray-500": "#B5B5C3", "gray-600": "#7E8299", "gray-700": "#5E6278", "gray-800": "#3F4254", "gray-900": "#181C32" } }, "font-family": "Poppins" };</script>
		<!--end::Global Config-->
		<!--begin::Global Theme Bundle(used by all pages)-->
		<script src="assets/plugins/global/plugins.bundle.js"></script>
		<script src="assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
		<script src="assets/js/scripts.bundle.js"></script>
		<!--end::Global Theme Bundle-->
		<!--begin::Page Vendors(used by this page)-->
		<script src="assets/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
		<script src="//maps.google.com/maps/api/js?key=AIzaSyBTGnKT7dt597vo9QgeQ7BFhvSRP4eiMSM"></script>
		<script src="assets/plugins/custom/gmaps/gmaps.js"></script>
		<!--end::Page Vendors-->
		<!--begin::Page Scripts(used by this page)-->
		<script src="assets/js/pages/widgets.js"></script>
		<!--end::Page Scripts-->

		<!-- Toastr Notificaciones -->
		<script src="assets/plugins/custom/toastr/toastr.min.js"></script>

		<!-- Jquery Confirm -->
		<script src="assets/plugins/custom/confirm/jquery-confirm.js"></script>

		<!--SweetAlert-->
		<script src="assets/js/pages/features/miscellaneous/sweetalert2.js"></script>

		<!-- HighCarts -->
		<script src="assets/js/pages/features/charts/highcharts/highcharts.js"></script>
		<script src="assets/js/pages/features/charts/highcharts/modules/data.js"></script>
		<script src="assets/js/pages/features/charts/highcharts/modules/exporting.js"></script>
		<script src="assets/js/pages/features/charts/highcharts/modules/accessibility.js"></script>

		<script type="text/javascript">
			toastr.options = {
			  "positionClass": "toast-bottom-center",
			  "progressBar": true,
			  "closeButton": true,
			  "showDuration": "300",
			  "hideDuration": "1000",
			  "timeOut": "3000",
			};
		</script>

		<!--PushJs
		
			<script src="assets/js/firebase-app.js"></script>
			<script src="assets/js/firebase-messaging.js"></script>
			<script src="assets/js/push.min.js"></script>
		
			<script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
			<script>
			  window.OneSignal = window.OneSignal || [];
			  OneSignal.push(function() {
			    OneSignal.init({
			      appId: "2ab805a2-db6c-4cb0-a8dd-087195cee2e3",
			    });
			  });
			</script>
		
		-->
		
		<?php if($menu == "panel" || $menu == "propectos" || $submenu == "usuariosistema" || $submenu == "listaperiodos" || $menu == "financiamiento" ){ ?>
			<!--begin::Page Vendors(used by this page)-->
			<script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>
			<!--end::Page Vendors-->
			<!--begin::Page Scripts(used by this page)-->
			<script src="assets/js/pages/crud/datatables/basic/basic.js"></script>
			<!-- Scroll Datatables extensions -->
			<script src="assets/js/pages/crud/datatables/extensions/fixedcolumns.js"></script>
			<script src="assets/js/pages/crud/datatables/extensions/scroller.js"></script>
			<!--end::Page Scripts-->
		<?php } ?>

		<?php if($cod_grupo == "10010"){ ?>
			<!-- FINANCIAMIENTO, USUARIO COOPERATIVA -->
			<!--begin::Page Vendors(used by this page)-->
			<script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>
			<!--end::Page Vendors-->
			<!--begin::Page Scripts(used by this page)-->
			<script src="assets/js/pages/crud/datatables/basic/basic.js"></script>
			<!-- Scroll Datatables extensions -->
			<script src="assets/js/pages/crud/datatables/extensions/fixedcolumns.js"></script>
			<script src="assets/js/pages/crud/datatables/extensions/scroller.js"></script>
			<script src="assets/js/solicitudesfinanciamiento.js?ver1.0"></script>
		<?php } ?>

		<!-- Prototype 
		<script src="assets/js/prototype.js"></script> -->

		<!-- Funciones creadas para esta App -->
		<script src="assets/js/funciones.js?ver1.19"></script>
		

		<!--Ventanas Modals -->
		<?php include_once('modals.php'); ?>


	</body>
	<!--end::Body-->
</html>
<!-- ********************** FOOTER - FIN **************************** -->