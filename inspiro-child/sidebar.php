<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Inspiro
 * @subpackage Inspiro_Lite
 * @since Inspiro 1.0.0
 * @version 1.0.0
 */

?>

<aside id="side-nav" class="side-nav" tabindex="-1">
	<div class="side-nav__scrollable-container">
		<div class="side-nav__wrap">
			<div class="side-nav__close-button">
				<button type="button" class="navbar-toggle">
					<span class="screen-reader-text"><?php esc_html_e( 'Toggle navigation', 'inspiro' ); ?></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>

			<p style="font-size: 26px; margin: 5% auto 15% auto">AZTECH TATTOO<p>

			<?php if ( has_nav_menu( 'primary' ) ) : ?>
				<nav class="mobile-menu-wrapper" aria-label="<?php echo esc_attr_x( 'Mobile Menu', 'menu', 'inspiro' ); ?>" role="navigation">
					<?php
						wp_nav_menu(
							array(
								'menu_class'     => 'nav navbar-nav',
								'theme_location' => 'primary',
								'container'      => '',
							)
						);
					?>

					<div class="sidebar-socials">
						<?php dynamic_sidebar( 'header_social' ); ?>
					</div>

					<div class="sidebar-contacts">
						<p><a href="tel:808-699-8726">808-699-8726</a></p>
					  <p><a href="mailto:aztechtattoohawaii@gmail.com">aztechtattoohawaii@gmail.com</a></p>
					</div>

				</nav>
			<?php endif ?>
			<?php
			if ( is_active_sidebar( 'sidebar' ) ) {
				dynamic_sidebar( 'sidebar' );
			}
			?>
		</div>
	</div>
</aside>
<div class="side-nav-overlay"></div>
