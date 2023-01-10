<?php 
	//Codigo PHP
?>

<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head><base href="">
		<meta charset="utf-8" />
		<title>Formulario Condominios</title>
		<meta name="description" content="Wizard examples" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<link rel="canonical" href="https://keenthemes.com/metronic" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Page Custom Styles(used by this page)-->
		<link href="assets/css/pages/wizard/wizard-2.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/custom.css" rel="stylesheet" type="text/css" />
		<!--end::Page Custom Styles-->
		<!--begin::Global Theme Styles(used by all pages)-->
		<link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Global Theme Styles-->
		<!--begin::Layout Themes(used by all pages)-->
		<link href="assets/css/themes/layout/header/base/light.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/themes/layout/header/menu/light.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/themes/layout/brand/dark.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/themes/layout/aside/dark.css" rel="stylesheet" type="text/css" />

		<!-- FileUploads CSS -->
		<!-- blueimp Gallery styles -->
	    <link rel="stylesheet" href="fileupload/css/blueimp-gallery.min.css" />
	    <!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
	    <link rel="stylesheet" href="fileupload/css/jquery.fileupload.css" />
	    <link rel="stylesheet" href="fileupload/css/jquery.fileupload-ui.css" />
	    <!-- CSS adjustments for browsers with JavaScript disabled -->
	    <noscript><link rel="stylesheet" href="fileupload/css/jquery.fileupload-noscript.css"/></noscript>
	    <noscript><link rel="stylesheet" href="fileupload/css/jquery.fileupload-ui-noscript.css"/></noscript>
		<!--end::Layout Themes-->
		<link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
		<style>
	      #navigation {
	        margin: 10px 0;
	      }
	      @media (max-width: 767px) {
	        #title,
	        #description {
	          display: none;
	        }
	      }
	      .fade:not(.show) {
	        opacity: 1;
	      }
	    </style>
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-mobile-fixed page-loading">
		<!--begin::Main-->
		<!--begin::Header Mobile-->
		<div id="kt_header_mobile" class="header-mobile align-items-center header-mobile-fixed">
			<!--begin::Logo-->
			<a href="index.html">
				<img alt="Logo" src="assets/media/logos/logo-light.png" />
			</a>
			<!--end::Logo-->
			<!--begin::Toolbar-->
			<div class="d-flex align-items-center">
				<!--begin::Aside Mobile Toggle-->
				<button class="btn p-0 burger-icon burger-icon-left" id="kt_aside_mobile_toggle">
					<span></span>
				</button>
				<!--end::Aside Mobile Toggle-->
				<!--begin::Header Menu Mobile Toggle-->
				<button class="btn p-0 burger-icon ml-4" id="kt_header_mobile_toggle">
					<span></span>
				</button>
				<!--end::Header Menu Mobile Toggle-->
				<!--begin::Topbar Mobile Toggle-->
				<button class="btn btn-hover-text-primary p-0 ml-2" id="kt_header_mobile_topbar_toggle">
					<span class="svg-icon svg-icon-xl">
						<!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg-->
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
							<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
								<polygon points="0 0 24 0 24 24 0 24" />
								<path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
								<path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
							</g>
						</svg>
						<!--end::Svg Icon-->
					</span>
				</button>
				<!--end::Topbar Mobile Toggle-->
			</div>
			<!--end::Toolbar-->
		</div>
		<!--end::Header Mobile-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="d-flex flex-row flex-column-fluid page">
				
				<!--begin::Aside-->
				<!--end::Aside-->

				<!--begin::Wrapper-->
				<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
					<!--begin::Header-->
					<div id="kt_header" class="header header-fixed">
						<!--begin::Container-->
						<div class="container-fluid d-flex align-items-stretch justify-content-between">
							<!--begin::Header Menu Wrapper-->
							<div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
								<!--begin::Header Menu-->
								<div id="kt_header_menu" class="header-menu header-menu-mobile header-menu-layout-default">
									<!--begin::Header Nav-->
									<ul class="menu-nav">
										<li class="menu-item menu-item-submenu menu-item-rel menu-item-active" data-menu-toggle="click" aria-haspopup="true">
											<h2>Ficha de inscripción</h2>
										</li>

									</ul>
									<!--end::Header Nav-->
								</div>
								<!--end::Header Menu-->
							</div>
							<!--end::Header Menu Wrapper-->
							<!--begin::Topbar-->

							<!--end::Topbar-->
						</div>
						<!--end::Container-->
					</div>
					<!--end::Header-->
					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						
						<!--begin::Subheader-->
						<!--end::Subheader-->

						<!--begin::Entry-->
						<div class="d-flex flex-column-fluid">
							<!--begin::Container-->
							<div class="container">
								<div class="card card-custom">
									<div class="card-body p-0">
										<!--begin: Wizard-->
										<div class="wizard wizard-2" id="kt_wizard" data-wizard-state="step-first" data-wizard-clickable="false">
											<!--begin: Wizard Nav-->
											<div class="wizard-nav border-right py-8 px-8 py-lg-20 px-lg-10">
												<!--begin::Wizard Step 1 Nav-->
												<div class="wizard-steps">
													<div class="wizard-step" data-wizard-type="step" data-wizard-state="current">
														<div class="wizard-wrapper">
															<div class="wizard-icon">
																<span class="svg-icon svg-icon-2x">
																	<!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg-->
																	<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																		<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																			<polygon points="0 0 24 0 24 24 0 24" />
																			<path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
																			<path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
																		</g>
																	</svg>
																	<!--end::Svg Icon-->
																</span>
															</div>
															<div class="wizard-label">
																<h3 class="wizard-title">Intro</h3>
																<div class="wizard-desc">Bases del concurso.</div>
															</div>
														</div>
													</div>
													<!--end::Wizard Step 1 Nav-->

													<!--begin::Wizard Step 2 Nav-->
													<div class="wizard-step" data-wizard-type="step">
														<div class="wizard-wrapper">
															<div class="wizard-icon">
																<span class="svg-icon svg-icon-2x">
																	<!--begin::Svg Icon | path:assets/media/svg/icons/Map/Compass.svg-->
																	<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																		<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																			<rect x="0" y="0" width="24" height="24" />
																			<path d="M12,21 C7.02943725,21 3,16.9705627 3,12 C3,7.02943725 7.02943725,3 12,3 C16.9705627,3 21,7.02943725 21,12 C21,16.9705627 16.9705627,21 12,21 Z M14.1654881,7.35483745 L9.61055177,10.3622525 C9.47921741,10.4489666 9.39637436,10.592455 9.38694497,10.7495509 L9.05991526,16.197949 C9.04337012,16.4735952 9.25341309,16.7104632 9.52905936,16.7270083 C9.63705011,16.7334903 9.74423017,16.7047714 9.83451193,16.6451626 L14.3894482,13.6377475 C14.5207826,13.5510334 14.6036256,13.407545 14.613055,13.2504491 L14.9400847,7.80205104 C14.9566299,7.52640477 14.7465869,7.28953682 14.4709406,7.27299168 C14.3629499,7.26650974 14.2557698,7.29522855 14.1654881,7.35483745 Z" fill="#000000" />
																		</g>
																	</svg>
																	<!--end::Svg Icon-->
																</span>
															</div>
															<div class="wizard-label">
																<h3 class="wizard-title">Información del condominio</h3>
																<div class="wizard-desc">En esta sección deberás incluir la información relativa a tu condominio o urbanización.</div>
															</div>
														</div>
													</div>
													<!--end::Wizard Step 2 Nav-->

													<!--begin::Wizard Step 3 Nav-->
													<div class="wizard-step" data-wizard-type="step">
														<div class="wizard-wrapper">
															<div class="wizard-icon">
																<span class="svg-icon svg-icon-2x">
																	<!--begin::Svg Icon | path:assets/media/svg/icons/General/Thunder-move.svg-->
																	<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																		<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																			<rect x="0" y="0" width="24" height="24" />
																			<path d="M16.3740377,19.9389434 L22.2226499,11.1660251 C22.4524142,10.8213786 22.3592838,10.3557266 22.0146373,10.1259623 C21.8914367,10.0438285 21.7466809,10 21.5986122,10 L17,10 L17,4.47708173 C17,4.06286817 16.6642136,3.72708173 16.25,3.72708173 C15.9992351,3.72708173 15.7650616,3.85240758 15.6259623,4.06105658 L9.7773501,12.8339749 C9.54758575,13.1786214 9.64071616,13.6442734 9.98536267,13.8740377 C10.1085633,13.9561715 10.2533191,14 10.4013878,14 L15,14 L15,19.5229183 C15,19.9371318 15.3357864,20.2729183 15.75,20.2729183 C16.0007649,20.2729183 16.2349384,20.1475924 16.3740377,19.9389434 Z" fill="#000000" />
																			<path d="M4.5,5 L9.5,5 C10.3284271,5 11,5.67157288 11,6.5 C11,7.32842712 10.3284271,8 9.5,8 L4.5,8 C3.67157288,8 3,7.32842712 3,6.5 C3,5.67157288 3.67157288,5 4.5,5 Z M4.5,17 L9.5,17 C10.3284271,17 11,17.6715729 11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L4.5,20 C3.67157288,20 3,19.3284271 3,18.5 C3,17.6715729 3.67157288,17 4.5,17 Z M2.5,11 L6.5,11 C7.32842712,11 8,11.6715729 8,12.5 C8,13.3284271 7.32842712,14 6.5,14 L2.5,14 C1.67157288,14 1,13.3284271 1,12.5 C1,11.6715729 1.67157288,11 2.5,11 Z" fill="#000000" opacity="0.3" />
																		</g>
																	</svg>
																	<!--end::Svg Icon-->
																</span>
															</div>
															<div class="wizard-label">
																<h3 class="wizard-title">Información del postulante</h3>
																<div class="wizard-desc">En esta sección debes ingresar la información que sea pertinente según tu caso.</div>
															</div>
														</div>
													</div>
													<!--end::Wizard Step 3 Nav-->

													<!--begin::Wizard Step 4 Nav-->
													<div class="wizard-step" data-wizard-type="step">
														<div class="wizard-wrapper">
															<div class="wizard-icon">
																<span class="svg-icon svg-icon-2x">
																	<!--begin::Svg Icon | path:assets/media/svg/icons/Map/Position.svg-->
																	<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																		<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																			<rect x="0" y="0" width="24" height="24" />
																			<path d="M19,11 L21,11 C21.5522847,11 22,11.4477153 22,12 C22,12.5522847 21.5522847,13 21,13 L19,13 C18.4477153,13 18,12.5522847 18,12 C18,11.4477153 18.4477153,11 19,11 Z M3,11 L5,11 C5.55228475,11 6,11.4477153 6,12 C6,12.5522847 5.55228475,13 5,13 L3,13 C2.44771525,13 2,12.5522847 2,12 C2,11.4477153 2.44771525,11 3,11 Z M12,2 C12.5522847,2 13,2.44771525 13,3 L13,5 C13,5.55228475 12.5522847,6 12,6 C11.4477153,6 11,5.55228475 11,5 L11,3 C11,2.44771525 11.4477153,2 12,2 Z M12,18 C12.5522847,18 13,18.4477153 13,19 L13,21 C13,21.5522847 12.5522847,22 12,22 C11.4477153,22 11,21.5522847 11,21 L11,19 C11,18.4477153 11.4477153,18 12,18 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
																			<circle fill="#000000" opacity="0.3" cx="12" cy="12" r="2" />
																			<path d="M12,17 C14.7614237,17 17,14.7614237 17,12 C17,9.23857625 14.7614237,7 12,7 C9.23857625,7 7,9.23857625 7,12 C7,14.7614237 9.23857625,17 12,17 Z M12,19 C8.13400675,19 5,15.8659932 5,12 C5,8.13400675 8.13400675,5 12,5 C15.8659932,5 19,8.13400675 19,12 C19,15.8659932 15.8659932,19 12,19 Z" fill="#000000" fill-rule="nonzero" />
																		</g>
																	</svg>
																	<!--end::Svg Icon-->
																</span>
															</div>
															<div class="wizard-label">
																<h3 class="wizard-title">Información sobre la buena práctica de tu condominio</h3>
																<div class="wizard-desc">Llena los campos solo con información que pueda ser verificada. Es importante que la descripción de la buena práctica sea concreta, breve y que responda a la categoría a la que estás postulando. </div>
															</div>
														</div>
													</div>
													<!--end::Wizard Step 4 Nav-->

													<!--begin::Wizard Step 5 Nav-->
													<div class="wizard-step" data-wizard-type="step">
														<div class="wizard-wrapper">
															<div class="wizard-icon">
																<span class="svg-icon svg-icon-2x">
																	<!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Credit-card.svg-->
																	<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																		<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																			<rect x="0" y="0" width="24" height="24" />
																			<rect fill="#000000" opacity="0.3" x="2" y="5" width="20" height="14" rx="2" />
																			<rect fill="#000000" x="2" y="8" width="20" height="3" />
																			<rect fill="#000000" opacity="0.3" x="16" y="14" width="4" height="2" rx="1" />
																		</g>
																	</svg>
																	<!--end::Svg Icon-->
																</span>
															</div>
															<div class="wizard-label">
																<h3 class="wizard-title">Destino del premio</h3>
																<div class="wizard-desc">En qué vas a destinar tu premio</div>
															</div>
														</div>
													</div>
													<!--end::Wizard Step 5 Nav-->

													<!--begin::Wizard Step 6 Nav-->
													<div class="wizard-step" data-wizard-type="step">
														<div class="wizard-wrapper">
															<div class="wizard-icon">
																<span class="svg-icon svg-icon-2x">
																	<!--begin::Svg Icon | path:assets/media/svg/icons/General/Like.svg-->
																	<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																		<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																			<rect x="0" y="0" width="24" height="24" />
																			<path d="M9,10 L9,19 L10.1525987,19.3841996 C11.3761964,19.7920655 12.6575468,20 13.9473319,20 L17.5405883,20 C18.9706314,20 20.2018758,18.990621 20.4823303,17.5883484 L21.231529,13.8423552 C21.5564648,12.217676 20.5028146,10.6372006 18.8781353,10.3122648 C18.6189212,10.260422 18.353992,10.2430672 18.0902299,10.2606513 L14.5,10.5 L14.8641964,6.49383981 C14.9326895,5.74041495 14.3774427,5.07411874 13.6240179,5.00562558 C13.5827848,5.00187712 13.5414031,5 13.5,5 L13.5,5 C12.5694044,5 11.7070439,5.48826024 11.2282564,6.28623939 L9,10 Z" fill="#000000" />
																			<rect fill="#000000" opacity="0.3" x="2" y="9" width="5" height="11" rx="1" />
																		</g>
																	</svg>
																	<!--end::Svg Icon-->
																</span>
															</div>
															<div class="wizard-label">
																<h3 class="wizard-title">Evidencias de la buena práctica</h3>
																<div class="wizard-desc">Documentos y/o archivos que respalden tu buena práctica</div>
															</div>
														</div>
													</div>
													<!--end::Wizard Step 6 Nav-->

													<!--begin::Wizard Step 7 Nav-->
													<div class="wizard-step" data-wizard-type="step">
														<div class="wizard-wrapper">
															<div class="wizard-icon">
																<span class="svg-icon svg-icon-2x">
																	<!--begin::Svg Icon | path:assets/media/svg/icons/General/Like.svg-->
																	<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																		<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																			<rect x="0" y="0" width="24" height="24" />
																			<path d="M9,10 L9,19 L10.1525987,19.3841996 C11.3761964,19.7920655 12.6575468,20 13.9473319,20 L17.5405883,20 C18.9706314,20 20.2018758,18.990621 20.4823303,17.5883484 L21.231529,13.8423552 C21.5564648,12.217676 20.5028146,10.6372006 18.8781353,10.3122648 C18.6189212,10.260422 18.353992,10.2430672 18.0902299,10.2606513 L14.5,10.5 L14.8641964,6.49383981 C14.9326895,5.74041495 14.3774427,5.07411874 13.6240179,5.00562558 C13.5827848,5.00187712 13.5414031,5 13.5,5 L13.5,5 C12.5694044,5 11.7070439,5.48826024 11.2282564,6.28623939 L9,10 Z" fill="#000000" />
																			<rect fill="#000000" opacity="0.3" x="2" y="9" width="5" height="11" rx="1" />
																		</g>
																	</svg>
																	<!--end::Svg Icon-->
																</span>
															</div>
															<div class="wizard-label">
																<h3 class="wizard-title">Gracias por participar</h3>
																<div class="wizard-desc">Sigue el desarrollo de este evento por nuestras redes sociales y en página web de Fundación Bien-Estar</div>
															</div>
														</div>
													</div>
													<!--end::Wizard Step 7 Nav-->

												</div>
											</div>
											<!--end: Wizard Nav-->
											<!--begin: Wizard Body-->
											<div class="wizard-body py-8 px-8 py-lg-20 px-lg-10">
												<!--begin: Wizard Form-->
												<div class="row">
													<div class="offset-xxl-2 col-xxl-8">
														<form class="form" id="kt_form"> <!-- INICIO DEL FORMULARIO -->
														</form>

															<!--begin: Wizard Step 1-->
															<div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">

																<form id="form1" class="formulario">

																	<!--begin::Input-->
																	<div class="form-group">
																		<div class="text-dark-50 line-height-lg">
																			<p class="fs-16 justifcado">
																				Por favor, lee detenidamente cada una de las preguntas y llena los campos con la información requerida. Al aceptar llenar este formulario, declaras conocer y estar de acuerdo con las bases de este concurso a la vez que autorizas a Fundación Bien-Estar y Mutualista Pichincha a emplear la información constante en este instrumento para fines de promoción y publicidad del evento. La información entregada no tendrá fines comerciales y será usada como fuente para la evaluación de las postulaciones y la consecuente determinación del ganador del premio. 
																			</p>
																		</div>
																	</div>
																	<!--end::Input-->
																	<!--begin::Input-->
																	<div class="form-group">
																		<p class="color-red">* Obligatorio</p>
																	</div>

																	<div class="form-group">
																		<div class="radio-list">
																			<span class="color-red">*</span>
																			<label class="radio fs-14">
																			<input type="radio" name="acepto" id="acepto" value="si" required="required">
																			<span></span>Acepto</label>
																			
																			<label class="radio fs-14">
																			<input type="radio" name="acepto" id="noacepto" value="no" required="required">
																			<span></span>No acepto</label>
																		</div>
																	</div>
																	<!--end::Input-->
																</form>

															</div>
															<!--end: Wizard Step 1-->

															<!--begin: Wizard Step 2-->
															<div class="pb-5" data-wizard-type="step-content">
																
																<form id="form2" class="fileupload" action="" method="POST" enctype="multipart/form-data" >

																	<h4 class="mb-10 font-weight-bold text-dark">Información del condominio</h4>
																	<div class="text-dark-50 line-height-lg">
																		<p class="fs-16 justifcado">
																			En esta sección deberás incluir la información relativa a tu condominio o urbanización. Cuando nos referimos a condominio hacemos mención a edificios de departamentos, conjuntos residenciales, conjuntos habitacionales, torres de oficinas y/o consultorios, y cualquier bien declarado bajo el régimen de propiedad horizontal.
																		</p>
																	</div>

																	<div class="row mt-5">
																		<div class="col-xl-12">
																			<div class="form-group">
																				<label class="fs-14">Nombre de tu condominio o urbanización <span class="color-red">*</span></label>
																				<input type="text" class="form-control form-control-lg required" name="nombrecondominio" id="nombrecondominio" placeholder="Tu respuesta" required="required" />
																			</div>
																		</div>
																	</div>

																	<div class="row">
																		<div class="col-xl-8">
																			<div class="form-group">
																				<label class="fs-14">Ciudad <span class="color-red">*</span></label>
																				<input type="text" class="form-control form-control-lg required" name="ciudad" id="ciudad" placeholder="Tu respuesta" required="required" />
																			</div>
																		</div>
																	</div>

																	<div class="row">
																		<div class="col-xl-12">
																			<div class="form-group">
																				<label class="fs-14">Dirección <span class="color-red">*</span></label>
																				<input type="text" class="form-control form-control-lg required" name="direccion" id="direccion" placeholder="Tu respuesta" required="required" />
																			</div>
																		</div>
																	</div>

																	<div class="row">
																		<div class="col-xl-12">
																			<div class="form-group mb-none">
																				<label class="fs-14">Antigüedad del condominio (años) <span class="color-red">*</span></label>
																			</div>
																		</div>
																		<div class="col-xl-3">
																			<div class="form-group">
																				<input type="text" class="form-control form-control-lg required" name="antiguedad" id="antiguedad" placeholder="Tu respuesta" onkeypress="return valida(event)" required="required" />
																			</div>
																		</div>
																	</div>

																	<div class="row">
																		<div class="col-xl-12">
																			<div class="form-group mb-none">
																				<label class="fs-14">Número de unidades exclusivas del condominio o urbanización <span class="color-red">*</span></label>
																			</div>
																		</div>

																		<div class="col-xl-3">
																			<div class="form-group mb-none">
																				<input type="text" class="form-control form-control-lg required" name="unidadescondominio" id="unidadescondominio" placeholder="Tu respuesta" onkeypress="return valida(event)" required="required" />	
																			</div>
																		</div>
																		<div class="col-xl-12">
																			<div class="form-group">
																				<span class="form-text text-muted">Señala cuántas casas, departamentos, oficinas y/o locales comerciales tiene tu condominio o urbanización.</span>
																			</div>
																		</div>
																	</div>

																	<div class="row">

																		<div class="col-xl-12">
																			<div class="form-group">
																				<div class="row fileupload-buttonbar">
																		          <div class="col-lg-12">
																		          	<label class="fs-14">Fotografía de tu condominio <span class="color-red">*</span></label>
																		          	<input type="hidden" name="archivo[]" class="archivos required">
																		          </div>
																		          <div class="col-lg-12">
																		            <!-- The fileinput-button span is used to style the file input field as button -->
																		            <span class="btn btn-primary btn-sm fileinput-button">
																		              <i class="fa fa-plus"></i>
																		              <span>AÑADIR ARCHIVOS</span>
																		              <input type="file" name="files[]" multiple />
																		            </span>
																		        
																		            <button type="button" class="btn btn-danger btn-sm delete">
																		              <i class="fa fa-trash"></i>
																		              <span>ELIMINAR SELECCIONADOS</span>
																		            </button>
																		            <!--<input type="checkbox" class="toggle" />
																		             The global file processing state -->
																		            <span class="fileupload-process"></span>
																		          </div>
																		          <!-- The global progress state -->
																		          <div class="col-lg-7 fileupload-progress fade" style="margin-top: 5px;">
																		            <!-- The global progress bar -->
																		            <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
																		              <div class="progress-bar progress-bar-success" style="width: 0%;"></div>
																		            </div>
																		            <!-- The extended global progress state -->
																		            <div class="progress-extended">&nbsp;</div>
																		          </div>
																		        </div>
																		        <!-- The table listing the files available for upload/download -->
																		        <table role="presentation" class="table table-striped" id="tabla-fotocondominio">
																		          <tbody class="files"></tbody>
																		        </table>
																		    </div>
																		</div>
																	</div>
																	
																</form>

															</div>
															<!--end: Wizard Step 2-->


															<!--begin: Wizard Step 3-->
															<div class="pb-5" data-wizard-type="step-content">

																<form id="form3" class="fileupload" action="" method="POST" enctype="multipart/form-data" >
																	<div class="form-group">
																		<h4 class="mb-10 font-weight-bold text-dark">Información del postulante de la buena práctica</h4>
																		<div class="text-dark-50 line-height-lg">
																			<p class="fs-16 justifcado">
																				El postulante de la buena práctica puede ser el representante legal del condominio (administrador o presidente) o algún condómino que tenga interés en participar en este reconocimiento. En esta sección debes ingresar la información que sea pertinente según tu caso.
																			</p>
																		</div>
																	</div>

																	<div class="form-group">
																		<div class="radio-list">
																			<label class="fs-14">¿El postulante es el representante legal (administrador o presidente)? <span class="color-red">*</span></label>
																			<input type="hidden" name="archivo[]" class="archivos required">
																			<label class="radio fs-14">
																			<input type="radio" name="replegal" class="opdradio" value="si" required="required">
																			<span></span>Si</label>
																			
																			<label class="radio fs-14">
																			<input type="radio" name="replegal" class="opdradio" value="no">
																			<span></span>No</label>
																		</div>
																	</div>

																	<div class="row">
																		<div class="col-xl-12">
																			<div class="form-group">
																				<label class="fs-14">Nombre del postulante <span class="color-red">*</span></label>
																				<input type="text" class="form-control form-control-lg required" name="postunombre" id="postunombre" placeholder="Tu respuesta" required="required" />
																			</div>
																		</div>
																	</div>

																	<div class="row">
																		<div class="col-xl-12">
																			<div class="form-group">
																				<label class="fs-14">Correo electrónico del postulante <span class="color-red">*</span></label>
																				<input type="text" class="form-control form-control-lg required" name="postucorreo" id="postucorreo" placeholder="Tu respuesta" required="required" />
																			</div>
																		</div>
																	</div>

																	<div class="row">
																		<div class="col-xl-5">
																			<div class="form-group">
																				<label class="fs-14">Teléfono del postulante <span class="color-red">*</span></label>
																				<input type="text" class="form-control form-control-lg required" name="postutelefono" id="postutelefono" placeholder="Tu respuesta" onkeypress="return valida(event)" required="required" />
																			</div>
																		</div>
																	</div>

																	<div class="row">
																		<div class="col-xl-12">
																			<div class="form-group">
																				<div class="row fileupload-buttonbar">
																		          <div class="col-lg-12">
																		          	<label class="fs-14">Adjunta el nombramiento o carta de autorización <span class="color-red">*</span></label>
																		          	<span class="form-text text-muted">Si eres el representante legal del condominio, adjunta tu nombramiento o el acta de asamblea de copropietarios en la que se te nombra como tal. Si no eres el representante legal, adjunta una resolución de directorio o asamblea (puede ser una acta) en la que se te autoriza a postular en este evento y a compartir la información del condominio.</span>
																		          	<input type="hidden" name="archivo[]" class="archivos required">
																		          </div>
																		          <div class="col-lg-12">
																		            <!-- The fileinput-button span is used to style the file input field as button -->
																		            <span class="btn btn-primary btn-sm fileinput-button">
																		              <i class="fa fa-plus"></i>
																		              <span>AÑADIR ARCHIVOS</span>
																		              <input type="file" name="files[]" multiple />
																		            </span>
																		        
																		            <button type="button" class="btn btn-danger btn-sm delete">
																		              <i class="fa fa-trash"></i>
																		              <span>ELIMINAR SELECCIONADOS</span>
																		            </button>
																		            <!-- <input type="checkbox" class="toggle" />
																		            The global file processing state -->
																		            <span class="fileupload-process"></span>
																		          </div>
																		          <!-- The global progress state -->
																		          <div class="col-lg-7 fileupload-progress fade" style="margin-top: 5px;">
																		            <!-- The global progress bar -->
																		            <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
																		              <div class="progress-bar progress-bar-success" style="width: 0%;"></div>
																		            </div>
																		            <!-- The extended global progress state -->
																		            <div class="progress-extended">&nbsp;</div>
																		          </div>
																		        </div>
																		        <!-- The table listing the files available for upload/download -->
																		        <table role="presentation" class="table table-striped" id="tabla-postuautorizacion">
																		          <tbody class="files"></tbody>
																		        </table>
																		        
																		    </div>
																		</div>
																	</div>
																</form>

															</div>
															<!--end: Wizard Step 3-->


															<!--begin: Wizard Step 4-->
															<div class="pb-5" data-wizard-type="step-content">
																
																<form id="form4" class="formulario">
																	<h4 class="mb-10 font-weight-bold text-dark">Información sobre la buena práctica de tu condominio</h4>
																	<div class="text-dark-50 line-height-lg">
																		<p class="fs-16 justifcado">
																			Llena los campos solo con información que pueda ser verificada. Es importante que la descripción de la buena práctica sea concreta, breve y que responda a la categoría a la que estás postulando.
																		</p>
																		<p class="fs-16 justifcado">
																			Recuerda que las dos categorías de esta edición son:
																		</p>
																		<p class="fs-16 justifcado">
																			- Financiera y administrativa: Prácticas relacionadas con nuevos mecanismos de financiamiento de condominio, recuperación de cartera, automatización de procesos administrativos, mantenimiento y seguridad y transparencia y rendición de cuentas.
																		</p>
																		<p class="fs-16 justifcado">
																			- Organización comunitaria y cuidado ambiental: Prácticas relacionadas con la integración vecinal, manejo de conflictos, innovación o mejoramiento de procesos democráticos, procesos de reciclaje, recuperación y/o construcción de áreas verdes y huertos urbanos, e iniciativas sobre cuidado y tenencia responsable de mascotas.
																		</p>
																	</div>

																	<div class="row mt-5">
																		<div class="col-xl-12">
																			<div class="form-group">
																				<label class="fs-14">¿Cómo se llama tu buena práctica? <span class="color-red">*</span></label>
																				<input type="text" class="form-control  form-control-lg required" name="buenapnombre" id="buenapnombre" placeholder="Tu respuesta" required="required" />
																			</div>
																		</div>
																	</div>

																	<div class="row">
																		<div class="col-xl-12">
																			<div class="form-group mb-none">
																				<label class="fs-14">¿Cuándo comenzó la implementación de la buena práctica? <span class="color-red">*</span></label>
																			</div>
																		</div>
																		<div class="col-xl-4">
																			<div class="form-group">
																				<input type="date" class="form-control form-control-lg required" name="buenapcomienzo" id="buenapcomienzo" placeholder="Tu respuesta" required="required" />
																			</div>
																		</div>
																	</div>
																	
																	<div class="row">
																		<div class="col-xl-12">
																			<div class="form-group">
																				<div class="radio-list">
																					<label class="fs-14">¿La buena práctica terminó o sigue en ejecución? <span class="color-red">*</span></label>
																					<input type="hidden" name="archivo[]" class="archivos required">
																					<label class="radio fs-14">
																					<input type="radio" name="buenapejecucion" class="opdradio" value="Terminó despúes de haber sido implementada" required="required">
																					<span></span>Terminó despúes de haber sido implementada</label>
																					
																					<label class="radio fs-14">
																					<input type="radio" name="buenapejecucion" class="opdradio" value="Sigue en ejecución, es un proceso recurrente" required="required">
																					<span></span>Sigue en ejecución, es un proceso recurrente</label>
																				</div>
																			</div>
																		</div>
																	</div>

																	<div class="row">
																		<div class="col-xl-12">
																			<div class="form-group">
																				<div class="radio-list">
																					<label class="fs-14">Categoría a la que pertenece la buena práctica de tu condominio <span class="color-red">*</span></label>
																					<input type="hidden" name="archivo[]" class="archivos required">
																					<label class="radio fs-14">
																					<input type="radio" name="buenapcategoria" class="opdradio" value="Buena práctica financiera y administrativa" required="required">
																					<span></span>Buena práctica financiera y administrativa</label>
																					
																					<label class="radio fs-14">
																					<input type="radio" name="buenapcategoria" class="opdradio" value="Buena práctica de organización comunitaria y cuidado ambiental" required="required">
																					<span></span>Buena práctica de organización comunitaria y cuidado ambiental</label>
																				</div>
																			</div>
																		</div>
																	</div>

																	<div class="row">
																		<div class="col-xl-12">
																			<div class="form-group">
																				<label class="fs-14">Describe brevemente en qué consiste tu buena práctica <span class="color-red">*</span></label>
																				<textarea class="form-control form-control-lg" name="buenapdescripcion" id="buenapdescripcion" placeholder="Tu respuesta" cols="30" rows="5" required="required"></textarea>
																			</div>
																		</div>
																	</div>

																	<div class="row">
																		<div class="col-xl-12">
																			<div class="form-group">
																				<label class="fs-14">Describe cuáles fueron los resultados de la implementación de la buena práctica <span class="color-red">*</span></label>
																				<textarea class="form-control form-control-lg required" name="buenapresultados" id="buenapresultados" placeholder="Tu respuesta" cols="30" rows="5" required="required"></textarea>
																				<span class="form-text text-muted">Detalla cómo y en qué aspectos los condóminos y los órganos de administración del condominio se beneficiaron.</span>
																			</div>
																		</div>
																	</div>

																	<div class="row">
																		<div class="col-xl-12">
																			<div class="form-group">
																				<label class="fs-14">Describe las características que hacen innovadora a tu buena práctica <span class="color-red">*</span></label>
																				<textarea class="form-control form-control-lg required" name="buenapinnova" id="buenapinnova" placeholder="Tu respuesta" cols="30" rows="5" required="required"></textarea>
																			</div>
																		</div>
																	</div>

																	<div class="row">
																		<div class="col-xl-12">
																			<div class="form-group">
																				<label class="fs-14">¿Cuáles fueron los retos más difíciles de afrontar para implementar tu buena práctica? <span class="color-red">*</span></label>
																				<textarea class="form-control form-control-lg required" name="buenapretos" id="buenapretos" placeholder="Tu respuesta" cols="30" rows="5" required="required"></textarea>
																			</div>
																		</div>
																	</div>

																	<div class="row">
																		<div class="col-xl-12">
																			<div class="form-group">
																				<div class="radio-list">
																					<label class="fs-14">¿Qué órganos del condominio participaron en la creación (idea) de tu buena práctica? <span class="color-red">*</span></label>
																					<input type="hidden" name="archivo[]" class="archivos required">

																					<label class="radio fs-14">
																					<input type="radio" name="buenaporganosidea" value="Asamblea de copropietarios" required="required">
																					<span></span>Asamblea de copropietarios</label>
																					
																					<label class="radio fs-14">
																					<input type="radio" name="buenaporganosidea" class="opdradio" value="Directiva" required="required">
																					<span></span>Directiva</label>

																					<label class="radio fs-14">
																					<input type="radio" name="buenaporganosidea" class="opdradio" value="Administración" required="required">
																					<span></span>Administración</label>

																					<label class="radio fs-14">
																					<input type="radio" name="buenaporganosidea" class="opdradio" value="Todos las anteriores" required="required">
																					<span></span>Todos las anteriores</label>
																				</div>
																			</div>
																		</div>
																	</div>

																	<div class="row">
																		<div class="col-xl-12">
																			<div class="form-group">
																				<div class="radio-list">
																					<label class="fs-14">¿Qué órganos del condominio participaron en la creación (puesta en marcha) de tu buena práctica? <span class="color-red">*</span></label>
																					<input type="hidden" name="archivo[]" class="archivos required">

																					<label class="radio fs-14">
																					<input type="radio" name="buenaporganosmarcha" class="opdradio" value="Asamblea de copropietarios" required="required">
																					<span></span>Asamblea de copropietarios</label>
																					
																					<label class="radio fs-14">
																					<input type="radio" name="buenaporganosmarcha" class="opdradio" value="Directiva" required="required">
																					<span></span>Directiva</label>

																					<label class="radio fs-14">
																					<input type="radio" name="buenaporganosmarcha" class="opdradio" value="Administración" required="required">
																					<span></span>Administración</label>

																					<label class="radio fs-14">
																					<input type="radio" name="buenaporganosmarcha" class="opdradio" value="Todos las anteriores" required="required">
																					<span></span>Todos las anteriores</label>
																				</div>
																			</div>
																		</div>
																	</div>

																	<div class="row">
																		<div class="col-xl-12">
																			<div class="form-group">
																				<label class="fs-14">¿Cómo financias la buena práctica? <span class="color-red">*</span></label>
																				<textarea  class="form-control form-control-lg required" name="buenapfinanciamiento" id="buenapfinanciamiento" placeholder="Tu respuesta" cols="30" rows="5" required="required"></textarea>
																				<span class="form-text text-muted">Describe cómo obtienes los recursos para poner en marcha la buena práctica</span>
																			</div>
																		</div>
																	</div>

																	<div class="row">
																		<div class="col-xl-12">
																			<div class="form-group">
																				<label class="fs-14">¿Crees que tu buena práctica es sostenible? ¿Por qué? <span class="color-red">*</span></label>
																				<textarea class="form-control form-control-lg required" name="buenapsostenible" id="buenapsostenible" placeholder="Tu respuesta" cols="30" rows="5" required="required"></textarea>
																				<span class="form-text text-muted">Describe cómo tu buena práctica puede mantenerse en el tiempo</span>
																			</div>
																		</div>
																	</div>

																	<div class="row">
																		<div class="col-xl-12">
																			<div class="form-group">
																				<label class="fs-14">¿Cuál fue el mayor problema que tuvo que enfrentar tu condominio para implementar la buena práctica? <span class="color-red">*</span></label>
																				<input type="text" class="form-control form-control-lg required" name="buenapproblema" id="buenapproblema" placeholder="Tu respuesta" required="required">
																			</div>
																		</div>
																	</div>

																	<div class="row">
																		<div class="col-xl-12">
																			<div class="form-group">
																				<label class="fs-14">¿Por qué crees que tu buena práctica debe ganar este premio? <span class="color-red">*</span></label>
																				<input type="text" class="form-control form-control-lg required" name="buenappremio" id="buenappremio" placeholder="Tu respuesta" required="required">
																			</div>
																		</div>
																	</div>
																</form>

															</div>
															<!--end: Wizard Step 4-->

															<!--begin: Wizard Step 5-->
															<div class="pb-5" data-wizard-type="step-content">
																
																<form id="form5" class="formulario">
																	<h4 class="mb-10 font-weight-bold text-dark">Destino del premio</h4>
																	<div class="text-dark-50 line-height-lg">
																		<p class="fs-16 justifcado">
																			En esta sección queremos conocer, si resultas ganador, en qué vas a destinar tu premio.
																		</p>
																	</div>

																	<div class="row mt-5">
																		<div class="col-xl-12">
																			<!--begin::Input-->
																			<div class="form-group">
																				<label>Si tu condominio resulta ganador de este premio, ¿en qué invertirías el dinero?</label>
																				<input type="text" class="form-control form-control-lg" name="buenapusopremio" id="buenapusopremio" placeholder="Tu respuesta">
																			</div>
																			<!--end::Input-->
																		</div>
																	</div>
																</form>

															</div>
															<!--end: Wizard Step 5-->

															<!--begin: Wizard Step 6-->
															<div class="pb-5" data-wizard-type="step-content">

																<form class="form" id="form6" class="formulario">
																	<h4 class="mb-10 font-weight-bold text-dark">Evidencias de la buena práctica</h4>
																	<div class="text-dark-50 line-height-lg">
																		<p class="fs-16 justifcado">
																			En este campo deberás incluir los documentos y/o archivos que respalden tu buena práctica. Puedes incluir fotografías, videos cortos, actas de asamblea, resoluciones de directorio o cualquier otro medio que evidencie la buena práctica y sus beneficios para tu condominio. 
																		</p>
																	</div>
																</form>

																<form id="form7" class="fileupload" action="" method="POST" enctype="multipart/form-data" >
																	<div class="col-xl-12">
																		<div class="form-group">
																			<div class="row fileupload-buttonbar">
																	          <div class="col-lg-12">
																	          	<label class="fs-14">Fotografías de la buena práctica <span class="color-red">*</span></label>
																	          	<span class="form-text text-muted">Puedes subir hasta 5 imágenes o fotografías.</span>
																	          	<input type="hidden" name="archivo[]" class="archivos required">
																	          </div>
																	          <div class="col-lg-12">
																	            <!-- The fileinput-button span is used to style the file input field as button -->
																	            <span class="btn btn-primary btn-sm fileinput-button">
																	              <i class="fa fa-plus"></i>
																	              <span>AÑADIR ARCHIVOS</span>
																	              <input type="file" name="files[]" multiple />
																	            </span>
																	        
																	            <button type="button" class="btn btn-danger btn-sm delete">
																	              <i class="fa fa-trash"></i>
																	              <span>ELIMINAR SELECCIONADOS</span>
																	            </button>
																	            <!-- <input type="checkbox" class="toggle" />
																	            The global file processing state -->
																	            <span class="fileupload-process"></span>
																	          </div>
																	          <!-- The global progress state -->
																	          <div class="col-lg-7 fileupload-progress fade" style="margin-top: 5px;">
																	            <!-- The global progress bar -->
																	            <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
																	              <div class="progress-bar progress-bar-success" style="width: 0%;"></div>
																	            </div>
																	            <!-- The extended global progress state -->
																	            <div class="progress-extended">&nbsp;</div>
																	          </div>
																	        </div>
																	        <!-- The table listing the files available for upload/download -->
																	        <table role="presentation" class="table table-striped" id="tabla-buenapfotos">
																	          <tbody class="files"></tbody>
																	        </table>
																	        
																	    </div>
																	</div>
																</form>

																<form id="form8" class="fileupload" action="" method="POST" enctype="multipart/form-data" >
																	<div class="col-xl-12">
																		<div class="form-group">
																			<div class="row fileupload-buttonbar">
																	          <div class="col-lg-12">
																	          	<label class="fs-14">Documentos adicionales <span class="color-red">*</span></label>
																	          	<span class="form-text text-muted">Si crees necesario, adjunta hasta 5 documentos (de máximo 10 MB cada uno) que evidencien la ejecución y los resultados de tu buena práctica. Los documentos pueden ser informes, actas, testimonios, notas de prensa, artículos de investigación, etc.</span>
																	          	<input type="hidden" name="archivo[]" class="archivos required">
																	          </div>
																	          <div class="col-lg-12">
																	            <!-- The fileinput-button span is used to style the file input field as button -->
																	            <span class="btn btn-primary btn-sm fileinput-button">
																	              <i class="fa fa-plus"></i>
																	              <span>AÑADIR ARCHIVOS</span>
																	              <input type="file" name="files[]" multiple />
																	            </span>
																	        <!--    
																	            <button type="submit" class="btn btn-info start">
																	              <i class="glyphicon glyphicon-upload"></i>
																	              <span>SUBIR ARCHIVOS</span>
																	            </button>
																	            
																	            <button type="reset" class="btn btn-warning cancel">
																	              <i class="glyphicon glyphicon-ban-circle"></i>
																	              <span>CANCELAR</span>
																	            </button>
																	        -->
																	            <button type="button" class="btn btn-danger btn-sm delete">
																	              <i class="fa fa-trash"></i>
																	              <span>ELIMINAR SELECCIONADOS</span>
																	            </button>
																	            <!-- <input type="checkbox" class="toggle" />
																	            The global file processing state -->
																	            <span class="fileupload-process"></span>
																	          </div>
																	          <!-- The global progress state -->
																	          <div class="col-lg-7 fileupload-progress fade" style="margin-top: 5px;">
																	            <!-- The global progress bar -->
																	            <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
																	              <div class="progress-bar progress-bar-success" style="width: 0%;"></div>
																	            </div>
																	            <!-- The extended global progress state -->
																	            <div class="progress-extended">&nbsp;</div>
																	          </div>
																	        </div>
																	        <!-- The table listing the files available for upload/download -->
																	        <table role="presentation" class="table table-striped" id="tabla-buenapdocadicionales">
																	          <tbody class="files"></tbody>
																	        </table>
																	        
																	    </div>
																	</div>
																</form>
																
																<form id="form8" class="fileupload" action="" method="POST" enctype="multipart/form-data" >
																	<div class="col-xl-12">
																		<div class="form-group">
																			<div class="row fileupload-buttonbar">
																	          <div class="col-lg-12">
																	          	<label class="fs-14">Video de la buena práctica <span class="color-red">*</span></label>
																	          	<span class="form-text text-muted">Puedes subir hasta 1 video de hasta 10 MB de tamaño y en formato MP4.</span>
																	          	<input type="hidden" name="archivo[]" class="archivos required">
																	          </div>
																	          <div class="col-lg-12">
																	            <!-- The fileinput-button span is used to style the file input field as button -->
																	            <span class="btn btn-primary btn-sm fileinput-button">
																	              <i class="fa fa-plus"></i>
																	              <span>AÑADIR ARCHIVOS</span>
																	              <input type="file" name="files[]" multiple />
																	            </span>
																	        
																	            <button type="button" class="btn btn-danger btn-sm delete">
																	              <i class="fa fa-trash"></i>
																	              <span>ELIMINAR SELECCIONADOS</span>
																	            </button>
																	            <!--  <input type="checkbox" class="toggle" />
																	           The global file processing state -->
																	            <span class="fileupload-process"></span>
																	          </div>
																	          <!-- The global progress state -->
																	          <div class="col-lg-7 fileupload-progress fade" style="margin-top: 5px;">
																	            <!-- The global progress bar -->
																	            <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
																	              <div class="progress-bar progress-bar-success" style="width: 0%;"></div>
																	            </div>
																	            <!-- The extended global progress state -->
																	            <div class="progress-extended">&nbsp;</div>
																	          </div>
																	        </div>
																	        <!-- The table listing the files available for upload/download -->
																	        <table role="presentation" class="table table-striped" id="tabla-buenapvideo">
																	          <tbody class="files"></tbody>
																	        </table>
																	        
																	    </div>
																	</div>
																</form>

															</div>
															<!--end: Wizard Step 6-->

															<!--begin: Wizard Step 7-->
															<div class="pb-5" data-wizard-type="step-content">
																<!--begin::Section-->
																<h4 class="mb-10 font-weight-bold text-dark">Gracias por participar</h4>
																<div class="text-dark-50 line-height-lg">
																	<p class="fs-16 justifcado">
																		Sigue el desarrollo de este evento por nuestras redes sociales y en página web de Fundación Bien-Estar. Los resultados de las evaluaciones de las buenas prácticas serán comunicados directamente al correo electrónico y teléfono de los postulantes. 
																	</p>
																	<p class="fs-16 justifcado">
																		No te olvides de dar clic en el botón enviar para registrar tus datos en este consurso.
																	</p>
																</div>
																<!--end::Section-->
															</div>
															<!--end: Wizard Step 7--> 

														<form class="form" id="kt_form_nav">
															<!--begin: Wizard Actions-->
															<div class="d-flex justify-content-between border-top mt-5 pt-10">
																<div class="mr-2">
																	<button type="button" class="btn btn-light-primary font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-prev" id="btn-ant-form">Anterior</button>
																</div>
																<div>

																	<!--
																		<button type="button" class="btn btn-success font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-submit">Enviar</button> 
																	-->
																	
																	<button type="button" class="btn btn-primary font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-next" id="btn-sgte-form">Siguiente</button>

																	
																	<button type="button" class="btn btn-info font-weight-bolder text-uppercase px-9 py-4" id="btn-enviar-form" data-wizard-type="action-submit">Enviar Formulario</button>
																

																</div>
															</div>
															<!--end: Wizard Actions-->
														</form>

													</div>
													<!--end: Wizard-->
												</div>
												<!--end: Wizard Form-->
											</div>
											<!--end: Wizard Body-->
										</div>
										<!--end: Wizard-->
									</div>
								</div>
							</div>
							<!--end::Container-->
						</div>
						<!--end::Entry-->
					</div>
					<!--end::Content-->
					<!--begin::Footer-->
					<div class="footer bg-white py-4 d-flex flex-lg-column" id="kt_footer">
						<!--begin::Container-->
						<div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
							<!--begin::Copyright-->
							<div class="text-dark order-2 order-md-1">
								<span class="text-muted font-weight-bold mr-2">2021©</span>
								<a href="http://keenthemes.com/metronic" target="_blank" class="text-dark-75 text-hover-primary">Fundación Bienestar</a>
							</div>
							<!--end::Copyright-->
							<!--begin::Nav-->
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

		<!-- end::User Panel-->
		<!--begin::Quick Cart-->

		<!--end::Quick Cart-->
		<!--begin::Quick Panel-->

		<!--end::Quick Panel-->
		<!--begin::Chat Panel-->

		<!--end::Chat Panel-->
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
		<!--begin::Sticky Toolbar-->
		<!--end::Sticky Toolbar-->
		<!--begin::Demo Panel-->

		<!--end::Demo Panel-->
		<script>var HOST_URL = "https://#!";</script>
		<!--begin::Global Config(global config for global JS scripts)-->
		<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1400 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#3699FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#E4E6EF", "dark": "#181C32" }, "light": { "white": "#ffffff", "primary": "#E1F0FF", "secondary": "#EBEDF3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#3F4254", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#EBEDF3", "gray-300": "#E4E6EF", "gray-400": "#D1D3E0", "gray-500": "#B5B5C3", "gray-600": "#7E8299", "gray-700": "#5E6278", "gray-800": "#3F4254", "gray-900": "#181C32" } }, "font-family": "Poppins" };</script>
		<!--end::Global Config-->
		<!--begin::Global Theme Bundle(used by all pages)-->
		<script src="assets/plugins/global/plugins.bundle.js"></script>
		
		<script src="assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
		<script src="assets/js/scripts.bundle.js"></script>
		<!--end::Global Theme Bundle-->
		<!--begin::Page Scripts(used by this page)-->
		<script src="assets/js/pages/custom/wizard/wizard-2.js"></script>
		<!--end::Page Scripts-->

		<!-- FileUpload JS -->
		<!-- The blueimp Gallery widget -->
	    <!-- The template to display files available for upload -->
	    <script id="template-upload" type="text/x-tmpl">
	      {% for (var i=0, file; file=o.files[i]; i++) { %}
	          <tr class="template-upload fade{%=o.options.loadImageFileTypes.test(file.type)?' image':''%}">
	              <td>
	                  <span class="preview"></span>
	              </td>
	              <td>
	                  <p class="name">{%=file.name%}</p>
	                  <strong class="error text-danger"></strong>
	              </td>
	              <td>
	                  <p class="size">Subiendo...</p>
	                  <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
	              </td>
	              <td>
	                  {% if (!o.options.autoUpload && o.options.edit && o.options.loadImageFileTypes.test(file.type)) { %}
	                    <button class="btn btn-success btn-sm edit" data-index="{%=i%}" disabled>
	                        <i class="glyphicon glyphicon-edit"></i>
	                        <span>Editar</span>
	                    </button>
	                  {% } %}
	                  {% if (!i && !o.options.autoUpload) { %}
	                      <button class="btn btn-primary btn-sm start" disabled>
	                          <i class="fa fa-upload"></i>
	                          <span>Subir</span>
	                      </button>
	                  {% } %}
	                  {% if (!i) { %}
	                      <button class="btn btn-warning btn-sm cancel">
	                          <i class="fa fa-ban"></i>
	                          <span>Cancelar</span>
	                      </button>
	                  {% } %}
	              </td>
	          </tr>
	      {% } %}
	    </script>
	    <!-- The template to display files available for download -->
	    <script id="template-download" type="text/x-tmpl">
	      {% for (var i=0, file; file=o.files[i]; i++) { %}
	          <tr class="template-download fade{%=file.thumbnailUrl?' image':''%}">
	              <td>
	                  <span class="preview">
	                      {% if (file.thumbnailUrl) { %}
	                          <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
	                      {% } %}
	                  </span>
	              </td>
	              <td>
	                  <p class="name">
	                      {% if (file.url) { %}
	                          <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
	                      {% } else { %}
	                          <span>{%=file.name%}</span>
	                      {% } %}
	                  </p>
	                  {% if (file.error) { %}
	                      <div><span class="label label-danger">Error</span> {%=file.error%}</div>
	                  {% } %}
	              </td>
	              <td>
	                  <span class="size">{%=o.formatFileSize(file.size)%}</span>
	              </td>
	              <td>
	                  {% if (file.deleteUrl) { %}
	                      <button class="btn btn-danger btn-sm delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
	                          <i class="fa fa-trash"></i>
	                          <span>Eliminar</span>
	                      </button>
	                      <input type="checkbox" name="delete" value="1" class="toggle">
	                  {% } else { %}
	                      <button class="btn btn-warning btn-sm cancel">
	                          <i class="fa fa-ban"></i>
	                          <span>Cancelar</span>
	                      </button>
	                  {% } %}
	              </td>
	          </tr>
	      {% } %}
	    </script>

	    <!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
	    <script src="fileupload/js/vendor/jquery.ui.widget.js"></script>
	    <!-- The Templates plugin is included to render the upload/download listings -->
	    <script src="fileupload/js/tmpl.min.js"></script>
	    <!-- The Load Image plugin is included for the preview images and image resizing functionality -->
	    <script src="fileupload/js/load-image.all.min.js"></script>
	    
	    <!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
	    <script src="fileupload/js/jquery.iframe-transport.js"></script>
	    <!-- The basic File Upload plugin -->
	    <script src="fileupload/js/jquery.fileupload.js"></script>
	    <!-- The File Upload processing plugin -->
	    <script src="fileupload/js/jquery.fileupload-process.js"></script>
	    <!-- The File Upload image preview & resize plugin -->
	    <script src="fileupload/js/jquery.fileupload-image.js"></script>
	    <!-- The File Upload video preview plugin -->
	    <script src="fileupload/js/jquery.fileupload-video.js"></script>	
	    <!-- The File Upload validation plugin -->
	    <script src="fileupload/js/jquery.fileupload-validate.js"></script>
	    <!-- The File Upload user interface plugin -->
	    <script src="fileupload/js/jquery.fileupload-ui.js"></script>
	    <!-- The main application script -->
	    <script src="fileupload/js/demo2.js"></script>
	    <!-- The XDomainRequest Transport is included for cross-domain file deletion for IE 8 and IE 9 -->
	    <!--[if (gte IE 8)&(lt IE 10)]>
	      <script src="js/cors/jquery.xdr-transport.js"></script>
	    <![endif]-->
		

	</body>
	<!--end::Body-->
</html>