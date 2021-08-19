<?php
/**
 * Kitchen Decor: Customizer
 *
 * @subpackage Kitchen Decor
 * @since 1.0
 */

use WPTRT\Customize\Section\Kitchen_Decor_Button;

add_action( 'customize_register', function( $manager ) {

	$manager->register_section_type( Kitchen_Decor_Button::class );

	$manager->add_section(
		new Kitchen_Decor_Button( $manager, 'kitchen_decor_pro', [
			'title'      => __( 'Kitchen Decor Pro', 'kitchen-decor' ),
			'priority'    => 0,
			'button_text' => __( 'Go Pro', 'kitchen-decor' ),
			'button_url'  => esc_url( 'https://www.luzuk.com/product/kitchen-wordpress-theme/', 'kitchen-decor')
		] )
	);

} );

// Load the JS and CSS.
add_action( 'customize_controls_enqueue_scripts', function() {

	$version = wp_get_theme()->get( 'Version' );

	wp_enqueue_script(
		'kitchen-decor-customize-section-button',
		get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/js/customize-controls.js' ),
		[ 'customize-controls' ],
		$version,
		true
	);

	wp_enqueue_style(
		'kitchen-decor-customize-section-button',
		get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/css/customize-controls.css' ),
		[ 'customize-controls' ],
 		$version
	);

} );

