<?php
/**
 * Grit functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package grit
 */

if ( ! function_exists( 'grit_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function grit_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on grit, use a find and replace
		 * to change 'grit' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'grit', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );
        // add_theme_support( 'post-thumbnails' );
		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'grit' ),
		) );
		register_nav_menus( array(
			'footer-menu' => esc_html__( 'Footer', 'grit' ),
		) );
		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );
		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'grit_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );
		/**
		 * This theme styles the visual editor to resemble the theme style,
		 * specifically font, colors, and column width.
		 */
		add_editor_style( '/assets/css/editor-style.css', 'grit' );
		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );
		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'grit_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function grit_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'grit_content_width', 840 );
}
add_action( 'after_setup_theme', 'grit_content_width', 0 );
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function grit_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'grit' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'grit' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer-social', 'grit' ),
		'id'            => 'footer',
		'description'   => esc_html__( 'Add widgets here.', 'grit' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	require get_template_directory() . '/inc/widgets/social.php';
}
add_action( 'widgets_init', 'grit_widgets_init' );

	// Custom Theme Functions
	require get_template_directory() . '/inc/widgets/recentpost.php';
	require get_template_directory() . '/inc/lib/print_styles.php';
	require get_template_directory() . '/inc/lib/related-post.php';
	require get_template_directory() . '/inc/lib/breadcrumb.php';

	// Custom Theme Image Sizes
	add_image_size( 'grit_full_banner', 1920, 1000, array( 'top', 'center' ) );//ok
	add_image_size( 'grit_post_preview', 600, 375,  array( 'top', 'center' ) ); //latestnews, blog, archive, search
	add_image_size( 'grit_process_medium', 400, 470,  array( 'top', 'center' ) );
	add_image_size( 'grit_recent_posts', 50, 50,  array( 'top', 'center' ) );
	add_image_size( 'grit_related_posts', 262, 163,  array( 'top', 'center' ) );
	add_image_size( 'grit_single_product', 270, 343,  array( 'top', 'center' ) );
	add_image_size( 'grit_portfolio-default', 363, 312,  array( 'top', 'center' ) );
	add_image_size( 'grit_process-default', 360, 463,  array( 'top', 'center' ) );
	add_image_size( 'grit_latest_news', 263, 163,  array( 'top', 'center' ) );
	add_image_size('grit_blog_image', 262, 163,  array( 'top', 'center' ));

/**
 * Font options
 */
function grit_demo_fonts() {
	// Font options
	$fonts = array(
		get_theme_mod( 'grit_paragraph_font_family', grit_customizer_library_get_default( 'primary-font' ) ),
		get_theme_mod( 'grit_heading_font_family', grit_customizer_library_get_default( 'secondary-font' ) ),
	);
	$font_uri = grit_customizer_library_get_google_font_uri( $fonts );
	// Load Google Fonts
	wp_enqueue_style( 'grit-demo-fonts', $font_uri, array(), null, 'screen' );
}
add_action( 'wp_enqueue_scripts', 'grit_demo_fonts' );

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

/**
 * Enqueue css styles.
 */
function grit_styles() {
	wp_enqueue_style( 'grit-bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css' );
	wp_enqueue_style( 'grit-font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.css' );
	wp_enqueue_style( 'grit-owl-carousel', get_template_directory_uri() . '/assets/css/owl.carousel.css' );
	wp_enqueue_style( 'grit-owl-theme', get_template_directory_uri() . '/assets/css/owl.theme.css' );
	wp_enqueue_style( 'grit-animate', get_template_directory_uri() . '/assets/css/animate.css' );
	wp_enqueue_style( 'grit-style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'grit-googleapis', 'https://fonts.googleapis.com/css?family=PT+Serif:400,400i,700|Montserrat:100,200,300,300i,400,500,600,700,800,900' );    
}
add_action( 'wp_enqueue_scripts', 'grit_styles' );

/**
 * Enqueue Script for IE8 support
 */
function add_ie_support() {
	$script = '<!--[if IE]>';
	$script .= '<meta http-equiv="x-ua-compatible" content="IE=9" />';
	$script .= '<![endif]-->'; 
	echo $script;
}
add_action( 'wp_head', 'add_ie_support' );

/**
 * Enqueue Script for IE9 support
 */
function add_ie8_support() {
	$script = '<!--[if lt IE 9]>';
	$script .= '<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>';
	$script .= '<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>';
	$script .= '<![endif]-->'; 
	echo $script;
}
add_action( 'wp_head', 'add_ie8_support' );

/**
 * Enqueue js scripts.
 */
function grit_scripts() {
	wp_enqueue_script( 'jquery' ); 
	wp_enqueue_script( 'grit-navigation',get_template_directory_uri() . '/assets/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'grit-skip-link-focus-fix',get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true );   
	wp_enqueue_script( 'grit-bootstrap-js',get_template_directory_uri() . '/assets/js/bootstrap.js', array(), '20151215', true );    
	wp_enqueue_script( 'grit-SmoothScroll-js',get_template_directory_uri() . '/assets/js/SmoothScroll.js', array(), '20151215', true );
	wp_enqueue_script( 'grit-jquery-isotope',get_template_directory_uri() . '/assets/js/jquery.isotope.js', array(), '20151215', true );   
	wp_enqueue_script( 'grit-owl-carousel',get_template_directory_uri() . '/assets/js/owl.carousel.js', array(), '20151215', true );    
	wp_enqueue_script( 'grit-jquery-waypoints',get_template_directory_uri() . '/assets/js/jquery.waypoints.min.js', array(), '20151215', true );
	wp_enqueue_script( 'grit-main',get_template_directory_uri() . '/assets/js/main.js', array(), '20151215', true );
	wp_enqueue_script( 'grit-wow',get_template_directory_uri() . '/assets/js/wow.min.js', array(), '20151215', true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'grit_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Customizer Library for fonts
 */
if ( file_exists ( get_template_directory() . '/inc/customizer-library.php' ) ) :
// Helper library for the theme customizer.
	require get_template_directory() . '/inc/customizer-library.php';
endif;

/**
 * Jetpack excerpt support for testimonials
 */
function grit_add_excerpt_testimonial() {
	add_post_type_support( 'jetpack-testimonial', 'excerpt' );
}
add_action( 'init', 'grit_add_excerpt_testimonial' );
