<?php
/**
 * The template for displaying all pages.
 * Template name: Tour - Previous
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


        <?php while ( have_posts() ) : the_post(); ?>

            <?php //the_content(); ?>


            <div class="tour-nav">

                <a href="<?php echo get_permalink(56); ?>"><?php _e('[:cs]Nadcházející[:en]Upcoming'); ?></a>
                <span class="current"><?php _e('[:cs]Odehrané[:en]Previous'); ?></span>



            </div>




            <div class="tour-list">

                <?php

                $today = date( 'Ymd' );

                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

                $args = array(
                    'post_type'         => 'events',
                    'post_status'       => 'publish',
                    'orderby'			=> 'meta_value_num',
                    'meta_query' => array(
                        array(
                            'key'		=> 'datum_akce',
                            'compare'	=> '<',
                            'value'		=> $today,
                        )
                    ),
                    'order'				=> 'DESC',
                    'posts_per_page'    => 6,
                    'paged' => $paged

                );

                $the_query = new WP_Query($args);


                while ($the_query->have_posts()) : $the_query->the_post(); ?>


                    <div class="tour-box acc-group">

                        <div class="acc-head">



                            <?php

                            $timestamp = strtotime(get_field('datum_akce'));

                            ?>

                            <div class="date-box"><?php echo date_i18n('d-m',$timestamp); ?></div>



                            <h3><?php the_title();  ?></h3>



                        </div>

                        <div class="acc-content">

                            <div class="img-holder" style="background-image: url(<?php echo wp_get_attachment_image_src( get_post_thumbnail_id(), 'news-thumbnail')[0];?>);">
                            </div>
                            <div class="event-info">
                                <h4 class="misto-akce"><?php the_field('location'); ?></h4>
                                <h4 class="cas-akce"><?php the_field('cas_akce'); ?></h4>
                                <h4 class="cena-akce"><?php the_field('event_price'); ?></h4>
                            </div>


                        </div>

                    </div>







                <?php endwhile; ?>

            </div>







            <?php  wp_reset_postdata(); ?>
        <?php endwhile; // End of the loop. ?>

    </main><!-- #main -->
</div><!-- #primary -->




<?php get_footer(); ?>
