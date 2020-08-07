<?php
/**
 * Customizer settings for this theme.
 */

if ( ! class_exists( 'NT_Customizer' ) ) {
	class NT_Customizer {
		/**
		 * Register customizer options.
		 *
		 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
		 */
		public static function register( $wp_customize ) {
			$priority = 10;

			// Section: Colors

			$wp_customize->add_setting(
				'text_color',
				array(
					'default'           => '#73757a',
					'type'              => 'theme_mod',
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => array( __CLASS__, 'sanitize_hex_color' ),
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'text_color',
					array(
						'settings'    => 'text_color',
						'section'     => 'colors',
						'label'       => __( 'Text Color', 'nordic-theme' ),
						'description' => __( 'Select the color to be used for the body text color.', 'nordic-theme' ),
					)
				)
			);

			$wp_customize->add_setting(
				'header_background',
				array(
					'default'           => '#fefefe',
					'type'              => 'theme_mod',
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => array( __CLASS__, 'sanitize_hex_color' ),
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'header_background',
					array(
						'settings'    => 'header_background',
						'section'     => 'colors',
						'label'       => __( 'Header Background', 'nordic-theme' ),
						'description' => __( 'Select the background color to be used for the header.', 'nordic-theme' ),
					)
				)
			);

			$wp_customize->add_setting(
				'header_color',
				array(
					'default'           => '#151922',
					'type'              => 'theme_mod',
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => array( __CLASS__, 'sanitize_hex_color' ),
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'header_color',
					array(
						'settings'    => 'header_color',
						'section'     => 'colors',
						'label'       => __( 'Header Color', 'nordic-theme' ),
						'description' => __( 'Select the color to be used for the header menu items.', 'nordic-theme' ),
					)
				)
			);

			$wp_customize->add_setting(
				'anchor_color',
				array(
					'default'           => '#4687ff',
					'type'              => 'theme_mod',
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => array( __CLASS__, 'sanitize_hex_color' ),
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'anchor_color',
					array(
						'settings'    => 'anchor_color',
						'section'     => 'colors',
						'label'       => __( 'Anchor Color', 'nordic-theme' ),
						'description' => __( 'Select the color to be used for hyperlink color.', 'nordic-theme' ),
					)
				)
			);

			$wp_customize->add_setting(
				'anchor_hover_color',
				array(
					'default'           => '#90b7ff',
					'type'              => 'theme_mod',
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => array( __CLASS__, 'sanitize_hex_color' ),
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'anchor_hover_color',
					array(
						'settings'    => 'anchor_hover_color',
						'section'     => 'colors',
						'label'       => __( 'Anchor Hover Color', 'nordic-theme' ),
						'description' => __( 'Select the color to be used for hyperlink hover color.', 'nordic-theme' ),
					)
				)
			);

			// Section: Development.
			$wp_customize->add_section(
				'theme_options',
				array(
					'title'    => esc_html__( 'Theme Options', 'nordic-theme' ),
					'priority' => 190,
				)
			);

			if ( ! function_exists( 'v_forcelogin' ) ) {
				// Option: development/force_login.
				$wp_customize->add_setting(
					'force_login',
					array(
						'capability'        => 'edit_theme_options',
						'default'           => false,
						'sanitize_callback' => array( __CLASS__, 'sanitize_checkbox' ),
					)
				);
				$wp_customize->add_control(
					'force_login',
					array(
						'label'       => esc_html__( 'Force Login', 'nordic-theme' ),
						'description' => esc_html__( 'Make the website private until it\'s ready to share publicly, or keep it private for members only.', 'nordic-theme' ),
						'section'     => 'theme_options',
						'type'        => 'checkbox',
						'priority'    => $priority ++,
					)
				);
			}
		}

		/**
		 * Sanitize boolean for checkbox.
		 *
		 * @param bool $checked Whether or not a box is checked.
		 *
		 * @return bool
		 */
		public static function sanitize_checkbox( $checked ) {
			return isset( $checked ) && true === $checked;
		}

		/**
		 * Sanitize url intput
		 *
		 * @param $url
		 *
		 * @return string
		 */
		public static function sanitize_url( $url ) {
			return esc_url_raw( $url );
		}

		/**
		 * Sanitize hex color.
		 *
		 * @param $hex_color
		 * @param $setting
		 *
		 * @return string|void
		 */
		public static function sanitize_hex_color( $hex_color, $setting ) {
			// Sanitize $input as a hex value without the hash prefix.
			$hex_color = sanitize_hex_color( $hex_color );

			// If $input is a valid hex value, return it; otherwise, return the default.
			return ( ! is_null( $hex_color ) ? $hex_color : $setting->default );
		}

		public static function customize_css() {

			$text_color         = get_theme_mod( 'text_color' );
			$header_background  = get_theme_mod( 'header_background' );
			$header_color       = get_theme_mod( 'header_color' );
			$anchor_color       = get_theme_mod( 'anchor_color' );
			$anchor_hover_color = get_theme_mod( 'anchor_hover_color' );
			?>
			<style id="customizer-styles" type="text/css">
				<?php if ( ! empty( $text_color ) ) : ?>
				body {
					color: <?php echo $text_color; ?>;
				}
				<?php endif;

				if ( ! empty( $header_background ) ) : ?>
				.site-header {
					background-color: <?php echo $header_background; ?>;
				}
				<?php endif;

				if (! empty($header_color)) : ?>
          .site-header,
          .site-header a,
          .site-header .menu-toggle,
          .main-navigation .menu > li > a,
          .main-navigation .dropdown.menu a,
          .social-navigation .menu > li > a {
            color: <?php echo $header_color; ?>;
          }
        <?php endif;

        if ( ! empty( $anchor_color ) ) : ?>
				a,
				.button.hollow,
				.button.hollow.disabled,
				.button.hollow[disabled],
				.button.hollow.disabled:hover,
				.button.hollow[disabled]:hover,
				.button.hollow.disabled:focus,
				.button.hollow[disabled]:focus,
				.button.clear,
				.button.clear.disabled,
				.button.clear[disabled],
				.button.clear.disabled:hover,
				.button.clear[disabled]:hover,
				.button.clear.disabled:focus,
				.button.clear[disabled]:focus,
				.button-group.hollow .button,
				.button-group.hollow .button.disabled,
				.button-group.hollow .button[disabled],
				.button-group.hollow .button.disabled:hover,
				.button-group.hollow .button[disabled]:hover,
				.button-group.hollow .button.disabled:focus,
				.button-group.hollow .button[disabled]:focus,
				.button-group.clear .button,
				.button-group.clear .button.disabled,
				.button-group.clear .button[disabled],
				.button-group.clear .button.disabled:hover,
				.button-group.clear .button[disabled]:hover,
				.button-group.clear .button.disabled:focus,
				.button-group.clear .button[disabled]:focus {
					color: <?php echo $anchor_color; ?>;
				}

				.button.hollow,
				.button.hollow.disabled,
				.button.hollow[disabled],
				.button.hollow.disabled:hover,
				.button.hollow[disabled]:hover,
				.button.hollow.disabled:focus,
				.button.hollow[disabled]:focus,
				.button-group.hollow .button,
				.button-group.hollow .button.disabled,
				.button-group.hollow .button[disabled],
				.button-group.hollow .button.disabled:hover,
				.button-group.hollow .button[disabled]:hover,
				.button-group.hollow .button.disabled:focus,
				.button-group.hollow .button[disabled]:focus {
					border-color: <?php echo $anchor_color; ?>;
				}

				.button.dropdown.hollow::after,
				.button.dropdown.clear::after {
					border-top-color: <?php echo $anchor_color; ?>;
				}

				.button,
				.button.disabled,
				.button[disabled],
				.button.disabled:hover,
				.button[disabled]:hover,
				.button.disabled:focus,
				.button[disabled]:focus,
				.post-password-form [type="submit"],
				.post-password-form [type="submit"].disabled,
				.post-password-form [type="submit"][disabled],
				.post-password-form [type="submit"].disabled:hover,
				.post-password-form [type="submit"][disabled]:hover,
				.post-password-form [type="submit"].disabled:focus,
				.post-password-form [type="submit"][disabled]:focus {
					background-color: <?php echo $anchor_color; ?>;
				}
				<?php endif;

				if ( ! empty( $anchor_hover_color ) ) : ?>
				a:hover,
				a:focus,
				.social-navigation .menu > li > a:hover,
				.social-navigation .menu > li > a:active,
				.social-navigation .menu > li > a:focus {
					color: <?php echo $anchor_hover_color; ?>;
				}

				.button:hover,
				.button:focus {
					background-color: <?php echo $anchor_hover_color; ?>;
				}

				.accordion-menu .is-accordion-submenu-parent:not(.has-submenu-toggle) > a::after {
					border-color: <?php echo $anchor_hover_color; ?> transparent transparent;
				}
				<?php endif; ?>
			</style>
			<?php
		}
	}

	// Setup the Theme Customizer settings and controls.
	add_action( 'customize_register', array( 'NT_Customizer', 'register' ) );

	add_action( 'wp_head', 'NT_Customizer::customize_css' );

}
