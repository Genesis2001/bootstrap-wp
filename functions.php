<?php

add_filter( 'the_tags', 'bootstrap_tags', 10, 1 );
function bootstrap_tags( $html )
{
	# ref: http://wpsnipp.com/index.php/functions-php/add-a-custom-class-to-the_tags/
	$post_id = get_the_ID();
	$html = str_replace( '<a', '<a class="btn btn-mini"', $html );
	
	return $html;
}

function bootstrap_the_category( $sep = ' ' )
{
	$categories	= (array) get_the_category();
	$list		= array( );
	
	foreach ($categories as $cat)
	{
		$link = get_category_link( $cat->term_id );
		$list[] = '<a class="btn btn-primary btn-mini" href="'.$link.'">'.$cat->name.'</a>';
	}
	
	echo implode( $sep, $list );
}

add_action( 'init', 'bootstrap_wp_init' );
function bootstrap_wp_init()
{
	remove_action( 'admin_footer', 'wp_admin_bar_render', 1000 );
	remove_action( 'wp_footer', 'wp_admin_bar_render', 1000 );
	
	function remove_admin_bar_style_backend()
	{
		echo '<style>body.admin-bar #wpcontent, body.admin-bar #adminmenu { padding-top: 0px !important; }</style>';
	} 
	add_filter('admin_head', 'remove_admin_bar_style_backend');

	function remove_admin_bar_style_frontend()
	{
		echo '<style type="text/css" media="screen">
		html { margin-top: 0px !important; }
		* html body { margin-top: 0px !important; }
		</style>';
	}
	add_filter('wp_head', 'remove_admin_bar_style_frontend', 99);	
	
	bootstrap_register_nav_menus();
}
function bootstrap_register_nav_menus()
{
	register_nav_menus(array(
		'nav-menu' => __('Navigation'),
	));
}


if ( function_exists('wp_pagenavi') )
{
	add_filter( 'wp_pagenavi', 'wp_pagenavi_filter' );
	
	function wp_pagenavi_filter( $html )
	{
		$html = str_replace( '<div class="pagination">', '<div class="pagination"><ul>', $html );
		$html = str_replace( '<span class="current', '<li class="active', $html );
		$html = str_replace( '</span>', '</li>', $html );
		$html = str_replace( '</a>', '</a></li>', $html );
		$html = str_replace( '<a', '<li><a', $html );
		$html = str_replace( '</div>', '</ul></div>', $html );
		
		return $html;
	}
}
else
{
	add_filter( 'next_posts_link_attributes',		'next_css_links' );
	add_filter( 'previous_posts_link_attributes',	'prev_css_links' );
	
	function next_css_links()
	{
		return ' class="next"';
	}
	
	function prev_css_links()
	{
		return ' class="previous"';
	}
}
