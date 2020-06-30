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

		public static function sanitize_url( $url ) {
			return esc_url_raw( $url );
		}
	}

	// Setup the Theme Customizer settings and controls.
	add_action( 'customize_register', array( 'NT_Customizer', 'register' ) );

}
