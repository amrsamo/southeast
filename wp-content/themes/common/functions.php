<?php

/**
 * common Custom Functions
**/

//Setup Constants.
define( 'COMMON_VERSION', '1.0.0' );


if ( ! function_exists( 'common_setup' ) ) :

function common_setup() {

		add_theme_support( 'post-formats', array( 'gallery', 'quote', 'video', 'audio' ) );

		add_image_size( 'common-blog-default', 390, 240, true );
		add_image_size( 'common-blog-single', 770, 450, true );
		add_image_size( 'common-blog-both', 570, 350, true );
		add_image_size( 'common-team', 450, 450, true );
		add_image_size( 'common-testimonial', 106, 106, true );
		add_image_size( 'common-single-portfolio', 1170, 600, true );
		add_image_size( 'common-gallery-thumb', 560, 560, true );
		add_image_size( 'common_recent_image', 110, 90, true );

		
	register_nav_menus( array(
		'one-pages' => esc_html__( 'One Page Menu', 'common' ),
		'menu-3' => esc_html__( 'Mobile Menu', 'common' ),
	) );

}
endif;
add_action( 'after_setup_theme', 'common_setup',110 );


// load redux

require_once( trailingslashit( get_stylesheet_directory() ). '/includes/common-global-function.php' );
require_once( trailingslashit( get_stylesheet_directory() ). '/includes/common-breadcrumb.php' );
require_once( trailingslashit( get_stylesheet_directory() ). '/includes/common-metaboxs.php' );
require_once( trailingslashit( get_stylesheet_directory() ). '/includes/common-option-framework.php' );
require_once( trailingslashit( get_stylesheet_directory() ). '/includes/common-customizer.php' );
require_once( trailingslashit( get_stylesheet_directory() ). '/includes/common-presets.php' );
require_once( trailingslashit( get_stylesheet_directory() ). '/includes/common-tgm-activation.php' );


//Localize
if ( ! function_exists( 'common_localize' ) ) {
	
	function common_localize() {
		
		load_child_theme_textdomain( 'common', get_stylesheet_directory() . '/languages' );
	
	}
	
}
add_action( 'after_setup_theme', 'common_localize' );

/* Set Font and Theme Defaults
** http://docs.layerswp.com/reference/layers_customizer_defaults/
*  Since 1.0
*/
add_filter( 'layers_customizer_control_defaults', 'common_customizer_defaults' );

if( ! function_exists( 'common_customizer_defaults' ) ) {
	function common_customizer_defaults( $defaults ){

	 	$defaults = array(
	       'body-fonts' => 'Poppins',
	       'form-fonts' => 'Poppins',
	       'header-menu-layout' => 'header-logo-left',
	       'header-background-color' => '#FFFFFF',
	       'site-accent-color' => '#ff5e00',
	       'header-width' => 'layout-boxed',
	       'header-sticky' => '1',
		   'header-overlay' => '0',
	       'heading-fonts' => 'Raleway',
	       'header-sticky-breakpoint' => '400',
	       'footer-sidebar-count' => '0',
		   'footer-background-color' => '#1a1a1a',
		   'footer-link-color' => '#FFFFFF',
		   'footer-body-color' => '#FFFFFF'
	 	);

	 return $defaults;
	}
}



