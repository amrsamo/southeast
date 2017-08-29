<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<?php global $common_opt; ?>

<?php do_action( 'layers_before_site_wrapper' ); ?>	

<div <?php layer_site_wrapper_class(); ?>>

	

<?php if ($common_opt['common_header_display_none_hide']==true): ?>	

<div class="em40_header_area_main hdisplay_none">
<?php else: ?>
	<div class="em40_header_area_main">
<?php endif; ?>



<?php if ($common_opt['common_header_top_hide']==true): ?>	
	<!-- HEADER TOP AREA -->
		<div class="common-header-top">
				
		
			<div class="<?php if(!empty($common_opt['common_box_layout']) && $common_opt['common_box_layout']=="htopt_full"){echo esc_attr('em40_container-fluid');}else{ echo esc_attr('em40_container'); }?>">
				<!-- STYLE 1 RIGHT ICON  -->
				 <?php if(!empty($common_opt['common_top_right_layout']) && $common_opt['common_top_right_layout']=="h_top_l1"){?>			
					<div class="em40_row">
						<!-- TOP LEFT -->
						<div class="col-xs-12 col-md-8 col-sm-9">
							<div class="top-address">
								<p>							
									<?php if (!empty($common_opt['common_header_top_road'])): ?>
										<span><i class="fa fa-home"></i><?php echo esc_html($common_opt['common_header_top_road']); ?></span>
									<?php endif; ?>	
									<?php if (!empty($common_opt['common_header_top_mobile'])): ?>
										<a href="<?php esc_attr_e('tel:','common')?><?php echo esc_html($common_opt['common_header_top_mobile']); ?>"><i class="fa fa-phone"></i><?php echo esc_html($common_opt['common_header_top_mobile']); ?></a>
									<?php endif; ?>	
									<?php if (!empty($common_opt['common_header_top_email'])): ?>
										<a href="<?php esc_attr_e('mailto:','common')?><?php echo esc_html($common_opt['common_header_top_email']); ?>"><i class="fa fa-envelope-o"></i><?php echo esc_html($common_opt['common_header_top_email']); ?></a>
									<?php endif; ?>	
								</p>
							</div>
						</div>
						<!-- TOP RIGHT -->
						<div class="col-xs-12 col-md-4 col-sm-3">
							<div class="top-right-menu">
								<ul class="social-icons text-right">
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
					</div>	
				<!-- STYLE 1 RIGHT MENU  -->
				 <?php }elseif(!empty($common_opt['common_top_right_layout']) && $common_opt['common_top_right_layout']=="h_top_l5"){?>			
					<div class="em40_row">
						<!-- TOP LEFT -->
						<div class="col-xs-12 col-md-8 col-sm-8">
							<div class="top-address">
								<p>							
									<?php if (!empty($common_opt['common_header_top_road'])): ?>
										<span><i class="fa fa-home"></i><?php echo esc_html($common_opt['common_header_top_road']); ?></span>
									<?php endif; ?>	
									<?php if (!empty($common_opt['common_header_top_mobile'])): ?>
										<a href="<?php esc_attr_e('tel:','common')?><?php echo esc_html($common_opt['common_header_top_mobile']); ?>"><i class="fa fa-phone"></i><?php echo esc_html($common_opt['common_header_top_mobile']); ?></a>
									<?php endif; ?>	
									<?php if (!empty($common_opt['common_header_top_email'])): ?>
										<a href="<?php esc_attr_e('mailto:','common')?><?php echo esc_html($common_opt['common_header_top_email']); ?>"><i class="fa fa-envelope-o"></i><?php echo esc_html($common_opt['common_header_top_email']); ?></a>
									<?php endif; ?>	
								</p>
							</div>
						</div>
						<!-- TOP RIGHT -->
						<div class="col-xs-12 col-md-4 col-sm-4">
							<div class="top-right-menu">							 									 								 
								<?php 
								 if ( has_nav_menu( 'layers-secondary-left' ) ) {
									wp_nav_menu( array(
									'theme_location' => 'layers-secondary-left',
									'menu_class' => 'social-icons text-right',
									'fallback_cb' => false,
									'em40_container' => '',
									) );
								}
								?>
							</div>
						</div>	
					</div>									
				 <?php }elseif(!empty($common_opt['common_top_right_layout']) && $common_opt['common_top_right_layout']=="h_top_l2"){?>			
					<div class="em40_row">
						<!-- TOP LEFT -->
						<div class="col-xs-12 col-md-5 ">
							<div class="top-address">
								<p>							
									<?php if (!empty($common_opt['common_header_top_road'])): ?>
										<span><i class="fa fa-home"></i><?php echo esc_html($common_opt['common_header_top_road']); ?></span>
									<?php endif; ?>	
									<?php if (!empty($common_opt['common_header_top_mobile'])): ?>
										<a href="<?php esc_attr_e('tel:','common')?><?php echo esc_html($common_opt['common_header_top_mobile']); ?>"><i class="fa fa-phone"></i><?php echo esc_html($common_opt['common_header_top_mobile']); ?></a>
									<?php endif; ?>	
									<?php if (!empty($common_opt['common_header_top_email'])): ?>
										<a href="<?php esc_attr_e('mailto:','common')?><?php echo esc_html($common_opt['common_header_top_email']); ?>"><i class="fa fa-envelope-o"></i><?php echo esc_html($common_opt['common_header_top_email']); ?></a>
									<?php endif; ?>	
								</p>
							</div>
						</div>
						
						<!-- TOP MIDDLE -->
						<div class="col-xs-12 col-md-2">
							<div class="top-welcome">
								<?php if (!empty($common_opt['common_header_top_wellcome'])): ?>	
									<p class="text-center">							
									<?php 
										echo wp_kses($common_opt['common_header_top_wellcome'], array(
											'span' => array(),
										));
									?>	
									</p>
								<?php endif; ?>
							</div>
						</div>					
						
						<!-- TOP RIGHT -->
						<div class="col-xs-12 col-md-5">
							<div class="top-right-menu">
									<ul class="social-icons text-right">
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
					</div>
				<!-- STYLE 1 LEFT ICON  -->			
				 <?php }elseif(!empty($common_opt['common_top_right_layout']) && $common_opt['common_top_right_layout']=="h_top_l3"){?>					
					<div class="em40_row top-both-p0">
						<!-- TOP RIGHT -->
						<div class="col-xs-12 col-sm-3 col-md-3">
							<div class="top-right-menu">
									<ul class="social-icons text-left">
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
						<!-- TOP LEFT -->
						<div class="col-xs-12 col-md-9 col-sm-9">
							<div class="top-address text-right">
								<p>							
									<?php if (!empty($common_opt['common_header_top_road'])): ?>
										<span><i class="fa fa-home"></i><?php echo esc_html($common_opt['common_header_top_road']); ?></span>
									<?php endif; ?>	
									<?php if (!empty($common_opt['common_header_top_mobile'])): ?>
										<a href="<?php esc_attr_e('tel:','common')?><?php echo esc_html($common_opt['common_header_top_mobile']); ?>"><i class="fa fa-phone"></i><?php echo esc_html($common_opt['common_header_top_mobile']); ?></a>
									<?php endif; ?>	
									<?php if (!empty($common_opt['common_header_top_email'])): ?>
										<a href="<?php esc_attr_e('mailto:','common')?><?php echo esc_html($common_opt['common_header_top_email']); ?>"><i class="fa fa-envelope-o"></i><?php echo esc_html($common_opt['common_header_top_email']); ?></a>
									<?php endif; ?>	
								</p>
							</div>
						</div>
					</div>	
				<!-- STYLE 1 LEFT MENU  -->			
				 <?php }elseif(!empty($common_opt['common_top_right_layout']) && $common_opt['common_top_right_layout']=="h_top_l6"){?>					
					<div class="em40_row top-both-p0">
						<!-- TOP RIGHT -->
						<div class="col-xs-12 col-sm-4 col-md-4">
							<div class="top-right-menu">									 									 								 
									<?php 
									 if ( has_nav_menu( 'layers-secondary-left' ) ) {
										wp_nav_menu( array(
										'theme_location' => 'layers-secondary-left',
										'menu_class' => 'social-icons text-left',
										'fallback_cb' => false,
										'em40_container' => '',
										) );
									}
									?>
							</div>
						</div>					
						<!-- TOP LEFT -->
						<div class="col-xs-12 col-md-8 col-sm-8">
							<div class="top-address text-right">
								<p>							
									<?php if (!empty($common_opt['common_header_top_road'])): ?>
										<span><i class="fa fa-home"></i><?php echo esc_html($common_opt['common_header_top_road']); ?></span>
									<?php endif; ?>	
									<?php if (!empty($common_opt['common_header_top_mobile'])): ?>
										<a href="<?php esc_attr_e('tel:','common')?><?php echo esc_html($common_opt['common_header_top_mobile']); ?>"><i class="fa fa-phone"></i><?php echo esc_html($common_opt['common_header_top_mobile']); ?></a>
									<?php endif; ?>	
									<?php if (!empty($common_opt['common_header_top_email'])): ?>
										<a href="<?php esc_attr_e('mailto:','common')?><?php echo esc_html($common_opt['common_header_top_email']); ?>"><i class="fa fa-envelope-o"></i><?php echo esc_html($common_opt['common_header_top_email']); ?></a>
									<?php endif; ?>	
								</p>
							</div>
						</div>
					</div>			
				 <?php }elseif(!empty($common_opt['common_top_right_layout']) && $common_opt['common_top_right_layout']=="h_top_l4"){?>								
					<div class="em40_row top-both-p0">
						<!-- TOP RIGHT -->
						<div class="col-xs-12 col-md-3">
							<div class="top-right-menu">
									<ul class="social-icons text-left">
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
						<!-- TOP MIDDLE -->
						<div class="col-xs-12 col-md-2">
							<div class="top-welcome">
								<?php if (!empty($common_opt['common_header_top_wellcome'])): ?>	
									<p class="text-center">							
									<?php 
										echo wp_kses($common_opt['common_header_top_wellcome'], array(
											'span' => array(),
										));
									?>	
									</p>
								<?php endif; ?>
							</div>
						</div>						
						<!-- TOP LEFT -->
						<div class="col-xs-12 col-md-7">
							<div class="top-address text-right">
								<p>							
									<?php if (!empty($common_opt['common_header_top_road'])): ?>
										<span><i class="fa fa-home"></i><?php echo esc_html($common_opt['common_header_top_road']); ?></span>
									<?php endif; ?>	
									<?php if (!empty($common_opt['common_header_top_mobile'])): ?>
										<a href="<?php esc_attr_e('tel:','common')?><?php echo esc_html($common_opt['common_header_top_mobile']); ?>"><i class="fa fa-phone"></i><?php echo esc_html($common_opt['common_header_top_mobile']); ?></a>
									<?php endif; ?>	
									<?php if (!empty($common_opt['common_header_top_email'])): ?>
										<a href="<?php esc_attr_e('mailto:','common')?><?php echo esc_html($common_opt['common_header_top_email']); ?>"><i class="fa fa-envelope-o"></i><?php echo esc_html($common_opt['common_header_top_email']); ?></a>
									<?php endif; ?>	
								</p>
							</div>
						</div>
					</div>

				 <?php }elseif(!empty($common_opt['common_top_right_layout']) && $common_opt['common_top_right_layout']=="h_top_l7"){?>			
					<div class="em40_row">
						<!-- TOP LEFT -->
						<div class="col-xs-12 col-md-5 col-sm-8">
							<div class="top-address menu_17">
								<p>							
									<?php if (!empty($common_opt['common_header_top_road'])): ?>
										<span><i class="fa fa-home"></i><?php echo esc_html($common_opt['common_header_top_road']); ?></span>
									<?php endif; ?>	
									<?php if (!empty($common_opt['common_header_top_mobile'])): ?>
										<a href="<?php esc_attr_e('tel:','common')?><?php echo esc_html($common_opt['common_header_top_mobile']); ?>"><i class="fa fa-phone"></i><?php echo esc_html($common_opt['common_header_top_mobile']); ?></a>
									<?php endif; ?>	
									<?php if (!empty($common_opt['common_header_top_email'])): ?>
										<a href="<?php esc_attr_e('mailto:','common')?><?php echo esc_html($common_opt['common_header_top_email']); ?>"><i class="fa fa-envelope-o"></i><?php echo esc_html($common_opt['common_header_top_email']); ?></a>
									<?php endif; ?>	
								</p>
							</div>
						</div>
						
						<!-- TOP MIDDLE -->
						<div class="col-xs-12 col-md-3 col-sm-4">
							<div class="top-right-menu ">
									<ul class="social-icons text-left menu_17">
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
						
						<!-- TOP RIGHT -->
						<div class="col-xs-12 col-md-4 col-sm-12">
							<div class="top-address em-login text-right">
								<p>							
									<?php common_login();?>
									
								</p>
							</div>
						</div>	
					</div>

					
				<?php } ?>				
			</div>
		</div>
    <!-- END HEADER TOP AREA -->
