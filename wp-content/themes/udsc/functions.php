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
 * Calculate reading time for blog posts including ACF content
 */
function calculate_blog_reading_time($post_id = null) {
    if (!$post_id) {
        global $post;
        $post_id = $post->ID ?? get_the_ID();
    }
    
    if (!$post_id) {
        return 0;
    }
    
    $total_words = 0;
    
    // Get standard post content
    $post_content = get_post_field('post_content', $post_id);
    if ($post_content) {
        $total_words += str_word_count(strip_tags($post_content));
    }
    
    // Get ACF flexible content
    $article_content = get_field('article_content', $post_id);
    if ($article_content && is_array($article_content)) {
        foreach ($article_content as $block) {
            if (empty($block['acf_fc_layout'])) {
                continue;
            }
            
            // Extract text content from all fields in the block
            foreach ($block as $field_key => $field_value) {
                if ($field_key === 'acf_fc_layout') {
                    continue;
                }
                
                if (is_string($field_value)) {
                    // Remove HTML tags and count words
                    $clean_text = strip_tags($field_value);
                    $total_words += str_word_count($clean_text);
                } elseif (is_array($field_value)) {
                    // Handle nested arrays (like repeater fields)
                    $total_words += count_words_in_array($field_value);
                }
            }
        }
    }
    
    // Calculate reading time (200 words per minute)
    $reading_time = ceil($total_words / 200);
    
    return max(1, $reading_time); // Minimum 1 minute
}

/**
 * Recursively count words in array values
 */
function count_words_in_array($array) {
    $word_count = 0;
    
    foreach ($array as $value) {
        if (is_string($value)) {
            $clean_text = strip_tags($value);
            $word_count += str_word_count($clean_text);
        } elseif (is_array($value)) {
            $word_count += count_words_in_array($value);
        }
    }
    
    return $word_count;
}

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
		
		// Локализация для AJAX
		wp_localize_script('udsc-main', 'udsc_ajax', array(
			'ajax_url' => admin_url('admin-ajax.php'),
			'nonce' => wp_create_nonce('udsc_filter_nonce')
		));
	}
	
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
require get_template_directory() . '/inc/components/TestimonialForm.php';
require get_template_directory() . '/inc/components/TestimonialCard.php';

/**
 * Load testimonial generator (only in admin)
 */
if (is_admin()) {
    require get_template_directory() . '/generate-testimonials-admin.php';
}


/**
 * Flush rewrite rules when the theme is activated
 */
function udsc_flush_rewrite_rules() {
	register_case_study_cpt();
	register_testimonial_cpt();
	flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'udsc_flush_rewrite_rules' );

/**
 * Flush rewrite rules when testimonial post type is registered
 */
function udsc_flush_rewrite_rules_on_init() {
	flush_rewrite_rules();
}
add_action( 'init', 'udsc_flush_rewrite_rules_on_init', 999 );

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


// Регистрируем кастомный тип записи "Отзывы клиентов"
function register_testimonial_cpt() {
    $labels = array(
        'name'               => 'Отзывы',
        'singular_name'      => 'Отзыв',
        'menu_name'          => 'Отзывы',
        'name_admin_bar'     => 'Отзыв',
        'add_new'            => 'Добавить отзыв',
        'add_new_item'       => 'Добавить новый отзыв',
        'new_item'           => 'Новый отзыв',
        'edit_item'          => 'Редактировать отзыв',
        'view_item'          => 'Просмотреть отзыв',
        'all_items'          => 'Все отзывы',
        'search_items'       => 'Искать отзывы',
        'not_found'          => 'Отзывы не найдены',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => true,
        'rewrite'            => array('slug' => 'testimonials'),
        'menu_icon'          => 'dashicons-format-quote',
        'supports'           => array('title', 'editor', 'thumbnail'),
        'show_in_rest'       => true,
    );

    register_post_type('testimonial', $args);
}
add_action('init', 'register_testimonial_cpt');

/**
 * Обработка формы отзывов
 */
