<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package thms
 */

?>

<div class="side">

<?php
    $post_type=get_post_type();

    if ($post_type == 'news') : ?>

    <a class="button" href="<?php echo get_permalink(9); ?>"><?php _e('[:cs]Všechny novninky[:en]View all news'); ?></a>

    <?php endif; ?>

    <section class="upcoming mt60">

        <h3 class="title"><?php _e('[:cs]Nadcházející koncerty[:en]Upcoming events'); ?></h3>

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
            'posts_per_page'    => 8,

        );

        $the_query = new WP_Query($args);

        while ($the_query->have_posts()) : $the_query->the_post(); ?>


            <div class="side-akce">

                <?php

                $timestamp = strtotime(get_field('datum_akce'));

                ?>
                <span class="datum"><?php echo date_i18n('d-m',$timestamp);?></span>

                <span class="nazev"><?php the_title(); ?></span>
                <span class="info"><?php the_field('location'); ?></span>


            </div>


        <?php endwhile; wp_reset_postdata(); ?>

    </section>
    <!--
       <section class="recent">

           <h3 class="title">Recent news</h3>

        </section>

    -->

</div>