<div class="search">
	<form action="<?php echo home_url( '/' ); ?>" method="get">
	<input type="text" name="s" value="<?php the_search_query(); ?>" placeholder="<?php echo esc_attr_e( 'Type Your Keyword', 'common' ) ?>" title="<?php echo esc_attr_e( 'Search for:', 'common' ) ?>" />
	<button  type="submit" class="icons">
		<i class="fa fa-search"></i>
	</button>
	</form>
</div>

		
		
		