<?php get_header() ?>

<body <?php body_class(); ?>>
	<?php get_template_part('hero') ?>

	<!-- Single News Start-->
	<div class="single-news">
		<div class="col-md-8 m-auto">Searched By : <b><?php echo get_search_query()?></b></div>
		<div class="container">
			<div class="row">
				<div class="col-md-8 mb-3">
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							<div class="col-md-10">
								<div class="sn-content">
									<h2 class="sn-title"> <a href="<?php the_permalink(); ?>"><?php the_title() ?></a> </h2>
									<?php the_post_thumbnail('medium', ['class' => 'img-fluid']); ?>
									<p><?php the_excerpt(); ?> <a href="<?php the_permalink(); ?>">Read More .....</a></p>
									<hr class="hr">
								</div>
							</div>
						<?php endwhile; ?>
					<?php endif; ?>
					<div class="col-md-4 m-auto">
                        <?php echo the_posts_pagination(array(
                                "screen_reader_text" => ' ',
                        )); ?></div>
				</div>

				<div class="col-lg-4">
					<div class="sidebar">
						<div class="sidebar-widget">
							<h2 class="sw-title">Calender
                                <?php
                                if (is_active_sidebar('search-side-calender')){
                                    dynamic_sidebar('search-side-calender');
                                }?>
						</div>

						<div class="sidebar-widget">
							<div class="image">
								<?php if (is_active_sidebar('single-left-ads')) {
									dynamic_sidebar('single-left-ads');
								} ?>
							</div>
						</div>


							<div class="sidebar-widget">
								<h2 class="sw-title">News Category</h2>
								<div class="category">
									<?php wp_nav_menu(
										array(
											'theme_location' => 'sp-left-cat-side',
											'menu_id' => "splcl",
										)
									); ?>
								</div>
							</div>

							<div class="sidebar-widget">
								<h2 class="sw-title">Tags Cloud</h2>
								<div class="tags">
									<?php
									$tags = get_tags(get_the_ID());
									$html = '<div class="post_tags">';
									foreach ($tags as $tag) {
										$tag_link = get_tag_link($tag->term_id);

										$html .= "<a href='{$tag_link}' title='{$tag->name} Tag' class='{$tag->slug}'>";
										$html .= "{$tag->name}</a>";
									}
									$html .= '</div>';
									echo $html;
									?>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Single News End-->


		<?php get_footer() ?>