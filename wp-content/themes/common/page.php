<?php
/**
 * The template for displaying a page
 *
 * @package Layers
 * @since Layers 1.0.0
 */

get_header();
get_template_part( 'partials/header' , 'breadcrumb' ); ?>


			<!-- BLOG AREA START -->
			<div class="common-blog-area common-blog-page single-blog-details theme-main-page">
				<div class="em40_container">				
					<div class="em40_row">
					
						<div class="col-md-12  col-sm-12 col-xs-12 blog-lr">
							<?php if (have_posts() ) : ?>

									<?php while ( have_posts() ) : the_post();
									
										global $post; ?>
										
										<?php get_template_part( 'partials/content' , 'page' ); ?>
										
									<?php endwhile; // while has_post(); ?>									
														
							<?php endif; // if has_post() ?>
								
						</div>

					</div>	
				</div>
			</div>
			<!-- END BLOG AREA START -->



<?php get_footer();