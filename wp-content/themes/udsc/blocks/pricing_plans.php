<?php
/**
 * Pricing Plans Block Template
 * Секция с тарифными планами для банкротства
 */

// Получаем данные блока (если используется ACF или аналогичные поля)
$section_title = get_field('section_title') ?: 'Выберите подходящий пакет услуг';
$section_description = get_field('section_description') ?: 'Каждый пакет включает полное юридическое сопровождение на всех этапах процедуры';

// Массив тарифных планов
$pricing_plans = get_field('pricing_plans') ?: array(
    array(
        'id' => 'consultation',
        'name' => 'Консультация',
        'price' => 'Бесплатно',
        'duration' => '30 минут',
        'description' => 'Первичная оценка вашей ситуации и возможных путей решения',
        'features' => array(
            'Анализ вашей финансовой ситуации',
            'Оценка возможности банкротства',
            'Разъяснение ваших прав',
            'Рекомендации по дальнейшим действиям',
            'Ответы на все вопросы'
        ),
        'badge' => 'Популярно',
        'recommended' => false
    ),
    array(
        'id' => 'basic',
        'name' => 'Базовый пакет',
        'price' => 'от 25 000 ₽',
        'duration' => '2-4 месяца',
        'description' => 'Полное сопровождение процедуры банкротства физического лица',
        'features' => array(
            'Подготовка всех документов',
            'Подача заявления в суд',
            'Представительство в суде',
            'Работа с финансовым управляющим',
            'Сопровождение до завершения процедуры',
            'Консультации по телефону',
            'Помощь в продаже имущества'
        ),
        'badge' => null,
        'recommended' => true
    ),
    array(
        'id' => 'premium',
        'name' => 'Премиум пакет',
        'price' => 'от 45 000 ₽',
        'duration' => '2-6 месяцев',
        'description' => 'Максимальная защита ваших интересов и сохранение имущества',
        'features' => array(
            'Все услуги базового пакета',
            'Защита имущества от реализации',
            'Оспаривание действий кредиторов',
            'Работа с залоговым имуществом',
            'Срочные консультации 24/7',
            'Личный куратор дела',
            'Сопровождение сделок с недвижимостью',
            'Защита от субсидиарной ответственности'
        ),
        'badge' => 'Лучший выбор',
        'recommended' => false
    ),
    array(
        'id' => 'business',
        'name' => 'Корпоративный',
        'price' => 'от 150 000 ₽',
        'duration' => '6-12 месяцев',
        'description' => 'Банкротство юридических лиц и ИП с максимальной защитой',
        'features' => array(
            'Все услуги премиум пакета',
            'Банкротство ООО и ИП',
            'Защита от субсидиарной ответственности',
            'Работа с налоговыми органами',
            'Оптимизация процедуры банкротства',
            'Сопровождение корпоративных споров',
            'Работа с активами предприятия',
            'Консультации для учредителей'
        ),
        'badge' => null,
        'recommended' => false
    )
);
?>

<!-- Pricing Plans -->
<section class="section">
    <div class="container">
        <div class="text-center mb-16">
            <h2 class="text-3xl lg:text-4xl font-bold mb-4">
                <?php echo esc_html($section_title); ?>
            </h2>
            <p class="text-xl text-muted-foreground max-w-2xl mx-auto">
                <?php echo esc_html($section_description); ?>
            </p>
        </div>

        <div class="grid lg:grid-cols-2 xl:grid-cols-4 gap-8 mb-16">
            <?php foreach ($pricing_plans as $plan): ?>
                <div class="relative rounded-lg border bg-card text-card-foreground shadow-sm transition-all duration-300 hover:shadow-lg <?php echo $plan['recommended'] ? 'ring-2 ring-primary scale-105' : ''; ?>">
                    <?php if ($plan['badge']): ?>
                        <div class="absolute -top-3 left-1/2 -translate-x-1/2 inline-flex items-center rounded-full border px-2.5 py-0.5 text-xs font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 <?php echo $plan['recommended'] ? 'bg-primary text-primary-foreground' : 'border-transparent bg-primary text-primary-foreground hover:bg-primary/80'; ?>">
                            <?php echo esc_html($plan['badge']); ?>
                        </div>
                    <?php endif; ?>
                    
                    <div class="flex flex-col space-y-1.5 p-6 text-center pb-4">
                        <div class="inline-flex items-center justify-center w-12 h-12 rounded-lg mb-4 mx-auto <?php echo $plan['recommended'] ? 'bg-primary text-primary-foreground' : 'bg-accent text-accent-foreground'; ?>">
                            <?php
                            // Иконки для разных планов
                            $icon_path = '';
                            switch ($plan['id']) {
                                case 'consultation':
                                    $icon_path = 'M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z';
                                    break;
                                case 'basic':
                                    $icon_path = 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z';
                                    break;
                                case 'premium':
                                    $icon_path = 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z';
                                    break;
                                case 'business':
                                    $icon_path = 'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z';
                                    break;
                                default:
                                    $icon_path = 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z';
                            }
                            ?>
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="<?php echo esc_attr($icon_path); ?>"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold leading-none tracking-tight"><?php echo esc_html($plan['name']); ?></h3>
                        <div class="space-y-1">
                            <div class="text-3xl font-bold text-primary"><?php echo esc_html($plan['price']); ?></div>
                            <div class="text-sm text-muted-foreground"><?php echo esc_html($plan['duration']); ?></div>
                        </div>
                        <p class="text-base text-muted-foreground"><?php echo esc_html($plan['description']); ?></p>
                    </div>
                    
                    <div class="p-6 pt-0 space-y-4">
                        <ul class="space-y-3">
                            <?php foreach ($plan['features'] as $feature): ?>
                                <li class="flex items-start gap-3">
                                    <svg class="h-5 w-5 text-success flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span class="text-sm"><?php echo esc_html($feature); ?></span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                        
                        <a href="<?php echo esc_url(home_url('/contacts')); ?>" 
                           class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 w-full h-10 px-4 py-2 <?php echo $plan['recommended'] ? 'bg-primary text-primary-foreground hover:bg-primary/90' : 'border border-input bg-background hover:bg-accent hover:text-accent-foreground'; ?>">
                            <?php echo $plan['id'] === 'consultation' ? 'Записаться' : 'Выбрать пакет'; ?>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
