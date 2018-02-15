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



<div class="row">
    <div class="col-md-8">

        <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">


                <?php while ( have_posts() ) : the_post(); ?>


                    <?php get_template_part( 'template-parts/content', 'page' ); ?>





                <?php endwhile; // End of the loop. ?>

            </main><!-- #main -->
        </div><!-- #primary -->

    </div>

    <div class="col-md-4">
            <div class="clearfix"></div>
            <?php get_sidebar(); ?>

    </div>
</div>

<?php get_footer(); ?>
