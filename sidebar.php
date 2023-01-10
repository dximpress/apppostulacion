<?php 
	$menu 	 = isset($_GET["menu"])    ? $_GET["menu"] : ""; 	// Clase CSS    	menu-item-open
	$submenu = isset($_GET["submenu"]) ? $_GET["submenu"] : ""; // Clase CSS 		menu-item-active
?>
<!-- ********************** SIDEBAR - INICIO **************************** -->
<!--begin::Aside-->
<div class="aside aside-left aside-fixed d-flex flex-column flex-row-auto" id="kt_aside">
<!--begin::Brand-->
<div class="brand flex-column-auto" id="kt_brand">
	<!--begin::Logo-->
	<a href="panel.php" class="brand-logo">
		<!--<img alt="Logo" src="assets/media/logos/logo-default-inverse.png" width="100px" />-->
		<img alt="Logo" src="assets/media/logos/logo-redp-II.png" width="100px" /> 
	</a>
	<!--end::Logo-->
	<!--begin::Toggle-->
	<button class="brand-toggle btn btn-sm px-0" id="kt_aside_toggle">
		<span class="svg-icon svg-icon svg-icon-xl">
			<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Angle-double-left.svg-->
			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
				<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
					<polygon points="0 0 24 0 24 24 0 24" />
					<path d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z" fill="#000000" fill-rule="nonzero" transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999)" />
					<path d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999)" />
				</g>
			</svg>
			<!--end::Svg Icon-->
		</span>
	</button>
	<!--end::Toolbar-->
