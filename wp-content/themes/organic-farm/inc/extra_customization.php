<?php 

	$organic_farm_sticky_header = get_theme_mod('organic_farm_sticky_header');

	$organic_farm_custom_style= "";

	if($organic_farm_sticky_header != true){

		$organic_farm_custom_style .='.menu_header.fixed{';

			$organic_farm_custom_style .='position: static;';
			
		$organic_farm_custom_style .='}';
	}

	$organic_farm_logo_max_height = get_theme_mod('organic_farm_logo_max_height');

	if($organic_farm_logo_max_height != false){

		$organic_farm_custom_style .='.custom-logo-link img{';

			$organic_farm_custom_style .='max-height: '.esc_html($organic_farm_logo_max_height).'px;';
			
		$organic_farm_custom_style .='}';
	}