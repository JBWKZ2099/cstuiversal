<!DOCTYPE html>
<html lang="es">
<head>
	<?php
		$view_name="Aires Acondicionados";
		$which = "home";
		$description = "Le ofrecemos la mejor alternativa en mantenimiento preventivo y correctivo de su aire acondicionado, con refacciones originales y servicio certificado por las mejores marcas.";
		include(/*$dir.*/"structure/head.php");
		$asset = "assets/img/folder_name/"; // Path where are storaged media files (img, video, etc)
	?>
	<metadata class="sr-only" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:dc="http://purl.org/dc/elements/1.1/" >
		<dc:title><?php echo $env->APP_NAME; ?></dc:title>
		<dc:creator><?php echo "Ricardo Mateos, Ivan Ramírez"?></dc:creator>
		<dc:subject>Aires Acondicionados.</dc:subject>
		<dc:description><?php echo $description; ?></dc:description>
		<dc:publisher><?php echo $env->APP_NAME; ?></dc:publisher>
		<dc:date>2020/03/30</dc:date>
		<dc:type>Ivan Ramírez</dc:type>
		<dc:format>HTML5</dc:format>
		<dc:source><?php $env->APP_URL; ?></dc:source>
		<dc:language>es</dc:language>
	</metadata>
</head>
<body>
	<?php $active="aire"; include(/*$dir.*/"structure/navbar.php"); ?>

	<section class="container-fluid">
		<div class="row">
			<div class="col-md-12 px-0">
				<div id="home-carousel" class="carousel slide full-carousel circle-indicators" data-ride="carousel" data-ride="0">
					<div class="carousel-inner">
						<div class="carousel-item active" style="background-image: url('assets/img/aires/slideaireacondicionado.png')">
							<div class="row justify-content-end h-100 align-items-center">
								<div class="col-md-8 text-center">
									<div class="row px-3">
										<div class="col-md-12 mb-3 mb-md-5">
											<h1 class="h1 text-white">Servicio Preventivo y Correctivo <br class="d-none d-md-block"> de Aires Acondicionados</h1>
										</div>

										<div class="col-md-4 mb-2 mb-md-0">
											<img class="img-fluid d-block m-auto" src="<?php Times::fileTime("assets/img/home/reparacionelmismodia.png") ?>" alt="reparacion_el_mismo_dia">
											<h2 class="sr-only">Reparación el mismo día</h2>
										</div>
										<div class="col-md-4 mb-2 mb-md-0">
											<img class="img-fluid d-block m-auto" src="<?php Times::fileTime("assets/img/home/mesesdegarantia.png") ?>" alt="dieciocho_meses_de_garantia">
											<h2 class="sr-only">18 Meses de Garantía</h2>
										</div>
										<div class="col-md-4 mb-2 mb-md-0">
											<img class="img-fluid d-block m-auto" src="<?php Times::fileTime("assets/img/home/mejoramospresupuesto.png") ?>" alt="mejoramos_presupuestos">
											<h2 class="sr-only">Mejoramos Presupuestos</h2>
										</div>

										<div class="col-md-12 mt-3 mt-md-5">
											<div class="row align-items-center">
												<div class="col-md-8 mb-3 mb-md-0">
													<h2 class="text-white h5 normal-text">Reparación inmediata de Aires Acondicionados.</h2>
												</div>
												<div class="col-md-4">
													<a class="btn btn-blue-2 btn-block btn-no-radius text-center text-md-left banner-whats fa-align-center" href="<?php echo $_SESSION["whatsapp"]; ?>" target="_blank">
														<i class="fab fa-whatsapp text-white"></i> Agenda tu Revisión
													</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="container-custom py-3 py-md-5">
		<div class="row justify-content-center">
			<div class="col-md-12 mb-3 text-center">
				<img class="img-fluid d-block m-auto" src="<?php Times::fileTime("assets/img/aires/reparacionaires.png") ?>" alt="reparacion_de_aires_acondicionados">
			</div>

			<div class="col-md-12 text-center">
				<h2 class="text-blue mb-3 mb-md-4">Reparación de Aires Acondicionados</h2>
				<h3 class="h4 normal-text mb-3 mb-md-5">18 Meses de Garantía | Reparación el mismo día | Refacciones Originales | Servicio 24 hrs. <br class="d-none d-md-block"> <span class="d-inline-block d-md-none">|</span> Mejoramos Presupuestos | Servicio 365 días del año</h3>
			</div>

			<div class="col-md-8">
				<div class="row">
					<div class="col-md-4 mb-3 mb-md-0">
						<a class="btn btn-green btn-block btn-no-radius banner-whats fa-align-center btn-hover-initial" href="<?php echo $_SESSION["whatsapp"]; ?>" target="_blank">
							<i class="fab fa-whatsapp mr-3"></i> Agenda una Revisión
						</a>
					</div>
					<div class="col-md-4 mb-3 mb-md-0">
						<a class="btn btn-blue-2 btn-block btn-no-radius banner-whats fa-align-center btn-hover-initial" href="tel:5543315214">
							<i class="fas fa-phone mr-3"></i> 55-43-31-52-14
						</a>
					</div>
					<div class="col-md-4">
						<a class="btn btn-blue-3 btn-block btn-no-radius banner-whats fa-align-center btn-hover-initial" href="tel:5558714282">
							<i class="fas fa-phone mr-3"></i> 55-58-71-42-82
						</a>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="container-custom py-3 py-md-5">
		<div class="row justify-content-center">
			<div class="col-6 col-md-4 mb-3 mb-md-0">
				<div class="row align-items-center justify-content-center">
					<div class="col-4 col-md-3 px-0 px-md-3 pl-2 pl-md-0">
					<img class="img-fluid d-block m-auto rounded-circle" src="<?php Times::fileTime("assets/img/home/garantia2-01.svg") ?>" alt="dieciocho_meses_de_garantia">
					</div>
					<div class="col-8 col-md-6 text-center">
						<h3 class="text-blue h3 normal-text">18 Meses <br class="d-none d-md-block"> de Garantía</h3>
					</div>
				</div>
			</div>

			<div class="col-6 col-md-4 mb-3 mb-md-0">
				<div class="row align-items-center justify-content-center">
					<div class="col-4 col-md-3 px-0 px-md-3 pl-2 pl-md-0">
					<img class="img-fluid d-block m-auto rounded-circle" src="<?php Times::fileTime("assets/img/home/mismodia2-01.svg") ?>" alt="reparacion_el_mismo_dia">
					</div>
					<div class="col-8 col-md-6 text-center">
						<h3 class="text-blue h3 normal-text">Reparación el <br class="d-none d-md-block"> mismo día</h3>
					</div>
				</div>
			</div>

			<div class="col-6 col-md-4">
				<div class="row align-items-center justify-content-center">
					<div class="col-4 col-md-3 px-0 px-md-3 pl-2 pl-md-0">
						<img class="img-fluid d-block m-auto rounded-circle" src="<?php Times::fileTime("assets/img/home/garantia2-01.svg") ?>" alt="refacciones_originales">
					</div>
					<div class="col-8 col-md-6 text-center">
						<h3 class="text-blue h3 normal-text">Refacciones <br class="d-none d-md-block"> Originales</h3>
					</div>
				</div>
			</div>

			<div class="col-12 py-3 d-none d-md-block"></div>

			<div class="col-6 col-md-4 mb-3 mb-md-0">
				<div class="row align-items-center justify-content-center">
					<div class="col-4 col-md-3 px-0 px-md-3 pl-2 pl-md-0">
						<img class="img-fluid d-block m-auto rounded-circle" src="<?php Times::fileTime("assets/img/home/mismodia2-01.svg") ?>" alt="servicio_24_horas">
					</div>
					<div class="col-8 col-md-6 text-center">
						<h3 class="text-blue h3 normal-text">Servicio <br class="d-none d-md-block"> 24 horas</h3>
					</div>
				</div>
			</div>
			<div class="col-6 col-md-4 mb-3 mb-md-0">
				<div class="row align-items-center justify-content-center">
					<div class="col-4 col-md-3 px-0 px-md-3 pl-2 pl-md-0">
					<img class="img-fluid d-block m-auto rounded-circle" src="<?php Times::fileTime("assets/img/home/garantia2-01.svg") ?>" alt="atencion_365_dias">
					</div>
					<div class="col-8 col-md-6 text-center">
						<h3 class="text-blue h3 normal-text">Atención <br class="d-none d-md-block"> 365 días</h3>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="container-custom py-3 -py-md-5">
		<div class="row">
			<div class="col-md-12">
				<h3 class="h2 text-blue text-center mb-3 mb-md-4">Reparación de Aires Acondicionados</h3>
				<p class="h4 normal-text text-justify text-md-center mb-3 mb-md-4">Le ofrecemos la mejor alternativa en mantenimiento preventivo y correctivo de su aire acondicionado, con refacciones originales y servicio certificado por las mejores marcas.</p>
				<p class="h4 normal-text text-justify text-md-center mb-3 mb-md-5">Contamos con atención el mismo día con el equipo de técnicos más profesional en reparación de regrigeradores, reparación de lavadoras, reparación de secadoras y reparación de aires acondicionados.</p>
			</div>
		</div>
	</section>

	<section class="container-fluid bg-gray py-3">
		<div class="row">
			<div class="container-custom">
				<div class="row">
					<div class="col-3 col-md mb-2 mb-md-0">
						<img class="img-fluid d-block m-auto" src="<?php Times::fileTime("assets/img/home/lglogo-01.svg") ?>" alt="logo_lg">
					</div>
					<div class="col-3 col-md mb-2 mb-md-0">
						<img class="img-fluid d-block m-auto" src="<?php Times::fileTime("assets/img/home/whirpoollogo-01.svg") ?>" alt="logo_whirlpool">
					</div>
					<div class="col-3 col-md mb-2 mb-md-0">
						<img class="img-fluid d-block m-auto" src="<?php Times::fileTime("assets/img/home/samsunglogo-01.svg") ?>" alt="logo_samsung">
					</div>
					<div class="col-3 col-md mb-2 mb-md-0">
						<img class="img-fluid d-block m-auto" src="<?php Times::fileTime("assets/img/home/generalelectriclogo-01.svg") ?>" alt="logo_general_electric">
					</div>
					<div class="col-3 col-md mb-2 mb-md-0">
						<img class="img-fluid d-block m-auto" src="<?php Times::fileTime("assets/img/home/mabelogo-01.svg") ?>" alt="logo_mabe">
					</div>
					<div class="col-3 col-md mb-2 mb-md-0">
						<img class="img-fluid d-block m-auto" src="<?php Times::fileTime("assets/img/home/easylogo-01-01.svg") ?>" alt="logo_easy">
					</div>
					<div class="col-3 col-md mb-2 mb-md-0">
						<img class="img-fluid d-block m-auto" src="<?php Times::fileTime("assets/img/home/maytaglogo-01-01.svg") ?>" alt="logo_maytag">
					</div>
					<div class="col-3 col-md mb-2 mb-md-0">
						<img class="img-fluid d-block m-auto" src="<?php Times::fileTime("assets/img/home/daewoologo-01-01.svg") ?>" alt="logo_daewoo">
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="container-custom py-3 py-md-5">
		<div class="row justify-content-center align-items-end mb-3 mb-md-5">
			<div class="col-md-12 text-center">
				<h4 class="h4">Zonas de cobertura: Valle Dorado, Satélite, Polanco, Naucalpan, Santa Mónica y <br class="d-none d-md-block"> Zona Norte del Estado de México.</h4>
			</div>
		</div>
	</section>

	<?php include("widgets/frm-cont.php"); ?>

	<?php include(/*$dir.*/"structure/footer.php"); ?>
	<script type="text/javascript">
		rackimg = document.getElementById("parallax-rack");
		Stickyfill.add(rackimg);
	</script>
</body>
</html>
