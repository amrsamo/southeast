<?php 
/*
single details page

*/
?>							
<div class="common-single-blog-details theme-page">
	<?php if(has_post_thumbnail()){?>
		<div class="common-single-blog--thumb">
			<?php the_post_thumbnail(); ?>
		</div>									
	<?php } ?>
	
	<div class="common-single-blog-title current-page-title">
		<h2><?php the_title(); ?></h2>	
	</div>
	
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
</div>

<?php 
 comments_template();

