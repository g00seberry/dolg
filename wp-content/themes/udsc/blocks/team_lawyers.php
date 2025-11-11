<?php
/**
 * Block Name: Team Lawyers
 * Description: Команда юристов
 */

if (!isset($args['data']) || !is_array($args['data'])) {
    return;
}

$data = $args['data'];
$section_title = $data['section_title'] ?? '';
$section_subtitle = $data['section_subtitle'] ?? '';
$lawyers = $data['lawyers'] ?? [];

$title_html = udsc_parse_title_with_tag($section_title, 'h2', 'text-3xl lg:text-4xl font-bold mb-4');
?>

<!-- Lawyer Team Section -->
<section class="section bg-muted/20">
    <div class="container">
        <?php if ($section_title || $section_subtitle): ?>
            <div class="text-center mb-12">
                <?php if ($title_html): ?>
                    <?php echo $title_html; ?>
                <?php endif; ?>

                <?php if (!empty($section_subtitle)): ?>
                    <p class="text-xl text-muted-foreground max-w-2xl mx-auto">
                        <?php echo nl2br(esc_html($section_subtitle)); ?>
                    </p>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($lawyers)): ?>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 md:gap-10">
                <?php foreach ($lawyers as $lawyer): ?>
                    <?php
                    $photo = $lawyer['photo'] ?? null;
                    $name = $lawyer['name'] ?? '';
                    $position = $lawyer['position'] ?? '';
                    $reviews_count = $lawyer['reviews_count'] ?? null;
                    $reviews_label = $lawyer['reviews_label'] ?? '';
                    $cases_count = $lawyer['cases_count'] ?? null;
                    $cases_label = $lawyer['cases_label'] ?? '';

                    $photo_alt = $photo['alt'] ?? '';
                    if (!$photo_alt && $name) {
                        $photo_alt = sprintf('%s - %s', $name, $position ?: __('юрист по банкротству', 'udsc'));
                    }

                    $has_reviews = $reviews_count !== null && $reviews_count !== '';
                    $has_cases = $cases_count !== null && $cases_count !== '';
                    $formatted_reviews = $has_reviews ? number_format_i18n((int) $reviews_count) : '';
                    $formatted_cases = $has_cases ? number_format_i18n((int) $cases_count) : '';
                    ?>

                    <div class="bg-card rounded-2xl border overflow-hidden hover:shadow-lg transition-shadow">
                        <?php if (!empty($photo) && !empty($photo['url'])): ?>
                            <div class="aspect-[4/3] overflow-hidden">
                                <img
                                    src="<?php echo esc_url($photo['url']); ?>"
                                    alt="<?php echo esc_attr($photo_alt); ?>"
                                    class="w-full h-full object-cover"
                                    loading="lazy"
                                />
                            </div>
                        <?php endif; ?>

                        <div class="p-6 lg:p-7 space-y-4">
                            <?php if ($name): ?>
                                <h3 class="text-xl font-bold text-foreground">
                                    <?php echo esc_html($name); ?>
                                </h3>
                            <?php endif; ?>

                            <?php if ($position): ?>
                                <div class="flex items-center gap-2 text-sm text-muted-foreground">
                                    <svg class="h-4 w-4 text-primary" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                        <path d="M16 7a4 4 0 1 1-8 0 4 4 0 0 1 8 0z" />
                                        <path d="M5.5 21a6.5 6.5 0 1 1 13 0" />
                                    </svg>
                                    <span><?php echo esc_html($position); ?></span>
                                </div>
                            <?php endif; ?>

                            <?php if ($has_reviews || $has_cases): ?>
                                <div class="grid grid-cols-2 gap-4 pt-2">
                                    <?php if ($has_reviews): ?>
                                        <div>
                                            <div class="text-2xl font-bold text-primary">
                                                <?php echo esc_html($formatted_reviews); ?>+
                                            </div>
                                            <?php if ($reviews_label): ?>
                                                <div class="text-xs text-muted-foreground">
                                                    <?php echo esc_html($reviews_label); ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>

                                    <?php if ($has_cases): ?>
                                        <div>
                                            <div class="text-2xl font-bold text-primary">
                                                <?php echo esc_html($formatted_cases); ?>+
                                            </div>
                                            <?php if ($cases_label): ?>
                                                <div class="text-xs text-muted-foreground">
                                                    <?php echo esc_html($cases_label); ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>

                            <button
                                type="button"
                                data-toggle="modal"
                                data-target="#consultation-modal"
                                class="w-full inline-flex items-center justify-center whitespace-nowrap h-11 rounded-md border border-primary px-6 text-sm font-medium text-primary hover:bg-primary hover:text-primary-foreground transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50"
                            >
                                <?php esc_html_e('Запись на консультацию', 'udsc'); ?>
                            </button>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

