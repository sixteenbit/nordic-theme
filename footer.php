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

	if (
		is_callable( 'FLThemeBuilderLayoutData::get_current_page_footer_ids' )
		&& ! empty( FLThemeBuilderLayoutData::get_current_page_footer_ids() )
		&& is_callable( 'FLThemeBuilderLayoutRenderer::render_footer' )
	) {
		FLThemeBuilderLayoutRenderer::render_footer();
	} else {
		get_template_part( 'template-parts/footer' );
	} ?>

	<?php do_action( 'nordic_theme_after_footer' ); ?>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
