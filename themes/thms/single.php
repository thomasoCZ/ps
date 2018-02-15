<?php
/**
 * The template for displaying all single posts.
 *
 * @package thms
 */

get_header(); ?>


        <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">

            <div class="row">
                    <div class="col-md-8 col-md-offset-2">

                <?php while ( have_posts() ) : the_post(); ?>

                    <?php get_template_part( 'template-parts/content', 'single' ); ?>

                <?php endwhile; // End of the loop. ?>

                    </div>
                </div>

            </main><!-- #main -->
        </div><!-- #primary -->


<?php get_footer(); ?>
