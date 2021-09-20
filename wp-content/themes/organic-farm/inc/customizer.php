<?php
/**
 * Organic Farm: Customizer
 *
 * @subpackage Organic Farm
 * @since 1.0
 */

function organic_farm_customize_register( $wp_customize ) {

	wp_enqueue_style('customizercustom_css', esc_url( get_template_directory_uri() ). '/assets/css/customizer.css');

	// Add custom control.
  	require get_parent_theme_file_path( 'inc/customize/customize_toggle.php' );

	// Register the custom control type.
	$wp_customize->register_control_type( 'Organic_Farm_Toggle_Control' );

 	$wp_customize->add_section('organic_farm_pro', array(
        'title'    => __('UPGRADE ORGANIC FARM PREMIUM', 'organic-farm'),
        'priority' => 1,
    ));

    $wp_customize->add_setting('organic_farm_pro', array(
        'default'           => null,
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control(new Organic_Farm_Pro_Control($wp_customize, 'organic_farm_pro', array(
        'label'    => __('ORGANIC FARM PREMIUM', 'organic-farm'),
        'section'  => 'organic_farm_pro',
        'settings' => 'organic_farm_pro',
        'priority' => 1,
    )));

    // Theme General Settings
    $wp_customize->add_section('organic_farm_theme_settings',array(
        'title' => __('Theme General Settings', 'organic-farm'),
    ) );

    $wp_customize->add_setting( 'organic_farm_sticky_header', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'organic_farm_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Organic_Farm_Toggle_Control( $wp_customize, 'organic_farm_sticky_header', array(
		'label'       => esc_html__( 'Show Sticky Header', 'organic-farm' ),
		'section'     => 'organic_farm_theme_settings',
		'type'        => 'toggle',
		'settings'    => 'organic_farm_sticky_header',
	) ) );

    $wp_customize->add_setting( 'organic_farm_theme_loader', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'organic_farm_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Organic_Farm_Toggle_Control( $wp_customize, 'organic_farm_theme_loader', array(
		'label'       => esc_html__( 'Show Site Loader', 'organic-farm' ),
		'section'     => 'organic_farm_theme_settings',
		'type'        => 'toggle',
		'settings'    => 'organic_farm_theme_loader',
	) ) );

	// Post Layouts
    $wp_customize->add_section('organic_farm_layout',array(
        'title' => __('Post Layout', 'organic-farm'),
        'description' => __( 'Change the post layout from below options', 'organic-farm' ),
    ) );

	$wp_customize->add_setting( 'organic_farm_post_sidebar', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'organic_farm_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Organic_Farm_Toggle_Control( $wp_customize, 'organic_farm_post_sidebar', array(
		'label'       => esc_html__( 'Show Fullwidth', 'organic-farm' ),
		'section'     => 'organic_farm_layout',
		'type'        => 'toggle',
		'settings'    => 'organic_farm_post_sidebar',
	) ) );

	$wp_customize->add_setting( 'organic_farm_single_post_sidebar', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'organic_farm_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Organic_Farm_Toggle_Control( $wp_customize, 'organic_farm_single_post_sidebar', array(
		'label'       => esc_html__( 'Show Single Post Fullwidth', 'organic-farm' ),
		'section'     => 'organic_farm_layout',
		'type'        => 'toggle',
		'settings'    => 'organic_farm_single_post_sidebar',
	) ) );

    $wp_customize->add_setting('organic_farm_post_option',array(
		'default' => 'simple_post',
		'sanitize_callback' => 'organic_farm_sanitize_select'
	));
	$wp_customize->add_control('organic_farm_post_option',array(
		'label' => esc_html__('Select Layout','organic-farm'),
		'section' => 'organic_farm_layout',
		'setting' => 'organic_farm_post_option',
		'type' => 'radio',
        'choices' => array(
            'simple_post' => __('Simple Post','organic-farm'),
            'grid_post' => __('Grid Post','organic-farm'),
        ),
	));

    $wp_customize->add_setting('organic_farm_grid_column',array(
		'default' => '3_column',
		'sanitize_callback' => 'organic_farm_sanitize_select'
	));
	$wp_customize->add_control('organic_farm_grid_column',array(
		'label' => esc_html__('Grid Post Per Row','organic-farm'),
		'section' => 'organic_farm_layout',
		'setting' => 'organic_farm_grid_column',
		'type' => 'radio',
        'choices' => array(
            '1_column' => __('1','organic-farm'),
            '2_column' => __('2','organic-farm'),
            '3_column' => __('3','organic-farm'),
            '4_column' => __('4','organic-farm'),
            '5_column' => __('6','organic-farm'),
        ),
	));

	$wp_customize->add_setting( 'organic_farm_date', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'organic_farm_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Organic_Farm_Toggle_Control( $wp_customize, 'organic_farm_date', array(
		'label'       => esc_html__( 'Hide Date', 'organic-farm' ),
		'section'     => 'organic_farm_layout',
		'type'        => 'toggle',
		'settings'    => 'organic_farm_date',
	) ) );

	$wp_customize->add_setting( 'organic_farm_admin', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'organic_farm_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Organic_Farm_Toggle_Control( $wp_customize, 'organic_farm_admin', array(
		'label'       => esc_html__( 'Hide Author/Admin', 'organic-farm' ),
		'section'     => 'organic_farm_layout',
		'type'        => 'toggle',
		'settings'    => 'organic_farm_admin',
	) ) );

	$wp_customize->add_setting( 'organic_farm_comment', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'organic_farm_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Organic_Farm_Toggle_Control( $wp_customize, 'organic_farm_comment', array(
		'label'       => esc_html__( 'Hide Comment', 'organic-farm' ),
		'section'     => 'organic_farm_layout',
		'type'        => 'toggle',
		'settings'    => 'organic_farm_comment',
	) ) );

	// Top Header
    $wp_customize->add_section('organic_farm_top',array(
        'title' => __('Contact info', 'organic-farm'),
        'description' => __( 'Add contact info in the below feilds', 'organic-farm' ),
    ) );

    $wp_customize->add_setting('organic_farm_email_text',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)); 
	$wp_customize->add_control('organic_farm_email_text',array(
		'label' => esc_html__('Add Text','organic-farm'),
		'section' => 'organic_farm_top',
		'setting' => 'organic_farm_email_text',
		'type'    => 'text'
	));

	$wp_customize->add_setting('organic_farm_email',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_email'
	)); 
	$wp_customize->add_control('organic_farm_email',array(
		'label' => esc_html__('Add Email Address','organic-farm'),
		'section' => 'organic_farm_top',
		'setting' => 'organic_farm_email',
		'type'    => 'text'
	));

	$wp_customize->add_setting('organic_farm_call_text',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)); 
	$wp_customize->add_control('organic_farm_call_text',array(
		'label' => esc_html__('Add Text','organic-farm'),
		'section' => 'organic_farm_top',
		'setting' => 'organic_farm_call_text',
		'type'    => 'text'
	));
    
	$wp_customize->add_setting('organic_farm_call',array(
		'default' => '',
		'sanitize_callback' => 'organic_farm_sanitize_phone_number'
	)); 
	$wp_customize->add_control('organic_farm_call',array(
		'label' => esc_html__('Add Phone Number','organic-farm'),
		'section' => 'organic_farm_top',
		'setting' => 'organic_farm_call',
		'type'    => 'text'
	));

	$wp_customize->add_setting('organic_farm_quote_btn',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)); 
	$wp_customize->add_control('organic_farm_quote_btn',array(
		'label' => esc_html__('Add Button Text','organic-farm'),
		'section' => 'organic_farm_top',
		'setting' => 'organic_farm_quote_btn',
		'type'    => 'text'
	));

    $wp_customize->add_setting('organic_farm_quote_btn_link',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw'
	)); 
	$wp_customize->add_control('organic_farm_quote_btn_link',array(
		'label' => esc_html__('Add Button Link','organic-farm'),
		'section' => 'organic_farm_top',
		'setting' => 'organic_farm_quote_btn_link',
		'type'    => 'url'
	));

	// Social Media
    $wp_customize->add_section('organic_farm_urls',array(
        'title' => __('Social Media', 'organic-farm'),
        'description' => __( 'Add social media links in the below feilds', 'organic-farm' ),
    ) );
    
	$wp_customize->add_setting('organic_farm_facebook',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw'
	)); 
	$wp_customize->add_control('organic_farm_facebook',array(
		'label' => esc_html__('Facebook URL','organic-farm'),
		'section' => 'organic_farm_urls',
		'setting' => 'organic_farm_facebook',
		'type'    => 'url'
	));

	$wp_customize->add_setting('organic_farm_twitter',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw'
	)); 
	$wp_customize->add_control('organic_farm_twitter',array(
		'label' => esc_html__('Twitter URL','organic-farm'),
		'section' => 'organic_farm_urls',
		'setting' => 'organic_farm_twitter',
		'type'    => 'url'
	));

	$wp_customize->add_setting('organic_farm_youtube',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw'
	)); 
	$wp_customize->add_control('organic_farm_youtube',array(
		'label' => esc_html__('Youtube URL','organic-farm'),
		'section' => 'organic_farm_urls',
		'setting' => 'organic_farm_youtube',
		'type'    => 'url'
	));

	$wp_customize->add_setting('organic_farm_instagram',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw'
	)); 
	$wp_customize->add_control('organic_farm_instagram',array(
		'label' => esc_html__('Instagram URL','organic-farm'),
		'section' => 'organic_farm_urls',
		'setting' => 'organic_farm_instagram',
		'type'    => 'url'
	));

    //Slider
	$wp_customize->add_section( 'organic_farm_slider_section' , array(
    	'title'      => __( 'Slider Settings', 'organic-farm' ),
    	'description' => __( 'Image Dimension ( 1400 x 650 ) px', 'organic-farm' ),
		'priority'   => null,
	) );

	$wp_customize->add_setting( 'organic_farm_slider_arrows', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'organic_farm_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Organic_Farm_Toggle_Control( $wp_customize, 'organic_farm_slider_arrows', array(
		'label'       => esc_html__( 'Check to show slider', 'organic-farm' ),
		'section'     => 'organic_farm_slider_section',
		'type'        => 'toggle',
		'settings'    => 'organic_farm_slider_arrows',
	) ) );

	$args = array('numberposts' => -1); 
	$post_list = get_posts($args);
	$i = 0;	
	$pst_sls[]= __('Select','organic-farm');
	foreach ($post_list as $key => $p_post) {
		$pst_sls[$p_post->ID]=$p_post->post_title;
	}
	for ( $i = 1; $i <= 4; $i++ ) {
		$wp_customize->add_setting('organic_farm_post_setting'.$i,array(
			'sanitize_callback' => 'organic_farm_sanitize_choices',
		));
		$wp_customize->add_control('organic_farm_post_setting'.$i,array(
			'type'    => 'select',
			'choices' => $pst_sls,
			'label' => __('Select post','organic-farm'),
			'section' => 'organic_farm_slider_section',
		));
	}
	wp_reset_postdata();

	//Middle Section
	$wp_customize->add_section( 'organic_farm_middle_section' , array(
    	'title'      => __( 'Services Settings', 'organic-farm' ),
    	'description' => __( 'Image Dimension ( 80 x 80 ) px', 'organic-farm' ),
		'priority'   => null,
	) );
	
	$args = array('numberposts' => -1); 
	$post_list = get_posts($args);
	$s = 0;	
	$pst_sls[]= __('Select','organic-farm');
	foreach ($post_list as $key => $p_post) {
		$pst_sls[$p_post->ID]=$p_post->post_title;
	}
	for ( $s = 1; $s <= 3; $s++ ) {
		$wp_customize->add_setting('organic_farm_middle_sec_settigs'.$s,array(
			'sanitize_callback' => 'organic_farm_sanitize_choices',
		));
		$wp_customize->add_control('organic_farm_middle_sec_settigs'.$s,array(
			'type'    => 'select',
			'choices' => $pst_sls,
			'label' => __('Select post','organic-farm'),
			'section' => 'organic_farm_middle_section',
		));
	}
	wp_reset_postdata();

	// Product Box

	$wp_customize->add_section( 'organic_farm_product_box_section' , array(
    	'title'      => __( 'Product Settings', 'organic-farm' ),
    	'description' => __( 'Add New Page >> Add Title >> Add Shortcode "" >> Then Select the page in the below page dropdown.', 'organic-farm' ),
		'priority'   => null,
	) );

	$wp_customize->add_setting( 'organic_farm_product_box_page', array(
		'default'  => '',
		'sanitize_callback' => 'organic_farm_sanitize_dropdown_pages'
	) );
	$wp_customize->add_control( 'organic_farm_product_box_page', array(
		'label'    => esc_html__( 'Select Product Page', 'organic-farm' ),
		'section'  => 'organic_farm_product_box_section',
		'type'     => 'dropdown-pages'
	) );
    
	//Footer
    $wp_customize->add_section( 'organic_farm_footer_copyright', array(
    	'title'      => esc_html__( 'Footer Text', 'organic-farm' ),
	) );

    $wp_customize->add_setting('organic_farm_footer_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('organic_farm_footer_text',array(
		'label'	=> esc_html__('Copyright Text','organic-farm'),
		'section'	=> 'organic_farm_footer_copyright',
		'type'		=> 'text'
	));

	//Logo
    $wp_customize->add_setting('organic_farm_logo_max_height',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('organic_farm_logo_max_height',array(
		'label'	=> esc_html__('Logo Width','organic-farm'),
		'section'	=> 'title_tagline',
		'type'		=> 'number'
	));
    $wp_customize->add_setting( 'organic_farm_logo_title', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'organic_farm_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Organic_Farm_Toggle_Control( $wp_customize, 'organic_farm_logo_title', array(
		'label'       => esc_html__( 'Show Site Title', 'organic-farm' ),
		'section'     => 'title_tagline',
		'type'        => 'toggle',
		'settings'    => 'organic_farm_logo_title',
	) ) );

    $wp_customize->add_setting( 'organic_farm_logo_text', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'organic_farm_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Organic_Farm_Toggle_Control( $wp_customize, 'organic_farm_logo_text', array(
		'label'       => esc_html__( 'Show Site Tagline', 'organic-farm' ),
		'section'     => 'title_tagline',
		'type'        => 'toggle',
		'settings'    => 'organic_farm_logo_text',
	) ) );

	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'organic_farm_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'organic_farm_customize_partial_blogdescription',
	) );

	//front page
	$num_sections = apply_filters( 'organic_farm_front_page_sections', 4 );

	// Create a setting and control for each of the sections available in the theme.
	for ( $i = 1; $i < ( 1 + $num_sections ); $i++ ) {
		$wp_customize->add_setting( 'panel_' . $i, array(
			'default'           => false,
			'sanitize_callback' => 'organic_farm_sanitize_dropdown_pages',
			'transport'         => 'postMessage',
		) );

		$wp_customize->add_control( 'panel_' . $i, array(
			/* translators: %d is the front page section number */
			'label'          => sprintf( __( 'Front Page Section %d Content', 'organic-farm' ), $i ),
			'description'    => ( 1 !== $i ? '' : __( 'Select pages to feature in each area from the dropdowns. Add an image to a section by setting a featured image in the page editor. Empty sections will not be displayed.', 'organic-farm' ) ),
			'section'        => 'theme_options',
			'type'           => 'dropdown-pages',
			'allow_addition' => true,
			'active_callback' => 'organic_farm_is_static_front_page',
		) );

		$wp_customize->selective_refresh->add_partial( 'panel_' . $i, array(
			'selector'            => '#panel' . $i,
			'render_callback'     => 'organic_farm_front_page_section',
			'container_inclusive' => true,
		) );
	}
}
add_action( 'customize_register', 'organic_farm_customize_register' );

