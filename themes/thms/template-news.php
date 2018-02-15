<?php
/**
 * The template for displaying all pages.
 * Template name: News
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package thms
 */

get_header(); ?>



<div id="primary" class="content-area grey-bg">
    <main id="main" class="site-main" role="main">



               <?php //the_content(); ?>


                <div class="grid news-list row">

                    <?php

                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

                    $args = array(
                        'post_type' => 'news',
                        'orderby' => 'date',
                        'order'   => 'DSC',
                        'post_status' => 'publish',
                        'posts_per_page' => 12,
                        'paged' => $paged
                    );

                    $the_query = new WP_Query($args); ?>

                    <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>


                        <div class="grid-sizer"></div>
                        <div class="grid-item">
                            <a class="news-list-box" href="<?php echo get_permalink();?>">

                                <div class="img-holder" style="background-image: url(<?php echo wp_get_attachment_image_src( get_post_thumbnail_id(), 'news-thumbnail')[0];?>);">

                                    <div class="date-box"><?php the_time('d-m'); ?></div>

                                </div>

                                <h3><?php the_title();  ?></h3>
                                <p><?php the_excerpt(); ?></p>
                            </a>
                        </div>






                    <?php endwhile; ?>

                </div>



            <?php wp_pagenavi( array( 'query' => $the_query ) ); ?>



            <?php  wp_reset_postdata(); ?>

    </main><!-- #main -->
</div><!-- #primary -->




<?php get_footer(); ?>
