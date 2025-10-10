<?php
/**
 * CTA Block Component
 * Handles layout_cta_block from ACF flexible content
 */

if (!function_exists('render_cta_block')) {
    function render_cta_block($fields) {
        $text = $fields['text'] ?? '';
        $button_label = $fields['button_label'] ?? '';
        $button_url = $fields['button_url'] ?? '';
        
        if (empty($text) && empty($button_label)) return '';
        
        ob_start();
        ?>
        <div class="mb-8">
            <div class="bg-gradient-to-r from-blue-50 to-blue-100 border border-blue-200 rounded-lg p-8 text-center">
                <svg class="w-12 h-12 mx-auto mb-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
                
                <?php if (!empty($text)): ?>
                    <div class="text-gray-700 mb-6 max-w-2xl mx-auto leading-relaxed">
                        <?php echo wp_kses_post($text); ?>
                    </div>
                <?php endif; ?>
                
                <?php if (!empty($button_label) && !empty($button_url)): ?>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a 
                            href="<?php echo esc_url($button_url); ?>" 
                            class="inline-flex items-center justify-center px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition-colors duration-200"
                        >
                            <?php echo esc_html($button_label); ?>
                        </a>
                        <a 
                            href="/services" 
                            class="inline-flex items-center justify-center px-6 py-3 border border-blue-600 text-blue-600 font-semibold rounded-lg hover:bg-blue-50 transition-colors duration-200"
                        >
                            Наши услуги
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <?php
        return ob_get_clean();
    }
}
