<?php get_header() ?>

<body id="post-<?php the_ID(); ?>" <?php body_class(); ?>>
	<?php get_template_part('hero') ?>
	<div class="container">
		<div class="row">
			<div class="col-md-8 m-auto">
				<!-- <?php echo do_shortcode('[gallery ids="5,6,7"]') ?> -->
				<?php echo do_shortcode('[slider item="3"][slide caption="Slide 1 url="#" id=5][slide caption="Slide 2" id=6][slide caption="Slide 2" id=7][/slider]')
				?>
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<h1><?php the_title() ?></h1>
						<?php the_content() ?>
						<?php echo get_the_content() ?>
					<?php endwhile; ?>
				<?php endif; ?>

			</div>
		</div>
	</div>
	<?php get_footer() ?>