<?php
/**
 * Main Navigation Component for UDSC Theme
 * 
 * Handles both desktop and mobile navigation with proper separation of concerns
 * 
 * @package udsc
 * @since 1.0.0
 */

class UDSC_MainNav {

    /**
     * Cache navigation structure per request
     */
    private static $navigation_cache = null;

    /**
     * Data set for mega menu rendering
     */
    private static $mega_menu_data = null;

    /**
     * Основные пункты навигации
     *
     * @return array[]
     */
    private static function get_navigation_items() {
        if (null !== self::$navigation_cache) {
            return self::$navigation_cache;
        }

        $items = array();
        $locations = get_nav_menu_locations();

        if (isset($locations['menu-1'])) {
            $menu = wp_get_nav_menu_object($locations['menu-1']);

            if ($menu instanceof WP_Term) {
                $menu_items = wp_get_nav_menu_items($menu->term_id, array('update_post_term_cache' => false));

                if (!empty($menu_items)) {
                    $items = self::build_menu_tree($menu_items);
                }
            }
        }

        if (empty($items)) {
            $items = self::get_default_navigation_items();
        }

        self::$navigation_cache = $items;
        return self::$navigation_cache;
    }

    /**
     * Построение дерева меню на основе элементов WordPress
     *
     * @param array $menu_items
     * @param int   $parent_id
     * @return array
     */
    private static function build_menu_tree($menu_items, $parent_id = 0) {
        $branch = array();

        foreach ($menu_items as $menu_item) {
            if ((int) $menu_item->menu_item_parent !== (int) $parent_id) {
                continue;
            }

            $node = array(
                'id'       => (int) $menu_item->ID,
                'title'    => $menu_item->title,
                'url'      => $menu_item->url ?? '',
                'target'   => $menu_item->target ?? '',
                'svg_icon' => get_post_meta($menu_item->ID, '_udsc_menu_svg_icon', true),
                'children' => array(),
            );

            $node['children'] = self::build_menu_tree($menu_items, (int) $menu_item->ID);
            $branch[] = $node;
        }

        return $branch;
    }

    /**
     * Дефолтная структура меню на случай отсутствия настроек
     *
     * @return array
     */
    public static function get_default_navigation_items() {
        return array(
            array('id' => 0, 'title' => 'Банкротство', 'url' => home_url('/services'), 'target' => '', 'children' => array()),
            array('id' => 0, 'title' => 'Успешные дела', 'url' => home_url('/case-studies'), 'target' => '', 'children' => array()),
            array('id' => 0, 'title' => 'Цены', 'url' => home_url('/pricing'), 'target' => '', 'children' => array()),
            array('id' => 0, 'title' => 'Финщит', 'url' => home_url('/blog'), 'target' => '', 'children' => array()),
            array('id' => 0, 'title' => 'О компании', 'url' => home_url('/about'), 'target' => '', 'children' => array()),
            array('id' => 0, 'title' => 'Отзывы', 'url' => home_url('/testimonials'), 'target' => '', 'children' => array()),
            array('id' => 0, 'title' => 'Контакты', 'url' => home_url('/contacts'), 'target' => '', 'children' => array()),
        );
    }

    /**
     * Проверка активного пункта меню
     *
     * @param string $href
     * @return bool
     */
    private static function is_active($href) {
        if (empty($href) || '#' === $href) {
            return false;
        }

        $current_path = isset($_SERVER['REQUEST_URI']) ? wp_parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) : '/';
        $target_path = wp_parse_url($href, PHP_URL_PATH);

        if ($target_path === '/') {
            return $current_path === '/';
        }

