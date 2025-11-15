<?php
/**
 * Block Name: Situations Grid
 * Description: Карточки сложных финансовых ситуаций
 */

$data = $args['data'] ?? [];
$section_title = $data['section_title'] ?? '';
$items = $data['items'] ?? [];

$title_html = udsc_parse_title_with_tag(
    $section_title,
    'h2',
    'text-3xl lg:text-5xl font-bold text-center mb-12 text-foreground'
);
?>

<section class="py-16 lg:py-20 bg-background">
    <div class="container">
        <?php if ($section_title && $title_html): ?>
            <?php echo $title_html; ?>
        <?php endif; ?>

        <?php if (!empty($items)): ?>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
                <?php foreach ($items as $item): ?>
                    <?php
                    $title_before = trim($item['title_before'] ?? '');
                    $title_accent = trim($item['title_accent'] ?? '');
                    $title_after  = trim($item['title_after'] ?? '');
                    $description  = $item['description'] ?? '';
                    $image        = $item['image'] ?? null;
                    ?>

                    <div class="bg-card overflow-hidden hover:shadow-xl transition-shadow duration-300 flex flex-col h-full rounded-2xl border">
                        <div class="p-6 space-y-4 flex-1">
                            <?php if ($title_before || $title_accent || $title_after): ?>
                                <h3 class="text-lg font-semibold leading-tight">
                                    <?php if ($title_before): ?>
                                        <?php echo esc_html($title_before); ?>
                                        <?php if ($title_accent || $title_after) echo ' '; ?>
                                    <?php endif; ?>

                                    <?php if ($title_accent): ?>
                                        <span class="text-primary"><?php echo esc_html($title_accent); ?></span>
                                        <?php if ($title_after) echo ' '; ?>
                                    <?php endif; ?>

                                    <?php if ($title_after): ?>
                                        <?php echo esc_html($title_after); ?>
                                    <?php endif; ?>
                                </h3>
                            <?php endif; ?>

                            <?php if ($description): ?>
                                <p class="text-sm text-muted-foreground">
                                    <?php echo nl2br(esc_html($description)); ?>
                                </p>
                            <?php endif; ?>
                        </div>

                        <div class="aspect-[4/3] overflow-hidden mt-auto">
                            <?php if ($image && !empty($image['ID'])): ?>
                                <?php echo wp_get_attachment_image($image['ID'], 'large', false, [
                                    'class' => 'w-full h-full object-cover',
                                    'loading' => 'lazy',
                                ]); ?>
                            <?php else: ?>
                                <div class="w-full h-full bg-muted flex items-center justify-center">
                                    <svg class="h-8 w-8 text-muted-foreground/60" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                        <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                        <path d="M3 16l5-5 4 4 5-6 4 5"></path>
                                        <circle cx="9" cy="9" r="1.5"></circle>
                                    </svg>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="text-center text-muted-foreground">
                <?php esc_html_e('Добавьте карточки в блоке ACF, чтобы отобразить их на странице.', 'udsc'); ?>
            </div>
        <?php endif; ?>

        <div class="text-center">
            <button class="bg-primary text-primary-foreground hover:bg-primary/90 px-6 py-3 rounded-lg font-medium transition-colors" data-toggle="modal" data-target="#consultation-modal">
                <?php esc_html_e('Узнать, как избавиться от долгов', 'udsc'); ?>      
            </button>
        </div>
    </div>
</section>

