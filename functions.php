<?php

add_action( 'wp_enqueue_scripts', 'bappi_child_enqueue_style' );
function bappi_child_enqueue_style() {
	$parent_handle = 'bappi-style';
	$theme = wp_get_theme();
	wp_enqueue_style(
		$parent_handle,
		get_template_directory_uri() . '/style.css',
		array(),
		$theme->parent()->get('Version')
	);
	wp_enqueue_style(
		'bappi-child-style',
		get_stylesheet_uri(),
		array($parent_handle),
		$theme->get('Version')
	);
}

// Enqueues the typer library, for creating typewriter effect, which I've forked
// and included as a submodule of this theme.
add_action( 'wp_enqueue_scripts', 'bappi_child_enqueue_typer');
function bappi_child_enqueue_typer() {
	$theme = wp_get_theme();
	wp_enqueue_style(
		'typer-css',
		get_stylesheet_directory_uri() . '/typer/src/typer.css',
		array(),
		$theme->get('Version')
	);
	wp_enqueue_script(
		'typer-js',
		get_stylesheet_directory_uri() . '/typer/src/typer.js',
		array(),
		$theme->get('Version'),
		false
	);
}