<?php endif; ?>





 <!-- ONE PAGE OR MANU CONDITION  -->
  <?php if ($common_opt['common_header_onepage_menu_hide']==true): ?>
   <!-- HEADER MANU AREA -->
 	<div class="common-main-menu one_page hidden-xs hidden-sm">
		<div class="common_nav_area scroll_fixed">
			<div class="<?php if(!empty($common_opt['common_main_box_layout']) && $common_opt['common_main_box_layout']=="hmenu_full"){echo esc_attr('em40_container-fluid');}else{ echo esc_attr('em40_container'); }?>">
			
			
				 <?php if(!empty($common_opt['common_main_menu_layout']) && $common_opt['common_main_menu_layout']=="m_menu_1"){?>		
				<div class="em40_row logo-left">				
					<!-- LOGO -->
					<div class="col-md-3 col-sm-3 col-xs-4">
						<?php common_onepage_logo(); ?>
					</div>
					<!-- END LOGO -->
					
					<!-- MAIN MENU -->
					<div class="col-md-9 col-sm-9 col-xs-8">
						<nav class="common_menu">						
							<?php common_one_page_menu(); ?>
						</nav>				
					</div>
					<!-- END MAIN MENU -->
				</div> <!-- END ROW -->	
				 <?php }elseif(!empty($common_opt['common_main_menu_layout']) && $common_opt['common_main_menu_layout']=="m_menu_2"){?>		
				
				<div class="em40_row logo-right">				
					
					<!-- MAIN MENU -->
					<div class="col-md-9 col-sm-9 col-xs-8">
						<nav class="common_menu">
							<?php common_one_page_menu(); ?>
						</nav>				
					</div>
					<!-- END MAIN MENU -->
					<!-- LOGO -->
					<div class="col-md-3 col-sm-3 col-xs-4">
						<?php common_onepage_logo(); ?>
					</div>
				</div><!-- END ROW -->		
				<?php }elseif(!empty($common_opt['common_main_menu_layout']) && $common_opt['common_main_menu_layout']=="m_menu_3"){?>		
				<div class="em40_row logo-top">					
					<!-- LOGO -->
					<div class="col-md-12 col-sm-12 col-xs-12">
						<?php common_onepage_logo(); ?>
					</div>
					<!-- END LOGO -->						
					<!-- MAIN MENU -->
					<div class="col-md-12 col-sm-12 col-xs-12">
						<nav class="common_menu">
							<?php common_one_page_menu(); ?>
						</nav>				
					</div>
					<!-- END MAIN MENU -->
				</div> <!-- END ROW -->							
				<?php } ?>
				

			</div> <!-- END CONTAINER -->	
		</div>  <!-- END AREA -->				
	</div>	
	<!-- END HEADER MENU AREA -->
	<!-- transprent with one page MANU CONDITION  -->
