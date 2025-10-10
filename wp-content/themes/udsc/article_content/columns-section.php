<?php
/**
 * Columns Section Component
 * Handles layout_columns_section from ACF flexible content
 */

if (!function_exists('render_columns_section')) {
    function render_columns_section($fields) {
        $left_title = $fields['left_title'] ?? '';
        $left_items = $fields['left_items'] ?? [];
        $right_title = $fields['right_title'] ?? '';
        $right_items = $fields['right_items'] ?? [];
        
        if (empty($left_items) && empty($right_items)) return '';
        
        ob_start();
        ?>
        <section class="mb-8">
            <div class="grid md:grid-cols-2 gap-6">
                <!-- Left Column -->
                <?php if (!empty($left_items) && is_array($left_items)): ?>
                    <div class="bg-white rounded-lg shadow-md border border-gray-200 p-6">
                        <?php if (!empty($left_title)): ?>
                            <h4 class="font-semibold mb-4 text-lg text-gray-900">
                                <?php echo esc_html($left_title); ?>
                            </h4>
                        <?php endif; ?>
                        
                        <ul class="space-y-2 text-sm">
                            <?php foreach ($left_items as $item): ?>
                                <?php 
                                $item_text = $item['item_text'] ?? '';
                                if (empty($item_text)) continue;
                                ?>
                                <li class="text-gray-700">• <?php echo esc_html($item_text); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
                
                <!-- Right Column -->
                <?php if (!empty($right_items) && is_array($right_items)): ?>
                    <div class="bg-white rounded-lg shadow-md border border-gray-200 p-6">
                        <?php if (!empty($right_title)): ?>
                            <h4 class="font-semibold mb-4 text-lg text-gray-900">
                                <?php echo esc_html($right_title); ?>
                            </h4>
                        <?php endif; ?>
                        
                        <ul class="space-y-2 text-sm">
                            <?php foreach ($right_items as $item): ?>
                                <?php 
                                $item_text = $item['item_text'] ?? '';
                                if (empty($item_text)) continue;
                                ?>
                                <li class="text-gray-700">• <?php echo esc_html($item_text); ?></li>
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
