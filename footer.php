<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */
?>
	</div><!-- #content -->

	<?php
	do_action( 'nordic_theme_after_content' );
	do_action( 'nordic_theme_before_footer' );
	?>

	<footer id="colophon" class="site-footer">
		<?php get_template_part( 'template-parts/footer-widgets' ); ?>

		<div class="grid-container">
			<div class="grid-x">
				<div class="cell medium-6 small-order-2 medium-order-1">
					<div class="site-info">
						<p class="copyright">
							<?php echo sprintf( __( 'Copyright &copy; %s. All rights reserved.', 'nordic-theme' ), date( 'Y' ) . '. ' . esc_html( get_bloginfo( 'name' ) ) ); ?>
						</p>
					</div><!-- .site-info -->
				</div><!-- .cell -->

				<?php if ( has_nav_menu( 'footer' ) ) : ?>
					<div class="cell medium-6 small-order-1 medium-order-2">
						<nav id="footer-navigation" class="footer-navigation" aria-label="<?php esc_html_e( 'Footer Menu', 'nordic-theme' ); ?>">
							<?php
							wp_nav_menu(
									array(
											'container'      => false,
											'theme_location' => 'footer',
											'menu_id'        => 'footer',
											'menu_class'     => 'vertical medium-horizontal menu',
											'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
											'depth'          => 1,
									)
							);
							?>
						</nav><!-- #site-navigation -->
					</div><!-- .cell -->
				<?php endif; ?>
			</div><!-- .grid-x -->
		</div><!-- .grid-container -->
	</footer><!-- #colophon -->

	<?php do_action( 'nordic_theme_after_footer' ); ?>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
