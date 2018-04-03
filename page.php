<?php get_header(); ?>
<div id="mainWrapper">
	<div id="contentArea" class="narrow">
		<?php
			if ( have_posts() ) :
				while ( have_posts() ) : the_post(); ?>
					<h2 class="pageTitle"><?php the_title(); ?></h2>
					<article>
						<?php the_content(); ?>
					</article>
			<?php	
				endwhile;
			endif;
		?>
	</div>
</div>
<?php get_footer(); ?>
