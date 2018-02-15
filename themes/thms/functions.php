<?php
/**
 * thms functions and definitions
 *
 * @package thms
 */

if ( ! function_exists( 'thms_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function thms_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on thms, use a find and replace
	 * to change 'thms' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'thms', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'thms' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'thms_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // thms_setup
add_action( 'after_setup_theme', 'thms_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function thms_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'thms_content_width', 640 );
}
add_action( 'after_setup_theme', 'thms_content_width', 0 );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function thms_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'thms' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'thms_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function thms_scripts() {
	wp_enqueue_style( 'thms-style', get_stylesheet_uri() );

    // wp_deregister_script('jquery');

    // wp_enqueue_script( 'thms-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

    wp_enqueue_script('easing', get_template_directory_uri() . '/js/jquery.easing.1.3.js', array('jquery'), null, true);
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), null, true);
    wp_enqueue_script('owl', get_template_directory_uri() . '/owl-carousel/owl.carousel.min.js', array('jquery'), null, true);
    wp_enqueue_script('smoothscroll', get_template_directory_uri() . '/js/SmoothScroll.js', array('jquery'), null, true);
    wp_enqueue_script('stellar', get_template_directory_uri() . '/js/jquery.stellar.js', array('jquery'), null, true);
    wp_enqueue_script('script', get_template_directory_uri() . '/js/script.js', array('jquery'), null, true);

	wp_enqueue_script( 'thms-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'thms_scripts' );



/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';



// Excerpt


function custom_excerpt_length( $length ) {
    return 12;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );


function new_excerpt_more( $more ) {
    return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');




// Image sizes
add_image_size( 'news-thumbnail', 960, 960, true );
add_image_size( 'full-width', 1920, 9999);



//----------------------------------------------------------------------------------


// Register Custom Taxonomy
function taxonomy_events() {

    $labels = array(
        'name'                       => _x( 'Categories', 'Taxonomy General Name', 'text_domain' ),
        'singular_name'              => _x( 'Category', 'Taxonomy Singular Name', 'text_domain' ),
        'menu_name'                  => __( 'Categories', 'text_domain' ),
        'all_items'                  => __( 'All Items', 'text_domain' ),
        'parent_item'                => __( 'Parent Item', 'text_domain' ),
        'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
        'new_item_name'              => __( 'New Item Name', 'text_domain' ),
        'add_new_item'               => __( 'Add New Item', 'text_domain' ),
        'edit_item'                  => __( 'Edit Item', 'text_domain' ),
        'update_item'                => __( 'Update Item', 'text_domain' ),
        'view_item'                  => __( 'View Item', 'text_domain' ),
        'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
        'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
        'popular_items'              => __( 'Popular Items', 'text_domain' ),
        'search_items'               => __( 'Search Items', 'text_domain' ),
        'not_found'                  => __( 'Not Found', 'text_domain' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,

    );
    register_taxonomy( 'events-category', array( 'events' ), $args );

}

// Hook into the 'init' action
add_action( 'init', 'taxonomy_events', 0 );


// Register Custom Post Type
function custom_post_events() {

    $labels = array(
        'name'                => _x( 'Events', 'Post Type General Name', 'text_domain' ),
        'singular_name'       => _x( 'Event', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'           => __( 'Events', 'text_domain' ),
        'name_admin_bar'      => __( 'Events', 'text_domain' ),
        'parent_item_colon'   => __( 'Parent Item:', 'text_domain' ),
        'all_items'           => __( 'All Items', 'text_domain' ),
        'add_new_item'        => __( 'Add New Item', 'text_domain' ),
        'add_new'             => __( 'Add New', 'text_domain' ),
        'new_item'            => __( 'New Item', 'text_domain' ),
        'edit_item'           => __( 'Edit Item', 'text_domain' ),
        'update_item'         => __( 'Update Item', 'text_domain' ),
        'view_item'           => __( 'View Item', 'text_domain' ),
        'search_items'        => __( 'Search Item', 'text_domain' ),
        'not_found'           => __( 'Not found', 'text_domain' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
    );
    $args = array(
        'label'               => __( 'events', 'text_domain' ),
        'description'         => __( 'Post Type Description', 'text_domain' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor','excerpt', 'thumbnail' ),
        'taxonomies'          => array( 'akce' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 8,
        'show_in_admin_bar'   => true,
        'show_in_nav_menus'   => true,
        'can_export'          => true,
        'has_archive'         => false,
        'exclude_from_search' => false,
        'rewrite'             => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );
    register_post_type( 'events', $args );

}

// Hook into the 'init' action
add_action( 'init', 'custom_post_events', 0 );



// Register Custom Post Type
function custom_post_news() {

    $labels = array(
        'name'                => _x( 'News', 'Post Type General Name', 'text_domain' ),
        'singular_name'       => _x( 'News', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'           => __( 'News', 'text_domain' ),
        'name_admin_bar'      => __( 'News', 'text_domain' ),
        'parent_item_colon'   => __( 'Parent Item:', 'text_domain' ),
        'all_items'           => __( 'All Items', 'text_domain' ),
        'add_new_item'        => __( 'Add New Item', 'text_domain' ),
        'add_new'             => __( 'Add New', 'text_domain' ),
        'new_item'            => __( 'New Item', 'text_domain' ),
        'edit_item'           => __( 'Edit Item', 'text_domain' ),
        'update_item'         => __( 'Update Item', 'text_domain' ),
        'view_item'           => __( 'View Item', 'text_domain' ),
        'search_items'        => __( 'Search Item', 'text_domain' ),
        'not_found'           => __( 'Not found', 'text_domain' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
    );
    $args = array(
        'label'               => __( 'news', 'text_domain' ),
        'description'         => __( 'Post Type Description', 'text_domain' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor','excerpt','thumbnail' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 4,
        'show_in_admin_bar'   => true,
        'show_in_nav_menus'   => true,
        'can_export'          => true,
        'has_archive'         => false,
        'rewrite'             => false,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        //'capability_type'     => 'page',
    );
    register_post_type( 'news', $args );

}

// Hook into the 'init' action
add_action( 'init', 'custom_post_news', 0 );


// Register Custom Post Type
function custom_post_partners() {

    $labels = array(
        'name'                => _x( 'Partners', 'Post Type General Name', 'text_domain' ),
        'singular_name'       => _x( 'Partner', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'           => __( 'Partners', 'text_domain' ),
        'name_admin_bar'      => __( 'Partners', 'text_domain' ),
        'parent_item_colon'   => __( 'Parent Item:', 'text_domain' ),
        'all_items'           => __( 'All Items', 'text_domain' ),
        'add_new_item'        => __( 'Add New Item', 'text_domain' ),
        'add_new'             => __( 'Add New', 'text_domain' ),
        'new_item'            => __( 'New Item', 'text_domain' ),
        'edit_item'           => __( 'Edit Item', 'text_domain' ),
        'update_item'         => __( 'Update Item', 'text_domain' ),
        'view_item'           => __( 'View Item', 'text_domain' ),
        'search_items'        => __( 'Search Item', 'text_domain' ),
        'not_found'           => __( 'Not found', 'text_domain' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
    );
    $args = array(
        'label'               => __( 'partners', 'text_domain' ),
        'description'         => __( 'Post Type Description', 'text_domain' ),
        'labels'              => $labels,
        'supports'            => array( 'title','thumbnail' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 9,
        'show_in_admin_bar'   => true,
        'show_in_nav_menus'   => true,
        'can_export'          => true,
        'has_archive'         => false,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );
    register_post_type( 'partners', $args );

}

// Hook into the 'init' action
add_action( 'init', 'custom_post_partners', 0 );

if (function_exists('acf_add_options_page')) {

    acf_add_options_page(array(
        'page_title' => 'Showcase Settings',
        'menu_title' => 'Showcase',
        'menu_slug' => 'showcase-settings',
        'redirect' => false
    ));
}