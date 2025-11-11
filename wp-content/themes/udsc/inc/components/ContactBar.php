<?php
/**
 * Contact Bar Component for UDSC Theme
 * 
 * @package udsc
 * @since 1.0.0
 */

class UDSC_ContactBar {

    /**
     * Верхние ссылки рядом с переключателем города
     *
     * @return array[]
     */
    private static function get_top_links() {
        return array(
            array('url' => home_url('/about'), 'label' => 'О нас'),
            array('url' => home_url('/editorial'), 'label' => 'Редакция'),
            array('url' => home_url('/promotions'), 'label' => 'Акции'),
            array('url' => home_url('/testimonials'), 'label' => 'Отзывы'),
            array('url' => home_url('/blog'), 'label' => 'Статьи'),
            array('url' => home_url('/contacts'), 'label' => 'Контакты'),
        );
    }

    /**
     * Социальные ссылки и действия в верхней панели
     *
     * @return array[]
     */
    private static function get_social_links() {
        return array(
            array(
                'url' => udsc_get_contact_telegram(),
                'label' => 'Telegram',
                'title' => 'Telegram',
                'icon' => 'icons8-tg',
            ),
            array(
                'url' => udsc_get_contact_vk(),
                'label' => 'VK',
                'title' => 'VK',
                'icon' => 'icons8-vk',
            ),
            array(
                'url' => udsc_get_contact_whatsapp(),
                'label' => 'WhatsApp',
                'title' => 'WhatsApp',
                'icon' => 'icons8-whatsapp-logo',
            ),
        );
    }

    /**
     * Буквы алфавита для выбора городов
     *
     * @return string[]
     */
    private static function get_alphabet() {
        return array('А','Б','В','Г','Д','Е','Ж','З','И','Й','К','Л','М','Н','О','П','Р','С','Т','У','Ф','Х','Ц','Ч','Ш','Щ','Э','Ю','Я');
    }

    /**
     * Популярные города
     *
     * @return string[]
     */
    private static function get_popular_cities() {
        return array(
            'Москва',
            'Санкт-Петербург',
            'Новосибирск',
            'Екатеринбург',
            'Нижний Новгород',
            'Казань',
            'Челябинск',
            'Омск',
            'Самара',
            'Ростов-на-Дону',
            'Уфа',
            'Красноярск',
            'Воронеж',
            'Пермь',
            'Волгоград',
            'Тюмень',
        );
    }

    /**
     * Города на букву А (как отдельная группа)
     *
     * @return string[]
     */
    private static function get_cities_a() {
        return array(
            'Абакан',
            'Альметьевск',
            'Анапа',
            'Ангарск',
            'Армавир',
            'Архангельск',
            'Астрахань',
            'Ачинск',
        );
    }

    /**
     * Призы для колеса фортуны
     *
     * @return array[]
     */
    private static function get_fortune_prizes() {
        return array(
            array('id' => 1, 'text' => '10%', 'color' => '#FFE5E5', 'description' => 'Скидка 10% на услуги банкротства', 'icon' => 'percent'),
            array('id' => 2, 'text' => 'Консультация', 'color' => '#E5F5FF', 'description' => 'Бесплатная консультация юриста', 'icon' => 'message'),
            array('id' => 3, 'text' => '15%', 'color' => '#E5FFE5', 'description' => 'Скидка 15% на полное сопровождение', 'icon' => 'percent'),
            array('id' => 4, 'text' => 'Анализ', 'color' => '#FFF5E5', 'description' => 'Бесплатный анализ долговой нагрузки', 'icon' => 'check'),
            array('id' => 5, 'text' => '20%', 'color' => '#FFE5F5', 'description' => 'Скидка 20% на реструктуризацию долгов', 'icon' => 'percent'),
            array('id' => 6, 'text' => 'Документы', 'color' => '#F5E5FF', 'description' => 'Помощь в сборе документов бесплатно', 'icon' => 'file'),
            array('id' => 7, 'text' => '5%', 'color' => '#E5FFFF', 'description' => 'Скидка 5% на любую услугу', 'icon' => 'percent'),
            array('id' => 8, 'text' => 'Расчет', 'color' => '#FFFFE5', 'description' => 'Персональный расчет стоимости банкротства', 'icon' => 'calculator'),
        );
    }