</div>
<!--end::Brand-->
<!--begin::Aside Menu-->
<div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
	<!--begin::Menu Container-->
	<div id="kt_aside_menu" class="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1" data-menu-dropdown-timeout="500">
		<!--begin::Menu Nav-->
		<ul class="menu-nav">
			
			<li class="menu-section">
				<h4 class="menu-text">MENÚ</h4>
				<i class="menu-icon ki ki-bold-more-hor icon-md"></i>
			</li>

			<?php if($cod_grupo == "10001" || $cod_grupo == "10002" || $cod_grupo == "10003" || $cod_grupo == "10005" || $cod_grupo == "10006" || $cod_grupo == "10007" || $cod_grupo == "10008" || $cod_grupo == "10009" ){ ?>
				<li class="menu-item <?php if($menu=="propectos"){echo "menu-item-active";} ?>" aria-haspopup="true">
					<a href="listado-prospectos.php?menu=propectos" class="menu-link">
						<span class="svg-icon menu-icon">
							<!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
								<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
							        <rect x="0" y="0" width="24" height="24"/>
							        <path d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z" fill="#000000" opacity="0.3"/>
							        <path d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z" fill="#000000"/>
							        <rect fill="#000000" opacity="0.3" x="7" y="10" width="5" height="2" rx="1"/>
							        <rect fill="#000000" opacity="0.3" x="7" y="14" width="9" height="2" rx="1"/>
							    </g>
							</svg>
							<!--end::Svg Icon-->
						</span>
						<span class="menu-text">Listado de prospectos</span>
					</a>
				</li>

				<li class="menu-item <?php if($menu=="calendario"){echo "menu-item-active";} ?>" aria-haspopup="true">
					<a href="calendario-reuniones.php?menu=calendario" class="menu-link">
						<span class="svg-icon menu-icon">
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
								<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
							        <rect x="0" y="0" width="24" height="24"/>
							        <rect fill="#000000" opacity="0.3" x="4" y="4" width="4" height="4" rx="2"/>
							        <rect fill="#000000" x="4" y="10" width="4" height="4" rx="2"/>
							        <rect fill="#000000" x="10" y="4" width="4" height="4" rx="2"/>
							        <rect fill="#000000" x="10" y="10" width="4" height="4" rx="2"/>
							        <rect fill="#000000" x="16" y="4" width="4" height="4" rx="2"/>
							        <rect fill="#000000" x="16" y="10" width="4" height="4" rx="2"/>
							        <rect fill="#000000" x="4" y="16" width="4" height="4" rx="2"/>
							        <rect fill="#000000" x="10" y="16" width="4" height="4" rx="2"/>
							        <rect fill="#000000" x="16" y="16" width="4" height="4" rx="2"/>
							    </g>
							</svg>
						</span>
						<span class="menu-text">Calendario de reuniones</span>
					</a>
				</li>

				<li class="menu-item <?php if($menu=="financiamiento"){echo "menu-item-active";} ?>" aria-haspopup="true">
					<a href="solicitudes-financiamiento.php?menu=financiamiento" class="menu-link">
						<span class="svg-icon menu-icon">
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
								<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
							        <rect x="0" y="0" width="24" height="24"/>
							        <rect fill="#000000" opacity="0.3" x="11.5" y="2" width="2" height="4" rx="1"/>
							        <rect fill="#000000" opacity="0.3" x="11.5" y="16" width="2" height="5" rx="1"/>
							        <path d="M15.493,8.044 C15.2143319,7.68933156 14.8501689,7.40750104 14.4005,7.1985 C13.9508311,6.98949895 13.5170021,6.885 13.099,6.885 C12.8836656,6.885 12.6651678,6.90399981 12.4435,6.942 C12.2218322,6.98000019 12.0223342,7.05283279 11.845,7.1605 C11.6676658,7.2681672 11.5188339,7.40749914 11.3985,7.5785 C11.2781661,7.74950085 11.218,7.96799867 11.218,8.234 C11.218,8.46200114 11.2654995,8.65199924 11.3605,8.804 C11.4555005,8.95600076 11.5948324,9.08899943 11.7785,9.203 C11.9621676,9.31700057 12.1806654,9.42149952 12.434,9.5165 C12.6873346,9.61150047 12.9723317,9.70966616 13.289,9.811 C13.7450023,9.96300076 14.2199975,10.1308324 14.714,10.3145 C15.2080025,10.4981676 15.6576646,10.7419985 16.063,11.046 C16.4683354,11.3500015 16.8039987,11.7268311 17.07,12.1765 C17.3360013,12.6261689 17.469,13.1866633 17.469,13.858 C17.469,14.6306705 17.3265014,15.2988305 17.0415,15.8625 C16.7564986,16.4261695 16.3733357,16.8916648 15.892,17.259 C15.4106643,17.6263352 14.8596698,17.8986658 14.239,18.076 C13.6183302,18.2533342 12.97867,18.342 12.32,18.342 C11.3573285,18.342 10.4263378,18.1741683 9.527,17.8385 C8.62766217,17.5028317 7.88033631,17.0246698 7.285,16.404 L9.413,14.238 C9.74233498,14.6433354 10.176164,14.9821653 10.7145,15.2545 C11.252836,15.5268347 11.7879973,15.663 12.32,15.663 C12.5606679,15.663 12.7949989,15.6376669 13.023,15.587 C13.2510011,15.5363331 13.4504991,15.4540006 13.6215,15.34 C13.7925009,15.2259994 13.9286662,15.0740009 14.03,14.884 C14.1313338,14.693999 14.182,14.4660013 14.182,14.2 C14.182,13.9466654 14.1186673,13.7313342 13.992,13.554 C13.8653327,13.3766658 13.6848345,13.2151674 13.4505,13.0695 C13.2161655,12.9238326 12.9248351,12.7908339 12.5765,12.6705 C12.2281649,12.5501661 11.8323355,12.420334 11.389,12.281 C10.9583312,12.141666 10.5371687,11.9770009 10.1255,11.787 C9.71383127,11.596999 9.34650161,11.3531682 9.0235,11.0555 C8.70049838,10.7578318 8.44083431,10.3968355 8.2445,9.9725 C8.04816568,9.54816454 7.95,9.03200304 7.95,8.424 C7.95,7.67666293 8.10199848,7.03700266 8.406,6.505 C8.71000152,5.97299734 9.10899753,5.53600171 9.603,5.194 C10.0970025,4.85199829 10.6543302,4.60183412 11.275,4.4435 C11.8956698,4.28516587 12.5226635,4.206 13.156,4.206 C13.9160038,4.206 14.6918294,4.34533194 15.4835,4.624 C16.2751706,4.90266806 16.9686637,5.31433061 17.564,5.859 L15.493,8.044 Z" fill="#000000"/>
							    </g>
							</svg>
						</span>
						<span class="menu-text">Financiamiento</span>
					</a>
				</li>

				<?php if($cod_grupo == "10001-1111"){ ?>
					<li class="menu-item <?php if($menu=="estadisticas"){echo "menu-item-active";} ?>" aria-haspopup="true">
						<a href="listado-estadisticas.php?menu=estadisticas" class="menu-link">
							<span class="svg-icon menu-icon">
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
								        <rect x="0" y="0" width="24" height="24"/>
								        <rect fill="#000000" opacity="0.3" x="13" y="4" width="3" height="16" rx="1.5"/>
								        <rect fill="#000000" x="8" y="9" width="3" height="11" rx="1.5"/>
								        <rect fill="#000000" x="18" y="11" width="3" height="9" rx="1.5"/>
								        <rect fill="#000000" x="3" y="13" width="3" height="7" rx="1.5"/>
								    </g>
								</svg>
							</span>
							<span class="menu-text">Estadísticas</span>
						</a>
					</li>
				<?php } ?>

			<?php } ?>

			<?php if($cod_grupo == "10004" ){ ?>
				<li class="menu-item <?php if($menu=="panel"){echo "menu-item-active";} ?>" aria-haspopup="true">
					<a href="panel.php?menu=panel" class="menu-link">
						<span class="svg-icon menu-icon">
							<!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
								<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
							        <rect x="0" y="0" width="24" height="24"/>
							        <path d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z" fill="#000000" opacity="0.3"/>
							        <path d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z" fill="#000000"/>
							        <rect fill="#000000" opacity="0.3" x="7" y="10" width="5" height="2" rx="1"/>
							        <rect fill="#000000" opacity="0.3" x="7" y="14" width="9" height="2" rx="1"/>
							    </g>
							</svg>
							<!--end::Svg Icon-->
						</span>
						<span class="menu-text">Inicio</span>
					</a>
				</li>

				<li class="menu-item <?php if($menu=="estadopostulacion"){echo "menu-item-active";} ?>" aria-haspopup="true" style="display: none;">
					<a href="estado-postulacion.php?menu=estadopostulacion" class="menu-link">
						<span class="svg-icon menu-icon">
							<!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
								<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
							        <rect x="0" y="0" width="24" height="24"/>
							        <path d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z" fill="#000000" opacity="0.3"/>
							        <path d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z" fill="#000000"/>
							        <rect fill="#000000" opacity="0.3" x="7" y="10" width="5" height="2" rx="1"/>
							        <rect fill="#000000" opacity="0.3" x="7" y="14" width="9" height="2" rx="1"/>
							    </g>
							</svg>
							<!--end::Svg Icon-->
						</span>
						<span class="menu-text">Estado de la postulación</span>
					</a>
				</li>

				
			<?php } ?>


