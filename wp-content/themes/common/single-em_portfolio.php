<?php
/**
 * Standard blog single page
 *
 */

get_header(); 
get_template_part( 'partials/header' , 'breadcrumb' ); ?>
			
			<!-- BLOG AREA START -->
			<div class="common-blog-area common-blog-single single-blog-details">
				<div class="em40_container">				
					<div class="em40_row">


						<?php if( have_posts() ) : ?>

							<?php while( have_posts() ) : the_post(); ?>					
								
									<?php $m_g_image_pop  = get_post_meta( get_the_ID(),'_common_m_g_image_pop', true ); 
								if($m_g_image_pop =="m_gshow"){?>
								<div class="col-md-12">
									<div class="pimgs">
										<div class="single_gallery owl-carousel  curosel-style">										
											<?php
												common_slider_o('_common_pgellaryu',array(1170,650));									
											?>																				
										</div>			
									</div>
								</div>

							
								<div class="col-md-12  col-sm-12 col-xs-12 blog-lr">
									<div class="portfolio-content">
										<div class="portfolio-titles">
											<h2 class="text-center"><?php the_title(); ?></h2>
										</div>
										<div class="prots-content text-center">
											<?php the_content(); ?>
										</div>
									</div>
								</div>	
								

								<?php }else{ ?>
									
										<div class="col-md-12  col-sm-12 col-xs-12 blog-lr">
											<div class="pimgs">
											
												<?php the_post_thumbnail('common-single-portfolio');?>
											
											</div>
										</div>

							
										<div class="col-md-12  col-sm-12 col-xs-12 blog-lr">
											<div class="portfolio-content">
												<div class="portfolio-titles">
													<h2><?php the_title(); ?></h2>
												</div>
												<div class="prots-contentg">
													<?php the_content(); ?>
												</div>
											</div>
										</div>	
			
			
								<?php } ?>					

						<?php endwhile; // while has_post(); ?>

					<?php endif; // if has_post() ?>
									
					</div>	
				</div>
			</div>
			<!-- END BLOG AREA START -->						
<?php
get_footer();