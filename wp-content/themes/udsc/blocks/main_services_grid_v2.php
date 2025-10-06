<?php
/**
 * Main Services Grid Block Template v2
 * Сетка основных услуг
 */

// Получаем данные блока (если используется ACF или аналогичные поля)
$services = get_field('services') ?: array(
    array(
        'id' => 'personal-bankruptcy',
        'title' => 'Банкротство физических лиц',
        'description' => 'Полное сопровождение процедуры банкротства физических лиц с гарантией положительного результата',
        'features' => array(
            'Анализ финансового положения',
            'Подготовка всех документов',
            'Представительство в суде',
            'Работа с финансовым управляющим'
        ),
        'price' => 'от 35 000 ₽',
        'duration' => '6-12 месяцев',
        'icon' => 'shield',
        'popular' => true
    ),
    array(
        'id' => 'debt-restructuring',
        'title' => 'Реструктуризация долгов',
        'description' => 'Законное снижение долговой нагрузки и перераспределение платежей без процедуры банкротства',
        'features' => array(
            'Переговоры с кредиторами',
            'Снижение процентных ставок',
            'Увеличение сроков погашения',
            'Частичное списание долгов'
        ),
        'price' => 'от 25 000 ₽',
        'duration' => '2-4 месяца',
        'icon' => 'calculator',
        'popular' => false
    ),
    array(
        'id' => 'legal-protection',
        'title' => 'Юридическая защита должников',
        'description' => 'Защита от незаконных действий коллекторов и кредиторов, обжалование решений',
        'features' => array(
            'Защита от коллекторов',
            'Обжалование судебных решений',
            'Остановка исполнительных производств',
            'Консультации по правам должника'
        ),
        'price' => 'от 15 000 ₽',
        'duration' => '1-3 месяца',
        'icon' => 'scale',
        'popular' => false
    )
);

// Функция для получения SVG иконки
function get_service_icon($icon_name) {
    $icons = array(
        'shield' => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z',
        'calculator' => 'M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z',
        'scale' => 'M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0 2l3 9m-3-9l-3 9'
    );
    
    return isset($icons[$icon_name]) ? $icons[$icon_name] : $icons['shield'];
}

$title = get_field('title') ?: 'Услуги по банкротству';
$description = get_field('description') ?: 'Профессиональная юридическая помощь в решении долговых проблем. Выберите подходящую услугу или получите персональную консультацию.';
?>

<!-- Main Services Grid -->
<section class="section">
    <div class="container">
        <div class="text-center mb-12">
            <h1 class="text-4xl lg:text-5xl font-bold mb-6">
                <?php echo esc_html($title); ?>
            </h1>
            <p class="text-xl text-muted-foreground max-w-3xl mx-auto">
                <?php echo esc_html($description); ?>
            </p>
        </div>
        <div class="grid lg:grid-cols-3 gap-8 mb-16">
    <?php foreach ($services as $service): ?>
        <div class="rounded-lg border bg-card text-card-foreground shadow-sm p-6 relative flex flex-col <?php echo $service['popular'] ? 'border-primary' : ''; ?>">
            <?php if ($service['popular']): ?>
                <div class="absolute -top-3 left-4 bg-primary text-primary-foreground px-3 py-1 rounded-full text-sm font-medium">
                    Популярная услуга
                </div>
            <?php endif; ?>
            
            <div class="flex items-center gap-3 mb-4">
                <svg class="h-8 w-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="<?php echo esc_attr(get_service_icon($service['icon'])); ?>"></path>
                </svg>
                <h3 class="text-xl font-semibold"><?php echo esc_html($service['title']); ?></h3>
            </div>
            
            <p class="text-muted-foreground mb-6 flex-grow">
                <?php echo esc_html($service['description']); ?>
            </p>
            
            <ul class="space-y-2 mb-6">
                <?php foreach ($service['features'] as $feature): ?>
                    <li class="flex items-center gap-2 text-sm">
                        <div class="w-1.5 h-1.5 bg-primary rounded-full flex-shrink-0"></div>
                        <?php echo esc_html($feature); ?>
                    </li>
                <?php endforeach; ?>
            </ul>
            
            <div class="space-y-2 mb-6">
                <div class="flex justify-between items-center">
                    <span class="text-muted-foreground">Стоимость:</span>
                    <span class="font-semibold text-primary"><?php echo esc_html($service['price']); ?></span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-muted-foreground">Срок:</span>
                    <span class="font-semibold"><?php echo esc_html($service['duration']); ?></span>
                </div>
            </div>
            
            <div class="space-y-3 mt-auto">
                <a href="<?php echo esc_url(home_url('/services/' . $service['id'])); ?>" class="block">
                    <button class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-primary text-primary-foreground hover:bg-primary/90 h-10 px-4 py-2 w-full">
                        Подробнее
                    </button>
                </a>
                <button class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-10 px-4 py-2 w-full">
                    Заказать услугу
                </button>
            </div>
        </div>
    <?php endforeach; ?>
        </div>
    </div>
</section>
