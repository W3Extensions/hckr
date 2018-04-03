<?php
	global $post, $current_user, $userID;
	
	$userID = intval($current_user->ID);
	$count = 0;

	echo "<ol class='resultList'>";
	
	if ( have_posts() ) :
		while ( have_posts() ) : the_post();

		if(function_exists("w3vx_get_vote_data")){
			if(intval($post->post_author) == $userID) {
			   $disable = " disable";
			   $active = "active";
			} else {
			   $disable = null;
			   $active = null;
			}
		} else 
		
		
		?>

		<li id="post-<?php the_ID(); ?>"  <?php post_class("resultItem"); ?>>
			<div class="leftColumn">
			<?php if(function_exists("w3vx_update_vote")){ ?>
				<div class="btn-group vote-buttons-wrapper post-vote vertical chevron" role="group" aria-label="Vote Buttons" id="voteButton-<?php echo $post->ID; ?>" data-id="<?php echo $post->ID; ?>" data-type="post">
					<div class="vote-button vote-up  <?php echo $disable; ?> <?php echo $active; ?>" data-vote="up" data-pid="<?php echo $post->ID; ?>"  data-type="post"></div>
					<div class="vote-button vote-down  <?php echo $disable; ?> " data-vote="down" data-pid="<?php echo $post->ID; ?>"  data-type="post"></div>
				</div>
			<?php } else {
						$count++;
						echo $count.".";
			
			} ?>
			</div>
			
			<div class="rightColumn">
				<span class="postTitle"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span> <?php the_tags(""); ?>
				<?php echo w3hckr_post_term_links("domain", $post->ID, "link", "<span class='resultItemDomain'>(", ", ", ")</span>"); ?>
				<div class="metaData">
					<span class="vote-count" id="postVoteCount-<?php echo $post->ID; ?>"></span> points | <span class="resultItemAuthor">posted by <a href="<?php echo get_author_posts_url( $post->post_author ); ?>"><?php echo get_the_author_meta('user_nicename'); ?></a></span> | <?php the_time( get_option( 'date_format' ) ); ?> | <?php edit_post_link(null, null, " | "); ?> <span class="resultItemCommentCount"><a href="<?php comments_link(); ?>"><?php comments_number("0 Comments"); ?></a></span>
				</div>
			</div>
			
			<?php wp_link_pages(); ?>			
		</li>
<?php
		endwhile;
	endif;

	echo "</ol>";

?>