function handle_testimonial_form_submission() {
    if (!isset($_POST['udsc_testimonial_nonce']) || !wp_verify_nonce($_POST['udsc_testimonial_nonce'], 'udsc_testimonial_form')) {
        return;
    }

    $name = sanitize_text_field($_POST['name']);
    $location = sanitize_text_field($_POST['location']);
    $rating = intval($_POST['rating']);
    $debt = sanitize_text_field($_POST['debt']);
    $text = sanitize_textarea_field($_POST['text']);
    $consent = isset($_POST['consent']) ? 1 : 0;

    // Валидация
    if (empty($name) || empty($location) || empty($rating) || empty($debt) || empty($text) || !$consent) {
        wp_die('Пожалуйста, заполните все поля формы и согласитесь на обработку данных.');
    }

    // Создаем пост отзыва
    $testimonial_data = array(
        'post_title'   => $name . ' - ' . $location,
        'post_content' => $text,
        'post_status'  => 'pending', // На модерации
        'post_type'    => 'testimonial'
    );

    $testimonial_id = wp_insert_post($testimonial_data);

    if ($testimonial_id) {
        // Сохраняем ACF поля
        update_field('testimonial_name', $name, $testimonial_id);
        update_field('testimonial_city', $location, $testimonial_id);
        update_field('testimonial_text', $text, $testimonial_id);
        update_field('testimonial_rating', $rating, $testimonial_id);
        update_field('testimonial_written_off', $debt, $testimonial_id);
        update_field('testimonial_date', date('d.m.Y'), $testimonial_id);
        update_field('testimonial_case_number', 'А' . rand(10, 99) . '-' . rand(10000, 99999) . '/' . date('Y'), $testimonial_id);
        
        // Отправляем уведомление администратору
        $admin_email = get_option('admin_email');
        $subject = 'Новый отзыв от ' . $name;
        $message = "Получен новый отзыв:\n\n";
        $message .= "Имя: " . $name . "\n";
        $message .= "Город: " . $location . "\n";
        $message .= "Оценка: " . $rating . "/5\n";
        $message .= "Сумма долга: " . $debt . "\n";
        $message .= "Отзыв: " . $text . "\n\n";
        $message .= "Ссылка для модерации: " . admin_url('post.php?post=' . $testimonial_id . '&action=edit');

        wp_mail($admin_email, $subject, $message);

        // Редирект с сообщением об успехе
        wp_redirect(add_query_arg('testimonial_submitted', '1', wp_get_referer()));
        exit;
    } else {
        wp_die('Произошла ошибка при сохранении отзыва. Попробуйте еще раз.');
    }
}
add_action('admin_post_testimonial_form', 'handle_testimonial_form_submission');
add_action('admin_post_nopriv_testimonial_form', 'handle_testimonial_form_submission');

// AJAX обработчики для асинхронной отправки формы
add_action('wp_ajax_testimonial_form', 'handle_testimonial_form_ajax');
add_action('wp_ajax_nopriv_testimonial_form', 'handle_testimonial_form_ajax');

// Тестовый AJAX обработчик для отладки
add_action('wp_ajax_test_ajax', 'test_ajax_handler');
add_action('wp_ajax_nopriv_test_ajax', 'test_ajax_handler');

function test_ajax_handler() {
    wp_send_json_success('AJAX работает!');
}

/**
 * AJAX обработчик для формы отзывов
 */
function handle_testimonial_form_ajax() {
    // Проверяем nonce
    if (!wp_verify_nonce($_POST['udsc_testimonial_nonce'], 'udsc_testimonial_form')) {
        wp_send_json_error('Неверный nonce');
        return;
    }

    // Получаем и очищаем данные
    $name = sanitize_text_field($_POST['name']);
    $location = sanitize_text_field($_POST['location']);
    $text = sanitize_textarea_field($_POST['text']);
    $rating = intval($_POST['rating']);
    $debt = sanitize_text_field($_POST['debt']);
    $consent = isset($_POST['consent']) ? 1 : 0;

    // Валидация
    if (empty($name) || empty($location) || empty($text) || empty($rating) || empty($debt) || !$consent) {
        wp_send_json_error('Все поля обязательны для заполнения');
        return;
    }

    if ($rating < 1 || $rating > 5) {
        wp_send_json_error('Неверная оценка');
        return;
    }

    // Создаем отзыв
    $testimonial_data = array(
        'post_title'   => $name . ' - ' . $location,
        'post_content' => $text,
        'post_status'  => 'pending',
        'post_type'    => 'testimonial'
    );

    $testimonial_id = wp_insert_post($testimonial_data);

    if ($testimonial_id) {
        // Сохраняем ACF поля
        update_field('testimonial_name', $name, $testimonial_id);
        update_field('testimonial_city', $location, $testimonial_id);
        update_field('testimonial_text', $text, $testimonial_id);
        update_field('testimonial_rating', $rating, $testimonial_id);
        update_field('testimonial_written_off', $debt, $testimonial_id);
        update_field('testimonial_date', date('d.m.Y'), $testimonial_id);
        update_field('testimonial_case_number', 'А' . rand(10, 99) . '-' . rand(10000, 99999) . '/' . date('Y'), $testimonial_id);

        // Отправляем уведомление администратору
        $admin_email = get_option('admin_email');
        $subject = 'Новый отзыв на сайте';
        $message = "Получен новый отзыв:\n\n";
        $message .= "Имя: $name\n";
        $message .= "Город: $location\n";
        $message .= "Оценка: $rating/5\n";
        $message .= "Сумма долга: $debt\n";
        $message .= "Отзыв: $text\n\n";
        $message .= "Ссылка на отзыв: " . admin_url('post.php?post=' . $testimonial_id . '&action=edit');

        wp_mail($admin_email, $subject, $message);

        wp_send_json_success('Отзыв успешно отправлен на модерацию');
    } else {
        wp_send_json_error('Ошибка при сохранении отзыва');
    }
}
