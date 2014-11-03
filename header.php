<?php
/**
 * The Header
 *
 * @package WordPress
 * @subpackage WP Blank Template
 * @since WP Blank Template 0.1
 */
?>
<!doctype html>
<html lang="es" class="no-js">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php wpbt_title(); ?></title>

    
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
	<?php // Fav icons ?>	
	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri();?>/img/favicon.png">
	<link rel="apple-touch-icon" href="<?php echo get_stylesheet_directory_uri();?>/img/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_stylesheet_directory_uri();?>/img/apple-touch-icon-72x72.png" />
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_stylesheet_directory_uri();?>/img/apple-touch-icon-114x114.png" />

	<?php wp_head(); ?>
</head>

<body>
	<header class="site-header" role="banner">
	</header>