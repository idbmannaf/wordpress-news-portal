<?php get_header() ?>

<body <?php body_class(); ?>>
	<?php get_template_part('hero') ?>

	<!-- Single News Start-->
	<div class="single-news">
		<div class="container mb-3">
			<?php
			$tag = get_queried_object() ?>
			<h3>Posted By:
				<?php
				if (is_month()) {
					$month = get_query_var('monthnum');
					$dateobj = DateTime::createFromFormat('!m', $month);
					echo  $dateobj->format('F');
				} elseif (is_year()) {
					$year = get_query_var('year');
					echo $year;
				} elseif (is_day()) {
					$day = get_query_var('day') . "/" . get_query_var('monthnum') . "/" . get_query_var('year');;
					echo $day;
				}
				?>
			</h3>

		</div>
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="row">
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
								<div class="col-md-6 mb-2">
									<div class="card">
										<div class="card-body">
											<div class="card-image"><img src="<?php the_post_thumbnail_url(); ?>" class="img-fluid" alt="" srcset=""></div>
											<div class="card-title"><a href="<?php the_permalink(); ?>"><?php $title = get_the_title();
																										echo mb_substr($title, 0, 40); ?>...</a></div>
											<div class="card-content">
												<p><?php $title = get_the_excerpt();
													echo mb_substr($title, 0, 140); ?>.<a href="<?php the_permalink(); ?>">Read More</a>
												</p>
											</div>
											<div class="card-footer d-flex justify-content-between card-footer-custom-design">
												<?php the_category(); ?>
												<p><?php echo get_the_author_posts_link() ?></p>
											</div>
										</div>
									</div>
								</div>
							<?php endwhile; ?>
						<?php else : ?>
							<div class="col-md-12 text-center text-danger">Post Not Found In this Tags</div>
						<?php endif; ?>
					</div>
				</div>

				<div class="col-lg-4">
					<?php echo get_template_part('/template-parts/sidebar') ?>
				</div>
			</div>
		</div>
		<!-- Single News End-->



		<?php get_footer() ?>