<?php
/**
 * Testimonials Block Template
 * Секция с отзывами клиентов
 */

// Получаем данные блока (если используется ACF или аналогичные поля)
$section_title = get_field('testimonials_title') ?: 'Отзывы клиентов';
$section_description = get_field('testimonials_description') ?: 'Что говорят наши клиенты о нашей работе';
$show_button = get_field('show_testimonial_button') !== false; // По умолчанию показываем кнопку

// Получаем отзывы из базы данных
$testimonials_query = new WP_Query(array(
    'post_type' => 'testimonial',
    'post_status' => 'publish',
    'posts_per_page' => 6, // Показываем максимум 6 отзывов в блоке
    'orderby' => 'date',
    'order' => 'DESC'
));

?>

<!-- Testimonials Section -->
<section class="py-12 md:py-16 bg-muted/20">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center mb-8 md:mb-12">
            <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold mb-4">
                <?php echo esc_html($section_title); ?>
            </h2>
            <p class="text-base sm:text-lg md:text-xl text-muted-foreground max-w-2xl mx-auto px-1">
                <?php echo esc_html($section_description); ?>
            </p>
        </div>

        <!-- Testimonials Grid -->
        <div class="grid gap-6 sm:gap-7 md:grid-cols-2 lg:grid-cols-3 md:gap-8">
            <?php if ($testimonials_query->have_posts()): ?>
                <?php while ($testimonials_query->have_posts()): ?>
                    <?php $testimonials_query->the_post(); ?>
                    <?php echo UDSC_TestimonialCard::create_from_post(get_post()); ?>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php else: ?>
                <!-- Fallback если нет отзывов -->
                <div class="col-span-full text-center py-10">
                    <div class="bg-white rounded-lg border border-border p-6 md:p-8">
                        <svg class="h-16 w-16 text-muted-foreground mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                        </svg>
                        <h3 class="text-base sm:text-lg font-semibold mb-2">Пока нет отзывов</h3>
                        <p class="text-sm sm:text-base text-muted-foreground">Здесь будут отображаться отзывы наших клиентов.</p>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        
    </div>
</section>

<?php
// Добавляем модальное окно с формой отзыва
if ($show_button) {
    echo UDSC_Modal::create(array(
        'id' => 'testimonial-modal',
        'title' => 'Оставить отзыв',
        'content' => UDSC_TestimonialForm::create('testimonial-modal-form', ''),
        'size' => 'lg',
        'show_header' => true,
        'show_footer' => false,
        'body_classes' => 'p-0'
    ));
}
?>
