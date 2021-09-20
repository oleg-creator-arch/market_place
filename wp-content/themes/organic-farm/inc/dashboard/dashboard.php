<?php

add_action( 'admin_menu', 'organic_farm_gettingstarted' );
function organic_farm_gettingstarted() {    	
	add_theme_page( esc_html__('Theme Documentation', 'organic-farm'), esc_html__('Theme Documentation', 'organic-farm'), 'edit_theme_options', 'organic-farm-guide-page', 'organic_farm_guide');   
}

function organic_farm_admin_theme_style() {
   wp_enqueue_style('organic-farm-custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/dashboard/dashboard.css');
}
add_action('admin_enqueue_scripts', 'organic_farm_admin_theme_style');

if ( ! defined( 'ORGANIC_FARM_SUPPORT' ) ) {
	define('ORGANIC_FARM_SUPPORT',__('https://wordpress.org/support/theme/organic-farm/','organic-farm'));
}
if ( ! defined( 'ORGANIC_FARM_REVIEW' ) ) {
	define('ORGANIC_FARM_REVIEW',__('https://wordpress.org/support/theme/organic-farm/reviews/','organic-farm'));
}
define('ORGANIC_FARM_LIVE_DEMO',__('https://www.ovationthemes.com/demos/organic-farm/','organic-farm'));
define('ORGANIC_FARM_BUY_PRO',__('https://www.ovationthemes.com/wordpress/organic-farm-wordpress-theme/','organic-farm'));
define('ORGANIC_FARM_PRO_DOC',__('https://ovationthemes.com/docs/ot-organic-farm-pro-doc/','organic-farm'));

/**
 * Theme Info Page
 */
