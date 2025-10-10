<?php
/**
 * Consequences Section Component
 * Handles layout_consequences_section from ACF flexible content
 */

if (!function_exists('render_consequences_section')) {
    function render_consequences_section($fields) {
        $positive_title = $fields['positive_title'] ?? '';
        $positive_items = $fields['positive_items'] ?? [];
        $negative_title = $fields['negative_title'] ?? '';
        $negative_items = $fields['negative_items'] ?? [];
        
        if (empty($positive_items) && empty($negative_items)) return '';
        
        ob_start();
        ?>
        <section class="mb-8">
            <div class="grid md:grid-cols-2 gap-6">
                <!-- Positive consequences -->
                <?php if (!empty($positive_items) && is_array($positive_items)): ?>
                    <div class="bg-green-50 border border-green-200 rounded-lg p-6">
                        <h4 class="font-semibold mb-4 text-green-800 text-lg">
                            <?php echo esc_html($positive_title ?: 'Положительные моменты'); ?>
                        </h4>
                        <ul class="space-y-2 text-sm text-green-700">
                            <?php foreach ($positive_items as $item): ?>
                                <?php 
                                $item_text = $item['item_text'] ?? '';
                                if (empty($item_text)) continue;
                                ?>
                                <li>• <?php echo esc_html($item_text); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
                
                <!-- Negative consequences -->
                <?php if (!empty($negative_items) && is_array($negative_items)): ?>
                    <div class="bg-red-50 border border-red-200 rounded-lg p-6">
                        <h4 class="font-semibold mb-4 text-red-800 text-lg">
                            <?php echo esc_html($negative_title ?: 'Ограничения'); ?>
                        </h4>
                        <ul class="space-y-2 text-sm text-red-700">
                            <?php foreach ($negative_items as $item): ?>
                                <?php 
                                $item_text = $item['item_text'] ?? '';
                                if (empty($item_text)) continue;
                                ?>
                                <li>• <?php echo esc_html($item_text); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>
        </section>
        <?php
        return ob_get_clean();
    }
}