function organic_farm_customize_partial_blogname() {
	bloginfo( 'name' );
}
function organic_farm_customize_partial_blogdescription() {
	bloginfo( 'description' );
}
function organic_farm_is_static_front_page() {
	return ( is_front_page() && ! is_home() );
}
function organic_farm_is_view_with_layout_option() {
	return ( is_page() || ( is_archive() && ! is_active_sidebar( 'sidebar-1' ) ) );
}

define('ORGANIC_FARM_PRO_LINK',__('https://www.ovationthemes.com/wordpress/organic-farm-wordpress-theme/','organic-farm'));

/* Pro control */
if (class_exists('WP_Customize_Control') && !class_exists('Organic_Farm_Pro_Control')):
    class Organic_Farm_Pro_Control extends WP_Customize_Control{

    public function render_content(){?>
        <label style="overflow: hidden; zoom: 1;">
	        <div class="col-md upsell-btn">
                <a href="<?php echo esc_url( ORGANIC_FARM_PRO_LINK ); ?>" target="blank" class="btn btn-success btn"><?php esc_html_e('UPGRADE ORGANIC FARM PREMIUM','organic-farm');?> </a>
	        </div>
            <div class="col-md">
                <img class="organic_farm_img_responsive " src="<?php echo esc_url(get_template_directory_uri()); ?>/screenshot.png">
            </div>
	        <div class="col-md">
	            <h3 style="margin-top:10px; margin-left: 20px; text-decoration:underline; color:#333;"><?php esc_html_e('ORGANIC FARM PREMIUM - Features', 'organic-farm'); ?></h3>
                <ul style="padding-top:10px">
                    <li class="upsell-organic_farm"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Responsive Design', 'organic-farm');?> </li>
                    <li class="upsell-organic_farm"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Boxed or fullwidth layout', 'organic-farm');?> </li>
                    <li class="upsell-organic_farm"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Shortcode Support', 'organic-farm');?> </li>
                    <li class="upsell-organic_farm"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Demo Importer', 'organic-farm');?> </li>
                    <li class="upsell-organic_farm"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Section Reordering', 'organic-farm');?> </li>
                    <li class="upsell-organic_farm"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Contact Page Template', 'organic-farm');?> </li>
                    <li class="upsell-organic_farm"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Multiple Blog Layouts', 'organic-farm');?> </li>
                    <li class="upsell-organic_farm"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Unlimited Color Options', 'organic-farm');?> </li>
                    <li class="upsell-organic_farm"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Designed with HTML5 and CSS3', 'organic-farm');?> </li>
                    <li class="upsell-organic_farm"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Customizable Design & Code', 'organic-farm');?> </li>
                    <li class="upsell-organic_farm"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Cross Browser Support', 'organic-farm');?> </li>
                    <li class="upsell-organic_farm"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Detailed Documentation Included', 'organic-farm');?> </li>
                    <li class="upsell-organic_farm"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Stylish Custom Widgets', 'organic-farm');?> </li>
                    <li class="upsell-organic_farm"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Patterns Background', 'organic-farm');?> </li>
                    <li class="upsell-organic_farm"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('WPML Compatible (Translation Ready)', 'organic-farm');?> </li>
                    <li class="upsell-organic_farm"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Woo-commerce Compatible', 'organic-farm');?> </li>
                    <li class="upsell-organic_farm"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Full Support', 'organic-farm');?> </li>
                    <li class="upsell-organic_farm"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('10+ Sections', 'organic-farm');?> </li>
                    <li class="upsell-organic_farm"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Live Customizer', 'organic-farm');?> </li>
                   	<li class="upsell-organic_farm"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('AMP Ready', 'organic-farm');?> </li>
                   	<li class="upsell-organic_farm"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Clean Code', 'organic-farm');?> </li>
                   	<li class="upsell-organic_farm"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('SEO Friendly', 'organic-farm');?> </li>
                   	<li class="upsell-organic_farm"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Supper Fast', 'organic-farm');?> </li>                    
                </ul>
        	</div>
		    <div class="col-md upsell-btn upsell-btn-bottom">
	            <a href="<?php echo esc_url( ORGANIC_FARM_PRO_LINK ); ?>" target="blank" class="btn btn-success btn"><?php esc_html_e('UPGRADE ORGANIC FARM PREMIUM','organic-farm');?> </a>
		    </div>
			<p><?php printf(__('Please review us if you love our product on %1$sWordPress.org%2$s. </br></br>  Thank You', 'organic-farm'), '<a target="blank" href="https://wordpress.org/support/theme/organic-farm/reviews/">', '</a>');
            ?></p>
        </label>
    <?php } }
endif;