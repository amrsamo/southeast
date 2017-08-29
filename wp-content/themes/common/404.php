<?php
/**
 * The template for displaying the 404 page
 *
 * @package Layers
 * @since Layers 1.0.0
 */

get_header();
get_template_part( 'partials/header' , 'breadcrumb' ); ?>
			<div class="not-found-area">
				<div class="em40_container">
					<div class="em40_row">
						<div class="col-md-12">
						
							<!-- 404 PAGE -->
							<div class="not-found">
								<div class="not-found-inner">

									<?php global $common_opt; ?>
									<?php if (!empty($common_opt['404_info'])): ?>
										<?php 
											echo wp_kses($common_opt['404_info'], array(
												'br' => array(),
												'h2' => array(),
												'a' => array(
														'href' => array(),
														'title' => array()										
													),
												'strong' => array(),
												'em' => array(),
												'p' => array(),
												'span' => array(),
											));
										?>

									<?php else: ?>
										<h2><?php esc_html_e('404','common')?></h2>
										<p><?php esc_html_e('Oops! The page you are Looking for does not exist.','common')?></p>							
									<?php endif; ?>		

								<div class="nf"><a href="<?php echo esc_url(home_url('/'));?>"><?php esc_html_e('Take me back to the home page','common')?></a></div>
								</div>
							</div>
							
						
						</div>
					</div>
				</div>
			</div>

<?php get_footer();