    /**
     * SVG иконки
     *
     * @param string $name
     * @param string $classes
     * @return string
     */
    private static function get_icon($name, $classes = 'h-4 w-4') {
        switch ($name) {
            case 'map-pin':
                return '<svg class="' . esc_attr($classes) . ' text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 1118 0z"></path><circle cx="12" cy="10" r="3" stroke-width="2" stroke="currentColor" fill="none"></circle></svg>';
            case 'gift':
                return '<svg class="' . esc_attr($classes) . '" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12v8a2 2 0 01-2 2H6a2 2 0 01-2-2v-8"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2 12h20"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 22V12"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8a2 2 0 10-4 0h4z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8a2 2 0 114 0h-4z"></path></svg>';
            case 'icons8-tg':
                return '<img src="' . esc_url(get_template_directory_uri() . '/assets/images/icons8-tg.svg') . '" alt="' . esc_attr__('Telegram', 'udsc') . '" class="' . esc_attr($classes) . '" width="18" height="18" style="width:18px;height:18px;">';
            case 'icons8-vk':
                return '<img src="' . esc_url(get_template_directory_uri() . '/assets/images/icons8-vk.svg') . '" alt="' . esc_attr__('VK', 'udsc') . '" class="' . esc_attr($classes) . '" width="18" height="18" style="width:18px;height:18px;">';
            case 'icons8-whatsapp-logo':
                return '<img src="' . esc_url(get_template_directory_uri() . '/assets/images/icons8-whatsapp-logo.svg') . '" alt="' . esc_attr__('WhatsApp', 'udsc') . '" class="' . esc_attr($classes) . '" width="18" height="18" style="width:18px;height:18px;">';
            case 'user':
                return '<svg class="' . esc_attr($classes) . '" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A9 9 0 1118.88 17.804M12 14a5 5 0 100-10 5 5 0 000 10z"></path></svg>';
            case 'search':
                return '<svg class="' . esc_attr($classes) . ' text-muted-foreground" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><circle cx="11" cy="11" r="7" stroke-width="2"></circle><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 20l-3-3"></path></svg>';
            case 'close':
                return '<svg class="' . esc_attr($classes) . '" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>';
            case 'shield':
                return '<svg class="' . esc_attr($classes) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10"></path></svg>';
            case 'phone':
                return '<svg class="' . esc_attr($classes) . '" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>';
            default:
                return '';
        }
    }

    /**
     * Отрисовка модального окна выбора города
     *
     * @return string
     */
    private static function render_city_dialog() {
        $alphabet = self::get_alphabet();
        $popular_cities = self::get_popular_cities();
        $cities_a = self::get_cities_a();
        $phone = udsc_get_contact_phone();
        $phone_display = self::format_phone($phone);

        ob_start();
        ?>
        <div id="city-dialog" class="fixed inset-0 z-[1050] hidden" data-city-dialog="wrapper" aria-hidden="true">
            <div class="absolute inset-0 bg-black/50" data-city-dialog-close></div>
            <div class="relative flex items-center justify-center min-h-screen p-4">
                <div class="bg-background border border-border rounded-2xl shadow-2xl w-full max-w-6xl max-h-[90vh] overflow-hidden flex flex-col">
                    <div class="flex items-center justify-between border-b border-border px-6 py-4">
                        <h2 class="text-3xl font-bold flex items-center gap-2">
                            <?php echo self::get_icon('shield', 'h-7 w-7 text-primary'); ?>
                            <?php esc_html_e('Выберите ваш город', 'udsc'); ?>
                        </h2>
                        <button type="button" class="p-2 rounded-lg hover:bg-muted transition-colors" data-city-dialog-close aria-label="<?php esc_attr_e('Закрыть выбор города', 'udsc'); ?>">
                            <?php echo self::get_icon('close', 'h-5 w-5'); ?>
                        </button>
                    </div>

                    <div class="p-6 overflow-y-auto">
                        <div class="relative mb-4">
                            <?php echo self::get_icon('search', 'h-5 w-5 absolute left-3 top-1/2 -translate-y-1/2 pointer-events-none'); ?>
                            <input id="city-search-input" type="text" placeholder="<?php esc_attr_e('Поиск города', 'udsc'); ?>" class="pl-10 pr-4 py-3 rounded-lg border border-border w-full focus:outline-none focus:ring-2 focus:ring-primary/50 text-base" autocomplete="off">
                        </div>

                        <div class="flex gap-1 mb-6 pb-4 border-b overflow-x-auto" id="city-alphabet">
                            <button type="button" class="w-8 h-8 flex items-center justify-center text-sm font-medium rounded transition-colors flex-shrink-0 bg-primary text-primary-foreground" data-letter="">
                                <?php echo self::get_icon('shield', 'h-4 w-4'); ?>
                            </button>
                            <?php foreach ($alphabet as $letter) : ?>
                                <button type="button" class="w-8 h-8 flex items-center justify-center text-sm font-medium rounded transition-colors flex-shrink-0 bg-accent hover:bg-accent/80" data-letter="<?php echo esc_attr($letter); ?>">
                                    <?php echo esc_html($letter); ?>
                                </button>
                            <?php endforeach; ?>
                        </div>

                        <div id="city-list" class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-8 gap-2 mb-6" data-cities="<?php echo esc_attr(wp_json_encode(array(
                            'popular' => $popular_cities,
                            'letter_a' => $cities_a,
                        ))); ?>">
                            <!-- Контент списка городов отрисовывается через JS -->
                        </div>

                        <div class="flex items-center justify-center gap-4 p-4 bg-primary/5 rounded-lg">
                            <?php echo self::get_icon('phone', 'h-5 w-5 text-primary'); ?>
                            <div class="flex flex-col items-start">
                                <a href="tel:<?php echo esc_attr(self::normalize_phone_for_tel($phone)); ?>" class="font-semibold text-primary text-xl hover:underline">
                                    <?php echo esc_html($phone_display); ?>
                                </a>
                                <span class="text-sm text-muted-foreground">
                                    <?php esc_html_e('Звоните нам бесплатно', 'udsc'); ?>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        return ob_get_clean();
    }

