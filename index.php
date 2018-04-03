<?php get_header(); ?>
<div id="mainWrapper">
	<div id="contentArea">
	<?php
		get_template_part("loop");
		
	?>	

		<div class="pagination">
		<?php			
			if( get_previous_posts_link() ) :
				previous_posts_link( '&larr; Previous', 0 );			
			endif; 
			
			echo " &nbsp; ";
			
			if( get_next_posts_link() ) :
				next_posts_link( 'Next &rarr;', 0 );			
			endif;
			
		?>
		</div>
	</div>
</div>

<?php get_footer(); ?>
