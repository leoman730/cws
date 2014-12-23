<?php

/* sets predefined Post Thumbnail dimensions */
if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-thumbnails' );
	
	//default thumbnail size
	add_image_size( 'default-thumb', 32, 32, true );
	add_image_size( 'archive-thumb', 300, 300, true );
	add_image_size( 'tabber-thumb', 42, 42, true );
	
};

?>