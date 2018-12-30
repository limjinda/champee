<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
	<head>
	  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<link rel="profile" href="https://gmpg.org/xfn/11" />
		<link rel="icon" href="<?php echo get_template_directory_uri() ?>/img/favicons/favicon.ico" />
		<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri()?>/img/favicons/favicon-32x32.png" sizes="32x32" />
		<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri()?>/img/favicons/android-chrome-192x192.png" sizes="192x192" />
		<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri()?>/img/favicons/favicon-16x16.png" sizes="16x16" />
		<link rel="manifest" href="<?php echo get_template_directory_uri()?>/img/favicons/manifest.json" />
		<link rel="mask-icon" href="<?php echo get_template_directory_uri()?>/img/favicons/safari-pinned-tab.svg" />
		<?php if ( is_single() ) { ?>
			<link rel="prefetch" href="<?php echo bloginfo('url'); ?>">
		<?php } ?>
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="theme-color" content="#ffffff">
		<?php wp_head(); ?>
		<?php the_field('header_scripts', 'option'); ?>
	</head>
	<body <?php body_class() ?>>
		<?php the_field('body_scripts', 'option'); ?>
		<div class="wrapper">
			<main class="main">
				<div class="container page-wrapper">
					<?php get_template_part('views/component', 'sidebar'); ?>
