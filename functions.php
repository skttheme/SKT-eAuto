<?php 
/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! function_exists( 'skt_eauto_setup' ) ) : 
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function skt_eauto_setup() {
	$GLOBALS['content_width'] = apply_filters( 'skt_eauto_content_width', 640 );
	load_theme_textdomain( 'skt-eauto', get_stylesheet_directory_uri() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support('woocommerce');
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_post_type_support( 'page', 'excerpt' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
	add_theme_support( 'custom-logo', array(
		'height'      => 62,
		'width'       => 226,
		'flex-height' => true,
	) );	
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'skt-eauto' )				
	) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff'
	) );
} 
endif; // skt_eauto_setup
add_action( 'after_setup_theme', 'skt_eauto_setup' );

function skt_coach_remove_parent_tgmpa() {
    remove_action( 'tgmpa_register', 'skt_coach_register_required_plugins' );
}
add_action( 'after_setup_theme', 'skt_coach_remove_parent_tgmpa', 1 );

function skt_eauto_widgets_init() { 	
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'skt-eauto' ),
		'description'   => esc_html__( 'Appears on sidebar', 'skt-eauto' ),
		'id'            => 'fc-pln-sidebar',
		'before_widget' => '',		
		'before_title'  => '<h3 class="widget-title titleborder"><span>',
		'after_title'   => '</span></h3><aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 1', 'skt-eauto' ),
		'description'   => esc_html__( 'Appears on page footer', 'skt-eauto' ),
		'id'            => 'fc-1-rfl',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',		
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
		'after_widget'  => '</aside>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 2', 'skt-eauto' ),
		'description'   => esc_html__( 'Appears on page footer', 'skt-eauto' ),
		'id'            => 'fc-2-rfl',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',		
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
		'after_widget'  => '</aside>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 3', 'skt-eauto' ),
		'description'   => esc_html__( 'Appears on page footer', 'skt-eauto' ),
		'id'            => 'fc-3-rfl',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',		
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
		'after_widget'  => '</aside>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 4', 'skt-eauto' ),
		'description'   => esc_html__( 'Appears on page footer', 'skt-eauto' ),
		'id'            => 'fc-4-rfl',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',		
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
		'after_widget'  => '</aside>',
	) );	
}
add_action( 'widgets_init', 'skt_eauto_widgets_init' );


add_action( 'wp_enqueue_scripts', 'skt_eauto_enqueue_styles' );
function skt_eauto_enqueue_styles() {
  wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' ); 
} 

add_action( 'wp_enqueue_scripts', 'skt_eauto_child_styles', 99);
function skt_eauto_child_styles() {
  wp_enqueue_style( 'skt-eauto-child-style', get_stylesheet_directory_uri()."/css/responsive.css" );
} 

function skt_eauto_admin_style() {
  wp_enqueue_script('skt-eauto-admin-script', get_stylesheet_directory_uri()."/js/skt-eauto-admin-script.js");
}
add_action('admin_enqueue_scripts', 'skt_eauto_admin_style');

function skt_eauto_admin_about_page_css_enqueue($hook) {
   if ( 'appearance_page_skt_eauto_guide' != $hook ) {
        return;
    }
    wp_enqueue_style( 'skt-eauto-about-page-style', get_stylesheet_directory_uri() . '/css/skt-eauto-about-page-style.css' );
}
add_action( 'admin_enqueue_scripts', 'skt_eauto_admin_about_page_css_enqueue' );

function skt_eauto_admin_css_style() {
  wp_enqueue_style('skt-eauto-admin-style', get_stylesheet_directory_uri()."/css/skt-eauto-admin-style.css");
}
add_action('admin_enqueue_scripts', 'skt_eauto_admin_css_style');

function skt_eauto_dequeue_skt_coach_custom_js() {
	wp_dequeue_script( 'skt-ecology-customscripts', get_template_directory_uri() . '/js/custom.js', array('jquery') );
	wp_dequeue_script( 'skt-ecology-navigation', get_template_directory_uri() . '/js/navigation.js', array('jquery') );
}
add_action( 'wp_enqueue_scripts', 'skt_eauto_dequeue_skt_coach_custom_js', 20 );

add_action( 'wp_enqueue_scripts', 'skt_eauto_child_navigation', 99);
function skt_eauto_child_navigation() {
  wp_enqueue_script('skt-eauto-custom-js', get_stylesheet_directory_uri() . '/js/custom.js', array('jquery'), null, true );
  wp_enqueue_script('skt-eauto-navigation-js', get_stylesheet_directory_uri() . '/js/navigation.js', array('jquery'), null, true );
}

/**
 * Show notice on theme activation
 */
