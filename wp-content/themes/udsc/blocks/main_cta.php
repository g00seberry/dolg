<?php
/**
 * Block Name: Main CTA
 * Description: Главный CTA блок
 */

// Получаем данные из ACF полей
$data = $args['data'];
$title = $data['title'];
$subtitle = $data['subtitle'];
$photo = $data['photo'];
$stats = $data['stats'] ?? [];

// Обработка заголовка с помощью утилитарной функции
$title_html = udsc_parse_title_with_tag($title, 'h1', 'text-4xl lg:text-6xl font-bold text-balance mb-6');
?>

<!-- Hero Section -->
 
<section class="relative bg-gradient-to-br from-background to-subtle py-16 lg:py-24">
    <div class="container">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div>
                <?php if ($title_html): ?>
                    <?php echo $title_html; ?>
                <?php endif; ?>
                
                <?php if ($subtitle): ?>
                    <p class="text-xl text-muted-foreground mb-8 text-balance">
                        <?php echo nl2br(esc_html($subtitle)); ?>
                    </p>
                <?php endif; ?>
                
                <!-- Статистика -->
                <?php if ($stats): ?>
                    <div class="grid sm:grid-cols-3 gap-4 mb-8">
                        <?php foreach ($stats as $stat): ?>
                            <?php
                            $value = $stat['value'] ?? '';
                            $label = $stat['label'] ?? '';
                            
                            if (empty($value) && empty($label)) {
                                continue;
                            }
                            ?>
                            <div class="text-center">
                                <?php if ($value): ?>
                                    <div class="text-2xl font-bold text-primary"><?php echo esc_html($value); ?></div>
                                <?php endif; ?>
                                <?php if ($label): ?>
                                    <div class="text-sm text-muted-foreground"><?php echo esc_html($label); ?></div>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <!-- Кнопки -->
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="tel:<?php echo esc_attr(udsc_get_contact_phone()); ?>" 
                       class="inline-flex items-center justify-center whitespace-nowrap h-11 rounded-md px-8 text-sm font-medium bg-primary text-primary-foreground hover:bg-primary/90 ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50">
                        <svg class="mr-2 h-5 w-5 pointer-events-none shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                        Бесплатная консультация
                    </a>
                    <a href="/testirovanie/" 
                       class="inline-flex items-center justify-center gap-2 whitespace-nowrap h-11 rounded-md px-8 text-sm font-medium border border-input bg-background hover:bg-accent hover:text-accent-foreground ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50">
                        <svg class="mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Пройти тест
                    </a>
                </div>
            </div>
            
            <!-- Изображение -->
            <?php if ($photo): ?>
                <div class="relative">
                    <img src="<?php echo esc_url($photo['url']); ?>" 
                         alt="<?php echo esc_attr($photo['alt'] ?: 'Главное изображение'); ?>"
                         class="rounded-lg shadow-lg w-full h-auto object-cover"
                         loading="lazy">
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>



