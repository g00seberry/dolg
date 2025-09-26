<?php
/**
 * Testimonials Block Template
 * Секция с отзывами клиентов
 */

// Получаем данные блока (если используется ACF или аналогичные поля)
$section_title = get_field('testimonials_title') ?: 'Отзывы клиентов';
$section_description = get_field('testimonials_description') ?: 'Что говорят наши клиенты о нашей работе';

// Массив отзывов
$testimonials = get_field('testimonials_list') ?: [
    [
        'name' => 'Мария Иванова',
        'position' => 'Предприниматель',
        'text' => 'Благодаря профессиональной помощи удалось списать долги на сумму более 2 млн рублей. Весь процесс занял 8 месяцев.',
        'rating' => 5
    ],
    [
        'name' => 'Алексей Петров',
        'position' => 'Частное лицо',
        'text' => 'Отличная команда юристов! Помогли разобраться со сложной ситуацией с банками и МФО. Рекомендую!',
        'rating' => 5
    ],
    [
        'name' => 'Светлана К.',
        'position' => 'Пенсионер',
        'text' => 'Очень благодарна за помощь. Думала, что долги будут преследовать всю жизнь, но процедура банкротства решила все проблемы.',
        'rating' => 5
    ]
];

// Функция для создания звёзд рейтинга
function render_stars($rating) {
    $stars_html = '';
    for ($i = 1; $i <= $rating; $i++) {
        $stars_html .= '<svg class="h-5 w-5 fill-primary text-primary" viewBox="0 0 20 20" fill="currentColor">
            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
        </svg>';
    }
    return $stars_html;
}
?>

<!-- Testimonials Section -->
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

        <!-- Testimonials Grid -->
        <div class="grid md:grid-cols-3 gap-8">
            <?php foreach ($testimonials as $testimonial): ?>
                <div class="bg-card rounded-lg border p-6">
                    <!-- Star Rating -->
                    <div class="flex mb-4">
                        <?php echo render_stars($testimonial['rating']); ?>
                    </div>
                    
                    <!-- Testimonial Text -->
                    <p class="text-muted-foreground mb-4 italic">
                        "<?php echo esc_html($testimonial['text']); ?>"
                    </p>
                    
                    <!-- Author Info -->
                    <div>
                        <div class="font-semibold">
                            <?php echo esc_html($testimonial['name']); ?>
                        </div>
                        <div class="text-sm text-muted-foreground">
                            <?php echo esc_html($testimonial['position']); ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
