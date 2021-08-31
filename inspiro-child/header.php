<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Inspiro
 * @subpackage Inspiro_Lite
 * @since Inspiro 1.0.0
 * @version 1.0.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

  <!-- <div class="space"></div> -->
	<div class="stars"></div>
	<div class="banner">
    <div class="banner-content">
			<div class="banner-text-phone"><a href="tel:808-699-8726"><h5><u>808-699-8726</u></h5></a></div>
			<div class="banner-text-email"><a href="mailto:bookings@aztechtattoohawaii.com"><h5><u>bookings@aztechtattoohawaii.com</u></h5></a></div>
			<div class="banner-socials">
				<?php dynamic_sidebar( 'header_social' ); ?>
			</div>
		</div>
	</div>

<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'inspiro' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<?php get_template_part( 'template-parts/navigation/navigation', 'primary' ); ?>
	</header><!-- #masthead -->

	<?php
	// Display custom header only on first page.
	if ( isset( $paged ) && $paged < 2 ) {
		if ( is_front_page() && is_home() && has_header_image() ) { // Default homepage.
			get_template_part( 'template-parts/header/header', 'image' );
		} elseif ( is_front_page() && has_header_image() ) { // static homepage.
			get_template_part( 'template-parts/header/header', 'image' );
		} elseif ( is_page() && inspiro_is_frontpage() && has_header_image() ) {
			get_template_part( 'template-parts/header/header', 'image' );
		} elseif ( is_page_template( 'page-templates/homepage-builder-bb.php' ) && has_header_image() ) {
			get_template_part( 'template-parts/header/header', 'image' );
		}
	}
	?>

	<div class="site-content-contain">
		<div id="content" class="site-content">
