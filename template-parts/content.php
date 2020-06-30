<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php get_template_part( 'template-parts/entry-header' ); ?>

	<?php nordic_theme_post_thumbnail(); ?>

	<div class="entry-content">
		<div class="grid-container">
			<div class="grid-x grid-padding-x">
				<div class="cell small-12 medium-10 medium-offset-1 large-8 large-offset-2">
					<?php
					if ( is_search() || ! is_singular() ) {
						the_excerpt();
					} else {
						the_content( __( 'Continue reading', 'nordic-theme' ) );
					}

					?>

					<div class="entry-categories">
						<span class="screen-reader-text"><?php _e( 'Categories', 'nordic-theme' ); ?></span>
						<div class="entry-categories-inner">
							<?php the_category( ', ' ); ?>
						</div><!-- .entry-categories-inner -->
					</div><!-- .entry-categories -->

					<?php
					wp_link_pages(
						array(
							'before'      => '<nav class="post-nav-links" aria-label="' . esc_attr__( 'Page', 'nordic-theme' ) . '"><span class="label secondary">' . __( 'Pages:', 'nordic-theme' ) . '</span>',
							'after'       => '</nav>',
							'link_before' => '<span class="page-number">',
							'link_after'  => '</span>',
						)
					);

					if ( is_single() ) {
						get_template_part( 'template-parts/navigation' );
					}

					edit_post_link(
						sprintf(
							wp_kses(
									/* translators: %s: Name of current post. Only visible to screen readers */
								__( 'Edit <span class="screen-reader-text">%s</span>', 'nordic-theme' ),
								array(
									'span' => array(
										'class' => array(),
									),
								)
							),
							get_the_title()
						),
						'<span class="edit-link">',
						'</span>'
					);

					?>
				</div><!-- .cell -->
			</div><!-- .grid-x -->
		</div><!-- .grid-container -->
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
