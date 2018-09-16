<?php
/**
 * The Header.
 *
 * @package WordPress
 * @subpackage Judgment
 * @since Judgment 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php bloginfo('name'); wp_title( '|', true, 'left' ); ?></title>
<link href="http://fonts.googleapis.com/css?family=Noto+Sans" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php wp_enqueue_script('jquery'); ?>
<?php wp_head(); ?>
<script src="<?php echo get_template_directory_uri(); ?>/js/script.js" type="text/javascript"></script>
</head>

<body <?php body_class(); ?>>

	<div id="container">
		<div id="head">
			<div id="head-background-overlay"></div>
			<?php  $args = array( 'menu' => 'judgment','container' => false, 'menu_id' => 'nav', 'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>', 'theme_location' => 'primary-menu');
        		wp_nav_menu($args); 
        		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        	?>
		</div>
	
	
		<div id="content">
			<div>