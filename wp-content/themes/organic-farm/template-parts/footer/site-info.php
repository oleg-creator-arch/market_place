<?php
/**
 * Displays footer site info
 *
 * @subpackage Organic Farm
 * @since 1.0
 * @version 1.4
 */

?>
<div class="site-info py-4 text-center">
	<?php
		echo esc_html( get_theme_mod( 'organic_farm_footer_text' ) );
		printf(
			/* translators: %s: Organic Farm WordPress Theme. */
			esc_html__( ' %s ', 'organic-farm' ),
			'<a href="' . esc_attr__( 'https://www.ovationthemes.com/wordpress/free-organic-wordpress-theme/', 'organic-farm' ) . '"> Organic Farm WordPress Theme</a>'
		);
	?>
</div>