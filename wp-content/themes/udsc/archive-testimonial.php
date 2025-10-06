<?php
/**
 * The template for displaying testimonials archive page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package udsc
 */

// Подключаем необходимые компоненты
require_once get_template_directory() . '/inc/components/Modal.php';
require_once get_template_directory() . '/inc/components/TestimonialForm.php';

get_header();
$testimonials = get_posts(array(
    'post_type' => 'testimonial',
    'post_status' => 'publish',
    'numberposts' => -1,
    'orderby' => 'date',
    'order' => 'DESC'
));
?>

<main id="primary" class="site-main">
    <div class="min-h-screen bg-gradient-to-br from-background via-background to-primary/5 relative overflow-hidden">
        <!-- Apple-style Shield Background -->
        <div class="absolute inset-0 pointer-events-none">
            <!-- Secondary decorative shields -->
            <div class="absolute top-8 right-20 w-32 h-32 opacity-3 rotate-12">
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
            <div class="absolute inset-0 bg-gradient-to-r from-primary/5 via-transparent to-accent/5 opacity-50"></div>
            <div class="container relative text-center max-w-4xl mx-auto">
                <div class="inline-flex items-center rounded-full border px-3 py-1 text-sm font-medium bg-background/95 backdrop-blur supports-[backdrop-filter]:bg-background/60 border-border mb-4">
                    Отзывы клиентов
                </div>
                <h1 class="text-4xl md:text-6xl font-bold mb-6">
                    Истории наших клиентов
                </h1>
                <p class="text-xl text-muted-foreground mb-8">
                    Реальные отзывы людей, которые успешно прошли процедуру банкротства 
                    и освободились от долгов с нашей помощью
                </p>
            </div>
        </section>

        <!-- Statistics -->
        <section class="py-8 px-4 bg-muted/20">
            <div class="container">
                <div class="grid grid-cols-2 lg:grid-cols-4 gap-6">
                                            <div class="text-center">
                            <div class="text-3xl font-bold text-primary mb-2">25+</div>
                            <div class="text-sm text-muted-foreground">Довольных клиентов</div>
                        </div>
                                            <div class="text-center">
                            <div class="text-3xl font-bold text-primary mb-2">5/5</div>
                            <div class="text-sm text-muted-foreground">Средняя оценка</div>
                        </div>
                                            <div class="text-center">
                            <div class="text-3xl font-bold text-primary mb-2">100%</div>
                            <div class="text-sm text-muted-foreground">Успешных дел</div>
                        </div>
                                            <div class="text-center">
                            <div class="text-3xl font-bold text-primary mb-2">8+</div>
                            <div class="text-sm text-muted-foreground">Лет опыта</div>
                        </div>
                                    </div>
            </div>
        </section>

        <!-- Testimonials -->
        <section class="py-16 px-4">
            <div class="container">
                <div class="flex justify-between items-center mb-12">
                    <h2 class="text-3xl font-bold">Что говорят наши клиенты</h2>
                    
                    <button data-toggle="modal" data-target="#testimonial-modal" class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 bg-primary text-primary-foreground hover:bg-primary/90 h-10 px-4 py-2" type="button" aria-haspopup="dialog" aria-expanded="false" aria-controls="radix-:r2:" data-state="closed"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus mr-2 h-4 w-4" data-lov-id="src\pages\Testimonials.tsx:230:20" data-lov-name="Plus" data-component-path="src\pages\Testimonials.tsx" data-component-line="230" data-component-file="Testimonials.tsx" data-component-name="Plus" data-component-content="%7B%22className%22%3A%22mr-2%20h-4%20w-4%22%7D"><path d="M5 12h14"></path><path d="M12 5v14"></path></svg>Оставить отзыв</button>
                </div>
                
                <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                    <?php 
                    // Получаем все отзывы

                    
                    foreach ($testimonials as $testimonial) :
           
                        $id = $testimonial->ID;
                        // Получаем ACF поля
                        $name = get_field('testimonial_name',$id    );
                        $city = get_field('testimonial_city',$id);
                        $text = get_field('testimonial_text',$id);
                        $rating = get_field('testimonial_rating',$id);
                        $written_off = get_field('testimonial_written_off',$id);
                        $date = get_field('testimonial_date',$id);
                        $case_number = get_field('testimonial_case_number',$id);
               
                        // Показываем только если есть основные данные
                        if ($name && $text && $rating) :
                    ?>
                    <article class="bg-white rounded-lg border border-border p-6 hover:shadow-lg transition-all duration-300">
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-primary/10 rounded-full flex items-center justify-center">
                                    <svg class="h-5 w-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                </div>
                                <div>
                                    <div class="font-semibold"><?php echo esc_html($name); ?></div>
                                    <div class="text-sm text-muted-foreground flex items-center gap-1">
                                        <svg class="h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        </svg>
                                        <?php echo esc_html($city ?: 'Не указан'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center gap-1">
                                <?php for ($i = 1; $i <= 5; $i++) : ?>
                                    <svg class="h-4 w-4 <?php echo $i <= $rating ? 'text-yellow-400 fill-current' : 'text-gray-300'; ?>" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                <?php endfor; ?>
                            </div>
                        </div>

                        <div class="mb-4">
                            <svg class="h-5 w-5 text-primary/50 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                            </svg>
                            <p class="text-muted-foreground text-sm leading-relaxed">
                                <?php echo esc_html($text); ?>
                            </p>
                        </div>

                        <div class="space-y-2 text-xs text-muted-foreground">
                            <div class="flex items-center justify-between">
                                <span>Сумма долга:</span>
                                <span class="font-semibold text-primary"><?php echo esc_html($written_off ?: 'Не указана'); ?></span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span>Дело №:</span>
                                <span class="font-medium"><?php echo esc_html($case_number ?: 'Не указан'); ?></span>
                            </div>
                            <div class="flex items-center gap-1 text-xs">
                                <svg class="h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                <?php echo esc_html($date ?: 'Не указана'); ?>
                            </div>
                        </div>
                    </article>
                    <?php 
                        endif;
                    endforeach;
                
                    ?>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="py-20 px-4 bg-muted/30">
            <div class="container text-center">
                <h2 class="text-3xl font-bold mb-6">Станьте следующим успешным кейсом</h2>
                <p class="text-xl text-muted-foreground mb-8 max-w-2xl mx-auto">
                    Присоединяйтесь к сотням довольных клиентов, которые освободились от долгов 
                    с нашей профессиональной помощью
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <button type="button" data-toggle="modal" data-target="#consultation-modal"
                            class="inline-flex items-center justify-center whitespace-nowrap h-11 rounded-md px-8 text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-primary text-primary-foreground hover:bg-primary/90">
                        Бесплатная консультация
                    </button>
                    <a href="/services" class="inline-flex items-center justify-center whitespace-nowrap h-11 rounded-md px-8 text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground">
                        Изучить кейсы
                    </a>
                </div>
            </div>
        </section>
    </div>
</main><!-- #main -->

<?php
// Модальное окно с формой отзыва
echo UDSC_Modal::create(array(
    'id' => 'testimonial-modal',
    'title' => 'Оставить отзыв',
    'content' => UDSC_TestimonialForm::create('testimonial-modal-form', ''),
    'size' => 'lg',
    'show_header' => true,
    'show_footer' => false,
    'body_classes' => 'p-0'
));

get_footer();
