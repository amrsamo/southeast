<?php
/**
 * This partial is used for displaying single post (or page) content
 *
 * @package Layers
 * @since Layers 1.0.0
 */

?>
		<div class="common-single-blog-details">
			<?php if(has_post_thumbnail()){?>
				<div class="common-single-blog--thumb">
					<?php the_post_thumbnail('common-blog-single'); ?>
				</div>									
			<?php } ?>
			
			<div class="common-single-blog-title current-details-title">
				<h2><?php the_title(); ?></h2>	
			</div>
					
			
			<?php if( 'post' == get_post_type() ) { ?>
					<!-- BLOG POST META  -->
					<div class="common-blog-meta current-details-meta">
					
						<div class="common-blog-meta-left ">
							
							<span><i class="fa fa-clock-o"></i><?php echo get_the_time('d'); ?> <?php echo get_the_time('M'); ?></span>
							<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><i class="fa fa-user"></i> <?php the_author(); ?></a>
							<span><i class="fa fa-folder-o"></i><?php the_category( ' / ' ); ?></span>
						</div>
						
						
						<div class="common-blog-meta-right">					
							<a href="<?php comments_link(); ?>"><i class="fa fa-comment"></i>
								<?php comments_number( '0', '1', '%' ); ?>.
							</a>
						</div>
					</div>
			<?php } // if post ?>
			
			<?php 
			
			if ( '' != get_the_content() ) { ?>
			<div class="common-single-blog-content">
				<div class="single-blog-content">
					<?php the_content(); ?>
					<div class="page-list-single">						
						<?php 
						/**
						* Display In-Post Pagination
						*/
						wp_link_pages( array(
							'link_before'   => '<span>',
							'link_after'    => '</span>',
							'before'        => '<p class="inner-post-pagination">' . __('<span>Pages:</span>', 'common'),
							'after'     => '</p>'
						)); ?>					
											
					</div>
				</div>
			</div>
			<?php } ?>

			<?php if( 'post' == get_post_type() ) { ?>	
				
				<div class="common-blog-social">
					<div class="common-single-icon">
						<?php common_blog_sharing(); ?>
					</div>
				</div>
				
			<?php } ?> 	
		</div>

	<?php comments_template();