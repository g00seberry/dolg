<?php
/**
 * Block Name: Case Studies
 * Description: Успешные кейсы
 */

// Получаем данные из ACF полей
$data = $args['data'];
$section_title = $data['section_title'];
$section_subtitle = $data['section_subtitle'];
$cases_list = $data['cases_list'] ?? [];
$button_text = $data['button_text'];
$button_link = $data['button_link'];

// Обработка заголовка с помощью утилитарной функции
$title_html = udsc_parse_title_with_tag($section_title, 'h2', 'text-3xl lg:text-4xl font-bold mb-4');
?>

<!-- Case Studies Preview Section -->
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

        <!-- Case Studies Grid -->
        <?php if ($cases_list): ?>
            <div class="grid md:grid-cols-2 gap-8">
                <?php foreach ($cases_list as $case): ?>
                    <?php
                    $title = $case['title'];
                    $description = $case['description'];
                    $amount_label = $case['amount_label'];
                    $amount_value = $case['amount_value'];
                    $term_label = $case['term_label'];
                    $term_value = $case['term_value'];
                    ?>
                    
                    <div class="bg-card rounded-lg border p-6">
                        <!-- Case Title -->
                        <?php if ($title): ?>
                            <h3 class="text-xl font-semibold mb-3">
                                <?php echo esc_html($title); ?>
                            </h3>
                        <?php endif; ?>
                        
                        <!-- Case Description -->
                        <?php if ($description): ?>
                            <p class="text-muted-foreground mb-4">
                                <?php echo nl2br(esc_html($description)); ?>
                            </p>
                        <?php endif; ?>
                        
                        <!-- Case Details (Amount & Duration) -->
                        <?php if ($amount_value || $term_value): ?>
                            <div class="flex justify-between items-center text-sm">
                                <?php if ($amount_value): ?>
                                    <div>
                                        <span class="text-muted-foreground"><?php echo esc_html($amount_label ?: 'Сумма долга:'); ?> </span>
                                        <span class="font-semibold text-primary"><?php echo esc_html($amount_value); ?></span>
                                    </div>
                                <?php endif; ?>
                                
                                <?php if ($term_value): ?>
                                    <div>
                                        <span class="text-muted-foreground"><?php echo esc_html($term_label ?: 'Срок:'); ?> </span>
                                        <span class="font-semibold"><?php echo esc_html($term_value); ?></span>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <!-- CTA Button -->
        <?php if ($button_text && $button_link): ?>
            <div class="text-center mt-8">
                <a href="<?php echo esc_url($button_link); ?>" 
                   class="inline-flex items-center justify-center whitespace-nowrap h-11 rounded-md px-8 text-sm font-medium border border-input bg-background hover:bg-accent hover:text-accent-foreground ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50">
                    <?php echo esc_html($button_text); ?>
                </a>
            </div>
        <?php endif; ?>
    </div>
</section>
