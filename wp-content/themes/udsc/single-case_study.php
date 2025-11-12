<?php
/**
 * The template for displaying all case_study posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package udsc
 */

get_header();

// Получаем данные поста
$post_id = get_the_ID();
$title = get_the_title();
$description = get_the_excerpt();
$content = get_the_content();

// Получаем ACF поля
$case_number = get_field('case_number');
$debt_amount = get_field('case_debt_amount');
$debt_amount_formatted = $debt_amount ? number_format($debt_amount, 0, ',', ' ') . ' ₽' : '';
$region = get_field('case_region');
$court = get_field('case_court');
$financial_manager = get_field('case_manager');
$start_date = get_field('case_start_date');
$end_date = get_field('case_end_date');
$duration_days = get_field('case_duration_days');
$success_percent = get_field('case_success_percent') ?: 100;
$summary = get_field('case_summary');
$case_description = get_field('case_description');
$results = get_field('case_results');
$timeline = get_field('case_timeline');

// Если results и timeline - это массивы, преобразуем их
if (is_string($results)) {
    $results = maybe_unserialize($results);
}
if (is_string($timeline)) {
    $timeline = maybe_unserialize($timeline);
}

// Если это не массивы, создаем пустые массивы
if (!is_array($results)) {
    $results = [];
}
if (!is_array($timeline)) {
    $timeline = [];
}

// Определяем статус на основе даты завершения
$status = $end_date ? 'Завершено' : 'В процессе';

// JSON-LD для SEO
$json_ld = [
    "@context" => "https://schema.org",
    "@type" => "Article",
    "headline" => $title,
    "description" => $description,
    "author" => [
        "@type" => "Organization",
        "name" => "Финансовый щит"
    ],
    "publisher" => [
        "@type" => "Organization", 
        "name" => "Финансовый щит"
    ],
    "datePublished" => $end_date ?: $start_date
];
?>

