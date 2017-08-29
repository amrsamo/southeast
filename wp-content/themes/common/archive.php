<?php
/**
 * The template for displaying post archives
 *
 * @package Layers
 * @since Layers 1.0.0
 */

get_header(); ?>
<?php get_template_part( 'partials/header' , 'breadcrumb' ); ?>

			<!-- BLOG AREA START -->
			<div class="common-blog-area common-blog-archive">
				<div class="em40_container">				
					<div class="em40_row">

						
						<?php if (have_posts() ) : ?>
													
							<div class="col-md-8 col-sm-6 col-xs-12">
								<div class="em40_row">
								
								<?php while ( have_posts() ) : the_post();
								
									global $post; ?>
									
									<?php get_template_part( 'partials/content' , 'list' ); ?>
									
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
						

						<?php get_sidebar( 'right' ); ?>
																					

					</div>
				</div>
			</div>
			<!-- END BLOG AREA START -->

<?php get_footer();