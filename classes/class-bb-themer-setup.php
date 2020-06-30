<?php
/**
 * Beaver Themer plugin setup class.
 */
if ( ! class_exists( 'NT_BB_Themer_Setup' ) ) {
	/**
	 * Class NT_BB_Themer_Setup
	 */
	class NT_BB_Themer_Setup {
		/**
		 * Initialization.
		 */
		public static function init() {
			add_filter( 'fl_theme_builder_part_hooks', __CLASS__ . '::parts' );
		}

		/**
		 * Registers hooks for theme parts.
		 */
		public static function parts() {
			return array(

				array(
					'label' => esc_html__( 'Header area', 'nordic-theme' ),
					'hooks' => array(
						'nordic_theme_before_header' => 'Before Header',
						'nordic_theme_after_header'  => 'After Header',
					),
				),

				array(
					'label' => esc_html__( 'Content area', 'nordic-theme' ),
					'hooks' => array(
						'nordic_theme_before_content' => 'Before Content',
						'nordic_theme_after_content'  => 'After Content',
					),
				),

				array(
					'label' => esc_html__( 'Footer area', 'nordic-theme' ),
					'hooks' => array(
						'nordic_theme_before_footer' => 'Before Footer',
						'nordic_theme_after_footer'  => 'After Footer',
					),
				),

			);
		}
	}

	NT_BB_Themer_Setup::init();

}
