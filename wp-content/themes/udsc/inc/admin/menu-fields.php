<?php
/**
 * Custom menu fields for SVG icons on third-level items
 *
 * @package udsc
 */

if (!class_exists('UDSC_Menu_SVG_Fields')) {
    class UDSC_Menu_SVG_Fields {
        public static function init() {
            add_action('wp_nav_menu_item_custom_fields', array(__CLASS__, 'render_field'), 10, 4);
            add_action('wp_update_nav_menu_item', array(__CLASS__, 'save_field'), 10, 3);
        }

        public static function render_field($item_id, $item, $depth, $args) {
            if ($depth < 2) {
                return;
            }

            $value = get_post_meta($item_id, '_udsc_menu_svg_icon', true);
            ?>
            <p class="field-udsc-svg description description-wide">
                <label for="edit-menu-item-udsc-svg-<?php echo esc_attr($item_id); ?>">
                    <?php esc_html_e('SVG иконка (будет показана рядом с пунктом)', 'udsc'); ?><br />
                    <textarea id="edit-menu-item-udsc-svg-<?php echo esc_attr($item_id); ?>" class="widefat code" rows="5" name="menu-item-udsc-svg-icon[<?php echo esc_attr($item_id); ?>]" placeholder="&lt;svg ...&gt;...&lt;/svg&gt;"><?php echo esc_textarea($value); ?></textarea>
                </label>
            </p>
            <?php
        }

        public static function save_field($menu_id, $menu_item_db_id, $args) {
            if (!isset($_POST['menu-item-udsc-svg-icon'][ $menu_item_db_id ])) {
                delete_post_meta($menu_item_db_id, '_udsc_menu_svg_icon');
                return;
            }

            $raw = wp_unslash($_POST['menu-item-udsc-svg-icon'][ $menu_item_db_id ]);
            $value = trim($raw);

            if ($value === '') {
                delete_post_meta($menu_item_db_id, '_udsc_menu_svg_icon');
                return;
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
                'circle' => array('cx' => true, 'cy' => true, 'r' => true),
                'line' => array('x1' => true, 'x2' => true, 'y1' => true, 'y2' => true),
                'rect' => array('x' => true, 'y' => true, 'width' => true, 'height' => true, 'rx' => true, 'ry' => true),
                'polyline' => array('points' => true),
                'polygon' => array('points' => true),
                'g' => array('fill' => true, 'stroke' => true, 'stroke-width' => true, 'stroke-linecap' => true, 'stroke-linejoin' => true, 'class' => true),
            );

            $clean = wp_kses($value, $allowed);
            update_post_meta($menu_item_db_id, '_udsc_menu_svg_icon', $clean);
        }
    }

    UDSC_Menu_SVG_Fields::init();
}
