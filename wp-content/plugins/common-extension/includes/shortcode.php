<?php

// ========== Team Area
if(!function_exists('common_team_area')){
	function common_team_area( $atts , $content = null ){

	 // Attributes
		extract( shortcode_atts(
			array( 
				'columns' => '3',
				'category' => '',
				'number' => '-1',			
				'bgcolor' => '',			
				'tcolor' => '',			
				'ecolor' => '',			
				'digi_color' => '',			
				'sec_layout' => '0',  							
		), $atts )
		);
	ob_start();
	?>	
	<div class="row">	
						<?php 																		
							if ( !empty($category) ) {
								$args = array(
									'post_type' => 'em_team',
									'orderby' => 'menu_order',
									'order' => 'ASC',
									'posts_per_page' => intval( $number ),
									'tax_query' => array(
										array(
											'taxonomy' => 'em_team_cat',
											'field' => 'term_id',
											'terms' => intval( $category )
										)
									)
								);
								$loop = new WP_Query($args);
							}
							else {
								$loop = new WP_Query('post_type=em_team&orderby=menu_order&order=ASC&posts_per_page='.intval( $number ));
							}						
																		
									// The Loop
									if ( $loop->have_posts() ) {
										while ( $loop->have_posts() ) {
											$loop->the_post();
											?>						
									
										<?php  $team_desig  = get_post_meta( get_the_ID(),'_common_team_desig', true );?>
										<?php  $social  = get_post_meta( get_the_ID(),'_common_teamid', true );?>						
										<?php  $time_delay  = get_post_meta( get_the_ID(),'_common_time_delay', true );?>						
										<?php  $team_social_show  = get_post_meta( get_the_ID(),'_common_team_social_show', true );?>						
									<!-- SINGLE TEAM -->
									<div class="col-md-<?php if ( !empty($columns) ){echo esc_attr($columns);} ?>  col-sm-6 col-xs-12">
										<?php if($sec_layout=='0'){?>
										<div class="single_team" style="background-color:<?php echo esc_attr($bgcolor);?>">
											<div class="team_thumb">
												<?php the_post_thumbnail('common-team');?>
												<div class="team_social_icon">
												
													<?php if($team_social_show==1){?> 
														<div class="team_social">										
															<?php 															
																foreach( (array) $social as $ticonskey => $ticons ){
																$ticons1 = $ticons2 ='';
																if ( isset( $ticons['_common_turl'] ) ) {
																	$ticons1 =  $ticons['_common_turl'];	
																}
																if ( isset( $ticons['_common_ticon'] ) ) {
																	$ticons2 =  $ticons['_common_ticon'];	
																}?>	
																<?php if ($ticons1) {?>
																	<a href="<?php echo esc_url( $ticons1 ); ?>"><i class="fa fa-<?php echo esc_html( $ticons2 ); ?>"></i></a>
																<?php } ?>
															
															<?php } ?>
														</div>													
													<?php }?>
													
													
												</div>
											</div>
											<div class="team_info">
												<span class="member-name" style="color:<?php echo esc_attr($tcolor);?>"><?php the_title();?></span>
												<?php if($team_desig){?> 												
													<span class="member-role" style="color:<?php echo esc_attr($digi_color);?>"><?php echo $team_desig; ?></span>											
												<?php }?>												
												<p style="color:<?php echo esc_attr($ecolor);?>"><?php echo get_the_content();?></p>
											</div>
										</div>
										<?php } elseif($sec_layout=='1'){?>	
											<div class="home-2">
												<div class="single_team" style="background-color:<?php echo esc_attr($bgcolor);?>">
													<div class="team_thumb">
														<?php the_post_thumbnail('common-team');?>
													</div>
													<div class="team_info">
														<span class="member-name" style="color:<?php echo esc_attr($tcolor);?>"><?php the_title();?></span>
														<?php if($team_desig){?> 												
															<span class="member-role" style="color:<?php echo esc_attr($digi_color);?>"><?php echo $team_desig; ?></span>
														<?php }?>
														<p style="color:<?php echo esc_attr($ecolor);?>"><?php echo get_the_content();?></p>
													</div>													
													<?php if($team_social_show==1){?> 
														<div class="team_social">										
															<?php 															
																foreach( (array) $social as $ticonskey => $ticons ){
																$ticons1 = $ticons2 ='';
																if ( isset( $ticons['_common_turl'] ) ) {
																	$ticons1 =  $ticons['_common_turl'];	
																}
																if ( isset( $ticons['_common_ticon'] ) ) {
																	$ticons2 =  $ticons['_common_ticon'];	
																}?>	
																<?php if ($ticons1) {?>
																	<a href="<?php echo esc_url( $ticons1 ); ?>"><i class="fa fa-<?php echo esc_html( $ticons2 ); ?>"></i></a>
																<?php } ?>
															
															<?php } ?>
														</div>													
													<?php }?>
												</div>									
											</div>									
										<?php } elseif($sec_layout=='2'){?>														
											<div class="home-3">
												<div class="single_team" style="background-color:<?php echo esc_attr($bgcolor);?>">
													<div class="team_thumb">
														<?php the_post_thumbnail('common-team');?>
													</div>
													<div class="team_info">
														<span class="member-name" style="color:<?php echo esc_attr($tcolor);?>"><?php the_title();?></span>
														<?php if($team_desig){?> 												
															<span class="member-role" style="color:<?php echo esc_attr($digi_color);?>"><?php echo $team_desig; ?></span>
														<?php }?>
														<p style="color:<?php echo esc_attr($ecolor);?>"><?php echo get_the_content();?></p>
													</div>
													<?php if($team_social_show==1){?> 
														<div class="team_social">										
															<?php 															
																foreach( (array) $social as $ticonskey => $ticons ){
																$ticons1 = $ticons2 ='';
																if ( isset( $ticons['_common_turl'] ) ) {
																	$ticons1 =  $ticons['_common_turl'];	
																}
																if ( isset( $ticons['_common_ticon'] ) ) {
																	$ticons2 =  $ticons['_common_ticon'];	
																}?>	
																<?php if ($ticons1) {?>
																	<a href="<?php echo esc_url( $ticons1 ); ?>"><i class="fa fa-<?php echo esc_html( $ticons2 ); ?>"></i></a>
																<?php } ?>
															
															<?php } ?>
														</div>													
													<?php }?>
												</div>											
											</div>											
										<?php } ?>			

									</div>								
							<?php  } //END WHILE ?>
						<?php  } //END IF ?>
											
</div>	

	<?php 
	  return ob_get_clean();
	}
}
add_shortcode ('common_team', 'common_team_area' );

