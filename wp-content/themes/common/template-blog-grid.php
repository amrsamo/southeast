<?php
/**
 * Template Name: Blog Grid
 */

get_header();
get_template_part( 'partials/header' , 'breadcrumb' ); ?>
			
		<!-- INDEX BLOG AREA START -->
		<div class="common-blog-index blog-area common-blog-area">
			<div class="em40_container bgimgload">				
				<div class="em40_row blog-messonary">
					
						<?php
							$page = ( get_query_var( 'page' ) ? get_query_var( 'page' ) : 1 );
							$paged = ( get_query_var( 'paged' ) ? get_query_var( 'paged' ) : $page );
							$wp_query = new WP_Query( array(
								'post_type' => 'post',
								'paged'     => $paged,
								'page'      => $paged,
							) );
						if ( $wp_query->have_posts() ) : ?>

							<?php while ( $wp_query->have_posts() ) : $wp_query->the_post();
							
								global $post; ?>
								
								<?php get_template_part( 'partials/content' , 'blog' ); ?>
								
							<?php endwhile; // while has_post(); ?>
																		
					<?php endif; // if has_post() ?>
					
				</div>
				
				<!-- START PAGINATION -->
				<div class="em40_row">
					<div class="col-md-12">
						
						<?php common_pagination();?>

					</div>
				</div>
				<!-- END START PAGINATION -->
				
			</div>
		</div>
		<!-- END BLOG AREA START -->							
					
<?php 
get_footer();