<?php
/**
 * Block Name: Offer Hero Simple
 * Description: Герой-блок с изображением, таймером и рассрочкой
 */

$data = $args['data'] ?? [];

$image              = $data['image'] ?? null;
$bubble_text        = $data['bubble_text'] ?? '';
$title              = $data['title'] ?? '';
$timer_label        = $data['timer_label'] ?? '';
$timer_seconds      = isset($data['timer_seconds']) ? (int) $data['timer_seconds'] : 0;
$installment_prefix = $data['installment_prefix'] ?? '';
$price_accent       = $data['price_accent'] ?? '';
$price_old          = $data['price_old'] ?? '';
$save_text          = $data['save_text'] ?? '';

$phone_placeholder  = $data['phone_placeholder'] ?? __('Контактный телефон', 'udsc');
$cta_text           = $data['cta_text'] ?? __('Зафиксировать скидку', 'udsc');
$cta_link           = $data['cta_link'] ?? '';
$consent_text       = $data['consent_text'] ?? __('Нажимая на кнопку, вы даете согласие на обработку своих персональных данных', 'udsc');

$timer_seconds = max(0, $timer_seconds);
$timer_hours   = str_pad((string) floor($timer_seconds / 3600), 2, '0', STR_PAD_LEFT);
$timer_minutes = str_pad((string) floor(($timer_seconds % 3600) / 60), 2, '0', STR_PAD_LEFT);
$timer_secs    = str_pad((string) ($timer_seconds % 60), 2, '0', STR_PAD_LEFT);
$timer_id      = function_exists('wp_unique_id') ? wp_unique_id('offer-hero-simple-timer-') : uniqid('offer-hero-simple-timer-');
?>

<section class="py-10 lg:py-14 bg-background">
    <div class="container">
        <div class="max-w-6xl mx-auto">
            <div class="bg-card rounded-3xl border shadow-lg overflow-hidden">
                <div class="grid lg:grid-cols-[1fr_1.4fr] gap-6 lg:gap-10 items-stretch">
                    <div class="relative h-full min-h-[320px] sm:min-h-[380px] lg:min-h-[460px]">
                        <?php if ($image && !empty($image['url'])): ?>
                            <img
                                src="<?php echo esc_url($image['url']); ?>"
                                alt="<?php echo esc_attr($image['alt'] ?: $title); ?>"
                                class="w-full h-full object-cover object-center"
                            />
                        <?php else: ?>
                            <div class="w-full h-full bg-gradient-to-br from-primary/20 via-primary/10 to-background flex items-center justify-center text-center p-6">
                                <p class="text-foreground/70 text-lg"><?php esc_html_e('Добавьте изображение в блоке "Offer Hero Simple"', 'udsc'); ?></p>
                            </div>
                        <?php endif; ?>

                        <?php if ($bubble_text): ?>
                            <div class="absolute bottom-[15%] left-1/2 -translate-x-1/2 translate-y-[25px] bg-card/95 backdrop-blur-sm p-4 rounded-2xl shadow-md max-w-[240px] border border-border">
                                <p class="text-sm font-medium text-foreground leading-snug">
                                    <?php echo nl2br(esc_html($bubble_text)); ?>
                                </p>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="p-6 sm:p-8 lg:p-10 flex flex-col gap-6">
                        <?php if ($title): ?>
                            <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold leading-tight text-foreground">
                                <?php echo nl2br(esc_html($title)); ?>
                            </h2>
                        <?php endif; ?>

                        <div id="<?php echo esc_attr($timer_id); ?>" data-timer-seconds="<?php echo esc_attr($timer_seconds); ?>" class="bg-card border-2 border-primary px-4 py-3 rounded-xl inline-flex flex-wrap items-center gap-3 w-full max-w-xl">
                            <svg class="h-5 w-5 text-primary" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                <circle cx="12" cy="12" r="10"></circle>
                                <polyline points="12 6 12 12 16 14"></polyline>
                            </svg>
                            <?php if ($timer_label): ?>
                                <span class="font-semibold text-sm sm:text-base text-foreground whitespace-nowrap">
                                    <?php echo esc_html($timer_label); ?>
                                </span>
                            <?php endif; ?>
                            <div class="flex items-center gap-2 font-mono font-bold text-primary text-lg sm:text-xl">
                                <span data-unit="hours"><?php echo esc_html($timer_hours); ?></span>
                                <span class="text-foreground">:</span>
                                <span data-unit="minutes"><?php echo esc_html($timer_minutes); ?></span>
                                <span class="text-foreground">:</span>
                                <span data-unit="seconds"><?php echo esc_html($timer_secs); ?></span>
                            </div>
                        </div>

                        <div class="space-y-2">
                            <?php if ($installment_prefix || $price_accent): ?>
                                <p class="text-xl sm:text-2xl lg:text-3xl font-bold text-foreground">
                                    <?php echo esc_html($installment_prefix); ?>
                                    <?php if ($price_accent): ?>
                                        <span class="text-primary"><?php echo esc_html($price_accent); ?></span>
                                    <?php endif; ?>
                                </p>
                            <?php endif; ?>
                            <?php if ($price_old || $save_text): ?>
                                <p class="text-sm sm:text-base text-muted-foreground">
                                    <?php if ($price_old): ?>
                                        <?php esc_html_e('вместо', 'udsc'); ?> <span class="line-through decoration-1"><?php echo esc_html($price_old); ?></span>
                                    <?php endif; ?>
                                    <?php if ($save_text): ?>
                                        — <?php echo esc_html($save_text); ?>
                                    <?php endif; ?>
                                </p>
                            <?php endif; ?>
                        </div>

                        <form action="<?php echo esc_url($cta_link ?: '#'); ?>" method="post" class="space-y-3 w-full max-w-lg">
                            <div class="flex flex-col sm:flex-row gap-3 items-center">
                                <div class="flex-1 relative w-full">
                                    <input
                                        type="tel"
                                        name="phone"
                                        placeholder="<?php echo esc_attr($phone_placeholder); ?>"
                                        class="w-full h-12 border border-input rounded-lg px-4 pr-8 bg-background"
                                        required
                                    />
                                    <span class="absolute right-3 top-1/2 -translate-y-1/2 text-destructive font-bold">*</span>
                                </div>
                                <button type="submit" class="h-12 px-6 bg-primary text-primary-foreground font-semibold rounded-lg hover:bg-primary/90 transition-colors whitespace-nowrap w-full sm:w-auto">
                                    <?php echo esc_html($cta_text); ?>
                                </button>
                            </div>
                            <?php if ($consent_text): ?>
                                <p class="text-xs text-muted-foreground text-center">
                                    <?php echo wp_kses_post($consent_text); ?>
                                </p>
                            <?php endif; ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
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

