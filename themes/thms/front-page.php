<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package thms
 */

get_header(); ?>

</div> <!-- .container -->

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

        <?php while ( have_posts() ) : the_post(); ?>





            <section class="hp-news">
                <div class="container">
                    <h2 class="steel"><?php _e('[:cs]Novinky [:en]Recent news'); ?></h2>

                    <div class="row">
                        <div id="slider-news" class="owl-carousel">


                            <?php
                            $args = array(
                                'post_type' => 'post',
                                'orderby' => 'date',
                                'order'   => 'DSC',
                                'post_status' => 'publish',
                                'posts_per_page' => 9,
                            );

                            $the_query = new WP_Query($args);


                            while ($the_query->have_posts()) : $the_query->the_post(); ?>






                                <div class="col-md-12">
                                    <a class="news-box" href="<?php echo get_permalink();?>">

                                        <div class="img-holder" style="background-image: url(<?php echo wp_get_attachment_image_src( get_post_thumbnail_id(), 'news-thumbnail')[0];?>);">

                                            <div class="date-box"><?php the_time('d-m'); ?></div>

                                        </div>

                                        <h3><?php the_title();  ?></h3>
                                        <p><?php the_excerpt(); ?></p>
                                    </a>
                                </div>



                            <?php endwhile; wp_reset_postdata(); ?>

                        </div>
                    </div>
                    <a href="<?php echo get_the_permalink(66); ?>" class="button"><?php _e('[:cs]Všechny novinky [:en]More news'); ?></a>
                </div>
            </section>


            <section class="events dark">
                <div class="container">

                    <h2 class="steel"><?php _e('[:cs]Nadcházející akce [:en]Upcoming events'); ?></h2>
                    <h4 class="understeel"><?php _e('[:cs]Pearly Seconds Live [:en]Pearly Seconds Live'); ?></h4>

                    <div class="hp-events">
                        <?php

                        $today = date( 'Ymd' );

                        $args = array(
                            'post_type'         => 'events',
                            'post_status'       => 'publish',
                            'orderby'			=> 'meta_value_num',
                            'meta_query' => array(
                                array(
                                    'key'		=> 'datum_akce',
                                    'compare'	=> '>=',
                                    'value'		=> $today,
                                )
                            ),
                            'order'				=> 'ASC',
                            'posts_per_page'    => 5,

                        );

                        $the_query = new WP_Query($args);


                        while ($the_query->have_posts()) : $the_query->the_post(); ?>

                            <div class="hp-event">

                                <?php

                                $timestamp = strtotime(get_field('datum_akce'));

                                ?>
                                <span class="datum"><?php echo date_i18n('d-m-Y',$timestamp); ?></span>
                                <span class="nazev"><?php the_title(); ?></span>

                            </div>


                        <?php endwhile; wp_reset_postdata(); ?>

                    </div>

                    <a href="<?php echo get_the_permalink(56); ?>" class="button"><?php _e('[:cs]Všechny koncerty[:en]View all events'); ?></a>

                </div>




            </section>

            <section class="partners">
                <div class="container">
                    <div class="row">


                        <?php
                        $args = array(
                            'post_type' => 'partners',
                            'post_status' => 'publish',
                            'posts_per_page' => 5,
                        );

                        $the_query = new WP_Query($args);


                        while ($the_query->have_posts()) : $the_query->the_post(); ?>


                            <div class="col-x5">
                                <a target="_blank" href="<?php the_field('partner_link'); ?>" class="logo">
                                    <img src="<?php echo wp_get_attachment_image_src( get_post_thumbnail_id(), 'news-thumbnail')[0];?>">
                                </a>
                            </div>

                        <?php endwhile; wp_reset_postdata(); ?>


                    </div>

                </div>

            </section>

            <section class="hp-blocks dark">


                <a href="<?php echo get_permalink(82); ?>">
                    <div class="fifty v-wrap" style="background-image: url(<?php echo wp_get_attachment_image_src( get_post_thumbnail_id(82), 'news-thumbnail' )[0]; ?>);">

                        <span class="steel h-v-element"><?php echo get_the_title(82); ?></span>

                    </div>
                </a>


                <a href="<?php echo get_permalink(56); ?>">
                    <div class="fifty v-wrap" style="background-image: url(<?php echo wp_get_attachment_image_src( get_post_thumbnail_id(56), 'news-thumbnail' )[0]; ?>);">

                        <span class="steel h-v-element"><?php echo get_the_title(56); ?></span>

                    </div>
                </a>

                <a href="<?php echo get_permalink(71); ?>">
                    <div class="fifty v-wrap" style="background-image: url(<?php echo wp_get_attachment_image_src( get_post_thumbnail_id(71), 'news-thumbnail' )[0]; ?>);">

                        <span class="steel h-v-element"><?php echo get_the_title(71); ?></span>

                    </div>
                </a>


                <a href="<?php echo get_permalink(69); ?>">
                    <div class="fifty v-wrap" style="background-image: url(<?php echo wp_get_attachment_image_src( get_post_thumbnail_id(69), 'news-thumbnail' )[0]; ?>);">

                        <span class="steel h-v-element"><?php echo get_the_title(69); ?></span>

                    </div>
                </a>






            </section>






        <?php endwhile; // End of the loop. ?>


    </main><!-- #main -->
</div><!-- #primary -->




<?php // get_sidebar(); ?>


<div class="container">

    <?php get_footer(); ?>

