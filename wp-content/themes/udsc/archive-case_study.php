<?php
/**
 * The template for displaying case studies archive
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package udsc
 */

get_header();

// Инициализируем класс фильтрации
$filter = new UDSC_Case_Studies_Filter();

// Получаем все кейсы для статистики
$all_cases = get_posts([
    'post_type' => 'case_study',
    'posts_per_page' => -1,
    'post_status' => 'publish'
]);

$stats = $filter->get_statistics();
$total_debt_formatted = number_format($stats['total_debt'] / 1000000, 1, ',', ' ') . ' млн ₽';

// JSON-LD для SEO
$json_ld = [
    "@context" => "https://schema.org",
    "@type" => "ItemList",
    "name" => "Кейсы банкротства физических лиц",
    "description" => "Реальные случаи успешного банкротства физических лиц",
    "numberOfItems" => $stats['total_cases'],
    "itemListElement" => array_map(function($case, $index) {
        return [
            "@type" => "Article",
            "position" => $index + 1,
            "name" => $case->post_title,
            "description" => get_field('case_summary', $case->ID) ?: $case->post_excerpt,
            "url" => get_permalink($case->ID)
        ];
    }, $all_cases, array_keys($all_cases))
];
?>

<div class="min-h-screen bg-gradient-to-br from-background via-background to-primary/5 relative overflow-hidden">
    <!-- Apple-style Shield Background -->
    <div class="absolute inset-0 pointer-events-none">
        <!-- Secondary decorative shields -->
        <div class="absolute top-20 right-20 w-32 h-32 opacity-3 rotate-12">
            <svg viewBox="0 0 200 200" class="w-full h-full">
                <path 
                    d="M100 20 C80 20, 40 35, 40 55 C40 100, 60 140, 100 180 C140 140, 160 100, 160 55 C160 35, 120 20, 100 20 Z" 
                    fill="hsl(var(--primary))"
                    fill-opacity="0.08"
                />
            </svg>
        </div>
        
        <div class="absolute bottom-32 left-16 w-24 h-24 opacity-8 -rotate-6">
            <svg viewBox="0 0 200 200" class="w-full h-full">
                <path 
                    d="M100 20 C80 20, 40 35, 40 55 C40 100, 60 140, 100 180 C140 140, 160 100, 160 55 C160 35, 120 20, 100 20 Z" 
                    fill="hsl(var(--primary))"
                    fill-opacity="0.18"
                />
            </svg>
        </div>
    </div>

    <!-- Hero Section -->
    <section class="py-20 px-4 relative">
        <div class="absolute inset-0 bg-gradient-to-r from-primary/10 via-transparent to-accent/10 opacity-50"></div>
        <div class="container relative">
            <div class="text-center max-w-4xl mx-auto mb-12">
                <div class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium border border-input bg-background hover:bg-accent hover:text-accent-foreground mb-4">
                    Наши результаты
                </div>
                <h1 class="text-4xl md:text-6xl font-bold mb-6 text-foreground">
                    Кейсы успешного банкротства
                </h1>
                <p class="text-xl text-muted-foreground mb-8">
                    Реальные дела и достигнутые результаты для наших клиентов. 
                    Общая сумма списанных долгов: <span class="font-semibold text-primary"><?php echo esc_html($total_debt_formatted); ?></span>
                </p>
            </div>

            <!-- Statistics -->
            <div class="flex flex-wrap justify-center gap-6 mb-8">
                <div class="text-center min-w-[120px]">
                    <div class="text-2xl font-bold text-primary mb-1"><?php echo $stats['total_cases']; ?></div>
                    <div class="text-sm text-muted-foreground">Всего кейсов</div>
                </div>
                <div class="text-center min-w-[120px]">
                    <div class="text-2xl font-bold text-primary mb-1">100%</div>
                    <div class="text-sm text-muted-foreground">Успешных дел</div>
                </div>
                <div class="text-center min-w-[120px]">
                    <div class="text-2xl font-bold text-primary mb-1"><?php echo number_format($stats['average_debt'] / 1000000, 1, ',', ' ') . ' млн ₽'; ?></div>
                    <div class="text-sm text-muted-foreground">Средняя сумма</div>
                </div>
                <div class="text-center min-w-[120px]">
                    <div class="text-2xl font-bold text-primary mb-1"><?php echo $stats['unique_regions']; ?></div>
                    <div class="text-sm text-muted-foreground">Регионов</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Filters -->
    <section class="py-8 px-4 bg-muted/20">
        <div class="container">
            <?php echo $filter->render_filter_form(); ?>
        </div>
    </section>

    <!-- Cases Grid -->
    <section class="py-12 px-4">
        <div class="container">
            <div class="mb-6 text-sm text-muted-foreground">
                Найдено кейсов: <span id="cases-count" class="font-medium"><?php echo $stats['total_cases']; ?></span>
            </div>
            <div class="cases-grid-container">
                <div class="grid gap-8 md:grid-cols-2 xl:grid-cols-3">
                    <?php foreach ($all_cases as $case): ?>
                        <?php
                        global $post;
                        $post = $case;
                        setup_postdata($post);
                        get_template_part('template-parts/content', 'case_study');
                        wp_reset_postdata();
                        ?>
                    <?php endforeach; ?>
                </div>
                <?php
                // Добавляем пагинацию
                echo $filter->render_pagination([], 1, 6);
                ?>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 px-4 bg-muted/30">
        <div class="container text-center">
            <h2 class="text-3xl font-bold mb-6">Готовы решить свои финансовые проблемы?</h2>
            <p class="text-xl text-muted-foreground mb-8 max-w-2xl mx-auto">
                Наша команда поможет вам пройти процедуру банкротства с максимальным результатом
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <button   data-toggle="modal" data-target="#consultation-modal" class="bg-primary text-primary-foreground hover:bg-primary/90 h-11 px-8 inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50">
                    Бесплатная консультация
                </button>
                <a href="/services" 
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
