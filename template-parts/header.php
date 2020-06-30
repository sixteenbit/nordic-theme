<?php
/**
 * Displays the header
 */
?>
<header id="masthead" class="site-header">
	<div class="grid-container">
		<div class="grid-x">
			<div class="cell small-6 medium-shrink">
				<div class="site-branding">
					<?php
					the_custom_logo();
					if ( is_front_page() && is_home() ) :
						?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php
					else :
						?>
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
						<?php
					endif;
					$nordic_theme_description = get_bloginfo( 'description', 'display' );
					if ( $nordic_theme_description || is_customize_preview() ) :
						?>
						<p class="site-description"><?php echo $nordic_theme_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
					<?php endif; ?>
				</div><!-- .site-branding -->
			</div><!-- .cell -->

			<div class="cell small-6 medium-auto">
				<button class="off-canvas-toggle clear button float-right hide-for-medium margin-bottom-0" data-toggle="off-canvas">
					<i class="fa fa-bars fa-2x"></i><span class="screen-reader-text"><?php esc_html_e( 'Main navigation toggle', 'nordic-theme' ); ?></span>
				</button>

				<?php if ( has_nav_menu( 'primary' ) ) : ?>
					<nav id="site-navigation" class="main-navigation hide-for-small-only">
						<?php
						wp_nav_menu(
							array(
								'container'      => false,
								'menu_id'        => 'primary',
								'menu_class'     => 'dropdown horizontal menu',
								'theme_location' => 'primary',
								'items_wrap'     => '<ul id="%1$s" class="%2$s" data-dropdown-menu>%3$s</ul>',
								'walker'         => new NT_Dropdown_Walker(),
								'fallback_cb'    => false,
							)
						);
						?>
					</nav><!-- #site-navigation -->
				<?php endif; ?>
			</div><!-- .cell -->

			<?php if ( has_nav_menu( 'social' ) ) : ?>
				<div class="cell medium-shrink show-for-medium">
					<nav class="social-navigation show-for-medium" aria-label="<?php esc_html_e( 'Social Links Menu', 'nordic-theme' ); ?>">
						<?php
						wp_nav_menu(
							array(
								'container'      => false,
								'theme_location' => 'social',
								'menu_class'     => 'social-links-menu menu align-right',
								'depth'          => 1,
								'link_before'    => '<span class="screen-reader-text">',
								'link_after'     => '</span>',
							)
						);
						?>
					</nav><!-- .social-navigation -->
				</div><!-- .cell -->
			<?php endif; ?>
		</div><!-- .grid-x -->
	</div><!-- .grid-container -->
</header><!-- #masthead -->
