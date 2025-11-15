<?php
/**
 * Block Name: FAQ with Form
 * Description: Секция FAQ с формой вопроса
 */

$data = $args['data'] ?? [];

$section_title = $data['section_title'] ?? __('Остались вопросы?', 'udsc');
$items         = $data['items'] ?? [];

$form_title        = $data['form_title'] ?? __('Не нашли ответ?', 'udsc');
$form_subtitle     = $data['form_subtitle'] ?? __('Спрашивайте, мы поможем!', 'udsc');
$form_phone_placeholder = $data['form_phone_placeholder'] ?? __('Ваш номер телефона', 'udsc');
$form_question_placeholder = $data['form_question_placeholder'] ?? __('Ваш вопрос', 'udsc');
$form_button_text  = $data['form_button_text'] ?? __('Задать вопрос', 'udsc');
$form_consent_text = $data['form_consent_text'] ?? __('Нажимая на кнопку, вы даете согласие на обработку своих персональных данных', 'udsc');
$form_action       = $data['form_action'] ?? '';

?>

<section class="py-12 lg:py-16 bg-muted/50">
    <div class="container">
        <?php if ($section_title): ?>
            <h2 class="text-2xl lg:text-3xl font-bold text-center mb-8">
                <?php echo esc_html($section_title); ?>
            </h2>
        <?php endif; ?>

        <div class="grid lg:grid-cols-[1fr_380px] gap-6 items-start max-w-6xl mx-auto">
            <div class="space-y-3 w-full" id="<?php echo esc_attr($section_title ? sanitize_title($section_title) : wp_unique_id('faq-block-')); ?>">
                <?php if (!empty($items)): ?>
                    <?php
                    $faq_block_id = function_exists('wp_unique_id') ? wp_unique_id('faq-block-') : uniqid('faq-block-');
                    ?>
                    <div class="space-y-3" data-faq-block="<?php echo esc_attr($faq_block_id); ?>">
                        <?php foreach ($items as $index => $item): ?>
                            <?php
                            $question = trim($item['question'] ?? '');
                            $answer   = trim($item['answer'] ?? '');
                            $item_id  = $faq_block_id . '-' . ($index + 1);
                            ?>
                            <?php if ($question && $answer): ?>
                                <div class="bg-card rounded-lg border px-4 overflow-hidden">
                                    <button
                                        type="button"
                                        class="w-full text-left hover:no-underline text-base font-medium py-3 flex items-center justify-between gap-4"
                                        data-faq-toggle="<?php echo esc_attr($item_id); ?>"
                                        aria-expanded="false"
                                    >
                                        <span><?php echo esc_html($question); ?></span>
                                        <svg class="w-4 h-4 text-muted-foreground transition-transform duration-200" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                            <circle cx="12" cy="12" r="10" class="opacity-15"></circle>
                                            <path d="M8 10l4 4 4-4"></path>
                                        </svg>
                                    </button>
                                    <div
                                        id="<?php echo esc_attr($item_id); ?>"
                                        class="faq-content hidden pb-4 text-foreground text-sm"
                                    >
                                        <?php echo wp_kses_post($answer); ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <div class="bg-card rounded-lg border p-6 text-center text-muted-foreground">
                        <?php esc_html_e('Добавьте вопросы и ответы в блоке FAQ.', 'udsc'); ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="w-full lg:sticky lg:top-24">
                <div class="bg-card border shadow-lg overflow-hidden">
                    <div class="p-6 bg-gradient-to-br from-primary/5 to-primary/10">
                        <?php if ($form_title): ?>
                            <h3 class="text-xl font-bold mb-1 text-foreground">
                                <?php echo esc_html($form_title); ?>
                            </h3>
                        <?php endif; ?>
                        <?php if ($form_subtitle): ?>
                            <p class="text-muted-foreground text-sm mb-4">
                                <?php echo esc_html($form_subtitle); ?>
                            </p>
                        <?php endif; ?>

                        <form action="<?php echo esc_url($form_action ?: '#'); ?>" method="post" class="space-y-3">
                            <div>
                                <input
                                    type="tel"
                                    name="faq_phone"
                                    placeholder="<?php echo esc_attr($form_phone_placeholder); ?>"
                                    class="w-full h-10 text-sm border border-input rounded-md px-3 bg-background"
                                    required
                                />
                                <span class="text-xs text-muted-foreground ml-1">*</span>
                            </div>

                            <div>
                                <textarea
                                    name="faq_question"
                                    placeholder="<?php echo esc_attr($form_question_placeholder); ?>"
                                    class="w-full min-h-[100px] resize-none text-sm border border-input rounded-md px-3 py-2 bg-background"
                                    required
                                ></textarea>
                            </div>

                            <button type="submit" class="w-full bg-primary text-primary-foreground hover:bg-primary/90 h-10 text-sm font-semibold rounded-md transition-colors">
                                <?php echo esc_html($form_button_text); ?>
                            </button>

                            <?php if ($form_consent_text): ?>
                                <p class="text-xs text-muted-foreground text-center leading-tight">
                                    <?php echo wp_kses_post($form_consent_text); ?>
                                </p>
                            <?php endif; ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php if (!empty($items)): ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const block = document.querySelector('[data-faq-block="<?php echo esc_js($faq_block_id); ?>"]');
            if (!block) {
                return;
            }

            const toggles = block.querySelectorAll('[data-faq-toggle]');

            const closeAll = () => {
                toggles.forEach(toggle => {
                    const targetId = toggle.getAttribute('data-faq-toggle');
                    const content = document.getElementById(targetId);
                    if (content) {
                        content.classList.add('hidden');
                    }
                    toggle.setAttribute('aria-expanded', 'false');
                    const icon = toggle.querySelector('svg');
                    if (icon) {
                        icon.style.transform = 'rotate(0deg)';
                    }
                });
            };

            toggles.forEach(toggle => {
                toggle.addEventListener('click', () => {
                    const targetId = toggle.getAttribute('data-faq-toggle');
                    const content = document.getElementById(targetId);
                    if (!content) {
                        return;
                    }

                    const isOpen = toggle.getAttribute('aria-expanded') === 'true';
                    closeAll();

                    if (!isOpen) {
                        content.classList.remove('hidden');
                        toggle.setAttribute('aria-expanded', 'true');
                        const icon = toggle.querySelector('svg');
                        if (icon) {
                            icon.style.transform = 'rotate(180deg)';
                        }
                    }
                });
            });
        });
    </script>
<?php endif; ?>

