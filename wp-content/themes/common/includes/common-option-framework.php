<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }


    // This is your option name where all the Redux data is stored.
    $opt_name = "common_opt";

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'submenu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => esc_html__( 'Theme Options', 'common' ),
        'page_title'           => esc_html__( 'Theme Options', 'common' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => false,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => false,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */



    /*
     *
     * ---> START SECTIONS
     *
     */

    /*

        As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for


     */


    // -> START Basic Fields
    Redux::setSection( $opt_name, array(
        'title'     => esc_html__('General', 'common'),
        'id'        => 'main_logo_id',
        'desc'      => esc_html__('Wellcome Our Theme Option', 'common'),
        'customizer_width' => '400px',
        'icon'      => 'el-icon-cog',
    ) );
	

	//total header area
     Redux::setSection( $opt_name, array(
        'title'     => esc_html__('Header area', 'common'),
        'id'        => 'common_header_area',
        'desc'      => esc_html__('Header options. All Menu OFF, It Show Default Menu', 'common'),
        'icon'      => 'el-icon-tasks',      
        'fields'    => array(
		
             array(
                    'id'        => 'common_header_display_none_hide',
                    'type'      => 'switch',
                    'title'     => esc_html__('All Header Hide', 'common'),
                    'default'   => false,
                ),		
             array(
                    'id'        => 'common_header_top_hide',
                    'type'      => 'switch',
                    'title'     => esc_html__('Header Top', 'common'),
                    'default'   => true,
                ),
				array(
                    'id'        => 'common_header_onepage_menu_hide',
                    'type'      => 'switch',
                    'title'     => esc_html__('Header One Page Menu', 'common'),
                    'default'   => false,
                ),
				array(
                    'id'        => 'common_header_trs_onep_menu_hide',
                    'type'      => 'switch',
                    'title'     => esc_html__('Header Transparent With One Page Menu', 'common'),
                    'default'   => false,
                ),					
				array(
                    'id'        => 'common_header_menu_hide',
                    'type'      => 'switch',
                    'title'     => esc_html__('Header Transparent Menu', 'common'),
                    'default'   => false,
                ),
				array(
                    'id'        => 'common_header_ts_menu_hide',
                    'type'      => 'switch',
                    'title'     => esc_html__('Header Transparent With Sticky Menu', 'common'),
                    'default'   => false,
                ),
				array(
                    'id'        => 'common_header_default_menu_hide',
                    'type'      => 'switch',
                    'title'     => esc_html__('Header Default Menu', 'common'),
                    'default'   => true,
                ),					
                array(
                    'id'        => 'common_box_layout',
                    'type'      => 'select',
                    'title'     => esc_html__('Select Top Header layout', 'common'),
                    'customizer_only'   => false,
                    'options'   => array(
                        'htopt_box' => esc_html__('Box Layout','common'),
                        'htopt_full' => esc_html__('Full Layout','common'),
                    ),
                    'default'   => 'htopt_box'
                ),
                array(
                    'id'        => 'common_main_box_layout',
                    'type'      => 'select',
                    'title'     => esc_html__('Select Header Menu layout', 'common'),
                    'customizer_only'   => false,
                    'options'   => array(
                        'hmenul_box' => esc_html__('Box Layout','common'),
                        'hmenu_full' => esc_html__('Full Layout','common'),
                    ),
                    'default'   => 'hmenul_box'
                ),

				
            )
        ));	
	
     //Header Top
    Redux::setSection( $opt_name, array(
        'title'     => esc_html__('Header Top Section', 'common'),
        'id'        => 'common_header_top',
        'desc'      => esc_html__('Insert header top info', 'common'),
		'icon'		=> 'el el-circle-arrow-right',
        'subsection' => true,     
        'fields'    => array(
                array(
                    'id'        => 'common_top_right_layout',
                    'type'      => 'select',
                    'title'     => esc_html__('Select Top Header Style', 'common'),
                    'customizer_only'   => false,
                    'options'   => array(
                        'h_top_l1' => esc_html__('Right Side Icon','common'),
                        'h_top_l2' => esc_html__('Wellcome Style 1','common'),
                        'h_top_l3' => esc_html__('Left Side Icon','common'),
                        'h_top_l4' => esc_html__('Wellcome Style 2','common'),
                        'h_top_l5' => esc_html__('Right Side Menu','common'),
                        'h_top_l6' => esc_html__('Left Side Menu','common'),
                        'h_top_l7' => esc_html__('Middle Social Icon','common'),
                    ),
                    'default'   => 'h_top_l1'
                ),				
				array(
                    'id'       => 'common_header_top_road',
                    'type'     => 'text',
                    'title'    => esc_html__('Address Name', 'common'),
                    'desc' => esc_html__('insert name ex:- house, road-4.', 'common'),
					'default'	=> esc_html__('1st Floor New World.', 'common'),
                ),		
                array(
                    'id'       => 'common_header_top_email',
                    'type'     => 'text',
                    'title'    => esc_html__('Email Number', 'common'),
                    'desc' => esc_html__('Insert email number', 'common'),
					'default'	=> esc_html__('youremail@common.com', 'common'),					
                ),		
                array(
                    'id'       => 'common_header_top_mobile',
                    'type'     => 'text',
                    'title'    => esc_html__('Phone Number', 'common'),
                    'desc' => esc_html__('Insert phone number', 'common'),
					'default'	=> esc_html__('+998556778345', 'common'),					
                ),
                array(
                    'id'       => 'common_header_top_wellcome',
                    'type'     => 'text',
                    'title'    => esc_html__('Wellcome Text', 'common'),
                    'desc' => esc_html__('Insert text', 'common'),
					'default'	=> esc_html__('wellcome visit our site', 'common'),					
                ),			
                array(								
                    'id'        => 'common_header_top_color',
                    'type'      => 'color',
                    'title'     => esc_html__('Address Text Color', 'common'),
                    'default'  => '',
					'output'    => array(
					'color' => '.top-address p a,
								.top-right-menu ul.social-icons li a,
								.top-address p span								
					')
                ),
                array(								
                    'id'        => 'common_header_top_hover_color',
                    'type'      => 'color',
                    'title'     => esc_html__('Address Text Hover Color', 'common'),
                    'default'  => '',
					'output'    => array(
					'color' => '.top-right-menu .social-icons li a:hover,
								.top-right-menu .social-icons li a i:hover,
								.top-address p a i,
								.top-address p span i
					')
                ),
                array(								
                    'id'        => 'common_header_top_well_color',
                    'type'      => 'color',
                    'title'     => esc_html__('Wellcome Text Color', 'common'),
                    'default'  => '',
					'output'    => array(
					'color' => '.top-welcome p'
					)
                ),
                array(								
                    'id'        => 'common_hoeder_top_bg_color',
                    'type'      => 'background',
                    'title'     => esc_html__('Header Top Section BG Color', 'common'),
                    'default'  => '',
                    'output'    => array('
						.common-header-top
					'),
					'default'  => array(
						'background-color' => '',
					)					
                ),							
				array(
					'id'             => 'common_header_top_section_spacing',
					'type'           => 'spacing',
					'output'         => array('.common-header-top'),
					'mode'           => 'padding',
					'units'          => array('em', 'px'),
					'units_extended' => 'false',
					'title'          => esc_html__('Padding Option', 'common'),
					'subtitle'       => esc_html__('Allow your users to choose the spacing padding they want.', 'common'),
					'desc'           => esc_html__('You can enable or disable any piece of this field. Top, Right, Bottom, Left, or Units.', 'common'),
					'default'            => array(
						'padding-top'     => '', 
						'padding-right'   => '', 
						'padding-bottom'  => '', 
						'padding-left'    => '',
						'units'          => 'px', 
					)
				),							
				
            ),
    ) );		
	
     //Header Logo
    Redux::setSection( $opt_name, array(
        'title'     => esc_html__('Header Logo', 'common'),
        'id'        => 'common_header_logo',
        'desc'      => esc_html__('Header Logo', 'common'),
		'icon'		=> 'el el-circle-arrow-right',
        'subsection' => true,     
        'fields'    => array( 
                array(
                    'id'        => 'common_logo',
                    'type'      => 'media',
                    'title'     => esc_html__('Default Logo', 'common'),
                    'compiler'  => 'true',
                    'mode'      => false,
                    'desc'      => esc_html__('Upload logo here.', 'common'),
                ),
                array(
                    'id'        => 'common_onepage_logo',
                    'type'      => 'media',
                    'title'     => esc_html__('One Page Menu Logo', 'common'),
                    'compiler'  => 'true',
                    'mode'      => false,
                    'desc'      => esc_html__('Upload logo here.', 'common'),
                ),
                array(
                    'id'        => 'common_ts_logo',
                    'type'      => 'media',
                    'title'     => esc_html__('Transparent Menu Logo', 'common'),
                    'compiler'  => 'true',
                    'mode'      => false,
                    'desc'      => esc_html__('Upload logo here.', 'common'),
                ),				
                array(
                    'id'        => 'common_logo_height',
                    'type'      => 'text',
                    'title'     => esc_html__('Logo Height', 'common'),
                    'mode'      => false,
                    'desc'      => esc_html__('Set height ex-100px', 'common'),
                ),	
                array(
                    'id'        => 'common_logo_widget',
                    'type'      => 'text',
                    'title'     => esc_html__('Logo Width', 'common'),
                    'mode'      => false,
                    'desc'      => esc_html__('Set Width ex-100px', 'common'),
                ),
                array(
                    'id'        => 'common_line_height',
                    'type'      => 'text',
                    'title'     => esc_html__('Create logo spacing massing', 'common'),
                    'mode'      => false,
                    'desc'      => esc_html__('Set number default-37px', 'common'),
					'default'   =>'37px',
                ),

                array(
                    'id'        => 'common_mobile_image_logo',
                    'type'      => 'media',
                    'title'     => esc_html__('Mobile Image Logo', 'common'),
                    'compiler'  => 'true',
                    'mode'      => false,
                    'desc'      => esc_html__('Upload logo here. recommend size:- 112x38px.', 'common'),
                ),					
				
				

				
            ),
    ) );

     //Header Menu
    Redux::setSection( $opt_name, array(
        'title'     => esc_html__('Header Menu', 'common'),
        'id'        => 'common_menu',
		'icon'		=> 'el el-circle-arrow-right',
        'subsection'=> true,      
        'fields'    => array(
                array(
                    'id'        => 'common_main_menu_layout',
                    'type'      => 'select',
                    'title'     => esc_html__('Select Header Menu Style', 'common'),
                    'customizer_only'   => false,
                    'options'   => array(
                        'm_menu_1' => esc_html__('Logo Left Style','common'),
                        'm_menu_2' => esc_html__('Logo Right Style','common'),
                        'm_menu_3' => esc_html__('Logo Top Style','common'),
                    ),
                    'default'   => 'm_menu_1'
                ),
                array(								
                    'id'        => 'common_menu_bg_color',
                    'type'      => 'background',
                    'title'     => esc_html__('Main Menu Section BG Color', 'common'),
                    'default'  => '',
                    'output'    => array('
						.common_nav_area,
						.common_nav_area, .mean-container .mean-bar
					'),
					'default'  => array(
						'background-color' => '',
					)					
                ),	
				
				array(
					'id'          => 'common_menu_typography',
					'type'        => 'typography', 
					'title'       => esc_html__('Menu Font style', 'common'),
					'google'      => true, 
					'font-backup' => true,
					'output'      => array('
						.common_menu > ul > li > a, .mean-container .mean-nav ul li a
					'),
					'line-height'   => false,
					'units'       =>'px',
					'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'common'),
					'default'     => array(
						'color'       => '', 
						'font-style'  => '', 
						'font-family' => '', 
						'google'      => true,
						'font-size'   => '', 
						'line-height' => ''
					),
				),
                array(								
                    'id'        => 'common_menu_tetxts_hover_color',
                    'type'      => 'color',
                    'title'     => esc_html__('Main Munu Hover Text Color', 'common'),
                    'default'  => '',
					'output'    => array(
					'color' => '
					.common_menu > ul > li:hover > a, .mean-container .mean-nav ul li a:hover
					'
					)
                ),	




                array(								
                    'id'        => 'common_menu_bg_sticky_color',
                    'type'      => 'color_rgba',
                    'title'     => esc_html__('Main Menu Sticky BG Color', 'common'),
					'default'   => array(
						'color'     => '#000000',
						'alpha'     => 1
					),
					'output'    => array(
					'background-color' => '
					.common_nav_area.prefix,
					.hbg2
					'
					)
                ),					
				
				
				
                array(								
                    'id'        => 'common_menu_sticky_text_color',
                    'type'      => 'color',
                    'title'     => esc_html__('Main Menu Sticky Text Color', 'common'),
                    'default'  => '',
					'output'    => array(
					'color' => '
					.common_nav_area.prefix .common_menu > ul > li > a,
					.hbg2 .common_menu > ul > li > a
					'
					)
                ),					
                array(								
                    'id'        => 'common_menu_text_hover_color',
                    'type'      => 'color',
                    'title'     => esc_html__('Main Menu Sticky Current Text Color', 'common'),
                    'default'  => '',
					'output'    => array(
					'color' => '
					.common_nav_area.prefix .common_menu > ul > li.current > a,
					.hbg2 .common_menu > ul > li.current > a
					
					'
					)
                ),	

				
                array(								
                    'id'        => 'common_submenu_bg_color',
                    'type'      => 'background',
                    'title'     => esc_html__('Sub Menu BG Color', 'common'),
                    'default'  => '',
                    'output'    => array('
						.common_menu ul .sub-menu
					'),
					'default'  => array(
						'background-color' => '',
					)					
                ),
				array(
					'id'          => 'common_sub_menu_typography',
					'type'        => 'typography', 
					'title'       => esc_html__('Sub Menu Font style', 'common'),
					'google'      => true, 
					'font-backup' => true,
					'output'      => array('
						.common_menu ul .sub-menu li a
					'),
					'units'       =>'px',
					'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'common'),
					'default'     => array(
						'color'       => '', 
						'font-style'  => '', 
						'font-family' => '', 
						'google'      => true,
						'font-size'   => '', 
						'line-height' => ''
					),
				),
				
                array(								
                    'id'        => 'common_submenu_hover_text_color',
                    'type'      => 'color',
                    'title'     => esc_html__('Sub Menu Hover Text Color', 'common'),
                    'default'  => '',
					'output'    => array(
					'color' => '
						.common_menu ul .sub-menu li:hover > a,
						.common_menu ul .sub-menu .sub-menu li:hover > a,
						.common_menu ul .sub-menu .sub-menu .sub-menu li:hover > a,
						.common_menu ul .sub-menu .sub-menu .sub-menu .sub-menu li:hover > a																'
					)
                ),				
				array(
					'id'             => 'menu_spacing',
					'type'           => 'spacing',
					'output'         => array('.common_nav_area'),
					'mode'           => 'padding',
					'units'          => array('em', 'px'),
					'units_extended' => 'false',
					'title'          => esc_html__('Section Padding Option', 'common'),
					'subtitle'       => esc_html__('Allow your users to choose the spacing or padding they want.', 'common'),
					'desc'           => esc_html__('You can enable or disable any piece of this field. Top, Right, Bottom, Left, or Units.', 'common'),
					'default'            => array(
						'padding-top'     => '', 
						'padding-right'   => '', 
						'padding-bottom'  => '', 
						'padding-left'    => '',
						'units'          => 'px', 
					)
				),
					
            ),
    ) );

/*========================
END common HEADER FIELD
=========================*/



/*========================
common BREADCRUMB FIELD
=========================*/
    Redux::setSection( $opt_name, array(
         'title'     => esc_html__('Breadcrumb Area', 'common'),
        'id'         => 'common_bread_page',  
        'icon'       => 'el-icon-picture',
        'fields'    => array(
    array(
     'id'   => 'info_normal',
     'type' => 'info',
     'desc' => esc_html__('Notice:- If you want to more breadrucmb control. Please see every page bottom area. We Added More Field Here','common')
    ),    
	array(
		'id'        => 'common_breadcrumb_bg',
		'type'      => 'background',
		'output'    => array('.breadcumb-area,.breadcumb-blog-area'),
		'title'     => esc_html__('Breadcrumb Background', 'common'),
		'subtitle'  => esc_html__('Breadcrumb background with image, color.', 'common'),
		'default'  => array(
			'background-color' => '',
		)
	),
	array(        
		'id'        => 'common_bread_title_page_color',
		'type'      => 'color',
		'title'     => esc_html__('Breadcrumb Title Color', 'common'),
		'default'  => '',
		'output'    => array(
			'color' => '.brpt h2,.breadcumb-inner h2'
		)
    ),     
    array(
     'id'          => 'common_breadcrumb_typography',
     'type'        => 'typography', 
     'title'       => esc_html__('Breadcrumb Text And Font style', 'common'),
     'google'      => true, 
     'font-backup' => true,
     'line-height'   => false,
     'text-align'   => false,
     'output'      => array('
      .breadcumb-inner ul,     
      .breadcumb-inner li,
      .breadcumb-inner li a      
     '),
     'units'       =>'px',
     'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'common'),
     'default'     => array(
				  'color'       => '', 
				  'font-style'  => '', 
				  'font-family' => '', 
				  'google'      => true,
				  'font-size'   => '', 
				 ),
	),
	array(        
		'id'        => 'common_bread_current_page_color',
		'type'      => 'color',
		'title'     => esc_html__('Breadcrumb Current Text Color', 'common'),
		'default'  => '',
		'output'    => array(
			'color' => '.breadcumb-inner li:nth-last-child(-n+2)'
		)
	),     
    array(
     'id'             => 'spacing',
     'type'           => 'spacing',
     'output'         => array('.breadcumb-area'),
     'mode'           => 'padding',
     'units'          => array('em', 'px'),
     'units_extended' => 'false',
     'title'          => esc_html__('Padding/Margin Option', 'common'),
     'subtitle'       => esc_html__('Allow your users to choose the spacing or margin they want.', 'common'),
     'desc'           => esc_html__('You can enable or disable any piece of this field. Top, Right, Bottom, Left, or Units.', 'common'),
     'default'            => array(
      'padding-top'     => '', 
      'padding-right'   => '', 
      'padding-bottom'  => '', 
      'padding-left'    => '',
      'units'          => 'px', 
     )
    ),    
        
            ),
    ) );
/*========================
END common BREADCRUMB FIELD
=========================*/


/*========================
common Typography FIELD
=========================*/
    Redux::setSection( $opt_name, array(
         'title'     => esc_html__('Typography Area', 'common'),
        'id'         => 'common_tyfo_page',  
        'icon'       => 'el-icon-picture',
        'fields'    => array(				
			
				array(
					'id'          => 'common_body_typography',
					'type'        => 'typography', 
					'title'       => esc_html__('Body Typography Style', 'common'),
					'google'      => true, 
					'font-backup' => true,
					'line-height'   => false,
					'font-style'  => false, 
					'output'      => array('
						body,p						
					'),
					'units'       =>'px',
					'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'common'),
					'default'     => array(
						'color'       => '', 						
						'font-family' => '', 
						'google'      => true,
						'font-size'   => '',						
					),
				),
				array(
					'id'          => 'common_heading_typography',
					'type'        => 'typography', 
					'title'       => esc_html__('Heading Typography Style', 'common'),
					'google'      => true, 
					'font-backup' => true,
					'line-height'   => false,
					'font-style'  => false, 					
					'output'      => array('
						h1, h2, h3, h4, h5, h6					
					'),
					'units'       =>'px',
					'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'common'),
					'default'     => array(
						'color'       => '', 
						'font-family' => '', 
						'google'      => true,
						'font-size'   => '',						
					),
				),

				
								
            ),
    ) );
	
/*========================
END common Typography FIELD
=========================*/




/*========================
common Theme Color FIELD
=========================*/
    Redux::setSection( $opt_name, array(
         'title'     => esc_html__('Theme Colors', 'common'),
        'id'         => 'theme_colors',  
        'icon'       => 'el-icon-picture',
        'fields'    => array(				
			
                array(								
                    'id'        => 'btn_p',
                    'type'      => 'color',
                    'title'     => esc_html__('Button Primary Text Color', 'common'),
                    'default'  => '',
					'output'    => array(
					'color' => '
					
					.em-slider-button a,
					.home-2 .sbuton,
					.portfolio_nav ul li.current_menu_item,
					.active .price span,
					.active .order_now a,
					.footer-middle .mc4wp-form-fields p:nth-child(3) input
					
					'
					)
                ),	
                array(								
                    'id'        => 'btn_p_bg',
                    'type'      => 'color',
                    'title'     => esc_html__('Button Primary BG Color', 'common'),
                    'default'  => '',
					'output'    => array(
					'background-color' => '
					.em-slider-button a.sbtn-left,
					.home-2 .sbuton,
					.portfolio_nav ul li.current_menu_item,
					.active .order_now a,
					.active .price,
					.footer-middle .mc4wp-form-fields p:nth-child(3) input					
					'
					)
                ),	
                array(								
                    'id'        => 'btn_p_br',
                    'type'      => 'color',
                    'title'     => esc_html__('Button Primary Border Color', 'common'),
                    'default'  => '',
					'output'    => array(
					'border-color' => '
					.em-slider-button a.sbtn-left,
					.home-2 .sbuton,
					.portfolio_nav ul li.current_menu_item,
					.active .order_now a,
					.footer-middle .mc4wp-form-fields p:nth-child(3) input						
					'
					)
                ),
				
                array(								
                    'id'        => 'btn_p_hover_text',
                    'type'      => 'color',
                    'title'     => esc_html__('Button Primary Hover Text Color', 'common'),
                    'default'  => '',
					'output'    => array(
					'color' => '				
					.em-slider-button a:hover,
					.portfolio_nav ul li:hover,
					.single_pricing:hover .price span,
					.single_pricing:hover .order_now a,
					.home-2 .sbuton:hover,
					input[type="button"]:hover, input[type="submit"]:hover, button:hover,
					.footer-middle .mc4wp-form-fields p:nth-child(3) input:hover
					
					
					'
					)
                ),
                array(								
                    'id'        => 'btn_p_bgh',
                    'type'      => 'color',
                    'title'     => esc_html__('Button Primary BG Hover Color', 'common'),
                    'default'  => '',
					'output'    => array(
					'background-color' => '
					.em-slider-button a:hover,
					.portfolio_nav ul li:hover,
					.single_pricing:hover .price,
					.single_pricing:hover .order_now a,
					.home-2 .sbuton:hover,
					input[type="button"]:hover, input[type="submit"]:hover, button:hover,
					.footer-middle .mc4wp-form-fields p:nth-child(3) input:hover						
					
					',
					'border-color' => '
					.em-slider-button a:hover,
					.portfolio_nav ul li:hover,
					.portfolio_nav ul li.current_menu_item,
					.single_pricing:hover .price span,
					.single_pricing:hover .order_now a,
					.home-2 .sbuton:hover,
					input[type="button"]:hover, input[type="submit"]:hover, button:hover,
					.footer-middle .mc4wp-form-fields p:nth-child(3) input:hover
					
					'
					)
                ),
				// second btn
                array(								
                    'id'        => 'btn_s',
                    'type'      => 'color',
                    'title'     => esc_html__('Button Second Text Color', 'common'),
                    'default'  => '',
					'output'    => array(
					'color' => '
					.em-slider-button a.sbtn-right
					',
					'border-color' => '
					.em-slider-button a.sbtn-right
					'					
					)
                ),	
                array(								
                    'id'        => 'btn_s_hover_text',
                    'type'      => 'color',
                    'title'     => esc_html__('Button Second Hover Text Color', 'common'),
                    'default'  => '',
					'output'    => array(
					'color' => '
					.em-slider-button a.sbtn-right:hover
					'
					)
                ),
                array(								
                    'id'        => 'btn_s_bgh',
                    'type'      => 'color',
                    'title'     => esc_html__('Button Second BG Hover Color', 'common'),
                    'default'  => '',
					'output'    => array(
					'background-color' => '
					.em-slider-button a.sbtn-right:hover
					',
					'border-color' => '
					.em-slider-button a.sbtn-right:hover
					'
					)
                ),
				// theme brand color

                array(								
                    'id'        => 'theme_brand_color',
                    'type'      => 'color',
                    'title'     => esc_html__('Theme Brand Text Color', 'common'),
                    'default'  => '',
					'output'    => array(
					'color' => '
					.curosel-style-slider .owl-nav div,
					.curosel-style .owl-nav div
					
					',
					'border-color' => '
					.curosel-style-slider .owl-nav div,
					.curosel-style .owl-nav div
					'
					)
                ),

                array(								
                    'id'        => 'theme_brand_bg_color',
                    'type'      => 'color',
                    'title'     => esc_html__('Theme Brand BG Color', 'common'),
                    'default'  => '',
					'output'    => array(
					'background-color' => '
					#scrollUp
					
					'
					)
                ),	

                array(								
                    'id'        => 'theme_brand_hv_color',
                    'type'      => 'color',
                    'title'     => esc_html__('Theme Brand Hover Text Color', 'common'),
                    'default'  => '',
					'output'    => array(
					'color' => '
					
					.blog-content h2 a:hover
					
					'
					)
                ),

                array(								
                    'id'        => 'theme_brand_bg_hv_color',
                    'type'      => 'color',
                    'title'     => esc_html__('Theme Brand Hover BG Color', 'common'),
                    'default'  => '',
					'output'    => array(
					'background-color' => '
					.curosel-style-slider .owl-nav .owl-next:hover,
					.curosel-style-slider .owl-nav .owl-prev:hover,
					.curosel-style .owl-nav .owl-next:hover,
					.curosel-style .owl-nav .owl-prev:hover,
					.picon a:hover,
					.team_social_icon a:hover
					',
					'border-color' => '
						.brand_thumb a:hover img,
						.curosel-style-slider .owl-nav div:hover,
						.curosel-style .owl-nav .owl-next:hover,
						.curosel-style .owl-nav .owl-prev:hover
					'					
					)
                ),	

                array(								
                    'id'        => 'section_title_hl_color',
                    'type'      => 'color',
                    'title'     => esc_html__('Section Title Highlight Color', 'common'),
                    'default'  => '',
					'output'    => array(
					'color' => '.section-title .heading span'
					)
                ),					
				
				
				
            ),
    ) );
	
/*========================
END common Typography FIELD
=========================*/






/*========================
common BLOG FIELD
=========================*/
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Blog Area', 'common' ),
        'id'          => 'common_blog_section_area',
		'icon'		=> 'el el-circle-arrow-right',
        'fields'     => array(
                array(
                    'id'        => 'common_blog_bgcolor',
                    'type'      => 'background',
                    'output'    => array('.common-single-blog'),
                    'title'     => esc_html__('Blog Item BG Color', 'common'),
                    'subtitle'  => esc_html__('BG color', 'common'),
                    'default'  => array(
                        'background-color' => '',
                    )
                ),

                array(								
                    'id'        => 'common_blog_title_color',
                    'type'      => 'color',
                    'title'     => esc_html__('Blog Title Color', 'common'),
                    'default'  => '',
					'output'    => array(
					'color' => '
.blog-content h1, .blog-content h2, .blog-content h3, .blog-content h4, .blog-content h5, .blog-content h6,					
.single-blog-content h1, .single-blog-content h2, .single-blog-content h3, .single-blog-content h4, .single-blog-content h5, .single-blog-content h6,
.blog-content h2 a					
					')
                ),	
                array(								
                    'id'        => 'common_blog_title_hover_color',
                    'type'      => 'color',
                    'title'     => esc_html__('Blog Title Hover Color', 'common'),
                    'default'  => '',
					'output'    => array(
					'color' => '
					.blog-content h2 a:hover
					')
                ),													
                array(
                    'id'        => 'common_blog_widget_bgcolor',
                    'type'      => 'background',
                    'output'    => array('.blog-left-side.widget > div'),
                    'title'     => esc_html__('Blog Sidebar BG Color', 'common'),
                    'subtitle'  => esc_html__('BG color', 'common'),
                    'default'  => array(
                        'background-color' => '',
                    )
                ),
				 array(	
                    'id'        => 'common_sidebar_widgett_text_color',
                    'type'      => 'color',
                    'title'     => esc_html__('Sidebar Title Text Color', 'common'),
                    'default'  => '',
					'output'    => array(
						'color' => '.blog-left-side .widget h2'
					)
                ),
                array(								
                    'id'        => 'common_sidebar_widget_li_color',
                    'type'      => 'color',
                    'title'     => esc_html__('Sidebar Text Color', 'common'),
                    'default'  => '',
					'output'    => array(
						'color' => '
							.blog-left-side .widget ul li,
							.blog-left-side .widget ul li a,
							.blog-left-side .widget ul li::before,
							.tagcloud a,
							caption,
							table,
							 table td a,
							cite,
							.rssSummary,
							span.rss-date,
							span.comment-author-link,
							.textwidget p,
							.widget .screen-reader-text
						')
                ),	
                array(								
                    'id'        => 'common_sidebar_widget_li_hover_color',
                    'type'      => 'color',
                    'title'     => esc_html__('Sidebar Text Hover Color', 'common'),
                    'default'  => '',
					'output'    => array(
						'color' => '
							.blog-left-side .widget ul li a:hover,
							.blog-left-side .widget ul li:hover::before
						')
                ),					
                array(								
                    'id'        => 'common_blog_social_icon_color',
                    'type'      => 'color',
                    'title'     => esc_html__('Single Blog Social Icon Color', 'common'),
                    'default'  => '',
					'output'    => array(
					'color' => '.common-single-icon-inner a',
					'border-color' => '.common-single-icon-inner a',
					)
                ),
				array(								
                    'id'        => 'common_blog_social_hover_color',
                    'type'      => 'color',
                    'title'     => esc_html__('Single Blog Social Icon Hover Color', 'common'),
                    'default'  => '',
					'output'    => array(
					'background-color' => '.common-single-icon-inner a:hover',
					'border-color' => '.common-single-icon-inner a:hover',
					)
                ),
				
				array(								
                    'id'        => 'common_blog_pagina_color',
                    'type'      => 'color',
                    'title'     => esc_html__('Pagination Text Color', 'common'),
                    'default'  => '',
					'output'    => array(
					'color' => '.paginations a',
					'border-color' => '.paginations a',
					)
                ),				
				
				array(								
                    'id'        => 'common_blog_pagina_hover_color',
                    'type'      => 'color',
                    'title'     => esc_html__('Pagination Hover Color', 'common'),
                    'default'  => '',
					'output'    => array(
					'background-color' => '.paginations a:hover, .paginations a.current, .page-numbers span.current',
					'border-color' => '.paginations a:hover, .paginations a.current, .page-numbers span.current',
					)
                ),					
				
				
				
            )
    ) );		
/*========================
END common BLOG FIELD
=========================*/
	 
/*========================
common 404 FIELD
=========================*/	 

    Redux::setSection( $opt_name, array(
         'title'     => esc_html__('404 Area', 'common'),
        'id'         => 'common_error_page',  
        'desc'       => esc_html__('Use this section to upload background images, select background color', 'common'),
        'icon'       => 'el-icon-picture',
        'fields'    => array(
                array(
                    'id'        => 'common_background_404',
                    'type'      => 'background',
                    'output'    => array('.not-found-area'),
                    'title'     => esc_html__('404 Page Background Color', 'common'),
                    'subtitle'  => esc_html__('404 background with image, color.', 'common'),
                    'default'  => array(
                        'background-color' => '',
                    )
                ),
                array(								
                    'id'        => 'common_not_title',
                    'type'      => 'color',
                    'title'     => esc_html__('Title Color', 'common'),
                    'default'  => '',
					'output'    => array(
					'color' => '.not-found-inner h2,.not-found-inner'
					)
                ),	
                array(								
                    'id'        => 'common_sub_not_title',
                    'type'      => 'color',
                    'title'     => esc_html__('Sub Title Color', 'common'),
                    'default'  => '',
					'output'    => array(
					'color' => '.not-found-inner p,.not-found-inner strong'
					)
                ),
                array(								
                    'id'        => 'common_not_link_color',
                    'type'      => 'color',
                    'title'     => esc_html__('Retrun Link Color', 'common'),
                    'default'  => '',
					'output'    => array(
					'color' => '.not-found-inner a'
					)
                ),					
                array(
                    'id'        => '404_info',
                    'type'      => 'editor',
                    'title'     => esc_html__('404 Information', 'common'),
                    'subtitle'  => esc_html__('HTML tags allowed: a, br, em, strong', 'common'),
                    'default'   => esc_html__('404 Oops! The page you are Looking for does not exist. ', 'common'),
                ), 
				array(
					'id'             => 'common_notfound_spacing',
					'type'           => 'spacing',
					'output'         => array('.not-found-area'),
					'mode'           => 'padding',
					'units'          => array('em', 'px'),
					'units_extended' => 'false',
					'title'          => esc_html__('Section Padding Option', 'common'),
					'subtitle'       => esc_html__('Allow your users to choose the spacing or padding they want.', 'common'),
					'desc'           => esc_html__('You can enable or disable any piece of this field. Top, Right, Bottom, Left, or Units.', 'common'),
					'default'            => array(
						'padding-top'     => '', 
						'padding-right'   => '', 
						'padding-bottom'  => '', 
						'padding-left'    => '',
						'units'          => 'px', 
					)
				),

				
            ),
    ) );


/*========================
END common NOT FOUND FIELD
=========================*/	 
	
/*========================
common FOOTER FIELD
=========================*/	 
	
      //Footer area
    Redux::setSection( $opt_name, array(
        'title'     => esc_html__('Footer Area', 'common'),
        'id'        => 'footer_area_id',
        'desc'      => esc_html__('Insert style for top address area', 'common'),
        'icon'      => 'el-icon-cog',
        'fields'    => array(      
				 array(
                    'id'       => 'common_address_hide',
                    'type'     => 'switch',
                    'title'    => esc_html__('Footer Address Section Show/Hide', 'common'),
                    'default'  => false,
                ),
				array(
                    'id'       => 'common_social_hide',
                    'type'     => 'switch',
                    'title'    => esc_html__('Social Section Show/Hide', 'common'),
                    'default'  => false,
                ),
                 array(
                    'id'       => 'common_widget_hide',
                    'type'     => 'switch',
                    'title'    => esc_html__('Widget Section Hide/show', 'common'),
                    'default'  => true,
                ),				
				array(
                    'id'       => 'common_copyright_hide',
                    'type'     => 'switch',
                    'title'    => esc_html__('Copyright Section Show/Hide', 'common'),
                    'default'  => true,
                ),
                array(
                    'id'        => 'common_footer_box_layout',
                    'type'      => 'select',
                    'title'     => esc_html__('Select Footer layout', 'common'),
                    'customizer_only'   => false,
                    'options'   => array(
                        'footer_box' => esc_html__('Box Layout','common'),
                        'footer_full' => esc_html__('Full Layout','common'),
                    ),
                    'default'   => 'footer_box'
                ),				
				
				
				
            )
    ) );

	 //footer Address Section 
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Footer Address Section', 'common' ),
        'id'          => 'common_address_section',
        'subsection' => true,
		'icon'		=> 'el el-circle-arrow-right',
        'fields'     => array(
		
                array(
                    'id'        => 'common_address_logo_style',
                    'type'      => 'select',
                    'title'     => esc_html__('Select Logo Style', 'common'),
                    'customizer_only'   => false,
                    'options'   => array(
                        's_logo_s1' => esc_html__('Show Text Logo','common'),
                        's_logo_s2' => esc_html__('Show Image Logo','common'),
                    ),
                    'default'   => 's_logo_s1'
                ),				
						
                array(
                    'id'        => 'common_address_title_text',
                    'type'      => 'text',
                    'title'     => esc_html__('Address Title Text Logo', 'common'),
                    'default'   => esc_html__('C<span>O</span>M<span>M</span>O<span>N</span>', 'common'),
                ),
                array(
                    'id'        => 'common_address_logo',
                    'type'      => 'media',
                    'title'     => esc_html__('Address Image Logo', 'common'),
                    'compiler'  => 'true',
                    'mode'      => false,
                    'desc'      => esc_html__('Upload logo here. recommend size:- 220x50px. Notice:- If you upload this logo, Title text logo will be hide ', 'common'),
                ),			
                array(
                    'id'       => 'common_address_road',
                    'type'     => 'text',
                    'title'    => esc_html__('Address Area Name', 'common'),
                    'desc' => esc_html__('insert area name ex:- house, road-4.', 'common'),
					'default'	=> esc_html__('1st Floor New World Tower Rang.', 'common'),
                ),		
                array(
                    'id'       => 'common_address_email',
                    'type'     => 'text',
                    'title'    => esc_html__('Email Number', 'common'),
                    'desc' => esc_html__('Insert email number', 'common'),
					'default'	=> esc_html__('youremail@common.com', 'common'),					
                ),		
                array(
                    'id'       => 'common_address_mobile',
                    'type'     => 'text',
                    'title'    => esc_html__('Phone Number', 'common'),
                    'desc' => esc_html__('Insert phone number', 'common'),
					'default'	=> esc_html__('+998 556 778 345', 'common'),					
                ),			
                array(								
                    'id'        => 'common_address_title_text_color',
                    'type'      => 'color',
                    'title'     => esc_html__('Address Title Text Color', 'common'),
                    'default'  => '',
					'output'    => array(
					'color' => '.footer-top-address h2'
					)
                ),
                array(								
                    'id'        => 'common_address_title2_text_color',
                    'type'      => 'color',
                    'title'     => esc_html__('Address Title Text Color 2', 'common'),
                    'default'  => '',
					'output'    => array(
					'color' => '.footer-top-address h2 span'
					)
                ),				
                array(								
                    'id'        => 'common_address_text_color',
                    'type'      => 'color',
                    'title'     => esc_html__('Address Text Color', 'common'),
                    'default'  => '',
					'output'    => array(
					'color' => '.top_address_content a'
					)
                ),				
                array(								
                    'id'        => 'common_address_bg_color',
                    'type'      => 'background',
                    'title'     => esc_html__('Address Section BG Color', 'common'),
                    'default'  => '',
                    'output'    => array('
						.top-address-area
					'),
					'default'  => array(
						'background-color' => '',
					)					
                ),							
				array(
					'id'             => 'common_address_section_spacing',
					'type'           => 'spacing',
					'output'         => array('.top-address-area'),
					'mode'           => 'padding',
					'units'          => array('em', 'px'),
					'units_extended' => 'false',
					'title'          => esc_html__('Padding Option', 'common'),
					'subtitle'       => esc_html__('Allow your users to choose the spacing padding they want.', 'common'),
					'desc'           => esc_html__('You can enable or disable any piece of this field. Top, Right, Bottom, Left, or Units.', 'common'),
					'default'            => array(
						'padding-top'     => '', 
						'padding-right'   => '', 
						'padding-bottom'  => '', 
						'padding-left'    => '',
						'units'          => 'px', 
					)
				),						
            )
    ) );
    //footer social section
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( ' Footer Social Section', 'common' ),
        'id'         => 'common_social_section',
		'icon'		=> 'el el-circle-arrow-right',
        'subsection' => true,
        'fields'     => array(
                array(
                    'id'        => 'common_social_logo_style',
                    'type'      => 'select',
                    'title'     => esc_html__('Select Logo Style', 'common'),
                    'customizer_only'   => false,
                    'options'   => array(
                        's_logo_s1' => esc_html__('Show Text Logo','common'),
                        's_logo_s2' => esc_html__('Show Image Logo','common'),
                    ),
                    'default'   => 's_logo_s1'
                ),				
						
                array(
                    'id'        => 'common_social_title_text',
                    'type'      => 'text',
                    'title'     => esc_html__('Social Title Text Logo', 'common'),
                    'default'   => esc_html__('C<span>O</span>M<span>M</span>O<span>N</span>', 'common'),
                ),
                array(
                    'id'        => 'common_social_logo',
                    'type'      => 'media',
                    'title'     => esc_html__('Social Image Logo', 'common'),
                    'compiler'  => 'true',
                    'mode'      => false,
                    'desc'      => esc_html__('Upload logo here. recommend size:- 220x50px. Notice:- If you upload this logo, Title text logo will be hide ', 'common'),
                ),				
                array(
                    'id'        => 'common_social_text',
                    'type'      => 'editor',
                    'title'     => esc_html__('Social information', 'common'),
                    'default'	=> esc_html__('Praesent ornare ipsum at nulla pulvinar, imperdiet hendrerit suscipit Praesent ornare ipsum at nulla pulvinar, imperdiet hendrerit dui suscipit Praesent ornare m. a. hossain' , 'common'),
                    'args'      => array(
                        'teeny'            => true,
                        'textarea_rows'    => 5,
                        'media_buttons' => false,
                    )
                ),		
                array(
                    'id'       => 'common_social_icons',
                    'type'     => 'sortable',
                    'title'    => esc_html__('Insert Social Icons', 'common'),
                    'subtitle' => esc_html__('Enter social links', 'common'),
                    'desc'     => esc_html__('Drag/drop to re-arrange', 'common'),
                    'mode'     => 'text',
					'label'    => true,
                    'options'  => array(        
                        'facebook'     => '',
                        'twitter'      => '',
                        'instagram'    => '',
                        'tumblr'       => '',
                        'pinterest'    => '',
                        'google-plus'  => '',
                        'linkedin'     => '',
                        'behance'      => '',
                        'dribbble'     => '',
                        'youtube'      => '',
                        'vimeo'        => '',
                        'rss'          => '',
                    ),
					'default' => array(
						'facebook'     => 'https://www.facebook.com/',
						'twitter'     => 'https://twitter.com/',
						'instagram'	=> 'https://instagram.com/',
						'tumblr'     => '',
						'pinterest'     => '',
						'google-plus'     => 'https://plus.google.com/',
						'linkedin'     => '',
						'behance'     => '',
						'dribbble'     => 'https://dribbble.com/',
						'youtube'     => '',
						'vimeo'     => '',
						'rss'     => '',
					),
                ),
                array(								
                    'id'        => 'common_social_title_text_color',
                    'type'      => 'color',
                    'title'     => esc_html__('Social Title Text Color', 'common'),
                    'default'  => '',
					'output'    => array(
					'color' => '.footer-top-inner h2'
					)
                ),
                array(								
                    'id'        => 'common_social_title2_text_color',
                    'type'      => 'color',
                    'title'     => esc_html__('Social Title Text Color 2', 'common'),
                    'default'  => '',
					'output'    => array(
					'color' => '.footer-top-inner h2 span'
					)
                ),				
                array(								
                    'id'        => 'common_social_text_color',
                    'type'      => 'color',
                    'title'     => esc_html__('Social Text Color', 'common'),
                    'default'  => '',
					'output'    => array(
					'color' => '.footer-top-inner p'
					)
                ),
                array(								
                    'id'        => 'common_social_icon_color',
                    'type'      => 'color',
                    'title'     => esc_html__('Social Icon Color', 'common'),
                    'default'  => '',
					'output'    => array(
					'color' => '.footer-social-icon a i',
					'border-color' => '.footer-social-icon a i',
					)
                ),					
                array(								
                    'id'        => 'common_social_bg_color',
                    'type'      => 'background',
                    'title'     => esc_html__('Social Section BG Color', 'common'),
                    'default'  => '',
                    'output'    => array('
						.footer-top
					'),
					'default'  => array(
						'background-color' => '',
					)					
                ),							
				array(
					'id'             => 'common_social_section_spacing',
					'type'           => 'spacing',
					'output'         => array('.footer-top'),
					'mode'           => 'padding',
					'units'          => array('em', 'px'),
					'units_extended' => 'false',
					'title'          => esc_html__('Padding Option', 'common'),
					'subtitle'       => esc_html__('Allow your users to choose the spacing padding they want.', 'common'),
					'desc'           => esc_html__('You can enable or disable any piece of this field. Top, Right, Bottom, Left, or Units.', 'common'),
					'default'            => array(
						'padding-top'     => '', 
						'padding-right'   => '', 
						'padding-bottom'  => '', 
						'padding-left'    => '',
						'units'          => 'px', 
					)
				),					
				
            )
    ) );
	 // footer widget area 
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Footer Widget Section', 'common' ),
        'id'          => 'common_widget_section',
        'subsection' => true,
		'icon'		=> 'el el-circle-arrow-right',
        'fields'     => array(
                array(
                    'id'        => 'common_widget_column_count',
                    'type'      => 'select',
                    'title'     => esc_html__('Widget Column Count', 'common'),
                    'customizer_only'   => false,
                    'options'   => array(
                        '1' => esc_html__('Column 1','common'),
                        '2' => esc_html__('Column 2','common'),
                        '3' => esc_html__('Column 3','common'),
                        '4' => esc_html__('Column 4','common'),
                        '6' => esc_html__('Column 6','common'),
                    ),
                    'default'   =>'4'
                ),		
				 array(	
                    'id'        => 'common_widgett_text_color',
                    'type'      => 'color',
                    'title'     => esc_html__('Widget Title Text Color', 'common'),
                    'default'  => '',
					'output'    => array(
						'color' => '.footer-middle .widget h5'
					)
                ),
                array(								
                    'id'        => 'common_copyright_widget_li_color',
                    'type'      => 'color',
                    'title'     => esc_html__('Widget Text Color', 'common'),
                    'default'  => '',
					'output'    => array(
						'color' => '
							.footer-middle .widget ul li,
							.footer-middle .widget ul li a,
							.footer-middle .widget ul li::before,
							.footer-middle .tagcloud a,
							.footer-middle caption,
							.footer-middle table,
							.footer-middle table td a,
							.footer-middle cite,
							.footer-middle .rssSummary,
							.footer-middle span.rss-date,
							.footer-middle span.comment-author-link,
							.footer-middle .textwidget p,
							.footer-middle .widget .screen-reader-text,
							mc4wp-form-fields p,
							.mc4wp-form-fields,
							.footer-m-address p,
							.footer-m-address
						')
                ),	
                array(								
                    'id'        => 'common_copyright_widget_li_hover_color',
                    'type'      => 'color',
                    'title'     => esc_html__('Widget Text Hover Color', 'common'),
                    'default'  => '',
					'output'    => array(
						'color' => '
							.footer-middle .widget ul li a:hover,
							.footer-middle .widget ul li:hover::before,
							.footer-middle .sub-menu li a:hover, 
							.footer-middle .nav .children li a:hover,
							#today
						')
                ),		
                array(								
                    'id'        => 'common_widget_bg_color',
                    'type'      => 'background',
                    'title'     => esc_html__('Widget Section BG Color', 'common'),
                    'default'  => '',
                    'output'    => array('
									.footer-middle
								'),
					'default'  => array(
						'background-color' => '',
					)					
                ),	
				array(
					'id'             => 'common_widget_section_spacing',
					'type'           => 'spacing',
					'output'         => array('.footer-middle'),
					'mode'           => 'padding',
					'units'          => array('em', 'px'),
					'units_extended' => 'false',
					'title'          => esc_html__('Padding Option', 'common'),
					'subtitle'       => esc_html__('Allow your users to choose the spacing padding they want.', 'common'),
					'desc'           => esc_html__('You can enable or disable any piece of this field. Top, Right, Bottom, Left, or Units.', 'common'),
					'default'            => array(
						'padding-top'     => '', 
						'padding-right'   => '', 
						'padding-bottom'  => '', 
						'padding-left'    => '',
						'units'          => 'px', 
					)
				),
				
            )
    ) );	
    //footer copyright text
    Redux::setSection( $opt_name, array(
        'title'     => esc_html__('Footer Copyright Info', 'common'),
        'id'        => 'common_copyright',
        'desc'      => esc_html__('Insert your copyright style', 'common'),
		'icon'		=> 'el el-circle-arrow-right',
        'subsection' => true,
        'fields'    => array(
                array(
                    'id'        => 'common_footer_copyright_style',
                    'type'      => 'select',
                    'title'     => esc_html__('Copyright Style Layout', 'common'),
                    'customizer_only'   => false,
                    'options'   => array(
                        'copy_s1' => esc_html__('Copyright Style 1','common'),
                        'copy_s2' => esc_html__('Copyright Style 2','common'),
                        'copy_s3' => esc_html__('Copyright Style 3','common'),
                        'copy_s4' => esc_html__('Copyright Style 4','common'),
                    ),
                    'default'   => 'copy_s2'
                ),		
                array(
                    'id'        => 'common_copyright_text',
                    'type'      => 'editor',
                    'title'     => esc_html__('Copyright information', 'common'),
                    'subtitle'  => esc_html__('HTML tags allowed: a, br, em, strong', 'common'),
                    'default'	=> esc_html__('Copyright' , 'common'). " &copy; <a href='".esc_url('tradetheme.com', 'common')."' target='_blank'>'".esc_html__('common' , 'common')."'</a> ".esc_html__('All Rights Reserved.' , 'common'),
                    'args'      => array(
                        'teeny'            => true,
                        'textarea_rows'    => 5,
                        'media_buttons' => false,
                    )
                ),
                array(								
                    'id'        => 'common_copyright_text_color',
                    'type'      => 'color',
                    'title'     => esc_html__('Copyright Text Color', 'common'),
                    'default'  => '',
					'output'    => array(
					'color' => '.copy-right-text p,.footer-menu ul li a'
					)
                ),
                array(								
                    'id'        => 'common_copyright_text_hover_color',
                    'type'      => 'color',
                    'title'     => esc_html__('Copyright Text Hover Color', 'common'),
                    'default'  => '',
					'output'    => array(
					'color' => '.copy-right-text a, .footer-menu ul li a:hover'
					)
                ),				
                array(								
                    'id'        => 'common_copyright_bg_color',
                    'type'      => 'background',
                    'title'     => esc_html__('Copyright Section BG Color', 'common'),
                    'default'  => '',
                    'output'    => array('
					.footer-bottom
					'),
					'default'  => array(
						'background-color' => '',
					)					
                ),						
				
				array(
					'id'             => 'common_copyright_section_spacing',
					'type'           => 'spacing',
					'output'         => array('.footer-bottom'),
					'mode'           => 'padding',
					'units'          => array('em', 'px'),
					'units_extended' => 'false',
					'title'          => esc_html__('Padding Option', 'common'),
					'subtitle'       => esc_html__('Allow your users to choose the spacing padding they want.', 'common'),
					'desc'           => esc_html__('You can enable or disable any piece of this field. Top, Right, Bottom, Left, or Units.', 'common'),
					'default'            => array(
						'padding-top'     => '', 
						'padding-right'   => '', 
						'padding-bottom'  => '', 
						'padding-left'    => '',
						'units'          => 'px', 
					)
				),				
				
				
				
            ),
    ) );
			
/* ========================
END common FOOTER FIELD
=========================*/	
    Redux::setSection( $opt_name, array(
        'icon'            => 'el el-list-alt',
        'title'           => esc_html__( 'Customizer Only', 'common' ),
        'desc'            => esc_html__( 'This Section should be visible only in Customizer', 'common' ),
        'customizer_only' => true,
        'fields'          => array(
            array(
                'id'              => 'opt-customizer-only',
                'type'            => 'select',
                'title'           => esc_html__( 'Customizer Only Option', 'common' ),
                'subtitle'        => esc_html__( 'The subtitle is NOT visible in customizer', 'common' ),
                'desc'            => esc_html__( 'The field desc is NOT visible in customizer.', 'common' ),
                'customizer_only' => true,
                //Must provide key => value pairs for select options
                'options'         => array(
                    '1' => esc_html__('Opt 1','common'),
                    '2' => esc_html__('Opt 2','common'),
                    '3' => esc_html__('Opt 3','common')
                ),
                'default'         => '2'
            ),
        )
    ) );   	 
	 
	 
	 

    /*
     * <--- END SECTIONS
     */

    /**
     * Removes the demo link and the notice of integrated demo from the redux-framework plugin
     */
    if ( ! function_exists( 'common_remove_demo' ) ) {
        function common_remove_demo() {
            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
            if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
                remove_filter( 'plugin_row_meta', array(
                    ReduxFrameworkPlugin::instance(),
                    'plugin_metalinks'
                ), null, 2 );

                // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
                remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
            }
        }
    }
