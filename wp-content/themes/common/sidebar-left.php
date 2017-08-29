<?php
 /**
* Maybe show the left sidebar
*/


if ( is_active_sidebar( 'sidebar-1' ) ) {?>
	<div class="col-md-4  col-sm-5 col-xs-12 sidebar-right content-widget pdsl">
		<div class="blog-left-side widget">
		
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
		
		</div>
	</div>		
<?php }else{
	if ( is_active_sidebar( 'layers-left-sidebar' ) ) {?>

			<div class="col-md-4  col-sm-5 col-xs-12 lwp sidebar-right content-widget pdsl">
				<div class="blog-left-side widget">
				
					<?php dynamic_sidebar( 'layers-left-sidebar' ); ?>
					
				</div>
			</div>	
		
	<?php } } 
