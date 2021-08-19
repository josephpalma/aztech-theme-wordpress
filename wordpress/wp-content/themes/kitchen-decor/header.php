<?php
/**
 * The header for our theme
 *
 * @subpackage Kitchen Decor
 * @since 1.0
 * @version 0.1
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php if ( function_exists( 'wp_body_open' ) ) {
    wp_body_open();
} else {
    do_action( 'wp_body_open' );
}?>

<a class="screen-reader-text skip-link" href="#skip-content"><?php esc_html_e( 'Skip to content', 'kitchen-decor' ); ?></a>

<div id="header">
	<div class="topbar">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-4">
					<div class="social-icons py-2 text-md-left text-center">
						<?php if(get_theme_mod('kitchen_decor_topheader_facebook_url')) {?>
							<a href="<?php echo esc_url(get_theme_mod('kitchen_decor_topheader_facebook_url')); ?>"><i class="fab fa-facebook-f"></i><span class="screen-reader-text"><?php echo esc_html('Facebook', 'kitchen-decor'); ?></span></a>
						<?php }?>
						<?php if(get_theme_mod('kitchen_decor_topheader_twitter_url')) {?>
							<a href="<?php echo esc_url(get_theme_mod('kitchen_decor_topheader_twitter_url')); ?>"><i class="fab fa-twitter"></i><span class="screen-reader-text"><?php echo esc_html('Twitter', 'kitchen-decor'); ?></span></a>
						<?php }?>
						<?php if(get_theme_mod('kitchen_decor_topheader_instagram_url')) {?>
							<a href="<?php echo esc_url(get_theme_mod('kitchen_decor_topheader_instagram_url')); ?>"><i class="fab fa-instagram"></i><span class="screen-reader-text"><?php echo esc_html('Instagram', 'kitchen-decor'); ?></span></a>
						<?php }?>
						<?php if(get_theme_mod('kitchen_decor_topheader_linkedin_url')) {?>
							<a href="<?php echo esc_url(get_theme_mod('kitchen_decor_topheader_linkedin_url')); ?>"><i class="fab fa-linkedin-in"></i><span class="screen-reader-text"><?php echo esc_html('Linkedin', 'kitchen-decor'); ?></span></a>
						<?php }?>
					</div>
				</div>
				<div class="col-lg-6 col-md-8 text-md-right  text-center contacts py-2">
					<?php if(get_theme_mod('kitchen_decor_topheader_phone_no')) {?>
						<a href="tel:<?php echo esc_attr(get_theme_mod('kitchen_decor_topheader_phone_no')); ?>"><p class="callno mb-0 text-md-right text-center"><i class="fas fa-phone"></i><?php esc_html_e( 'Call Us: ','kitchen-decor' );?><?php echo esc_html(get_theme_mod('kitchen_decor_topheader_phone_no')); ?></p><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('kitchen_decor_topheader_phone_no')); ?></span></a>
					<?php }?>
					<?php if(get_theme_mod('kitchen_decor_topheader_email')) {?>
						<a href="mailto:<?php echo esc_attr(get_theme_mod('kitchen_decor_topheader_email')); ?>"><p class="email mb-md-0 text-md-right text-center"><i class="far fa-envelope"></i><?php esc_html_e( 'Email: ','kitchen-decor' );?><?php echo esc_html(get_theme_mod('kitchen_decor_topheader_email')); ?></p><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('kitchen_decor_topheader_email')); ?></span></a>
					<?php }?>
				</div>
			</div>
		</div>
	</div>
	<div class="bottom-header">
		<div class="container">
			<div class="menu-section">
				<div class="row">
					<div class="col-lg-3 col-md-4 col-9 align-self-center">
						<div class="logo">
							<?php if ( has_custom_logo() ) : ?>
			            		<?php the_custom_logo(); ?>
				            <?php endif; ?>
			             	<?php if (get_theme_mod('kitchen_decor_show_site_title',true)) {?>
			          			<?php $blog_info = get_bloginfo( 'name' ); ?>
				                <?php if ( ! empty( $blog_info ) ) : ?>
				                  	<?php if ( is_front_page() && is_home() ) : ?>
				                    	<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				                  	<?php else : ?>
			                      		<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			                  		<?php endif; ?>
				                <?php endif; ?>
				            <?php }?>
				            <?php if (get_theme_mod('kitchen_decor_show_tagline',true)) {?>
				                <?php
			                  		$description = get_bloginfo( 'description', 'display' );
				                  	if ( $description || is_customize_preview() ) :
				                ?>
			                  	<p class="site-description">
			                    	<?php echo esc_attr($description); ?>
			                  	</p>
			              		<?php endif; ?>
			          		<?php }?>
						</div>
					</div>
					<div class="col-lg-8 col-md-7 col-3 align-self-center">
						<div class="toggle-menu responsive-menu">
							<?php if(has_nav_menu('primary')){ ?>
				            	<button onclick="kitchen_decor_open()" role="tab" class="mobile-menu"><i class="fas fa-bars"></i><span class="screen-reader-text"><?php esc_html_e('Open Menu','kitchen-decor'); ?></span></button>
				            <?php }?>
				        </div>
						<div id="sidelong-menu" class="nav sidenav">
			                <nav id="primary-site-navigation" class="nav-menu" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'kitchen-decor' ); ?>">
			                  	<?php if(has_nav_menu('primary')){
				                    wp_nav_menu( array( 
										'theme_location' => 'primary',
										'container_class' => 'main-menu-navigation clearfix' ,
										'menu_class' => 'clearfix',
										'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
										'fallback_cb' => 'wp_page_menu',
				                    ) ); 
			                  	} ?>
			                  	<a href="javascript:void(0)" class="closebtn responsive-menu" onclick="kitchen_decor_close()"><i class="fas fa-times"></i><span class="screen-reader-text"><?php esc_html_e('Close Menu','kitchen-decor'); ?></span></a>
			                </nav>
			            </div>
					</div>
					<div class="col-lg-1 col-md-1 text-md-right text-center pl-md-0 align-self-center">
						<?php if(class_exists('woocommerce')){ ?>
						    <span class="cart_icon position-relative">
						        <a class="cart-contents" href="<?php if(function_exists('wc_get_cart_url')){ echo esc_url(wc_get_cart_url()); } ?>"><i class="fa fa-shopping-basket"></i></a>
					            <li class="cart_box">
					              <span class="cart-value"> <?php echo wp_kses_data( WC()->cart->get_cart_contents_count() );?></span>
					            </li>
						    </span>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>