    /**
     * Колесо фортуны
     *
     * @return string
     */
    private static function render_fortune_wheel_modals() {
        $prizes = self::get_fortune_prizes();
        $segment_angle = 360 / count($prizes);

        ob_start();
        ?>
        <div id="fortune-wheel-canvas-wrapper" class="pointer-events-none fixed inset-0 z-[1100] hidden">
            <canvas id="fortune-fireworks-canvas" class="w-full h-full"></canvas>
        </div>

        <div id="fortune-wheel-modal" class="fixed inset-0 z-[1090] hidden" aria-hidden="true">
            <div class="absolute inset-0 bg-black/60" data-fortune-close></div>
            <div class="relative flex items-center justify-center min-h-screen p-4">
                <div class="bg-background border border-border rounded-2xl shadow-2xl w-full max-w-[720px] max-h-[95vh] overflow-hidden flex flex-col">
                    <div class="flex items-center justify-between border-b border-border px-6 py-4">
                        <div>
                            <h2 class="text-2xl font-bold">🎰 <?php esc_html_e('Колесо фортуны', 'udsc'); ?></h2>
                            <p class="text-muted-foreground"><?php esc_html_e('Крутите колесо и получите специальную скидку или бонус!', 'udsc'); ?></p>
                        </div>
                        <button type="button" class="p-2 rounded-lg hover:bg-muted transition-colors" data-fortune-close aria-label="<?php esc_attr_e('Закрыть колесо фортуны', 'udsc'); ?>">
                            <?php echo self::get_icon('close', 'h-5 w-5'); ?>
                        </button>
                    </div>

                    <div class="flex-1 overflow-y-auto px-6 py-6">
                        <div class="flex flex-col items-center gap-6">
                            <div class="relative">
                                <div class="absolute top-0 left-1/2 -translate-x-1/2 -translate-y-4 z-10">
                                    <div class="w-0 h-0 border-l-[25px] border-l-transparent border-r-[25px] border-r-transparent border-t-[35px] border-t-red-500 drop-shadow-lg"></div>
                                </div>
                                <div class="relative w-[320px] h-[320px] sm:w-[420px] sm:h-[420px] lg:w-[520px] lg:h-[520px]">
                                    <svg id="fortune-wheel-svg" class="w-full h-full drop-shadow-2xl" viewBox="0 0 200 200">
                                        <circle cx="100" cy="100" r="98" fill="hsl(var(--card))" stroke="hsl(var(--border))" stroke-width="2"></circle>
                                        <?php foreach ($prizes as $index => $prize) :
                                            $start_angle = deg2rad(($index * $segment_angle) - 90);
                                            $end_angle = deg2rad((($index + 1) * $segment_angle) - 90);
                                            $large_arc = $segment_angle > 180 ? 1 : 0;
                                            $x1 = 100 + 90 * cos($start_angle);
                                            $y1 = 100 + 90 * sin($start_angle);
                                            $x2 = 100 + 90 * cos($end_angle);
                                            $y2 = 100 + 90 * sin($end_angle);
                                            $text_angle = deg2rad(($index * $segment_angle) + ($segment_angle / 2) - 90);
                                            $icon_x = 100 + 50 * cos($text_angle);
                                            $icon_y = 100 + 50 * sin($text_angle);
                                            $text_x = 100 + 68 * cos($text_angle);
                                            $text_y = 100 + 68 * sin($text_angle);
                                            $text_rotation = ($index * $segment_angle) + ($segment_angle / 2);
                                            ?>
                                            <g data-prize-index="<?php echo esc_attr($prize['id']); ?>">
                                                <path d="M 100 100 L <?php echo esc_attr($x1); ?> <?php echo esc_attr($y1); ?> A 90 90 0 <?php echo esc_attr($large_arc); ?> 1 <?php echo esc_attr($x2); ?> <?php echo esc_attr($y2); ?> Z" fill="<?php echo esc_attr($prize['color']); ?>" stroke="#ffffff" stroke-width="3"></path>
                                                <text x="<?php echo esc_attr($icon_x); ?>" y="<?php echo esc_attr($icon_y); ?>" font-size="14" text-anchor="middle" dominant-baseline="middle" transform="rotate(<?php echo esc_attr($text_rotation); ?>, <?php echo esc_attr($icon_x); ?>, <?php echo esc_attr($icon_y); ?>)">
                                                    <?php echo esc_html(self::get_prize_icon_emoji($prize['icon'])); ?>
                                                </text>
                                                <text x="<?php echo esc_attr($text_x); ?>" y="<?php echo esc_attr($text_y); ?>" fill="#000000" font-size="10" font-weight="bold" text-anchor="middle" dominant-baseline="middle" transform="rotate(<?php echo esc_attr($text_rotation); ?>, <?php echo esc_attr($text_x); ?>, <?php echo esc_attr($text_y); ?>)">
                                                    <?php echo esc_html($prize['text']); ?>
                                                </text>
                                            </g>
                                        <?php endforeach; ?>
                                        <circle cx="100" cy="100" r="20" fill="hsl(var(--primary))" stroke="hsl(var(--background))" stroke-width="3"></circle>
                                        <circle cx="100" cy="100" r="15" fill="hsl(var(--primary-foreground))" opacity="0.3"></circle>
                                    </svg>
                                </div>
                            </div>
                            <button type="button" id="fortune-spin-button" class="px-8 py-3 rounded-lg bg-primary text-primary-foreground hover:bg-primary/90 transition-colors flex items-center gap-2 disabled:opacity-60 disabled:cursor-not-allowed">
                                <?php echo self::get_icon('gift', 'h-5 w-5'); ?>
                                <span><?php esc_html_e('Крутить колесо', 'udsc'); ?></span>
                            </button>
                            <p class="text-sm text-muted-foreground text-center max-w-[420px]">
                                <?php esc_html_e('Каждый клиент может крутить колесо один раз в день', 'udsc'); ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="fortune-wheel-result" class="fixed inset-0 z-[1095] hidden" aria-hidden="true">
            <div class="absolute inset-0 bg-black/60" data-fortune-result-close></div>
            <div class="relative flex items-center justify-center min-h-screen p-4">
                <div class="bg-background border border-border rounded-2xl shadow-2xl w-full max-w-lg">
                    <div class="flex items-center justify-between border-b border-border px-6 py-4">
                        <div>
                            <h2 class="text-2xl font-bold">🎉 <?php esc_html_e('Поздравляем!', 'udsc'); ?></h2>
                        </div>
                        <button type="button" class="p-2 rounded-lg hover:bg-muted transition-colors" data-fortune-result-close aria-label="<?php esc_attr_e('Закрыть результат', 'udsc'); ?>">
                            <?php echo self::get_icon('close', 'h-5 w-5'); ?>
                        </button>
                    </div>
                    <div class="px-6 py-6 space-y-4">
                        <div id="fortune-prize-title" class="text-primary font-bold text-xl"></div>
                        <div id="fortune-prize-description" class="text-foreground text-base"></div>
                        <div class="pt-4 text-sm text-muted-foreground">
                            <?php esc_html_e('Свяжитесь с нами, чтобы воспользоваться акцией. Промокод действителен 7 дней.', 'udsc'); ?>
                        </div>
                        <div class="flex justify-end pt-2">
                            <button type="button" class="px-5 py-2 rounded-lg bg-primary text-primary-foreground hover:bg-primary/90 transition-colors" data-fortune-result-close>
                                <?php esc_html_e('Отлично!', 'udsc'); ?>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php

        $prizes_data = array_map(function ($prize) {
            return array(
                'id' => $prize['id'],
                'text' => $prize['text'],
                'description' => $prize['description'],
            );
        }, $prizes);

        printf('<script type="application/json" id="fortune-prizes-data">%s</script>', wp_json_encode($prizes_data));

        return ob_get_clean();
    }

