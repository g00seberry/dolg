<?php
/**
 * Intro Text Component
 * Handles layout_intro_text from ACF flexible content
 */

if (!function_exists('render_intro_text')) {
    function render_intro_text($fields) {
        $content = $fields['content'] ?? '';
        
        if (empty($content)) return '';
        
        ob_start();
        ?>
        <div class="mb-8">
            <div class="text-lg leading-relaxed text-gray-700 prose prose-lg max-w-none">
                <?php echo wp_kses_post($content); ?>
            </div>
        </div>
        <?php
        return ob_get_clean();
    }
}
