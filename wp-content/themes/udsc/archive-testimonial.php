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
                        echo UDSC_TestimonialCard::create_from_post($testimonial);
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
                    <a href="/case-studies" class="inline-flex items-center justify-center whitespace-nowrap h-11 rounded-md px-8 text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground">
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
