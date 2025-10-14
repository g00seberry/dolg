<?php
/**
 * Block Name: Main Services Grid v2
 * Description: Сетка основных услуг
 */

// Получаем данные из ACF полей
$data = $args['data'];
$section_title = $data['section_title'];
$section_subtitle = $data['section_subtitle'];
$services_list = $data['services_list'];

// Обработка формата section_title (может быть "title" или "tag:title")
$title_tag = 'h2';
$title_text = $section_title;

if ($section_title && strpos($section_title, ':') !== false) {
    list($title_tag, $title_text) = explode(':', $section_title, 2);
    $title_tag = trim($title_tag);
    $title_text = trim($title_text);
}
?>

<!-- Main Services Grid -->
<section class="section">
    <div class="container">
        <?php if ($section_title || $section_subtitle): ?>
            <div class="text-center mb-12">
                <?php if ($title_text): ?>
                    <<?php echo esc_attr($title_tag); ?> class="text-4xl lg:text-5xl font-bold mb-6">
                        <?php echo esc_html($title_text); ?>
                    </<?php echo esc_attr($title_tag); ?>>
                <?php endif; ?>
                
                <?php if ($section_subtitle): ?>
                    <p class="text-xl text-muted-foreground max-w-3xl mx-auto">
                        <?php echo nl2br(esc_html($section_subtitle)); ?>
                    </p>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <?php if ($services_list): ?>
            <div class="grid lg:grid-cols-3 gap-8 mb-16">
                <?php foreach ($services_list as $service): ?>
                    <?php
                    $label = $service['label'];
                    $icon = $service['icon'];
                    $title = $service['title'];
                    $description = $service['description'];
                    $features = $service['features'];
                    $price = $service['price'];
                    $term = $service['term'];
                    $button_1_text = $service['button_1_text'];
                    $button_1_link = $service['button_1_link'];
                    $button_2_text = $service['button_2_text'];
                    $button_2_link = $service['button_2_link'];
                    ?>
                    
                    <div class="rounded-lg border bg-card text-card-foreground shadow-sm p-6 relative flex flex-col <?php echo $label ? 'border-primary' : ''; ?>">
                        <?php if ($label): ?>
                            <div class="absolute -top-3 left-4 bg-primary text-primary-foreground px-3 py-1 rounded-full text-sm font-medium">
                                <?php echo esc_html($label); ?>
                            </div>
                        <?php endif; ?>
                        
                        <div class="flex items-center gap-3 mb-4">
                            <?php if ($icon): ?>
                                <img 
                                    src="<?php echo esc_url($icon['url']); ?>" 
                                    alt="<?php echo esc_attr($icon['alt']); ?>" 
                                    class="h-8 w-8"
                                />
                            <?php else: ?>
                                <svg class="h-8 w-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                </svg>
                            <?php endif; ?>
                            
                            <?php if ($title): ?>
                                <h3 class="text-xl font-semibold"><?php echo esc_html($title); ?></h3>
                            <?php endif; ?>
                        </div>
                        
                        <?php if ($description): ?>
                            <p class="text-muted-foreground mb-6 flex-grow">
                                <?php echo nl2br(esc_html($description)); ?>
                            </p>
                        <?php endif; ?>
                        
                        <?php if ($features): ?>
                            <ul class="space-y-2 mb-6">
                                <?php foreach ($features as $feature): ?>
                                    <li class="flex items-center gap-2 text-sm">
                                        <div class="w-1.5 h-1.5 bg-primary rounded-full flex-shrink-0"></div>
                                        <?php echo esc_html($feature['text']); ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                        
                        <?php if ($price || $term): ?>
                            <div class="space-y-2 mb-6">
                                <?php if ($price): ?>
                                    <div class="flex justify-between items-center">
                                        <span class="text-muted-foreground">Стоимость:</span>
                                        <span class="font-semibold text-primary"><?php echo esc_html($price); ?></span>
                                    </div>
                                <?php endif; ?>
                                
                                <?php if ($term): ?>
                                    <div class="flex justify-between items-center">
                                        <span class="text-muted-foreground">Срок:</span>
                                        <span class="font-semibold"><?php echo esc_html($term); ?></span>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                        
                        <?php if ($button_1_text || $button_2_text): ?>
                            <div class="space-y-3 mt-auto">
                                <?php if ($button_1_text): ?>
                                    <a href="<?php echo esc_url($button_1_link ?: '#'); ?>" class="block">
                                        <button class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-primary text-primary-foreground hover:bg-primary/90 h-10 px-4 py-2 w-full">
                                            <?php echo esc_html($button_1_text); ?>
                                        </button>
                                    </a>
                                <?php endif; ?>
                                
                                <?php if ($button_2_text): ?>
                                    <a href="<?php echo esc_url($button_2_link ?: '#'); ?>" class="block">
                                        <button class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-10 px-4 py-2 w-full">
                                            <?php echo esc_html($button_2_text); ?>
                                        </button>
                                    </a>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
