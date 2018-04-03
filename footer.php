<?php
	$defaults = array(
		'theme_location'  => 'footer',
		'menu'            => '',
		'container'       => 'div',
		'container_class' => '',
		'container_id'    => '',
		'menu_class'      => 'menu',
		'menu_id'         => 'FooterNavLinks',
		'echo'            => true,
		'fallback_cb'     => false,
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
		'depth'           => 0,
		'walker'          => ''
	);
?>
	<div class="row" id="footerBar">
		<div class="footerBarLeft">
			Copyright <?php bloginfo( 'name' ); ?>
		</div>
		
		<div class="footerBarRight">
			<?php wp_nav_menu( $defaults ); ?>	
		</div>	
	</div>	

	<?php wp_footer(); ?>
</body>
</html>