<?php
/**
 * The template for displaying post archives
 *
 * @package Layers
 * @since Layers 1.0.0
 */

get_header();

get_template_part( 'partials/header' , 'breadcrumb' ); ?>
<!-- SEARCH AREA START -->
	<div class="common-blog-area common-blog-page common-search-page">
		<div class="em40_container">		
			<div class="em40_row">
			
				<div class="col-md-8 col-sm-6 col-xs-12">
						<?php if( have_posts() ) : ?>
						
							<div class="em40_row">

								<?php while( have_posts() ) : the_post(); ?>
								
									<?php get_template_part( 'partials/content' , 'search' ); ?>
									
								<?php endwhile; // while has_post(); ?>

								
							</div>
							
							<!-- START PAGINATION -->
							<div class="em40_row">
								<div class="col-md-12">
									
									<?php common_pagination();?>

								</div>
							</div>
							<!-- END START PAGINATION -->	
							
						<?php else : ?>
							<!-- NOT FOUND SEARCH  -->
							<div class="col-md-12">
								<div class="search-error">
									<h3><?php esc_html_e( 'No Any Posts Found', 'common' ); ?></h3>
									<p><?php esc_html_e( 'There are no posts which match your query, please try a different search term.', 'common' ); ?></p>
									<?php echo get_search_form(); ?>
								</div>
							</div>
							
						<?php endif; // if has_post() ?>
						
				</div>						
					
				<?php get_sidebar( 'right' ); ?>
				
			</div><!-- /row -->
		</div>
	</div>
<?php get_footer();