function organic_farm_guide() {

	// Theme info
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme(); ?>

	<div class="getting-started__header">
		<div class="col-md-10">
			<h2><?php echo esc_html( $theme ); ?></h2>
			<p><?php esc_html_e('Version: ', 'organic-farm'); ?><?php echo esc_html($theme['Version']);?></p>
		</div>
		<div class="col-md-2">
			<div class="btn_box">
				<a class="button-primary" href="<?php echo esc_url( ORGANIC_FARM_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support', 'organic-farm'); ?></a>
				<a class="button-primary" href="<?php echo esc_url( ORGANIC_FARM_REVIEW ); ?>" target="_blank"><?php esc_html_e('Review', 'organic-farm'); ?></a>
			</div>
		</div>
	</div>

	<div class="wrap getting-started">
		<div class="container">
			<div class="col-md-9">
				<div class="leftbox">
					<h3><?php esc_html_e('Documentation','organic-farm'); ?></h3>
					<p><?php esc_html_e('To step the organic farm theme follow the below steps.','organic-farm'); ?></p>

					<h4><?php esc_html_e('1. Setup Logo','organic-farm'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> Appearance >> Customize >> Site Identity >> Upload your logo or Add site title and site description.','organic-farm'); ?></p>
					<a class="button-primary" href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','organic-farm'); ?></a>

					<h4><?php esc_html_e('2. Setup Contact Info','organic-farm'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> Appearance >> Customize >> Contact info >> Add your phone number and email address.','organic-farm'); ?></p>
					<a class="button-primary" href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=organic_farm_top') ); ?>" target="_blank"><?php esc_html_e('Add Contact Info','organic-farm'); ?></a>

					<h4><?php esc_html_e('3. Setup Menus','organic-farm'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> Appearance >> Menus >> Create Menus >> Add pages, post or custom link then save it.','organic-farm'); ?></p>
					<a class="button-primary" href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Add Menus','organic-farm'); ?></a>

					<h4><?php esc_html_e('4. Setup Social Icons','organic-farm'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> Appearance >> Customize >> Social Media >> Add social links.','organic-farm'); ?></p>
					<a class="button-primary" href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=organic_farm_urls') ); ?>" target="_blank"><?php esc_html_e('Add Social Icons','organic-farm'); ?></a>

					<h4><?php esc_html_e('5. Setup Footer','organic-farm'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> Appearance >> Widgets >> Add widgets in footer 1, footer 2, footer 3, footer 4. >> ','organic-farm'); ?></p>
					<a class="button-primary" href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widgets','organic-farm'); ?></a>

					<h4><?php esc_html_e('5. Setup Footer Text','organic-farm'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> Appearance >> Customize >> Footer Text >> Add copyright text. >> ','organic-farm'); ?></p>
					<a class="button-primary" href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=organic_farm_footer_copyright') ); ?>" target="_blank"><?php esc_html_e('Footer Text','organic-farm'); ?></a>

					<h3><?php esc_html_e('Setup Home Page','organic-farm'); ?></h3>
					<p><?php esc_html_e('To step the home page follow the below steps.','organic-farm'); ?></p>

					<h4><?php esc_html_e('1. Setup Page','organic-farm'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> Pages >> Add New Page >> Select "Custom Home Page" from templates >> Publish it.','organic-farm'); ?></p>
					<a class="dashboard_add_new_page button-primary"><?php esc_html_e('Add New Page','organic-farm'); ?></a>

					<h4><?php esc_html_e('2. Setup Slider','organic-farm'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> Post >> Add New Post >> Add title, content and featured image >> Publish it.','organic-farm'); ?></p>
					<p><?php esc_html_e('Go to dashboard >> Appearance >> Customize >> Slider Settings >> Select post.','organic-farm'); ?></p>
					<a class="button-primary" href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=organic_farm_slider_section') ); ?>" target="_blank"><?php esc_html_e('Add Slider','organic-farm'); ?></a>

					<h4><?php esc_html_e('3. Setup Services','organic-farm'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> Post >> Add New Post >> Add title, content and featured image >> Publish it.','organic-farm'); ?></p>
					<p><?php esc_html_e('Go to dashboard >> Appearance >> Customize >> Services Settings >> Select post','organic-farm'); ?></p>
					<a class="button-primary" href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=organic_farm_middle_section') ); ?>" target="_blank"><?php esc_html_e('Add Services','organic-farm'); ?></a>

					<h4><?php esc_html_e('4. Setup Products','organic-farm'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> Page >> Add New page >> Add title, content, product shortcode >> Publish it.','organic-farm'); ?></p>
					<p><?php esc_html_e('Add Page >> Click on "+" Icon >> Search "shortcode" >> Click on shortcode block >> Add product shortcode >> Publish it.','organic-farm'); ?></p>
					<a href="#" class="dashboard_add_new_page button-primary"><?php esc_html_e('Add New Page','organic-farm'); ?></a>
					<p><?php esc_html_e('Go to dashboard >> Appearance >> Customize >> Product Settings >> Select Page.','organic-farm'); ?></p>
					<a class="button-primary" href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=organic_farm_product_box_section') ); ?>" target="_blank"><?php esc_html_e('Add Product Page','organic-farm'); ?></a>
				</div>
          	</div>
			<div class="col-md-3">
				<h3><?php esc_html_e('Premium Organic Theme','organic-farm'); ?></h3>
				<img class="organic_farm_img_responsive" style="width: 100%;" src="<?php echo esc_url( get_template_directory_uri() ); ?>/screenshot.png">
				<div class="pro-links">
					<hr>
					<a class="button-primary buynow" href="<?php echo esc_url( ORGANIC_FARM_BUY_PRO ); ?>" target="_blank"><?php esc_html_e('Buy Now', 'organic-farm'); ?></a>
			    	<a class="button-primary livedemo" href="<?php echo esc_url( ORGANIC_FARM_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'organic-farm'); ?></a>
					<a class="button-primary docs" href="<?php echo esc_url( ORGANIC_FARM_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Documentation', 'organic-farm'); ?></a>
					<hr>
				</div>
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
		</div>
	</div>

<?php }?>
