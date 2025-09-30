<?php
/**
 * Админская страница настроек контактных данных
 *
 * @package udsc
 */

// Защита от прямого доступа
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Класс для управления настройками контактных данных
 */
class UDSC_Contact_Settings {
    
    /**
     * Инициализация
     */
    public static function init() {
        add_action('admin_menu', [__CLASS__, 'add_admin_menu']);
        add_action('admin_init', [__CLASS__, 'settings_init']);
    }
    
    /**
     * Добавляем пункт меню в админке
     */
    public static function add_admin_menu() {
        add_options_page(
            'Контактные данные',
            'Контактные данные', 
            'manage_options',
            'udsc-contact-settings',
            [__CLASS__, 'options_page']
        );
    }
    
    /**
     * Инициализация настроек
     */
    public static function settings_init() {
        // Регистрируем настройки
        register_setting('udsc_contact', 'udsc_contact_phone');
        register_setting('udsc_contact', 'udsc_contact_email');
        register_setting('udsc_contact', 'udsc_contact_address');
        register_setting('udsc_contact', 'udsc_contact_hours');
        register_setting('udsc_contact', 'udsc_contact_vk');
        register_setting('udsc_contact', 'udsc_contact_telegram');
        register_setting('udsc_contact', 'udsc_contact_whatsapp');
        
        // Добавляем секцию
        add_settings_section(
            'udsc_contact_section',
            'Настройки контактных данных',
            [__CLASS__, 'settings_section_callback'],
            'udsc_contact'
        );
        
        // Добавляем поля
        add_settings_field(
            'udsc_contact_phone',
            'Телефон',
            [__CLASS__, 'phone_render'],
            'udsc_contact',
            'udsc_contact_section'
        );
        
        add_settings_field(
            'udsc_contact_email',
            'Email',
            [__CLASS__, 'email_render'],
            'udsc_contact',
            'udsc_contact_section'
        );
        
        add_settings_field(
            'udsc_contact_address',
            'Адрес',
            [__CLASS__, 'address_render'],
            'udsc_contact',
            'udsc_contact_section'
        );
        
        add_settings_field(
            'udsc_contact_hours',
            'Время работы',
            [__CLASS__, 'hours_render'],
            'udsc_contact',
            'udsc_contact_section'
        );
        
        add_settings_field(
            'udsc_contact_vk',
            'Ссылка на ВКонтакте',
            [__CLASS__, 'vk_render'],
            'udsc_contact',
            'udsc_contact_section'
        );
        
        add_settings_field(
            'udsc_contact_telegram',
            'Ссылка на Telegram',
            [__CLASS__, 'telegram_render'],
            'udsc_contact',
            'udsc_contact_section'
        );
        
        add_settings_field(
            'udsc_contact_whatsapp',
            'Ссылка на WhatsApp',
            [__CLASS__, 'whatsapp_render'],
            'udsc_contact',
            'udsc_contact_section'
        );
    }
    
    /**
     * Описание секции настроек
     */
    public static function settings_section_callback() {
        echo '<p>Здесь вы можете настроить контактную информацию, которая будет отображаться на сайте.</p>';
    }
    
    /**
     * Поле телефона
     */
    public static function phone_render() {
        $value = get_option('udsc_contact_phone', '+79910042077');
        echo '<input type="text" name="udsc_contact_phone" value="' . esc_attr($value) . '" class="regular-text" placeholder="+79910042077">';
        echo '<p class="description">Формат: +79910042077</p>';
    }
    
    /**
     * Поле email
     */
    public static function email_render() {
        $value = get_option('udsc_contact_email', 'fnshield@yandex.ru');
        echo '<input type="email" name="udsc_contact_email" value="' . esc_attr($value) . '" class="regular-text" placeholder="fnshield@yandex.ru">';
    }
    
    /**
     * Поле адреса
     */
    public static function address_render() {
        $value = get_option('udsc_contact_address', 'г. Москва, вн.тер.г. Муниципальный Округ Измайлово, ул Средняя Первомайская, д.4, этаж 3, ком. 35');
        echo '<textarea name="udsc_contact_address" rows="3" class="large-text" placeholder="Адрес организации">' . esc_textarea($value) . '</textarea>';
    }
    
    /**
     * Поле времени работы
     */
    public static function hours_render() {
        $value = get_option('udsc_contact_hours', 'Пн-Пт 9:00-18:00, Сб 10:00-16:00');
        echo '<input type="text" name="udsc_contact_hours" value="' . esc_attr($value) . '" class="regular-text" placeholder="Пн-Пт 9:00-18:00, Сб 10:00-16:00">';
    }
    
    /**
     * Поле ВКонтакте
     */
    public static function vk_render() {
        $value = get_option('udsc_contact_vk', 'https://vk.com/finshield');
        echo '<input type="url" name="udsc_contact_vk" value="' . esc_attr($value) . '" class="regular-text" placeholder="https://vk.com/finshield">';
    }
    
    /**
     * Поле Telegram
     */
    public static function telegram_render() {
        $value = get_option('udsc_contact_telegram', 'https://t.me/finshield');
        echo '<input type="url" name="udsc_contact_telegram" value="' . esc_attr($value) . '" class="regular-text" placeholder="https://t.me/finshield">';
    }
    
    /**
     * Поле WhatsApp
     */
    public static function whatsapp_render() {
        $value = get_option('udsc_contact_whatsapp', '');
        echo '<input type="url" name="udsc_contact_whatsapp" value="' . esc_attr($value) . '" class="regular-text" placeholder="https://wa.me/79910042077">';
        echo '<p class="description">Формат: https://wa.me/79910042077</p>';
    }
    
    /**
     * Страница настроек
     */
    public static function options_page() {
        ?>
        <div class="wrap">
            <h1>Контактные данные</h1>
            <form action="options.php" method="post">
                <?php
                settings_fields('udsc_contact');
                do_settings_sections('udsc_contact');
                submit_button();
                ?>
            </form>
        </div>
        <?php
    }
    
    /**
     * Получить опцию с fallback значением
     */
    public static function get_option($key, $default = '') {
        return get_option('udsc_contact_' . $key, $default);
    }
}

// Инициализируем настройки
UDSC_Contact_Settings::init();

/**
 * Функции-хелперы для получения контактных данных
 */
function udsc_get_contact_phone() {
    return UDSC_Contact_Settings::get_option('phone', '+79910042077');
}

function udsc_get_contact_email() {
    return UDSC_Contact_Settings::get_option('email', 'fnshield@yandex.ru');
}

function udsc_get_contact_address() {
    return UDSC_Contact_Settings::get_option('address', 'г. Москва, вн.тер.г. Муниципальный Округ Измайлово, ул Средняя Первомайская, д.4, этаж 3, ком. 35');
}

function udsc_get_contact_hours() {
    return UDSC_Contact_Settings::get_option('hours', 'Пн-Пт 9:00-18:00, Сб 10:00-16:00');
}

function udsc_get_contact_vk() {
    return UDSC_Contact_Settings::get_option('vk', 'https://vk.com/finshield');
}

function udsc_get_contact_telegram() {
    return UDSC_Contact_Settings::get_option('telegram', 'https://t.me/finshield');
}

function udsc_get_contact_whatsapp() {
    return UDSC_Contact_Settings::get_option('whatsapp', '');
}