<?php elseif ($common_opt['common_header_trs_onep_menu_hide']==true): ?>
 
    <!-- HEADER MANU AREA -->
 	<div class="common-main-menu one_page menu4 hidden-xs hidden-sm transprent-menu">
		<div class="common_nav_area scroll_fixed bdbar">
			<div class="<?php if(!empty($common_opt['common_main_box_layout']) && $common_opt['common_main_box_layout']=="hmenu_full"){echo esc_attr('em40_container-fluid');}else{ echo esc_attr('em40_container'); }?>">
			
			
				 <?php if(!empty($common_opt['common_main_menu_layout']) && $common_opt['common_main_menu_layout']=="m_menu_1"){?>		
				<div class="em40_row logo-left">				
					<!-- LOGO -->
					<div class="col-md-3 col-sm-3 col-xs-4">
						<?php common_ts_logo(); ?>
					</div>
					<!-- END LOGO -->
					
					<!-- MAIN MENU -->
					<div class="col-md-9 col-sm-9 col-xs-8">
						<nav class="common_menu">						
							<?php common_one_page_menu(); ?>
						</nav>				
					</div>
					<!-- END MAIN MENU -->
				</div> <!-- END ROW -->	
				 <?php }elseif(!empty($common_opt['common_main_menu_layout']) && $common_opt['common_main_menu_layout']=="m_menu_2"){?>		
				
				<div class="em40_row logo-right">				
					
					<!-- MAIN MENU -->
					<div class="col-md-9 col-sm-9 col-xs-8">
						<nav class="common_menu">
							<?php common_one_page_menu(); ?>
						</nav>				
					</div>
					<!-- END MAIN MENU -->
					<!-- LOGO -->
					<div class="col-md-3 col-sm-3 col-xs-4">
						<?php common_ts_logo(); ?>
					</div>
				</div><!-- END ROW -->		
				<?php }elseif(!empty($common_opt['common_main_menu_layout']) && $common_opt['common_main_menu_layout']=="m_menu_3"){?>		
				<div class="em40_row logo-top">					
					<!-- LOGO -->
					<div class="col-md-12 col-sm-12 col-xs-12">
						<?php common_ts_logo(); ?>
					</div>
					<!-- END LOGO -->						
					<!-- MAIN MENU -->
					<div class="col-md-12 col-sm-12 col-xs-12">
						<nav class="common_menu">
							<?php common_one_page_menu(); ?>
						</nav>				
					</div>
					<!-- END MAIN MENU -->
				</div> <!-- END ROW -->							
				<?php } ?>
				

			</div> <!-- END CONTAINER -->	
		</div>  <!-- END AREA -->				
	</div>	
	<!-- END HEADER MENU AREA -->
				

	 <!-- transprent MANU CONDITION  -->
