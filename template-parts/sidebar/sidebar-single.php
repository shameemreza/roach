<?php

	roach_show_ads(3);

	if ( get_theme_mod('roach_show_last_single')) :

	get_template_part('template-parts/loops/loop','sidebar');	

	endif;

	if ( is_active_sidebar( 'single' ) ) :

	dynamic_sidebar( 'single' );

	endif;

	roach_show_ads(4);
