<?php
/**
 * Standard blog index page
 *
 * @package Layers
 * @since Layers 1.0.0
 */

get_header();
common_blog_breadcrumb();
do_action( 'layers_before_index' ); ?>

			<!-- BLOG AREA START -->
			<div class="common-blog-area common-blog-archive">
				<div class="em40_container">				
					<div class="em40_row">
					
						<?php
						if ( have_posts() ) : ?>
													
							<div class="col-md-12 col-sm-12 col-xs-12 bgimgload">
								<div class="em40_row blog-messonary">								
								<?php while (have_posts() ) : the_post();
								
									global $post; ?>
									
									<?php get_template_part( 'partials/content' , 'blog' ); ?>
									
								<?php endwhile; // while has_post(); ?>								
								</div>
								
								<!-- START PAGINATION -->
								<div class="em40_row">
									<div class="col-md-12">
										
										<?php common_pagination();?>

									</div>
								</div>
								<!-- END START PAGINATION -->								
							</div>
						<?php endif; // if has_post() ?>						
																					
					</div>
				</div>
			</div>
			<!-- END BLOG AREA START -->	
<?php do_action( 'layers_after_index' );
get_footer();