<?php elseif ($common_opt['common_header_menu_hide']==true): ?>
 
   <!-- HEADER MANU AREA -->
 	<div class="common-main-menu hidden-xs hidden-sm transprent-menu">
		<div class="trp_nav_area">
			<div class="<?php if(!empty($common_opt['common_main_box_layout']) && $common_opt['common_main_box_layout']=="hmenu_full"){echo esc_attr('em40_container-fluid');}else{ echo esc_attr('em40_container'); }?>">
			
			
				 <?php if(!empty($common_opt['common_main_menu_layout']) && $common_opt['common_main_menu_layout']=="m_menu_1"){?>		
				<div class="em40_row logo-left">				
					<!-- LOGO -->
					<div class="col-md-3 col-sm-3 col-xs-4">
						<?php common_ts_logo(); ?>
					</div>
					<!-- END LOGO -->
					
					<!-- MAIN MENU -->
					<div class="col-md-9 col-sm-9 col-xs-8">
						<nav class="common_menu">						
							<?php common_main_menu(); ?>
						</nav>				
					</div>
					<!-- END MAIN MENU -->
				</div> <!-- END ROW -->	
				 <?php }elseif(!empty($common_opt['common_main_menu_layout']) && $common_opt['common_main_menu_layout']=="m_menu_2"){?>		
				
				<div class="em40_row logo-right">				
					
					<!-- MAIN MENU -->
					<div class="col-md-9 col-sm-9 col-xs-8">
						<nav class="common_menu">
							<?php common_main_menu(); ?>
						</nav>				
					</div>
					<!-- END MAIN MENU -->
					<!-- LOGO -->
					<div class="col-md-3 col-sm-3 col-xs-4">
						<?php common_ts_logo(); ?>
					</div>
				</div><!-- END ROW -->		
				<?php }elseif(!empty($common_opt['common_main_menu_layout']) && $common_opt['common_main_menu_layout']=="m_menu_3"){?>		
				<div class="em40_row logo-top">					
					<!-- LOGO -->
					<div class="col-md-12 col-sm-12 col-xs-12">
						<?php common_ts_logo(); ?>
					</div>
					<!-- END LOGO -->						
					<!-- MAIN MENU -->
					<div class="col-md-12 col-sm-12 col-xs-12">
						<nav class="common_menu">
							<?php common_main_menu(); ?>
						</nav>				
					</div>
					<!-- END MAIN MENU -->
				</div> <!-- END ROW -->							
				<?php } ?>
				

			</div> <!-- END CONTAINER -->	
		</div>  <!-- END AREA -->				
	</div>	
	<!-- END HEADER MENU AREA -->
	
	<!-- transprent with sticky MANU CONDITION  -->
