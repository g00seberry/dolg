<?php
/**
 * Modal Component for UDSC Theme
 * 
 * Универсальный модальный компонент с поддержкой Material Tailwind
 * 
 * @package udsc
 * @since 1.0.0
 */

class UDSC_Modal {
    
    /**
     * Счетчик модальных окон для уникальных ID
     */
    private static $modal_counter = 0;
    
    /**
     * Размеры модальных окон
     */
    private static $sizes = array(
        'sm'  => 'w-full max-w-sm',
        'md'  => 'w-full max-w-md', 
        'lg'  => 'w-full max-w-lg',
        'xl'  => 'w-full max-w-xl',
        '2xl' => 'w-full max-w-2xl',
        '3xl' => 'w-full max-w-3xl',
        '4xl' => 'w-full max-w-4xl',
        'full' => 'w-full max-w-none mx-4',
        'custom' => '' // Для кастомных размеров
    );
    
    /**
     * Иконка закрытия модального окна
     */
    private static function get_close_icon() {
        return '<svg width="1.5em" height="1.5em" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="currentColor" class="h-5 w-5">
            <path d="M6.75827 17.2426L12.0009 12M17.2435 6.75736L12.0009 12M12.0009 12L6.75827 6.75736M12.0009 12L17.2435 17.2426" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
        </svg>';
    }
    
    /**
     * Генерирует кнопку для открытия модального окна (Material Tailwind API)
     * 
     * @param string $modal_id ID модального окна
     * @param string $button_text Текст кнопки
     * @param string $button_classes CSS классы для кнопки
     * @param array $button_attributes Дополнительные атрибуты кнопки
     * @return string HTML кнопки
     */
    public static function trigger_button($modal_id, $button_text = 'Open', $button_classes = '', $button_attributes = array()) {
        $default_classes = 'inline-flex items-center justify-center border align-middle select-none font-sans font-medium text-center transition-all duration-300 ease-in disabled:opacity-50 disabled:shadow-none disabled:cursor-not-allowed focus:shadow-none text-sm rounded-md py-2 px-4 shadow-sm hover:shadow-md bg-slate-800 border-slate-800 text-slate-50 hover:bg-slate-700 hover:border-slate-700';
        
        $classes = !empty($button_classes) ? $button_classes : $default_classes;
        
        // Добавляем # к ID если его нет
        $target_id = strpos($modal_id, '#') === 0 ? $modal_id : '#' . $modal_id;
        
        $attributes_string = '';
        foreach ($button_attributes as $key => $value) {
            $attributes_string .= sprintf(' %s="%s"', esc_attr($key), esc_attr($value));
        }
        
        return sprintf(
            '<button type="button" data-toggle="modal" data-target="%s" class="%s"%s>%s</button>',
            esc_attr($target_id),
            esc_attr($classes),
            $attributes_string,
            esc_html($button_text)
        );
    }
    
