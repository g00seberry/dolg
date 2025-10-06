<?php
/**
 * Testimonial Card Component for UDSC Theme
 * 
 * Переиспользуемый компонент для отображения карточки отзыва
 * 
 * @package udsc
 * @since 1.0.0
 */

class UDSC_TestimonialCard {

    /**
     * Render testimonial card
     * 
     * @param array $args {
     *     @type string $name Имя клиента
     *     @type string $city Город клиента
     *     @type string $text Текст отзыва
     *     @type int $rating Рейтинг (1-5)
     *     @type string $written_off Сумма долга
     *     @type string $case_number Номер дела
     *     @type string $date Дата отзыва
     *     @type string $classes Дополнительные CSS классы
     *     @type bool $show_additional_info Показывать ли дополнительную информацию
     * }
     */
    public static function create($args = array()) {
        $defaults = array(
            'name' => '',
            'city' => '',
            'text' => '',
            'rating' => 5,
            'written_off' => '',
            'case_number' => '',
            'date' => '',
            'classes' => '',
            'show_additional_info' => true
        );

        $args = wp_parse_args($args, $defaults);

        // Проверяем обязательные поля
        if (empty($args['name']) || empty($args['text']) || empty($args['rating'])) {
            return '';
        }

        ob_start();
        ?>
        <div class="bg-white rounded-lg border border-border p-6 hover:shadow-lg transition-all duration-300 <?php echo esc_attr($args['classes']); ?>">
            <div class="p-0">
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-primary/10 rounded-full flex items-center justify-center">
                            <svg class="h-5 w-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                        </div>
                        <div>
                            <div class="font-semibold"><?php echo esc_html($args['name']); ?></div>
                            <div class="text-sm text-muted-foreground flex items-center gap-1">
                                <svg class="h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                <?php echo esc_html($args['city'] ?: 'Не указан'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center gap-1">
                        <?php echo self::render_stars($args['rating']); ?>
                    </div>
                </div>

                <div class="mb-4">
                    <svg class="h-5 w-5 text-primary/50 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                    </svg>
                    <p class="text-muted-foreground text-sm leading-relaxed">
                        <?php echo esc_html($args['text']); ?>
                    </p>
                </div>

                <div class="space-y-2 text-xs text-muted-foreground">
                    <div class="flex items-center justify-between">
                        <span>Сумма долга:</span>
                        <span class="font-semibold text-primary"><?php echo esc_html($args['written_off'] ?: 'Не указана'); ?></span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span>Дело №:</span>
                        <span class="font-medium"><?php echo esc_html($args['case_number'] ?: 'Не указан'); ?></span>
                    </div>
                    <div class="flex items-center gap-1 text-xs">
                        <svg class="h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        <?php echo esc_html($args['date'] ?: 'Не указана'); ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
        return ob_get_clean();
    }

    /**
     * Render stars rating
     * 
     * @param int $rating Рейтинг от 1 до 5
     * @return string HTML звезд
     */
    public static function render_stars($rating) {
        $stars_html = '';
        for ($i = 1; $i <= 5; $i++) {
            $class = $i <= $rating ? 'text-yellow-400 fill-current' : 'text-gray-300';
            $stars_html .= '<svg class="h-4 w-4 ' . $class . '" fill="currentColor" viewBox="0 0 20 20">
                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
            </svg>';
        }
        return $stars_html;
    }

    /**
     * Create testimonial card from post data
     * 
     * @param WP_Post $post Объект поста отзыва
     * @param array $args Дополнительные параметры
     * @return string HTML карточки
     */
    public static function create_from_post($post, $args = array()) {
        setup_postdata($post);

        $testimonial_data = array(
            'name' => get_field('testimonial_name'),
            'city' => get_field('testimonial_city'),
            'text' => get_field('testimonial_text'),
            'rating' => get_field('testimonial_rating'),
            'written_off' => get_field('testimonial_written_off'),
            'case_number' => get_field('testimonial_case_number'),
            'date' => get_field('testimonial_date')
        );

        // Объединяем с переданными аргументами
        $args = wp_parse_args($args, $testimonial_data);

        return self::create($args);
    }
}
