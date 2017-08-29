<?php  /**
 * Post Widget
 *
 * This file is used to register and display the Layers - Post widget.
 *
 * @package Layers
 * @since Layers 1.0.0
 */
if( class_exists('Layers_Widget') && !class_exists( 'em_slider' ) ) {
	class em_slider extends Layers_Widget {
	    
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
			$this->widget_title = __( 'EM Slider Widget' , 'common' );
			$this->widget_id = 'em_slider';
			$this->post_type = 'em_slider';
			$this->taxonomy = 'em_slider_cat';
			$this->checkboxes = array(
				); // @TODO: Try make this more dynamic, or leave a different note reminding users to change this if they add/remove checkboxes
			$this->support_lightbox = true;

			/* Widget settings. */
			$widget_ops = array(
				'classname' => 'obox-layers-' . $this->widget_id .'-widget',
				'description' => __( 'This widget is used for slider.', 'common' ),
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
				'category' => 0,
				'posts_per_page' => get_option( 'posts_per_page' ),
				
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
			$widget_container_class[] = 'em-slider-widget';
			$widget_container_class[] = '';
			$widget_container_class[] = 'clearfix';
			$widget_container_class[] = $this->get_widget_spacing_class( $instance );
			$widget_container_class[] = $this->check_and_return( $instance , 'design', 'advanced', 'customclass' ); // Apply custom class from design-bar's advanced control.
			$widget_container_class = apply_filters( 'layers_post_widget_container_class' , $widget_container_class, $this, $instance );
			$widget_container_class = implode( ' ', $widget_container_class );

			// Custom Anchor
			echo $this->custom_anchor( $instance ); ?>

			<div id="<?php echo esc_attr( $widget_id ); ?>" class="<?php echo esc_attr( $widget_container_class ); ?>" <?php $this->selective_refresh_atts( $args ); ?>>

				<?php do_action( 'layers_before_post_widget_inner', $this, $instance ); ?>


				<?php if( $post_query->have_posts() ) { ?>
					<div class="<?php echo $this->get_widget_layout_class( $instance ); ?> ">
						<div class="em_row">
						
						

								
								
								
								
										<div class="em-slider-area">
											<div class="em-slider-wrapper owl-carousel curosel-style-slider">
				
												<?php while ( $post_query->have_posts() ) {
														$post_query->the_post();
														
														
															$em_slide_title  = get_post_meta( get_the_ID(),'_common_em_slide_title', true );
															$em_slide_subtitle  = get_post_meta( get_the_ID(),'_common_em_slide_subtitle', true );
															$em_slide_highlight  = get_post_meta( get_the_ID(),'_common_em_slide_highlight', true );
															$em_slide_textarea  = get_post_meta( get_the_ID(),'_common_em_slide_textarea', true );
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
																	
																		<?php if($em_slide_title){?> 
																		<div class="em-slider-title">
																			<h2 style="color:<?php echo esc_url( $em_slide_title_color );?>"><?php echo esc_html( $em_slide_title );?></h2>
																		</div>
																		<?php } ?>
																		<?php if($em_slide_subtitle){?> 
																		<div class="em-slider-title-lg">
																			<h1 style="color:<?php echo esc_url( $em_slide_subtitle_color );?>"><?php echo esc_html( $em_slide_subtitle );?> 
																			<?php if($em_slide_highlight){?> 
																			<span style="color:<?php echo esc_url( $em_slide_highlight_color );?>">																			
																			<?php echo esc_html( $em_slide_highlight );?></span>
																				<?php } ?>
																			</h1>
																		</div>
																		<?php } ?>
																		<?php if($em_slide_textarea){?> 
																		<div class="em-slider-content-text">
																			<p style="color:<?php echo esc_url( $em_slide_content_color );?>"><?php echo esc_html($em_slide_textarea);?></p>
																		</div>
																		<?php } ?>
																		<div class="em-slider-button">
																			<?php if($em_slide_btn1utl){?> 
																				<a class="sbtn-left" href="<?php echo esc_url( $em_slide_btn1utl );?>"><?php echo esc_html( $em_slide_btn1 );?></a>
																			<?php }?>
																			<?php if($em_slide_btn2url){?> 
																				<a class="sbtn-right" href="<?php echo esc_url( $em_slide_btn2url );?>"><?php echo esc_html( $em_slide_btn2 );?></a>
																			<?php }?>
																			
																			
																		</div>
																	</div>
																</div>
															</div>
																								
								
												<?php  } //END WHILE ?>
										
											</div>
										</div>								

								
						</div><!-- /row -->
					</div>
				<?php }; // if have_posts ?>
				<?php if( isset( $instance['show_pagination'] ) ) { ?>
					<div class="container">
						<?php layers_pagination( array( 'query' => $post_query ), 'div', 'pagination clearfix' ); ?>
					</div>
				<?php } ?>

				<?php do_action( 'layers_after_post_widget_inner', $this, $instance );

				// Print the Inline Styles for this Widget
				$this->print_inline_css( $this, $instance ); ?>


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
					'advanced',
				), $this, $instance )
			); ?>
			<div class="layers-container-large">

				<?php $this->form_elements()->header( array(
					'title' =>  __( 'slider' , 'common' ),
					'icon_class' =>'post'
				) ); ?>

				<section class="layers-accordion-section layers-content">

					<div class="layers-row layers-push-bottom">

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
	 register_widget("em_slider");
}