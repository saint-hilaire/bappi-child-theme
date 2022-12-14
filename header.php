<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bappi
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#content">
			<?php esc_html_e('Skip to content', 'bappi'); ?>
		</a>
		<header id="masthead" class="site-header">
			<div class="backgorund-image text-center">
				<?php

				if (get_header_image()) : ?>
					<img alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" src="<?php header_image(); ?>" width="<?php echo absint(get_custom_header()->width); ?>" height="<?php echo absint(get_custom_header()->height); ?>">
				<?php
				endif;
				?>
			</div>
			<div class="row">
				<div class="site-branding">
				

         
					<?php if (has_custom_logo()) : ?>
						<div class="site-logo"><?php the_custom_logo(); ?></div>
					<?php endif; ?>
					<div class="header-content">
						<?php
						if(!has_custom_logo()):
							if (display_header_text()==true ):
								if (is_front_page() && is_home()) :
								?>
									<h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
								<?php
								else :
								?>
									<p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
								<?php
								endif;
							endif;
						endif;
						if (display_header_text()==true ):
							?>
							<div class="site-description"><?php echo get_bloginfo('description'); ?></div>
							<?php
						endif;
						?>

						<nav id="site-navigation" class="main-navigation">
							<button type="button" class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">

								<span class="dashicons dashicons-menu"></span>

							</button>



							<?php
							wp_nav_menu(array(
								'theme_location' => 'menu-1',
								'menu_id'        => 'primary-menu',
							));
							?>

							<?php
							$day_night_uri = $_SERVER['REQUEST_URI'];
							if( strpos($day_night_uri, "?") === false ) {
								$day_night_uri .= "?";
							} else {
								$day_night_uri .= "&";
							}
							if(
								isset($_SESSION['bappi_day_or_night']) &&
								$_SESSION['bappi_day_or_night'] == 'day'
							) {
								$day_night_uri .= "bappi_day_or_night=night";
							} else {
								$day_night_uri .= "bappi_day_or_night=day";
							}
							?>

							<a href="<?php echo $day_night_uri; ?>">Day/Night mode</a>
						</nav><!-- #site-navigation -->
					</div>
				</div><!-- .site-branding -->


			</div>
		</header><!-- #masthead -->

		<div id="content" class="site-content">
			<div class="row">
