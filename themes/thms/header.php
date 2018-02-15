<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package thms
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

    <?php wp_head(); ?>
</head>


<body <?php body_class();?>>






    <div id="page" class="hfeed site">





        <header id="masthead" class="site-header v-wrap" role="banner">

            <nav id="site-navigation" class="main-navigation" role="navigation">


                <img class="menu-toggle v-element" src="<?php bloginfo( 'template_url' );?>/images/menu.png">

                <?php // echo qtranxf_generateLanguageSelectCode('image'); ?>

                <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>

            </nav><!-- #site-navigation -->

            <a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">

            </a>

            <div class="clearfix"></div>

        </header><!-- #masthead -->


        <div class="underimage">
            <?php $post_thumbnail_id = get_post_thumbnail_id(); ?>

<div class="v-wrap top-image<?php if(is_single()) { ?> smallheight<?php } ?>" style="background-image: url(<?php echo wp_get_attachment_image_src( $post_thumbnail_id, 'full-width')[0];?>);">

                <div class="h-v-element top-heading">
                    <?php the_title( '<h1 class="steel">', '</h1>' ); ?>
                    <?php if( get_field('subtitle') ): ?>
                        <span class="understeel">
                            <?php the_field('subtitle'); ?>
                        </span>

                    <?php endif; ?>

                </div>
            </div>

            <div class="scrolldown"></div>
        </div>


        <div class="stick-it"></div>


        <div id="content" class="site-content">

            <div class="container">



