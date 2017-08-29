<?php

// set preset layout 

if(!function_exists('common_presets')){
	
	function common_presets( $layers_preset_layouts ){

		$layers_child_presets[ 'home1' ] = array(
			  'title' => esc_html__( 'common - Home', 'common' ),
			  'screenshot' => get_stylesheet_directory_uri().'/assets/preset-images/preview/home.jpg',
			  'screenshot_type' => 'jpg',
			  'json' => '{"obox-layers-builder-46":{"layers-widget-em_slider-3":[],"layers-widget-em_choose-3":{"design":{"layout":"layout-boxed","advanced":{"padding":{"top":"","right":"","bottom":"80","left":""},"margin":{"top":"","right":"","bottom":"0","left":""},"anchor":"","customclass":"","customcss":""},"background":{"color":"","image":"","repeat":"no-repeat","position":"center","stretch-CHECKBOX":"on","darken-CHECKBOX":"on"},"fonts":{"size":"medium","align":"text-left","color":"","excerpt-color":""}},"title":"WHY <span>CHOOSE<\/span> US","excerpt":"<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed tempor incididunt ut laboredolore magna aliqua. Ut enim<\/p>","t1":"DEVELOPER","tx1":"orem ipsum dolor sit amet, contetur adipisicing elit, sed do eiusm","t2":"HTM5L & CSS3","tx2":"orem ipsum dolor sit amet, contetur adipisicing elit, sed do eiusm","t3":"PHOTOGRAPHY","tx3":"orem ipsum dolor sit amet, contetur adipisicing elit, sed do eiusm","t4":"WEB DESIGN","tx4":"orem ipsum dolor sit amet, contetur adipisicing elit, sed do eiusm","cimage":"228","pyoutube":"https:\/\/youtu.be\/BS4TUd7FJSg","pvimeo":""},"layers-widget-column-3":{"design":{"layout":"layout-boxed","advanced":{"padding":{"top":"","right":"","bottom":"","left":""},"margin":{"top":"","right":"","bottom":"","left":""},"anchor":"","customclass":"common-service-area","customcss":""},"liststyle":"list-grid","gutter":"on","gutter-CHECKBOX":"on","background":{"color":"","image":"","repeat":"no-repeat","position":"center","stretch-CHECKBOX":"on","darken-CHECKBOX":"on"},"fonts":{"size":"medium","align":"text-left","color":"","excerpt-color":""}},"title":"","excerpt":"","column_ids":"528,736,142,918","columns":{"528":{"design":{"background":{"color":"#f9f9f9","image":"","stretch-CHECKBOX":"on","darken-CHECKBOX":"on"},"featuredimage":"http:\/\/raytheme.com\/wp\/common\/wp-content\/uploads\/2017\/05\/1-1.jpg","featuredvideo":"","imagealign":"image-top","fonts":{"size":"medium","align":"text-center","color":"","excerpt-color":""},"advanced":{"padding":{"top":"","right":"","bottom":"","left":""},"margin":{"top":"","bottom":""},"customclass":""}},"width":"3","title":"BUSINESS PLAN","excerpt":"<p>Lorem ipsum dnsectetur adipisiing elit, sed do eiusmod temp<\/p>","button":{"link_type":"custom","link_type_custom":"","link_type_post":"","link_type_post_type_archive":"","link_type_taxonomy_archive":"","link_text":""}},"736":{"design":{"background":{"color":"#f9f9f9","image":"","stretch-CHECKBOX":"on","darken-CHECKBOX":"on"},"featuredimage":"http:\/\/raytheme.com\/wp\/common\/wp-content\/uploads\/2017\/05\/4.jpg","featuredvideo":"","imagealign":"image-top","fonts":{"size":"medium","align":"text-center","color":"","excerpt-color":""},"advanced":{"padding":{"top":"","right":"","bottom":"","left":""},"margin":{"top":"","bottom":""},"customclass":""}},"width":"3","title":"CREATIVE IDEAS ","excerpt":"<p>Lorem ipsum dnsectetur adipisiing elit, sed do eiusmod temp<\/p>","button":{"link_type":"custom","link_type_custom":"","link_type_post":"","link_type_post_type_archive":"","link_type_taxonomy_archive":"","link_text":""}},"142":{"design":{"background":{"color":"#f9f9f9","image":"","stretch-CHECKBOX":"on","darken-CHECKBOX":"on"},"featuredimage":"http:\/\/raytheme.com\/wp\/common\/wp-content\/uploads\/2017\/05\/2.jpg","featuredvideo":"","imagealign":"image-top","fonts":{"size":"medium","align":"text-center","color":"","excerpt-color":""},"advanced":{"padding":{"top":"","right":"","bottom":"","left":""},"margin":{"top":"","bottom":""},"customclass":""}},"width":"3","title":"RESPONSIVE APPS","excerpt":"<p>Lorem ipsum dnsectetur adipisiing elit, sed do eiusmod temp<\/p>","button":{"link_type":"custom","link_type_custom":"","link_type_post":"","link_type_post_type_archive":"","link_type_taxonomy_archive":"","link_text":""}},"918":{"design":{"background":{"color":"#f9f9f9","image":"","stretch-CHECKBOX":"on","darken-CHECKBOX":"on"},"featuredimage":"http:\/\/raytheme.com\/wp\/common\/wp-content\/uploads\/2017\/05\/3.jpg","featuredvideo":"","imagealign":"image-top","fonts":{"size":"medium","align":"text-center","color":"","excerpt-color":""},"advanced":{"padding":{"top":"","right":"","bottom":"","left":""},"margin":{"top":"","bottom":""},"customclass":""}},"width":"3","title":"WEB DEVELOPER","excerpt":"<p>Lorem ipsum dnsectetur adipisiing elit, sed do eiusmod temp<\/p>","button":{"link_type":"custom","link_type_custom":"","link_type_post":"","link_type_post_type_archive":"","link_type_taxonomy_archive":"","link_text":""}}}},"layers-widget-em_portfolio-4":{"design":{"layout":"layout-fullwidth","advanced":{"padding":{"top":"","right":"","bottom":"80","left":""},"margin":{"top":"","right":"","bottom":"","left":""},"anchor":"","customclass":"","customcss":""},"columns":"4","gutter-CHECKBOX":"on","column-text-color":"","column-background-color":"","background":{"color":"","image":"","repeat":"no-repeat","position":"center","stretch-CHECKBOX":"on","darken-CHECKBOX":"on"},"fonts":{"size":"medium","align":"text-center","color":"","excerpt-color":""}},"show_titles":"on","show_titles-CHECKBOX":"on","show_pagination":"on","show_pagination-CHECKBOX":"on","show_categories":"on","show_categories-CHECKBOX":"on","title":"OUR <span>PORTFOLIO<\/span>","excerpt":"","category":"0","posts_per_page":"10","order":"{\"orderby\":\"date\",\"order\":\"desc\"}"},"layers-widget-em_team-3":{"design":{"layout":"layout-boxed","advanced":{"padding":{"top":"100","right":"","bottom":"70","left":""},"margin":{"top":"","right":"","bottom":"","left":""},"anchor":"","customclass":"","customcss":""},"columns":"4","gutter":"on","gutter-CHECKBOX":"on","column-text-color":"","column-background-color":"","background":{"color":"#f9f9f9","image":"","repeat":"no-repeat","position":"center","stretch-CHECKBOX":"on","darken-CHECKBOX":"on"},"fonts":{"size":"medium","align":"text-center","color":"","excerpt-color":""}},"show_titles":"on","show_titles-CHECKBOX":"on","show_pagination-CHECKBOX":"on","show_categories":"on","show_categories-CHECKBOX":"on","title":"OUR  <span>TEAM<\/span>","excerpt":"<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud<\/p>","category":"0","posts_per_page":"4","order":"{\"orderby\":\"date\",\"order\":\"desc\"}"},"layers-widget-common_counter-3":{"design":{"layout":"layout-boxed","advanced":{"padding":{"top":"97","right":"","bottom":"95","left":""},"margin":{"top":"","right":"","bottom":"","left":""},"anchor":"","customclass":"","customcss":""},"background":{"color":"","image":"http:\/\/raytheme.com\/wp\/common\/wp-content\/uploads\/2017\/06\/client.jpg","repeat":"no-repeat","position":"center","stretch":"on","stretch-CHECKBOX":"on","darken":"on","darken-CHECKBOX":"on"}},"icon_font_size":"","value_font_size":"","project_name_font_size":"","project_name_text_transform":"capitalize","count_icon_color":"","name_text_color":"","column_ids":"719,107,988,907","columns":{"719":{"design":{"background":{"color":"","image":"","stretch-CHECKBOX":"on","darken-CHECKBOX":"on"},"fonts":{"align":"text-center","size":"medium","color":""},"advanced":{"customclass":"","padding":{"top":"","right":"","bottom":"","left":""},"margin":{"top":"","bottom":""}}},"width":"3","icon":"smile-o ","number":"6365","excerpt":"<p>Happy Client<\/p>"},"107":{"design":{"background":{"color":"","image":"","stretch-CHECKBOX":"on","darken-CHECKBOX":"on"},"fonts":{"align":"text-center","size":"medium","color":""},"advanced":{"customclass":"","padding":{"top":"","right":"","bottom":"","left":""},"margin":{"top":"","bottom":""}}},"width":"3","icon":"pencil-square-o ","number":"2365","excerpt":"<p>Running Project<\/p>"},"988":{"design":{"background":{"color":"","image":"","stretch-CHECKBOX":"on","darken-CHECKBOX":"on"},"fonts":{"align":"text-center","size":"medium","color":""},"advanced":{"customclass":"","padding":{"top":"","right":"","bottom":"","left":""},"margin":{"top":"","bottom":""}}},"width":"3","icon":"clock-o ","number":"5365","excerpt":"<p>Work Done<\/p>"},"907":{"design":{"background":{"color":"","image":"","stretch-CHECKBOX":"on","darken-CHECKBOX":"on"},"fonts":{"align":"text-center","size":"medium","color":""},"advanced":{"customclass":"","padding":{"top":"","right":"","bottom":"","left":""},"margin":{"top":"","bottom":""}}},"width":"3","icon":"user","number":"1365","excerpt":"<p>New Member<\/p>"}}},"layers-widget-em_pricing-3":{"design":{"layout":"layout-boxed","advanced":{"padding":{"top":"100","right":"","bottom":"80","left":""},"margin":{"top":"","right":"","bottom":"","left":""},"anchor":"","customclass":"","customcss":""},"columns":"3","gutter":"on","gutter-CHECKBOX":"on","column-text-color":"","column-background-color":"","background":{"color":"","image":"","repeat":"no-repeat","position":"center","stretch-CHECKBOX":"on","darken-CHECKBOX":"on"},"fonts":{"size":"medium","align":"text-center","color":"","excerpt-color":""}},"show_pagination":"on","show_pagination-CHECKBOX":"on","title":"OUR <span>PRICING<\/span>","excerpt":"<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud<\/p>","category":"0","posts_per_page":"10","order":"{\"orderby\":\"date\",\"order\":\"desc\"}"},"layers-widget-em_testimonial-3":{"design":{"layout":"layout-boxed","advanced":{"padding":{"top":"","right":"","bottom":"142","left":""},"margin":{"top":"","right":"","bottom":"","left":""},"anchor":"","customclass":"","customcss":""},"columns":"2","gutter":"on","gutter-CHECKBOX":"on","column-text-color":"","column-text-align":"text-center","column-background-color":"","background":{"color":"","image":"http:\/\/raytheme.com\/wp\/common\/wp-content\/uploads\/2017\/05\/tbg.jpg","repeat":"no-repeat","position":"center","stretch-CHECKBOX":"on","darken-CHECKBOX":"on"},"fonts":{"size":"medium","align":"text-left","color":"","excerpt-color":""}},"text_style":"style2","title":"","excerpt":"","category":"0","posts_per_page":"10","order":"{\"orderby\":\"date\",\"order\":\"desc\"}"},"layers-widget-em_blog-3":{"design":{"layout":"layout-boxed","advanced":{"padding":{"top":"","right":"","bottom":"70","left":""},"margin":{"top":"","right":"","bottom":"","left":""},"anchor":"","customclass":"","customcss":""},"columns":"3","gutter":"on","gutter-CHECKBOX":"on","column-text-color":"","column-background-color":"","background":{"color":"","image":"","repeat":"no-repeat","position":"center","stretch-CHECKBOX":"on","darken-CHECKBOX":"on"},"fonts":{"size":"medium","align":"text-center","color":"","excerpt-color":""}},"text_style":"style2","show_pagination-CHECKBOX":"on","title":"OUR <span>BLOG<\/span>","excerpt":"<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud<\/p>","category":"0","posts_per_page":"7","order":"{\"orderby\":\"date\",\"order\":\"desc\"}"},"layers-widget-em_brand-3":{"design":{"layout":"layout-boxed","advanced":{"padding":{"top":"","right":"","bottom":"","left":""},"margin":{"top":"","right":"","bottom":"","left":""},"anchor":"","customclass":"","customcss":""},"background":{"color":"#f9f9f9","image":"","repeat":"no-repeat","position":"center","stretch-CHECKBOX":"on","darken-CHECKBOX":"on"},"fonts":{"size":"medium","align":"text-left","color":"","excerpt-color":""}},"title":"","excerpt":"","category":"0","posts_per_page":"","order":"{\"orderby\":\"date\",\"order\":\"desc\"}"},"layers-widget-em_contact-3":{"design":{"layout":"layout-boxed","advanced":{"padding":{"top":"100","right":"","bottom":"70","left":""},"margin":{"top":"","right":"","bottom":"","left":""},"anchor":"","customclass":"","customcss":""},"background":{"color":"","image":"","repeat":"no-repeat","position":"center","stretch-CHECKBOX":"on","darken-CHECKBOX":"on"},"fonts":{"size":"medium","align":"text-center","color":"","excerpt-color":""}},"show_pagination":"on","show_pagination-CHECKBOX":"on","title":"OUR <span>CONTACT<\/span>","excerpt":"<p>Lorem up to date with all our latest news and launches. Only the best quality makes it onto choose us!<\/p>","t1":"","tx1":"","t2":"","tx2":"","t3":"","tx3":"","t4":"","tx4":"","ccontact":"[contact-form-7 id=\"199\" title=\"Contact style-1\"]","gmap":"<iframe src=\"https:\/\/www.google.com\/maps\/embed?pb=!1m18!1m12!1m3!1d3299.5958867623094!2d-118.2091337851599!3d34.207800280563866!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2ea40c269c25d%3A0x2a363eeae8ccaae7!2sLa+Canada+Flintridge+City+Hall!5e0!3m2!1sen!2sbd!4v1498130603334\" \r\n height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen><\/iframe>"}}}'
		);		
		$layers_child_presets[ 'about' ] = array(
			  'title' => esc_html__( 'common - About Us', 'common' ),
			  'screenshot' => get_stylesheet_directory_uri().'/assets/preset-images/preview/about.jpg',
			  'screenshot_type' => 'jpg',
			  'json' => '{"obox-layers-builder-48":{"layers-widget-em_choose-7":{"design":{"layout":"layout-boxed","advanced":{"padding":{"top":"95","right":"","bottom":"80","left":""},"margin":{"top":"","right":"","bottom":"","left":""},"anchor":"","customclass":"","customcss":""},"background":{"color":"","image":"","repeat":"no-repeat","position":"center","stretch-CHECKBOX":"on","darken-CHECKBOX":"on"},"fonts":{"size":"medium","align":"text-left","color":"","excerpt-color":""}},"title":"WHY <span>CHOOSE<\/span> US","excerpt":"<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed tempor incididunt ut laboredolore magna aliqua. Ut enim<\/p>","t1":"DEVELOPER","tx1":"orem ipsum dolor sit amet, contetur adipisicing elit, sed do eiusm ","t2":"HTML5 & CSS3","tx2":"orem ipsum dolor sit amet, contetur adipisicing elit, sed do eiusm ","t3":"GRAPHICS DESIGN","tx3":"orem ipsum dolor sit amet, contetur adipisicing elit, sed do eiusm ","t4":"SOCIAL MARKEITING ","tx4":"orem ipsum dolor sit amet, contetur adipisicing elit, sed do eiusm ","cimage":"228","pyoutube":"https:\/\/youtu.be\/S7wCAquf9Us","pvimeo":""},"layers-widget-em_team-5":{"design":{"layout":"layout-boxed","advanced":{"padding":{"top":"","right":"","bottom":"70","left":""},"margin":{"top":"","right":"","bottom":"","left":""},"anchor":"","customclass":"","customcss":""},"columns":"4","gutter":"on","gutter-CHECKBOX":"on","column-text-color":"","column-background-color":"","background":{"color":"#f9f9f9","image":"","repeat":"no-repeat","position":"center","stretch-CHECKBOX":"on","darken-CHECKBOX":"on"},"fonts":{"size":"medium","align":"text-center","color":"","excerpt-color":""}},"show_titles":"on","show_titles-CHECKBOX":"on","show_pagination-CHECKBOX":"on","show_categories":"on","show_categories-CHECKBOX":"on","title":"OUR <span>TEAM<\/span>","excerpt":"<p>Lorem up to date with all our latest news and launches. Only the best quality makes it onto our blog!<\/p>","category":"0","posts_per_page":"4","order":"{\"orderby\":\"date\",\"order\":\"desc\"}"},"layers-widget-em_testimonial-5":{"design":{"layout":"layout-boxed","advanced":{"padding":{"top":"98","right":"","bottom":"85","left":""},"margin":{"top":"","right":"","bottom":"","left":""},"anchor":"","customclass":"","customcss":""},"columns":"2","gutter":"on","gutter-CHECKBOX":"on","column-text-color":"#333333","column-text-align":"text-center","column-background-color":"","background":{"color":"","image":"","repeat":"no-repeat","position":"center","stretch-CHECKBOX":"on","darken-CHECKBOX":"on"},"fonts":{"size":"medium","align":"text-center","color":"","excerpt-color":""}},"text_style":"style1","title":"OUR <span>TESTIMONIAL<\/span>","excerpt":"<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud<\/p>","category":"0","posts_per_page":"10","order":"{\"orderby\":\"date\",\"order\":\"desc\"}"}}}'
		);			
		$layers_child_presets[ 'service' ] = array(
			  'title' => esc_html__( 'common - Service', 'common' ),
			  'screenshot' => get_stylesheet_directory_uri().'/assets/preset-images/preview/service.jpg',
			  'screenshot_type' => 'jpg',
			  'json' => '{"obox-layers-builder-50":{"layers-widget-column-9":{"design":{"layout":"layout-boxed","advanced":{"padding":{"top":"95","right":"","bottom":"75","left":""},"margin":{"top":"","right":"","bottom":"","left":""},"anchor":"","customclass":"common-service-area","customcss":""},"liststyle":"list-grid","gutter":"on","gutter-CHECKBOX":"on","background":{"color":"#f9f9f9","image":"","repeat":"no-repeat","position":"center","stretch-CHECKBOX":"on","darken-CHECKBOX":"on"},"fonts":{"size":"medium","align":"text-left","color":"","excerpt-color":""}},"title":"","excerpt":"","column_ids":"817,309,633,506","columns":{"817":{"design":{"background":{"color":"","image":"","stretch-CHECKBOX":"on","darken-CHECKBOX":"on"},"featuredimage":"http:\/\/raytheme.com\/wp\/common\/wp-content\/uploads\/2017\/05\/1-1.jpg","featuredvideo":"","imagealign":"image-top","fonts":{"size":"medium","align":"text-center","color":"","excerpt-color":""},"advanced":{"padding":{"top":"","right":"","bottom":"","left":""},"margin":{"top":"","bottom":""},"customclass":""}},"width":"3","title":"BUSINESS PLAN ","excerpt":"<p>Lorem ipsum dnsectetur adipisiing elit, sed do eiusmod temp<\/p>","button":{"link_type":"custom","link_type_custom":"","link_type_post":"","link_type_post_type_archive":"","link_type_taxonomy_archive":"","link_text":""}},"309":{"design":{"background":{"color":"","image":"","stretch-CHECKBOX":"on","darken-CHECKBOX":"on"},"featuredimage":"http:\/\/raytheme.com\/wp\/common\/wp-content\/uploads\/2017\/05\/4.jpg","featuredvideo":"","imagealign":"image-top","fonts":{"size":"medium","align":"text-center","color":"","excerpt-color":""},"advanced":{"padding":{"top":"","right":"","bottom":"","left":""},"margin":{"top":"","bottom":""},"customclass":""}},"width":"3","title":"SOCIAL MARKETING","excerpt":"<p>Lorem ipsum dnsectetur adipisiing elit, sed do eiusmod temp<\/p>","button":{"link_type":"custom","link_type_custom":"","link_type_post":"","link_type_post_type_archive":"","link_type_taxonomy_archive":"","link_text":""}},"633":{"design":{"background":{"color":"","image":"","stretch-CHECKBOX":"on","darken-CHECKBOX":"on"},"featuredimage":"http:\/\/raytheme.com\/wp\/common\/wp-content\/uploads\/2017\/05\/2.jpg","featuredvideo":"","imagealign":"image-top","fonts":{"size":"medium","align":"text-center","color":"","excerpt-color":""},"advanced":{"padding":{"top":"","right":"","bottom":"","left":""},"margin":{"top":"","bottom":""},"customclass":""}},"width":"3","title":"WEB DESIGN ","excerpt":"<p>Lorem ipsum dnsectetur adipisiing elit, sed do eiusmod temp<\/p>","button":{"link_type":"custom","link_type_custom":"","link_type_post":"","link_type_post_type_archive":"","link_type_taxonomy_archive":"","link_text":""}},"506":{"design":{"background":{"color":"","image":"","stretch-CHECKBOX":"on","darken-CHECKBOX":"on"},"featuredimage":"http:\/\/raytheme.com\/wp\/common\/wp-content\/uploads\/2017\/05\/3.jpg","featuredvideo":"","imagealign":"image-top","fonts":{"size":"medium","align":"text-center","color":"","excerpt-color":""},"advanced":{"padding":{"top":"","right":"","bottom":"","left":""},"margin":{"top":"","bottom":""},"customclass":""}},"width":"3","title":"WEB DEVELOPMENT","excerpt":"<p>Lorem ipsum dnsectetur adipisiing elit, sed do eiusmod temp<\/p>","button":{"link_type":"custom","link_type_custom":"","link_type_post":"","link_type_post_type_archive":"","link_type_taxonomy_archive":"","link_text":""}}}},"layers-widget-em_pricing-5":{"design":{"layout":"layout-boxed","advanced":{"padding":{"top":"","right":"","bottom":"80","left":""},"margin":{"top":"","right":"","bottom":"","left":""},"anchor":"","customclass":"","customcss":""},"columns":"3","gutter":"on","gutter-CHECKBOX":"on","column-text-color":"","column-background-color":"","background":{"color":"","image":"","repeat":"no-repeat","position":"center","stretch-CHECKBOX":"on","darken-CHECKBOX":"on"},"fonts":{"size":"medium","align":"text-center","color":"","excerpt-color":""}},"show_pagination":"on","show_pagination-CHECKBOX":"on","title":"OUR <span>PRICING <span>","excerpt":"<p>Lorem up to date with all our latest news and launches. Only the best quality makes it onto our blog!<\/p>","category":"0","posts_per_page":"3","order":"{\"orderby\":\"date\",\"order\":\"desc\"}"}}}'
		);
		$layers_child_presets[ 'team' ] = array(
			  'title' => esc_html__( 'common - Team', 'common' ),
			  'screenshot' => get_stylesheet_directory_uri().'/assets/preset-images/preview/team.jpg',
			  'screenshot_type' => 'jpg',
			  'json' => '{"obox-layers-builder-54":{"layers-widget-em_team-7":{"design":{"layout":"layout-boxed","advanced":{"padding":{"top":"","right":"","bottom":"","left":""},"margin":{"top":"","right":"","bottom":"","left":""},"anchor":"","customclass":"","customcss":""},"columns":"4","gutter":"on","gutter-CHECKBOX":"on","column-text-color":"","column-background-color":"","background":{"color":"","image":"","repeat":"no-repeat","position":"center","stretch-CHECKBOX":"on","darken-CHECKBOX":"on"},"fonts":{"size":"medium","align":"text-left","color":"","excerpt-color":""}},"show_titles":"on","show_titles-CHECKBOX":"on","show_pagination":"on","show_pagination-CHECKBOX":"on","show_categories":"on","show_categories-CHECKBOX":"on","title":"","excerpt":"","category":"0","posts_per_page":"8","order":"{\"orderby\":\"date\",\"order\":\"desc\"}"}}}'
		);	
		$layers_child_presets[ 'portfolio' ] = array(
			  'title' => esc_html__( 'common - Portfolio', 'common' ),
			  'screenshot' => get_stylesheet_directory_uri().'/assets/preset-images/preview/portfolio.jpg',
			  'screenshot_type' => 'jpg',
			  'json' => '{"obox-layers-builder-52":{"layers-widget-em_portfolio-6":{"design":{"layout":"layout-boxed","advanced":{"padding":{"top":"","right":"","bottom":"50","left":""},"margin":{"top":"","right":"","bottom":"","left":""},"anchor":"","customclass":"","customcss":""},"columns":"4","gutter":"on","gutter-CHECKBOX":"on","column-text-color":"","column-background-color":"","background":{"color":"","image":"","repeat":"no-repeat","position":"center","stretch-CHECKBOX":"on","darken-CHECKBOX":"on"},"fonts":{"size":"medium","align":"text-left","color":"","excerpt-color":""}},"show_titles":"on","show_titles-CHECKBOX":"on","show_pagination":"on","show_pagination-CHECKBOX":"on","show_categories":"on","show_categories-CHECKBOX":"on","title":"","excerpt":"","category":"0","posts_per_page":"8","order":"{\"orderby\":\"date\",\"order\":\"desc\"}"}}}'
		);	
		$layers_child_presets[ 'contact' ] = array(
			  'title' => esc_html__( 'common - Contact', 'common' ),
			  'screenshot' => get_stylesheet_directory_uri().'/assets/preset-images/preview/contact.jpg',
			  'screenshot_type' => 'jpg',
			  'json' => '{"obox-layers-builder-58":{"layers-widget-em_contact-6":{"design":{"layout":"layout-fullwidth","advanced":{"padding":{"top":"","right":"","bottom":"0","left":""},"margin":{"top":"","right":"","bottom":"","left":""},"anchor":"","customclass":"","customcss":""},"background":{"color":"","image":"","repeat":"no-repeat","position":"center","stretch-CHECKBOX":"on","darken-CHECKBOX":"on"},"fonts":{"size":"medium","align":"text-left","color":"","excerpt-color":""}},"show_pagination":"on","show_pagination-CHECKBOX":"on","title":"","excerpt":"","t1":"","tx1":"","t2":"","tx2":"","t3":"","tx3":"","t4":"","tx4":"","ccontact":"","gmap":"<iframe src=\"https:\/\/www.google.com\/maps\/embed?pb=!1m18!1m12!1m3!1d459764.56354665145!2d89.38650156731923!3d25.806521559965816!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39e2c8648556f8cb%3A0xfaa7d471019abb1f!2z4KaV4KeB4Kah4Ka84Ka_4KaX4KeN4Kaw4Ka-4KauIOCmnOCnh-CmsuCmvg!5e0!3m2!1sbn!2sbd!4v1496583938130\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen><\/iframe>"},"layers-widget-em_contact-5":{"design":{"layout":"layout-boxed","advanced":{"padding":{"top":"95","right":"","bottom":"70","left":""},"margin":{"top":"","right":"","bottom":"","left":""},"anchor":"","customclass":"","customcss":""},"background":{"color":"","image":"","repeat":"no-repeat","position":"center","stretch-CHECKBOX":"on","darken-CHECKBOX":"on"},"fonts":{"size":"medium","align":"text-center","color":"","excerpt-color":""}},"show_pagination":"on","show_pagination-CHECKBOX":"on","title":"OUR <span>CONTACT<\/span>","excerpt":"<p>Lorem up to date with all our latest news and launches. Only the best quality makes it onto choose us!<\/p>","t1":"","tx1":"","t2":"","tx2":"","t3":"","tx3":"","t4":"","tx4":"","ccontact":"[contact-form-7 id=\"199\" title=\"Contact style-1\"]","gmap":""}}}'
		);			
		return array_merge( $layers_child_presets, $layers_preset_layouts );
	}
	
}

add_filter( 'layers_preset_layouts', 'common_presets', 0 );