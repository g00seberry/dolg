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
<section class="py-16 px-4 bg-muted/20">
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
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php if ($testimonials_query->have_posts()): ?>
                <?php while ($testimonials_query->have_posts()): ?>
                    <?php $testimonials_query->the_post(); ?>
                    <?php echo UDSC_TestimonialCard::create_from_post(get_post()); ?>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php else: ?>
                <!-- Fallback если нет отзывов -->
                <div class="col-span-full text-center py-12">
                    <div class="bg-white rounded-lg border border-border p-8">
                        <svg class="h-16 w-16 text-muted-foreground mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                        </svg>
                        <h3 class="text-lg font-semibold mb-2">Пока нет отзывов</h3>
                        <p class="text-muted-foreground">Здесь будут отображаться отзывы наших клиентов.</p>
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