function kitchen_decor_customize_register( $wp_customize ) {

	$wp_customize->add_setting('kitchen_decor_logo_margin',array(
       'sanitize_callback'	=> 'esc_html'
    ));
    $wp_customize->add_control('kitchen_decor_logo_margin',array(
       'label' => __('Logo Margin','kitchen-decor'),
       'section' => 'title_tagline'
    ));

	$wp_customize->add_setting('kitchen_decor_logo_top_margin',array(
       'default' => '',
       'sanitize_callback'	=> 'kitchen_decor_sanitize_float'
    ));
    $wp_customize->add_control('kitchen_decor_logo_top_margin',array(
       'type' => 'number',
       'description' => __('Top','kitchen-decor'),
       'section' => 'title_tagline',
    ));

	$wp_customize->add_setting('kitchen_decor_logo_bottom_margin',array(
       'default' => '',
       'sanitize_callback'	=> 'kitchen_decor_sanitize_float'
    ));
    $wp_customize->add_control('kitchen_decor_logo_bottom_margin',array(
       'type' => 'number',
       'description' => __('Bottom','kitchen-decor'),
       'section' => 'title_tagline',
    ));

	$wp_customize->add_setting('kitchen_decor_logo_left_margin',array(
       'default' => '',
       'sanitize_callback'	=> 'kitchen_decor_sanitize_float'
    ));
    $wp_customize->add_control('kitchen_decor_logo_left_margin',array(
       'type' => 'number',
       'description' => __('Left','kitchen-decor'),
       'section' => 'title_tagline',
    ));

	$wp_customize->add_setting('kitchen_decor_logo_right_margin',array(
       'default' => '',
       'sanitize_callback'	=> 'kitchen_decor_sanitize_float'
    ));
    $wp_customize->add_control('kitchen_decor_logo_right_margin',array(
       'type' => 'number',
       'description' => __('Right','kitchen-decor'),
       'section' => 'title_tagline',
    ));

	$wp_customize->add_setting('kitchen_decor_show_site_title',array(
       'default' => true,
       'sanitize_callback'	=> 'kitchen_decor_sanitize_checkbox'
    ));
    $wp_customize->add_control('kitchen_decor_show_site_title',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Site Title','kitchen-decor'),
       'section' => 'title_tagline'
    ));

    $wp_customize->add_setting('kitchen_decor_show_tagline',array(
       'default' => true,
       'sanitize_callback'	=> 'kitchen_decor_sanitize_checkbox'
    ));
    $wp_customize->add_control('kitchen_decor_show_tagline',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Site Tagline','kitchen-decor'),
       'section' => 'title_tagline'
    ));

	$wp_customize->add_panel( 'kitchen_decor_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Theme Settings', 'kitchen-decor' ),
	    'description' => __( 'Description of what this panel does.', 'kitchen-decor' ),
	) );

	$wp_customize->add_section( 'kitchen_decor_theme_options_section', array(
    	'title'      => __( 'General Settings', 'kitchen-decor' ),
		'priority'   => 30,
		'panel' => 'kitchen_decor_panel_id'
	) );

	$wp_customize->add_setting('kitchen_decor_theme_options',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'kitchen_decor_sanitize_choices'
	));
	$wp_customize->add_control('kitchen_decor_theme_options',array(
        'type' => 'select',
        'label' => __('Blog Page Sidebar Layout','kitchen-decor'),
        'section' => 'kitchen_decor_theme_options_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','kitchen-decor'),
            'Right Sidebar' => __('Right Sidebar','kitchen-decor'),
            'One Column' => __('One Column','kitchen-decor'),
            'Grid Layout' => __('Grid Layout','kitchen-decor')
        ),
	));

	$wp_customize->add_setting('kitchen_decor_single_post_sidebar',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'kitchen_decor_sanitize_choices'
	));
	$wp_customize->add_control('kitchen_decor_single_post_sidebar',array(
        'type' => 'select',
        'label' => __('Single Post Sidebar Layout','kitchen-decor'),
        'section' => 'kitchen_decor_theme_options_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','kitchen-decor'),
            'Right Sidebar' => __('Right Sidebar','kitchen-decor'),
            'One Column' => __('One Column','kitchen-decor')
        ),
	));

	$wp_customize->add_setting('kitchen_decor_page_sidebar',array(
        'default' => 'One Column',
        'sanitize_callback' => 'kitchen_decor_sanitize_choices'
	));
	$wp_customize->add_control('kitchen_decor_page_sidebar',array(
        'type' => 'select',
        'label' => __('Page Sidebar Layout','kitchen-decor'),
        'section' => 'kitchen_decor_theme_options_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','kitchen-decor'),
            'Right Sidebar' => __('Right Sidebar','kitchen-decor'),
            'One Column' => __('One Column','kitchen-decor')
        ),
	));

	$wp_customize->add_setting('kitchen_decor_archive_page_sidebar',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'kitchen_decor_sanitize_choices'
	));
	$wp_customize->add_control('kitchen_decor_archive_page_sidebar',array(
        'type' => 'select',
        'label' => __('Archive & Search Page Sidebar Layout','kitchen-decor'),
        'section' => 'kitchen_decor_theme_options_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','kitchen-decor'),
            'Right Sidebar' => __('Right Sidebar','kitchen-decor'),
            'One Column' => __('One Column','kitchen-decor'),
            'Grid Layout' => __('Grid Layout','kitchen-decor')
        ),
	));

	//Bottom Header
	$wp_customize->add_section( 'kitchen_decor_header_section' , array(
    	'title'    => __( 'Header', 'kitchen-decor' ),
		'priority' => null,
		'panel' => 'kitchen_decor_panel_id'
	) );

	$wp_customize->add_setting('kitchen_decor_topheader_phone_no',array(
       	'default' => '',
       	'sanitize_callback'	=> 'kitchen_decor_sanitize_phone_number'
	));
	$wp_customize->add_control('kitchen_decor_topheader_phone_no',array(
	   	'type' => 'text',
	   	'label' => __('Add Phone Number','kitchen-decor'),
	   	'section' => 'kitchen_decor_header_section',
	));

	$wp_customize->add_setting('kitchen_decor_topheader_email',array(
       	'default' => '',
       	'sanitize_callback'	=> 'sanitize_email'
	));
	$wp_customize->add_control('kitchen_decor_topheader_email',array(
	   	'type' => 'text',
	   	'label' => __('Add Email Address','kitchen-decor'),
	   	'section' => 'kitchen_decor_header_section',
	));

	$wp_customize->add_setting('kitchen_decor_topheader_facebook_url',array(
       	'default' => '',
       	'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('kitchen_decor_topheader_facebook_url',array(
	   	'type' => 'url',
	   	'label' => __('Add Facebook URL','kitchen-decor'),
	   	'section' => 'kitchen_decor_header_section',
	));

	$wp_customize->add_setting('kitchen_decor_topheader_twitter_url',array(
       	'default' => '',
       	'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('kitchen_decor_topheader_twitter_url',array(
	   	'type' => 'url',
	   	'label' => __('Add Twitter URL','kitchen-decor'),
	   	'section' => 'kitchen_decor_header_section',
	));

	$wp_customize->add_setting('kitchen_decor_topheader_instagram_url',array(
       	'default' => '',
       	'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('kitchen_decor_topheader_instagram_url',array(
	   	'type' => 'url',
	   	'label' => __('Add Instagram URL','kitchen-decor'),
	   	'section' => 'kitchen_decor_header_section',
	));

	$wp_customize->add_setting('kitchen_decor_topheader_linkedin_url',array(
       	'default' => '',
       	'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('kitchen_decor_topheader_linkedin_url',array(
	   	'type' => 'url',
	   	'label' => __('Add Linkedin URL','kitchen-decor'),
	   	'section' => 'kitchen_decor_header_section',
	));

	//home page slider
	$wp_customize->add_section( 'kitchen_decor_slider_section' , array(
    	'title'    => __( 'Slider Settings', 'kitchen-decor' ),
		'priority' => null,
		'panel' => 'kitchen_decor_panel_id'
	) );

	$wp_customize->add_setting('kitchen_decor_slider_hide_show',array(
       	'default' => false,
       	'sanitize_callback'	=> 'kitchen_decor_sanitize_checkbox'
	));
	$wp_customize->add_control('kitchen_decor_slider_hide_show',array(
	   	'type' => 'checkbox',
	   	'label' => __('Show / Hide Slider','kitchen-decor'),
	   	'section' => 'kitchen_decor_slider_section',
	));

	for ( $count = 1; $count <= 4; $count++ ) {
		$wp_customize->add_setting( 'kitchen_decor_slider' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'kitchen_decor_sanitize_dropdown_pages'
		));
		$wp_customize->add_control( 'kitchen_decor_slider' . $count, array(
			'label' => __('Select Slider Image Page', 'kitchen-decor' ),
			'description' => __('Image Size (1600px x 600px)', 'kitchen-decor' ),
			'section' => 'kitchen_decor_slider_section',
			'type' => 'dropdown-pages'
		));
	}

	//About Section
	$wp_customize->add_section('kitchen_decor_about_section',array(
		'title'	=> __('About Section','kitchen-decor'),
		'description'=> __('This section will appear below the slider.','kitchen-decor'),
		'panel' => 'kitchen_decor_panel_id',
	));

	$wp_customize->add_setting('kitchen_decor_about_small_title',array(
       	'default' => '',
       	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('kitchen_decor_about_small_title',array(
	   	'type' => 'text',
	   	'label' => __('Add Small Title','kitchen-decor'),
	   	'section' => 'kitchen_decor_about_section',
	));

	$args =  array('numberposts' => -1);
	$post_list = get_posts($args);
	$i = 0;
	$psts[]='Select';  
	foreach($post_list as $post){
		$psts[$post->post_title] = $post->post_title;
	}

	$wp_customize->add_setting('kitchen_decor_about_post',array(
		'sanitize_callback' => 'kitchen_decor_sanitize_choices',
	));
	$wp_customize->add_control('kitchen_decor_about_post',array(
		'type'    => 'select',
		'choices' => $psts,
		'label' => __('Select post','kitchen-decor'),
		'section' => 'kitchen_decor_about_section',
	));

	$wp_customize->add_setting('kitchen_decor_about_image_text',array(
       	'default' => '',
       	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('kitchen_decor_about_image_text',array(
	   	'type' => 'text',
	   	'label' => __('About Image Text','kitchen-decor'),
	   	'section' => 'kitchen_decor_about_section',
	));

	//Footer
    $wp_customize->add_section( 'kitchen_decor_footer', array(
    	'title'  => __( 'Footer Text', 'kitchen-decor' ),
		'priority' => null,
		'panel' => 'kitchen_decor_panel_id'
	) );

	$wp_customize->add_setting('kitchen_decor_show_back_totop',array(
       'default' => true,
       'sanitize_callback'	=> 'kitchen_decor_sanitize_checkbox'
    ));
    $wp_customize->add_control('kitchen_decor_show_back_totop',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Back to Top','kitchen-decor'),
       'section' => 'kitchen_decor_footer'
    ));

    $wp_customize->add_setting('kitchen_decor_footer_copy',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('kitchen_decor_footer_copy',array(
		'label'	=> __('Footer Text','kitchen-decor'),
		'section' => 'kitchen_decor_footer',
		'setting' => 'kitchen_decor_footer_copy',
		'type' => 'text'
	));

	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'kitchen_decor_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'kitchen_decor_customize_partial_blogdescription',
	) );

	//front page
	$num_sections = apply_filters( 'kitchen_decor_front_page_sections', 4 );

	// Create a setting and control for each of the sections available in the theme.
	for ( $i = 1; $i < ( 1 + $num_sections ); $i++ ) {
		$wp_customize->add_setting( 'panel_' . $i, array(
			'default'           => false,
			'sanitize_callback' => 'kitchen_decor_sanitize_dropdown_pages',
			'transport'         => 'postMessage',
		) );

		$wp_customize->add_control( 'panel_' . $i, array(
			/* translators: %d is the front page section number */
			'label'          => sprintf( __( 'Front Page Section %d Content', 'kitchen-decor' ), $i ),
			'description'    => ( 1 !== $i ? '' : __( 'Select pages to feature in each area from the dropdowns. Add an image to a section by setting a featured image in the page editor. Empty sections will not be displayed.', 'kitchen-decor' ) ),
			'section'        => 'theme_options',
			'type'           => 'dropdown-pages',
			'allow_addition' => true,
			'active_callback' => 'kitchen_decor_is_static_front_page',
		) );

		$wp_customize->selective_refresh->add_partial( 'panel_' . $i, array(
			'selector'            => '#panel' . $i,
			'render_callback'     => 'kitchen_decor_front_page_section',
			'container_inclusive' => true,
		) );
	}
}
add_action( 'customize_register', 'kitchen_decor_customize_register' );

function kitchen_decor_customize_partial_blogname() {
	bloginfo( 'name' );
}

function kitchen_decor_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

function kitchen_decor_is_static_front_page() {
	return ( is_front_page() && ! is_home() );
}

function kitchen_decor_is_view_with_layout_option() {
	// This option is available on all pages. It's also available on archives when there isn't a sidebar.
	return ( is_page() || ( is_archive() && ! is_active_sidebar( 'sidebar-1' ) ) );
}