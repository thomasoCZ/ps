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





        <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">

                <?php while ( have_posts() ) : the_post(); ?>
                        <?php the_content() ?>

                <?php endwhile; // End of the loop. ?>

            </div>
            </div> 

            </main><!-- #main -->
        </div><!-- #primary -->


<?php get_footer(); ?>