<div class="min-h-screen bg-gradient-to-br from-background via-background to-muted/20">
    <!-- Header -->
    <section class="px-4 pb-12">
        <div class="container ">
            <div class="mb-8">
                <div class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 border border-green-200 mb-4">
                    <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <?php echo esc_html($status); ?>
                </div>
                <h1 class="text-4xl font-bold mb-4 text-foreground">
                    <?php echo esc_html($title); ?>
                </h1>
                <div class="flex flex-wrap items-center gap-6 text-muted-foreground">
                    <span class="flex items-center gap-2">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        Дело №<?php echo esc_html($case_number); ?>
                    </span>
                    <span class="flex items-center gap-2">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <?php echo esc_html($end_date ?: $start_date); ?>
                    </span>
                    <span class="flex items-center gap-2">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <?php echo esc_html($region); ?>
                    </span>
                </div>
            </div>

            <!-- Key Metrics -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
                <div class="p-6 text-center border-2 border-primary/20 bg-primary/5 rounded-lg border">
                    <div class="text-3xl font-bold text-primary mb-2"><?php echo esc_html($debt_amount_formatted); ?></div>
                    <div class="text-sm text-muted-foreground">Сумма списанных долгов</div>
                </div>
                <div class="p-6 text-center border-2 border-green-200 bg-green-50 rounded-lg border">
                    <div class="text-3xl font-bold text-green-700 mb-2">
                        <?php echo esc_html($duration_days ?: '365'); ?> дней
                    </div>
                    <div class="text-sm text-muted-foreground">Длительность процедуры</div>
                </div>
                <div class="p-6 text-center border-2 border-blue-200 bg-blue-50 rounded-lg border">
                    <div class="text-3xl font-bold text-blue-700 mb-2"><?php echo esc_html($success_percent); ?>%</div>
                    <div class="text-sm text-muted-foreground">Успешный результат</div>
                </div>
            </div>

            <div class="grid lg:grid-cols-3 gap-8">
                <!-- Main Content -->
                <div class="lg:col-span-2">
                    <div class="p-8 mb-8 rounded-lg border">
                        <h2 class="text-2xl font-semibold mb-4">Описание дела</h2>
                        <div class="text-muted-foreground leading-relaxed mb-6">
                            <?php echo $case_description ?: $description; ?>
                        </div>
                        <?php if ($summary): ?>
                        <div class="bg-muted/50 p-6 rounded-lg">
                            <h3 class="font-medium mb-3">Краткое резюме</h3>
                            <p class="text-muted-foreground"><?php echo esc_html($summary); ?></p>
                        </div>
                        <?php endif; ?>
                    </div>

                    <?php if (!empty($results)): ?>
                    <div class="p-8 mb-8 rounded-lg border">
                        <h2 class="text-2xl font-semibold mb-6">Достигнутые результаты</h2>
                        <ul class="space-y-4">
                            <?php foreach ($results as $result): ?>
                            <li class="flex items-start gap-3">
                                <svg class="h-5 w-5 text-green-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span class="text-muted-foreground"><?php echo esc_html($result['result_item']); ?></span>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <?php endif; ?>

                    <?php if (!empty($timeline)): ?>
                    <div class="p-8 rounded-lg border">
                        <h2 class="text-2xl font-semibold mb-6">Хронология дела</h2>
                        <div class="space-y-6">
                            <?php foreach ($timeline as $index => $event): ?>
                            <div class="flex gap-4 relative">
                                <?php if ($index < count($timeline) - 1): ?>
                                <div class="absolute left-2 top-8 w-px h-full bg-border"></div>
                                <?php endif; ?>
                                <div class="w-4 h-4 bg-primary rounded-full mt-1.5 flex-shrink-0 z-10"></div>
                                <div>
                                    <div class="font-medium text-foreground"><?php echo esc_html($event['timeline_date'] ?? ''); ?></div>
                                    <div class="text-muted-foreground"><?php echo esc_html($event['timeline_event'] ?? ''); ?></div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>

                <!-- Sidebar -->
                <div class="space-y-6">
                    <div class="p-6 bg-muted/50 rounded-lg border">
                        <h3 class="font-semibold mb-4 flex items-center gap-2">
                            <svg class="h-5 w-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                            </svg>
                            Детали дела
                        </h3>
                        <div class="space-y-4 text-sm">
                            <?php if ($court): ?>
                            <div>
                                <div class="font-medium text-foreground">Суд</div>
                                <div class="text-muted-foreground"><?php echo esc_html($court); ?></div>
                            </div>
                            <?php endif; ?>
                            <?php if ($client): ?>
                            <div>
                                <div class="font-medium text-foreground">Должник</div>
                                <div class="text-muted-foreground"><?php echo esc_html($client); ?></div>
                            </div>
                            <?php endif; ?>
                            <?php if ($case_number): ?>
                            <div>
                                <div class="font-medium text-foreground">Номер дела</div>
                                <div class="text-muted-foreground"><?php echo esc_html($case_number); ?></div>
                            </div>
                            <?php endif; ?>
                            <?php if ($debt_amount_formatted): ?>
                            <div>
                                <div class="font-medium text-foreground">Сумма долга</div>
                                <div class="text-muted-foreground font-semibold text-lg text-primary"><?php echo esc_html($debt_amount_formatted); ?></div>
                            </div>
                            <?php endif; ?>
                            <?php if ($region): ?>
                            <div>
                                <div class="font-medium text-foreground">Регион</div>
                                <div class="text-muted-foreground"><?php echo esc_html($region); ?></div>
                            </div>
                            <?php endif; ?>
                            <?php if ($financial_manager): ?>
                            <div>
                                <div class="font-medium text-foreground">Финансовый управляющий</div>
                                <div class="text-muted-foreground"><?php echo esc_html($financial_manager); ?></div>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="p-6 bg-primary/5 border-primary/20 rounded-lg border">
                        <h3 class="font-semibold mb-3 text-primary">Нужна помощь?</h3>
                        <p class="text-sm text-muted-foreground mb-4">
                            Получите бесплатную консультацию по вашей ситуации
                        </p>
                        <button 
                        data-toggle="modal" data-target="#consultation-modal"
                        class="w-full bg-primary text-primary-foreground hover:bg-primary/90 h-10 px-4 py-2 inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50">
                            Получить консультацию
                        </button>
                    </div>

                    <div class="p-6 rounded-lg border">
                        <h3 class="font-semibold mb-3">Похожие кейсы</h3>
                        <div class="space-y-3">
                            <?php
                            // Получаем похожие кейсы
                            $similar_cases = get_posts([
                                'post_type' => 'case_study',
                                'posts_per_page' => 2,
                                'post__not_in' => [$post_id],
                                'meta_query' => [
                                    [
                                        'key' => 'case_region',
                                        'value' => $region,
                                        'compare' => '='
                                    ]
                                ]
                            ]);
                            
                            // Если не хватает кейсов из того же региона, добавляем другие
                            if (count($similar_cases) < 2) {
                                $additional_cases = get_posts([
                                    'post_type' => 'case_study',
                                    'posts_per_page' => 2 - count($similar_cases),
                                    'post__not_in' => array_merge([$post_id], wp_list_pluck($similar_cases, 'ID')),
                                    'meta_query' => [
                                        [
                                            'key' => 'case_region',
                                            'value' => $region,
                                            'compare' => '!='
                                        ]
                                    ]
                                ]);
                                $similar_cases = array_merge($similar_cases, $additional_cases);
                            }
                            
                            foreach ($similar_cases as $similar_case):
                                $similar_debt_amount = get_field('case_debt_amount', $similar_case->ID);
                                $similar_debt_formatted = $similar_debt_amount ? number_format($similar_debt_amount, 0, ',', ' ') . ' ₽' : '';
                            ?>
                            <a href="<?php echo get_permalink($similar_case->ID); ?>" 
                               class="block p-3 rounded-lg border hover:bg-muted/50 transition-colors">
                                <div class="font-medium text-sm mb-1"><?php echo esc_html($similar_case->post_title); ?></div>
                                <div class="text-xs text-muted-foreground"><?php echo esc_html($similar_debt_formatted); ?></div>
                            </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="py-20 px-4 bg-muted/30">
        <div class="container text-center">
            <h2 class="text-3xl font-bold mb-6">Столкнулись с похожей ситуацией?</h2>
            <p class="text-xl text-muted-foreground mb-8 max-w-2xl mx-auto">
                Получите бесплатную консультацию и узнайте, как решить свои финансовые проблемы
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <button 
                data-toggle="modal" data-target="#consultation-modal"
                class="bg-primary text-primary-foreground hover:bg-primary/90 h-11 px-8 inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50">
                    Бесплатная консультация
                </button>
                <a href="<?php echo get_post_type_archive_link('case_study'); ?>" 
                   class="border border-input bg-background hover:bg-accent hover:text-accent-foreground h-11 px-8 inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50">
                    Изучить услуги
                </a>
            </div>
        </div>
    </section>
</div>

<?php
// Добавляем JSON-LD в head
add_action('wp_head', function() use ($json_ld) {
    echo '<script type="application/ld+json">' . json_encode($json_ld, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . '</script>';
});

get_footer();