    /**
     * Emoji иконки призов (как в React)
     *
     * @param string $icon
     * @return string
     */
    private static function get_prize_icon_emoji($icon) {
        switch ($icon) {
            case 'percent':
                return '💰';
            case 'message':
                return '💬';
            case 'check':
                return '✓';
            case 'file':
                return '📄';
            case 'calculator':
                return '🧮';
            default:
                return '🎁';
        }
    }

    /**
     * Форматирование телефона для отображения
     *
     * @param string $phone
     * @return string
     */
    private static function format_phone($phone) {
        $digits = preg_replace('/\D+/', '', $phone);

        if (strlen($digits) === 11 && $digits[0] === '8') {
            return substr_replace($digits, '-', 1, 0);
        }

        if (strlen($digits) === 11 && $digits[0] === '7') {
            return '8' . substr($digits, 1, 3) . '-' . substr($digits, 4, 3) . '-' . substr($digits, 7);
        }

        if (strlen($digits) === 11 && $digits[0] === '9') {
            return '+7' . substr($digits, 0, 3) . '-' . substr($digits, 3, 3) . '-' . substr($digits, 6);
        }

        return $phone;
    }

    /**
     * Формирование телефона для tel:
     *
     * @param string $phone
     * @return string
     */
    private static function normalize_phone_for_tel($phone) {
        $digits = preg_replace('/\D+/', '', $phone);
        if (empty($digits)) {
            return $phone;
        }
        if (strlen($digits) === 11 && $digits[0] === '8') {
            $digits = '7' . substr($digits, 1);
        }
        return '+' . $digits;
    }

