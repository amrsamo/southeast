<?php  /**
 * Post Widget
 *
 * This file is used to register and display the Layers - Post widget.
 *
 * @package Layers
 * @since Layers 1.0.0
 */
if( class_exists('Layers_Widget') && !class_exists( 'em_contact' ) ) {	 
	class em_contact extends Layers_Widget {
	    
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
			$this->widget_title = __( 'EM Contact Widget' , 'common' );
			$this->widget_id = 'em_contact';
			$this->post_type = '';
			$this->taxonomy = '';
			$this->checkboxes = array(
				); // @TODO: Try make this more dynamic, or leave a different note reminding users to change this if they add/remove checkboxes
			$this->support_lightbox = true;

			/* Widget settings. */
			$widget_ops = array(
				'classname' => 'obox-layers-' . $this->widget_id .'-widget',
				'description' => __( 'This widget is used to display your choose in a flexible grid.', 'common' ),
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
				'title' => __( 'Our <span>Contact</span>', 'common' ),
				'excerpt' => __( 'Lorem up to date with all our latest news and launches. Only the best quality makes it onto choose us!', 'common' ),
				'category' => 0,
				't1' => '',
				't2' => '',
				't3' => '',
				't4' => '',
				'tx1' => '',
				'tx2' => '',
				'tx3' => '',
				'tx4' => '',
				'ccontact' => '',
				'gmap' => '',
				'show_pagination' => 'on',
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
						'align' => 'text-left',
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


			// Apply Styling
			if( NULL !== $this->check_and_return( $instance, 'design', 'background' ) ) 
				$this->inline_css .= layers_inline_styles( "#{$widget_id}", 'background', array( 'background' => $this->check_and_return( $instance, 'design', 'background' ) ) );

			if( NULL !== $this->check_and_return( $instance, 'design', 'fonts', 'color' ) ) 
				$this->inline_css .= layers_inline_styles( "#{$widget_id}", 'color', array( 'selectors' => array( '.section-title .heading' , '.section-title div.excerpt' ) , 'color' => $this->check_and_return( $instance, 'design', 'fonts', 'color' ) ) );

			if( NULL !== $this->check_and_return( $instance, 'design', 'fonts', 'excerpt-color' ) ) 
				$this->inline_css .= layers_inline_styles( "#{$widget_id}", 'color', array( 'selectors' => array( '.section-title div.excerpt', '.section-title div.excerpt p' , '.section-title div.excerpt a' ) , 'color' => $this->check_and_return( $instance, 'design', 'fonts', 'excerpt-color' ) ) );
			

			// Apply the advanced widget styling
			$this->apply_widget_advanced_styling( $widget_id, $instance );

			/**
			* Generate the widget container class
			*/
			$widget_container_class = array();
			$widget_container_class[] = $widget_id;
			$widget_container_class[] = 'widget';
			$widget_container_class[] = 'layers-post-widget';
			$widget_container_class[] = 'em-contact-widget';
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
				
				
				
				
				
				
				
				
				
				

					<div class="<?php echo $this->get_widget_layout_class( $instance ); ?>" >						
					
						<div class="em40_row">

							<div class="col-md-12">
								<div class="em40_row">
									<?php if( '' != $this->check_and_return( $instance, 'tx1' ) ||  '' != $this->check_and_return( $instance, 't1' ) ) { ?>
									<div class="col-md-3">
										<div class="single_choose single-info">
											<h2><?php echo $instance['t1']; ?></h2>
											<p>
											<?php echo $instance['tx1']; ?>
											</p>
										</div>
									</div>
									<?php } ?>
									<?php if( '' != $this->check_and_return( $instance, 'tx2' ) || '' != $this->check_and_return( $instance, 't2' ) ) { ?>
									<div class="col-md-3">
										<div class="single_choose single-info">
											<h2><?php echo $instance['t2']; ?></h2>
											<p>
											<?php echo $instance['tx2']; ?>
											</p>
										</div>
									</div>
									<?php } ?>
									<?php if( '' != $this->check_and_return( $instance, 'tx3' ) || '' != $this->check_and_return( $instance, 't3' )  ) { ?>								
									<div class="col-md-3">
										<div class="single_choose single-info">
											<h2><?php echo $instance['t3']; ?></h2>
											<p>
											<?php echo $instance['tx3']; ?>
											</p>
										</div>
									</div>
									<?php } ?>
									<?php if( '' != $this->check_and_return( $instance, 'tx4' ) || '' != $this->check_and_return( $instance, 't4' ) ) { ?>								
									<div class="col-md-3">
										<div class="single_choose single-info">
											<h2><?php echo $instance['t4']; ?></h2>
											<p>
											<?php echo $instance['tx4']; ?>
											</p>
										</div>
									</div>
									<?php } ?>
								</div>
							</div>
							
						
						<?php if( '' != $this->check_and_return( $instance, 'ccontact' )  ) { ?>
						
						<?php if( '' != $this->check_and_return( $instance, 'gmap' )  ) { ?>
							<div class="col-md-6  col-sm-12 col-xs-12">
						<?php }else{ ?>
							<div class="col-md-12  col-sm-12 col-xs-12">
						<?php } ?>	

						
							<div class="contact-form-8">
									
									
										<?php echo do_shortcode($instance['ccontact'] ); ?>
								
										

							</div>
						
						</div>
						<?php }?>
						
						<?php if( '' != $this->check_and_return( $instance, 'gmap' )  ) { ?>
						
						<?php if( '' != $this->check_and_return( $instance, 'ccontact' )  ) { ?>
							<div class="col-md-6  col-sm-12 col-xs-12">
						<?php }else{ ?>
							<div class="col-md-12  col-sm-12 col-xs-12">
						<?php } ?>	
												
							<div class="google-map-9">

									
										<?php echo $instance['gmap']; ?>
								

							</div>
						
						</div>
						<?php }?>
						
						

						</div>					
					
					</div> <!-- /container -->
					

				<?php do_action( 'layers_after_post_widget_inner', $this, $instance );

				// Print the Inline Styles for this Widget
				$this->print_inline_css( $this, $instance );?>


			</div>

			<?php // Reset WP_Query


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
								'show_pagination' => array(
									'type' => 'checkbox',
									'name' => $this->get_layers_field_name( 'show_pagination' ) ,
									'id' => $this->get_layers_field_id( 'show_pagination' ) ,
									'value' => ( isset( $instance['show_pagination'] ) ) ? $instance['show_pagination'] : NULL,
									'label' => __( 'Show Pagination' , 'common' )
								),

						),
					),
					'background',
					'advanced',
				), $this, $instance )
			); ?>
			<div class="layers-container-large">

				<?php $this->form_elements()->header( array(
					'title' =>  __( 'Contact Us' , 'common' ),
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
							<p>
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
							</p>	
							
						</div>
						
						
						<div class="layers-form-item">
								<h2><?php esc_html_e('Title and Content','common');?></h2>
						</div>
						<div class="layers-form-item">	
							<p>
							<?php echo $this->form_elements()->input(
								array(
									'type' => 'text',
									'name' => $this->get_layers_field_name( 't1' ) ,
									'id' => $this->get_layers_field_id( 't1' ) ,
									'placeholder' => __( 'Set Title 1' , 'common' ),
									'value' => ( isset( $instance['t1'] ) ) ? $instance['t1'] : NULL,
									'class' => 'layers-text'
								)
							); ?>
							</p>
							<p>
							<?php echo $this->form_elements()->input(
								array(
									'type' => 'textarea',
									'name' => $this->get_layers_field_name( 'tx1' ) ,
									'id' => $this->get_layers_field_id( 'tx1' ) ,
									'placeholder' => __( 'Set Text 1' , 'common' ),
									'value' => ( isset( $instance['tx1'] ) ) ? $instance['tx1'] : NULL,
									'class' => 'layers-text'
								)
							); ?>
							</p>							
							<p>
							<?php echo $this->form_elements()->input(
								array(
									'type' => 'text',
									'name' => $this->get_layers_field_name( 't2' ) ,
									'id' => $this->get_layers_field_id( 't2' ) ,
									'placeholder' => __( 'Set Title 2' , 'common' ),
									'value' => ( isset( $instance['t2'] ) ) ? $instance['t2'] : NULL,
									'class' => 'layers-text'
								)
							); ?>
							</p>
							<p>
							<?php echo $this->form_elements()->input(
								array(
									'type' => 'textarea',
									'name' => $this->get_layers_field_name( 'tx2' ) ,
									'id' => $this->get_layers_field_id( 'tx2' ) ,
									'placeholder' => __( 'Set Text 2' , 'common' ),
									'value' => ( isset( $instance['tx2'] ) ) ? $instance['tx2'] : NULL,
									'class' => 'layers-text'
								)
							); ?>
							</p>							
							<p>
							<?php echo $this->form_elements()->input(
								array(
									'type' => 'text',
									'name' => $this->get_layers_field_name( 't3' ) ,
									'id' => $this->get_layers_field_id( 't3' ) ,
									'placeholder' => __( 'Set Title 3' , 'common' ),
									'value' => ( isset( $instance['t3'] ) ) ? $instance['t3'] : NULL,
									'class' => 'layers-text'
								)
							); ?>
							</p>
							<p>
							<?php echo $this->form_elements()->input(
								array(
									'type' => 'textarea',
									'name' => $this->get_layers_field_name( 'tx3' ) ,
									'id' => $this->get_layers_field_id( 'tx3' ) ,
									'placeholder' => __( 'Set Text 3' , 'common' ),
									'value' => ( isset( $instance['tx3'] ) ) ? $instance['tx3'] : NULL,
									'class' => 'layers-text'
								)
							); ?>
							</p>							
							<p>
							<?php echo $this->form_elements()->input(
								array(
									'type' => 'text',
									'name' => $this->get_layers_field_name( 't4' ) ,
									'id' => $this->get_layers_field_id( 't4' ) ,
									'placeholder' => __( 'Set Title 4' , 'common' ),
									'value' => ( isset( $instance['t4'] ) ) ? $instance['t4'] : NULL,
									'class' => 'layers-text'
								)
							); ?>
							</p>
							<p>
							<?php echo $this->form_elements()->input(
								array(
									'type' => 'textarea',
									'name' => $this->get_layers_field_name( 'tx4' ) ,
									'id' => $this->get_layers_field_id( 'tx4' ) ,
									'placeholder' => __( 'Set Text 4' , 'common' ),
									'value' => ( isset( $instance['tx4'] ) ) ? $instance['tx4'] : NULL,
									'class' => 'layers-text'
								)
							); ?>
							</p>							
						</div>						
						
						
						
						<div class="layers-form-item">
								<h2><?php esc_html_e('Contact Form and Google Map','common');?></h2>
						</div>
						<div class="layers-form-item">
							<p>
							<?php echo $this->form_elements()->input(
								array(
									'type' => 'textarea',
									'name' => $this->get_layers_field_name( 'ccontact' ) ,
									'id' => $this->get_layers_field_id( 'ccontact' ) ,
									'placeholder' => __( 'Set Contact Form 7' , 'common' ),
									'value' => ( isset( $instance['ccontact'] ) ) ? $instance['ccontact'] : NULL,
									'class' => 'layers-text layers-textarea'
								)
							); ?>
							</p>						
							<p>
							<?php echo $this->form_elements()->input(
								array(
									'type' => 'textarea',
									'name' => $this->get_layers_field_name( 'gmap' ) ,
									'id' => $this->get_layers_field_id( 'gmap' ) ,
									'placeholder' => __( 'Set google Map' , 'common' ),
									'value' => ( isset( $instance['gmap'] ) ) ? $instance['gmap'] : NULL,
									'class' => 'layers-text layers-textarea'
								)
							); ?>
							</p>						
						</div>							
						
						
						
						
						
						
						


					</div>
				</section>

			</div>
		<?php } // Form
	} // Class

	// Add our function to the widgets_init hook.
	 register_widget("em_contact");
}