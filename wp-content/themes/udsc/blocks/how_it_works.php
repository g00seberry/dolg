<?php
/**
 * How it Works Block Template
 * Секция с описанием процесса работы
 */

// Получаем данные блока (если используется ACF или аналогичные поля)
$section_title = get_field('how_it_works_title') ?: 'Как проходит процедура';
$section_description = get_field('how_it_works_description') ?: 'Прозрачный процесс работы в 3 простых шага';

// Массив шагов процесса
$process_steps = get_field('process_steps') ?: [
    [
        'step' => '01',
        'title' => 'Консультация и анализ',
        'description' => 'Бесплатная консультация, анализ финансового положения и перспектив банкротства'
    ],
    [
        'step' => '02',
        'title' => 'Подготовка документов',
        'description' => 'Сбор и подготовка всех необходимых документов для подачи в арбитражный суд'
    ],
    [
        'step' => '03',
        'title' => 'Ведение процедуры',
        'description' => 'Полное сопровождение процедуры банкротства до получения решения суда'
    ]
];
?>

<!-- How it Works Section -->
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

        <!-- Process Steps Grid -->
        <div class="grid md:grid-cols-3 gap-8">
            <?php foreach ($process_steps as $index => $step): ?>
                <div class="text-center">
                    <!-- Step Number Circle -->
                    <div class="w-16 h-16 bg-primary text-primary-foreground rounded-full flex items-center justify-center text-2xl font-bold mx-auto mb-6">
                        <?php echo esc_html($step['step']); ?>
                    </div>
                    
                    <!-- Step Title -->
                    <h3 class="text-xl font-semibold mb-4">
                        <?php echo esc_html($step['title']); ?>
                    </h3>
                    
                    <!-- Step Description -->
                    <p class="text-muted-foreground">
                        <?php echo esc_html($step['description']); ?>
                    </p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
