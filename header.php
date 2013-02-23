<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
		<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Blog Archive <?php } ?> <?php wp_title(); ?></title>
		
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
		<link rel="Stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" type="text/css" media="screen" />
		
		<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
		
		<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
		<?php wp_head(); ?>
	</head>
	<body>
		<div class="navbar navbar-inverse navbar-static-top">
			<div class="navbar-inner">
				<div class="container-fluid">
					<a class="brand" href="<?php bloginfo('url') ?>" title="<?php bloginfo('name') ?>: <?php bloginfo('description') ?>"><?php bloginfo('name') ?></a>
					<ul class="nav nav-middle">
						<li><a href="<?php echo get_settings('home'); ?>"><?php _e('Home') ?></a></li>
						<?php wp_list_pages('title_li=&depth=2&sort_column=menu_order') ?>
					</ul>
					
					<!-- <form name="s" method="get" class="navbar-search pull-right">
						<input type="text" class="input-medium search-query" id="search" placeholder="Search..." />
					</form> -->
				</div>
			</div>
		</div>
		
		<div class="container-fluid">
			<div class="row-fluid">