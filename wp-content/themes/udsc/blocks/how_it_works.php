<?php
/**
 * Block Name: How it Works
 * Description: Как проходит процедура
 */

// Получаем данные из ACF полей
$data = $args['data'];
$section_title = $data['section_title'];
$section_subtitle = $data['section_subtitle'];
$steps_list = $data['steps_list'] ?? [];

// Обработка заголовка с помощью утилитарной функции
$title_html = udsc_parse_title_with_tag($section_title, 'h2', 'text-3xl lg:text-4xl font-bold mb-4');
?>

<!-- How it Works Section -->
<section class="section bg-muted/20">
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

        <!-- Process Steps Grid -->
        <?php if ($steps_list): ?>
            <div class="grid md:grid-cols-3 gap-8">
                <?php foreach ($steps_list as $index => $step): ?>
                    <?php
                    $number = $step['number'];
                    $title = $step['title'];
                    $description = $step['description'];
                    ?>
                    
                    <div class="text-center">
                        <!-- Step Number Circle -->
                        <?php if ($number): ?>
                            <div class="w-16 h-16 bg-primary text-primary-foreground rounded-full flex items-center justify-center text-2xl font-bold mx-auto mb-6">
                                <?php echo esc_html($number); ?>
                            </div>
                        <?php endif; ?>
                        
                        <!-- Step Title -->
                        <?php if ($title): ?>
                            <h3 class="text-xl font-semibold mb-4">
                                <?php echo esc_html($title); ?>
                            </h3>
                        <?php endif; ?>
                        
                        <!-- Step Description -->
                        <?php if ($description): ?>
                            <p class="text-muted-foreground">
                                <?php echo nl2br(esc_html($description)); ?>
                            </p>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
