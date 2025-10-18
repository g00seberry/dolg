<?php
/**
 * Block Name: Services
 * Description: Наши услуги
 */

// Получаем данные из ACF полей
$data = $args['data'];
$section_title = $data['section_title'];
$section_subtitle = $data['section_subtitle'];
$services_list = $data['services_list'] ?? [];

// Обработка заголовка с помощью утилитарной функции
$title_html = udsc_parse_title_with_tag($section_title, 'h2', 'text-3xl lg:text-4xl font-bold mb-4');
?>

<!-- Services Preview Section -->
<section class="section">
    <div class="container">
        <!-- Section Header -->
        <?php if ($section_title || $section_subtitle): ?>
            <div class="text-center mb-12">
                <?php if ($title_html): ?>
                    <?php echo $title_html; ?>
                <?php endif; ?>
                
                <?php if ($section_subtitle): ?>
                    <p class="text-xl text-muted-foreground max-w-2xl mx-auto">
                        <?php echo nl2br(esc_html($section_subtitle)); ?>
                    </p>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <!-- Services Grid -->
        <?php if ($services_list): ?>
            <div class="grid md:grid-cols-3 gap-8">
                <?php foreach ($services_list as $service): ?>
                    <?php
                    $icon = $service['icon'];
                    $title = $service['title'];
                    $description = $service['description'];
                    $button_text = $service['button_text'];
                    $button_link = $service['button_link'];
                    ?>
                    
                    <div class="bg-card rounded-lg border p-6 hover:shadow-md transition-shadow">
                        <!-- Service Icon & Title -->
                        <div class="flex items-center gap-3 mb-4">
                            <?php if ($icon): ?>
                                <img 
                                    src="<?php echo esc_url($icon['url']); ?>" 
                                    alt="<?php echo esc_attr($icon['alt']); ?>" 
                                    class="h-8 w-8 text-primary shrink-0"
                                />
                            <?php else: ?>
                                <svg class="h-8 w-8 text-primary shrink-0" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                    <path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"/>
                                </svg>
                            <?php endif; ?>
                            
                            <?php if ($title): ?>
                                <h3 class="text-xl font-semibold"><?php echo esc_html($title); ?></h3>
                            <?php endif; ?>
                        </div>
                        
                        <!-- Service Description -->
                        <?php if ($description): ?>
                            <p class="text-muted-foreground mb-6">
                                <?php echo nl2br(esc_html($description)); ?>
                            </p>
                        <?php endif; ?>
                        
                        <!-- Service Link Button -->
                        <?php if ($button_text && $button_link): ?>
                            <a href="<?php echo esc_url($button_link); ?>" 
                               class="inline-flex items-center justify-center whitespace-nowrap w-full h-10 px-4 py-2 text-sm font-medium border border-input bg-background hover:bg-accent hover:text-accent-foreground rounded-md ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50">
                                <?php echo esc_html($button_text); ?>
                            </a>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
