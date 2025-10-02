<?php
/**
 * Template part for displaying case study cards
 *
 * @package udsc
 */

// Получаем ACF поля
$debt_amount = get_field('case_debt_amount');
$debt_amount_formatted = $debt_amount ? number_format($debt_amount, 0, ',', ' ') . ' ₽' : '';
$region = get_field('case_region');
$case_number = get_field('case_number');
$end_date = get_field('case_end_date');
$summary = get_field('case_summary');
$status = $end_date ? 'Завершено' : 'В процессе';

// Извлекаем год из даты завершения
$year = $end_date ? date('Y', strtotime(str_replace('.', '-', $end_date))) : date('Y');
?>

<div class="p-6 hover:shadow-lg transition-all duration-300 border-2 hover:border-primary/30 flex flex-col rounded-lg border bg-card text-card-foreground shadow-sm">
    <div class="mb-4 flex-grow">
        <div class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 border border-green-200 mb-3">
            <svg class="h-3 w-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
            <?php echo esc_html($status); ?>
        </div>
        <h3 class="text-xl font-semibold mb-2 line-clamp-2">
            <a href="<?php the_permalink(); ?>" class="hover:text-primary transition-colors">
                <?php the_title(); ?>
            </a>
        </h3>
        <p class="text-muted-foreground text-sm mb-4 line-clamp-3">
            <?php echo esc_html($summary ?: get_the_excerpt()); ?>
        </p>
    </div>

    <div class="space-y-3 mb-6 text-sm">
        <div class="flex items-center justify-between">
            <span class="text-muted-foreground">Сумма долга:</span>
            <span class="font-semibold text-primary"><?php echo esc_html($debt_amount_formatted); ?></span>
        </div>
        <div class="flex items-center justify-between">
            <span class="text-muted-foreground">Регион:</span>
            <span class="font-medium"><?php echo esc_html($region); ?></span>
        </div>
        <div class="flex items-center justify-between">
            <span class="text-muted-foreground">Дело №:</span>
            <span class="font-medium"><?php echo esc_html($case_number); ?></span>
        </div>
        <div class="flex items-center justify-between">
            <span class="text-muted-foreground">Завершено:</span>
            <span class="font-medium"><?php echo esc_html($year); ?></span>
        </div>
    </div>

    <a href="<?php the_permalink(); ?>" 
       class="w-full bg-primary text-primary-foreground hover:bg-primary/90 h-10 px-4 py-2 inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 mt-auto">
        Подробнее о деле
    </a>
</div>
