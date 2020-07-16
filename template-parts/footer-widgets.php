<?php

$has_footer_1 = is_active_sidebar( 'footer-1' );
$has_footer_2 = is_active_sidebar( 'footer-2' );
$has_footer_3 = is_active_sidebar( 'footer-3' );
$has_footer_4 = is_active_sidebar( 'footer-4' );

// Only output the container if there are elements to display.
if ( $has_footer_1 || $has_footer_2 || $has_footer_3 || $has_footer_4 ) { ?>

	<div class="footer-widgets grid-container">
		<div class="grid-x grid-padding-x">

			<?php if ( $has_footer_1 ) { ?>
				<div class="cell auto">
					<?php dynamic_sidebar( 'footer-1' ); ?>
				</div>
			<?php } ?>

			<?php if ( $has_footer_2 ) { ?>
				<div class="cell auto">
					<?php dynamic_sidebar( 'footer-2' ); ?>
				</div>
			<?php } ?>

			<?php if ( $has_footer_3 ) { ?>
				<div class="cell auto">
					<?php dynamic_sidebar( 'footer-3' ); ?>
				</div>
			<?php } ?>

			<?php if ( $has_footer_4 ) { ?>
				<div class="cell auto">
					<?php dynamic_sidebar( 'footer-4' ); ?>
				</div>
			<?php } ?>

		</div><!-- .grid-x -->
	</div><!-- .grid-container -->

	<?php
}
