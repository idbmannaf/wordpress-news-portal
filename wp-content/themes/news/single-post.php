<?php get_header() ?>

<body <?php body_class(); ?>>
	<?php get_template_part('hero') ?>

	<?php
	$cat_id = '';
	$catName = '';
	foreach (get_the_category() as $category) {
		$cat_id = $category->term_id;
		$catName = $category->name;
	}

	?>
	<!-- Single News Start-->
	<div class="single-news">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="sn-container">
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
								<h2 class="sn-title"><?php the_title() ?></h2>
								<div class="social-auth d-flex justify-content-between">
									<div class="date"><?php the_date() ?>, <?php the_time() ?></div>
									<div class="social-menu">

										<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_the_permalink(); ?>" target="_blank"> <i class="fab fa-facebook"></i></a>
										<a href="http://pinterest.com/pin/create/button/?url=<?php echo get_the_permalink(); ?> target=" _blank"> <i class="fab fa-pinterest"></i></a>

										<!--                                <i class="fab fa-linkedin"></i>-->
										<!--                                <i class="fab fa-instagram"></i>-->
									</div>
								</div>
								<hr style="height: 2px; background-color: #0c0c0c">
								<div class="d-img">
									<?php the_post_thumbnail('large', ['class' => 'img-fluid']); ?>
								</div>
								<div class="sn-content">
									<p><?php the_content(); ?></p>
								</div>
							<?php endwhile; ?>
						<?php endif; ?>
						<div class="navigation d-flex justify-content-between border-1">
							<div><?php next_post_link() ?></div>
							<div><?php previous_post_link() ?></div>
						</div>
					</div>
					<div class="sn-related">
						<h2>Related News</h2>
						<div class="row sn-slider">

							<?php
							$q = array(
								'cat' => $cat_id,
								'post__not_in' => array(get_the_ID())
							);
							$reletade_post = new WP_Query($q);


							?>
							<?php if ($reletade_post->have_posts()) : while ($reletade_post->have_posts()) : $reletade_post->the_post(); ?>
									<div class="col-md-4">
										<div class="sn-img">
											<?php the_post_thumbnail(); ?>
											<div class="sn-title">
												<a href="<?php the_permalink(); ?>"><?php $title = get_the_title();
																					echo mb_substr($title, 0, 30) ?></a>
											</div>
										</div>
									</div>
								<?php endwhile; ?>
							<?php endif; ?>

						</div>
					</div>

					<div class="comment">
						<div class="col-md-12">
							<?php if (comments_open() || get_comments_number()) :
								comments_template();
							endif; ?>
						</div>
					</div>
				</div>

				<div class="col-lg-4">
					<div class="sidebar">
						<div class="sidebar-widget">
							<h2 class="sw-title">Relevant Post</h2>
							<div class="news-list">

								<?php
								$q = array(
									'cat' => $cat_id,
									'posts_per_page' => 5
								);
								$relCatPost = new WP_Query($q);
								?>
								<?php if ($relCatPost->have_posts()) : while ($relCatPost->have_posts()) : $relCatPost->the_post(); ?>
										<div class="nl-item">
											<div class="nl-img">
												<?php the_post_thumbnail(); ?>
											</div>
											<div class="nl-title">
												<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
											</div>
										</div>
									<?php endwhile; ?>
								<?php endif; ?>
							</div>
						</div>

						<div class="sidebar-widget">
							<div class="image">
								<?php if (is_active_sidebar('single-left-ads')) {
									dynamic_sidebar('single-left-ads');
								} ?>
							</div>
						</div>

						<div class="sidebar-widget">
							<div class="tab-news">
								<ul class="nav nav-pills nav-justified">
									<li class="nav-item">
										<a class="nav-link active" data-toggle="pill" href="#featured">Featured</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" data-toggle="pill" href="#popular">Popular</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" data-toggle="pill" href="#latest">Latest</a>
									</li>
								</ul>

								<div class="tab-content">
									<div id="featured" class="container tab-pane active">
										<?php
										$q = array(
											'post_type' => 'post',
											'posts_per_page' => 5,
											"orderby" => 'date',
											'order' => "ASC",
											'post__not_in' => get_option('sticky_posts')
										);
										$all_post = new WP_Query($q);
										?>
										<?php if ($all_post->have_posts()) : while ($all_post->have_posts()) : $all_post->the_post(); ?>
												<div class="tn-news">
													<div class="tn-img">
														<?php if (the_post_thumbnail()) ?>
													</div>
													<div class="tn-title">
														<a title="<?php the_title() ?>" href="<?php the_permalink(); ?>"><?php $title = get_the_title();
																															echo mb_substr($title, 0, 20);
																															?></a>
													</div>
												</div>
											<?php endwhile; ?>
										<?php endif; ?>
									</div>
									<div id="popular" class="container tab-pane fade">
										<div id="featured" class="container tab-pane active">
											<?php
											$q = array(
												'post_type' => 'post',
												'posts_per_page' => 5,
												'post__in' => get_option('sticky_posts')
											);
											$all_post = new WP_Query($q);
											?>
											<?php if ($all_post->have_posts()) : while ($all_post->have_posts()) : $all_post->the_post(); ?>
													<div class="tn-news">
														<div class="tn-img">
															<?php if (the_post_thumbnail()) ?>
														</div>
														<div class="tn-title">
															<a title="<?php the_title() ?>" href="<?php the_permalink(); ?>"><?php $title = get_the_title();
																																echo mb_substr($title, 0, 20);
																																?></a>
														</div>
													</div>
												<?php endwhile; ?>
											<?php endif; ?>
										</div>
										<div id="latest" class="container tab-pane fade">
											<?php
											$q = array(
												'post_type' => 'post',
												'posts_per_page' => 5,
												'post__not_in' => get_option('sticky_posts')
											);
											$all_post = new WP_Query($q);
											?>
											<?php if ($all_post->have_posts()) : while ($all_post->have_posts()) : $all_post->the_post(); ?>
													<div class="tn-news">
														<div class="tn-img">
															<?php if (the_post_thumbnail()) ?>
														</div>
														<div class="tn-title">
															<a title="<?php the_title() ?>" href="<?php the_permalink(); ?>"><?php $title = get_the_title();
																																echo mb_substr($title, 0, 20);
																																?></a>
														</div>
													</div>
												<?php endwhile; ?>
											<?php endif; ?>
										</div>
									</div>
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