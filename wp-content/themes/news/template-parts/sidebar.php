<?php if (is_single()) : ?>
	<div class="sidebar">
		<div class="sidebar-widget">
			<h2 class="sw-title">Relevant Post</h2>
			<div class="news-list">

				<?php
				$cat_id = '';
				$catName = '';
				foreach (get_the_category() as $category) {
					$cat_id = $category->term_id;
					$catName = $category->name;
				}
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
	<?php elseif (is_tag()) : ?>

		<div class="sidebar">
			<div class="sidebar-widget text-center">
				<h2 class="sw-title">Latest Post</h2>
				<div id="latest" ">
            <?php
			$q = array(
				'post_type' => 'post',
				'posts_per_page' => 5,
				'post__not_in' => get_option('sticky_posts')
			);
			$all_post = new WP_Query($q);
			?>
            <?php if ($all_post->have_posts()) : while ($all_post->have_posts()) : $all_post->the_post(); ?>
                <div class=" tn-news">
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

		<div class="sidebar-widget text-center">
			<div class="image">
				<?php if (is_active_sidebar('single-left-ads')) {
					dynamic_sidebar('single-left-ads');
				} ?>
			</div>
		</div>
	</div>
<?php elseif (is_category()) : ?>

	<div class="sidebar">
		<div class="sidebar-widget text-center archive-sidebar">
			<h3 class="title">Calender</h3>
			<?php if (is_active_sidebar('after-middle-footer')) {
				dynamic_sidebar('after-middle-footer');
			} ?>

		</div>

		<div class="sidebar-widget text-center">
			<div class="image">
				<?php if (is_active_sidebar('single-left-ads')) {
					dynamic_sidebar('single-left-ads');
				} ?>
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

<?php endif; ?>