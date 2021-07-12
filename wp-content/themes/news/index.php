<?php get_header() ?>

<body <?php body_class(); ?>>
    <?php get_template_part('hero') ?>
    <!-- Top News Start-->
    <?php apply_filters('this_popup', '1'); ?>
    <div class="top-news">
        <div class="container mb-3">
            <!--  News Sticker Start-->
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex justify-content-between align-items-center breaking-news bg-white" id="news-sticker">
                        <div
                                class="d-flex flex-row flex-grow-1 flex-fill justify-content-center bg-danger py-2 text-white px-1 news">
                            <span class="d-flex align-items-center">&nbsp;Breaking News</span>
                        </div>
                        <marquee class="news-scroll" behavior="scroll" direction="left" onmouseover="this.stop();"
                                 onmouseout="this.start();">
                            <?php if (have_posts()):while (have_posts()):the_post(); ?>
                             <a href="<?php the_permalink(); ?>"><?php $title= get_the_title(); echo mb_substr($title,0,30)."...";?> <span class="dot"></span></a>
                            <?php endwhile; ?>
                            <?php else: ?>
                                <a href="#" class="text-danger">No Post Found</a>
                            <?php endif; ?>
                        </marquee>
                    </div>
                </div>
            </div>
            <!--            News Sticker End-->
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-6 tn-left">
                    <div class="row tn-slider">
                        <?php
                        $args = array(
                            'post_type'      => 'post',
                            'posts_per_page' => '10',
                            'post__not_in' => get_option('sticky_posts'),
                        );

                        $query = new WP_Query($args); ?>
                        <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
                                <div class="col-md-6">
                                    <div class="tn-img cus-slider-img">
                                        <?php if (the_post_thumbnail()) ?>
                                        <div class="tn-title">
                                            <a href="<?php the_permalink(); ?>"><?php $title = get_the_title();
                                                                                echo mb_substr($title, 0, 30);
                                                                                ?></a>
                                        </div>
                                    </div>
                                </div>

                            <?php endwhile; ?>
                        <?php endif; ?>

                    </div>
                </div>
                <div class="col-md-6 tn-right">
                    <div class="row">
                        <?php

                        $post_type= '';
                        $offset= '';
                        if ( WP_PLUGIN_DIR.'/custom-post' ) {
	                        $post_type= 'movie';
	                        $offset='';
                        }else{
	                        $post_type= 'post';
	                        $offset=3;
                        }
