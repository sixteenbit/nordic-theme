<?php
/**
 * Nordic functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 */

// Defines
define( 'NT_THEME_VERSION', '0.2.0' );
define( 'NT_THEME_DIR', get_template_directory() );
define( 'NT_THEME_URL', get_template_directory_uri() );

/**
 * REQUIRED FILES
 * Include required files.
 */

// Classes
require_once 'classes/class-theme-setup.php';
require_once 'classes/class-customizer.php';
require_once 'classes/class-tags.php';
require_once 'classes/class-dropdown-walker.php';

if ( ! function_exists( 'v_forcelogin' ) ) {
	require_once 'classes/class-force-login.php';
}

// Theme actions
add_action( 'after_setup_theme', 'NT_Theme_Setup::setup' );
add_action( 'widgets_init', 'NT_Theme_Setup::sidebar' );
add_action( 'wp_enqueue_scripts', 'NT_Theme_Setup::assets' );
add_action( 'wp_head', 'NT_Theme_Setup::pingback' );
add_filter( 'body_class', 'NT_Theme_Setup::body_class' );
add_action( 'wp_print_footer_scripts', 'NT_Theme_Setup::skip_link_focus_fix' );
add_action( 'wp_body_open', 'NT_Theme_Setup::skip_link', 5 );
add_action( 'wp_head', 'NT_Theme_Setup::no_js_class' );
add_action( 'admin_menu', 'NT_Theme_Setup::disable_default_dashboard_widgets' );
add_action( 'widgets_init', 'NT_Theme_Setup::remove_default_widgets' );
remove_action( 'welcome_panel', 'wp_welcome_panel' );
add_filter( 'admin_footer_text', 'NT_Theme_Setup::custom_admin_footer' );
add_filter( 'get_the_archive_title', 'NT_Theme_Setup::get_the_archive_title' );

if ( ! function_exists( 'nordic_theme_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 *
	 * Create your own nordic_theme_post_thumbnail() function to override in a child theme.
	 */
	function nordic_theme_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() || is_single() ) {
			return;
		}
		?>

		<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
			<?php
			the_post_thumbnail(
				'post-thumbnail', array(
					'alt' => the_title_attribute( 'echo=0' ),
				)
			);
			?>
		</a>

		<?php
	}
endif;
