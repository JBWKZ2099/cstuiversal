<footer class="py-3 py-md-4 bg-blue" data-url="<?php echo $path; ?>" data-dir-ln="<?php echo substr($path,0,-1); ?>">
	<div class="container-custom">
		<div class="row mb-3">
			<div class="col-sm-4 text-white">
				<p class="mb-3">Acerca de CSTUniversal</p>
				<p>Convento de Santa Mónica 2b, 54050 <br class="d-none d-md-block"> Tlalnepantla, México, México.</p>
			</div>

			<div class="col-md-8">
				<div class="row">
					<div class="col-md-4">
						<a class="text-white banner-whats fa-align-center btn-hover-initial" href="<?php echo $_SESSION["whatsapp"]; ?>" target="_blank">
							<i class="fab fa-whatsapp mr-3"></i> Agenda una Revisión
						</a>
					</div>
					<div class="col-md-4">
						<a class="text-white banner-whats fa-align-center btn-hover-initial" href="tel:5543315214">
							<i class="fas fa-phone mr-3"></i> 55-43-31-52-14
						</a>
					</div>
					<div class="col-md-4">
						<a class="text-white banner-whats fa-align-center btn-hover-initial" href="tel:5558714282">
							<i class="fas fa-phone mr-3"></i> 55-58-71-42-82
						</a>
					</div>

					<div class="col-md"></div>
					<div class="col-md-3">
						<p class="text-white">
							Síguenos:
							<a class="banner-whats btn-hover-initial" href="https://fb.com" target="_blank">
								<span class="fa-stack fastack-custom">
									<i class="fas fa-circle fa-stack-2x fa-inverse"></i>
									<i class="fab fa-facebook-f fa-stack-1x text-blue"></i>
								</span>
							</a>
						</p>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12 text-center">
				<p class="text-white">Todos los Derechos Reservados - <?php echo $env->APP_NAME; ?> &copy; <?php echo date("Y"); ?> - México.</p>
			</div>
		</div>
	</div>
</footer>


<?php /* JS Tags */ ?>
<?php /*jQuery js minified*/ ?>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<?php /*jQuery UI*/ ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<?php /*Bootstrap js minified*/ ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<?php /*Script Font Awesome*/ ?>
<script src="https://use.fontawesome.com/releases/v5.8.1/js/all.js"></script>
<?php /*Scroll reveal*/ ?>
<script src="https://unpkg.com/scrollreveal"></script>
<?php /*Scroll Magic*/ ?>
<script src="<?php Times::fileTime("assets/js/scrollmagic/TweenMax.min.js"); ?>"></script>
<script src="<?php Times::fileTime("assets/js/scrollmagic/ScrollMagic.min.js"); ?>"></script>
<script src="<?php Times::fileTime("assets/js/scrollmagic/animation.gsap.js"); ?>"></script>
<script src="<?php Times::fileTime("assets/js/scrollmagic/debug.addIndicators.js"); ?>"></script>
<?php /*Script Scrollify*/ ?>
<script src="<?php Times::fileTime("assets/js/scrollify/jquery.scrollify.min.js"); ?>"></script>
<?php /*Script custom*/ ?>
<script src="<?php Times::fileTime("assets/js/script.js"); ?>"></script>
<script src="<?php Times::fileTime("assets/js/img-to-svg.js"); ?>"></script>
<?php /*FormValidation v0.8.1*/ ?>
<script src="assets/js/formvalidation/dist/js/formValidation.min.js"></script>
<?php /*FormValidation v0.8.1*/ ?>
<script src="assets/js/formvalidation/dist/js/framework/bootstrap.min.js"></script>
<script src="assets/js/formvalidation/dist/js/language/es_ES.js"></script>
<?php /*reCaptcha*/ ?>
<?php if( $_SESSION["recaptcha"]=="v3" ) { ?>
<script src='https://www.google.com/recaptcha/api.js?render=<?php echo $env->GRECAPTCHA_PUBLIC; ?>'></script>
<?php } ?>
<script src="<?php Times::fileTime("assets/js/footer.js"); ?>"></script>
<script src="<?php Times::fileTime("assets/js/contact.js"); ?>"></script>

<?php if( $_SESSION["recaptcha"]=="v3" ) { ?>
	<script defer>
		$("#msg").focus(function(){
			grecaptcha.ready(function() {
				// do request for recaptcha token
				// response is promise with passed token
				grecaptcha.execute('<?php echo $env->GRECAPTCHA_PUBLIC; ?>', {action: 'get_in_touch'}).then(function(token) {
						// add token to form
						$('form#contact-form').prepend('<input type="hidden" name="g-recaptcha-response" value="' + token + '">');
						$('form#contact-form').prepend('<input type="hidden" name="action" value="get_in_touch">');
				});
			});
		});
	</script>
<?php } ?>