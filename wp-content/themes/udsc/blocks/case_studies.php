<?php
/**
 * Case Studies Preview Block Template
 * Секция с превью успешных кейсов
 */

// Получаем данные блока (если используется ACF или аналогичные поля)
$section_title = get_field('case_studies_title') ?: 'Успешные кейсы';
$section_description = get_field('case_studies_description') ?: 'Реальные результаты наших клиентов';
$all_cases_link = get_field('all_cases_link') ?: '/case-studies';

// Массив кейсов
$case_studies = get_field('case_studies_list') ?: [
    [
        'title' => 'Списание долгов на 3.2 млн рублей',
        'description' => 'Успешная процедура банкротства предпринимателя с долгами перед 5 банками',
        'amount' => '3.2 млн ₽',
        'duration' => '7 месяцев'
    ],
    [
        'title' => 'Защита единственного жилья',
        'description' => 'Сохранение квартиры семьи при банкротстве с долгом 1.8 млн рублей',
        'amount' => '1.8 млн ₽',
        'duration' => '9 месяцев'
    ]
];
?>

<!-- Case Studies Preview Section -->
<section class="section">
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

        <!-- Case Studies Grid -->
        <div class="grid md:grid-cols-2 gap-8">
            <?php foreach ($case_studies as $case_study): ?>
                <div class="bg-card rounded-lg border p-6">
                    <!-- Case Title -->
                    <h3 class="text-xl font-semibold mb-3">
                        <?php echo esc_html($case_study['title']); ?>
                    </h3>
                    
                    <!-- Case Description -->
                    <p class="text-muted-foreground mb-4">
                        <?php echo esc_html($case_study['description']); ?>
                    </p>
                    
                    <!-- Case Details (Amount & Duration) -->
                    <div class="flex justify-between items-center text-sm">
                        <div>
                            <span class="text-muted-foreground">Сумма долга: </span>
                            <span class="font-semibold text-primary"><?php echo esc_html($case_study['amount']); ?></span>
                        </div>
                        <div>
                            <span class="text-muted-foreground">Срок: </span>
                            <span class="font-semibold"><?php echo esc_html($case_study['duration']); ?></span>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- CTA Button -->
        <div class="text-center mt-8">
            <a href="<?php echo esc_url($all_cases_link); ?>" 
               class="inline-flex items-center justify-center whitespace-nowrap h-11 rounded-md px-8 text-sm font-medium border border-input bg-background hover:bg-accent hover:text-accent-foreground ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50">
                Все кейсы
            </a>
        </div>
    </div>
</section>
