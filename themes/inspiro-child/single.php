<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Inspiro
 * @subpackage Inspiro_Lite
 * @since Inspiro 1.0.0
 * @version 1.0.0
 */

get_header(); ?>

<main id="main" class="site-main container-fluid" role="main">

	<?php
	// Start the Loop.
	while ( have_posts() ) :
		the_post();

		get_template_part( 'template-parts/post/content', get_post_format() );

		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;

		$previous_post = get_previous_post();

    $previous_post_url = get_permalink( $previous_post->ID );

		if ( $previous_post ) {
			echo '<button id="post-button" class="raise"><a href="' . $previous_post_url . '"><p style="margin: 0">Last Tattoo ⤗</p></a></button>';
		} else {
			echo '<div class="no-post-button"></div>';
		}

	endwhile; // End the loop.
	?>

</main><!-- #main -->

<?php
get_footer();
