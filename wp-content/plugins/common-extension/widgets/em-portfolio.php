<?php  /**
 * Post Widget
 *
 * This file is used to register and display the Layers - Post widget.
 *
 * @package Layers
 * @since Layers 1.0.0
 */
if( class_exists('Layers_Widget') && !class_exists( 'em_portfolio' ) ) {
	class em_portfolio extends Layers_Widget {
	    
		/**
		*  Widget construction
		*/
		function __construct() {

			/**
			* Widget variables
			*
			* @param  	string    		$widget_title    	Widget title
			* @param  	string    		$widget_id    		Widget slug for use as an ID/classname
			* @param  	string    		$post_type    		(optional) Post type for use in widget options
			* @param  	string    		$taxonomy    		(optional) Taxonomy slug for use as an ID/classname
			* @param  	array 			$checkboxes    	(optional) Array of checkbox names to be saved in this widget. Don't forget these please!
			*/
			$this->widget_title = __( 'EM Portfolio Widget' , 'common' );
			$this->widget_id = 'em_portfolio';
			$this->post_type = 'em_portfolio';
			$this->taxonomy = 'em_portfolio_cat';
			$this->checkboxes = array(
					'show_titles',
					'show_categories',
				); // @TODO: Try make this more dynamic, or leave a different note reminding users to change this if they add/remove checkboxes
			$this->support_lightbox = true;

			/* Widget settings. */
			$widget_ops = array(
				'classname' => 'obox-layers-' . $this->widget_id .'-widget',
				'description' => __( 'This widget is used for portfolio', 'common' ),
				'customize_selective_refresh' => TRUE,
			);

			/* Widget control settings. */
			$control_ops = array(
				'width' => LAYERS_WIDGET_WIDTH_SMALL,
				'height' => NULL,
				'id_base' => LAYERS_THEME_SLUG . '-widget-' . $this->widget_id,
			);

			/* Create the widget. */
			parent::__construct(
				LAYERS_THEME_SLUG . '-widget-' . $this->widget_id,
				$this->widget_title,
				$widget_ops,
				$control_ops
			);

			/* Setup Widget Defaults */
			$this->defaults = array (
				'title' => __( 'Our Portfolio', 'common' ),
				'excerpt' => __( 'Lorem up to date with all our latest news and launches. Only the best quality makes it onto our blog!', 'common' ),
				'category' => 0,
				'show_titles' => 'on',
				'show_categories' => 'on',
				'show_pagination' => 'on',
				'posts_per_page' => get_option( 'posts_per_page' ),
				'design' => array(
					'layout' => 'layout-boxed',
					'textalign' => 'text-left',
					'columns' => '3',
					'gutter' => 'on',
					'background' => array(
						'position' => 'center',
						'repeat' => 'no-repeat'
					),
					'fonts' => array(
						'align' => 'text-center',
						'size' => 'medium',
						'color' => NULL,
						'shadow' => NULL,
						'heading-type' => 'h3',
					),
				),
			);
		}

		/**
		*  Widget front end display
		*/
		function widget( $args, $instance ) {
			global $wp_customize;

			$this->backup_inline_css();

			// Turn $args array into variables.
			extract( $args );
			
			// Allow anyone to modify the instance.
			$instance = apply_filters( 'layers_modify_widget_instance', $instance, $this->widget_id, FALSE );

			// Use defaults if $instance is empty.
			if( empty( $instance ) && ! empty( $this->defaults ) ) {
				$instance = wp_parse_args( $instance, $this->defaults );
			}

			// Mix in new/unset defaults on every instance load (NEW)
			$instance = $this->apply_defaults( $instance );

			// Set the span class for each column
			if( isset( $instance['design'][ 'columns']  ) ) {
				$col_count = str_ireplace('columns-', '', $instance['design'][ 'columns']  );
				$span_class = 'col-md-' . ( 12/ $col_count );
			} else {
				$col_count = 3;
				$span_class = 'col-md-4';
			}

			// Apply Styling
			if( NULL !== $this->check_and_return( $instance, 'design', 'background' ) ) 
				$this->inline_css .= layers_inline_styles( "#{$widget_id}", 'background', array( 'background' => $this->check_and_return( $instance, 'design', 'background' ) ) );

			if( NULL !== $this->check_and_return( $instance, 'design', 'fonts', 'color' ) ) 
				$this->inline_css .= layers_inline_styles( "#{$widget_id}", 'color', array( 'selectors' => array( '.section-title .heading' , '.section-title div.excerpt' ) , 'color' => $this->check_and_return( $instance, 'design', 'fonts', 'color' ) ) );

			if( NULL !== $this->check_and_return( $instance, 'design', 'fonts', 'excerpt-color' ) ) 
				$this->inline_css .= layers_inline_styles( "#{$widget_id}", 'color', array( 'selectors' => array( '.section-title div.excerpt', '.section-title div.excerpt p' , '.section-title div.excerpt a' ) , 'color' => $this->check_and_return( $instance, 'design', 'fonts', 'excerpt-color' ) ) );
			
			if( NULL !== $this->check_and_return( $instance, 'design', 'column-text-color' ) ) 
				$this->inline_css .= layers_inline_styles( "#{$widget_id}", 'color', array( 'selectors' => array( '.thumbnail-body .heading a', '.thumbnail-body .excerpt', '.thumbnail-body footer', '.thumbnail-body footer a' ) , 'color' => $this->check_and_return( $instance, 'design', 'column-text-color' ) ) );

			if( NULL !== $this->check_and_return(  $instance, 'design', 'column', 'background', 'style' ) ){

				$bg_args = array(
					'color' => $this->check_and_return( $instance, 'design', 'column-background-color' )
				);

				if( is_array( $this->check_and_return(  $instance, 'design', 'column', 'background' ) ) ){
					$bg = $this->check_and_return(  $instance, 'design', 'column', 'background' );
				} else {
					$bg = array();
				}

				$bg_args = array_merge( $bg , $bg_args );

			} else if( NULL !== $this->check_and_return( $instance, 'design', 'design', 'column-background-color' ) ){
				$bg_args = array(
					'background' => array(
						'color' => $this->check_and_return( $instance, 'design', 'design', 'column-background-color'
						)
					)
				);
			}

			if( isset( $bg_args ) )
				$this->inline_css .= layers_inline_styles( "#{$widget_id}", 'background', array( 'selectors' => array( '.thumbnail-body' ), 'background' => $bg_args ) );

			// Begin query arguments
			$query_args = array();
			if( get_query_var('paged') ) {
				$query_args[ 'paged' ] = get_query_var('paged') ;
			} else if ( get_query_var('page') ) {
				$query_args[ 'paged' ] = get_query_var('page');
			} else {
				$query_args[ 'paged' ] = 1;
			}

			$query_args[ 'post_type' ] = $this->post_type;
			$query_args[ 'posts_per_page' ] = $instance['posts_per_page'];
			if( isset( $instance['order'] ) ) {

				$decode_order = json_decode( $instance['order'], true );

				if( is_array( $decode_order ) ) {
					foreach( $decode_order as $key => $value ){
						$query_args[ $key ] = $value;
					}
				}
			}

			// Do the special taxonomy array()
			if( isset( $instance['category'] ) && '' != $instance['category'] && 0 != $instance['category'] ){

				$query_args['tax_query'] = array(
					array(
						"taxonomy" => $this->taxonomy,
						"field" => "id",
						"terms" => $instance['category']
					)
				);
			} elseif( !isset( $instance['hide_category_filter'] ) ) {
				$terms = get_terms( $this->taxonomy );
			} // if we haven't selected which category to show, let's load the $terms for use in the filter

			// Do the WP_Query
			$post_query = new WP_Query( $query_args );

			// Apply the advanced widget styling
			$this->apply_widget_advanced_styling( $widget_id, $instance );

			/**
			* Generate the widget container class
			*/
			$widget_container_class = array();
			$widget_container_class[] = $widget_id;
			$widget_container_class[] = 'widget';
			$widget_container_class[] = 'layers-post-widget';
			$widget_container_class[] = 'em-portfolio-widget';
			$widget_container_class[] = 'content-vertical-massive';
			$widget_container_class[] = 'clearfix';
			$widget_container_class[] = ( 'on' == $this->check_and_return( $instance , 'design', 'background', 'darken' ) ? 'darken' : '' );
			$widget_container_class[] = $this->check_and_return( $instance , 'design', 'advanced', 'customclass' ); // Apply custom class from design-bar's advanced control.
			$widget_container_class[] = $this->get_widget_spacing_class( $instance );
			$widget_container_class[] = $this->get_animation_class( $instance );

			$widget_container_class = apply_filters( 'layers_post_widget_container_class' , $widget_container_class, $this, $instance );
			$widget_container_class = implode( ' ', $widget_container_class );

			// Custom Anchor
			echo $this->custom_anchor( $instance ); ?>

			<div id="<?php echo esc_attr( $widget_id ); ?>" class="<?php echo esc_attr( $widget_container_class ); ?>" <?php $this->selective_refresh_atts( $args ); ?>>

				<?php do_action( 'layers_before_post_widget_inner', $this, $instance ); ?>

				<?php if( '' != $this->check_and_return( $instance , 'title' ) ||'' != $this->check_and_return( $instance , 'excerpt' ) ) { ?>
					<div class="container clearfix">
						<?php /**
						* Generate the Section Title Classes
						*/
						$section_title_class = array();
						$section_title_class[] = 'section-title clearfix';
						$section_title_class[] = $this->check_and_return( $instance , 'design', 'fonts', 'size' );
						$section_title_class[] = $this->check_and_return( $instance , 'design', 'fonts', 'align' );
						$section_title_class[] = ( $this->check_and_return( $instance, 'design', 'background' , 'color' ) && 'dark' == layers_is_light_or_dark( $this->check_and_return( $instance, 'design', 'background' , 'color' ) ) ? 'invert' : '' );
						$section_title_class = implode( ' ', $section_title_class ); ?>
						<div class="<?php echo $section_title_class; ?>">
							<?php if( '' != $this->check_and_return( $instance, 'title' )  ) { ?>
								<<?php echo $this->check_and_return( $instance, 'design', 'fonts', 'heading-type' ); ?> class="heading">
									<?php echo $instance['title'] ?>
								</<?php echo $this->check_and_return( $instance, 'design', 'fonts', 'heading-type' ); ?>>
							<?php } ?>
							<?php if( '' != $this->check_and_return( $instance, 'excerpt' )  ) { ?>
								<div class="excerpt"><?php echo layers_the_content( $instance['excerpt'] ); ?></div>
							<?php } ?>
						</div>
					</div>
				<?php } ?>
				<?php if( $post_query->have_posts() ) { ?>
					<div class="<?php echo $this->get_widget_layout_class( $instance ); ?>" >
					
					
					
					<div class="em40_row">
						<div class="col-md-12">

							<div class="portfolio_nav">
								<ul id="filter" class="filter_menu">
									<li class="current_menu_item" data-filter="*" ><?php esc_html_e('All Works', 'common');?></li>
								<?php 	
								$categories = get_terms('em_portfolio_cat');
									foreach ( $categories as $single_category ) {?>
									
										<li   data-filter=".<?php echo esc_attr( $single_category->slug );?>"><?php echo esc_html( $single_category->name );?></li>
										

									<?php }?>
								</ul>
							</div>

						</div>				
					</div>
								
					
					
			<div class="em40_row em_load">
		
				<div class="prot_wrap">
				
					<?php while ($post_query->have_posts()) : $post_query->the_post(); 

						$post_column_class = array();
						$post_column_class[] = 'thumbnail';
						$post_column_class[] = $span_class;
						$post_column_class[] = ( 'on' != $this->check_and_return( $instance, 'design', 'gutter' ) ? 'nospace' : 'column' );
						$post_column_class[] = ( '' != $this->check_and_return( $instance, 'design' , 'column-text-align' ) ? $this->check_and_return( $instance, 'design' , 'column-text-align' ) : 'text-left'  ) ;
						$post_column_class[] = ( '' != $this->check_and_return( $instance, 'design', 'column-background-color' ) && 'dark' == layers_is_light_or_dark( $this->check_and_return( $instance, 'design', 'column-background-color' ) ) ? 'invert' : '' );
						$post_column_class = implode( ' ' , $post_column_class );					
					
					
						$terms = get_the_terms(get_the_ID(), 'em_portfolio_cat');
						
						$saloption  = get_post_meta( get_the_ID(),'_common_saloption', true ); 
						$siimagepop  = get_post_meta( get_the_ID(),'_common_siimagepop', true ); 
						$sllink  = get_post_meta( get_the_ID(),'_common_sllink', true ); 
						$shyoutub  = get_post_meta( get_the_ID(),'_common_shyoutub', true ); 
						$pyoutube  = get_post_meta( get_the_ID(),'_common_pyoutube', true ); 
						$svvimeo  = get_post_meta( get_the_ID(),'_common_svvimeo', true ); 
						$pvimeo  = get_post_meta( get_the_ID(),'_common_pvimeo', true );
						$pshow_cat  = get_post_meta( get_the_ID(),'_common_pshow_cat', true ); 
						$pshow_title  = get_post_meta( get_the_ID(),'_common_pshow_title', true ); 

					?>
						<!-- single portfolio -->
						<div class="<?php echo $post_column_class; ?>  grid-item col-xs-12 col-sm-6  <?php foreach( $terms as $single_slug){echo $single_slug->slug. ' ';}	?>"  data-cols="<?php echo $col_count; ?>" >
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
																								
										<a class="portfolio-icon em_venobox_custom" data-gall="myGallery" href="<?php echo wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ), 'full' );?>"><i class="fa fa-file-image-o"></i></a>

										<a href="<?php the_permalink(); ?>"><i class="fa fa-link"></i></a>	
																	
										<a class="video-vemo-icon em_venobox_custom" data-vbtype="youtube" data-autoplay="true" data-gall="gall-video" href="<?php echo esc_url($pyoutube ); ?>">
										<i class="fa fa-youtube-play"></i></a>			
																
										<a class="video-vemo-icon em_venobox_custom" data-vbtype="vimeo" data-autoplay="true" data-gall="gall-video" href="<?php echo esc_url($pvimeo ); ?>"><i class="fa fa-vimeo"></i>
										</a>									

										</div>

								<?php else: //or ?>

								<div class="picon">
																	
															
									<?php if($siimagepop=='m_ishow'): ?>									
									<a class="portfolio-icon em_venobox_custom" data-gall="myportfolio" href="<?php echo wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ), 'full' );?>"><i class="fa fa-file-image-o"></i></a>
									<?php endif; ?>

									<?php if($sllink=='m_lshow'): ?>	
									<a href="<?php the_permalink(); ?>"><i class="fa fa-link"></i></a>	
									<?php endif; ?>

									<?php if($shyoutub=='m_yshow'): ?>	

									<?php if($pyoutube): ?>								
									<a class="video-vemo-icon em_venobox_custom" data-vbtype="youtube" data-autoplay="true" data-gall="gall-video" href="<?php echo esc_url($pyoutube ); ?>">
									<i class="fa fa-youtube-play"></i></a>		
									<?php endif; ?>

									<?php endif; ?>

									<?php if($svvimeo=='m_vshow'): ?>

									<?php if($pvimeo): ?>									
									<a class="video-vemo-icon em_venobox_custom" data-vbtype="vimeo" data-autoplay="true" data-gall="gall-video" href="<?php echo esc_url($pvimeo ); ?>"><i class="fa fa-vimeo"></i>
									</a>									
									<?php endif; ?>

									<?php endif; ?>

								</div>
																			
								<?php endif; ?>											
																	
									
									<?php if($pshow_title=='ptitle_show'){ ?>
									<h3><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
									<?php } ?>
									
									<?php if($pshow_cat=='pcat_show'){ ?>
									<p>
										<?php if( $terms ){
											
										foreach( $terms as $single_slugs ){?>
											<span class="category-text">
											   <?php echo $single_slugs->name ;?>
											</span>																			
										<?php }}?>
									</p>
									<?php } ?>									
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
																								
										<a class="portfolio-icon em_venobox_custom" data-gall="myGallery" href="<?php echo wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ), 'full' );?>"><i class="fa fa-file-image-o"></i></a>

										<a href="<?php the_permalink(); ?>"><i class="fa fa-link"></i></a>	
																	
										<a class="video-vemo-icon em_venobox_custom" data-vbtype="youtube" data-autoplay="true" data-gall="gall-video" href="<?php echo esc_url($pyoutube ); ?>">
										<i class="fa fa-youtube-play"></i></a>			
																
										<a class="video-vemo-icon em_venobox_custom" data-vbtype="vimeo" data-autoplay="true" data-gall="gall-video" href="<?php echo esc_url($pvimeo ); ?>"><i class="fa fa-vimeo"></i>
										</a>									

										</div>

								<?php else: //or ?>

								<div class="picon">
																	
															
									<?php if($siimagepop=='m_ishow'): ?>									
									<a class="portfolio-icon em_venobox_custom" data-gall="myportfolio" href="<?php echo wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ), 'full' );?>"><i class="fa fa-file-image-o"></i></a>
									<?php endif; ?>

									<?php if($sllink=='m_lshow'): ?>	
									<a href="<?php the_permalink(); ?>"><i class="fa fa-link"></i></a>	
									<?php endif; ?>

									<?php if($shyoutub=='m_yshow'): ?>	

									<?php if($pyoutube): ?>								
									<a class="video-vemo-icon em_venobox_custom" data-vbtype="youtube" data-autoplay="true" data-gall="gall-video" href="<?php echo esc_url($pyoutube ); ?>">
									<i class="fa fa-youtube-play"></i></a>		
									<?php endif; ?>

									<?php endif; ?>

									<?php if($svvimeo=='m_vshow'): ?>

									<?php if($pvimeo): ?>									
									<a class="video-vemo-icon em_venobox_custom" data-vbtype="vimeo" data-autoplay="true" data-gall="gall-video" href="<?php echo esc_url($pvimeo ); ?>"><i class="fa fa-vimeo"></i>
									</a>									
									<?php endif; ?>

									<?php endif; ?>

								</div>
																			
								<?php endif; ?>											
																	
									
									<?php if($pshow_title=='ptitle_show'){ ?>
									<h3><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
									<?php } ?>
									
									<?php if($pshow_cat=='pcat_show'){ ?>
									<p>
										<?php if( $terms ){
											
										foreach( $terms as $single_slugs ){?>
											<span class="category-text">
											   <?php echo $single_slugs->name ;?>
											</span>																			
										<?php }}?>
									</p>
									<?php } ?>										
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
					
					</div> <!-- /container -->
					
					
				<?php }; // if have_posts ?>
				<?php if( isset( $instance['show_pagination'] ) ) { ?>
					<div class="container">
						<!-- START PAGINATION -->
						<div class="em40_row">
							<div class="col-md-12">
								
								<?php layers_pagination( array( 'query' => $post_query ), 'div', 'paginations clearfix' ); ?>

							</div>
						</div>
						<!-- END START PAGINATION -->	
					</div>
				<?php } ?>

				<?php do_action( 'layers_after_post_widget_inner', $this, $instance );

				// Print the Inline Styles for this Widget
				$this->print_inline_css( $this, $instance );?>


			</div>

			<?php // Reset WP_Query
			wp_reset_postdata();

		}

		/**
		*  Widget update
		*/

		function update($new_instance, $old_instance) {

			if ( isset( $this->checkboxes ) ) {
				foreach( $this->checkboxes as $cb ) {
					if( isset( $old_instance[ $cb ] ) ) {
						$old_instance[ $cb ] = strip_tags( $new_instance[ $cb ] );
					}
				} // foreach checkboxes
			} // if checkboxes
			return $new_instance;
		}

		/**
		*  Widget form
		*
		* We use regulage HTML here, it makes reading the widget much easier than if we used just php to echo all the HTML out.
		*
		*/
		function form( $instance ){

			// Use defaults if $instance is empty.
			if( empty( $instance ) && ! empty( $this->defaults ) ) {
				$instance = wp_parse_args( $instance, $this->defaults );
			}
			
			// Allow anyone to modify the instance.
			$instance = apply_filters( 'layers_modify_widget_instance', $instance, $this->widget_id, FALSE );

			// Mix in new/unset defaults on every instance load (NEW)
			$instance = $this->apply_defaults( $instance );

			$this->design_bar(
				'side', // CSS Class Name
				array( // Widget Object
					'name' => $this->get_layers_field_name( 'design' ),
					'id' => $this->get_layers_field_id( 'design' ),
					'widget_id' => $this->widget_id,
					'widget_object' => $this,
				),
				$instance, // Widget Values
				apply_filters( 'layers_post_widget_design_bar_components' , array( // Components
					'layout',
					'display' => array(
						'icon-css' => 'icon-display',
						'label' => __( 'Display', 'common' ),
						'elements' => array(
							'text-style-start' => array(
								'type' => 'group-start',
								'label' => __( 'Title &amp; Excerpt Position', 'common' ),
							),
								'show_titles' => array(
									'type' => 'checkbox',
									'name' => $this->get_layers_field_name( 'show_titles' ) ,
									'id' => $this->get_layers_field_id( 'show_titles' ) ,
									'value' => ( isset( $instance['show_titles'] ) ) ? $instance['show_titles'] : NULL,
									'label' => __( 'Show  Post Titles' , 'common' )
								),
								'show_pagination' => array(
									'type' => 'checkbox',
									'name' => $this->get_layers_field_name( 'show_pagination' ) ,
									'id' => $this->get_layers_field_id( 'show_pagination' ) ,
									'value' => ( isset( $instance['show_pagination'] ) ) ? $instance['show_pagination'] : NULL,
									'label' => __( 'Show Pagination' , 'common' )
								),
								'show_categories' => array(
									'type' => 'checkbox',
									'name' => $this->get_layers_field_name( 'show_categories' ) ,
									'id' => $this->get_layers_field_id( 'show_categories' ) ,
									'value' => ( isset( $instance['show_categories'] ) ) ? $instance['show_categories'] : NULL,
									'label' => __( 'Show Categories' , 'common' ),
									'data' => array(
										'show-if-selector' => '#' . $this->get_layers_field_id( 'text_style' ),
										'show-if-value' => 'overlay',
										'show-if-operator' => '!='
									),
								),


						),
					),
					'columns',
					'background',
					'advanced',
				), $this, $instance )
			); ?>
			<div class="layers-container-large">

				<?php $this->form_elements()->header( array(
					'title' =>  __( 'Post' , 'common' ),
					'icon_class' =>'post'
				) ); ?>

				<section class="layers-accordion-section layers-content">

					<div class="layers-row layers-push-bottom">
						<div class="layers-form-item">

							<?php echo $this->form_elements()->input(
								array(
									'type' => 'text',
									'name' => $this->get_layers_field_name( 'title' ) ,
									'id' => $this->get_layers_field_id( 'title' ) ,
									'placeholder' => __( 'Enter title here' , 'common' ),
									'value' => ( isset( $instance['title'] ) ) ? $instance['title'] : NULL,
									'class' => 'layers-text layers-large'
								)
							); ?>

							<?php $this->design_bar(
								'top', // CSS Class Name
								array( // Widget Object
									'widget_object' => $this,
									'name' => $this->get_layers_field_name( 'design' ),
									'id' => $this->get_layers_field_id( 'design' ),
									'widget_id' => $this->widget_id,
									'show_trash' => FALSE,
									'inline' => TRUE,
									'align' => 'right',
								),
								$instance, // Widget Values
								apply_filters( 'layers_post_widget_inline_design_bar_components', array( // Components
									'header_excerpt',
								), $this, $instance )
							); ?>

						</div>
						<div class="layers-form-item">

							<?php echo $this->form_elements()->input(
								array(
									'type' => 'rte',
									'name' => $this->get_layers_field_name( 'excerpt' ) ,
									'id' => $this->get_layers_field_id( 'excerpt' ) ,
									'placeholder' => __( 'Short Excerpt' , 'common' ),
									'value' => ( isset( $instance['excerpt'] ) ) ? $instance['excerpt'] : NULL,
									'class' => 'layers-textarea layers-large'
								)
							); ?>

						</div>
						<?php // Grab the terms as an array and loop 'em to generate the $options for the input
						$terms = get_terms( $this->taxonomy , array( 'hide_empty' => false ) );
						if( !is_wp_error( $terms ) ) { ?>
							<p class="layers-form-item">
								<label for="<?php echo $this->get_layers_field_id( 'category' ); ?>"><?php echo __( 'Category to Display' , 'common' ); ?></label>
								<?php $category_options[ 0 ] = __( 'All' , 'common' );
								foreach ( $terms as $t ) $category_options[ $t->term_id ] = $t->name;
								echo $this->form_elements()->input(
									array(
										'type' => 'select',
										'name' => $this->get_layers_field_name( 'category' ) ,
										'id' => $this->get_layers_field_id( 'category' ) ,
										'placeholder' => __( 'Select a Category' , 'common' ),
										'value' => ( isset( $instance['category'] ) ) ? $instance['category'] : NULL,
										'options' => $category_options,
									)
								); ?>
							</p>
						<?php } // if !is_wp_error ?>
						<p class="layers-form-item">
							<label for="<?php echo $this->get_layers_field_id( 'posts_per_page' ); ?>"><?php echo __( 'Number of items to show' , 'common' ); ?></label>
							<?php $select_options[ '-1' ] = __( 'Show All' , 'common' );
							$select_options = $this->form_elements()->get_incremental_options( $select_options , 1 , 20 , 1);
							echo $this->form_elements()->input(
								array(
									'type' => 'number',
									'name' => $this->get_layers_field_name( 'posts_per_page' ) ,
									'id' => $this->get_layers_field_id( 'posts_per_page' ) ,
									'value' => ( isset( $instance['posts_per_page'] ) ) ? $instance['posts_per_page'] : NULL,
									'min' => '-1',
									'max' => '100'
								)
							); ?>
						</p>

						<p class="layers-form-item">
							<label for="<?php echo $this->get_layers_field_id( 'order' ); ?>"><?php echo __( 'Sort by' , 'common' ); ?></label>
							<?php echo $this->form_elements()->input(
								array(
									'type' => 'select',
									'name' => $this->get_layers_field_name( 'order' ) ,
									'id' => $this->get_layers_field_id( 'order' ) ,
									'value' => ( isset( $instance['order'] ) ) ? $instance['order'] : NULL,
									'options' => $this->form_elements()->get_sort_options()
								)
							); ?>
						</p>
					</div>
				</section>

			</div>
		<?php } // Form
	} // Class

	// Add our function to the widgets_init hook.
	 register_widget("em_portfolio");
}