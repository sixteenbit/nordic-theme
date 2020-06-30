<?php
/**
 * Displays the post header
 */

$entry_header_classes = '';

if ( class_exists( 'FLBuilderLoader' ) ) {
	$entry_header_classes .= ' fl-post-header';
}
?>

<header class="entry-header<?php echo esc_attr( $entry_header_classes ); ?>">
	<?php
	if ( is_singular() ) {
		the_title( '<h1 class="entry-title">', '</h1>' );
	} else {
		the_title( '<h2 class="entry-title h1"><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' );
	}
	?>
</header><!-- .entry-header -->
