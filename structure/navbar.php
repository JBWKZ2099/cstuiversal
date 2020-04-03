<nav class="secondary-nav bg-blue">
	<div class="container-custom">
		<div class="row justify-content-center align-items-center">
			<div class="col-md-7 col-lg-5 text-white pt-2 pt-md-0 mb-2 mb-md-0">
				<p class="text-center text-md-right pr-3">Reparamos Refrigeradores, Lavadoras y Secadoras.</p>
			</div>
			<div class="col-md-4 col-lg-3 px-0 px-md-3">
				<a class="btn btn-green btn-block btn-no-radius py-2 navbar-whats fa-align-center" href="<?php echo $_SESSION["whatsapp"]; ?>" target="_blank"><i class="fab fa-whatsapp text-white"></i> Atención Inmediata</a>
			</div>
		</div>
	</div>
</nav>
<nav class="secondary-nav bg-gray">
	<div class="container-custom py-2">
		<div class="row justify-content-center align-items-center">
			<div class="col-md-12 text-blue">
				<p class="text-center font-weight-lighter">Contacto Inmediato: <a class="text-blue" href="tel:5543315214">55-4331-5214</a> <span class="mx-3">//</span> <a class="text-blue" href="tel:5558714282">55-5871-4282</a></p>
			</div>
		</div>
	</div>
</nav>

<?php if( $active=="index-lavadora" || $active=="index-refrigerador" ) { ?>
	<div class="nav bg-light py-3">
		<?php if( $active=="index-lavadora" || $active=="index-refrigerador" ) { ?>
			<img class="img-fluid d-block m-auto" src="<?php Times::fileTime("http://placehold.it/400x150.svg?text=400x150.svg") ?>" alt="logo_reparamos_tu_lavadora">
		<?php } else { ?>
			<img class="img-fluid d-block m-auto" src="<?php Times::fileTime("http://placehold.it/400x150.svg?text=400x150.svg") ?>" alt="logo_reparamos_tu_refrigerador">
		<?php } ?>
	</div>
<?php } else { ?>
	<?php
		/*
			If page is only one landing you can add  id="parallax-navbar" to <ul class="navbar-nav mr-auto">
			And if you do, add "data-target"=>"#id-to-scroll" to $items array to can make the js work
			Example: array("active" => "none", "link" => "#", "word" => "Nosotros", "sub" => 0, "data_target" => "#nosotros"),
		*/
		function act($item, $active) { echo $item == $active ? " active" : ""; }
		$items = json_decode(json_encode(array(
			array("active" => "rep-refri", "link" => "reparacion-de-refrigeradores", "word" => "Reparación de Refrigeradores", ["submenu"=>false, "menu" => []]),
			array("active" => "rep-lava", "link" => "reparacion-de-lavadoras", "word" => "Reparación de Lavadoras", ["submenu"=>false, "menu" => []]),
			array("active" => "aire", "link" => "aires-acondicionados", "word" => "Aires Acondicionados", ["submenu"=>false, "menu" => []]),
		)), FALSE);
	?>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container nb-container m-auto">
			<a class="navbar-brand" href="<?php echo $path; ?>">
				<!-- <img src="holder.js/200x50.svg?random=yes&text=200x50 SVG" alt="Brand" class="img-fluid"> -->
				<img src="<?php Times::fileTime("assets/img/logocstu-01.svg") ?>" alt="logo" class="img-fluid nb-logo">
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav m-auto">
					<?php foreach($items as $item) { ?>
						<li class='nav-item<?php act($item->active, $active); if( $item->submenu ) echo " dropdown text-center"; ?>'>
							<?php if( !$item->submenu ) { ?>
								<a class='nav-link text-center' href='<?php echo $path.$item->link; ?>' <?php if( isset($item->data_target) && !empty($item->data_target) ) echo "data-target='".$item->data_target."'"; ?>><?php echo $item->word ?></a>
							<?php } else { ?>
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<?php echo $item->word ?>
								</a>
								<div class="dropdown-menu" aria-labelledby="navbarDropdown">
									<?php foreach($item->menu as $imnu) { ?>
										<a class="dropdown-item text-center" href="#"><?php echo $imnu->word; ?></a>
									<?php } ?>
								</div>
							<?php } ?>
						</li>
					<?php } ?>
				</ul>
			</div>
		</div>
	</nav>

<?php } ?>