// ========== Testimonial Area
if(!function_exists('common_testimonial_area')){
	function common_testimonial_area( $atts , $content = null ){

	 // Attributes
		extract( shortcode_atts(
			array( 
				'columns' => '4',
				'category' => '',
				'number' => '-1',					
				'tcolor' => '',			
				'ecolor' => '',			
				'digi_color' => '',			
				'sec_layout' => '0',  							
		), $atts )
		);
	ob_start();
	?>	
	<div class="row">	
						<?php 																		
							if ( !empty($category) ) {
								$args = array(
									'post_type' => 'em_testimonial',
									'orderby' => 'menu_order',
									'order' => 'ASC',
									'posts_per_page' => intval( $number ),
									'tax_query' => array(
										array(
											'taxonomy' => 'em_testimonial_cat',
											'field' => 'term_id',
											'terms' => intval( $category )
										)
									)
								);
								$loop = new WP_Query($args);
							}
							else {
								$loop = new WP_Query('post_type=em_testimonial&orderby=menu_order&order=ASC&posts_per_page='.intval( $number ));
							}						
																		
									// The Loop
									if ( $loop->have_posts() ) {?>
									
									
										<?php if($sec_layout=='0'){?>
										<div class="testimonial_list owl-carousel curosel-style">	
											<?php while ( $loop->have_posts() ) {
													$loop->the_post();
													?>						
											
												<?php  $common_rating  = get_post_meta( get_the_ID(),'_common_em_rating', true );?>					
												<?php  $testi_deg  = get_post_meta( get_the_ID(),'_common_testi_deg', true );?>						
											<!-- SINGLE TEAM -->
											<div class="col-md-12  col-sm-6 col-xs-12">
																																				
												
												<!-- Start Single Testimonial -->
												<div class="single_testimonial">
												
													<?php if(has_post_thumbnail()){?> 
												
														<div class="test_thumb">
															<?php the_post_thumbnail('common-testimonial');?>
														</div>
												
													<?php } ?>
												
													<div class="test_name">
														<h4 style="color:<?php echo esc_attr($tcolor);?>"><?php the_title(); ?><sup style="color:<?php echo esc_attr($digi_color);?>"><?php if( $testi_deg){echo esc_html( $testi_deg );}?></sup></h4>
														<p style="color:<?php echo esc_attr($ecolor);?>"><?php echo get_the_content();?></p>
													</div>
												</div>										

											</div>								
										<?php  } //END WHILE ?>
										</div>	
										<?php } elseif($sec_layout=='1'){?>
											<?php while ( $loop->have_posts() ) {
													$loop->the_post();
													?>						
											
												<?php  $common_rating  = get_post_meta( get_the_ID(),'_common_em_rating', true );?>					
												<?php  $testi_deg  = get_post_meta( get_the_ID(),'_common_testi_deg', true );?>						
											<!-- SINGLE TEAM -->
											<div class="tspd col-md-<?php if ( !empty($columns) ){echo esc_attr($columns);} ?>  col-sm-6 col-xs-12">
												<!-- Start Single Testimonial -->
												<div class="single_testimonial">
												
													<?php if(has_post_thumbnail()){?> 
												
														<div class="test_thumb">
															<?php the_post_thumbnail('common-testimonial');?>
														</div>
												
													<?php } ?>
												
													<div class="test_name">
														<h4 style="color:<?php echo esc_attr($tcolor);?>"><?php the_title(); ?><sup style="color:<?php echo esc_attr($digi_color);?>"><?php if( $testi_deg){echo esc_html( $testi_deg );}?></sup></h4>
														<p style="color:<?php echo esc_attr($ecolor);?>"><?php echo get_the_content();?></p>
													</div>
												</div>										

											</div>								
										<?php  } //END WHILE ?>
								<?php  } //set IF ?>
							<?php  } //END IF ?>
											
		</div>	

		<?php 
		  return ob_get_clean();
	}
}
add_shortcode ('common_testimonial', 'common_testimonial_area' );

