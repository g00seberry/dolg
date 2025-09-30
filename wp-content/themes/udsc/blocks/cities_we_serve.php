<?php
/**
 * Cities We Serve Block Template
 * Секция с географией работы компании
 */

// Получаем данные блока (если используется ACF или аналогичные поля)
$section_title = get_field('cities_title') ?: 'География нашей работы';
$section_description = get_field('cities_description') ?: 'Мы работаем во всех крупных городах России и оказываем юридическую помощь по банкротству';
$consultation_phone = get_field('consultation_phone') ?: 'tel:' . udsc_get_contact_phone();

// Список городов (47 городов из оригинала)
$cities = get_field('cities_list') ?: [
    'Москва', 'Санкт-Петербург', 'Новосибирск', 'Екатеринбург', 'Казань', 'Нижний Новгород',
    'Челябинск', 'Самара', 'Уфа', 'Ростов-на-Дону', 'Омск', 'Красноярск',
    'Воронеж', 'Пермь', 'Волгоград', 'Краснодар', 'Саратов', 'Тюмень',
    'Тольятти', 'Ижевск', 'Барнаул', 'Ульяновск', 'Иркутск', 'Хабаровск',
    'Ярославль', 'Владивосток', 'Махачкала', 'Томск', 'Оренбург', 'Кемерово',
    'Новокузнецк', 'Рязань', 'Астрахань', 'Пенза', 'Липецк', 'Тула',
    'Киров', 'Чебоксары', 'Калининград', 'Курск', 'Ставрополь', 'Улан-Удэ',
    'Брянск', 'Иваново', 'Магнитогорск', 'Белгород', 'Сочи'
];
?>

<!-- Cities We Serve Section -->
<section class="section bg-muted/20">
    <div class="container">
        <!-- Section Header -->
        <div class="text-center mb-12">
            <h2 class="text-3xl lg:text-4xl font-bold mb-4">
                <?php echo esc_html($section_title); ?>
            </h2>
            <p class="text-xl text-muted-foreground max-w-2xl mx-auto">
                <?php echo esc_html($section_description); ?>
            </p>
        </div>

        <!-- Cities Grid -->
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4 text-center">
            <?php foreach ($cities as $index => $city): ?>
                <div class="p-3 bg-card rounded-lg border hover:shadow-sm transition-shadow">
                    <span class="text-sm font-medium text-foreground">
                        <?php echo esc_html($city); ?>
                    </span>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- CTA Section -->
        <div class="text-center mt-8">
            <p class="text-muted-foreground mb-6">
                Не нашли свой город? Мы работаем дистанционно по всей России!
            </p>
            <a href="<?php echo esc_url($consultation_phone); ?>" 
               class="inline-flex items-center justify-center whitespace-nowrap h-11 rounded-md px-8 text-sm font-medium bg-primary text-primary-foreground hover:bg-primary/90 ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50">
                <svg class="mr-2 h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                    <path d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                </svg>
                Бесплатная консультация
            </a>
        </div>
    </div>
</section>