        return strpos($current_path, rtrim($target_path, '/')) === 0;
    }

    /**
     * SVG иконки для мегаменю и элементов навигации
     *
     * @param string $name
     * @param string $classes
     * @return string
     */
    private static function get_icon($name, $classes = 'h-4 w-4') {
        $icons = array(
            'chevron-down' => '<svg xmlns="http://www.w3.org/2000/svg" class="%s" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m6 9 6 6 6-6"/></svg>',
            'phone' => '<svg xmlns="http://www.w3.org/2000/svg" class="%s" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6A19.79 19.79 0 0 1 2.11 4.18 2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92Z"/></svg>',
            'zap' => '<svg xmlns="http://www.w3.org/2000/svg" class="%s" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 14a1 1 0 0 1-.78-1.63l9.9-10.2a.5.5 0 0 1 .86.46l-1.92 6.02A1 1 0 0 0 13 10h7a1 1 0 0 1 .78 1.63l-9.9 10.2a.5.5 0 0 1-.86-.46l1.92-6.02A1 1 0 0 0 11 14Z"/></svg>',
        );

        if (!isset($icons[$name])) {
            return '';
        }

        return sprintf($icons[$name], esc_attr($classes));
    }

    private static function sanitize_svg_markup($svg) {
        if (empty($svg)) {
            return '';
        }

        $allowed = array(
            'svg' => array(
                'xmlns' => true,
                'width' => true,
                'height' => true,
                'viewBox' => true,
                'fill' => true,
                'stroke' => true,
                'stroke-width' => true,
                'stroke-linecap' => true,
                'stroke-linejoin' => true,
                'class' => true,
                'role' => true,
                'focusable' => true,
            ),
            'path' => array(
                'd' => true,
                'fill' => true,
                'stroke' => true,
                'stroke-linecap' => true,
                'stroke-linejoin' => true,
                'stroke-width' => true,
            ),
            'circle' => array(
                'cx' => true,
                'cy' => true,
                'r' => true,
            ),
            'line' => array(
                'x1' => true,
                'x2' => true,
                'y1' => true,
                'y2' => true,
            ),
            'rect' => array(
                'x' => true,
                'y' => true,
                'width' => true,
                'height' => true,
                'rx' => true,
            ),
            'polyline' => array(
                'points' => true,
            ),
            'polygon' => array(
                'points' => true,
            ),
            'g' => array(
                'fill' => true,
                'stroke' => true,
                'stroke-width' => true,
                'stroke-linecap' => true,
                'stroke-linejoin' => true,
                'class' => true,
            ),
        );

        $clean = wp_kses($svg, $allowed);

        $clean = preg_replace_callback('/<svg\b([^>]*)>/i', function ($matches) {
            $attrs = $matches[1];

            $attrs = preg_replace('/\swidth="[^"]*"/i', '', $attrs);
            $attrs = preg_replace('/\sheight="[^"]*"/i', '', $attrs);
            $attrs = preg_replace('/\sclass="[^"]*"/i', '', $attrs);

            $attrs = trim($attrs);
            if ($attrs !== '') {
                $attrs = ' ' . $attrs;
            }

            return '<svg' . $attrs . ' class="inline-block shrink-0" width="24" height="24">';
        }, $clean, 1);

        return $clean;
    }

    /**
     * Кнопка CTA
     *
     * @param bool $is_mobile
     * @return string
     */
    private static function render_cta_button($is_mobile = false) {
        $classes = $is_mobile
            ? 'w-full bg-primary text-primary-foreground hover:bg-primary/90 px-6 py-3 rounded-lg font-medium transition-colors'
            : 'bg-primary text-primary-foreground hover:bg-primary/90 px-6 py-3 rounded-lg font-medium transition-colors';

        ob_start();
        ?>
        <button class="<?php echo esc_attr($classes); ?>" data-toggle="modal" data-target="#consultation-modal">
            <?php esc_html_e('Бесплатная консультация', 'udsc'); ?>
        </button>
        <?php
        return ob_get_clean();
    }

    /**
     * Телефон и подпись для шапки
     *
     * @return array
     */
    private static function get_phone_info() {
        $phone_raw = udsc_get_contact_phone();
        return array(
            'tel' => self::normalize_phone_for_tel($phone_raw),
            'display' => self::format_phone($phone_raw),
            'subtitle' => __('Звоните нам бесплатно', 'udsc'),
        );
    }

    /**
     * Телефон для tel:
     *
     * @param string $phone
     * @return string
     */
    private static function normalize_phone_for_tel($phone) {
        $digits = preg_replace('/\D+/', '', $phone);
        if (!$digits) {
            return $phone;
        }
        if (strlen($digits) === 11 && $digits[0] === '8') {
            $digits = '7' . substr($digits, 1);
        }
        return '+' . $digits;
    }

    /**
     * Форматированный телефон для отображения
     *
     * @param string $phone
     * @return string
     */
    private static function format_phone($phone) {
        $clean = preg_replace('/\D+/', '', $phone);
        if (strlen($clean) === 11) {
            $formatted = preg_replace('/^7/', '8', $clean);
            return substr($formatted, 0, 1) . '-' . substr($formatted, 1, 3) . '-' . substr($formatted, 4, 3) . '-' . substr($formatted, 7);
        }
        return $phone;
    }

    /**
     * Рендер пункта мегаменю
     *
     * @return string
     */
    private static function render_bankruptcy_mega_menu() {
        $mega_data = self::$mega_menu_data;
        $sections = array();

        if (is_array($mega_data) && !empty($mega_data['children'])) {
            $sections = $mega_data['children'];
        }

        if (empty($sections)) {
            return '';
        }

        $image = get_template_directory_uri() . '/assets/images/lawyer-main.jpg';

        ob_start();
        ?>
        <div id="bankruptcy-mega-menu" class="hidden" aria-hidden="true">
            <div class="fixed inset-0 bg-black/50 z-40" data-mega-backdrop></div>
            <div class="fixed left-0 right-0 top-[120px] z-50 flex justify-center px-4" data-mega-content>
                <div class="bg-background border border-border rounded-2xl shadow-2xl p-6 w-full max-w-[1400px]">
                    <div class="grid grid-cols-1 lg:grid-cols-[320px_1fr] gap-6">
                        <div class="relative rounded-xl overflow-hidden">
                            <img src="<?php echo esc_url($image); ?>" alt="<?php esc_attr_e('Юрист по банкротству', 'udsc'); ?>" class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent flex flex-col justify-end p-6">
                                <h3 class="text-white text-lg font-bold mb-4 leading-tight">
                                    <?php esc_html_e('Ведущий юрист: Бондарчук Д. В.', 'udsc'); ?>
                                </h3>
                                <button class="bg-primary text-primary-foreground hover:bg-primary/90 w-full px-4 py-3 rounded-lg font-medium transition-colors flex items-center justify-center gap-2">
                                    <?php echo self::get_icon('zap', 'h-4 w-4'); ?>
                                    <?php esc_html_e('Быстрое банкротство', 'udsc'); ?>
                                </button>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8" data-mega-sections>
                            <?php foreach ($sections as $section) : ?>
                                <?php if (empty($section['children'])) { continue; } ?>
                                <div>
                                    <?php if (!empty($section['url'])) : ?>
                                        <a href="<?php echo esc_url($section['url']); ?>" class="font-bold text-lg mb-4 text-foreground flex items-center gap-2 hover:text-primary">
                                            <?php echo esc_html($section['title']); ?>
                                        </a>
                                    <?php else : ?>
                                        <h4 class="font-bold text-lg mb-4 text-foreground">
                                            <?php echo esc_html($section['title']); ?>
                                        </h4>
                                    <?php endif; ?>
                                    <ul class="space-y-3">
                                        <?php foreach ($section['children'] as $item) : ?>
                                            <?php
                                            $item_url = $item['url'] ?? '';
                                            if (!$item_url) {
                                                continue;
                                            }
                                            $item_target = isset($item['target']) ? trim($item['target']) : '';
                                            $item_target_attr = '';
                                            if ($item_target !== '') {
                                                $item_target_attr = ' target="' . esc_attr($item_target) . '"';
                                                if ('_blank' === $item_target) {
                                                    $item_target_attr .= ' rel="noopener noreferrer"';
                                                }
                                            }
                                            ?>
                                            <li>
                                                <?php
                                                $icon_svg = $item['svg_icon'];
                                                ?>
                                                <a href="<?php echo esc_url($item_url); ?>" class="flex items-center gap-2 text-sm hover:text-primary transition-colors group"<?php echo $item_target_attr; ?>>
                                                    <?php if ($icon_svg) : ?>
                                                        <span class="text-primary">
                                                            <?php echo self::sanitize_svg_markup($icon_svg); ?>
                                                        </span>
                                                    <?php endif; ?>
                                                    <span class="group-hover:underline"><?php echo esc_html($item['title']); ?></span>
                                                </a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        return ob_get_clean();
    }

    /**
     * Десктопная навигация
     *
     * @return string
     */
    private static function render_desktop_nav() {
        $items = self::get_navigation_items();
        $phone_info = self::get_phone_info();
        self::$mega_menu_data = null;

        ob_start();
        ?>
        <div class="hidden lg:flex items-center space-x-8">
            <?php foreach ($items as $item) : ?>
                <?php
                $children = isset($item['children']) && is_array($item['children']) ? $item['children'] : array();
                $has_grandchildren = false;
                foreach ($children as $child_item) {
                    if (!empty($child_item['children'])) {
                        $has_grandchildren = true;
                        break;
                    }
                }

                $is_mega = $has_grandchildren;
                $url = $item['url'] ?? '';
                $is_active = $url ? self::is_active($url) : false;
                $target = isset($item['target']) ? trim($item['target']) : '';
                $target_attr = '';
                if ($target !== '') {
                    $target_attr = ' target="' . esc_attr($target) . '"';
                    if ('_blank' === $target) {
                        $target_attr .= ' rel="noopener noreferrer"';
                    }
                }
                ?>

                <?php if ($is_mega && !empty($children)) : ?>
                    <?php if (null === self::$mega_menu_data) : ?>
                        <?php self::$mega_menu_data = $item; ?>
                    <?php endif; ?>
                    <div class="relative" data-mega-container>
                        <button type="button" class="text-sm font-medium transition-colors hover:text-primary flex items-center gap-1 <?php echo $is_active ? 'text-primary relative' : 'text-foreground'; ?>" data-mega-trigger aria-expanded="false" aria-controls="bankruptcy-mega-menu">
                            <span class="<?php echo $is_active ? 'border-b-2 border-primary pb-1' : ''; ?>">
                                <?php echo esc_html($item['title']); ?>
                            </span>
                            <span class="transition-transform" data-mega-icon>
                                <?php echo self::get_icon('chevron-down', 'h-4 w-4'); ?>
                            </span>
                        </button>
                    </div>
                <?php else : ?>
                    <a href="<?php echo esc_url($url); ?>" class="text-sm font-medium transition-colors hover:text-primary flex items-center gap-1 <?php echo $is_active ? 'text-primary relative' : 'text-foreground'; ?>"<?php echo $target_attr; ?>>
                        <span class="<?php echo $is_active ? 'border-b-2 border-primary pb-1' : ''; ?>">
                            <?php echo esc_html($item['title']); ?>
                        </span>
                    </a>
                <?php endif; ?>
            <?php endforeach; ?>

            <a href="tel:<?php echo esc_attr($phone_info['tel']); ?>" class="flex items-center gap-2 hover:text-primary transition-colors">
                <?php echo self::get_icon('phone'); ?>
                <div class="flex flex-col">
                    <span class="font-semibold text-primary"><?php echo esc_html($phone_info['display']); ?></span>
                    <span class="text-xs text-muted-foreground"><?php echo esc_html($phone_info['subtitle']); ?></span>
                </div>
            </a>

            <?php echo self::render_cta_button(false); ?>
        </div>
        <?php
        return ob_get_clean();
    }

    /**
     * Мобильная кнопка меню
     *
     * @return string
     */
    private static function render_mobile_toggle() {
        ob_start();
        ?>
        <button id="mobile-menu-toggle" class="lg:hidden p-2" aria-label="<?php esc_attr_e('Открыть мобильное меню', 'udsc'); ?>" aria-expanded="false">
            <svg id="menu-open" class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
            <svg id="menu-close" class="h-6 w-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
        <?php
        return ob_get_clean();
    }

    /**
     * Мобильное меню
     *
     * @return string
     */
    private static function render_mobile_menu() {
        $items = self::get_navigation_items();

        ob_start();
        ?>
        <div id="mobile-menu" class="lg:hidden mt-4 pb-4 border-t border-border hidden" role="navigation" aria-label="<?php esc_attr_e('Мобильная навигация', 'udsc'); ?>">
            <div class="pt-4 space-y-2">
                <?php foreach ($items as $item) : ?>
                    <?php
                    $is_mega = !empty($item['is_mega']);
                    $url = $item['url'] ?? '';
                    $is_active = $url ? self::is_active($url) : false;
                    $target = isset($item['target']) ? trim($item['target']) : '';
                    $target_attr = '';
                    if ($target !== '') {
                        $target_attr = ' target="' . esc_attr($target) . '"';
                        if ('_blank' === $target) {
                            $target_attr .= ' rel="noopener noreferrer"';
                        }
                    }
                    ?>

                    <?php if ($is_mega) : ?>
                        <?php if ($url) : ?>
                            <a href="<?php echo esc_url($url); ?>" class="block py-2 px-4 rounded-lg transition-colors flex items-center justify-between <?php echo $is_active ? 'bg-primary text-primary-foreground' : 'text-foreground hover:bg-muted'; ?>"<?php echo $target_attr; ?>>
                                <span><?php echo esc_html($item['title']); ?></span>
                            </a>
                        <?php endif; ?>

                        <?php foreach ($item['children'] as $section) : ?>
                            <?php if (empty($section['children'])) { continue; } ?>
                            <div class="space-y-1">
                                <?php if (!empty($section['url'])) : ?>
                                    <a href="<?php echo esc_url($section['url']); ?>" class="py-2 px-4 font-medium text-muted-foreground text-sm hover:text-primary">
                                        <?php echo esc_html($section['title']); ?>
                                    </a>
                                <?php else : ?>
                                    <div class="py-2 px-4 font-medium text-muted-foreground text-sm">
                                        <?php echo esc_html($section['title']); ?>
                                    </div>
                                <?php endif; ?>
                                <?php foreach ($section['children'] as $child) : ?>
                                    <?php
                                    $child_url = $child['url'] ?? '';
                                    if (!$child_url) {
                                        continue;
                                    }
                                    $child_target = isset($child['target']) ? trim($child['target']) : '';
                                    $child_target_attr = '';
                                    if ($child_target !== '') {
                                        $child_target_attr = ' target="' . esc_attr($child_target) . '"';
                                        if ('_blank' === $child_target) {
                                            $child_target_attr .= ' rel="noopener noreferrer"';
                                        }
                                    }
                                    $child_icon = $child['svg_icon'];
                                    ?>
                                    <a href="<?php echo esc_url($child_url); ?>" class="block py-2 px-8 rounded-lg transition-colors flex items-center gap-2 text-foreground hover:bg-muted"<?php echo $child_target_attr; ?>>
                                        <?php if ($child_icon) : ?>
                                            <span class="text-primary mr-2">
                                                <?php echo self::sanitize_svg_markup($child_icon); ?>
                                            </span>
                                        <?php endif; ?>
                                        <span><?php echo esc_html($child['title']); ?></span>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <a href="<?php echo esc_url($url); ?>" class="block py-2 px-4 rounded-lg transition-colors flex items-center justify-between <?php echo $is_active ? 'bg-primary text-primary-foreground' : 'text-foreground hover:bg-muted'; ?>"<?php echo $target_attr; ?>>
                            <span><?php echo esc_html($item['title']); ?></span>
                        </a>
                    <?php endif; ?>
                <?php endforeach; ?>

                <div class="pt-2">
                    <?php echo self::render_cta_button(true); ?>
                </div>
            </div>
        </div>
        <?php
        return ob_get_clean();
    }

    /**
     * Основной рендер навигации
     *
     * @return string
     */
    public static function render() {
        self::$navigation_cache = null;
        self::$mega_menu_data = null;

        ob_start();
        ?>
        <nav class="py-4" role="navigation" aria-label="<?php esc_attr_e('Основная навигация', 'udsc'); ?>">
            <div class="container">
                <div class="flex items-center justify-between">
                    <?php
                    if (!class_exists('UDSC_Logo')) {
                        $logo_file = get_template_directory() . '/inc/components/Logo.php';
                        if (file_exists($logo_file)) {
                            require_once $logo_file;
                        }
                    }
                    echo UDSC_Logo::render();
                    ?>

                    <?php echo self::render_desktop_nav(); ?>

                    <?php echo self::render_mobile_toggle(); ?>
                </div>

                <?php echo self::render_mobile_menu(); ?>
            </div>
        </nav>
        <?php
        echo self::render_bankruptcy_mega_menu();
        return ob_get_clean();
    }
}
