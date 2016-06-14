<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package DroidPress
 */
?>
<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta http-equiv="cleartype" content="on">

<!-- Prefetching, preloading, prebrowsing -->
<link rel="dns-prefetch" href="https://ajax.googleapis.com">
<link rel="dns-prefetch" href="https://maps.googleapis.com">
<!-- <link rel="dns-prefetch" href="//example.com/">
<link rel="preconnect" href="https://www.example.com/">
<link rel="prefetch" href="https://www.example.com/">
<link rel="prerender" href="https://example.com/">
<link rel="subresource" href="styles.css">
<link rel="preload" href="image.png"> -->
<!-- More info: https://css-tricks.com/prefetching-preloading-prebrowsing/ -->

<!--[if lte IE 9]><style>body {display: none;}html{background:red;color:white;max-width:300px;margin:0 auto;}html:before {content: 'IE9 and below is no longer supported by Microsoft. Please upgrade to Windows 10 for a more secure browsing experience.';font-size:1.25em;display: block;margin-top:100%;}</style><![endif]-->

<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=1, shrink-to-fit=no">
<meta name="HandheldFriendly" content="True">
<meta name="MobileOptimized" content="320">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="msapplication-tap-highlight" content="no">
<meta name="designer" content="https://luminusmedia.com">

<!-- More info: https://bitsofco.de/all-about-favicons-and-touch-icons -->
<link rel="apple-touch-icon" href="apple-touch-icon.png">
<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
<!-- <link rel="icon" href="path/to/favicon-16.png" sizes="16x16" type="image/png">
<link rel="icon" href="path/to/favicon-32.png" sizes="32x32" type="image/png">
<link rel="icon" href="path/to/favicon-48.png" sizes="48x48" type="image/png">
<link rel="icon" href="path/to/favicon-62.png" sizes="62x62" type="image/png"> -->

<link rel="author" href="humans.txt">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<!--[if (gt IE 9)]><!-->
<script src="<?php echo get_template_directory_uri() . '/js/libs/modernizr.js' ?>"></script>
<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.5.18/webfont.js"></script>
<script>WebFont.load({ google: { families: [ '' ] }, timeout: 2000 });</script>
<script>WebFont.load({ monotype: { projectId: '' }, timeout: 2000 });</script>
<!--<![endif]-->

<?php wp_head(); ?>
</head>

<body <?php body_class('sticky-body'); ?>>
<?php include( TEMPLATEPATH . '/img/svgsprite.svg' ); ?>

<div id="page" class="site sticky-container">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'luminus' ); ?></a>

	<header class="sticky-row sticky-header" role="banner">
		<div id="masthead" class="site-header">
			<div class="site-branding">
				<h1 class="site-title visuallyhidden"><?php bloginfo( 'name' ); ?></h1>

				<?php $description = get_bloginfo( 'description', 'display' ); ?>
				<?php	if ( $description || is_customize_preview() ) : ?>
					<p class="site-description visuallyhidden"><?php echo $description; /* WPCS: xss ok. */ ?></p>
				<?php endif; ?>

				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<svg aria-hidden="true"><use xlink:href="#logo"></use></svg>
				</a>
			</div>

			<nav id="site-navigation" class="main-navigation" role="navigation">
				<button type="button" class="menu-toggle" aria-label="toggle menu" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'luminus' ); ?></button>

				<?php
					wp_nav_menu( array(
						'theme_location'  => 'primary',
						'menu_id'         => 'primary-menu',
						'container_class' => '',
						'menu_class'      => 'list-reset'
					));
				?>
			</nav>
		</div>
	</header><!-- sticky-header -->

	<main id="main" class="site-main sticky-row sticky-content" role="main">
		<div id="content" class="site-content">
