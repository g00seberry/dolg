<?php
/**
 * Additional Services Grid Block Template v2
 * Сетка дополнительных услуг
 */

// Получаем данные блока (если используется ACF или аналогичные поля)
$section_title = get_field('section_title') ?: 'Дополнительные услуги';
$additional_services = get_field('additional_services') ?: array(
    array('title' => 'Анализ кредитной истории', 'price' => '5 000 ₽'),
    array('title' => 'Составление возражений', 'price' => '10 000 ₽'),
    array('title' => 'Представительство в суде', 'price' => '15 000 ₽'),
    array('title' => 'Консультация по телефону', 'price' => '2 000 ₽')
);
?>

<!-- Additional Services Grid -->
<div class="container">
        <div class="bg-muted/20 rounded-lg p-8">
            <h2 class="text-2xl font-semibold mb-6 text-center">
                <?php echo esc_html($section_title); ?>
            </h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                <?php foreach ($additional_services as $index => $service): ?>
                    <div class="bg-background rounded-lg p-4 text-center">
                        <h4 class="font-medium mb-2"><?php echo esc_html($service['title']); ?></h4>
                        <p class="text-primary font-semibold"><?php echo esc_html($service['price']); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
