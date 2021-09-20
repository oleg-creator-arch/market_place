<?php
/**
 * Theme functions and definitions
 *
 * @package green_farm
 */ 

if ( ! function_exists( 'green_farm_enqueue_styles' ) ) :
	/**
	 * Load assets.
	 *
	 * @since 1.0.0
	 */
	function green_farm_enqueue_styles() {
		wp_enqueue_style( 'organic-farm-style-parent', get_template_directory_uri() . '/style.css' );
		wp_enqueue_style( 'green-farm-style', get_stylesheet_directory_uri() . '/style.css', array( 'organic-farm-style-parent' ), '1.0.0' );
		// Theme Customize CSS.
		require get_parent_theme_file_path( 'inc/extra_customization.php' );
		wp_add_inline_style( 'green-farm-style',$organic_farm_custom_style );
	}
endif;
add_action( 'wp_enqueue_scripts', 'green_farm_enqueue_styles', 99 );

function green_farm_setup() {
	add_theme_support( 'align-wide' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( "responsive-embeds" );
	add_theme_support( "wp-block-styles" );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_theme_support('custom-background',array(
		'default-color' => 'ffffff',
	));
	add_image_size( 'green-farm-featured-image', 2000, 1200, true );
	add_image_size( 'green-farm-thumbnail-avatar', 100, 100, true );

	$GLOBALS['content_width'] = 525;
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'green-farm' ),
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

	/*
	* This theme styles the visual editor to resemble the theme style,
	* specifically font, colors, and column width.
	*/
	add_editor_style( array( 'assets/css/editor-style.css', organic_farm_fonts_url() ) );
}
add_action( 'after_setup_theme', 'green_farm_setup' );

