<!-- Footer Start -->
<div class="footer">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-6">
				<div class="footer-widget">
					<h3 class="title">Get in Touch</h3>
					<div class="contact-info">
						<?php if (is_active_sidebar('left-footer')) {
							dynamic_sidebar('left-footer');
						} else { ?>
							<p><i class="fa fa-map-marker"></i>488/1, West Shawrapara, Mirpur, Dhaka</p>
							<p><i class="fa fa-envelope"></i>idbmannaf@gmail.com</p>
							<p><i class="fa fa-phone"></i>+8801744508287</p>
							<div class="social">

								<a href="https://www.facebook.com/abde.mannaf"><i class="fab fa-twitter"></i></a>
								<a href=""><i class="fab fa-facebook-f"></i></a>
								<a href=""><i class="fab fa-linkedin-in"></i></a>
								<a href=""><i class="fab fa-instagram"></i></a>
								<a href=""><i class="fab fa-youtube"></i></a>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>

			<div class="col-lg-3 col-md-6">
				<div class="footer-widget">
					<h3 class="title">Useful Links</h3>

					<?php if (is_active_sidebar('after-left-footer')) {
						dynamic_sidebar('after-left-footer');
					} ?>
				</div>
			</div>

			<div class="col-lg-3 col-md-6">
				<div class="footer-widget">
					<h3 class="title">Quick Links</h3>
					<?php if (is_active_sidebar('after-middle-footer')) {
						dynamic_sidebar('after-middle-footer');
					} ?>

				</div>
			</div>

			<div class="col-lg-3 col-md-6">
				<div class="footer-widget">
					<h3 class="title">Archived</h3>
					<div class="newsletter">
						<?php if (is_active_sidebar('right-footer')) {
							dynamic_sidebar('right-footer');
						} ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Footer End -->

<!-- Footer Menu Start -->
<div class="footer-menu">
	<div class="container">
		<div class="f-menu">
			<?php wp_nav_menu(
				array(
					'theme_location' => 'footer-bottom-menu',
					'menu_id' => "footer-bottom-men",
					'link_after' => ' | ',
				)
			); ?>

		</div>
	</div>
</div>
<!-- Footer Menu End -->

<!-- Footer Bottom Start -->
<div class="footer-bottom">
	<div class="container">
		<div class="row">
			<div class="col-md-6 copyright">
				<p>Copyright &copy; <a href="https://github.com/idbmannaf">Dev Mannaf</a>. All Rights Reserved</p>
			</div>

			<div class="col-md-6 template-by">
				<p>Designed By <a href="https://github.com/idbmannaf">Abdul Mannaf</a></p>
			</div>
		</div>
	</div>
</div>
<!-- Footer Bottom End -->

<!-- Back to Top -->
<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri() ?>/lib/easing/easing.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri() ?>/lib/slick/slick.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

<!-- Template Javascript -->
<script src="<?php echo get_stylesheet_directory_uri() ?>/js/main.js"></script>
<?php wp_footer(); ?>
</body>

</html>