<?php
/**
 * Block Name: Offer Hero
 * Description: Hero-офер с таймером, ценой и преимуществами
 */

$data = $args['data'] ?? [];

$title_line_1      = $data['title_line_1'] ?? '';
$title_line_2      = $data['title_line_2'] ?? '';
$law_note          = $data['law_note'] ?? '';
$timer_label       = $data['timer_label'] ?? '';
$timer_seconds     = isset($data['timer_seconds']) ? (int) $data['timer_seconds'] : 0;
$price_current     = $data['price_current'] ?? '';
$price_old         = $data['price_old'] ?? '';
$phone_placeholder = $data['phone_placeholder'] ?? '';
$cta_text          = $data['cta_text'] ?? '';
$cta_link          = $data['cta_link'] ?? '';
$consent_text      = $data['consent_text'] ?? '';
$side_image        = $data['side_image'] ?? null;
$stat_count        = $data['stat_count'] ?? '';
$stat_label        = $data['stat_label'] ?? '';
$stat_text         = $data['stat_text'] ?? '';
$benefits          = $data['benefits'] ?? [];

$timer_seconds = $timer_seconds > 0 ? $timer_seconds : 0;
$timer_hours   = str_pad((string) floor($timer_seconds / 3600), 2, '0', STR_PAD_LEFT);
$timer_minutes = str_pad((string) floor(($timer_seconds % 3600) / 60), 2, '0', STR_PAD_LEFT);
$timer_secs    = str_pad((string) ($timer_seconds % 60), 2, '0', STR_PAD_LEFT);
$timer_id      = function_exists('wp_unique_id') ? wp_unique_id('offer-hero-timer-') : uniqid('offer-hero-timer-');

?>

