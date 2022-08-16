<?php
// include "./phpfiglet_class.php";
include get_stylesheet_directory() . "/phpfiglet_class.php";
add_action( 'wp_enqueue_scripts', 'bappi_child_enqueue_style' );
function bappi_child_enqueue_style() {
	$parent_handle = 'bappi-style';
	$theme = wp_get_theme();
	wp_enqueue_style($parent_handle, get_template_directory_uri() . '/style.css', array(), $theme->parent()->get('Version'));
	wp_enqueue_style('bappi-child-style', get_stylesheet_uri(), array($parent_handle), $theme->get('Version'));
}

function ascii_banner($input_string) {
	exit($input_string);
	$figlet = new phpFiglet(); 
	if ($figlet->loadFont(get_stylesheet_directory() . "/small.flf")) {
		$return_string = $figlet->fetch($input_string);
	} else {
		$return_string = $input_string;
	}
	return $return_string;
}
