<?php
/**
* Bravery Extension
* http://docs.layerswp.com/create-an-extension-setup-your-plugin-class/#setup-class
*/
if( !class_exists( 'Common_Layers_Extension' ) ) {
	class Common_Layers_Extension {

		// Setup Instance
		
		private static $_instance=null;
		
		public static function get_instance() {
			if ( is_null( self::$_instance ) )
				
				self::$_instance = new Common_Layers_Extension();

			return self::$_instance;
		}
		
		// Constructor		
		private function __construct() {							
		// Register custom widgets
		add_action( 'widgets_init' , array( $this, 'common_register_widgets' ), 50 );	
		}

		// Register Widgets		
		public function common_register_widgets(){
			
		  require_once( EM40_EXTENSION_DIR. 'widgets/em-slider.php' );
		  require_once( EM40_EXTENSION_DIR. 'widgets/em-portfolio.php' );
		  require_once( EM40_EXTENSION_DIR. 'widgets/em-counter.php' );
		  require_once( EM40_EXTENSION_DIR. 'widgets/em-team.php' );
		  require_once( EM40_EXTENSION_DIR. 'widgets/em-pricing.php' );
		  require_once( EM40_EXTENSION_DIR. 'widgets/em-brand.php' );
		  require_once( EM40_EXTENSION_DIR. 'widgets/em-testimonial.php' );
		  require_once( EM40_EXTENSION_DIR. 'widgets/em-blog.php' );
		  require_once( EM40_EXTENSION_DIR. 'widgets/em-choose.php' );
		  require_once( EM40_EXTENSION_DIR. 'widgets/em-contact.php' );
		  

		}
	
	} // END Class
	
} 
