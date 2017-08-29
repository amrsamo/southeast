<?php
/**
 * Template Name: Page Left Sidebar
 */
get_header();
get_template_part( 'partials/header' , 'breadcrumb' ); ?>


			<!-- BLOG AREA START -->
			<div class="common-blog-area common-blog-page single-blog-details theme-main-page">
				<div class="em40_container">				
					<div class="em40_row">
					
					
						<?php if ( is_active_sidebar( 'sidebar-3' ) ) {?>
							<div class="col-md-4 col-lg-3 col-sm-5 col-xs-12  sidebar-right content-widget">
								<div class="blog-left-side widget pdsl">								
									<?php dynamic_sidebar( 'sidebar-3' ); ?>
								</div>
							</div>
						
							<div class="col-md-8 col-lg-9  col-sm-7 col-sm-12 col-xs-12 blog-lr">
								<?php if (have_posts() ) : ?>

										<?php while ( have_posts() ) : the_post();
										
											global $post; ?>
											
											<?php get_template_part( 'partials/content' , 'page' ); ?>
											
										<?php endwhile; // while has_post(); ?>									
															
								<?php endif; // if has_post() ?>
									
							</div>
							
						<?php }else{ ?>
						
							<div class="col-md-12  col-sm-12 col-xs-12 blog-lr">
								<?php if (have_posts() ) : ?>

										<?php while ( have_posts() ) : the_post();
										
											global $post; ?>
											
											<?php get_template_part( 'partials/content' , 'page' ); ?>
											
										<?php endwhile; // while has_post(); ?>									
															
								<?php endif; // if has_post() ?>
									
							</div>
						<?php } ?>


					</div>	
				</div>
			</div>
			<!-- END BLOG AREA START -->



<?php get_footer();