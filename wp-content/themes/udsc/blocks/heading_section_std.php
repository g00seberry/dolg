<?php
/**
 * Block Name: Heading Section Standard
 * Description: Стоимость услуг — вступительный блок
 */

// Получаем данные из ACF полей
$data = $args['data'];
$badge = $data['badge'];
$title = $data['title'];
$subtitle = $data['subtitle'];

// Обработка заголовка с помощью утилитарной функции
$title_html = udsc_parse_title_with_tag($title, 'h1', 'text-4xl lg:text-5xl font-bold mb-6 text-balance');
?>

<!-- Hero Section -->
<section class="section bg-gradient-to-br from-primary/5 to-accent/5">
    <div class="container">
        <div class="text-center max-w-3xl mx-auto">
            <!-- Badge -->
            <?php if ($badge): ?>
                <div class="inline-flex items-center rounded-full border px-3 py-1 text-sm font-medium bg-background/95 backdrop-blur supports-[backdrop-filter]:bg-background/60 border-border mb-4">
                    <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                    </svg>
                    <?php echo esc_html($badge); ?>
                </div>
            <?php endif; ?>
            
            <!-- Title -->
            <?php if ($title_html): ?>
                <?php echo $title_html; ?>
            <?php endif; ?>
            
            <!-- Subtitle -->
            <?php if ($subtitle): ?>
                <p class="text-xl text-muted-foreground mb-8 text-balance">
                    <?php echo nl2br(esc_html($subtitle)); ?>
                </p>
            <?php endif; ?>
            
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="tel:<?php echo esc_attr(udsc_get_contact_phone()); ?>" 
                   class="inline-flex items-center justify-center whitespace-nowrap h-11 rounded-md px-8 text-sm font-medium bg-primary text-primary-foreground hover:bg-primary/90 ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50">
                    <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                    </svg>
                    Бесплатная консультация
                </a>
                <a href="<?php echo esc_url(home_url('/services')); ?>" 
                   class="inline-flex items-center justify-center gap-2 whitespace-nowrap h-11 rounded-md px-8 text-sm font-medium border border-input bg-background hover:bg-accent hover:text-accent-foreground ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50">
                    <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    Наши услуги
                </a>
            </div>
        </div>
    </div>
</section>
