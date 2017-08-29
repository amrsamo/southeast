<?php
/**
 * Template Name: Blog Right Sidebar
 */

get_header();
get_template_part( 'partials/header' , 'breadcrumb' ); ?>

			<!-- BLOG AREA START -->
			<div class="common-blog-area common-blog-archive">
				<div class="em40_container">				
					<div class="em40_row">
					
						<?php
							$page = ( get_query_var( 'page' ) ? get_query_var( 'page' ) : 1 );
							$paged = ( get_query_var( 'paged' ) ? get_query_var( 'paged' ) : $page );
							$wp_query = new WP_Query( array(
								'post_type' => 'post',
								'paged'     => $paged,
								'page'      => $paged,
							) );
						if ( $wp_query->have_posts() ) : ?>
													
							<div class="col-md-8 col-sm-7 col-xs-12">
								<div class="em40_row">								
								<?php while ( $wp_query->have_posts() ) : $wp_query->the_post();
								
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

<?php 
get_footer();