<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bappi
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<input type="hidden" id="entry-title-value-of-entry-<?php the_ID(); ?>" value="<?php the_title(); ?>">
		<?php
		if ( is_singular() ) :
			?>
			<h1 class="entry-title entry-title-typer" id="of-entry-<?php the_ID(); ?>"></h1>
			<?php
		else :
			?>
			<h2 class="entry-title">
				<a
					class="entry-title-typer"
					id="of-entry-<?php the_ID(); ?>"
					href="<?php echo esc_url( get_permalink() ); ?>"
					rel="bookmark">
				</a>
			</h2>
			<?php
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				bappi_posted_on();
				bappi_posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php bappi_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		the_content( sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'bappi' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		) );

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'bappi' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php bappi_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
