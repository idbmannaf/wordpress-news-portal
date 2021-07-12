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
$tag = get_queried_object();
$count_post= $tag->count;
$tag_name= ucfirst($tag->name);
//echo $count_post;
$col = '';
if ($count_post == 1){
	$col= 'col-md-12';
}elseif ($count_post == 2){
	$col= 'col-md-6';
}elseif ($count_post == 3){
	$col= 'col-md-4';
}elseif ($count_post > 3){
	$col= 'col-md-3';
}
?>
<!-- Single News Start-->
<div class="single-news">
    <div class="container mb-3">
		<?php
		$tag = get_queried_object() ?>
        <h3><?php echo $tag_name; ?> (<span class="text-danger"><?php echo $count_post; ?></span>)</h3>

    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
					<?php if (have_posts()):while (have_posts()):the_post(); ?>
                        <div class="<?php echo $col ?> mb-2">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-image"><img src="<?php the_post_thumbnail_url(); ?>" class="img-fluid" alt="" srcset=""></div>
                                    <div class="card-title"><a href="<?php the_permalink(); ?>"><?php $title = get_the_title(); echo mb_substr($title,0,40);?>...</a></div>
                                    <div class="card-content">
                                        <p><?php $title = get_the_excerpt(); echo mb_substr($title,0,140);?>.<a href="<?php the_permalink(); ?>">Read More</a>
                                        </p>
                                    </div>
                                    <div class="card-footer ">
                                        <div class=" ">
                                            <b>Actor: </b>
		                                    <?php
		                                    foreach (get_the_terms(get_the_ID(), 'actor') as $tax) {
			                                    echo '<div class="badge bg-dark  m-2"> <a target="_blank" href="' . get_term_link($tax->slug, 'actor') . '">' . esc_html($tax->name) . '</a></div>';
		                                    }
		                                    ?>
                                        </div>
<!--                                        <div class=" ">-->
<!--                                            <b>Tags: </b>-->
<!--		                                    --><?php
//		                                    $terms = get_the_terms(get_the_ID(), 'mtag');
//		                                    if ($terms != null) {
//			                                    foreach ($terms as $tax) {
//				                                    echo '<div class="badge bg-dark m-2"> <a target="_blank" href="' . get_term_link($tax->slug, 'mtag') . '">' . esc_html($tax->name) . '</a></div>';
//			                                    }
//		                                    }
//		                                    ?>
<!--                                        </div>-->

                                    </div>
                                </div>
                            </div>
                        </div>
					<?php endwhile; ?>
					<?php else: ?>
                        <div class="col-md-12 text-center text-danger">Post Not Found In this Tags</div>
					<?php endif; ?>
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
