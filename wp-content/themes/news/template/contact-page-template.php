<?php
/*
*Template Name: Contact Page Template
*/
?>

<?php get_header() ?>
<body <?php body_class(); ?>>
<?php get_template_part('hero') ?>

<!-- Contact Start -->
<div class="contact">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-md-8">
				<div class="contact-form">

			<form>
						<div class="form-row">
							<div class="form-group col-md-6">
								<input type="text" class="form-control" placeholder="Your Name" />
							</div>
							<div class="form-group col-md-6">
								<input type="email" class="form-control" placeholder="Your Email" />
							</div>
						</div>
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Subject" />
						</div>
						<div class="form-group">
							<textarea class="form-control" rows="5" placeholder="Message"></textarea>
						</div>
						<div><button class="btn" type="submit">Send Message</button></div>
					</form>
				</div>
			</div>
			<div class="col-md-4">
				<div class="contact-info">
					<h3>Get in Touch</h3>
					<p>
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. In condimentum quam ac mi viverra dictum. In efficitur ipsum diam, at dignissim lorem tempor in. Vivamus tempor hendrerit finibus.
					</p>
					<h4><i class="fa fa-map-marker"></i>123 News Street, NY, USA</h4>
					<h4><i class="fa fa-envelope"></i>info@example.com</h4>
					<h4><i class="fa fa-phone"></i>+123-456-7890</h4>
					<div class="social">
						<a href=""><i class="fab fa-twitter"></i></a>
						<a href=""><i class="fab fa-facebook-f"></i></a>
						<a href=""><i class="fab fa-linkedin-in"></i></a>
						<a href=""><i class="fab fa-instagram"></i></a>
						<a href=""><i class="fab fa-youtube"></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Contact End -->

<?php get_footer() ?>
