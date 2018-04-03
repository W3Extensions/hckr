<?php get_header(); ?>
<div id="mainWrapper">
	<div id="contentArea">
		<?php
			get_template_part("loop");				
			comments_template();
		?>
	</div>
</div>
<?php get_footer(); ?>
