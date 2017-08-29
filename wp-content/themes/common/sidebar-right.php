<?php /**
* Maybe show the right sidebar
*/


if ( is_active_sidebar( 'sidebar-2' ) ) {?>

	<div class="col-md-4  col-sm-5 col-xs-12 ownwp  sidebar-right content-widget pdsr">
		<div class="blog-left-side widget">
		
			<?php dynamic_sidebar( 'sidebar-2' ); ?>
			
		</div>
	</div>	

<?php }else{
	if ( is_active_sidebar( 'layers-right-sidebar' ) ) {?>

			<div class="col-md-4  col-sm-5 col-xs-12 lwp sidebar-right content-widget pdsr">
				<div class="blog-left-side widget">
				
					<?php dynamic_sidebar( 'layers-right-sidebar' ); ?>
					
				</div>
			</div>	
		
	<?php } } 


	
	
	
	
	
	
	
	
	
	
	
