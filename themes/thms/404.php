<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package thms
 */

get_header(); ?>

<div class="row">
    <div class="col-md-8">

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'thms' ); ?></h1>

				<div class="page-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'thms' ); ?></p>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

        </div>
    <div class="col-md-4">

        <?php get_sidebar(); ?>

    </div>

<?php get_footer(); ?>
