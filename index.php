<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php

			$archive_title    = '';
			$archive_subtitle = '';

			if ( is_search() ) {
				global $wp_query;

				$archive_title = sprintf(
					'%1$s %2$s',
					'<span class="screen-reader-text">' . __( 'Search:', 'nordic-theme' ) . '</span>',
					'&ldquo;' . get_search_query() . '&rdquo;'
				);

				if ( $wp_query->found_posts ) {
					$archive_subtitle = sprintf(
						/* translators: %s: Number of search results */
						_n(
							'We found %s result for your search.',
							'We found %s results for your search.',
							$wp_query->found_posts,
							'nordic-theme'
						),
						number_format_i18n( $wp_query->found_posts )
					);
				} else {
					$archive_subtitle = __( 'We could not find any results for your search. You can give it another try through the search form below.', 'nordic-theme' );
				}
			} elseif ( ! is_home() ) {
				$archive_title    = get_the_archive_title();
				$archive_subtitle = get_the_archive_description();
			}

			if ( $archive_title || $archive_subtitle ) {
				?>

				<header class="archive-header">
					<?php if ( $archive_title ) { ?>
						<h1 class="archive-title"><?php echo wp_kses_post( $archive_title ); ?></h1>
					<?php } ?>

					<?php if ( $archive_subtitle ) { ?>
						<div class="archive-subtitle"><?php echo wp_kses_post( wpautop( $archive_subtitle ) ); ?></div>
					<?php } ?>
				</header><!-- .archive-header -->

				<hr class="padding-bottom-1 margin-vertical-1" aria-hidden="true" />

				<?php
			}

			if ( have_posts() && ! is_singular() ) {
				?>
				<header class="page-header">
					<h1 class="page-title"><?php _e( 'Articles', 'nordic-theme' ); ?></h1>
				</header>

				<?php

				echo '<div class="grid-container">';
				echo '<div class="grid-x grid-margin-x small-up-1 medium-up-2 large-up-3">';

				while ( have_posts() ) {
					the_post();

					get_template_part( 'template-parts/content', 'grid' );

				}

				echo '</div>';
				echo '</div>';


			} elseif ( have_posts() ) {

				while ( have_posts() ) {

					the_post();

					get_template_part( 'template-parts/content', get_post_type() );

				}
			} elseif ( is_search() ) {
				?>

				<div class="no-search-results-form">

					<?php
					get_search_form(
						array(
							'label' => __( 'search again', 'nordic-theme' ),
						)
					);
					?>

				</div><!-- .no-search-results -->

				<?php
			}

			if ( function_exists( 'wp_pagenavi' ) ) :
				wp_pagenavi();
			else :
				NT_Tags::foundation_pagination();
			endif;

			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