// ========== Blog Area
if(!function_exists('common_blog_area')){
	function common_blog_area( $atts , $content = null ){

	 // Attributes
		extract( shortcode_atts(
			array( 
				'columns' => '4',
				'category' => '',
				'number' => '3',							
				'sec_layout' => '0',  							
		), $atts )
		);
	ob_start();
	?>	
	<div class="row">	
						<?php 																		
							if ( !empty($category) ) {
								$args = array(
									'post_type' => 'post',
									'orderby' => 'menu_order',
									'order' => 'ASC',
									'posts_per_page' => intval( $number ),
									'tax_query' => array(
										array(
											'taxonomy' => 'category',
											'field' => 'term_id',
											'terms' => intval( $category )
										)
									)
								);
								$loop = new WP_Query($args);
							}
							else {
								$loop = new WP_Query('post_type=post&orderby=menu_order&order=ASC&posts_per_page='.intval( $number ));
							}						
																		
									// The Loop
									if ( $loop->have_posts() ) {?>
									
									
										<?php if($sec_layout=='0'){?>
										<div class="blog_carousel owl-carousel curosel-style">	
											<?php while ( $loop->have_posts() ) {
													$loop->the_post();
													?>											
											<!-- SINGLE TEAM -->
											<div class="col-md-12  col-sm-6 col-xs-12">

												<div class="cbpd  common-single-blog">
												
													<!-- BLOG THUMB -->
													<?php if(has_post_thumbnail()){?>
														<div class="common-blog-thumb">
															<a href="<?php the_permalink(); ?>"> <?php the_post_thumbnail('common-blog-default'); ?> </a>
														</div>									
													<?php } ?>
													
													
													<!-- BLOG TITLE AND CONTENT -->
													<div class="blog-inner">
														<div class="blog-content">
															<h2><a href="<?php the_permalink(); ?>"><?php common_title(5); ?></a></h2>
															<p><?php common_read_more(18); ?></p>
														</div>
													</div>	
													
													<!-- BLOG POST META  -->
													<div class="common-blog-meta">
													
														<div class="common-blog-meta-left">
															<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><i class="fa fa-user"></i> <?php the_author(); ?></a>			
															<span><i class="fa fa-clock-o"></i><?php echo get_the_time('d'); ?> <?php echo get_the_time('M'); ?></span>
														</div>
														
														
														<div class="common-blog-meta-right">					
															
															<a href="<?php comments_link(); ?>"><i class="fa fa-comment"></i>
																<?php comments_number( '0', '1', '%' ); ?>.
															</a>
														</div>
													</div>				
												</div>											

											</div>								
										<?php  } //END WHILE ?>
										</div>	
										<?php } elseif($sec_layout=='1'){?>
										<div class="bgimgload blog-messonary">
											<?php while ( $loop->have_posts() ) {
													$loop->the_post();
													?>						
				
											<!-- SINGLE TEAM -->
											
												<div class="tbpd grid-item  col-md-<?php if ( !empty($columns) ){echo esc_attr($columns);} ?>  col-sm-6 col-xs-12">
												
													<div class="common-single-blog">
													
														<!-- BLOG THUMB -->
														<?php if(has_post_thumbnail()){?>
															<div class="common-blog-thumb">
																<a href="<?php the_permalink(); ?>"> <?php the_post_thumbnail('common-blog-default'); ?> </a>
															</div>									
														<?php } ?>
														
														
														<!-- BLOG TITLE AND CONTENT -->
														<div class="blog-inner">
															<div class="blog-content">
																<h2><a href="<?php the_permalink(); ?>"><?php common_title(5); ?></a></h2>
																<p><?php common_read_more(18); ?></p>
															</div>
														</div>	
														
														<!-- BLOG POST META  -->
														<div class="common-blog-meta">
														
															<div class="common-blog-meta-left">
																<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><i class="fa fa-user"></i> <?php the_author(); ?></a>			
																<span><i class="fa fa-clock-o"></i><?php echo get_the_time('d'); ?> <?php echo get_the_time('M'); ?></span>
															</div>
															
															
															<div class="common-blog-meta-right">					
																
																<a href="<?php comments_link(); ?>"><i class="fa fa-comment"></i>
																	<?php comments_number( '0', '1', '%' ); ?>.
																</a>
															</div>
														</div>				
													</div>									

																				
											</div>								
										<?php  } //END WHILE ?>
										</div>
								<?php  } //set IF ?>
							<?php  } //END IF ?>
											
		</div>	

		<?php 
		  return ob_get_clean();
	}
}
add_shortcode ('common_blog', 'common_blog_area' );





