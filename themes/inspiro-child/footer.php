<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Inspiro
 * @subpackage Inspiro_Lite
 * @since Inspiro 1.0.0
 * @version 1.0.0
 */

?>

		</div><!-- #content -->

		<?php get_template_part( 'template-parts/footer/footer', 'instagram-widget' ); ?>

		<footer id="colophon" <?php inspiro_footer_class(); ?> role="contentinfo">
			<div class="inner-wrap">
				<?php	get_template_part( 'template-parts/footer/footer', 'widgets' ); ?>
				<div id="site-info-footer" class="site-info">
				<span class="copyright">
					<span>
						<div class="footer-design-creds" style="margin-top: -10px;">
						<a id="footer-github" href="https://github.com/josephpalma/aztech-theme-wordpress" target="_blank">Website by Joseph Palma</a>
						<ul class="wp-block-social-links">
							<li class="wp-social-link wp-social-link-github wp-block-social-link">
								<a target="_blank" href="https://github.com/josephpalma/aztech-theme-wordpress" aria-label="GitHub: github.com/josephpalma" class="wp-block-social-link-anchor"> <svg width="24" height="24" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" role="img" aria-hidden="true" focusable="false">
									<path d="M12,2C6.477,2,2,6.477,2,12c0,4.419,2.865,8.166,6.839,9.489c0.5,0.09,0.682-0.218,0.682-0.484 c0-0.236-0.009-0.866-0.014-1.699c-2.782,0.602-3.369-1.34-3.369-1.34c-0.455-1.157-1.11-1.465-1.11-1.465 c-0.909-0.62,0.069-0.608,0.069-0.608c1.004,0.071,1.532,1.03,1.532,1.03c0.891,1.529,2.341,1.089,2.91,0.833 c0.091-0.647,0.349-1.086,0.635-1.337c-2.22-0.251-4.555-1.111-4.555-4.943c0-1.091,0.39-1.984,1.03-2.682 C6.546,8.54,6.202,7.524,6.746,6.148c0,0,0.84-0.269,2.75,1.025C10.295,6.95,11.15,6.84,12,6.836 c0.85,0.004,1.705,0.114,2.504,0.336c1.909-1.294,2.748-1.025,2.748-1.025c0.546,1.376,0.202,2.394,0.1,2.646 c0.64,0.699,1.026,1.591,1.026,2.682c0,3.841-2.337,4.687-4.565,4.935c0.359,0.307,0.679,0.917,0.679,1.852 c0,1.335-0.012,2.415-0.012,2.741c0,0.269,0.18,0.579,0.688,0.481C19.138,20.161,22,16.416,22,12C22,6.477,17.523,2,12,2z"></path></svg>
								</a>
							</li>
						</ul>
					</div>
					</span>
					<span>
						© 2021 Copyright Aztech Tattoo All Rights Reserved
					</span>
				</span>
			</div><!-- .site-info -->
			</div><!-- .inner-wrap -->
		</footer><!-- #colophon -->
	</div><!-- .site-content-contain -->
</div><!-- #page -->
<?php wp_footer(); ?>

</body>
</html>
