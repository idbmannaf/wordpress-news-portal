<?php get_header() ?>
<body <?php body_class(); ?>>
<?php get_template_part('hero') ?>

<div class="container">
	<div class="col-md-8 text-center m-auto py-3">
		<div class="image">
            <img src="<?php echo get_stylesheet_directory_uri() ?>/img/error-img.png">
        </div>
        <h3><span class="text-danger">Ohh.</span>....Your Requested Page Could Not Be Found!</h3>
        <a class="btn btn-danger" href="<?php bloginfo('url'); ?>"> Home</a>
		
	</div>
</div>

<?php get_footer() ?>

