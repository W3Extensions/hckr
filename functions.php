<?php


add_theme_support( 'automatic-feed-links' );
add_theme_support( "title-tag" );
register_nav_menu( 'footer', 'Footer Menu' );

if ( ! isset( $content_width ) ) $content_width = 900;


if ( is_singular() && !function_exists("w3ac_comment_template")) wp_enqueue_script( "comment-reply" ); 

add_action( 'wp_enqueue_scripts', 'hckr_theme_enqueue_styles' );
function hckr_theme_enqueue_styles() {
    wp_enqueue_style( 'hckr-theme', get_template_directory_uri() . '/style.css' );

}


function w3hckr_post_term_links($taxonomy, $pid, $type = "link", $prefix = null, $separator = ", ", $suffix = null){
	if(!taxonomy_exists($taxonomy)) return null;

	// NOTE: $suffix is especially handy since it will only be appened if term results are found.
	$result = wp_get_post_terms($pid, $taxonomy, array("fields" => "all"));
	$counter = 0;
	$html = null;
	
	if(!empty($result) && count($result) > 0){
		$html = $prefix;
	
		foreach($result as $r){
			$counter++;
			
			if($type == "link"){
				$url = get_term_link($r->term_id, $taxonomy);		
				$html .= "<a href='".$url."'>".$r->name."</a>";
			} else if ($type = "tag"){
				$html .= $r->name;
			} else if ($type = "hashtag"){
				$html .= "#".strtolower(str_replace(' ','',$r->name)); 
			}
			
			
			// don't append comma if there is only one item (or if this item is the last one). 
			if(count($result) > 1 && $counter !== count($result)){
				$html .= $separator;
			} 			
		}

		$html .= $suffix;
	}

	return $html;
}