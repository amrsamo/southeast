<?php
/**
 * Template part for displaying archive posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package common
 */

?>

	<!-- SEARCH QUERY -->
	<div class="col-md-6 col-sm-12 col-xs-12">
				
		<!-- BLOG QUERY -->
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<!-- SINGLE BLOG -->											
				<div class="common-single-blog">													
					<!-- BLOG THUMB -->
					<?php if(has_post_thumbnail()){?>
						<div class="common-blog-thumb home-b">
							<a href="<?php the_permalink(); ?>"> <?php the_post_thumbnail('common-blog-default'); ?> </a>
						
							<!-- BLOG POST META  -->
							<div class="common-blog-meta home-meta">
								<div class="common-blog-meta-inner ">
								
									<div class="common-blog-meta-left">
										<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><i class="fa fa-user"></i> <?php the_author(); ?></a>									
										<span><i class="fa fa-clock-o"></i><?php echo get_the_time('d'); ?> <?php echo get_the_time('M'); ?></span>
									</div>
									<div class="common-blog-meta-right">					
										
										<a href="<?php comments_link(); ?>"><i class="fa fa-comment"></i>
											<?php comments_number( '0', '1', '%' ); ?>.
										</a>
									</div>
								</div>	
							</div>	
					
						</div>									
					<?php }else{
						echo layers_post_featured_media( array( 'postid' => get_the_ID(), 'wrap_class' => '', 'size' => 'common-blog-default' ) );
					} ?>
					<!-- BLOG TITLE AND CONTENT -->
					<div class="blog-inner hbginner">
						<div class="blog-content home-blog-title">
							<h2><a href="<?php the_permalink(); ?>"><?php common_title(5); ?></a></h2>
							<?php echo wp_trim_words( get_the_content(), 20, ' ...' ); ?>
						</div>
					</div>	
								
				</div>
		</div>		
		
		
	</div><!-- #post-## -->
