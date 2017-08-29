<?php

add_action( 'cmb2_admin_init', 'common_metabox' );
/*
**	Setting up custom fields for custom post types belongs to fantasic child theme for common
*/ 

if ( !function_exists('common_metabox') ) {
	function common_metabox() {
		$prefix = '_common_';

  //page metabox
  $page_breadcrumb = new_cmb2_box( array(
   'id'            => $prefix . 'pageid1',
   'title'         => esc_html__( 'Breadcumb Option', 'common' ),
   'object_types'  => array( 'post','page' ), // Post type
   'priority'   => 'high',
  ) );
  
  $page_breadcrumb->add_field( array(
   'name'    => esc_html__('Page Title','common'),
   'id'      => $prefix . 'ptitle',
   'type'    => 'radio_inline',
   'options' => array(
    'ptitles' => esc_html__( 'Show Title', 'common' ),
    'ptitleh'   => esc_html__( 'Hide Title', 'common' ),
   ),
   'default' =>'ptitles',
  ) );   
  
  
  $page_breadcrumb->add_field( array(
   'name'    => esc_html__('Breadcrumb','common'),
   'id'      => $prefix . 'breadcrumbs',
   'type'    => 'radio_inline',
   'options' => array(
    '0' => esc_html__( 'Show breadcrumb', 'common' ),
    '1'   => esc_html__( 'Hide breadcrumb', 'common' ),
   ),
   'default' =>0,
  ) );
  $page_breadcrumb->add_field( array(
   'name'    => esc_html__('Breadcrumb Title','common'),
   'id'      => $prefix . 'btitle',
   'type'    => 'radio_inline',
   'options' => array(
    'btitles' => esc_html__( 'Show Title', 'common' ),
    'btitleh'   => esc_html__( 'Hide Title', 'common' ),
   ),
   'default' =>'btitleh',
  ) );    
  $page_breadcrumb->add_field(array(
   'name' => esc_html__( 'Page Breadcrumb Image', 'common' ),
   'id'   => $prefix .'pageimagess',
   'desc'       => esc_html__( 'insert image here', 'common' ),  
   'type' => 'file',
  ) );  
  $page_breadcrumb->add_field( array(
   'name'             => esc_html__('Text Align','common'),
   'desc'             => esc_html__('Select an option','common'),
   'id'   => $prefix .'page_text_align',
   'type'             => 'select',
   'show_option_none' => true,
   'default'          => 'text-center',
   'options'          => array(
    'text-left' => esc_html__( 'Align Left', 'common' ),
    'text-center'   => esc_html__( 'Align Middle', 'common' ),
    'text-right'     => esc_html__( 'Alige Right', 'common' ),
   ),
  ) );
  $page_breadcrumb->add_field( array(
   'name'             => esc_html__('Text Transform','common'),
   'desc'             => esc_html__('Select an option','common'),
   'id'   => $prefix .'page_text_transform',
   'type'             => 'select',
   'show_option_none' => true,
   'default'          => 'ccase',
   'options'          => array(
    'lcase' => esc_html__( 'Transform lowercase', 'common' ),
    'ucase'   => esc_html__( 'Transform uppercase', 'common' ),
    'ccase'     => esc_html__( 'Transform capitalize', 'common' ),
   ),
  ) );	
		//team metabox
		$team = new_cmb2_box( array(
			'id'            => $prefix . 'common_team',
			'title'         => esc_html__( 'Team Option', 'common' ),
			'object_types'  => array( 'em_team' ), // Post type
			'priority'   => 'high',
		) );
			$team->add_field( array(
				'name'       => esc_html__( 'Designation', 'common' ),
				'desc'       => esc_html__( 'insert designation here', 'common' ),
				'id'         => $prefix . 'team_desig',
				'type'       => 'text',
			) );
				$team->add_field( array(
					'name'    => esc_html__('Show/Hide Social Icon','common'),
					'id'      => $prefix . 'team_social_show',
					'show_option_none' => true,					
					'type'    => 'radio',
					'options' => array(
						'1' => esc_html__( 'Show Social Icon', 'common' ),
						'2' => esc_html__( 'Hide Social Icon', 'common' ),
					),
					'default' =>1,
				) );			
			$teamgroup = $team->add_field( array(
					'id'          => $prefix . 'teamid',
					'type'        => 'group',
					'description' => esc_html__( 'Add Social Icon --------', 'common' ),
					'options'     => array(
						'group_title'   => esc_html__( 'Social Icon {#}', 'common' ), // {#} gets replaced by row number
						'add_button'    => esc_html__( 'Add Another Icon', 'common' ),
						'remove_button' => esc_html__( 'Remove Icon', 'common' ),
						'sortable'      => true, // beta
					),
				) );

				$team->add_group_field( $teamgroup, array(
					'name'       => esc_html__( 'Social Icon', 'common' ),
					'desc'       => esc_html__( 'insert Icon', 'common' ),
					'id'         => $prefix . 'ticon',
					'type'       => 'text',
				) );
				$team->add_group_field( $teamgroup, array(
					'name'       => esc_html__( 'Enter Link', 'common' ),
					'desc'       => esc_html__( 'insert link here', 'common' ),
					'id'  => $prefix . 'turl',
					'type' => 'text_url',					
				) );	
				
				
		//page metabox
		$testimonial = new_cmb2_box( array(
			'id'            => $prefix . 'em_testimonial',
			'title'         => esc_html__( 'Testimonial Option', 'common' ),
			'object_types'  => array( 'em_testimonial' ), // Post type
			'priority'   => 'high',
		) );
				$testimonial->add_field( array(
					'name'    => esc_html__('Rating Style','common'),
					'id'      => $prefix . 'em_rating',
					'show_option_none' => true,					
					'type'    => 'select',
					'options' => array(
						'' => esc_html__( 'Select Rating', 'common' ),
						'0' => esc_html__( 'Rating 1 Star', 'common' ),
						'1' => esc_html__( 'Rating 2 Star', 'common' ),
						'2' => esc_html__( 'Rating 3 Star', 'common' ),
						'3' => esc_html__( 'Rating 4 Star', 'common' ),
						'4' => esc_html__( 'Rating 5 Star', 'common' ),
					),
					'default' =>4,
				) );
			$testimonial->add_field( array(
				'name'       => esc_html__( 'Degignation', 'common' ),
				'desc'       => esc_html__( 'insert Degignation here', 'common' ),
				'id'         => $prefix . 'testi_deg',
				'type'       => 'text',
			) );					
				
			//===================================
			//Portfolio Metaboxes
			//===================================  

			$portfolio = new_cmb2_box( array(
				'id'            => $prefix . 'portfolio',
				'title'         => esc_html__( 'Portfolio Option', 'common' ),
				'object_types'  => array( 'em_portfolio', ), // Post type
				'priority'   => 'high',
			) );
			
			
			  $portfolio->add_field( array(
			   'name'    => esc_html__('Show/Hide All Option','common'),			  
			   'id'      => $prefix . 'saloption',
			   'type'    => 'radio_inline',
			   'options' => array(
				'm_alshow' => esc_html__( 'Show', 'common' ),
				'm_alhide'   => esc_html__( 'Hide', 'common' ),
			   ),
			   'default' =>'m_alhide',
			  ) );			
			  $portfolio->add_field( array(
			   'name'    => esc_html__('Show/Hide Popup Image','common'),			  
			   'id'      => $prefix . 'siimagepop',
			   'type'    => 'radio_inline',
			   'options' => array(
				'm_ishow' => esc_html__( 'Show', 'common' ),
				'm_ihide'   => esc_html__( 'Hide', 'common' ),
			   ),
			   'default' =>'m_ishow',
			  ) );
			  $portfolio->add_field( array(
			   'name'    => esc_html__('Show/Hide Link Page','common'),			  
			   'id'      => $prefix . 'sllink',
			   'type'    => 'radio_inline',
			   'options' => array(
				'm_lshow' => esc_html__( 'Show', 'common' ),
				'm_lhide'   => esc_html__( 'Hide', 'common' ),
			   ),
			   'default' =>'m_lshow',
			  ) );				  
			  $portfolio->add_field( array(
			   'name'    => esc_html__('Show/Hide Popup Youtube','common'),			  
			   'id'      => $prefix . 'shyoutub',
			   'type'    => 'radio_inline',
			   'options' => array(
				'm_yshow' => esc_html__( 'Show', 'common' ),
				'm_yhide'   => esc_html__( 'Hide', 'common' ),
			   ),
			   'default' =>'m_yhide',
			  ) );				
			   $portfolio->add_field( array(
				'name'       => esc_html__( 'Youtube Video', 'common' ),
				'desc'       => esc_html__( 'insert video link. ex-https://youtu.be/OJ9ejTy4J98', 'common' ),
				'id'         => $prefix . 'pyoutube',
				'type'       => 'text_url',
			   ) );
			  $portfolio->add_field( array(
			   'name'    => esc_html__('Show/Hide Popup Vimeo','common'),			  
			   'id'      => $prefix . 'svvimeo',
			   'type'    => 'radio_inline',
			   'options' => array(
				'm_vshow' => esc_html__( 'Show', 'common' ),
				'm_vhide'   => esc_html__( 'Hide', 'common' ),
			   ),
			   'default' =>'m_vhide',
			  ) );				   
			   $portfolio->add_field( array(
				'name'       => esc_html__( 'Vimeo Video', 'common' ),
				'desc'       => esc_html__( 'insert video link. ex-https://youtu.be/OJ9ejTy4J98', 'common' ),
				'id'         => $prefix . 'pvimeo',
				'type'       => 'text_url',
			   ) );		   

			  $portfolio->add_field( array(
			   'name'    => esc_html__('Select Multi Gellary','common'),			  
			   'id'      => $prefix . 'm_g_image_pop',
			   'type'    => 'radio_inline',
			   'options' => array(
				'm_gshow' => esc_html__( 'Show', 'common' ),
				'm_ghide'   => esc_html__( 'Hide', 'common' ),
			   ),
			   'default' =>'m_ghide',
			  ) );				   
				$portfolio->add_field( array(
					'name'       => esc_html__( 'Multiple Gellary Image', 'common' ),
					'desc'       => esc_html__( 'insert multiple gellary image here for single page', 'common' ),
					'id'         => $prefix . 'pgellaryu',
					'type'       => 'file_list',
				) );
			  $portfolio->add_field( array(
			   'name'    => esc_html__('Show/Hide Title','common'),			  
			   'id'      => $prefix . 'pshow_title',
			   'type'    => 'radio_inline',
			   'options' => array(
				'ptitle_show' => esc_html__( 'Show', 'common' ),
				'ptitle_hide'   => esc_html__( 'Hide', 'common' ),
			   ),
			   'default' =>'ptitle_show',
			  ) );					
			  $portfolio->add_field( array(
			   'name'    => esc_html__('Show/Hide Category','common'),			  
			   'id'      => $prefix . 'pshow_cat',
			   'type'    => 'radio_inline',
			   'options' => array(
				'pcat_show' => esc_html__( 'Show', 'common' ),
				'pcat_hide'   => esc_html__( 'Hide', 'common' ),
			   ),
			   'default' =>'pcat_show',
			  ) );					

//===================================
//Pricing table metabox
//===================================
		$pricing = new_cmb2_box( array(
			'id'            => $prefix . 'pricing',
			'title'         => esc_html__( 'Price Option', 'common' ),
			'object_types'  => array( 'em_pricing', ), // Post type
			'priority'   => 'high',
		) );
				$pricing->add_field( array(
					'name'       => esc_html__( 'Price Currency', 'common' ),
					'desc'       => esc_html__( 'insert Currency here e.g $', 'common' ),
					'id'         => $prefix . 'currency',
					'type'       => 'text',
				) );	
				$pricing->add_field( array(
					'name'       => esc_html__( 'Price Amount', 'common' ),
					'desc'       => esc_html__( 'insert Amount here', 'common' ),
					'id'         => $prefix . 'price_amount',
					'type'       => 'text',
				) );	
				$pricing->add_field( array(
					'name'       => esc_html__( 'Price Delay', 'common' ),
					'desc'       => esc_html__( 'insert Year, Month, Week or Day here', 'common' ),
					'id'         => $prefix . 'day',
					'type'       => 'text',
				) );						
				$pricing->add_field( array(
					'name'       => esc_html__( 'pricing content', 'common' ),
					'desc'       => esc_html__( 'insert pricing Item', 'common' ),
					'id'         => $prefix . 'pricing_item_loop',
					'type'       => 'text',
					'repeatable'      => true,
				) );
				$pricing->add_field( array(
					'name' => esc_html__( 'Button Text', 'common' ),
					'desc' => esc_html__( 'Insert Text Here', 'common' ),
					'id'   => $prefix . 'button_text',
					'type' => 'text',
				) );					
				$pricing->add_field( array(
					'name' => esc_html__( 'Button Link', 'common' ),
					'desc' => esc_html__( 'Insert register Link', 'common' ),
					'id'   => $prefix . 'button_link',
					'type' => 'text_url',
				) );
				$pricing->add_field( array(
					'name' => esc_html__( 'Active Class', 'common' ),
					'desc' => esc_html__( 'Add Active Class here "active"', 'common' ),
					'id'   => $prefix . 'active',
					'type' => 'text',
				) );




//===================================
//Brand table metabox
//===================================
		$brand = new_cmb2_box( array(
			'id'            => $prefix . 'brand',
			'title'         => esc_html__( 'Price Option', 'common' ),
			'object_types'  => array( 'em_brand', ), // Post type
			'priority'   => 'high',
		) );
				$brand->add_field( array(
					'name'       => esc_html__( 'Brand Logo Link', 'common' ),
					'desc'       => esc_html__( 'insert Link here', 'common' ),
					'id'         => $prefix . 'brand_link',
					'type'       => 'text_url',
				) );	
				
				
	//slider table metabox
	$slider = new_cmb2_box( array(
		'id'            => $prefix . 'common_slider',
		'title'         => esc_html__( 'Slider Option', 'common' ),
		'object_types'  => array( 'em_slider', ), // Post type
		'priority'   => 'high',
	) );
	
	
			$slider->add_field( array(
				'name'       => esc_html__( 'Title', 'common' ),
				'desc'       => esc_html__( 'insert title here', 'common' ),
				'id'         => $prefix . 'em_slide_title',
				'type'       => 'textarea_small',
			) );	
			$slider->add_field( array(
				'name'       => esc_html__( 'Sub Title', 'common' ),
				'desc'       => esc_html__( 'insert sub-title here', 'common' ),
				'id'         => $prefix . 'em_slide_subtitle',
				'type'       => 'textarea_small',
			) );
			$slider->add_field( array(
				'name'       => esc_html__( 'Sub Title Highlight Text', 'common' ),
				'desc'       => esc_html__( 'insert sub-title highlight text here', 'common' ),
				'id'         => $prefix . 'em_slide_highlight',
				'type'       => 'text',
			) );
			$slider->add_field( array(
				'name'       => esc_html__( 'Content', 'common' ),
				'desc'       => esc_html__( 'insert content here', 'common' ),
				'id'         => $prefix . 'em_slide_textarea',
				'type'       => 'textarea',
			) );			
			$slider->add_field( array(
				'name'       => esc_html__( 'Button Text 1', 'common' ),
				'desc'       => esc_html__( 'insert button text here', 'common' ),
				'id'         => $prefix . 'em_slide_btn1',
				'type'       => 'text',
			) );
			$slider->add_field( array(
				'name'       => esc_html__( 'Button url 1', 'common' ),
				'desc'       => esc_html__( 'insert button text url here', 'common' ),
				'id'         => $prefix . 'em_slide_btn1utl',
				'type'       => 'text_url',
			) );			
			$slider->add_field( array(
				'name'       => esc_html__( 'Button Text 2', 'common' ),
				'desc'       => esc_html__( 'insert button text here', 'common' ),
				'id'         => $prefix . 'em_slide_btn2',
				'type'       => 'text',
			) );
			$slider->add_field( array(
				'name'       => esc_html__( 'Button url 2', 'common' ),
				'desc'       => esc_html__( 'insert button text url here', 'common' ),
				'id'         => $prefix . 'em_slide_btn2url',
				'type'       => 'text_url',
			) );
			$slider->add_field( array(
				'name'    => esc_html__('Text Alignment Style','common'),
				'id'      => $prefix . 'em_slider_posi',
				'show_option_none' => true,					
				'type'    => 'select',
				'options' => array(
					'' => esc_html__( 'Select alignment', 'common' ),
					'text-left' => esc_html__( 'Left Alignment', 'common' ),
					'text-center' => esc_html__( 'Center Alignment', 'common' ),
					'text-right' => esc_html__( 'Right Alignment', 'common' ),
				),
				'default' =>'text-center',
			) );
			$slider->add_field( array(
				'name'       => esc_html__( 'Background Color', 'common' ),
				'desc'       => esc_html__( 'insert bg color here', 'common' ),
				'id'         => $prefix . 'em_slide_bg_color',
				'type'       => 'colorpicker',
			) );

			$slider->add_field( array(
				'name'    => esc_html__('Background Image','common'),
				'desc'       => esc_html__( 'Upload an image or enter an URL.', 'common' ),				
				'id'      => $prefix .'em_bg_image',
				'type'    => 'file',
			) );
			$slider->add_field( array(
				'name'       => esc_html__( 'Title Color', 'common' ),
				'desc'       => esc_html__( 'insert title color here', 'common' ),
				'id'         => $prefix . 'em_slide_title_color',
				'type'       => 'colorpicker',
			) );			
			$slider->add_field( array(
				'name'       => esc_html__( 'Sub Title Color', 'common' ),
				'desc'       => esc_html__( 'insert sub title color here', 'common' ),
				'id'         => $prefix . 'em_slide_subtitle_color',
				'type'       => 'colorpicker',
			) );
			$slider->add_field( array(
				'name'       => esc_html__( 'Highlight Text Color', 'common' ),
				'desc'       => esc_html__( 'insert sub title  highlight text color here', 'common' ),
				'id'         => $prefix . 'em_slide_highlight_color',
				'type'       => 'colorpicker',
			) );			
			$slider->add_field( array(
				'name'       => esc_html__( 'Content Color', 'common' ),
				'desc'       => esc_html__( 'insert content color here', 'common' ),
				'id'         => $prefix . 'em_slide_content_color',
				'type'       => 'colorpicker',
			) );	
	}
}


