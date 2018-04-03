<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta http-equiv="content-type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />
    <meta name="description" content="<?php echo esc_attr( get_bloginfo( 'description' ) ); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <?php wp_head(); ?>	   
</head>
<body <?php body_class(); ?>>

<?php 

global $current_user;

$loginLogout = "";

if(is_user_logged_in()){
	$userLabel = " | ";
	
	if (!empty($current_user->display_name)) {
		$userLabel .= $current_user->display_name;
	} elseif (!empty($current_user->user_firstname)) {
		$userLabel .= $current_user->user_firstname;
	} else  {
		$userLabel .= $current_user->user_login;
	}	
	

	
	$loginLogout = " | <a href='".wp_logout_url()."' title='Logout'>Logout</a>";
} else {

	$userLabel = ""; 

	if ( get_option('users_can_register') ) { 
		$loginLogout = ' | <a href="'.wp_registration_url().'">Register</a>';
	}
	$loginLogout .= " | <a href='".wp_login_url()."'>Login</a>";		
}
?>

<div id="headerBar">		
		<div class="redSquare"> </div> 

		<h1 id="siteTitle"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>

		<a href="<?php echo add_query_arg("order","date"); ?>">Newest</a>  <a href="<?php echo add_query_arg("order","meta_value_num"); ?>">Trending</a> 

		<input type="text" class="searchField" placeholder="Search" required>

		
		<div class="menuBarRight"><?php echo w3db_get_submit_button("Submit"); ?> <?php echo $userLabel ." ".$loginLogout; ?></div>
</div>