<?php elseif ($common_opt['common_header_ts_menu_hide']==true): ?>
 
    <!-- HEADER MANU AREA -->
 	<div class="common-main-menu one_page menu4 hidden-xs hidden-sm transprent-menu">
		<div class="common_nav_area scroll_fixed bdbar">
			<div class="<?php if(!empty($common_opt['common_main_box_layout']) && $common_opt['common_main_box_layout']=="hmenu_full"){echo esc_attr('em40_container-fluid');}else{ echo esc_attr('em40_container'); }?>">
			
			
				 <?php if(!empty($common_opt['common_main_menu_layout']) && $common_opt['common_main_menu_layout']=="m_menu_1"){?>		
				<div class="em40_row logo-left">				
					<!-- LOGO -->
					<div class="col-md-3 col-sm-3 col-xs-4">
						<?php common_ts_logo(); ?>
					</div>
					<!-- END LOGO -->
					
					<!-- MAIN MENU -->
					<div class="col-md-9 col-sm-9 col-xs-8">
						<nav class="common_menu">						
							<?php common_main_menu(); ?>
						</nav>				
					</div>
					<!-- END MAIN MENU -->
				</div> <!-- END ROW -->	
				 <?php }elseif(!empty($common_opt['common_main_menu_layout']) && $common_opt['common_main_menu_layout']=="m_menu_2"){?>		
				
				<div class="em40_row logo-right">				
					
					<!-- MAIN MENU -->
					<div class="col-md-9 col-sm-9 col-xs-8">
						<nav class="common_menu">
							<?php common_main_menu(); ?>
						</nav>				
					</div>
					<!-- END MAIN MENU -->
					<!-- LOGO -->
					<div class="col-md-3 col-sm-3 col-xs-4">
						<?php common_ts_logo(); ?>
					</div>
				</div><!-- END ROW -->		
				<?php }elseif(!empty($common_opt['common_main_menu_layout']) && $common_opt['common_main_menu_layout']=="m_menu_3"){?>		
				<div class="em40_row logo-top">					
					<!-- LOGO -->
					<div class="col-md-12 col-sm-12 col-xs-12">
						<?php common_ts_logo(); ?>
					</div>
					<!-- END LOGO -->						
					<!-- MAIN MENU -->
					<div class="col-md-12 col-sm-12 col-xs-12">
						<nav class="common_menu">
							<?php common_main_menu(); ?>
						</nav>				
					</div>
					<!-- END MAIN MENU -->
				</div> <!-- END ROW -->							
				<?php } ?>
				

			</div> <!-- END CONTAINER -->	
		</div>  <!-- END AREA -->				
	</div>	
	<!-- END HEADER MENU AREA -->
		
	<!-- DEFAULT MANU CONDITION  -->
