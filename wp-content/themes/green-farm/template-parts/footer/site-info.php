<?php
/**
 * Displays footer site info
 *
 * @subpackage Green Farm
 * @since 1.0
 * @version 1.4
 */

?>

<div class="site-info py-4 text-center">
	<?php
		echo esc_html( get_theme_mod( 'organic_farm_footer_text' ) );

		printf(
			/* translators: %s: Green Farm WordPress Theme. */
            '<p class="mb-0"> %s</p>',
            esc_html__( 'Green Farm WordPress Theme', 'green-farm' )
        );
	?>
</div>