<?php if($cod_grupo == "10001" || $cod_grupo == "10002" || $cod_grupo == "10003" || $cod_grupo == "10007" ){ ?>
	<!-- MENU CONFIGURACIÓN -->
	<li class="menu-item menu-item-submenu <?php if($menu=="config"){echo "menu-item-open";} ?>" aria-haspopup="true" data-menu-toggle="hover">
		<a href="javascript:;" class="menu-link menu-toggle">
			<span class="svg-icon menu-icon">
				<!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg-->
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
					<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
				        <rect x="0" y="0" width="24" height="24"/>
				        <path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z" fill="#000000"/>
				        <path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z" fill="#000000" opacity="0.3"/>
				    </g>
				</svg>
				<!--end::Svg Icon-->
			</span>
			<span class="menu-text">CONFIGURACIÓN</span>
			<i class="menu-arrow"></i>
		</a>
		<div class="menu-submenu">
			<i class="menu-arrow"></i>
			<ul class="menu-subnav">
			
			
				<li class="menu-item <?php if($submenu=="listaperiodos"){echo "menu-item-active";} ?>" aria-haspopup="true" data-menu-toggle="hover">
					<a href="listado-periodo-configuracion.php?menu=config&submenu=listaperiodos" class="menu-link menu-toggle">
						<i class="menu-bullet menu-bullet-line">
							<span></span>
						</i>
						<span class="menu-text">Programas</span>
					</a>
				</li>
			
			
				<li class="menu-item <?php if($submenu=="usuariosistema"){echo "menu-item-active";} ?>" aria-haspopup="true" data-menu-toggle="hover">
					<a href="usuarios.php?menu=config&submenu=usuariosistema" data-href="usuarios.php?menu=config&submenu=usuariosistema" class="menu-link menu-toggle submenu">
						<i class="menu-bullet menu-bullet-line">
							<span></span>
						</i>
						<span class="menu-text">Usuarios sistema</span>
					</a>
				</li>						
			


			</ul>
		</div>
	</li>
<?php } ?>

		</ul>
		<!--end::Menu Nav-->
	</div>
	<!--end::Menu Container-->
</div>
<!--end::Aside Menu-->
</div>
<!--end::Aside-->
<!-- ********************** SIDEBAR - FIN **************************** -->