// ========== Portfolio Area
if(!function_exists('common_portfolio_area')){
	function common_portfolio_area( $atts , $content = null ){

	 // Attributes
		extract( shortcode_atts(
			array(			
				'style' => '1',
				'columns' => '3',
				'category' => '',
				'number' => '8',
				'nospace'	=> 'no',
				'filter'	=> 'no',
				'load_more'	=> 'no',
				'tcolor' => '',						
				'ecolor' => '',						
				'sec_layout' => '0',  							
		), $atts )
		);
	ob_start();
$no_gutter_class="";	
$no_gutter_class = ( $nospace == 'yes' ) ? ' nospace' : '';
$paged = get_query_var('paged') ? get_query_var('paged') : ( get_query_var('page') ? get_query_var('page') : 1 );
if ( !empty($category) ) {
	$args = array(
		'post_type' => 'em_portfolio',
		'posts_per_page' => intval( $number ),
		'tax_query' => array(
			array(
				'taxonomy' => 'em_portfolio_cat',
				'field' => 'term_id',
				'terms' => intval( $category )
			)
		),
		'paged' => $paged
	);
	$loop = new WP_Query($args);
}
else {
	$args = array(
		'post_type' => 'em_portfolio',
		'posts_per_page' => intval( $number ),
		'paged' => $paged
	);
	$loop = new WP_Query($args);
}	?>
	
<?php if ($loop->have_posts()) : ?>
	

	<?php if ( esc_attr( $filter ) == 'yes' ) {?>

	<div class="row">
		<div class="col-md-12">

			<div class="portfolio_nav">
				<ul id="filter" class="filter_menu">
					<li class="current_menu_item" data-filter="*" ><?php esc_html_e('All Works', 'common');?></li>
				<?php 	
				$categories = get_terms('em_portfolio_cat');
				$get_category= intval( $category );
					foreach ( $categories as $category ) {
						if ( is_array($get_category) ) {?>
							<li   data-filter=".<?php echo esc_attr( $category->slug );?>"><?php echo esc_html( $category->name );?></li>
						<?php }
						else {?>
								<li data-filter=".<?php echo esc_attr( $category->slug ); ?>"><?php echo esc_html( $category->name );?></li>												
						<?php }
					}?>
				</ul>
			</div>

		</div>				
	</div>
			
	<?php } ?>	
			

			<div class="row em_load">
		
				<div class="prot_wrap  <?php echo esc_attr($no_gutter_class); ?>">
				
					<?php while ($loop->have_posts()) : $loop->the_post(); 
						$terms = get_the_terms(get_the_ID(), 'em_portfolio_cat');
						
						$saloption  = get_post_meta( get_the_ID(),'_common_saloption', true ); 
						$siimagepop  = get_post_meta( get_the_ID(),'_common_siimagepop', true ); 
						$sllink  = get_post_meta( get_the_ID(),'_common_sllink', true ); 
						$shyoutub  = get_post_meta( get_the_ID(),'_common_shyoutub', true ); 
						$pyoutube  = get_post_meta( get_the_ID(),'_common_pyoutube', true ); 
						$svvimeo  = get_post_meta( get_the_ID(),'_common_svvimeo', true ); 
						$pvimeo  = get_post_meta( get_the_ID(),'_common_pvimeo', true ); 

												
						
						
					?>
						<!-- single portfolio -->
						<div class="col-md-<?php echo esc_attr($columns);?> grid-item col-xs-12  <?php foreach( $terms as $single_slug){echo $single_slug->slug. ' ';}	?>">
							<div class="single_protfolio">
							
								
								
						<?php $m_g_image_pop  = get_post_meta( get_the_ID(),'_common_m_g_image_pop', true ); 
						if($m_g_image_pop =="m_gshow"){?>
						<div class="prot_thumb">
							<div class="owl-carousel portfolio_gallery_post  curosel-style">	
								
									<?php
										common_slider_o('_common_pgellaryu',array(570,570));									
									?>									
											
							</div>	


								<div class="prot_content multi_gallery">
								<div class="prot_content_inner">
								<?php if($saloption=='m_alshow'): ?>										
										<div class="picon">								
																								
										<a class="portfolio-icon venobox" data-gall="myGallery" href="<?php echo wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ), 'full' );?>"><i class="fa fa-file-image-o"></i></a>

										<a href="<?php the_permalink(); ?>"><i class="fa fa-link"></i></a>	
																	
										<a class="video-vemo-icon venobox" data-type="youtube" data-autoplay="true" data-gall="myGallery" href="<?php echo esc_url($pyoutube ); ?>">
										<i class="fa fa-youtube-play"></i></a>			
																
										<a class="video-vemo-icon venobox" data-type="vimeo" data-autoplay="true" data-gall="myGallery" href="<?php echo esc_url($pvimeo ); ?>"><i class="fa fa-vimeo"></i>
										</a>									

										</div>

								<?php else: //or ?>

								<div class="picon">
																	
															
									<?php if($siimagepop=='m_ishow'): ?>									
									<a class="portfolio-icon venobox" data-gall="myportfolio" href="<?php echo wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ), 'full' );?>"><i class="fa fa-file-image-o"></i></a>
									<?php endif; ?>

									<?php if($sllink=='m_lshow'): ?>	
									<a href="<?php the_permalink(); ?>"><i class="fa fa-link"></i></a>	
									<?php endif; ?>

									<?php if($shyoutub=='m_yshow'): ?>	

									<?php if($pyoutube): ?>								
									<a class="video-vemo-icon venobox" data-type="youtube" data-autoplay="true" data-gall="myGallery" href="<?php echo esc_url($pyoutube ); ?>">
									<i class="fa fa-youtube-play"></i></a>		
									<?php endif; ?>

									<?php endif; ?>

									<?php if($svvimeo=='m_vshow'): ?>

									<?php if($pvimeo): ?>									
									<a class="video-vemo-icon venobox" data-type="vimeo" data-autoplay="true" data-gall="myGallery" href="<?php echo esc_url($pvimeo ); ?>"><i class="fa fa-vimeo"></i>
									</a>									
									<?php endif; ?>

									<?php endif; ?>

								</div>
																			
								<?php endif; ?>											
																	
									
									<h3><a href="<?php the_permalink(); ?>" style="color:<?php echo esc_attr($tcolor);?>"><?php the_title();?></a></h3>
									<p>
										<?php if( $terms ){
											
										foreach( $terms as $single_slugs ){?>
											<span class="category-text" style="color:<?php echo esc_attr($ecolor);?>">
											   <?php echo $single_slugs->name ;?>
											</span>																			
										<?php }}?>
									</p>									
								</div>
								</div>

						</div>			

						<?php }else{ ?>
							
							<div class="prot_thumb">
								
									<?php the_post_thumbnail('common-gallery-thumb');?>
								
								<div class="prot_content">
								<div class="prot_content_inner">

								<?php if($saloption=='m_alshow'): ?>										
										<div class="picon">								
																								
										<a class="portfolio-icon venobox" data-gall="myGallery" href="<?php echo wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ), 'full' );?>"><i class="fa fa-file-image-o"></i></a>

										<a href="<?php the_permalink(); ?>"><i class="fa fa-link"></i></a>	
																	
										<a class="video-vemo-icon venobox" data-type="youtube" data-autoplay="true" data-gall="myGallery" href="<?php echo esc_url($pyoutube ); ?>">
										<i class="fa fa-youtube-play"></i></a>			
																
										<a class="video-vemo-icon venobox" data-type="vimeo" data-autoplay="true" data-gall="myGallery" href="<?php echo esc_url($pvimeo ); ?>"><i class="fa fa-vimeo"></i>
										</a>									

										</div>

								<?php else: //or ?>

								<div class="picon">
																	
															
									<?php if($siimagepop=='m_ishow'): ?>									
									<a class="portfolio-icon venobox" data-gall="myportfolio" href="<?php echo wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ), 'full' );?>"><i class="fa fa-file-image-o"></i></a>
									<?php endif; ?>

									<?php if($sllink=='m_lshow'): ?>	
									<a href="<?php the_permalink(); ?>"><i class="fa fa-link"></i></a>	
									<?php endif; ?>

									<?php if($shyoutub=='m_yshow'): ?>	

									<?php if($pyoutube): ?>								
									<a class="video-vemo-icon venobox" data-type="youtube" data-autoplay="true" data-gall="myGallery" href="<?php echo esc_url($pyoutube ); ?>">
									<i class="fa fa-youtube-play"></i></a>		
									<?php endif; ?>

									<?php endif; ?>

									<?php if($svvimeo=='m_vshow'): ?>

									<?php if($pvimeo): ?>									
									<a class="video-vemo-icon venobox" data-type="vimeo" data-autoplay="true" data-gall="myGallery" href="<?php echo esc_url($pvimeo ); ?>"><i class="fa fa-vimeo"></i>
									</a>									
									<?php endif; ?>

									<?php endif; ?>

								</div>
																			
								<?php endif; ?>											
																	
									
									<h3><a href="<?php the_permalink(); ?>" style="color:<?php echo esc_attr($tcolor);?>"><?php the_title();?></a></h3>
									<p>
										<?php if( $terms ){
											
										foreach( $terms as $single_slugs ){?>
											<span class="category-text" style="color:<?php echo esc_attr($ecolor);?>">
											   <?php echo $single_slugs->name ;?>
											</span>																			
										<?php }}?>
									</p>									
								</div>
								</div>
										
							</div>				
	
						<?php } ?>					
																	

								
							</div>
						</div>
					<?php endwhile; ?>	
					<?php wp_reset_query(); ?>
				</div>
			</div>

			
<?php endif; ?>	
	
	
		
	
	<?php 
	return ob_get_clean();
	}
}
add_shortcode ('common_portfolio', 'common_portfolio_area' );



