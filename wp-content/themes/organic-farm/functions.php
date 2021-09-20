<?php
/**
 * Organic Farm functions and definitions
 *
 * @subpackage Organic Farm
 * @since 1.0
 */

/**
 * Change number or products per row to 3
 */
add_filter('loop_shop_columns', 'organic_farm_loop_columns', 999);
if (!function_exists('organic_farm_loop_columns')) {
	function organic_farm_loop_columns() {
		return 3;
	}
}

function organic_farm_sanitize_dropdown_pages( $page_id, $setting ) {
	$page_id = absint( $page_id );
	return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}

function organic_farm_sanitize_choices( $input, $setting ) {
    global $wp_customize; 
    $control = $wp_customize->get_control( $setting->id ); 
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

function organic_farm_sanitize_phone_number( $phone ) {
  return preg_replace( '/[^\d+]/', '', $phone );
}

function organic_farm_sanitize_select( $input, $setting ){  
    $input = sanitize_key($input);    
    $choices = $setting->manager->get_control( $setting->id )->choices;
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );      
}

function organic_farm_sanitize_checkbox( $input ) {
	return ( ( isset( $input ) && true == $input ) ? true : false );
}

function organic_farm_string_limit_words($string, $word_limit) {
	$words = explode(' ', $string, ($word_limit + 1));
	if(count($words) > $word_limit)
	array_pop($words);
	return implode(' ', $words);
}

function organic_farm_excerpt_more( $link ) {
	if ( is_admin() ) {
		return $link;
	}

	$link = sprintf(
		'<div class="link-more text-center"><a href="%1$s" class="more-link py-2 px-4">%2$s</a></div>',
		esc_url( get_permalink( get_the_ID() ) ),
		/* translators: %s: Name of current post */
		sprintf( __( 'Read More<span class="screen-reader-text"> "%s"</span>', 'organic-farm' ), get_the_title( get_the_ID() ) )
	);
	return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'organic_farm_excerpt_more' );

function organic_farm_notice(){
    global $pagenow;
    if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) ) {
   		wp_safe_redirect( admin_url("themes.php?page=organic-farm-guide-page") );
   	}
}
add_action('after_setup_theme', 'organic_farm_notice');

function organic_farm_add_new_page() {
    $edit_page = admin_url().'post-new.php?post_type=page';
    echo json_encode(['page_id'=>'','edit_page_url'=> $edit_page ]);

    exit;
}
add_action( 'wp_ajax_organic_farm_add_new_page','organic_farm_add_new_page' );

function organic_farm_setup() {
	
	add_theme_support( 'woocommerce' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( "align-wide" );
	add_theme_support( "wp-block-styles" );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'title-tag' );
	add_theme_support('custom-background',array(
		'default-color' => 'ffffff',
	));
	add_image_size( 'organic-farm-featured-image', 2000, 1200, true );
	add_image_size( 'organic-farm-thumbnail-avatar', 100, 100, true );

	$GLOBALS['content_width'] = 525;
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'organic-farm' ),
	) );

	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 250,
		'height'      => 250,
		'flex-width'  => true,
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
 	 */
	add_editor_style( array( 'assets/css/editor-style.css', organic_farm_fonts_url() ) );

}
add_action( 'after_setup_theme', 'organic_farm_setup' );

function organic_farm_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'organic-farm' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'organic-farm' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget_container"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'organic-farm' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Add widgets here to appear in your pages and posts', 'organic-farm' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget_container"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 1', 'organic-farm' ),
		'id'            => 'footer-1',
		'description'   => __( 'Add widgets here to appear in your footer.', 'organic-farm' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'organic-farm' ),
		'id'            => 'footer-2',
		'description'   => __( 'Add widgets here to appear in your footer.', 'organic-farm' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 3', 'organic-farm' ),
		'id'            => 'footer-3',
		'description'   => __( 'Add widgets here to appear in your footer.', 'organic-farm' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 4', 'organic-farm' ),
		'id'            => 'footer-4',
		'description'   => __( 'Add widgets here to appear in your footer.', 'organic-farm' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'organic_farm_widgets_init' );

function organic_farm_fonts_url(){
	$font_url = '';
	$font_family = array();
	$font_family[] = 'Source Sans Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900';

	$query_args = array(
		'family'	=> rawurlencode(implode('|',$font_family)),
	);
	$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
	return $font_url;
}

//Enqueue scripts and styles.
function organic_farm_scripts() {

	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'organic-farm-fonts', organic_farm_fonts_url(), array(), null );

	//Bootstarp 
	wp_enqueue_style( 'bootstrap-style', esc_url( get_template_directory_uri() ).'/assets/css/bootstrap.css' );	
	
	// Theme stylesheet.
	wp_enqueue_style( 'organic-farm-style', get_stylesheet_uri() );

	// Theme Customize CSS.
	require get_parent_theme_file_path( 'inc/extra_customization.php' );
	wp_add_inline_style( 'organic-farm-style',$organic_farm_custom_style );

	//font-awesome
	wp_enqueue_style( 'font-awesome-style', esc_url( get_template_directory_uri() ).'/assets/css/fontawesome-all.css' );

	//Block Style
	wp_enqueue_style( 'organic-farm-block-style', esc_url( get_template_directory_uri() ).'/assets/css/blocks.css' );

	//Custom JS
	wp_enqueue_script( 'organic-farm-custom.js', get_theme_file_uri( '/assets/js/organic-farm-custom.js' ), array( 'jquery' ), true );

	//Nav Focus JS
	wp_enqueue_script( 'organic-farm-navigation-focus', get_theme_file_uri( '/assets/js/navigation-focus.js' ), array( 'jquery' ), true );

	//Superfish JS
	wp_enqueue_script( 'superfish-js', get_theme_file_uri( '/assets/js/jquery.superfish.js' ), array( 'jquery' ),true );

	//Bootstarp JS
	wp_enqueue_script( 'bootstrap.js', get_theme_file_uri( '/assets/js/bootstrap.js' ), array( 'jquery' ),true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'organic_farm_scripts' );

function organic_farm_enqueue_admin_script( $hook ) {
	
	// Admin JS
	wp_enqueue_script( 'organic-farm-admin.js', get_theme_file_uri( '/assets/js/organic-farm-admin.js' ), array( 'jquery' ), true );

	wp_localize_script('organic-farm-admin.js', 'organic_farm_scripts_localize',
        array(
            'ajax_url' => esc_url(admin_url('admin-ajax.php'))
        )
    );
}
add_action( 'admin_enqueue_scripts', 'organic_farm_enqueue_admin_script' );

// Enqueue editor styles for Gutenberg
function organic_farm_block_editor_styles() {
	// Block styles.
	wp_enqueue_style( 'organic-farm-block-editor-style', trailingslashit( esc_url ( get_template_directory_uri() ) ) . '/assets/css/editor-blocks.css' );

	// Add custom fonts.
	wp_enqueue_style( 'organic-farm-fonts', organic_farm_fonts_url(), array(), null );
}
add_action( 'enqueue_block_editor_assets', 'organic_farm_block_editor_styles' );

function organic_farm_front_page_template( $template ) {
	return is_home() ? '' : $template;
}
add_filter( 'frontpage_template',  'organic_farm_front_page_template' );

require get_parent_theme_file_path( '/inc/custom-header.php' );

require get_parent_theme_file_path( '/inc/template-tags.php' );

require get_parent_theme_file_path( '/inc/template-functions.php' );

require get_parent_theme_file_path( '/inc/customizer.php' );

require get_parent_theme_file_path( '/inc/dashboard/dashboard.php' );