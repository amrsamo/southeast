<?php
// theme fallback menu
if(!function_exists('common_fallback_menu')){
	
	function common_fallback_menu(){?>

		<ul class="main-menu clearfix">
			<li><a href="<?php echo admin_url('nav-menus.php'); ?>"><?php esc_html_e('Create Menu','common'); ?></a></li>
		</ul>	
	<?php }			
}

// theme main menu
if(!function_exists('common_main_menu')){
	
	function common_main_menu(){
		wp_nav_menu(array(
			 'theme_location' =>'layers-primary',
			 'container'      => false,
			 'menu_class' =>'sub-menu',
			 'fallback_cb' =>'common_fallback_menu',									
		));
	}
}
// theme main menu
if(!function_exists('common_one_page_menu')){
	
	function common_one_page_menu(){
		wp_nav_menu(array(
			 'theme_location' =>'one-pages',
			 'container'      => false,
			 'menu_class' =>'sub-menu nav_scroll',
			 'fallback_cb' =>'common_fallback_menu',									
		));
	}
}
// theme main menu
if(!function_exists('common_mobile_menu')){
	
	function common_mobile_menu(){
		wp_nav_menu(array(
			 'theme_location' =>'menu-3',
			 'container'      => false,
			 'menu_class' =>'main-menu clearfix',
			 'fallback_cb' =>'common_fallback_menu',									
		));
	}
}

// theme logo 1 setting 
if(!function_exists('common_main_logo')){				
	function common_main_logo(){
	 global $common_opt;
	 if(is_ssl()){
	  $common_opt['common_logo']['url'] = str_replace('http:', 'https:', $common_opt['common_logo']['url']);
	 }
	 ?>

	  <?php if( isset($common_opt['common_logo']['url']) ){ ?>
	  
		<div class="logo">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
				<img src="<?php echo esc_url($common_opt['common_logo']['url']); ?>" alt="<?php bloginfo( 'name' ); ?>" />
			</a>
		
		</div>	  

	  <?php
	  
	  } else { ?>
	  
			<div class="logo_area">
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1><?php 
	  			$description = get_bloginfo( 'description', 'display' );
				$description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : ?>
				<p class="site-description"><?php echo esc_html( $description ); ?></p>
			<?php endif; ?>
			
			</div>	 					
	 
	<?php  }
	}
}


// theme logo 2 setting 
if(!function_exists('common_onepage_logo')){				
	function common_onepage_logo(){
	 global $common_opt;
	 if(is_ssl()){
	  $common_opt['common_onepage_logo']['url'] = str_replace('http:', 'https:', $common_opt['common_onepage_logo']['url']);
	 }
	 ?>

	  <?php if( isset($common_opt['common_onepage_logo']['url']) ){ ?>
	  
		<div class="logo">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
				<img src="<?php echo esc_url($common_opt['common_onepage_logo']['url']); ?>" alt="<?php bloginfo( 'name' ); ?>" />
			</a>
		
		</div>	  

	  <?php
		}
	}
}
// theme logo 3 setting 
if(!function_exists('common_ts_logo')){				
	function common_ts_logo(){
	 global $common_opt;
	 if(is_ssl()){
	  $common_opt['common_ts_logo']['url'] = str_replace('http:', 'https:', $common_opt['common_ts_logo']['url']);
	 }
	 ?>

	  <?php if( isset($common_opt['common_ts_logo']['url']) ){ ?>
	  
		<div class="logo">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
				<img src="<?php echo esc_url($common_opt['common_ts_logo']['url']); ?>" alt="<?php bloginfo( 'name' ); ?>" />
			</a>
		
		</div>	  

	  <?php
		}
	}
}

/* login option */
if(!function_exists('common_login')){
	function common_login(){
		if (is_user_logged_in()) {?>
			<a href="<?php echo esc_url(wp_logout_url(get_permalink()));?>"><i class="fa fa-user"></i> <?php esc_html_e('Logout','common');?></a>
			<?php }else{?> 

			<a href="<?php echo esc_url(wp_login_url( get_permalink() ));?>"><i class="fa fa-user"></i> <?php esc_html_e('Login','common');?></a>
			<a href="<?php echo esc_url(wp_registration_url(get_permalink()));?>"><i class="fa fa-key"></i> <?php esc_html_e('Register','common');?></a>

		<?php }		

	}
}