<?php else: ?>
   <!-- HEADER MANU AREA -->
 	<div class="common-main-menu hidden-xs hidden-sm">
		<div class="common_nav_area">
			<div class="<?php if(!empty($common_opt['common_main_box_layout']) && $common_opt['common_main_box_layout']=="hmenu_full"){echo esc_attr('em40_container-fluid');}else{ echo esc_attr('em40_container'); }?>">
			
			
				 <?php if(!empty($common_opt['common_main_menu_layout']) && $common_opt['common_main_menu_layout']=="m_menu_1"){?>		
				<div class="em40_row logo-left">				
					<!-- LOGO -->
					<div class="col-md-3 col-sm-3 col-xs-4">
						<?php common_main_logo(); ?>
					</div>
					<!-- END LOGO -->
					
					<!-- MAIN MENU -->
					<div class="col-md-9 col-sm-9 col-xs-8">
						<nav class="common_menu">						
							<?php common_main_menu(); ?>
						</nav>				
					</div>
					<!-- END MAIN MENU -->
				</div> <!-- END ROW -->	
				 <?php }elseif(!empty($common_opt['common_main_menu_layout']) && $common_opt['common_main_menu_layout']=="m_menu_2"){?>		
				
				<div class="em40_row logo-right">				
					
					<!-- MAIN MENU -->
					<div class="col-md-9 col-sm-9 col-xs-8">
						<nav class="common_menu">
							<?php common_main_menu(); ?>
						</nav>				
					</div>
					<!-- END MAIN MENU -->
					<!-- LOGO -->
					<div class="col-md-3 col-sm-3 col-xs-4">
						<?php common_main_logo(); ?>
					</div>
				</div><!-- END ROW -->		
				<?php }elseif(!empty($common_opt['common_main_menu_layout']) && $common_opt['common_main_menu_layout']=="m_menu_3"){?>		
				<div class="em40_row logo-top">					
					<!-- LOGO -->
					<div class="col-md-12 col-sm-12 col-xs-12">
						<?php common_main_logo(); ?>
					</div>
					<!-- END LOGO -->						
					<!-- MAIN MENU -->
					<div class="col-md-12 col-sm-12 col-xs-12">
						<nav class="common_menu">
							<?php common_main_menu(); ?>
						</nav>				
					</div>
					<!-- END MAIN MENU -->
				</div> <!-- END ROW -->							
				<?php }else{?>
					
				<div class="em40_row logo-left">				
					<!-- LOGO -->
					<div class="col-md-3 col-sm-3 col-xs-4">
						<?php common_main_logo(); ?>
					</div>
					<!-- END LOGO -->
					
					<!-- MAIN MENU -->
					<div class="col-md-9 col-sm-9 col-xs-8">
						<nav class="common_menu">						
							<?php common_main_menu(); ?>
						</nav>				
					</div>
					<!-- END MAIN MENU -->
				</div> <!-- END ROW -->						
					
				<?php } ?>
				

			</div> <!-- END CONTAINER -->	
		</div>  <!-- END AREA -->				
	</div>	
	<!-- END HEADER MENU AREA -->
			
<?php endif; ?>	
 
 
 
 
 
 
             
	<!-- MOBILE MENU AREA -->
	<div class="home-2 mbm hidden-md hidden-lg header_area main-menu-area sticker">
		<div class="menu_area mobile-menu">
			<nav>
				<?php common_mobile_menu(); ?>
			</nav>
		</div>					
	</div>			
	<!-- END MOBILE MENU AREA  -->
	
</div>	


<section id="wrapper-content" <?php layers_wrapper_class( 'wrapper_content', 'wrapper-content' ); ?>>