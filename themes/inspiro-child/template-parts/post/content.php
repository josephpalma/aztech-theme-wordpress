<?php
/**
 * Template part for displaying image posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Inspiro
 * @subpackage Inspiro_Lite
 * @since Inspiro 1.0.0
 * @version 1.0.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">
		<img class="tattoo-image" src=<?php echo get_the_post_thumbnail() ?>
		<?php
			if ( ( is_single() || ( is_page() && ! inspiro_is_frontpage() ) ) ) {
				echo '<div class="inner-wrap">';
			}

			if ( is_single() ) {
				the_title( '<h1 class="entry-title">', '</h1>' );
			} elseif ( is_front_page() && is_home() ) {
				the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
			} else {
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			}

			if ( 'post' === get_post_type() ) {
				echo '<div class="entry-meta">';
				$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
				if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
					$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
				}

				$time_string = sprintf(
					$time_string,
					get_the_date( DATE_W3C ),
					get_the_date(),
					get_the_modified_date( DATE_W3C ),
					get_the_modified_date()
				);

				// Wrap the time string in a link, and preface it with 'Posted on'.
				echo '<span class="screen-reader-text">Posted on</span> / ';
				echo '<a href="https://www.instagram.com/aztechtattoohawaii" rel="bookmark">' . $time_string . '</a>';
				echo '</div><!-- .entry-meta -->';
			}
		?>

		<?php
		if ( is_single() || '' === get_the_post_thumbnail() ) {

			// Only show content if is a single post, or if there's no featured image.
			the_content(
				sprintf(
					/* translators: %s: Post title. */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'inspiro' ),
					get_the_title()

				)
			);

			wp_link_pages(
				array(
					'before'      => '<div class="page-links">' . __( 'Pages:', 'inspiro' ),
					'after'       => '</div>',
					'link_before' => '<span class="page-number">',
					'link_after'  => '</span>',
				)


			);
		};
		echo '<div class="see-more"><h5>Check out more awesome tattoos on <a id="blue-link" href="https://www.instagram.com/aztechtattoohawaii">our instagram.</a></h5></div>';
		?>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