/**
* Print pagination
*
* @param    array           $args           Arguments for this function, including 'query', 'range'
* @param    string         $wrapper        Type of html wrapper
* @param    string         $wrapper_class  Class of HTML wrapper
* @echo     string                          Post Meta HTML
*/
if( !function_exists( 'common_pagination' ) ) {
	function common_pagination( $args = NULL , $wrapper = 'div', $wrapper_class = 'paginations' ) {

		// Set up some globals
		global $wp_query, $paged;

		// Get the current page
		if( empty($paged ) ) $paged = ( get_query_var('page') ? get_query_var('page') : 1 );

		// Set a large number for the 'base' argument
		$big = 99999;

		// Get the correct post query
		if( !isset( $args[ 'query' ] ) ){
			$use_query = $wp_query;
		} else {
			$use_query = $args[ 'query' ];
		} ?>

		<<?php echo esc_html($wrapper); ?> class="<?php echo esc_html($wrapper_class); ?>">
			<?php echo paginate_links( array(
				'base' => str_replace( $big, '%#%', get_pagenum_link($big) ),
				'prev_next' => true,
				'mid_size' => ( isset( $args[ 'range' ] ) ? $args[ 'range' ] : 5 ) ,
				'prev_text' => '<i class="fa fa-long-arrow-left"></i>',
				'next_text' => '<i class="fa fa-long-arrow-right"></i>',
				'type' => 'list',
				'current' => $paged,
				'total' => $use_query->max_num_pages
			) ); ?>
		</<?php echo esc_html($wrapper); ?>>
	<?php }
} // common_pagination


if( !function_exists( 'common_slider_o' ) ) {
 function common_slider_o( $file_list_meta_key, $img_size = 'full' ) {

  // Get the list of files
  $files = get_post_meta( get_the_ID(), $file_list_meta_key, 1 );

  // Loop through them and output an image
  foreach ( (array) $files as $attachment_id => $attachment_url ) {
   echo '<div class="gitem">';
   echo wp_get_attachment_image( $attachment_id, $img_size );
   echo '</div>';
  }
 }
}


//common comment form
add_filter('comment_form_default_fields','common_comments_form');
if(!function_exists('common_comments_form')){
    function common_comments_form($default){
			$default['author'] = '<div  class="comment_forms"><div  class="comment_forms_inner">
			
			<div class="comment_field"><div class="input-field">
				<label for="name">'.esc_html__('Name','common').'<em>*</em></label>
				<input id="name" name="author" type="text" placeholder="Your Name"/>
			</div>';

			$default['email'] = '
			<div class="input-field">
				<label for="email">'.esc_html__('E-mail Address','common').'<em>*</em></label>
				<input id="email"  name="email"type="text" placeholder="Email Address"/>
			</div>';	

			$default['title'] = '
			<div class="input-field">
				<label for="title">'.esc_html__('Website','common').'<em></em></label>
				<input id="title" name="url" type="text" placeholder="Your Website"/>
			</div> </div>';	
			$default['url']='';
			$default['message'] ='<div class="comment_field"><div class="textarea-field"><label for="comment">'.esc_html__('Comment','common').'<em>*</em></label><textarea name="comment" id="comment" cols="30" rows="10" placeholder="Write your comment..."></textarea></div></div>   </div></div>';																		

 
        return $default;
    }
}
add_filter('comment_form_defaults','common_form_default');

 if(!function_exists('common_form_default')){
    function common_form_default($default_info){
        if(!is_user_logged_in()){
            $default_info['comment_field'] = '';
        }else{
            $default_info['comment_field'] = '<div  class="comment_forms"><div  class="comment_forms_inner"> <div class="comment_field"><div class="textarea-field"><label for="comment">'.esc_html__('Comment','common').'<em>*</em></label><textarea name="comment" id="comment" cols="30" rows="10" placeholder="Write your comment..."></textarea></div></div> </div></div>';
        }
         
        $default_info['submit_button'] = '<button class="common_btn" type="submit">'.esc_html__('Post Comment','common').'</button>';
        $default_info['submit_field'] = '%1$s %2$s';
        $default_info['comment_notes_before'] = ' ';
        $default_info['title_reply'] = esc_html__('POST YOUR COMMENT ','common');
        $default_info['title_reply_before'] = '<div class="commment_title"><h3> ';
        $default_info['title_reply_after'] = '</h3></div> ';
 
        return $default_info;
    }
 
 }