    /**
     * Создает модальное окно
     * 
     * @param array $args Массив параметров модального окна
     * @return string HTML модального окна
     */
    public static function create($args = array()) {
        // Увеличиваем счетчик для уникального ID
        self::$modal_counter++;
        
        // Настройки по умолчанию
        $defaults = array(
            'id' => 'modal-' . self::$modal_counter,
            'title' => '',
            'content' => '',
            'size' => 'lg',
            'custom_size_classes' => '',
            'show_close_button' => true,
            'show_header' => true,
            'show_footer' => false,
            'header_classes' => '',
            'body_classes' => '',
            'footer_classes' => '',
            'footer_content' => '',
            'backdrop_classes' => '',
            'modal_classes' => '',
            'closable_backdrop' => true,
            'escape_close' => true,
            'focus_trap' => true,
            'aria_labelledby' => '',
            'aria_describedby' => '',
            'additional_attributes' => array()
        );
        
        $args = wp_parse_args($args, $defaults);
        
        // Определяем размер модального окна
        $size_classes = '';
        if ($args['size'] === 'custom' && !empty($args['custom_size_classes'])) {
            $size_classes = $args['custom_size_classes'];
        } elseif (isset(self::$sizes[$args['size']])) {
            $size_classes = self::$sizes[$args['size']];
        } else {
            $size_classes = self::$sizes['lg']; // Размер по умолчанию
        }
        
        // Классы для backdrop
        $backdrop_classes = !empty($args['backdrop_classes']) 
            ? $args['backdrop_classes'] 
            : 'fixed inset-0 bg-slate-950/50 flex justify-center items-center opacity-0 pointer-events-none transition-opacity duration-300 ease-out z-[9999]';
        
        // Классы для модального окна
        $modal_classes = !empty($args['modal_classes']) 
            ? $args['modal_classes'] 
            : 'bg-white rounded-xl shadow-2xl shadow-slate-950/5 border border-slate-200 scale-95 transition-transform duration-300 ease-out';
        
        // Дополнительные атрибуты
        $additional_attrs = '';
        foreach ($args['additional_attributes'] as $key => $value) {
            $additional_attrs .= sprintf(' %s="%s"', esc_attr($key), esc_attr($value));
        }
        
        // ARIA атрибуты
        $aria_labelledby = !empty($args['aria_labelledby']) ? ' aria-labelledby="' . esc_attr($args['aria_labelledby']) . '"' : '';
        $aria_describedby = !empty($args['aria_describedby']) ? ' aria-describedby="' . esc_attr($args['aria_describedby']) . '"' : '';
        
        ob_start();
        ?>
        <div class="<?php echo esc_attr($backdrop_classes); ?>" 
             id="<?php echo esc_attr($args['id']); ?>" 
             role="dialog" 
             aria-modal="true"
             aria-hidden="true"
             <?php echo $aria_labelledby . $aria_describedby; ?>
             <?php echo $additional_attrs; ?>>
            
            <div class="<?php echo esc_attr($modal_classes . ' ' . $size_classes); ?>" role="document">
                
                <?php if ($args['show_header'] && (!empty($args['title']) || $args['show_close_button'])): ?>
                <div class="<?php echo esc_attr('p-4 pb-2 flex justify-between items-center ' . $args['header_classes']); ?>">
                    <?php if (!empty($args['title'])): ?>
                        <h2 class="text-lg text-slate-800 font-semibold" 
                            id="<?php echo esc_attr($args['id'] . '-title'); ?>">
                            <?php echo wp_kses_post($args['title']); ?>
                        </h2>
                    <?php endif; ?>
                    
                    <?php if ($args['show_close_button']): ?>
                        <button type="button" 
                                data-dismiss="modal"
                                aria-label="<?php esc_attr_e('Закрыть модальное окно', 'udsc'); ?>"
                                class="inline-grid place-items-center border align-middle select-none font-sans font-medium text-center transition-all duration-300 ease-in disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-sm min-w-[34px] min-h-[34px] rounded-md bg-transparent border-transparent text-slate-600 hover:bg-slate-200/10 hover:border-slate-200/10 shadow-none hover:shadow-none outline-none">
                            <?php echo self::get_close_icon(); ?>
                        </button>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
                
                <?php if (!empty($args['content'])): ?>
                <div class="<?php echo esc_attr('p-4 text-slate-600 ' . $args['body_classes']); ?>"
                     id="<?php echo esc_attr($args['id'] . '-content'); ?>">
                    <?php echo $args['content']; ?>
                </div>
                <?php endif; ?>
                
                <?php if ($args['show_footer'] && !empty($args['footer_content'])): ?>
                <div class="<?php echo esc_attr('p-4 flex justify-end gap-2 ' . $args['footer_classes']); ?>">
                    <?php echo wp_kses_post($args['footer_content']); ?>
                </div>
                <?php endif; ?>
                
            </div>
        </div>
        <?php
        
        return ob_get_clean();
    }
    
    /**
     * Создает простое модальное окно с минимальными параметрами
     * 
     * @param string $id ID модального окна
     * @param string $title Заголовок
     * @param string $content Содержимое
     * @param string $size Размер (sm, md, lg, xl, 2xl, 3xl, 4xl, full)
     * @return string HTML модального окна
     */
    public static function simple($id, $title, $content, $size = 'lg') {
        return self::create(array(
            'id' => $id,
            'title' => $title,
            'content' => $content,
            'size' => $size,
            'aria_labelledby' => $id . '-title',
            'aria_describedby' => $id . '-content'
        ));
    }
    
}
