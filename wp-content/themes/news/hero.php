<!-- Top Bar Start -->
<div class="top-bar">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="tb-contact">
					<p><i class="fas fa-envelope"></i>idbmananf@mail.com</p>
					<p><i class="fas fa-phone-alt"></i>+8801744508287</p>
				</div>
			</div>
			<div class="col-md-6">
				<div class="tb-menu">
					<?php wp_nav_menu(
						array(
							'theme_location' => 'top-left-header-menu',
							'menu_id' => "top-left-menu",
							'link_after' => ' /',
						)
					); ?>

				</div>
			</div>
		</div>
	</div>
</div>
<!-- Top Bar Start -->

<!-- Brand Start -->
<div class="brand">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-3 col-md-4">
				<div class="b-logo">
					<?php $custom_logo_id = get_theme_mod('custom_logo');
					$image = wp_get_attachment_image_src($custom_logo_id, 'full');
					?>
					<a href="<?php bloginfo('url'); ?>">
						<img src=" <?php echo $image[0] ?>" alt="Logo">
					</a> <br>
					<div class="site">
						<a id="site" href="<?php bloginfo('url'); ?>">
							<?php bloginfo('name'); ?>
						</a>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-md-4">
				<div class="b-ads">
					<a href="#">
						<img src="<?php echo get_template_directory_uri() ?>/img/banner.jpg" alt="Ads">
					</a>
				</div>
			</div>
			<div class="col-lg-3 col-md-4">
				<div class="b-search">
					<?php echo get_search_form()  ?>

				</div>
			</div>
		</div>
	</div>
</div>
<!-- Brand End -->

<!-- Nav Bar Start -->
<div class="nav-bar">
	<div class="container">
		<nav class="navbar navbar-expand-md bg-dark navbar-dark">
			<a href="#" class="navbar-brand">MENU</a>
			<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
				<div class="navbar-nav mr-auto">
					<!--					<a href="index.html" class="nav-item nav-link active">Home</a>-->
					<?php wp_nav_menu(
						array(
							'theme_location' => 'main-menu',
							'menu_id' => "navbar-nav",
						)
					); ?>
					<!--					<div class="nav-item dropdown">-->
					<!--						<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Dropdown</a>-->
					<!--						<div class="dropdown-menu">-->
					<!--							<a href="#" class="dropdown-item">Sub Item 1</a>-->
					<!--							<a href="#" class="dropdown-item">Sub Item 2</a>-->
					<!--						</div>-->
					<!--					</div>-->
					<!--					<a href="single-page.html" class="nav-item nav-link">Single Page</a>-->
					<!--					<a href="contact.html" class="nav-item nav-link">Contact Us</a>-->
				</div>
				<div class="social ml-auto">
					<a href=""><i class="fab fa-twitter"></i></a>
					<a href=""><i class="fab fa-facebook-f"></i></a>
					<a href=""><i class="fab fa-linkedin-in"></i></a>
					<a href=""><i class="fab fa-instagram"></i></a>
					<a href=""><i class="fab fa-youtube"></i></a>
				</div>
			</div>
		</nav>
	</div>
</div>
<!-- Nav Bar End -->