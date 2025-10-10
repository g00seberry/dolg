<?php
/**
 * Conclusion Section Component
 * Handles layout_conclusion_section from ACF flexible content
 */

if (!function_exists('render_conclusion_section')) {
    function render_conclusion_section($fields) {
        $title = $fields['title'] ?? '';
        $content = $fields['content'] ?? '';
        
        if (empty($title) && empty($content)) return '';
        
        ob_start();
        ?>
        <section class="mb-8">
            <div class="bg-blue-50 border border-blue-200 rounded-lg p-6">
                <?php if (!empty($title)): ?>
                    <h3 class="text-xl font-semibold mb-4 text-blue-900">
                        <?php echo esc_html($title); ?>
                    </h3>
                <?php endif; ?>
                
                <?php if (!empty($content)): ?>
                    <div class="text-blue-800 leading-relaxed">
                        <?php echo wp_kses_post($content); ?>
                    </div>
                <?php endif; ?>
            </div>
        </section>
        <?php
        return ob_get_clean();
    }
}