if( !function_exists( 'common_comment' ) ) {
	
	function common_comment($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment;?>
	
		<div class="post_comment">
			<div class="comment_inner">
				<div class="post_replay">
					<div class="post_replay_content">											
						<div class="post_replay_inner">	

							<div <?php comment_class( 'my_rp_class' ); ?> id="comment-<?php comment_ID(); ?>">
									
									
								<!-- avatar -->
								<div class="post_reply_thumb">
									 <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"> <?php echo get_avatar($comment,80); ?></a>
								</div>
										

								<!-- reply text -->	
								<div class="post_reply">
									<div class="st"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php echo get_comment_author(); ?></a></div>

									<div class="reply_date">
									<span class="span_left"><?php echo get_comment_date(get_option('date_format')); ?></span>
									<?php comment_reply_link(array_merge( $args, array('reply_text' => '<span class="span_right">'. __('REPLY','common').'</span>','depth' => $depth, 'max_depth' => $args['max_depth']))) ?>		
									</div>		
									<p><?php comment_text() ?></p>
									<div class="edit_comment"><?php edit_comment_link(esc_html__('(Edit)' , 'common' ),'<small class="ecome">','</small>') ?>
									</div>
								</div>
								
																
							</div>
								
			
						</div>
					</div>																
				</div>
			</div>
		</div>				
			


	<?php }
}


/*=  BLOG SOCIAL SHARING LINKS  =*/

if ( ! function_exists('common_blog_sharing') ) {
 function common_blog_sharing( ) {
  global $post;

  $html = '<div class="common-single-icon-inner">';

   // facebook
   $facebook_url = 'https://www.facebook.com/sharer/sharer.php?u='. get_the_permalink();
   $html .= '<a href="'. esc_url( $facebook_url ) .'" target="_blank"><i class="fa fa-facebook"></i></a>';

   // twitter
   $twitter_url = 'https://twitter.com/share?'. esc_url(get_permalink()) .'&amp;text='. get_the_title();
   $html .= '<a href="'. esc_url( $twitter_url ) .'" target="_blank"><i class="fa fa-twitter"></i></a>';
   
   // google plus
   $google_plus_url = 'https://plus.google.com/share?url='. esc_url(get_permalink());
   $html .= '<a href="'. esc_url( $google_plus_url ) .'" target="_blank"><i class="fa fa-google-plus"></i></a>';
   
   // linkedin
   $linkedin_url = 'http://www.linkedin.com/shareArticle?url='. esc_url(get_permalink()) .'&amp;title='. get_the_title();
   $html .= '<a href="'. esc_url( $linkedin_url ) .'" target="_blank"><i class="fa fa-linkedin"></i></a>';
   
   // pinterest
   $pinterest_url = 'https://pinterest.com/pin/create/bookmarklet/?url='. esc_url(get_permalink()) .'&amp;description='. get_the_title() .'&amp;media='. esc_url(wp_get_attachment_url( get_post_thumbnail_id($post->ID)) );
   $html .= '<a href="'. esc_url( $pinterest_url ) .'" target="_blank"><i class="fa fa-pinterest"></i></a>';
   
   // reddit
   $reddit_url = 'http://reddit.com/submit?url='. esc_url(get_permalink()) .'&amp;title='. get_the_title();
   $html .= '<a href="'. esc_url( $reddit_url ) .'" target="_blank"><i class="fa fa-reddit"></i></a>';
  
  $html .= '</div>';

  echo ''. $html;
 }
}


