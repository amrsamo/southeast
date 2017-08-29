<?php
/* Create Custom Customizer Controls
* http://docs.layerswp.com/reference/layers_customizer_controls/
* @return $controls
*/
add_filter( 'layers_customizer_controls' , 'common_color_customizer_sections', 100 );

if( !function_exists( 'common_color_customizer_sections' ) ) {
	
   function common_color_customizer_sections( $controls){
	   
	   	
		unset($controls['header-layout']);
		unset($controls['site-colors']);
		unset($controls['fonts']);
		unset($controls['footer-layout']);
		unset($controls['buttons']);
		unset($controls['header-menu-styling']);
		unset($controls['blog-styling']);
		unset($controls['blog-single']);
		unset($controls['blog-archive']);
		unset($controls['title_tagline']['logo-upsell-layers-pro']);
		unset($controls['header-layout']['header-upsell-layers-pro']);
		
	 
		return $controls;
	
    }
}

