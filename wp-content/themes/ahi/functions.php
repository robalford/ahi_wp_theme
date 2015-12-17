<?php
/**
 * AHI functions and definitions
 *
 * @package AHI
 */

if ( ! function_exists( 'ahi_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function ahi_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on AHI, use a find and replace
	 * to change 'ahi' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'ahi', get_template_directory() . '/languages' );

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
	add_image_size('front-page', 2590, 1200, true);
	add_image_size('about-page', 600, 400, true);
	add_image_size('press-page', 350, 450, true);
	add_image_size('book-page', 450, 450, true);
	
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'ahi' ),
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
	add_theme_support( 'custom-background', apply_filters( 'ahi_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // ahi_setup
add_action( 'after_setup_theme', 'ahi_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ahi_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'ahi_content_width', 2000 );
}
add_action( 'after_setup_theme', 'ahi_content_width', 0 );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function ahi_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'ahi' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'ahi_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function ahi_scripts() {
	wp_enqueue_style( 'ahi-style', get_stylesheet_uri() );
	
	if (is_page_template('page-templates/landing-page.php')) {
		wp_enqueue_style( 'ahi-landing-page', get_template_directory_uri() . '/layouts/landing-page.css' );
	} else if (is_page_template('page-templates/about-page.php')) {
		wp_enqueue_style( 'ahi-about-page', get_template_directory_uri() . '/layouts/about-page.css' );
	} else if (is_page_template('page-templates/portfolio-page.php')) {
		wp_enqueue_style( 'ahi-portfolio-page', get_template_directory_uri() . '/layouts/portfolio-page.css' );
	} else if (is_page_template('page-templates/press-page.php')) {
		wp_enqueue_style( 'ahi-press-page', get_template_directory_uri() . '/layouts/press-page.css' );
	} else if (is_page_template('page-templates/recognition-page.php')) {
		wp_enqueue_style( 'ahi-recognition-page', get_template_directory_uri() . '/layouts/recognition-page.css' );
	} else if (is_page_template('page-templates/full-portfolio-page.php')) {
		wp_enqueue_style( 'ahi-full-portfolio-page', get_template_directory_uri() . '/layouts/full-portfolio-page.css' );
	} else if (is_page_template('page-templates/all-about-page.php')) {
		wp_enqueue_style( 'ahi-all-about-page', get_template_directory_uri() . '/layouts/all-about-page.css' );
	} else if (is_page_template('page-templates/gallery-page.php')) {
		wp_enqueue_style( 'ahi-gallery-page', get_template_directory_uri() . '/layouts/gallery-page.css' );
	} else if (is_page_template('page-templates/magazine-page.php')) {
		wp_enqueue_style( 'ahi-magazine-page', get_template_directory_uri() . '/layouts/magazine-page.css' );
	} else if (is_page_template('page-templates/book-page.php')) {
		wp_enqueue_style( 'ahi-book-page', get_template_directory_uri() . '/layouts/book-page.css' );
	}
	else {
		wp_enqueue_style( 'ahi-content-sidebar', get_template_directory_uri() . '/layouts/content-sidebar.css' );
	}
	
	wp_enqueue_style( 'ahi-Google-Web-Fonts', 'http://fonts.googleapis.com/css?family=Muli:300,400' );
	
	wp_enqueue_style( 'ahi-fontawesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css' );
	
	wp_enqueue_script( 'ahi-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'ahi-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'ahi_scripts' );

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
