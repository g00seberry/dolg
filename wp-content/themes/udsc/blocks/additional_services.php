<?php
/**
 * Additional Services Block Template
 * Дополнительные юридические услуги
 */

// Получаем данные блока (если используется ACF или аналогичные поля)
$section_title = get_field('section_title') ?: 'Дополнительные услуги';
$section_description = get_field('section_description') ?: 'Отдельные юридические услуги для решения конкретных задач';

// Массив дополнительных услуг
$additional_services = get_field('additional_services') ?: array(
    array(
        'name' => 'Реструктуризация долгов',
        'price' => 'от 15 000 ₽',
        'description' => 'Досудебное урегулирование долговых обязательств'
    ),
    array(
        'name' => 'Защита от коллекторов',
        'price' => 'от 10 000 ₽',
        'description' => 'Правовая защита от незаконных действий коллекторских агентств'
    ),
    array(
        'name' => 'Списание долгов по ЖКХ',
        'price' => 'от 8 000 ₽',
        'description' => 'Оспаривание незаконных начислений и списание задолженности'
    ),
    array(
        'name' => 'Представительство в суде',
        'price' => 'от 5 000 ₽',
        'description' => 'Разовое представительство интересов в судебном заседании'
    )
);
?>

<!-- Additional Services -->
<section class="section bg-accent/30">
    <div class="container">
        <div class="text-center mb-12">
            <h2 class="text-3xl lg:text-4xl font-bold mb-4">
                <?php echo esc_html($section_title); ?>
            </h2>
            <p class="text-xl text-muted-foreground max-w-2xl mx-auto">
                <?php echo esc_html($section_description); ?>
            </p>
        </div>

        <div class="grid md:grid-cols-2 gap-6 max-w-4xl mx-auto">
            <?php foreach ($additional_services as $index => $service): ?>
                <div class="rounded-lg border bg-card text-card-foreground shadow-sm hover:shadow-md transition-shadow">
                    <div class="flex flex-col space-y-1.5 p-6 pb-4">
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg font-semibold leading-none tracking-tight"><?php echo esc_html($service['name']); ?></h3>
                            <div class="inline-flex items-center rounded-full border px-2.5 py-0.5 text-xs font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 border-transparent bg-secondary text-secondary-foreground hover:bg-secondary/80 text-lg font-semibold">
                                <?php echo esc_html($service['price']); ?>
                            </div>
                        </div>
                        <p class="text-sm text-muted-foreground"><?php echo esc_html($service['description']); ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
