<?php
/**
 * Block Name: Pricing Plans
 * Description: Пакеты услуг (цены)
 */

// Получаем данные из ACF полей
$data = $args['data'];
$section_title = $data['section_title'];
$section_subtitle = $data['section_subtitle'];
$packages = $data['packages'] ?? [];

// Обработка заголовка с помощью утилитарной функции
$title_html = udsc_parse_title_with_tag($section_title, 'h2', 'text-3xl lg:text-4xl font-bold mb-4');
?>

<!-- Pricing Plans -->
<section class="section">
    <div class="container">
        <!-- Section Header -->
        <?php if ($section_title || $section_subtitle): ?>
            <div class="text-center mb-16">
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

        <!-- Packages Grid -->
        <?php if ($packages): ?>
            <div class="grid lg:grid-cols-2 xl:grid-cols-4 gap-8 mb-16">
                <?php foreach ($packages as $index => $package): ?>
                    <?php
                    $label = $package['label'];
                    $icon = $package['icon'];
                    $title = $package['title'];
                    $price = $package['price'];
                    $duration = $package['duration'];
                    $description = $package['description'];
                    $features = $package['features'] ?? [];
                    $button_text = $package['button_text'];
                    $button_link = $package['button_link'];
                    
                    // Определяем, является ли пакет рекомендуемым (первый пакет)
                    $is_recommended = ($index === 0);
                    ?>
                    
                    <div class="relative rounded-lg border bg-card text-card-foreground shadow-sm transition-all duration-300 hover:shadow-lg <?php echo $is_recommended ? 'ring-2 ring-primary scale-105' : ''; ?>">
                        <!-- Badge -->
                        <?php if ($label): ?>
                            <div class="absolute -top-3 left-1/2 -translate-x-1/2 inline-flex items-center rounded-full border px-2.5 py-0.5 text-xs font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 <?php echo $is_recommended ? 'bg-primary text-primary-foreground' : 'border-transparent bg-primary text-primary-foreground hover:bg-primary/80'; ?>">
                                <?php echo esc_html($label); ?>
                            </div>
                        <?php endif; ?>
                        
                        <div class="flex flex-col space-y-1.5 p-6 text-center pb-4">
                            <!-- Icon -->
                            <div class="inline-flex items-center justify-center w-12 h-12 rounded-lg mb-4 mx-auto <?php echo $is_recommended ? 'bg-primary text-primary-foreground' : 'bg-accent text-accent-foreground'; ?>">
                                <?php if ($icon && isset($icon['url'])): ?>
                                    <img src="<?php echo esc_url($icon['url']); ?>" 
                                         alt="<?php echo esc_attr($icon['alt'] ?? $title); ?>" 
                                         class="h-6 w-6 <?php echo $is_recommended ? 'invert' : ''; ?>">
                                <?php else: ?>
                                    <!-- Fallback SVG icon -->
                                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                <?php endif; ?>
                            </div>
                            
                            <!-- Title -->
                            <?php if ($title): ?>
                                <h3 class="text-xl font-semibold leading-none tracking-tight">
                                    <?php echo esc_html($title); ?>
                                </h3>
                            <?php endif; ?>
                            
                            <!-- Price and Duration -->
                            <div class="space-y-1">
                                <?php if ($price): ?>
                                    <div class="text-3xl font-bold text-primary">
                                        <?php echo esc_html($price); ?>
                                    </div>
                                <?php endif; ?>
                                
                                <?php if ($duration): ?>
                                    <div class="text-sm text-muted-foreground">
                                        <?php echo esc_html($duration); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            
                            <!-- Description -->
                            <?php if ($description): ?>
                                <p class="text-base text-muted-foreground">
                                    <?php echo nl2br(esc_html($description)); ?>
                                </p>
                            <?php endif; ?>
                        </div>
                        
                        <!-- Features and Button -->
                        <div class="p-6 pt-0 space-y-4">
                            <!-- Features List -->
                            <?php if ($features): ?>
                                <ul class="space-y-3">
                                    <?php foreach ($features as $feature): ?>
                                        <?php $feature_text = $feature['text']; ?>
                                        <?php if ($feature_text): ?>
                                            <li class="flex items-start gap-3">
                                                <svg class="h-5 w-5 text-success flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                                <span class="text-sm"><?php echo esc_html($feature_text); ?></span>
                                            </li>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                            
                            <!-- Button -->
                            <?php if ($button_text): ?>
                                <?php
                                // Обработка ссылки
                                if ($button_link) {
                                    // Если ссылка начинается с /, добавляем домен
                                    if (strpos($button_link, '/') === 0) {
                                        $button_url = home_url($button_link);
                                    } else {
                                        $button_url = $button_link;
                                    }
                                } else {
                                    // Если нет ссылки, используем контакты
                                    $button_url = home_url('/contacts');
                                }
                                ?>
                                
                                <a href="<?php echo esc_url($button_url); ?>" 
                                   class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 w-full h-10 px-4 py-2 <?php echo $is_recommended ? 'bg-primary text-primary-foreground hover:bg-primary/90' : 'border border-input bg-background hover:bg-accent hover:text-accent-foreground'; ?>">
                                    <?php echo esc_html($button_text); ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
