<!DOCTYPE html>
<!--[if IE 8]> <html <?php language_attributes(); ?> class="ie8"> <![endif]-->
<!--[if !IE]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<title><?php wp_title( '|', true, 'right' ); ?></title>	
	
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">

</head>
<body <?php body_class(); ?>>

	<header id="header" class="main-header">
		<h1>Header</h1>	
	</header>


	<?php $options = get_option( 'sample_theme_options' ); ?>

	<?php echo $options['sometext']; ?>

	