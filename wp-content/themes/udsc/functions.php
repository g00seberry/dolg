<?php
/**
 * udsc functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package udsc
 */

// Подключаем админские настройки контактов
require_once get_template_directory() . '/inc/admin/contact-settings.php';

// Подключаем класс фильтрации кейсов
require_once get_template_directory() . '/includes/class-case-studies-filter.php';

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function udsc_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on udsc, use a find and replace
		* to change 'udsc' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'udsc', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'udsc' ),
		)
	);

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
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'udsc_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'udsc_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function udsc_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'udsc_content_width', 640 );
}
add_action( 'after_setup_theme', 'udsc_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function udsc_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'udsc' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'udsc' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'udsc_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function udsc_scripts() {
	// Подключаем кастомные шрифты
	wp_enqueue_style( 'udsc-fonts', get_template_directory_uri() . '/assets/fonts.css', array(), _S_VERSION );
	
	wp_enqueue_style( 'udsc-style', get_stylesheet_uri(), array('udsc-fonts'), _S_VERSION );
	wp_style_add_data( 'udsc-style', 'rtl', 'replace' );

	// Подключаем jQuery
	wp_enqueue_script( 'jquery' );

	// Подключаем скомпилированный JS с Material Tailwind
	$asset_file = get_template_directory() . '/dist/index.dist.php';
	if ( file_exists( $asset_file ) ) {
		$asset = include $asset_file;
		// Добавляем jQuery как зависимость
		$dependencies = array_merge($asset['dependencies'], ['jquery']);
		wp_enqueue_script( 'udsc-main', get_template_directory_uri() . '/dist/js/index.js', $dependencies, $asset['version'], true );
	}
	
	// if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	// 	wp_enqueue_script( 'comment-reply' );
	// }
}
add_action( 'wp_enqueue_scripts', 'udsc_scripts' );

/**
 * Preload custom fonts for better performance
 */
function udsc_preload_fonts() {
	echo '<link rel="preload" href="' . get_template_directory_uri() . '/src/fonts/Play-Regular.ttf" as="font" type="font/ttf" crossorigin>';
	echo '<link rel="preload" href="' . get_template_directory_uri() . '/src/fonts/Play-Bold.ttf" as="font" type="font/ttf" crossorigin>';
}
add_action( 'wp_head', 'udsc_preload_fonts', 1 );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load theme components
 */
require get_template_directory() . '/inc/components/Modal.php';
require get_template_directory() . '/inc/components/TestForm.php';
require get_template_directory() . '/inc/components/ConsultationForm.php';


/**
 * Flush rewrite rules when the theme is activated
 */
function udsc_flush_rewrite_rules() {
	udsc_register_case_study_post_type();
	flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'udsc_flush_rewrite_rules' );

/**
 * Safe template part loader for Linux compatibility
 * Handles case-sensitivity issues and missing templates
 */
function udsc_safe_get_template_part($template_name, $name = null, $args = array()) {
    $templates = array();
    
    if (isset($name)) {
        $templates[] = "{$template_name}-{$name}.php";
    }
    $templates[] = "{$template_name}.php";
    
    foreach ($templates as $template) {
        $template_file = locate_template($template);
        
        if ($template_file && file_exists($template_file)) {
            if (!empty($args) && is_array($args)) {
                extract($args);
            }
            include $template_file;
            return true;
        }
    }
    
    // Log missing template if debug is enabled
    if (defined('WP_DEBUG') && WP_DEBUG) {
        error_log("UDSC Theme: Template not found: " . implode(', ', $templates));
    }
    echo "<!-- Template not found: " . esc_html($template_name) . " -->";
    return false;
}

/**
 * Enhanced error logging for production debugging
 */
function udsc_log_error($message, $context = '') {
    if (defined('WP_DEBUG_LOG') && WP_DEBUG_LOG) {
        $log_message = '[UDSC Theme] ' . $message;
        if ($context) {
            $log_message .= ' Context: ' . $context;
        }
        error_log($log_message);
    }
}



// Регистрируем кастомный тип записи "Кейсы"
function register_case_study_cpt() {
    $labels = array(
        'name'               => 'Кейсы',
        'singular_name'      => 'Кейс',
        'menu_name'          => 'Кейсы',
        'name_admin_bar'     => 'Кейс',
        'add_new'            => 'Добавить кейс',
        'add_new_item'       => 'Добавить новый кейс',
        'new_item'           => 'Новый кейс',
        'edit_item'          => 'Редактировать кейс',
        'view_item'          => 'Просмотреть кейс',
        'all_items'          => 'Все кейсы',
        'search_items'       => 'Искать кейсы',
        'not_found'          => 'Кейсы не найдены',
        'not_found_in_trash' => 'В корзине кейсов нет',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => true,
        'rewrite'            => array('slug' => 'case-studies'),
        'menu_icon'          => 'dashicons-portfolio',
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt'),
        'show_in_rest'       => true, // поддержка Gutenberg + API
    );

    register_post_type('case_study', $args);
}
add_action('init', 'register_case_study_cpt');
