<?php
/**
 * Template part for displaying single posts.
 *
 * @package thms
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title page-title">', '</h1>' ); ?>

	</header><!-- .entry-header -->

	<div class="entry-content">

        <div class="news-image mb30"><?php the_post_thumbnail('full-width'); ?></div>
		<?php the_content(); ?>




	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php thms_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