if ( is_admin() && isset($_GET['activated'] ) && $pagenow == "themes.php" ) {
	add_action( 'admin_notices', 'skt_eauto_activation_notice' );
}
function skt_eauto_activation_notice(){
    ?>
    <div class="notice notice-info is-dismissible"> 
        <div class="skt-eauto-notice-container">
        	<div class="skt-eauto-notice-img"><img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/images/icon-skt-templates.png' ); ?>" alt="<?php echo esc_attr('SKT Templates');?>" ></div>
            <div class="skt-eauto-notice-content">
            <div class="skt-eauto-notice-heading"><?php echo esc_html__('Thank you for installing SKT eAuto!', 'skt-eauto'); ?></div>
            <p class="largefont"><?php echo esc_html__('SKT eAuto comes with 150+ ready to use Elementor templates. Install the SKT Templates plugin to get started.', 'skt-eauto'); ?></p>
            </div>
            <div class="skt-eauto-clear"></div>
        </div>
    </div>
    <?php
}

if ( ! function_exists( 'skt_eauto_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 */
function skt_eauto_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;

function skt_eauto_load_dashicons(){
   wp_enqueue_style('dashicons');
}
add_action('wp_enqueue_scripts', 'skt_eauto_load_dashicons', 999);

/**
 * Retrieve webfont URL to load fonts locally.
 */
/**
* Enqueue theme fonts.
*/
function skt_eauto_fonts() {
$fonts_url = skt_eauto_get_fonts_url();

// Load Fonts if necessary.
if ( $fonts_url ) {
	require_once get_theme_file_path( 'inc/wptt-webfont-loader.php' );
	wp_enqueue_style( 'skt-eauto-fonts', wptt_get_webfont_url( $fonts_url ), array(), '20201110' );
}
}
add_action( 'wp_enqueue_scripts', 'skt_eauto_fonts', 1 );
add_action( 'enqueue_block_editor_assets', 'skt_eauto_fonts', 1 );
 
function skt_eauto_get_fonts_url() {
	$font_families = array(
		'Poppins:100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic',
		'Assistant:200,300,400,500,600,700,800',
		'Anton:200,300,400,500,600,700,800',
		'Oswald:200,300,400,500,600,700,800',
	);

	$query_args = array(
		'family'  => urlencode( implode( '|', $font_families ) ),
		'subset'  => urlencode( 'latin,latin-ext' ),
		'display' => urlencode( 'swap' ),
	);

	return apply_filters( 'skt_eauto_get_fonts_url', add_query_arg( $query_args, 'https://fonts.googleapis.com/css' ) );
}

define('SKT_EAUTO_SKTTHEMES_URL','https://www.sktthemes.org');
define('SKT_EAUTO_SKTTHEMES_PRO_THEME_URL','https://www.sktthemes.net/shop/electric-cars-wordpress-theme/');
define('SKT_EAUTO_SKTTHEMES_FREE_THEME_URL','https://www.sktthemes.org/shop/skt-eauto/');
define('SKT_EAUTO_SKTTHEMES_THEME_DOC','https://www.sktthemesdemo.net/documentation/skt-ecology-doc/');
define('SKT_EAUTO_SKTTHEMES_LIVE_DEMO','https://www.sktperfectdemo.com/themepack/eauto/');
define('SKT_EAUTO_SKTTHEMES_THEMES','https://www.sktthemes.org/themes');
define('SKT_EAUTO_SKTTHEMES_THEME_URI', trailingslashit( esc_url( get_template_directory_uri() ) ) );

function skt_eauto_remove_parent_function(){	 
	remove_action( 'admin_notices', 'skt_ecology_activation_notice');
	remove_action( 'admin_menu', 'skt_ecology_abouttheme');
	remove_action( 'customize_register', 'skt_ecology_customize_register');
	remove_action( 'wp_enqueue_scripts', 'skt_ecology_custom_css');
}
add_action( 'init', 'skt_eauto_remove_parent_function' );

function skt_eauto_remove_parent_theme_stuff() {
    remove_action( 'after_setup_theme', 'skt_ecology_setup' );
}
add_action( 'after_setup_theme', 'skt_eauto_remove_parent_theme_stuff', 0 );

function skt_eauto_unregister_widgets_area(){
	unregister_sidebar( 'sidebar-1' );
	unregister_sidebar( 'fc-1' );
	unregister_sidebar( 'fc-2' );
	unregister_sidebar( 'fc-3' );
	unregister_sidebar( 'fc-4' );
}
add_action( 'widgets_init', 'skt_eauto_unregister_widgets_area', 11 );

require_once get_stylesheet_directory() . '/inc/about-themes.php';  
require_once get_stylesheet_directory() . '/inc/customizer.php';

function skt_eauto_enqueue_comment_reply_script() {
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'skt_eauto_enqueue_comment_reply_script' );

require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php'; // Make sure this file exists in your child theme

add_action( 'tgmpa_register', 'skt_eauto_register_required_plugins' );

function skt_eauto_register_required_plugins() {
	$plugins = array(
		array(
			'name'      => 'SKT Templates',
			'slug'      => 'skt-templates',
			'required'  => false,
		)		 				
	);

	$config = array(
		'id'           => 'tgmpa',
		'default_path' => '',
		'menu'         => 'skt-install-plugins',
		'parent_slug'  => 'themes.php',
		'capability'   => 'edit_theme_options',
		'has_notices'  => true,
		'dismissable'  => true,
		'dismiss_msg'  => '',
		'is_automatic' => false,
		'message'      => '',
	);

	tgmpa( $plugins, $config );
}