//                        echo  WP_PLUGIN_DIR.'/custom-post';
//
                        $args = array(
                            'post_type'      => $post_type,
                            'posts_per_page' => '4',
                            'post__not_in' => get_option('sticky_posts'),
                            'offset' => $offset

                        );

                        $query = new WP_Query($args); ?>
                        <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
                                <div class="col-md-6">
                                    <div class="tn-img cus-img">
                                        <?php if (the_post_thumbnail()) ?>
                                        <div class="tn-title">
                                            <a title="<?php the_title() ?>" href="<?php the_permalink(); ?>"><?php $title = get_the_title();
                                                                                                                echo mb_substr($title, 0, 20);
                                                                                                                ?></a>
                                        </div>
                                    </div>
                                </div>

                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Top News End-->

    <!-- Category News Start-->
    <div class="cat-news">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2>Sports</h2>
                    <div class="row cn-slider">
                        <?php
                        $cat_arg = array(
                            'cat' => 2,
                            'post_type'      => 'post',
                        );
                        $sport_post = new WP_Query($cat_arg);
                        ?>
                        <?php if ($sport_post->have_posts()) : while ($sport_post->have_posts()) : $sport_post->the_post(); ?>
                                <div class="col-md-6">
                                    <div class="cn-img">
                                        <?php if (the_post_thumbnail()) ?>
                                        <div class="cn-title">
                                            <a title="<?php the_title() ?>" href="<?php the_permalink(); ?>"><?php $title = get_the_title();
                                                                                                                echo mb_substr($title, 0, 20);
                                                                                                                ?></a>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <h2>Technology</h2>
                    <div class="row cn-slider">
                        <?php
                        $cat_arg = array(
                            'cat' => 7,
                            'post_type'      => 'post',
                        );
                        $sport_post = new WP_Query($cat_arg);
                        ?>
                        <?php if ($sport_post->have_posts()) : while ($sport_post->have_posts()) : $sport_post->the_post(); ?>
                                <div class="col-md-6">
                                    <div class="cn-img">
                                        <?php if (the_post_thumbnail()) ?>
                                        <div class="cn-title">
                                            <a title="<?php the_title() ?>" href="<?php the_permalink(); ?>"><?php $title = get_the_title();
                                                                                                                echo mb_substr($title, 0, 20);
                                                                                                                ?></a>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Category News End-->

    <!-- Category News Start-->
    <div class="cat-news">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2>Business</h2>
                    <div class="row cn-slider">
                        <?php
                        $cat_arg = array(
                            'cat' => 3,
                            'post_type'      => 'post',
                        );
                        $sport_post = new WP_Query($cat_arg);
                        ?>
                        <?php if ($sport_post->have_posts()) : while ($sport_post->have_posts()) : $sport_post->the_post(); ?>
                                <div class="col-md-6">
                                    <div class="cn-img">
                                        <?php if (the_post_thumbnail()) ?>
                                        <div class="cn-title">
                                            <a title="<?php the_title() ?>" href="<?php the_permalink(); ?>"><?php $title = get_the_title();
                                                                                                                echo mb_substr($title, 0, 20);
                                                                                                                ?></a>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <h2>Entertainment</h2>
                    <div class="row cn-slider">
                        <?php
                        $b_q = array(
                            'cat' => '6'
                        );
                        $bs_post = new WP_Query($b_q);
                        ?>
                        <?php if ($bs_post->have_posts()) : while ($bs_post->have_posts()) : $bs_post->the_post(); ?>
                                <div class="col-md-6">
                                    <div class="cn-img">
                                        <?php if (the_post_thumbnail()) ?>
                                        <div class="cn-title">
                                            <a title="<?php the_title() ?>" href="<?php the_permalink(); ?>"><?php $title = get_the_title();
                                                                                                                echo mb_substr($title, 0, 20);
                                                                                                                ?></a>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Category News End-->

    <!-- Tab News Start-->
    <div class="tab-news">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <ul class="nav nav-pills nav-justified">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="pill" href="#featured">Featured News</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="pill" href="#popular">Popular News</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="pill" href="#latest">Latest News</a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div id="featured" class="container tab-pane active">
                            <?php
                            $q = array(
                                'post_type' => 'post',
                                'posts_per_page' => 3,
                                'post__not_in' => get_option('sticky_posts'),
                                'offset' => 3,
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
                            <?php
                            $q = array(
                                'post_type' => 'post',
                                'posts_per_page' => 3,
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
                                'posts_per_page' => '3',
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

                <div class="col-md-6">
                    <ul class="nav nav-pills nav-justified">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="pill" href="#m-viewed">Most Viewed</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="pill" href="#m-read">Most Read</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="pill" href="#m-recent">Most Recent</a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div id="m-viewed" class="container tab-pane active">
                            <?php
                            $q = array(
                                'posts_per_page' => '3',
                                'orderby' => 'date',
                                'order'   => 'ASC',
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
                        <div id="m-read" class="container tab-pane fade">
                            <h1>COde hree</h1>
                        </div>
                        <div id="m-recent" class="container tab-pane fade">


                            <?php
                            $q = array(
                                'posts_per_page' => '3',
                                'post__not_in' => get_option('sticky_posts'),
                                'offset' => 6,
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
        </div>
    </div>
    <!-- Tab News Start-->

    <!-- Main News Start-->
    <div class="main-news">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="row">


                        <?php
                        $q = array(
                            'posts_per_page' => '9',
                            'post__not_in' => get_option('sticky_posts')
                        );
                        $all_post = new WP_Query($q);
                        ?>
                        <?php if ($all_post->have_posts()) : while ($all_post->have_posts()) : $all_post->the_post(); ?>
                                <div class="col-md-4">
                                    <div class="mn-img">
                                        <?php if (the_post_thumbnail()) ?>
                                        <div class="mn-title">
                                            <a title="<?php the_title() ?>" href="<?php the_permalink(); ?>"><?php $title = get_the_title();
                                                                                                                echo mb_substr($title, 0, 20);
                                                                                                                ?></a>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="mn-list">
                        <?php if (is_active_sidebar('sidebar-rss')) {
                            dynamic_sidebar('sidebar-rss');
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main News End-->
    <?php get_footer() ?>