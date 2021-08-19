<?php
/**
 * Template Name: Custom Home
 */

get_header(); ?>

<main id="skip-content" role="main">

	<?php do_action( 'kitchen_decor_above_slider' ); ?>

	<?php if( get_theme_mod('kitchen_decor_slider_hide_show') != ''){ ?>
		<section id="slider">
			<div id="carouselExampleIndicators" class="carousel" data-ride="carousel"> 
			    <?php $kitchen_decor_slider_pages = array();
			    for ( $count = 1; $count <= 4; $count++ ) {
			        $mod = intval( get_theme_mod( 'kitchen_decor_slider'. $count ));
			        if ( 'page-none-selected' != $mod ) {
			          $kitchen_decor_slider_pages[] = $mod;
			        }
			    }
		      	if( !empty($kitchen_decor_slider_pages) ) :
			        $args = array(
			          	'post_type' => 'page',
			          	'post__in' => $kitchen_decor_slider_pages,
			          	'orderby' => 'post__in'
			        );
		        	$query = new WP_Query( $args );
		        if ( $query->have_posts() ) :
		          	$i = 1;
		    	?>     
			    <div class="carousel-inner" role="listbox">
			      	<?php  while ( $query->have_posts() ) : $query->the_post(); ?>
			        <div <?php if($i == 1){echo 'class="carousel-item fade-in-image active"';} else{ echo 'class="carousel-item fade-in-image"';}?>>
			        	<div class="slider-img">
            				<img src="<?php esc_url(the_post_thumbnail_url('full')); ?>" alt="<?php the_title_attribute(); ?> "/>
            			</div>
			            <div class="inner-carousel">
			              	<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			              	<p><?php $kitchen_decor_excerpt = get_the_excerpt(); echo esc_html( kitchen_decor_string_limit_words( $kitchen_decor_excerpt,20 ) ); ?></p>
			              	<a href="<?php the_permalink(); ?>" class="read-btn"><span><?php esc_html_e('READ MORE','kitchen-decor'); ?></span><span class="screen-reader-text"><?php esc_html_e('READ MORE','kitchen-decor'); ?></span></a>
	            		</div>
			        </div>
			      	<?php $i++; endwhile; 
			      	wp_reset_postdata();?>
			    </div>
			    <?php else : ?>
			    <div class="no-postfound"></div>
		      		<?php endif;
			    endif;?>
			    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			      	<span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
			      	<span class="screen-reader-text"><?php esc_html_e( 'Prev','kitchen-decor' );?></span>
			    </a>
			    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			      	<span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
			      	<span class="screen-reader-text"><?php esc_html_e( 'Next','kitchen-decor' );?></span>
			    </a>
			</div>
		  	<div class="clearfix"></div>
		</section>
	<?php }?>

	<?php do_action('kitchen_decor_below_slider'); ?>

	<?php if( get_theme_mod('kitchen_decor_about_post') != ''){ ?>
		<section id="about-section" class="py-5">
			<div class="container">
	            <?php
		        $kitchen_decor_postData =  get_theme_mod('kitchen_decor_about_post');
		        if($kitchen_decor_postData){
		          	$args = array( 'name' => esc_html($kitchen_decor_postData ,'kitchen-decor'));
		          	$query = new WP_Query( $args );
		          	if ( $query->have_posts() ) :
			            while ( $query->have_posts() ) : $query->the_post(); ?>
				            <div class="row">
				            	<div class="col-lg-5 col-md-6">
									<?php if (get_theme_mod('kitchen_decor_about_small_title') != ''){ ?>
										<h3><?php echo esc_html(get_theme_mod('kitchen_decor_about_small_title')); ?></h3>
									<?php }?>
				                    <h4><?php esc_html(the_title()); ?></h4>
				                    <p><?php the_excerpt(); ?></p>
				                    <div class="about-btn">
			                      		<a href="<?php the_title(); ?>"><span><?php esc_html_e('ABOUT US','kitchen-decor'); ?><i class="fas fa-arrow-right"></i></span></a>
				                    </div>
				                </div>
				              	<div class="col-lg-7 col-md-6">
				              		<div class="image-box">
				                  		<?php if(has_post_thumbnail()) { ?><?php the_post_thumbnail(); ?><?php } ?>
				                  		<?php if (get_theme_mod('kitchen_decor_about_image_text') != ''){ ?>
				                  			<div class="outer-box">
				                  				<div class="inner-box">
													<span><?php echo esc_html(get_theme_mod('kitchen_decor_about_image_text')); ?></span>
												</div>
											</div>
										<?php }?>
				               		</div>
				            	</div>
				            </div>
			            <?php endwhile; 
			            wp_reset_postdata();?>
		            <?php else : ?>
		              <div class="no-postfound"></div>
		            <?php
		        endif;} ?>  
				<div class="clearfix"></div>
			</div>
		</section>
	<?php }?>

	<?php do_action('kitchen_decor_below_service_section'); ?>

	<div class="container">
	  	<?php while ( have_posts() ) : the_post(); ?>
	  		<div class="lz-content">
	        	<?php the_content(); ?>
	        </div>
	    <?php endwhile; // end of the loop. ?>
	</div>
</main>

<?php get_footer(); ?>