<?php
/**
 * Lawyer Credentials Block Template
 * Секция с информацией о юристе
 */

// Получаем данные блока (если используется ACF или аналогичные поля)
$lawyer_name = get_field('lawyer_name') ?: 'Бондарчук Дмитрий Викторович';
$lawyer_title = get_field('lawyer_title') ?: 'Сертифицированный юрист';
$lawyer_description = get_field('lawyer_description') ?: 'Магистр права с отличием, выпускник "Московский финансово-промышленный университет «Синергия»" 2023 года. Специализируется на банкротном праве и защите должников.';
$lawyer_image = get_field('lawyer_image') ?: get_template_directory_uri() . '/assets/images/lawyer-main.jpg';
$consultation_link = get_field('consultation_link') ?: '/lawyer';

// Список достижений
$achievements = get_field('achievements') ?: [
    'Более 300 успешно завершенных дел',
    'Магистр права с отличием', 
    'Эксперт в области банкротного права'
];
?>

<!-- Lawyer Credentials Section -->
<section class="section bg-muted/20">
    <div class="container">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <!-- Left column - Image -->
            <div>
                <img src="<?php echo esc_url($lawyer_image); ?>" 
                     alt="<?php echo esc_attr($lawyer_name); ?> - юрист по банкротству"
                     class="rounded-lg shadow-md w-full max-w-md mx-auto"
                     loading="lazy">
            </div>
            
            <!-- Right column - Content -->
            <div>
                <!-- Award badge -->
                <div class="flex items-center gap-2 mb-4">
                    <svg class="h-6 w-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                    </svg>
                    <span class="text-sm font-medium text-primary"><?php echo esc_html($lawyer_title); ?></span>
                </div>
                
                <!-- Name -->
                <h2 class="text-3xl font-bold mb-4">
                    <?php echo esc_html($lawyer_name); ?>
                </h2>
                
                <!-- Description -->
                <p class="text-muted-foreground mb-6">
                    <?php echo esc_html($lawyer_description); ?>
                </p>
                
                <!-- Achievements list -->
                <div class="space-y-3 mb-6">
                    <?php foreach ($achievements as $achievement): ?>
                        <div class="flex items-center gap-3">
                            <svg class="h-5 w-5 text-success shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <span><?php echo esc_html($achievement); ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- CTA Button -->
                <button type="button"
                   data-toggle="modal" data-target="#consultation-modal"
                   class="inline-flex items-center justify-center whitespace-nowrap h-11 rounded-md px-8 text-sm font-medium bg-primary text-primary-foreground hover:bg-primary/90 ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50">
                    Записаться на консультацию
                </button>
            </div>
        </div>
    </div>
</section>


