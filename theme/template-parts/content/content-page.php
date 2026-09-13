<?php
/**
 * Template part for displaying pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package jaffrey-democrats
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<?php
        // If it's not the front page and the content doesn't already contain an H1, display the title.
        if ( ! is_front_page() && ! jaffrey_democrats_page_title() ) :
            the_title( '<h1 class="entry-title">', '</h1>' );
        endif;
        ?>
	</header><!-- .entry-header -->

	<?php jaffrey_democrats_post_thumbnail(); ?>

	<div <?php jaffrey_democrats_content_class( 'entry-content' ); ?>>
		<?php
		the_content();

		wp_link_pages(
			array(
				'before' => '<div>' . __( 'Pages:', 'jaffrey-democrats' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers. */
						__( 'Edit <span class="sr-only">%s</span>', 'jaffrey-democrats' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>

</article><!-- #post-<?php the_ID(); ?> -->
