<?php get_header() ?>

<body <?php body_class(); ?>>
    <?php get_template_part('hero') ?>

    <div class="container my-3">

        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <div class="movie_title">
                    <h1><?php the_title() ?></h1>
                    <p><b>Duration: </b><?php echo get_post_meta(get_the_ID(), 'duration', TRUE); ?></p>
                    <div class="row">
                        <div class="col-md-4">
                            <?php the_post_thumbnail('large',array('class'=>'img-fluid')); ?>
                        </div>
                        <div class="col-md-8">
                            <?php the_excerpt(); ?>
                            <div class="director"><b>Director: </b> <?php echo get_post_meta(get_the_ID(), 'director', TRUE); ?></div>
                            <div class="writer"><b>Writer: </b> <?php echo get_post_meta(get_the_ID(), 'writer', TRUE); ?></div>
                            <div class="actor">
                                <b>Actor: </b>
                                <?php
                                foreach (get_the_terms(get_the_ID(), 'actor') as $tax) {
                                    echo '<div class="badge bg-dark  m-2"> <a target="_blank" href="' . get_term_link($tax->slug, 'actor') . '">' . esc_html($tax->name) . '</a></div>';
                                }
                                ?>
                            </div>
                            <div class="category">
                                <b>Category: </b>
                                <?php
                                foreach (get_the_terms(get_the_ID(), 'moviecategory') as $tax) {
                                    echo '<div class="badge bg-dark m-2"> <a target="_blank" href="' . get_term_link($tax->slug, 'moviecategory') . '">' . esc_html($tax->name) . '</a></div>';
                                }
                                ?>
                            </div>
                            <div class="tags">
                                <b>Tags: </b>
                                <?php
                                $terms = get_the_terms(get_the_ID(), 'mtag');
                                if ($terms != null) {
                                    foreach ($terms as $tax) {
                                        echo '<div class="badge bg-dark m-2"> <a target="_blank" href="' . get_term_link($tax->slug, 'mtag') . '">' . esc_html($tax->name) . '</a></div>';
                                    }
                                }
                                ?>
                            </div>
                            <div class="download">
                                <p class="btn btn-info">Download</p>
                                <p class="btn btn-info">Watch Online</p>
                            </div>
                        </div>
                    </div>
                    <div class="movie_details">
                        <?php the_content(); ?>
                    </div>
                    <div class="navigation d-flex justify-content-between border-1">
                        <div><?php next_post_link() ?></div>
                        <div><?php previous_post_link() ?></div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
    <?php get_footer() ?>