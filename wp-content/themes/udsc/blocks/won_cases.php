<?php
/**
 * Block Name: Won Cases
 * Description: Выигранные дела (карусель)
 */

if (!isset($args['data']) || !is_array($args['data'])) {
    return;
}

$data = $args['data'];

$section_title    = $data['section_title'] ?? '';
$section_subtitle = $data['section_subtitle'] ?? '';
$items            = array_filter(is_array($data['items'] ?? null) ? $data['items'] : [], 'is_array');

$title_html   = udsc_parse_title_with_tag($section_title, 'h2', 'text-3xl lg:text-4xl font-bold');
$carousel_id  = wp_unique_id('won-cases-');
$has_items    = !empty($items);

?>

<!-- Won Cases Carousel Section -->
<section class="section bg-background">
    <div class="container">
        <div class="flex flex-col gap-4 md:flex-row md:items-end md:justify-between mb-8">
            <div class="flex-1">
                <div class="flex items-center gap-3">
                    <div class="p-2 bg-primary/10 rounded-lg">
                        <svg class="h-6 w-6 text-primary" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                            <circle cx="12" cy="8" r="5"></circle>
                            <path d="m8.21 13.89-1.21 6.11L12 17l5 3-1.21-6.11"></path>
                        </svg>
                    </div>

                    <?php if ($title_html): ?>
                        <?php echo $title_html; ?>
                    <?php else: ?>
                        <h2 class="text-3xl lg:text-4xl font-bold">
                            <?php esc_html_e('Выигранные дела', 'udsc'); ?>
                        </h2>
                    <?php endif; ?>
                </div>

                <?php if (!empty($section_subtitle)): ?>
                    <p class="mt-2 text-muted-foreground max-w-2xl">
                        <?php echo nl2br(esc_html($section_subtitle)); ?>
                    </p>
                <?php endif; ?>
            </div>

            <?php if ($has_items && count($items) > 1): ?>
                <div class="flex items-center gap-2">
                    <button
                        type="button"
                        class="inline-flex items-center justify-center h-10 w-10 rounded-full border border-input bg-background text-foreground hover:bg-accent hover:text-accent-foreground transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2"
                        aria-label="<?php esc_attr_e('Предыдущие дела', 'udsc'); ?>"
                        data-carousel-prev
                        data-carousel-target="#<?php echo esc_attr($carousel_id); ?>"
                    >
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                            <path d="M15 19 8 12l7-7"></path>
                        </svg>
                    </button>
                    <button
                        type="button"
                        class="inline-flex items-center justify-center h-10 w-10 rounded-full bg-primary text-primary-foreground hover:bg-primary/90 transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2"
                        aria-label="<?php esc_attr_e('Следующие дела', 'udsc'); ?>"
                        data-carousel-next
                        data-carousel-target="#<?php echo esc_attr($carousel_id); ?>"
                    >
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                            <path d="m9 5 7 7-7 7"></path>
                        </svg>
                    </button>
                </div>
            <?php endif; ?>
        </div>

        <?php if ($has_items): ?>
            <?php
            $slides = array_chunk($items, 2);
            $rendered_count = count($slides);
            ?>
            <div id="<?php echo esc_attr($carousel_id); ?>" class="relative" data-carousel="static">
                <div class="relative overflow-hidden">
                    <?php foreach ($slides as $slide_index => $slide_items): ?>
                        <?php
                        $is_active = ($slide_index === 0);
                        $slide_classes = 'duration-500 ease-in-out';
                        if (!$is_active) {
                            $slide_classes .= ' hidden';
                        }
                        ?>
                        <div class="<?php echo esc_attr($slide_classes); ?>" data-carousel-item<?php echo $is_active ? '="active"' : ''; ?>>
                            <div class="grid gap-6 md:grid-cols-2">
                                <?php foreach ($slide_items as $item): ?>
                                    <?php
                                    $amount   = trim((string)($item['amount'] ?? ''));
                                    $date     = trim((string)($item['date'] ?? ''));
                                    $status   = trim((string)($item['status'] ?? ''));
                                    $client   = trim((string)($item['client'] ?? ''));
                                    $number   = trim((string)($item['number'] ?? ''));
                                    $more     = trim((string)($item['more'] ?? ''));

                                    $court_card           = trim((string)($item['court_card'] ?? ''));
                                    $court_order_original = trim((string)($item['court_order_original'] ?? ''));

                                    $creditors   = array_filter(is_array($item['creditors'] ?? null) ? $item['creditors'] : [], 'is_array');
                                    $status_text = $status !== '' ? $status : __('Дело выиграно', 'udsc');
                                    ?>
                                    <div class="h-full p-6 bg-muted/20 rounded-2xl border border-border/60 shadow-sm flex flex-col">
                                        <div class="mb-4">
                                            <h3 class="text-xl font-bold mb-2 leading-snug">
                                                <?php esc_html_e('Списан долг в размере', 'udsc'); ?>
                                                <?php if ($amount !== ''): ?>
                                                    <span class="text-2xl text-primary ml-1">
                                                        <?php echo esc_html($amount); ?>
                                                    </span>
                                                <?php endif; ?>
                                            </h3>

                                            <?php if ($date || $status_text): ?>
                                                <div class="flex flex-wrap items-center gap-2 text-sm text-foreground/90">
                                                    <?php if ($date): ?>
                                                        <span><?php echo esc_html($date); ?></span>
                                                    <?php endif; ?>

                                                    <?php if ($status_text): ?>
                                                        <span class="px-2 py-1 bg-success/10 text-success rounded text-xs font-medium">
                                                            <?php echo esc_html($status_text); ?>
                                                        </span>
                                                    <?php endif; ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>

                                        <?php if ($creditors): ?>
                                            <div class="text-sm text-foreground/90 mb-4">
                                                <span class="font-medium"><?php esc_html_e('Список кредиторов:', 'udsc'); ?></span>
                                                <div class="flex flex-wrap gap-2 mt-2">
                                                    <?php foreach ($creditors as $creditor): ?>
                                                        <?php
                                                        $badge_raw = trim((string)($creditor['badge'] ?? ''));
                                                        $badge_letter = $badge_raw;
                                                        $badge_color  = '';

                                                        if ($badge_raw !== '' && strpos($badge_raw, ':') !== false) {
                                                            [$color_part, $letter_part] = array_map('trim', explode(':', $badge_raw, 2));
                                                            if ($letter_part !== '') {
                                                                $badge_letter = $letter_part;
                                                            }
                                                            if ($color_part !== '') {
                                                                $badge_color = $color_part;
                                                            }
                                                        }

                                                        $creditor_name = trim((string)($creditor['name'] ?? ''));

                                                        if (($badge_letter === '' && $badge_color === '') && $creditor_name === '') {
                                                            continue;
                                                        }
                                                        ?>
                                                        <div class="px-3 py-1.5 bg-background border border-border rounded-lg flex items-center gap-2">
                                                            <?php if ($badge_letter !== ''): ?>
                                                                <?php
                                                                $badge_styles = $badge_color !== ''
                                                                    ? 'background-color:' . esc_attr($badge_color) . ';color:#fff;'
                                                                    : '';
                                                                ?>
                                                                <span class="flex items-center justify-center w-5 h-5 rounded-full bg-primary text-primary-foreground text-[10px] font-bold uppercase" <?php echo $badge_styles ? 'style="' . $badge_styles . '"' : ''; ?>>
                                                                    <?php echo esc_html(function_exists('mb_substr') ? mb_substr($badge_letter, 0, 2) : substr($badge_letter, 0, 2)); ?>
                                                                </span>
                                                            <?php endif; ?>
                                                            <?php if ($creditor_name !== ''): ?>
                                                                <span class="text-xs text-foreground/80">
                                                                    <?php echo esc_html($creditor_name); ?>
                                                                </span>
                                                            <?php endif; ?>
                                                        </div>
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>
                                        <?php endif; ?>

                                        <div class="text-sm text-foreground/90 space-y-1 mb-4">
                                            <?php if ($client !== ''): ?>
                                                <div>
                                                    <span class="text-muted-foreground"><?php esc_html_e('Клиент:', 'udsc'); ?></span>
                                                    <span class="ml-2 font-medium"><?php echo esc_html($client); ?></span>
                                                </div>
                                            <?php endif; ?>

                                            <?php if ($number !== ''): ?>
                                                <div>
                                                    <span class="text-muted-foreground"><?php esc_html_e('Номер дела:', 'udsc'); ?></span>
                                                    <span class="ml-2 font-medium"><?php echo esc_html($number); ?></span>
                                                </div>
                                            <?php endif; ?>
                                        </div>

                                        <?php if ($court_card !== '' || $court_order_original !== ''): ?>
                                            <div class="flex flex-wrap gap-4 mb-4">
                                                <?php if ($court_card !== ''): ?>
                                                    <a
                                                        href="<?php echo esc_url($court_card); ?>"
                                                        class="inline-flex items-center gap-2 text-sm font-medium text-primary hover:underline"
                                                        <?php if (strpos($court_card, 'http') === 0) : ?>
                                                            target="_blank" rel="noopener"
                                                        <?php endif; ?>
                                                    >
                                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                                            <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                            <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                            <path d="M10 9H8"></path>
                                                            <path d="M16 13H8"></path>
                                                            <path d="M16 17H8"></path>
                                                        </svg>
                                                        <?php esc_html_e('Карточка арбитражного суда', 'udsc'); ?>
                                                    </a>
                                                <?php endif; ?>

                                                <?php if ($court_order_original !== ''): ?>
                                                    <a
                                                        href="<?php echo esc_url($court_order_original); ?>"
                                                        class="inline-flex items-center gap-2 text-sm font-medium text-primary hover:underline"
                                                        <?php if (strpos($court_order_original, 'http') === 0) : ?>
                                                            target="_blank" rel="noopener"
                                                        <?php endif; ?>
                                                    >
                                                        <svg class="h-3 w-3 mr-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                            <path d="m16 16 3-8 3 8c-.87.65-1.92 1-3 1s-2.13-.35-3-1Z"></path>
                                                            <path d="m2 16 3-8 3 8c-.87.65-1.92 1-3 1s-2.13-.35-3-1Z"></path>
                                                            <path d="M7 21h10"></path>
                                                            <path d="M12 3v18"></path>
                                                            <path d="M3 7h2c2 0 5-1 7-2 2 1 5 2 7 2h2"></path>
                                                        </svg>
                                                        <?php esc_html_e('Оригинал определения суда', 'udsc'); ?>
                                                    </a>
                                                <?php endif; ?>
                                            </div>
                                        <?php endif; ?>

                                        <?php if ($more !== ''): ?>
                                            <a
                                                href="<?php echo esc_url($more); ?>"
                                                class="mt-auto inline-flex items-center justify-center whitespace-nowrap h-9 rounded-md border border-primary px-4 text-xs font-medium text-primary hover:bg-primary hover:text-primary-foreground transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2"
                                            >
                                                <?php esc_html_e('Подробнее', 'udsc'); ?>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <?php if ($rendered_count > 1): ?>
                    <div class="flex items-center justify-center gap-2 mt-6">
                        <?php for ($dot_index = 0; $dot_index < $rendered_count; $dot_index++): ?>
                            <button
                                type="button"
                                class="w-2 h-2 rounded-full transition-colors <?php echo $dot_index === 0 ? 'bg-primary' : 'bg-muted-foreground/30'; ?>"
                                aria-label="<?php printf(esc_attr__('Слайд %d', 'udsc'), $dot_index + 1); ?>"
                                aria-current="<?php echo $dot_index === 0 ? 'true' : 'false'; ?>"
                                data-carousel-slide-to="<?php echo esc_attr($dot_index); ?>"
                                data-carousel-target="#<?php echo esc_attr($carousel_id); ?>"
                            ></button>
                        <?php endfor; ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="flex justify-center mt-6">
                <a 
                href="/case-studies/" 
                class="inline-flex items-center justify-center whitespace-nowrap h-11 rounded-md px-8 text-sm font-medium bg-primary text-primary-foreground hover:bg-primary/90 ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50">
                    Посмотреть все дела
                </a>
            </div>
        <?php else: ?>
            <p class="text-muted-foreground">
                <?php esc_html_e('Пока нет данных о выигранных делах.', 'udsc'); ?>
            </p>
        <?php endif; ?>
    </div>
</section>

