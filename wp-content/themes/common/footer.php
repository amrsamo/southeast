


		</section>

		
			<?php global $common_opt; ?>	

			<?php if ($common_opt['common_address_hide']==true): ?>
			<!-- FOOTER TOP ADDRESS AREA -->
				<div class="top-address-area">
					<div class="<?php if(!empty($common_opt['common_footer_box_layout']) && $common_opt['common_footer_box_layout']=="footer_full"){echo esc_attr('em40_container-fluid');}else{ echo esc_attr('em40_container'); }?>">
						<div class="em40_row">
							<div class="col-md-12">
							
								<div class="footer-top-address">
								<?php if(!empty($common_opt['common_address_logo_style']) && $common_opt['common_address_logo_style']=="s_logo_s2"){?>
									<!-- ADDRESS IMAGE LOGO -->
									<?php if (!empty($common_opt['common_address_logo'])): ?>
										<div class="top_address_logo text-center">
											<img src="<?php echo esc_url($common_opt['common_address_logo']['url']); ?>" alt="" />
										</div>					
									<?php endif ?>
								<?php }else{?>
									<!-- SOCIAL TEXT LOGO -->
									<?php if (!empty($common_opt['common_address_title_text'])): ?>					
										<h2 class="text-center">													
											<?php 
												echo wp_kses($common_opt['common_address_title_text'], array(
													'span' => array(),
												));
											?>														
										</h2>
									<?php endif ?>	
								<?php } ?>					
								</div>
									
								<div class="top_address_content">
									<?php if (!empty($common_opt['common_address_road'])): ?>
										<span><i class="fa fa-map-marker"></i><?php echo esc_html($common_opt['common_address_road']); ?></span>
									<?php endif; ?>	
									<?php if (!empty($common_opt['common_address_email'])): ?>
										<a href="<?php esc_attr_e('mailto:','common')?><?php echo esc_html($common_opt['common_address_email']); ?>"><i class="fa fa-envelope"></i><?php echo esc_html($common_opt['common_address_email']); ?></a>
									<?php endif; ?>	
									<?php if (!empty($common_opt['common_address_mobile'])): ?>						
										<a href="<?php esc_attr_e('tel:','common')?><?php echo esc_html($common_opt['common_address_mobile']); ?>"><i class="fa fa-phone"></i><?php echo esc_html($common_opt['common_address_mobile']); ?></a>
									<?php endif; ?>							
								</div>
							</div>
						</div>
					</div>
				</div>
			<!-- END FOOTER TOP ADDRESS AREA -->
			<?php endif; ?>

			<?php if ($common_opt['common_social_hide']==true): ?>
			<!-- FOOTER TOP AREA -->
				<div class="footer-top">
					<div class="<?php if(!empty($common_opt['common_footer_box_layout']) && $common_opt['common_footer_box_layout']=="footer_full"){echo esc_attr('em40_container-fluid');}else{ echo esc_attr('em40_container'); }?>">
						<div class="em40_row">
							<div class="col-md-12">
								<div class="footer-top-inner">
								
								<?php if(!empty($common_opt['common_social_logo_style']) && $common_opt['common_social_logo_style']=="s_logo_s2"){?>
								<!-- SOCIAL IMAGE LOGO -->
								<?php if (!empty($common_opt['common_social_logo'])): ?>
									<div class="social_logo text-center">
										<img src="<?php echo esc_url($common_opt['common_social_logo']['url']); ?>" alt="" />
									</div>					
								<?php endif ?>
								<?php }else{?>
								<!-- SOCIAL TEXT LOGO -->
								<?php if (!empty($common_opt['common_social_title_text'])): ?>					
									<h2 class="text-center">													
										<?php 
											echo wp_kses($common_opt['common_social_title_text'], array(
												'span' => array(),
											));
										?>														
									</h2>
								<?php endif ?>	
								<?php } ?>	
									
									
								<!-- FOOTER COPYRIGHT TEXT -->
								<?php if (!empty($common_opt['common_social_text'])): ?>
									<p class="text-center">
										<?php						
											echo wp_kses($common_opt['common_social_text'], array(
												'span' => array(),
												'a' => array(
													'href' => array(),
													'title' => array()										
												),
												'b' => array(),
												'p' => array(),
												'strong' => array(),
												'em' => array(),
												'br' => array(),
											));	
										?>						
									</p>
								<?php endif ?>							
				
									<div class="footer-social-icon">					
										<?php 
											foreach($common_opt['common_social_icons'] as $key=>$value ) { 
											
												if($value != ''){						
													 echo '<a class="'.esc_attr($key).' social-icon" href="'.esc_url($value).'" title="'.ucwords(esc_attr($key)).'" target="_blank"><i class="fa fa-'.esc_attr($key).'"></i></a>';
												}
											}
										?>							
					
									</div>
								</div>
							</div>
						</div>		
					</div>
				</div>
			<!-- END FOOTER TOP AREA -->
			<?php endif; ?>

			<?php if ($common_opt['common_widget_hide']==true): ?>
			<!-- FOOTER MIDDLE AREA -->
				<?php $footer_sidebar_count = $common_opt['common_widget_column_count']; ?>
					<?php if( 0 != $footer_sidebar_count ) { ?>
						<div class="footer-middle"> 
							<div class="<?php if(!empty($common_opt['common_footer_box_layout']) && $common_opt['common_footer_box_layout']=="footer_full"){echo esc_attr('em40_container-fluid');}else{ echo esc_attr('em40_container'); }?>">
								<div class="em40_row">
									<?php // Default Sidebar count to 4
									if( '' == $footer_sidebar_count ) $footer_sidebar_count = 4;
									// Get the sidebar class
									$footer_sidebar_class = floor( 12/$footer_sidebar_count ); ?>
									<?php for( $footer = 1; $footer <= $footer_sidebar_count; $footer++ ) { ?>
										<?php if ( is_active_sidebar( 'layers-footer-' . $footer ) ) { ?>
											<div class="col-sm-6 col-md-<?php echo esc_attr( $footer_sidebar_class ); ?> <?php if( $footer == $footer_sidebar_count ) echo esc_attr('last'); ?>">
												<?php dynamic_sidebar( 'layers-footer-' . $footer ); ?>
											</div>
											
										<?php } ?>
									<?php } ?>
								</div>
							</div>
						</div>
					<?php } // if 0 != sidebars ?>	
			<!-- END FOOTER MIDDLE AREA -->
			<?php endif; ?>

			<?php if ($common_opt['common_copyright_hide']==true): ?>
			<!-- FOOTER BOTTOM AREA -->
			<div class="footer-bottom">
				<div class="<?php if(!empty($common_opt['common_footer_box_layout']) && $common_opt['common_footer_box_layout']=="footer_full"){echo esc_attr('em40_container-fluid');}else{ echo esc_attr('em40_container'); }?>">
					<div class="em40_row">
					
						<!-- FOOTER COPYRIGHT STYLE 1 -->		
						<?php			
						if(!empty($common_opt['common_footer_copyright_style']) && $common_opt['common_footer_copyright_style']=="copy_s1"){?>
						
							<div class="col-md-12 footer_style_1">			
								<div class="copy-right-text text-center">
									<!-- FOOTER COPYRIGHT TEXT -->
									<?php if (!empty($common_opt['common_copyright_text'])): ?>
										<p>
											<?php						
												echo wp_kses($common_opt['common_copyright_text'], array(
													'span' => array(),
													'a' => array(
														'href' => array(),
														'title' => array()										
													),
													'b' => array(),
													'p' => array(),
													'strong' => array(),
													'em' => array(),
													'br' => array(),
												));	
											?>
										</p>
									<?php endif ?>					
								</div>
							</div>
						<!-- FOOTER COPYRIGHT STYLE 2 -->		
						<?php }elseif(!empty($common_opt['common_footer_copyright_style']) && $common_opt['common_footer_copyright_style']=="copy_s2"){?>
						
							<div class="col-md-5  col-sm-6">
								<div class="copy-right-text">
									<!-- FOOTER COPYRIGHT TEXT -->
									<?php if (!empty($common_opt['common_copyright_text'])): ?>
										<p>
											<?php						
												echo wp_kses($common_opt['common_copyright_text'], array(
													'span' => array(),
													'a' => array(
														'href' => array(),
														'title' => array()										
													),
													'b' => array(),
													'p' => array(),
													'strong' => array(),
													'em' => array(),
													'br' => array(),
												));	
											?>
										</p>
									<?php endif ?>	
								</div>
							</div>
							<div class="col-md-7  col-sm-6">				
								<div class="footer-menu">
									<!-- FOOTER COPYRIGHT MENU -->
									 <?php if ( has_nav_menu( 'layers-footer' ) ) {
											wp_nav_menu( array(
											'theme_location' => 'layers-footer',
											'menu_class' => 'text-right',
											'fallback_cb' => false,
											'em40_container' => '',
											) );
									 } ?> 				
								</div>
							</div>
						<!-- FOOTER COPYRIGHT STYLE 3 -->		
						<?php }elseif(!empty($common_opt['common_footer_copyright_style']) && $common_opt['common_footer_copyright_style']=="copy_s3"){?>
						
							<div class="col-md-7  col-sm-6 footer_style_3">
								<div class="footer-menu">
									<!-- FOOTER COPYRIGHT MENU -->				
									 <?php if ( has_nav_menu( 'layers-footer' ) ) {
											wp_nav_menu( array(
											'theme_location' => 'layers-footer',
											'menu_class' => 'text-left',
											'fallback_cb' => false,
											'em40_container' => '',
											) );
									 } ?> 
								</div>
							</div>		
						
							<div class="col-md-5  col-sm-6 footer_style_3">
								<div class="copy-right-text text-right">
									<!-- FOOTER COPYRIGHT TEXT -->
									<?php if (!empty($common_opt['common_copyright_text'])): ?>
										<p>
											<?php						
												echo wp_kses($common_opt['common_copyright_text'], array(
													'span' => array(),
													'a' => array(
														'href' => array(),
														'title' => array()										
													),
													'b' => array(),
													'p' => array(),
													'strong' => array(),
													'em' => array(),
													'br' => array(),
												));	
											?>
										</p>
									<?php endif ?>	
								</div>
							</div>
							
						<!-- FOOTER COPYRIGHT STYLE 4 -->		
						<?php }elseif(!empty($common_opt['common_footer_copyright_style']) && $common_opt['common_footer_copyright_style']=="copy_s4"){?>
						
							<div class="col-md-6 col-sm-6">
								<div class="copy-right-text">
									<!-- FOOTER COPYRIGHT TEXT -->
									<?php if (!empty($common_opt['common_copyright_text'])): ?>
										<p>
											<?php						
												echo wp_kses($common_opt['common_copyright_text'], array(
													'span' => array(),
													'a' => array(
														'href' => array(),
														'title' => array()										
													),
													'b' => array(),
													'p' => array(),
													'strong' => array(),
													'em' => array(),
													'br' => array(),
												));	
											?>
										</p>
									<?php endif ?>	
								</div>
							</div>
							<div class="col-md-6 col-sm-6">				
								<div class="footer-menu">
									<!-- FOOTER COPYRIGHT SOCIAL MENU -->
									<ul class="text-right">
										<?php 
											foreach($common_opt['common_social_icons'] as $key=>$value ) { 
											
												if($value != ''){						
													 echo '<li><a class="'.esc_attr($key).' social-icon" href="'.esc_url($value).'" title="'.ucwords(esc_attr($key)).'" target="_blank"><i class="fa fa-'.esc_attr($key).'"></i></a></li>';
												}
											}
										?>							
									
									</ul>				
								</div>
							</div>
						<?php } // end copyright style ?>			
					</div>
				</div>
			</div>
			<!-- END FOOTER BOTTOM AREA -->
			
			<?php else: ?>

			<!-- FOOTER BOTTOM AREA -->
			<div class="footer-bottom">
				<div class="<?php if(!empty($common_opt['common_footer_box_layout']) && $common_opt['common_footer_box_layout']=="footer_full"){echo esc_attr('em40_container-fluid');}else{ echo esc_attr('em40_container'); }?>">
					<div class="em40_row">			
						<div class="col-md-12">
							<div class="copy-right-text text-center">
								<!-- FOOTER COPYRIGHT TEXT -->
									<p>
										<?php						
											echo esc_html_e("Copyright &copy; common All Rights Reserved.","common"); 
										?>
									</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- END FOOTER BOTTOM AREA -->
			<?php endif; ?>		
		
		
		
		
		
		











		
		
	</div><!-- END / MAIN SITE #wrapper -->
	
	
	<?php do_action( 'layers_after_site_wrapper' ); ?>
	<?php wp_footer(); ?>
</body>
</html>