function green_farm_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'green-farm' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'green-farm' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget_container"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'green-farm' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Add widgets here to appear in your pages and posts', 'green-farm' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget_container"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 1', 'green-farm' ),
		'id'            => 'footer-1',
		'description'   => __( 'Add widgets here to appear in your footer.', 'green-farm' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'green-farm' ),
		'id'            => 'footer-2',
		'description'   => __( 'Add widgets here to appear in your footer.', 'green-farm' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 3', 'green-farm' ),
		'id'            => 'footer-3',
		'description'   => __( 'Add widgets here to appear in your footer.', 'green-farm' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 4', 'green-farm' ),
		'id'            => 'footer-4',
		'description'   => __( 'Add widgets here to appear in your footer.', 'green-farm' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Product Category Dropdown', 'green-farm' ),
		'id'            => 'product-cat',
		'description'   => __( 'Add widgets here to appear in your header.', 'green-farm' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'green_farm_widgets_init' );

function green_farm_customize_register() {
  	global $wp_customize;

  $wp_customize->remove_section( 'organic_farm_pro' );	

	$wp_customize->remove_setting( 'organic_farm_email_text' );
	$wp_customize->remove_control( 'organic_farm_email_text' );

	$wp_customize->remove_setting( 'organic_farm_call_text' );
	$wp_customize->remove_control( 'organic_farm_call_text' );

	$wp_customize->remove_setting( 'organic_farm_quote_btn' );
	$wp_customize->remove_control( 'organic_farm_quote_btn' );

	$wp_customize->remove_setting( 'organic_farm_quote_btn_link' );
	$wp_customize->remove_control( 'organic_farm_quote_btn_link' );
}
add_action( 'customize_register', 'green_farm_customize_register', 11 );

function green_farm_customize( $wp_customize ) {

	wp_enqueue_style('customizercustom_css', esc_url( get_stylesheet_directory_uri() ). '/assets/css/customizer.css');

	$wp_customize->add_section('green_farm_pro', array(
		'title'    => __('UPGRADE GREEN FRAM PREMIUM', 'green-farm'),
		'priority' => 1,
	));

	$wp_customize->add_setting('green_farm_pro', array(
		'default'           => null,
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control(new Green_Farm_Pro_Control($wp_customize, 'green_farm_pro', array(
		'label'    => __('GREEN FRAM PREMIUM', 'green-farm'),
		'section'  => 'green_farm_pro',
		'settings' => 'green_farm_pro',
		'priority' => 1,
	)));  

	$wp_customize->add_setting('green_farm_header_top_text',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)); 
	$wp_customize->add_control('green_farm_header_top_text',array(
		'label' => esc_html__('Add Header Text','green-farm'),
		'section' => 'organic_farm_top',
		'setting' => 'green_farm_header_top_text',
		'type'    => 'text'
	));
}
add_action( 'customize_register', 'green_farm_customize' );

function green_farm_enqueue_comments_reply() {
  if( is_singular() && comments_open() && ( get_option( 'thread_comments' ) == 1) ) {
    // Load comment-reply.js (into footer)
    wp_enqueue_script( 'comment-reply', '/wp-includes/js/comment-reply.min.js', array(), false, true );
  }
}
add_action(  'wp_enqueue_scripts', 'green_farm_enqueue_comments_reply' );

define('GREEN_FARM_PRO_LINK',__('https://www.ovationthemes.com/wordpress/organic-farm-wordpress-theme/','green-farm'));

/* Pro control */
if (class_exists('WP_Customize_Control') && !class_exists('Green_Farm_Pro_Control')):
    class Green_Farm_Pro_Control extends WP_Customize_Control{

    public function render_content(){?>
        <label style="overflow: hidden; zoom: 1;">
            <div class="col-md upsell-btn">
                <a href="<?php echo esc_url( GREEN_FARM_PRO_LINK ); ?>" target="blank" class="btn btn-success btn"><?php esc_html_e('UPGRADE GREEN FRAM PREMIUM','green-farm');?> </a>
            </div>
            <div class="col-md">
                <img class="green_farm_img_responsive " src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/screenshot.png">
            </div>
            <div class="col-md">
                <h3 style="margin-top:10px; margin-left: 20px; text-decoration:underline; color:#333;"><?php esc_html_e('GREEN FRAM PREMIUM - Features', 'green-farm'); ?></h3>
                <ul style="padding-top:10px">
                    <li class="upsell-green_farm"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Responsive Design', 'green-farm');?> </li>
                    <li class="upsell-green_farm"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Boxed or fullwidth layout', 'green-farm');?> </li>
                    <li class="upsell-green_farm"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Shortcode Support', 'green-farm');?> </li>
                    <li class="upsell-green_farm"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Demo Importer', 'green-farm');?> </li>
                    <li class="upsell-green_farm"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Section Reordering', 'green-farm');?> </li>
                    <li class="upsell-green_farm"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Contact Page Template', 'green-farm');?> </li>
                    <li class="upsell-green_farm"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Multiple Blog Layouts', 'green-farm');?> </li>
                    <li class="upsell-green_farm"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Unlimited Color Options', 'green-farm');?> </li>
                    <li class="upsell-green_farm"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Designed with HTML5 and CSS3', 'green-farm');?> </li>
                    <li class="upsell-green_farm"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Customizable Design & Code', 'green-farm');?> </li>
                    <li class="upsell-green_farm"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Cross Browser Support', 'green-farm');?> </li>
                    <li class="upsell-green_farm"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Detailed Documentation Included', 'green-farm');?> </li>
                    <li class="upsell-green_farm"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Stylish Custom Widgets', 'green-farm');?> </li>
                    <li class="upsell-green_farm"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Patterns Background', 'green-farm');?> </li>
                    <li class="upsell-green_farm"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('WPML Compatible (Translation Ready)', 'green-farm');?> </li>
                    <li class="upsell-green_farm"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Woo-commerce Compatible', 'green-farm');?> </li>
                    <li class="upsell-green_farm"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Full Support', 'green-farm');?> </li>
                    <li class="upsell-green_farm"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('10+ Sections', 'green-farm');?> </li>
                    <li class="upsell-green_farm"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Live Customizer', 'green-farm');?> </li>
                    <li class="upsell-green_farm"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('AMP Ready', 'green-farm');?> </li>
                    <li class="upsell-green_farm"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Clean Code', 'green-farm');?> </li>
                    <li class="upsell-green_farm"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('SEO Friendly', 'green-farm');?> </li>
                    <li class="upsell-green_farm"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Supper Fast', 'green-farm');?> </li>                    
                </ul>
            </div>
            <div class="col-md upsell-btn upsell-btn-bottom">
                <a href="<?php echo esc_url( GREEN_FARM_PRO_LINK ); ?>" target="blank" class="btn btn-success btn"><?php esc_html_e('UPGRADE GREEN FRAM PREMIUM','green-farm');?> </a>
            </div>            
        </label>
    <?php } }
endif;