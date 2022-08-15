<?php

add_action( 'wp_enqueue_scripts', 'bappi_child_enqueue_style' );
function bappi_child_enqueue_style() {

	$parent_handle = 'bappi-style';
	$theme = wp_get_theme();

	session_start();
	if( isset($_GET['bappi_day_or_night']) ) {
		$_SESSION['bappi_day_or_night'] = filter_input(INPUT_GET, 'bappi_day_or_night', FILTER_SANITIZE_STRING);
	}
	if( isset($_SESSION['bappi_day_or_night']) && $_SESSION['bappi_day_or_night'] == 'day' ) {
		wp_enqueue_style(
			'bappi-child-day-theme-style',
			get_stylesheet_directory_uri() . '/day.css',
			array(),
			$theme->get('Version')
		);
	}

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
