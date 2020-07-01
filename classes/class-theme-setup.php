<?php
/**
 * Theme setup class.
 */
if ( ! class_exists( 'NT_Theme_Setup' ) ) {
	/**
	 * Class NT_Theme_Setup
	 */
	class NT_Theme_Setup {

		/**
		 * Theme setup.
		 */
		public static function setup() {
			/**
			 * Register navigation menus uses wp_nav_menu in five places.
			 */
			$locations = array(
				'primary' => __( 'Primary Menu', 'nordic-theme' ),
				'social'  => __( 'Social Menu', 'nordic-theme' ),
				'footer'  => __( 'Footer Menu', 'nordic-theme' ),
			);

			register_nav_menus( $locations );

			// Add default posts and comments RSS feed links to head.
			add_theme_support( 'automatic-feed-links' );

			// Set content-width.
			global $content_width;
			if ( ! isset( $content_width ) ) {
				$content_width = 920;
			}

			/**
			 * Add support for core custom logo.
			 *
			 * @link https://codex.wordpress.org/Theme_Logo
			 */
			add_theme_support(
				'custom-logo',
				array(
					'height'      => 125,
					'width'       => 125,
					'flex-width'  => true,
					'flex-height' => true,
				)
			);

			/*
			 * Enable support for Post Thumbnails on posts and pages.
			 *
			 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
			 */
			add_theme_support( 'post-thumbnails' );

			// Set post thumbnail size.
			set_post_thumbnail_size( 1200, 9999 );

			add_image_size( 'nordic-theme-featured-image', 2400, 9999 );

			/*
			 * Let WordPress manage the document title.
			 * By adding theme support, we declare that this theme does not use a
			 * hard-coded <title> tag in the document head, and expect WordPress to
			 * provide it for us.
			 */
			add_theme_support( 'title-tag' );

			/*
			 * Switch default core markup for search form, comment form, and comments
			 * to output valid HTML5.
			 */
			add_theme_support(
				'html5',
				array(
					'search-form',
					'comment-form',
					'comment-list',
					'gallery',
					'caption',
					'script',
					'style',
				)
			);

			/*
			 * Make theme available for translation.
			 * Translations can be filed in the /languages/ directory.
			 */
			load_theme_textdomain( 'nordic-theme' );

			// Add support for responsive embedded content.
			add_theme_support( 'responsive-embeds' );

			// Add support for Block Styles.
			add_theme_support( 'wp-block-styles' );

			// Add support for editor styles.
			add_theme_support( 'editor-styles' );

			// Enqueue editor styles.
			add_editor_style(
				array(
					'assets/css/style-editor.css',
				)
			);

			// Editor color palette.
			add_theme_support(
				'editor-color-palette',
				array(
					array(
						'name'  => __( 'Primary', 'nordic-theme' ),
						'slug'  => 'primary',
						'color' => '#2b82ff',
					),
					array(
						'name'  => __( 'Secondary', 'nordic-theme' ),
						'slug'  => 'secondary',
						'color' => '#f64f64',
					),
				)
			);

			// Add theme support for selective refresh for widgets.
			add_theme_support( 'customize-selective-refresh-widgets' );
		}

		/**
		 * Register sidebar.
		 */
		public static function sidebar() {
			register_sidebar(
				array(
					'id'            => 'sidebar-1',
					'name'          => esc_html__( 'Primary Sidebar', 'nordic-theme' ),
					'description'   => esc_html__( 'Add widgets here.', 'nordic-theme' ),
					'before_widget' => '<section id="%1$s" class="widget %2$s">',
					'after_widget'  => '</section>',
					'before_title'  => '<h2 class="widget-title">',
					'after_title'   => '</h2>',
				)
			);

			register_sidebar(
					array(
							'id'            => 'footer-1',
							'name'          => esc_html__( 'Footer #1', 'nordic-theme' ),
							'description'   => esc_html__( 'Widgets in this area will be displayed in the first column in the footer.', 'nordic-theme' ),
							'before_widget' => '<section id="%1$s" class="widget %2$s">',
							'after_widget'  => '</section>',
							'before_title'  => '<h3 class="widget-title h4">',
							'after_title'   => '</h3>',
					)
			);

			register_sidebar(
					array(
							'id'            => 'footer-2',
							'name'          => esc_html__( 'Footer #2', 'nordic-theme' ),
							'description'   => esc_html__( 'Widgets in this area will be displayed in the first column in the footer.', 'nordic-theme' ),
							'before_widget' => '<section id="%1$s" class="widget %2$s">',
							'after_widget'  => '</section>',
							'before_title'  => '<h3 class="widget-title h4">',
							'after_title'   => '</h3>',
					)
			);

			register_sidebar(
					array(
							'id'            => 'footer-3',
							'name'          => esc_html__( 'Footer #3', 'nordic-theme' ),
							'description'   => esc_html__( 'Widgets in this area will be displayed in the first column in the footer.', 'nordic-theme' ),
							'before_widget' => '<section id="%1$s" class="widget %2$s">',
							'after_widget'  => '</section>',
							'before_title'  => '<h3 class="widget-title h4">',
							'after_title'   => '</h3>',
					)
			);

			register_sidebar(
					array(
							'id'            => 'footer-4',
							'name'          => esc_html__( 'Footer #4', 'nordic-theme' ),
							'description'   => esc_html__( 'Widgets in this area will be displayed in the first column in the footer.', 'nordic-theme' ),
							'before_widget' => '<section id="%1$s" class="widget %2$s">',
							'after_widget'  => '</section>',
							'before_title'  => '<h3 class="widget-title h4">',
							'after_title'   => '</h3>',
					)
			);
		}

		/**
		 * Enqueue theme assets.
		 */
		public static function assets() {
			wp_register_style(
				'nordic-theme-motion-ui',
				get_theme_file_uri( 'assets/css/motion-ui.css' ),
				array(),
				NT_THEME_VERSION
			);

			wp_style_add_data( 'nordic-theme-motion-ui', 'rtl', 'replace' );

			wp_register_style(
				'nordic-theme-fontawesome',
				get_theme_file_uri( 'assets/css/fontawesome.css' ),
				array(),
				NT_THEME_VERSION
			);

			wp_style_add_data( 'nordic-theme-fontawesome', 'rtl', 'replace' );

			wp_register_style(
				'nordic-theme-foundation',
				get_theme_file_uri( 'assets/css/foundation.css' ),
				array(),
				NT_THEME_VERSION
			);

			wp_style_add_data( 'nordic-theme-foundation', 'rtl', 'replace' );

			// Stylesheets: enqueue.

			wp_enqueue_style(
				'nordic-theme-styles',
				get_stylesheet_uri(),
				array(
					'nordic-theme-motion-ui',
					'nordic-theme-fontawesome',
					'nordic-theme-foundation',
				)
			);

			wp_style_add_data( 'nordic-theme-styles', 'rtl', 'replace' );

			wp_register_script(
				'nordic-theme-motion-ui-js',
				NT_THEME_URL . '/assets/js/motion-ui.js',
				array(),
				filemtime( NT_THEME_DIR . '/src/js' ),
				true
			);

			wp_register_script(
				'nordic-theme-what-input-js',
				NT_THEME_URL . '/assets/js/what-input.js',
				array(),
				filemtime( NT_THEME_DIR . '/src/js' ),
				true
			);

			wp_register_script(
				'nordic-theme-foundation-js',
				NT_THEME_URL . '/assets/js/foundation.js',
				array(),
				filemtime( NT_THEME_DIR . '/src/js' ),
				true
			);

			wp_register_script(
				'nordic-theme-init-js',
				NT_THEME_URL . '/assets/js/scripts.js',
				array(
					'jquery',
					'nordic-theme-motion-ui-js',
					'nordic-theme-what-input-js',
					'nordic-theme-foundation-js',
				),
				filemtime( NT_THEME_DIR . '/src/js' ),
				true
			);

			// Scripts: enqueue.

			if (
					is_singular()
					&& comments_open()
					&& get_option( 'thread_comments' )
			) {
				/**
				 * This script should be registered by now
				 * with `wp_default_scripts()`.
				 */
				wp_enqueue_script( 'comment-reply' );
			}

			wp_enqueue_script( 'nordic-theme-init-js' );

		}

		/**
		 * Add a pingback url auto-discovery header for singularly identifiable articles.
		 *
		 * Added via action hook for easier remove via child theme.
		 */
		public static function pingback() {
			if ( is_singular() && pings_open() ) {
				echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
			}
		}

		/**
		 * HTML Body classes.
		 *
		 * @param array $classes
		 *
		 * @return array
		 */
		public static function body_class( $classes = array() ) {
			$classes = (array) $classes; // Just in case...

			// Singular page?
			if ( is_singular() ) {
				// For better custom styling.
				$classes[] = 'is-singular';

				// Has featured image?
				if ( has_post_thumbnail() ) {
					$classes[] = 'has-post-thumbnail';
				} else {
					$classes[] = 'missing-post-thumbnail';
				}
			} else {
				// Add a class of hfeed to non-singular pages.
				$classes[] = 'hfeed';
			}

			// Has more than 1 published author?
			if ( is_multi_author() ) {
				$classes[] = 'group-blog';
			}

			// Slim page template class names (class = name - file suffix).
			if ( is_page_template() ) {
				$classes[] = basename( get_page_template_slug(), '.php' );
			}

			// Renames sticky class.
			if ( in_array( 'sticky', $classes, true ) ) {
				$classes   = array_diff( $classes, array( 'sticky' ) );
				$classes[] = 'sticky-post';
			}

			// Sort classes alphabetically.
			asort( $classes );

			return array_unique( $classes );
		}

		/**
		 * Fix skip link focus in IE11.
		 *
		 * This does not enqueue the script because it is tiny and because it is only for IE11,
		 * thus it does not warrant having an entire dedicated blocking script being loaded.
		 *
		 * @link https://git.io/vWdr2
		 */
		public static function skip_link_focus_fix() { ?>
			<script>
				/(trident|msie)/i.test(navigator.userAgent) && document.getElementById && window.addEventListener && window.addEventListener("hashchange", function () {
					var t, e = location.hash.substring(1);
					/^[A-z0-9_-]+$/.test(e) && (t = document.getElementById(e)) && (/^(?:a|select|input|button|textarea)$/i.test(t.tagName) || (t.tabIndex = -1), t.focus())
				}, !1);
			</script>
			<?php
		}

		public static function skip_link() {
			echo '<a class="skip-link screen-reader-text" href="#content">' . __( 'Skip to the content', 'nordic-theme' ) . '</a>';
		}

		/**
		 * Classes
		 */
		/**
		 * Add No-JS Class.
		 * If we're missing JavaScript support, the HTML element will have a no-js class.
		 */
		public static function no_js_class() {
			?>
			<script>document.documentElement.className = document.documentElement.className.replace('no-js', 'js');</script>
			<?php

		}

		/**
		 * Disable default dashboard widgets
		 */
		public static function disable_default_dashboard_widgets() {
			remove_meta_box( 'dashboard_right_now', 'dashboard', 'core' );
			remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'core' );
			remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'core' );
			remove_meta_box( 'dashboard_plugins', 'dashboard', 'core' );
			remove_meta_box( 'dashboard_quick_press', 'dashboard', 'core' );
			remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'core' );
			remove_meta_box( 'dashboard_primary', 'dashboard', 'core' );
			remove_meta_box( 'dashboard_secondary', 'dashboard', 'core' );
			remove_meta_box( 'yoast_db_widget', 'dashboard', 'normal' );
		}

		/**
		 * Unregister Core Widgets
		 */
		public static function remove_default_widgets() {
			unregister_widget( 'WP_Widget_Pages' );
			unregister_widget( 'WP_Widget_Calendar' );
			unregister_widget( 'WP_Widget_Archives' );
			unregister_widget( 'WP_Widget_Links' );
			unregister_widget( 'WP_Widget_Meta' );
			unregister_widget( 'WP_Widget_Recent_Comments' );
			unregister_widget( 'WP_Widget_RSS' );
			unregister_widget( 'WP_Widget_Tag_Cloud' );
		}

		public static function custom_admin_footer() {
			$text = sprintf(
			/* translators: %s: https://sixteenbit.com */
				__( 'Developed by <a href="%s">Sixteenbit</a>.' ),
				__( 'https://sixteenbit.com' )
			);

			echo '<span id="footer-thankyou">' . $text . '</span>';
		}

		/**
		 * Filters the archive title and hides the word before the first colon.
		 *
		 * @param string $title Current archive title.
		 *
		 * @return string $title Current archive title.
		 */
		public static function get_the_archive_title( $title ) {

			$regex = apply_filters(
				'nordic_theme_get_the_archive_title_regex',
				array(
					'pattern'     => '/(\A[^\:]+\:)/',
					'replacement' => '<span class="screen-reader-text">$1</span>',
				)
			);

			if ( empty( $regex ) ) {

				return $title;

			}

			return preg_replace( $regex['pattern'], $regex['replacement'], $title );

		}
	}
}
