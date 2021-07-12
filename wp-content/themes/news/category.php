<?php get_header() ?>

<body <?php body_class(); ?>
    <?php get_template_part('hero') ?>

    <div class="container mb-3">
        <div class="col-md-12 text-center">
            <h1 class="page-cat-title"><?php echo single_cat_title() ?> (<span class="text-danger"><?php $catName = get_queried_object(); echo $catName->count; ?></span>)</h1>
        </div>
        <div class="row">
            <div class="col-md-8">
	            <?php
	            $category = get_queried_object();
	            $args = array(
		            'cat' => $category->term_id,
	            );
	            $cat_post = new WP_Query($args);
	            ?>
	            <?php if ($cat_post->have_posts()) : while ($cat_post->have_posts()) : $cat_post->the_post();  ?>
                    <div class="col-md-10">
                        <div class="sn-content">
                            <h2 class="sn-title"> <a href="<?php the_permalink(); ?>"><?php the_title() ?></a> </h2>
				            <?php the_post_thumbnail('medium', ['class' => 'img-fluid']); ?>
                            <p><?php the_excerpt(); ?> <a href="<?php the_permalink(); ?>">Read More .....</a></p>
                            <hr class="hr">
                        </div>
                    </div>
	            <?php endwhile; ?>
	            <?php else: ?>
                    <div class="col-md-10 text-center text-danger"> Post Not Found In this Category</div>
	            <?php endif; ?>
                <div class="col-md-4 m-auto">
		            <?php echo the_posts_pagination(array(
			            "screen_reader_text" => ' '
		            )); ?>
                </div>
            </div>
            <div class="col-md-4">

                    <div class="sidebar">
                        <div class="sidebar-widget text-center">
                            <div class="image">
			                    <?php if (is_active_sidebar('single-left-ads')){
				                    dynamic_sidebar('single-left-ads');
			                    } ?>
                            </div>
                        </div>
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
                </div>
            </div>
            </div>

    </div>






    <?php get_footer() ?>