/**
 *Register Fonts
*/
if(!function_exists('common_fonts_url')){
	
	function common_fonts_url(){
	 $fonts_url = '';
	 
	 /* Translators: If there are characters in your language that are not
	 * supported by raleway, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	 $raleway = _x( 'on', 'Raleway font: on or off', 'common' );
	 $poppins = _x( 'on', 'Poppins font: on or off', 'common' );
	 
	 if ( 'off' !== $raleway ) {
	 $font_families = array();
	 if ( 'off' !== $raleway ) {
	 $font_families[] = 'Raleway:300,400,500,600,700,800,900';
	 }
	 if ( 'off' !== $poppins ) {
	 $font_families[] = 'Poppins:300,400,500,600,700';
	 }
	 $query_args = array(
	 'family' => urlencode( implode( '|', $font_families ) ),
	 'subset' => urlencode( 'latin,latin-ext' ),
	 );
	 $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	 }
	 return esc_url_raw( $fonts_url ); 
	}
	
}

	
/**
* Load Styles
*/
 
if( ! function_exists( 'common_styles' ) ) {	

	function common_styles() {		
		wp_enqueue_style( 'layers-font-awesome',
			get_template_directory_uri() . '/core/assets/plugins/font-awesome/font-awesome.min.css',
			array() 
		);	
		wp_enqueue_style( 'common-fonts', common_fonts_url(), array() );		
		wp_enqueue_style('venobox', get_stylesheet_directory_uri() .'/venobox/venobox.css');
		wp_enqueue_style('animate', get_stylesheet_directory_uri() .'/assets/css/animate.css');
		wp_enqueue_style('owl.carousel', get_stylesheet_directory_uri() .'/assets/css/owl.carousel.css');
		wp_enqueue_style('owl.transitions', get_stylesheet_directory_uri() .'/assets/css/owl.transitions.css');
		wp_enqueue_style('meanmenu', get_stylesheet_directory_uri() .'/assets/css/meanmenu.min.css');
	}
	
}
add_action( 'wp_enqueue_scripts', 'common_styles' );

/**
* Load Scripts
*/	
if( ! function_exists( 'common_scripts' ) ) {
		
	function common_scripts() {
		
		wp_enqueue_script( 'modernizr', get_stylesheet_directory_uri() . '/assets/js/vendor/modernizr-2.8.3.min.js', array(), '2.8.3', true );
		wp_enqueue_script( 'bootstrap-min', get_stylesheet_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '3.3.5', true );
		wp_enqueue_script( 'imagesloaded');
		wp_enqueue_script( 'meanmenu', get_stylesheet_directory_uri() . '/assets/js/jquery.meanmenu.js', array('jquery'), '1.0.0', true );
		wp_enqueue_script( 'isotope', get_stylesheet_directory_uri() . '/assets/js/isotope.pkgd.min.js', array('jquery'), '1.0.0', true );
		wp_enqueue_script( 'owl-carousel-min', get_stylesheet_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'), '', true );
		wp_enqueue_script( 'scrollup-min', get_stylesheet_directory_uri() . '/assets/js/jquery.scrollUp.js', array('jquery'), '3.2.4', true );
		wp_enqueue_script( 'jquery.nav', get_stylesheet_directory_uri() . '/assets/js/jquery.nav.js', array('jquery'), '3.2.4', true );
		wp_enqueue_script( 'jquery-scrolltofixed', get_stylesheet_directory_uri() . '/assets/js/jquery-scrolltofixed-min.js', array('jquery'), '3.2.4', true );
		wp_enqueue_script( 'venobox', get_stylesheet_directory_uri() . '/venobox/venobox.min.js', array('jquery'), '3.2.4', true );
		wp_enqueue_script( 'counterup', get_stylesheet_directory_uri() . '/assets/js/jquery.counterup.min.js', array('jquery'), '3.2.4', true );			
		wp_enqueue_script( 'waypoints.min', get_stylesheet_directory_uri() . '/assets/js/waypoints.min.js', array('jquery'), '3.2.4', true );
		wp_enqueue_script( 'common-theme', get_stylesheet_directory_uri() . '/assets/js/theme.js', array('jquery'), '3.2.4', true );
			
	}	
}
add_action('wp_enqueue_scripts', 'common_scripts'); 

/**
 * common widget js
 */
 if(!function_exists('common_media_scripts')){
	 
	function common_media_scripts() {
		wp_enqueue_media();
		wp_enqueue_script('common-uploader', get_stylesheet_directory_uri() .'/assets/js/common_uploader.js', false, '', true );
	}
 }
add_action('admin_enqueue_scripts', 'common_media_scripts');
/**
* Welcome Redirect
* http://docs.layerswp.com/how-to-add-help-pages-onboarding-to-layers-themes-or-extensions/
*/
if( ! function_exists('common_setup') ) {
	
	function common_setup(){
		
		if( isset($_GET["activated"]) && $pagenow = "themes.php" ) { //&& '' == get_option( 'layers_welcome' )
			update_option( 'layers_welcome' , 1);
			wp_safe_redirect( admin_url('admin.php?page=layers-child-get-started'));
		}
	}
}
add_action( 'after_setup_theme', 'common_setup', 20 );



/**
 * Add color styling from theme
 */
 
 if( !function_exists( 'common_inline_styles' ) ) {
function common_inline_styles() {
	 global $common_opt;
	 $lheight=$lwidth=$linheight=$mobile_image=$mobile_image_sec='';
		if (!empty($common_opt['common_logo_height'])){
			$lheight=$common_opt['common_logo_height'];
		}
		if (!empty($common_opt['common_logo_widget'])){
			$lwidth=$common_opt['common_logo_widget'];
		}
		if (!empty($common_opt['common_line_height'])){
			$linheight=$common_opt['common_line_height'];
		}

		if (!empty($common_opt['common_mobile_image_logo']['url'])){
			$mobile_image=$common_opt['common_mobile_image_logo']['url'];
			$mobile_image_sec="content:url({$mobile_image})";
		}

		


		
		
		
		wp_enqueue_style(
			'common-breadcrumb',
			get_stylesheet_directory_uri() . '/assets/css/common-breadcrumb.css'
		);
			

        $inlinewp_css = "
					.logo img {
						height: {$lheight};
						width: {$lwidth};
					}
					.logo a{
						margin-top:{$linheight};
					}
					.mean-container .mean-bar::before{
						{$mobile_image_sec}						
					}					
						
               ";
				
				
        wp_add_inline_style( 'common-breadcrumb', $inlinewp_css );
	}
}
add_action( 'wp_enqueue_scripts', 'common_inline_styles',200 );

// Content word count
if(!function_exists('common_read_more')){
		
	function common_read_more($limit){
		$content = explode(' ', get_the_content());
		$count   = array_slice($content, 0 , $limit);
		echo implode (' ', $count);
	}
}

// Title word count
if(!function_exists('common_title')){
	
	function common_title($limit){
		$title = explode(' ' , get_the_title());
		$titles = array_slice($title , 0, $limit);
		echo implode(' ', $titles);
	}
	
}


/**
 * Register widget area.
 */
if(!function_exists('common_widgets_init')){
	
	function common_widgets_init() {
		
		register_sidebar( array(
			'name'          => esc_html__( 'Blog Left Sidebar', 'common' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'common' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );
		register_sidebar( array(
			'name'          => esc_html__( 'Blog Right Sidebar', 'common' ),
			'id'            => 'sidebar-2',
			'description'   => esc_html__( 'Add widgets here.', 'common' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );		
		register_sidebar( array(
			'name'          => esc_html__( 'Page Left Sidebar', 'common' ),
			'id'            => 'sidebar-3',
			'description'   => esc_html__( 'Add widgets here.', 'common' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );
		register_sidebar( array(
			'name'          => esc_html__( 'Page Right Sidebar', 'common' ),
			'id'            => 'sidebar-4',
			'description'   => esc_html__( 'Add widgets here.', 'common' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );			
		
		
	}
	
}
add_action( 'widgets_init', 'common_widgets_init',50 );
