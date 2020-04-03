<section class="container-custom pt-60 pb-60">
	<div class="row align-items-center">
		<div class="col-md-6">
			<p class="text-blue h4 mb-3 mb-md-5"><span class="font-weight-lighter">En breve nos pondremos en <br class="d-none d-md-block"> contacto contigo.</span></p>

			<?php include("alerts/alerts.php"); ?>
			<form id="contact-form" action="<?php echo $path; ?>php/mailer/mailer.php" method="POST">
				<div class="form-group">
					<input id="name" type="text" class="fc-custom form-control" name="name" value="" placeholder="Nombre*" required>
				</div>
				<div class="form-group">
					<input id="email" type="email" class="fc-custom form-control" name="email" value="" placeholder="Correo Electrónico*" required>
				</div>
				<div class="form-group">
					<textarea id="msg" class="fc-custom form-control" name="msg" rows="5" placeholder="Mensaje / Cotización*"></textarea>
				</div>
				<?php if( $_SESSION["recaptcha"]=="v2" ) { ?>
					<div class="form-group">
						<div id="g-recaptcha"></div>
					</div>
				<?php } ?>

				<div class="col-md-3 px-0 mb-3">
					<button type="submit" class="btn btn-blue-2 btn-block btn-no-radius btn-hover-initial">Enviar</button>
				</div>

				<div class="col-md-12 px-0">
					<p class="font-weight-lighter">Al dar click en enviar Acepta el Aviso de Privacidad.</p>
				</div>
			</form>
		</div>

		<div class="col-md-6 d-none d-md-inline-block">
			<img class="img-fluid d-block m-auto" src="<?php Times::fileTime("assets/img/contacto2.jpg") ?>" alt="contacto">
		</div>
	</div>
</section>