<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */
?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,wght@0,300;0,400;0,600;0,700;1,400&display=swap" rel="stylesheet">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php get_template_part( 'template-parts/off-canvas' ); ?>

<div id="page" class="site off-canvas-content" data-off-canvas-content>

	<?php

	do_action( 'nordic_theme_before_header' );

	if (
		is_callable( 'FLThemeBuilderLayoutData::get_current_page_header_ids' )
		&& ! empty( FLThemeBuilderLayoutData::get_current_page_header_ids() )
		&& is_callable( 'FLThemeBuilderLayoutRenderer::render_header' )
	) {
		FLThemeBuilderLayoutRenderer::render_header();
	} else {
		get_template_part( 'template-parts/header' );
	}
	?>

	<?php do_action( 'nordic_theme_after_header' ); ?>

	<div id="content" class="site-content">

		<?php do_action( 'nordic_theme_before_content' ); ?>