// ========== Testimonial Area
if(!function_exists('common_slider_area')){
	function common_slider_area( $atts , $content = null ){

	 // Attributes
		extract( shortcode_atts(
			array( 
				'columns' => '4',
				'category' => '',
				'number' => '-1',											
		), $atts )
		);
	ob_start();
	?>	
	<div class="row">	
						<?php 																		
							if ( !empty($category) ) {
								$args = array(
									'post_type' => 'em_slider',
									'orderby' => 'menu_order',
									'order' => 'ASC',
									'posts_per_page' => intval( $number ),
									'tax_query' => array(
										array(
											'taxonomy' => 'em_slider_cat',
											'field' => 'term_id',
											'terms' => intval( $category )
										)
									)
								);
								$loop = new WP_Query($args);
							}
							else {
								$loop = new WP_Query('post_type=em_slider&orderby=menu_order&order=ASC&posts_per_page='.intval( $number ));
							}						
																		
									// The Loop
									if ( $loop->have_posts() ) {?>
									
										<div class="em-slider-area">
											<div class="em-slider-wrapper owl-carousel curosel-style-slider">
				
												<?php while ( $loop->have_posts() ) {
														$loop->the_post();
														
														
															$em_slide_subtitle  = get_post_meta( get_the_ID(),'_common_em_slide_subtitle', true );
															$em_slide_highlight  = get_post_meta( get_the_ID(),'_common_em_slide_highlight', true );
															$em_slide_btn1  = get_post_meta( get_the_ID(),'_common_em_slide_btn1', true );
															$em_slide_btn1utl  = get_post_meta( get_the_ID(),'_common_em_slide_btn1utl', true );
															$em_slide_btn2  = get_post_meta( get_the_ID(),'_common_em_slide_btn2', true );
															$em_slide_btn2url  = get_post_meta( get_the_ID(),'_common_em_slide_btn2url', true );
															$em_slider_posi  = get_post_meta( get_the_ID(),'_common_em_slider_posi', true );
															$em_slide_bg_color  = get_post_meta( get_the_ID(),'_common_em_slide_bg_color', true );
															$em_bg_image  = get_post_meta( get_the_ID(),'_common_em_bg_image', true );
															$em_slide_title_color  = get_post_meta( get_the_ID(),'_common_em_slide_title_color', true );
															$em_slide_subtitle_color  = get_post_meta( get_the_ID(),'_common_em_slide_subtitle_color', true );
															$em_slide_highlight_color  = get_post_meta( get_the_ID(),'_common_em_slide_highlight_color', true );
															$em_slide_content_color  = get_post_meta( get_the_ID(),'_common_em_slide_content_color', true );
														?>											
															<!-- single item -->
															<div class="col-md-12 em-slider-bg-image" style="background-color:<?php echo esc_url( $em_slide_bg_color );?>;background-image:url(<?php echo esc_url( $em_bg_image );?>)">			
																<div class="em-slider-content <?php echo esc_html( $em_slider_posi );?>">
																	<div class="slider-content-inner">
																		<div class="em-slider-title">
																			<h2 style="color:<?php echo esc_url( $em_slide_title_color );?>"><?php the_title();?></h2>
																		</div>
																		<div class="em-slider-title-lg">
																			<h1 style="color:<?php echo esc_url( $em_slide_subtitle_color );?>"><?php echo esc_html( $em_slide_subtitle );?> <span style="color:<?php echo esc_url( $em_slide_highlight_color );?>"><?php echo esc_html( $em_slide_highlight );?></span></h1>
																		</div>
																		<div class="em-slider-content-text">
																			<p style="color:<?php echo esc_url( $em_slide_content_color );?>"><?php echo get_the_content();?></p>
																		</div>
																		<div class="em-slider-button">
																			<a class="sbtn-left" href="<?php echo esc_url( $em_slide_btn1utl );?>"><?php echo esc_html( $em_slide_btn1 );?></a>
																			<a class="sbtn-right" href="<?php echo esc_url( $em_slide_btn2url );?>"><?php echo esc_html( $em_slide_btn2 );?></a>
																		</div>
																	</div>
																</div>
															</div>
																								
								
												<?php  } //END WHILE ?>
										
											</div>
										</div>
							<?php  } //END IF ?>
											
		</div>	

		<?php 
		  return ob_get_clean();
	}
}
add_shortcode ('common_slider', 'common_slider_area' );





















