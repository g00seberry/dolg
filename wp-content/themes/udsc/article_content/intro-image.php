<?php
/**
 * Intro Image Component
 * Handles introduction section with image from React component
 */

if (!function_exists('render_intro_image')) {
    function render_intro_image($fields) {
        $image = $fields['image'] ?? null;
        $content = $fields['content'] ?? '';
        
        if (empty($image) && empty($content)) return '';
        
        $image_url = '';
        $image_alt = 'Статья 213 ФЗ о несостоятельности (банкротстве)';
        
        if ($image && is_array($image)) {
            $image_url = $image['url'] ?? $image['sizes']['large'] ?? '';
            $image_alt = $image['alt'] ?? $image_alt;
        }
        
        ob_start();
        ?>
        <div class="mb-8">
            <?php if (!empty($image_url)): ?>
                <img 
                    src="<?php echo esc_url($image_url); ?>" 
                    alt="<?php echo esc_attr($image_alt); ?>"
                    class="w-full rounded-lg mb-6"
                />
            <?php endif; ?>
            
            <?php if (!empty($content)): ?>
                <div class="text-lg leading-relaxed">
                    <?php echo wp_kses_post($content); ?>
                </div>
            <?php endif; ?>
        </div>
        <?php
        return ob_get_clean();
    }
}
