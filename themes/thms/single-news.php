<?php
/**
 * The template for displaying all single posts.
 *
 * @package thms
 */

get_header(); ?>

<div class="row">
    <div class="col-md-8">

        <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">

                <?php while ( have_posts() ) : the_post(); ?>

                    <?php get_template_part( 'template-parts/content', 'single-news' ); ?>

                    <?php // the_post_navigation(); ?>


                <?php endwhile; // End of the loop. ?>

            </main><!-- #main -->
        </div><!-- #primary -->

    </div>
    <div class="col-md-4">

        <?php get_sidebar(); ?>



    </div>
</div>
<?php get_footer(); ?>
