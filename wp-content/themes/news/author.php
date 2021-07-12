<?php get_header() ?>
<body <?php body_class(); ?>>
<?php get_template_part('hero') ?>

<?php
$cat_id= '';
$catName= '';
foreach (get_the_category() as $category){
	$cat_id= $category->term_id;
	$catName= $category->name;

}

?>
<!-- Single News Start-->
<div class="single-news">
	<div class="container mb-3 col-md-6 text-center">
		<div class="auth-img">
            <?php echo get_avatar( get_the_author_meta( 'ID' ), 120 ); ?>
		</div>
        <div class="auth-name">
            <?php if (get_the_author_meta( 'first_name' )){
                 echo "<h2>".get_the_author_meta( 'first_name' )." ".get_the_author_meta( 'last_name' )."</h2>";
            }else{
                echo get_the_author_meta( 'user_login' );
            }
            ?>
        </div>
        <div class="auth-desc">
            <?php echo get_the_author_meta( 'description' ); ?>
        </div>
        <hr style="height: 2px; background-color: #aba9a9">
	</div>
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<div class="row">
                    <?php if (have_posts()) : while (have_posts()) : the_post();  ?>
						<div class="col-md-6 mb-2">
							<div class="card">
								<div class="card-body">
									<div class="card-image"><img src="<?php the_post_thumbnail_url(); ?>" class="img-fluid" alt="" srcset=""></div>
									<div class="card-title"><a href="<?php the_permalink(); ?>"><?php $title = get_the_title(); echo mb_substr($title,0,40);?>...</a></div>
									<div class="card-content">
										<p><?php $title = get_the_excerpt(); echo mb_substr($title,0,140);?>.<a href="<?php the_permalink(); ?>">Read More</a>
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
					<?php else: ?>
						<div class="col-md-12 text-center text-danger">Post Not Found In this Tags</div>
					<?php endif; ?>
				</div>
                <div class="col-md-4 m-auto">
                    <?php echo the_posts_pagination(array(
                            "screen_reader_text" => ' '
                    )); ?>
                </div>
			</div>

			<div class="col-lg-4">
				<div class="sidebar">
					<div class="sidebar-widget text-center">
						<h2 class="sw-title">Latest Post</h2>
						<div id="latest" ">
						<?php
						$q= array(
							'post_type' => 'post',
							'posts_per_page' => 5,
							'post__not_in' => get_option( 'sticky_posts' )
						);
						$all_post= new WP_Query($q);
						?>
						<?php  if ($all_post->have_posts()):while ($all_post->have_posts()): $all_post->the_post();?>
							<div class="tn-news">
								<div class="tn-img">
									<?php if (the_post_thumbnail()) ?>
								</div>
								<div class="tn-title">
									<a title="<?php the_title() ?>" href="<?php the_permalink(); ?>"><?php $title= get_the_title();
										echo mb_substr($title,0,20);
										?></a>
								</div>
							</div>
						<?php endwhile; ?>
						<?php endif; ?>
					</div>
				</div>

				<div class="sidebar-widget text-center">
					<div class="image">
						<?php if (is_active_sidebar('single-left-ads')){
							dynamic_sidebar('single-left-ads');
						} ?>
					</div>
				</div>


			</div>
		</div>
	</div>
</div>
<!-- Single News End-->



<?php get_footer() ?>