    /**
     * Основной вывод компонента
     *
     * @return string
     */
    public static function render() {
        $top_links = self::get_top_links();
        $social_links = self::get_social_links();
        $default_city = 'Москва';

        ob_start();
        ?>
        <div class="bg-muted/50 py-1.5 relative z-50">
            <div class="container">
                <div class="flex items-center justify-between text-sm text-muted-foreground">
                    <button type="button" class="hidden md:flex items-center gap-2 hover:opacity-70 transition-opacity" id="city-selector-button" data-city-dialog-open aria-haspopup="dialog" aria-expanded="false">
                        <?php echo self::get_icon('map-pin'); ?>
                        <span class="text-sm font-medium text-foreground" id="selected-city-label"><?php echo esc_html($default_city); ?></span>
                    </button>

                    <div class="hidden md:flex items-center gap-6">
                        <?php foreach ($top_links as $link) : ?>
                            <a href="<?php echo esc_url($link['url']); ?>" class="hover:text-primary transition-colors" style="color: #666666;">
                                <?php echo esc_html($link['label']); ?>
                            </a>
                        <?php endforeach; ?>

                        <div class="flex items-center gap-3 border-l border-border pl-6">
                            <?php foreach ($social_links as $link) : ?>
                                <?php if (!empty($link['type']) && 'button' === $link['type']) : ?>
                                    <button <?php echo self::build_attributes($link['attributes']); ?> class="<?php echo esc_attr($link['extra_classes']); ?>" title="<?php echo esc_attr($link['title']); ?>">
                                        <?php echo self::get_icon($link['icon']); ?>
                                    </button>
                                <?php elseif (!empty($link['url'])) : ?>
                                    <a href="<?php echo esc_url($link['url']); ?>" target="_blank" rel="noopener noreferrer" class="hover:text-primary transition-colors" title="<?php echo esc_attr($link['title']); ?>">
                                        <?php echo self::get_icon($link['icon']); ?>
                                    </a>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        echo self::render_city_dialog();
        echo self::render_fortune_wheel_modals();
        return ob_get_clean();
    }

    /**
     * Помощник для формирования атрибутов кнопки
     *
     * @param array $attributes
     * @return string
     */
    private static function build_attributes($attributes = array()) {
        $result = '';
        foreach ($attributes as $key => $value) {
            if (is_bool($value)) {
                if ($value) {
                    $result .= sprintf(' %s', esc_attr($key));
                }
                continue;
            }
            $result .= sprintf(' %s="%s"', esc_attr($key), esc_attr($value));
        }
        return $result;
    }
}
