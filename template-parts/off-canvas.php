<aside class="off-canvas-wrapper">
	<div class="off-canvas position-right" id="off-canvas" data-off-canvas>

		<a class="button" aria-label="Close menu" data-close>
			<i class="fa fa-angle-left" aria-hidden="true"></i>
		</a>

		<?php if ( has_nav_menu( 'social' ) ) : ?>
			<nav class="small-main-navigation">
				<?php
				wp_nav_menu(
					array(
						'container'      => false,
						'menu_id'        => 'small-navigation',
						'menu_class'     => 'vertical accordion menu',
						'theme_location' => 'primary',
						'items_wrap'     => '<ul id="%1$s" class="%2$s" data-accordion-menu data-submenu-toggle="true">%3$s</ul>',
						'walker'         => new NT_Dropdown_Walker(),
						'fallback_cb'    => false,
					)
				);
				?>
			</nav><!-- #site-navigation -->
		<?php endif; ?>

		<?php if ( has_nav_menu( 'social' ) ) : ?>
			<nav class="social-navigation" aria-label="<?php esc_html_e( 'Social Links Mobile Menu', 'nordic-theme' ); ?>">
				<?php
				wp_nav_menu(
						array(
								'container'      => false,
								'menu_id'        => 'small-social-navigation',
								'theme_location' => 'social',
								'menu_class'     => 'social-links-menu menu',
								'depth'          => 1,
								'link_before'    => '<span class="screen-reader-text">',
								'link_after'     => '</span>',
						)
				);
				?>
			</nav><!-- .social-navigation -->
		<?php endif; ?>
	</div><!-- .off-canvas -->
</aside><!-- .off-canvas-wrapper -->
