<?php
/**
 * Payment Info Block Template
 * Условия оплаты и гарантии
 */

// Получаем данные блока (если используется ACF или аналогичные поля)
$section_title = get_field('section_title') ?: 'Условия оплаты';

// Массив условий оплаты
$payment_conditions = get_field('payment_conditions') ?: array(
    array(
        'title' => 'Фиксированная стоимость',
        'description' => 'Стоимость услуг определяется на этапе консультации и не изменяется в процессе работы',
        'icon' => 'calculator',
        'icon_color' => 'bg-success text-success-foreground'
    ),
    array(
        'title' => 'Поэтапная оплата',
        'description' => 'Оплата производится по мере выполнения работ. Возможна рассрочка платежа',
        'icon' => 'clock',
        'icon_color' => 'bg-primary text-primary-foreground'
    ),
    array(
        'title' => 'Гарантии качества',
        'description' => 'Возврат средств в случае невыполнения обязательств по договору',
        'icon' => 'scale',
        'icon_color' => 'bg-warning text-warning-foreground'
    )
);

// Функция для получения SVG иконки
function get_payment_icon($icon_name) {
    $icons = array(
        'calculator' => 'M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z',
        'clock' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z',
        'scale' => 'M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0 2l3 9m-3-9l-3 9'
    );
    
    return isset($icons[$icon_name]) ? $icons[$icon_name] : $icons['calculator'];
}
?>

<!-- Payment Info -->
<section class="section">
    <div class="container">
        <div class="max-w-4xl mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-3xl lg:text-4xl font-bold mb-4">
                    <?php echo esc_html($section_title); ?>
                </h2>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <?php foreach ($payment_conditions as $condition): ?>
                    <div class="rounded-lg border bg-card text-card-foreground shadow-sm text-center">
                        <div class="flex flex-col space-y-1.5 p-6">
                            <div class="inline-flex items-center justify-center w-12 h-12 rounded-lg <?php echo esc_attr($condition['icon_color']); ?> mx-auto mb-4">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="<?php echo esc_attr(get_payment_icon($condition['icon'])); ?>"></path>
                                </svg>
                            </div>
                            <h3 class="text-2xl font-semibold leading-none tracking-tight"><?php echo esc_html($condition['title']); ?></h3>
                        </div>
                        <div class="p-6 pt-0">
                            <p class="text-muted-foreground">
                                <?php echo esc_html($condition['description']); ?>
                            </p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
