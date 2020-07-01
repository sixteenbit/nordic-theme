<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<section class="error-404 not-found text-center">
				<header class="page-header padding-top-3">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'nordic-theme' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content grid-container">
					<div class="grid-x grid-padding-x">
						<div class="cell small-12 medium-10 medium-offset-1 large-8 large-offset-2">
							<p class="lead"><?php esc_html_e( 'The page you are looking for does not exist. It may have been moved, or removed altogether. Perhaps you can return back to the site\'s homepage and see if you can find what you are looking for.', 'nordic-theme' ); ?></p>

							<a class="button" href="<?php echo site_url(); ?>"><i class="fal fa-long-arrow-left"></i> <?php esc_html_e( 'Back Home', 'nordic-theme' ); ?></a>
						</div>
					</div>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
