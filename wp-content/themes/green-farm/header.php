<?php
/**
 * The header for our theme
 *
 * @subpackage Green Farm
 * @since 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php
	if ( function_exists( 'wp_body_open' ) ) {
	    wp_body_open();
	} else {
	    do_action( 'wp_body_open' );
	}
?>
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'green-farm' ); ?></a>
	<?php if( get_theme_mod('organic_farm_theme_loader',true) != ''){ ?>
		<div class="preloader">
			<div class="load">
			  <hr/><hr/><hr/><hr/>
			</div>
		</div>
	<?php }?>
	<div id="page" class="site">
		<div class="header-top py-2 text-center text-md-left">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 col-md-4 col-sm-4 box-center">
						<?php if( get_theme_mod('green_farm_header_top_text') != '' ){ ?>
							<p class="mb-md-0"><?php echo esc_html(get_theme_mod('green_farm_header_top_text','')); ?></p>
						<?php }?>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-3 box-center">
						<?php if( get_theme_mod('organic_farm_email') != '' ){ ?>
							<p class="mb-md-0"><i class="fas fa-envelope mr-2"></i><?php echo esc_html(get_theme_mod('organic_farm_email','')); ?></p>
						<?php }?>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-3 box-center">
						<?php if( get_theme_mod('organic_farm_call') != ''){ ?>
							<p class="mb-md-0"><i class="fas fa-phone mr-2"></i><?php echo esc_html(get_theme_mod('organic_farm_call','')); ?></p>
						<?php }?>
					</div>
					<div class="col-lg-2 col-md-2 col-sm-2 box-center">
						<div class="links text-center text-lg-right">
							<?php if( get_theme_mod('organic_farm_facebook') != ''){ ?>
								<a href="<?php echo esc_url(get_theme_mod('organic_farm_facebook','')); ?>"><i class="fab fa-facebook-f mr-3"></i></a>
							<?php }?>
							<?php if( get_theme_mod('organic_farm_twitter') != ''){ ?>
								<a href="<?php echo esc_url(get_theme_mod('organic_farm_twitter','')); ?>"><i class="fab fa-twitter mr-3"></i></a>
							<?php }?>
							<?php if( get_theme_mod('organic_farm_youtube') != ''){ ?>
								<a href="<?php echo esc_url(get_theme_mod('organic_farm_youtube','')); ?>"><i class="fab fa-youtube mr-3"></i></a>
							<?php }?>
							<?php if( get_theme_mod('organic_farm_instagram') != ''){ ?>
								<a href="<?php echo esc_url(get_theme_mod('organic_farm_instagram','')); ?>"><i class="fab fa-instagram mr-3"></i></a>
							<?php }?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="header" class="py-3">
			<div class="container">
				<div class="row">
					<div class="col-lg-5 col-md-4 col-sm-4 box-center">
						<div class="logo mb-lg-0 mb-md-3 mb-3 text-center text-md-left">
					        <?php if ( has_custom_logo() ) : ?>
			            		<?php the_custom_logo(); ?>
				            <?php endif; ?>
			              	<?php $blog_info = get_bloginfo( 'name' ); ?>
			              		<?php if( get_theme_mod('organic_farm_logo_title',true) != '' ){ ?>
					                <?php if ( ! empty( $blog_info ) ) : ?>
					                  	<?php if ( is_front_page() && is_home() ) : ?>
					                    	<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					                  	<?php else : ?>
				                      		<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				                  		<?php endif; ?>
					                <?php endif; ?>
					            <?php }?>
				                <?php
			                  		$description = get_bloginfo( 'description', 'display' );
				                  	if ( $description || is_customize_preview() ) :
				                ?>
				                <?php if( get_theme_mod('organic_farm_logo_text',true) != '' ){ ?>
				                  	<p class="site-description">
				                    	<?php echo esc_html($description); ?>
				                  	</p>
				                <?php }?>
			              	<?php endif; ?>
					    </div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-9 box-center">
						<div class="product-search">
							<?php
							if ( class_exists( 'WooCommerce' ) ) { ?>
								<?php get_product_search_form(); ?>
							<?php }?>
						</div>
					</div>
					<div class="col-lg-1 col-md-2 col-sm-2 col-3 box-center text-right">
						<?php
							if ( class_exists( 'WooCommerce' ) ) { ?>
							<?php global $woocommerce; ?>
							<a href="<?php echo wc_get_cart_url() ?>" class="header-cart"><i class="fas fa-shopping-cart"></i> <span><?php echo $woocommerce->cart->cart_contents_count ?></span></a>
						<?php }?>
					</div>
				</div>
			</div>
		</div>
		<div class="menu_header py-2">
			<div class="container">
				<div class="row">
					<div class="col-lg-9 col-md-7 col-sm-7 col-3 box-center">
						<?php if(has_nav_menu('primary')){?>
							<div class="toggle-menu gb_menu ">
								<button onclick="organic_farm_gb_Menu_open()" class="gb_toggle p-2 mb-2 mb-md-0"><i class="fas fa-ellipsis-h"></i><p class="mb-0"><?php esc_html_e('Menu','green-farm'); ?></p></button>
							</div>
						<?php }?>
		   				<?php get_template_part('template-parts/navigation/navigation'); ?>
					</div>
					<div class="col-lg-3 col-md-5 col-sm-5 col-9 box-center">
						<?php dynamic_sidebar( 'product-cat' ); ?>
					</div>
				</div>
			</div>
		</div>