<section class="relative bg-gradient-to-br from-background via-background to-muted/20 pt-4 pb-8 sm:pt-6 sm:pb-10 lg:pt-8 lg:pb-12 overflow-hidden">
    <div class="container">
        <div class="grid gap-5 lg:grid-cols-[1fr_1.2fr] lg:gap-8 items-center">
            <div class="relative">
                <div class="p-6 sm:p-8 lg:p-10 bg-card/80 backdrop-blur border shadow-xl rounded-3xl space-y-6">
                    <?php if ($title_line_1 || $title_line_2): ?>
                        <div class="space-y-4">
                            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold leading-tight">
                                <?php echo esc_html($title_line_1); ?>
                                <?php if ($title_line_2): ?>
                                    <span class="text-primary"><?php echo esc_html($title_line_2); ?></span>
                                <?php endif; ?>
                            </h1>
                            <?php if ($law_note): ?>
                                <div class="flex items-start gap-2 p-3 bg-primary/5 rounded-lg border border-primary/10">
                                    <div class="w-6 h-4">
                                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/rus.png'); ?>" alt="Law Note" class="w-full h-full object-cover" />
                                    </div>
                                    <p class="text-sm text-muted-foreground leading-relaxed">
                                        <?php echo esc_html($law_note); ?>
                                    </p>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <div class="p-3 sm:p-4 bg-gradient-to-br from-muted/50 to-muted/30 rounded-xl border shadow-sm" id="<?php echo esc_attr($timer_id); ?>" data-timer-seconds="<?php echo esc_attr($timer_seconds); ?>">
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 sm:gap-6">
                            <div class="px-4 py-2 rounded-lg shadow-md bg-card border-2 border-primary">
                                <div class="flex items-center gap-1.5 font-mono text-base sm:text-lg">
                                    <div class="flex flex-col items-center">
                                        <div class="text-xl sm:text-2xl lg:text-3xl font-bold tracking-tight leading-none text-primary" data-unit="hours"><?php echo esc_html($timer_hours); ?></div>
                                        <div class="text-[9px] sm:text-[10px] uppercase tracking-wider text-foreground/80">час</div>
                                    </div>
                                    <div class="text-lg sm:text-xl font-bold text-foreground mb-1">:</div>
                                    <div class="flex flex-col items-center">
                                        <div class="text-xl sm:text-2xl lg:text-3xl font-bold tracking-tight leading-none text-primary" data-unit="minutes"><?php echo esc_html($timer_minutes); ?></div>
                                        <div class="text-[9px] sm:text-[10px] uppercase tracking-wider text-foreground/80">мин</div>
                                    </div>
                                    <div class="text-lg sm:text-xl font-bold text-foreground mb-1">:</div>
                                    <div class="flex flex-col items-center">
                                        <div class="text-xl sm:text-2xl lg:text-3xl font-bold tracking-tight leading-none text-primary" data-unit="seconds"><?php echo esc_html($timer_secs); ?></div>
                                        <div class="text-[9px] sm:text-[10px] uppercase tracking-wider text-foreground/80">сек</div>
                                    </div>
                                </div>
                            </div>

                            <div class="flex-1">
                                <?php if ($timer_label): ?>
                                    <p class="text-sm sm:text-base lg:text-lg font-semibold mb-2 text-foreground/80">
                                        <?php echo esc_html($timer_label); ?>
                                    </p>
                                <?php endif; ?>
                                <div class="flex flex-wrap items-baseline gap-2">
                                    <?php if ($price_current): ?>
                                        <span class="text-2xl sm:text-3xl lg:text-4xl font-bold leading-none text-primary">
                                            <?php echo esc_html($price_current); ?>
                                        </span>
                                    <?php endif; ?>
                                    <?php if ($price_old): ?>
                                        <span class="text-base lg:text-lg text-muted-foreground">
                                            вместо <span class="line-through decoration-[0.5px]"><?php echo esc_html($price_old); ?></span>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-3">
                        <form action="<?php echo esc_url($cta_link ?: '#'); ?>" method="post" class="flex flex-col sm:flex-row gap-2 sm:gap-3">
                            <div class="relative flex-1">
                                <input
                                    type="tel"
                                    name="phone"
                                    placeholder="<?php echo esc_attr($phone_placeholder); ?>"
                                    class="w-full h-11 sm:h-12 bg-background border border-input rounded-lg px-4 pr-8 text-sm sm:text-base"
                                    required
                                />
                                <span class="absolute right-3 top-1/2 -translate-y-1/2 text-destructive text-lg">*</span>
                            </div>
                            <button type="submit" class="h-11 sm:h-12 px-5 sm:px-6 bg-primary text-primary-foreground hover:bg-primary/90 whitespace-nowrap rounded-lg font-medium transition-colors text-sm sm:text-base">
                                <?php echo esc_html($cta_text ?: __('Бесплатная консультация', 'udsc')); ?>
                            </button>
                        </form>
                        <?php if ($consent_text): ?>
                            <p class="text-xs text-muted-foreground text-center">
                                <?php echo wp_kses_post($consent_text); ?>
                            </p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="relative hidden lg:block">
                <?php if ($side_image && !empty($side_image['url'])): ?>
                    <img
                        src="<?php echo esc_url($side_image['url']); ?>"
                        alt="<?php echo esc_attr($side_image['alt'] ?: ($title_line_2 ?: $title_line_1)); ?>"
                        class="rounded-2xl shadow-2xl w-full object-cover"
                    />
                <?php else: ?>
                    <img
                        src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/hero-image.jpg'); ?>"
                        alt="<?php echo esc_attr($title_line_2 ?: $title_line_1); ?>"
                        class="rounded-2xl shadow-2xl w-full object-cover"
                    />
                <?php endif; ?>

                <?php if ($stat_count || $stat_label || $stat_text): ?>
                    <div class="absolute bottom-6 right-6 bg-card/95 backdrop-blur p-4 rounded-xl border shadow-lg max-w-sm">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-primary/10 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                    <path d="m15.477 12.89 1.515 8.526a.5.5 0 0 1-.81.47l-3.58-2.687a1 1 0 0 0-1.197 0l-3.586 2.686a.5.5 0 0 1-.81-.469l1.514-8.526"></path>
                                    <circle cx="12" cy="8" r="6"></circle>
                                </svg>
                            </div>
                            <div>
                                <?php if ($stat_count): ?>
                                    <div class="text-2xl font-bold text-primary"><?php echo esc_html($stat_count); ?></div>
                                <?php endif; ?>
                                <?php if ($stat_label): ?>
                                    <div class="text-sm text-foreground/70"><?php echo esc_html($stat_label); ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php if ($stat_text): ?>
                            <p class="text-sm text-foreground/70 mt-2 leading-relaxed">
                                <?php echo nl2br(esc_html($stat_text)); ?>
                            </p>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

  
      <?php if (!empty($benefits)): ?>
        <div class="container mt-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                <?php foreach ($benefits as $benefit): ?>
                    <?php
                    $benefit_icon  = $benefit['icon'] ?? null;
                    $benefit_title = $benefit['title'] ?? '';
                    $benefit_text  = $benefit['text'] ?? '';
                    ?>
                    <div class="flex items-center gap-3 p-4 bg-card/50 backdrop-blur rounded-xl border">
                        <div class="w-10 h-10 bg-primary/10 rounded-lg flex items-center justify-center flex-shrink-0 overflow-hidden">
                            <?php if ($benefit_icon && !empty($benefit_icon['url'])): ?>
                                <img src="<?php echo esc_url($benefit_icon['url']); ?>" alt="<?php echo esc_attr($benefit_icon['alt'] ?: $benefit_title); ?>" class="w-6 h-6 object-contain" />
                            <?php else: ?>
                                <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                    <path d="M20 6 9 17l-5-5"></path>
                                </svg>
                            <?php endif; ?>
                        </div>
                        <div>
                            <?php if ($benefit_title): ?>
                                <div class="font-semibold"><?php echo esc_html($benefit_title); ?></div>
                            <?php endif; ?>
                            <?php if ($benefit_text): ?>
                                <div class="text-sm text-foreground/70"><?php echo nl2br(esc_html($benefit_text)); ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>
	
</section>

<?php if ($timer_seconds > 0): ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const timerEl = document.getElementById('<?php echo esc_js($timer_id); ?>');
            if (!timerEl) {
                return;
            }

            let remaining = parseInt(timerEl.dataset.timerSeconds, 10);
            if (isNaN(remaining) || remaining <= 0) {
                return;
            }

            const units = {
                hours: timerEl.querySelector('[data-unit="hours"]'),
                minutes: timerEl.querySelector('[data-unit="minutes"]'),
                seconds: timerEl.querySelector('[data-unit="seconds"]')
            };

            const updateTimer = () => {
                const hours = Math.floor(remaining / 3600);
                const minutes = Math.floor((remaining % 3600) / 60);
                const seconds = remaining % 60;

                if (units.hours) {
                    units.hours.textContent = String(hours).padStart(2, '0');
                }
                if (units.minutes) {
                    units.minutes.textContent = String(minutes).padStart(2, '0');
                }
                if (units.seconds) {
                    units.seconds.textContent = String(seconds).padStart(2, '0');
                }
            };

            updateTimer();

            const interval = setInterval(() => {
                remaining = Math.max(0, remaining - 1);
                updateTimer();

                if (remaining <= 0) {
                    clearInterval(interval);
                }
            }, 1000);
        });
    </script>
<?php endif; ?>

