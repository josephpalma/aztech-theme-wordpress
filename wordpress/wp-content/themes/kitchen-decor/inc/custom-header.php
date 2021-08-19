<?php
/**
 * Custom header implementation
 */

function kitchen_decor_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'kitchen_decor_custom_header_args', array(
		'default-text-color' => 'fff',
		'header-text' 	     =>	false,
		'width'              => 1400,
		'height'             => 75,
		'flex-width'         => true,
		'flex-height'        => true,
		'wp-head-callback'   => 'kitchen_decor_header_style',
	) ) );
}

add_action( 'after_setup_theme', 'kitchen_decor_custom_header_setup' );

if ( ! function_exists( 'kitchen_decor_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see kitchen_decor_custom_header_setup().
 */
add_action( 'wp_enqueue_scripts', 'kitchen_decor_header_style' );
function kitchen_decor_header_style() {
	//Check if user has defined any header image.
	if ( get_header_image() ) :
	$custom_css = "
        #header {
			background-image:url('".esc_url(get_header_image())."');
			background-size: 100% 100%;
		}";
	   	wp_add_inline_style( 'kitchen-decor-basic-style', $custom_css );
	endif;
}
endif; // kitchen_decor_header_style