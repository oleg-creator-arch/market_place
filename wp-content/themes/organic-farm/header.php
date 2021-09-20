<?php
/**
 * The header for our theme
 *
 * @subpackage Organic Farm
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
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'organic-farm' ); ?></a>
	<?php if( get_theme_mod('organic_farm_theme_loader',true) != ''){ ?>
		<div class="preloader">
			<div class="load">
			  <hr/><hr/><hr/><hr/>
			</div>
		</div>
	<?php }?>
	<div id="page" class="site">
		<div id="header" class="pt-3 mb-5">
			<div class="container">
				<div class="wrap_figure">
					<div class="top_header py-3">
						<div class="row">
							<div class="col-lg-4 col-md-12 box-center">
								<div class="logo mb-lg-0 mb-md-3 mb-3 text-center text-lg-left">
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
							<div class="col-lg-3 col-md-5 box-center col-6">
								<?php if( get_theme_mod('organic_farm_email_text') != '' || get_theme_mod('organic_farm_email') != ''){ ?>
									<div class="info-box mb-lg-0 mb-md-0 mb-3 text-lg-left text-center text-md-left">
										<div class="row">
											<div class="col-lg-3 col-md-4">
												<i class="fas fa-envelope p-3 text-center"></i>
											</div>
											<div class="col-lg-9 col-md-8">
												<strong><?php echo esc_html(get_theme_mod('organic_farm_email_text','')); ?></strong>
												<p class="mb-0"><?php echo esc_html(get_theme_mod('organic_farm_email','')); ?></p>
											</div>
										</div>
									</div>
								<?php }?>
							</div>
							<div class="col-lg-3 col-md-4 box-center col-6">
								<?php if( get_theme_mod('organic_farm_call_text') != '' || get_theme_mod('organic_farm_call') != ''){ ?>
									<div class="info-box mb-lg-0 mb-md-0 mb-3 text-center text-lg-left text-md-left">
										<div class="row">
											<div class="col-lg-3 col-md-4">
												<i class="fas fa-phone p-3 text-center"></i>
											</div>
											<div class="col-lg-9 col-md-8">
												<strong><?php echo esc_html(get_theme_mod('organic_farm_call_text','')); ?></strong>
												<p class="mb-0"><?php echo esc_html(get_theme_mod('organic_farm_call','')); ?></p>
											</div>
										</div>
									</div>
								<?php }?>
							</div>							
							<div class="col-lg-2 col-md-3 box-center">
								<div class="links my-2 text-center text-lg-left text-md-left">
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
					<div class="menu_header">
						<div class="row">
							<div class="col-lg-10 col-md-9 col-3">
								<?php if(has_nav_menu('primary')){?>
									<div class="toggle-menu gb_menu ">
										<button onclick="organic_farm_gb_Menu_open()" class="gb_toggle p-2 px-4 mb-2 mb-md-0"><i class="fas fa-ellipsis-h"></i><p class="mb-0"><?php esc_html_e('Menu','organic-farm'); ?></p></button>
									</div>
								<?php }?>
				   				<?php get_template_part('template-parts/navigation/navigation'); ?>
							</div>
							<div class="col-lg-2 col-md-3 col-9">
								<div class="quote-btn text-center">
									<?php if( get_theme_mod('organic_farm_quote_btn_link') != '' || get_theme_mod('organic_farm_quote_btn') != ''){ ?>
										<a class="p-3" href="<?php echo esc_url(get_theme_mod('organic_farm_quote_btn_link','')); ?>"><?php echo esc_html(get_theme_mod('organic_farm_quote_btn','')); ?></a>
									<?php }?>
								</div>
							</div>
						</div>					   	
					</div>
				</div>
			</div>
		</div>